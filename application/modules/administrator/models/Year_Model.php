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

class Year_Model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }


    public function GetCurrentSession()
    {
        $this->db->select('*');
        $this->db->from('academic_years');
        $this->db->where('is_running', 1);
        $ID =  $this->db->get()->result()[0]->id;
        return $ID;
        
    }    
        
    
        
    function duplicate_check($session_year, $id = null ){           
           
        if($id){
            $this->db->where_not_in('id', $id);
        }
        $this->db->where('session_year', $session_year);
        return $this->db->get('academic_years')->num_rows();            
    }
}
