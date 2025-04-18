<?php
defined('BASEPATH') or exit('No direct script access allowed');
session_start();
// $_SESSION['currentUserEmailID'];
class UserModel extends CI_Model
{
    public $lastRankInDB = null;
    public $userEmail = "";

    public function __construct()
    {
        parent::__construct();
        $this->userEmail =  $_SESSION['currentUserEmailID'];
        // $this->load->database('default', TRUE);
    }

    public function authentication($email, $password)
    {
        $isUserPresent = $this->db->where(["Email" => $email]);
        $data = $this->db->get('auth');
        $userPasswordDB = $data->result()[0]->Password;
        $userEmailDB = $data->result()[0]->Email;
        $userRoleDB = $data->result()[0]->Role;
        $varifyPassword = password_verify($password, $userPasswordDB);

        // var_dump(password_verify($password, $userPasswordDB ));

        if ($data->num_rows() > 0 && $email == $userEmailDB && $varifyPassword  && $userRoleDB == 'admin') {
            // var_dump($userRoleDB);
            // $this->load->view('/AdminHome');
            $_SESSION['currentUserEmailID'] = $email;
            $_SESSION['userRole'] = "admin";
            // var_dump( $_SESSION['currentUserEmailID']); exit;
            redirect('AuthController/adminView');
        } else {
            $_SESSION['currentUserEmailID'] = null;
            $_SESSION['userRole'] = null;
        }

        if ($data->num_rows() > 0 && $email == $userEmailDB && $varifyPassword  && $userRoleDB == 'user') {
            // var_dump($userRoleDB);
            // $this->load->view('/AdminHome');
            $_SESSION['currentUserEmailID'] = $email;
            $_SESSION['userRole'] = "user";
            redirect('AuthController/userView');
        } else {
            $_SESSION['currentUserEmailID'] = null;
            $_SESSION['userRole'] = null;
        }
    }

    public function registerUser($name, $email, $password, $role)
    {
        // var_dump($email); exit;

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        // var_dump($passwordHash); exit;
        $isInsert = $this->db->insert('auth', ['Name' => $name, 'Email' => $email, 'Password' => $passwordHash, "Role" => $role]);
        // $this->db->
        if ($isInsert) {
            $_SESSION['currentUserEmailID'] = $email;
            $_SESSION['userRole'] = "user";
            redirect('AuthController/userView');
        } else {
            $_SESSION['currentUserEmailID'] = null;
            $_SESSION['userRole'] = null;
        }
    }

    public function addRules($numberOfUser, $points)
    {
        $count = 0;
        foreach ($numberOfUser as $userNumber) {
            $this->db->insert('rules', ["NumberOfPlayers" => $userNumber, "Points" => $points[$count]]);
            $count++;
        }
    }

    public function showRulesTable()
    {
        $data = $this->db->get('rules');
        $arr = [];
        if ($data->num_rows() > 0) {
            return $data->result();
        }
    }

    public function deleteRule($id)
    {
        $this->db->where(["Id" => $id]);
        $this->db->delete('rules');
    }

    public function editRules($id)
    {
        $this->db->where(['Id' => $id]);
        $data = $this->db->get('rules');
        return $data->result();
    }

    public function updateRules($id, $numberOfUser, $points)
    {
        // $this->db->set( $numberOfUser , $points);
        // var_dump($id);exit;
        $Id = (int) $id;
        $this->db->where("Id", $Id);
        $this->db->update('rules', ["NumberOfPlayers" => $numberOfUser, "Points" => $points]);
    }

