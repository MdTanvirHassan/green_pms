<?php

/*
 * Author: fouraxiz
 * Purpose: This Controller is using for login process
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends Site_Controller {

    function __construct() {
        parent::__construct();
        if(!$this->is_logged_in($this->session->userdata('logged_in'))){
            redirect_with_msg('backend/login', 'Please Login to see this page');
        }
        $this->load->model("m_common");
        $this->setTemplateFile('template');
        $this->user_id = $this->session->userdata('user_id');
        $this->rank = $this->session->userdata('rank');
    }

    function index() {
        if (!$this->is_logged_in($this->session->userdata('logged_in'))) {
            redirect_with_msg('backend/login', 'Please Login to see this page');
        } else {
            // redirect('backend/setup');
            $this->menu = 'dashboard';
            $this->sub_menu = 'dashboard';
            $table = 'login';
            $select = 'theme';
            $this->titlebackend("Dashboard");
            $data['complete'] = $this->m_common->get_row_array('projects',array('project_status'=>'Complete','is_active' => 1),'*');
            if (!empty($data['complete'])){                
                foreach ($projects as $key => $project) {
                    $sql1 = "Select SUM(total) as total, SUM(consumption_amount) as consumption FROM department_task where  project_id= " . $project['project_id'];
                    $total_consume = $this->m_common->customeQuery($sql1);
                    $project_value = !empty($total_consume[0]['total']) ? $total_consume[0]['total'] : 0;
                    $project_consumption = !empty($total_consume[0]['consumption']) ? $total_consume[0]['consumption'] : 0;
                    $progress = round(($project_consumption * 100) / $project_value, 2);
                    $projects[$key]['progress'] = $progress;
                    $projects[$key]['total'] =$project_value;
                }
                $data['projects'] = $projects;
                
            } else {
                $projects = $this->m_common->get_row_array('projects', array('is_active' => 1), '*', '', '', 'position');
                foreach ($projects as $key => $project) {
                    $sql1 = "Select SUM(total) as total, SUM(consumption_amount) as consumption FROM department_task where project_id= " . $project['project_id'];
                    $total_consume = $this->m_common->customeQuery($sql1);
                    $project_value = !empty($total_consume[0]['total']) ? $total_consume[0]['total'] : 0;
                    $project_consumption = !empty($total_consume[0]['consumption']) ? $total_consume[0]['consumption'] : 0;
                    $progress = round(($project_consumption * 100) / $project_value, 2);
                    $projects[$key]['progress'] = $progress;
                    $projects[$key]['total'] =$project_value;
                }
                $data['projects'] = $projects;
                
            }            
                $data['incomplete'] = $this->m_common->get_row_array('projects',array('project_status'=>'Incomplete','is_active' => 1),'*');
                if (!empty($data['incomplete'])){
                    foreach ($projects as $key => $project) {
                        $sql1 = "Select SUM(total) as total, SUM(consumption_amount) as consumption FROM department_task where  project_id= " . $project['project_id'];
                        $total_consume = $this->m_common->customeQuery($sql1);
                        $project_value = !empty($total_consume[0]['total']) ? $total_consume[0]['total'] : 0;
                        $project_consumption = !empty($total_consume[0]['consumption']) ? $total_consume[0]['consumption'] : 0;
                        $progress = round(($project_consumption * 100) / $project_value, 2);
                        $projects[$key]['progress'] = $progress;
                        $projects[$key]['total'] =$project_value;
                    }
                    $data['incomplete'] = $projects;

                } else {
                    $projects = $this->m_common->get_row_array('projects', array('is_active' => 1), '*', '', '', 'position');
                    foreach ($projects as $key => $project) {
                        $sql1 = "Select SUM(total) as total, SUM(consumption_amount) as consumption FROM department_task where project_id= " . $project['project_id'];
                        $total_consume = $this->m_common->customeQuery($sql1);
                        $project_value = !empty($total_consume[0]['total']) ? $total_consume[0]['total'] : 0;
                        $project_consumption = !empty($total_consume[0]['consumption']) ? $total_consume[0]['consumption'] : 0;
                        $progress = round(($project_consumption * 100) / $project_value, 2);
                        $projects[$key]['progress'] = $progress;
                        $projects[$key]['total'] =$project_value;
                    }
                    $data['incomplete'] = $projects;

                }
            
             
            
            $this->load->view('dashboard',$data);
        }
    }
    function module_list() {
        $this->setTemplateFile('template_login');
        if (!$this->is_logged_in($this->session->userdata('logged_in'))) {
            redirect_with_msg('backend/login', 'Please Login to see this page');
        } else {
            // redirect('backend/setup');
            $this->menu = 'module_list';
            $this->sub_menu = 'module_list';
            $this->titlebackend("Module List");
            $this->load->view('module_list');
        }
    }

    public function user_activity() {
        $this->menu = 'dashboard';
        $this->sub_menu = 'user_activity';
        $postData = $this->input->post();
        if (empty($postData)) {
            $postData['start_date'] = date('Y-m-01');
            $postData['end_date'] = date('Y-m-t');
        }

        $this->data['start_date'] = !empty($_POST['start_date']) ? date('Y-m-d', strtotime($_POST['start_date'])) : date('Y-m-01'); // hard-coded '01' for first day
        $this->data['end_date'] = !empty($_POST['end_date']) ? date('Y-m-d', strtotime($_POST['end_date'])) : date('Y-m-t');


        $sql = "SELECT ul.*,u.username from user_activity ul left join users as u on ul.user_id=u.user_id where ul.date between '" . $this->data['start_date'] . "' and '" . $this->data['end_date'] . "'";

        $this->data['rows'] = $this->m_common->customeQuery($sql);
        $this->data['data'] = $postData;
        $this->load->view('report/user_activity', $this->data);
    }

    function settings() {
        $this->menu = 'settings';
        $this->sub_menu = 'settings';
        $this->titlebackend("Settings Page");
        if (!$this->is_logged_in($this->session->userdata('logged_in'))) {
            redirect_with_msg('backend/login', 'Please Login to see this page');
        } else {
            if (!empty($_POST) || !empty($_FILES)) {
                $postData = $this->input->post();
                if (!empty($postData)) {
                    foreach ($postData as $key => $data) {
                        $dbData = array();
                        $dbData['value'] = $data;
                        $exists = $this->m_common->get_row_array('setting', array('fieldoption' => $key),'*');
                        if (!empty($exists))
                            $this->m_common->update_row('setting', array('fieldoption' => $key), $dbData);
                        else {
                            $dbData['fieldoption'] = $key;
                            $this->m_common->insert_row('setting', $insertData);
                        }
                    }
                }
                if (isset($_FILES['logo']['name']) && !empty($_FILES['logo']['name'])) {
                    $filename = uploadImage('logo', 'images/');
                    $dbData = array();
                    $dbData['value'] = $filename;
                    $exists = $this->m_common->get_row_array('setting', array('fieldoption' => 'logo'),'*');
                    if (!empty($exists)) {
                        unlink('images/' . $exists[0]['value']);
                        $this->m_common->update_row('setting', array('fieldoption' => 'logo'), $dbData);
                    } else {
                        $dbData['fieldoption'] = $key;
                        $this->m_common->insert_row('setting', $insertData);
                    }
                }
                if (isset($_FILES['bg_image']['name']) && !empty($_FILES['bg_image']['name'])) {
                    $filename = uploadImage('bg_image', 'images/bg/');
                    $dbData = array();
                    $dbData['value'] = $filename;
                    $exists = $this->m_common->get_row_array('setting', array('fieldoption' => 'logo'),'*');
                    if (!empty($exists)) {
                        unlink('images/bg/' . $exists[0]['value']);
                        $this->m_common->update_row('setting', array('fieldoption' => 'bg_image'), $dbData);
                    } else {
                        $dbData['fieldoption'] = $key;
                        $this->m_common->insert_row('setting', $insertData);
                    }
                }
                redirect_with_msg(site_url('backend/dashboard/settings'), 'Settings value update successfully');
            } else {
                $settings = $this->m_common->get_row_array('setting', '', '*');
                foreach ($settings as $setting) {
                    $data[$setting['fieldoption']] = $setting['value'];
                }
                $this->load->view('v_settings', $data);
            }
        }
    }
    
    function request(){
        $this->titlebackend("Request");
        $user_id= $this->session->userdata('user_id');
        //$sql="select request.*,projects.project_name,projects.code from request left join projects on request.project_id=projects.project_id where request.request_type='incomplete' and status='pending' and request.approver_id=".$user_id;
        $sql="select p.project_name,p.package_no,p.code,d.dept_name,tsk.task_name,u.fullname, r.* from request r 
join projects p on r.project_id=p.project_id 
join department d on r.dept_id=d.dept_id
join department_task_status dts on r.request_id=dts.dept_task_status_id
join task tsk on dts.task_id=tsk.task_id join users u on r.applicant_id=u.user_id where r.approver_id=$user_id and r.status='pending'";
        $data['requests']=$this->m_common->customeQuery($sql);
        //$data['requests']=$this->m_common->get_row_array('request',array('approver_id'=>$user_id,'status'=>"pending",'request_type'=>'incomplete'),'*');
        $this->load->view('v_admin_request', $data);
        
    }
    
    function approveIncompletionRequest(){
        $this->setOutputMode(NORMAL);
        $user_id=$this->session->userdata('user_id');
        $r_id = $this->input->post('r_id');
        $project_id = $this->input->post('project_id');
        $approve_date=date('Y-m-d H:i:s');
        $response = $this->m_common->update_row('request', array('r_id' =>$r_id), array('status' => 'approved','approve_date'=>$approve_date));
        if(!empty($response)) {
            $result = $this->m_common->update_row('projects', array('project_id' =>$project_id), array('project_status' =>"Incomplete"));
        }     
        if(!empty($result)){
            $data['status'] = "success";
        }else{
            $data['status'] = "failed";
        }   
        echo json_encode($data);
    }
    
    
    function rejectIncompletionRequest(){
        $this->setOutputMode(NORMAL);
        $user_id=$this->session->userdata('user_id');
        $r_id = $this->input->post('r_id');
        $project_id = $this->input->post('project_id');
        $approve_date=date('Y-m-d H:i:s');
        $response = $this->m_common->update_row('request', array('r_id' =>$r_id), array('status' => 'rejected','approve_date'=>$approve_date));  
        if(!empty($response)){
            $data['status'] = "success";
        }else{
            $data['status'] = "failed";
        }   
        echo json_encode($data);
    }
    
   
    
    

}
