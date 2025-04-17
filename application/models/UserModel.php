<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->database('default', TRUE);
    }

    public function authentication($email, $password)
    {
        $isUserPresent = $this->db->where(["Email" => $email]);
        $data = $this->db->get('auth');
        $userPasswordDB = $data->result()[0]->Password;
        $userEmailDB = $data->result()[0]->Email;
        $userRoleDB = $data->result()[0]->Role;
        $varifyPassword = password_verify($password, $userPasswordDB);

        // var_dump(password_verify($password, $userPasswordDB ));

        if ($data->num_rows() > 0 && $email == $userEmailDB && $varifyPassword  && $userRoleDB == 'admin') {
            // var_dump($userRoleDB);
            // $this->load->view('/AdminHome');
            redirect('AuthController/adminView');
        }

        if ($data->num_rows() > 0 && $email == $userEmailDB && $varifyPassword  && $userRoleDB == 'user') {
            // var_dump($userRoleDB);
            // $this->load->view('/AdminHome');
            redirect('AuthController/userView');
        }
    }

    public function registerUser($name, $email, $password, $role)
    {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        // var_dump($passwordHash); exit;
        $isInsert = $this->db->insert('auth', ['Name' => $name, 'Email' => $email, 'Password' => $passwordHash, "Role" => $role]);
        // $this->db->
        if($isInsert){
            redirect('AuthController/userView');
        }
    }
}
