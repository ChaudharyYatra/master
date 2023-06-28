<?php 
//   Controller for: home page
// Author: Nandkishor Wagh
// Start Date: 08-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class User_profile extends CI_Controller {
	 
	function __construct() {

        parent::__construct();

        $this->arr_view_data = [];

        $this->module_url_path    =  base_url().$this->config->item('front_panel_slug')."dashboard";
        $this->module_view_folder = "dashboard/";
        
	 }

	 
     public function index()
    {

        if($this->input->post('submit'))
        {  

                $this->form_validation->set_rules('mobile', 'Mobile', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');

                if($this->form_validation->run() == TRUE)
                {              
                   $mobile_login = trim($this->input->post('mobile'));
                   $pass_login = trim($this->input->post('password'));
                  
                   $this->db->where('mobile_no',$mobile_login);
                   $this->db->where('password',$pass_login);
                   $arr_data = $this->master_model->getRecords('all_traveller_info');        
                //    print_r($arr_data);  die;

                    if(empty($arr_data))
                    {    
                        $this->session->set_flashdata('error_message1',"Mobile Number Or Password Is Wrong.");
    
                    }
                     else
                    {
                         foreach($arr_data as $cust_data)
                         {

                             $this->session->set_userdata('cust_email',$cust_data['email']);
                             $this->session->set_userdata('cust_mobile_no',$cust_data['mobile_no']);
                             $this->session->set_userdata('cust_sess_id',$cust_data['traveler_id']);
                             $this->session->set_userdata('cust_fname',$cust_data['first_name']);
                             $this->session->set_userdata('cust_mname',$cust_data['middle_name']);
                             $this->session->set_userdata('cust_lname',$cust_data['last_name']);
                             
                         }
     
                        //  redirect($this->module_url_path.'/index');
                        redirect(base_url().'tour_instruction/index');  
                 
               
                    }
                }
        }
        
         
        // $data = array(
        //                 // 'middle_content' => 'user_profile',
		// 				// 'user_profile_data'       => $arr_data
		// 				);
        $this->arr_view_data['page_title']     =  "dashboard";
        $this->arr_view_data['middle_content'] =  "dashboard";
        // $this->load->view('front/common_view',$this->arr_view_data);
        // $this->load->view('front/common_view',$data);
        // $this->load->view('front/index');
    }

    public function logout()
    {
        $this->session->unset_userdata('cust_sess_id');
        $this->session->unset_userdata('cust_mobile_no');
        $this->session->unset_userdata('cust_email');
        $this->session->unset_userdata('cust_fname');
        $this->session->unset_userdata('cust_mname');
        $this->session->unset_userdata('cust_lname');
        $this->session->sess_destroy();
        // redirect($this->module_url_path.'/index');  
        redirect(base_url().'home'); 
    }


	

}