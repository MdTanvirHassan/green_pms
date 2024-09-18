<?php

/*
 * Author: fouraxiz
 * Purpose: This Controller is using for login process
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends Site_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model("m_common");
        $this->setTemplateFile('template_login');
    }

    function index() {
        if (!$this->is_logged_in($this->session->userdata('logged_in'))) {

            $this->login();
        } else {
            if ($this->session->userdata('usertype') == 'User')
                redirect('backend/moderator');
            else
                redirect('backend/dashboard');
        }
    }

    public function login() {
        $this->titlebackend("Login");
        $table = 'admin';
        $select = 'theme';
        $where['ID'] = $this->session->userdata('ID');
        // $data['theme'] = $this->m_common->get_row($table, $where, $select);
        // $this->load->view('v_login', $data);
        $this->load->view('v_login');
    }

    public function profile() {
        $this->setTemplateFile('template');
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
            redirect_with_msg('backend/login/profile', "Successfully Updated");
        }else {
            $data['user_info'] = $this->m_common->get_row_array('users', array('user_id' => $user_id), '*');
            $this->load->view('user/v_profile', $data);
        }
    }

    public function forgotPassword() {
        $this->titlebackend("Login");
        $table = 'admin';
        $select = 'theme';
        $where['ID'] = $this->session->userdata('ID');
        $data['theme'] = $this->m_common->get_row($table, $where, $select);
        $this->load->view('v_forgotpassword', $data);
    }

    function forgetPasswordAction() {
        $this->setOutputMode(NORMAL);
        $email = $this->input->post('email');
        $user_check = $this->m_common->get_row_array('users', array('email' => $email), '*');
        if (!empty($user_check)) {
            $rand_password = rand();
            $password = md5($rand_password);
            $result = $this->m_common->update_row('users', array('email' => $email), array('password' => $password));
            if (!empty($result)) {
                $to = $email;
                $from = "shaheen@4axiz.com";
                $subject = 'Password changed';
                $message = "password: " . $rand_password . "  Link:  http://system.orient-energy.co/";
                if ($this->email_send($to, $from, $subject, $message)) {
                    $data['status'] = "success";
                }
            } else {
                $data['status'] = "not updated";
            }
        } else {
            $data['status'] = "failed";
        }
        echo json_encode($data);
    }

 public function loginAction() {
        $postArray = $this->input->post();
        //$table = 'admin';
        $table = 'users';
        //$user_type=1;
        
        if (!empty($postArray)) {
            $result = $this->m_common->login_with_password_string($postArray['user_name'], md5($postArray['user_pass']), $table);
            if (!empty($result->user_id) && isset($result->user_id)) {
                
                $this->session->set_userdata('user_id', $result->user_id);
                $this->session->set_userdata('user_name', $result->username);
                $this->session->set_userdata('usertype', $result->usertype);
                $this->session->set_userdata('user_logo', $result->image);
                $this->session->set_userdata('logged_in', 1);
                $this->save_user_activity(array('section' => 'Login', 'activity' => 'Login Successfull', 'user_id' => $this->session->userdata('user_id'), 'date' => date('Y-m-d H:i:s')));
                
                $DB2 = $this->load->database('db2', TRUE);
                $sql = "select * from users where username='" . $postArray['user_name'] . "' and password='" . md5($postArray['user_pass']) . "'";
                $result = $DB2->query($sql);
                $user = $result->result_array();
                
                
                 if (!empty($user)) {
                    $this->session->set_userdata('user_type', $user[0]['user_type']);
                    $this->session->set_userdata('employeeId', $user[0]['employeeId']);
                    
                   // $this->session->set_userdata('companyId', $user[0]['company']);//added by alauddin
                }
                
                
              //  if ($result->usertype == 'Admin')
                    redirect(site_url(ADMIN . '/dashboard/module_list'));
//                else
//                    redirect(site_url(ADMIN . '/moderator'));
//                echo 'Hello';
            } else {
                $DB2 = $this->load->database('db2', TRUE);
                $sql = "select * from users where username='" . $postArray['user_name'] . "' and password='" . md5($postArray['user_pass']) . "'";
                $result = $DB2->query($sql);
                $user = $result->result_array();
                if (!empty($user)) {
                    if($user[0]['user_type']==1|| $user[0]['user_type']==3){
                        $this->session->set_userdata('user_id', $user[0]['id']);
                        $this->session->set_userdata('user_type', $user[0]['user_type']);
                        $this->session->set_userdata('usertype', 'supply_chain_user');
                        $this->session->set_userdata('user_name', $user[0]['username']);
                        $this->session->set_userdata('employeeId', $user[0]['employeeId']);
                        //$this->session->set_userdata('companyId', $user[0]['company']);//added by alauddin
                        $this->session->set_userdata('logged_in', 1);
                    }else{
                        $this->session->set_userdata('user_id', $user[0]['id']);
                        $this->session->set_userdata('user_type', $user[0]['user_type']);
                        $this->session->set_userdata('usertype', 'supply_chain_user');
                        $this->session->set_userdata('user_name', $user[0]['username']);
                        $this->session->set_userdata('employeeId', $user[0]['employeeId']);
                       // $this->session->set_userdata('companyId', $user[0]['company']);//added by alauddin
                        $this->session->set_userdata('logged_in', 1);
                    }
                    redirect(site_url(ADMIN . '/dashboard/module_list'));
                } else {
                    $data['message'] = "Incorrect Username or Password";
                    $this->titlebackend("");
                    $this->load->view('v_login', $data);
                }
            }
        }
    }

    public function logOut_pre() {
        $this->session->unset_userdata('ID');
        $this->session->unset_userdata('uname');
        $this->session->unset_userdata('logged_in');
        redirect_with_msg("admin", "Successfully log out");
    }

    public function logOut() {
        $this->save_user_activity(array('section' => 'Logout', 'activity' => 'Logout Successfull', 'user_id' => $this->session->userdata('user_id'), 'date' => date('Y-m-d H:i:s')));
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('logged_in');

        redirect_with_msg("admin", "Successfully log out");
    }

}