    public function userRankTable()
    {
        $this->db->select('userData.Ranking, userData.Points, auth.Name');
        $this->db->from('userData');
        $this->db->join('auth', 'auth.Id = userData.userID');
        $this->db->order_by('Ranking');

        $query = $this->db->get();
        $tableDataArray = [];

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $tableDataArray[] = [
                    'Rank' => $row['Ranking'],
                    'Name' => $row['Name'],
                    'Points' => $row['Points']
                ];
            }
        }
        // print_r($tableDataArray);exit;
        return $tableDataArray;
    }

    // public function isTestCompleted() {}

    public function InsertData()
    {
        $this->db->select('Ranking');
        $this->db->from('userData');
        $value = $this->db->get();

        $rankArray = [];
        $row = $value->result_array();
        $this->lastRankInDB = $value->num_rows();

        if ($value->num_rows() > 0) {
            for ($i = 0; $i < count($row); $i++) {
                $rankArray[] = [
                    "Rank" => (int) $row[$i]['Ranking']
                ];
            }
        }
        $curentUserEmail = $_SESSION['currentUserEmailID'];
        // var_dump($curentUserEmail);
        // exit;
        $this->db->select('Id');
        $this->db->from('auth');
        $this->db->where('Email', $_SESSION['currentUserEmailID']);
        $id = $this->db->get();
        $userId = (int) $id->result()[0]->Id;

        // var_dump($rankArray[0]['Rank']); exit;
        // update rank if needed
        if (count($rankArray) != 0) {
            for ($i = 0; $i < count($rankArray); $i++) {
                // var_dump($rankArray[$i+1]['Rank']);     
                // var_dump($rankArray[$i]['Rank'] >= $rankArray[$i+1]['Rank']);  
                if ($rankArray[$i]['Rank'] > ($i + 1)) {
                    $gap = $rankArray[$i]['Rank'] - ($i + 1);
                    $newRank = $rankArray[$i]['Rank'] - $gap;
                    $this->lastRankInDB = $newRank;
                    $this->db->where("Ranking", $rankArray[$i]['Rank']);
                    $this->db->set("Ranking", $newRank);
                    $update = $this->db->update('userData');
                }
            }
        }

        // check if user present then user cannot give the test again
        $this->db->select('userID');
        $this->db->from('userData');
        $this->db->where('userID', $userId);
        $query = $this->db->get();
        $check = $query->result();
        if (count($check) != 0) {
            // return false;
            // redirect('UserController/userHome');

        }
        $ranking = $this->lastRankInDB + 1;
        $newUserData = [
            'Ranking' => $ranking,
            'Email'   => $curentUserEmail,
            'userID'  => $userId
        ];
        $this->db->insert('userData', $newUserData);

        // points 
        $rulesDataArray = [];
        $rulesTableData = $this->db->get('rules');

        if ($rulesTableData->num_rows()) {
            for ($i = 0; $i < count($rulesTableData->result()); $i++) {
                // var_dump($rulesTableData->result()[$i]->NumberOfPlayers); exit; 
                $rulesDataArray[] = [
                    "numberOfPlayers" => $rulesTableData->result()[$i]->NumberOfPlayers,
                    "Points" => $rulesTableData->result()[$i]->Points,
                ];
            }
        }

        // select a current user rank from the database 
        $this->db->select('Ranking');
        $this->db->from('userData');
        $this->db->where('Email', $curentUserEmail);
        $query = $this->db->get();


        $rankOfCurrentUser =  $query->result()[0]->Ranking;
        $prev = (int) $rulesDataArray[0]['numberOfPlayers'];
        $userPoint = 0;
        for ($i = 0; $i < count($rulesDataArray); $i++) {
            $countRules = '';
            $prev += (int) $rulesDataArray[$i + 1]['numberOfPlayers'];
            $countRules = $prev;
            if ((int) $rulesDataArray[0]['numberOfPlayers'] >= $rankOfCurrentUser) {
                $userPoint = (int) $rulesDataArray[0]['Points'];
                // var_dump($userPoint);
                // exit;
                break;
            } elseif ($countRules >= $rankOfCurrentUser) {
                $userPoint = (int) $rulesDataArray[$i + 1]['Points'];
                break;
            }
        }


        $this->db->set(["Points" => $userPoint]);
        $this->db->where("Email", $curentUserEmail);
        $isUpdate = $this->db->update('userData');
        if ($isUpdate) {
            redirect('UserController/userHome');
        }
    }

    public function userTestStatus()
    {
        // var_dump("dvfdv"); exit;
        $this->db->select("Email");
        $this->db->from('userData');
        $this->db->where(["Email" => $this->userEmail]);
        $isUserComplete = $this->db->get();
        // var_dump($isUserComplete->num_rows()); exit;
        if ($isUserComplete->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }
}
