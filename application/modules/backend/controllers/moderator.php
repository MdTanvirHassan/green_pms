<?php

/*
 * Author: fouraxiz
 * Purpose: This Controller is using for login process
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Moderator extends Site_Controller {

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
            $this->menu = 'moderator';
            $this->sub_menu = 'moderator_project_list';
            $this->titlebackend("Moderator");

            $sql = "select projects.*,pt.type as ptype,(select user_type 
from assign_user where user_id = " . $this->user_id . " and project_status='Incomplete' and is_active=1 and user_type=2 and assign_user.project_id=projects.project_id limit 1) as pm from projects 
JOIN  project_type pt ON projects.type=pt.type_id
where projects.is_active=1 and project_status='Incomplete' and project_id in(select GROUP_CONCAT(project_id) from assign_user where user_id = " . $this->user_id . ' and is_active=1 group by project_id)';
            $data['projects'] = $this->m_common->customeQuery($sql);
            // $data['projects'] = $this->m_common->get_row_array('projects', array('is_active' => 1), '*');
            $this->load->view('moderator/v_moderator', $data);
        }
    }

    function completed_project() {
        if (!$this->is_logged_in($this->session->userdata('logged_in'))) {
            redirect_with_msg('backend/login', 'Please Login to see this page');
        } else {
            $this->menu = 'completed_project';
            $this->sub_menu = 'completed_project';
            $this->titlebackend("Completed Project");

            //$sql = "select * from projects where is_active=1 and project_status='Complete' and project_id in(select GROUP_CONCAT(project_id) from assign_user where user_id = " . $this->user_id . ' and is_active=1 group by project_id)';
            $sql = "select *,(select user_type 
            from assign_user where user_id = " . $this->user_id . " and project_status='Complete' and is_active=1 and user_type=2 and assign_user.project_id=projects.project_id limit 1) as pm from projects where is_active=1 and project_status='Complete'";
            $data['projects'] = $this->m_common->customeQuery($sql);

            // $data['projects'] = $this->m_common->get_row_array('projects', array('is_active' => 1), '*');
            $this->load->view('moderator/v_completed', $data);
        }
    }

    function get_dept_task_list() {
        $this->setOutputMode(NORMAL);
        $user_id = $this->session->userdata('user_id');
        $dept_id = $this->input->post('dept_id');
        $project_id = $this->input->post('project_id');
        $sql = "select user_type from assign_user where is_active=1 and project_id=" . $project_id . " and user_id=" . $user_id . " and department_id=" . $dept_id;
        $user_roles = $this->m_common->customeQuery($sql);
        if (!empty($user_roles)) {
            foreach ($user_roles as $user_role) {
                $u_role[] = $user_role['user_type'];
            }
        } else {
            $u_role[] = 0;
        }
        $data['user_roles'] = implode(',', $u_role);

        if (!empty($dept_id) && !empty($project_id)) {
            $sql = "select t.*,dt.start_date,dt.end_date,dt.moderator,u.username from task t 
left join department_task dt on dt.task_id=t.task_id 
left join users u on u.user_id=dt.moderator where t.project_id=$project_id and dt.dept_id=$dept_id and t.is_active=1";
            $data['data'] = $this->m_common->customeQuery($sql);
            $data['depertment_info'] = $this->m_common->get_row_array('department', array('dept_id' => $dept_id, 'is_active' => 1), '*');
            // $data['tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'parent_task_id' => null, 'sub_task_id' => null, 'is_active' => 1), '*');
            $parent_task_sql = "select task.*,dt.start_date,dt.end_date from task join department_task dt on task.task_id=dt.task_id where dt.project_id=" . $project_id . " and dt.dept_id=" . $dept_id . " and task.parent_task_id is null and task.sub_task_id is null order by position asc";
            // echo $parent_task_sql;exit;
            $data['tasks'] = $this->m_common->customeQuery($parent_task_sql);
            foreach ($data['tasks'] as $key => $value) {

                $e_t = $this->m_common->get_row_array('department_task', array('task_id' => $value['task_id'], 'dept_id' => $dept_id, 'project_id' => $project_id), 'percentage');
                $data['tasks'][$key]['percentage'] = !empty($e_t) ? round($e_t[0]['percentage'], 2) : 0;
                // $data['tasks'][$key]['sub_tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'parent_task_id' => $value['task_id'], 'sub_task_id' => null, 'is_active' => 1), '*');
                $sub_task_sql = "select task.*,dt.start_date,dt.end_date from task join department_task dt on task.task_id=dt.task_id where dt.project_id=" . $project_id . " and dt.dept_id=" . $dept_id . " and task.parent_task_id=" . $value['task_id'] . " and task.sub_task_id is null";
                $data['tasks'][$key]['sub_tasks'] = $this->m_common->customeQuery($sub_task_sql);
                if (!empty($data['tasks'][$key]['sub_tasks'])) {

                    foreach ($data['tasks'][$key]['sub_tasks'] as $key1 => $value1) {
                        $e_t_s = $this->m_common->get_row_array('department_task', array('task_id' => $value1['task_id'], 'dept_id' => $dept_id, 'project_id' => $project_id), 'percentage');
                        $data['tasks'][$key]['sub_tasks'][$key1]['percentage'] = !empty($e_t_s) ? round($e_t_s[0]['percentage'], 2) : 0;
                        //$data['tasks'][$key]['sub_tasks'][$key1]['sub_sub_tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'sub_task_id' => $value1['task_id'], 'is_active' => 1), '*');
                        $sub_sub_task_sql = "select task.*,dt.start_date,dt.end_date from task join department_task dt on task.task_id=dt.task_id where dt.project_id=" . $project_id . " and dt.dept_id=" . $dept_id . " and task.sub_task_id=" . $value1['task_id'];
                        $data['tasks'][$key]['sub_tasks'][$key1]['sub_sub_tasks'] = $this->m_common->customeQuery($sub_sub_task_sql);
                        foreach ($data['tasks'][$key]['sub_tasks'][$key1]['sub_sub_tasks'] as $key2 => $value2) {
                            $e_t_s_s = $this->m_common->get_row_array('department_task', array('task_id' => $value2['task_id'], 'dept_id' => $dept_id, 'project_id' => $project_id), 'percentage');
                            $data['tasks'][$key]['sub_tasks'][$key1]['sub_sub_tasks'][$key2]['percentage'] = !empty($e_t_s_s) ? round($e_t_s_s[0]['percentage'], 2) : 0;
                        }
                    }
                }
            }
            $data['status'] = "success";
            echo json_encode($data);
        } else {
            $data['status'] = "failed";
            echo json_encode($data);
        }
    }

    function get_dept_task_list_23_01_2019() {
        $this->setOutputMode(NORMAL);
        $user_id = $this->session->userdata('user_id');
        $dept_id = $this->input->post('dept_id');
        $project_id = $this->input->post('project_id');
        $sql = "select user_type from assign_user where is_active=1 and project_id=" . $project_id . " and user_id=" . $user_id . " and department_id=" . $dept_id;
        $user_roles = $this->m_common->customeQuery($sql);
        if (!empty($user_roles)) {
            foreach ($user_roles as $user_role) {
                $u_role[] = $user_role['user_type'];
            }
        } else {
            $u_role[] = 0;
        }
        $data['user_roles'] = implode(',', $u_role);

        if (!empty($dept_id) && !empty($project_id)) {
            $sql = "select t.*,dt.start_date,dt.end_date,dt.moderator,u.username from task t 
left join department_task dt on dt.task_id=t.task_id 
left join users u on u.user_id=dt.moderator where t.project_id=$project_id and dt.dept_id=$dept_id and t.is_active=1";
            $data['data'] = $this->m_common->customeQuery($sql);
            $data['depertment_info'] = $this->m_common->get_row_array('department', array('dept_id' => $dept_id, 'is_active' => 1), '*');
            $data['tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'parent_task_id' => null, 'sub_task_id' => null, 'is_active' => 1), '*', '', '', 'position', 'asc');
            foreach ($data['tasks'] as $key => $value) {

                $e_t = $this->m_common->get_row_array('department_task', array('task_id' => $value['task_id'], 'dept_id' => $dept_id, 'project_id' => $project_id), 'percentage');
                $data['tasks'][$key]['percentage'] = !empty($e_t) ? round($e_t[0]['percentage'], 2) : 0;
                $data['tasks'][$key]['sub_tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'parent_task_id' => $value['task_id'], 'sub_task_id' => null, 'is_active' => 1), '*');
                if (!empty($data['tasks'][$key]['sub_tasks'])) {

                    foreach ($data['tasks'][$key]['sub_tasks'] as $key1 => $value1) {
                        $e_t_s = $this->m_common->get_row_array('department_task', array('task_id' => $value1['task_id'], 'dept_id' => $dept_id, 'project_id' => $project_id), 'percentage');
                        $data['tasks'][$key]['sub_tasks'][$key1]['percentage'] = !empty($e_t_s) ? round($e_t_s[0]['percentage'], 2) : 0;
                        $data['tasks'][$key]['sub_tasks'][$key1]['sub_sub_tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'sub_task_id' => $value1['task_id'], 'is_active' => 1), '*');
                        foreach ($data['tasks'][$key]['sub_tasks'][$key1]['sub_sub_tasks'] as $key2 => $value2) {
                            $e_t_s_s = $this->m_common->get_row_array('department_task', array('task_id' => $value2['task_id'], 'dept_id' => $dept_id, 'project_id' => $project_id), 'percentage');
                            $data['tasks'][$key]['sub_tasks'][$key1]['sub_sub_tasks'][$key2]['percentage'] = !empty($e_t_s_s) ? round($e_t_s_s[0]['percentage'], 2) : 0;
                        }
                    }
                }
            }
            $data['status'] = "success";
            echo json_encode($data);
        } else {
            $data['status'] = "failed";
            echo json_encode($data);
        }
    }

    function taskViewDetails() {
        $this->setOutputMode(NORMAL);
        $task_id = $this->input->post('task_id');
        $dept_id = $this->input->post('dept_id');
        $data['tasks'] = $this->m_common->get_row_array('task', array('task_id' => $task_id, 'is_active' => 1), '*', '', '', 'position', 'asc');
        if (empty($data['tasks'][0]['parent_task_id']) && empty($data['tasks'][0]['sub_task_id'])) {
            foreach ($data['tasks'] as $key => $value) {
                $e_t = $this->m_common->get_row_array('department_task', array('task_id' => $value['task_id'], 'dept_id' => $dept_id, 'project_id' => $value['project_id']), 'percentage');
                $data['tasks'][$key]['percentage'] = !empty($e_t) ? round($e_t[0]['percentage'], 2) : 0;
                $data['tasks'][$key]['sub_tasks'] = $this->m_common->get_row_array('task', array('parent_task_id' => $value['task_id'], 'sub_task_id' => null, 'is_active' => 1), '*');
                if (!empty($data['tasks'][$key]['sub_tasks'])) {
                    foreach ($data['tasks'][$key]['sub_tasks'] as $key1 => $value1) {
                        $e_t_s = $this->m_common->get_row_array('department_task', array('task_id' => $value1['task_id'], 'dept_id' => $dept_id, 'project_id' => $value1['project_id']), 'percentage');
                        $data['tasks'][$key]['sub_tasks'][$key1]['percentage'] = !empty($e_t_s) ? round($e_t_s[0]['percentage'], 2) : 0;
                        $data['tasks'][$key]['sub_tasks'][$key1]['sub_sub_tasks'] = $this->m_common->get_row_array('task', array('sub_task_id' => $value1['task_id'], 'is_active' => 1), '*');
                        foreach ($data['tasks'][$key]['sub_tasks'][$key1]['sub_sub_tasks'] as $key2 => $value2) {
                            $e_t_s_s = $this->m_common->get_row_array('department_task', array('task_id' => $value2['task_id'], 'dept_id' => $dept_id, 'project_id' => $value2['project_id']), 'percentage');
                            $data['tasks'][$key]['sub_tasks'][$key1]['sub_sub_tasks'][$key2]['percentage'] = !empty($e_t_s_s) ? round($e_t_s_s[0]['percentage'], 2) : 0;
                        }
                    }
                }
            }
        } else {
            $data['tasks'] = $this->m_common->get_row_array('task', array('task_id' => $data['tasks'][0]['parent_task_id'], 'is_active' => 1), '*', '', '', 'position', 'asc');
            foreach ($data['tasks'] as $key => $value) {
                $e_t = $this->m_common->get_row_array('department_task', array('task_id' => $value['task_id'], 'dept_id' => $dept_id, 'project_id' => $value['project_id']), 'percentage');
                $data['tasks'][$key]['percentage'] = !empty($e_t) ? round($e_t[0]['percentage'], 2) : 0;
                $data['tasks'][$key]['sub_tasks'] = $this->m_common->get_row_array('task', array('parent_task_id' => $value['task_id'], 'sub_task_id' => null, 'is_active' => 1), '*');
                if (!empty($data['tasks'][$key]['sub_tasks'])) {
                    foreach ($data['tasks'][$key]['sub_tasks'] as $key1 => $value1) {
                        $e_t_s = $this->m_common->get_row_array('department_task', array('task_id' => $value1['task_id'], 'dept_id' => $dept_id, 'project_id' => $value1['project_id']), 'percentage');
                        $data['tasks'][$key]['sub_tasks'][$key1]['percentage'] = !empty($e_t_s) ? round($e_t_s[0]['percentage'], 2) : 0;
                        $data['tasks'][$key]['sub_tasks'][$key1]['sub_sub_tasks'] = $this->m_common->get_row_array('task', array('sub_task_id' => $value1['task_id'], 'is_active' => 1), '*');
                        foreach ($data['tasks'][$key]['sub_tasks'][$key1]['sub_sub_tasks'] as $key2 => $value2) {
                            $e_t_s_s = $this->m_common->get_row_array('department_task', array('task_id' => $value2['task_id'], 'dept_id' => $dept_id, 'project_id' => $value2['project_id']), 'percentage');
                            $data['tasks'][$key]['sub_tasks'][$key1]['sub_sub_tasks'][$key2]['percentage'] = !empty($e_t_s_s) ? round($e_t_s_s[0]['percentage'], 2) : 0;
                        }
                    }
                }
            }
        }

        echo json_encode($data);
    }

    function taskDetailsInfo() {
        $this->setOutputMode(NORMAL);
        $task_id = $this->input->post('task_id');
        $dept_id = $this->input->post('dept_id');
        $task = $this->m_common->get_row_array('task', array('task_id' => $task_id, 'is_active' => 1), '*', '', '', 'position', 'asc');
        $data['task_information'] = $task;
        if (empty($task[0]['parent_task_id']) && empty($task[0]['sub_task_id'])) {

            //$sql = "select dts.*,ps.status_name from department_task_status dts left join project_status ps on dts.status_id=ps.status_id where dts.is_active=1 and dts.task_id=" . $task_id;
            $sql = "select dts.*,ps.status_name from department_task_status dts left join project_status ps on dts.status_id=ps.status_id where dts.is_active=1 and dts.task_id=" . $task_id . " and dts.dept_id=" . $dept_id;
            $data['task_status'] = $this->m_common->customeQuery($sql);
            // $data['task_remarks'] = $this->m_common->get_row_array('task_comment', array('task_id' => $task_id, 'is_active' => 1), '*');
            $data['task_remarks'] = $this->m_common->get_row_array('task_comment', array('task_id' => $task_id, 'dept_id' => $dept_id, 'is_active' => 1), '*');
            $more_task = $this->m_common->get_row_array('task', array('parent_task_id' => $task_id, 'is_active' => 1), '*');
            if (!empty($more_task)) {
                //$data['task_files'] = $this->m_common->get_row_array('task_file', array('parent_task_id' => $task_id, 'is_active' => 1), '*');
                $data['task_files'] = $this->m_common->get_row_array('task_file', array('parent_task_id' => $task_id, 'dept_id' => $dept_id, 'is_active' => 1), '*');
                $data['root_task'] = '';
            } else {
                $data['task_files'] = $this->m_common->get_row_array('task_file', array('task_id' => $task_id, 'dept_id' => $dept_id, 'is_active' => 1), '*');
                $data['root_task'] = 'yes';
            }
        } else if (!empty($task[0]['parent_task_id']) && empty($task[0]['sub_task_id'])) {

            //$sql = "select dts.*,ps.status_name from department_task_status dts left join project_status ps on dts.status_id=ps.status_id where dts.is_active=1 and dts.task_id=" . $task_id;
            $sql = "select dts.*,ps.status_name from department_task_status dts left join project_status ps on dts.status_id=ps.status_id where dts.is_active=1 and dts.task_id=" . $task_id . " and dts.dept_id=" . $dept_id;
            $data['task_status'] = $this->m_common->customeQuery($sql);
            //$data['task_remarks'] = $this->m_common->get_row_array('task_comment', array('task_id' => $task_id, 'is_active' => 1), '*');
            $data['task_remarks'] = $this->m_common->get_row_array('task_comment', array('task_id' => $task_id, 'dept_id' => $dept_id, 'is_active' => 1), '*');
            $more_task = $this->m_common->get_row_array('task', array('sub_task_id' => $task_id, 'is_active' => 1), '*');
            if (!empty($more_task)) {
                $data['task_files'] = $this->m_common->get_row_array('task_file', array('sub_task_id' => $task_id, 'dept_id' => $dept_id, 'is_active' => 1), '*');
                $data['root_task'] = '';
            } else {
                $data['task_files'] = $this->m_common->get_row_array('task_file', array('task_id' => $task_id, 'dept_id' => $dept_id, 'is_active' => 1), '*');
                $data['root_task'] = 'yes';
            }
        } else if (!empty($task[0]['parent_task_id']) && !empty($task[0]['sub_task_id'])) {
            $data['task_files'] = $this->m_common->get_row_array('task_file', array('task_id' => $task_id, 'dept_id' => $dept_id, 'is_active' => 1), '*');
            //$sql = "select dts.*,ps.status_name from department_task_status dts left join project_status ps on dts.status_id=ps.status_id where dts.is_active=1 and dts.task_id=" . $task_id;
            $sql = "select dts.*,ps.status_name from department_task_status dts left join project_status ps on dts.status_id=ps.status_id where dts.is_active=1 and dts.task_id=" . $task_id . " and dts.dept_id=" . $dept_id;
            $data['task_status'] = $this->m_common->customeQuery($sql);
            //$data['task_remarks'] = $this->m_common->get_row_array('task_comment', array('task_id' => $task_id, 'is_active' => 1), '*');
            $data['task_remarks'] = $this->m_common->get_row_array('task_comment', array('task_id' => $task_id, 'dept_id' => $dept_id, 'is_active' => 1), '*');
            $data['root_task'] = 'yes';
        }


        echo json_encode($data);
    }

    function deptTaskDetailsStatus() {
        $this->setOutputMode(NORMAL);
        $task_id = $this->input->post('task_id');
        $dept_id = $this->input->post('dept_id');
        $data['task_information'] = $this->m_common->get_row_array('task', array('task_id' => $task_id, 'is_active' => 1), '*');
        $sql = "select dts.*,ps.status_name from department_task_status dts left join project_status ps on dts.status_id=ps.status_id where dts.is_active=1 and dts.task_id=" . $task_id . " and dts.dept_id=" . $dept_id;
        $data['task_status'] = $this->m_common->customeQuery($sql);
        echo json_encode($data);
    }

    function deptTaskDetailsFile() {
        $this->setOutputMode(NORMAL);
        $task_id = $this->input->post('task_id');
        $dept_id = $this->input->post('dept_id');
        $data['task_information'] = $this->m_common->get_row_array('task', array('task_id' => $task_id, 'is_active' => 1), '*');
        //$data['task_files'] = $this->m_common->get_row_array('task_file', array('task_id' => $task_id, 'is_active' => 1), '*');
        $data['task_files'] = $this->m_common->get_row_array('task_file', array('task_id' => $task_id, 'dept_id' => $dept_id, 'is_active' => 1), '*');
        echo json_encode($data);
    }

    function completeStatus() {
        $this->setOutputMode(NORMAL);
        $status_id = $this->input->post('status_id');
        $task_id = $this->input->post('task_id');
        $dept_id = $this->input->post('dept_id');
        $exists = $this->m_common->get_row_array('department_task_status', array('dept_task_status_id' => $status_id), '*');
        $result = $this->m_common->update_row('department_task_status', array('dept_task_status_id' => $status_id), array('status' => 'complete', 'completed_date' => date('Y-m-d')));
        if (!empty($result)) {

            $sql = "select sum(dts.percentage) as total from department_task_status dts join project_status ps on dts.status_id=ps.status_id where dts.is_active=1 and dts.status_id IS NOT NULL and dts.task_id= $task_id and dts.project_id=" . $exists[0]['project_id'] . " and dts.dept_id=" . $exists[0]['dept_id'] . "";
            $tall = $this->m_common->customeQuery($sql);
            $sql = "select sum(dts.percentage) as total from department_task_status dts join project_status ps on dts.status_id=ps.status_id where dts.is_active=1 and dts.status_id IS NOT NULL and dts.task_id= $task_id and dts.status = 'complete' and dts.project_id=" . $exists[0]['project_id'] . " and dts.dept_id=" . $exists[0]['dept_id'] . "";
            $tcomplete = $this->m_common->customeQuery($sql);
            $t_percentage = ($tcomplete[0]['total'] * 100) / $tall[0]['total'];
            $t_percentage = empty($t_percentage) ? 0 : $t_percentage;
            $sql = "update department_task set percentage=" . $t_percentage . " where project_id=" . $exists[0]['project_id'] . " and dept_id=" . $exists[0]['dept_id'] . " and task_id=" . $exists[0]['task_id'];
            $this->m_common->customeUpdate($sql);

            $parent = $this->m_common->get_row_array('task', array('task_id' => $task_id, 'is_active' => 1), '*');
            if (!empty($parent[0]['sub_task_id'])) {
                $tasks = $this->m_common->customeQuery("select GROUP_CONCAT(task_id) as task_id from task where is_active=1 and sub_task_id=" . $parent[0]['sub_task_id'] . "");
                if (!empty($tasks)) {
                    $tasks = $tasks[0]['task_id'];
                }
                $sql = "select sum(dts.percentage) as total from department_task_status dts join project_status ps on dts.status_id=ps.status_id where dts.is_active=1 and dts.status_id IS NOT NULL and dts.task_id in(" . $tasks . ") and dts.project_id=" . $exists[0]['project_id'] . " and dts.dept_id=" . $exists[0]['dept_id'] . "";
                $pall = $this->m_common->customeQuery($sql);
                $sql = "select sum(dts.percentage) as total from department_task_status dts join project_status ps on dts.status_id=ps.status_id where dts.is_active=1 and dts.status_id IS NOT NULL and dts.task_id in(" . $tasks . ") and dts.status = 'complete' and dts.project_id=" . $exists[0]['project_id'] . " and dts.dept_id=" . $exists[0]['dept_id'] . "";
                $pcomplete = $this->m_common->customeQuery($sql);
                $p_percentage = ($pcomplete[0]['total'] * 100) / $pall[0]['total'];
                $p_percentage = empty($p_percentage) ? 0 : $p_percentage;
                $sql = "update department_task set percentage=" . $p_percentage . " where project_id=" . $exists[0]['project_id'] . " and dept_id=" . $exists[0]['dept_id'] . " and task_id=" . $parent[0]['sub_task_id'];
                $this->m_common->customeUpdate($sql);
            }
            if (!empty($parent[0]['parent_task_id'])) {
                $tasks = $this->m_common->customeQuery("select GROUP_CONCAT(task_id) as task_id from task where is_active=1 and parent_task_id=" . $parent[0]['parent_task_id'] . "");
                if (!empty($tasks)) {
                    $tasks = $tasks[0]['task_id'];
                }
                $sql = "select sum(dts.percentage) as total from department_task_status dts join project_status ps on dts.status_id=ps.status_id where dts.is_active=1 and dts.status_id IS NOT NULL and dts.task_id in(" . $tasks . ") and dts.project_id=" . $exists[0]['project_id'] . " and dts.dept_id=" . $exists[0]['dept_id'] . "";
                $pall = $this->m_common->customeQuery($sql);
                $sql = "select sum(dts.percentage) as total from department_task_status dts join project_status ps on dts.status_id=ps.status_id where dts.is_active=1 and dts.status_id IS NOT NULL and dts.task_id in(" . $tasks . ") and dts.status = 'complete' and dts.project_id=" . $exists[0]['project_id'] . " and dts.dept_id=" . $exists[0]['dept_id'] . "";
                $pcomplete = $this->m_common->customeQuery($sql);
                $p_percentage = ($pcomplete[0]['total'] * 100) / $pall[0]['total'];
                $p_percentage = empty($p_percentage) ? 0 : $p_percentage;
                $sql = "update department_task set percentage=" . $p_percentage . " where project_id=" . $exists[0]['project_id'] . " and dept_id=" . $exists[0]['dept_id'] . " and task_id=" . $parent[0]['parent_task_id'];
                $this->m_common->customeUpdate($sql);
            }
            $sql = "select sum(dts.percentage) as total from department_task_status dts join project_status ps on dts.status_id=ps.status_id where dts.is_active=1 and dts.status_id IS NOT NULL and dts.project_id=" . $exists[0]['project_id'] . " and dts.dept_id=" . $exists[0]['dept_id'] . "";
            $deptall = $this->m_common->customeQuery($sql);
            $sql = "select sum(dts.percentage) as total from department_task_status dts join project_status ps on dts.status_id=ps.status_id where dts.is_active=1 and dts.status='complete' and dts.status_id IS NOT NULL and dts.project_id=" . $exists[0]['project_id'] . " and dts.dept_id=" . $exists[0]['dept_id'] . "";
            $deptcomplete = $this->m_common->customeQuery($sql);
            //  $deptall = $this->m_common->get_row_array('department_task_status', array('dept_id' => $exists[0]['dept_id'], 'project_id' => $exists[0]['project_id'], 'is_active' => 1), 'sum(percentage) as total');
            //$deptcomplete = $this->m_common->get_row_array('department_task_status', array('dept_id' => $exists[0]['dept_id'], 'project_id' => $exists[0]['project_id'], 'status' => 'complete', 'is_active' => 1), 'sum(percentage) as total');
            $dept_percentage = ($deptcomplete[0]['total'] * 100) / $deptall[0]['total'];
            $dept_percentage = empty($dept_percentage) ? 0 : $dept_percentage;
            $sql = "update department set progress=" . $dept_percentage . " where project_id=" . $exists[0]['project_id'] . " and dept_id=" . $exists[0]['dept_id'];
            $this->m_common->customeUpdate($sql);
            $sql = "select sum(dts.percentage) as total from department_task_status dts join project_status ps on dts.status_id=ps.status_id where dts.is_active=1 and dts.status_id IS NOT NULL and dts.project_id=" . $exists[0]['project_id'] . "";
            $projectall = $this->m_common->customeQuery($sql);
            $sql = "select sum(dts.percentage) as total from department_task_status dts join project_status ps on dts.status_id=ps.status_id where dts.is_active=1 and dts.status='complete' and dts.status_id IS NOT NULL and dts.project_id=" . $exists[0]['project_id'] . "";
            $projectcomplete = $this->m_common->customeQuery($sql);
//            $projectall = $this->m_common->get_row_array('department_task_status', array('project_id' => $exists[0]['project_id'], 'is_active' => 1), 'sum(percentage) as total');
//            $projectcomplete = $this->m_common->get_row_array('department_task_status', array('project_id' => $exists[0]['project_id'], 'status' => 'complete', 'is_active' => 1), 'sum(percentage) as total');
            $project_percentage = ($projectcomplete[0]['total'] * 100) / $projectall[0]['total'];
            $project_percentage = empty($project_percentage) ? 0 : $project_percentage;
            $sql = "update projects set progress=" . $project_percentage . " where project_id=" . $exists[0]['project_id'];
            $this->m_common->customeUpdate($sql);
            $this->save_user_activity(array('section' => 'Project Status', 'activity' => 'Project Status Updated', 'user_id' => $this->session->userdata('user_id'), 'date' => date('Y-m-d H:i:s')));
            $data['status'] = "success";
        } else {
            $data['status'] = "failed";
        }
        $sql = "select dts.*,ps.status_name from department_task_status dts left join project_status ps on dts.status_id=ps.status_id where dts.is_active=1 and dts.task_id=" . $task_id . " and dts.dept_id=" . $exists[0]['dept_id'];
        $data['task_status'] = $this->m_common->customeQuery($sql);
        $p = $this->m_common->get_row_array('projects', array('project_id' => $exists[0]['project_id']), 'progress');
        $d = $this->m_common->get_row_array('department', array('dept_id' => $exists[0]['dept_id']), 'progress');
        $t = $this->m_common->get_row_array('department_task', array('task_id' => $exists[0]['task_id'], 'dept_id' => $exists[0]['dept_id']), 'percentage');
        $data['p_progress'] = !empty($p) ? $p[0]['progress'] : 0;
        $data['d_progress'] = !empty($d) ? $d[0]['progress'] : 0;
        $data['t_progress'] = !empty($t) ? $t[0]['percentage'] : 0;
        $data['dept_task'] = !empty($exists) ? $exists[0] : array();
        echo json_encode($data);
    }

    function resetStatus() {
        $this->setOutputMode(NORMAL);
        $user_id = $this->session->userdata('user_id');
        $status_id = $this->input->post('status_id');
        $task_id = $this->input->post('task_id');
        $dept_id = $this->input->post('dept_id');
        $reason = $this->input->post('reason');
        $insertData = array();

        $exists = $this->m_common->get_row_array('department_task_status', array('dept_task_status_id' => $status_id), '*');
        $approver_info = $this->m_common->get_row_array('assign_user', array('project_id' => $exists[0]['project_id'], 'user_type' => 2), '*');
        $insertData['project_id'] = $exists[0]['project_id'];
        $insertData['dept_id'] = $dept_id;
        $insertData['request_id'] = $status_id;
        $insertData['title'] = "Request For Reset Status ";
        $insertData['description'] = $reason;
        $insertData['request_type'] = "reset";
        $insertData['status'] = "pending";
        $insertData['url'] = site_url("backend/request");
        $insertData['approver_id'] = $approver_info[0]['user_id'];
        $insertData['applicant_id'] = $user_id;
        $insertData['create_date'] = date('Y-m-d H:i:s');
        $insertData['date'] = date('Y-m-d');
        $response = $this->m_common->insert_row('request', $insertData);
        if (!empty($response)) {
            $result = $this->m_common->update_row('department_task_status', array('dept_task_status_id' => $status_id), array('status' => 'reset'));
        }
        if (!empty($result)) {
            $data['status'] = "success";
        } else {
            $data['status'] = "failed";
        }
        $sql = "select dts.*,ps.status_name from department_task_status dts left join project_status ps on dts.status_id=ps.status_id where dts.is_active=1 and dts.task_id=" . $task_id . " and dts.dept_id=" . $dept_id;
        $data['task_status'] = $this->m_common->customeQuery($sql);
        echo json_encode($data);
    }

    function requestForDeleteFile() {
        $this->setOutputMode(NORMAL);
        $user_id = $this->session->userdata('user_id');
        $file_id = $this->input->post('file_id');
        $dept_id = $this->input->post('dept_id');
        $reason = $this->input->post('reason');
        $insertData = array();
        $exists = $this->m_common->get_row_array('task_file', array('file_id' => $file_id), '*');
        $approver_info = $this->m_common->get_row_array('assign_user', array('project_id' => $exists[0]['project_id'], 'user_type' => 2), '*');
        $insertData['project_id'] = $exists[0]['project_id'];
        $insertData['dept_id'] = $dept_id;
        $insertData['request_id'] = $file_id;
        $insertData['title'] = "Request For Delete File";
        $insertData['description'] = $reason;
        $insertData['request_type'] = "delete";
        $insertData['status'] = "pending";
        $insertData['url'] = site_url("backend/request");
        $insertData['approver_id'] = $approver_info[0]['user_id'];
        $insertData['applicant_id'] = $user_id;
        $insertData['create_date'] = date('Y-m-d H:i:s');
        $insertData['date'] = date('Y-m-d');
        $response = $this->m_common->insert_row('request', $insertData);

        if (!empty($response)) {
            $data['status'] = "success";
        } else {
            $data['status'] = "failed";
        }

        echo json_encode($data);
    }

    function addTaskComment() {
        $this->setOutputMode(NORMAL);
        $user_id = $this->session->userdata('user_id');
        $task_id = $this->input->post('task_id');
        $dept_id = $this->input->post('dept_id');
        $comment = $this->input->post('comment');
        $task = $this->m_common->get_row_array('task', array('task_id' => $task_id, 'is_active' => 1), '*');
        $insertData['task_id'] = $task_id;
        $insertData['dept_id'] = $dept_id;
        $insertData['comment'] = $comment;
        $insertData['project_id'] = $task[0]['project_id'];
        $insertData['created_by'] = $user_id;
        $insertData['created'] = date('Y-m-d');
        $insertData['is_active'] = 1;
        $result = $this->m_common->insert_row('task_comment', $insertData);
        if (!empty($result)) {
            $data['status'] = "success";
        } else {
            $data['status'] = "failed";
        }
        $data['task_remarks'] = $this->m_common->get_row_array('task_comment', array('task_id' => $task_id, 'dept_id' => $dept_id, 'is_active' => 1), '*');
        echo json_encode($data);
    }

    function commentInfo() {
        $this->setOutputMode(NORMAL);
        $comment_id = $this->input->post('comment_id');
        $data['task_remark'] = $this->m_common->get_row_array('task_comment', array('comment_id' => $comment_id, 'is_active' => 1), '*');
        if (!empty($data['task_remark'])) {
            $data['status'] = "success";
        } else {
            $data['status'] = "failed";
        }
        echo json_encode($data);
    }

    function updateTaskComment() {
        $this->setOutputMode(NORMAL);
        $task_id = $this->input->post('task_id');
        $dept_id = $this->input->post('dept_id');
        $comment_id = $this->input->post('comment_id');
        $comment = $this->input->post('comment');
        $result = $this->m_common->update_row('task_comment', array('comment_id' => $comment_id), array('comment' => $comment));
        if (!empty($result)) {
            $data['status'] = "success";
        } else {
            $data['status'] = "failed";
        }
        // $data['task_remarks'] = $this->m_common->get_row_array('task_comment', array('task_id' => $task_id, 'is_active' => 1), '*');
        $data['task_remarks'] = $this->m_common->get_row_array('task_comment', array('task_id' => $task_id, 'dept_id' => $dept_id, 'is_active' => 1), '*');
        echo json_encode($data);
    }

    function deleteComment() {
        $this->setOutputMode(NORMAL);
        $comment_id = $this->input->post('comment_id');
        $result = $this->m_common->update_row('task_comment', array('comment_id' => $comment_id), array('is_active' => '0', 'is_delete' => 1));
        if (!empty($result)) {
            $data['status'] = "success";
        } else {
            $data['status'] = "failed";
        }
        // $data['task_remarks'] = $this->m_common->get_row_array('task_comment', array('task_id' => $task_id, 'is_active' => 1), '*');
        $data['task_remarks'] = $this->m_common->get_row_array('task_comment', array('task_id' => $task_id, 'dept_id' => $dept_id, 'is_active' => 1), '*');
        echo json_encode($data);
    }

    function addTaskFile() {
        $this->setOutputMode(NORMAL);
        $user_id = $this->session->userdata('user_id');
        $task_id = $this->input->post('task_id');
        $dept_id = $this->input->post('dept_id');
        if (isset($_FILES['task_file']['name']) && !empty($_FILES['task_file']['name'])) {
            $filename = uploadImage('image', 'images/users');
        }
        $file = $this->input->post('file');
        $task = $this->m_common->get_row_array('task', array('task_id' => $task_id, 'is_active' => 1), '*');
        $insertData['task_id'] = $task_id;
        $insertData['parent_task_id'] = $task[0]['parent_task_id'];
        $insertData['sub_task_id'] = $task[0]['sub_task_id'];
        $insertData['file_name'] = $filename;
        $insertData['project_id'] = $task[0]['project_id'];
        $insertData['created_by'] = $user_id;
        $insertData['created'] = date('Y-m-d');
        $result = $this->m_common->insert_row('task_file', $insertData);
        if (!empty($result)) {
            $data['status'] = "success";
        } else {
            $data['status'] = "failed";
        }
        $data['task_files'] = $this->m_common->get_row_array('task_file', array('task_id' => $task_id, 'is_active' => 1), '*');
        echo json_encode($data);
    }

    function fileDownload($file_id = '') {
        $exist = $this->m_common->get_row_array('task_file', array('file_id' => $file_id), '*');
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename= " . $exist[0]['file_name']);
        header("Content-Transfer-Encoding: binary");
        header("Content-Type: binary/octet-stream");
        readfile($exist[0]['unique_name']);
    }

    function projectAllDepartment() {
        $this->setOutputMode(NORMAL);
        $project_id = $this->input->post('project_id');
        $user_id = $this->input->post('user_id');
        $data['project_info'] = $this->m_common->get_row_array('projects', array('project_id' => $project_id), '*');
//        $sql="select assign_user.project_id,assign_user.department_id,department.dept_name from assign_user left join department on assign_user.department_id=department.dept_id where assign_user.project_id=".$project_id." and assign_user.user_id=".$user_id;
//        $data['project_departments']=$this->m_common->customeQuery($sql);
//        $sql = "select project_id,user_type from assign_user where is_active=1 and project_id=" . $project_id . " and user_id=" . $user_id;
        $sql = "select user_type from assign_user where is_active=1 and project_id=" . $project_id . " and user_id=" . $user_id;
        $user_roles = $this->m_common->customeQuery($sql);
        foreach ($user_roles as $user_role) {
            $u_role[] = $user_role['user_type'];
            if ($user_role['user_type'] == 2) {
                $admin = "Admin";
            } else if ($user_role['user_type'] == 3) {
                $monitor = "Monitor";
            } else if ($user_role['user_type'] == 4) {
                $moderator = 2;
            }
        }
        $data['user_roles'] = implode(',', $u_role);
        if (isset($admin) || isset($monitor)) {
            $data['project_departments'] = $this->m_common->get_row_array('department', array('project_id' => $project_id, 'is_active' => 1), '*');
        } else {
            //$sql = "select assign_user.project_id,department.dept_id,department.progress,department.dept_name from assign_user left join department on assign_user.department_id=department.dept_id where assign_user.is_active=1 and department.is_active=1 and assign_user.project_id=" . $project_id . " and assign_user.user_id=" . $user_id;
            //  $sql = "select assign_user.project_id,assign_user.user_id,department.dept_id,department.progress,department.dept_name from assign_user left join department on assign_user.department_id=department.dept_id where assign_user.is_active=1 and department.is_active=1 and assign_user.project_id=" . $project_id;
            $sql = "select assign_user.project_id,assign_user.user_id,department.dept_id,department.dept_value,department.progress,department.dept_name,department.text_color,department.box_color from assign_user left join department on assign_user.department_id=department.dept_id where assign_user.is_active=1 and department.is_active=1 and assign_user.project_id=" . $project_id;
            $data['project_departments'] = $this->m_common->customeQuery($sql);
        }

        $task_sql = "select * from department_task where project_id=" . $project_id . " order by end_date asc";
        $data['project_tasks'] = $this->m_common->customeQuery($task_sql);
        foreach ($data['project_tasks'] as $key => $value) {
            //$s_d=date('m/d/Y',strtotime($value['end_date']));
            $data['project_tasks'][$key]['end_date'] = date('m/d/Y', strtotime($value['end_date']));
        }

        $sql = "select dt.*,d.dept_value,d.progress from department_task dt join department d on d.dept_id=dt.dept_id where dt.project_id=" . $project_id . " group by dt.dept_id order by dt.end_date asc";
        $dept = $this->m_common->customeQuery($sql);
        $dpt_arr = array();
//        $tot = 0;
//        $fp = fopen('analytics1.csv', 'w');
//        fputcsv($fp, array('', 'Planned', 'Actual'));
//        foreach ($dept as $key => $value) {
//            $tot+=$value['dept_value'];
//            $arr = array();
//            $d = $this->m_common->get_row_array('department_task', array('dept_id' => $value['dept_id']), 'end_date', 'dept_id', '1', 'end_date', 'asc');
//            if (empty($d)) {
//                $arr[] = date('m/d/Y', strtotime("+7 day", strtotime($dpt_arr[0])));
//            } else {
//                $arr[] = date('m/d/Y', strtotime($d[0]['end_date']));
//            }
//            $arr[] = $tot;
//            $arr[] = $value['dept_value'] - ($value['progress'] / 100);
//            fputcsv($fp, $arr);
//            $dpt_arr = $arr;
//        }
//        fclose($fp);
        $data['dpt_arr'] = $dpt_arr;

        $sql = "select * from department_task where project_id=" . $project_id . ' group by end_date';
        $allStatus = $this->m_common->customeQuery($sql);
        $all = array();
        $completed = array();
        $cat = array();
        $projectVal = 0;
        $projectValCom = 0;
        foreach ($allStatus as $status) {
            $cat[] = date('d-m-Y', strtotime($status['end_date']));
            $sql = "select * from department_task where project_id=" . $project_id . " and end_date='" . $status['end_date'] . "'";
            $sameDate = $this->m_common->customeQuery($sql);
            foreach ($sameDate as $d) {
//                $tsk_val = $this->m_common->get_row_array('task', array('task_id' => $d['task_id']), '*');
//                
//                   if(!empty($tsk_val[0]['parent_task_id'])){
//                    $p = $this->m_common->get_row_array('task', array('task_id' => $tsk_val[0]['parent_task_id']), '*');
//                    $tsk_val = !empty($tsk_val) ? $tsk_val[0]['task_value'] : 0;
//                    $tsk_val = ($p[0]['task_value']*100)/$tsk_val;
//                }else{
//                    $tsk_val = !empty($tsk_val) ? $tsk_val[0]['task_value'] : 0;
//                }
                $tsk_val = $d['total'];
                // $dept_val = $this->m_common->get_row_array('department', array('dept_id' => $d['dept_id']), 'dept_value');
                //$tsk_val = !empty($tsk_val) ? $tsk_val[0]['task_value'] : 0;
                $dept_val = 1; //!empty($dept_val) ? $dept_val[0]['dept_value'] : 0;
                $projectVal += ($tsk_val * 100 * $dept_val) / 10000;
                if ($projectVal > 100) {
                    $projectVal = 100;
                }
                $projectValCom += ($tsk_val * $d['percentage'] * $dept_val) / 10000;
            }
            $all[] = array('y' => round($projectVal, 2));
            if ($status['percentage'] > 0)
                $completed[] = array('y' => round($projectValCom, 2));
        }

        $data['completed'] = $completed;
        $data['all'] = $all;
        $data['cat'] = $cat;
        echo json_encode($data);
    }

    public function profile() {
        $this->titlebackend("Profile");
        $this->menu = 'user';
        $this->sub_menu = 'add_user';
        $this->titlebackend("User Profile");
        $user_id = $this->session->userdata('user_id');
        $postData = $this->input->post();
        if (!empty($postData)) {
            $user_info = array();
            if (!empty($postData['fullname'])) {
                $user_info['fullname'] = $postData['fullname'];
            }
            if (!empty($postData['address'])) {
                $user_info['address'] = $postData['address'];
            }
            if (!empty($postData['phone'])) {
                $user_info['phone'] = $postData['phone'];
            }
            if (!empty($postData['username'])) {
                $user_info['username'] = $postData['username'];
            }
            if (!empty($postData['usertype'])) {
                $user_info['usertype'] = $postData['usertype'];
            }
            if (!empty($postData['designation'])) {
                $user_info['designation'] = $postData['designation'];
            }

            if (!empty($postData['email'])) {
                $user_info['email'] = $postData['email'];
            }
            if (!empty($postData['password'])) {
                $user_info['password'] = md5($postData['password']);
            }

            if (!empty($postData['dob'])) {
                $user_info['dob'] = date('Y-m-d', strtotime($postData['dob']));
            }

            if (!empty($postData['joining_date'])) {
                $user_info['joining_date'] = date('Y-m-d', strtotime($postData['joining_date']));
            }
            $existData = $this->m_common->get_row_array('users', array('user_id' => $user_id), 'image');
            if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                if (!empty($existData[0]['image']) && file_exists('images/users/' . $existData[0]['image']))
                    unlink('images/users/' . $existData[0]['image']);
                $filename = uploadImage('image', 'images/users');
                $user_info['image'] = $filename;
            }
            $contractor_info['modified'] = date('Y-m-d');
            $this->m_common->update_row('users', array('user_id' => $user_id), $user_info);
            $this->save_user_activity(array('section' => 'User Profile', 'activity' => 'User Profile Updated for user id :' . $user_id, 'user_id' => $this->session->userdata('user_id'), 'date' => date('Y-m-d H:i:s')));
            redirect_with_msg('backend/moderator/profile', "Successfully Updated");
        }else {
            $data['user_info'] = $this->m_common->get_row_array('users', array('user_id' => $user_id), '*');
            $this->load->view('moderator/v_profile', $data);
        }
    }

    function image_upload() {
        $this->setOutputMode(NORMAL);
        $this->path = "assets/uploads/files";
        $task_id = $this->input->post('task_id');
        $dept_id = $this->input->post('dept_id');
        $user_id = $this->session->userdata('user_id');
        $chunk = isset($_POST["chunk"]) ? intval($_POST["chunk"]) : 0;
        $chunks = isset($_POST["chunks"]) ? intval($_POST["chunks"]) : 0;
        $fileUniqueName = isset($_POST["name"]) ? $_POST["name"] : '';
        $fileRealName = ($_FILES['file']['name'] == "blob") ? $_POST["realName"] : $_FILES['file']['name'];

        $file_path = $this->path . '/' . str_replace(array(","), "_", $fileUniqueName);




        $in = fopen($_FILES['file']['tmp_name'], "rb");
        if ($chunk == 0) { //first chunk of the file
            $out = fopen($file_path, "wb");
        } else { //next chunks of the file
            $out = fopen($file_path, "ab");
        }
        while ($buff = fread($in, 4096))
            fwrite($out, $buff);

        fclose($in);
        fclose($out);


        //rename($this->path.$fileUniqueName);
        @unlink($_FILES['file']['tmp_name']);

        if (($chunks == 0) or ( $chunk == $chunks - 1)) { //file is completely uploaded
            $old_name = $this->path . '/' . $fileUniqueName;
//            $new_name = $this->path . '/' . $fileRealName;
//            rename($old_name, $new_name);

            $task = $this->m_common->get_row_array('task', array('task_id' => $task_id, 'is_active' => 1), '*');
            $insertData['dept_id'] = $dept_id;
            $insertData['task_id'] = $task_id;
            $insertData['parent_task_id'] = $task[0]['parent_task_id'];
            $insertData['sub_task_id'] = $task[0]['sub_task_id'];
            $insertData['file_name'] = $fileRealName;
            $insertData['unique_name'] = $old_name;
            $insertData['project_id'] = $task[0]['project_id'];
            $insertData['created_by'] = $user_id;
            $insertData['created'] = date('Y-m-d');
            $insertData['is_active'] = 1;
            $result = $this->m_common->insert_row('task_file', $insertData);


            echo json_encode(array('status' => 'success', 'temp_file_path' => $file_path, 'file_name' => $fileRealName, 'unique_name' => $old_name, 'file_id' => $result));
        }
    }

    function make_as_complete($project_id) {
        $user_id = $this->session->userdata('user_id');
        $this->m_common->update_row('projects', array('project_id' => $project_id), array('project_status' => 'Complete', 'completed_by' => $user_id));
        $this->save_user_activity(array('section' => 'Project', 'activity' => 'Project Completed', 'user_id' => $this->session->userdata('user_id'), 'date' => date('Y-m-d H:i:s')));
        redirect_with_msg('moderator', 'Project completed successfully');
    }

    function requestForProjectIncompletion($project_id) {

        $this->setOutputMode(NORMAL);
        $user_id = $this->session->userdata('user_id');

        $reason = $this->input->post('reason');
        $project_id = $this->input->post('project_id');
        $insertData = array();
        $approver_info = $this->m_common->get_row_array('users', array('usertype' => "Admin"), '*');
        $insertData['project_id'] = $project_id;
        $insertData['title'] = "Request For Project Incompletion";
        $insertData['description'] = $reason;
        $insertData['request_type'] = "incomplete";
        $insertData['status'] = "pending";
        $insertData['url'] = site_url("backend/request");
        $insertData['approver_id'] = $approver_info[0]['user_id'];
        $insertData['applicant_id'] = $user_id;
        $insertData['create_date'] = date('Y-m-d H:i:s');
        $insertData['date'] = date('Y-m-d');
        $response = $this->m_common->insert_row('request', $insertData);

        if (!empty($response)) {
            $data['status'] = "success";
        } else {
            $data['status'] = "failed";
        }

        $this->save_user_activity(array('section' => 'Project', 'activity' => 'Request for project incomplete', 'user_id' => $this->session->userdata('user_id'), 'date' => date('Y-m-d H:i:s')));
        echo json_encode($data);
    }

    public function notification() {
        $user_type = $this->session->userdata('usertype');
        $employee_id = $this->session->userdata('user_id');
        $user_id = $this->session->userdata('user_id');
        $this->setOutputMode(NORMAL);
        $this->data['all'] = array();
        $this->data['alert'] = array();
//        $sql = "SELECT * from notice where (employee_id='$employee_id' OR employee_id IS NULL) and (status='Unseen' or status IS NULL) ORDER BY create_date DESC ";
//        $notices = $this->m_common->customeQuery($sql);

        $notices = $this->m_common->get_row_array('request', array('approver_id' => $user_id, 'status' => "pending"), '*');

        $i = 0;
        $data1 = array();
        if (count($notices) > 0) {
            foreach ($notices as $key => $notice) {
                $employee_id = $this->session->userdata('employeeId');
                $pdate = date("Y-m-d H:i:s");
                $dafstdate = $notice['create_date'];
                $first_date = new DateTime($dafstdate);
                $second_date = new DateTime($pdate);
                $difference = $first_date->diff($second_date);
                $time = '';
                if ($difference->y >= 1) {
                    $format = 'Y-m-d H:i:s';
                    $date = DateTime::createFromFormat($format, $dafstdate);
                    $time = $date->format('M d Y');
                } elseif ($difference->m == 1 && $difference->m != 0) {
                    $time = $difference->m . " month";
                } elseif ($difference->m <= 12 && $difference->m != 0) {
                    $time = $difference->m . " months";
                } elseif ($difference->d == 1 && $difference->d != 0) {
                    $time = "Yesterday";
                } elseif ($difference->d <= 31 && $difference->d != 0) {
                    $time = $difference->d . " days";
                } else if ($difference->h == 1 && $difference->h != 0) {
                    $time = $difference->h . " hr";
                } else if ($difference->h <= 24 && $difference->h != 0) {
                    $time = $difference->h . " hrs";
                } elseif ($difference->i <= 60 && $difference->i != 0) {
                    $time = $difference->i . " mins";
                } elseif ($difference->s <= 10) {
                    $time = "Just Now";
                } elseif ($difference->s <= 60 && $difference->s != 0) {
                    $time = $difference->s . " sec";
                }

                $notice['time'] = $time;
                // $data1['message'][$key] = $notice;
                $this->data['alert'][] = $notice;

                $i++;
            }
        }
        $data1 = $this->data['alert'];
        echo json_encode($data1);
        //echo "success";
    }

    function deptTaskProgressInfo() {
        $this->setOutputMode(NORMAL);
        $project_id = $this->input->post('project_id');
        $dept_id = $this->input->post('dept_id');
        $sql = "select * from department_task where project_id=" . $project_id . " and dept_id=" . $dept_id . ' group by end_date';
        $allStatus = $this->m_common->customeQuery($sql);
        $all = array();
        $completed = array();
        $cat = array();
        $projectVal = 0;
        $projectValCom = 0;
        foreach ($allStatus as $status) {
            $cat[] = date('d-m-Y', strtotime($status['end_date']));
            $sql = "select * from department_task where project_id=" . $project_id . " and end_date='" . $status['end_date'] . "'";
            $sameDate = $this->m_common->customeQuery($sql);
            foreach ($sameDate as $d) {
                $tsk_val = $this->m_common->get_row_array('task', array('task_id' => $d['task_id']), '*');

                if (!empty($tsk_val[0]['parent_task_id'])) {
                    $p = $this->m_common->get_row_array('task', array('task_id' => $tsk_val[0]['parent_task_id']), '*');
                    $tsk_val = !empty($tsk_val) ? $tsk_val[0]['task_value'] : 0;
                    $tsk_val = ($p[0]['task_value'] * 100) / $tsk_val;
                } else {
                    $tsk_val = !empty($tsk_val) ? $tsk_val[0]['task_value'] : 0;
                }

                $dept_val = $this->m_common->get_row_array('department', array('dept_id' => $d['dept_id']), 'dept_value');

                $dept_val = !empty($dept_val) ? $dept_val[0]['dept_value'] : 0;
                $projectVal += ($tsk_val * 100 * $dept_val) / 10000;
                if ($projectVal > 100) {
                    $projectVal = 100;
                }
                $projectValCom += ($tsk_val * $d['percentage'] * $dept_val) / 10000;
            }
            $all[] = array('y' => round($projectVal, 2));
            if ($status['percentage'] > 0)
                $completed[] = array('y' => round($projectValCom, 2));
        }

        $data['completed'] = $completed;
        $data['all'] = $all;
        $data['cat'] = $cat;
        echo json_encode($data);
    }

    function updateProgress($project_id) {
        if (empty($project_id))
            redirect_with_msg('backend/project', 'Project not found');
        $all_status = $this->m_common->get_row_array('department_task_status', array('project_id' => $project_id, 'is_active' => 1, 'status' => 'complete'), '*');
        $this->m_common->update_row('projects', array('project_id' => $project_id), array('progress' => '0'));
        $this->m_common->update_row('department_task', array('project_id' => $project_id), array('percentage' => '0'));
        $this->m_common->update_row('department', array('project_id' => $project_id), array('progress' => '0'));
        //  $this->m_common->update_row('task', array('project_id' => $status_id), array('progress' => '0'));
        foreach ($all_status as $stat) {
            if (empty($stat['status_id']))
                continue;
            $status_id = $stat['dept_task_status_id'];
            $task_id = $stat['task_id'];
            $dept_id = $stat['dept_id'];
            $exists = $this->m_common->get_row_array('department_task_status', array('dept_task_status_id' => $status_id, 'is_active' => 1), '*');
            $sql = "select sum(dts.percentage) as total from department_task_status dts join project_status ps on dts.status_id=ps.status_id where dts.is_active=1 and dts.status_id IS NOT NULL and dts.task_id= $task_id and dts.project_id=" . $exists[0]['project_id'] . " and dts.dept_id=" . $exists[0]['dept_id'] . "";
            $tall = $this->m_common->customeQuery($sql);
            $sql = "select sum(dts.percentage) as total from department_task_status dts join project_status ps on dts.status_id=ps.status_id where dts.is_active=1 and dts.status_id IS NOT NULL and dts.task_id= $task_id and dts.status = 'complete' and dts.project_id=" . $exists[0]['project_id'] . " and dts.dept_id=" . $exists[0]['dept_id'] . "";
            $tcomplete = $this->m_common->customeQuery($sql);
            $t_percentage = ($tcomplete[0]['total'] * 100) / $tall[0]['total'];
            $t_percentage = empty($t_percentage) ? 0 : $t_percentage;
            $t_percentage = is_nan($t_percentage) ? 0 : $t_percentage;
            $sql = "update department_task set percentage=" . $t_percentage . " where project_id=" . $exists[0]['project_id'] . " and dept_id=" . $exists[0]['dept_id'] . " and task_id=" . $exists[0]['task_id'];
            $this->m_common->customeUpdate($sql);

            $parent = $this->m_common->get_row_array('task', array('task_id' => $task_id, 'is_active' => 1), '*');
            if (!empty($parent[0]['sub_task_id'])) {
                $tasks = $this->m_common->customeQuery("select GROUP_CONCAT(task_id) as task_id from task where is_active=1 and sub_task_id=" . $parent[0]['sub_task_id'] . "");
                if (!empty($tasks)) {
                    $tasks = $tasks[0]['task_id'];
                }
                $sql = "select sum(dts.percentage) as total from department_task_status dts join project_status ps on dts.status_id=ps.status_id where dts.is_active=1 and dts.status_id IS NOT NULL and dts.task_id in(" . $tasks . ") and dts.project_id=" . $exists[0]['project_id'] . " and dts.dept_id=" . $exists[0]['dept_id'] . "";
                $pall = $this->m_common->customeQuery($sql);
                $sql = "select sum(dts.percentage) as total from department_task_status dts join project_status ps on dts.status_id=ps.status_id where dts.is_active=1 and dts.status_id IS NOT NULL and dts.task_id in(" . $tasks . ") and dts.status = 'complete' and dts.project_id=" . $exists[0]['project_id'] . " and dts.dept_id=" . $exists[0]['dept_id'] . "";
                $pcomplete = $this->m_common->customeQuery($sql);
                $p_percentage = ($pcomplete[0]['total'] * 100) / $pall[0]['total'];
                $p_percentage = empty($p_percentage) ? 0 : $p_percentage;
                $p_percentage = is_nan($p_percentage) ? 0 : $p_percentage;
                $sql = "update department_task set percentage=" . $p_percentage . " where project_id=" . $exists[0]['project_id'] . " and dept_id=" . $exists[0]['dept_id'] . " and task_id=" . $parent[0]['sub_task_id'];
                $this->m_common->customeUpdate($sql);
            }
            if (!empty($parent[0]['parent_task_id'])) {
                $tasks = $this->m_common->customeQuery("select GROUP_CONCAT(task_id) as task_id from task where is_active=1 and parent_task_id=" . $parent[0]['parent_task_id'] . "");
                if (!empty($tasks)) {
                    $tasks = $tasks[0]['task_id'];
                }
                $sql = "select sum(dts.percentage) as total from department_task_status dts join project_status ps on dts.status_id=ps.status_id where dts.is_active=1 and dts.status_id IS NOT NULL and dts.task_id in(" . $tasks . ") and dts.project_id=" . $exists[0]['project_id'] . " and dts.dept_id=" . $exists[0]['dept_id'] . "";
                $pall = $this->m_common->customeQuery($sql);
                $sql = "select sum(dts.percentage) as total from department_task_status dts join project_status ps on dts.status_id=ps.status_id where dts.is_active=1 and dts.status_id IS NOT NULL and dts.task_id in(" . $tasks . ") and dts.status = 'complete' and dts.project_id=" . $exists[0]['project_id'] . " and dts.dept_id=" . $exists[0]['dept_id'] . "";
                $pcomplete = $this->m_common->customeQuery($sql);
                $p_percentage = ($pcomplete[0]['total'] * 100) / $pall[0]['total'];
                $p_percentage = empty($p_percentage) ? 0 : $p_percentage;
                $p_percentage = is_nan($p_percentage) ? 0 : $p_percentage;
                $sql = "update department_task set percentage=" . $p_percentage . " where project_id=" . $exists[0]['project_id'] . " and dept_id=" . $exists[0]['dept_id'] . " and task_id=" . $parent[0]['parent_task_id'];
                $this->m_common->customeUpdate($sql);
            }

            $sql = "select sum(dts.percentage) as total from department_task_status dts join project_status ps on dts.status_id=ps.status_id where dts.is_active=1 and dts.status_id IS NOT NULL and dts.project_id=" . $exists[0]['project_id'] . " and dts.dept_id=" . $exists[0]['dept_id'] . "";
            $deptall = $this->m_common->customeQuery($sql);
            $sql = "select sum(dts.percentage) as total from department_task_status dts join project_status ps on dts.status_id=ps.status_id where dts.is_active=1 and dts.status='complete' and dts.status_id IS NOT NULL and dts.project_id=" . $exists[0]['project_id'] . " and dts.dept_id=" . $exists[0]['dept_id'] . "";
            $deptcomplete = $this->m_common->customeQuery($sql);
            //$deptall = $this->m_common->get_row_array('department_task_status', array('dept_id' => $exists[0]['dept_id'], 'project_id' => $exists[0]['project_id'], 'is_active' => 1), 'sum(percentage) as total');
            //$deptcomplete = $this->m_common->get_row_array('department_task_status', array('dept_id' => $exists[0]['dept_id'], 'project_id' => $exists[0]['project_id'], 'status' => 'complete', 'is_active' => 1), 'sum(percentage) as total');
            $dept_percentage = ($deptcomplete[0]['total'] * 100) / $deptall[0]['total'];
            $dept_percentage = empty($dept_percentage) ? 0 : $dept_percentage;
            $dept_percentage = is_nan($dept_percentage) ? 0 : $dept_percentage;
            $sql = "update department set progress=" . $dept_percentage . " where project_id=" . $exists[0]['project_id'] . " and dept_id=" . $exists[0]['dept_id'];
            $this->m_common->customeUpdate($sql);

            $sql = "select sum(dts.percentage) as total from department_task_status dts join project_status ps on dts.status_id=ps.status_id where dts.is_active=1 and dts.status_id IS NOT NULL and dts.project_id=" . $exists[0]['project_id'] . "";
            $projectall = $this->m_common->customeQuery($sql);
            $sql = "select sum(dts.percentage) as total from department_task_status dts join project_status ps on dts.status_id=ps.status_id where dts.is_active=1 and dts.status='complete' and dts.status_id IS NOT NULL and dts.project_id=" . $exists[0]['project_id'] . "";
            $projectcomplete = $this->m_common->customeQuery($sql);

            //$projectall = $this->m_common->get_row_array('department_task_status', array('project_id' => $exists[0]['project_id'], 'is_active' => 1), 'sum(percentage) as total');
            // $projectcomplete = $this->m_common->get_row_array('department_task_status', array('project_id' => $exists[0]['project_id'], 'status' => 'complete', 'is_active' => 1), 'sum(percentage) as total');
            $project_percentage = ($projectcomplete[0]['total'] * 100) / $projectall[0]['total'];
            $project_percentage = empty($project_percentage) ? 0 : $project_percentage;
            $project_percentage = is_nan($project_percentage) ? 0 : $project_percentage;
            $sql = "update projects set progress=" . $project_percentage . " where project_id=" . $exists[0]['project_id'];
            $this->m_common->customeUpdate($sql);
        }
        redirect_with_msg('backend/project', 'Successfully recheck progress.');
    }

    function value_report($project_id) {
        $this->menu = 'project';
        $this->sub_menu = 'project_list';
        $this->titlebackend("View Project");
        $sql = "select sum(dept_value) as toal_dept_value from department where project_id=" . $project_id . ' and is_active=1';
        $total_dept_value = $this->m_common->customeQuery($sql);
        $data['dept_ramain_value'] = 100 - $total_dept_value[0]['toal_dept_value'];
        $data['departments'] = $this->m_common->get_row_array('department', array('project_id' => $project_id, 'is_active' => 1), '*');
//        $status_sql = "select project_status.*,department.dept_name from project_status left join department on project_status.dept_id=department.dept_id where project_status.project_id=" . $project_id;
//        $data['status'] = $this->m_common->customeQuery($status_sql);
        // $data['project_info'] = $this->m_common->get_row_array('projects', array('project_id' => $project_id), '*');
        $sql = "select projects.*,pt.type,project_owner.fullname as owner_name,contractor.fullname as contractor_name,currencies.title,currencies.symbol_left from projects left join project_owner on projects.project_owner=project_owner.project_owner_id left join contractor on projects.contractor=contractor.contractor_id left join currencies on projects.equivalent_currency=currencies.currencies_id left join project_type pt on projects.type=pt.type_id where project_id=" . $project_id;
        $data['project_info'] = $this->m_common->customeQuery($sql);
        //$data['project_currency_info']=$this->m_common->get_row_array('project_currency',array('project_id'=>$project_id),'*');
        $currency_sql = "select project_currency.*,currencies.title,currencies.symbol_left from project_currency left join currencies on project_currency.currency_id=currencies.currencies_id where project_id=" . $project_id;
        $data['project_currency_info'] = $this->m_common->customeQuery($currency_sql);
        foreach ($data['departments'] as $d => $dept) {
            $sql = "select * from task t left join department_task dt on t.task_id = dt.task_id where dt.dept_id='" . $dept['dept_id'] . "' and t.project_id=$project_id and t.parent_task_id is null and t.sub_task_id is null and t.is_active=1 order by t.position asc";
            $data['tasks'] = $tasks = $this->m_common->customeQuery($sql);
            //$data['tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'parent_task_id' => null, 'sub_task_id' => null, 'is_active' => 1), '*', '', '', 'position', 'asc');

            foreach ($data['tasks'] as $key => $value) {
                $sql = "select * from task t left join department_task dt on t.task_id = dt.task_id where dt.dept_id='" . $dept['dept_id'] . "' and t.project_id=$project_id and t.parent_task_id='" . $value['task_id'] . "' and t.sub_task_id is null and t.is_active=1 order by t.position asc";
                $data['tasks'][$key]['sub_tasks'] = $tasks[$key]['sub_tasks'] = $this->m_common->customeQuery($sql);
                //$data['tasks'][$key]['sub_tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'parent_task_id' => $value['task_id'], 'sub_task_id' => null, 'is_active' => 1), '*', '', '', 'position');
                if (!empty($data['tasks'][$key]['sub_tasks'])) {
                    foreach ($data['tasks'][$key]['sub_tasks'] as $key1 => $value1) {
                        $sql = "select * from task t left join department_task dt on t.task_id = dt.task_id where dt.dept_id='" . $dept['dept_id'] . "' and t.project_id=$project_id and t.sub_task_id='" . $value1['task_id'] . "' and t.is_active=1 order by t.position asc";
                        $data['tasks'][$key]['sub_tasks'][$key1]['sub_sub_tasks'] = $tasks[$key]['sub_tasks'][$key1]['sub_sub_tasks'] = $this->m_common->customeQuery($sql);
                        //$data['tasks'][$key]['sub_tasks'][$key1]['sub_sub_tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'sub_task_id' => $value1['task_id'], 'is_active' => 1), '*', '', '', 'position');
                    }
                }
            }
            $data['departments'][$d]['tasks'] = $tasks;
        }
//             echo "<pre>";
//             print_r( $data['tasks']);
//             echo "</pre>";
//             exit;
        $this->load->view('project/v_report_value', $data);
    }

}
