<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Asign_tour_to_manager extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('tour_manager_sess_id')=="") 
        { 
                redirect(base_url().'tour_manager/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/asign_tour_to_manager";
        $this->module_url_tour_photos    =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/tour_photos";
		// $this->module_url_path_iternary    =  base_url().$this->config->item('tour_manager_panel_slug')."/package_iternary";
		// $this->module_url_path_review    =  base_url().$this->config->item('tour_manager_panel_slug')."/domestic_package_review";
        $this->module_title       = "Asign Tour";
        $this->module_url_slug    = "asign_tour_to_manager";
        $this->module_view_folder = "asign_tour_to_manager/";    
        $this->load->library('upload');
	}

	public function index()
	{

        $tour_manager_sess_name = $this->session->userdata('tour_manager_name');
        $id = $this->session->userdata('tour_manager_sess_id'); 

        $fields = "asign_tour_manager.*,packages.tour_number,packages.tour_title,packages.package_type,package_type.package_type,package_date.journey_date,tour_manager.name";
        $this->db->where('asign_tour_manager.is_deleted','no');
        // $this->db->where('asign_tour_manager.is_active','yes');
        $this->db->where('tour_manager.id',$id);
		// $this->db->order_by('CAST(tour_number AS DECIMAL(10,6)) ASC');
        $this->db->join("packages", 'asign_tour_manager.package_id=packages.id','left');
        $this->db->join("package_type", 'packages.package_type=package_type.id','left');
        $this->db->join("package_date", 'packages.id=package_date.package_id','left');
        $this->db->join("tour_manager", 'asign_tour_manager.tour_manager_id=tour_manager.id','left');
        $arr_data = $this->master_model->getRecords('asign_tour_manager',array('asign_tour_manager.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->arr_view_data['tour_manager_sess_name']        = $tour_manager_sess_name;
        $this->arr_view_data['module_url_tour_photos'] = $this->module_url_tour_photos;
		// $this->arr_view_data['module_url_path_iternary'] = $this->module_url_path_iternary;
		// $this->arr_view_data['module_url_path_review'] = $this->module_url_path_review;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
       
	}
	
  // Active/Inactive
  public function active_inactive($id,$type)
    {
	  	$id=base64_decode($id);
        if($id!="" && ($type == "yes" || $type == "no") )
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('asign_tour_manager');
            if(empty($arr_data))
            {
               $this->session->set_flashdata('error_message','Invalid Selection Of Record');
               redirect($this->module_url_path.'/index');
            }   

            $arr_update =  array();

            if($type == 'yes')
            {
                $arr_update['is_active'] = "no";
            }
            else
            {
                $arr_update['is_active'] = "yes";
            }
            
            if($this->master_model->updateRecord('asign_tour_manager',$arr_update,array('id' => $id)))
            {
                $this->session->set_flashdata('success_message',$this->module_title.' Updated Successfully.');
            }
            else
            {
             $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
            }
        }
        else
        {
           $this->session->set_flashdata('error_message','Invalid Selection Of Record');
        }
        redirect($this->module_url_path.'/index');   
    }
  
    // Delete
    
    // public function delete($id)
    // {
    //     $id=base64_decode($id);
    //     if($id!='')
    //     {   
    //         $this->db->where('id',$id);
    //         $arr_data = $this->master_model->getRecords('packages');

    //         if(empty($arr_data))
    //         {
    //             $this->session->set_flashdata('error_message','Invalid Selection Of Record');
    //             redirect($this->module_url_path);
    //         }
    //         $arr_update = array('is_deleted' => 'yes');
    //         $arr_where = array("id" => $id);
                 
    //         if($this->master_model->updateRecord('packages',$arr_update,$arr_where))
    //         {
    //             $this->session->set_flashdata('success_message',$this->module_title.' Deleted Successfully.');
    //         }
    //         else
    //         {
    //             $this->session->set_flashdata('error_message','Oops,Something Went Wrong While Deleting Record.');
    //         }
    //     }
    //     else
    //     {
           
    //            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
    //     }
    //     redirect($this->module_url_path.'/index');  
    // }
   
    // Get Details of Package
    public function iternary_details($id)
    {
        $tour_manager_sess_name = $this->session->userdata('tour_manager_name');
        $iid = $this->session->userdata('tour_manager_sess_id'); 

		$id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   
        
        $fields = "asign_tour_manager.*,packages.tour_number,packages.tour_title,package_date.journey_date";
        $this->db->where('asign_tour_manager.is_deleted','no');
        // $this->db->where('asign_tour_manager.is_active','yes');
        $this->db->where('asign_tour_manager.id',$id);
        $this->db->join("packages", 'asign_tour_manager.package_id=packages.id','left');
        $this->db->join("package_date", 'packages.id=package_date.package_id','left');
        $package_data = $this->master_model->getRecords('asign_tour_manager',array('asign_tour_manager.is_deleted'=>'no'),$fields);
        // print_r($package_data); die;

        $fields = "asign_tour_manager.*,packages.tour_number,packages.tour_title,package_iternary.day_number,package_iternary.iternary_desc";
        $this->db->where('asign_tour_manager.is_deleted','no');
        // $this->db->where('asign_tour_manager.is_active','yes');
        $this->db->where('asign_tour_manager.id',$id);
        $this->db->join("packages", 'asign_tour_manager.package_id=packages.id','left');
        $this->db->join("package_iternary", 'packages.id=package_iternary.package_id','left');
        $arr_data = $this->master_model->getRecords('asign_tour_manager',array('asign_tour_manager.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->arr_view_data['tour_manager_sess_name']        = $tour_manager_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['package_data']        = $package_data;
        $this->arr_view_data['page_title']      = $this->module_title." Iternary Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."iternary_details";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
    }
   
   
}