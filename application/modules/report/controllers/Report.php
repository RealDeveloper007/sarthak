<?php

defined('BASEPATH') or exit('No direct script access allowed');
require FCPATH . '/vendor/autoload.php';
/* * *****************Report.php**********************************
 * @product name    : Gsss Rainpurrani School Management System Pro
 * @type            : Class
 * @class name      : Report
 * @description     : Manage all reports of the system.  
 * @author          : Real Developers 	
 * @url             : ''      
 * @support         : ''	
 * @copyright       : Real Developers	 	
 * ********************************************************** */

class Report extends My_Controller
{

    public $data = array();
    public $date_from = '';
    public $date_to = '';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Report_Model', 'report', true);
        $this->load->model('../modules/setting/models/Setting_Model', 'Setting', true);

        $this->load->helper('report');
        $this->data['academic_years'] = $this->report->get_list('academic_years', array('status' => 1));

        $this->date_from = date('Y-m-01');
        $this->date_to = date('Y-m-t');
    }


    /*****************Function income**********************************
     * @type            : Function
     * @function name   : income
     * @description     : Load Income report user interface                 
     *                    with various filtering options
     *                    and process to load income report   
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function income()
    {

        check_permission(VIEW);

        if ($_POST) {

            $academic_year_id = $this->input->post('academic_year_id');
            $group_by = $this->input->post('group_by');

            if ($group_by == 'daily') {
                $date_from = $this->input->post('date_from') ? date('Y-m-d', strtotime($this->input->post('date_from'))) : $this->date_from;
                $date_to = $this->input->post('date_to') ? date('Y-m-d', strtotime($this->input->post('date_to'))) : $this->date_to;
            } else {
                $date_from = '';
                $date_to = '';
            }

            $this->data['academic_year_id'] = $academic_year_id;
            $this->data['group_by'] = $group_by;
            $this->data['date_from'] = $date_from;
            $this->data['date_to'] = $date_to;

            $this->data['income'] = $this->report->get_income_report($academic_year_id, $group_by, $date_from, $date_to);
        }

        $this->data['report_url'] = site_url('report/income');
        $this->layout->title($this->lang->line('income') . ' ' . $this->lang->line('report') . ' | ' . SMS);
        $this->layout->view('income/index', $this->data);
    }




    /*****************Function expenditure**********************************
     * @type            : Function
     * @function name   : expenditure
     * @description     : Load expenditure report user interface                 
     *                    with various filtering options
     *                    and process to load expenditure report   
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function expenditure()
    {

        check_permission(VIEW);

        if ($_POST) {

            $academic_year_id = $this->input->post('academic_year_id');
            $group_by = $this->input->post('group_by');

            if ($group_by == 'daily') {
                $date_from = $this->input->post('date_from') ? date('Y-m-d', strtotime($this->input->post('date_from'))) : $this->date_from;
                $date_to = $this->input->post('date_to') ? date('Y-m-d', strtotime($this->input->post('date_to'))) : $this->date_to;
            } else {
                $date_from = '';
                $date_to = '';
            }

            $this->data['academic_year_id'] = $academic_year_id;
            $this->data['group_by'] = $group_by;
            $this->data['date_from'] = $date_from;
            $this->data['date_to'] = $date_to;

            $this->data['expenditure'] = $this->report->get_expenditure_report($academic_year_id, $group_by, $date_from, $date_to);
        }

        $this->data['report_url'] = site_url('report/expenditure');
        $this->layout->title($this->lang->line('expenditure') . ' ' . $this->lang->line('report') . ' | ' . SMS);
        $this->layout->view('expenditure/index', $this->data);
    }




    /*****************Function invoice**********************************
     * @type            : Function
     * @function name   : invoice
     * @description     : Load invoice report user interface                 
     *                    with various filtering options
     *                    and process to load invoice report   
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function invoice()
    {

        check_permission(VIEW);

        if ($_POST) {

            $academic_year_id = $this->input->post('academic_year_id');
            $group_by = $this->input->post('group_by');

            if ($group_by == 'daily') {
                $date_from = $this->input->post('date_from') ? date('Y-m-d', strtotime($this->input->post('date_from'))) : $this->date_from;
                $date_to = $this->input->post('date_to') ? date('Y-m-d', strtotime($this->input->post('date_to'))) : $this->date_to;
            } else {

                $date_from = '';
                $date_to = '';
            }

            $this->data['academic_year_id'] = $academic_year_id;
            $this->data['group_by'] = $group_by;
            $this->data['date_from'] = $date_from;
            $this->data['date_to'] = $date_to;

            $this->data['invoice'] = $this->report->get_invoice_report($academic_year_id, $group_by, $date_from, $date_to);
        }

        $this->data['report_url'] = site_url('report/invoice');
        $this->layout->title($this->lang->line('invoice') . ' ' . $this->lang->line('report') . ' | ' . SMS);
        $this->layout->view('invoice/index', $this->data);
    }



    /*****************Function balance**********************************
     * @type            : Function
     * @function name   : balance
     * @description     : Load balance report user interface                 
     *                    with various filtering options
     *                    and process to load balance report   
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function balance()
    {

        check_permission(VIEW);

        if ($_POST) {

            $academic_year_id = $this->input->post('academic_year_id');
            $group_by = $this->input->post('group_by');

            if ($group_by == 'daily') {
                $date_from = $this->input->post('date_from') ? date('Y-m-d', strtotime($this->input->post('date_from'))) : $this->date_from;
                $date_to = $this->input->post('date_to') ? date('Y-m-d', strtotime($this->input->post('date_to'))) : $this->date_to;
            } else {

                $date_from = '';
                $date_to = '';
            }

            $this->data['academic_year_id'] = $academic_year_id;
            $this->data['group_by'] = $group_by;
            $this->data['date_from'] = $date_from;
            $this->data['date_to'] = $date_to;

            if ($academic_year_id) {
                $this->data['academic_year'] = $this->db->get_where('academic_years', array('id' => $academic_year_id))->row()->session_year;
            }

            if ($group_by == 'daily') {
                $this->data['balance'] = $this->_get_daily_balance_data($date_from, $date_to);
            } else {
                $this->data['expenditure'] = $this->report->get_expenditure_report($academic_year_id, $group_by, $date_from, $date_to);
                $this->data['income'] = $this->report->get_income_report($academic_year_id, $group_by, $date_from, $date_to);
                $this->data['balance'] = $this->_combine_balance_data($this->data['expenditure'], $this->data['income']);
            }
        }

        $this->data['report_url'] = site_url('report/balance');
        $this->layout->title($this->lang->line('balance') . ' ' . $this->lang->line('report') . ' | ' . SMS);
        $this->layout->view('balance/index', $this->data);
    }

    /*****************Function _get_daily_balance_data**********************************
     * @type            : Function
     * @function name   : _get_daily_balance_data
     * @description     : format the daily balanace report data for user friendly data presentation                
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    private function _get_daily_balance_data($date_from, $date_to)
    {

        $data = array();

        $days = date('d', strtotime($date_to));

        for ($i = 0; $i < $days; $i++) {

            $date = date('Y-m-d', strtotime($date_from . '+' . $i . ' day'));
            $data[$i]['expenditure'] = $this->report->get_expenditure_by_date($date);
            $data[$i]['income'] = $this->report->get_income_by_date($date);
            $data[$i]['group_by_field'] = date('M j, Y', strtotime($date));
        }

        return $data;
    }



    /*****************Function _combine_balance_data**********************************
     * @type            : Function
     * @function name   : _combine_balance_data
     * @description     : combined expenditure and income report data for user friendly data presentation                
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    private function _combine_balance_data($expenditure, $income)
    {
        $data = array();
        foreach ($expenditure as $obj) {
            $data[$obj->group_by_field]['expenditure'] = $obj->total_amount;
            $data[$obj->group_by_field]['group_by_field'] = $obj->group_by_field;
            if (empty($data[$obj->group_by_field]['income'])) {
                $data[$obj->group_by_field]['income'] = 0;
            }
        }
        foreach ($income as $obj) {
            $data[$obj->group_by_field]['income'] = $obj->total_amount;
            $data[$obj->group_by_field]['group_by_field'] = $obj->group_by_field;

            if (empty($data[$obj->group_by_field]['expenditure'])) {
                $data[$obj->group_by_field]['expenditure'] = 0;
            }
        }
        return $data;
    }




    /*****************Function library**********************************
     * @type            : Function
     * @function name   : library
     * @description     : Load library report user interface                 
     *                    with various filtering options
     *                    and process to load library report   
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function library()
    {

        check_permission(VIEW);

        if ($_POST) {

            $academic_year_id = $this->input->post('academic_year_id');
            $group_by = $this->input->post('group_by');

            if ($group_by == 'daily') {
                $date_from = $this->input->post('date_from') ? date('Y-m-d', strtotime($this->input->post('date_from'))) : $this->date_from;
                $date_to = $this->input->post('date_to') ? date('Y-m-d', strtotime($this->input->post('date_to'))) : $this->date_to;
            } else {

                $date_from = '';
                $date_to = '';
            }

            $this->data['academic_year_id'] = $academic_year_id;
            $this->data['group_by'] = $group_by;
            $this->data['date_from'] = $date_from;
            $this->data['date_to'] = $date_to;

            if ($academic_year_id) {
                $this->data['academic_year'] = $this->db->get_where('academic_years', array('id' => $academic_year_id))->row()->session_year;
            }

            $this->data['library'] = $this->report->get_library_report($academic_year_id, $group_by, $date_from, $date_to);
        }

        $this->data['report_url'] = site_url('report/library');
        $this->layout->title($this->lang->line('library') . ' ' . $this->lang->line('report') . ' | ' . SMS);
        $this->layout->view('library/index', $this->data);
    }



    /*****************Function sattendance**********************************
     * @type            : Function
     * @function name   : sattendance
     * @description     : Load student attendance report user interface                 
     *                    with various filtering options
     *                    and process to load student attendance report   
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function sattendance()
    {

        check_permission(VIEW);

        $this->data['month_number'] = 1;
        $session = $this->report->get_single('academic_years', array('is_running' => 1));

        if ($_POST) {

            $academic_year_id = $this->input->post('academic_year_id');
            $class_id = $this->input->post('class_id');
            $section_id = $this->input->post('section_id');
            $month = $this->input->post('month');


            $this->data['academic_year_id'] = $academic_year_id;
            $this->data['class_id'] = $class_id;
            $this->data['section_id'] = $section_id;
            $this->data['month'] = $month;
            $this->data['month_number'] = date('m', strtotime($this->data['month']));
            $session = $this->report->get_single('academic_years', array('id' => $academic_year_id));

            $this->data['students'] = $this->report->get_student_list($academic_year_id, $class_id, $section_id);

            $this->data['academic_year'] = $this->db->get_where('academic_years', array('id' => $academic_year_id))->row()->session_year;
            $this->data['class_name'] = $this->db->get_where('classes', array('id' => $class_id))->row()->name;
            $this->data['section_name'] = $this->db->get_where('sections', array('id' => $section_id))->row()->name;
        }


        $this->data['year'] = substr($session->session_year, 7);
        $this->data['days'] =  @date('t', mktime(0, 0, 0, $this->data['month_number'], 1, $this->data['year']));
        //$this->data['days'] = cal_days_in_month(CAL_GREGORIAN, $this->data['month_number'], $this->data['year']);
        $this->data['classes'] = $this->report->get_list('classes', array('status' => 1), '', '', '', 'id', 'ASC');

        $this->data['report_url'] = site_url('report/sattendance');
        $this->layout->title($this->lang->line('student') . ' ' . $this->lang->line('attendance') . ' ' . $this->lang->line('report') . ' | ' . SMS);
        $this->layout->view('sattendance/index', $this->data);
    }


    /*****************Function syattendance**********************************
     * @type            : Function
     * @function name   : syattendance
     * @description     : Load student yearly attendance report user interface                 
     *                    with various filtering options
     *                    and process to load student yearly attendance report   
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function syattendance()
    {

        check_permission(VIEW);

        if ($_POST) {

            $academic_year_id = $this->input->post('academic_year_id');
            $class_id = $this->input->post('class_id');
            $section_id = $this->input->post('section_id');
            $student_id = $this->input->post('student_id');

            $this->data['academic_year_id'] = $academic_year_id;
            $this->data['class_id'] = $class_id;
            $this->data['section_id'] = $section_id;
            $this->data['student_id'] = $student_id;

            $this->data['academic_year'] = $this->db->get_where('academic_years', array('id' => $academic_year_id))->row()->session_year;
            $this->data['class_name'] = $this->db->get_where('classes', array('id' => $class_id))->row()->name;
            $this->data['section_name'] = $this->db->get_where('sections', array('id' => $section_id))->row()->name;
            $this->data['student_name'] = $this->db->get_where('students', array('id' => $student_id))->row()->name;
        }


        $this->data['days'] = 31;

        $this->data['classes'] = $this->report->get_list('classes', array('status' => 1), '', '', '', 'id', 'ASC');

        $this->data['report_url'] = site_url('report/syattendance');
        $this->layout->title($this->lang->line('student') . ' ' . $this->lang->line('attendance') . ' ' . $this->lang->line('report') . ' | ' . SMS);
        $this->layout->view('sattendance/yearly', $this->data);
    }


    /*****************Function tattendance**********************************
     * @type            : Function
     * @function name   : tattendance
     * @description     : Load teacher attendance report user interface                 
     *                    with various filtering options
     *                    and process to load teacher attendance report   
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function tattendance()
    {

        check_permission(VIEW);

        $session = $this->report->get_single('academic_years', array('is_running' => 1));
        $this->data['month_number'] = 1;
        if ($_POST) {

            $academic_year_id = $this->input->post('academic_year_id');
            $month = $this->input->post('month');

            $this->data['academic_year_id'] = $academic_year_id;
            $this->data['month'] = $month;
            $this->data['month_number'] = date('m', strtotime($this->data['month']));
            $this->data['teachers'] = $this->report->get_list('teachers', array('status' => 1));
            $session = $this->report->get_single('academic_years', array('id' => $academic_year_id));

            $this->data['academic_year'] = $this->db->get_where('academic_years', array('id' => $academic_year_id))->row()->session_year;
        }


        $this->data['year'] = substr($session->session_year, 7);
        $this->data['days'] =  @date('t', mktime(0, 0, 0, $this->data['month_number'], 1, $this->data['year']));
        //$this->data['days'] = cal_days_in_month(CAL_GREGORIAN, $this->data['month_number'], $this->data['year']);


        $this->data['report_url'] = site_url('report/tattendance');
        $this->layout->title($this->lang->line('teacher') . ' ' . $this->lang->line('attendance') . ' ' . $this->lang->line('report') . ' | ' . SMS);
        $this->layout->view('tattendance/index', $this->data);
    }


    /*****************Function tyattendance**********************************
     * @type            : Function
     * @function name   : tyattendance
     * @description     : Load teacher yearly attendance report user interface                 
     *                    with various filtering options
     *                    and process to load teacher yearly attendance report   
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function tyattendance()
    {

        check_permission(VIEW);

        if ($_POST) {

            $academic_year_id = $this->input->post('academic_year_id');
            $teacher_id = $this->input->post('teacher_id');

            $this->data['academic_year_id'] = $academic_year_id;
            $this->data['teacher_id'] = $teacher_id;

            $this->data['academic_year'] = $this->db->get_where('academic_years', array('id' => $academic_year_id))->row()->session_year;
            $this->data['teacher_name'] = $this->db->get_where('teachers', array('id' => $teacher_id))->row()->name;;
        }

        $this->data['teachers'] = $this->report->get_list('teachers', array('status' => 1), '', '', '', 'id', 'ASC');
        $this->data['days'] = 31;

        $this->data['report_url'] = site_url('report/tyattendance');
        $this->layout->title($this->lang->line('teacher') . ' ' . $this->lang->line('attendance') . ' ' . $this->lang->line('report') . ' | ' . SMS);
        $this->layout->view('tattendance/yearly', $this->data);
    }


    /*****************Function eattendance**********************************
     * @type            : Function
     * @function name   : eattendance
     * @description     : Load Employee attendance report user interface                 
     *                    with various filtering options
     *                    and process to load Employee attendance report   
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function eattendance()
    {

        check_permission(VIEW);

        $session = $this->report->get_single('academic_years', array('is_running' => 1));
        $this->data['month_number'] = 1;
        if ($_POST) {

            $academic_year_id = $this->input->post('academic_year_id');
            $month = $this->input->post('month');

            $this->data['academic_year_id'] = $academic_year_id;
            $this->data['month'] = $month;
            $this->data['month_number'] = date('m', strtotime($this->data['month']));
            $this->data['employees'] = $this->report->get_list('employees', array('status' => 1));
            $session = $this->report->get_single('academic_years', array('id' => $academic_year_id));

            $this->data['academic_year'] = $this->db->get_where('academic_years', array('id' => $academic_year_id))->row()->session_year;
        }

        $this->data['year'] = substr($session->session_year, 7);
        $this->data['days'] =  @date('t', mktime(0, 0, 0, $this->data['month_number'], 1, $this->data['year']));
        //$this->data['days'] = cal_days_in_month(CAL_GREGORIAN, $this->data['month_number'], $this->data['year']);


        $this->data['report_url'] = site_url('report/eattendance');
        $this->layout->title($this->lang->line('employee') . ' ' . $this->lang->line('attendance') . ' ' . $this->lang->line('report') . ' | ' . SMS);
        $this->layout->view('eattendance/index', $this->data);
    }


    /*****************Function eyattendance**********************************
     * @type            : Function
     * @function name   : eyattendance
     * @description     : Load Employee yearly attendance report user interface                 
     *                    with various filtering options
     *                    and process to load Employee yearly attendance report   
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function eyattendance()
    {

        check_permission(VIEW);

        if ($_POST) {

            $academic_year_id = $this->input->post('academic_year_id');
            $employee_id = $this->input->post('employee_id');

            $this->data['academic_year_id'] = $academic_year_id;
            $this->data['employee_id'] = $employee_id;

            $this->data['academic_year'] = $this->db->get_where('academic_years', array('id' => $academic_year_id))->row()->session_year;
            $this->data['employee_name'] = $this->db->get_where('employees', array('id' => $employee_id))->row()->name;
        }

        $this->data['employees'] = $this->report->get_list('employees', array('status' => 1));
        $this->data['days'] = 31;

        $this->data['report_url'] = site_url('report/eyattendance');
        $this->layout->title($this->lang->line('employee') . ' ' . $this->lang->line('attendance') . ' ' . $this->lang->line('report') . ' | ' . SMS);
        $this->layout->view('eattendance/yearly', $this->data);
    }



    /*****************Function student**********************************
     * @type            : Function
     * @function name   : student
     * @description     : Load student report user interface                 
     *                    with various filtering options
     *                    and process to load student report   
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function student()
    {

        check_permission(VIEW);

        if ($_POST) {

            $academic_year_id = $this->input->post('academic_year_id');
            $group_by = $this->input->post('group_by');

            $this->data['academic_year_id'] = $academic_year_id;
            $this->data['group_by'] = $group_by;

            $this->data['students'] = $this->report->get_student_report($academic_year_id, $group_by);
            $this->data['students'] = $this->_get_pormatted_student_report($this->data['students']);

            if ($academic_year_id) {
                $this->data['academic_year'] = $this->db->get_where('academic_years', array('id' => $academic_year_id))->row()->session_year;
            }
        }

        $this->data['report_url'] = site_url('report/student');
        $this->layout->title($this->lang->line('student') . ' ' . $this->lang->line('report') . ' | ' . SMS);
        $this->layout->view('student/index', $this->data);
    }



    /*****************Function _get_pormatted_student_report**********************************
     * @type            : Function
     * @function name   : _get_pormatted_student_report
     * @description     : Format the student report for better representation                 
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    private function _get_pormatted_student_report($students = null)
    {

        $data = array();
        if (!empty($students)) {
            foreach ($students as $obj) {

                $male = $this->report->get_student_by_gender($obj->class_id, $obj->academic_year_id, 'male');
                $obj->male = $male ? $male : 0;
                $female = $this->report->get_student_by_gender($obj->class_id, $obj->academic_year_id, 'female');
                $obj->female = $female ? $female : 0;
                $data[] = $obj;
            }
        }

        return $data;
    }



    /*****************Function payroll**********************************
     * @type            : Function
     * @function name   : payroll
     * @description     : Load payroll report user interface                 
     *                    with various filtering options
     *                    and process to load payroll report   
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function payroll()
    {

        check_permission(VIEW);

        if ($_POST) {

            $academic_year_id = $this->input->post('academic_year_id');
            $group_by = $this->input->post('group_by');
            $month = $this->input->post('month');
            $payment_to = $this->input->post('payment_to');
            $user_id = $this->input->post('user_id');


            $this->data['academic_year_id'] = $academic_year_id;
            $this->data['group_by'] = $group_by;
            $this->data['payment_to'] = $payment_to;
            $this->data['user_id'] = $user_id;
            $this->data['month'] = $month;

            $this->data['payrolls'] = $this->report->get_payroll_report($academic_year_id, $group_by, $payment_to, $user_id, $month);

            if ($academic_year_id) {
                $this->data['academic_year'] = $this->db->get_where('academic_years', array('id' => $academic_year_id))->row()->session_year;
            }
        }

        $this->data['report_url'] = site_url('report/payroll');
        $this->layout->title($this->lang->line('payroll') . ' ' . $this->lang->line('report') . ' | ' . SMS);
        $this->layout->view('payroll/index', $this->data);
    }






    /*****************Function statement**********************************
     * @type            : Function
     * @function name   : statement
     * @description     : Load balance report user interface                 
     *                    with various filtering options
     *                    and process to load balance report   
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function statement()
    {

        check_permission(VIEW);

        if ($_POST) {

            $date_from = $this->input->post('date_from') ? date('Y-m-d', strtotime($this->input->post('date_from'))) : $this->date_from;
            $date_to = $this->input->post('date_to') ? date('Y-m-d', strtotime($this->input->post('date_to'))) : $this->date_to;

            $this->data['date_from'] = $date_from;
            $this->data['date_to'] = $date_to;

            $this->data['statement'] = $this->_get_daily_actbalance_data($date_from, $date_to);
        }

        $this->data['report_url'] = site_url('report/statement');
        $this->layout->title($this->lang->line('statement') . ' ' . $this->lang->line('report') . ' | ' . SMS);
        $this->layout->view('balance/statement', $this->data);
    }

    /*****************Function _get_daily_actbalance_data**********************************
     * @type            : Function
     * @function name   : _get_daily_actbalance_data
     * @description     : format the daily balanace report data for user friendly data presentation                
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    private function _get_daily_actbalance_data($date_from, $date_to)
    {

        $data = array();

        $start = strtotime($date_from);
        $end   = strtotime($date_to);
        $days  = ceil(abs($end - $start) / 86400) + 1;
        $j = 0;
        for ($i = 0; $i < $days; $i++) {

            $date = date('Y-m-d', strtotime($date_from . '+' . $i . ' day'));

            $expenditure = $this->report->get_debit_by_date($date);
            if (!empty($expenditure)) {

                foreach ($expenditure as $exp) {
                    $data[$j + 1]['head'] = $exp->head;
                    $data[$j + 1]['debit'] = $exp->debit;
                    $data[$j + 1]['credit'] = 0;
                    $data[$j + 1]['gross'] = $exp->debit;
                    $data[$j + 1]['tax'] = 0;
                    $data[$j + 1]['note'] = $exp->note;
                    $data[$j + 1]['date'] = $date;

                    $j++;
                }
            }

            $income = $this->report->get_credit_by_date($date);
            if (!empty($income)) {

                foreach ($income as $inc) {
                    $data[$j + 1]['head'] = $inc->head;
                    $data[$j + 1]['debit'] = 0;
                    $data[$j + 1]['credit'] = $inc->credit;
                    $data[$j + 1]['gross'] = $inc->credit;
                    $data[$j + 1]['tax'] = 0;
                    $data[$j + 1]['note'] = $inc->note;
                    $data[$j + 1]['date'] = $date;

                    $j++;
                }
            }
        }

        /*
        echo '<pre>';
        print_r($data);
        die();
        */
        return $data;
    }



    /*****************Function transaction**********************************
     * @type            : Function
     * @function name   : transaction
     * @description     : Load balance report user interface                 
     *                    with various filtering options
     *                    and process to load balance report   
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function transaction()
    {

        check_permission(VIEW);

        if ($_POST) {

            $academic_year_id = $this->input->post('academic_year_id');
            $date_from = $this->input->post('date_from') ? date('Y-m-d', strtotime($this->input->post('date_from'))) : $this->date_from;
            $date_to = $this->input->post('date_to') ? date('Y-m-d', strtotime($this->input->post('date_to'))) : $this->date_to;

            $this->data['academic_year_id'] = $academic_year_id;
            $this->data['date_from'] = $date_from;
            $this->data['date_to'] = $date_to;

            if ($academic_year_id) {
                $this->data['academic_year'] = $this->db->get_where('academic_years', array('id' => $academic_year_id))->row()->session_year;
            }
            $this->data['transaction'] = $this->report->get_transaction_report($academic_year_id, $date_from, $date_to);
        }

        $this->data['report_url'] = site_url('report/transaction');
        $this->layout->title($this->lang->line('transaction') . ' ' . $this->lang->line('report') . ' | ' . SMS);
        $this->layout->view('balance/transaction', $this->data);
    }


    /*****************Function sactivity**********************************
     * @type            : Function
     * @function name   : sactivity
     * @description     : Load balance report user interface                 
     *                    with various filtering options
     *                    and process to load balance report   
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function sactivity()
    {

        check_permission(VIEW);

        if ($_POST) {

            $academic_year_id = $this->input->post('academic_year_id');
            $class_id = $this->input->post('class_id');
            $student_id = $this->input->post('student_id');

            $this->data['academic_year_id'] = $academic_year_id;
            $this->data['student_id'] = $student_id;
            $this->data['class_id'] = $class_id;

            if ($academic_year_id) {
                $this->data['academic_year'] = $this->db->get_where('academic_years', array('id' => $academic_year_id))->row()->session_year;
            }
            $this->data['activities'] = $this->report->get_student_activity_report($academic_year_id, $class_id, $student_id);
        }

        $this->data['report_url'] = site_url('report/sactivity');
        $this->data['classes'] = $this->report->get_list('classes', array('status' => 1), '', '', '', 'id', 'ASC');
        $this->layout->title($this->lang->line('activity') . ' ' . $this->lang->line('report') . ' | ' . SMS);
        $this->layout->view('student/activity', $this->data);
    }


    /*****************Function sbalance**********************************
     * @type            : Function
     * @function name   : sbalance
     * @description     : Load sbalance report user interface                 
     *                    with various filtering options
     *                    and process to load balance report   
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function sinvoice()
    {

        check_permission(VIEW);

        if ($_POST) {

            $academic_year_id = $this->input->post('academic_year_id');
            $class_id = $this->input->post('class_id');
            $student_id = $this->input->post('student_id');

            $this->data['academic_year_id'] = $academic_year_id;
            $this->data['student_id'] = $student_id;
            $this->data['class_id'] = $class_id;

            if ($academic_year_id) {
                $this->data['academic_year'] = $this->db->get_where('academic_years', array('id' => $academic_year_id))->row()->session_year;
            }
            $this->data['sbalance'] = $this->report->get_student_invoice_report($academic_year_id, $class_id, $student_id);

            $this->data['student'] = $this->report->get_single_student($academic_year_id, $class_id, $section_id = '', $student_id);
        }

        $this->data['report_url'] = site_url('report/sinvoice');
        $this->data['classes'] = $this->report->get_list('classes', array('status' => 1), '', '', '', 'id', 'ASC');
        $this->layout->title($this->lang->line('student') . ' ' . $this->lang->line('invoice') . ' ' . $this->lang->line('report') . ' | ' . SMS);
        $this->layout->view('student/sinvoice', $this->data);
    }


    /*****************Function duefees**********************************
     * @type            : Function
     * @function name   : duefees
     * @description     : Load duefees report user interface                 
     *                    with various filtering options
     *                    and process to load balance report   
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function duefee()
    {

        check_permission(VIEW);

        if ($_POST) {

            $academic_year_id = $this->input->post('academic_year_id');
            $class_id = $this->input->post('class_id');
            $student_id = $this->input->post('student_id');

            $this->data['academic_year_id'] = $academic_year_id;
            $this->data['student_id'] = $student_id;
            $this->data['class_id'] = $class_id;

            $this->data['student'] = $this->report->get_single_student($academic_year_id, $class_id, $section_id = '', $student_id);

            $this->data['sbalance'] = $this->report->get_student_due_fee_report($academic_year_id, $class_id, $student_id);
            $this->data['class'] = $this->report->get_single('classes', array('id' => $class_id));
        }

        $this->data['report_url'] = site_url('report/duefee');
        $this->data['classes'] = $this->report->get_list('classes', array('status' => 1), '', '', '', 'id', 'ASC');
        $this->layout->title($this->lang->line('due_fee') . ' ' . $this->lang->line('invoice') . ' ' . $this->lang->line('report') . ' | ' . SMS);
        $this->layout->view('invoice/duefee', $this->data);
    }


    /*****************Function feecollection**********************************
     * @type            : Function
     * @function name   : feecollection
     * @description     : Load fee collection report user interface                 
     *                    with various filtering options
     *                    and process to load balance report   
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function feecollection()
    {

        check_permission(VIEW);

        if ($_POST) {

            $academic_year_id = $this->input->post('academic_year_id');
            $class_id = $this->input->post('class_id');
            $student_id = $this->input->post('student_id');
            $fee_type = $this->input->post('fee_type');

            $date_from = $this->input->post('date_from') ? date('Y-m-d', strtotime($this->input->post('date_from'))) : '';
            $date_to = $this->input->post('date_to') ? date('Y-m-d', strtotime($this->input->post('date_to'))) : '';

            $this->data['date_from'] = $date_from;
            $this->data['date_to'] = $date_to;
            $this->data['academic_year_id'] = $academic_year_id;
            $this->data['fee_type'] = $fee_type;
            $this->data['student_id'] = $student_id;
            $this->data['class_id'] = $class_id;

            $this->data['feecollection'] = $this->report->get_student_fee_collection_report($academic_year_id, $class_id, $student_id, $fee_type, $date_from, $date_to);
        }

        $this->data['report_url'] = site_url('report/feecollection');
        $this->data['classes'] = $this->report->get_list('classes', array('status' => 1), '', '', '', 'id', 'ASC');
        $this->data['fee_types'] = $this->report->get_list('income_heads', array('status' => 1, 'head_type !=' => 'income'), '', '', '', 'id', 'ASC');
        $this->layout->title($this->lang->line('fee') . ' ' . $this->lang->line('collection') . ' ' . $this->lang->line('report') . ' | ' . SMS);
        $this->layout->view('invoice/fee_collection', $this->data);
    }


    /*****************Function examresult**********************************
     * @type            : Function
     * @function name   : examresult
     * @description     : Load examresult report user interface                 
     *                    with various filtering options
     *                    and process to load balance report   
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function examresult()
    {

        check_permission(VIEW);

        if ($_POST) {

            $academic_year_id = $this->input->post('academic_year_id');
            $class_id = $this->input->post('class_id');
            $section_id = $this->input->post('section_id');

            $this->data['academic_year_id'] = $academic_year_id;
            $this->data['class_id'] = $class_id;
            $this->data['section_id'] = $section_id;

            $this->data['class'] = $this->db->get_where('classes', array('id' => $class_id))->row()->name;

            if ($section_id) {
                $this->data['section'] = $this->db->get_where('sections', array('id' => $section_id))->row()->name;
            }

            $this->data['academic_year'] = $this->db->get_where('academic_years', array('id' => $academic_year_id))->row()->session_year;
            $this->data['examresult'] = $this->report->get_student_examresult_report($academic_year_id, $class_id, $section_id);
        }

        $this->data['report_url'] = site_url('report/examresult');
        $this->data['classes'] = $this->report->get_list('classes', array('status' => 1), '', '', '', 'id', 'ASC');
        $this->layout->title($this->lang->line('exam') . ' ' . $this->lang->line('result') . ' ' . $this->lang->line('report') . ' | ' . SMS);
        $this->layout->view('student/exam_result', $this->data);
    }

    /*****************Function examresult**********************************
     * @type            : Function
     * @function name   : importresult
     * @description     : This function is used to import 
                         excel sheet of the result 
     * @param           : null
     * @return          : null
     * @Date            : 09-04-2021 
     * ********************************************************** */

    public function importresult()
    {
        $user_detail = $this->db->where('id', $this->session->userdata('id'))->get('users')->row();
        $session_detail =  $this->db->where('is_running', 1)->get('academic_years')->row();
        if (isset($_FILES)) {
            // Load form validation library
            $this->load->library('form_validation');
            $this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidations');
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('message', validation_errors());
            } else {

                $sessionId = $session_detail->id;
                // If file uploaded
                if (!empty($_FILES['fileURL']['name'])) {
                    // get file extension
                    $extension = pathinfo($_FILES['fileURL']['name'], PATHINFO_EXTENSION);
                    if ($extension == 'csv' || $extension == 'xlsx') {
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
                        unset($allDataInSheet[3]);
                        $subjects = $allDataInSheet[4];
                        //unset the first index which contains the details
                        array_splice($allDataInSheet, 0, 1);
                        // echo"<pre>";
                        // print_r($allDataInSheet); die;
                        //unset($allDataInSheet[0])
                        //get class name
                        $class = $allDataInSheet[1]['C'];
                        $section = $allDataInSheet[1]['D'];
                        if ($class == 1 || $class == 2) {
                            if ($user_detail->class_name == $class) {
                                $subject_Array = array('Hindi', 'English', 'Maths');
                                foreach ($allDataInSheet as $key) {
                                    $srn_no = $key['B'];
                                    if ($srn_no != '') {
                                        //check srn
                                        $query = $this->db->where('srn', $srn_no)->where('session_id', $sessionId)->get('result_students');
                                        $dob = date('d-m-Y', strtotime($key['F']));
                                        $dob = str_replace("-", "", $dob);
                                        //insert student detail
                                        $insertData['srn']         = $key['B'];
                                        $insertData['name']        = $key['E'];
                                        $insertData['dob']         = $dob;
                                        $insertData['father_name'] = $key['G'];
                                        $insertData['mother_name'] = $key['H'];
                                        $insertData['class']       = $class;
                                        $insertData['section']     = $section;
                                        $insertData['session_id']  = $sessionId;
                                        if ($query->num_rows() == 0) {
                                            $this->db->insert('result_students', $insertData);
                                            $InsertId = $this->db->insert_id();
                                        } else {
                                            $detail = $query->row();
                                            $InsertId = $detail->id;
                                            $this->db->where('id', $InsertId)->update('result_students', $insertData);
                                        }
                                        foreach ($subject_Array as $key1 => $value) {
                                            $query = $this->db->where('session_id', $sessionId)
                                                ->where('class', $class)
                                                ->where('section', $section)
                                                ->where('student_id', $InsertId)
                                                ->where('subject_name', $value)
                                                ->get('results');

                                            $insert_result['class']      = $class;
                                            $insert_result['section']    = $section;
                                            $insert_result['session_id'] = $sessionId;
                                            $insert_result['student_id'] = $InsertId;
                                            $insert_result['subject_name'] = $value;
                                            if ($key1 == 0) {
                                                $insert_result['term_one']   = $key['I'];
                                                $insert_result['term_two']   = $key['J'];
                                                $insert_result['total']      = $key['K'];
                                                $insert_result['grade']      = $key['L'];
                                            } elseif ($key1 == 1) {
                                                $insert_result['term_one']   = $key['M'];
                                                $insert_result['term_two']   = $key['N'];
                                                $insert_result['total']      = $key['O'];
                                                $insert_result['grade']      = $key['P'];
                                            } else {
                                                $insert_result['term_one']   = $key['Q'];
                                                $insert_result['term_two']   = $key['R'];
                                                $insert_result['total']      = $key['S'];
                                                $insert_result['grade']      = $key['T'];
                                            }
                                            if ($query->num_rows() == 0) {
                                                $this->db->insert('results', $insert_result);
                                            } else {
                                                $res_detail = $query->row();
                                                $this->db->where('id', $res_detail->id)->update('results', $insert_result);
                                            }
                                        }
                                    }
                                }

                                success("Class " . $class . " " . $section . " result has been imported successfully");
                                redirect('report/importresult');
                            } else {
                                error('You are not authorised teacher to upload of this class result');
                                redirect('report/importresult');
                            }
                        } elseif ($class > 2 && $class < 4) {
                            unset($allDataInSheet[0]);
                            if ($user_detail->class_name == $class) {
                                $subject_Array = array('Hindi', 'English', 'Maths', 'EVS');
                                foreach ($allDataInSheet as $key) {
                                    $srn_no = $key['B'];
                                    if ($srn_no != '') {
                                        //check srn
                                        $query = $this->db->where('srn', $srn_no)->where('session_id', $sessionId)->get('result_students');
                                        $dob = date('d-m-Y', strtotime($key['F']));
                                        $dob = str_replace("-", "", $dob);
                                        //insert student detail
                                        $insertData['srn']         = $key['B'];
                                        $insertData['name']        = $key['E'];
                                        $insertData['dob']         = $dob;
                                        $insertData['dob_main']    = $key['F'];
                                        $insertData['father_name'] = $key['G'];
                                        $insertData['mother_name'] = $key['H'];
                                        $insertData['class']       = $class;
                                        $insertData['section']     = $section;
                                        $insertData['session_id']  = $sessionId;


                                        if ($query->num_rows() == 0) {
                                            $this->db->insert('result_students', $insertData);
                                            $InsertId = $this->db->insert_id();
                                        } else {
                                            $detail = $query->row();
                                            $InsertId = $detail->id;
                                            $this->db->where('id', $InsertId)->update('result_students', $insertData);
                                        }
                                        foreach ($subject_Array as $key1 => $value) {
                                            $query = $this->db->where('session_id', $sessionId)
                                                ->where('class', $class)
                                                ->where('section', $section)
                                                ->where('student_id', $InsertId)
                                                ->where('subject_name', $value)
                                                ->get('results');

                                            $insert_result['class']      = $class;
                                            $insert_result['section']    = $section;
                                            $insert_result['session_id'] = $sessionId;
                                            $insert_result['student_id'] = $InsertId;
                                            $insert_result['subject_name'] = $value;
                                            if ($key1 == 0) {
                                                $insert_result['p_term_one']  = $key['I'];
                                                $insert_result['n_term_one']  = $key['J'];
                                                $insert_result['sa_term_one'] = $key['K'];
                                                $insert_result['term_one']    = $key['L'];
                                                $insert_result['p_term_two']  = $key['M'];
                                                $insert_result['n_term_two']  = $key['N'];
                                                $insert_result['sa_term_two'] = $key['O'];
                                                $insert_result['term_two']    = $key['P'];
                                                $insert_result['total']       = $key['Q'];
                                                $insert_result['grade']       = $key['R'];
                                            } elseif ($key1 == 1) {
                                                $insert_result['p_term_one']  = $key['S'];
                                                $insert_result['n_term_one']  = $key['T'];
                                                $insert_result['sa_term_one'] = $key['U'];
                                                $insert_result['term_one']    = $key['V'];
                                                $insert_result['p_term_two']  = $key['W'];
                                                $insert_result['n_term_two']  = $key['X'];
                                                $insert_result['sa_term_two'] = $key['Y'];
                                                $insert_result['term_two']    = $key['Z'];
                                                $insert_result['total']       = $key['AA'];
                                                $insert_result['grade']       = $key['AB'];
                                            } elseif ($key1 == 2) {
                                                $insert_result['p_term_one']  = $key['AC'];
                                                $insert_result['n_term_one']  = $key['AD'];
                                                $insert_result['sa_term_one'] = $key['AE'];
                                                $insert_result['term_one']    = $key['AF'];
                                                $insert_result['p_term_two']  = $key['AG'];
                                                $insert_result['n_term_two']  = $key['AH'];
                                                $insert_result['sa_term_two'] = $key['AI'];
                                                $insert_result['term_two']    = $key['AJ'];
                                                $insert_result['total']       = $key['AK'];
                                                $insert_result['grade']       = $key['AL'];
                                            } else {
                                                $insert_result['p_term_one']  = $key['AM'];
                                                $insert_result['n_term_one']  = $key['AN'];
                                                $insert_result['sa_term_one'] = $key['AO'];
                                                $insert_result['term_one']    = $key['AP'];
                                                $insert_result['p_term_two']  = $key['AQ'];
                                                $insert_result['n_term_two']  = $key['AR'];
                                                $insert_result['sa_term_two'] = $key['AS'];
                                                $insert_result['term_two']    = $key['AT'];
                                                $insert_result['total']       = $key['AU'];
                                                $insert_result['grade']       = $key['AV'];
                                            }
                                            if ($query->num_rows() == 0) {
                                                $this->db->insert('results', $insert_result);
                                            } else {
                                                $res_detail = $query->row();
                                                $this->db->where('id', $res_detail->id)->update('results', $insert_result);
                                            }
                                        }
                                    }
                                }

                                success("Class " . $class . " " . $section . " result has been imported successfully");
                                redirect('report/importresult');
                            }
                        } elseif ($class > 3 && $class < 10) {
                            $sub1 = $subjects['I'];
                            $sub2 = $subjects['N'];
                            $sub3 = $subjects['S'];
                            $sub4 = $subjects['X'];
                            $sub5 = $subjects['AC'];
                            $sub6 = $subjects['AH'];
                            unset($allDataInSheet[0]);
                            if ($user_detail->class_name == $class) {
                                $subject_Array = array($sub1, $sub2, $sub3, $sub4, $sub5, $sub6);

                                //   $subject_Array = array('English','Hindi','Maths','Science','Social Science','Optional');
                                foreach ($allDataInSheet as $key) {
                                    $srn_no = $key['B'];
                                    if ($srn_no != '') {
                                        //check srn
                                        $query = $this->db->where('srn', $srn_no)->where('session_id', $sessionId)->get('result_students');
                                        $dob = date('d-m-Y', strtotime($key['F']));
                                        $dob = str_replace("-", "", $dob);
                                        //insert student detail
                                        $insertData['srn']         = $key['B'];
                                        $insertData['name']        = $key['E'];
                                        $insertData['dob']         = $dob;
                                        $insertData['dob_main']    = $key['F'];
                                        $insertData['father_name'] = $key['G'];
                                        $insertData['mother_name'] = $key['H'];
                                        $insertData['class']       = $class;
                                        $insertData['section']     = $section;
                                        $insertData['session_id']  = $sessionId;
                                        $insertData['remarks']     = $key['AO'];
                                        $insertData['result_status'] = $key['AP'];
                                        $insertData['health_activity']  = $key['AQ'];
                                        $insertData['work_exp']         = $key['AR'];
                                        $insertData['general_study']    = $key['AS'];
                                        $insertData['discipline']       = $key['AT'];
                                        if ($query->num_rows() == 0) {
                                            $this->db->insert('result_students', $insertData);
                                            $InsertId = $this->db->insert_id();
                                        } else {
                                            $detail = $query->row();
                                            $InsertId = $detail->id;
                                            $this->db->where('id', $InsertId)->update('result_students', $insertData);
                                        }
                                        foreach ($subject_Array as $key1 => $value) {

                                            $SubjectCodes = explode(' ', $value);
                                            $subjectName = isset($SubjectCodes[0]) ? $SubjectCodes[0] : '';
                                            $subjectCode = isset($SubjectCodes[1]) ? $SubjectCodes[1] : '';
                                            $SubCode = preg_replace("/[^0-9]/", "",  $subjectCode);

                                            $query = $this->db->where('session_id', $sessionId)
                                                ->where('class', $class)
                                                ->where('section', $section)
                                                ->where('student_id', $InsertId)
                                                ->where('subject_name', $subjectName)
                                                ->get('results');

                                            $insert_result['class']      = $class;
                                            $insert_result['section']    = $section;
                                            $insert_result['session_id'] = $sessionId;
                                            $insert_result['student_id'] = $InsertId;

                                            if ($key1 == 0) {
                                                $insert_result['subject_name'] = $subjectName;
                                                $insert_result['subject_code'] = $SubCode;
                                                $insert_result['term_one']      = $key['I'];
                                                $insert_result['term_two']      = $key['J'];
                                                $insert_result['th_term_total'] = $key['K'];
                                                $insert_result['in_term_total'] = $key['L'];
                                                $insert_result['total']         = $key['M'];
                                                // $insert_result['remarks']       = $key['AO'];
                                                // $insert_result['result_status'] = $key['AP'];
                                                $insert_result['optional_status'] = 1;
                                            } elseif ($key1 == 1) {
                                                $insert_result['subject_name'] = $subjectName;
                                                $insert_result['subject_code'] = $SubCode;
                                                $insert_result['term_one']      = $key['N'];
                                                $insert_result['term_two']      = $key['O'];
                                                $insert_result['th_term_total'] = $key['P'];
                                                $insert_result['in_term_total'] = $key['Q'];
                                                $insert_result['total']         = $key['R'];
                                                $insert_result['optional_status'] = 1;
                                            } elseif ($key1 == 2) {
                                                $insert_result['subject_name'] = $subjectName;
                                                $insert_result['subject_code'] = $SubCode;
                                                $insert_result['term_one']      = $key['S'];
                                                $insert_result['term_two']      = $key['T'];
                                                $insert_result['th_term_total'] = $key['U'];
                                                $insert_result['in_term_total'] = $key['V'];
                                                $insert_result['total']         = $key['W'];
                                                $insert_result['optional_status'] = 1;
                                            } elseif ($key1 == 3) {
                                                $insert_result['subject_name'] = $subjectName;
                                                $insert_result['subject_code'] = $SubCode;
                                                $insert_result['term_one']      = $key['X'];
                                                $insert_result['term_two']      = $key['Y'];
                                                $insert_result['th_term_total'] = $key['Z'];
                                                $insert_result['in_term_total'] = $key['AA'];
                                                $insert_result['total']         = $key['AB'];
                                                $insert_result['optional_status'] = 1;
                                            } elseif ($key1 == 4) {
                                                $insert_result['subject_name'] = $subjectName;
                                                $insert_result['subject_code'] = $SubCode;
                                                $insert_result['term_one']      = $key['AC'];
                                                $insert_result['term_two']      = $key['AD'];
                                                $insert_result['th_term_total'] = $key['AE'];
                                                $insert_result['in_term_total'] = $key['AF'];
                                                $insert_result['total']         = $key['AG'];
                                                $insert_result['optional_status'] = 1;
                                            } elseif ($key1 == 5) {

                                                $SubjectCodes = explode(' ', $key['AH']);
                                                $subjectName = isset($SubjectCodes[0]) ? $SubjectCodes[0] : '';
                                                $subjectCode = isset($SubjectCodes[1]) ? $SubjectCodes[1] : '';
                                                $SubCode = preg_replace("/[^0-9]/", "",  $subjectCode);

                                                $query = $this->db->where('session_id', $sessionId)
                                                    ->where('class', $class)
                                                    ->where('section', $section)
                                                    ->where('student_id', $InsertId)
                                                    ->where('subject_name', $subjectName)
                                                    ->get('results');
                                                $insert_result['subject_name']  = $subjectName;
                                                $insert_result['subject_code']  = $SubCode;
                                                $insert_result['term_one']      = $key['AI'];
                                                $insert_result['term_two']      = $key['AJ'];
                                                $insert_result['th_term_total'] = $key['AK'];
                                                $insert_result['in_term_total'] = $key['AL'];
                                                $insert_result['optional_status'] = 0;
                                                $insert_result['total']         = $key['AM'];
                                            }

                                            if ($query->num_rows() == 0) {

                                                $this->db->insert('results', $insert_result);
                                            } else {
                                                $res_detail = $query->row();

                                                $this->db->where('id', $res_detail->id)->update('results', $insert_result);
                                            }
                                        }
                                    }
                                }

                                success("Class " . $class . " " . $section . " result has been imported successfully");
                                redirect('report/importresult');
                            }
                        } elseif ($class == 11) {
                            // print_r($allDataInSheet[4]); die;
                            $sub1 = $subjects['I'];
                            $sub2 = $subjects['N'];
                            $sub3 = $subjects['S'];
                            $sub4 = $subjects['X'];
                            $sub5 = $subjects['AC'];
                            unset($allDataInSheet[0]);
                            if ($user_detail->class_name == $class) {
                                $explode_section = explode('-', $section);
                                $subject_Array = array($sub1, $sub2, $sub3, $sub4, $sub5);
                                foreach ($allDataInSheet as $key) {
                                    $srn_no = $key['B'];
                                    if ($srn_no != '') {
                                        //check srn
                                        $query = $this->db->where('srn', $srn_no)->where('session_id', $sessionId)->get('result_students');
                                        $dob = date('d-m-Y', strtotime($key['F']));
                                        $dob = str_replace("-", "", $dob);
                                        //insert student detail
                                        $insertData['srn']         = $key['B'];
                                        $insertData['name']        = $key['E'];
                                        $insertData['dob']         = $dob;
                                        $insertData['dob_main']    = $key['F'];
                                        $insertData['father_name'] = $key['G'];
                                        $insertData['mother_name'] = $key['H'];
                                        $insertData['class']       = $class;
                                        $insertData['section']     = $section;
                                        $insertData['session_id']  = $sessionId;
                                        if ($explode_section[0] == 'Medical' || $explode_section[0] == 'NonMedical') {
                                            $insertData['remarks'] = $key['AJ'];
                                            $insertData['result_status'] = $key['AK'];
                                            $insertData['health_activity']  = $key['AL'];
                                            $insertData['work_exp']         = $key['AM'];
                                            $insertData['general_study']    = $key['AN'];
                                            $insertData['discipline']       = $key['AO'];
                                        } elseif ($explode_section[0] == 'Commerce') {
                                            $insertData['remarks'] = $key['AK'];
                                            $insertData['result_status'] = $key['AL'];
                                            $insertData['health_activity']  = $key['AM'];
                                            $insertData['work_exp']         = $key['AN'];
                                            $insertData['general_study']    = $key['AO'];
                                            $insertData['discipline']       = $key['AP'];
                                        } else {
                                            $insertData['remarks'] = $key['AL'];
                                            $insertData['result_status'] = $key['AM'];
                                            $insertData['health_activity']  = $key['AN'];
                                            $insertData['work_exp']         = $key['AO'];
                                            $insertData['general_study']    = $key['AP'];
                                            $insertData['discipline']       = $key['AQ'];
                                        }
                                        if ($query->num_rows() == 0) {
                                            $this->db->insert('result_students', $insertData);
                                            $InsertId = $this->db->insert_id();
                                        } else {
                                            $detail = $query->row();
                                            $InsertId = $detail->id;
                                            $this->db->where('id', $InsertId)->update('result_students', $insertData);
                                        }
                                        if ($explode_section[0] == 'Medical' || $explode_section[0] == 'NonMedical') {
                                            
                                            
                                            foreach ($subject_Array as $key1 => $value) {
                                               
                                                    $SubjectCodes = explode(' ', $value);
                                                    $subjectName = isset($SubjectCodes[0]) ? $SubjectCodes[0] : '';
                                                    $subjectCode = isset($SubjectCodes[2]) ? $SubjectCodes[2] : '';
                                                    $SubCode = preg_replace("/[^0-9]/", "",  $subjectCode);
                                                
                                                $query = $this->db->where('session_id', $sessionId)
                                                    ->where('class', $class)
                                                    ->where('section', $section)
                                                    ->where('student_id', $InsertId)
                                                    ->where('subject_name', $subjectName)
                                                    ->get('results');

                                                $insert_result['class']      = $class;
                                                $insert_result['section']    = $section;
                                                $insert_result['session_id'] = $sessionId;
                                                $insert_result['student_id'] = $InsertId;
                                                $insert_result['subject_name'] = $subjectName;
                                                $insert_result['subject_code'] = $SubCode;
                                                if ($key1 == 0) {
                                                    $insert_result['term_one']      = $key['I'];
                                                    $insert_result['term_two']      = $key['J'];
                                                    $insert_result['th_term_total'] = $key['K'];
                                                    $insert_result['in_term_total'] = $key['L'];
                                                    $insert_result['total']         = $key['M'];
                                                    $insert_result['optional_status'] = 1;
                                                } elseif ($key1 == 1) {
                                                    $insert_result['term_one']      = $key['N'];
                                                    $insert_result['term_two']      = $key['O'];
                                                    $insert_result['th_term_total'] = $key['P'];
                                                    $insert_result['in_term_total'] = $key['Q'];
                                                    $insert_result['total']         = $key['R'];
                                                    $insert_result['optional_status'] = 1;
                                                } elseif ($key1 == 2) {
                                                    $insert_result['term_one']      = $key['S'];
                                                    $insert_result['term_two']      = $key['T'];
                                                    $insert_result['th_term_total'] = $key['U'];
                                                    $insert_result['in_term_total'] = $key['V'];
                                                    $insert_result['total']         = $key['W'];
                                                    $insert_result['optional_status'] = 1;
                                                } elseif ($key1 == 3) {
                                                    $insert_result['term_one']      = $key['X'];
                                                    $insert_result['term_two']      = $key['Y'];
                                                    $insert_result['th_term_total'] = $key['Z'];
                                                    $insert_result['in_term_total'] = $key['AA'];
                                                    $insert_result['total']         = $key['AB'];
                                                    $insert_result['optional_status'] = 1;
                                                } else {
                                                    
                                                    $SCodes = explode(' ', $key['AC']);
                                                    $sName = isset($SCodes[0]) ? $SCodes[0] : '';
                                                    $sCode = isset($SCodes[1]) ? $SCodes[1] : '';
                                                    $SubCode = preg_replace("/[^0-9]/", "",  $sCode);
                                                    
                                                    $query = $this->db->where('session_id', $sessionId)
                                                        ->where('class', $class)
                                                        ->where('section', $section)
                                                        ->where('student_id', $InsertId)
                                                        ->where('subject_name', $key['AC'])
                                                        ->get('results');
                                                        
                                                    $insert_result['subject_name']  = $sName;
                                                    $insert_result['subject_code']  = $SubCode;
                                                    $insert_result['term_one']      = $key['AD'];
                                                    $insert_result['term_two']      = $key['AE'];
                                                    $insert_result['th_term_total'] = $key['AF'];
                                                    $insert_result['in_term_total'] = $key['AG'];
                                                    $insert_result['total']         = $key['AH'];
                                                    $insert_result['optional_status'] = 0;
                                                }
                                                if ($query->num_rows() == 0) {
                                                    $this->db->insert('results', $insert_result);
                                                } else {
                                                    $res_detail = $query->row();
                                                     $this->db->where('id', $res_detail->id)->update('results', $insert_result);
                                                }
                                            }
                                            
                                            
                                        } elseif ($explode_section[0] == 'Arts') {

                                            $sub1 = $subjects['I'];
                                            $sub2 = $subjects['N'];
                                            $sub3 = $subjects['S'];
                                            $sub4 = $subjects['Y'];
                                            $sub5 = $subjects['AE'];
                                            $subject_Array = array($sub1, $sub2, $sub3, $sub4, $sub5);
                                            foreach ($subject_Array as $key1 => $value) {

                                                $SubjectCodes = explode(' ', $value);
                                                $subjectName = isset($SubjectCodes[0]) ? $SubjectCodes[0] : '';
                                                $subjectCode = isset($SubjectCodes[2]) ? $SubjectCodes[2] : '';
                                                $SubCode = preg_replace("/[^0-9]/", "",  $subjectCode);

                                                $query = $this->db->where('session_id', $sessionId)
                                                    ->where('class', $class)
                                                    ->where('section', $section)
                                                    ->where('student_id', $InsertId)
                                                    ->where('subject_name', $subjectName)
                                                    ->get('results');

                                                $insert_result['class']      = $class;
                                                $insert_result['section']    = $section;
                                                $insert_result['session_id'] = $sessionId;
                                                $insert_result['student_id'] = $InsertId;

                                                if ($key1 == 0) {
                                                    $insert_result['subject_name'] = $subjectName;
                                                    $insert_result['subject_code'] = $SubCode;
                                                    $insert_result['term_one']      = $key['I'];
                                                    $insert_result['term_two']      = $key['J'];
                                                    $insert_result['th_term_total'] = $key['K'];
                                                    $insert_result['in_term_total'] = $key['L'];
                                                    $insert_result['total']         = $key['M'];
                                                    $insert_result['optional_status'] = 1;
                                                } elseif ($key1 == 1) {
                                                    
                                                     $SCodes = explode(' ', $key['N']);
                                                    $sName = isset($SCodes[0]) ? $SCodes[0] : '';
                                                    $sCode = isset($SCodes[1]) ? $SCodes[1] : '';
                                                    $SubCode = preg_replace("/[^0-9]/", "",  $sCode);

                                                    if($user_detail->fixed_subject == 1)
                                                    {
                                                        $query = $this->db->where('session_id', $sessionId)
                                                            ->where('class', $class)
                                                            ->where('section', $section)
                                                            ->where('student_id', $InsertId)
                                                            ->where('subject_name', $sName)
                                                            ->get('results');
                                                        $insert_result['subject_name']  = $sName;
                                                        $insert_result['subject_code']  = $SubCode;
                                                        $insert_result['term_one']      = $key['O'];
                                                    
                                                        $insert_result['term_two']      = $key['O'];
                                                        $insert_result['th_term_total'] = $key['P'];
                                                        $insert_result['in_term_total'] = $key['Q'];
                                                        $insert_result['total']         = $key['R'];
                                                        $insert_result['optional_status'] = 1;

                                                    } else {

                                                        $insert_result['subject_name']  = $subjectName;
                                                        $insert_result['subject_code']  = $SubCode;
                                                        $insert_result['term_one']      = $key['N'];

                                                        $insert_result['term_two']      = $key['O'];
                                                        $insert_result['th_term_total'] = $key['P'];
                                                        $insert_result['in_term_total'] = $key['Q'];
                                                        $insert_result['total']         = $key['R'];
                                                        $insert_result['optional_status'] = 1;
                                                    }

                                                } elseif ($key1 == 2) {

                                                    $SCodes = explode(' ', $key['S']);
                                                    $sName = isset($SCodes[0]) ? $SCodes[0] : '';
                                                    $sCode = isset($SCodes[1]) ? $SCodes[1] : '';
                                                    $SubCode = preg_replace("/[^0-9]/", "",  $sCode);

                                                    $query = $this->db->where('session_id', $sessionId)
                                                        ->where('class', $class)
                                                        ->where('section', $section)
                                                        ->where('student_id', $InsertId)
                                                        ->where('subject_name', $sName)
                                                        ->get('results');
                                                    $insert_result['subject_name']  = $sName;
                                                    $insert_result['subject_code']  = $SubCode;
                                                    $insert_result['term_one']      = $key['T'];
                                                    $insert_result['term_two']      = $key['U'];
                                                    $insert_result['th_term_total'] = $key['V'];
                                                    $insert_result['in_term_total'] = $key['W'];
                                                    $insert_result['total']         = $key['X'];
                                                    $insert_result['optional_status'] = 1;
                                                } elseif ($key1 == 3) {

                                                    $SCodes = explode(' ', $key['Y']);
                                                    $sName = isset($SCodes[0]) ? $SCodes[0] : '';
                                                    $sCode = isset($SCodes[1]) ? $SCodes[1] : '';
                                                    $SubCode = preg_replace("/[^0-9]/", "",  $sCode);

                                                    $query = $this->db->where('session_id', $sessionId)
                                                        ->where('class', $class)
                                                        ->where('section', $section)
                                                        ->where('student_id', $InsertId)
                                                        ->where('subject_name', $sName)
                                                        ->get('results');
                                                    $insert_result['subject_name']  = $sName;
                                                    $insert_result['subject_code']  = $SubCode;
                                                    $insert_result['term_one']      = $key['Z'];
                                                    $insert_result['term_two']      = $key['AA'];
                                                    $insert_result['th_term_total'] = $key['AB'];
                                                    $insert_result['in_term_total'] = $key['AC'];
                                                    $insert_result['total']         = $key['AD'];
                                                    $insert_result['optional_status'] = 1;
                                                } else {

                                                    $SCodes = explode(' ', $key['AE']);
                                                    $sName = isset($SCodes[0]) ? $SCodes[0] : '';
                                                    $sCode = isset($SCodes[1]) ? $SCodes[1] : '';
                                                    $SubCode = preg_replace("/[^0-9]/", "",  $sCode);

                                                    $query = $this->db->where('session_id', $sessionId)
                                                        ->where('class', $class)
                                                        ->where('section', $section)
                                                        ->where('student_id', $InsertId)
                                                        ->where('subject_name', $sName)
                                                        ->get('results');
                                                    $insert_result['subject_name']  = $sName;
                                                    $insert_result['subject_code']  = $SubCode;
                                                    $insert_result['term_one']      = $key['AF'];
                                                    $insert_result['term_two']      = $key['AG'];
                                                    $insert_result['th_term_total'] = $key['AH'];
                                                    $insert_result['in_term_total'] = $key['AI'];
                                                    $insert_result['total']         = $key['AJ'];
                                                    $insert_result['optional_status'] = 0;
                                                }
                                                if ($query->num_rows() == 0) {
                                                    $this->db->insert('results', $insert_result);
                                                } else {
                                                    $res_detail = $query->row();
                                                    $this->db->where('id', $res_detail->id)->update('results', $insert_result);
                                                }
                                            }
                                        }
                                        if ($explode_section[0] == 'Commerce') {

                                            $sub1 = $subjects['I'];
                                            $sub2 = $subjects['N'];
                                            $sub3 = $subjects['S'];
                                            $sub4 = $subjects['X'];
                                            $sub5 = $subjects['AD'];
                                            $subject_Array = array($sub1, $sub2, $sub3, $sub4, $sub5);

                                            foreach ($subject_Array as $key1 => $value) {

                                                $SubjectCodes = explode(' ', $value);
                                                $subjectName = isset($SubjectCodes[0]) ? $SubjectCodes[0] : '';
                                                $subjectCode = isset($SubjectCodes[2]) ? $SubjectCodes[2] : '';
                                                $SubCode = preg_replace("/[^0-9]/", "",  $subjectCode);

                                                $query = $this->db->where('session_id', $sessionId)
                                                    ->where('class', $class)
                                                    ->where('section', $section)
                                                    ->where('student_id', $InsertId)
                                                    ->where('subject_name', $subjectName)
                                                    ->get('results');

                                                $insert_result['class']      = $class;
                                                $insert_result['section']    = $section;
                                                $insert_result['session_id'] = $sessionId;
                                                $insert_result['student_id'] = $InsertId;

                                                if ($key1 == 0) {
                                                    $insert_result['subject_name'] = $subjectName;
                                                    $insert_result['subject_code'] = $SubCode;
                                                    $insert_result['term_one']      = $key['I'];
                                                    $insert_result['term_two']      = $key['J'];
                                                    $insert_result['th_term_total'] = $key['K'];
                                                    $insert_result['in_term_total'] = $key['L'];
                                                    $insert_result['total']         = $key['M'];
                                                    $insert_result['optional_status'] = 1;
                                                } elseif ($key1 == 1) {
                                                    // $insert_result['subject_name'] = $subjectName;
                                                    // $insert_result['subject_code'] = $SubCode;
                                                    // $insert_result['term_one']      = $key['N'];
                                                    // $insert_result['term_two']      = $key['O'];
                                                    // $insert_result['th_term_total'] = $key['P'];
                                                    // $insert_result['in_term_total'] = $key['Q'];
                                                    // $insert_result['total']         = $key['R'];
                                                    // $insert_result['optional_status'] = 1;

                                                   
                                                    if($user_detail->fixed_subject == 1)
                                                    {
                                                        $SCodes = explode(' ', $key['N']);
                                                        $sName = isset($SCodes[0]) ? $SCodes[0] : '';
                                                        $sCode = isset($SCodes[1]) ? $SCodes[1] : '';
                                                        $SubCode = preg_replace("/[^0-9]/", "",  $sCode);

                                                        $query = $this->db->where('session_id', $sessionId)
                                                            ->where('class', $class)
                                                            ->where('section', $section)
                                                            ->where('student_id', $InsertId)
                                                            ->where('subject_name', $sName)
                                                            ->get('results');
                                                        $insert_result['subject_name']  = $sName;
                                                        $insert_result['subject_code']  = $SubCode;
                                                        $insert_result['term_one']      = $key['O'];
                                                    
                                                        $insert_result['term_two']      = $key['O'];
                                                        $insert_result['th_term_total'] = $key['P'];
                                                        $insert_result['in_term_total'] = $key['Q'];
                                                        $insert_result['total']         = $key['R'];
                                                        $insert_result['optional_status'] = 1;

                                                    } else {

                                                        $insert_result['subject_name']  = $subjectName;
                                                        $insert_result['subject_code']  = $SubCode;
                                                        $insert_result['term_one']      = $key['N'];

                                                        $insert_result['term_two']      = $key['O'];
                                                        $insert_result['th_term_total'] = $key['P'];
                                                        $insert_result['in_term_total'] = $key['Q'];
                                                        $insert_result['total']         = $key['R'];
                                                        $insert_result['optional_status'] = 1;
                                                    }
                                                    
                                                } elseif ($key1 == 2) {
                                                    $insert_result['subject_name'] = $subjectName;
                                                    $insert_result['subject_code'] = $SubCode;
                                                    $insert_result['term_one']      = $key['S'];
                                                    $insert_result['term_two']      = $key['T'];
                                                    $insert_result['th_term_total'] = $key['U'];
                                                    $insert_result['in_term_total'] = $key['V'];
                                                    $insert_result['total']         = $key['W'];
                                                    $insert_result['optional_status'] = 1;
                                                } elseif ($key1 == 3) {

                                                    $SubjectCodes = explode(' ', $key['X']);
                                                    $subjectName = isset($SubjectCodes[0]) ? $SubjectCodes[0] : '';
                                                    $subjectCode = isset($SubjectCodes[1]) ? $SubjectCodes[1] : '';
                                                    $SubCode = preg_replace("/[^0-9]/", "",  $subjectCode);

                                                    $query = $this->db->where('session_id', $sessionId)
                                                        ->where('class', $class)
                                                        ->where('section', $section)
                                                        ->where('student_id', $InsertId)
                                                        ->where('subject_name', $subjectName)
                                                        ->get('results');
                                                    $insert_result['subject_name']  = $subjectName;
                                                    $insert_result['subject_code']  = $SubCode;
                                                    $insert_result['term_one']      = $key['Y'];
                                                    $insert_result['term_two']      = $key['Z'];
                                                    $insert_result['th_term_total'] = $key['AA'];
                                                    $insert_result['in_term_total'] = $key['AB'];
                                                    $insert_result['total']         = $key['AC'];
                                                    $insert_result['optional_status'] = 1;
                                                } else {

                                                    $SubjectCodes = explode(' ', $key['AD']);
                                                    $subjectName = isset($SubjectCodes[0]) ? $SubjectCodes[0] : '';
                                                    $subjectCode = isset($SubjectCodes[1]) ? $SubjectCodes[1] : '';
                                                    $SubCode = preg_replace("/[^0-9]/", "",  $subjectCode);

                                                    $query = $this->db->where('session_id', $sessionId)
                                                        ->where('class', $class)
                                                        ->where('section', $section)
                                                        ->where('student_id', $InsertId)
                                                        ->where('subject_name', $subjectName)
                                                        ->get('results');
                                                    $insert_result['subject_name']  = $subjectName;
                                                    $insert_result['subject_code']  = $SubCode;
                                                    $insert_result['term_one']      = $key['AE'];
                                                    $insert_result['term_two']      = $key['AF'];
                                                    $insert_result['th_term_total'] = $key['AG'];
                                                    $insert_result['in_term_total'] = $key['AH'];
                                                    $insert_result['total']         = $key['AI'];
                                                    $insert_result['optional_status'] = 0;
                                                }
                                                if ($query->num_rows() == 0) {
                                                    $this->db->insert('results', $insert_result);
                                                } else {
                                                    $res_detail = $query->row();
                                                    $this->db->where('id', $res_detail->id)->update('results', $insert_result);
                                                }
                                            }
                                        }
                                    }
                                }

                                success("Class " . $class . " " . $section . " result has been imported successfully");
                                redirect('report/importresult');
                            }
                        }
                    } else {
                        error('Wrong format uploaded');
                        redirect('report/importresult');
                    }
                }
            }
        }
        $this->data['userdetail'] = $user_detail;
        $this->data['report_url'] = site_url('report/importresult');
        $this->data['academic_year'] = $session_detail->session_year;
        $this->layout->title('Import Result');
        $this->layout->view('importresult/importresult', $this->data);
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

    public function viewstudents()
    {
        if ($this->session->userdata('role_id') == TEACHER) {
            $user_detail = $this->report->get_userdetail($this->session->userdata('id'));
            $session_detail = $this->report->is_running_session();
            $this->data['userdetail'] = $user_detail;
            $this->data['students']   = $this->report->get_student_details($user_detail->class_name, $user_detail->class_section, $session_detail->id);
            $this->data['report_url'] = site_url('report/viewstudents');
            $this->data['academic_year'] = $session_detail->session_year;
            $this->layout->title('All Students Result');
            $this->layout->view('importresult/viewstudents', $this->data);

        } else if ($this->session->userdata('role_id') == ADMIN) {
            
            $ClassDropdown = $this->report->get_all_incharge_classes();
            // $user_detail = $this->report->get_userdetail($this->session->userdata('id'));
            $session_detail = $this->report->is_running_session();
            $this->data['userdetail'] = $user_detail;
            $this->data['class_dropdown'] = $ClassDropdown;
            if (isset($_GET['class'])) {
                $explode_class = explode('#', urldecode($_GET['class']));
                $this->data['students']   = $this->report->get_student_details($explode_class[0], $explode_class[1], $session_detail->id);
            }
            $this->data['report_url'] = site_url('report/viewstudents');
            $this->data['academic_year'] = $session_detail->session_year;
            $this->layout->title('Approved/Disapproved Result');
            $this->layout->view('importresult/viewAllstudents', $this->data);
        }
    }

    public function studentresult($id)
    {
        $session_detail = $this->report->is_running_session();
        $user_detail = $this->report->get_userdetail($this->session->userdata('id'));
        $this->data['principal_detail'] = $this->db->where('role_id', 2)->get('users')->row();
        $this->data['student_info'] = $this->report->get_student_info($id);

        $this->data['student_result']   = $this->report->get_result_info($id);

        $this->data['teacher_details'] = $this->report->get_class_incharge($this->data['student_info'],$session_detail->id);
        $this->data['setting'] = $this->Setting->get_single('settings', array('status' => 1));


        $this->data['report_url'] = site_url('report/viewstudents');
        $this->data['academic_year'] = $session_detail->session_year;
        $this->data['report_year'] = $session_detail->start_year . '-' . $session_detail->end_year;
        $this->data['user_detail'] = $user_detail;
        $this->layout->title('Student Result');

        if (isset($this->data['student_info']->class)) {
            $Class = $this->data['student_info']->class;

            if ($Class == 9 || $Class == 8 || $Class == 7 || $Class == 6 || $Class == 5 || $Class == 4) {
                $this->layout->view('importresult/9/studentresult', $this->data);
            } else if ($Class == 11) {

                $Section = $this->data['student_info']->section;
                $SplitSection = explode('-', $Section);

                $this->layout->view('importresult/' . $Class . '/' . '/studentresult', $this->data);
            }
        }
    }

    public function editStudentDetails($id=null)
    {
        if ($_POST) 
        {
            $id = $this->input->post('id');

            $this->_prepare_student_validation();
            if ($this->form_validation->run() === TRUE) 
            {
                $this->validateAccessPage($id);

                $data = $_POST;
                $data['updated'] = date('Y-m-d H:i:s');

                $updated = $this->report->update('result_students', $data, array('id' => $this->input->post('id')));

                if ($updated) {
                    
                    create_log('Has been updated a Student  Details : '.$data['srn']);
                    success($this->lang->line('update_success'));
                    redirect('report/viewstudents');
                } else {
                    error($this->lang->line('update_failed'));
                    redirect('report/editStudentDetails/' . $this->input->post('id'));
                }
            } else {

                $this->session->set_flashdata('message', validation_errors());
                redirect('report/viewstudents');

            }
        }

        if ($id) 
        {
            $this->validateAccessPage($id);

            $this->data['student'] = $this->report->get_student_info($id);

            if (!$this->data['student']) {
                redirect('report/viewstudents');
            }
        }

        $user_detail = $this->report->get_userdetail($this->session->userdata('id'));
        $session_detail = $this->report->is_running_session();
        $this->data['userdetail'] = $user_detail;
        $this->data['years'] = $this->Setting->get_list('academic_years', array('status' => 1), '', '', '', 'id', 'ASC');
        $this->data['students']   = $this->report->get_student_details($user_detail->class_name, $user_detail->class_section, $session_detail->id);
        $this->data['report_url'] = site_url('report/viewstudents');
        $this->data['academic_year'] = $session_detail->session_year;

        $this->data['edit'] = TRUE;
        if (isset($this->data['student']->class)) 
        {
            $Class = $this->data['student']->class;
            $this->layout->title('All Students Result');
            $this->layout->view('importresult/viewstudents', $this->data);
        }
    }

    private function validateAccessPage($id)
    {
        $user_detail = $this->report->get_userdetail($this->session->userdata('id'));
        $student_info = $this->report->get_student_info($id);

        // principal login
        if($this->session->userdata('role_id') == 2)
        {
            return true;

        } else {

            if(isset($student_info->id))
            {
                
                if(trim($student_info->class) != trim($user_detail->class_name))
                {
                    $this->session->set_flashdata('message', 'Sorry! Your class & student class is not matched');
                    redirect('report/viewstudents');
        
                }
                
                if(trim($student_info->section) != trim($user_detail->class_section))
                {
                    $this->session->set_flashdata('message', 'Sorry! Your class section & student class section is not matched');
                    redirect('report/viewstudents');
        
                } 

                if($student_info->academic_years_id != $user_detail->session_id) 
                {
                    $this->session->set_flashdata('message', 'Sorry! You are not authorized to access this student details');
                    redirect('report/viewstudents');
        
                }
            }
        }

    }

    private function _prepare_student_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');

        $this->form_validation->set_rules('srn', 'SRN', 'trim|required');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('father_name', 'Father Name', 'trim|required');
        $this->form_validation->set_rules('mother_name', 'Mother Name', 'trim|required');
        $this->form_validation->set_rules('dob_main', $this->lang->line('birth_date'), 'trim|required');
        $this->form_validation->set_rules('health_activity', 'Health Activity', 'trim|required');
        $this->form_validation->set_rules('work_exp', 'Work Experience', 'trim|required');
        $this->form_validation->set_rules('general_study', 'General Study', 'trim|required');
        $this->form_validation->set_rules('discipline', 'Discipline', 'trim|required');
    }


    public function viewStudentResultDetails($id)
    {

        $user_detail = $this->report->get_userdetail($this->session->userdata('id'));

        $this->data['principal_detail'] = $this->db->where('role_id', 2)->get('users')->row();
        $student_info = $this->report->get_student_info($id);
        $this->data['student_info'] = $student_info;


        if(isset($student_info->id))
        {
                $this->validateAccessPage($id);

                $this->data['student_result']   = $this->report->get_result_info($id);

                $this->data['teacher_details'] = $this->report->get_class_incharge($student_info,$student_info->session_id);
                $this->data['setting'] = $this->Setting->get_single('settings', array('status' => 1));
                $session_detail = $this->report->get_single('academic_years', array('id' => $student_info->session_id));


                $this->data['report_url'] = site_url('report/viewstudents');
                $this->data['academic_year'] = $session_detail->session_year;
                $this->data['announce_date'] = $session_detail->note;
                $this->data['report_year'] = $session_detail->start_year . '-' . $session_detail->end_year;
                $this->data['user_detail'] = $user_detail;
                $this->data['style'] = 'width: 50%;margin: 0px auto;';

                $this->layout->title('Student Result');

                $Class = $this->data['student_info']->class;

                if ($Class == 9 || $Class == 8 || $Class == 7 || $Class == 6) {
                    
                    echo $this->load->view('downloadresult/9/studentresult', $this->data, true);
                    
                }  else if ($Class == 5 || $Class == 4) {
                    
                    echo $this->load->view('downloadresult/9/studentresult_primary', $this->data, true);

                } else if ($Class == 11) {

                    $Section = $this->data['student_info']->section;
                    $SplitSection = explode('-', $Section);

                    echo  $this->load->view('downloadresult/' . $Class . '/studentresult', $this->data, true);
                }

        } else {


            $this->session->set_flashdata('message', 'Sorry! details are not found');
            redirect('report/viewstudents');

        }

    }


    public function DownloadReport($id)
    {
        $this->validateAccessPage($id);

        $user_detail = $this->report->get_userdetail($this->session->userdata('id'));
        $this->data['principal_detail'] = $this->db->where('role_id', 2)->get('users')->row();
        $student_info = $this->report->get_student_info($id);
        $this->data['student_info'] = $student_info;


        $this->data['student_result']   = $this->report->get_result_info($id);
        $this->data['setting'] = $this->Setting->get_single('settings', array('status' => 1));
        $session_detail = $this->report->get_single('academic_years', array('id' => $student_info->session_id));


        $this->data['report_url'] = site_url('report/viewstudents');
        $this->data['academic_year'] = $session_detail->session_year;
        $this->data['teacher_details'] = $this->report->get_class_incharge($student_info,$student_info->session_id);
        $this->data['announce_date'] = $session_detail->note;
        $this->data['report_year'] = $session_detail->start_year . '-' . $session_detail->end_year;
        $this->data['user_detail'] = $user_detail;
        $this->data['style'] = '';
        $this->layout->title('Student Result');

        if (isset($this->data['student_info']->class)) 
        {
            $Class = $this->data['student_info']->class;

            if ($Class == 9 || $Class == 8 || $Class == 7 || $Class == 6) {
                $html = $this->load->view('downloadresult/9/studentresult', $this->data, true);
                
            }  else if ($Class == 5 || $Class == 4) {
                
                $html = $this->load->view('downloadresult/9/studentresult_primary', $this->data, true);

            } else if ($Class == 11) {

                $Section = $this->data['student_info']->section;
                $SplitSection = explode('-', $Section);

                $html = $this->load->view('downloadresult/' . $Class . '/studentresult', $this->data, true);
            }
        }

        // Load pdf library
        $this->load->library('pdf');

        // Load HTML content
        $this->dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('A4', 'potrait');

        // Render the HTML as PDF
        $this->dompdf->render();

        // Output the generated PDF (1 = download and 0 = preview)
        // 		$this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
        $pdfname = time() . ".pdf";
        $this->dompdf->stream("Result_report.pdf", array("Attachment" => 0));
        // $pdf = $this->dompdf->output();
        $file_location = FCPATH . "uploads/aforms/" . $pdfname;
        file_put_contents($file_location, $pdf);
    }

    public function update_subject_marks()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');

        $this->form_validation->set_rules('type', 'Type', 'trim|required');
        $this->form_validation->set_rules('id', 'ID', 'trim|required');

        if ($this->form_validation->run() === TRUE) 
            {

                $SubjectMarks = $this->report->get_single('results', array('id' => $this->input->post('id')));

                if(isset($SubjectMarks->id))
                {

                        if($this->input->post('type') == 'in_term_total')
                        {
                            $TotalMarks = $this->input->post('value') + $SubjectMarks->th_term_total;

                        } else {

                            $TotalMarks = $this->input->post('value') + $SubjectMarks->in_term_total;

                        }


                        $data[$this->input->post('type')] = $this->input->post('value'); 
                        $data['total']                    = $TotalMarks;
                        $data['updated'] = date('Y-m-d H:i:s');

                        $updated = $this->report->update('results', $data, array('id' => $this->input->post('id')));

                        if ($updated) 
                        {
                            echo json_encode(['status'=>true,"message"=>'Updated result marks']);

                        } else {
                            
                            echo json_encode(['status'=>false,"message"=>'Result marks not updated']);

                        }

                 } else {

                            echo json_encode(['status'=>false,"message"=>'Result marks not updated. Due to some error!']);
                }
            } else {

                echo json_encode(['status'=>false,"message"=>validation_errors()]);

            }
        

    }


    public function save_result_status()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $student_ids = $this->input->post('student_ids');

            if (isset($student_ids) && !empty($student_ids)) {
                $status_code = $this->input->post('status_code');
                $student_status = $this->input->post('student_status');
                $status = $status_code == 1 ? 'Approved' : 'Disapproved';
                foreach ($student_ids as $key => $value) {
                    if (isset($student_status[$value])) {
                        $update['status'] = $status_code;
                    } else {
                        $update['status'] = 1;
                    }
                    $this->db->where('id', $value)->update('result_students', $update);
                }
                success("result has been " . $status . " successfully");
                redirect('report/viewstudents');
            } else {

                error('Sorry! Please select any student from any class');
                redirect('report/viewstudents');
            }
        } else {
            error('Wrong method! Please put post method');
            redirect('report/viewstudents');
        }
    }

    /*****************Function delete**********************************
    * @type            : Function
    * @function name   : delete
    * @description     : delete "Teacher" data from database                  
    *                    also unlink teacher profile photo & resume from server   
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function deleteStudent($id = null) 
    {

        // check_permission(DELETE);

        if(!is_numeric($id)){
             error($this->lang->line('unexpected_error'));
             redirect('report/viewstudents');       
        }
        
        $StudentResult = $this->report->get_single('result_students', array('id' => $id));
        if (!empty($StudentResult)) 
        {
            $this->validateAccessPage($id);

            // delete student data
            $this->report->delete('result_students', array('id' => $id));

            // delete student result data
            $this->report->delete('results', array('student_id' => $id));

            create_log('Has been deleted a Result of student : '.$StudentResult->srn);
            success($this->lang->line('delete_success'));
        } else {
            error($this->lang->line('delete_failed'));
        }
        redirect('report/viewstudents');
    }

    public function delete_all_students()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: white;">', '</div>');

        $this->form_validation->set_rules('status_code', 'Please select bulk delete', 'trim|required');
        $this->form_validation->set_rules('student_ids[]', 'Please select any student', 'trim|required');

        if ($this->form_validation->run() === TRUE) 
            {
                $studentIds = array_keys($_POST['student_ids']);

                for($i=0;$i<count($studentIds);$i++)
                {
                        // delete student data
                    $this->report->delete('result_students', array('id' => $studentIds[$i]));

                    // delete student result data
                    $this->report->delete('results', array('student_id' => $studentIds[$i]));
                }
              
                create_log('Has been deleted a Result of student : '.$StudentResult->srn);
                success($this->lang->line('delete_success'));
                redirect('report/viewstudents');

            } else {

                $this->session->set_flashdata('message', validation_errors());
                redirect('report/viewstudents');

            }

    }

    public function uploadImage()
    {
        if($_POST)
        {
            $data = $this->_get_posted_student_data();

            $UpdateData['photo']   = $data['photo'];
            $UpdateData['updated'] = date('Y-m-d H:i:s');

            $updated = $this->report->update('result_students', $UpdateData, array('id' => $this->input->post('student_id')));

                if ($updated) 
                {                    
                    create_log('Has been updated photo of a Student : '.$data['srn']);
                    success($this->lang->line('update_success'));
                } else {
                    error($this->lang->line('update_failed'));
                }

                redirect('report/viewstudents/');


        }

    }

    private function _get_posted_student_data() {

        $data['srn']         = $this->input->post('srn');
        $data['class']       = $this->input->post('class');
        $data['student_id']  = $this->input->post('student_id');

        // student  photo
        if ($_FILES['photo']['name']) {
            $data['photo'] = $this->_upload_photo($this->input->post('class'),$this->input->post('srn'));
        }

        return $data;
    }

    private function _upload_photo($class,$srn) 
    {
        // $prev_photo = $this->input->post('prev_photo');
        $photo = $_FILES['photo']['name'];
        $photo_type = $_FILES['photo']['type'];
        $return_photo = '';

            if ($photo_type == 'image/jpeg' || $photo_type == 'image/pjpeg' ||
                    $photo_type == 'image/jpg' || $photo_type == 'image/png' ||
                    $photo_type == 'image/x-png') 
            {

                $destination = 'assets/uploads/student-photo/class/'.$class.'/';

                $file_type = explode(".", $photo);
                $extension = strtolower($file_type[count($file_type) - 1]);
                $photo_path = $srn.'-' . time() . '.' . $extension;

                $UploadImage = move_uploaded_file($_FILES['photo']['tmp_name'], $destination . $photo_path);

                if(!$UploadImage)
                {
                    error("Not uploaded because of error #".$_FILES["photo"]["error"]);
                    redirect('report/viewstudents/');

                }

                $this->resizeImage($class,$photo_path);

                return $photo_path;

            }
    }

    public function resizeImage($filename)
    {
             $config['image_library'] = 'gd2';
             $config['source_image'] = $_SERVER['DOCUMENT_ROOT'] .'/assets/uploads/student-photo/'.$class.'/'. $filename;
             $config['new_image'] = $_SERVER['DOCUMENT_ROOT'] .'/assets/uploads/student-photo/'.$class.'/'. $filename;
             $config['create_thumb'] = FALSE;
             $config['maintain_ratio'] = FALSE;
             $config['width']         = 152;
             $config['height']       = 152;
 
             // print_r($config); die;
             $this->load->library('image_lib', $config);
 
             if ( ! $this->image_lib->resize())
             {
                     echo $this->image_lib->display_errors();
             } 
             // $this->image_lib->clear();
     }

}
