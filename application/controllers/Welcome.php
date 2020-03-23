<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('job_model');
    }

    public function index() {
        $data['column_name'] = $this->job_model->get_all_column_name();
        $this->load->view('welcome_message',$data);
    }

}
