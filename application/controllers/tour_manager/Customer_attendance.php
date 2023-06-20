<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customer_attendance extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('tour_manager_sess_id')=="") 
        { 
                redirect(base_url().'tour_manager/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/customer_attendance";
        $this->module_url_tour_photos    =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/tour_photos";
		// $this->module_url_path_iternary    =  base_url().$this->config->item('tour_manager_panel_slug')."/package_iternary";
		// $this->module_url_path_review    =  base_url().$this->config->item('tour_manager_panel_slug')."/domestic_package_review";
        $this->module_title       = "Customer Attendance";
        $this->module_url_slug    = "customer_attendance";
        $this->module_view_folder = "customer_attendance/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $tour_manager_sess_name = $this->session->userdata('tour_manager_name');
        $id = $this->session->userdata('tour_manager_sess_id'); 

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

        $this->arr_view_data['tour_manager_sess_name']        = $tour_manager_sess_name;
        $this->arr_view_data['module_url_tour_photos'] = $this->module_url_tour_photos;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
       
	}

    public function add($id,$did,$day_id)
    {   
        
        $tour_manager_sess_name = $this->session->userdata('tour_manager_name');
        $iid = $this->session->userdata('tour_manager_sess_id'); 

        $id=base64_decode($id);
        $did=base64_decode($did);
        $day_id=($day_id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        if($id!='')
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('packages');
            // print_r($arr_data); die;

        if($this->input->post('submit'))
        {
            
            // $this->form_validation->set_rules('m_attendance', 'm_attendance', 'required');
            // $this->form_validation->set_rules('e_attendance', 'e_attendance', 'required');
            
            // if($this->form_validation->run() == TRUE)
            // {
                // print_r($_REQUEST); die;
                $i=1;
                $m_attendance	  = $this->input->post('m_attendance'.$i); 
                $e_attendance	  = $this->input->post('e_attendance'.$i); 
                $traveller_id	  = $this->input->post('traveller_id');
                // echo $traveller_id=implode(',',$this->input->post('traveller_id')); die;
                // print_r($traveller_id); die;
                $c=count($traveller_id);
              
                for($j=0; $j<$c; $j++){
                $arr_insert = array(
                    'morning_attendance'   =>   $m_attendance,
                    'evening_attendance'   =>   $e_attendance,
                    'traveller_id	'   =>   $traveller_id[$j],
                    'package_id	'   =>   $id,
                    'tour_manager_id'   =>   $iid,
                    'package_date_id'   =>   $did,
                    'day_id'   =>   $day_id

                );
            }
                $i++;
                // print_r($arr_insert); die;
                $inserted_id = $this->master_model->insertRecord('traveller_attendance',$arr_insert,true);
            

                if($inserted_id > 0)
                {
                    $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                    redirect($this->module_url_path.'/add');
                }

                else
                {
                    $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/index');
            
            // }
       
        }
     }
     else
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }

        $fields = "asign_tour_manager.*,packages.tour_number,packages.tour_number_of_days,packages.tour_title,packages.tour_number,packages.tour_title,package_date.journey_date";
        $this->db->where('asign_tour_manager.is_deleted','no');
        $this->db->where('asign_tour_manager.package_id',$id);
        $this->db->where('asign_tour_manager.package_date_id',$did);
        $this->db->join("packages", 'asign_tour_manager.package_id=packages.id','left');
        $this->db->join("package_date", 'asign_tour_manager.package_date_id=package_date.id','left');
        $tour_arr_data = $this->master_model->getRecords('asign_tour_manager',array('asign_tour_manager.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $fields = "all_traveller_info.*";
        $this->db->where('all_traveller_info.is_deleted','no');
        $this->db->where('booking_basic_info.tour_date',$did);
        $this->db->join("booking_basic_info", 'all_traveller_info.domestic_enquiry_id=booking_basic_info.domestic_enquiry_id','left');
        $arr_data = $this->master_model->getRecords('all_traveller_info',array('all_traveller_info.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['tour_manager_sess_name'] = $tour_manager_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['tour_arr_data']        = $tour_arr_data;
        $this->arr_view_data['page_title']      = "Traveller Attendance";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
    }
	
  
    // Get Details of Package
    public function take_attendance($id,$did)
    {
        $tour_manager_sess_name = $this->session->userdata('tour_manager_name');
        $iid = $this->session->userdata('tour_manager_sess_id'); 

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

        $this->arr_view_data['tour_manager_sess_name']        = $tour_manager_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['tour_arr_data']        = $tour_arr_data;
        $this->arr_view_data['page_title']      = $this->module_title."";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."take_attendance";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
    }
   
   
}