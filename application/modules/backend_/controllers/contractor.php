<?php

/*
 * Author: fouraxiz
 * Purpose: This Controller is using for login process
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contractor extends Site_Controller {

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
            $this->menu = 'contractor';
            $this->sub_menu = 'contractor_list';
            $this->titlebackend("Contractor");
            $data['contractors']=$this->m_common->get_row_array('contractor',array('is_active'=>1),'*');
            $this->load->view('contractor/v_contractor',$data);
        }
    }
    
    

   
    function addEditContractor($id=""){
            $this->menu = 'contractor';
            $this->sub_menu = 'add_contractor';
            $this->titlebackend("Add Contractor");
            $user_id=$this->session->userdata('user_id');
            $postData=$this->input->post();
            if(!empty($postData)){
                $contractor_info = array();
                if(!empty($postData['fullname'])){
                    $contractor_info['fullname']=$postData['fullname'];
                }
                if(!empty($postData['address'])){
                    $contractor_info['address']=$postData['address'];
                }
                if(!empty($postData['phone'])){
                    $contractor_info['phone']=$postData['phone'];
                }
                if(!empty($postData['email'])){
                    $contractor_info['email']=$postData['email'];
                }
                //$contractor_info['image']=$postData['image'];
                $contractor_info['created_by']=$user_id;
                 if($id == "") {
                     $pre_contractor=$this->m_common->get_row_array('contractor',array('fullname'=>$postData['fullname'],'is_active'=>1),'*');
                     if(!empty($pre_contractor)){
                         redirect_with_msg('backend/contractor/addEditContractor',"This contractor already exists.");
                     }else{     
                        if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                            $filename = uploadImage('image', 'images/contractor/');
                            $contractor_info['image'] = $filename;
                        }   
                       $contractor_info['created']=date('Y-m-d');
                       $this->m_common->insert_row('contractor',$contractor_info);
                       redirect_with_msg('backend/contractor',"Successfully Inserted");
                     }
                      
                    
                 }else{
                     $existData=$this->m_common->get_row_array('contractor',array('contractor_id'=>$id),'*');
                     if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                           if (!empty($existData[0]['image']) && file_exists('images/contractor/' . $existData[0]['image']))
                            unlink('images/contractor/' . $existData[0]['image']);
                          $filename = uploadImage('image', 'images/contractor');
                          $contractor_info['image'] = $filename;
                     }   
                     $contractor_info['modified']=date('Y-m-d');
                      if($existData[0]['fullname']==$postData['fullname']){      
                            $this->m_common->update_row('contractor',array('contractor_id'=>$id),$contractor_info);
                            redirect_with_msg('backend/contractor',"Successfully Updated");
                      }else{
                          $exist_contractor=$this->m_common->get_row_array('contractor',array('fullname'=>$postData['fullname'],'is_active'=>1),'*'); 
                          if(!empty($exist_contractor)){
                                $this->m_common->update_row('contractor',array('contractor_id'=>$exist_contractor[0]['contractor_id']),$contractor_info);
                                $this->m_common->update_row('projects',array('contractor'=>$id,'is_active'=>1),array('contractor'=>$exist_contractor[0]['contractor_id']));
                                $this->m_common->update_row('contractor', array('contractor_id' =>$id),array('is_delete'=>1,'is_active'=>0));   
                                redirect_with_msg('backend/contractor',"Successfully Updated");
                           }else{
                                $this->m_common->update_row('contractor',array('contractor_id'=>$id),$project_owner_info);
                                redirect_with_msg('backend/contractor',"Successfully Updated");
                           }
                          
                      }
                    
                 }
                
            }else{
                if($id == ""){
                    $this->load->view('contractor/v_add_contractor');
                }else{
                    $data['contractor_info']=$this->m_common->get_row_array('contractor',array('contractor_id'=>$id),'*');
                    $this->load->view('contractor/v_edit_contractor',$data);
                }
            }
    }
    
   function deleteContractor($id){
       // $existData=$this->m_common->get_row_array('contractor',array('contractor_id'=>$id),'image');
        $result=$this->m_common->update_row('contractor', array('contractor_id' => $id),array('is_delete'=>1,'is_active'=>0));   
        if($result){  
            redirect_with_msg('backend/contractor', 'successfully deleted');
        }else
            redirect_with_msg('backend/contractor', 'Not deleted');
       
   }
   
   function deleteProjectContractor(){
        $this->setOutputMode(NORMAL);
        $id=$this->input->post('contractor_id');
        $result=$this->m_common->update_row('contractor', array('contractor_id' =>$id),array('is_delete'=>1,'is_active'=>0));   
        if($result){  
            $data['status']='success';
        }else{
            $data['status']='failed';
        }
        echo json_encode($data);
   }
   
   function addProjectContractor(){
        $this->setOutputMode(NORMAL);
        $user_id=$this->session->userdata('user_id');
        $postData=$this->input->post();
        $project_contractor_info = array();
        if(!empty($postData['fullname'])){
            $project_contractor_info['fullname']=$postData['fullname'];
        }
        if(!empty($postData['address'])){
            $project_contractor_info['address']=$postData['address'];
        }
        if(!empty($postData['phone'])){
            $project_contractor_info['phone']=$postData['phone'];
        }
        if(!empty($postData['email'])){
            $project_contractor_info['email']=$postData['email'];
        }
        $pre_info=$this->m_common->get_row_array('contractor',array('fullname'=>$postData['fullname']),'*');
        if(empty($pre_info)){
            $project_contractor_info['created_by']=$user_id;
            $project_contractor_info['created']=date('Y-m-d');
            $project_contractor_info['is_active']=1;
            $result=$this->m_common->insert_row('contractor',$project_contractor_info);
            if(!empty($result)){
                $data['last_id']=$result;
                $data['contractor_info']=$this->m_common->get_row_array('contractor','','*');
            }
            $data['status']="success";
        }else{
            $data['status']="failed";
        }
        echo json_encode($data);
        
        
   }
   
   

}
