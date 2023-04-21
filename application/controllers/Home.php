<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	 
	function __construct() {

        parent::__construct();

        $this->arr_view_data = [];
        $this->traveler_front_id =  $this->session->userdata('traveler_front_id');
        
        $this->module_url_path    =  base_url().$this->config->item('front_panel_slug')."home";
        $this->module_title       = "Home";
        $this->module_view_folder = "home/";
	 }

	 
     public function index()
     {
        $aData['msg'] = '';
        $ip = $this->input->ip_address();
        
        // this code for website visiter count
        $ip = $this->input->ip_address();
        $this->db->where('ip_address',$ip);
        $visiter_data = $this->master_model->getRecord('visiter_data');
        
        $this->db->where('ip_addess',$ip);
        $website_visitor_data = $this->master_model->getRecord('website_visitor_data');
        // print_r($website_visitor_data);
        // die;
        if(!empty($website_visitor_data))
        {
        $this->session->set_userdata('details_given','yes');
        }

        if(!empty($visiter_data)){
        $visiter_data_c = $visiter_data['ip_address'];
        $visiter_data_cnt = $visiter_data['visiter_count'];
        $visiter_data_id = $visiter_data['id'];
        $visiter_visit_date = $visiter_data['added_date'];
        $visiter_data_count = $visiter_data_cnt + 1;
        $added_date = date('Y-m-d');
            if($added_date >$visiter_visit_date)
            {
                $arr_update = array(
                    'ip_address'   =>   $ip,
                    'added_date'   =>   date('Y-m-d'),
                    'visiter_count'   =>   $visiter_data_count
                );

                $arr_where     = array("id" => $visiter_data_id);
                $this->master_model->updateRecord('visiter_data',$arr_update,$arr_where);
            }
        
        }else{
            $visiter_data_count = 1;
            $arr_insert = array(
                'ip_address'   =>   $ip,
                'added_date'   =>   date('Y-m-d'),
                'visiter_count'   =>   $visiter_data_count
            );
            
            $inserted_id = $this->master_model->insertRecord('visiter_data',$arr_insert,true);
        }
    // end 
        
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $sliders = $this->master_model->getRecords('sliders');
        
        // $record = array();
        $fields = "packages.*,package_date.journey_date,package_date.single_seat_cost,package_date.twin_seat_cost,package_date.three_four_sharing_cost";
        $this->db->where('packages.is_deleted','no');
        $this->db->where('packages.is_active','yes');
        $this->db->where('package_type','Domestic Packages');
        $this->db->join("package_date", 'packages.id=package_date.package_id','right');
        $this->db->order_by('CAST(tour_number AS DECIMAL(10,6)) ASC');
        $this->db->group_by('package_date.package_id');
        $main_packages_all = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
        // print_r($main_packages_all); die;

        $fields ="packages.*,package_date.journey_date,package_date.single_seat_cost,package_date.twin_seat_cost,package_date.three_four_sharing_cost";
		$this->db->join("package_date", 'packages.id=package_date.package_id','right');
        $this->db->where('packages.is_deleted','no');
        $this->db->where('packages.is_active','yes');
        $this->db->where('package_type','International Packages');
        $this->db->group_by('package_id');
        $this->db->order_by('CAST(tour_number AS DECIMAL(10,6)) ASC');
		$international_packages_all= $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
        // print_r($international_packages_all); die;

        $fields = "packages.*,package_date.journey_date,package_date.single_seat_cost,package_date.twin_seat_cost,package_date.three_four_sharing_cost";
        $this->db->where('packages.is_deleted','no');
        $this->db->where('packages.is_active','yes');
        $this->db->where('package_type','Custom Domestic Package');
        $this->db->join("package_date", 'packages.id=package_date.package_id','right');
        $this->db->order_by('CAST(tour_number AS DECIMAL(10,6)) ASC');
        $this->db->group_by('package_date.package_id');
        $custom_main_packages_all = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
        // print_r($custom_main_packages_all); die; 

        $fields ="packages.*,package_date.journey_date,package_date.single_seat_cost,package_date.twin_seat_cost,package_date.three_four_sharing_cost";
		$this->db->join("package_date", 'packages.id=package_date.package_id','right');
        $this->db->where('packages.is_deleted','no');
        $this->db->where('packages.is_active','yes');
        $this->db->where('package_type','Custom International Package');
        $this->db->group_by('package_id');
        $this->db->order_by('CAST(tour_number AS DECIMAL(10,6)) ASC');
		$custom_international_packages_all= $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
        // print_r($international_packages_all); die;

        // $exclusive_packages = $this->master_model->getRecord('packages');
        // $t_f_date=$exclusive_packages['from_date'];
    

        // $this->db->where('package_type','Special Limited Offer');
        // $exclusive_packages = $this->master_model->getRecords('packages');
        // // foreach($exclusive_packages as $info){
        //     $t_f_date=$info['from_date'];
        // // }
        //     // print_r($exclusive_packages); die;

        // $today = date('Y-m-d');
        // $from_date = $this->input->get('from_date');
        // // print_r($from_date); die;
        // $to_date = $this->input->get('to_date');


        $today = date('Y-m-d');
        $fields = "packages.*,package_date.journey_date,package_date.single_seat_cost,package_date.twin_seat_cost,package_date.three_four_sharing_cost";
        $this->db->where('packages.is_deleted','no');
        $this->db->where('packages.is_active','yes');
        $this->db->where('packages.from_date <=',$today);
        $this->db->where('packages.to_date >=',$today);
        $this->db->where('package_type','Special Limited Offer');
        $this->db->join("package_date", 'packages.id=package_date.package_id','right');
        $this->db->order_by('CAST(tour_number AS DECIMAL(10,6)) ASC');
        $this->db->group_by('package_date.package_id');
        $exclusive_deal_packages_all = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
        // print_r($exclusive_deal_packages_all); die;

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $core_features = $this->master_model->getRecords('core_features');
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $client_reviews = $this->master_model->getRecords('client_reviews');
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $tour_guides = $this->master_model->getRecords('tour_guides');
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $website_basic_structure = $this->master_model->getRecords('website_basic_structure');
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $social_media_link = $this->master_model->getRecords('social_media_link');
        
        $this->db->limit(6);
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','DESC');
        $top_packages = $this->master_model->getRecords('packages');
        
        $this->db->limit(7);
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','RANDOM');
        $random_packages = $this->master_model->getRecords('packages');
		
		$this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','DESC');
        $package_mapping_data = $this->master_model->getRecords('package_mapping');
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $department_data = $this->master_model->getRecords('department');
        // print_r($department_data); die;

        
       
         $data = array('middle_content' => 'index',
						'sliders'       => $sliders,
						'main_packages_all'       => $main_packages_all,
                        'custom_main_packages_all'       => $custom_main_packages_all,
						'international_packages_all'  => $international_packages_all,
                       'custom_international_packages_all'  => $custom_international_packages_all,
                       'exclusive_deal_packages_all'  => $exclusive_deal_packages_all,
						'top_packages'       => $top_packages,
						'random_packages'       => $random_packages,
						'core_features'       => $core_features,
						'department_data'       => $department_data,
						'client_reviews'       => $client_reviews,
						'tour_guides'       => $tour_guides,
						'website_basic_structure' => $website_basic_structure,
					    'package_mapping_data' => $package_mapping_data,
						'social_media_link' => $social_media_link
						);
        // $this->arr_view_data['page_title']     =  "Home Page";
        // $this->arr_view_data['middle_content'] =  "index";
        // $this->load->view('front/common_view',$data);

        $this->arr_view_data['page_title']     =  "Home Page";
        $this->arr_view_data['$website_visitor_data']     =  $website_visitor_data;
        $this->arr_view_data['middle_content'] =  "index";
        $this->load->view('front/common_view_home',$data);
     }

    public function all_packages_search()
    {
        $destination_name = $this->input->post('destination_name');
        //$tour_date = $this->input->post('tour_date');
        $duration = $this->input->post('duration');
        $aData['msg'] = '';
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        // $this->db->where('package_type','Domestic Packages');
        $this->db->where('tour_title',$destination_name);
        // $this->db->or_where('tour_number_of_days',$duration);
        $this->db->order_by('id','DESC');
        $main_packages = $this->master_model->getRecords('packages');
        $count= sizeof($main_packages);
        // print_r($main_packages); die;
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $website_basic_structure = $this->master_model->getRecords('website_basic_structure');
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $social_media_link = $this->master_model->getRecords('social_media_link');
        
         $data = array('middle_content' => 'all_packages',
						'main_packages'       => $main_packages,
						'website_basic_structure' => $website_basic_structure,
						'social_media_link' => $social_media_link,
                        'count'      => $count,
                        'page_title' => 'All Packages', 
						'alert_msg'       => $aData,
						);
						
        $this->arr_view_data['page_title']     =  "All Packages";
        $this->load->view('front/common_view',$data);
    }
	
	public function website_visitor_data()
    {
        $ip = $this->input->ip_address();   
            $this->db->order_by('packages.id','desc');
         	$where['packages.is_deleted'] = 'no';
         	$where['packages.is_active'] = 'yes';
			$packages_data = $this->master_model->getRecords('packages');
            
            $fields = "agent.*,department.department";
            $this->db->where('department.is_deleted','no');
            $this->db->where('department.is_active','yes');
            $this->db->order_by('agent.id','ASC');
            $this->db->join("department", 'agent.department=department.id','left');
            $Aagent_data = $this->master_model->getRecords('agent',array('agent.is_deleted'=>'no','agent.is_active'=>'yes'),$fields);
            
            $this->db->where('is_deleted','no');
            $this->db->where('is_active','yes');
            $this->db->order_by('id','ASC');
            $website_basic_structure = $this->master_model->getRecords('website_basic_structure');
            
            $this->db->where('is_deleted','no');
            $this->db->where('is_active','yes');
            $this->db->order_by('id','ASC');
            $department_data = $this->master_model->getRecords('department');
            
            $this->db->where('is_deleted','no');
            $this->db->where('is_active','yes');
            $this->db->order_by('id','DESC');
            $agent_data = $this->master_model->getRecords('agent');
            
            $this->db->where('is_deleted','no');
            $this->db->where('is_active','yes');
            $this->db->order_by('id','ASC');
            $social_media_link = $this->master_model->getRecords('social_media_link');
            
            $this->db->where('is_deleted','no');
            $this->db->where('is_active','yes');
            $this->db->order_by('id','ASC');
            $media_source = $this->master_model->getRecords('media_source');

            if(isset($_POST['submit']))
            {
                // print_r($_REQUEST); die;
                $this->form_validation->set_rules('first_name', 'First Name', 'required');
                $this->form_validation->set_rules('last_name', 'Last Name', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required');
                $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required');
                $this->form_validation->set_rules('department_id', 'Department', 'required');
                $this->form_validation->set_rules('agent_id', 'Agent Id', 'required');
                $this->form_validation->set_rules('interested_in', 'Interted In', 'required');
                $this->form_validation->set_rules('interested_in_gr_int', 'Type Of Tour', 'required');
				$this->form_validation->set_rules('form_date', 'From Date', 'required');
				$this->form_validation->set_rules('to_date', 'To Date', 'required');
                $this->form_validation->set_rules('total_seat', 'Total Seat', 'required');

    
                if($this->form_validation->run() == TRUE)
                {
                    // print_r($_REQUEST); 
                    $first_name        = $this->input->post('first_name'); 
                    $last_name         = $this->input->post('last_name'); 
                    $email             = $this->input->post('email');
                    $mobile_number     = $this->input->post('mobile_number');
                    $department_id     = $this->input->post('department_id');
                    $agent_id         = $this->input->post('agent_id');
                    $interested_in         = $this->input->post('interested_in');
                    $interested_in_gr_int  = $this->input->post('interested_in_gr_int');
                    $form_date         = $this->input->post('form_date');
					$to_date           = $this->input->post('to_date');
                    $total_seat           = $this->input->post('total_seat');
                    // $package_id        = $id;
     
                    $arr_insert = array(
                        'first_name'    =>   $first_name,
                        'last_name'     => $last_name,
                        'email'         => $email,
                        'mobile_number' => $mobile_number,
                        'department_id'        => $department_id,
                        'booking_center'     => $agent_id,
                        'interested_in'     => $interested_in,
                        'interested_in_gr_int'  => $interested_in_gr_int,
                        'form_date'    =>$form_date,
                        'to_date'    =>$to_date,
                        'ip_addess' => $ip,
                        'total_seat' => $total_seat
                    );
                    
                    $inserted_id = $this->master_model->insertRecord('website_visitor_data',$arr_insert,true);

                    if($inserted_id > 0)
                    {
                     $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                     redirect($this->module_url_path.'/index');
                    }

                }   
            }

        $this->arr_view_data['action']          = 'website_visitor_data';
        $this->arr_view_data['packages_data'] = $packages_data;
        $this->arr_view_data['website_basic_structure'] = $website_basic_structure;
        $this->arr_view_data['social_media_link'] = $social_media_link;
        $this->arr_view_data['agent_data'] = $agent_data;
        $this->arr_view_data['department_data'] = $department_data;
        $this->arr_view_data['media_source'] = $media_source;
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."website_visitor_data";
        $this->load->view('front/common_view',$this->arr_view_data);
    }

    public function getAgent(){ 
        $department_id = $this->input->post('did');
        
                $this->db->where('is_deleted','no');
                $this->db->where('is_active','yes');
                $this->db->where('department',$department_id);
                $data = $this->master_model->getRecords('agent');
        
        echo json_encode($data); 
      }

}