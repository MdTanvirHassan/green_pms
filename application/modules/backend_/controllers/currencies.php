<?php

/*
 * Author: fouraxiz
 * Purpose: This Controller is using for login process
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Currencies extends Site_Controller {

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
            $this->menu = 'currencies';
            $this->sub_menu = 'currencies_list';
            $this->titlebackend("Currencies");
            $data['currencies']=$this->m_common->get_row_array('currencies',array('is_active'=>1),'*');
            $this->load->view('currencies/v_currencies',$data);
        }
    }
    
    

   
    function addEditCurrencies($id=""){
            $this->menu = 'currencies';
            $this->sub_menu = 'add_currencies';
            $this->titlebackend("Add Currencies");
            $user_id=$this->session->userdata('user_id');
            $postData=$this->input->post();
            if(!empty($postData)){
                $currencies_info = array();
                if(!empty($postData['title'])){
                    $currencies_info['title']=$postData['title'];
                }
                
                if(!empty($postData['code'])){
                    $currencies_info['code']=$postData['code'];
                }
                if(!empty($postData['symbol_left'])){
                    $currencies_info['symbol_left']=$postData['symbol_left'];
                }
                if(!empty($postData['symbol_right'])){
                    $currencies_info['symbol_right']=$postData['symbol_right'];
                }
                if(!empty($postData['decimal_point'])){
                    $currencies_info['decimal_point']=$postData['decimal_point'];
                }
                if(!empty($postData['thousands_point'])){
                    $currencies_info['thousands_point']=$postData['thousands_point'];
                }
                if(!empty($postData['decimal_places'])){
                    $currencies_info['decimal_places']=$postData['decimal_places'];
                }
                if(!empty($postData['decimal_precise'])){
                    $currencies_info['decimal_precise']=$postData['decimal_precise'];
                }
                if(!empty($postData['value'])){
                    $currencies_info['value']=$postData['value'];
                }
                 if($id == "") {
                     $pre_currency=$this->m_common->get_row_array('currencies',array('title'=>$postData['title'],'is_active'=>1),'*');
                     if(!empty($pre_currency)){
                         redirect_with_msg('backend/currencies/addEditCurrencies',"This currency already exists.");
                     }else{     
                         $this->m_common->insert_row('currencies',$currencies_info);
                         redirect_with_msg('backend/currencies',"Successfully Inserted");
                     }
                    
                 }else{
                    
                     $currencies_info['last_updated']=date("Y-m-d h:i:s");
                     $this->m_common->update_row('currencies',array('currencies_id'=>$id),$currencies_info);
                     redirect_with_msg('backend/currencies',"Successfully Updated");
                    
                 }
                
            }else{
                if($id == ""){
                    $this->load->view('currencies/v_add_currencies');
                }else{
                    $data['currencies_info']=$this->m_common->get_row_array('currencies',array('currencies_id'=>$id),'*');
                    $this->load->view('currencies/v_edit_currencies',$data);
                }
            }
    }
    
   function deleteCurrencies($id){
       // $existData=$this->m_common->get_row_array('currencies',array('currencies_id'=>$id),'image');
        $result=$this->m_common->update_row('currencies', array('currencies_id' => $id),array('is_delete'=>1,'is_active'=>0));   
        if($result){  
            redirect_with_msg('backend/currencies', 'successfully deleted');
        }else
            redirect_with_msg('backend/currencies', 'Not deleted');
       
   }
   
    function deleteProjectCurrency(){
       $this->setOutputMode(NORMAL);
       $id=$this->input->post('currencies_id');
       $assign_currency=$this->m_common->get_row_array('project_currency',array('currency_id'=>$id),'*');
       if(empty($assign_currency)){
            $result=$this->m_common->update_row('currencies', array('currencies_id' => $id),array('is_delete'=>1,'is_active'=>0));   
             if($result) {
                 $data["status"] = "success";
             } else
                 $data["status"] = "failed";
       }else{
            $data["status"] = "assigned";
       }
        echo json_encode($data);
   }

}

