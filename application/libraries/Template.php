<?php

class Template extends CI_Controller
{
    var $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        // var_dump('Naeevbar'); exit;

    }

    // temp_name = template_name(Which we make in the view file);
    // load_viewFile = file which we need to be load in the templates.
    // data = If we need to pass any data in the template throught the controller.

    public function loadView($temp_name, $load_viewFile = null,  $data = null)
    {
        if (!is_null($load_viewFile)) {
            // check in the /view folder
            if (file_exists(APPPATH . 'views/' . $load_viewFile . '/')) {
                $body_view_path = $load_viewFile;
            } elseif (file_exists(APPPATH . 'views/' . $load_viewFile . '.php')) {
                $body_view_path = $load_viewFile;
            }
            // check in the /view/template/ folder
            elseif (file_exists(APPPATH . 'views/' . $temp_name . '/' . $load_viewFile)) {
                $body_view_path = $load_viewFile;
            } elseif (file_exists(APPPATH . 'views/' . $temp_name . '/' . $load_viewFile . '.php')) {
                $body_view_path = $load_viewFile;
            } else {
                show_error('Unable to load the requested file: ' . $temp_name . '/' . $load_viewFile . '.php');
            }
            
            $body = $this->CI->load->view($body_view_path, $data, TRUE);
            // var_dump($body); exit;
            //  If $data was not supplied to the load() call, $data is assigned to an array containing $body under key body. If the parameter was supplied, $body is added to the list by either assigning it to an array key, or object property, both also named body.
            // The $body variable can now be used in template view files as a placeholder for embedded views.
            if (is_null($data)) {
                $data = array('body' => $body);
            } elseif (is_array($data)) {
                $data['body'] = $body;
            } elseif (is_object($data)) {
                $data->body = $body;
            }
        }
        // var_dump($this->CI->load->view('templates/' . $temp_name, $data));exit;
        $this->CI->load->view('/templates/' . $temp_name, $data); // here we load a template file which is located at the /view/templates with the data.
    }
}
