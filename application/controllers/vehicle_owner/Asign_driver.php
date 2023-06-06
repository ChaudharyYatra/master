<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Asign_driver extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('vehicle_owner_sess_id')=="") 
        { 
                redirect(base_url().'vehicle_owner/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('vehicle_owner_panel_slug')."vehicle_owner/asign_driver";
        $this->module_url_path_dates    =  base_url().$this->config->item('vehicle_owner_panel_slug')."/package_dates";
		$this->module_url_path_iternary    =  base_url().$this->config->item('vehicle_owner_panel_slug')."/package_iternary";
		$this->module_url_path_review    =  base_url().$this->config->item('vehicle_owner_panel_slug')."/domestic_package_review";
        $this->module_title       = "Asign Driver";
        $this->module_url_slug    = "asign_driver";
        $this->module_view_folder = "asign_driver/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $vehicle_ssession_owner_name = $this->session->userdata('vehicle_ssession_owner_name');
        $id = $this->session->userdata('vehicle_owner_sess_id');

        $fields = "asigned_driver.*,vehicle_driver.driver_name,vehicle_details.registration_number";
        // $this->db->order_by('id','ASC');
        $this->db->where('asigned_driver.is_deleted','no');
        $this->db->join("vehicle_driver", 'asigned_driver.asign_driver_name=vehicle_driver.id','left');
        $this->db->join("vehicle_details", 'asigned_driver.RTO_registration=vehicle_details.id','left');
        $asigned_driver = $this->master_model->getRecords('asigned_driver',array('asigned_driver.is_deleted'=>'no'),$fields);
        // print_r($asigned_driver); die;

        
        $this->arr_view_data['vehicle_ssession_owner_name']= $vehicle_ssession_owner_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['asigned_driver']        = $asigned_driver;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_url_path_dates'] = $this->module_url_path_dates;
		$this->arr_view_data['module_url_path_iternary'] = $this->module_url_path_iternary;
		$this->arr_view_data['module_url_path_review'] = $this->module_url_path_review;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('vehicle_owner/layout/vehicle_owner_combo',$this->arr_view_data);
       
	}
	
	
    public function add()
    {   
        $vehicle_ssession_owner_name = $this->session->userdata('vehicle_ssession_owner_name');
        $id = $this->session->userdata('vehicle_owner_sess_id');

        if($this->input->post('submit'))
        {
            $this->form_validation->set_rules('vehicle_rto_registration', 'vehicle_rto_registration', 'required');
            $this->form_validation->set_rules('asign_driver_name[]', 'asign_driver_name', 'required');
            
            if($this->form_validation->run() == TRUE)
            {
                $RTO_registration  = $this->input->post('vehicle_rto_registration'); 
                $asign_driver_name = $this->input->post('asign_driver_name'); 
                $asign_driver = count($asign_driver_name);
                // print_r($asign_driver); die;
                $i=0;
                for($i=0; $i<$asign_driver; $i++){
                $arr_insert = array(
                    'RTO_registration'   =>   $RTO_registration,
                    'asign_driver_name'  => $asign_driver_name[$i]
                    
                );
                $inserted_id = $this->master_model->insertRecord('asigned_driver',$arr_insert,true);
                } 
                // die;             
                if($inserted_id > 0)
                {
                    $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                    redirect($this->module_url_path.'/index');
                }
                else
                {
                    $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/index');
        }
        }
        $this->db->order_by('id','ASC');
        $this->db->where('is_deleted','no');
        $this->db->where('status','approved');
        $vehicle_details = $this->master_model->getRecords('vehicle_details');
        // print_r($vehicle_details); die;

        $this->db->order_by('id','ASC');
        $this->db->where('is_deleted','no');
        $this->db->where('status','approved');
        $vehicle_driver = $this->master_model->getRecords('vehicle_driver');
        // print_r($vehicle_driver); die;
        
        $this->arr_view_data['vehicle_ssession_owner_name'] = $vehicle_ssession_owner_name;
        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['vehicle_details'] = $vehicle_details;
        $this->arr_view_data['vehicle_driver'] = $vehicle_driver;
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('vehicle_owner/layout/vehicle_owner_combo',$this->arr_view_data);
    }

  // Active/Inactive
  public function active_inactive($id,$type)
    {
	  	$id=base64_decode($id);
        if($id!="" && ($type == "yes" || $type == "no") )
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('asigned_driver');
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
            
            if($this->master_model->updateRecord('asigned_driver',$arr_update,array('id' => $id)))
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
            $arr_data = $this->master_model->getRecords('asigned_driver');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('asigned_driver',$arr_update,$arr_where))
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
        $vehicle_ssession_owner_name = $this->session->userdata('vehicle_ssession_owner_name');
        $iid = $this->session->userdata('vehicle_owner_sess_id');

		$id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   
        else
        {   
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('vehicle_rto_registration', 'vehicle_rto_registration', 'required');
                $this->form_validation->set_rules('asign_driver_name[]', 'driver_name', 'required');
                
                if($this->form_validation->run() == TRUE)
                {
                $RTO_registration  = $this->input->post('vehicle_rto_registration'); 
                $asign_driver_name = implode(",", $this->input->post('asign_driver_name')); 

                $arr_update = array(
                    'RTO_registration'   =>   $RTO_registration,
                    'asign_driver_name'  => $asign_driver_name
                );
                
                    $arr_where     = array("id" => $id);
                    $this->master_model->updateRecord('asigned_driver',$arr_update,$arr_where);
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
        

        $this->db->order_by('id','ASC');
        $this->db->where('is_deleted','no');
        $this->db->where('status','approved');
        $vehicle_details = $this->master_model->getRecords('vehicle_details');
        // print_r($vehicle_details); die;

        $this->db->order_by('id','ASC');
        $this->db->where('is_deleted','no');
        $this->db->where('status','approved');
        $vehicle_driver = $this->master_model->getRecords('vehicle_driver');
        // print_r($vehicle_driver); die;

        $fields = "asigned_driver.*,vehicle_driver.driver_name,vehicle_details.registration_number";
        $this->db->order_by('id','ASC');
        $this->db->where('asigned_driver.is_deleted','no');
        $this->db->where('asigned_driver.id',$id);
        $this->db->join("vehicle_driver", 'asigned_driver.asign_driver_name=vehicle_driver.id','left');
        $this->db->join("vehicle_details", 'asigned_driver.RTO_registration=vehicle_details.id','left');
        $asigned_driver = $this->master_model->getRecords('asigned_driver',array('asigned_driver.is_deleted'=>'no'),$fields);
        // print_r($asigned_driver); die;

        $this->arr_view_data['vehicle_ssession_owner_name']        = $vehicle_ssession_owner_name;
        $this->arr_view_data['vehicle_details']        = $vehicle_details;
        $this->arr_view_data['vehicle_driver']        = $vehicle_driver;
        $this->arr_view_data['asigned_driver']        = $asigned_driver;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('vehicle_owner/layout/vehicle_owner_combo',$this->arr_view_data);
    }

    // Get Details of Package
    public function details($id)
    {
        $vehicle_ssession_owner_name = $this->session->userdatas('vehicle_ssession_owner_name');
        $iid = $this->session->userdata('vehicle_owner_sess_id');

		$id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   
        
        $this->db->order_by('id','ASC');
        $this->db->where('is_deleted','no');
        $this->db->where('id',$id);
        $arr_data = $this->master_model->getRecords('vehicle_driver');
        
        $this->arr_view_data['vehicle_ssession_owner_name']        = $vehicle_ssession_owner_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('vehicle_owner/layout/vehicle_owner_combo',$this->arr_view_data);
    }
   
   
}