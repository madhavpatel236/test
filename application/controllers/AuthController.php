<?php
defined('BASEPATH') or exit('No direct script access allowed');
session_start();
$_SESSION['currentUserEmailID'] ;
$_SESSION['userRole'] ;
class AuthController extends CI_Controller
{
    public $userModelObj;
    public $email;
    public $password;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->userModelObj =  new UserModel();
        // $this->load->database('default', TRUE);
        $this->load->database('default');
        $this->load->helper('url');
    }

    public function view()
    {
        $this->load->view('Login');
    }

    public function auth()
    {
        $this->email = $_POST['login_email'];
        $this->password = $_POST['login_password'];
        // var_dump($this->userModelObj->authentication($this->email, $this->password)); exit;
        $this->userModelObj->authentication($this->email, $this->password);
    }

    public function adminView(){
        $this->load->view('AdminHome');
    }
    public function userView(){
        $this->load->view('UserHome');
    }
}
