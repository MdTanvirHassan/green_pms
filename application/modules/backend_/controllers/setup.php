<?php

/*
 * Author: fouraxiz
 * Purpose: This Controller is using for login process
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setup extends Site_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->is_logged_in($this->session->userdata('logged_in'))) {
            redirect_with_msg('backend/login', 'Please Login to see this page');
        }
        $this->load->library('grocery_CRUD');
        $this->load->model("m_common");
        $this->setTemplateFile('template');
        $this->user_id = $this->session->userdata('user_id');
    }

    public function _example_output($output = null) {
        $this->load->view('crud.php', (array) $output);
    }

//    function index() {
//        $this->menu = 'setup';
//        $this->sub_menu = 'projects';
//        $this->titlebackend("setup Tender");
//        try {
//            $crud = new grocery_CRUD();
//
//            $crud->set_theme('datatables');
//            $crud->set_table('tender');
//            $crud->set_subject('Tender');
//            $crud->display_as('t_no', 'Notice No');
//            $crud->display_as('t_date', 'Notice Date');
//            $crud->display_as('t_ref', 'Refference');
//            $crud->display_as('t_authority', 'Authority');
//            $crud->display_as('t_work_name', 'Project Name');
//            $crud->display_as('t_place', 'Place');
//            $crud->display_as('t_work_details', 'Work Details');
//            $crud->display_as('t_value', 'Bid Bond Amount');
//            $crud->display_as('t_duration', 'Work Duration(DAYS)');
//            $crud->display_as('t_document', 'Tender Documents');
//            $crud->display_as('t_status', 'Project Status');
//            $crud->display_as('t_source_of_fund', 'Source of Fund');
//            $crud->display_as('t_last_submission', 'Last Submission Date');
//            $crud->display_as('t_auth_address', 'Authority Address');
//            $crud->fields('t_no', 't_date', 't_authority', 't_work_name', 't_place', 't_work_details', 't_source_of_fund', 't_duration', 't_value', 't_last_submission', 't_auth_address', 't_document');
//            $crud->columns('t_no', 't_date', 't_authority', 't_work_name', 't_place', 't_value', 't_duration');
//            $crud->required_fields('t_no', 't_date', 't_authority', 't_work_name', 't_place', 't_work_details', 't_value');
//            //$crud->unset_add();
//            $crud->set_field_upload('t_document', 'assets/uploads/files');
//            $crud->where('t_status', 'setup');
//            $output = $crud->render();
//
//            $this->_example_output($output);
//        } catch (Exception $e) {
//            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
//        }
//    }

    function bg_details() {
        $this->menu = 'setup';
        $this->sub_menu = 'bg_details';
        $this->titlebackend("Bid Bond");
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('v_bg_details');
            $crud->set_subject('Bid Bond');
            $crud->display_as('t_date', 'Tender Sub Date');
            $crud->display_as('t_value', 'Tender Value');
            $crud->display_as('bg_no', 'Bid Bond No');
            $crud->display_as('t_id', 'Notice No');
            $crud->display_as('notice_no', 'Tender No');
            $crud->display_as('bg_date', 'Tender/Bid Bond Date');
            $crud->display_as('bank_id', 'Tender/Bid Bank Name');
            $crud->display_as('bg_value', 'Tender/Bid Bond Value');
            $crud->display_as('bg_type', 'Bid Bond Type');
            $crud->display_as('bg_duration', 'Tender/Bid Bond Duration (Days)');
            $crud->display_as('bg_expire', 'Tender/Bid Bond Expire Date');
            $crud->display_as('bg_extension', 'Tender/Bid Bond Extension Date');
            $crud->display_as('bg_release', 'Tender/Bid Bond Release Date');
            $crud->display_as('bg_doument', 'Tender/Bid Bond Document');
            $crud->fields( 't_id','notice_no',  't_date', 't_value', 'bg_no', 'bg_date', 'bg_value','bg_type', 'bank_id', 'bg_duration', 'bg_expire', 'bg_extension', 'bg_release', 'bg_document');
            $crud->columns('t_id','notice_no','t_authority','t_work_name', 't_value', 'bg_no', 'bg_value', 'bank_id');
            $crud->required_fields('notice_no','t_id', 'bg_no', 'bg_date', 'bank_id', 'bg_value', 'bg_duration', 'bg_expire');
            //$crud->unset_add();
            $crud->set_relation('t_id', 'tender', 't_no');
            $crud->set_relation('bank_id', 'bank', "{bank_name} - {bank_branch}");
            $crud->set_field_upload('bg_document', 'assets/uploads/files');
            $crud->where('v_bg_details.t_status', 'setup');
            $output = $crud->render();

            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    function noa_details() {
        $this->menu = 'setup';
        $this->sub_menu = 'noa_details';
        $this->titlebackend("Notification Award");
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('noa_details');
            $crud->set_subject('Notification Award');
            $crud->display_as('t_id', 'Tender ID');
            $crud->display_as('noa_id', 'NOA ID');
            $crud->display_as('noa_no', 'NOA No');
            $crud->display_as('bg_id', 'Notice No');
            $crud->display_as('noa_date', 'NOA Date');
            $crud->display_as('bg_ref', 'Refference');
            $crud->display_as('bank_id', 'Bank Name');
            $crud->display_as('noa_value', 'NOA Value');
            $crud->display_as('noa_security_type', 'Security Type');
            $crud->display_as('noa_security_amount', 'Securoty Amount');
            $crud->display_as('noa_acceptance', 'Acceptance');
            $crud->display_as('noa_security', 'Security');
            $crud->display_as('noa_doument', 'Document');
            $crud->display_as('noa_contact_sign', 'Contact Sign');
            $crud->fields('bg_id','t_id', 'noa_no', 'noa_date','noa_value', 'noa_security_type', 'noa_security_amount', 'noa_acceptance', 'noa_security', 'noa_contact_sign', 'noa_document');
            $crud->columns('t_id', 'noa_no', 'noa_date', 'noa_value', 'noa_security_type', 'noa_security_amount');
            $crud->required_fields('t_id', 'noa_no', 'noa_date', 'noa_value', 'noa_security_type', 'noa_security_amount');
            $crud->set_relation('t_id', 'tender', 't_no');
            $crud->set_relation('bg_id', 'bg_details', 'notice_no');
            //$crud->set_relation('bank_id', 'bank', "{bank_name} - {bank_branch}");
            $crud->set_field_upload('noa_document', 'assets/uploads/files');
            $crud->where('t_status', 'setup');
            $output = $crud->render();

            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    function security_details() {
        $this->menu = 'setup';
        $this->sub_menu = 'security_details';
        $this->titlebackend("Security Details");
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('v_security_details');
            $crud->set_subject('Security Details');
            $crud->display_as('t_id', 'Tender ID');
            $crud->display_as('noa_id', 'NOA ID');
            $crud->display_as('s_date', 'Date');
            $crud->display_as('s_no', 'Security No');
            $crud->display_as('s_value', 'Value');
            $crud->display_as('bank_id', 'Bank Name');
            $crud->display_as('s_type', 'Security Type');
            $crud->display_as('s_duration', 'Duration(DAYS)');
            $crud->display_as('s_expire', 'Expire Date');
            $crud->display_as('s_extension', 'Extension');
            $crud->display_as('s_release', 'Release');
            $crud->display_as('s_doument', 'Document');
            $crud->fields('noa_id', 'bank_id', 's_date', 's_no', 's_value', 's_type', 's_duration', 's_expire', 's_extension', 's_release', 's_doument');
            $crud->columns('noa_id', 'bank_id', 's_date', 's_value');
            $crud->required_fields('noa_id', 'bank_id', 's_date', 's_value');
            $crud->set_relation('noa_id', 'v_noa_details', "{t_no} - {noa_no}");
            $crud->set_relation('bank_id', 'bank', "{bank_name} - {bank_branch}");
            $crud->set_field_upload('s_doument', 'assets/uploads/files');
            $crud->where('v_security_details.t_status', 'setup');
            $output = $crud->render();

            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    function agreement_details() {
        $this->menu = 'setup';
        $this->sub_menu = 'agreement_details';
        $this->titlebackend("Agreement Details");
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('v_agreement_details');
            $crud->set_subject('Agreement Details');
            $crud->display_as('t_id', 'Tender ID');
            $crud->display_as('noa_id', 'NOA ID');
            $crud->display_as('ag_date', 'Agreement Date');
            $crud->display_as('ag_ref', 'Agreement Number');
            $crud->display_as('ag_value', 'Agreement Value');
            $crud->display_as('ag_duration', 'Agreement Duration(DAYS)');
            $crud->display_as('ag_doument', 'Agreement Document');
            $crud->display_as('ag_completion_date', 'Agreement Completion Date');
            $crud->fields('noa_id', 'ag_date', 'ag_ref', 'ag_value', 'ag_duration', 'ag_completion_date', 'ag_document');
            $crud->columns('noa_id', 'ag_date', 'ag_value', 'ag_duration', 'ag_completion_date');
            $crud->required_fields('noa_id', 'ag_date', 'ag_completion_date');
            $crud->set_relation('noa_id', 'v_noa_details', "{t_no} - {noa_no}");
            $crud->set_field_upload('ag_document', 'assets/uploads/files');
            $crud->where('v_agreement_details.t_status', 'setup');
            $output = $crud->render();

            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    function work_order() {
        $this->menu = 'setup';
        $this->sub_menu = 'work_order';
        $this->titlebackend("Work Order Details");
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('v_work_order');
            $crud->set_subject('Work Order Details');
            $crud->display_as('t_id', 'Tender ID');
            $crud->display_as('noa_id', 'NOA ID');
            $crud->display_as('w_date', 'Work Order Date');
            $crud->display_as('w_value', 'Work Order Value');
            $crud->display_as('w_duration', 'Work Order Duration(DAYS)');
            $crud->display_as('w_competion_date', 'Completion Date');
            $crud->display_as('w_clause', 'Work Order Clause');
            $crud->display_as('w_others', 'Others');
            $crud->display_as('w_ref', 'Work Order number');
            $crud->display_as('w_doument', 'Work Order Document');
            $crud->fields('noa_id', 'w_date', 'w_ref', 'w_value', 'w_duration', 'w_competion_date', 'w_clause', 'w_others', 'w_document');
            $crud->columns('noa_id', 'w_date', 'w_value', 'w_competion_date');
            $crud->required_fields('noa_id', 'w_date', 'w_value', 'w_competion_date');
            $crud->set_relation('noa_id', 'v_noa_details', "{t_no} - {noa_no}");
            $crud->set_field_upload('w_document', 'assets/uploads/files');
            $crud->where('v_work_order.t_status', 'setup');
            $output = $crud->render();

            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    function assigned_bank() {
        $this->menu = 'setup';
        $this->sub_menu = 'assigned_bank';
        $this->titlebackend("Assigned Bank");
        try {
            $crud = new grocery_CRUD();
            $crud->set_theme('datatables');
            $crud->set_table('v_assigned_bank');
            $crud->set_subject('Assigned Bank');
            $crud->display_as('t_id', 'Tender ID');
            $crud->display_as('noa_id', 'NOA ID');
            $crud->display_as('ab_date', 'Date');
            $crud->display_as('ab_ref', 'AG Number');
            $crud->display_as('ab_value', 'Value');
            $crud->display_as('bank_id', 'Bank Name');
            $crud->display_as('ab_email', 'Email');
            $crud->display_as('ab_ac_no', 'Account No');
            $crud->display_as('ab_others', 'Others');
            $crud->display_as('ab_doument', 'Document');
            $crud->fields('noa_id', 'bank_id', 'ab_date', 'ab_ref', 'ab_value', 'ab_email', 'ab_ac_no', 'ab_others', 'ab_doument');
            $crud->columns('noa_id', 'bank_id', 'ab_date', 'ab_value', 'ab_ac_no');
            $crud->required_fields('noa_id', 'bank_id', 'ab_date', 'ab_value', 'ab_ac_no');
            $crud->set_relation('noa_id', 'v_noa_details', "{t_no} - {noa_no}");
            $crud->set_relation('bank_id', 'bank', "{bank_name} - {bank_branch}");
            $crud->set_field_upload('ab_doument', 'assets/uploads/files');
            $crud->where('v_assigned_bank.t_status', 'setup');
            $output = $crud->render();

            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    function loan_details() {
        $this->menu = 'setup';
        $this->sub_menu = 'loan_details';
        $this->titlebackend("Loan Details");
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('v_loan_details');
            $crud->set_subject('Loan Details');
            $crud->display_as('t_id', 'Tender ID');
            $crud->display_as('noa_id', 'NOA ID');
            $crud->display_as('l_date', 'Sanction Date');
            $crud->display_as('l_ref', 'Sanction Ref.');
            $crud->display_as('l_no', 'Loan No');
            $crud->display_as('l_value', 'Sanction Value');
            $crud->display_as('bank_id', 'Bank Name');
            $crud->display_as('l_approved_loan', 'Approved Loan');
            $crud->display_as('l_non_funded', 'Non Funded');
            $crud->display_as('l_funded', 'Funded');
            $crud->display_as('l_renewal_date', 'Renewal Date');
            $crud->display_as('l_document', 'Document');
            $crud->fields('noa_id', 'l_no', 'bank_id', 'l_ref', 'l_date', 'l_value', 'l_approved_loan', 'l_non_funded', 'l_funded', 'l_renewal_date', 'l_document');
            $crud->columns('l_no', 'noa_id', 'bank_id', 'l_date', 'l_value', 'l_approved_loan');
            $crud->required_fields('noa_id', 'bank_id', 'l_no', 'l_date', 'l_value', 'l_approved_loan', 'l_non_funded');
            $crud->set_relation('noa_id', 'v_noa_details', "{t_no} - {noa_no}");
            $crud->set_relation('bank_id', 'bank', "{bank_name} - {bank_branch}");
            $crud->set_field_upload('l_document', 'assets/uploads/files');
            $crud->add_action('Loan Avail', 'Loan Availing', '', '', array($this, 'loan_availing'));
            $crud->where('v_loan_details.t_status', 'setup');
            $output = $crud->render();

            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function loan_availing($primary_key, $row) {
        return site_url('setup/loan_avail/' . $row->l_id);
    }

    function loan_avail($l_id) {
        $this->menu = 'setup';
        $this->sub_menu = 'loan_details';
        $this->titlebackend("Loan Availing Details");
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('v_loan_avail');
            $crud->set_subject('Loan Availing Details');
            $crud->display_as('l_id', 'Loan ID');
            $crud->display_as('la_date', 'Date');
            $crud->display_as('la_instrument', 'Instrument');
            $crud->display_as('la_transfer', 'Transfer');
            $crud->display_as('la_amount', 'Ln Amount');
            $crud->display_as('la_charge', 'Charge/ Int.');
            $crud->display_as('la_adjustment', 'Adjustment');
            $crud->display_as('la_document', 'Document');
            $crud->fields('l_id', 'la_date', 'la_instrument', 'la_transfer', 'la_amount', 'la_charge', 'la_adjustment', 'la_document');
            $crud->columns('l_no', 'la_date', 'la_instrument', 'la_amount', 'la_charge', 'la_adjustment');
            $crud->required_fields('l_id', 'la_date', 'la_instrument');
            $crud->set_field_upload('la_document', 'assets/uploads/files');
            $crud->where('v_loan_avail.t_status', 'setup');
            $crud->where('v_loan_avail.l_id', $l_id);
            $crud->field_type('l_id', 'hidden', $l_id);
            $this->l_no = $this->m_common->get_row_array('loan_details', array('l_id' => $l_id), 'l_no');
            $output = $crud->render();

            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    function bill_register() {
        $this->menu = 'setup';
        $this->sub_menu = 'bill_register';
        $this->titlebackend("Bill Register");
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('v_bill_register');
            $crud->set_subject('Bill Register');
            $crud->display_as('t_id', 'Tender ID');
            $crud->display_as('noa_id', 'NOA ID');
            $crud->display_as('b_date', 'Date');
            $crud->display_as('b_no', 'Bill No');
            $crud->display_as('b_description', 'Description');
            $crud->display_as('b_amount', 'Amount');
            $crud->fields('noa_id', 'b_date', 'b_no', 'b_description', 'b_amount');
            $crud->columns('noa_id', 'b_date', 'b_no', 'b_description', 'b_amount');
            $crud->required_fields('noa_id', 'b_date', 'b_no', 'b_description', 'b_amount');
            $crud->set_relation('noa_id', 'v_noa_details', "{t_no} - {noa_no}");
            $crud->set_field_upload('b_document', 'assets/uploads/files');
            $crud->where('v_bill_register.t_status', 'setup');
            $output = $crud->render();

            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    function payment_received() {
        $this->menu = 'setup';
        $this->sub_menu = 'payment_received';
        $this->titlebackend("Payment Received");
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('v_payment_received');
            $crud->set_subject('Payment Received');
            $crud->display_as('t_id', 'Tender ID');
            $crud->display_as('noa_id', 'NOA ID');
            $crud->display_as('b_id', 'Bill No');
            $crud->display_as('pr_date', 'Date');
            $crud->display_as('bank_id', 'Bank Name');
            $crud->display_as('pr_deposit_date', 'Deposit Date');
            $crud->display_as('pr_amount', 'Amount');
            $crud->display_as('l_document', 'Document');
            $crud->fields('noa_id', 'b_id', 'bank_id', 'pr_date', 'pr_deposit_date', 'pr_amount', 'pr_document');
            $crud->columns('noa_id', 'b_id', 'bank_id', 'pr_date', 'pr_deposit_date', 'pr_amount');
            $crud->required_fields('noa_id', 'b_id', 'bank_id', 'pr_date', 'pr_deposit_date', 'pr_amount');
            $crud->set_relation('noa_id', 'v_noa_details', "{t_no} - {noa_no}");
            $crud->set_relation('bank_id', 'bank', "{bank_name} - {bank_branch}");
            $crud->set_relation('b_id', 'bill_register', "b_no");
            $crud->set_field_upload('pr_document', 'assets/uploads/files');
            $crud->where('v_payment_received.t_status', 'setup');
            $output = $crud->render();

            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    function deduction() {
        $this->menu = 'setup';
        $this->sub_menu = 'deduction';
        $this->titlebackend("Deducted By Authority");
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('v_deduction');
            $crud->set_subject('Deducted By Authority');
            $crud->display_as('t_id', 'Tender ID');
            $crud->display_as('noa_id', 'NOA ID');
            $crud->display_as('b_id', 'Bill No');
            $crud->display_as('d_vat', 'VAT');
            $crud->display_as('d_ait', 'AIT');
            $crud->display_as('d_security', 'Security');
            $crud->display_as('d_s_percent', 'Percentage(%)');
            $crud->display_as('d_document', 'Document');
            $crud->fields('noa_id', 'b_id', 'd_vat', 'd_ait', 'd_security', 'd_s_percent', 'd_document');
            $crud->columns('noa_id', 'b_id', 'd_vat', 'd_ait', 'd_security', 'd_s_percent');
            $crud->required_fields('noa_id', 'b_id', 'd_vat', 'd_ait', 'd_security', 'd_s_percent');
            $crud->set_relation('noa_id', 'v_noa_details', "{t_no} - {noa_no}");
            $crud->set_relation('b_id', 'bill_register', "b_no");
            $crud->set_field_upload('d_document', 'assets/uploads/files');
            $crud->where('v_deduction.t_status', 'setup');
            $output = $crud->render();

            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    function security_money() {
        $this->menu = 'setup';
        $this->sub_menu = 'security_money';
        $this->titlebackend("Security Money");
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('v_security_money');
            $crud->set_subject('Security Money');
            $crud->display_as('t_id', 'Tender ID');
            $crud->display_as('noa_id', 'NOA ID');
            $crud->display_as('b_id', 'Bill No');
            $crud->display_as('sm_date', 'Date');
            $crud->display_as('sm_cheque', 'Chueq No.');
            $crud->display_as('sm_amount', 'Amount');
            $crud->display_as('d_document', 'Document');
            $crud->fields('noa_id', 'b_id', 'sm_date', 'sm_cheque', 'sm_amount');
            $crud->columns('noa_id', 'b_id', 'sm_date', 'sm_cheque', 'sm_amount');
            $crud->required_fields('noa_id', 'b_id', 'sm_date', 'sm_amount');
            $crud->set_relation('noa_id', 'v_noa_details', "{t_no} - {noa_no}");
            $crud->set_relation('b_id', 'bill_register', "b_no");
            $crud->set_field_upload('sm_document', 'assets/uploads/files');

            $crud->where('v_security_money.t_status', 'setup');
            $output = $crud->render();

            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    function bankInfo() {
        $this->menu = 'bankInfo';
        $this->sub_menu = 'bankInfo';
        $this->titlebackend("Bank Information");
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('bank');
            $crud->set_subject('Bank Information');
            $crud->display_as('bank_name', 'Bank Name');
            $crud->display_as('c_id', 'Company Name');
            $crud->display_as('bank_branch', 'Branch');
            $crud->display_as('bank_address', 'Address');
            $crud->display_as('bank_email', 'Email');
            $crud->display_as('bank_mobile', 'Mobile');
            $crud->display_as('bank_height', 'Cheque Height');
            $crud->display_as('bank_width', 'Cheque Widht');
            $crud->display_as('che_image', 'Cheque Image');
            $crud->fields('bank_name', 'c_id', 'account_no','account_type', 'bank_branch', 'bank_address', 'bank_email', 'bank_mobile','bank_height','bank_width','routing_number','signatory','che_image');
            $crud->columns('bank_name', 'c_id', 'account_no','account_type', 'bank_branch', 'bank_address', 'bank_email', 'bank_mobile');
            $crud->required_fields('bank_name', 'c_id', 'account_no', 'bank_branch', 'bank_address', 'bank_email', 'bank_mobile');
            $crud->set_field_upload('che_image', 'assets/uploads/cheque');
            $crud->set_relation('c_id', 'company', 'c_name');
            $output = $crud->render();

            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    function loan_used() {
        $this->menu = 'loan_used';
        $this->sub_menu = 'loan_used';
        $this->titlebackend("Loan Used Details");
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('loan_used');
            $crud->set_subject('Loan Used Details');
            $crud->display_as('lu_date', 'Loan Used Date');
            $crud->display_as('lu_instrument', 'Instrument');
            $crud->display_as('lu_amount', 'Loan Amount');
            $crud->display_as('lu_used', 'Used Amount');
            $crud->fields('lu_date', 'lu_instrument', 'lu_amount', 'lu_used');
            $crud->columns('lu_date', 'lu_instrument', 'lu_amount', 'lu_used');
            $crud->required_fields('lu_date', 'lu_instrument');

            $output = $crud->render();

            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    function company() {
        $this->session->set_userdata('section', 'Tanker');
        $this->menu = 'company';
        $this->sub_menu = 'company';
        $this->titlebackend("Company List");
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('company');
            $crud->set_subject('Company');
            $crud->display_as('c_name', 'Company Name');
            $crud->display_as('c_address', 'Address');
            $crud->display_as('c_phone', 'Phone');
            $crud->display_as('c_email', 'Email');
            $crud->display_as('c_fax', 'Fax');
            $crud->display_as('remarks', 'Remarks');
            $crud->display_as('c_logo', 'Company Logo');
            $crud->fields('c_name', 'c_address', 'c_phone', 'c_email', 'c_fax', 'remarks', 'c_logo');
            $crud->columns('c_name', 'c_address', 'c_phone', 'c_email', 'c_logo');
            $crud->required_fields('c_name');
            $crud->set_field_upload('c_logo', 'assets/uploads/files');
            $output = $crud->render();

            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
    
    function workType(){
        //$this->session->set_userdata('section', 'Tanker');
        $this->menu = 'setup';
        $this->sub_menu = 'work_type';
        $this->titlebackend("Work Type");
        try {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('work_type');
            $crud->set_subject('Company');
            $crud->display_as('work_type_name', 'Work Type');
            
            $crud->fields('work_type_name' );
            $crud->columns('work_type_name');
            $crud->required_fields('c_name');
            $crud->set_field_upload('c_logo', 'assets/uploads/files');
            $output = $crud->render();

            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
    
    
    function bill_received(){
        $this->menu = 'bill_received';
        $this->sub_menu = 'bill_received';
        $this->titlebackend("Bill Received");
        try {
            $data['data'] = $this->m_common->get_row_array('bill_register', '', '*');
            $this->load->view('v_bill_received', $data);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
    function add_bill_received(){
        $this->menu = 'bill_received';
        $this->sub_menu = 'bill_received';
        $this->titlebackend("Bill Received");
        try {
            $data['noa_details'] = $this->m_common->get_row_array('v_noa_details', '', '*');
            $data['banks'] = $this->m_common->get_row_array('bank', '', '*');
            $this->load->view('add_bill_received',$data);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
    function edit_bill_received($b_id){
        $this->menu = 'bill_received';
        $this->sub_menu = 'bill_received';
        $this->titlebackend("Bill Received");
        try {
            
            $data['bill_register'] = $this->m_common->get_row_array('bill_register',array('b_id'=> $b_id), '*');
            $data['payment_received'] = $this->m_common->get_row_array('payment_received',array('b_id'=> $b_id), '*');
            $data['deduction'] = $this->m_common->get_row_array('deduction',array('b_id'=> $b_id), '*');
            $data['security_money'] = $this->m_common->get_row_array('security_money',array('b_id'=> $b_id), '*');
            $noa_id = $data['bill_register'];
            $bank_name = $data['payment_received'];
            $data['bank'] = $this->m_common->get_row_array('bank', array('bank_id'=> $bank_name[0]['bank_id']), '*');
            $data['noa_details'] = $this->m_common->get_row_array('v_noa_details', array('noa_id'=> $noa_id[0]['noa_id']), '*');
            $data['banks'] = $this->m_common->get_row_array('bank', '', '*');
            $this->load->view('edit_bill_received',$data);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
    function insert_bill_received_action(){
        $postData = $this->input->post();
        if (!empty($postData)) {
            
                $insertData = array();
                $insertData['noa_id'] = $postData['noa_id'];
                $insertData['b_date'] =date('y-m-d', strtotime($postData['b_date']));
                $insertData['b_no'] = $postData['b_no'];
                $insertData['b_description'] = $postData['b_description'];
                $insertData['b_amount'] = $postData['b_amount'];
                $id = $this->m_common->insert_row('bill_register', $insertData);
                
               if(!empty($id)){
                   $insertData = array();
                $insertData['noa_id'] = $postData['noa_id'];
                $insertData['bank_id'] = $postData['bank_id'];
                $insertData['pr_date'] =  date('y-m-d', strtotime($postData['pr_date']));
                $insertData['pr_deposit_date'] = date('y-m-d', strtotime($postData['pr_deposit_date']));
                $insertData['pr_amount'] = $postData['pr_amount'];
//                $insertData['pr_document'] = $postData['pr_document'];
                $insertData['b_id'] = $id;
                $this->m_common->insert_row('payment_received', $insertData);
                
                $insertData = array();
                $insertData['noa_id'] = $postData['noa_id'];
                $insertData['d_vat'] = $postData['d_vat'];
                $insertData['d_ait'] = $postData['d_ait'];
                $insertData['d_security'] = $postData['d_security'];
                $insertData['d_s_percent'] = $postData['d_s_percent'];
//                $insertData['d_document'] = $postData['d_document'];
                $insertData['b_id'] = $id;
                $this->m_common->insert_row('deduction', $insertData);
           
                $insertData = array();
                $insertData['noa_id'] = $postData['noa_id'];
                $insertData['sm_date'] = date('y-m-d', strtotime($postData['sm_date']));
                $insertData['sm_cheque'] = $postData['sm_cheque'];
                $insertData['sm_amount'] = $postData['sm_amount'];
                $insertData['b_id'] = $id;
                $this->m_common->insert_row('security_money', $insertData);
               }
            redirect_with_msg('setup/bill_received', 'Bill Received Created Successfully');
        } else {
            redirect_with_msg('setup/add_bill_received', 'Please fill the form properly');
        }
        
    }
    function edit_bill_received_action($b_id){
        $postData = $this->input->post();
        if (!empty($postData)) {
            
                $insertData = array();
                $insertData['noa_id'] = $postData['noa_id'];
                $insertData['b_date'] =date('y-m-d', strtotime($postData['b_date']));
                $insertData['b_no'] = $postData['b_no'];
                $insertData['b_description'] = $postData['b_description'];
                $insertData['b_amount'] = $postData['b_amount'];
                
                $this->m_common->update_row('bill_register',array('b_id'=>$b_id),$insertData);
                
              
                   $insertData = array();
                $insertData['noa_id'] = $postData['noa_id'];
                $insertData['bank_id'] = $postData['bank_id'];
                $insertData['pr_date'] =  date('y-m-d', strtotime($postData['pr_date']));
                $insertData['pr_deposit_date'] = date('y-m-d', strtotime($postData['pr_deposit_date']));
                $insertData['pr_amount'] = $postData['pr_amount'];
//                $insertData['pr_document'] = $postData['pr_document'];
                
                
                $this->m_common->update_row('payment_received',array('b_id'=>$b_id),$insertData);
                
                $insertData = array();
                $insertData['noa_id'] = $postData['noa_id'];
                $insertData['d_vat'] = $postData['d_vat'];
                $insertData['d_ait'] = $postData['d_ait'];
                $insertData['d_security'] = $postData['d_security'];
                $insertData['d_s_percent'] = $postData['d_s_percent'];
//                $insertData['d_document'] = $postData['d_document'];
                
                
                $this->m_common->update_row('deduction',array('b_id'=>$b_id),$insertData);
           
                $insertData = array();
                $insertData['noa_id'] = $postData['noa_id'];
                $insertData['sm_date'] = date('y-m-d', strtotime($postData['sm_date']));
                $insertData['sm_cheque'] = $postData['sm_cheque'];
                $insertData['sm_amount'] = $postData['sm_amount'];
                
                
                 $this->m_common->update_row('security_money',array('b_id'=>$b_id),$insertData);
               
            redirect_with_msg('setup/bill_received', 'Bill Received Updated Successfully');
        } else {
            redirect_with_msg('setup/edit_bill_received', 'Please fill the form properly');
        }
        
    }
//    function delete_bill_received($b_id){
//        $this->m_common->delete_row('bill_register', array('b_id' => $b_id));
//        redirect_with_msg('setup/cheque_list', 'Delete Successfully');
//    }

    function cheque_list() {
        $this->menu = 'cheque_list';
        $this->sub_menu = 'cheque_list';
        $this->titlebackend("Cheque List");
        try {
            $data['data'] = $this->m_common->get_row_array('v_cheque', '', '*');
            $data['company'] = $this->m_common->get_row_array('company', '', '*');
            $data['bank'] = $this->m_common->get_row_array('bank', '', '*');
            $this->load->view('v_cheque', $data);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    function create_cheque() {
        $postData = $this->input->post();
        if (!empty($postData)) {
            $chk_start = $postData['cheque_no_start'];
            $chk_end = $postData['cheque_no_end'];
            $diff = $chk_end - $chk_start;
            for ($i = 0; $i <= $diff; $i++) {
                $insertData = array();
                $insertData['chk_no'] = ($chk_start + $i);
                $insertData['b_id'] = $postData['bank'];
                $insertData['created'] = date('Y-m-d');
                $insertData['status'] = 'Created';
                $insertData['c_id'] = $postData['company'];
                $insertData['bank_branch'] = $postData['bank_branch'];
                $insertData['account_no'] = $postData['account_no'];
                $this->m_common->insert_row('cheque_register', $insertData);
            }
            redirect_with_msg('setup/cheque_list', 'Cheque Created Successfully');
        } else {
            redirect_with_msg('setup/cheque_list', 'Please fill the form properly');
        }
    }
    
    function canceled_cheque($id){
        
        if (!empty($id)) {
            $data['status'] = 'Canceled';
            $this->m_common->update_row('assigned_cheque',array('id'=>$id),$data);
            
            redirect_with_msg('setup/assigned_cheque_list', 'Cheque Canceled Successfully');
        } else {
            redirect_with_msg('setup/cheque_list', 'Please fill the form properly');
        }
    }
    
    function delete_cheque($chk_id){
    
        $this->m_common->delete_row('cheque_register', array('chk_id' => $chk_id));
        redirect_with_msg('setup/cheque_list', 'Delete Successfully');
    }
    function assigned_cheque_list() {
        $this->menu = 'assign_cheque_list';
        $this->sub_menu = 'cheque_list';
        $this->titlebackend("Assigned Cheque List");
        try {
            $data['data'] = $this->m_common->get_row_array('v_cheque','', '*');
            $data['assing_chk'] = $this->m_common->get_row_array('v_assignchk', array('status'=>'issued'), '*');
            $data['company'] = $this->m_common->get_row_array('company', '', '*');
            $data['bank'] = $this->m_common->get_row_array('bank', '', '*');
            foreach($data['bank'] as $key=>$bank){
                $current_chk = $this->m_common->get_row_array('cheque_register', array('b_id'=>$bank['bank_id'],'status'=>'Created'), '*','','1','chk_no','ASC');
                $data['bank'][$key]['current_chk'] = !empty($current_chk[0]['chk_no']) ? $current_chk[0]['chk_no'] : '';
            }
            $this->load->view('v_assign_cheque',$data);  
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
        
        
        
    }
    function issued_cheque(){
        
        $postData = $this->input->post();
        if (!empty($postData)) {
            
                $insertData = array();
                $data['status'] = 'Completed';
                $data['issued_date'] = date('y-m-d', strtotime( $postData['issued_date']));
                $data['receive_by'] =$postData['receive_by'];
                $data['remarks'] = $postData['remarks'];
                
                $this->m_common->update_row('assigned_cheque',array('id'=>$postData['issue_id']),$data);
            
            redirect_with_msg('setup/assigned_cheque_list', 'Cheque Assigned Successfully');
        } else {
            redirect_with_msg('setup/cheque_list', 'Please fill the form properly');
        }
        
    }
    function issued_cheque_list(){
       $this->menu = 'issued_cheque_list';
        $this->sub_menu = 'cheque_list';
        $this->titlebackend("Issued Cheque List");
        try {
            $data['data'] = $this->m_common->get_row_array('v_cheque','', '*');
            $data['assing_chk'] = $this->m_common->get_row_array('v_assignchk', array('status'=>'Completed'), '*');
            $data['company'] = $this->m_common->get_row_array('company', '', '*');
            $data['bank'] = $this->m_common->get_row_array('bank', '', '*');
            foreach($data['bank'] as $key=>$bank){
                $current_chk = $this->m_common->get_row_array('cheque_register', array('b_id'=>$bank['bank_id'],'status'=>'Created'), '*','','1','chk_no','ASC');
                $data['bank'][$key]['current_chk'] = !empty($current_chk[0]['chk_no']) ? $current_chk[0]['chk_no'] : '';
            }
            $this->load->view('v_issued_cheque',$data);  
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        } 
    }
            
    function insertAssign_cheque() {
        $postData = $this->input->post();
        if (!empty($postData)) {
            
                $insertData = array();
                
                $insertData['bank_id'] = $postData['bank'];
                $insertData['c_id'] = $postData['company'];
                $insertData['bank_branch'] = $postData['bank_branch'];
                $insertData['bank_account'] = $postData['account_no'];
                $insertData['chk_no'] = $postData['current_chk'];
                $insertData['chk_date'] = date('y-m-d', strtotime( $postData['cheque_date']));
                $insertData['chk_type'] = $postData['chk_type'];
                $insertData['pay_to'] = $postData['pay_to'];
                $insertData['amount'] = $postData['amount'];
                $insertData['created'] = date('Y-m-d');
                
                $this->m_common->insert_row('assigned_cheque', $insertData);
                
                $data['status'] = 'Pending';
                
                $this->m_common->update_row('cheque_register',array('chk_no'=>$postData['current_chk']),$data);
            
            redirect_with_msg('setup/assigned_cheque_list', 'Cheque Assigned Successfully');
        } else {
            redirect_with_msg('setup/cheque_list', 'Please fill the form properly');
        }
    }
    
    function deleteAssignChk($chk_no){
        
         $this->m_common->delete_row('assigned_cheque', array('chk_no' => $chk_no));
         
         $data['status'] = 'Created';
         $this->m_common->update_row('cheque_register',array('chk_no'=>$chk_no),$data);
        redirect_with_msg('setup/assigned_cheque_list', 'Delete Successfully');
    }
    function chequePrint($chk_no){
        $this->menu = 'issued_cheque_list';
        $this->sub_menu = 'cheque_list';
        $this->titlebackend("Issued Cheque List");
        $this->setOutputMode(NORMAL);
        try {
           $data['cheque_info'] = $this->m_common->get_row_array('assigned_cheque', array('id'=>$chk_no),'*');
           $data['bank_info'] = $this->m_common->get_row_array('bank', array('bank_id'=> $data['cheque_info'][0]['bank_id']), '*');
          
           $this->load->view('v_cheque_print', $data);  
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
       
//        $html = $this->load->view('v_cheque_print', $data, true);
//         $this->load->library("mpdf_lib5");
//         $this->mpdf_lib5->WriteHTML($html);
//         $this->mpdf_lib5->Output();
    }
    
    function get_noa_value() {
        $this->setOutputMode(NORMAL);
        $id = $this->input->post('id');
        $data = $this->m_common->get_row_array('noa_details', array('noa_id'=>$id), '*');
        echo json_encode(array('msg'=>'success','value'=>$data[0]['noa_value']));
    }
    
    function get_ab_account() {
        $this->setOutputMode(NORMAL);
        $id = $this->input->post('id');
        $data = $this->m_common->get_row_array('bank', array('bank_id'=>$id), '*');
        echo json_encode(array('msg'=>'success','value'=>$data[0]['account_no']));
    }
    
    function getbank(){
        $this->setOutputMode(NORMAL);
        $c_id = $this->input->post('c_id');
        $data = $this->m_common->get_row_array('bank',array('c_id'=>$c_id),'bank_name , bank_id','bank_name');
        echo json_encode(array('msg'=>'success','value'=>$data));
    }
    function getBranch(){
        $this->setOutputMode(NORMAL);
        $b_name = $this->input->post('b_name');
        $data = $this->m_common->get_row_array('bank',array('bank_name'=>$b_name),'bank_branch','bank_branch');
        echo json_encode(array('msg'=>'success','value'=>$data));
    }
    function getAccountNo(){
        $this->setOutputMode(NORMAL);
        $b_branch = $this->input->post('b_branch');
        $data = $this->m_common->get_row_array('bank',array('bank_branch'=>$b_branch),'account_no','account_no');
        echo json_encode(array('msg'=>'success','value'=>$data));
    }
    function getchequeno(){
        $this->setOutputMode(NORMAL);
        $c_id = $this->input->post('c_id');
        //$b_id = $this->input->post('b_id');
        $b_branch = $this->input->post('b_branch');
        $b_account = $this->input->post('b_account');
        $bank = $this->m_common->get_row_array('bank', array('c_id'=>$c_id,'bank_branch'=>$b_branch,'account_no'=>$b_account), 'bank_id');
        $b_id =$bank[0]['bank_id'];
        $data = $this->m_common->get_row_array('cheque_register', array('c_id'=>$c_id,'b_id'=>$b_id,'bank_branch'=>$b_branch,'account_no'=>$b_account,'status'=>'Created'), 'chk_no','','1','chk_no','ASC');
        echo json_encode(array('msg'=>'success','value'=>$data[0]['chk_no']));
    }
}
    