<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
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
            redirect('AuthController/adminView');
        }

        if ($data->num_rows() > 0 && $email == $userEmailDB && $varifyPassword  && $userRoleDB == 'user') {
            // var_dump($userRoleDB);
            // $this->load->view('/AdminHome');
            redirect('AuthController/userView');
        }
    }

    public function registerUser($name, $email, $password, $role)
    {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        // var_dump($passwordHash); exit;
        $isInsert = $this->db->insert('auth', ['Name' => $name, 'Email' => $email, 'Password' => $passwordHash, "Role" => $role]);
        // $this->db->
        if ($isInsert) {
            redirect('AuthController/userView');
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
        $this->db->update('rules', ["NumberOfPlayers" => $numberOfUser, "Points" => $points  ]);
    }
}
