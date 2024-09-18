<?php

/*
 * Author: fouraxiz
 * Purpose: This Controller is using for login process
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Project_owner extends Site_Controller {

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
            $this->menu = 'project_owner';
            $this->sub_menu = 'project_owner_list';
            $this->titlebackend("ProjectOwner");
            $data['owners']=$this->m_common->get_row_array('project_owner',array('is_active'=>1),'*');
            $this->load->view('project_owner/v_project_owner',$data);
        }
    }
    
    

   
    function addEditProjectOwner($id=""){
            $this->menu = 'project_owner';
            $this->sub_menu = 'add_project_owner';
            $this->titlebackend("Add ProjectOwner");
            $user_id=$this->session->userdata('user_id');
            $postData=$this->input->post();
            if(!empty($postData)){
                $project_owner_info = array();
                if(!empty($postData['fullname'])){
                    $project_owner_info['fullname']=$postData['fullname'];
                }
                if(!empty($postData['address'])){
                    $project_owner_info['address']=$postData['address'];
                }
                if(!empty($postData['phone'])){
                    $project_owner_info['phone']=$postData['phone'];
                }
                if(!empty($postData['email'])){
                    $project_owner_info['email']=$postData['email'];
                }
               
                $project_owner_info['created_by']=$user_id;
                 if($id == "") {
                     $pre_owner=$this->m_common->get_row_array('project_owner',array('fullname'=>$postData['fullname'],'is_active'=>1),'*');
                     if(!empty($pre_owner)){
                         redirect_with_msg('backend/project_owner/addEditProjectOwner',"This owner already exists.");
                     }else{     
                         if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                                $filename = uploadImage('image', 'images/project_owner/');
                                $project_owner_info['image'] = $filename;
                         }   
                         $project_owner_info['created']=date('Y-m-d');
                         $this->m_common->insert_row('project_owner',$project_owner_info);
                         redirect_with_msg('backend/project_owner',"Successfully Inserted");
                     }
                      
                    
                 }else{
                     $existData=$this->m_common->get_row_array('project_owner',array('project_owner_id'=>$id),'*');
                     if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                            if(!empty($existData[0]['image']) && file_exists('images/project_owner/' . $existData[0]['image']))
                              unlink('images/project_owner/' . $existData[0]['image']);
                            $filename = uploadImage('image', 'images/project_owner/');
                            $project_owner_info['image'] = $filename;
                     } 
                     $project_owner_info['modified']=date('Y-m-d');
                     if($existData[0]['fullname']==$postData['fullname']){       
                            $this->m_common->update_row('project_owner',array('project_owner_id'=>$id),$project_owner_info);
                            redirect_with_msg('backend/project_owner',"Successfully Updated");
                     }else{
                           $exist_owner=$this->m_common->get_row_array('project_owner',array('fullname'=>$postData['fullname'],'is_active'=>1),'*'); 
                           if(!empty($exist_owner)){
                                $this->m_common->update_row('project_owner',array('project_owner_id'=>$exist_owner[0]['project_owner_id']),$project_owner_info);
                                $this->m_common->update_row('projects',array('project_owner'=>$id,'is_active'=>1),array('project_owner'=>$exist_owner[0]['project_owner_id']));
                                $this->m_common->update_row('project_owner', array('project_owner_id' =>$id),array('is_delete'=>1,'is_active'=>0));   
                                redirect_with_msg('backend/project_owner',"Successfully Updated");
                           }else{
                                $this->m_common->update_row('project_owner',array('project_owner_id'=>$id),$project_owner_info);
                                redirect_with_msg('backend/project_owner',"Successfully Updated");
                           }
                     }    
                    
                 }
                
            }else{
                if($id == ""){
                    $this->load->view('project_owner/v_add_project_owner');
                }else{
                    $data['project_owner_info']=$this->m_common->get_row_array('project_owner',array('project_owner_id'=>$id),'*');
                    $this->load->view('project_owner/v_edit_project_owner',$data);
                }
            }
    }
    
   function deleteProjectOwner_($id){
       // $existData=$this->m_common->get_row_array('project_owner',array('project_owner_id'=>$id),'image');
        $result=$this->m_common->update_row('project_owner', array('project_owner_id' => $id),array('is_delete'=>1,'is_active'=>0));   
        if($result){  
            redirect_with_msg('backend/project_owner', 'successfully deleted');
        }else
            redirect_with_msg('backend/project_owner', 'Not deleted');
       
   }
   
   function deleteProjectOwner(){
       $this->setOutputMode(NORMAL);
       $id=$this->input->post('project_owner_id');
       $result=$this->m_common->update_row('project_owner', array('project_owner_id' => $id),array('is_delete'=>1,'is_active'=>0));
       if(!empty($result)){
           $data["status"]="success";
       }else{
           $data["status"]="failed";
       }
       echo json_encode($data);
   }
   
   function addProjectOwner(){
        $this->setOutputMode(NORMAL);
        $user_id=$this->session->userdata('user_id');
        $postData=$this->input->post();
        $project_owner_info = array();
        if(!empty($postData['fullname'])){
            $project_owner_info['fullname']=$postData['fullname'];
        }
        if(!empty($postData['address'])){
            $project_owner_info['address']=$postData['address'];
        }
        if(!empty($postData['phone'])){
            $project_owner_info['phone']=$postData['phone'];
        }
        if(!empty($postData['email'])){
            $project_owner_info['email']=$postData['email'];
        }
        $pre_info=$this->m_common->get_row_array('project_owner',array('fullname'=>$postData['fullname']),'*');
        if(empty($pre_info)){
            $project_owner_info['created_by']=$user_id;
            $project_owner_info['created']=date('Y-m-d');
            $project_owner_info['is_active']=1;
            $result=$this->m_common->insert_row('project_owner',$project_owner_info);
            if(!empty($result)){
                $data['last_id']=$result;
                $data['owner_info']=$this->m_common->get_row_array('project_owner','','*');
            }
            $data['status']="success";
        }else{
            $data['status']="failed";
        }
        echo json_encode($data);
        
        
   }
   
   function addProjectType(){
        $this->setOutputMode(NORMAL);
        $user_id=$this->session->userdata('user_id');
        $postData=$this->input->post();
        $project_type_info = array();
        if(!empty($postData['type'])){
            $project_type_info['type']=$postData['type'];
        }
        $pre_info=$this->m_common->get_row_array('project_type',array('type'=>$postData['type']),'*');
        if(empty($pre_info)){
            $project_type_info['created_by']=$user_id;
            $project_type_info['created']=date('Y-m-d');
            $project_type_info['is_active']=1;
            $result=$this->m_common->insert_row('project_type',$project_type_info);
            if(!empty($result)){
                $data['last_id']=$result;
                $data['type_info']=$this->m_common->get_row_array('project_type','','*');
            }
            $data['status']="success";
        }else{
            $data['status']="failed";
        }
        echo json_encode($data);
        
        
   }
   
   

}

