<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Auth_Model
 *
 * @author Nafeesa
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Type_Model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function get_type(){        
        
        $this->db->select('T.*, R.name AS role_name');
        $this->db->from('leave_types AS T');
        $this->db->join('roles AS R', 'R.id = T.role_id', 'left');      
               
        $this->db->order_by('T.id', 'DESC');        
        return $this->db->get()->result();
    }
    
    
    function duplicate_check($role_id, $type, $id = null ){           
           
        if($id){
            $this->db->where_not_in('id', $id);
        }
        $this->db->where('type', $type);
        $this->db->where('role_id', $role_id);        
        return $this->db->get('leave_types')->num_rows();            
    }
}
