<?php

defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @property UserModel $UserModel
 * @property CI_Input $input
 * @property Template $template
 * @property CI_Session $session
 */


class AuthController extends CI_Controller
{
    // public $userModelObj;
    public $email;
    public $password;
    public $errors = ["email_error" => "", "password_error" => "", "credential_error" => ""];
    public $isValid = true;
    public function __construct()
    {
        parent::__construct();
        $this->load->library('template');
        $this->load->model('UserModel');
        $this->load->library('session');
        $this->load->database('default');
        $this->load->helper('url');

        $currentEmail = $this->session->userdata('currentUserEmailID');
        $currentRole = $this->session->userdata('userRole');

        isset($currentEmail) ? $userEmail = $currentEmail  : "";
        isset($currentRole) ? $userRole = $currentRole  : "";


        // var_dump(($userEmail));
        // var_dump(isset($userRole));
        // var_dump(isset($userEmail) && isset($userRole) &&  $userRole == 'user');
        // exit;

        // if (isset($userEmail) && isset($userRole) &&  $userRole == 'admin') {
        //     redirect('AdminController/adminView');
        // }
        // elseif (isset($userEmail) && isset($userRole) &&  $userRole == 'user') {
        //     redirect('UserController/userHome');
        // }

        // $this->session->set_userdata('currentUserEmailID',);
        // $this->session->set_userdata('userRole', 'admin');
        // $this->session->userdata('currentUserEmailID');
    }

    public function view()
    {
        // var_dump('AuthCon'); exit;
        // $this->session->unset_userdata('currentUserEmailID');
        // $this->session->unset_userdata('userRole');

        $this->template->loadView('UserHome_template', 'Login');
        $this->session->unset_userdata('credential_error');
        // unset($_SESSION['credential_error']);
    }



    // public function userHome()
    // {
    //     // $this->load->view('UserHome');
    //     $this->template->loadView('UserHome_template', 'UserHome');
    // }

    // public function register()
    // {
    //     $this->template->loadView('UserHome_template', 'Register');
    //     unset($_SESSION['credential_error']);
    // }

    public function adminView()
    {
        $this->template->loadView('UserHome_template', 'Navbar');
        $this->template->loadView('UserHome_template', 'AdminHome');
    }

    // public function userView()
    // {
    //     // $this->Template->load();
    //     $this->load->view('UserHome');
    // }

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
        // var_dump($_SESSION['isUserPresentAlready']);
        // exit;
        // if ($_SESSION['isUserPresentAlready'] == true) {
        //     $this->errors['general_error'] = "User already present, please use different email address.";
        //     $this->isValid = false;
        // }
        if ($this->isValid == false) {
            // return false;
            redirect('AuthController/View');
            // $this->load->view('Login', $this->errors);
        }


        // $this->userModelObj->authentication($this->email, $this->password);
        $this->UserModel->authentication($this->email, $this->password);
    }

    // public function reloadPageChack()
    // {
    //     // var_dump('hii');
    //     // exit;
    //     $userEmail = $_SESSION['currentUserEmailID'];
    //     $userRole = $_SESSION['userRole'];
    //     // var_dump($userRole);

    //     if ($userEmail &&  $userRole == 'admin') {
    //         site_url('AdminController/adminView');
    //     } elseif ($userEmail &&  $userRole == 'user') {
    //         site_url('UserController/userHome');
    //     } else {
    //         site_url('AuthController/view');
    //     }
    // }
}
