<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Daily_attendance extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/daily_attendance";
        $this->module_url_customer_attendance    =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/customer_attendance";
		// $this->module_url_path_iternary    =  base_url().$this->config->item('tour_manager_panel_slug')."/package_iternary";
		// $this->module_url_path_review    =  base_url().$this->config->item('tour_manager_panel_slug')."/domestic_package_review";
        $this->module_title       = "Daily Attendance";
        $this->module_url_slug    = "daily_attendance";
        $this->module_view_folder = "daily_attendance/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');

        $fields = "asign_tour_manager.*,packages.tour_number,packages.tour_title,packages.package_type,
        package_type.package_type,tour_manager.name,package_date.journey_date,package_date.id as did";
        $this->db->where('asign_tour_manager.is_deleted','no');
        $this->db->where('asign_tour_manager.tour_manager_id',$id);
        $this->db->join("packages", 'asign_tour_manager.package_id=packages.id','left');
        $this->db->join("package_type", 'packages.package_type=package_type.id','left');
        $this->db->join("package_date", 'asign_tour_manager.package_date_id=package_date.id','left');
        $this->db->join("tour_manager", 'asign_tour_manager.tour_manager_id=tour_manager.id','left');
        $arr_data = $this->master_model->getRecords('asign_tour_manager',array('asign_tour_manager.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['module_url_tour_photos'] = $this->module_url_tour_photos;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_url_customer_attendance'] = $this->module_url_customer_attendance;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
       
	}
	
  
    // Get Details of Package
    public function take_attendance($id,$did)
    {
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');

		$id=base64_decode($id);
        $did=base64_decode($did);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   


        $fields = "asign_tour_manager.*,packages.tour_number,packages.tour_number_of_days,packages.tour_title";
        $this->db->where('asign_tour_manager.is_deleted','no');
        $this->db->where('asign_tour_manager.package_id',$id);
        $this->db->where('asign_tour_manager.package_date_id',$did);
        $this->db->join("packages", 'asign_tour_manager.package_id=packages.id','left');
        $arr_data = $this->master_model->getRecords('asign_tour_manager',array('asign_tour_manager.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $fields = "asign_tour_manager.*,packages.tour_number,packages.tour_number_of_days,packages.tour_title,packages.tour_number,packages.tour_title,package_date.journey_date";
        $this->db->where('asign_tour_manager.is_deleted','no');
        $this->db->where('asign_tour_manager.package_id',$id);
        $this->db->where('asign_tour_manager.package_date_id',$did);
        $this->db->join("packages", 'asign_tour_manager.package_id=packages.id','left');
        $this->db->join("package_date", 'asign_tour_manager.package_date_id=package_date.id','left');
        $tour_arr_data = $this->master_model->getRecords('asign_tour_manager',array('asign_tour_manager.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['tour_arr_data']        = $tour_arr_data;
        $this->arr_view_data['page_title']      = $this->module_title."";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_customer_attendance'] = $this->module_url_customer_attendance;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."take_attendance";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
    }
   
   
}