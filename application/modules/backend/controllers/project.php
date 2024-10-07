<?php

/*
 * Author: fouraxiz
 * Purpose: This Controller is using for login process
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Project extends Site_Controller {

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

    function index($order_by = false) {
        if (!$this->is_logged_in($this->session->userdata('logged_in'))) {
            redirect_with_msg('backend/login', 'Please Login to see this page');
        } else {
            // redirect('backend/setup');
            $this->menu = 'project';
            $this->sub_menu = 'project_list';
            $this->titlebackend("Project");
            // $data['projects'] = $this->m_common->get_row_array('projects', array('is_active' => 1), '*');
            if (!empty($order_by)) {
                $sql = "select * from projects where is_active=1 order by " . $order_by . " asc";
                $projects = $this->m_common->customeQuery($sql);
                $data['order_by'] = $order_by;
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
                $data['order_by'] = '';
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
//echo '<pre>';
//print_r($data['projects']);
//exit;
            $this->load->view('project/v_project', $data);
        }
    }


    function updateTaskPositon() {
        $prs = $this->m_common->get_row_array('projects', array('is_active' => 1), 'project_id');
        foreach ($prs as $pr) {
            $position = 1;
            $tasks = $this->m_common->get_row_array('task', array('project_id' => $pr['project_id']), 'task_id');
            foreach ($tasks as $task) {
                $this->m_common->update_row('task', array('task_id' => $task['task_id']), array('position' => $position));
                $position++;
            }
        }
    }

    function updateProjectPosition() {
        $this->setOutputMode(NORMAL);
        $test = 1;
        foreach ($_POST['positions'] as $position) {
            $index = $position[0];
            $newposition = $position[1];
            $sql = "Update projects set position='$newposition' where project_id='$index' ";
            $result = $this->m_common->customeUpdate($sql);
        }
    }

    function addEditProject($id = "") {
        $this->menu = 'project';
        $this->sub_menu = 'add_project';
        $this->titlebackend("Add Project");
        $user_id = $this->session->userdata('user_id');
        $postData = $this->input->post();
        if (!empty($postData)) {
            $projects_info = array();
            if (!empty($postData['project_name'])) {
                $projects_info['project_name'] = $postData['project_name'];
            }
            if (!empty($postData['package_no'])) {
                $projects_info['package_no'] = $postData['package_no'];
            }
            if (!empty($postData['project_owner'])) {
                $projects_info['project_owner'] = $postData['project_owner'];
            }
            if (!empty($postData['country'])) {
                $projects_info['country'] = $postData['country'];
            }
            if (!empty($postData['division'])) {
                $projects_info['division'] = $postData['division'];
            }
            if (!empty($postData['district'])) {
                $projects_info['district'] = $postData['district'];
            }
            if (!empty($postData['code'])) {
                $projects_info['code'] = $postData['code'];
            }
            if (!empty($postData['type'])) {
                $projects_info['type'] = $postData['type'];
            }
            if (!empty($postData['contractor'])) {
                $projects_info['contractor'] = $postData['contractor'];
            }
            if (!empty($postData['contract_date'])) {
                $projects_info['contract_date'] = date('Y-m-d', strtotime(str_replace('/', '-', $postData['contract_date'])));
                $contract_date = date('Y-m-d', strtotime(str_replace('/', '-', $postData['contract_date'])));
            }
            if (!empty($postData['execution_start_date'])) {
                $projects_info['execution_start_date'] = date('Y-m-d', strtotime(str_replace('/', '-', $postData['execution_start_date'])));
            }
            if (!empty($postData['handover_date'])) {
                $projects_info['handover_date'] = date('Y-m-d', strtotime(str_replace('/', '-', $postData['handover_date'])));
            }
            if (!empty($postData['scheduled_completion_date'])) {
                $projects_info['scheduled_completion_date'] = date('Y-m-d', strtotime(str_replace('/', '-', $postData['scheduled_completion_date'])));
            }
            if (!empty($postData['actual_completion_date'])) {
                $projects_info['actual_completion_date'] = date('Y-m-d', strtotime(str_replace('/', '-', $postData['actual_completion_date'])));
            }
            if (!empty($postData['contract_period'])) {
                $projects_info['contract_period'] = $postData['contract_period'];
            }
            if (!empty($postData['equivalent_currency'])) {
                $projects_info['equivalent_currency'] = $postData['equivalent_currency'];
            }
            if (!empty($postData['project_value'])) {
                $projects_info['project_value'] = $postData['project_value'];
            }
            if (!empty($postData['upazila'])) {
                $projects_info['upazila'] = $postData['upazila'];
            }
            if (!empty($postData['site_location'])) {
                $projects_info['site_location'] = $postData['site_location'];
            }
            if (!empty($postData['execution_period'])) {
                $projects_info['execution_period'] = $postData['execution_period'];
            }
            if (!empty($postData['time_extension'])) {
                $projects_info['time_extension'] = $postData['time_extension'];
            }
//                if(!empty($postData['currency_rate'])){
//                    $projects_info['currency_rate']=$postData['currency_rate'];
//                }

            $projects_info['created_by'] = $user_id;


            if ($id == "") {
                $pre_project = $this->m_common->get_row_array('projects', array('project_name' => $postData['project_name'], 'is_active' => 1), '*');
                if (!empty($pre_project)) {
                    redirect_with_msg('backend/project/addEditProject', "This project already exists.");
                } else {
                    $projects_info['created'] = date("Y-m-d");
                    $result = $this->m_common->insert_row('projects', $projects_info);
                    if (!empty($result)) {

                        $this->create_sc_project($projects_info, $result);

                        if ($postData['currency_id']) {
                            foreach ($postData['currency_id'] as $key => $value) {
                                $project_currency_info = array();
                                $project_currency_info['project_id'] = $result;
                                $project_currency_info['currency_id'] = $postData['currency_id'][$key];
                                $project_currency_info['currency_rate'] = $postData['currency_rate'][$key];
                                $project_currency_info['equivalant_value'] = $postData['equivalant_value'][$key];
                                $project_currency_info['created_by'] = $user_id;
                                $project_currency_info['created'] = date('Y-m-d');
                                $this->m_common->insert_row('project_currency', $project_currency_info);
                            }
                        }
                        $this->save_user_activity(array('section' => 'Project', 'activity' => 'New Project Created', 'user_id' => $this->session->userdata('user_id'), 'date' => date('Y-m-d H:i:s')));
                    }
                    redirect_with_msg('backend/project', "Successfully Inserted");
                }
            } else {
                $pre_project = $this->m_common->get_row_array('projects', array('project_id' => $id, 'is_active' => 1), '*');
                if ($pre_project[0]['contract_date'] != $contract_date) {
                    $dept_tasks = $this->m_common->get_row_array('department_task', array('project_id' => $id), '*');
                    $c_d_time = strtotime($contract_date);
                    $p_cd_time = strtotime($pre_project[0]['contract_date']);
                    if ($c_d_time > $p_cd_time) {
                        $date1 = date_create($pre_project[0]['contract_date']);
                        $date2 = date_create($contract_date);
                        $diff = date_diff($date1, $date2);
                        $extend_days = $diff->days;
                        if (!empty($dept_tasks)) {
                            foreach ($dept_tasks as $deptask) {
                                $start_date = date('Y-m-d', strtotime('+' . $extend_days . ' days', strtotime($deptask['start_date'])));
                                $end_date = date('Y-m-d', strtotime('+' . $extend_days . ' days', strtotime($deptask['end_date'])));
                                $this->m_common->update_row('department_task', array('dept_task_id' => $deptask['dept_task_id']), array('start_date' => $start_date, 'end_date' => $end_date));
                            }
                        }
                    } else {
                        $date1 = date_create($contract_date);
                        $date2 = date_create($pre_project[0]['contract_date']);
                        $diff = date_diff($date1, $date2);
                        $reduce_days = $diff->days;
                        if (!empty($dept_tasks)) {
                            foreach ($dept_tasks as $deptask) {
                                $start_date = date('Y-m-d', strtotime('-' . $reduce_days . ' days', strtotime($deptask['start_date'])));
                                $end_date = date('Y-m-d', strtotime('-' . $reduce_days . ' days', strtotime($deptask['end_date'])));
                                $this->m_common->update_row('department_task', array('dept_task_id' => $deptask['dept_task_id']), array('start_date' => $start_date, 'end_date' => $end_date));
                            }
                        }
                    }
                }
                $projects_info['modified'] = date("Y-m-d");
                $this->m_common->update_row('projects', array('project_id' => $id), $projects_info);
                if ($postData['currency_id']) {
                    $this->m_common->delete_row('project_currency', array('project_id' => $id));
                    foreach ($postData['currency_id'] as $key => $value) {
                        $project_currency_info = array();
                        $project_currency_info['project_id'] = $id;
                        $project_currency_info['currency_id'] = $postData['currency_id'][$key];
                        $project_currency_info['currency_rate'] = $postData['currency_rate'][$key];
                        $project_currency_info['equivalant_value'] = $postData['equivalant_value'][$key];
                        $project_currency_info['created_by'] = $user_id;
                        $project_currency_info['modified'] = date('Y-m-d');
                        $this->m_common->insert_row('project_currency', $project_currency_info);
                    }
                }
                $this->save_user_activity(array('section' => 'Project', 'activity' => 'Project Updated', 'user_id' => $this->session->userdata('user_id'), 'date' => date('Y-m-d H:i:s')));
                redirect_with_msg('backend/project', "Successfully Updated");
            }
        } else {
            $data['countries'] = array_diff(scandir('region_city_data'), array('..', '.'));
            $data['project_types'] = $this->m_common->get_row_array('project_type', array('is_active' => 1), '*');
            $data['project_owners'] = $this->m_common->get_row_array('project_owner', array('is_active' => 1), '*');
            $data['contractors'] = $this->m_common->get_row_array('contractor', array('is_active' => 1), '*');
            $data['currencies'] = $this->m_common->get_row_array('currencies', array('is_active' => 1), '*');
            if ($id == "") {
                $this->load->view('project/v_add_project', $data);
            } else {
                $data['project_info'] = $this->m_common->get_row_array('projects', array('project_id' => $id), '*');
                $data['project_currency_info'] = $this->m_common->get_row_array('project_currency', array('project_id' => $id), '*');
                $data['divisions'] = array_diff(scandir('region_city_data/' . $data['project_info'][0]['country']), array('..', '.'));
                $data['cities'] = json_decode(file_get_contents('region_city_data/' . $data['project_info'][0]['country'] . '/' . $data['project_info'][0]['division'] . '.json'), true);
                // $this->load->library('SelectorDOM');
                // $html = $this->getDataByCurl('https://worldpostalcode.com/' . str_replace(' ', '-', $data['project_info'][0]['country']) . '/' . str_replace(' ', '-', $data['project_info'][0]['division']));
                // $dom = new SelectorDom($html);
                // $data['upazilas'] = $dom->select('.container');
                $this->load->view('project/v_edit_project', $data);
            }
        }
    }

    function create_sc_project($projects_info, $result) {
        $DB2 = $this->load->database('db2', TRUE);
        if (empty($projects_info['code'])) {
            $result = $DB2->query("select * from department_code order by id desc limit 1");
            $dep_last_code = $result->result_array();
            if (!empty($dep_last_code)) {

                $dep_code = $dep_last_code[0]['dep_code'] + 1;
                if ($dep_code > 999) {
                    $dep_sl_no = $dep_code;
                } else if ($dep_code > 99) {
                    $dep_sl_no = "0" . $dep_code;
                } else if ($dep_code > 9) {
                    $dep_sl_no = "00" . $dep_code;
                } else {
                    $dep_sl_no = "000" . $dep_code;
                }
            } else {
                $dep_code = 1;
                $dep_sl_no = '0001';
            }
        }
        $sp_project = array();
        $sp_project['dep_code'] = $projects_info['code'];
        $sp_project['dep_description'] = $projects_info['project_name'];
        $sp_project['short_name'] = $projects_info['project_name'];
        $sp_project['project_type'] = $projects_info['type'];
        $sp_project['project_location'] = $projects_info['site_location'];
        $sp_project['initial_contract_value'] = $projects_info['project_value'];
        $sp_project['commencement_date'] = $projects_info['scheduled_completion_date'];
        $sp_project['completion_date'] = $projects_info['actual_completion_date'];
        $sp_project['district_or_division'] = $projects_info['division'];
        $sp_project['address'] = $projects_info['site_location'];
        $sp_project['ref_id'] = $result;
        $sp_project['created'] = date('Y-m-d');
        $DB2->insert('department', $sp_project);
    }

    function importProject() {
        $this->menu = 'project';
        $this->sub_menu = 'project_list';
        $this->titlebackend("Import Project");
        $sql = "SELECT * FROM projects WHERE is_active=1 ORDER BY project_name ASC";
        $projects = $this->m_common->customeQuery($sql);
        $data['projects'] = $projects;

        $this->load->view('project/v_import_project', $data);
    }

    function importProjectAction() {

        if (isset($_FILES['project_file'])) {
            $user_id = $this->session->userdata('user_id');
            $file = fopen($_FILES['project_file']['tmp_name'], "r");
            $i = 0;
            while (!feof($file)) {
                $i++;
                $row = fgetcsv($file);
                $insertData = array();
                if ($i > 1) {
                    if (empty($row[0])) {
                        continue;
                    }

                    if (empty($row[1])) {
                        continue;
                    }

                    if (empty($row[2])) {
                        continue;
                    }

                    if (empty($row[3])) {
                        continue;
                    }

                    if (empty($row[5])) {
                        continue;
                    }

                    if (empty($row[6])) {
                        continue;
                    }

                    if (empty($row[7])) {
                        continue;
                    }

                    if (empty($row[8])) {
                        continue;
                    }
                    if (empty($row[9])) {
                        continue;
                    } else {
                        $project_owner_info = $this->m_common->get_row_array('project_owner', array('fullname' => trim($row[9])), '*');
                        if (!empty($project_owner_info)) {
                            $project_owner = $project_owner_info[0]['project_owner_id'];
                        } else {
                            $project_owner = '';
                        }
                    }
                    if (empty($row[10])) {
                        continue;
                    } else {
                        $project_contractor_info = $this->m_common->get_row_array('contractor', array('fullname' => trim($row[10])), '*');
                        if (!empty($project_contractor_info)) {
                            $project_contractor = $project_contractor_info[0]['contractor_id'];
                        } else {
                            $project_contractor = '';
                        }
                    }
                    if (empty($row[11])) {
                        continue;
                    }
                    if (empty($row[13])) {
                        continue;
                    }
                    if (empty($row[14])) {
                        continue;
                    }
                    if (empty($row[16])) {
                        continue;
                    }
                    if (empty($row[17])) {
                        continue;
                    }
                    if (empty($row[18])) {
                        continue;
                    }
                    if (empty($row[19])) {
                        continue;
                    }






                    if (!empty($row[11])) {
                        $contractDate = $row[11];
                        $arr = explode('.', $contractDate);
                        if (isset($arr[2]) && isset($arr[1]) && isset($arr[0]))
                            $contractDate = $arr[2] . '-' . $arr[1] . '-' . $arr[0];
                        else
                            $contractDate = '';
                    } else {
                        $contractDate = '';
                    }



                    if (!empty($row[12])) {
                        $executionStartDate = $row[12];
                        $arr = explode('.', $executionStartDate);
                        if (isset($arr[2]) && isset($arr[1]) && isset($arr[0]))
                            $executionStartDate = $arr[2] . '-' . $arr[1] . '-' . $arr[0];
                        else
                            $executionStartDate = '';
                    } else {
                        $executionStartDate = '';
                    }

                    $net_contact_period = trim($row[13]) + trim($row[15]);
                    $schedule_completion_date = date('Y-m-d', strtotime('+' . $row[13] . 'days', strtotime($contractDate)));
                    $actual_completion_date = date('Y-m-d', strtotime('+' . $net_contact_period . 'days', strtotime($contractDate)));
                    $hand_over_date = date('Y-m-d', strtotime('+' . $net_contact_period . 'days', strtotime($contractDate)));

                    $project_value = 0;
                    $equivalent_currency = trim($row[16]);
                    $equivalent_currency_id = $this->m_common->get_row_array('currencies', array('code' => $equivalent_currency), '*');
                    if (empty($equivalent_currency_id)) {
                        continue;
                    }

                    if ($equivalent_currency == trim($row[17])) {
                        $project_value = $project_value + trim($row[19]);
                    } else {
                        $first_currency_rate = trim($row[18]);
                        $equivalent_currency_value = 1 / $first_currency_rate;
                        $first_currency_amount = trim($row[19]);
                        $first_currency_value = round($first_currency_amount * $equivalent_currency_value, 6);
                        $project_value = $project_value + $first_currency_value;
                    }

                    if (!empty($row[20]) && !empty($row[21]) && !empty($row[22])) {
                        if ($equivalent_currency == trim($row[20])) {
                            $project_value = $project_value + trim($row[22]);
                        } else {
                            $second_currency_rate = trim($row[21]);
                            $equivalent_currency_value = 1 / $second_currency_rate;
                            $second_currency_amount = trim($row[22]);
                            $second_currency_value = round($second_currency_amount * $equivalent_currency_value, 6);
                            $project_value = $project_value + $second_currency_value;
                        }
                    }

                    if (!empty($row[23]) && !empty($row[24]) && !empty($row[25])) {
                        if ($equivalent_currency == trim($row[23])) {
                            $project_value = $project_value + trim($row[25]);
                        } else {
                            $third_currency_rate = trim($row[24]);
                            $equivalent_currency_value = 1 / $third_currency_rate;
                            $third_currency_amount = trim($row[25]);
                            $third_currency_value = round($third_currency_amount * $equivalent_currency_value, 6);
                            $project_value = $project_value + $third_currency_value;
                        }
                    }

                    if (!empty($row[26]) && !empty($row[27]) && !empty($row[28])) {
                        if ($equivalent_currency == trim($row[26])) {
                            $project_value = $project_value + trim($row[28]);
                        } else {
                            $fourth_currency_rate = trim($row[27]);
                            $equivalent_currency_value = 1 / $third_currency_rate;
                            $fourth_currency_amount = trim($row[28]);
                            $fourth_currency_value = round($fourth_currency_amount * $equivalent_currency_value, 6);
                            $project_value = $project_value + $fourth_currency_value;
                        }
                    }


                    $insertData['project_name'] = trim($row[0]);
                    $insertData['type'] = trim($row[1]);
                    $insertData['code'] = trim($row[2]);
                    $insertData['package_no'] = trim($row[3]);
                    $insertData['country'] = trim($row[4]);
                    $insertData['division'] = trim($row[5]);
                    $insertData['district'] = trim($row[6]);
                    $insertData['zone'] = trim($row[7]);
                    $insertData['site_location'] = trim($row[8]);
                    $insertData['project_owner'] = $project_owner;
                    $insertData['contractor'] = $project_contractor;
                    $insertData['contract_date'] = $contractDate;
                    $insertData['execution_start_date'] = $executionStartDate;
                    $insertData['handover_date'] = $hand_over_date;
                    $insertData['scheduled_completion_date'] = $schedule_completion_date;
                    $insertData['actual_completion_date'] = $actual_completion_date;
                    $insertData['equivalent_currency'] = $equivalent_currency_id[0]['currencies_id'];
                    $insertData['project_value'] = $project_value;
                    $insertData['created_by'] = $user_id;
                    $insertData['contract_period'] = trim($row[13]);
                    $insertData['execution_period'] = trim($row[14]);
                    $insertData['time_extension'] = trim($row[15]);
                    $insertData['project_status'] = 'Incomplete';
                    $insertData['is_active'] = 1;
                    $insertData['created'] = date('Y-m-d');
                    $project_id = $this->m_common->insert_row('projects', $insertData);
                    if (!empty($project_id)) {
                        $first_currency_id = $this->m_common->get_row_array('currencies', array('code' => trim($row[17])), '*');
                        if (!empty($first_currency_id)) {
                            $insertCurrency = array();
                            $insertCurrency['project_id'] = $project_id;
                            $insertCurrency['currency_id'] = $first_currency_id[0]['currencies_id'];
                            $insertCurrency['created_by'] = $user_id;
                            $insertCurrency['created'] = date('Y-m-d');
                            $insertCurrency['currency_rate'] = trim($row[18]);
                            $insertCurrency['equivalant_value'] = trim($row[19]);
                            $this->m_common->insert_row('project_currency', $insertCurrency);
                        }

                        if (!empty($row[20]) && !empty($row[21]) && !empty($row[22])) {
                            $second_currency_id = $this->m_common->get_row_array('currencies', array('code' => trim($row[20])), '*');
                            if (!empty($second_currency_id)) {
                                $insertCurrency = array();
                                $insertCurrency['project_id'] = $project_id;
                                $insertCurrency['currency_id'] = $second_currency_id[0]['currencies_id'];
                                $insertCurrency['created_by'] = $user_id;
                                $insertCurrency['created'] = date('Y-m-d');
                                $insertCurrency['currency_rate'] = trim($row[21]);
                                $insertCurrency['equivalant_value'] = trim($row[22]);
                                $this->m_common->insert_row('project_currency', $insertCurrency);
                            }
                        }

                        if (!empty($row[23]) && !empty($row[24]) && !empty($row[25])) {
                            $third_currency_id = $this->m_common->get_row_array('currencies', array('code' => trim($row[23])), '*');
                            if (!empty($third_currency_id)) {
                                $insertCurrency = array();
                                $insertCurrency['project_id'] = $project_id;
                                $insertCurrency['currency_id'] = $third_currency_id[0]['currencies_id'];
                                $insertCurrency['created_by'] = $user_id;
                                $insertCurrency['created'] = date('Y-m-d');
                                $insertCurrency['currency_rate'] = trim($row[24]);
                                $insertCurrency['equivalant_value'] = trim($row[25]);
                                $this->m_common->insert_row('project_currency', $insertCurrency);
                            }
                        }

                        if (!empty($row[26]) && !empty($row[27]) && !empty($row[28])) {
                            $fourth_currency_id = $this->m_common->get_row_array('currencies', array('code' => trim($row[26])), '*');
                            if (!empty($fourth_currency_id)) {
                                $insertCurrency = array();
                                $insertCurrency['project_id'] = $project_id;
                                $insertCurrency['currency_id'] = $fourth_currency_id[0]['currencies_id'];
                                $insertCurrency['created_by'] = $user_id;
                                $insertCurrency['created'] = date('Y-m-d');
                                $insertCurrency['currency_rate'] = trim($row[27]);
                                $insertCurrency['equivalant_value'] = trim($row[28]);
                                $this->m_common->insert_row('project_currency', $insertCurrency);
                            }
                        }
                        $this->save_user_activity(array('section' => 'Project', 'activity' => 'Project Imported Through Excell File', 'user_id' => $this->session->userdata('user_id'), 'date' => date('Y-m-d H:i:s')));
                    }
                }
            }
            redirect_with_msg('backend/project', 'Successfully Inserted' . $i);
        } else {
            redirect_with_msg('backend/project/importProject', 'Please Upload csv file');
        }
    }

    function importProjectStatus() {

        if (isset($_FILES['status_file'])) {
            $user_id = $this->session->userdata('user_id');
            $project_id = $this->input->post('project_id');
            $file = fopen($_FILES['status_file']['tmp_name'], "r");
            $i = 0;
            while (!feof($file)) {
                $i++;
                $row = fgetcsv($file);
                $insertData = array();
                if ($i > 1) {
                    $pre_dept = array();
                    $pre_status = array();
                    if (empty($row[0])) {
                        continue;
                    }
                    if (empty($row[1])) {
                        continue;
                    }
                    $pre_dept = $this->m_common->get_row_array('department', array('project_id' => $project_id, 'dept_name' => trim($row[0]), 'is_active' => 1), '*');
                    if (empty($pre_dept)) {
                        continue;
                    }
                    $pre_status = $this->m_common->get_row_array('project_status', array('project_id' => $project_id, 'dept_id' => $pre_dept[0]['dept_id'], 'status_name' => trim($row[1])), '*');
                    if (!empty($pre_status)) {
                        continue;
                    }

                    $insertData['project_id'] = $project_id;
                    $insertData['dept_id'] = $pre_dept[0]['dept_id'];
                    $insertData['status_name'] = trim($row[1]);
                    $insertData['created_by'] = $user_id;
                    $insertData['created'] = date('Y-m-d');
                    $this->m_common->insert_row('project_status', $insertData);
                }
            }
            $this->save_user_activity(array('section' => 'Project Status', 'activity' => 'Status Imported Through Excell File', 'user_id' => $this->session->userdata('user_id'), 'date' => date('Y-m-d H:i:s')));
            redirect_with_msg('backend/project', 'Successfully Inserted' . $i);
        } else {
            redirect_with_msg('backend/project/importProject', 'Please Upload csv file');
        }
    }

//    function importFullProject() {

//         $user_id = 1; //$this->session->userdata('user_id');
//         $project_id = 6; //$this->input->post('project_id');
//         $file = fopen('hyders_dale.csv', "r");
//         $i = 0;
//         while (!feof($file)) {
//             $i++;

//             $row = fgetcsv($file);
//             $taskData = array();
//             if ($i > 1) {
//                 if($i==1896){
//                     $aaa  = '';
//                 }
//                 $pre_dept = array();
//                 $pre_status = array();
//                 if (empty($row[1])) {
//                     continue;
//                 }
//                 if (empty($row[2])) {
//                     continue;
//                 }

//                 $item_code = $row[0];
//                 $task_name = $row[1];
//                 $department = $row[2];
//                 $report = $row[3];
//                 $sub_task_name = $row[4];
//                 $mat_specification = $row[5];
                
//                 $qty = str_replace(',', '', $row[6]);
//                 $unit = str_replace(',', '', $row[7]);
//                 $rate = str_replace(',', '', $row[8]);
//                 $amount = str_replace(',', '', $row[9]);
//                 $remarks = $row[10];

//                 $pre_dept = $this->m_common->get_row_array('department', array('project_id' => $project_id, 'dept_name' => trim($department), 'is_active' => 1), '*');
//                 if (empty($pre_dept)) {
//                     $dept_id = $this->m_common->insert_row('department', array('project_id' => $project_id, 'dept_name' => trim($department), 'is_active' => 1));
//                 } else {
//                     $dept_id = $pre_dept[0]['dept_id'];
//                 }
// //                $pre_status = $this->m_common->get_row_array('project_status', array('project_id' => $project_id, 'dept_id' => $pre_dept[0]['dept_id'], 'status_name' => trim($row[1])), '*');
// //                if (!empty($pre_status)) {
// //                    continue;
// //                }



//                 $task_exist = $this->m_common->get_row_array('task', array('task_name' => trim($task_name), 'project_id' => $project_id, 'is_active' => 1), '*');
//                 if (empty($task_exist)) {
//                     $taskData['task_name'] = trim($task_name);
//                     $taskData['unit'] = trim($unit);
//                     $taskData['project_id'] = $project_id;
//                     $taskData['created_by'] = $user_id;
//                     $taskData['created'] = date('Y-m-d');
//                     if (empty($task_exist))
//                         $task_id = $this->m_common->insert_row('task', $taskData);
//                 } else
//                     $task_id = $task_exist[0]['task_id'];

//                 if(!empty(trim($mat_specification))){
//                     $sub_task_name.='('.trim($mat_specification).')';
//                 }
                
//                 $task_exist = $this->m_common->get_row_array('task', array('task_name' => trim($sub_task_name), 'parent_task_id' => $task_id, 'project_id' => $project_id, 'is_active' => 1), '*');
//                 if (empty($task_exist)) {
//                     $taskData['task_name'] = trim($sub_task_name);
//                     $taskData['unit'] = trim($unit);
//                     $taskData['parent_task_id'] = $task_id;
//                     $taskData['project_id'] = $project_id;
//                     $taskData['created_by'] = $user_id;
//                     $taskData['created'] = date('Y-m-d');
//                     if (empty($task_exist))
//                         $task_id = $this->m_common->insert_row('task', $taskData);
//                 } else
//                     $task_id = $task_exist[0]['task_id'];

//                 $deptTaskData = array();
//                 $deptTaskData['task_id'] = $task_id;
//                 $deptTaskData['dept_id'] = $dept_id;
//                 $deptTaskData['project_id'] = $project_id;
//                 $chk_dpt_ext = $this->m_common->get_row_array('department_task', $deptTaskData, '*');

//                 $deptTaskData['meterial_specification'] = $mat_specification;
//                 $deptTaskData['unit'] = $unit;
//                 $deptTaskData['qty'] = $qty;
//                 $deptTaskData['rate'] = $rate;
//                 $deptTaskData['total'] = $amount;
//                 $deptTaskData['remark'] = $remark;
//                 $deptTaskData['report'] = $report;
//                 $deptTaskData['created_by'] = $user_id;
//                 $deptTaskData['created'] = date('Y-m-d');
//                 if (empty($chk_dpt_ext))
//                     $dept_task_id = $this->m_common->insert_row('department_task', $deptTaskData);
//                 else
//                     $dept_task_id = $this->m_common->update_row('department_task', array('dept_task_id' => $chk_dpt_ext[0]['dept_task_id']), $deptTaskData);
//             }
//         }
//         $this->sync_with_supply_chain($project_id);
//         $this->save_user_activity(array('section' => 'Project Status', 'activity' => 'Status Imported Through Excell File', 'user_id' => $this->session->userdata('user_id'), 'date' => date('Y-m-d H:i:s')));
//         redirect_with_msg('backend/project/viewProject/' . $project_id, 'Successfully Inserted' . $i);
//     }

function importFullProject() {
    $user_id = 1; // Assuming user ID is 1 for testing; you can use `$this->session->userdata('user_id')`
    $project_id = $this->input->post('project_id');  // Fetch project_id from the form

    // Validate the file upload
    if (isset($_FILES['project_file']['tmp_name'])) {
        $file = fopen($_FILES['project_file']['tmp_name'], "r");  // Open the CSV file
        $i = 0;

        while (!feof($file)) {
            $i++;
            $row = fgetcsv($file);  // Read each row
            $taskData = array();

            // Skip the first row (header)
            if ($i > 1) {
                // Validate that required fields exist
                if (empty($row[1]) || empty($row[2])) {
                    continue;
                }

                // CSV column data
                $item_code = $row[0];
                $task_name = $row[1];
                $department = $row[2];
                $report = $row[3];
                $sub_task_name = $row[4];
                $mat_specification = $row[5];
                $qty = str_replace(',', '', $row[6]);
                $unit = str_replace(',', '', $row[7]);
                $rate = str_replace(',', '', $row[8]);
                $amount = str_replace(',', '', $row[9]);
                $remarks = $row[10];

                // Check if department exists
                $pre_dept = $this->m_common->get_row_array('department', array('project_id' => $project_id, 'dept_name' => trim($department), 'is_active' => 1), '*');
                if (empty($pre_dept)) {
                    $dept_id = $this->m_common->insert_row('department', array('project_id' => $project_id, 'dept_name' => trim($department), 'is_active' => 1));
                } else {
                    $dept_id = $pre_dept[0]['dept_id'];
                }

                // Check if task exists
                $task_exist = $this->m_common->get_row_array('task', array('task_name' => trim($task_name), 'project_id' => $project_id, 'is_active' => 1), '*');
                if (empty($task_exist)) {
                    $taskData = array(
                        'task_name' => trim($task_name),
                        'unit' => trim($unit),
                        'project_id' => $project_id,
                        'created_by' => $user_id,
                        'created' => date('Y-m-d'),
                    );
                    $task_id = $this->m_common->insert_row('task', $taskData);
                } else {
                    $task_id = $task_exist[0]['task_id'];
                }

                // Handle sub-tasks
                if (!empty(trim($mat_specification))) {
                    $sub_task_name .= '(' . trim($mat_specification) . ')';
                }

                // Check if sub-task exists
                $task_exist = $this->m_common->get_row_array('task', array('task_name' => trim($sub_task_name), 'parent_task_id' => $task_id, 'project_id' => $project_id, 'is_active' => 1), '*');
                if (empty($task_exist)) {
                    $taskData = array(
                        'task_name' => trim($sub_task_name),
                        'unit' => trim($unit),
                        'parent_task_id' => $task_id,
                        'project_id' => $project_id,
                        'created_by' => $user_id,
                        'created' => date('Y-m-d'),
                    );
                    $task_id = $this->m_common->insert_row('task', $taskData);
                } else {
                    $task_id = $task_exist[0]['task_id'];
                }

                // Insert department task details
                $deptTaskData = array(
                    'task_id' => $task_id,
                    'dept_id' => $dept_id,
                    'project_id' => $project_id,
                    'meterial_specification' => $mat_specification,
                    'unit' => $unit,
                    'qty' => $qty,
                    'rate' => $rate,
                    'total' => $amount,
                    'remark' => $remarks,
                    'report' => $report,
                    'created_by' => $user_id,
                    'created' => date('Y-m-d'),
                );
                $chk_dpt_ext = $this->m_common->get_row_array('department_task', $deptTaskData, '*');
                if (empty($chk_dpt_ext)) {
                    $this->m_common->insert_row('department_task', $deptTaskData);
                } else {
                    $this->m_common->update_row('department_task', array('dept_task_id' => $chk_dpt_ext[0]['dept_task_id']), $deptTaskData);
                }
            }
        }
        fclose($file);

        // Sync with supply chain
        $this->sync_with_supply_chain($project_id);
        
        // Save user activity
        $this->save_user_activity(array('section' => 'Project Status', 'activity' => 'Status Imported Through Excel File', 'user_id' => $this->session->userdata('user_id'), 'date' => date('Y-m-d H:i:s')));
        
        redirect_with_msg('backend/project/viewProject/' . $project_id, 'Successfully Inserted ' . $i . ' records.');
    } else {
        // Handle file not uploaded error
        redirect_with_msg('backend/project/importProject', 'File upload failed. Please try again.', 'error');
    }
}



    function viewProject($project_id = "") {
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
        $data['tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'parent_task_id' => null, 'sub_task_id' => null, 'is_active' => 1), '*', '', '', 'task_name', 'asc');
        $sql = "select au.*,u.username,d.dept_name  from assign_user au join users u on au.user_id=u.user_id left join department d on au.department_id=d.dept_id where au.project_id=$project_id and au.is_active=1";
        $data['project_users'] = $this->m_common->customeQuery($sql);
        $data['users'] = $this->m_common->get_row_array('users', array('is_active' => 1), '*');
        $data['documents'] = $this->m_common->get_row_array('documents', '', '*');
//        echo "<pre>";
//            print_r( $data['project_currency_info']);
//         echo "</pre>";
//         exit;

        $sql1 = "Select SUM(total) as total, SUM(consumption_amount) as consumption FROM department_task where project_id=" . $project_id;
        $data['budgeting'] = $this->m_common->customeQuery($sql1);

        foreach ($data['tasks'] as $key => $value) {
            $data['tasks'][$key]['sub_tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'parent_task_id' => $value['task_id'], 'sub_task_id' => null, 'is_active' => 1), '*', '', '', 'task_name','asc');
            if (!empty($data['tasks'][$key]['sub_tasks'])) {
                foreach ($data['tasks'][$key]['sub_tasks'] as $key1 => $value1) {
                    $data['tasks'][$key]['sub_tasks'][$key1]['sub_sub_tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'sub_task_id' => $value1['task_id'], 'is_active' => 1), '*', '', '', 'task_name','asc');
                }
            }
        }
//             echo "<pre>";
//             print_r( $data['tasks']);
//             echo "</pre>";
//             exit;

        $DB2 = $this->load->database('db2', TRUE);
        $result = $DB2->query("select * from item_category group by c_name");
        $data['item_category'] = $result->result_array();
        $result = $DB2->query("select * from item_groups");
        $data['item_groups'] = $result->result_array();
        $result = $DB2->query("select * from items");
        $data['items'] = $result->result_array();

        $this->load->view('project/v_details_project', $data);
    }

    function report($project_id = "") {
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
        
        $n_total=0;
        $n_total_cons=0;
        
        foreach ($data['departments'] as $d => $dept) {
            $sql = "select t.*,dt.dept_task_id,dt.start_date,dt.end_date,dt.`status`,dt.meterial_specification,dt.unit,dt.qty,dt.rate,dt.total,dt.consumption_amount,dt.remark,dt.report from task t left join department_task dt on t.task_id = dt.task_id where t.project_id=$project_id and t.parent_task_id is null and t.sub_task_id is null and t.is_active=1 order by t.position,t.task_id asc";
            $data['tasks'] = $tasks = $this->m_common->customeQuery($sql);
            //$data['tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'parent_task_id' => null, 'sub_task_id' => null, 'is_active' => 1), '*', '', '', 'position', 'asc');

            foreach ($data['tasks'] as $key => $value) {
                $s_sql="select sum(total) as g_total,sum(consumption_amount) as g_cons_amount from department_task dt left join task t on dt.task_id=t.task_id  where dt.project_id=$project_id and dt.dept_id=".$dept['dept_id']." and t.parent_task_id=".$value['task_id'];
                $total = $this->m_common->customeQuery($s_sql);
                $data['tasks'][$key]['total']=$total[0]['g_total'];                
                $n_total=$n_total+$total[0]['g_total'];
                
                $data['tasks'][$key]['total_cons']=$total[0]['g_cons_amount'];
                $n_total_cons=$n_total_cons+$total[0]['g_cons_amount'];
                
                
                
                $sql = "select t.*,dt.dept_task_id,dt.start_date,dt.end_date,dt.`status`,dt.meterial_specification,dt.unit,dt.qty,dt.rate,dt.total,dt.consumption_amount,dt.remark,dt.report from task t left join department_task dt on t.task_id = dt.task_id where dt.dept_id='" . $dept['dept_id'] . "' and t.project_id=$project_id and t.parent_task_id='" . $value['task_id'] . "' and t.sub_task_id is null and t.is_active=1 order by t.position asc";
                $data['tasks'][$key]['sub_tasks'] = $tasks[$key]['sub_tasks'] = $this->m_common->customeQuery($sql);
                //$data['tasks'][$key]['sub_tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'parent_task_id' => $value['task_id'], 'sub_task_id' => null, 'is_active' => 1), '*', '', '', 'position');
                if (!empty($data['tasks'][$key]['sub_tasks'])) {
                    foreach ($data['tasks'][$key]['sub_tasks'] as $key1 => $value1) {
                        $t=$value1['dept_task_id'];
                        $sql = "select t.*,dt.dept_task_id,dt.start_date,dt.end_date,dt.`status`,dt.meterial_specification,dt.unit,dt.qty,dt.rate,dt.total,dt.consumption_amount,dt.remark,dt.report from task t left join department_task dt on t.task_id = dt.task_id where dt.dept_id='" . $dept['dept_id'] . "' and t.project_id=$project_id and t.sub_task_id='" . $value1['task_id'] . "' and t.is_active=1 order by t.position asc";
                        $data['tasks'][$key]['sub_tasks'][$key1]['sub_sub_tasks'] = $tasks[$key]['sub_tasks'][$key1]['sub_sub_tasks'] = $this->m_common->customeQuery($sql);
                        //$data['tasks'][$key]['sub_tasks'][$key1]['sub_sub_tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'sub_task_id' => $value1['task_id'], 'is_active' => 1), '*', '', '', 'position');
                    }
                }
            }
            //$data['departments'][$d]['tasks'] = $tasks;
            $data['departments'][$d]['tasks'] =$data['tasks'];
        }
        $data['net_total']=$n_total;  
        $data['net_total_cons']=$n_total_cons;  
        $data['net_total_remaining']=$n_total-$n_total_cons;   
        
//             echo "<pre>";
//             print_r( $data['tasks']);
//             echo "</pre>";
//             exit;
        $this->load->view('project/v_report', $data);
    }

    function viewProject_sortable($project_id = "") {
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
        $data['tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'parent_task_id' => null, 'sub_task_id' => null, 'is_active' => 1), '*', '', '', 'position');
        $sql = "select au.*,u.username,d.dept_name  from assign_user au join users u on au.user_id=u.user_id left join department d on au.department_id=d.dept_id where au.project_id=$project_id and au.is_active=1";
        $data['project_users'] = $this->m_common->customeQuery($sql);
        $data['users'] = $this->m_common->get_row_array('users', array('is_active' => 1), '*');
//        echo "<pre>";
//            print_r( $data['project_currency_info']);
//         echo "</pre>";
//         exit;
        foreach ($data['tasks'] as $key => $value) {
            $data['tasks'][$key]['sub_tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'parent_task_id' => $value['task_id'], 'sub_task_id' => null, 'is_active' => 1), '*', '', '', 'position');
            if (!empty($data['tasks'][$key]['sub_tasks'])) {
                foreach ($data['tasks'][$key]['sub_tasks'] as $key1 => $value1) {
                    $data['tasks'][$key]['sub_tasks'][$key1]['sub_sub_tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'sub_task_id' => $value1['task_id'], 'is_active' => 1), '*', '', '', 'position');
                }
            }
        }
//             echo "<pre>";
//             print_r( $data['tasks']);
//             echo "</pre>";
//             exit;
        $this->load->view('project/v_details_project', $data);
    }

    function updateTaskPosition() {
        $this->setOutputMode(NORMAL);
        $test = 1;
        foreach ($_POST['positions'] as $position) {
            $index = $position[0];
            $newposition = $position[1];
            $sql = "Update task set position='$newposition' where task_id='$index' ";
            $result = $this->m_common->customeUpdate($sql);
        }
    }

    function _deleteProject($id) {
        // $existData=$this->m_common->get_row_array('projects',array('projects_id'=>$id),'image');
        $result = $this->m_common->update_row('projects', array('project_id' => $id), array('is_delete' => 1, 'is_active' => 0));
        if ($result) {
            redirect_with_msg('backend/project', 'successfully deleted');
        } else
            redirect_with_msg('backend/project', 'Not deleted');
    }

    function deleteProject($id = false) {
        // $existData=$this->m_common->get_row_array('projects',array('projects_id'=>$id),'image');
        $this->setOutputMode(NORMAL);
        $project_id = $this->input->post('project_id');
        $result = $this->m_common->update_row('projects', array('project_id' => $project_id), array('is_delete' => 1, 'is_active' => 0));
        if ($result) {
            $data["status"] = "success";
        } else
            $data["status"] = "failed";
        echo json_encode($data);
    }

    function projectCurrencyInfo($id = "") {
        $this->setOutputMode(NORMAL);
        $user_id = $this->session->userdata('user_id');
        $insertData = array();
        $postData = $this->input->post();
        if (!empty($postData['project_id'])) {
            $project_id = $postData['project_id'];
        }
        // $currency_sql = "select project_currency.*,currencies.title,currencies.symbol_left from project_currency left join currencies on project_currency.currency_id=currencies.currencies_id where project_id=" . $project_id;
        $currency_sql = "select project_currency.*,currencies.title,currencies.symbol_left from project_currency left join currencies on project_currency.currency_id=currencies.currencies_id where project_id=" . $project_id;
        //   echo $currency_sql;exit;
        $data['project_currency_info'] = $this->m_common->customeQuery($currency_sql);
        foreach ($data['project_currency_info'] as $key => $value) {
            $sql = "select round(sum(equivalant_value)) as total_equivalant_value,round(sum(equivalant_amount)) as total_equivalant_amount from task_currency where parent_task_id is null and sub_task_id is null and currency_id=" . $value['currency_id'] . " and project_id=" . $project_id;
            // echo $sql;exit;
            $remain_currency_info = $this->m_common->customeQuery($sql);
            if (!empty($remain_currency_info)) {
                if (number_format(100 - $remain_currency_info[0]['total_equivalant_value'], 6) > 0)
                    $data['project_currency_info'][$key]['remainig_equivalant_value'] = number_format(100 - $remain_currency_info[0]['total_equivalant_value'], 6);
                else
                    $data['project_currency_info'][$key]['remainig_equivalant_value'] = 0.000000;
                $test = 100 - $remain_currency_info[0]['total_equivalant_value'];
                if (number_format($value['equivalant_value'] - $remain_currency_info[0]['total_equivalant_amount'], 6) > 0)
                    $data['project_currency_info'][$key]['remaining_equivalant_amount'] = number_format($value['equivalant_value'] - $remain_currency_info[0]['total_equivalant_amount'], 6);
                else
                    $data['project_currency_info'][$key]['remaining_equivalant_amount'] = 0.000000;
            } else {
                $data['project_currency_info'][$key]['remainig_equivalant_value'] = 100;
                $data['project_currency_info'][$key]['remaining_equivalant_amount'] = number_format($value['equivalant_value'], 6);
            }
        }
        echo json_encode($data);
    }

    function taskInfo($id = "") {
        $this->setOutputMode(NORMAL);
        $user_id = $this->session->userdata('user_id');
        $insertData = array();
        $postData = $this->input->post();
        if (!empty($postData['task_id'])) {
            $insertData['task_id'] = $postData['task_id'];
            $task_id = $postData['task_id'];
        }

        $project_id = $postData['project_id'];
        $data["task_info"] = $this->m_common->get_row_array('task', array('task_id' => $task_id, 'is_delete' => 0, 'is_active' => 1), '*');
        foreach ($data["task_info"] as $key => $value) {
            $currency_sql = "select task_currency.*,currencies.title,currencies.symbol_left from task_currency left join currencies on task_currency.currency_id=currencies.currencies_id where task_id=" . $value['task_id'];
            $data['task_currencies'] = $this->m_common->customeQuery($currency_sql);
            foreach ($data['task_currencies'] as $key2 => $value2) {
                $sql = "select * from project_currency where project_id=" . $project_id . " and currency_id=" . $value2['currency_id'];
                $project_currency = $this->m_common->customeQuery($sql);
                $data['task_currencies'][$key2]['project_eq_value'] = $project_currency[0]['equivalant_value'];
                $data['task_currencies'][$key2]['project_currency_rate'] = $project_currency[0]['currency_rate'];
            }
        }

        echo json_encode($data);
    }

    function subTaskInfo($id = "") {
        $this->setOutputMode(NORMAL);
        $user_id = $this->session->userdata('user_id');
        $insertData = array();
        $postData = $this->input->post();
        if (!empty($postData['task_id'])) {
            $insertData['task_id'] = $postData['task_id'];
            $task_id = $postData['task_id'];
        }

        $project_id = $postData['project_id'];
        $data["task_info"] = $this->m_common->get_row_array('task', array('task_id' => $task_id, 'is_delete' => 0, 'is_active' => 1), '*');
        foreach ($data["task_info"] as $key => $value) {
            $currency_sql = "select task_currency.*,currencies.title,currencies.symbol_left from task_currency left join currencies on task_currency.currency_id=currencies.currencies_id where task_id=" . $value['task_id'];
            $data['task_currencies'] = $this->m_common->customeQuery($currency_sql);
            foreach ($data['task_currencies'] as $key2 => $value2) {
                $sql = "select round(sum(equivalant_value)) as total_equivalant_value,round(sum(equivalant_amount)) as total_equivalant_amount from task_currency where parent_task_id=" . $task_id . " and currency_id=" . $value2['currency_id'] . " and project_id=" . $project_id;
                $remain_currency_info = $this->m_common->customeQuery($sql);
                if (!empty($remain_currency_info)) {
                    $data['task_currencies'][$key2]['remainig_equivalant_value'] = 100 - $remain_currency_info[0]['total_equivalant_value'];
                    $data['task_currencies'][$key2]['remaining_equivalant_amount'] = $value2['equivalant_amount'] - $remain_currency_info[0]['total_equivalant_amount'];
                } else {
                    $data['task_currencies'][$key]['remainig_equivalant_value'] = 100;
                    $data['task_currencies'][$key]['remaining_equivalant_amount'] = $value2['equivalant_amount'];
                }
                $sql = "select * from project_currency where project_id=" . $project_id . " and currency_id=" . $value2['currency_id'];
                $project_currency = $this->m_common->customeQuery($sql);
                $data['task_currencies'][$key2]['project_eq_value'] = $project_currency[0]['equivalant_value'];
                $data['task_currencies'][$key2]['project_currency_rate'] = $project_currency[0]['currency_rate'];
            }
        }
        $DB2 = $this->load->database('db2', TRUE);
        $result = $DB2->query("select i.* from items as i JOIN item_category as ic on i.item_category=ic.c_id where ic.c_name='" . $value['task_name'] . "'");
        $data['items'] = $result->result_array();
        echo json_encode($data);
    }

    function editsubTaskInfo($id = "") {
        $this->setOutputMode(NORMAL);
        $user_id = $this->session->userdata('user_id');
        $insertData = array();
        $postData = $this->input->post();
        if (!empty($postData['task_id'])) {
            $insertData['task_id'] = $postData['task_id'];
            $task_id = $postData['task_id'];
        }

        $project_id = $postData['project_id'];
        $data["task_info"] = $this->m_common->get_row_array('task', array('task_id' => $task_id, 'is_delete' => 0, 'is_active' => 1), '*');
        foreach ($data["task_info"] as $key => $value) {
            $currency_sql = "select task_currency.*,currencies.title,currencies.symbol_left from task_currency left join currencies on task_currency.currency_id=currencies.currencies_id where task_id=" . $value['task_id'];
            $data['task_currencies'] = $this->m_common->customeQuery($currency_sql);
            foreach ($data['task_currencies'] as $key2 => $value2) {
                $sql = "select * from project_currency where project_id=" . $project_id . " and currency_id=" . $value2['currency_id'];
                $project_currency = $this->m_common->customeQuery($sql);
                $pc_sql = "select * from task_currency where project_id=" . $project_id . " and task_id=" . $value2['parent_task_id'] . " and  currency_id=" . $value2['currency_id'];
                $p_currency = $this->m_common->customeQuery($pc_sql);

                $data['task_currencies'][$key2]['currency_equi_amount'] = $p_currency[0]['equivalant_amount'];
                $data['task_currencies'][$key2]['project_currency_rate'] = $project_currency[0]['currency_rate'];
            }
        }
        $data["parent_task_info"] = $this->m_common->get_row_array('task', array('task_id' => $data["task_info"][0]['parent_task_id'], 'is_delete' => 0, 'is_active' => 1), '*');

        $DB2 = $this->load->database('db2', TRUE);
        $result = $DB2->query("select i.* from items as i JOIN item_category as ic on i.item_category=ic.c_id where ic.c_name='" . $data["parent_task_info"][0]['task_name'] . "'");
        $data['items'] = $result->result_array();

        echo json_encode($data);
    }

    function editrootTaskInfo($id = "") {
        $this->setOutputMode(NORMAL);
        $user_id = $this->session->userdata('user_id');
        $insertData = array();
        $postData = $this->input->post();
        if (!empty($postData['task_id'])) {
            $insertData['task_id'] = $postData['task_id'];
            $task_id = $postData['task_id'];
        }
        $project_id = $postData['project_id'];

        $data["task_info"] = $this->m_common->get_row_array('task', array('task_id' => $task_id, 'is_delete' => 0, 'is_active' => 1), '*');
        foreach ($data["task_info"] as $key => $value) {
            $currency_sql = "select task_currency.*,currencies.title,currencies.symbol_left from task_currency left join currencies on task_currency.currency_id=currencies.currencies_id where task_id=" . $value['task_id'];
            $data['task_currencies'] = $this->m_common->customeQuery($currency_sql);
            foreach ($data['task_currencies'] as $key2 => $value2) {
                $sql = "select * from project_currency where project_id=" . $project_id . " and currency_id=" . $value2['currency_id'];
                $project_currency = $this->m_common->customeQuery($sql);
                $pc_sql = "select * from task_currency where project_id=" . $project_id . " and task_id=" . $value2['sub_task_id'] . " and  currency_id=" . $value2['currency_id'];
                $p_currency = $this->m_common->customeQuery($pc_sql);

                $data['task_currencies'][$key2]['currency_equi_amount'] = $p_currency[0]['equivalant_amount'];
                $data['task_currencies'][$key2]['project_currency_rate'] = $project_currency[0]['currency_rate'];
            }
        }
        $data["parent_task_info"] = $this->m_common->get_row_array('task', array('task_id' => $data["task_info"][0]['parent_task_id'], 'is_delete' => 0, 'is_active' => 1), '*');
        $data["sub_task_info"] = $this->m_common->get_row_array('task', array('task_id' => $data["task_info"][0]['sub_task_id'], 'is_delete' => 0, 'is_active' => 1), '*');

        echo json_encode($data);
    }

    function taskSubtaskInfo($id = "") {
        $this->setOutputMode(NORMAL);
        $user_id = $this->session->userdata('user_id');
        $insertData = array();
        $postData = $this->input->post();
        $project_id = $postData['project_id'];
        $task_id = $postData['task_id'];
        $sub_task_id = $postData['sub_task_id'];
        //$parent_task_id = $postData['sub_task_id'];


        $data["task_info"] = $this->m_common->get_row_array('task', array('task_id' => $task_id, 'is_delete' => 0, 'is_active' => 1), '*');
        $data["sub_task_info"] = $this->m_common->get_row_array('task', array('task_id' => $sub_task_id, 'is_delete' => 0, 'is_active' => 1), '*');
        $test = $this->m_common->get_row_array('task', array('task_id' => $sub_task_id, 'is_delete' => 0, 'is_active' => 1), '*');
        // $data["parent_task_info"] = $this->m_common->get_row_array('task', array('task_id' =>$parent_task_id,'is_delete'=>0,'is_active'=>1), '*');
        foreach ($data["sub_task_info"] as $key => $value) {
            $currency_sql = "select task_currency.*,currencies.title,currencies.symbol_left from task_currency left join currencies on task_currency.currency_id=currencies.currencies_id where task_id=" . $value['task_id'];
            $data['task_currencies'] = $this->m_common->customeQuery($currency_sql);
            foreach ($data['task_currencies'] as $key2 => $value2) {
                $sql = "select round(sum(equivalant_value)) as total_equivalant_value,round(sum(equivalant_amount)) as total_equivalant_amount from task_currency where sub_task_id=" . $sub_task_id . " and currency_id=" . $value2['currency_id'] . " and project_id=" . $project_id;
                $remain_currency_info = $this->m_common->customeQuery($sql);
                if (!empty($remain_currency_info)) {
                    $data['task_currencies'][$key2]['remainig_equivalant_value'] = 100 - $remain_currency_info[0]['total_equivalant_value'];
                    $data['task_currencies'][$key2]['remaining_equivalant_amount'] = $value2['equivalant_amount'] - $remain_currency_info[0]['total_equivalant_amount'];
                } else {
                    $data['task_currencies'][$key]['remainig_equivalant_value'] = 100;
                    $data['task_currencies'][$key]['remaining_equivalant_amount'] = $value2['equivalant_amount'];
                }
                $sql = "select * from project_currency where project_id=" . $project_id . " and currency_id=" . $value2['currency_id'];
                $project_currency = $this->m_common->customeQuery($sql);
                $data['task_currencies'][$key2]['project_eq_value'] = $project_currency[0]['equivalant_value'];
                $data['task_currencies'][$key2]['project_currency_rate'] = $project_currency[0]['currency_rate'];
            }
        }
        echo json_encode($data);
    }

    function addEditProjectTask($id = "") {
        $this->setOutputMode(NORMAL);
        $user_id = $this->session->userdata('user_id');
        $insertData = array();
        $postData = $this->input->post();
        $test = $postData['currency'];
        if (!empty($postData['project_id'])) {
            $insertData['project_id'] = $postData['project_id'];
            $project_id = $postData['project_id'];
        }

        if (!empty($postData['parent_task_id'])) {
            $insertData['parent_task_id'] = $postData['parent_task_id'];
        }

        if (!empty($postData['sub_task_id'])) {
            $insertData['sub_task_id'] = $postData['sub_task_id'];
        }

        if (!empty($postData['task_name'])) {
            $insertData['task_name'] = $postData['task_name'];
        }

        if (!empty($postData['origin'])) {
            $insertData['origin'] = $postData['origin'];
        }

        if (!empty($postData['unit'])) {
            $insertData['unit'] = $postData['unit'];
        }
        if (!empty($postData['quantity'])) {
            $insertData['quantity'] = $postData['quantity'];
        }

        if (!empty($postData['task_equivalent_currency'])) {
            $insertData['task_equivalent_currency'] = $postData['task_equivalent_currency'];
        }
        if (!empty($postData['task_value'])) {
            $insertData['task_value'] = $postData['task_value'];
        }
        $insertData['created_by'] = $user_id;
        $insertData['created'] = date('Y-m-d');
        $pre_task = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'task_name' => $postData['task_name'], 'is_active' => '1', 'is_delete' => '0'), '*');
        if (empty($pre_task)) {
            $result = $this->m_common->insert_row('task', $insertData);
        } else {
            $result = '';
        }
        if (!empty($result)) {
            foreach ($postData['currency'] as $cr) {
                $task_cur = array();
                $task_cur['project_id'] = $project_id;
                $task_cur['task_id'] = $result;
                $task_cur['currency_id'] = $cr['c_id'];
                $task_cur['equivalant_value'] = !empty($cr['c_value']) ? $cr['c_value'] : 0;
                $task_cur['equivalant_amount'] = !empty($cr['c_amount']) ? $cr['c_amount'] : 0;
                $task_cur['created_by'] = $user_id;
                $task_cur['created'] = date('Y-m-d');
                $this->m_common->insert_row('task_currency', $task_cur);
            }
            $this->save_user_activity(array('section' => 'Task', 'activity' => 'Task Created', 'user_id' => $this->session->userdata('user_id'), 'date' => date('Y-m-d H:i:s')));
            $data["status"] = "success";
            $data['tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'parent_task_id' => null, 'sub_task_id' => null, 'is_active' => 1), '*', '', '', 'position', 'asc');
            foreach ($data['tasks'] as $key => $value) {
                $data['tasks'][$key]['sub_tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'parent_task_id' => $value['task_id'], 'sub_task_id' => null, 'is_active' => 1), '*');
                if (!empty($data['tasks'][$key]['sub_tasks'])) {
                    foreach ($data['tasks'][$key]['sub_tasks'] as $key1 => $value1) {
                        $data['tasks'][$key]['sub_tasks'][$key1]['sub_sub_tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'sub_task_id' => $value1['task_id'], 'is_active' => 1), '*');
                    }
                }
            }
            //Project Currency Info
            $currency_sql = "select project_currency.*,currencies.title,currencies.symbol_left from project_currency left join currencies on project_currency.currency_id=currencies.currencies_id where project_id=" . $project_id;
            $data['project_currency_info'] = $this->m_common->customeQuery($currency_sql);
            
            foreach ($data['project_currency_info'] as $key2 => $value2) {
                $sql = "select round(sum(equivalant_value)) as total_equivalant_value,round(sum(equivalant_amount)) as total_equivalant_amount from task_currency where currency_id=" . $value2['currency_id'] . " and project_id=" . $project_id;
                $remain_currency_info = $this->m_common->customeQuery($sql);
                if (!empty($remain_currency_info)) {
                    $data['project_currency_info'][$key2]['remainig_equivalant_value'] = 100 - $remain_currency_info[0]['total_equivalant_value'];
                    $data['project_currency_info'][$key2]['remaining_equivalant_amount'] = $value2['equivalant_value'] - $remain_currency_info[0]['total_equivalant_amount'];
                } else {
                    $data['project_currency_info'][$key2]['remainig_equivalant_value'] = 100;
                    $data['project_currency_info'][$key2]['remaining_equivalant_amount'] = $value2['equivalant_value'];
                }
            }
            //End Currency Info
        } else {
            $data["status"] = "failed";
        }
        echo json_encode($data);
    }

    function EditProjectTask($id = "") {
        $this->setOutputMode(NORMAL);
        $user_id = $this->session->userdata('user_id');
        $insertData = array();
        $postData = $this->input->post();

        $task_id = $postData['task_id'];
        $project_id = $postData['project_id'];
        if (!empty($postData['parent_task_id'])) {
            $insertData['parent_task_id'] = $postData['parent_task_id'];
            $parent_task_id = $postData['parent_task_id'];
        }

        if (!empty($postData['sub_task_id'])) {
            $insertData['sub_task_id'] = $postData['sub_task_id'];
            $sub_task_id = $postData['sub_task_id'];
        }

        if (!empty($postData['task_name'])) {
            $insertData['task_name'] = $postData['task_name'];
        }

        if (!empty($postData['origin'])) {
            $insertData['origin'] = $postData['origin'];
        }

        if (!empty($postData['unit'])) {
            $insertData['unit'] = $postData['unit'];
        }
        if (!empty($postData['quantity'])) {
            $insertData['quantity'] = $postData['quantity'];
        }
        if (!empty($postData['task_equivalent_currency'])) {
            $insertData['task_equivalent_currency'] = $postData['task_equivalent_currency'];
        }
        if (!empty($postData['task_value'])) {
            $insertData['task_value'] = $postData['task_value'];
        }
        $insertData['created_by'] = $user_id;
        $insertData['created'] = date('Y-m-d');
        $result = $this->m_common->update_row('task', array('task_id' => $task_id), $insertData);
        if (!empty($result)) {
            $this->m_common->delete_row('task_currency', array('task_id' => $task_id));
            foreach ($postData['currency'] as $cr) {
                $task_cur = array();
                $task_cur['project_id'] = $project_id;
                $task_cur['task_id'] = $task_id;
                if (!empty($parent_task_id) && !empty($sub_task_id)) {
                    $task_cur['parent_task_id'] = $parent_task_id;
                    $task_cur['sub_task_id'] = $sub_task_id;
                } else if (!empty($parent_task_id)) {
                    $task_cur['parent_task_id'] = $parent_task_id;
                } else if (!empty($sub_task_id)) {
                    $task_cur['sub_task_id'] = $sub_task_id;
                }
                $task_cur['currency_id'] = $cr['c_id'];
                $task_cur['equivalant_value'] = $cr['c_value'];
                $task_cur['equivalant_amount'] = $cr['c_amount'];
                $task_cur['created_by'] = $user_id;
                $task_cur['modified'] = date('Y-m-d');
                $this->m_common->insert_row('task_currency', $task_cur);
            }

            $this->save_user_activity(array('section' => 'Task', 'activity' => 'Task Updated', 'user_id' => $this->session->userdata('user_id'), 'date' => date('Y-m-d H:i:s')));

            $data["status"] = "success";
            $data['tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'parent_task_id' => null, 'sub_task_id' => null, 'is_active' => 1), '*', '', '', 'position', 'asc');
            foreach ($data['tasks'] as $key => $value) {
                $data['tasks'][$key]['sub_tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'parent_task_id' => $value['task_id'], 'sub_task_id' => null, 'is_active' => 1), '*');
                if (!empty($data['tasks'][$key]['sub_tasks'])) {
                    foreach ($data['tasks'][$key]['sub_tasks'] as $key1 => $value1) {
                        $data['tasks'][$key]['sub_tasks'][$key1]['sub_sub_tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'sub_task_id' => $value1['task_id'], 'is_active' => 1), '*');
                    }
                }
            }
        } else {
            $data["status"] = "failed";
            $data['tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'parent_task_id' => null, 'sub_task_id' => null, 'is_active' => 1), '*', '', '', 'position', 'asc');
            foreach ($data['tasks'] as $key => $value) {
                $data['tasks'][$key]['sub_tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'parent_task_id' => $value['task_id'], 'sub_task_id' => null, 'is_active' => 1), '*');
                if (!empty($data['tasks'][$key]['sub_tasks'])) {
                    foreach ($data['tasks'][$key]['sub_tasks'] as $key1 => $value1) {
                        $data['tasks'][$key]['sub_tasks'][$key1]['sub_sub_tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'sub_task_id' => $value1['task_id'], 'is_active' => 1), '*');
                    }
                }
            }
        }
        echo json_encode($data);
    }

    function addEditSubTask($id = "") {
        $this->setOutputMode(NORMAL);
        $user_id = $this->session->userdata('user_id');
        $insertData = array();
        $postData = $this->input->post();
       
        $test = $postData['currency'];
        if (!empty($postData['project_id'])) {
            $insertData['project_id'] = $postData['project_id'];
            $project_id = $postData['project_id'];
        }

        if (!empty($postData['parent_task_id'])) {
            $insertData['parent_task_id'] = $postData['parent_task_id'];
            $parent_task_id = $postData['parent_task_id'];
        }

        if (!empty($postData['sub_task_id'])) {
            $insertData['sub_task_id'] = $postData['sub_task_id'];
        }

        if (!empty($postData['task_name'])) {
            $insertData['task_name'] = $postData['task_name'];
        }

        if (!empty($postData['origin'])) {
            $insertData['origin'] = $postData['origin'];
        }

        if (!empty($postData['unit'])) {
            $insertData['unit'] = $postData['unit'];
        }
        if (!empty($postData['quantity'])) {
            $insertData['quantity'] = $postData['quantity'];
        }

        if (!empty($postData['task_equivalent_currency'])) {
            $insertData['task_equivalent_currency'] = $postData['task_equivalent_currency'];
        }
        if (!empty($postData['task_value'])) {
            $insertData['task_value'] = $postData['task_value'];
        }
        $insertData['created_by'] = $user_id;
        $insertData['created'] = date('Y-m-d');


        if (!empty($parent_task_id))
            $pre_task = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'parent_task_id' => $parent_task_id, 'task_name' => $postData['task_name'], 'is_delete' => 0, 'is_active' => 1), '*');
        else
            $pre_task = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'task_name' => $postData['task_name'], 'is_delete' => 0, 'is_active' => 1), '*');
        if (empty($pre_task)) {
            $result = $this->m_common->insert_row('task', $insertData);
        } else {
            $result = '';
        }
        if (!empty($result)) {
            foreach ($postData['currency'] as $cr) {
                $task_cur = array();
                $task_cur['project_id'] = $project_id;
                $task_cur['task_id'] = $result;
                $task_cur['parent_task_id'] = $parent_task_id;
                $task_cur['currency_id'] = $cr['c_id'];
                $task_cur['equivalant_value'] = $cr['c_value'];
                $task_cur['equivalant_amount'] = $cr['c_amount'];
                $task_cur['created_by'] = $user_id;
                $task_cur['created'] = date('Y-m-d');
                $this->m_common->insert_row('task_currency', $task_cur);
            }
            $this->save_user_activity(array('section' => 'Task', 'activity' => 'Sub Task Created', 'user_id' => $this->session->userdata('user_id'), 'date' => date('Y-m-d H:i:s')));
            $data["status"] = "success";
            $data['tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'parent_task_id' => null, 'sub_task_id' => null, 'is_active' => 1), '*', '', '', 'position', 'asc');
            foreach ($data['tasks'] as $key => $value) {
                $data['tasks'][$key]['sub_tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'parent_task_id' => $value['task_id'], 'sub_task_id' => null, 'is_active' => 1), '*');
                if (!empty($data['tasks'][$key]['sub_tasks'])) {
                    foreach ($data['tasks'][$key]['sub_tasks'] as $key1 => $value1) {
                        $data['tasks'][$key]['sub_tasks'][$key1]['sub_sub_tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'sub_task_id' => $value1['task_id'], 'is_active' => 1), '*');
                    }
                }
            }

            $pre_dept = $this->m_common->get_row_array('department', array('project_id' => $project_id, 'is_active' => 1), '*');
            $dept_id = $pre_dept[0]['dept_id'];

            // Insert department task details
        $deptTaskData = array(
            'task_id' => $result,
            'dept_id' => $dept_id,
            'project_id' => $project_id,
            'meterial_specification' => $postData['mat_specification'],
            'unit' => $postData['unit'],
            'qty' => $postData['qty'],
            'rate' => $postData['rate'],
            'total' => $postData['amount'],
            'remark' => $postData['remarks'],
            'report' => $postData['report'],
            'created_by' => $user_id,
            'created' => date('Y-m-d')
        );

        $chk_dpt_ext = $this->m_common->get_row_array('department_task', $deptTaskData, '*');
        if (empty($chk_dpt_ext)) {
            $this->m_common->insert_row('department_task', $deptTaskData);
        } else {
            $this->m_common->update_row('department_task', array('dept_task_id' => $chk_dpt_ext[0]['dept_task_id']), $deptTaskData);
        }

            //Project Currency Info
            $currency_sql = "select task_currency.*,currencies.title,currencies.symbol_left from task_currency left join currencies on task_currency.currency_id=currencies.currencies_id where task_id=" . $parent_task_id;
            $data['task_currencies'] = $this->m_common->customeQuery($currency_sql);
            foreach ($data['task_currencies'] as $key2 => $value2) {
                $sql = "select round(sum(equivalant_value)) as total_equivalant_value,round(sum(equivalant_amount)) as total_equivalant_amount from task_currency where parent_task_id=" . $parent_task_id . " and currency_id=" . $value2['currency_id'] . " and project_id=" . $project_id;
                $remain_currency_info = $this->m_common->customeQuery($sql);
                if (!empty($remain_currency_info)) {
                    $data['task_currencies'][$key2]['remainig_equivalant_value'] = 100 - $remain_currency_info[0]['total_equivalant_value'];
                    $data['task_currencies'][$key2]['remaining_equivalant_amount'] = $value2['equivalant_amount'] - $remain_currency_info[0]['total_equivalant_amount'];
                } else {
                    $data['task_currencies'][$key2]['remainig_equivalant_value'] = 100;
                    $data['task_currencies'][$key2]['remaining_equivalant_amount'] = $value2['equivalant_amount'];
                }
                $sql = "select * from project_currency where project_id=" . $project_id . " and currency_id=" . $value2['currency_id'];
                $project_currency = $this->m_common->customeQuery($sql);
                $data['task_currencies'][$key2]['project_eq_value'] = $project_currency[0]['equivalant_value'];
                $data['task_currencies'][$key2]['project_currency_rate'] = $project_currency[0]['currency_rate'];
            }
            //End Currency Info
        } else {
            $data["status"] = "failed";
        }
        echo json_encode($data);
    }

    function addEditRootTask($id = "") {
        $this->setOutputMode(NORMAL);
        $user_id = $this->session->userdata('user_id');
        $insertData = array();
        $postData = $this->input->post();
        $test = $postData['currency'];
        if (!empty($postData['project_id'])) {
            $insertData['project_id'] = $postData['project_id'];
            $project_id = $postData['project_id'];
        }

        if (!empty($postData['parent_task_id'])) {
            $insertData['parent_task_id'] = $postData['parent_task_id'];
            $parent_task_id = $postData['parent_task_id'];
        }

        if (!empty($postData['sub_task_id'])) {
            $insertData['sub_task_id'] = $postData['sub_task_id'];
            $sub_task_id = $postData['sub_task_id'];
        }

        if (!empty($postData['task_name'])) {
            $insertData['task_name'] = $postData['task_name'];
        }

        if (!empty($postData['origin'])) {
            $insertData['origin'] = $postData['origin'];
        }

        if (!empty($postData['unit'])) {
            $insertData['unit'] = $postData['unit'];
        }
        if (!empty($postData['quantity'])) {
            $insertData['quantity'] = $postData['quantity'];
        }

        if (!empty($postData['task_equivalent_currency'])) {
            $insertData['task_equivalent_currency'] = $postData['task_equivalent_currency'];
        }
        if (!empty($postData['task_value'])) {
            $insertData['task_value'] = $postData['task_value'];
        }
        $insertData['created_by'] = $user_id;
        $insertData['created'] = date('Y-m-d');
        if (!empty($parent_task_id) && !empty($sub_task_id))
            $pre_task = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'parent_task_id' => $parent_task_id, 'sub_task_id' => $sub_task_id, 'task_name' => $postData['task_name'], 'is_delete' => 0, 'is_active' => 1), '*');
        else if (!empty($sub_task_id))
            $pre_task = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'sub_task_id' => $sub_task_id, 'task_name' => $postData['task_name'], 'is_delete' => 0, 'is_active' => 1), '*');
        else
            $pre_task = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'task_name' => $postData['task_name'], 'is_delete' => 0, 'is_active' => 1), '*');
        if (empty($pre_task)) {
            $result = $this->m_common->insert_row('task', $insertData);
        } else {
            $result = '';
        }
        if (!empty($result)) {
            foreach ($postData['currency'] as $cr) {
                $task_cur = array();
                $task_cur['project_id'] = $project_id;
                $task_cur['task_id'] = $result;
                $task_cur['parent_task_id'] = $parent_task_id;
                $task_cur['sub_task_id'] = $sub_task_id;
                $task_cur['currency_id'] = $cr['c_id'];
                $task_cur['equivalant_value'] = $cr['c_value'];
                $task_cur['equivalant_amount'] = $cr['c_amount'];
                $task_cur['created_by'] = $user_id;
                $task_cur['created'] = date('Y-m-d');
                $this->m_common->insert_row('task_currency', $task_cur);
            }

            $this->save_user_activity(array('section' => 'Task', 'activity' => 'Root Task Created', 'user_id' => $this->session->userdata('user_id'), 'date' => date('Y-m-d H:i:s')));


            $data["status"] = "success";
            $data['tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'parent_task_id' => null, 'sub_task_id' => null, 'is_active' => 1), '*', '', '', 'position', 'asc');
            foreach ($data['tasks'] as $key => $value) {
                $data['tasks'][$key]['sub_tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'parent_task_id' => $value['task_id'], 'sub_task_id' => null, 'is_active' => 1), '*');
                if (!empty($data['tasks'][$key]['sub_tasks'])) {
                    foreach ($data['tasks'][$key]['sub_tasks'] as $key1 => $value1) {
                        $data['tasks'][$key]['sub_tasks'][$key1]['sub_sub_tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'sub_task_id' => $value1['task_id'], 'is_active' => 1), '*');
                    }
                }
            }
            //Project Currency Info
            $currency_sql = "select task_currency.*,currencies.title,currencies.symbol_left from task_currency left join currencies on task_currency.currency_id=currencies.currencies_id where task_id=" . $sub_task_id;
            $data['task_currencies'] = $this->m_common->customeQuery($currency_sql);
            foreach ($data['task_currencies'] as $key2 => $value2) {
                $sql = "select round(sum(equivalant_value)) as total_equivalant_value,round(sum(equivalant_amount)) as total_equivalant_amount from task_currency where sub_task_id=" . $sub_task_id . " and currency_id=" . $value2['currency_id'] . " and project_id=" . $project_id;
                $remain_currency_info = $this->m_common->customeQuery($sql);
                if (!empty($remain_currency_info)) {
                    $data['task_currencies'][$key2]['remainig_equivalant_value'] = 100 - $remain_currency_info[0]['total_equivalant_value'];
                    $data['task_currencies'][$key2]['remaining_equivalant_amount'] = $value2['equivalant_amount'] - $remain_currency_info[0]['total_equivalant_amount'];
                } else {
                    $data['task_currencies'][$key2]['remainig_equivalant_value'] = 100;
                    $data['task_currencies'][$key2]['remaining_equivalant_amount'] = $value2['equivalant_amount'];
                }
                $sql = "select * from project_currency where project_id=" . $project_id . " and currency_id=" . $value2['currency_id'];
                $project_currency = $this->m_common->customeQuery($sql);
                $data['task_currencies'][$key2]['project_eq_value'] = $project_currency[0]['equivalant_value'];
                $data['task_currencies'][$key2]['project_currency_rate'] = $project_currency[0]['currency_rate'];
            }
            //End Currency Info
        } else {
            $data["status"] = "failed";
        }
        echo json_encode($data);
    }

    function deleteTask() {
        $this->setOutputMode(NORMAL);
        $postData = $this->input->post();
        $task_id = $postData['task_id'];
        $project_id = $postData['project_id'];
        $result = $this->m_common->update_row('task', array('task_id' => $task_id), array('is_delete' => 1, 'is_active' => 0));
        if (!empty($result)) {
            $this->m_common->delete_row('task_currency', array('project_id' => $project_id, 'task_id' => $task_id));
            $this->save_user_activity(array('section' => 'Task', 'activity' => 'Task Deleted', 'user_id' => $this->session->userdata('user_id'), 'date' => date('Y-m-d H:i:s')));
            $data["status"] = "success";
            $data['tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'parent_task_id' => null, 'sub_task_id' => null, 'is_active' => 1), '*', '', '', 'position', 'asc');
            foreach ($data['tasks'] as $key => $value) {
                $data['tasks'][$key]['sub_tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'parent_task_id' => $value['task_id'], 'sub_task_id' => null, 'is_active' => 1), '*');
                if (!empty($data['tasks'][$key]['sub_tasks'])) {
                    foreach ($data['tasks'][$key]['sub_tasks'] as $key1 => $value1) {
                        $data['tasks'][$key]['sub_tasks'][$key1]['sub_sub_tasks'] = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'sub_task_id' => $value1['task_id'], 'is_active' => 1), '*');
                    }
                }
            }
        }
        echo json_encode($data);
    }

    //Start Department
    function departmentValueInfo() {
        $this->setOutputMode(NORMAL);
        $user_id = $this->session->userdata('user_id');
        $project_id = $this->input->post('project_id');
        $sql = "select sum(dept_value) as toal_dept_value from department where project_id=" . $project_id . " and is_active=1";
        $data['dept_info'] = $this->m_common->customeQuery($sql);
        if (!empty($data['dept_info'])) {
            $data['status'] = "success";
        } else {
            $data['status'] = "failed";
        }
        echo json_encode($data);
    }

    function addDepartment($id = "") {
        $this->setOutputMode(NORMAL);
        $user_id = $this->session->userdata('user_id');
        $insertData = array();
        $postData = $this->input->post();
        if (!empty($postData['project_id'])) {
            $insertData['project_id'] = $postData['project_id'];
            $project_id = $postData['project_id'];
        }

        if (!empty($postData['dept_name'])) {
            $insertData['dept_name'] = $postData['dept_name'];
            $dept_name = $postData['dept_name'];
        }
        if (!empty($postData['dept_value'])) {
            $insertData['dept_value'] = $postData['dept_value'];
            $dept_value = $postData['dept_value'];
        }

        if (!empty($postData['text_color'])) {
            $insertData['text_color'] = $postData['text_color'];
        }

        if (!empty($postData['box_color'])) {
            $insertData['box_color'] = $postData['box_color'];
        }

        $insertData['created_by'] = $user_id;
        $insertData['created'] = date('Y-m-d');
        $pre_dept = $this->m_common->get_row_array('department', array('project_id' => $project_id, 'is_active' => 1, 'dept_name' => $dept_name), '*');
        if (!empty($pre_dept)) {
            $result = '';
            $data["error"] = "Already exists";
            $data["error_no"] = 1;
        } else {

            $sql = "select sum(dept_value) as toal_dept_value from department where project_id=" . $project_id . ' and is_active=1';
            $pre_dept_value = $this->m_common->customeQuery($sql);
            if (!empty($pre_dept_value)) {
                $total_dept_value = $pre_dept_value[0]['toal_dept_value'] + $dept_value;
            } else {
                $total_dept_value = $dept_value;
            }
            if ($total_dept_value <= 100) {
                $result = $this->m_common->insert_row('department', $insertData);
            } else {
                $result = '';
                $data["error"] = "Value should not be more than 100%";
                $data["error_no"] = 2;
            }
        }
        if (!empty($result)) {
            $this->save_user_activity(array('section' => 'Department', 'activity' => 'Department Created', 'user_id' => $this->session->userdata('user_id'), 'date' => date('Y-m-d H:i:s')));
            $data["status"] = "success";
            $sql = "select sum(dept_value) as toal_dept_value from department where project_id=" . $project_id . ' and is_active=1';
            $data['dept_info'] = $this->m_common->customeQuery($sql);
            $data['departments'] = $this->m_common->get_row_array('department', array('project_id' => $project_id, 'is_active' => 1), '*');
            //$departments=$this->m_common->get_row_array('department',array('project_id'=>$project_id),'*');
        } else {
            $data["status"] = "failed";
        }
        echo json_encode($data);
    }

    function editDepartment($id = "") {
        $this->setOutputMode(NORMAL);
        $user_id = $this->session->userdata('user_id');
        $insertData = array();
        $dept_id = $this->input->post('dept_id');

        $data['dept_info'] = $this->m_common->get_row_array('department', array('dept_id' => $dept_id), '*');

        echo json_encode($data);
    }

    function editActionDepartment() {
        $this->setOutputMode(NORMAL);
        $user_id = $this->session->userdata('user_id');
        $postData = $this->input->post();
        $insertData = array();
        $dept_id = $this->input->post('dept_id');
        $project_id = $this->input->post('project_id');
        $pre_dept_info = $this->m_common->get_row_array('department', array('project_id' => $project_id, 'is_active' => 1, 'dept_id' => $dept_id), '*');
        if (!empty($postData['dept_name'])) {
            $insertData['dept_name'] = $postData['dept_name'];
            $dept_name = $postData['dept_name'];
        }
        if (!empty($postData['dept_value'])) {
            $insertData['dept_value'] = $postData['dept_value'];
            $dept_value = $postData['dept_value'];
        }
        if (!empty($postData['text_color'])) {
            $insertData['text_color'] = $postData['text_color'];
        }

        if (!empty($postData['box_color'])) {
            $insertData['box_color'] = $postData['box_color'];
        }
        $pre_dept = $this->m_common->get_row_array('department', array('project_id' => $project_id, 'is_active' => 1, 'dept_name' => $dept_name), '*');
        if (!empty($pre_dept)) {
            if ($pre_dept[0]['dept_id'] != $pre_dept_info[0]['dept_id']) {
                $result = '';
                $data["error"] = "Already exists";
                $data["error_no"] = 1;
            } else {
                $sql = "select sum(dept_value) as toal_dept_value from department where project_id=" . $project_id . ' and is_active=1';
                $pre_dept_value = $this->m_common->customeQuery($sql);
                $total_dept_value = $pre_dept_value[0]['toal_dept_value'] + $dept_value - $pre_dept_info[0]['dept_value'];
                if ($total_dept_value <= 100) {
                    $insertData['created_by'] = $user_id;
                    $insertData['created'] = date('Y-m-d');
                    $data["error_no"] = 3;
                    $result = $this->m_common->update_row('department', array('dept_id' => $dept_id), $insertData);
                } else {
                    $result = '';
                    $data["error"] = "Value should not be more than 100%";
                    $data["error_no"] = 2;
                }
            }
        } else {
            $sql = "select sum(dept_value) as toal_dept_value from department where project_id=" . $project_id . ' and is_active=1';
            $pre_dept_value = $this->m_common->customeQuery($sql);
            $total_dept_value = $pre_dept_value[0]['toal_dept_value'] + $dept_value - $pre_dept_info[0]['dept_value'];
            if ($total_dept_value <= 100) {
                $insertData['created_by'] = $user_id;
                $insertData['created'] = date('Y-m-d');
                $data["error_no"] = 3;
                $result = $this->m_common->update_row('department', array('dept_id' => $dept_id), $insertData);
            } else {
                $result = '';
                $data["error"] = "Value should not be more than 100%";
                $data["error_no"] = 2;
            }
        }



        if (!empty($result)) {
            $this->save_user_activity(array('section' => 'Department', 'activity' => 'Department Updated', 'user_id' => $this->session->userdata('user_id'), 'date' => date('Y-m-d H:i:s')));
            $data["status"] = "success";
            $sql = "select sum(dept_value) as toal_dept_value from department where project_id=" . $project_id . ' and is_active=1';
            $data['dept_info'] = $this->m_common->customeQuery($sql);
            $data['department_info'] = $this->m_common->get_row_array('department', array('project_id' => $project_id, 'is_active' => 1, 'dept_id' => $dept_id), '*');
            $data['departments'] = $this->m_common->get_row_array('department', array('project_id' => $project_id, 'is_active' => 1), '*');
        } else {
            $data["status"] = "failed";
        }
        echo json_encode($data);
    }

    function deleteDepartment() {
        $this->setOutputMode(NORMAL);
        $dept_id = $this->input->post('dept_id');
        $project_id = $this->input->post('project_id');
        $result = $this->m_common->update_row('department', array('dept_id' => $dept_id), array('is_delete' => 1, 'is_active' => 0));
        if (!empty($result)) {
            $this->m_common->delete_row('project_status', array('dept_id' => $dept_id, 'project_id' => $project_id));
            $sql = "select sum(dept_value) as toal_dept_value from department where project_id=" . $project_id . ' and is_active=1';
            $data['dept_info'] = $this->m_common->customeQuery($sql);
            $this->save_user_activity(array('section' => 'Department', 'activity' => 'Department Deleted', 'user_id' => $this->session->userdata('user_id'), 'date' => date('Y-m-d H:i:s')));
            $data["status"] = "success";
            $data['departments'] = $this->m_common->get_row_array('department', array('project_id' => $project_id, 'is_active' => 1), '*');
        }
        echo json_encode($data);
    }

    //End Department
    //Start Status
    function addStatus($id = "") {
        $this->setOutputMode(NORMAL);
        $user_id = $this->session->userdata('user_id');
        $insertData = array();
        $postData = $this->input->post();
        if (!empty($postData['project_id'])) {
            $insertData['project_id'] = $postData['project_id'];
            $project_id = $postData['project_id'];
        }

        if (!empty($postData['status_name'])) {
            $insertData['status_name'] = $postData['status_name'];
        }
        if (!empty($postData['dept_id'])) {
            $insertData['dept_id'] = $postData['dept_id'];
            $dept_id = $postData['dept_id'];
        }

        $insertData['created_by'] = $user_id;
        $insertData['created'] = date('Y-m-d');
        $pre_status = $this->m_common->get_row_array('project_status', array('project_id' => $project_id, 'dept_id' => $dept_id, 'status_name' => $postData['status_name']));
        if (empty($pre_status)) {
            $result = $this->m_common->insert_row('project_status', $insertData);
        } else {
            $result = '';
        }
        if (!empty($result)) {
            $this->save_user_activity(array('section' => 'Project Status', 'activity' => 'Status Created', 'user_id' => $this->session->userdata('user_id'), 'date' => date('Y-m-d H:i:s')));
            $data["status"] = "success";
            $sql = "select project_status.*,department.dept_name from project_status left join department on project_status.dept_id=department.dept_id where project_status.project_id=" . $project_id . ' and project_status.dept_id=' . $postData['dept_id'];
            $data['project_status'] = $this->m_common->customeQuery($sql);
            //$data['project_status']=$this->m_common->get_row_array('project_status',array('project_id'=>$project_id),'*');
        } else {
            $data["status"] = "failed";
        }
        echo json_encode($data);
    }

    function editStatus($id = "") {
        $this->setOutputMode(NORMAL);
        $user_id = $this->session->userdata('user_id');
        $insertData = array();
        $status_id = $this->input->post('status_id');

        $data['status_info'] = $this->m_common->get_row_array('project_status', array('status_id' => $status_id), '*');

        echo json_encode($data);
    }

    function editActionStatus() {
        $this->setOutputMode(NORMAL);
        $user_id = $this->session->userdata('user_id');
        $postData = $this->input->post();
        $insertData = array();
        $dept_id = $this->input->post('dept_id');
        $project_id = $this->input->post('project_id');
        $status_id = $this->input->post('status_id');
        if (!empty($postData['status_name'])) {
            $insertData['status_name'] = $postData['status_name'];
        }
        if (!empty($postData['dept_id'])) {
            $insertData['dept_id'] = $postData['dept_id'];
        }

        $insertData['created_by'] = $user_id;
        $insertData['created'] = date('Y-m-d');
        $result = $this->m_common->update_row('project_status', array('status_id' => $status_id), $insertData);
        if (!empty($result)) {
            $this->save_user_activity(array('section' => 'Project Status', 'activity' => 'Status Updated', 'user_id' => $this->session->userdata('user_id'), 'date' => date('Y-m-d H:i:s')));
            $data["status"] = "success";
            $data['project_status'] = $this->m_common->get_row_array('project_status', array('project_id' => $project_id), '*');
        } else {
            $data["status"] = "failed";
        }
        echo json_encode($data);
    }

    function deptStatus() {
        $this->setOutputMode(NORMAL);
        $dept_id = $this->input->post('dept_id');
        $project_id = $this->input->post('project_id');
        $data["status"] = "success";
        $data['project_status'] = $this->m_common->get_row_array('project_status', array('project_id' => $project_id, 'dept_id' => $dept_id), '*');
        echo json_encode($data);
    }

    function deleteStatus() {
        $this->setOutputMode(NORMAL);
        $status_id = $this->input->post('status_id');
        $project_id = $this->input->post('project_id');
        $dept_id = $this->input->post('dept_id');
        $result = $this->m_common->delete_row('project_status', array('status_id' => $status_id));
        if (!empty($result)) {
            $this->save_user_activity(array('section' => 'Project Status', 'activity' => 'Status Deleted', 'user_id' => $this->session->userdata('user_id'), 'date' => date('Y-m-d H:i:s')));
            $data["status"] = "success";
            $data['project_status'] = $this->m_common->get_row_array('project_status', array('project_id' => $project_id, 'dept_id' => $dept_id), '*');
        }
        echo json_encode($data);
    }

    //End Status
    function get_division_list() {
        $this->setOutputMode(NORMAL);
        $country = $this->input->post('country');
        if (in_array($country, array('Bangladesh', 'United States'))) {
            if ($country == 'Bangladesh') {
                $short_name = 'BD';
            } else if ($country == 'United States') {
                $short_name = 'USA';
            }
            $divisions = $this->m_common->get_row_array('country_description', array('country' => $short_name), 'division', 'division');
            echo '<option value="">Select</option>';
            foreach ($divisions as $div) {
                echo '<option>' . $div['division'] . '</option>';
            }
        } else {
            $this->load->library('SelectorDOM');
            $html = $this->getDataByCurl('https://worldpostalcode.com/' . str_replace(' ', '-', strtolower($country)) . '/');
            $dom = new SelectorDom($html);
            $divisions = $dom->select('.regions');
            //  $divisions = array_diff(scandir('region_city_data/' . $country), array('..', '.'));
            echo '<option value="">Select</option>';
            foreach ($divisions['0']['children'] as $div) {
                echo '<option>' . $div['text'] . '</option>';
            }
//            foreach ($divisions as $div) {
//                echo '<option>' . str_replace('.json', '', $div) . '</option>';
//            }
        }
    }

    function get_district_list() {
        $this->setOutputMode(NORMAL);
        $country = $this->input->post('country');
        $division = $this->input->post('division');
        if (in_array($country, array('Bangladesh', 'United States'))) {
            if ($country == 'Bangladesh') {
                $short_name = 'BD';
            } else if ($country == 'United States') {
                $short_name = 'USA';
            }
            $cities = $this->m_common->get_row_array('country_description', array('country' => $short_name, 'division' => $division), 'district', 'district');
            echo '<option value="">Select</option>';
            foreach ($cities as $city) {
                echo '<option>' . $city['district'] . '</option>';
            }
        } else {
            $this->load->library('SelectorDOM');
            $html = $this->getDataByCurl('https://worldpostalcode.com/' . str_replace(' ', '-', strtolower($country)) . '/' . str_replace(' ', '-', strtolower($division)) . '/');
            $dom = new SelectorDom($html);
            $cities = $dom->select('.regions');
            // $cities = json_decode(file_get_contents('region_city_data/' . $country . '/' . $division . '.json'), true);
            echo '<option value="">Select</option>';
            foreach ($cities['0']['children'] as $city) {
                echo '<option>' . $city['text'] . '</option>';
            }
//            foreach ($cities['cities'] as $city) {
//                echo '<option>' . $city['asciiname'] . '</option>';
//            }
        }
    }

    function get_upazila_list() {
        $this->setOutputMode(NORMAL);
        $country = $this->input->post('country');
        $division = $this->input->post('division');
        $district = $this->input->post('district');
        if (in_array($country, array('Bangladesh', 'United States'))) {
            if ($country == 'Bangladesh') {
                $short_name = 'BD';
            } else if ($country == 'United States') {
                $short_name = 'USA';
            }
            $upazilas = $this->m_common->get_row_array('country_description', array('country' => $short_name, 'division' => $division, 'district' => $district), 'thana', 'thana');
            echo '<option value="">Select</option>';
            foreach ($upazilas as $up) {
                echo '<option>' . $up['thana'] . '</option>';
            }
        } else {
            $this->load->library('SelectorDOM');
            $html = $this->getDataByCurl('https://worldpostalcode.com/' . str_replace(' ', '-', strtolower($country)) . '/' . str_replace(' ', '-', strtolower($division)) . '/' . str_replace(' ', '-', strtolower($district)));
            if (empty($html))
                $html = $this->getDataByCurl('https://worldpostalcode.com/' . str_replace(' ', '-', strtolower($country)) . '/' . str_replace(' ', '-', strtolower($division)) . '/' . str_replace(' ', '-', strtolower($district)) . '/');
            $dom = new SelectorDom($html);
            $upazilas = $dom->select('.container');
            echo '<option value="">Select</option>';
//            foreach ($upazilas['0']['children'] as $up) {
//                echo '<option>' . $up['text'] . '</option>';
//            }
            foreach ($upazilas as $up) {
                echo '<option>' . $up['children'][0]['text'] . '-' . $up['children'][1]['text'] . '</option>';
            }
        }
    }

    function cloneProject($project_id = false) {
        $this->setOutputMode(NORMAL);
        $user_id = $this->session->userdata('user_id');
        $project_id = $this->input->post('project_id');
        $pre_project_info = $this->m_common->get_row_array('projects', array('project_id' => $project_id), '*');
        $insertData['project_name'] = "Clone " . $pre_project_info[0]['project_name'];
        $insertData['package_no'] = $pre_project_info[0]['package_no'];
        $insertData['project_owner'] = $pre_project_info[0]['project_owner'];
        $insertData['country'] = $pre_project_info[0]['country'];
        $insertData['division'] = $pre_project_info[0]['division'];
        $insertData['district'] = $pre_project_info[0]['district'];
        $insertData['zone'] = $pre_project_info[0]['zone'];
        $insertData['type'] = $pre_project_info[0]['type'];
        $insertData['contractor'] = $pre_project_info[0]['contractor'];
        $insertData['contract_date'] = $pre_project_info[0]['contract_date'];
        $insertData['execution_start_date'] = $pre_project_info[0]['execution_start_date'];
        $insertData['construction_time'] = $pre_project_info[0]['construction_time'];
        $insertData['handover_date'] = $pre_project_info[0]['handover_date'];
        $insertData['scheduled_completion_date'] = $pre_project_info[0]['scheduled_completion_date'];
        $insertData['actual_completion_date'] = $pre_project_info[0]['actual_completion_date'];
        $insertData['equivalent_currency'] = $pre_project_info[0]['equivalent_currency'];
        $insertData['project_value'] = $pre_project_info[0]['project_value'];
        $insertData['created_by'] = $user_id;
        $insertData['created'] = date('Y-m-d');
        // $insertData['modified']=$pre_project_info[0]['modified'];
        $insertData['currency_rate'] = $pre_project_info[0]['currency_rate'];
        $insertData['progress'] = $pre_project_info[0]['progress'];
        $insertData['code'] = $pre_project_info[0]['code'];
        $insertData['contract_period'] = $pre_project_info[0]['contract_period'];
        $insertData['site_location'] = $pre_project_info[0]['site_location'];
        $insertData['execution_period'] = $pre_project_info[0]['execution_period'];
        $insertData['time_extension'] = $pre_project_info[0]['time_extension'];
        $insertData['project_status'] = "Incomplete";
        $insertData['completed_by'] = $pre_project_info[0]['completed_by'];
        $result = $this->m_common->insert_row('projects', $insertData);
        
        if (!empty($result)) {
        $this->create_sc_project($insertData, $result);

            $sql = "select * from assign_user where project_id=" . $project_id . " and (department_id=0 or department_id is null)";
            $assign_user_info = $this->m_common->customeQuery($sql);
            foreach ($assign_user_info as $assign_user) {
                $insertAssignUser = array();
                $insertAssignUser['department_id'] = $assign_user['department_id'];
                $insertAssignUser['project_id'] = $result;
                $insertAssignUser['user_id'] = $assign_user['user_id'];
                $insertAssignUser['created'] = date('Y-m-d');
                $insertAssignUser['created_by'] = $user_id;
                $insertAssignUser['user_type'] = $assign_user['user_type'];
                $insertAssignUser['is_active'] = $assign_user['is_active'];
                $this->m_common->insert_row('assign_user', $insertAssignUser);
            }


            $project_currency_info = $this->m_common->get_row_array('project_currency', array('project_id' => $project_id), '*');
            foreach ($project_currency_info as $project_currency) {
                $insertProjectCurrency = array();
                $insertProjectCurrency['currency_id'] = $project_currency['currency_id'];
                $insertProjectCurrency['project_id'] = $result;
                $insertProjectCurrency['created_by'] = $user_id;
                $insertProjectCurrency['created'] = date('Y-m-d');
                $insertProjectCurrency['currency_rate'] = $project_currency['currency_rate'];
                $insertProjectCurrency['equivalant_value'] = $project_currency['equivalant_value'];
                $this->m_common->insert_row('project_currency', $insertProjectCurrency);
            }

            $pre_department_info = $this->m_common->get_row_array('department', array('project_id' => $project_id, 'is_active' => 1), '*');
            $all_department = $pre_department_info;
            foreach ($pre_department_info as $dept_info) {
                $a_user_info = array();
                $insertDepartment = array();
                $insertDepartment['dept_name'] = $dept_info['dept_name'];
                $insertDepartment['dept_value'] = $dept_info['dept_value'];
                $insertDepartment['project_id'] = $result;
                $insertDepartment['created_by'] = $user_id;
                $insertDepartment['created'] = date('Y-m-d');
                $insertDepartment['is_active'] = 1;
                $insertDepartment['progress'] = $dept_info['progress'];
                $dept_id = $this->m_common->insert_row('department', $insertDepartment);

                $a_user_info = $this->m_common->get_row_array('assign_user', array('project_id' => $project_id, 'department_id' => $dept_info['dept_id'], 'is_active' => 1), '*');
                foreach ($a_user_info as $a_user) {
                    $insertAssignUser = array();
                    $insertAssignUser['department_id'] = $dept_id;
                    $insertAssignUser['project_id'] = $result;
                    $insertAssignUser['user_id'] = $a_user['user_id'];
                    $insertAssignUser['created'] = date('Y-m-d');
                    $insertAssignUser['created_by'] = $user_id;
                    $insertAssignUser['user_type'] = $a_user['user_type'];
                    $insertAssignUser['is_active'] = $a_user['is_active'];
                    $this->m_common->insert_row('assign_user', $insertAssignUser);
                }

                $project_status = $this->m_common->get_row_array('project_status', array('project_id' => $project_id, 'dept_id' => $dept_info['dept_id']), '*');
                foreach ($project_status as $p_status) {
                    $insertProjectStatus = array();
                    $insertProjectStatus['dept_id'] = $dept_id;
                    $insertProjectStatus['project_id'] = $result;
                    $insertProjectStatus['status_name'] = $p_status['status_name'];
                    $insertProjectStatus['created_by'] = $user_id;
                    $insertProjectStatus['created'] = date('Y-m-d');
                    $this->m_common->insert_row('project_status', $insertProjectStatus);
                }
            }

            $tasks = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'parent_task_id' => null, 'sub_task_id' => null, 'is_active' => 1), '*');
            foreach ($tasks as $key => $value) {
                $task_currency_info = array();
                $insertTask = array();
                $insertTask['project_id'] = $result;
                $insertTask['task_name'] = $value['task_name'];
                $insertTask['origin'] = $value['origin'];
                $insertTask['unit'] = $value['unit'];
                $insertTask['quantity'] = $value['quantity'];
                $insertTask['task_value'] = $value['task_value'];
                $insertTask['status'] = $value['status'];
                $insertTask['progress'] = $value['progress'];
                $insertTask['task_equivalent_currency'] = $value['task_equivalent_currency'];
                $insertTask['created_by'] = $user_id;
                $insertTask['created'] = date('Y-m-d');
                $insertTask['is_active'] = 1;
                $parent_task_id = $this->m_common->insert_row('task', $insertTask);


                $subtasks = array();
                $subtasks = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'parent_task_id' => $value['task_id'], 'sub_task_id' => null, 'is_active' => 1), '*');

                $task_currency_info = $this->m_common->get_row_array('task_currency', array('project_id' => $project_id, 'task_id' => $value['task_id']), '*');
                foreach ($task_currency_info as $task_currency) {
                    $insertCurrency = array();
                    $insertCurrency['project_id'] = $result;
                    $insertCurrency['currency_id'] = $task_currency['currency_id'];
                    $insertCurrency['task_id'] = $parent_task_id;
                    $insertCurrency['equivalant_value'] = $task_currency['equivalant_value'];
                    $insertCurrency['equivalant_amount'] = $task_currency['equivalant_amount'];
                    $insertCurrency['created_by'] = $user_id;
                    $insertCurrency['created'] = date('Y-m-d');
                    $this->m_common->insert_row('task_currency', $insertCurrency);
                }


                //Dept Task Start
                $task_departments = $all_department;
                foreach ($task_departments as $task_dept) {
                    $department_task_risk_info = array();
                    $dept_task_info = $this->m_common->get_row_array('department_task', array('project_id' => $project_id, 'dept_id' => $task_dept['dept_id'], 'task_id' => $value['task_id']), '*');
                    $clone_project_dept = $this->m_common->get_row_array('department', array('project_id' => $result, 'dept_name' => $task_dept['dept_name'], 'is_active' => 1), '*');
                    $department_task_risk_info = $this->m_common->get_row_array('task_risk_lavel', array('project_id' => $project_id, 'task_id' => $value['task_id'], 'dept_id' => $task_dept['dept_id']), '*');

                    if (!empty($dept_task_info)) {
                        $insertDepartmentTask = array();
                        $insertDepartmentTask['task_id'] = $parent_task_id;
                        $insertDepartmentTask['dept_id'] = $clone_project_dept[0]['dept_id'];
                        $insertDepartmentTask['project_id'] = $result;
                        $insertDepartmentTask['created_by'] = $user_id;
                        $insertDepartmentTask['created'] = date('Y-m-d');
                        $insertDepartmentTask['percentage'] = $dept_task_info[0]['percentage'];
                        $insertDepartmentTask['start_date'] = $dept_task_info[0]['start_date'];
                        $insertDepartmentTask['end_date'] = $dept_task_info[0]['end_date'];
                        $insertDepartmentTask['critical_task'] = $dept_task_info[0]['critical_task'];
                        $insertDepartmentTask['status'] = $dept_task_info['status'];
                        $this->m_common->insert_row('department_task', $insertDepartmentTask);
                    }
                    //Department Task Risk Level Start
                    if (!empty($department_task_risk_info)) {
                        foreach ($department_task_risk_info as $department_task_risk) {
                            $insertTaskRisk = array();
                            $insertTaskRisk['task_id'] = $parent_task_id;
                            $insertTaskRisk['dept_id'] = $clone_project_dept[0]['dept_id'];
                            $insertTaskRisk['project_id'] = $result;
                            // $insertTaskRisk['dept_task_id']=$department_task_risk['dept_task_id'];
                            $insertTaskRisk['created_by'] = $user_id;
                            $insertTaskRisk['created'] = date('Y-m-d');
                            $insertTaskRisk['rist_lavel'] = $department_task_risk['rist_lavel'];
                            $insertTaskRisk['above'] = $department_task_risk['above'];
                            $insertTaskRisk['below'] = $department_task_risk['below'];
                            $this->m_common->insert_row('task_risk_lavel', $insertTaskRisk);
                        }
                    }

                    //Department Task Risk Level End
                    //Department Task Status Start
                    if (empty($subtasks)) {
                        $pre_dept_task_status = array();
                        $status_sql = "select ps.status_name,dts.* from department_task_status dts left join project_status ps on ps.status_id=dts.status_id where dts.project_id=" . $project_id . " and dts.dept_id=" . $task_dept['dept_id'] . " and dts.task_id=" . $value['task_id'];
                        $pre_dept_task_status = $this->m_common->customeQuery($status_sql);
                        if (!empty($pre_dept_task_status)) {
                            foreach ($pre_dept_task_status as $pdts) {
                                $clone_project_status_info = array();
                                $clone_project_status_info = $this->m_common->get_row_array('project_status', array('project_id' => $result, 'dept_id' => $clone_project_dept[0]['dept_id'], 'status_name' => $pdts['status_name']), '*');
                                $insertDepartmentTaskStatus = array();

                                $insertDepartmentTaskStatus['task_id'] = $parent_task_id;
                                $insertDepartmentTaskStatus['dept_id'] = $clone_project_dept[0]['dept_id'];
                                $insertDepartmentTaskStatus['project_id'] = $result;
                                $insertDepartmentTaskStatus['created_by'] = $user_id;
                                $insertDepartmentTaskStatus['created'] = date('Y-m-d');
                                $insertDepartmentTaskStatus['percentage'] = $pdts['percentage'];
                                //$insertDepartmentTaskStatus['status']='incomplete';
                                $insertDepartmentTaskStatus['status'] = $pdts['status'];
                                $insertDepartmentTaskStatus['status_id'] = $clone_project_status_info[0]['status_id'];
                                $insertDepartmentTaskStatus['is_active'] = 1;
                                $this->m_common->insert_row('department_task_status', $insertDepartmentTaskStatus);
                            }
                        }
                    }

                    //Department Task Status End
                }
                //Dept Task End



                if (!empty($subtasks)) {
                    foreach ($subtasks as $key1 => $value1) {
                        $sub_task_currency_info = array();
                        $insertSubTask = array();
                        $insertSubTask['project_id'] = $result;
                        $insertSubTask['parent_task_id'] = $parent_task_id;
                        $insertSubTask['task_name'] = $value1['task_name'];
                        $insertSubTask['origin'] = $value1['origin'];
                        $insertSubTask['unit'] = $value1['unit'];
                        $insertSubTask['quantity'] = $value1['quantity'];
                        $insertSubTask['task_value'] = $value1['task_value'];
                        $insertSubTask['status'] = $value1['status'];
                        $insertSubTask['progress'] = $value1['progress'];
                        $insertSubTask['task_equivalent_currency'] = $value1['task_equivalent_currency'];
                        $insertSubTask['created_by'] = $user_id;
                        $insertSubTask['created'] = date('Y-m-d');
                        $insertSubTask['is_active'] = 1;
                        $sub_task_id = $this->m_common->insert_row('task', $insertSubTask);

                        $roottask = array();
                        $roottask = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'sub_task_id' => $value1['task_id'], 'is_active' => 1), '*');

                        $sub_task_currency_info = $this->m_common->get_row_array('task_currency', array('project_id' => $project_id, 'task_id' => $value1['task_id']), '*');
                        foreach ($sub_task_currency_info as $sub_task_currency) {
                            $insertCurrency = array();
                            $insertCurrency['project_id'] = $result;
                            $insertCurrency['currency_id'] = $sub_task_currency['currency_id'];
                            $insertCurrency['task_id'] = $sub_task_id;
                            $insertCurrency['parent_task_id'] = $parent_task_id;
                            $insertCurrency['equivalant_value'] = $sub_task_currency['equivalant_value'];
                            $insertCurrency['equivalant_amount'] = $sub_task_currency['equivalant_amount'];
                            $insertCurrency['created_by'] = $user_id;
                            $insertCurrency['created'] = date('Y-m-d');
                            $this->m_common->insert_row('task_currency', $insertCurrency);
                        }


                        //Dept Sub Task Start
                        $subtask_departments = $all_department;
                        foreach ($subtask_departments as $subtask_dept) {
                            $dept_task_info = $this->m_common->get_row_array('department_task', array('project_id' => $project_id, 'dept_id' => $subtask_dept['dept_id'], 'task_id' => $value1['task_id']), '*');
                            $clone_project_dept = $this->m_common->get_row_array('department', array('project_id' => $result, 'dept_name' => $subtask_dept['dept_name'], 'is_active' => 1), '*');
                            if (!empty($dept_task_info)) {
                                $insertDepartmentTask = array();
                                $insertDepartmentTask['task_id'] = $sub_task_id;
                                $insertDepartmentTask['dept_id'] = $clone_project_dept[0]['dept_id'];
                                $insertDepartmentTask['project_id'] = $result;
                                $insertDepartmentTask['created_by'] = $user_id;
                                $insertDepartmentTask['created'] = date('Y-m-d');
                                $insertDepartmentTask['percentage'] = $dept_task_info[0]['percentage'];
                                $insertDepartmentTask['start_date'] = $dept_task_info[0]['start_date'];
                                $insertDepartmentTask['end_date'] = $dept_task_info[0]['end_date'];
                                $insertDepartmentTask['critical_task'] = $dept_task_info[0]['critical_task'];
                                $insertDepartmentTask['status'] = $dept_task_info['status'];
                                $this->m_common->insert_row('department_task', $insertDepartmentTask);
                            }

                            //Department Task Status Start
                            if (empty($roottask)) {
                                $pre_dept_task_status = array();
                                $status_sql = "select ps.status_name,dts.* from department_task_status dts left join project_status ps on ps.status_id=dts.status_id where dts.project_id=" . $project_id . " and dts.dept_id=" . $task_dept['dept_id'] . " and dts.task_id=" . $value['task_id'];
                                $pre_dept_task_status = $this->m_common->customeQuery($status_sql);
                                if (!empty($pre_dept_task_status)) {
                                    foreach ($pre_dept_task_status as $pdts) {
                                        $clone_project_status_info = array();
                                        $clone_project_status_info = $this->m_common->get_row_array('project_status', array('project_id' => $result, 'dept_id' => $clone_project_dept[0]['dept_id'], 'status_name' => $pdts['status_name']), '*');
                                        $insertDepartmentTaskStatus = array();

                                        $insertDepartmentTaskStatus['task_id'] = $sub_task_id;
                                        $insertDepartmentTaskStatus['dept_id'] = $clone_project_dept[0]['dept_id'];
                                        $insertDepartmentTaskStatus['project_id'] = $result;
                                        $insertDepartmentTaskStatus['created_by'] = $user_id;
                                        $insertDepartmentTaskStatus['created'] = date('Y-m-d');
                                        $insertDepartmentTaskStatus['percentage'] = $pdts['percentage'];
                                        //$insertDepartmentTaskStatus['status']='incomplete';
                                        $insertDepartmentTaskStatus['status'] = $pdts['status'];
                                        $insertDepartmentTaskStatus['status_id'] = $clone_project_status_info[0]['status_id'];
                                        $insertDepartmentTaskStatus['is_active'] = 1;
                                        $this->m_common->insert_row('department_task_status', $insertDepartmentTaskStatus);
                                    }
                                }
                            }

                            //Department Task Status End
                        }
                        //Dept Sub Task End




                        if (!empty($roottask)) {
                            foreach ($roottask as $key2 => $value2) {
                                $insertRootTask = array();
                                $insertRootTask['project_id'] = $result;
                                $insertRootTask['parent_task_id'] = $parent_task_id;
                                $insertRootTask['sub_task_id'] = $sub_task_id;
                                $insertRootTask['task_name'] = $value2['task_name'];
                                $insertRootTask['origin'] = $value2['origin'];
                                $insertRootTask['unit'] = $value2['unit'];
                                $insertRootTask['quantity'] = $value2['quantity'];
                                $insertRootTask['task_value'] = $value2['task_value'];
                                $insertRootTask['status'] = $value2['status'];
                                $insertRootTask['progress'] = $value2['progress'];
                                $insertRootTask['task_equivalent_currency'] = $value2['task_equivalent_currency'];
                                $insertRootTask['created_by'] = $user_id;
                                $insertRootTask['created'] = date('Y-m-d');
                                $insertRootTask['is_active'] = 1;
                                $root_task_id = $this->m_common->insert_row('task', $insertRootTask);

                                $root_task_currency_info = $this->m_common->get_row_array('task_currency', array('project_id' => $project_id, 'task_id' => $value2['task_id']), '*');
                                foreach ($root_task_currency_info as $root_task_currency) {
                                    $insertCurrency = array();
                                    $insertCurrency['project_id'] = $result;
                                    $insertCurrency['currency_id'] = $root_task_currency['currency_id'];
                                    $insertCurrency['task_id'] = $root_task_id;
                                    $insertCurrency['sub_task_id'] = $sub_task_id;
                                    $insertCurrency['parent_task_id'] = $parent_task_id;
                                    $insertCurrency['equivalant_value'] = $root_task_currency['equivalant_value'];
                                    $insertCurrency['equivalant_amount'] = $root_task_currency['equivalant_amount'];
                                    $insertCurrency['created_by'] = $user_id;
                                    $insertCurrency['created'] = date('Y-m-d');
                                    $this->m_common->insert_row('task_currency', $insertCurrency);
                                }


                                //Dept Root Task Start
                                $roottask_departments = $all_department;
                                foreach ($roottask_departments as $roottask_dept) {
                                    $pre_dept_task_status = array();
                                    $task_files = array();
                                    $task_comment = array();
                                    //  $status_sql="select ps.status_name,dts.* from department_task_status dts join project_status ps on ps.status_id=dts.status_id where dts.project_id=".$project_id." and dts.dept_id=".$roottask_dept['dept_id']." and dts.task_id=".$value2['task_id'];
                                    $status_sql = "select ps.status_name,dts.* from department_task_status dts left join project_status ps on ps.status_id=dts.status_id where dts.project_id=" . $project_id . " and dts.dept_id=" . $roottask_dept['dept_id'] . " and dts.task_id=" . $value2['task_id'];
                                    $pre_dept_task_status = $this->m_common->customeQuery($status_sql);
                                    $department_task_status_info = $this->m_common->get_row_array('department_task_status', array('project_id' => $project_id, 'is_active' => 1), '*');
                                    //$task_files=$this->m_common->get_row_array('task_file',array('dept_id'=>$roottask_dept['dept_id'],'project_id'=>$project_id,'task_id'=>$value2['task_id']),'*');
                                    // $task_comments=$this->m_common->get_row_array('task_comment',array('dept_id'=>$roottask_dept['dept_id'],'project_id'=>$project_id,'task_id'=>$value2['task_id']),'*');

                                    $dept_task_info = $this->m_common->get_row_array('department_task', array('project_id' => $project_id, 'dept_id' => $roottask_dept['dept_id'], 'task_id' => $value2['task_id']), '*');
                                    $clone_project_dept = $this->m_common->get_row_array('department', array('project_id' => $result, 'dept_name' => $roottask_dept['dept_name'], 'is_active' => 1), '*');
                                    $clone_project_status_info = $this->m_common->get_row_array('project_status', array('project_id' => $result, 'dept_id' => $clone_project_dept[0]['dept_id'], 'status_name' => $pre_dept_task_status[0]['status_name']), '*');
                                    if (!empty($dept_task_info)) {
                                        $insertDepartmentTask = array();
                                        $insertDepartmentTask['task_id'] = $root_task_id;
                                        $insertDepartmentTask['dept_id'] = $clone_project_dept[0]['dept_id'];
                                        $insertDepartmentTask['project_id'] = $result;
                                        $insertDepartmentTask['created_by'] = $user_id;
                                        $insertDepartmentTask['created'] = date('Y-m-d');
                                        $insertDepartmentTask['percentage'] = $dept_task_info[0]['percentage'];
                                        $insertDepartmentTask['start_date'] = $dept_task_info[0]['start_date'];
                                        $insertDepartmentTask['end_date'] = $dept_task_info[0]['end_date'];
                                        $insertDepartmentTask['critical_task'] = $dept_task_info[0]['critical_task'];
                                        $insertDepartmentTask['status'] = $dept_task_info['status'];
                                        $this->m_common->insert_row('department_task', $insertDepartmentTask);
                                    }

                                    //Dept task Status Start


                                    if (!empty($pre_dept_task_status)) {
                                        foreach ($pre_dept_task_status as $pdts) {
                                            $clone_project_status_info = array();
                                            $clone_project_status_info = $this->m_common->get_row_array('project_status', array('project_id' => $result, 'dept_id' => $clone_project_dept[0]['dept_id'], 'status_name' => $pdts['status_name']), '*');
                                            $insertDepartmentTaskStatus = array();

                                            $insertDepartmentTaskStatus['task_id'] = $root_task_id;
                                            $insertDepartmentTaskStatus['dept_id'] = $clone_project_dept[0]['dept_id'];
                                            $insertDepartmentTaskStatus['project_id'] = $result;
                                            $insertDepartmentTaskStatus['created_by'] = $user_id;
                                            $insertDepartmentTaskStatus['created'] = date('Y-m-d');
                                            $insertDepartmentTaskStatus['percentage'] = $pdts['percentage'];
                                            // $insertDepartmentTaskStatus['status']='incomplete';
                                            $insertDepartmentTaskStatus['status'] = $pdts['status'];
                                            $insertDepartmentTaskStatus['status_id'] = $clone_project_status_info[0]['status_id'];
                                            $insertDepartmentTaskStatus['is_active'] = 1;
                                            $this->m_common->insert_row('department_task_status', $insertDepartmentTaskStatus);
                                        }
                                    }

                                    //Dept task Status End
                                    //Start Root Task File
//                                            foreach($task_files as $task_file){
//                                                $insertTaskFile=array();
//                                                $insertTaskFile['project_id']=$result;
//                                                $insertTaskFile['dept_id']=$clone_project_dept[0]['dept_id'];
//                                                $insertTaskFile['task_id']=$root_task_id;
//                                                $insertTaskFile['parent_task_id']=$parent_task_id;
//                                                $insertTaskFile['sub_task_id']=$sub_task_id;
//                                                $insertTaskFile['file_name']=$task_file['file_name'];
//                                                $insertTaskFile['unique_name']=$task_file['unique_name'];
//                                                $insertTaskFile['created_by']=$user_id;
//                                                $insertTaskFile['created']=date('Y-m-d');             
//                                                $insertTaskFile['is_active']=1;                         
//                                                $this->m_common->insert_row('task_file',$insertTaskFile);
//                                            }      
                                    //End Root Task File
                                    //Start Root Task Comment
//                                            foreach($task_comments as $task_comment){
//                                                $insertTaskComment=array();
//                                                $insertTaskComment['project_id']=$result;
//                                                $insertTaskComment['dept_id']=$clone_project_dept[0]['dept_id'];
//                                                $insertTaskComment['task_id']=$root_task_id;
//                                                $insertTaskComment['comment']=$task_comment['comment'];
//                                                $insertTaskComment['created_by']=$user_id;
//                                                $insertTaskComment['created']=date('Y-m-d');             
//                                                $insertTaskComment['is_active']=1;                         
//                                                $this->m_common->insert_row('task_comment',$insertTaskComment);
//                                            }
                                    //End Root Task Comment
                                }
                                //Dept Root Task End
                            }
                        }
                    }
                }
            }
        }
        if ($result) {
            $this->save_user_activity(array('section' => 'Project', 'activity' => 'Project Cloned', 'user_id' => $this->session->userdata('user_id'), 'date' => date('Y-m-d H:i:s')));
            $data["status"] = "success";
        } else
            $data["status"] = "failed";
        echo json_encode($data);
    }

    function cloneProject__($project_id = false) {
        $this->setOutputMode(NORMAL);
        $user_id = $this->session->userdata('user_id');
        $project_id = $this->input->post('project_id');
        $pre_project_info = $this->m_common->get_row_array('projects', array('project_id' => $project_id), '*');
        $insertData['project_name'] = "Clone " . $pre_project_info[0]['project_name'];
        $insertData['package_no'] = $pre_project_info[0]['package_no'];
        $insertData['project_owner'] = $pre_project_info[0]['project_owner'];
        $insertData['country'] = $pre_project_info[0]['country'];
        $insertData['division'] = $pre_project_info[0]['division'];
        $insertData['district'] = $pre_project_info[0]['district'];
        $insertData['zone'] = $pre_project_info[0]['zone'];
        $insertData['type'] = $pre_project_info[0]['type'];
        $insertData['contractor'] = $pre_project_info[0]['contractor'];
        $insertData['contract_date'] = $pre_project_info[0]['contract_date'];
        $insertData['execution_start_date'] = $pre_project_info[0]['execution_start_date'];
        $insertData['construction_time'] = $pre_project_info[0]['construction_time'];
        $insertData['handover_date'] = $pre_project_info[0]['handover_date'];
        $insertData['scheduled_completion_date'] = $pre_project_info[0]['scheduled_completion_date'];
        $insertData['actual_completion_date'] = $pre_project_info[0]['actual_completion_date'];
        $insertData['equivalent_currency'] = $pre_project_info[0]['equivalent_currency'];
        $insertData['project_value'] = $pre_project_info[0]['project_value'];
        $insertData['created_by'] = $user_id;
        $insertData['created'] = date('Y-m-d');
        // $insertData['modified']=$pre_project_info[0]['modified'];
        $insertData['currency_rate'] = $pre_project_info[0]['currency_rate'];
        // $insertData['progress']=$pre_project_info[0]['progress'];
        $insertData['code'] = $pre_project_info[0]['code'];
        $insertData['contract_period'] = $pre_project_info[0]['contract_period'];
        $insertData['site_location'] = $pre_project_info[0]['site_location'];
        $insertData['execution_period'] = $pre_project_info[0]['execution_period'];
        $insertData['time_extension'] = $pre_project_info[0]['time_extension'];
        $insertData['project_status'] = "Incomplete";
        //$insertData['completed_by']=$pre_project_info[0]['completed_by'];
        $result = $this->m_common->insert_row('projects', $insertData);
        if (!empty($result)) {


            $sql = "select * from assign_user where project_id=" . $project_id . " and (department_id=0 or department_id is null)";
            $assign_user_info = $this->m_common->customeQuery($sql);
            foreach ($assign_user_info as $assign_user) {
                $insertAssignUser = array();
                $insertAssignUser['department_id'] = $assign_user['department_id'];
                $insertAssignUser['project_id'] = $result;
                $insertAssignUser['user_id'] = $assign_user['user_id'];
                $insertAssignUser['created'] = date('Y-m-d');
                $insertAssignUser['created_by'] = $user_id;
                $insertAssignUser['user_type'] = $assign_user['user_type'];
                $insertAssignUser['is_active'] = $assign_user['is_active'];
                $this->m_common->insert_row('assign_user', $insertAssignUser);
            }


            $project_currency_info = $this->m_common->get_row_array('project_currency', array('project_id' => $project_id), '*');
            foreach ($project_currency_info as $project_currency) {
                $insertProjectCurrency = array();
                $insertProjectCurrency['currency_id'] = $project_currency['currency_id'];
                $insertProjectCurrency['project_id'] = $result;
                $insertProjectCurrency['created_by'] = $user_id;
                $insertProjectCurrency['created'] = date('Y-m-d');
                $insertProjectCurrency['currency_rate'] = $project_currency['currency_rate'];
                $insertProjectCurrency['equivalant_value'] = $project_currency['equivalant_value'];
                $this->m_common->insert_row('project_currency', $insertProjectCurrency);
            }

            $pre_department_info = $this->m_common->get_row_array('department', array('project_id' => $project_id, 'is_active' => 1), '*');
            $all_department = $pre_department_info;
            foreach ($pre_department_info as $dept_info) {
                $a_user_info = array();
                $insertDepartment = array();
                $insertDepartment['dept_name'] = $dept_info['dept_name'];
                $insertDepartment['dept_value'] = $dept_info['dept_value'];
                $insertDepartment['project_id'] = $result;
                $insertDepartment['created_by'] = $user_id;
                $insertDepartment['created'] = date('Y-m-d');
                $insertDepartment['is_active'] = 1;
                // $insertDepartment['progress']=$dept_info['progress'];
                $dept_id = $this->m_common->insert_row('department', $insertDepartment);

                $a_user_info = $this->m_common->get_row_array('assign_user', array('project_id' => $project_id, 'department_id' => $dept_info['dept_id'], 'is_active' => 1), '*');
                foreach ($a_user_info as $a_user) {
                    $insertAssignUser = array();
                    $insertAssignUser['department_id'] = $dept_id;
                    $insertAssignUser['project_id'] = $result;
                    $insertAssignUser['user_id'] = $a_user['user_id'];
                    $insertAssignUser['created'] = date('Y-m-d');
                    $insertAssignUser['created_by'] = $user_id;
                    $insertAssignUser['user_type'] = $a_user['user_type'];
                    $insertAssignUser['is_active'] = $a_user['is_active'];
                    $this->m_common->insert_row('assign_user', $insertAssignUser);
                }

                $project_status = $this->m_common->get_row_array('project_status', array('project_id' => $project_id, 'dept_id' => $dept_info['dept_id']), '*');
                foreach ($project_status as $p_status) {
                    $insertProjectStatus = array();
                    $insertProjectStatus['dept_id'] = $dept_id;
                    $insertProjectStatus['project_id'] = $result;
                    $insertProjectStatus['status_name'] = $p_status['status_name'];
                    $insertProjectStatus['created_by'] = $user_id;
                    $insertProjectStatus['created'] = date('Y-m-d');
                    $this->m_common->insert_row('project_status', $insertProjectStatus);
                }
            }

            $tasks = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'parent_task_id' => null, 'sub_task_id' => null, 'is_active' => 1), '*');
            foreach ($tasks as $key => $value) {
                $task_currency_info = array();
                $insertTask = array();
                $insertTask['project_id'] = $result;
                $insertTask['task_name'] = $value['task_name'];
                $insertTask['origin'] = $value['origin'];
                $insertTask['unit'] = $value['unit'];
                $insertTask['quantity'] = $value['quantity'];
                $insertTask['task_value'] = $value['task_value'];
                $insertTask['status'] = $value['status'];
                // $insertTask['progress']=$value['progress'];
                $insertTask['task_equivalent_currency'] = $value['task_equivalent_currency'];
                $insertTask['created_by'] = $user_id;
                $insertTask['created'] = date('Y-m-d');
                $insertTask['is_active'] = 1;
                $parent_task_id = $this->m_common->insert_row('task', $insertTask);


                $subtasks = array();
                $subtasks = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'parent_task_id' => $value['task_id'], 'sub_task_id' => null, 'is_active' => 1), '*');

                $task_currency_info = $this->m_common->get_row_array('task_currency', array('project_id' => $project_id, 'task_id' => $value['task_id']), '*');
                foreach ($task_currency_info as $task_currency) {
                    $insertCurrency = array();
                    $insertCurrency['project_id'] = $result;
                    $insertCurrency['currency_id'] = $task_currency['currency_id'];
                    $insertCurrency['task_id'] = $parent_task_id;
                    $insertCurrency['equivalant_value'] = $task_currency['equivalant_value'];
                    $insertCurrency['equivalant_amount'] = $task_currency['equivalant_amount'];
                    $insertCurrency['created_by'] = $user_id;
                    $insertCurrency['created'] = date('Y-m-d');
                    $this->m_common->insert_row('task_currency', $insertCurrency);
                }


                //Dept Task Start
                $task_departments = $all_department;
                foreach ($task_departments as $task_dept) {
                    $department_task_risk_info = array();
                    $dept_task_info = $this->m_common->get_row_array('department_task', array('project_id' => $project_id, 'dept_id' => $task_dept['dept_id'], 'task_id' => $value['task_id']), '*');
                    $clone_project_dept = $this->m_common->get_row_array('department', array('project_id' => $result, 'dept_name' => $task_dept['dept_name'], 'is_active' => 1), '*');
                    $department_task_risk_info = $this->m_common->get_row_array('task_risk_lavel', array('project_id' => $project_id, 'task_id' => $value['task_id'], 'dept_id' => $task_dept['dept_id']), '*');

                    if (!empty($dept_task_info)) {
                        $insertDepartmentTask = array();
                        $insertDepartmentTask['task_id'] = $parent_task_id;
                        $insertDepartmentTask['dept_id'] = $clone_project_dept[0]['dept_id'];
                        $insertDepartmentTask['project_id'] = $result;
                        $insertDepartmentTask['created_by'] = $user_id;
                        $insertDepartmentTask['created'] = date('Y-m-d');
                        $insertDepartmentTask['percentage'] = $dept_task_info[0]['percentage'];
                        $insertDepartmentTask['start_date'] = $dept_task_info[0]['start_date'];
                        $insertDepartmentTask['end_date'] = $dept_task_info[0]['end_date'];
                        $insertDepartmentTask['critical_task'] = $dept_task_info[0]['critical_task'];
                        //$insertDepartmentTask['status']=$dept_task_info['status'];
                        $this->m_common->insert_row('department_task', $insertDepartmentTask);
                    }
                    //Department Task Risk Level Start
                    if (!empty($department_task_risk_info)) {
                        foreach ($department_task_risk_info as $department_task_risk) {
                            $insertTaskRisk = array();
                            $insertTaskRisk['task_id'] = $parent_task_id;
                            $insertTaskRisk['dept_id'] = $clone_project_dept[0]['dept_id'];
                            $insertTaskRisk['project_id'] = $result;
                            // $insertTaskRisk['dept_task_id']=$department_task_risk['dept_task_id'];
                            $insertTaskRisk['created_by'] = $user_id;
                            $insertTaskRisk['created'] = date('Y-m-d');
                            $insertTaskRisk['rist_lavel'] = $department_task_risk['rist_lavel'];
                            $insertTaskRisk['above'] = $department_task_risk['above'];
                            $insertTaskRisk['below'] = $department_task_risk['below'];
                            $this->m_common->insert_row('task_risk_lavel', $insertTaskRisk);
                        }
                    }

                    //Department Task Risk Level End
                    //Department Task Status Start
                    if (empty($subtasks)) {
                        $pre_dept_task_status = array();
                        $status_sql = "select ps.status_name,dts.* from department_task_status dts left join project_status ps on ps.status_id=dts.status_id where dts.project_id=" . $project_id . " and dts.dept_id=" . $task_dept['dept_id'] . " and dts.task_id=" . $value['task_id'];
                        $pre_dept_task_status = $this->m_common->customeQuery($status_sql);
                        if (!empty($pre_dept_task_status)) {
                            foreach ($pre_dept_task_status as $pdts) {
                                $clone_project_status_info = array();
                                $clone_project_status_info = $this->m_common->get_row_array('project_status', array('project_id' => $result, 'dept_id' => $clone_project_dept[0]['dept_id'], 'status_name' => $pdts['status_name']), '*');
                                $insertDepartmentTaskStatus = array();

                                $insertDepartmentTaskStatus['task_id'] = $parent_task_id;
                                $insertDepartmentTaskStatus['dept_id'] = $clone_project_dept[0]['dept_id'];
                                $insertDepartmentTaskStatus['project_id'] = $result;
                                $insertDepartmentTaskStatus['created_by'] = $user_id;
                                $insertDepartmentTaskStatus['created'] = date('Y-m-d');
                                $insertDepartmentTaskStatus['percentage'] = $pdts['percentage'];
                                $insertDepartmentTaskStatus['status'] = 'incomplete';
                                $insertDepartmentTaskStatus['status_id'] = $clone_project_status_info[0]['status_id'];
                                $insertDepartmentTaskStatus['is_active'] = 1;
                                $this->m_common->insert_row('department_task_status', $insertDepartmentTaskStatus);
                            }
                        }
                    }

                    //Department Task Status End
                }
                //Dept Task End



                if (!empty($subtasks)) {
                    foreach ($subtasks as $key1 => $value1) {
                        $sub_task_currency_info = array();
                        $insertSubTask = array();
                        $insertSubTask['project_id'] = $result;
                        $insertSubTask['parent_task_id'] = $parent_task_id;
                        $insertSubTask['task_name'] = $value1['task_name'];
                        $insertSubTask['origin'] = $value1['origin'];
                        $insertSubTask['unit'] = $value1['unit'];
                        $insertSubTask['quantity'] = $value1['quantity'];
                        $insertSubTask['task_value'] = $value1['task_value'];
                        $insertSubTask['status'] = $value1['status'];
                        // $insertSubTask['progress']=$value1['progress'];
                        $insertSubTask['task_equivalent_currency'] = $value1['task_equivalent_currency'];
                        $insertSubTask['created_by'] = $user_id;
                        $insertSubTask['created'] = date('Y-m-d');
                        $insertSubTask['is_active'] = 1;
                        $sub_task_id = $this->m_common->insert_row('task', $insertSubTask);

                        $roottask = array();
                        $roottask = $this->m_common->get_row_array('task', array('project_id' => $project_id, 'sub_task_id' => $value1['task_id'], 'is_active' => 1), '*');

                        $sub_task_currency_info = $this->m_common->get_row_array('task_currency', array('project_id' => $project_id, 'task_id' => $value1['task_id']), '*');
                        foreach ($sub_task_currency_info as $sub_task_currency) {
                            $insertCurrency = array();
                            $insertCurrency['project_id'] = $result;
                            $insertCurrency['currency_id'] = $sub_task_currency['currency_id'];
                            $insertCurrency['task_id'] = $sub_task_id;
                            $insertCurrency['parent_task_id'] = $parent_task_id;
                            $insertCurrency['equivalant_value'] = $sub_task_currency['equivalant_value'];
                            $insertCurrency['equivalant_amount'] = $sub_task_currency['equivalant_amount'];
                            $insertCurrency['created_by'] = $user_id;
                            $insertCurrency['created'] = date('Y-m-d');
                            $this->m_common->insert_row('task_currency', $insertCurrency);
                        }


                        //Dept Sub Task Start
                        $subtask_departments = $all_department;
                        foreach ($subtask_departments as $subtask_dept) {
                            $dept_task_info = $this->m_common->get_row_array('department_task', array('project_id' => $project_id, 'dept_id' => $subtask_dept['dept_id'], 'task_id' => $value1['task_id']), '*');
                            $clone_project_dept = $this->m_common->get_row_array('department', array('project_id' => $result, 'dept_name' => $subtask_dept['dept_name'], 'is_active' => 1), '*');
                            if (!empty($dept_task_info)) {
                                $insertDepartmentTask = array();
                                $insertDepartmentTask['task_id'] = $sub_task_id;
                                $insertDepartmentTask['dept_id'] = $clone_project_dept[0]['dept_id'];
                                $insertDepartmentTask['project_id'] = $result;
                                $insertDepartmentTask['created_by'] = $user_id;
                                $insertDepartmentTask['created'] = date('Y-m-d');
                                $insertDepartmentTask['percentage'] = $dept_task_info[0]['percentage'];
                                $insertDepartmentTask['start_date'] = $dept_task_info[0]['start_date'];
                                $insertDepartmentTask['end_date'] = $dept_task_info[0]['end_date'];
                                $insertDepartmentTask['critical_task'] = $dept_task_info[0]['critical_task'];
                                //$insertDepartmentTask['status']=$dept_task_info['status'];
                                $this->m_common->insert_row('department_task', $insertDepartmentTask);
                            }

                            //Department Task Status Start
                            if (empty($roottask)) {
                                $pre_dept_task_status = array();
                                $status_sql = "select ps.status_name,dts.* from department_task_status dts left join project_status ps on ps.status_id=dts.status_id where dts.project_id=" . $project_id . " and dts.dept_id=" . $task_dept['dept_id'] . " and dts.task_id=" . $value['task_id'];
                                $pre_dept_task_status = $this->m_common->customeQuery($status_sql);
                                if (!empty($pre_dept_task_status)) {
                                    foreach ($pre_dept_task_status as $pdts) {
                                        $clone_project_status_info = array();
                                        $clone_project_status_info = $this->m_common->get_row_array('project_status', array('project_id' => $result, 'dept_id' => $clone_project_dept[0]['dept_id'], 'status_name' => $pdts['status_name']), '*');
                                        $insertDepartmentTaskStatus = array();

                                        $insertDepartmentTaskStatus['task_id'] = $sub_task_id;
                                        $insertDepartmentTaskStatus['dept_id'] = $clone_project_dept[0]['dept_id'];
                                        $insertDepartmentTaskStatus['project_id'] = $result;
                                        $insertDepartmentTaskStatus['created_by'] = $user_id;
                                        $insertDepartmentTaskStatus['created'] = date('Y-m-d');
                                        $insertDepartmentTaskStatus['percentage'] = $pdts['percentage'];
                                        $insertDepartmentTaskStatus['status'] = 'incomplete';
                                        $insertDepartmentTaskStatus['status_id'] = $clone_project_status_info[0]['status_id'];
                                        $insertDepartmentTaskStatus['is_active'] = 1;
                                        $this->m_common->insert_row('department_task_status', $insertDepartmentTaskStatus);
                                    }
                                }
                            }

                            //Department Task Status End
                        }
                        //Dept Sub Task End




                        if (!empty($roottask)) {
                            foreach ($roottask as $key2 => $value2) {
                                $insertRootTask = array();
                                $insertRootTask['project_id'] = $result;
                                $insertRootTask['parent_task_id'] = $parent_task_id;
                                $insertRootTask['sub_task_id'] = $sub_task_id;
                                $insertRootTask['task_name'] = $value2['task_name'];
                                $insertRootTask['origin'] = $value2['origin'];
                                $insertRootTask['unit'] = $value2['unit'];
                                $insertRootTask['quantity'] = $value2['quantity'];
                                $insertRootTask['task_value'] = $value2['task_value'];
                                $insertRootTask['status'] = $value2['status'];
                                //$insertRootTask['progress']=$value2['progress'];
                                $insertRootTask['task_equivalent_currency'] = $value2['task_equivalent_currency'];
                                $insertRootTask['created_by'] = $user_id;
                                $insertRootTask['created'] = date('Y-m-d');
                                $insertRootTask['is_active'] = 1;
                                $root_task_id = $this->m_common->insert_row('task', $insertRootTask);

                                $root_task_currency_info = $this->m_common->get_row_array('task_currency', array('project_id' => $project_id, 'task_id' => $value2['task_id']), '*');
                                foreach ($root_task_currency_info as $root_task_currency) {
                                    $insertCurrency = array();
                                    $insertCurrency['project_id'] = $result;
                                    $insertCurrency['currency_id'] = $root_task_currency['currency_id'];
                                    $insertCurrency['task_id'] = $root_task_id;
                                    $insertCurrency['sub_task_id'] = $sub_task_id;
                                    $insertCurrency['parent_task_id'] = $parent_task_id;
                                    $insertCurrency['equivalant_value'] = $root_task_currency['equivalant_value'];
                                    $insertCurrency['equivalant_amount'] = $root_task_currency['equivalant_amount'];
                                    $insertCurrency['created_by'] = $user_id;
                                    $insertCurrency['created'] = date('Y-m-d');
                                    $this->m_common->insert_row('task_currency', $insertCurrency);
                                }


                                //Dept Root Task Start
                                $roottask_departments = $all_department;
                                foreach ($roottask_departments as $roottask_dept) {
                                    $pre_dept_task_status = array();
                                    $task_files = array();
                                    $task_comment = array();
                                    //  $status_sql="select ps.status_name,dts.* from department_task_status dts join project_status ps on ps.status_id=dts.status_id where dts.project_id=".$project_id." and dts.dept_id=".$roottask_dept['dept_id']." and dts.task_id=".$value2['task_id'];
                                    $status_sql = "select ps.status_name,dts.* from department_task_status dts left join project_status ps on ps.status_id=dts.status_id where dts.project_id=" . $project_id . " and dts.dept_id=" . $roottask_dept['dept_id'] . " and dts.task_id=" . $value2['task_id'];
                                    $pre_dept_task_status = $this->m_common->customeQuery($status_sql);
                                    $department_task_status_info = $this->m_common->get_row_array('department_task_status', array('project_id' => $project_id, 'is_active' => 1), '*');
                                    //$task_files=$this->m_common->get_row_array('task_file',array('dept_id'=>$roottask_dept['dept_id'],'project_id'=>$project_id,'task_id'=>$value2['task_id']),'*');
                                    // $task_comments=$this->m_common->get_row_array('task_comment',array('dept_id'=>$roottask_dept['dept_id'],'project_id'=>$project_id,'task_id'=>$value2['task_id']),'*');

                                    $dept_task_info = $this->m_common->get_row_array('department_task', array('project_id' => $project_id, 'dept_id' => $roottask_dept['dept_id'], 'task_id' => $value2['task_id']), '*');
                                    $clone_project_dept = $this->m_common->get_row_array('department', array('project_id' => $result, 'dept_name' => $roottask_dept['dept_name'], 'is_active' => 1), '*');
                                    $clone_project_status_info = $this->m_common->get_row_array('project_status', array('project_id' => $result, 'dept_id' => $clone_project_dept[0]['dept_id'], 'status_name' => $pre_dept_task_status[0]['status_name']), '*');
                                    if (!empty($dept_task_info)) {
                                        $insertDepartmentTask = array();
                                        $insertDepartmentTask['task_id'] = $root_task_id;
                                        $insertDepartmentTask['dept_id'] = $clone_project_dept[0]['dept_id'];
                                        $insertDepartmentTask['project_id'] = $result;
                                        $insertDepartmentTask['created_by'] = $user_id;
                                        $insertDepartmentTask['created'] = date('Y-m-d');
                                        $insertDepartmentTask['percentage'] = $dept_task_info[0]['percentage'];
                                        $insertDepartmentTask['start_date'] = $dept_task_info[0]['start_date'];
                                        $insertDepartmentTask['end_date'] = $dept_task_info[0]['end_date'];
                                        $insertDepartmentTask['critical_task'] = $dept_task_info[0]['critical_task'];
                                        //$insertDepartmentTask['status']=$dept_task_info['status'];
                                        $this->m_common->insert_row('department_task', $insertDepartmentTask);
                                    }

                                    //Dept task Status Start


                                    if (!empty($pre_dept_task_status)) {
                                        foreach ($pre_dept_task_status as $pdts) {
                                            $clone_project_status_info = array();
                                            $clone_project_status_info = $this->m_common->get_row_array('project_status', array('project_id' => $result, 'dept_id' => $clone_project_dept[0]['dept_id'], 'status_name' => $pdts['status_name']), '*');
                                            $insertDepartmentTaskStatus = array();

                                            $insertDepartmentTaskStatus['task_id'] = $root_task_id;
                                            $insertDepartmentTaskStatus['dept_id'] = $clone_project_dept[0]['dept_id'];
                                            $insertDepartmentTaskStatus['project_id'] = $result;
                                            $insertDepartmentTaskStatus['created_by'] = $user_id;
                                            $insertDepartmentTaskStatus['created'] = date('Y-m-d');
                                            $insertDepartmentTaskStatus['percentage'] = $pdts['percentage'];
                                            $insertDepartmentTaskStatus['status'] = 'incomplete';
                                            $insertDepartmentTaskStatus['status_id'] = $clone_project_status_info[0]['status_id'];
                                            $insertDepartmentTaskStatus['is_active'] = 1;
                                            $this->m_common->insert_row('department_task_status', $insertDepartmentTaskStatus);
                                        }
                                    }

                                    //Dept task Status End
                                    //Start Root Task File
//                                            foreach($task_files as $task_file){
//                                                $insertTaskFile=array();
//                                                $insertTaskFile['project_id']=$result;
//                                                $insertTaskFile['dept_id']=$clone_project_dept[0]['dept_id'];
//                                                $insertTaskFile['task_id']=$root_task_id;
//                                                $insertTaskFile['parent_task_id']=$parent_task_id;
//                                                $insertTaskFile['sub_task_id']=$sub_task_id;
//                                                $insertTaskFile['file_name']=$task_file['file_name'];
//                                                $insertTaskFile['unique_name']=$task_file['unique_name'];
//                                                $insertTaskFile['created_by']=$user_id;
//                                                $insertTaskFile['created']=date('Y-m-d');             
//                                                $insertTaskFile['is_active']=1;                         
//                                                $this->m_common->insert_row('task_file',$insertTaskFile);
//                                            }      
                                    //End Root Task File
                                    //Start Root Task Comment
//                                            foreach($task_comments as $task_comment){
//                                                $insertTaskComment=array();
//                                                $insertTaskComment['project_id']=$result;
//                                                $insertTaskComment['dept_id']=$clone_project_dept[0]['dept_id'];
//                                                $insertTaskComment['task_id']=$root_task_id;
//                                                $insertTaskComment['comment']=$task_comment['comment'];
//                                                $insertTaskComment['created_by']=$user_id;
//                                                $insertTaskComment['created']=date('Y-m-d');             
//                                                $insertTaskComment['is_active']=1;                         
//                                                $this->m_common->insert_row('task_comment',$insertTaskComment);
//                                            }
                                    //End Root Task Comment
                                }
                                //Dept Root Task End
                            }
                        }
                    }
                }
            }
        }
        if ($result) {
            $this->save_user_activity(array('section' => 'Project', 'activity' => 'Project Cloned', 'user_id' => $this->session->userdata('user_id'), 'date' => date('Y-m-d H:i:s')));
            $data["status"] = "success";
        } else
            $data["status"] = "failed";
        echo json_encode($data);
    }

    function sync_with_supply_chain($project_id) {
        $DB2 = $this->load->database('db2', TRUE);
        $sql = "select t.*,d.dept_name,dt.dept_task_id,dt.unit as mu from department_task dt join department d on d.dept_id=dt.dept_id join task t on t.task_id=dt.task_id where dt.project_id=$project_id";
        $dept = $this->m_common->customeQuery($sql);

        foreach ($dept as $d) {
            $insert_data = array();
            $insert_data['item_group'] = $d['dept_name'];
            $insert_data['group_type'] = 'CONSUMABLE';
            $insert_data['created'] = date('Y-m-d');
            $insert_data['ref_project_id'] = $project_id;
            $sql = "select * from item_groups where item_group='" . $d['dept_name'] . "' and ref_project_id=".$project_id;
            $result = $DB2->query($sql);
            $exists = $result->result_array();

            $sql = "select * from tbl_measurement_unit where meas_unit='" . $d['mu'] . "'";
            $result = $DB2->query($sql);
            $mu = $result->result_array();
            
            if(empty($mu)){
                $DB2->insert('tbl_measurement_unit', array('meas_unit'=>$d['mu'],'is_active'=>1));
                $mu_id = $DB2->insert_id();
            }else{
                $mu_id = $mu[0]['id'];
            }


            if (empty($exists)) {
                $DB2->insert('item_groups', $insert_data);
                $group_id = $DB2->insert_id();
            }else{
                $group_id = $exists[0]['id'];
            }

            if (empty($d['parent_task_id'])) {
                $insert_data = array();
                $insert_data['c_name'] = $d['task_name'];
                $insert_data['group_id'] = $group_id;
                $insert_data['ref_project_id'] = $project_id;
                $DB2->insert('item_category', $insert_data);
                $cat = $DB2->insert_id();
            } else {
                $ptask = $this->m_common->get_row_array('task', array('task_id' => $d['parent_task_id']), '*');
                if (!empty($ptask)) {
                    $insert_data = array();
                    $insert_data['c_name'] = $ptask[0]['task_name'];
                    $insert_data['group_id'] = $group_id;
                    $insert_data['ref_project_id'] = $project_id;

                    $sql = "select * from item_category where group_id='" . $group_id . "' and c_name='" . $ptask[0]['task_name'] . "'";
                    $result = $DB2->query($sql);
                    $exists = $result->result_array();
                    if (empty($exists)) {
                        $DB2->insert('item_category', $insert_data);
                        $cat = $DB2->insert_id();
                    }else{
                        $cat = $exists[0]['c_id'];
                    }
                } else {
                    continue;
                }
                $insert_data = array();
                $insert_data['item_code'] = $this->create_item_code();
                $insert_data['item_name'] = $d['task_name'];
                $insert_data['item_category'] = $cat;
                $insert_data['item_type'] = 'CONSUMABLE';
                $insert_data['item_group'] = $group_id;
                $insert_data['created'] = date('Y-m-d');
                $insert_data['ref_project_id'] = $project_id;
                $insert_data['ref_dept_task_id'] = $d['dept_task_id'];
                $insert_data['mu_id'] = $mu_id;

                $sql = "select * from items where item_group='" . $group_id . "' and item_category=$cat and item_name='" . $d['task_name'] . "'";
                $result = $DB2->query($sql);
                $exists = $result->result_array();

                if (empty($exists)) {
                    $DB2->insert('items', $insert_data);
                }
            }

        }

        exit;
        $sql = "select * from task where project_id=$project_id and parent_task_id is null";
        $parent_task = $this->m_common->customeQuery($sql);
        foreach ($parent_task as $row) {
            $sql = "select * from task where parent_task_id='" . $row['task_id'] . "'";
            $sub_task = $this->m_common->customeQuery($sql);
            if (!empty($sub_task)) {
                $insert_data = array();
                $insert_data['item_group'] = $row['task_name'];
                $insert_data['group_type'] = 'CONSUMABLE';
                $insert_data['created'] = date('Y-m-d');
                $insert_data['ref_project_id'] = $project_id;
                $cat = $DB2->insert('item_groups', $insert_data);
                foreach ($sub_task as $stask) {
                    $sql = "select * from task where parent_task_id='" . $stask['task_id'] . "'";
                    $root_task = $this->m_common->customeQuery($sql);
                    if (!empty($root_task)) {
                        $insert_data = array();
                        $insert_data['c_name'] = $stask['task_name'];
                        $insert_data['group_id'] = $cat;
                        $insert_data['ref_project_id'] = $project_id;
                        $grp = $DB2->insert('item_category', $insert_data);
                        foreach ($root_task as $rtask) {
                            $insert_data = array();
                            $insert_data['item_code'] = $this->create_item_code();
                            $insert_data['item_name'] = $stask['task_name'];
                            $insert_data['item_category'] = $cat;
                            $insert_data['item_type'] = 'CONSUMABLE';
                            $insert_data['item_group'] = $grp;
                            $insert_data['created'] = date('Y-m-d');
                            $insert_data['ref_project_id'] = $project_id;
                            $DB2->insert('items', $insert_data);
                        }
                    } else {


                        $insert_data = array();
                        $insert_data['item_code'] = $this->create_item_code();
                        $insert_data['item_name'] = $stask['task_name'];
                        $insert_data['item_category'] = $cat;
                        $insert_data['ref_project_id'] = $project_id;
                        $insert_data['item_type'] = 'CONSUMABLE';
                        $insert_data['created'] = date('Y-m-d');
                        $DB2->insert('items', $insert_data);
                    }
                }
            } else {
                $insert_data = array();
                $insert_data['item_code'] = $this->create_item_code();
                $insert_data['item_name'] = $row['task_name'];
                $insert_data['ref_project_id'] = $project_id;
                $insert_data['item_type'] = 'CONSUMABLE';
                $insert_data['created'] = date('Y-m-d');
                $DB2->insert('items', $insert_data);
            }
        }
        redirect_with_msg('backend/project', 'Project successfully sycned with supply chain module');
    }

    function create_item_code() {
        $DB2 = $this->load->database('db2', TRUE);
        $result = $DB2->query("select * from items order by id desc limit 1");
        $item_last_code = $result->result_array();
        if (!empty($item_last_code)) {
            $item_code = $item_last_code[0]['item_code'] + 1;
            if ($item_code > 999) {
                $item_sl_no = $item_code;
            } else if ($item_code > 99) {
                $item_sl_no = "0" . $item_code;
            } else if ($item_code > 9) {
                $item_sl_no = "00" . $item_code;
            } else {
                $item_sl_no = "000" . $item_code;
            }
        } else {
            $item_code = 1;
            $item_sl_no = '0001';
        }
        return $item_sl_no;
    }

    function upload_document($project_id) {
        if (!empty($project_id)) {
            $postData = $this->input->post();
            $insertdata = array();
            $insertdata['project_id'] = $project_id;
            $insertdata['title'] = $postData['title'];
            $insertdata['description'] = $postData['description'];
            $insertdata['created'] = date('Y-m-d');
            $insertdata['renew_date'] = date('Y-m-d', strtotime(str_replace('/', '-', $postData['renew_date'])));
            if (!empty($_FILES['file']['tmp_name'])) {
                if (move_uploaded_file($_FILES['file']['tmp_name'], 'assets/uploads/files/' . $_FILES['file']['name']))
                    $insertdata['file'] = $_FILES['file']['name'];
                else
                    redirect_with_msg('project/viewProject/' . $project_id, 'cannot upload');
            }
            if (!empty($postData['id'])) {
                if ($this->m_common->update_row('documents', array('id' => $postData['id']), $insertdata)) {
                    redirect_with_msg('project/viewProject/' . $project_id, 'Successfully upload');
                } else
                    redirect_with_msg('project/viewProject/' . $project_id, 'cannot upload');
            }else {
                if ($this->m_common->insert_row('documents', $insertdata)) {
                    redirect_with_msg('project/viewProject/' . $project_id, 'Successfully upload');
                } else
                    redirect_with_msg('project/viewProject/' . $project_id, 'cannot upload');
            }
        }
    }

    function delete_project($id) {
        if (!empty($id)) {
            $exists = $this->m_common->get_row_array('documents', array('id' => $id), '*');
            if ($this->m_common->delete_row('documents', array('id' => $id))) {
                if (file_exists('assets/uploads/files/' . $exists[0]['file']))
                    unlink('assets/uploads/files/' . $exists[0]['file']);
                redirect_with_msg('project/viewProject/' . $exists[0]['project_id'], 'Successfully deleted');
            } else
                redirect_with_msg('project/viewProject/' . $exists[0]['project_id'], 'cannot delete');
        }
    }

}
