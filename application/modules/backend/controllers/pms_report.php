<?php

/*
 * Author: fouraxiz
 * Purpose: This Controller is using for login process
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class pms_report extends Site_Controller {

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

    function soFarCostReport() {
        $this->menu = 'report';
        $this->sub_menu = 'so_far_cost';
        $this->titlebackend("View Project");
        $project_id = $this->input->post('project_id');
        $proj = $this->m_common->get_row_array('projects', array('project_id' => $project_id), '*');
        $start_date = str_replace('/', '-', $this->input->post('start_date'));
        $end_date = str_replace('/', '-', $this->input->post('end_date'));
        if (!empty($project_id)) {
            if (!empty($start_date) && !empty($end_date)) {
                $start_date = date('Y-m-d', strtotime($start_date));
                $end_date = date('Y-m-d', strtotime($end_date));
            } elseif (!empty($start_date) && empty($end_date)) {
                $start_date = date('Y-m-d', strtotime($start_date));
                $end_date = $proj[0]['scheduled_completion_date'];
            } elseif (empty($start_date) && !empty($end_date)) {
                $start_date = $proj[0]['execution_start_date'];
                $end_date = date('Y-m-d', strtotime($start_date));
            } else {
                $start_date = ''; //$proj[0]['execution_start_date'];
                $end_date = ''; //$proj[0]['scheduled_completion_date'];
            }
            $sql = "select sum(dept_value) as toal_dept_value from department where project_id=" . $project_id . ' and is_active=1';
            $total_dept_value = $this->m_common->customeQuery($sql);
            $data['dept_ramain_value'] = 100 - $total_dept_value[0]['toal_dept_value'];
            $data['departments'] = $this->m_common->get_row_array('department', array('project_id' => $project_id, 'is_active' => 1), '*');
            $sql = "select projects.*,pt.type,project_owner.fullname as owner_name,contractor.fullname as contractor_name,currencies.title,currencies.symbol_left from projects left join project_owner on projects.project_owner=project_owner.project_owner_id left join contractor on projects.contractor=contractor.contractor_id left join currencies on projects.equivalent_currency=currencies.currencies_id left join project_type pt on projects.type=pt.type_id where project_id=" . $project_id;
            $data['project_info'] = $this->m_common->customeQuery($sql);
            $currency_sql = "select project_currency.*,currencies.title,currencies.symbol_left from project_currency left join currencies on project_currency.currency_id=currencies.currencies_id where project_id=" . $project_id;
            $data['project_currency_info'] = $this->m_common->customeQuery($currency_sql);

            $n_total = 0;
            $n_total_cons = 0;

            foreach ($data['departments'] as $d => $dept) {
                $sql = "select t.*,dt.dept_task_id,dt.start_date,dt.end_date,dt.`status`,dt.meterial_specification,dt.unit,dt.qty,dt.rate,dt.total,dt.consumption_amount,dt.remark,dt.report from task t left join department_task dt on t.task_id = dt.task_id where t.project_id=$project_id and t.parent_task_id is null and t.sub_task_id is null and t.is_active=1 order by t.position,t.task_id asc";
                $data['tasks'] = $tasks = $this->m_common->customeQuery($sql);
                foreach ($data['tasks'] as $key => $value) {
                    $s_sql = "select sum(total) as g_total,sum(consumption_amount) as g_cons_amount from department_task dt left join task t on dt.task_id=t.task_id  where dt.project_id=$project_id and dt.dept_id=" . $dept['dept_id'] . " and t.parent_task_id=" . $value['task_id'];
                    $total = $this->m_common->customeQuery($s_sql);
                    $data['tasks'][$key]['total'] = $total[0]['g_total'];
                    $n_total = $n_total + $total[0]['g_total'];

                    $data['tasks'][$key]['total_cons'] = $total[0]['g_cons_amount'];
                    $n_total_cons = $n_total_cons + $total[0]['g_cons_amount'];
                    if (empty($start_date))
                        $sql = "select t.*,dt.dept_task_id,dt.start_date,dt.end_date,dt.`status`,dt.meterial_specification,dt.unit,dt.qty,dt.rate,dt.total,dt.consumption_amount,dt.remark,dt.report from task t left join department_task dt on t.task_id = dt.task_id where dt.dept_id='" . $dept['dept_id'] . "' and t.project_id=$project_id and t.parent_task_id='" . $value['task_id'] . "' and t.sub_task_id is null and t.is_active=1 order by t.position asc";
                    else
                        $sql = "select t.*,dt.dept_task_id,dt.start_date,dt.end_date,dt.`status`,dt.meterial_specification,dt.unit,dt.qty,dt.rate,dt.total,dt.consumption_amount,dt.remark,dt.report from task t left join department_task dt on t.task_id = dt.task_id where dt.dept_id='" . $dept['dept_id'] . "' and t.project_id=$project_id and t.parent_task_id='" . $value['task_id'] . "' and t.sub_task_id is null and t.is_active=1 and (dt.start_date>='" . $start_date . "' and dt.end_date<='" . $end_date . "') order by t.position asc";
                    $data['tasks'][$key]['sub_tasks'] = $tasks[$key]['sub_tasks'] = $this->m_common->customeQuery($sql);
                    if (!empty($data['tasks'][$key]['sub_tasks'])) {
                        foreach ($data['tasks'][$key]['sub_tasks'] as $key1 => $value1) {
                            $t = $value1['dept_task_id'];
                            if (empty($start_date))
                                $sql = "select t.*,dt.dept_task_id,dt.start_date,dt.end_date,dt.`status`,dt.meterial_specification,dt.unit,dt.qty,dt.rate,dt.total,dt.consumption_amount,dt.remark,dt.report from task t left join department_task dt on t.task_id = dt.task_id where dt.dept_id='" . $dept['dept_id'] . "' and t.project_id=$project_id and t.sub_task_id='" . $value1['task_id'] . "' and t.is_active=1 order by t.position asc";
                            else
                                $sql = "select t.*,dt.dept_task_id,dt.start_date,dt.end_date,dt.`status`,dt.meterial_specification,dt.unit,dt.qty,dt.rate,dt.total,dt.consumption_amount,dt.remark,dt.report from task t left join department_task dt on t.task_id = dt.task_id where dt.dept_id='" . $dept['dept_id'] . "' and t.project_id=$project_id and t.sub_task_id='" . $value1['task_id'] . "' and t.is_active=1 and (dt.start_date>='" . $start_date . "' and dt.end_date<='" . $end_date . "') order by t.position asc";
                            $data['tasks'][$key]['sub_tasks'][$key1]['sub_sub_tasks'] = $tasks[$key]['sub_tasks'][$key1]['sub_sub_tasks'] = $this->m_common->customeQuery($sql);
                        }
                    }
                }
                $data['departments'][$d]['tasks'] = $data['tasks'];
            }
            $data['net_total'] = $n_total;
            $data['net_total_cons'] = $n_total_cons;
            $data['net_total_remaining'] = $n_total - $n_total_cons;
            $data['project_id'] = $project_id;
            $data['start_date'] = $start_date;
            $data['end_date'] = $end_date;


            $data['projects'] = $this->m_common->get_row_array('projects', '', '*');
            $this->load->view('project/v_so_far_cost', $data);
        } else {

            $data['projects'] = $this->m_common->get_row_array('projects', '', '*');
            $this->load->view('project/v_so_far_cost', $data);
        }
    }

    function remainingCostReport() {
        $this->menu = 'report';
        $this->sub_menu = 'remaining_cost';
        $this->titlebackend("View Project");
        $project_id = $this->input->post('project_id');
        $proj = $this->m_common->get_row_array('projects', array('project_id' => $project_id), '*');
        $start_date = str_replace('/', '-', $this->input->post('start_date'));
        $end_date = str_replace('/', '-', $this->input->post('end_date'));
        if (!empty($project_id)) {
            if (!empty($start_date) && !empty($end_date)) {
                $start_date = date('Y-m-d', strtotime($start_date));
                $end_date = date('Y-m-d', strtotime($end_date));
            } elseif (!empty($start_date) && empty($end_date)) {
                $start_date = date('Y-m-d', strtotime($start_date));
                $end_date = $proj[0]['scheduled_completion_date'];
            } elseif (empty($start_date) && !empty($end_date)) {
                $start_date = $proj[0]['execution_start_date'];
                $end_date = date('Y-m-d', strtotime($start_date));
            } else {
                $start_date = ''; //$proj[0]['execution_start_date'];
                $end_date = ''; //$proj[0]['scheduled_completion_date'];
            }
            $sql = "select sum(dept_value) as toal_dept_value from department where project_id=" . $project_id . ' and is_active=1';
            $total_dept_value = $this->m_common->customeQuery($sql);
            $data['dept_ramain_value'] = 100 - $total_dept_value[0]['toal_dept_value'];
            $data['departments'] = $this->m_common->get_row_array('department', array('project_id' => $project_id, 'is_active' => 1), '*');
            $sql = "select projects.*,pt.type,project_owner.fullname as owner_name,contractor.fullname as contractor_name,currencies.title,currencies.symbol_left from projects left join project_owner on projects.project_owner=project_owner.project_owner_id left join contractor on projects.contractor=contractor.contractor_id left join currencies on projects.equivalent_currency=currencies.currencies_id left join project_type pt on projects.type=pt.type_id where project_id=" . $project_id;
            $data['project_info'] = $this->m_common->customeQuery($sql);
            $currency_sql = "select project_currency.*,currencies.title,currencies.symbol_left from project_currency left join currencies on project_currency.currency_id=currencies.currencies_id where project_id=" . $project_id;
            $data['project_currency_info'] = $this->m_common->customeQuery($currency_sql);

            $n_total = 0;
            $n_total_cons = 0;

            foreach ($data['departments'] as $d => $dept) {
                $sql = "select t.*,dt.dept_task_id,dt.start_date,dt.end_date,dt.`status`,dt.meterial_specification,dt.unit,dt.qty,dt.rate,dt.total,dt.consumption_amount,dt.remark,dt.report from task t left join department_task dt on t.task_id = dt.task_id where t.project_id=$project_id and t.parent_task_id is null and t.sub_task_id is null and t.is_active=1 order by t.position,t.task_id asc";
                $data['tasks'] = $tasks = $this->m_common->customeQuery($sql);
                foreach ($data['tasks'] as $key => $value) {
                    $s_sql = "select sum(total) as g_total,sum(consumption_amount) as g_cons_amount from department_task dt left join task t on dt.task_id=t.task_id  where dt.project_id=$project_id and dt.dept_id=" . $dept['dept_id'] . " and t.parent_task_id=" . $value['task_id'];
                    $total = $this->m_common->customeQuery($s_sql);
                    $data['tasks'][$key]['total'] = $total[0]['g_total'];
                    $n_total = $n_total + $total[0]['g_total'];

                    $data['tasks'][$key]['total_cons'] = $total[0]['g_cons_amount'];
                    $n_total_cons = $n_total_cons + $total[0]['g_cons_amount'];
                    if (empty($start_date))
                        $sql = "select t.*,dt.dept_task_id,dt.start_date,dt.end_date,dt.`status`,dt.meterial_specification,dt.unit,dt.qty,dt.rate,dt.total,dt.consumption_amount,dt.remark,dt.report from task t left join department_task dt on t.task_id = dt.task_id where dt.dept_id='" . $dept['dept_id'] . "' and t.project_id=$project_id and t.parent_task_id='" . $value['task_id'] . "' and t.sub_task_id is null and t.is_active=1 order by t.position asc";
                    else
                        $sql = "select t.*,dt.dept_task_id,dt.start_date,dt.end_date,dt.`status`,dt.meterial_specification,dt.unit,dt.qty,dt.rate,dt.total,dt.consumption_amount,dt.remark,dt.report from task t left join department_task dt on t.task_id = dt.task_id where dt.dept_id='" . $dept['dept_id'] . "' and t.project_id=$project_id and t.parent_task_id='" . $value['task_id'] . "' and t.sub_task_id is null and t.is_active=1 and (dt.start_date>='" . $start_date . "' and dt.end_date<='" . $end_date . "') order by t.position asc";
                    $data['tasks'][$key]['sub_tasks'] = $tasks[$key]['sub_tasks'] = $this->m_common->customeQuery($sql);
                    if (!empty($data['tasks'][$key]['sub_tasks'])) {
                        foreach ($data['tasks'][$key]['sub_tasks'] as $key1 => $value1) {
                            $t = $value1['dept_task_id'];
                            if (empty($start_date))
                                $sql = "select t.*,dt.dept_task_id,dt.start_date,dt.end_date,dt.`status`,dt.meterial_specification,dt.unit,dt.qty,dt.rate,dt.total,dt.consumption_amount,dt.remark,dt.report from task t left join department_task dt on t.task_id = dt.task_id where dt.dept_id='" . $dept['dept_id'] . "' and t.project_id=$project_id and t.sub_task_id='" . $value1['task_id'] . "' and t.is_active=1 order by t.position asc";
                            else
                                $sql = "select t.*,dt.dept_task_id,dt.start_date,dt.end_date,dt.`status`,dt.meterial_specification,dt.unit,dt.qty,dt.rate,dt.total,dt.consumption_amount,dt.remark,dt.report from task t left join department_task dt on t.task_id = dt.task_id where dt.dept_id='" . $dept['dept_id'] . "' and t.project_id=$project_id and t.sub_task_id='" . $value1['task_id'] . "' and t.is_active=1 and (dt.start_date>='" . $start_date . "' and dt.end_date<='" . $end_date . "') order by t.position asc";
                            $data['tasks'][$key]['sub_tasks'][$key1]['sub_sub_tasks'] = $tasks[$key]['sub_tasks'][$key1]['sub_sub_tasks'] = $this->m_common->customeQuery($sql);
                        }
                    }
                }
                $data['departments'][$d]['tasks'] = $data['tasks'];
            }
            $data['net_total'] = $n_total;
            $data['net_total_cons'] = $n_total_cons;
            $data['net_total_remaining'] = $n_total - $n_total_cons;
            $data['project_id'] = $project_id;
            $data['start_date'] = $start_date;
            $data['end_date'] = $end_date;

            $data['projects'] = $this->m_common->get_row_array('projects', '', '*');
            $this->load->view('project/v_remaining_cost', $data);
        } else {
            $data['projects'] = $this->m_common->get_row_array('projects', '', '*');
            $this->load->view('project/v_remaining_cost', $data);
        }
    }

    function projectSummaryReport() {
        $this->menu = 'report';
        $this->sub_menu = 'project_summary';
        $this->titlebackend("View Project");
        $project_id = $this->input->post('project_id');
        $proj = $this->m_common->get_row_array('projects', array('project_id' => $project_id), '*');
        $start_date = str_replace('/', '-', $this->input->post('start_date'));
        $end_date = str_replace('/', '-', $this->input->post('end_date'));
        if (!empty($project_id)) {
            $data['project_summary'] = $this->m_common->get_row_array('project_summary', array('project_id' => $project_id), '*');
            $data['projects'] = $this->m_common->get_row_array('projects', '', '*');
            $data['project_id'] = $project_id;
            $this->load->view('project/v_project_summary', $data);
        } else {
            $data['projects'] = $this->m_common->get_row_array('projects', '', '*');
            $data['project_summary'] = $this->m_common->get_row_array('project_summary', '', '*');
            $this->load->view('project/v_project_summary', $data);
        }
    }

    function workScheduleReport() {
        $this->menu = 'report';
        $this->sub_menu = 'work_schedule';
        $this->titlebackend("View Project");
        $project_id = $this->input->post('project_id');
        $proj = $this->m_common->get_row_array('projects', array('project_id' => $project_id), '*');
        $start_date = str_replace('/', '-', $this->input->post('start_date'));
        $end_date = str_replace('/', '-', $this->input->post('end_date'));
        if (!empty($project_id)) {
            if (!empty($start_date) && !empty($end_date)) {
                $start_date = date('Y-m-d', strtotime($start_date));
                $end_date = date('Y-m-d', strtotime($end_date));
            } elseif (!empty($start_date) && empty($end_date)) {
                $start_date = date('Y-m-d', strtotime($start_date));
                $end_date = $proj[0]['scheduled_completion_date'];
            } elseif (empty($start_date) && !empty($end_date)) {
                $start_date = $proj[0]['execution_start_date'];
                $end_date = date('Y-m-d', strtotime($start_date));
            } else {
                $start_date = ''; //$proj[0]['execution_start_date'];
                $end_date = ''; //$proj[0]['scheduled_completion_date'];
            }
            $sql = "select sum(dept_value) as toal_dept_value from department where project_id=" . $project_id . ' and is_active=1';
            $total_dept_value = $this->m_common->customeQuery($sql);
            $data['dept_ramain_value'] = 100 - $total_dept_value[0]['toal_dept_value'];
            $data['departments'] = $this->m_common->get_row_array('department', array('project_id' => $project_id, 'is_active' => 1), '*');
            $sql = "select projects.*,pt.type,project_owner.fullname as owner_name,contractor.fullname as contractor_name,currencies.title,currencies.symbol_left from projects left join project_owner on projects.project_owner=project_owner.project_owner_id left join contractor on projects.contractor=contractor.contractor_id left join currencies on projects.equivalent_currency=currencies.currencies_id left join project_type pt on projects.type=pt.type_id where project_id=" . $project_id;
            $data['project_info'] = $this->m_common->customeQuery($sql);
            $currency_sql = "select project_currency.*,currencies.title,currencies.symbol_left from project_currency left join currencies on project_currency.currency_id=currencies.currencies_id where project_id=" . $project_id;
            $data['project_currency_info'] = $this->m_common->customeQuery($currency_sql);

            $n_total = 0;
            $n_total_cons = 0;

            foreach ($data['departments'] as $d => $dept) {
                $sql = "select t.*,dt.dept_task_id,dt.start_date,dt.end_date,dt.`status`,dt.meterial_specification,dt.unit,dt.qty,dt.rate,dt.total,dt.consumption_amount,dt.remark,dt.report from task t left join department_task dt on t.task_id = dt.task_id where t.project_id=$project_id and t.parent_task_id is null and t.sub_task_id is null and t.is_active=1 order by t.position,t.task_id asc";
                $data['tasks'] = $tasks = $this->m_common->customeQuery($sql);
                foreach ($data['tasks'] as $key => $value) {
                    $s_sql = "select sum(total) as g_total,sum(consumption_amount) as g_cons_amount from department_task dt left join task t on dt.task_id=t.task_id  where dt.project_id=$project_id and dt.dept_id=" . $dept['dept_id'] . " and t.parent_task_id=" . $value['task_id'];
                    $total = $this->m_common->customeQuery($s_sql);
                    $data['tasks'][$key]['total'] = $total[0]['g_total'];
                    $n_total = $n_total + $total[0]['g_total'];

                    $data['tasks'][$key]['total_cons'] = $total[0]['g_cons_amount'];
                    $n_total_cons = $n_total_cons + $total[0]['g_cons_amount'];
                    if (empty($start_date))
                        $sql = "select t.*,dt.dept_task_id,dt.start_date,dt.end_date,dt.`status`,dt.meterial_specification,dt.unit,dt.qty,dt.rate,dt.total,dt.consumption_amount,dt.remark,dt.report from task t left join department_task dt on t.task_id = dt.task_id where dt.dept_id='" . $dept['dept_id'] . "' and t.project_id=$project_id and t.parent_task_id='" . $value['task_id'] . "' and t.sub_task_id is null and t.is_active=1 order by t.position asc";
                    else
                        $sql = "select t.*,dt.dept_task_id,dt.start_date,dt.end_date,dt.`status`,dt.meterial_specification,dt.unit,dt.qty,dt.rate,dt.total,dt.consumption_amount,dt.remark,dt.report from task t left join department_task dt on t.task_id = dt.task_id where dt.dept_id='" . $dept['dept_id'] . "' and t.project_id=$project_id and t.parent_task_id='" . $value['task_id'] . "' and t.sub_task_id is null and t.is_active=1 and (dt.start_date>='" . $start_date . "' and dt.end_date<='" . $end_date . "') order by t.position asc";
                    $data['tasks'][$key]['sub_tasks'] = $tasks[$key]['sub_tasks'] = $this->m_common->customeQuery($sql);
                    if (!empty($data['tasks'][$key]['sub_tasks'])) {
                        foreach ($data['tasks'][$key]['sub_tasks'] as $key1 => $value1) {
                            $t = $value1['dept_task_id'];
                            if (empty($start_date))
                                $sql = "select t.*,dt.dept_task_id,dt.start_date,dt.end_date,dt.`status`,dt.meterial_specification,dt.unit,dt.qty,dt.rate,dt.total,dt.consumption_amount,dt.remark,dt.report from task t left join department_task dt on t.task_id = dt.task_id where dt.dept_id='" . $dept['dept_id'] . "' and t.project_id=$project_id and t.sub_task_id='" . $value1['task_id'] . "' and t.is_active=1 order by t.position asc";
                            else
                                $sql = "select t.*,dt.dept_task_id,dt.start_date,dt.end_date,dt.`status`,dt.meterial_specification,dt.unit,dt.qty,dt.rate,dt.total,dt.consumption_amount,dt.remark,dt.report from task t left join department_task dt on t.task_id = dt.task_id where dt.dept_id='" . $dept['dept_id'] . "' and t.project_id=$project_id and t.sub_task_id='" . $value1['task_id'] . "' and t.is_active=1 and (dt.start_date>='" . $start_date . "' and dt.end_date<='" . $end_date . "') order by t.position asc";
                            $data['tasks'][$key]['sub_tasks'][$key1]['sub_sub_tasks'] = $tasks[$key]['sub_tasks'][$key1]['sub_sub_tasks'] = $this->m_common->customeQuery($sql);
                        }
                    }
                }
                $data['departments'][$d]['tasks'] = $data['tasks'];
            }
            $data['net_total'] = $n_total;
            $data['net_total_cons'] = $n_total_cons;
            $data['net_total_remaining'] = $n_total - $n_total_cons;
            $data['project_id'] = $project_id;
            $data['start_date'] = $start_date;
            $data['end_date'] = $end_date;

            $data['projects'] = $this->m_common->get_row_array('projects', '', '*');
            $this->load->view('project/v_work_schedule', $data);
        } else {
            $data['projects'] = $this->m_common->get_row_array('projects', '', '*');
            $this->load->view('project/v_work_schedule', $data);
        }
    }

    function monthlyBudgetingCostReport() {
        $this->menu = 'report';
        $this->sub_menu = 'montly_budgeting_cost';
        $this->titlebackend("View Project");
        $project_id = $this->input->post('project_id');
        $segment_id = $this->input->post('segment_id');
        $task_id = $this->input->post('task_id');
        $proj = $this->m_common->get_row_array('projects', array('project_id' => $project_id), '*');
        $start_date = str_replace('/', '-', $this->input->post('start_date'));
        $end_date = str_replace('/', '-', $this->input->post('end_date'));
        if (!empty($project_id)) {
            if (!empty($start_date) && !empty($end_date)) {
                $start_date = date('Y-m-d', strtotime($start_date));
                $end_date = date('Y-m-d', strtotime($end_date));
            } elseif (!empty($start_date) && empty($end_date)) {
                $start_date = date('Y-m-d', strtotime($start_date));
                $end_date = $proj[0]['scheduled_completion_date'];
            } elseif (empty($start_date) && !empty($end_date)) {
                $start_date = $proj[0]['execution_start_date'];
                $end_date = date('Y-m-d', strtotime($start_date));
            } elseif (empty($segment_id) && !empty($task_id)) {
                $segment_id = $segment_id;
                $task_id = $task_id;
            } elseif (!empty($segment_id) && empty($task_id)) {
                $segment_id = $segment_id;
                $task_id = $task_id;
            } else {
                $start_date = ''; //$proj[0]['execution_start_date'];
                $end_date = ''; //$proj[0]['scheduled_completion_date'];
            }

            $sql = "select sum(dept_value) as toal_dept_value from department where project_id=" . $project_id . ' and is_active=1';
            $total_dept_value = $this->m_common->customeQuery($sql);
            $data['dept_ramain_value'] = 100 - $total_dept_value[0]['toal_dept_value'];
            if (!empty($_POST['segment_id']))
                $data['departments'] = $this->m_common->get_row_array('department', array('project_id' => $project_id, 'dept_id' => $_POST['segment_id'], 'is_active' => 1), '*');
            else
                $data['departments'] = $this->m_common->get_row_array('department', array('project_id' => $project_id, 'is_active' => 1), '*');
            $sql = "select projects.*,pt.type,project_owner.fullname as owner_name,contractor.fullname as contractor_name,currencies.title,currencies.symbol_left from projects left join project_owner on projects.project_owner=project_owner.project_owner_id left join contractor on projects.contractor=contractor.contractor_id left join currencies on projects.equivalent_currency=currencies.currencies_id left join project_type pt on projects.type=pt.type_id where project_id=" . $project_id;
            $data['project_info'] = $this->m_common->customeQuery($sql);
            $currency_sql = "select project_currency.*,currencies.title,currencies.symbol_left from project_currency left join currencies on project_currency.currency_id=currencies.currencies_id where project_id=" . $project_id;
            $data['project_currency_info'] = $this->m_common->customeQuery($currency_sql);

            $n_total = 0;
            $n_total_cons = 0;

            foreach ($data['departments'] as $d => $dept) {
                if (!empty($_POST['task_id']))
                    $sql = "select t.*,dt.dept_task_id,dt.start_date,dt.end_date,dt.`status`,dt.meterial_specification,dt.unit,dt.qty,dt.rate,dt.total,dt.consumption_amount,dt.remark,dt.report from task t left join department_task dt on t.task_id = dt.task_id where t.project_id=$project_id and t.task_id='".$_POST['task_id']."' and t.parent_task_id is null and t.sub_task_id is null and t.is_active=1 order by t.position,t.task_id asc";
                else
                    $sql = "select t.*,dt.dept_task_id,dt.start_date,dt.end_date,dt.`status`,dt.meterial_specification,dt.unit,dt.qty,dt.rate,dt.total,dt.consumption_amount,dt.remark,dt.report from task t left join department_task dt on t.task_id = dt.task_id where t.project_id=$project_id and t.parent_task_id is null and t.sub_task_id is null and t.is_active=1 order by t.position,t.task_id asc";
                $data['tasks'] = $tasks = $this->m_common->customeQuery($sql);
                foreach ($data['tasks'] as $key => $value) {
                    $s_sql = "select sum(total) as g_total,sum(consumption_amount) as g_cons_amount from department_task dt left join task t on dt.task_id=t.task_id  where dt.project_id=$project_id and dt.dept_id=" . $dept['dept_id'] . " and t.parent_task_id=" . $value['task_id'];
                    $total = $this->m_common->customeQuery($s_sql);
                    $data['tasks'][$key]['total'] = $total[0]['g_total'];
                    $n_total = $n_total + $total[0]['g_total'];

                    $data['tasks'][$key]['total_cons'] = $total[0]['g_cons_amount'];
                    $n_total_cons = $n_total_cons + $total[0]['g_cons_amount'];
                    if (!empty($segment_id)) {
                        
                    }
                    if (empty($start_date))
                        $sql = "select t.*,dt.dept_task_id,dt.start_date,dt.end_date,dt.`status`,dt.meterial_specification,dt.unit,dt.qty,dt.rate,dt.total,dt.consumption_amount,dt.remark,dt.report from task t left join department_task dt on t.task_id = dt.task_id where dt.dept_id='" . $dept['dept_id'] . "' and t.project_id=$project_id and t.parent_task_id='" . $value['task_id'] . "' and t.sub_task_id is null and t.is_active=1 order by t.position asc";
                    else
                        $sql = "select t.*,dt.dept_task_id,dt.start_date,dt.end_date,dt.`status`,dt.meterial_specification,dt.unit,dt.qty,dt.rate,dt.total,dt.consumption_amount,dt.remark,dt.report from task t left join department_task dt on t.task_id = dt.task_id where dt.dept_id='" . $dept['dept_id'] . "' and t.project_id=$project_id and t.parent_task_id='" . $value['task_id'] . "' and t.sub_task_id is null and t.is_active=1 and (dt.start_date>='" . $start_date . "' and dt.end_date<='" . $end_date . "') order by t.position asc";
                    $data['tasks'][$key]['sub_tasks'] = $tasks[$key]['sub_tasks'] = $this->m_common->customeQuery($sql);
                    if (!empty($data['tasks'][$key]['sub_tasks'])) {
                        foreach ($data['tasks'][$key]['sub_tasks'] as $key1 => $value1) {
                            $t = $value1['dept_task_id'];
                            if (empty($start_date))
                                $sql = "select t.*,dt.dept_task_id,dt.start_date,dt.end_date,dt.`status`,dt.meterial_specification,dt.unit,dt.qty,dt.rate,dt.total,dt.consumption_amount,dt.remark,dt.report from task t left join department_task dt on t.task_id = dt.task_id where dt.dept_id='" . $dept['dept_id'] . "' and t.project_id=$project_id and t.sub_task_id='" . $value1['task_id'] . "' and t.is_active=1 order by t.position asc";
                            else
                                $sql = "select t.*,dt.dept_task_id,dt.start_date,dt.end_date,dt.`status`,dt.meterial_specification,dt.unit,dt.qty,dt.rate,dt.total,dt.consumption_amount,dt.remark,dt.report from task t left join department_task dt on t.task_id = dt.task_id where dt.dept_id='" . $dept['dept_id'] . "' and t.project_id=$project_id and t.sub_task_id='" . $value1['task_id'] . "' and t.is_active=1 and (dt.start_date>='" . $start_date . "' and dt.end_date<='" . $end_date . "') order by t.position asc";
                            $data['tasks'][$key]['sub_tasks'][$key1]['sub_sub_tasks'] = $tasks[$key]['sub_tasks'][$key1]['sub_sub_tasks'] = $this->m_common->customeQuery($sql);
                        }
                    }
                }
                $data['departments'][$d]['tasks'] = $data['tasks'];
            }
            $data['net_total'] = $n_total;
            $data['net_total_cons'] = $n_total_cons;
            $data['net_total_remaining'] = $n_total - $n_total_cons;
            $data['project_id'] = $project_id;
            $data['segment_id'] = $_POST['segment_id'];
            $data['task_id'] = $_POST['task_id'];
            $data['start_date'] = $start_date;
            $data['end_date'] = $end_date;

            $data['projects'] = $this->m_common->get_row_array('projects', '', '*');
            $data['segments'] = $this->m_common->get_row_array('department', array('project_id' => $project_id), '*');
            $data['tasks'] = $this->m_common->customeQuery("SELECT t.task_id, t.parent_task_id, t.task_name FROM task as t WHERE t.project_id=$project_id and t.parent_task_id IS NULL");
            $this->load->view('project/v_monthly_budgeting_cost', $data);
        } else {
            $data['projects'] = $this->m_common->get_row_array('projects', '', '*');
            $this->load->view('project/v_monthly_budgeting_cost', $data);
        }
    }

    function monthlyCostReport() {
        $this->menu = 'report';
        $this->sub_menu = 'work_cost';
        $this->titlebackend("View Project");
        $project_id = $this->input->post('project_id');
        $segment_id = $this->input->post('segment_id');
        $task_id = $this->input->post('task_id');
        $proj = $this->m_common->get_row_array('projects', array('project_id' => $project_id), '*');
        $start_date = str_replace('/', '-', $this->input->post('start_date'));
        $end_date = str_replace('/', '-', $this->input->post('end_date'));
        if (!empty($project_id)) {
            if (!empty($start_date) && !empty($end_date)) {
                $start_date = date('Y-m-d', strtotime($start_date));
                $end_date = date('Y-m-d', strtotime($end_date));
            } elseif (!empty($start_date) && empty($end_date)) {
                $start_date = date('Y-m-d', strtotime($start_date));
                $end_date = $proj[0]['scheduled_completion_date'];
            } elseif (empty($start_date) && !empty($end_date)) {
                $start_date = $proj[0]['execution_start_date'];
                $end_date = date('Y-m-d', strtotime($start_date));
            } 
            elseif (empty($segment_id) && !empty($task_id)) {
                $segment_id = $segment_id;
                $task_id = $task_id;
            } elseif (!empty($segment_id) && empty($task_id)) {
                $segment_id = $segment_id;
                $task_id = $task_id;
            }else {
                $start_date = ''; //$proj[0]['execution_start_date'];
                $end_date = ''; //$proj[0]['scheduled_completion_date'];
            }
            $sql = "select sum(dept_value) as toal_dept_value from department where project_id=" . $project_id . ' and is_active=1';
            $total_dept_value = $this->m_common->customeQuery($sql);
            $data['dept_ramain_value'] = 100 - $total_dept_value[0]['toal_dept_value'];
            if (!empty($_POST['segment_id']))
                $data['departments'] = $this->m_common->get_row_array('department', array('project_id' => $project_id, 'dept_id' => $_POST['segment_id'], 'is_active' => 1), '*');
            else
                $data['departments'] = $this->m_common->get_row_array('department', array('project_id' => $project_id, 'is_active' => 1), '*');
            $sql = "select projects.*,pt.type,project_owner.fullname as owner_name,contractor.fullname as contractor_name,currencies.title,currencies.symbol_left from projects left join project_owner on projects.project_owner=project_owner.project_owner_id left join contractor on projects.contractor=contractor.contractor_id left join currencies on projects.equivalent_currency=currencies.currencies_id left join project_type pt on projects.type=pt.type_id where project_id=" . $project_id;
            $data['project_info'] = $this->m_common->customeQuery($sql);
            $currency_sql = "select project_currency.*,currencies.title,currencies.symbol_left from project_currency left join currencies on project_currency.currency_id=currencies.currencies_id where project_id=" . $project_id;
            $data['project_currency_info'] = $this->m_common->customeQuery($currency_sql);

            $n_total = 0;
            $n_total_cons = 0;

            foreach ($data['departments'] as $d => $dept) {
                if (!empty($_POST['task_id']))
                    $sql = "select t.*,dt.dept_task_id,dt.start_date,dt.end_date,dt.`status`,dt.meterial_specification,dt.unit,dt.qty,dt.rate,dt.total,dt.consumption_amount,dt.remark,dt.report from task t left join department_task dt on t.task_id = dt.task_id where t.project_id=$project_id and t.task_id='".$_POST['task_id']."' and t.parent_task_id is null and t.sub_task_id is null and t.is_active=1 order by t.position,t.task_id asc";
                else
                    $sql = "select t.*,dt.dept_task_id,dt.start_date,dt.end_date,dt.`status`,dt.meterial_specification,dt.unit,dt.qty,dt.rate,dt.total,dt.consumption_amount,dt.remark,dt.report from task t left join department_task dt on t.task_id = dt.task_id where t.project_id=$project_id and t.parent_task_id is null and t.sub_task_id is null and t.is_active=1 order by t.position,t.task_id asc";
                $data['tasks'] = $tasks = $this->m_common->customeQuery($sql);
                foreach ($data['tasks'] as $key => $value) {
                    $s_sql = "select sum(total) as g_total,sum(consumption_amount) as g_cons_amount from department_task dt left join task t on dt.task_id=t.task_id  where dt.project_id=$project_id and dt.dept_id=" . $dept['dept_id'] . " and t.parent_task_id=" . $value['task_id'];
                    $total = $this->m_common->customeQuery($s_sql);
                    $data['tasks'][$key]['total'] = $total[0]['g_total'];
                    $n_total = $n_total + $total[0]['g_total'];

                    $data['tasks'][$key]['total_cons'] = $total[0]['g_cons_amount'];
                    $n_total_cons = $n_total_cons + $total[0]['g_cons_amount'];
                    if (!empty($segment_id)) {
                        
                    }
                    if (empty($start_date))
                        $sql = "select t.*,dt.dept_task_id,dt.start_date,dt.end_date,dt.`status`,dt.meterial_specification,dt.unit,dt.qty,dt.rate,dt.total,dt.consumption_amount,dt.remark,dt.report from task t left join department_task dt on t.task_id = dt.task_id where dt.dept_id='" . $dept['dept_id'] . "' and t.project_id=$project_id and t.parent_task_id='" . $value['task_id'] . "' and t.sub_task_id is null and t.is_active=1 order by t.position asc";
                    else
                        $sql = "select t.*,dt.dept_task_id,dt.start_date,dt.end_date,dt.`status`,dt.meterial_specification,dt.unit,dt.qty,dt.rate,dt.total,dt.consumption_amount,dt.remark,dt.report from task t left join department_task dt on t.task_id = dt.task_id where dt.dept_id='" . $dept['dept_id'] . "' and t.project_id=$project_id and t.parent_task_id='" . $value['task_id'] . "' and t.sub_task_id is null and t.is_active=1 and (dt.start_date>='" . $start_date . "' and dt.end_date<='" . $end_date . "') order by t.position asc";
                    $data['tasks'][$key]['sub_tasks'] = $tasks[$key]['sub_tasks'] = $this->m_common->customeQuery($sql);
                    if (!empty($data['tasks'][$key]['sub_tasks'])) {
                        foreach ($data['tasks'][$key]['sub_tasks'] as $key1 => $value1) {
                            $t = $value1['dept_task_id'];
                            if (empty($start_date))
                                $sql = "select t.*,dt.dept_task_id,dt.start_date,dt.end_date,dt.`status`,dt.meterial_specification,dt.unit,dt.qty,dt.rate,dt.total,dt.consumption_amount,dt.remark,dt.report from task t left join department_task dt on t.task_id = dt.task_id where dt.dept_id='" . $dept['dept_id'] . "' and t.project_id=$project_id and t.sub_task_id='" . $value1['task_id'] . "' and t.is_active=1 order by t.position asc";
                            else
                                $sql = "select t.*,dt.dept_task_id,dt.start_date,dt.end_date,dt.`status`,dt.meterial_specification,dt.unit,dt.qty,dt.rate,dt.total,dt.consumption_amount,dt.remark,dt.report from task t left join department_task dt on t.task_id = dt.task_id where dt.dept_id='" . $dept['dept_id'] . "' and t.project_id=$project_id and t.sub_task_id='" . $value1['task_id'] . "' and t.is_active=1 and (dt.start_date>='" . $start_date . "' and dt.end_date<='" . $end_date . "') order by t.position asc";
                            $data['tasks'][$key]['sub_tasks'][$key1]['sub_sub_tasks'] = $tasks[$key]['sub_tasks'][$key1]['sub_sub_tasks'] = $this->m_common->customeQuery($sql);
                        }
                    }
                }
                $data['departments'][$d]['tasks'] = $data['tasks'];
            }
            $data['net_total'] = $n_total;
            $data['net_total_cons'] = $n_total_cons;
            $data['net_total_remaining'] = $n_total - $n_total_cons;
            $data['project_id'] = $project_id;
            $data['segment_id'] = $_POST['segment_id'];
            $data['task_id'] = $_POST['task_id'];
            $data['start_date'] = $start_date;
            $data['end_date'] = $end_date;

            $data['projects'] = $this->m_common->get_row_array('projects', '', '*');
            $data['segments'] = $this->m_common->get_row_array('department', array('project_id' => $project_id), '*');
            $data['tasks'] = $this->m_common->customeQuery("SELECT t.task_id, t.parent_task_id, t.task_name FROM task as t WHERE t.project_id=$project_id and t.parent_task_id IS NULL");
            
            $this->load->view('project/v_monthly_cost', $data);
        } else {
            $data['projects'] = $this->m_common->get_row_array('projects', '', '*');
            $this->load->view('project/v_monthly_cost', $data);
        }
    }

    function getSegment() {
        $this->setOutputMode(NORMAL);
        $project_id = $this->input->post('project_id');
        //$t=$this->m_common->customeQuery("SELECT t.task_name, dt.* FROM task as t RIGHT JOIN department_task as dt ON t.task_id=dt.task_id WHERE dt.project_id=$project_id AND dt.dept_id=$dept_id AND t.task_id=$task_id");
        $t = $this->m_common->get_row_array('department', array('project_id' => $project_id), '*');
        echo json_encode($t);
    }

    function getTask() {
        $this->setOutputMode(NORMAL);
        $project_id = $this->input->post('project_id');
        //$t=$this->m_common->customeQuery("SELECT t.task_name, dt.* FROM task as t RIGHT JOIN department_task as dt ON t.task_id=dt.task_id WHERE dt.project_id=$project_id AND dt.dept_id=$dept_id AND t.task_id=$task_id");
        $t = $this->m_common->customeQuery("SELECT t.task_id, t.parent_task_id, t.task_name FROM task as t WHERE t.project_id=$project_id and t.parent_task_id IS NULL");
        //$t = $this->m_common->get_row_array('task', array('project_id' => $project_id), '*');
        //$data['taskValue'] = !empty($t) ? $t[0] : '';
        echo json_encode($t);
    }

}
