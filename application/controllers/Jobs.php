<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('job_model');
        
    }

    public function index() {
        $table_names = ['jobs','locations','projects','phases'];
        $data['selected_column'] = ['job_id','project_id','total_hours_quota', 'address'];
        $data['column_name'] = $this->job_model->get_all_column_name($table_names);
        $selected_field = 'jobs.job_id,jobs.project_id,jobs.total_hours_quota,locations.address';
        $data['data'] = $this->job_model->get_selected_data($selected_field);
        //echo "<pre>";print_r($data['data']);exit;
        $this->load->view('welcome_message',$data);
    }
    
    public function docData() {
        $response = new stdClass();
        $input_columns = $this->input->post('selected_column');
        $selected_column = [];
        $selected_field = '';
        foreach ($input_columns as $key => $value) {
            if(empty($selected_field)) {
                $selected_field = $value;
            }else {
                $selected_field = $selected_field . "," .$value;
            }
            $column_names = explode(".", $value);
            $selected_column[] = $column_names[1];
            
        }
        $response->data = $this->job_model->get_selected_data($selected_field);
        $response->code = 200;
        $response->selected_column = $selected_column;
        echo json_encode($response);
        
    }

}
