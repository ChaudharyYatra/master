<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Asign_tour_manager extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('expences_checker_sess_id')=="") 
        { 
                redirect(base_url().'expences_checker/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('expences_checker_panel_slug')."expences_checker/asign_tour_manager";
        
        $this->module_url_path_tour_expenses    =  base_url().$this->config->item('expences_checker_panel_slug')."expences_checker/tour_expenses";
        
        $this->module_title       = "Asign Tour Managers";
        $this->module_url_slug    = "asign_tour_manager";
        $this->module_view_folder = "asign_tour_manager/";    
        $this->load->library('upload');
	}

	public function index()
	{

        $expences_checker_master_sess_name = $this->session->userdata('expences_checker_name');
        $id = $this->session->userdata('expences_checker_sess_id');

        $fields = "assign_expences_checker.*,supervision.supervision_name";
        $this->db->where('assign_expences_checker.is_deleted','no');
        $this->db->where('assign_expences_checker.expences_checker_name',$id);
        $this->db->join("supervision", 'assign_expences_checker.tour_manager_name=supervision.id','left');
        $arr_data = $this->master_model->getRecords('assign_expences_checker',array('assign_expences_checker.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;
        

        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('expences_checker/layout/expences_checker_combo',$this->arr_view_data);
       
	}

    public function assign_tours_to_tour_manager($id)
	{
        $id=base64_decode($id);

        $expences_checker_master_sess_name = $this->session->userdata('expences_checker_name');
        $iid = $this->session->userdata('expences_checker_sess_id');

        $fields = "assign_staff.*,packages.tour_number,packages.tour_title,packages.package_type,
        package_type.package_type,supervision.supervision_name,package_date.journey_date,package_date.id as did";
        $this->db->where('assign_staff.is_deleted','no');
        $this->db->where('assign_staff.name',$id);
        $this->db->join("packages", 'assign_staff.package_id=packages.id','left');
        $this->db->join("package_type", 'packages.package_type=package_type.id','left');
        $this->db->join("package_date", 'assign_staff.package_date_id=package_date.id','left');
        $this->db->join("supervision", 'assign_staff.role_name=supervision.id','left');
        $arr_data = $this->master_model->getRecords('assign_staff',array('assign_staff.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;
        

        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."assign_tours_to_tour_manager";
        $this->load->view('expences_checker/layout/expences_checker_combo',$this->arr_view_data);
       
	}
	
   
   
}