<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tm_request_more_fund extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('tour_manager_sess_id')=="") 
        { 
                redirect(base_url().'tour_manager/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/tm_request_more_fund";
        $this->module_title       = "Request to Tour Operation Manager and Account for More Fund";
        $this->module_url_slug    = "tm_request_more_fund";
        $this->module_view_folder = "tm_request_more_fund/";    
        $this->load->library('upload');
	}

	public function index()
	{ 
        $tour_manager_sess_name = $this->session->userdata('tour_manager_name');
        $id = $this->session->userdata('tour_manager_sess_id'); 

        $record = array();
        $fields = "tm_request_more_fund.*,packages.tour_title,packages.tour_number,package_type.package_type";
        $this->db->where('tm_request_more_fund.is_deleted','no');
        // $this->db->order_by('tm_request_more_fund.id','desc');
        $this->db->join("packages", 'tm_request_more_fund.tour_number=packages.id','left');
        $this->db->join("package_type", 'tm_request_more_fund.package_type=package_type.id','left');
        $arr_data = $this->master_model->getRecords('tm_request_more_fund',array('tm_request_more_fund.is_deleted'=>'no'),$fields);
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
        
    
    public function add($id,$did)
    {   
		$tour_manager_sess_name = $this->session->userdata('tour_manager_name');
        $iid = $this->session->userdata('tour_manager_sess_id'); 

        $id=base64_decode($id);
        $did=base64_decode($did);

        $record = array();
        $fields = "packages.*,package_date.journey_date,package_date.id as pd_id,package_type.package_type,
        packages.package_type as pack_id,packages.id as pid";
        $this->db->where('packages.is_deleted','no');
        // $this->db->order_by('packages.id','desc');
        $this->db->where('packages.id',$id);
        $this->db->where('package_date.id',$did);
        $this->db->join("package_date", 'packages.id=package_date.package_id','left');
        $this->db->join("package_type", 'packages.package_type=package_type.id','left');
        $packages_data = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
        // print_r($packages_data); die;


        if($this->input->post('submit'))
        {
                $package_type            = $this->input->post('package_type'); 
                $tour_number      = trim($this->input->post('tour_number'));
                $request_more_fund        = trim($this->input->post('request_more_fund'));
                $arr_insert = array(
                    'package_type'   =>   $package_type,
                    'tour_number'        => $tour_number,
                    'more_fund_amt'          => $request_more_fund,
                    'tour_manager_id'          => $iid,
                    'status'            => 'pending'
                );
                
                $inserted_id = $this->master_model->insertRecord('tm_request_more_fund',$arr_insert,true);
                               
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message',"Suggestion Record Added Successfully.");
                    redirect($this->module_url_path.'/index');
                }
                else
                {
                    $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/index');
            
        }

       
        // print_r($package_type); die;

        $this->arr_view_data['tour_manager_sess_name']          = $tour_manager_sess_name;
        $this->arr_view_data['packages_data']          = $packages_data;
        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
    }

   
    // Delete
    
    public function delete($id)
     {
        $tour_manager_sess_name = $this->session->userdata('tour_manager_name');
        $iid = $this->session->userdata('tour_manager_sess_id'); 
         
        $id=base64_decode($id);
         if(is_numeric($id))
         {   
             $this->db->where('id',$id);
             $arr_data = $this->master_model->getRecords('tm_request_more_fund');
 
             if(empty($arr_data))
             {
                 $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                 redirect($this->module_url_path);
             }
             $arr_update = array('is_deleted' => 'yes');
             $arr_where = array("id" => $id);
                  
             if($this->master_model->updateRecord('tm_request_more_fund',$arr_update,$arr_where))
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

    //  ===========================================

//   Active/Inactive
public function active_inactive($id,$type)
{
  $id=base64_decode($id);
    if($id!='' && ($type == "yes" || $type == "no") )
    {   
        $this->db->where('id',$id);
        $arr_data = $this->master_model->getRecords('tm_request_more_fund');
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
        
        if($this->master_model->updateRecord('tm_request_more_fund',$arr_update,array('id' => $id)))
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


    // ==================================================
   
    // Edit - Get data for edit
    
    public function edit($id)
    {
        $tour_manager_sess_name = $this->session->userdata('tour_manager_name');
        $iid = $this->session->userdata('tour_manager_sess_id'); 
        
		$id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   
        else
        {   
            // $this->db->where('id',$id);
            // $arr_data = $this->master_model->getRecords('suggestion_module');
            if($this->input->post('submit'))
            {
                $package_type            = $this->input->post('package_type'); 
                $tour_number      = trim($this->input->post('tour_number'));
                $request_more_fund        = trim($this->input->post('request_more_fund'));
                $arr_update = array(
                    'package_type'   =>   $package_type,
                    'tour_number'        => $tour_number,
                    'more_fund_amt'          => $request_more_fund
                );
                    $arr_where     = array("id" => $id);
                   $this->master_model->updateRecord('tm_request_more_fund',$arr_update,$arr_where);
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
        

        $record = array();
        $fields = "tm_request_more_fund.*,packages.tour_title,packages.tour_number,package_type.package_type,
        packages.package_type as pack_id,packages.id as pid";
        $this->db->where('tm_request_more_fund.is_deleted','no');
        $this->db->where('tm_request_more_fund.id',$id);
        $this->db->join("packages", 'tm_request_more_fund.tour_number=packages.id','left');
        $this->db->join("package_type", 'tm_request_more_fund.package_type=package_type.id','left');
        $arr_data = $this->master_model->getRecords('tm_request_more_fund',array('tm_request_more_fund.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;
        
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['tour_manager_sess_name']        = $tour_manager_sess_name;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
    }

    // public function get_package(){ 
    //     // POST data 
    //     // $all_b=array();
    //    $district_data = $this->input->post('did');
    //     // print_r($boarding_office_location); die;
    //                     $this->db->where('is_deleted','no');
    //                     $this->db->where('is_active','yes');
    //                     $this->db->where('package_type',$district_data);   
    //                     $data = $this->master_model->getRecords('packages');
    //     echo json_encode($data);
    // }

}