<?php

/*
 * Author: fouraxiz
 * Purpose: This Controller is using for login process
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report extends Site_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->is_logged_in($this->session->userdata('logged_in'))) {
            redirect_with_msg('backend/login', 'Please Login to see this page');
        }
        $this->load->model("m_common");
        $this->setTemplateFile('template');
        $this->user_id = $this->session->userdata('user_id');
        $this->rank = $this->session->userdata('rank');
    }

    function index($menu, $submenu, $lnID = false) {
        $this->menu = $menu;
        $this->sub_menu = $submenu;
        $this->titlebackend("Report");
        switch ($submenu) {
            case 'projects':
                $table = 'tender';
                $view = 'projects';
                $where = "t_date";
                break;
            case 'bg_details':
                $table = 'v_bg_details';
                $view = 'bg_details';
                $where = "bg_date";
                break;
            case 'noa_details':
                $table = 'v_noa_details';
                $view = 'noa_details';
                $where = "noa_date";
                break;
            case 'security_details':
                $table = 'v_security_details';
                $view = 'security_details';
                $where = "s_date";
                break;
            case 'agreement_details':
                $table = 'v_agreement_details';
                $view = 'agreement_details';
                $where = "ag_date";
                break;
            case 'work_order':
                $table = 'v_work_order';
                $view = 'work_order';
                $where = "w_date";
                break;
            case 'assigned_bank':
                $table = 'v_assigned_bank';
                $view = 'assigned_bank';
                $where = "ab_date";
                break;
            case 'loan_details':
                $table = 'v_loan_details';
                $view = 'loan_details';
                $where = "l_date";
                break;
            case 'loan_used':
                $table = 'loan_used';
                $view = 'loan_used';
                $where = "lu_date";
                break;
            case 'bill_register':
            case 'payment_received':
            case 'deduction':
            case 'security_money':
                $table = 'v_bill';
                $view = 'bill_register';
                $where = "b_date";
                break;
        }


        $postData = $this->input->post();
        if (!empty($postData)) {

            $startDate = $_POST['startDate'];
            $endDate = $_POST['endDate'];
            $data['startDate'] = $startDate;
            $data['endDate'] = $endDate;
            if ($submenu == 'loan_used' || $submenu == 'bank_info')
                $where.=" between '" . $startDate . "' and '" . $endDate . "'";
            else
                $where.=" between '" . $startDate . "' and '" . $endDate . "' and t_status='" . ucfirst($menu) . "'";

            $sql = "select * from $table where $where";
            $data['data'] = $this->m_common->customeQuery($sql);

            $data['controller'] = $this;
            $data['lnID'] = $lnID;

            $this->load->view('report/' . $view, $data);
        } else {
            $date = date('Y-m');
            $lastDay = date("t", strtotime($date));
            $startDate = $date . '-' . '01';
            $endDate = $date . '-' . $lastDay;
            $data['startDate'] = $startDate;
            $data['endDate'] = $endDate;
            $data['controller'] = $this;
            $data['lnID'] = $lnID;
            $this->load->view('report/' . $view, $data);
        }
    }

    function calculateTransitLoss($pdId, $qty) {
        $res = $this->m_common->get_row_array('products', array('pd_id' => $pdId), '*');
        $transitLoss = $res[0]['pd_transit_loss'];
        $allowAble = ($qty * $transitLoss) / 100;
        return ceil($allowAble);
    }

    function calculateFreight($row) {
        $res = $this->m_common->get_row_array('p2pr', array('pd_id' => $row['pd_id'], 't_id' => $row['t_id'], 'p2p_id' => $row['p2p']), '*');
        return $res[0]['rent'];
    }

    function changeCompany() {
        $this->setOutputMode(NORMAL);
        $id = $this->input->post('id');
        $data = $this->m_common->get_row_array('tanker', array('c_id' => $id), '*');
        if (!empty($data)) {
            echo json_encode(array('msg' => 'success', 'data' => $data));
        } else {
            echo json_encode(array('msg' => 'failed'));
        }
    }
    
    
    function dailyChk(){
        $this->menu = 'report';
        $this->sub_menu = 'daily_cheque_register';
        $this->titlebackend("DAILY CHEQUE REGISTER");
        $data['companys'] = $this->m_common->get_row_array('company','','*');
        $data['data'] = $this->m_common->get_row_array('v_assignchk','','*');
        $table = 'v_assignchk';
        $postData = $this->input->post();
        if (!empty($postData)) {

            $startDate = date('Y-m-d', strtotime($_POST['startDate']));
            $endDate =date('Y-m-d', strtotime($_POST['endDate']));
            $company = $_POST['company'];
           $data['startDate'] = $startDate;
           $data['endDate'] = $endDate;
          
//            $where.=" between '" . $startDate . "' and '" . $endDate . "' and t_status='" . ucfirst($menu) . "'";
    if(!empty($company)){
        $sql = "select * from $table where c_name= '".$company."' and chk_date between '" . $startDate . "' and '" . $endDate . "'";
    }  else {
        $sql = "select * from $table where chk_date between '" . $startDate . "' and '" . $endDate . "'"; 
    }
         
           $data['data'] = $this->m_common->customeQuery($sql);

            $this->load->view('report/daily_chk_reg', $data);
        }  else {
            
            $date = date('Y-m');
            $lastDay = date("t", strtotime($date));
            $startDate = $date . '-' . '01';
            $endDate = $date . '-' . $lastDay;
            $data['startDate'] = $startDate;
            $data['endDate'] = $endDate;
            $this->load->view('report/daily_chk_reg',$data);
        }
        
        
        
    }
    
//    function useable_cheque(){
//        $this->menu = 'report';
//        $this->sub_menu = 'useable_cheque';
//        $this->titlebackend("DAILY CHEQUE REGISTER");
//        
//        
//        $date = date('Y-m');
//            $lastDay = date("t", strtotime($date));
//            $startDate = $date . '-' . '01';
//            $endDate = $date . '-' . $lastDay;
//            $data['startDate'] = $startDate;
//            $data['endDate'] = $endDate;
//        $this->load->view('report/useable_cheque',$data);
//        
//    }
    
    function listOfBg(){
        $this->menu = 'report';
        $this->sub_menu = 'bg_list';
        $this->titlebackend("DAILY CHEQUE REGISTER");
        $data['data'] = $this->m_common->get_row_array('v_bg_details','','*');
        $data['banks'] = $this->m_common->get_row_array('bank','','*');
        $table = 'v_bg_details';
        $postData = $this->input->post();
        if (!empty($postData)) {

            $startDate = date('Y-m-d', strtotime($_POST['startDate']));
            $endDate =date('Y-m-d', strtotime($_POST['endDate']));
            $bank = $_POST['bank'];
           $data['startDate'] = $startDate;
           $data['endDate'] = $endDate;
          
//            $where.=" between '" . $startDate . "' and '" . $endDate . "' and t_status='" . ucfirst($menu) . "'";
    if(!empty($bank)){
        $sql = "select * from $table where bank_name= '".$bank."' and bg_date between '" . $startDate . "' and '" . $endDate . "'";
    }  else {
        $sql = "select * from $table where bg_date between '" . $startDate . "' and '" . $endDate . "'"; 
    }
         
           $data['data'] = $this->m_common->customeQuery($sql);
            $this->load->view('report/bg_list',$data);
        }  else {
        $date = date('Y-m');
            $lastDay = date("t", strtotime($date));
            $startDate = $date . '-' . '01';
            $endDate = $date . '-' . $lastDay;
            $data['startDate'] = $startDate;
            $data['endDate'] = $endDate;
        $this->load->view('report/bg_list',$data);
        
    }
    }
    
    
    function listOfPg(){
        $this->menu = 'report';
        $this->sub_menu = 'pg_list';
        $this->titlebackend("DAILY CHEQUE REGISTER");
        $data['data'] = $this->m_common->get_row_array('v_noa_details','','*');
        $data['banks'] = $this->m_common->get_row_array('bank','','*');
        $table = 'v_noa_details';
        $postData = $this->input->post();
        if (!empty($postData)) {

            $startDate = date('Y-m-d', strtotime($_POST['startDate']));
            $endDate =date('Y-m-d', strtotime($_POST['endDate']));
            $bank = $_POST['bank'];
           $data['startDate'] = $startDate;
           $data['endDate'] = $endDate;
          
//            $where.=" between '" . $startDate . "' and '" . $endDate . "' and t_status='" . ucfirst($menu) . "'";
    if(!empty($bank)){
        $sql = "select * from $table where bank_name= '".$bank."' and noa_date between '" . $startDate . "' and '" . $endDate . "'";
    }  else {
        $sql = "select * from $table where noa_date between '" . $startDate . "' and '" . $endDate . "'"; 
    }
         
           $data['data'] = $this->m_common->customeQuery($sql);
            $this->load->view('report/pg_list',$data);
        }  else {
        $date = date('Y-m');
            $lastDay = date("t", strtotime($date));
            $startDate = $date . '-' . '01';
            $endDate = $date . '-' . $lastDay;
            $data['startDate'] = $startDate;
            $data['endDate'] = $endDate;
        $this->load->view('report/pg_list',$data);
        
    }
    }
    
    function listof_projects(){
        $this->menu = 'report';
        $this->sub_menu = 'projects_list';
        $this->titlebackend("List of on going projects");
        $data['data'] = $this->m_common->get_row_array('tender','','*');
        
        $table = 'tender';
        $postData = $this->input->post();
        if (!empty($postData)) {

            $startDate = date('Y-m-d', strtotime($_POST['startDate']));
            $endDate =date('Y-m-d', strtotime($_POST['endDate']));
            $status = $_POST['status'];
           $data['startDate'] = $startDate;
           $data['endDate'] = $endDate;
          
//            $where.=" between '" . $startDate . "' and '" . $endDate . "' and t_status='" . ucfirst($menu) . "'";
    if(!empty($bank)){
        $sql = "select * from $table where t_status= '".$status."' and t_date between '" . $startDate . "' and '" . $endDate . "'";
    }  else {
        $sql = "select * from $table where t_date between '" . $startDate . "' and '" . $endDate . "'"; 
    }
         
           $data['data'] = $this->m_common->customeQuery($sql);
            $this->load->view('report/list_of_projects',$data);
        }else{
        $date = date('Y-m');
            $lastDay = date("t", strtotime($date));
            $startDate = $date . '-' . '01';
            $endDate = $date . '-' . $lastDay;
            $data['startDate'] = $startDate;
            $data['endDate'] = $endDate;
        $this->load->view('report/list_of_projects',$data);
        
    }
    }
    
    function statement_report(){
        $this->menu = 'report';
        $this->sub_menu = 'pay_to_wise';
        $this->titlebackend("DAILY CHEQUE REGISTER");
        $data['companys'] = $this->m_common->get_row_array('company','','*');
        $data['data'] = $this->m_common->get_row_array('v_assignchk',array('status'=>'Completed'),'*');
        $table = 'v_assignchk';
        $postData = $this->input->post();
        if (!empty($postData)) {

            $startDate = date('Y-m-d', strtotime($_POST['startDate']));
            $endDate =date('Y-m-d', strtotime($_POST['endDate']));
            $company = $_POST['company'];
           $data['startDate'] = $startDate;
           $data['endDate'] = $endDate;
          
//            $where.=" between '" . $startDate . "' and '" . $endDate . "' and t_status='" . ucfirst($menu) . "'";
    if(!empty($company)){
        $sql = "select * from $table where c_name= '".$company."' and chk_date between '" . $startDate . "' and '" . $endDate . "'";
    }  else {
        $sql = "select * from $table where issued_date between '" . $startDate . "' and '" . $endDate . "'"; 
    }
         
           $data['data'] = $this->m_common->customeQuery($sql);

            $this->load->view('report/statement_report', $data);
        }  else {
            
            $date = date('Y-m');
            $lastDay = date("t", strtotime($date));
            $startDate = $date . '-' . '01';
            $endDate = $date . '-' . $lastDay;
            $data['startDate'] = $startDate;
            $data['endDate'] = $endDate;
            $this->load->view('report/statement_report',$data);
        }
        
        
        
    }
    
    
    

}
