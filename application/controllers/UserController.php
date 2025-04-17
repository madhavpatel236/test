<?php

class UserController extends CI_Controller
{
    public $userModelObj;
    public $name;
    public $email;
    public $password;
    public $role;
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('UserModel');
        $this->userModelObj = new UserModel();
        $this->load->database('default');
    }

    public function view()
    {
        $this->load->view('Register');
    }

    public function register()
    {
        $this->name = $_POST['register_name'];
        $this->email = $_POST['register_email'];
        $this->password = $_POST['register_password'];
        $this->role = $_POST['user_role'];
        $this->userModelObj->registerUser($this->name, $this->email, $this->password, $this->role);
    }

    public function userHome(){}
}
