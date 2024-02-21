<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Teacher.php**********************************
 * @product name    : Gsss Rainpurrani School Management System Express
 * @type            : Class
 * @class name      : Generate
 * @description     : Manage all type of system teacher listing.  
 * @author          : Real Developers 	
 * @url             : ''      
 * @support         : ''	
 * @copyright       : Real Developers	 	
 * ********************************************************** */

class Teacher extends MY_Controller {

    public $data = array();
      
   public function __construct() {
        parent::__construct();
                
        $this->load->model('Teacher_Model', 'teacher', true);                
    }

  

   

    /*****************Function index**********************************
     * @type            : Function
     * @function name   : index
     * @description     : Load user filtering interface                 
     *                      
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function index(){
        
        
        check_permission(VIEW);
        
        $this->data['teachers'] = '';
        
        if ($_POST) {
             
            $teacher_id = $this->input->post('teacher_id');
            $this->data['cards'] = $this->teacher->get_teacher_list($teacher_id);            
            $this->data['setting'] = $this->teacher->get_single('id_card_settings', array('status'=>1));
            $this->data['teacher_id'] = $teacher_id;
        }
                   
        $this->data['teachers'] = $this->teacher->get_list('teachers', array('status'=>1), '','', '', 'id', 'ASC');        
        
        $this->layout->title($this->lang->line('generate') .' ' . $this->lang->line('teacher').' ' . $this->lang->line('id') .' ' . $this->lang->line('card') .' | ' . SMS);
        $this->layout->view('teacher/index', $this->data);         
    }   

}
