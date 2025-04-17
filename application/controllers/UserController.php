<?php

/**
 * @property UserModel $UserModel
 * @property CI_Input $input
 */


class UserController extends CI_Controller
{
    public $name;
    public $email;
    public $password;
    public $role;
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('UserModel');
        // $this->userModelObj = new UserModel();
        // $this->load->database('default');
    }

    public function view()
    {
        $this->load->view('Register');
    }

    public function register()
    {
        // $this->name = $_POST['register_name'];
        // $this->email = $_POST['register_email'];
        // $this->password = $_POST['register_password'];
        // $this->role = $_POST['user_role'];
        $this->name = $this->input->post('register_name');
        $this->email = $this->input->post('register_email');
        $this->password = $this->input->post('register_password');
        $this->role = $this->input->post('user_role');
        $this->UserModel->registerUser($this->name, $this->email, $this->password, $this->role);
    }

    public function userHome() {}
}
