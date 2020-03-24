<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Job_model extends CI_Model {

    public $allowed_column = ['job_id', 'project_id'];
    public $not_allowed_column = ['created_at', 'updated_at'];
    public $not_allowed_column_end_with = '_id';

    function __construct() {
        parent::__construct();
    }
    /**
     * 
     * @param type array: $table_names-array of tables names
     * @return type array: all column name of all table
     */
    public function get_all_column_name($table_names) {
        $final_data = [];
        foreach ($table_names as $key => $value) {
            $data = [];
            $data = $this->get_column_name_with_table_name('jobs');
            array_merge($final_data,$data);
        }
        $jobs = $this->get_column_name_with_table_name('jobs');
        $locations = $this->get_column_name_with_table_name('locations');
        $projects = $this->get_column_name_with_table_name('projects');
        $phases = $this->get_column_name_with_table_name('phases');
        $merged_data = array_merge($jobs, $locations, $projects, $phases);
        $final_data = $this->remove_duplicate_column($merged_data);
        return $final_data;
    }
    /**
     * 
     * @param type $table_name
     * @return column name with table name type:array
     */
    protected function get_column_name_with_table_name($table_name) {
        $column_name = $this->db->list_fields($table_name);
        $final_data = [];
        if (!empty($column_name)) {
            foreach ($column_name as $key => $value) {
                if (substr($value, -3) != $this->not_allowed_column_end_with && !in_array($value, $this->not_allowed_column) || in_array($value, $this->allowed_column)) {
                    $final_data[] = ["table_name" => $table_name, "column_name" => $value];
                }
            }
        }

        return $final_data;
    }
    /**
     * 
     * @param type array $data
     * @return type array, return all unique data
     */
    protected function remove_duplicate_column($data) {
        $selected_column = [];
        $final_data = [];
        foreach ($data as $key => $value) {
            if(! in_array($value['column_name'], $selected_column)) {
                $final_data[] = $value;
                $selected_column[] = $value['column_name'];
            }
            
        }
        //echo "<pre>";print_r($final_data);exit;
        return $final_data;
    }
    
    public function get_selected_data($selected_field) {
        $this->db->select($selected_field);
        $this->db->from('jobs');
        $this->db->join('projects', 'jobs.project_id  = projects.project_id');
        $this->db->join('locations', 'projects.location_id   = locations.location_id');
        $this->db->join('phases', 'phases.job_id   = jobs.job_id');
        $query = $this->db->get();
        return $query->result();
    }

}
