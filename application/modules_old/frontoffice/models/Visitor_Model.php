<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Visitor_Model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
    
     public function get_visitor_list(){
        
        $this->db->select('V.*, P.purpose, R.name AS role');
        $this->db->from('visitors AS V');
        $this->db->join('visitor_purposes AS P', 'P.id = V.purpose_id', 'left');
        $this->db->join('roles AS R', 'R.id = V.role_id', 'left');
             
        $this->db->order_by('V.id', 'DESC'); 
        $this->db->order_by('V.check_out', 'ASC');
        
        return $this->db->get()->result();
        
    }
    
    public function get_single_visitor($id){
        
        $this->db->select('V.*, P.purpose, R.name AS role');
        $this->db->from('visitors AS V');
        $this->db->join('visitor_purposes AS P', 'P.id = V.purpose_id', 'left');
        $this->db->join('roles AS R', 'R.id = V.role_id', 'left');       
        $this->db->where('V.id', $id);
        return $this->db->get()->row();
        
    }

}
