<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Instruction_module extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('tour_manager_sess_id')=="") 
        { 
                redirect(base_url().'tour_manager/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/instruction_module";
        $this->module_title       = "Instruction Module";
        $this->module_url_slug    = "instruction_module";
        $this->module_view_folder = "instruction_module/";    
        $this->load->library('upload');
	}

	public function index()
	{ 
        $tour_manager_sess_name = $this->session->userdata('tour_manager_name');
        $id = $this->session->userdata('tour_manager_sess_id'); 

        $fields = "packages.*,package_type.package_type,package_type.id as pid, packages.id as pack_id";
        $this->db->where('packages.is_deleted','no');
        $this->db->where('packages.is_active','yes');
        $this->db->where('packages.instraction_status','yes');
        // $this->db->OR_where('packages.cust_instraction_status','yes');
		$this->db->order_by('CAST(tour_number AS DECIMAL(10,6)) ASC');
        $this->db->join("package_type", 'packages.package_type=package_type.id','left');
        $arr_data = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
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
        
 
   
  // Active/Inactive
  
//   public function active_inactive($id,$type)
//     {
//         $tour_manager_sess_name = $this->session->userdata('tour_manager_name');
//         $iid = $this->session->userdata('tour_manager_sess_id'); 

// 	  	$id=base64_decode($id);
//         if($id!="" && ($type == "yes" || $type == "no") )
//         {   
//             $this->db->where('id',$id);
//             $arr_data = $this->master_model->getRecords('suggestion_module');
//             if(empty($arr_data))
//             {
//                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
//                redirect($this->module_url_path.'/index');
//             }   

//             $arr_update =  array();

//             if($type == 'yes')
//             {
//                 $arr_update['is_active'] = "no";
//             }
//             else
//             {
//                 $arr_update['is_active'] = "yes";
//             }
            
//             if($this->master_model->updateRecord('suggestion_module',$arr_update,array('id' => $id)))
//             {
//                 $this->session->set_flashdata('success_message',$this->module_title.' Updated Successfully.');
//             }
//             else
//             {
//              $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
//             }
//         }
//         else
//         {
//            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
//         }
//         redirect($this->module_url_path.'/index');   
//     }



    //============

    public function details($id)
    {
        $tour_manager_sess_name = $this->session->userdata('tour_manager_name');
        // $iid = $this->session->userdata('tour_manager_sess_id'); 

		// $id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   
        
        $record = array();
        $fields = "tm_instraction.*,tm_instraction_attachment.image_name";
        $this->db->where('tm_instraction.is_deleted','no');
        $this->db->where('tm_instraction.tour_no',$id);
        $this->db->join("tm_instraction_attachment", 'tm_instraction.tm_instraction_attachment_id=tm_instraction_attachment.id','left');
        $arr_data = $this->master_model->getRecords('tm_instraction',array('tm_instraction.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $record = array();
        $fields = "tm_instraction.*,tm_instraction_attachment.image_name";
        $this->db->where('tm_instraction.is_deleted','no');
        $this->db->where('tm_instraction.tour_no',$id);
        $this->db->group_by('tour_no');
        $this->db->join("tm_instraction_attachment", 'tm_instraction.tm_instraction_attachment_id=tm_instraction_attachment.id','left');
        $arr_data_top = $this->master_model->getRecords('tm_instraction',array('tm_instraction.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;
        
        
        $this->arr_view_data['tour_manager_sess_name']        = $tour_manager_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['arr_data_top']        = $arr_data_top;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
    }
   
}