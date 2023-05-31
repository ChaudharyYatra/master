<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('tour_manager_sess_id')=="") 
        { 
                redirect(base_url().'tour_manager/login'); 
        }
		// hasemployeepanelaccess();
		// Check User Permission
		//hasModuleAccess(6);//set same module id as in module_master table


        $this->module_url_path    =  base_url().$this->config->item('tour_manager_panel_slug')."/dashboard";
        $this->module_url_path_followup_list    =  base_url().$this->config->item('tour_manager_panel_slug')."/todays_domestic_followup_list";
        $this->module_url_path_inter_followup_list    =  base_url().$this->config->item('tour_manager_panel_slug')."/todays_international_followup_list";
        $this->module_title       = "Dashboard";
        $this->module_url_slug    = "dashboard";
        $this->module_view_folder = "dashboard/";
	}

	public function index()
	{

        // $today= date('Y-m-d');

	      $tour_manager_sess_name = $this->session->userdata('tour_manager_name');
        $id = $this->session->userdata('tour_manager_sess_id');

        // $this->db->where('agent_id',$id);  
        // $this->db->where('is_deleted','no'); 
        // // $this->db->where('created_at',$today);  
        // $enquiry_data = $this->master_model->getRecords('booking_enquiry');
        // $arr_data['enquiry_count_total'] = count($enquiry_data);
        // // print_r($enquiry_data); die;

        // $this->db->where('agent_id',$id);  
        // $this->db->where('is_deleted','no'); 
        // $international_enquiry_data = $this->master_model->getRecords('international_booking_enquiry');
        // $arr_data['international_enquiry_data_total'] = count($international_enquiry_data);
        // // echo $today;
        // // die;
        
        // $this->db->where('agent_id',$id);  
        // $this->db->where('created_at',$today);  
        // $enquiry_data_today = $this->master_model->getRecords('booking_enquiry');
        // $arr_data['todays_enquiry_count'] = count($enquiry_data_today);

        // $this->db->where('agent_id',$id);  
        // $this->db->where('created_at',$today);
        // $international_enquiry_data_today = $this->master_model->getRecords('international_booking_enquiry');
        // $arr_data['internatinal_enquiry_count'] = count($international_enquiry_data_today);

        // $this->db->where('agent_id',$id);  
        // $this->db->where('not_interested','no');  
        // $Domestic_not_interested_cust = $this->master_model->getRecords('booking_enquiry');
        // $arr_data['Domestic_not_interested_cust_count'] = count($Domestic_not_interested_cust);
        // print_r($arr_data['Domestic_not_interested_cust_count']); die;
        
        
        // $arr_data['total_enquiry_count'] = $enquiry_count + $internatinal_enquiry_count;
        // print_r($total_enquiry_count); die;
        // $arr_data['enquiry_count'] = count($enquiry_data);
        
        $this->arr_view_data['tour_manager_sess_name']        = $tour_manager_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        // $this->arr_view_data['arr_data']        = $arr_data;
      //  $this->arr_view_data['total_enquiry_count']  = $total_enquiry_count;
        //$this->arr_view_data['enquiry_count']  = $enquiry_count;
       // $this->arr_view_data['enquiry_count_total']  = $enquiry_count_total;
        //$this->arr_view_data['internatinal_enquiry_count']  = $internatinal_enquiry_count;
        //$this->arr_view_data['international_enquiry_data_total']  = $international_enquiry_data_total;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
       
	}

  //  ============================tour manager bell icone todays birthday ==================================
    function birthdate_enquiry_view()  
      {  
          $tour_manager_sess_name = $this->session->userdata('tour_manager_name');
          $iid = $this->session->userdata('tour_manager_sess_id'); 

          $today= date('Y-m-d');
          $this->db->where('dob',$today);
          $arr_where     = array("tour_manager_id" => $iid);
          $arr_update = array("is_view"=>'yes');
          $this->master_model->updateRecord('all_traveller_info',$arr_update,$arr_where);
          
      return true;
      }

      function check_birthdate_count()  
      {  
                $today= date('Y-m-d');
                $tour_manager_sess_name = $this->session->userdata('tour_manager_name');
                $iid = $this->session->userdata('tour_manager_sess_id'); 

                $record = array();
                $fields = "all_traveller_info.*";
                $this->db->where('tour_manager_id',$iid);
                $this->db->where('is_view','no');
                $this->db->where('dob',$today);
                $arr_data = $this->master_model->getRecords('all_traveller_info'); 
                $count=count($arr_data);
                // print_r($count); die;
                // if($count > 0)  
                // {                     
                //     return $count;//return count
                // }  

                // else if($count == 0)
                // {                     
                //      echo false;
                // }
                echo $count;
                }

// ============================tour manager bell icone todays birthday ==================================

//  ============================tour manager bell icone todays Anniversary ==================================
function anniversary_enquiry_view()  
{  
    $tour_manager_sess_name = $this->session->userdata('tour_manager_name');
    $iid = $this->session->userdata('tour_manager_sess_id'); 

    $today= date('Y-m-d');
    $this->db->where('anniversary_date',$today);
    $arr_where     = array("tour_manager_id" => $iid);
    $arr_update = array("is_view"=>'yes');
    $this->master_model->updateRecord('all_traveller_info',$arr_update,$arr_where);
    
return true;
}

function check_anniversary_count()  
{  
          $today= date('Y-m-d');
          $tour_manager_sess_name = $this->session->userdata('tour_manager_name');
          $iid = $this->session->userdata('tour_manager_sess_id'); 

          $record = array();
          $fields = "all_traveller_info.*";
          $this->db->where('tour_manager_id',$iid);
          $this->db->where('is_view','no');
          $this->db->where('anniversary_date',$today);
          $arr_data = $this->master_model->getRecords('all_traveller_info'); 
          $count=count($arr_data);
          // print_r($count); die;
          // if($count > 0)  
          // {                     
          //     return $count;//return count
          // }  

          // else if($count == 0)
          // {                     
          //      echo false;
          // }
          echo $count;
          }


          function check_total_birthdate_anniversary_count()  
      {  
             
        $today= date('Y-m-d');
        $tour_manager_sess_name = $this->session->userdata('tour_manager_name');
        $iid = $this->session->userdata('tour_manager_sess_id'); 

        $record = array();
        $fields = "all_traveller_info.*";
        $this->db->where('tour_manager_id',$iid);
        $this->db->where('is_view','no');
        $this->db->where('dob',$today);
        $arr_data_one = $this->master_model->getRecords('all_traveller_info'); 
        $birthdate_count=count($arr_data_one);
        // print_r($birthdate_count);

        $record = array();
        $fields = "all_traveller_info.*";
        $this->db->where('tour_manager_id',$iid);
        $this->db->where('is_view','no');
        $this->db->where('anniversary_date',$today);
        $arr_data_two = $this->master_model->getRecords('all_traveller_info'); 
        $anniversary_count=count($arr_data_two);
        // print_r($anniversary_count); die;
                $total_count= $birthdate_count + $anniversary_count;

                

                // if($count > 0)  
                // {                     
                //     return $count;//return count
                // }  

                // else if($count == 0)
                // {                     
                //      echo false;
                // }
                echo $total_count;
                }

// ============================tour manager bell icone todays Anniversary ==================================


}