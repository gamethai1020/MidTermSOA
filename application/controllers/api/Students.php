<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends BD_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('students_model');
    }

    function get_all_get(){
        $keyword = $this->get('keyword');
        $result = $this->students_model->get_all($keyword);
        // success
        $this->response([
            'status' => true,
            'response' => $result
        ], REST_Controller::HTTP_OK);
    }

    function create_post(){
        $std_fname = $this->post("std_fname");
        $std_lname = $this->post("std_lname");
        $std_nickname = $this->post("std_nickname");
        $faculty = $this->post("faculty");
        $major = $this->post("major");
        $tel = $this->post("tel");
        $data = [
            'std_id' => null,
            'std_fname' => $std_fname,
            'std_lname' => $std_lname,
            'std_nickname' => $std_nickname,
            'faculty' => $faculty,
            'major' => $major,
            'tel' => $tel
        ];
        $result = $this->students_model->insert($data);
        $this->response([
            'status' => true,
            'response' => $result
        ],REST_Controller::HTTP_OK);
    }
    function update_post(){
        $std_id = $this->post('std_id');
        $std_fname = $this->post("std_fname");
        $std_lname = $this->post("std_lname");
        $std_nickname = $this->post("std_nickname");
        $faculty = $this->post("faculty");
        $major = $this->post("major");
        $tel = $this->post("tel");
        $data = [
                'std_id' => $std_id,
                'std_fname' => $std_fname,
                'std_lname' => $std_lname,
                'std_nickname' => $std_nickname,
                'faculty' => $faculty,
                'major' => $major,
                'tel' => $tel
            ];
            $result = $this->students_model->update($data);
            $this->response([
                'status' => true,
                'response' => $result
            ],REST_Controller::HTTP_OK);
        }

        function delete_get(){
            $std_id = $this->get('std_id');
            $result = $this->students_model->delete($std_id);
            $this->response([
                'status' => true,
                'response' => $result
            ],REST_Controller::HTTP_OK);
        }

        function search_get(){
            $std_id = $this->get('std_id');
            $std_fname = $this->get("std_fname");
            $std_lname = $this->get("std_lname");
            $std_nickname = $this->get("std_nickname");
            $faculty = $this->get("faculty");
            $major = $this->get("major");
            $tel = $this->get("tel");
            $data = [
                'std_id' => $std_id,
                'std_fname' => $std_fname,
                'std_lname' => $std_lname,
                'std_nickname' => $std_nickname,
                'faculty' => $faculty,
                'major' => $major,
                'tel' => $tel
            ];
            $result = $this->students_model->search($std_id);
            $this->response([
                'status' => true,
                'response' => $result
            ],REST_Controller::HTTP_OK);
        }
}
