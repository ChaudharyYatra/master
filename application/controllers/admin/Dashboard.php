<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/dashboard";
        $this->module_title       = "Dashboard";
        $this->module_url_slug    = "dashboard";
        $this->module_view_folder = "dashboard/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $admin_name = $this->session->userdata('name');
        $chy_admin_id = $this->session->userdata('chy_admin_id');

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $agent_data = $this->master_model->getRecords('agent');
        $arr_data['agent_count'] = count($agent_data);
        
        $this->db->where('is_deleted','no');
        $enquiry_data = $this->master_model->getRecords('enquiries');
        $arr_data['enquiry_count'] = count($enquiry_data);
        
        $record = array();
        $fields = "packages.*,package_type.package_type";
        $this->db->where('packages.is_deleted','no');
        $this->db->where('package_type.package_type','Domestic Packages');
        $this->db->join("package_type",'packages.package_type=package_type.id','left');
        $package_data = $this->master_model->getRecords('packages');
        $arr_data['package_count'] = count($package_data);
        // print_r($package_data); die;
        
        $this->db->where('is_deleted','no');
        $reviews_data = $this->master_model->getRecords('client_reviews');
        $arr_data['reviews_count'] = count($reviews_data);
	
        $record = array();
        $fields = "packages.*,package_type.package_type";
        $this->db->where('packages.is_deleted','no');
        $this->db->where('package_type.package_type','International Packages');
        $this->db->join("package_type",'packages.package_type=package_type.id','left');
        $international_packages = $this->master_model->getRecords('packages');
        $arr_data['international_count'] = count($international_packages);
        // print_r($international_packages); die;

	$record = array();
        $fields = "packages.*,package_type.package_type";
        $this->db->where('packages.is_deleted','no');
        $this->db->where('package_type.package_type','Custom Domestic Package');
        $this->db->join("package_type",'packages.package_type=package_type.id','left');
        $custom_domestic_packages = $this->master_model->getRecords('packages');
        $arr_data['custom_domestic_packages_count'] = count($custom_domestic_packages);
        // print_r($custom_domestic_packages); die;

        $record = array();
        $fields = "packages.*,package_type.package_type";
        $this->db->where('packages.is_deleted','no');
        $this->db->where('package_type.package_type','Custom International Package');
        $this->db->join("package_type",'packages.package_type=package_type.id','left');
        $custom_inter_packages = $this->master_model->getRecords('packages');
        $arr_data['custom_inter_packages_count'] = count($custom_inter_packages);
        // print_r($custom_inter_packages); die;

        $this->db->where('is_deleted','no');
        $bus_open = $this->master_model->getRecords('bus_open');
        $arr_data['bus_open_count'] = count($bus_open);
        // print_r($arr_data['bus_open_count']); die;

        $this->db->where('is_deleted','no');
        $final_booking = $this->master_model->getRecords('final_booking');
        $arr_data['final_booking_count'] = count($final_booking);
        // print_r($final_booking); die;

        $this->db->where('is_deleted','no');
        $vehicle_owner = $this->master_model->getRecords('vehicle_owner');
        $arr_data['vehicle_owner_count'] = count($vehicle_owner);
        // print_r($vehicle_owner); die;

        $this->db->where('is_deleted','no');
        $vehicle_data = $this->master_model->getRecords('vehicle_details');
        $arr_data['vehicle_data_count'] = count($vehicle_data);
        // print_r($vehicle_owner); die;

        $this->db->where('is_deleted','no');
        $vehicle_driver = $this->master_model->getRecords('vehicle_driver');
        $arr_data['vehicle_driver_count'] = count($vehicle_driver);
        // print_r($vehicle_driver); die;

        $this->db->where('is_deleted','no');
        $package_mapping = $this->master_model->getRecords('package_mapping');
        $arr_data['package_mapping_count'] = count($package_mapping);
        // print_r($arr_data['package_mapping_count']); die;

        $this->db->where('is_deleted','no');
        $booking_enquiry = $this->master_model->getRecords('booking_enquiry');
        $booking_enquiry_count = count($booking_enquiry);

        $today= date('Y-m-d');
        $this->db->where('is_deleted','no');
        $this->db->where('created_at',$today);  
        $todays_new_domestic_enquiry = $this->master_model->getRecords('booking_enquiry');
                // print_r($todays_new_domestic_enquiry); die;
        $arr_data['todays_new_domestic_enquiry_count'] = count($todays_new_domestic_enquiry);
        // print_r($arr_data['todays_new_domestic_enquiry_count']); die;

        // $this->db->where('is_deleted','no');
        // $international_booking_enquiry = $this->master_model->getRecords('international_booking_enquiry');
        // $internatinal_booking_enquiry_count = count($international_booking_enquiry);

        // $total_enquiry_count = $booking_enquiry_count + $internatinal_booking_enquiry_count;
        // $this->arr_view_data['total_enquiry_count']  = $total_enquiry_count;

        $this->db->where('is_deleted','no');
        $total_booking_enquiry = $this->master_model->getRecords('packages');
        $arr_data['total_enquiry_count'] = count($total_booking_enquiry);

        // $this->db->where('is_deleted','no');
        // $total_international_enquiry = $this->master_model->getRecords('international_packages');
        // $total_international_enquiry_count = count($total_international_enquiry);

        
        // $total_packages_count = $total_booking_enquiry_count + $total_international_enquiry_count;
        // $arr_data['total_enquiry_count']  = $total_packages_count;
        
        $fields = "sum(visiter_count) as vcount";
        $arr_data1 = $this->master_model->getRecord('visiter_data',array('visiter_data.is_deleted'=>'yes'),$fields);
        $visiter_c = $arr_data1['vcount'];
		
        $this->arr_view_data['admin_name']        = $admin_name;
        $this->arr_view_data['chy_admin_id']        = $chy_admin_id;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['visiter_c']        = $visiter_c;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
	} 
   
}