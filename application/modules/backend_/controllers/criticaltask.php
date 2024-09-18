<?php

/*
 * Author: fouraxiz
 * Purpose: This Controller is using for login process
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Criticaltask extends Site_Controller {

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
            $this->menu = 'critical_task';
           // $this->sub_menu = 'moderator_project_list';
            $this->titlebackend("Critical Task");

            $sql = "select *,(select user_type 
from assign_user where user_id = " . $this->user_id . " and project_status='Incomplete' and is_active=1 and user_type=2 and assign_user.project_id=projects.project_id limit 1) as pm from projects where is_active=1 and project_status='Incomplete' and project_id in(select GROUP_CONCAT(project_id) from assign_user where user_id = " . $this->user_id . ' and is_active=1 group by project_id)';
            $data['projects'] = $this->m_common->customeQuery($sql);
            foreach($data['projects'] as $key=>$value){
                $department_list=array();
                $sql1="select au.*,d.dept_name from assign_user au left join department d on au.department_id=d.dept_id where au.project_id=".$value['project_id']." and user_id=".$this->user_id;
                $department_list=$this->m_common->customeQuery($sql1);
                $dept_name='';
                foreach($department_list as $d_list){
                    if(!empty($d_list['dept_name'])){
                        $dept_name.=$d_list['dept_name'].",";
                    }
                }
                $data['projects'][$key]['dept_info']=$dept_name;
            }
            // $data['projects'] = $this->m_common->get_row_array('projects', array('is_active' => 1), '*');
            $this->load->view('critical_task/v_critical_task', $data);
        }
    }

    

}
