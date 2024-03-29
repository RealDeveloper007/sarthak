<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH . '/vendor/autoload.php';

/* * *****************Teacher.php**********************************
 * @product name    : Gsss Rainpurrani School Management System Pro
 * @type            : Class
 * @class name      : Teacher
 * @description     : Manage teacers information of the school.  
 * @author          : Real Developers 	
 * @url             : ''      
 * @support         : ''	
 * @copyright       : Real Developers	 	
 * ********************************************************** */

class Teacher extends MY_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();
        $this->load->model('Teacher_Model', 'teacher', true);
        $this->load->model('../modules/administrator/models/Year_Model', 'year', true);

    }

        
    /*****************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : Load "Teacher List" user interface                 
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function index() {

        check_permission(VIEW);

        $this->data['teachers'] = $this->teacher->get_teacher_list(); 
        $this->data['incharge_list'] = $this->teacher->get_incharge_list();       
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('manage_teacher') . ' | ' . SMS);
        $this->layout->view('teacher/index', $this->data);
    }

    
    /*****************Function add**********************************
    * @type            : Function
    * @function name   : add
    * @description     : Load "Add new Teacer" user interface                 
    *                    and process to store "Teacer" into database 
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function add() {

        check_permission(ADD);

        if ($_POST) {

            $this->_prepare_teacher_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_teacher_data();

                $insert_id = $this->teacher->insert('all_teachers', $data);
                if ($insert_id) {
                    
                    create_log('Has been added a Teacher : '.$data['teacher_name']);
                    success($this->lang->line('insert_success'));
                    redirect('teacher/index');
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect('teacher/add');
                }
            } else {
                $this->data['post'] = $_POST;
                $this->data['errors'] = validation_errors();
            }
        }

        $this->data['teachers'] = $this->teacher->get_teacher_list();         
        $this->data['add'] = TRUE;
        $this->layout->title($this->lang->line('add') . ' ' . $this->lang->line('teacher') . ' | ' . SMS);

        $this->layout->view('teacher/index', $this->data);
    }

    
    /*****************Function edit**********************************
    * @type            : Function
    * @function name   : edit
    * @description     : Load Update "Teacer" user interface                 
    *                    with populate "Teacher" data/value 
    *                    and process to update "Teacher" into database    
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function edit($id = null) {

        check_permission(EDIT);

        if ($_POST) {
            $this->_prepare_teacher_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_teacher_data();
                $updated = $this->teacher->update('all_teachers', $data, array('id' => $this->input->post('id')));

                if ($updated) {
                    
                    create_log('Has been updated a Teacher : '.$data['name']);
                    success($this->lang->line('update_success'));
                    redirect('teacher/index');
                } else {
                    error($this->lang->line('update_failed'));
                    redirect('teacher/edit/' . $this->input->post('id'));
                }
            } else {
                
                $this->data['teacher'] = $this->teacher->get_single_teacher($this->input->post('id'));
            }
        }

        if ($id) {
            $this->data['teacher'] = $this->teacher->get_single_teacher($id);

            if (!$this->data['teacher']) {
                redirect('teacher/index');
            }
        }

        $this->data['teachers'] = $this->teacher->get_teacher_list();
        $this->data['edit'] = TRUE;
        $this->layout->title($this->lang->line('edit') . ' ' . $this->lang->line('teacher') . ' | ' . SMS);
        $this->layout->view('teacher/index', $this->data);
    }

        
    /*****************Function view**********************************
    * @type            : Function
    * @function name   : view
    * @description     : Load user interface with specific Teacher data                 
    *                       
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function view($id = null) {

        check_permission(VIEW);

        $this->data['teachers'] = $this->teacher->get_teacher_list();
        $this->data['roles'] = $this->teacher->get_list('roles', array('status' => 1), '', '', '', 'id', 'ASC');
        $this->data['teacher'] = $this->teacher->get_single_teacher($id);
         $this->data['grades'] = $this->teacher->get_list('salary_grades', array('status' => 1), '', '', '', 'id', 'ASC');
         
        $this->data['detail'] = TRUE;
        $this->layout->title($this->lang->line('view') . ' ' . $this->lang->line('teacher') . ' | ' . SMS);
        $this->layout->view('teacher/index', $this->data);
    }
    
    
        
        
     /*****************Function get_single_teacher**********************************
     * @type            : Function
     * @function name   : get_single_teacher
     * @description     : "Load single teacher information" from database                  
     *                    to the user interface   
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function get_single_teacher(){
        
       $teacher_id = $this->input->post('teacher_id');
       
       $this->data['teacher'] = $this->teacher->get_single_teacher($teacher_id);
       echo $this->load->view('teacher/get-single-teacher', $this->data);
    }

        
    /*****************Function _prepare_teacher_validation**********************************
    * @type            : Function
    * @function name   : _prepare_teacher_validation
    * @description     : Process "Teacher" user input data validation                 
    *                       
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    private function _prepare_teacher_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');

        if (!$this->input->post('id')) {   
            $this->form_validation->set_rules('email', $this->lang->line('email'), 'trim|required|valid_email|callback_email');
        }

        $this->form_validation->set_rules('type', 'Role', 'trim|required');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('teacher_code', 'Code', 'trim|required');

        $this->form_validation->set_rules('phone', $this->lang->line('phone'), 'trim|required');
        $this->form_validation->set_rules('present_address', $this->lang->line('present') . ' ' . $this->lang->line('address'), 'trim');
        $this->form_validation->set_rules('gender', $this->lang->line('gender'), 'trim|required');
        $this->form_validation->set_rules('dob', $this->lang->line('birth_date'), 'trim|required');
        $this->form_validation->set_rules('qualification', 'Qualification', 'trim|required');
        $this->form_validation->set_rules('designation', 'Designation', 'trim|required');

        $this->form_validation->set_rules('date_of_joining', $this->lang->line('join_date'), 'trim|required');
        $this->form_validation->set_rules('total_experience', 'Total Experience', 'trim|required');
    }

        
                    
    /*****************Function email**********************************
    * @type            : Function
    * @function name   : email
    * @description     : Unique check for "Teacher Email" data/value                  
    *                       
    * @param           : null
    * @return          : boolean true/false 
    * ********************************************************** */ 
    public function email() {
        if ($this->input->post('id') == '') {
            $email = $this->teacher->duplicate_check($this->input->post('email'));
            if ($email) {
                $this->form_validation->set_message('email', $this->lang->line('already_exist'));
                return FALSE;
            } else {
                return TRUE;
            }
        } else if ($this->input->post('id') != '') {
            $email = $this->teacher->duplicate_check($this->input->post('email'), $this->input->post('id'));
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
   
    /*****************Function _get_posted_teacher_data**********************************
    * @type            : Function
    * @function name   : _get_posted_teacher_data
    * @description     : Prepare "Teacher" user input data to save into database                  
    *                       
    * @param           : null
    * @return          : $data array(); value 
    * ********************************************************** */
    private function _get_posted_teacher_data() {

        $items = array();
        $items[] = 'academic_years_id';
        $items[] = 'type';
        $items[] = 'teacher_code';
        $items[] = 'teacher_name';
        $items[] = 'phone_no';
        $items[] = 'email_id';
        $items[] = 'gender_id';
        $items[] = 'birth_date';
        $items[] = 'present_address';
        $items[] = 'parmanent_address';
        $items[] = 'qualification';
        $items[] = 'designation';
        $items[] = 'date_of_joining';
        $items[] = 'total_experience';
        $items[] = 'status';
       
        
        $data = elements($items, $_POST);

        $data['teacher_name'] =$this->input->post('name');

        $data['phone_no'] =$this->input->post('phone');

        $data['email_id'] =$this->input->post('email');

        $data['gender_id'] =$this->input->post('gender');

        $data['academic_years_id'] =$this->year->GetCurrentSession();

        $data['birth_date'] = date('Y-m-d', strtotime($this->input->post('dob')));
        $data['date_of_joining'] = date('Y-m-d', strtotime($this->input->post('date_of_joining')));
        $data['status'] = $this->input->post('status') ? 1 : 0;

        if ($this->input->post('id')) {
            $data['updated_at'] = date('Y-m-d H:i:s');
            $data['updated_by'] = logged_in_user_id();
        } else {
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = logged_in_user_id();
            $data['updated_at'] = date('Y-m-d H:i:s');
            $data['updated_by'] = logged_in_user_id();
            $data['status'] = 1;
            // create user 
        }
     
        return $data;
    }

       
    /*****************Function _upload_photo**********************************
    * @type            : Function
    * @function name   : _upload_photo
    * @description     : process to upload teacher profile photo in the server                  
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

                $destination = 'assets/uploads/teacher-photo/';

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
    
           
    /*****************Function _upload_resume**********************************
    * @type            : Function
    * @function name   : _upload_resume
    * @description     : process to upload teacher profile resume in the server                  
    *                     and return resume file name  
    * @param           : null
    * @return          : $return_resume string value 
    * ********************************************************** */
    private function _upload_resume() {
        $prev_resume = $this->input->post('prev_resume');
        $resume = $_FILES['resume']['name'];
        $resume_type = $_FILES['resume']['type'];
        $return_resume = '';

        if ($resume != "") {
            if ($resume_type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ||
                    $resume_type == 'application/msword' || $resume_type == 'text/plain' ||
                    $resume_type == 'application/vnd.ms-office' || $resume_type == 'application/pdf') {

                $destination = 'assets/uploads/teacher-resume/';

                $file_type = explode(".", $resume);
                $extension = strtolower($file_type[count($file_type) - 1]);
                $resume_path = 'resume-' . time() . '-sms.' . $extension;

                move_uploaded_file($_FILES['resume']['tmp_name'], $destination . $resume_path);

                // need to unlink previous photo
                if ($prev_resume != "") {
                    if (file_exists($destination . $prev_resume)) {
                        @unlink($destination . $prev_resume);
                    }
                }

                $return_resume = $resume_path;
            }
        } else {
            $return_resume = $prev_resume;
        }

        return $return_resume;
    }

    
        
    
    /*****************Function delete**********************************
    * @type            : Function
    * @function name   : delete
    * @description     : delete "Teacher" data from database                  
    *                    also unlink teacher profile photo & resume from server   
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function delete($id = null) {

        check_permission(DELETE);

        if(!is_numeric($id)){
             error($this->lang->line('unexpected_error'));
             redirect('teacher');       
        }
        
        $teacher = $this->teacher->get_single('all_teachers', array('id' => $id));
        if (!empty($teacher)) {

            // delete teacher data
            $this->teacher->delete('all_teachers', array('id' => $id));
            // delete teacher login data
            // $this->teacher->delete('users', array('id' => $teacher->user_id));
            
            // delete teacher attendance data
            // $this->teacher->delete('teacher_attendances', array('teacher_id' => $teacher->id));
            
            // delete teacher messages data
            // $this->teacher->delete('messages', array('created_by' => $teacher->user_id));
            
            // delete teacher messages data
            // $this->teacher->delete('message_relationships', array('sender_id' => $teacher->user_id));
            // $this->teacher->delete('message_relationships', array('receiver_id' => $teacher->user_id));
            // $this->teacher->delete('message_relationships', array('owner_id' => $teacher->user_id));
            
            // delete teacher messages replies data
            // $this->teacher->delete('replies', array('sender_id' => $teacher->user_id));
            // $this->teacher->delete('replies', array('receiver_id' => $teacher->user_id));
            
            // delete teacher salary_payments data
            // $this->teacher->delete('salary_payments', array('user_id' => $teacher->user_id));

            // delete teacher resume and photo
            // $destination = 'assets/uploads/';
            // if (file_exists($destination . '/teacher-resume/' . $teacher->resume)) 
            // {
            //     @unlink($destination . '/teacher-resume/' . $teacher->resume);
            // }
            // if (file_exists($destination . '/teacher-photo/' . $teacher->photo)) {
            //     @unlink($destination . '/teacher-photo/' . $teacher->photo);
            // }

            create_log('Has been deleted a Teacher : '.$teacher->name);
            success($this->lang->line('delete_success'));
        } else {
            error($this->lang->line('delete_failed'));
        }
        redirect('teacher');
    }

    public function action_all_teachers()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: white;">', '</div>');

        $this->form_validation->set_rules('status_code', 'Please select status', 'trim|required');
        $this->form_validation->set_rules('teacher_ids[]', 'Please select any teacher', 'trim|required');

        if ($this->form_validation->run() === TRUE) 
            {
                $teacherIds = array_keys($_POST['teacher_ids']);

                for($i=0;$i<count($teacherIds);$i++)
                {
                    if($_POST['status_code'] == 1)
                    {
                        // update teachers data
                        $data['status'] = 0;
        
                        $this->teacher->update('users',$data, array('id' => $teacherIds[$i]));
                        success('Selected Incharges IN-Activated successfully');


                    } else if($_POST['status_code'] == 2) {

                         // update teachers data
                         $data['status'] = 1;
        
                         $this->teacher->update('users',$data, array('id' => $teacherIds[$i]));
                         success('Selected Incharges Activated successfully');

                    } else {
                        
                        // delete teacher  data
                        $this->teacher->delete('users', array('id' => $teacherIds[$i]));
                        success('Selected Incharges Deleted successfully');
                    }
                }
              
                redirect('teacher');

            } else {

                $this->session->set_flashdata('message', validation_errors());
                redirect('teacher');

            }

    }



    public function importIncharges()
    {
        $data = array();
        $data['title'] = 'Import Excel Sheet | TechArise';
        // Load form validation library
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidations');
        
        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata('message', validation_errors());

        } else {
            // If file uploaded
            if (!empty($_FILES['fileURL']['name'])) {
                // get file extension
                $extension = pathinfo($_FILES['fileURL']['name'], PATHINFO_EXTENSION);
                if($extension == 'csv' || $extension == 'xlsx') {
                    if ($extension == 'csv') {
                        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                    } elseif ($extension == 'xlsx') {

                        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                    } else {

                        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                    }

                    // file path
                    $spreadsheet = $reader->load($_FILES['fileURL']['tmp_name']);
                    $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
                    unset($allDataInSheet[1]);
                    unset($allDataInSheet[2]);
                    $arrayIndex = $allDataInSheet[3];
                    //unset the first index which contains the details
                    array_splice($allDataInSheet, 0, 1);
                    $indexedArray = array();
                    //setting the index value to the above data array
                    foreach($allDataInSheet as $value){
                      $indexedArray[] = array_combine($arrayIndex, $value);
                    }
                    //insert into users table
                    $counter = 0;
                    $InsertData = [];
                    $UpdateData = [];
                    $academicYear = $this->year->GetCurrentSession();

                    foreach ($indexedArray as $key) 
                    {
                        //check in user table 
                        if ($key['Email Id'] != '') {
                            $query = $this->checkUserEmail(trim($key['Email Id']));
                            if($query == 0) 
                            {
                                $InsertData[$counter]['academic_years_id']  = $academicYear;
                                $InsertData[$counter]['email']              = trim($key['Email Id']);
                                $InsertData[$counter]['password']           = md5('123456');
                                $InsertData[$counter]['temp_password']      = base64_encode('123456');
                                $InsertData[$counter]['role_id']            = 5;
                                $InsertData[$counter]['class_name']         = $key['Class'];
                                $InsertData[$counter]['class_section']      = $key['Section'];
                                $InsertData[$counter]['name']               = $key['Incharge Name'];

                            }

                            $counter++;

                        }
                    }

                    // print_r($UpdateData);  die;
                    //save into users table
                    if(!empty($InsertData)) {
                        $this->db->insert_batch('users', $InsertData);
                        unset($InsertData); 
                    }
                    success('Teacher data has been imported successfully');
                    redirect('teacher/index');
                } 
                else 
                {
                    error('Wrong format uploaded');
                    redirect('teacher/add');
                }   
            }
        }
    }

    private function UpdateYear($email,$UpdateData)
    {
        return $this->db->where('email',$email)->update('users',$updateData);
    }

    private function checkUserEmail($email)
    {
        return $this->db->where('email',$email)->get('users')->num_rows();
    }


    // checkFileValidation
    public function checkFileValidations($string)
    {
        $file_mimes = array(
            'text/x-comma-separated-values',
            'text/comma-separated-values',
            'application/octet-stream',
            'application/vnd.ms-excel',
            'application/x-csv',
            'text/x-csv',
            'text/csv',
            'application/csv',
            'application/excel',
            'application/vnd.msexcel',
            'text/plain',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        );

        if (isset($_FILES['fileURL']['name'])) {
            $arr_file = explode('.', $_FILES['fileURL']['name']);
            $extension = end($arr_file);
            if (($extension == 'xlsx' || $extension == 'xls' || $extension == 'csv') && in_array($_FILES['fileURL']['type'], $file_mimes)) {
                return true;
            } else {


                $this->form_validation->set_message('checkFileValidations', '<div class="alert alert-danger alert-dismissable">'
                    . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>Please choose only csv & excel files only.</div>');
                return false;
            }
        } else {


            $this->form_validation->set_message('checkFileValidations', '<div class="alert alert-danger alert-dismissable">'
                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>Please choose a file.</div>');
            return false;
        }
    }


}
