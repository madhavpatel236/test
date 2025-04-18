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
    public $errors = ["name_error" => "", "email_error" => "", "password_error" => ""];
    public $isValid = true;
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

    public function userHome()
    {
        $this->load->view('UserHome');
    }

    public function register()
    {
        $this->name = $this->input->post('register_name');
        $this->email = $this->input->post('register_email');
        $this->password = $this->input->post('register_password');
        $this->role = $this->input->post('user_role');


        if (empty($this->name)) {
            $this->errors['name_error'] = "email is reqired";
            $this->isValid = false;
        }
        if (empty($this->email)) {
            $this->errors['email_error'] = "email is reqired";
            $this->isValid = false;
        }
        if (empty($this->password)) {
            $this->errors['password_error'] = "password is reqired";
            $this->isValid = false;
        }
        
        if ($_SESSION['userEmailAlreadyPresent'] == false) {
            $this->errors['general_error'] = "User already present, please use different email address.";
            $this->isValid = false;
        }
        if ($this->isValid == false) {
            // $this->load->view('Register', $this->errors);
            redirect('AuthController/register');
        }




        $this->UserModel->registerUser($this->name, $this->email, $this->password, $this->role);
    }

    public function showUserRankTable()
    {
        // var_dump("dcfv"); exit;
        $data = $this->UserModel->userRankTable();
        // print_r($data); exit;
        //  $data;
        echo json_encode($data);
    }

    public function insertUserData()
    {
        $this->UserModel->InsertData();
    }

    public function isUserCompleteTest()
    {
        $data = $this->UserModel->userTestStatus();
        echo json_encode($data);
    }
}
