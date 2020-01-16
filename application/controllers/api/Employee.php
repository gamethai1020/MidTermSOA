<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends BD_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('employee_model');
    }

    function get_all_get(){
        $keyword = $this->get('keyword');
        $result = $this->employee_model->get_all($keyword);
        // success
        $this->response([
            'status' => true,
            'response' => $result
        ], REST_Controller::HTTP_OK);
    }

    function create_post(){
        $em_fname = $this->post("firstName");
        $em_lname = $this->post("lastName");
        $extension = $this->post("extension");
        $email = $this->post("email");
        $officeCode = $this->post("officeCode");
        $reportsTo = $this->post("reportsTo");
        $jobTitle = $this->post("jobTitle");
        $data = [
            'em_id' => null,
            'firstName' => $em_fname,
            'lastName' => $em_lname,
            'extension' => $extension,
            'email' => $email,
            'officeCode' => $officeCode,
            'reportsTo' => $reportsTo,
            'jobTitle' => $jobTitle
        ];
        $result = $this->students_model->insert($data);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }
        function search_get(){
            $em_id = $this->post("employNumber");
            $em_fname = $this->post("firstName");
            $em_lname = $this->post("lastName");
            $extension = $this->post("extension");
            $email = $this->post("email");
            $officeCode = $this->post("officeCode");
            $reportsTo = $this->post("reportsTo");
            $jobTitle = $this->post("jobTitle");
            $data = [
                'employNumber' => $em_id,
                'firstName' => $em_fname,
                'lastName' => $em_lname,
                'extension' => $extension,
                'email' => $email,
                'officeCode' => $officeCode,
                'reportsTo' => $reportsTo,
                'jobTitle' => $jobTitle
            ];
            $result = $this->students_model->search($em_id);
            $this->response([
                'status' => true,
                'response' => $result
            ],REST_Controller::HTTP_OK);
        }
}
