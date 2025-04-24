<?php

class Template extends CI_Controller
{
    var $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    // temp_name = template_name(Which we make in the view file);
    // load_viewFile = file which we need to be load in the templates.
    // data = If we need to pass any data in the template throught the controller.

    public function loadView($temp_name, $load_viewFile = null, $data = [])
    {
        $body = '';

        if (!is_null($load_viewFile)) {
            if (!is_array($load_viewFile)) {
                $load_viewFile = [$load_viewFile];
            }

            foreach ($load_viewFile as $viewFile) {
                if (file_exists(APPPATH . 'views/' . $viewFile . '.php')) {
                    $body .= $this->CI->load->view($viewFile, $data, TRUE);
                } elseif (file_exists(APPPATH . 'views/' . $temp_name . '/' . $viewFile . '.php')) {
                    $body .= $this->CI->load->view($temp_name . '/' . $viewFile, $data, TRUE);
                }
            }

            if (is_null($data)) {
                $data = ['body' => $body];
            } elseif (is_array($data)) {
                $data['body'] = $body;
            } elseif (is_object($data)) {
                $data->body = $body;
            }
        }

        $this->CI->load->view('templates/' . $temp_name, $data);
    }
}
