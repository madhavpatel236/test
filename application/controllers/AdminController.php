<?php

/**
 * @property UserModel $UserModel
 * @property CI_Input $input
 * @property CI_Session $session
 * @property Template $template

 */

class AdminController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('UserModel');
        $this->load->library('session');
        $this->load->library('template');


        // $currentEmail = $this->session->userdata('currentUserEmailID');
        $currentRole = $this->session->userdata('userRole');

        isset($currentEmail) ? $userEmail = $currentEmail  : "";
        isset($currentRole) ? $userRole = $currentRole  : "";

        // var_dump(!($userRole == "admin")); exit;
        //  var_dump(isset($userEmail) && isset($userRole) && $userRole == 'user');
        //  exit;

        // if (isset($userEmail) && isset($userRole) &&  $userRole == 'admin') {
        //     redirect('AdminController/adminView');
        // } elseif (isset($userEmail) && isset($userRole) &&  $userRole == 'user') {
        //     redirect('UserController/userHome');
        // } 
        // if ($userRole != "admin") {
        //     redirect('AuthController/view');
        // }
    }

    public function adminView()
    {
        $this->template->loadView('UserHome_template', 'Navbar');
        $this->template->loadView('UserHome_template', 'AdminHome');
    }

    public function addRules()
    {
        $numberOfUser = $this->input->post('numberOfUser');
        $points = $this->input->post('points');
        $this->UserModel->addRules($numberOfUser, $points);
        // var_dump($points);
        // exit;
    }

    public function showRulesTable()
    {
        $data = $this->UserModel->showRulesTable();
        echo json_encode($data);
    }

    public function deleteRule()
    {
        $id = $this->input->post('Id');
        return $this->UserModel->deleteRule($id);
    }

    public function editRule()
    {
        $id = $this->input->post('Id');
        $data = $this->UserModel->editRules($id);
        echo json_encode($data);
    }
    public function updateRule()
    {
        // var_dump("numberOfUser"); exit;
        $id = $this->input->post('Id');
        $numberOfUser = $this->input->post('UserNumbers');
        $points = $this->input->post('Points');
        $this->UserModel->updateRules($id, $numberOfUser, $points);
    }

    public function showUserRankTable()
    {
        // var_dump("dcfv"); exit;
        $data = $this->UserModel->userRankTable();
        // print_r($data); exit;
        //  $data;
        echo json_encode($data);
    }
}
