<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Birthday_and_anniversary extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('tour_manager_sess_id')=="") 
        { 
                redirect(base_url().'tour_manager/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/birthday_and_anniversary";
        $this->module_title       = "Birthday  And Anniversary Module";
        $this->module_url_slug    = "birthday_and_anniversary";
        $this->module_view_folder = "birthday_and_anniversary/";    
        $this->load->library('upload');
	}

	public function index()
	{ 
        $tour_manager_sess_name = $this->session->userdata('tour_manager_name');
        $id = $this->session->userdata('tour_manager_sess_id'); 

        $record = array();
        $fields = "asign_tour_manager.*,all_traveller_info.dob,all_traveller_info.anniversary_date,all_traveller_info.mobile_number,all_traveller_info.first_name,all_traveller_info.middle_name,all_traveller_info.last_name,all_traveller_info.age";
        $this->db->where('asign_tour_manager.is_deleted','no');
        $this->db->join("all_traveller_info", 'asign_tour_manager.package_id=all_traveller_info.package_id','left');
        $arr_data = $this->master_model->getRecords('asign_tour_manager',array('asign_tour_manager.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['tour_manager_sess_name']        = $tour_manager_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
	}
    
}