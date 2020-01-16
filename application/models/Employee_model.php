<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {

    private $tbl_name = "employees";

    function get_all($keyword){
        $this->db->select("employeeNumber,firstName,lastName,officeCode");
        $this->db->from($this->tbl_name);
        $result = $this->db->get();
        return $result->result();
    }

    function insert($data){
        return $this->db->insert($this->tbl_name, $data);
    }

    function search($keyword){
        $this->db->like('employeeNumber',$keyword);
        $result = $this->db->get($this->tbl_name);
        return $result->result();
    }

}