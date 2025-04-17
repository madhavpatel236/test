<?php

/**
 * @property UserModel $UserModel
 * @property CI_Input $input
 */

class AdminController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('UserModel');
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
        $this->UserModel->deleteRule($id);
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
}
