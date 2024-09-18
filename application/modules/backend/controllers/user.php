<?php

/*
 * Author: fouraxiz
 * Purpose: This Controller is using for login process
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends Site_Controller {

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

    function index() {
        if (!$this->is_logged_in($this->session->userdata('logged_in'))) {
            redirect_with_msg('backend/login', 'Please Login to see this page');
        } else {
            // redirect('backend/setup');
            $this->menu = 'user';
            $this->sub_menu = 'user_list';
            $this->titlebackend("User");
            $data['users'] = $this->m_common->get_row_array('users', array('is_active' => 1), '*');
            $this->load->view('user/v_user', $data);
        }
    }

    function addEditUser($id = "") {
        $this->menu = 'user';
        $this->sub_menu = 'add_user';
        $this->titlebackend("Add User");
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

            //$contractor_info['image']=$postData['image'];
            $user_info['created_by'] = $user_id;
            if ($id == "") {
                if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                    $filename = uploadImage('image', 'images/users');
                    $user_info['image'] = $filename;
                }
                $user_info['created'] = date('Y-m-d');
                $this->m_common->insert_row('users', $user_info);
                $this->save_user_activity(array('section' => 'User', 'activity' => 'User Added for user name :' . $user_info['username'], 'user_id' => $this->session->userdata('user_id'), 'date' => date('Y-m-d H:i:s')));
                redirect_with_msg('backend/user', "Successfully Inserted");
            } else {
                $existData = $this->m_common->get_row_array('users', array('user_id' => $id), 'image');
                if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                    if (!empty($existData[0]['image']) && file_exists('images/users/' . $existData[0]['image']))
                        unlink('images/users/' . $existData[0]['image']);
                    $filename = uploadImage('image', 'images/users');
                    $user_info['image'] = $filename;
                }
                $user_info['modified'] = date('Y-m-d');
                $this->m_common->update_row('users', array('user_id' => $id), $user_info);
                $this->save_user_activity(array('section' => 'User', 'activity' => 'User Updated for user id :' . $id, 'user_id' => $this->session->userdata('user_id'), 'date' => date('Y-m-d H:i:s')));
                redirect_with_msg('backend/user', "Successfully Updated");
            }
        }else {
            if ($id == "") {
                $this->load->view('user/v_add_user');
            } else {
                $data['user_info'] = $this->m_common->get_row_array('users', array('user_id' => $id), '*');
                $this->load->view('user/v_edit_user', $data);
            }
        }
    }

    function deleteUser_($id) {
        // $existData=$this->m_common->get_row_array('contractor',array('contractor_id'=>$id),'image');
        $result = $this->m_common->update_row('users', array('user_id' => $id), array('is_delete' => 1, 'is_active' => 0));
        $this->save_user_activity(array('section' => 'User', 'activity' => 'User Deleted for user id :' . $id, 'user_id' => $this->session->userdata('user_id'), 'date' => date('Y-m-d H:i:s')));
        if ($result) {
            redirect_with_msg('backend/user', 'successfully deleted');
        } else
            redirect_with_msg('backend/user', 'Not deleted');
    }

    function deleteUser($id = false) {
        // $existData=$this->m_common->get_row_array('projects',array('projects_id'=>$id),'image');
        $id = $this->input->post('user_id');
        $result = $this->m_common->update_row('users', array('user_id' => $id), array('is_delete' => 1, 'is_active' => 0));
        if ($result) {
            $this->save_user_activity(array('section' => 'User', 'activity' => 'User Deleted for user id :' . $id, 'user_id' => $this->session->userdata('user_id'), 'date' => date('Y-m-d H:i:s')));
            $data["status"] = "success";
        } else
            $data["status"] = "failed";
        echo json_encode($data);
    }

    function assign_user() {
        $this->setOutputMode(NORMAL);
        $postData = $this->input->post();
        $insertData = array();
        $edit_id = $postData['user_edit_id'];
        $insertData['project_id'] = $postData['project_id'];
        $insertData['department_id'] = $postData['dept_id'];
        $insertData['user_id'] = $postData['user_id'];
        $insertData['user_type'] = $postData['role'];
        $insertData['created_by'] = $this->session->userdata('user_id');
        if (empty($edit_id)) {
            $insertData['created'] = date('Y-m-d');
            $insertData['is_active'] = '1';
            $id = $this->m_common->insert_row('assign_user', $insertData);
            if (!empty($id)) {
                $sql = "select au.*,u.username,d.dept_name  from assign_user au join users u on au.user_id=u.user_id left join department d on au.department_id=d.dept_id where au.assign_user_id=$id and au.is_active=1";
                $data = $this->m_common->customeQuery($sql);
                echo json_encode(array('status' => 'success', 'data' => $data[0]));
            } else {
                echo json_encode(array('status' => 'failed'));
            }
        } else {
            $insertData['modified'] = date('Y-m-d');
            $result = $this->m_common->update_row('assign_user', array('assign_user_id' => $edit_id), $insertData);
            if (!empty($result)) {
                $sql = "select au.*,u.username,d.dept_name  from assign_user au join users u on au.user_id=u.user_id left join department d on au.department_id=d.dept_id where au.project_id=" . $postData['project_id'] . " and au.is_active=1";
                $data = $this->m_common->customeQuery($sql);
                echo json_encode(array('status' => 'success', 'data' => $data));
            } else {
                echo json_encode(array('status' => 'failed'));
            }
        }
    }

    function deleteassign_user_id() {
        $this->setOutputMode(NORMAL);
        $id = $this->input->post('assign_user_id');
        $project_id = $this->input->post('project_id');
        $result = $this->m_common->update_row('assign_user', array('assign_user_id' => $id), array('is_delete' => 1, 'is_active' => 0));
        if (!empty($result)) {
            $sql = "select au.*,u.username,d.dept_name  from assign_user au join users u on au.user_id=u.user_id left join department d on au.department_id=d.dept_id where au.project_id=$project_id and au.is_active=1";
            $data = $this->m_common->customeQuery($sql);
            echo json_encode(array('status' => 'success', 'data' => $data));
        } else {
            echo json_encode(array('status' => 'failed'));
        }
    }

    function get_assign_user_id() {
        $this->setOutputMode(NORMAL);
        $id = $this->input->post('assign_user_id');
        if (!empty($id)) {
            $sql = "select au.*,u.username,d.dept_name  from assign_user au join users u on au.user_id=u.user_id left join department d on au.department_id=d.dept_id where au.assign_user_id=$id and au.is_active=1";
            $data = $this->m_common->customeQuery($sql);
            echo json_encode(array('status' => 'success', 'data' => $data[0]));
        } else {
            echo json_encode(array('status' => 'failed'));
        }
    }

    function get_dept_task_list() {
        $this->setOutputMode(NORMAL);
        $dept_id = $this->input->post('dept_id');
        $project_id = $this->input->post('project_id');
        $data['parent_tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'parent_task_id' => null, 'sub_task_id' => null, 'is_active' => 1), '*', '', '', 'position', 'asc');
        if(!empty($dept_id) && !empty($project_id)){
            $n_total=0;
            $sql = "select t.*,dt.*,u.username from task t 
left join department_task dt on dt.task_id=t.task_id 
left join users u on u.user_id=dt.moderator where t.project_id=$project_id and dt.dept_id=$dept_id and t.is_active=1";
            $data['task'] = $this->m_common->customeQuery($sql);
            foreach($data['parent_tasks'] as $key=>$value){           
               $s_sql="select sum(total) as g_total from department_task dt left join task t on dt.task_id=t.task_id  where dt.project_id=$project_id and dt.dept_id=$dept_id and t.parent_task_id=".$value['task_id'];
               $total = $this->m_common->customeQuery($s_sql);
               $data['parent_tasks'][$key]['total']=$total[0]['g_total'];
               $n_total=$n_total+$total[0]['g_total'];
                
            }
                        
            $data['net_total']=$n_total;   
            
            echo json_encode(array('status' => 'success', 'data' => $data));
        } else {
            echo json_encode(array('status' => 'failed'));
        }
    }

    function get_moderator() {
        $this->setOutputMode(NORMAL);
        $dept_id = $this->input->post('dept_id');
        $project_id = $this->input->post('project_id');
        $task_id = $this->input->post('id');
        if (!empty($dept_id) && !empty($project_id)) {
            $sql = "select au.*,u.username from assign_user au join users u on au.user_id=u.user_id where au.project_id=$project_id and au.department_id=$dept_id and au.is_active=1";
            $data = $this->m_common->customeQuery($sql);
            $task = array('start_date' => '', 'end_date' => '', 'moderator' => '');
            if (!empty($task_id)) {
                $sql = "select t.*,dt.start_date,dt.end_date,dt.moderator,u.username from task t 
left join department_task dt on dt.task_id=t.task_id 
left join users u on u.user_id=dt.moderator where t.project_id=$project_id and t.task_id=$task_id and dt.dept_id=$dept_id and t.is_active=1";
                $exists = $this->m_common->customeQuery($sql);
                if (!empty($exists)) {
                    $task = array('start_date' => date('d/m/Y', strtotime($exists[0]['start_date'])), 'end_date' => date('d/m/Y', strtotime($exists[0]['end_date'])), 'moderator' => $exists[0]['moderator']);
                }
            }
            echo json_encode(array('status' => 'success', 'data' => $data, 'task' => $task));
        } else {
            echo json_encode(array('status' => 'failed'));
        }
    }

    function set_moderator() {
        $this->setOutputMode(NORMAL);
        $dept_id = $this->input->post('dept_id');
        $project_id = $this->input->post('project_id');
        $task_id = $this->input->post('id');
        $rate = $this->input->post('rate');
        $remarks = $this->input->post('remarks');
        $total = $this->input->post('t_amount');
        $unit = $this->input->post('unit');
        $qty = $this->input->post('qty');
        $specification = $this->input->post('specification');
        $start_date = date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('start_date'))));
        $end_date = date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('end_date'))));
//        $res = $this->m_common->get_row_array('department_task', array('task_id' => $task_id, 'dept_id' => $dept_id, 'project_id' => $project_id), '*');
//        if (!empty($res)) {
//            $this->m_common->update_row('department_task', array('dept_task_id' => $res[0]['dept_task_id']), array('rate' => $rate,'remark'=>$remarks,'total'=>$total,'qty'=>$qty,'unit'=>$unit,'meterial_specification'=>$specification, 'start_date' => $start_date, 'end_date' => $end_date));
//           // $user = $this->m_common->get_row_array('users', array('user_id' => $moderator), 'username');
//            echo json_encode(array('status' => 'success'));
//        } else {
//            $this->m_common->insert_row('department_task', array('rate' => $rate,'remark'=>$remarks,'total'=>$total,'qty'=>$qty,'unit'=>$unit,'meterial_specification'=>$specification, 'start_date' => $start_date, 'end_date' => $end_date, 'task_id' => $task_id, 'dept_id' => $dept_id, 'project_id' => $project_id));
//            //$user = $this->m_common->get_row_array('users', array('user_id' => $moderator), 'username');
//            echo json_encode(array('status' => 'success'));
//        }

        //$tasks = $this->m_common->get_row_array('task', array('parent_task_id' => $task_id), '*');
//        foreach ($tasks as $row) {
            $res = $this->m_common->get_row_array('department_task', array('task_id' => $task_id, 'dept_id' => $dept_id, 'project_id' => $project_id), '*');
            if (!empty($res)) {
                $this->m_common->update_row('department_task', array('dept_task_id' => $res[0]['dept_task_id']), array('rate' => $rate,'remark'=>$remarks,'total'=>$total,'qty'=>$qty,'unit'=>$unit,'meterial_specification'=>$specification, 'start_date' => $start_date, 'end_date' => $end_date));
                //$user = $this->m_common->get_row_array('users', array('user_id' => $moderator), 'username');
                echo json_encode(array('status' => 'success'));
            } else {
                $this->m_common->insert_row('department_task', array('rate' => $rate,'remark'=>$remarks,'total'=>$total,'qty'=>$qty,'unit'=>$unit,'meterial_specification'=>$specification, 'start_date' => $start_date, 'end_date' => $end_date, 'task_id' => $task_id, 'dept_id' => $dept_id, 'project_id' => $project_id));
               // $user = $this->m_common->get_row_array('users', array('user_id' => $moderator), 'username');
                echo json_encode(array('status' => 'success'));
            }
//        }
    }

    function get_enrolled_status() {
        $this->setOutputMode(NORMAL);
        $dept_id = $this->input->post('dept_id');
        $project_id = $this->input->post('project_id');
        $task_id = $this->input->post('id');
        if (!empty($dept_id) && !empty($project_id)) {
            $sql = "select GROUP_CONCAT(dts.status_id) as status_id from department_task_status dts left JOIN project_status ps on ps.status_id=dts.status_id where dts.project_id=$project_id and dts.is_active=1 and dts.task_id=$task_id and dts.dept_id=$dept_id group by dts.task_id";
            //echo $sql;exit;
            $exists = $this->m_common->customeQuery($sql);
            if (!empty($exists)) {
                $sql = "select * from project_status where dept_id=$dept_id and project_id=$project_id and status_id not in (" . $exists[0]['status_id'] . ")";
                $project_status = $this->m_common->customeQuery($sql);
            } else {
                $project_status = $this->m_common->get_row_array('project_status', array('dept_id' => $dept_id, 'project_id' => $project_id), '*');
            }
            $sql = "select dts.*,ps.status_name,t.task_name from department_task_status dts left JOIN project_status ps on ps.status_id=dts.status_id LEFT JOIN task t on dts.task_id=t.task_id where dts.project_id=$project_id and dts.is_active=1 and dts.task_id=$task_id and dts.dept_id=$dept_id";
            $data = $this->m_common->customeQuery($sql);
            echo json_encode(array('status' => 'success', 'data' => $data, 'project_status' => $project_status));
        } else {
            echo json_encode(array('status' => 'failed'));
        }
    }

    function get_multiple_status() {
        $this->setOutputMode(NORMAL);
        $dept_id = $this->input->post('dept_id');
        $project_id = $this->input->post('project_id');
        if (!empty($dept_id) && !empty($project_id)) {
            $project_status = $this->m_common->get_row_array('project_status', array('dept_id' => $dept_id, 'project_id' => $project_id), '*');
            echo json_encode(array('status' => 'success', 'project_status' => $project_status));
        } else {
            echo json_encode(array('status' => 'failed'));
        }
    }

    function save_department_task_status() {
        $this->setOutputMode(NORMAL);
        $dept_id = $this->input->post('dept_id');
        $project_id = $this->input->post('project_id');
        $task_id = $this->input->post('id');
        $status = $this->input->post('status');
        $dept_task_status_id = $this->input->post('dept_task_status_id');
        $percentage = $this->input->post('percentage');
        if (!empty($dept_id) && !empty($project_id)) {
            if (!empty($dept_task_status_id))
                $id = $this->m_common->update_row('department_task_status', array('dept_task_status_id' => $dept_task_status_id), array('percentage' => $percentage, 'status_id' => $status, 'modified' => date('Y-m-d')));
            else
                $id = $this->m_common->insert_row('department_task_status', array('task_id' => $task_id, 'is_active' => 1, 'dept_id' => $dept_id, 'project_id' => $project_id, 'percentage' => $percentage, 'status_id' => $status, 'created' => date('Y-m-d'), 'created_by' => $this->session->userdata('user_id')));


            $sql = "select GROUP_CONCAT(dts.status_id) as status_id from department_task_status dts left JOIN project_status ps on ps.status_id=dts.status_id where dts.project_id=$project_id and dts.is_active=1 and dts.task_id=$task_id and dts.dept_id=$dept_id group by dts.task_id";
            $exists = $this->m_common->customeQuery($sql);
            if (!empty($exists)) {
                $sql = "select * from project_status where dept_id=$dept_id and project_id=$project_id and status_id not in (" . $exists[0]['status_id'] . ")";
                $project_status = $this->m_common->customeQuery($sql);
            } else {
                $project_status = $this->m_common->get_row_array('project_status', array('dept_id' => $dept_id, 'project_id' => $project_id), '*');
            }

            $sql = "select dts.*,ps.status_name from department_task_status dts left JOIN project_status ps on ps.status_id=dts.status_id where dts.project_id=$project_id and dts.is_active=1 and dts.task_id=$task_id and dts.dept_id=$dept_id";
            $data = $this->m_common->customeQuery($sql);
            echo json_encode(array('status' => 'success', 'data' => $data, 'project_status' => $project_status));
        } else {
            echo json_encode(array('status' => 'failed'));
        }
    }

    function save_multiple_department_task_status() {
        $this->setOutputMode(NORMAL);
        $dept_id = $this->input->post('dept_id');
        $project_id = $this->input->post('project_id');
        $task_ids = $this->input->post('task_ids');
        $status = $this->input->post('status');
        $percentage = $this->input->post('percentage');
        if (!empty($dept_id) && !empty($project_id)) {
            foreach ($task_ids as $task_id) {
                $sql = "select dts.dept_task_status_id from department_task_status dts left JOIN project_status ps on ps.status_id=dts.status_id where dts.project_id=$project_id and dts.is_active=1 and dts.task_id=$task_id and dts.status_id = $status and dts.dept_id=$dept_id";
                $dept_task_status_id = $this->m_common->customeQuery($sql);

                if (!empty($dept_task_status_id))
                    $id = $this->m_common->update_row('department_task_status', array('dept_task_status_id' => $dept_task_status_id[0]['dept_task_status_id']), array('percentage' => $percentage, 'status_id' => $status, 'modified' => date('Y-m-d')));
                else
                    $id = $this->m_common->insert_row('department_task_status', array('task_id' => $task_id, 'is_active' => 1, 'dept_id' => $dept_id, 'project_id' => $project_id, 'percentage' => $percentage, 'status_id' => $status, 'created' => date('Y-m-d'), 'created_by' => $this->session->userdata('user_id')));
                // $sql = "select dts.*,ps.status_name from department_task_status dts left JOIN project_status ps on ps.status_id=dts.status_id where dts.project_id=$project_id and dts.is_active=1 and dts.task_id=$task_id and dts.dept_id=$dept_id";
                // $data[] = $this->m_common->customeQuery($sql);
                $sql = "select dts.*,ps.status_name from department_task_status dts left JOIN project_status ps on ps.status_id=dts.status_id where dts.project_id=$project_id and dts.is_active=1 and dts.status_id=$status limit 1";
                $data = $this->m_common->customeQuery($sql);
            }
            echo json_encode(array('status' => 'success', 'data' => $data));
        } else {
            echo json_encode(array('status' => 'failed'));
        }
    }

    function set_date() {
        $this->setOutputMode(NORMAL);
        $dept_id = $this->input->post('dept_id');
        $project_id = $this->input->post('project_id');
        $task_ids = $this->input->post('task_ids');
        $start_date = date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('start_date'))));
        $end_date = date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('end_date'))));
        if (!empty($dept_id) && !empty($project_id)) {
            foreach ($task_ids as $task_id) {
                $res = $this->m_common->get_row_array('department_task', array('task_id' => $task_id, 'dept_id' => $dept_id, 'project_id' => $project_id), '*');
                if (!empty($res)) {
                    $this->m_common->update_row('department_task', array('dept_task_id' => $res[0]['dept_task_id']), array('start_date' => $start_date, 'end_date' => $end_date));
                } else {
                    $this->m_common->insert_row('department_task', array('start_date' => $start_date, 'end_date' => $end_date, 'task_id' => $task_id, 'dept_id' => $dept_id, 'project_id' => $project_id));
                }
            }
            $sql = "select t.*,dt.start_date,dt.end_date,dt.moderator,u.username from task t 
left join department_task dt on dt.task_id=t.task_id 
left join users u on u.user_id=dt.moderator where t.project_id=$project_id and dt.dept_id=$dept_id and t.is_active=1";
            $data = $this->m_common->customeQuery($sql);
            echo json_encode(array('status' => 'success', 'data' => $data));
        } else {
            echo json_encode(array('status' => 'failed'));
        }
    }

    function get_dept_task_status() {
        $this->setOutputMode(NORMAL);
        $id = $this->input->post('id');
        if (!empty($id)) {
            $exists = $this->m_common->get_row_array('department_task_status', array('dept_task_status_id' => $id), "*");
            $dept_id = $exists[0]['dept_id'];
            $project_id = $exists[0]['project_id'];
            $task_id = $exists[0]['task_id'];

            $sql = "select dts.*,ps.status_name from department_task_status dts left JOIN project_status ps on ps.status_id=dts.status_id where dts.dept_task_status_id=$id and dts.is_active=1";
            $data = $this->m_common->customeQuery($sql);

            $project_status = $this->m_common->get_row_array('project_status', array('dept_id' => $dept_id, 'project_id' => $project_id), '*');


            echo json_encode(array('status' => 'success', 'data' => $data[0], 'project_status' => $project_status));
        } else {
            echo json_encode(array('status' => 'failed'));
        }
    }

    function delete_dept_task_status() {
        $this->setOutputMode(NORMAL);
        $dept_task_status_id = $this->input->post('id');
        if (!empty($dept_task_status_id)) {
            $exists = $this->m_common->get_row_array('department_task_status', array('dept_task_status_id' => $dept_task_status_id), "*");
            $dept_id = $exists[0]['dept_id'];
            $project_id = $exists[0]['project_id'];
            $task_id = $exists[0]['task_id'];

            $this->m_common->update_row('department_task_status', array('dept_task_status_id' => $dept_task_status_id), array('is_active' => '0'));
            $sql = "select GROUP_CONCAT(dts.status_id) as status_id from department_task_status dts left JOIN project_status ps on ps.status_id=dts.status_id where dts.project_id=$project_id and dts.is_active=1 and dts.task_id=$task_id and dts.dept_id=$dept_id group by dts.task_id";
            $exists = $this->m_common->customeQuery($sql);
            if (!empty($exists)) {
                $sql = "select * from project_status where dept_id=$dept_id and project_id=$project_id and status_id not in (" . $exists[0]['status_id'] . ")";
                $project_status = $this->m_common->customeQuery($sql);
            } else {
                $project_status = $this->m_common->get_row_array('project_status', array('dept_id' => $dept_id, 'project_id' => $project_id), '*');
            }

            echo json_encode(array('status' => 'success', 'project_status' => $project_status));
        } else {
            echo json_encode(array('status' => 'failed'));
        }
    }

    function getTaskValue() {
        $this->setOutputMode(NORMAL);
        $project_id = $this->input->post('project_id');
        $dept_id = $this->input->post('dept_id');
        $task_id = $this->input->post('task_id');
        $t=$this->m_common->customeQuery("SELECT t.task_name, dt.* FROM task as t RIGHT JOIN department_task as dt ON t.task_id=dt.task_id WHERE dt.project_id=$project_id AND dt.dept_id=$dept_id AND t.task_id=$task_id");
        //$t = $this->m_common->get_row_array('department_task', array('project_id' => $project_id, 'dept_id' => $dept_id, 'task_id' => $task_id), '*');
        $data['taskvalue'] = !empty($t) ? $t[0] : '';
        echo json_encode($data);
    }
    function getRiskLevel() {
        $this->setOutputMode(NORMAL);
        $project_id = $this->input->post('project_id');
        $dept_id = $this->input->post('dept_id');
        $task_id = $this->input->post('task_id');
        $data['risk'] = $this->m_common->get_row_array('task_risk_lavel', array('project_id' => $project_id, 'dept_id' => $dept_id, 'task_id' => $task_id), '*');
        echo json_encode($data);
    }

    function saveRiskLevel() {
        $this->setOutputMode(NORMAL);
        $postData = $this->input->post();
        $user_id = $this->session->userdata('user_id');
        $project_id = $this->input->post('project_id');
        $dept_id = $this->input->post('dept_id');
        $task_id = $this->input->post('task_id');
        $this->m_common->delete_row('task_risk_lavel', array('project_id' => $project_id, 'dept_id' => $dept_id, 'task_id' => $task_id));
        foreach ($postData['risk'] as $risk) {
            $task_risk_level = array();
            $task_risk_level['project_id'] = $project_id;
            $task_risk_level['dept_id'] = $dept_id;
            $task_risk_level['task_id'] = $task_id;
            $task_risk_level['rist_lavel'] = $risk['rist_lavel'];
            $task_risk_level['above'] = $risk['above'];
            $task_risk_level['below'] = $risk['below'];
            $task_risk_level['created_by'] = $user_id;
            $task_risk_level['created'] = date('Y-m-d');
            $result = $this->m_common->insert_row('task_risk_lavel', $task_risk_level);
        }
        if (!empty($result)) {
            $data["status"] = "success";
        } else {
            $data["status"] = "failed";
        }
        echo json_encode($data);
    }

    function validate_user() {
        $this->setOutputMode(NORMAL);
        $pass = md5($this->input->post('pass'));
        if (!empty($pass)) {
            $valid = $this->m_common->get_row_array('users', array('user_id' => $this->user_id, 'password' => $pass), 'user_id');
            if (!empty($valid))
                echo json_encode(array('status' => 'success'));
            else
                echo json_encode(array('status' => 'failed'));
        } else {
            echo json_encode(array('status' => 'failed'));
        }
    }

    function change_toogle() {
        $this->setOutputMode(NORMAL);
        $toogle = $this->session->userdata('toogle');
        if ($toogle == 'close') {
            $this->session->set_userdata('toogle', 'open');
        } else {
            $this->session->set_userdata('toogle', 'close');
        }
        echo 'true';
    }

    function check_username() {
        $this->setOutputMode(NORMAL);
        $username = $this->input->post('username');
        $exists = $this->m_common->get_row_array('users', array('username' => $username), '*');
        if (empty($exists)) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }

}
