<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Teacher_Model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function get_teacher_list($status=null){
        
        $this->db->select('*');
        $this->db->from('all_teachers AS T');
        if($status)
        {
            $this->db->where('T.status', $status);

        }
        return $this->db->get()->result();
        
    }

    public function get_single_teacher($id){
        
        $this->db->select('*');
        $this->db->from('all_teachers AS T');
        $this->db->where('T.id', $id);
        return $this->db->get()->result()[0];
        
    }    
        
     function duplicate_check($email, $id = null ){           
           
        if($id){
            $this->db->where_not_in('id', $id);
        }
        $this->db->where('email_id', $email);
        return $this->db->get('all_teachers')->num_rows();            
    }
}
