<?php


/**
 * @property UserModel $UserModel
 * @property CI_Input $input
 * @property Template $template
 * @property CI_Session $session
 */


class UserController extends CI_Controller
{
    public $name;
    public $email;
    public $password;
    public $role;
    public $errors = ["name_error" => "", "email_error" => "", "password_error" => "", "credential_error"  => ''];
    public $isValid = true;
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('UserModel');
        $this->load->library('template');
        $this->load->library('session');
        $this->load->library('javascript');
        // $this->userModelObj = new UserModel();
        // $this->load->database('default');

        // $this->session->set_userdata('currentUserEmailID', $this->email);
        // $this->session->set_userdata('userRole', 'admin');
        $currentEmail = $this->session->userdata('currentUserEmailID');
        $currentRole = $this->session->userdata('userRole');

        isset($currentEmail) ? $userEmail = $currentEmail  : "";
        isset($currentRole) ? $userRole = $currentRole  : "";

        // var_dump($userRole); exit;
        //  var_dump(isset($userEmail) && isset($userRole) && $userRole == 'user');
        //  exit;

        // if (isset($userEmail) && isset($userRole) &&  $userRole == 'admin') {
        //     redirect('AdminController/adminView');
        // } 
        // elseif (isset($userEmail) && isset($userRole) &&  $userRole == 'user') {
        //     redirect('UserController/userHome');
        // }
        // if ($userRole != "user") {
        //     redirect('AuthController/view');
        // }
        // if ($userRole != "user") {
        //     redirect('AuthController/view');
        // }
    }

    public function view()
    {
        $this->template->loadView('UserHome_template', ['Register']);
    }

    public function logout()
    {
        // var_dump('svfdv');
        // exit;
        $this->session->unset_userdata('currentUserEmailID');
        $this->session->unset_userdata('userRole');
        redirect('AuthController/view');
        $this->session->unset_userdata('credential_error');
        // $this->template->loadView('UserHome_template', 'Login');
    }

    // public function loginPage()
    // {
    //     $this->template->loadView('UserHome_template', 'Login');
    // }


    public function userHome()
    {
        // var_dump('sdc'); exit;
        // You can pass additional view data here
        // $viewData['name'] = "Madhav";

        // Load 'UserHome' view into $body
        // $body = $this->load->view('UserHome', $viewData );
        // echo "<pre>";print_r($body);exit;

        // Pass $body into the layout/template view
        // $Click = $this->input->post('#logout_btn');
        // var_dump(isset($Click)); 
        // $this->template->loadView('UserHome_template', 'Navbar');
        $this->template->loadView('UserHome_template', ['Navbar', 'UserHome']);

        // $this->template->loadView('UserHome_template', 'UserHome');

        // $this->template->loadView('UserHome_template', 'UserHome', ['name' => 'Madhav']);

    }



    // public function userHome()
    // {
    //     $data = "madhav";
    //     // $this->template->loadView('UserHome_template', 'Navbar', $data);
    //     // $this->template->loadView('UserHome_template', 'UserHome');

    //     // $body = $this->load->view('UserHome', $data, true);
    //     $this->template->loadView('UserHome_template', null,$data);

    //     // $this->template->loadView('templates/UserHome_template', ['body' => $body]);

    //     // $this->load->view('UserHome');
    // }

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

        if ($this->isValid == false) {
            // var_dump($this->role); exit;
            // $this->load->view('Register', $this->errors);
            redirect('UserController/view');
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
