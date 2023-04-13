<?php 
//   Controller for: home page
// Author: vivek
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('hotel_sess_id')=="") 
        { 
                redirect(base_url().'hotel/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('hotel_panel_slug')."/profile";
        $this->module_title       = "Change Password";
        $this->module_url_slug    = "profile";
        $this->module_view_folder = "change_password/";
        $this->arr_view_data = [];
	 }

     public function change_password()
     {

        if($this->input->post('submit'))
             {
                $id=$this->session->userdata('hotel_sess_id');
                 $this->form_validation->set_rules('old_pass', 'Old Password', 'required');
                 $this->form_validation->set_rules('new_password', 'New password', 'required');
                 $this->form_validation->set_rules('confirm_pass', 'Confirm Password', 'required');
                 if($this->form_validation->run() == TRUE)
                 {                  
                    $old_pass = trim($this->input->post('old_pass'));
                    $new_password = trim($this->input->post('new_password'));
                    $confirm_pass = trim($this->input->post('confirm_pass'));
 
                    $this->db->where('id',$id);
                    $arr_data = $this->master_model->getRecords('hotel_master');
                    
                    $existed_password = $arr_data[0]['hotel_password'];
                    
                    if($existed_password == $old_pass)
                    {
                         $arr_update = array(                       
                             'hotel_password' => $new_password                            
                         );
                         $arr_where     = array("id" => $id);
                         $this->master_model->updateRecord('hotel_master',$arr_update,$arr_where);
                         if($id > 0)
                         {
                             $this->session->set_flashdata('success_message',$this->module_title." Successfully.");
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
         $hotel_sess_name = $this->session->userdata('hotel_name');
         $this->arr_view_data['hotel_sess_name']        = $hotel_sess_name;
         $this->arr_view_data['listing_page']    = 'yes';        
         $this->arr_view_data['page_title']      = $this->module_title." ";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."change_password";
         $this->load->view('hotel/layout/hotel_combo',$this->arr_view_data);
        
     }

     public function index()
     {
         $id = $this->session->userdata('hotel_sess_id');
         if ($id=='') 
         {
             $this->session->set_flashdata('error_message','Invalid Selection Of Record');
             redirect($this->module_url_path.'/index');
         }   
         
         
         $this->db->where('id',$id);         
         $arr_data = $this->master_model->getRecords('hotel_master');
         $hotel_sess_name = $this->session->userdata('hotel_name');
         $this->arr_view_data['hotel_sess_name']        = $hotel_sess_name;
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = "Details";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
         $this->load->view('hotel/layout/hotel_combo',$this->arr_view_data);
     }
    


}