public function __construct()
    {
        parent::__construct();
        $this->load->library('template');
        $this->load->model('UserModel');
        $this->load->library('session');
        $this->load->database('default');
        $this->load->helper('url');
        
        
        // $this->session->set_userdata('currentUserEmailID', );
        // $this->session->set_userdata('userRole', 'admin');
        // $this->session->userdata('currentUserEmailID');
        
        
        isset($_SESSION['currentUserEmailID']) ? $userEmail = $_SESSION['currentUserEmailID']  : "";
        isset($_SESSION['userRole']) ? $userRole = $_SESSION['userRole']  : "";

        // var_dump($userEmail); exit;
        // exit;
        // var_dump(isset($userEmail) && isset($userRole) && $userRole == 'user');
        // exit;

        if (isset($userEmail) && isset($userRole) &&  $userRole == 'admin') {
            site_url('AuthController/adminView');
        } elseif (isset($userEmail) && isset($userRole) &&  $userRole == 'user') {
            site_url('UserController/userHome');
        } else {
            site_url('AuthController/view');
        }
    }