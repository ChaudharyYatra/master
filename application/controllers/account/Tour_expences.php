<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tour_expences extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('account_panel_slug')."account/tour_expences";
        $this->module_title       = "Tour Expences  ";
        $this->module_url_slug    = "tour_expences";
        $this->module_view_folder = "tour_expences/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');

        // print_r($arr_data); die;

        $fields = "tour_expenses.*,packages.tour_title,packages.tour_number,tour_manager.name";
        $this->db->where('tour_expenses.is_deleted','no');
        $this->db->where('tour_expenses.is_active','yes');
        $this->db->group_by('tour_number');
        $this->db->join("packages", 'tour_expenses.package_id=packages.id','left');
        $this->db->join("tour_manager", 'tour_expenses.tour_manager_id=tour_manager.id','left');
        $arr_data = $this->master_model->getRecords('tour_expenses',array('tour_expenses.is_deleted'=>'no'),$fields);


        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('account/layout/account_combo',$this->arr_view_data);
       
	}
	

    // Get Details of Package
    public function details($id)
    {

        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');

        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   
        
        $fields = "tour_expenses.*,packages.tour_title,packages.tour_number,tour_manager.name,expense_type.expense_type_name,expense_category.expense_category";
        $this->db->where('tour_expenses.is_deleted','no');
        $this->db->where('tour_expenses.is_active','yes');
        $this->db->where('tour_expenses.package_id',$id);
        $this->db->join("packages", 'tour_expenses.package_id=packages.id','left');
        $this->db->join("tour_manager", 'tour_expenses.tour_manager_id=tour_manager.id','left');
        $this->db->join("expense_type", 'tour_expenses.expense_type=expense_type.id','left');
        $this->db->join("expense_category", 'tour_expenses.expense_category_id=expense_category.id','left');
        $arr_data = $this->master_model->getRecords('tour_expenses',array('tour_expenses.is_deleted'=>'no'),$fields);
        

        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('account/layout/account_combo',$this->arr_view_data);
    }



   
   
}