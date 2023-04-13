<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class International_booking_enquiry extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('agent_inspector_sess_id')=="") 
        { 
                redirect(base_url().'agent_inspector/login'); 
        }
		// hasemployeepanelaccess();
		// Check User Permission
		//hasModuleAccess(6);//set same module id as in module_master table

	   
        // $this->user_id            =  $this->session->userdata('nabcons_id');
        // $this->name               =  $this->session->userdata('nabcons_username');
        // $this->ip                 =  $this->input->ip_address();
        $this->module_url_path    =  base_url().$this->config->item('agent_inspector_panel_slug')."/international_booking_enquiry";
        $this->module_title       = "International Booking Enquiry";
        $this->module_url_slug    = "international_booking_enquiry";
        $this->module_view_folder = "international_booking_enquiry/";    
        $this->load->library('upload');
        $this->load->model('international_member');
	}

	public function index()
	{
        $agent_inspector_sess_name = $this->session->userdata('agent_inspector_name');
        $id = $this->session->userdata('agent_inspector_sess_id');
        $region_id = $this->session->userdata('agent_inspector_region');
        // region means department

        $record = array();
        $fields = "international_booking_enquiry.*,international_packages.tour_title,agent.agent_name,international_packages.tour_number";
        $this->db->order_by('international_booking_enquiry.id','desc');
        $this->db->where('international_booking_enquiry.is_deleted','no');
        $this->db->where('followup_status','no');
        // $this->db->where('agent.department',$region_id);
        $this->db->join("international_packages", 'international_booking_enquiry.package_id=international_packages.id','left');
        $this->db->join("agent", 'international_booking_enquiry.agent_id=agent.id','left');
        $arr_data = $this->master_model->getRecords('international_booking_enquiry',array('international_booking_enquiry.is_deleted'=>'no'),$fields);

        
        $this->arr_view_data['agent_inspector_sess_name'] = $agent_inspector_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('agent_inspector/layout/agent_inspector_combo',$this->arr_view_data);
       
	}
   
   
   
}