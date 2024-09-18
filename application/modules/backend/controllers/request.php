<?php

/*
 * Author: fouraxiz
 * Purpose: This Controller is using for login process
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Request extends Site_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->is_logged_in($this->session->userdata('logged_in'))) {
            redirect_with_msg('backend/login', 'Please Login to see this page');
        }
        $this->load->model("m_common");
        $this->setTemplateFile('template_new');
        $this->user_id = $this->session->userdata('user_id');
        $this->rank = $this->session->userdata('rank');
    }

    function index() {
        if (!$this->is_logged_in($this->session->userdata('logged_in'))) {
            redirect_with_msg('backend/login', 'Please Login to see this page');
        } else {
            $this->menu = 'request';
            $this->sub_menu = 'moderator_project_list';
            $this->titlebackend("Request");
            $user_id= $this->session->userdata('user_id');
//            $sql = "select p.project_name,p.package_no,p.code,d.dept_name,tsk.task_name,u.fullname, r.* from request r 
//join projects p on r.project_id=p.project_id 
//join department d on r.dept_id=d.dept_id
//join department_task_status dts on r.request_id=dts.dept_task_status_id
//join task tsk on dts.task_id=tsk.task_id join users u on r.applicant_id=u.user_id where r.approver_id=$user_id and r.status='pending'";
             $sql = "select p.project_name,p.package_no,p.code,d.dept_name,tsk.task_name,u.fullname, r.* from request r 
join projects p on r.project_id=p.project_id 
join department d on r.dept_id=d.dept_id
join department_task_status dts on r.request_id=dts.dept_task_status_id
join task tsk on dts.task_id=tsk.task_id join users u on r.applicant_id=u.user_id where (r.approver_id=$user_id and r.status='pending') or (r.applicant_id=$user_id and r.status='pending') ";
            $data['requests']= $this->m_common->customeQuery($sql);
            //$data['requests']=$this->m_common->get_row_array('request',array('approver_id'=>$user_id,'status'=>"pending"),'*');
            $this->load->view('request/v_request', $data);
        }
    }
    
    function approveResetStatus(){
        $this->setOutputMode(NORMAL);
        $user_id=$this->session->userdata('user_id');
        $status_id = $this->input->post('status_id');
        $dept_id = $this->input->post('dept_id');
        $r_id = $this->input->post('r_id');
        $insertData=array();

        $exists = $this->m_common->get_row_array('department_task_status', array('dept_task_status_id' => $status_id), '*'); 
        $task_id=$exists[0]['task_id'];
        $approve_date=date('Y-m-d H:i:s');
        $response = $this->m_common->update_row('request', array('r_id' =>$r_id), array('status' => 'approved','approve_date'=>$approve_date));
        if (!empty($response)) {
            $result = $this->m_common->update_row('department_task_status', array('dept_task_status_id' =>$status_id), array('status' => 'incomplete'));
        }
        
        if (!empty($result)) {
            $sql = "select sum(percentage) as total from department_task_status where is_active=1 and status_id IS NOT NULL and task_id= $task_id and project_id=" . $exists[0]['project_id'] . " and dept_id=" . $exists[0]['dept_id'] . "";
            $tall = $this->m_common->customeQuery($sql);
            $sql = "select sum(percentage) as total from department_task_status where is_active=1 and status_id IS NOT NULL and task_id= $task_id and status = 'complete' and project_id=" . $exists[0]['project_id'] . " and dept_id=" . $exists[0]['dept_id'] . "";
            $tcomplete = $this->m_common->customeQuery($sql);
            $t_percentage = ($tcomplete[0]['total'] * 100) / $tall[0]['total'];
            $t_percentage = empty($t_percentage) ? 0:$t_percentage;
            $sql = "update department_task set percentage=" . $t_percentage . " where project_id=" . $exists[0]['project_id'] . " and dept_id=" . $exists[0]['dept_id'] . " and task_id=" . $exists[0]['task_id'];
            $this->m_common->customeUpdate($sql);

            $parent = $this->m_common->get_row_array('task', array('task_id' => $task_id, 'is_active' => 1), '*');
            if (!empty($parent[0]['sub_task_id'])) {
                $sql = "select sum(percentage) as total from department_task_status where is_active=1 and status_id IS NOT NULL and task_id in(select GROUP_CONCAT(task_id) as task_id from task where sub_task_id=" . $parent[0]['sub_task_id'] . ") and project_id=" . $exists[0]['project_id'] . " and dept_id=" . $exists[0]['dept_id'] . "";
                $pall = $this->m_common->customeQuery($sql);
                $sql = "select sum(percentage) as total from department_task_status where is_active=1 and status_id IS NOT NULL and task_id in(select GROUP_CONCAT(task_id) as task_id from task where sub_task_id=" . $parent[0]['sub_task_id'] . ") and status = 'complete' and project_id=" . $exists[0]['project_id'] . " and dept_id=" . $exists[0]['dept_id'] . "";
                $pcomplete = $this->m_common->customeQuery($sql);
                $p_percentage = ($pcomplete[0]['total'] * 100) / $pall[0]['total'];
                $p_percentage = empty($p_percentage) ? 0:$p_percentage;
                $sql = "update department_task set percentage=" . $p_percentage . " where project_id=" . $exists[0]['project_id'] . " and dept_id=" . $exists[0]['dept_id'] . " and task_id=" . $parent[0]['sub_task_id'];
                $this->m_common->customeUpdate($sql);
            }
            if (!empty($parent[0]['parent_task_id'])) {
                $sql = "select sum(percentage) as total from department_task_status where is_active=1 and status_id IS NOT NULL and task_id in(select GROUP_CONCAT(task_id) as task_id from task where parent_task_id=" . $parent[0]['parent_task_id'] . ") and project_id=" . $exists[0]['project_id'] . " and dept_id=" . $exists[0]['dept_id'] . "";
                $pall = $this->m_common->customeQuery($sql);
                $sql = "select sum(percentage) as total from department_task_status where is_active=1 and status_id IS NOT NULL and task_id in(select GROUP_CONCAT(task_id) as task_id from task where parent_task_id=" . $parent[0]['parent_task_id'] . ") and status = 'complete' and project_id=" . $exists[0]['project_id'] . " and dept_id=" . $exists[0]['dept_id'] . "";
                $pcomplete = $this->m_common->customeQuery($sql);
                $p_percentage = ($pcomplete[0]['total'] * 100) / $pall[0]['total'];
                $p_percentage = empty($p_percentage) ? 0:$p_percentage;
                $sql = "update department_task set percentage=" . $p_percentage . " where project_id=" . $exists[0]['project_id'] . " and dept_id=" . $exists[0]['dept_id'] . " and task_id=" . $parent[0]['parent_task_id'];
                $this->m_common->customeUpdate($sql);
            }
         //   $deptall = $this->m_common->get_row_array('department_task_status', array('dept_id' => $exists[0]['dept_id'], 'project_id' => $exists[0]['project_id'], 'is_active' => 1), 'sum(percentage) as total');
           // $deptcomplete = $this->m_common->get_row_array('department_task_status', array('dept_id' => $exists[0]['dept_id'], 'project_id' => $exists[0]['project_id'], 'status' => 'complete', 'is_active' => 1), 'sum(percentage) as total');
            
            $sql = "select sum(percentage) as total from department_task_status where is_active=1 and status_id IS NOT NULL and project_id=" . $exists[0]['project_id'] . " and dept_id=" . $exists[0]['dept_id'] . "";
                $deptall = $this->m_common->customeQuery($sql);
            $sql = "select sum(percentage) as total from department_task_status where is_active=1 and status='complete' and status_id IS NOT NULL and project_id=" . $exists[0]['project_id'] . " and dept_id=" . $exists[0]['dept_id'] . "";
                $deptcomplete = $this->m_common->customeQuery($sql);
            
            $dept_percentage = ($deptcomplete[0]['total'] * 100) / $deptall[0]['total'];
            $dept_percentage = empty($dept_percentage) ? 0:$dept_percentage;
            $sql = "update department set progress=" . $dept_percentage . " where project_id=" . $exists[0]['project_id'] . " and dept_id=" . $exists[0]['dept_id'];
            $this->m_common->customeUpdate($sql);

           // $projectall = $this->m_common->get_row_array('department_task_status', array('project_id' => $exists[0]['project_id'], 'is_active' => 1), 'sum(percentage) as total');
           // $projectcomplete = $this->m_common->get_row_array('department_task_status', array('project_id' => $exists[0]['project_id'], 'status' => 'complete', 'is_active' => 1), 'sum(percentage) as total');
            
              $sql = "select sum(percentage) as total from department_task_status where is_active=1 and status_id IS NOT NULL and project_id=" . $exists[0]['project_id'] . "";
                $projectall = $this->m_common->customeQuery($sql);
            $sql = "select sum(percentage) as total from department_task_status where is_active=1 and status='complete' and status_id IS NOT NULL and project_id=" . $exists[0]['project_id'] . "";
                $projectcomplete = $this->m_common->customeQuery($sql);
            
            $project_percentage = ($projectcomplete[0]['total'] * 100) / $projectall[0]['total'];
            $project_percentage = empty($project_percentage) ? 0:$project_percentage;
            $sql = "update projects set progress=" . $project_percentage . " where project_id=" . $exists[0]['project_id'];
            $this->m_common->customeUpdate($sql);
            $this->save_user_activity(array('section' => 'Project Status', 'activity' => 'Project Status Updated', 'user_id' => $this->session->userdata('user_id'), 'date' => date('Y-m-d H:i:s')));
            $data['status'] = "success";
            
        } else {
            $data['status'] = "failed";
        }
        
        echo json_encode($data);
    }
    
    
    function rejectResetStatus(){
        $this->setOutputMode(NORMAL);
        $user_id=$this->session->userdata('user_id');
        $status_id = $this->input->post('status_id');
        $dept_id = $this->input->post('dept_id');
        $r_id = $this->input->post('r_id');
        $insertData=array();

        $exists = $this->m_common->get_row_array('department_task_status', array('dept_task_status_id' => $status_id), '*'); 
        $task_id=$exists[0]['task_id'];
        $approve_date=date('Y-m-d H:i:s');
        $response = $this->m_common->update_row('request', array('r_id' =>$r_id), array('status' => 'rejected','approve_date'=>$approve_date));
        if (!empty($response)) {
            $result = $this->m_common->update_row('department_task_status', array('dept_task_status_id' =>$status_id), array('status' =>'complete'));
        }
        if(!empty($result)){
           $data['status'] = "success"; 
        } else {
           $data['status'] = "failed";
        }
        
        echo json_encode($data);
    }
    
    function approveDeleteFile(){
        $this->setOutputMode(NORMAL);
        $user_id=$this->session->userdata('user_id');
        $file_id =$this->input->post('file_id');
        $dept_id = $this->input->post('dept_id');
        $r_id = $this->input->post('r_id');
        $task_id=$exists[0]['task_id'];
        $approve_date=date('Y-m-d H:i:s');
        $response = $this->m_common->update_row('request', array('r_id' =>$r_id), array('status' => 'approved','approve_date'=>$approve_date));
        if(!empty($response)) {
            $result = $this->m_common->update_row('task_file', array('file_id' =>$file_id), array('is_active' =>0,'is_delete'=>1));
        }     
        if(!empty($result)){
            $data['status'] = "success";
        }else{
            $data['status'] = "failed";
        }   
        echo json_encode($data);
    }
    
    function rejectDeleteFile(){
        $this->setOutputMode(NORMAL);
        $user_id=$this->session->userdata('user_id');
        $file_id = $this->input->post('file_id');
        $dept_id = $this->input->post('dept_id');
        $r_id = $this->input->post('r_id');
        $task_id=$exists[0]['task_id'];
        $approve_date=date('Y-m-d H:i:s');
        $response = $this->m_common->update_row('request', array('r_id' =>$r_id), array('status' =>'rejected','approve_date'=>$approve_date));
       
        if(!empty($response)){
            $data['status'] = "success";
        }else{
            $data['status'] = "failed";
        }   
        echo json_encode($data);
    }
    
    function userList() {  
        $this->menu = 'user_list';
      //  $this->sub_menu = 'user_list';
        $this->titlebackend("User LIst");
        $data['users'] = $this->m_common->get_row_array('users', array('is_active' => 1), '*');
        $this->load->view('request/v_user_list',$data);
    }
    

    

}

