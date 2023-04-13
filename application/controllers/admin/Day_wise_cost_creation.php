<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Day_wise_cost_creation extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/day_wise_cost_creation";
        $this->module_url_path_list =  base_url().$this->config->item('admin_panel_slug')."/day_wise_cost_creation";
        $this->module_title       = "Day Wise Cost Calculation";
        $this->module_url_slug    = "day_wise_cost_creation";
        $this->module_view_folder = "day_wise_cost_creation/";    
        // $this->load->library('upload');
	}

	public function index()
	{  
        


        $this->arr_view_data['listing_page']    = 'yes';
        // $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['module_url_path_list'] = $this->module_url_path_list;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
	}
    
    public function add()
    {   
        $this->db->where('is_deleted','no');
        $halting_place_data = $this->master_model->getRecords('halting_place');
       
        if($this->input->post('submit'))
        {
            
             $this->form_validation->set_rules('tour_number', 'tour number', 'required');
             $this->form_validation->set_rules('tour_name', 'tour name', 'required');
             $this->form_validation->set_rules('tour_days', 'tour days', 'required');
             $this->form_validation->set_rules('day[]', 'day', 'required');
             $this->form_validation->set_rules('halting[]', 'halting', 'required');
             $this->form_validation->set_rules('hotel_rates[]', 'hotel_rates', 'required');
             $this->form_validation->set_rules('lodge_rates[]', 'lodge_rates', 'required');
             $this->form_validation->set_rules('extra_city_expenses[]', 'extra_city_expenses', 'required');
             $this->form_validation->set_rules('toll_tax_chareges[]', 'toll_tax_chareges', 'required');
             $this->form_validation->set_rules('parking_chareges[]', 'parking_chareges', 'required');
             $this->form_validation->set_rules('grand_total_cost', 'grand_total_cost', 'required');
            
            if($this->form_validation->run() == TRUE)
            {

                $tour_number  = $this->input->post('tour_number');
                $tour_name  = $this->input->post('tour_name');
                $tour_days  = $this->input->post('tour_days');
                $day  = $this->input->post('day');
                $halting  = $this->input->post('halting');
                $hotel_rates  = $this->input->post('hotel_rates');
                $lodge_rates  = $this->input->post('lodge_rates'); 
                $extra_city_expenses  = $this->input->post('extra_city_expenses'); 
                $toll_tax_chareges  = $this->input->post('toll_tax_chareges');
                $parking_chareges  = $this->input->post('parking_chareges');
                $grand_total_cost  = $this->input->post('grand_total_cost');

                $c=count($day);
               // die;
                for($i=0; $i<$c; $i++){
                $arr_insert = array(
                    'tour_number' =>   $tour_number,
                    'tour_name' =>   $tour_name,
                    'tour_days' =>   $tour_days,
                    'day' =>   $day[$i],
                    'halting'   =>   $halting[$i],
                    'hotel_rates'   =>   $hotel_rates[$i],   
                    'lodge_rates'    =>$lodge_rates[$i],
                    'extra_city_expenses'=>$extra_city_expenses[$i],
                    'toll_tax_chareges'=>$toll_tax_chareges[$i],
                    'parking_chareges'=>$parking_chareges[$i],
                    'grand_total_cost'=>$grand_total_cost
                         
                 );
                
                $inserted_id = $this->master_model->insertRecord('day_wise_cost_creation',$arr_insert,true);
            }  
                               
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message'," Day Wise Cost Creation Added Successfully.");
                    redirect($this->module_url_path.'/add');
                }
                else
                {
                    $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/add');
            }   
            
        
        }


        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $packages_data = $this->master_model->getRecords('packages');


        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['packages_data']        = $packages_data;   
        $this->arr_view_data['halting_place_data']        = $halting_place_data; 
        //$this->arr_view_data['user_role']       = $user_role; 
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

    public function getTourname(){ 
        // POST data 
        $tour_name = $this->input->post('did');
        
                $this->db->where('is_deleted','no');
                $this->db->where('is_active','yes');
                $this->db->where('id',$tour_name);
                $data = $this->master_model->getRecord('packages');
        // print_r($data); 
        echo json_encode($data); 
        
      }

      public function getTourdays(){ 
        // POST data 
        $tour_name = $this->input->post('did');
        
                $this->db->where('is_deleted','no');
                $this->db->where('is_active','yes');
                $this->db->where('id',$tour_name);
                $data = $this->master_model->getRecord('packages');
        // print_r($data); 
        echo json_encode($data); 
        
      }



   
}