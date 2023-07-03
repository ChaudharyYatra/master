<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Asign_tour_to_manager extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/asign_tour_to_manager";
        $this->module_url_path_instruction    =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/instruction_module";
        $this->module_url_tour_photos    =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/tour_photos";
		$this->module_url_path_tour_expenses    =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/tour_expenses";
		$this->module_url_path_request_more_fund   =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/tm_request_more_fund";
		$this->module_url_path_customer_feedback   =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/customer_feedback";
        $this->module_title       = "Asign Tour";
        $this->module_url_slug    = "asign_tour_to_manager";
        $this->module_view_folder = "asign_tour_to_manager/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');

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
        

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['module_url_tour_photos'] = $this->module_url_tour_photos;
        $this->arr_view_data['module_url_path_customer_feedback'] = $this->module_url_path_customer_feedback;
        $this->arr_view_data['module_url_path_instruction'] = $this->module_url_path_instruction;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_url_path_tour_expenses'] = $this->module_url_path_tour_expenses;
        $this->arr_view_data['module_url_path_request_more_fund'] = $this->module_url_path_request_more_fund;
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
  
   
    // Get Details of Package
    public function iternary_details($id,$did)
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

        // $this->db->where('is_deleted','no');
        // $this->db->where('package_date.id',$id);
        // $packages_data = $this->master_model->getRecords('package_date');
        
        $fields = "assign_staff.*,packages.tour_number,packages.tour_title,package_date.journey_date,package_date.id";
        $this->db->where('assign_staff.is_deleted','no');
        // $this->db->where('asign_tour_manager.is_active','yes');
        $this->db->where('assign_staff.id',$id);
        $this->db->where('package_date.id',$did);
        $this->db->join("packages", 'assign_staff.package_id=packages.id','left');
        $this->db->join("package_date", 'packages.id=package_date.package_id','left');
        $package_data = $this->master_model->getRecords('assign_staff',array('assign_staff.is_deleted'=>'no'),$fields);
        // print_r($package_data); die;

        $fields = "assign_staff.*,packages.tour_number,packages.tour_title,package_iternary.day_number,package_iternary.iternary_desc,package_iternary.image_name";
        $this->db->where('assign_staff.is_deleted','no');
        $this->db->where('package_iternary.is_active','yes');
        $this->db->where('assign_staff.id',$id);
        $this->db->join("packages", 'assign_staff.package_id=packages.id','left');
        $this->db->join("package_iternary", 'packages.id=package_iternary.package_id','left');
        $arr_data = $this->master_model->getRecords('assign_staff',array('assign_staff.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['package_data']        = $package_data;
        $this->arr_view_data['page_title']      = $this->module_title." Iternary Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."iternary_details";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
    }

    public function allocate_room($id,$did)
    {          
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $iid = $this->session->userdata('supervision_sess_id');


        $arr_data = $this->master_model->getRecords('hotel_room');
       //   print_r($arr_data); die;

       $hotel_allocated_room_data = $this->master_model->getRecords('hotel_allocated_room');


        if(isset($_POST['submit']))
        {
            // $this->form_validation->set_rules('one_bed_AC[]', 'one_bed_AC', 'required');

            
                if(!empty($this->input->post('one_bed_AC'))){
                $one_bed_AC  = implode(',',$this->input->post('one_bed_AC')); 
                }else {
                    $one_bed_AC  ='';
                }
                
                if(!empty($this->input->post('two_bed_AC'))){
                $two_bed_AC  = implode(',',$this->input->post('two_bed_AC'));
                }else {
                    $two_bed_AC  ='';
                }

                if(!empty($this->input->post('three_bed_AC'))){
                $three_bed_AC  = implode(',',$this->input->post('three_bed_AC')); 
                }else {
                    $three_bed_AC  ='';
                }

                if(!empty($this->input->post('four_bed_AC'))){
                $four_bed_AC  = implode(',',$this->input->post('four_bed_AC')); 
                }else {
                    $four_bed_AC  ='';
                }

                if(!empty($this->input->post('one_bed_Non_AC'))){
                $one_bed_Non_AC  = implode(',',$this->input->post('one_bed_Non_AC')); 
                }else {
                    $one_bed_Non_AC  ='';
                }

                if(!empty($this->input->post('two_bed_Non_AC'))){
                $two_bed_Non_AC  = implode(',',$this->input->post('two_bed_Non_AC')); 
                }else {
                    $two_bed_Non_AC  ='';
                }

                if(!empty($this->input->post('three_bed_Non_AC'))){
                $three_bed_Non_AC  = implode(',',$this->input->post('three_bed_Non_AC')); 
                }else {
                    $three_bed_Non_AC  ='';
                }

                if(!empty($this->input->post('four_bed_Non_AC'))){
                $four_bed_Non_AC  = implode(',',$this->input->post('four_bed_Non_AC')); 
                }else {
                    $four_bed_Non_AC  ='';
                }


                $arr_insert = array(
                    'hotel_name_id' => $iid,
                    'package_date_id' => $did,
                    'package_id' => $id,
                    'one_bed_AC'   =>   $one_bed_AC,
                    'two_bed_AC'   =>   $two_bed_AC,
                    'three_bed_AC'   =>   $three_bed_AC,
                    'four_bed_AC'   =>   $four_bed_AC,

                    'one_bed_Non_AC'   =>   $one_bed_Non_AC,
                    'two_bed_Non_AC'   =>   $two_bed_Non_AC,
                    'three_bed_Non_AC'   =>   $three_bed_Non_AC,
                    'four_bed_Non_AC'   =>   $four_bed_Non_AC
                );
                
                // $inserted_id = $this->master_model->insertRecord('hotel_allocated_room',$arr_insert,true);

                if(!empty($hotel_allocated_room_data)){
                    $arr_where     = array("package_date_id" => $did);
                    $arr_where_pid     = array("package_id" => $id);
                    $inserted_id = $this->master_model->updateRecord('hotel_allocated_room',$arr_insert,$arr_where,$arr_where_pid);  
                    
                }else{
                        $inserted_id = $this->master_model->insertRecord('hotel_allocated_room',$arr_insert,true);
                    }
                    
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


        $hotel_allocated_room_data = $this->master_model->getRecords('hotel_allocated_room');

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['hotel_allocated_room_data'] = $hotel_allocated_room_data;
        $this->arr_view_data['action']          = 'add';       
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."allocate_room";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
    }

   
   
}