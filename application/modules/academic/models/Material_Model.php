<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Material_Model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
    
     public function get_material_list($class_id = null){
        
        if($this->session->userdata('role_id') == STUDENT){
           $class_id = $this->session->userdata('class_id');
        }
         
        $this->db->select('SM.*, C.name AS class_name, S.name AS subject');
        $this->db->from('study_materials AS SM');
        $this->db->join('classes AS C', 'C.id = SM.class_id', 'left');
        $this->db->join('subjects AS S', 'S.id = SM.subject_id', 'left');
        
        if($this->session->userdata('role_id') == TEACHER){
            $this->db->where('S.teacher_id', $this->session->userdata('profile_id'));
        }        
        if($class_id){
            $this->db->where('SM.class_id', $class_id);
        }       
        $this->db->order_by('SM.id', 'DESC');
        return $this->db->get()->result();
        
    }
    
    public function get_single_material($id){
        
        $this->db->select('SM.*, C.name AS class_name, S.name AS subject');
        $this->db->from('study_materials AS SM');
        $this->db->join('classes AS C', 'C.id = SM.class_id', 'left');
        $this->db->join('subjects AS S', 'S.id = SM.subject_id', 'left');
        $this->db->where('SM.id', $id);
        return $this->db->get()->row();
        
    } 
}
