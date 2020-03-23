<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Job_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    public function get_all_column_name() {
        $jobs = $this->db->list_fields('jobs');
        $locations = $this->db->list_fields('locations');
        $projects = $this->db->list_fields('projects');
        $phases = $this->db->list_fields('phases');
        $column_name = array_merge($jobs, $locations, $projects, $phases);
        $final_data = [];
        foreach ($column_name as $key => $value) {
            if( substr($value, -3) != '_id' && $value !='created_at' && $value !='updated_at'  ) {
                $final_data[] = $value;
            }
            
        }
        return $final_data;
    }

}
