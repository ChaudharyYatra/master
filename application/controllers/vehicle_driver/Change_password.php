<?php 
//   Controller for: home page
// Author: vivek
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_password extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('vehicle_driver_sess_id')=="") 
        { 
                redirect(base_url().'vehicle_driver/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('vehicle_driver_panel_slug')."vehicle_driver/change_password";
        $this->module_title       = "Password Change";
        $this->module_url_slug    = "change_password";
        $this->module_view_folder = "change_password/";
        $this->arr_view_data = [];
	 }

public function change_password()
     {
        $vehicle_ssession_driver_name = $this->session->userdata('vehicle_ssession_driver_name');
        $id = $this->session->userdata('vehicle_driver_sess_id');

        if($this->input->post('submit'))
             {
                 $this->form_validation->set_rules('old_pass', 'Old Password', 'required');
                 $this->form_validation->set_rules('new_password', 'New password', 'required');
                 $this->form_validation->set_rules('confirm_pass', 'Confirm Password', 'required');
                 if($this->form_validation->run() == TRUE)
                 {                  
                    $old_pass = trim($this->input->post('old_pass'));
                    $new_password = trim($this->input->post('new_password'));
                    $confirm_pass = trim($this->input->post('confirm_pass'));
 
                    $this->db->where('id',$id);
                    $arr_data = $this->master_model->getRecords('vehicle_driver');
                    
                    $existed_password = $arr_data[0]['password'];
                    
                    if($existed_password == $old_pass)
                    {
                         $arr_update = array(                       
                             'password' => $new_password,
                             'password_change' => 'yes',
                         );
                         $arr_where     = array("id" => $id);
                         $this->master_model->updateRecord('vehicle_driver',$arr_update,$arr_where);

                        $this->db->where('is_deleted','no');
                        $this->db->where('is_active','yes');
                        $this->db->where('id',$id);
                        $this->db->order_by('id','DESC');
                        $agent_data_email = $this->master_model->getRecord('vehicle_driver');
                        $agent_email=$agent_data_email['email'];
                        $agent_name=$agent_data_email['agent_name'];


                         if($id > 0)
                         {
                             $this->session->set_flashdata('success_message',$this->module_title." Successfully.");
                             redirect(base_url('vehicle_driver/login/logout'));
                         }
                         else
                         {
                             $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
                         }
                     }
                     else
                         {
                             $this->session->set_flashdata('error_message',"Old Password is Wrong".".");
                         }
                     redirect($this->module_url_path.'/change_password');
                 }   
             }
         $this->arr_view_data['vehicle_ssession_driver_name']        = $vehicle_ssession_driver_name;
         $this->arr_view_data['listing_page']    = 'yes';        
         $this->arr_view_data['page_title']      = $this->module_title." ";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."change_password";
         $this->load->view('vehicle_driver/layout/vehicle_driver_combo',$this->arr_view_data);
        
     }


}