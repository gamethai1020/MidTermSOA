<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Students_model extends CI_Model {

    private $tbl_name = "description";

    function get_all($keyword){
        $this->db->select("std_id,std_fname,std_lname,std_nickname,faculty,major,tel");
        $this->db->from($this->tbl_name);
        $result = $this->db->get();
        return $result->result();
    }

    function insert($data){
        return $this->db->insert($this->tbl_name, $data);
    }

    function update($data){
        $this->db->where('std_id',$data['std_id']);
        $this->db->update($this->tbl_name,$data);
        $result = $this->db->get($this->tbl_name);
        return $result;
    }

    
    function delete($std_id){    
        $this->db->where('std_id', $std_id); 
        return $this->db->delete($this->tbl_name);  
    }
    function search($keyword){
        $this->db->like('std_id',$keyword);
        $result = $this->db->get($this->tbl_name);
        return $result->result();
    }

}