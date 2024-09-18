<?php

/*
 * Author: fouraxiz
 * Purpose: This Controller is using for login process
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Project_type extends Site_Controller {

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
        if(!$this->is_logged_in($this->session->userdata('logged_in'))){
            redirect_with_msg('backend/login', 'Please Login to see this page');
        } else {
           // redirect('backend/setup');
            $this->menu = 'project_type';
            $this->sub_menu = 'type_list';
            $this->titlebackend("Project Type");
            $data['project_types']=$this->m_common->get_row_array('project_type',array('is_active'=>1),'*');
            $this->load->view('project_type/v_type',$data);
        }
    }
    
    

   
    function addEditproject_type($id=""){
            $this->menu = 'project_type';
            $this->sub_menu = 'add_type';
            $this->titlebackend("Add Project Type");
            $user_id=$this->session->userdata('user_id');
            $postData=$this->input->post();
            if(!empty($postData)){
                $type_info = array();
                if(!empty($postData['type'])){
                    $type_info['type']=$postData['type'];
                }
              
                $type_info['created_by']=$user_id;
                 if($id == "") {
                     $pre_type=$this->m_common->get_row_array('project_type',array('type'=>$postData['type'],'is_active'=>1),'*');
                     if(!empty($pre_type)){
                         redirect_with_msg('backend/project_type/addEditproject_type',"This type already exists.");
                     }else{     
                         $type_info['created']=date('Y-m-d');
                         $this->m_common->insert_row('project_type',$type_info);
                         redirect_with_msg('backend/project_type',"Successfully Inserted");
                     }
                     
                    
                 }else{
                     $existData=$this->m_common->get_row_array('project_type',array('type_id'=>$id),'*');
                     $type_info['modified']=date('Y-m-d');
                     if($existData[0]['type']==$postData['type']){  
                        $this->m_common->update_row('project_type',array('type_id'=>$id),$type_info);
                        redirect_with_msg('backend/project_type',"Successfully Updated");
                     }else{
                          $exist_type=$this->m_common->get_row_array('project_type',array('type'=>$postData['type'],'is_active'=>1),'*'); 
                           if(!empty($exist_type)){
                                $this->m_common->update_row('project_type',array('type_id'=>$exist_type[0]['type_id']),$type_info);
                                $this->m_common->update_row('projects',array('type'=>$id,'is_active'=>1),array('type'=>$exist_type[0]['type_id']));
                                $this->m_common->update_row('project_type', array('type_id'=>$id),array('is_delete'=>1,'is_active'=>0));   
                                redirect_with_msg('backend/project_type',"Successfully Updated");
                           }else{
                                $this->m_common->update_row('project_type',array('type_id'=>$id),$type_info);
                                redirect_with_msg('backend/project_type',"Successfully Updated");
                           }
                     }
                    
                 }
                
            }else{
                if($id == ""){
                    $this->load->view('project_type/v_add_type');
                }else{
                    $data['type_info']=$this->m_common->get_row_array('project_type',array('type_id'=>$id),'*');
                    $this->load->view('project_type/v_edit_type',$data);
                }
            }
    }
    
   function deleteType($id){
       // $existData=$this->m_common->get_row_array('contractor',array('contractor_id'=>$id),'image');
        $result=$this->m_common->update_row('project_type', array('type_id' => $id),array('is_delete'=>1,'is_active'=>0));   
        if($result){  
            redirect_with_msg('backend/project_type', 'successfully deleted');
        }else
            redirect_with_msg('backend/project_type', 'Not deleted');
       
   }
   
   function deleteProjectType(){
       $this->setOutputMode(NORMAL);
       $id=$this->input->post('type_id');
       $result=$this->m_common->update_row('project_type', array('type_id' => $id),array('is_delete'=>1,'is_active'=>0));
        if ($result) {
            $data["status"] = "success";
        } else
            $data["status"] = "failed";
        echo json_encode($data);
   }

}
