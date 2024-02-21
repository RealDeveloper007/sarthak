<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Student.php**********************************
 * @product name    : Gsss Rainpurrani School Management System Pro
 * @type            : Class
 * @class name      : Student
 * @description     : Manage students imformation of the school.  
 * @author          : Real Developers 	
 * @url             : ''      
 * @support         : ''	
 * @copyright       : Real Developers	 	
 * ********************************************************** */

class Student extends MY_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();      
        
        $this->load->model('Student_Model', 'student', true);
        $this->load->model('../modules/administrator/models/Year_Model', 'year', true);

        // check running session
        if(!$this->academic_year_id){
            error($this->lang->line('academic_year_setting'));
            redirect('setting');
        }
    }

    
    
    /*****************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : Load "Student List" user interface                 
    *                    with class wise listing    
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function index($class_id = null) 
    {
        check_permission(VIEW);
        
        if(isset($class_id) && !is_numeric($class_id)){
          //  error($this->lang->line('unexpected_error'));
            redirect('academic/classes/index');
        }
        
        $this->data['class_id'] = $class_id;
        $this->data['students'] = $this->student->get_student_list($class_id);
        $this->data['roles'] = $this->student->get_list('roles', array('status' => 1), '', '', '', 'id', 'ASC');
        $this->data['guardians'] = $this->student->get_list('guardians', array('status' => 1), '', '', '', 'id', 'ASC');
        $this->data['classes'] = $this->student->get_list('classes', array('status' => 1), '', '', '', 'id', 'ASC');
        $this->data['discounts'] = $this->student->get_list('discounts', array('status'=> 1), '', '', '', 'id', 'ASC');  
       // $this->data['types'] = $this->student->get_list('student_types', array('status'=> 1), '', '', '', 'id', 'ASC');  
       // $this->data['groups'] = $this->student->get_list('student_groups', array('status'=> 1), '', '', '', 'id', 'ASC');  
        
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('manage_student') . ' | ' . SMS);
        $this->layout->view('student/index', $this->data);
    }

    
    /*****************Function add**********************************
    * @type            : Function
    * @function name   : add
    * @description     : Load "Add new Student" user interface                 
    *                    and process to store "Student" into database 
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function add() {

        check_permission(ADD);

        if ($_POST) {
            $this->_prepare_student_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_student_data();


                //print_r($data); die;

                $insert_id = $this->student->insert('all_students', $data);

                if ($insert_id) {
                    
                    create_log('Has been added a Student : '.$data['name']);
                    success($this->lang->line('insert_success'));
                    redirect('student/index/');
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect('student/add/');
                }
            } else {

                $this->data['post'] = $_POST;
                $this->data['errors'] = validation_errors();

            }
        }
        
        $this->data['students'] = $this->student->get_student_list();
        $this->data['add'] = TRUE;
        $this->layout->title($this->lang->line('add') . ' ' . $this->lang->line('student') . ' | ' . SMS);
        $this->layout->view('student/index', $this->data);
    }

        
    /*****************Function edit**********************************
    * @type            : Function
    * @function name   : edit
    * @description     : Load Update "Student" user interface                 
    *                    with populate "Student" value 
    *                    and process to update "Student" into database    
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function edit($id = null) {

        check_permission(EDIT);

        if(!is_numeric($id)){
            error($this->lang->line('unexpected_error'));
            redirect('student/index');     
        }
        
        if ($_POST) {
            $this->_prepare_student_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_student_data();
                $updated = $this->student->update('all_students', $data, array('id' => $this->input->post('id')));

                if ($updated) {
                    $this->__update_enrollment();
                    
                    create_log('Has been updated a Student : '.$data['name']);
                    success($this->lang->line('update_success'));
                    redirect('student/index/');
                } else {
                    error($this->lang->line('update_failed'));
                    redirect('student/edit/' . $this->input->post('id'));
                }
            } else {
                $this->data['student'] = $this->student->get_single_student($this->input->post('id'));
                $this->data['errors'] = validation_errors();
            }
        }

        if ($id) {
            $this->data['student'] = $this->student->get_single_student($id);

            if (!$this->data['student']) {
                redirect('student/index');
            }
        }

        $this->data['students'] = $this->student->get_student_list();
  
        $this->data['edit'] = TRUE;
        $this->layout->title($this->lang->line('edit') . ' ' . $this->lang->line('student') . ' | ' . SMS);
        $this->layout->view('student/index', $this->data);
    }

        
    
    /*****************Function view**********************************
    * @type            : Function
    * @function name   : view
    * @description     : Load user interface with specific Student data                 
    *                       
    * @param           : $student_id integer value
    * @return          : null 
    * ********************************************************** */
    public function view($student_id = null) {

        check_permission(VIEW);

        if(!is_numeric($student_id)){
             error($this->lang->line('unexpected_error'));
              redirect('student/index');
        }
        
        $this->data['student'] = $this->student->get_single_student($student_id);        
        $class_id = $this->data['student']->class_id;
        
        $this->data['students'] = $this->student->get_student_list($class_id);
        $this->data['roles'] = $this->student->get_list('roles', array('status' => 1), '', '', '', 'id', 'ASC');
        $this->data['guardians'] = $this->student->get_list('guardians', array('status' => 1), '', '', '', 'id', 'ASC');
        $this->data['classes'] = $this->student->get_list('classes', array('status' => 1), '', '', '', 'id', 'ASC');
        $this->data['discounts'] = $this->student->get_list('discounts', array('status'=> 1), '', '', '', 'id', 'ASC'); 
        $this->data['types'] = $this->student->get_list('student_types', array('status'=> 1), '', '', '', 'id', 'ASC');  
        $this->data['groups'] = $this->student->get_list('student_groups', array('status'=> 1), '', '', '', 'id', 'ASC');  
        
        $this->data['class_id'] = $class_id;  
        
        $this->data['detail'] = TRUE;
        $this->layout->title($this->lang->line('view') . ' ' . $this->lang->line('student') . ' | ' . SMS);
        $this->layout->view('student/index', $this->data);
    }
    
    
    
     /*****************Function get_single_student**********************************
     * @type            : Function
     * @function name   : get_single_student
     * @description     : "Load single student information" from database                  
     *                    to the user interface   
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function get_single_student(){
        
        $this->load->helper('report');
        $student_id = $this->input->post('student_id');
        $adv = $this->input->post('adv');

        $this->data['student'] = $this->student->get_single_student($student_id, $adv);
        
        
        $this->data['guardian'] = $this->student->get_single_guardian($this->data['student']->guardian_id);
        $this->data['days'] = 31;
        $this->data['academic_year_id'] = $this->data['student']->academic_year_id;
        $this->data['class_id'] = $this->data['student']->class_id;
        $this->data['section_id'] = $this->data['student']->section_id;
        $this->data['student_id'] = $this->data['student']->id;
        
        $this->data['exams'] = $this->student->get_list('exams', array('status' => 1, 'academic_year_id' => $this->academic_year_id), '', '', '', 'id', 'ASC');
        
        $this->data['invoices'] = $this->student->get_invoice_list($student_id);  
        $this->data['activity'] = $this->student->get_activity_list($student_id);  
        
        echo $this->load->view('get-single-student', $this->data);
    }
    
        
    /*****************Function _prepare_student_validation**********************************
    * @type            : Function
    * @function name   : _prepare_student_validation
    * @description     : Process "Student" user input data validation                 
    *                       
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    private function _prepare_student_validation() {
        
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');


        $this->form_validation->set_rules('class', $this->lang->line('class'), 'trim|required');
        $this->form_validation->set_rules('section', $this->lang->line('section'), 'trim|required');
        $this->form_validation->set_rules('roll_no', $this->lang->line('roll_no'), 'trim|required'); 
        $this->form_validation->set_rules('name', $this->lang->line('name'), 'trim|required');
        $this->form_validation->set_rules('gender', $this->lang->line('gender'), 'trim|required');
        $this->form_validation->set_rules('position', 'Position', 'trim|required');
        $this->form_validation->set_rules('total_marks', 'Total Marks', 'trim|required');
        $this->form_validation->set_rules('obtained_marks', 'Obtained Marks', 'trim|required');
        $this->form_validation->set_rules('photo', $this->lang->line('photo'), 'trim|callback_photo');     
        
    }
                        
    /*****************Function email**********************************
    * @type            : Function
    * @function name   : email
    * @description     : Unique check for "Student Email" data/value                  
    *                       
    * @param           : null
    * @return          : boolean true/false 
    * ********************************************************** */ 
    public function email() {
        if ($this->input->post('id') == '') {
            $email = $this->student->duplicate_check($this->input->post('email'));
            if ($email) {
                $this->form_validation->set_message('email', $this->lang->line('already_exist'));
                return FALSE;
            } else {
                return TRUE;
            }
        } else if ($this->input->post('id') != '') {
            $email = $this->student->duplicate_check($this->input->post('email'), $this->input->post('id'));
            if ($email) {
                $this->form_validation->set_message('email', $this->lang->line('already_exist'));
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return TRUE;
        }
    }
                
    /*****************Function email**********************************
    * @type            : Function
    * @function name   : email
    * @description     : Unique check for "Student Email" data/value                  
    *                       
    * @param           : null
    * @return          : boolean true/false 
    * ********************************************************** */ 
    public function gud_email() {
        if ($this->input->post('id') == '') {
            $email = $this->student->duplicate_check($this->input->post('gud_email'));
            if ($email) {
                $this->form_validation->set_message('gud_email', $this->lang->line('already_exist'));
                return FALSE;
            } else {
                return TRUE;
            }
        } else if ($this->input->post('id') != '') {
            $email = $this->student->duplicate_check($this->input->post('gud_email'), $this->input->post('id'));
            if ($email) {
                $this->form_validation->set_message('gud_email', $this->lang->line('already_exist'));
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return TRUE;
        }
    }
                
    /*****************Function photo**********************************
    * @type            : Function
    * @function name   : photo
    * @description     : validate student profile photo                 
    *                       
    * @param           : null
    * @return          : boolean true/false 
    * ********************************************************** */
    public function photo() {
        if ($_FILES['photo']['name']) {
            $name = $_FILES['photo']['name'];
            $arr = explode('.', $name);
            $ext = end($arr);
            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
                return TRUE;
            } else {
                $this->form_validation->set_message('photo', $this->lang->line('select_valid_file_format'));
                return FALSE;
            }
        }
    }

       
    /*****************Function _get_posted_student_data**********************************
    * @type            : Function
    * @function name   : _get_posted_student_data
    * @description     : Prepare "Student" user input data to save into database                  
    *                       
    * @param           : null
    * @return          : $data array(); value 
    * ********************************************************** */
    private function _get_posted_student_data() {

        $items = array();

        $items[] = 'academic_years_id';
        $items[] = 'class';       
        $items[] = 'section';
        $items[] = 'name';
        $items[] = 'gender';
        $items[] = 'roll_no';
        $items[] = 'position';
        $items[] = 'total_marks';
        $items[] = 'obtained_marks';
    
        $data = elements($items, $_POST);

        $data['academic_years_id'] =$this->year->GetCurrentSession();

        if ($this->input->post('id')) {
            
            $data['updated_at'] = date('Y-m-d H:i:s');
            $data['updated_by'] = logged_in_user_id();
            
        } else {
            
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = logged_in_user_id();
            $data['updated_at'] = date('Y-m-d H:i:s');
            $data['updated_by'] = logged_in_user_id();
            $data['status'] = 1;

        }

        // student  photo
        if ($_FILES['photo']['name']) {
            $data['photo'] = $this->_upload_photo();
        }

        return $data;
    }

           
    /*****************Function _upload_photo**********************************
    * @type            : Function
    * @function name   : _upload_photo
    * @description     : process to upload student profile photo in the server                  
    *                     and return photo file name  
    * @param           : null
    * @return          : $return_photo string value 
    * ********************************************************** */
    private function _upload_photo() {

        $prev_photo = $this->input->post('prev_photo');
        $photo = $_FILES['photo']['name'];
        $photo_type = $_FILES['photo']['type'];
        $return_photo = '';
        if ($photo != "") {
            if ($photo_type == 'image/jpeg' || $photo_type == 'image/pjpeg' ||
                    $photo_type == 'image/jpg' || $photo_type == 'image/png' ||
                    $photo_type == 'image/x-png' || $photo_type == 'image/gif') {

                $destination = 'assets/uploads/student-photo/';

                $file_type = explode(".", $photo);
                $extension = strtolower($file_type[count($file_type) - 1]);
                $photo_path = 'photo-' . time() . '-sms.' . $extension;

                move_uploaded_file($_FILES['photo']['tmp_name'], $destination . $photo_path);

                // need to unlink previous photo
                if ($prev_photo != "") {
                    if (file_exists($destination . $prev_photo)) {
                        @unlink($destination . $prev_photo);
                    }
                }

                $return_photo = $photo_path;
            }
        } else {
            $return_photo = $prev_photo;
        }

        return $return_photo;
    }
    
    
    /*****************Function _upload_transfer_certificate**********************************
    * @type            : Function
    * @function name   : _upload_transfer_certificate
    * @description     : process to upload student transfer_certificate in the server                  
    *                     and return photo file name  
    * @param           : null
    * @return          : $return_photo string value 
    * ********************************************************** */
    private function _upload_transfer_certificate() {

        $prev_transfer_certificate = $this->input->post('prev_transfer_certificate');
        $transfer_certificate = $_FILES['transfer_certificate']['name'];
        $transfer_certificate_type = $_FILES['transfer_certificate']['type'];
        $return_transfer_certificate = '';
        if ($transfer_certificate != "") {            

                $destination = 'assets/uploads/transfer-certificate/';

                $file_type = explode(".", $transfer_certificate);
                $extension = strtolower($file_type[count($file_type) - 1]);
                $transfer_certificate_path = 'tc-' . time() . '-sms.' . $extension;

                move_uploaded_file($_FILES['transfer_certificate']['tmp_name'], $destination . $transfer_certificate_path);

                // need to unlink previous transfer_certificate
                if ($prev_transfer_certificate != "") {
                    if (file_exists($destination . $prev_transfer_certificate)) {
                        @unlink($destination . $prev_transfer_certificate);
                    }
                }

                $return_transfer_certificate = $transfer_certificate_path;
           
        } else {
            $return_transfer_certificate = $prev_transfer_certificate;
        }

        return $return_transfer_certificate;
    }

    
               
    /*****************Function _upload_father_photo**********************************
    * @type            : Function
    * @function name   : _upload_father_photo
    * @description     : process to upload student profile photo in the server                  
    *                     and return photo file name  
    * @param           : null
    * @return          : $return_father_photo string value 
    * ********************************************************** */
    private function _upload_father_photo() {

        $prev_father_photo = $this->input->post('prev_father_photo');
        $father_photo = $_FILES['father_photo']['name'];
        $father_photo_type = $_FILES['father_photo']['type'];
        $return_father_photo = '';
        if ($father_photo != "") {
            if ($father_photo_type == 'image/jpeg' || $father_photo_type == 'image/pjpeg' ||
                    $father_photo_type == 'image/jpg' || $father_photo_type == 'image/png' ||
                    $father_photo_type == 'image/x-png' || $father_photo_type == 'image/gif') {

                $destination = 'assets/uploads/father-photo/';

                $file_type = explode(".", $father_photo);
                $extension = strtolower($file_type[count($file_type) - 1]);
                $father_photo_path = 'photo-' . time() . '-sms.' . $extension;

                move_uploaded_file($_FILES['father_photo']['tmp_name'], $destination . $father_photo_path);

                // need to unlink previous father_photo
                if ($prev_father_photo != "") {
                    if (file_exists($destination . $prev_father_photo)) {
                        @unlink($destination . $prev_father_photo);
                    }
                }

                $return_father_photo = $father_photo_path;
            }
        } else {
            $return_father_photo = $prev_father_photo;
        }

        return $return_father_photo;
    }
    
    
    
               
    /*****************Function _upload_mother_photo**********************************
    * @type            : Function
    * @function name   : _upload_mother_photo
    * @description     : process to upload mother profile photo in the server                  
    *                     and return photo file name  
    * @param           : null
    * @return          : $return_mother_photo string value 
    * ********************************************************** */
    private function _upload_mother_photo() {

        $prev_mother_photo = $this->input->post('prev_mother_photo');
        $mother_photo = $_FILES['mother_photo']['name'];
        $mother_photo_type = $_FILES['mother_photo']['type'];
        $return_mother_photo = '';
        if ($mother_photo != "") {
            if ($mother_photo_type == 'image/jpeg' || $mother_photo_type == 'image/pjpeg' ||
                    $mother_photo_type == 'image/jpg' || $mother_photo_type == 'image/png' ||
                    $mother_photo_type == 'image/x-png' || $mother_photo_type == 'image/gif') {

                $destination = 'assets/uploads/mother-photo/';

                $file_type = explode(".", $mother_photo);
                $extension = strtolower($file_type[count($file_type) - 1]);
                $mother_photo_path = 'photo-' . time() . '-sms.' . $extension;

                move_uploaded_file($_FILES['mother_photo']['tmp_name'], $destination . $mother_photo_path);

                // need to unlink previous mother_photo
                if ($prev_mother_photo != "") {
                    if (file_exists($destination . $prev_mother_photo)) {
                        @unlink($destination . $prev_mother_photo);
                    }
                }

                $return_mother_photo = $mother_photo_path;
            }
        } else {
            $return_mother_photo = $prev_mother_photo;
        }

        return $return_mother_photo;
    }
    
    
    /*****************Function delete**********************************
    * @type            : Function
    * @function name   : delete
    * @description     : delete "Student" data from database                  
    *                     also delete all relational data
    *                     and unlink student photo from server   
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function delete($id = null) {

        check_permission(DELETE);
        
        if(!is_numeric($id)){
             error($this->lang->line('unexpected_error'));
              redirect('student/index');
        }
        
        $student = $this->student->get_single('all_students', array('id' => $id));
        if (!empty($student)) {

            // delete student data
            $this->student->delete('all_students', array('id' => $id));
            
            create_log('Has been deleted a Student : '.$student->name);
            
            success($this->lang->line('delete_success'));
            redirect('student/index/');
        } else {
            error($this->lang->line('delete_failed'));
        }
        
        redirect('student/index/');
    }

        
    /*****************Function __insert_enrollment**********************************
    * @type            : Function
    * @function name   : __insert_enrollment
    * @description     : save student info to enrollment while create a new student                  
    * @param           : $insert_id integer value
    * @return          : null 
    * ********************************************************** */
    private function __insert_enrollment($insert_id) {
        $data = array();
        $data['student_id'] = $insert_id;
        $data['class_id'] = $this->input->post('class_id');
        $data['section_id'] = $this->input->post('section_id');
        
        if($this->input->post('advanced')){
            $data['academic_year_id'] = $this->input->post('academic_year_id');
        }else{            
            $data['academic_year_id'] = $this->academic_year_id;
        }
        
        $data['roll_no'] = $this->input->post('roll_no');
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = logged_in_user_id();
        $data['modified_at'] = date('Y-m-d H:i:s');
        $data['modified_by'] = logged_in_user_id();
        $data['status'] = 1;
        $this->db->insert('enrollments', $data);
    }

    /*****************Function __update_enrollment**********************************
    * @type            : Function
    * @function name   : __update_enrollment
    * @description     : update student info to enrollment while update a student                  
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    private function __update_enrollment() {

        $data = array();
        $data['class_id'] = $this->input->post('class_id');
        $data['section_id'] = $this->input->post('section_id');
        $data['roll_no'] = $this->input->post('roll_no');
        $data['modified_at'] = date('Y-m-d H:i:s');
        $data['modified_by'] = logged_in_user_id();

        $this->db->where('student_id', $this->input->post('id'));
        
        if($this->input->post('advanced')){
            $data['academic_year_id'] = $this->input->post('academic_year_id');
        }else{            
            $data['academic_year_id'] = $this->academic_year_id;
            $this->db->where('academic_year_id', $this->academic_year_id);
        }
        
        $this->db->update('enrollments', $data, array());
    }
    
    
    /*****************Function advanced**********************************
    * @type            : Function
    * @function name   : advanced
    * @description     : Load "Add new advanced Student" user interface                 
    *                    and process to store "Student" into database 
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function advanced() {

        check_permission(ADD);

        if ($_POST) {
            $this->_prepare_student_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_student_data();

                $insert_id = $this->student->insert('students', $data);

                if ($insert_id) {
                    $this->__insert_enrollment($insert_id);
                    success($this->lang->line('insert_success'));
                    redirect('student/advanced/'.$this->input->post('class_id'));
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect('student/advanced/'.$this->input->post('class_id'));
                }
            } else {

                $this->data['post'] = $_POST;
            }
        }
        
       
        
        $class_id = $this->uri->segment(3);
        if(!$class_id){
          $class_id = $this->input->post('class_id');
        }
        
        $session = $this->student->get_single('academic_years', array('id'=>$this->academic_year_id));   
        $this->data['class_id'] = $class_id;      
        $this->data['students'] = $this->student->get_student_list($class_id, $session->end_year);
        $this->data['academic_years'] = $this->student->get_list('academic_years', array('status' => 1), '', '', '', 'id', 'ASC');
        $this->data['roles'] = $this->student->get_list('roles', array('status' => 1), '', '', '', 'id', 'ASC');
        $this->data['guardians'] = $this->student->get_list('guardians', array('status' => 1), '', '', '', 'id', 'ASC');
        $this->data['classes'] = $this->student->get_list('classes', array('status' => 1), '', '', '', 'id', 'ASC');
        $this->data['discounts'] = $this->student->get_list('discounts', array('status'=> 1), '', '', '', 'id', 'ASC');  
        $this->data['types'] = $this->student->get_list('student_types', array('status'=> 1), '', '', '', 'id', 'ASC');  
        $this->data['groups'] = $this->student->get_list('student_groups', array('status'=> 1), '', '', '', 'id', 'ASC'); 
        
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('add') . ' ' . $this->lang->line('student') . ' | ' . SMS);
        $this->layout->view('student/advanced', $this->data);
    }
    
            
    /*****************Function editadvanced**********************************
    * @type            : Function
    * @function name   : editadvanced
    * @description     : Load Update "Student" user interface                 
    *                    with populate "Student" value 
    *                    and process to update "Student" into database    
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function editadvanced($id = null) {

        check_permission(EDIT);

        if(!is_numeric($id)){
            error($this->lang->line('unexpected_error'));
            redirect('student/advanced');     
        }
        
        if ($_POST) {
            $this->_prepare_student_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_student_data();
                $updated = $this->student->update('students', $data, array('id' => $this->input->post('id')));

                if ($updated) {
                    $this->__update_enrollment();
                    success($this->lang->line('update_success'));
                    redirect('student/advanced/'.$this->input->post('class_id'));
                } else {
                    error($this->lang->line('update_failed'));
                    redirect('student/editadvanced/' . $this->input->post('id'));
                }
            } else {
                $this->data['student'] = $this->student->get_single_student($this->input->post('id'), true);
            }
        }

        if ($id) {
            $this->data['student'] = $this->student->get_single_student($id, true);

            if (!$this->data['student']) {
                redirect('student/advanced');
            }
        }
        
        $class_id = $this->data['student']->class_id;
        if(!$class_id){
          $class_id = $this->input->post('class_id');
        } 

        $this->data['class_id'] = $class_id;
        $this->data['students'] = $this->student->get_student_list($class_id, true);
        $this->data['academic_years'] = $this->student->get_list('academic_years', array('status' => 1), '', '', '', 'id', 'ASC');
        $this->data['roles'] = $this->student->get_list('roles', array('status' => 1), '', '', '', 'id', 'ASC');
        $this->data['guardians'] = $this->student->get_list('guardians', array('status' => 1), '', '', '', 'id', 'ASC');
        $this->data['classes'] = $this->student->get_list('classes', array('status' => 1), '', '', '', 'id', 'ASC');
        $this->data['discounts'] = $this->student->get_list('discounts', array('status'=> 1), '', '', '', 'id', 'ASC');  
        $this->data['types'] = $this->student->get_list('student_types', array('status'=> 1), '', '', '', 'id', 'ASC');  
        $this->data['groups'] = $this->student->get_list('student_groups', array('status'=> 1), '', '', '', 'id', 'ASC'); 
        
        $this->data['edit'] = TRUE;
        $this->layout->title($this->lang->line('edit') . ' ' . $this->lang->line('student') . ' | ' . SMS);
        $this->layout->view('student/advanced', $this->data);
    }


}
