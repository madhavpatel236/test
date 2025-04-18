<?php
defined('BASEPATH') or exit('No direct script access allowed');
session_start();
$_SESSION['currentUserEmailID'];
$_SESSION['userRole'];
class AuthController extends CI_Controller
{
    public $userModelObj;
    public $email;
    public $password;
    public $errors = ["email_error" => "", "password_error" => ""];
    public $isValid = true;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->userModelObj =  new UserModel();
        // $this->load->database('default', TRUE);
        $this->load->database('default');
        $this->load->helper('url');

        $this->email = $_POST['login_email'];
        $this->password = $_POST['login_password'];

        // if ($this->email == null) {
        //     $this->errors['email_error'] = "Please enter the email address.";
        // }


    }

    public function view()
    {
        $this->load->view('Login');
    }
    public function register()
    {
        $this->load->view('Register');
    }

    public function auth()
    {
        $this->email = $_POST['login_email'];
        $this->password = $_POST['login_password'];

        if (empty($this->email)) {
            $this->errors['email_error'] = "email is reqired";
            $this->isValid = false;
        }
        if (empty($this->password)) {
            $this->errors['password_error'] = "password is reqired";
            $this->isValid = false;
        }
        // if ($_SESSION['isUserPresentAlready'] == true) {
        //     $this->errors['general_error'] = "User already present, please use different email address.";
        //     $this->isValid = false;
        // }
        if ($this->isValid == false) {
            // return false;
            redirect('AuthController/View');
            // $this->load->view('Login', $this->errors);
        }


        $this->userModelObj->authentication($this->email, $this->password);
    }

    public function adminView()
    {
        $this->load->view('AdminHome');
    }
    public function userView()
    {
        $this->load->view('UserHome');
    }

    // public function reloadPageChack()
    // {
    //     $userEmail = $_SESSION['currentUserEmailID'];
    //     $userRole = $_SESSION['userRole'];
    //     // var_dump($userRole);

    //     if ($userEmail != null && $userRole != null  && $userRole = 'user') {
    //         var_dump($userRole);
    //         site_url('UserController/userHome');
    //     } elseif ($userEmail != null && $userRole != null  &&  $userRole = 'admin') {
    //         var_dump($userRole);
    //         site_url('AuthController/adminView');
    //     } else {
    //         // var_dump($userRole);     
    //         site_url('AuthController/view');
    //     }
    // }
}
