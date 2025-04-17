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
}
