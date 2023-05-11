<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vehicle_type extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('custom_agent_sess_id')=="") 
        { 
                redirect(base_url().'custom_tour_agent/login'); 
        }
		// hasemployeepanelaccess();
		// Check User Permission
		//hasModuleAccess(6);//set same module id as in module_master table

	   
        // $this->user_id            =  $this->session->userdata('nabcons_id');
        // $this->name               =  $this->session->userdata('nabcons_username');
        // $this->ip                 =  $this->input->ip_address();
        $this->module_url_path    =  base_url().$this->config->item('custom_tour_agent_panel_slug')."custom_tour_agent/vehicle_type";
        $this->module_title       = "Vehicle Type";
        $this->module_url_slug    = "vehicle_type";
        $this->module_view_folder = "vehicle_type/";    
        // $this->load->library('upload');
	}

	public function index()
	{  
       
        $custom_agent_name = $this->session->userdata('custom_agent_name');
        $front_id = $this->session->userdata('custom_agent_sess_id');

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $arr_data = $this->master_model->getRecords('vehicle_type');

        $this->arr_view_data['custom_agent_name']       = $custom_agent_name;
        // $this->arr_view_data['front_id']        = $front_id;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('custom_tour_agent/layout/agent_combo',$this->arr_view_data);
	}
    
    public function add()
    {   

        $custom_agent_name = $this->session->userdata('custom_agent_name');
        $front_id = $this->session->userdata('custom_agent_sess_id');
       
        if($this->input->post('submit'))
        {
            
            $this->form_validation->set_rules('vehicle_type_name', 'vehicle_type_name', 'required');
            
            if($this->form_validation->run() == TRUE)
            {
                $vehicle_type_name = $this->input->post('vehicle_type_name'); 
                $arr_insert = array(
                    'vehicle_type_name'   =>   $vehicle_type_name,
                    'status'                  => 'approved'
                );
                
                $this->db->where('vehicle_type_name',$vehicle_type_name);
                $this->db->where('is_deleted','no');
                $vehicle_type_name_exist_data = $this->master_model->getRecords('vehicle_type');
                if(count($vehicle_type_name_exist_data) > 0)
                {
                    $this->session->set_flashdata('error_message',"Vehicle Type ".$vehicle_type_name." Already Exist.");
                    redirect($this->module_url_path.'/add');
                }
                
                $inserted_id = $this->master_model->insertRecord('vehicle_type',$arr_insert,true);
                               
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message',"Vehicle Type Added Successfully.");
                    redirect($this->module_url_path.'/index');
                }
                else
                {
                    $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/index');
            }   
        }

        //$img_id = $this->master_model->next_id("id", "nabcons_blogs");

        $this->arr_view_data['custom_agent_name']          = $custom_agent_name;

        $this->arr_view_data['action']          = 'add';
        //$this->arr_view_data['user_role']       = $user_role; 
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('custom_tour_agent/layout/agent_combo',$this->arr_view_data);
    }

   
  // Active/Inactive
  
  public function active_inactive($id,$type)
    {
	  $id=base64_decode($id);
        if($id!='' && ($type == "yes" || $type == "no") )
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('vehicle_type');
            if(empty($arr_data))
            {
               $this->session->set_flashdata('error_message','Invalid Selection Of Record');
               redirect($this->module_url_path.'/index');
            }   

            $arr_update =  array();

            if($type == 'yes')
            {
                $arr_update['is_active'] = "no";
                $arr_update['status'] = "rejected";
            }
            else
            {
                $arr_update['is_active'] = "yes";
                $arr_update['status'] = "approved";
            }
            
            if($this->master_model->updateRecord('vehicle_type',$arr_update,array('id' => $id)))
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
    
    public function delete($id)
    {
        $id=base64_decode($id);
        if($id!='')
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('vehicle_type');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('vehicle_type',$arr_update,$arr_where))
            {
                $this->session->set_flashdata('success_message',$this->module_title.' Deleted Successfully.');
            }
            else
            {
                $this->session->set_flashdata('error_message','Oops,Something Went Wrong While Deleting Record.');
            }
        }
        else
        {
           
               $this->session->set_flashdata('error_message','Invalid Selection Of Record');
        }
        redirect($this->module_url_path.'/index');  
    }
   
    // Edit - Get data for edit
    
    public function edit($id)
    {
        $custom_agent_name = $this->session->userdata('custom_agent_name');
        $front_id = $this->session->userdata('custom_agent_sess_id');

		$id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        else
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('vehicle_type');
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('vehicle_type_name', 'vehicle_type_name', 'required');
                
                if($this->form_validation->run() == TRUE)
                {
                   $vehicle_type_name = trim($this->input->post('vehicle_type_name'));
                   
                    $this->db->where('vehicle_type_name',$vehicle_type_name);
                    $this->db->where('id!='.$id);
                    $this->db->where('is_deleted','no');
                    $vehicle_type_name_exist_data = $this->master_model->getRecords('vehicle_type');
                    if(count($vehicle_type_name_exist_data) > 0)
                    {
                        $this->session->set_flashdata('error_message',"Vehicle Type ".$vehicle_type_name." Already Exist.");
                        redirect($this->module_url_path.'/add');
                    }
                    
                    
                    $arr_update = array(
                        'vehicle_type_name' => $vehicle_type_name
                    );
                    $arr_where     = array("id" => $id);
                   $this->master_model->updateRecord('vehicle_type',$arr_update,$arr_where);
                    if($id > 0)
                    {
                        $this->session->set_flashdata('success_message',$this->module_title." Information Updated Successfully.");
                    }
                    else
                    {
                        $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
                    }
                    redirect($this->module_url_path.'/index');
                }   
            }
        }
        $this->arr_view_data['custom_agent_name']        = $custom_agent_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('custom_tour_agent/layout/agent_combo',$this->arr_view_data);
    }
   
}