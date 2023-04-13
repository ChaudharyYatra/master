<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class International_packages extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
	
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/international_packages";
        $this->module_url_path_dates    =  base_url().$this->config->item('admin_panel_slug')."/international_packages_dates";
		$this->module_url_path_iternary    =  base_url().$this->config->item('admin_panel_slug')."/international_package_iternary";
        $this->module_title       = "International Packages";
        $this->module_url_slug    = "international_packages";
        $this->module_view_folder = "international_packages/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $this->db->where('is_deleted','no');
		$this->db->order_by('tour_number','ASC');
        $arr_data = $this->master_model->getRecords('international_packages');
        
        $this->arr_view_data['module_url_path_dates'] = $this->module_url_path_dates;
		$this->arr_view_data['module_url_path_iternary'] = $this->module_url_path_iternary;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
       
	}
	
	
    public function add()
    {   
           $this->db->where('is_active','yes');
        $this->db->where('is_deleted','no');
        $agent_data = $this->master_model->getRecords('agent');
        $this->arr_view_data['agent_data'] = $agent_data;
        
        if($this->input->post('submit'))
        {
            $this->form_validation->set_rules('academic_year', 'Academic Year', 'required');
            // $this->form_validation->set_rules('tour_number', 'Tour Number', 'required|is_unique[international_packages.tour_number]');
            $this->form_validation->set_rules('tour_title', 'Tour Title', 'required');
            $this->form_validation->set_rules('rating', 'Rating', 'required');
            $this->form_validation->set_rules('cost', 'Single Per Seat', 'required');
            $this->form_validation->set_rules('tour_number_of_days', 'Tour Number of Days', 'required');

            if($this->form_validation->run() == TRUE)
            {
                $this->db->where('is_active','yes');
                $tourNo_check = $this->master_model->getRecords('international_packages',array('is_deleted'=>'no','tour_number'=>trim($this->input->post('tour_number'))));
                if(count($tourNo_check)==0){

                $file_name     = $_FILES['image_name']['name'];
                $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg');

                if($file_name!="")
                {               
                    $ext = explode('.',$_FILES['image_name']['name']); 
                    $config['file_name']   = $this->input->post('txtEmp_id').'.'.$ext[1];

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                        redirect($this->module_url_path.'/add');  
                    }
                }
                $file_name_to_dispaly =  $this->config->item('project_name').''.round(microtime(true)).str_replace(' ','_',$file_name);

                $config['upload_path']   = './uploads/international_packages/';
                $config['allowed_types'] = 'png|jpg|jpeg|JPG|JPEG|PNG'; 
                $config['max_size']      = '10000';
                $config['file_name']     =  $file_name_to_dispaly;
                $config['overwrite']     =  TRUE;

                $this->load->library('upload',$config);
                $this->upload->initialize($config); // Important

                if(!$this->upload->do_upload('image_name'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                    redirect($this->module_url_path);  
                }

                if($file_name!="")
                {
                    $file_name = $this->upload->data();
                    $filename = $file_name_to_dispaly;
                }

                else
                {
                    $filename = $this->input->post('image_name',TRUE);
                }

                // ====================PDF add ============================================

                $file_name     = $_FILES['pdf_name']['name'];
                // echo  '<br>';
                // echo '2';
                $arr_extension = array('PDF','pdf');

                $file_name = $_FILES['pdf_name'];
                $arr_extension = array('PDF','pdf');

                if($file_name['name']!="")
                {
                    $ext = explode('.',$_FILES['pdf_name']['name']); 
                    $config['file_name'] = rand(1000,90000);

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                        redirect($this->module_url_path.'/edit/'.$id);
                    }
                }   

               $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
            //    echo  '<br>';
            //    echo '3';
                $config['upload_path']   = './uploads/international_package_daywise_program/';
                $config['allowed_types'] = 'PDF|pdf';  
                $config['max_size']      = '10000';
                $config['file_name']     = $file_name_to_dispaly_pdf;
                $config['overwrite']     = TRUE;
                $this->load->library('upload',$config);
                $this->upload->initialize($config); // Important
                
                if(!$this->upload->do_upload('pdf_name'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                    redirect($this->module_url_path.'/edit/'.$id);
                }
                if($file_name['name']!="")
                {   
                    $file_name = $this->upload->data();
                    $pdf_filename = $file_name_to_dispaly_pdf;
                   // if($old_pdf_name!='') unlink('./uploads/packages/'.$old_pdf_name);
                }
                else
                {
                    $pdf_filename = $this->input->post('pdf_name',TRUE);
                    // echo  '<br>';
                    // echo '4';
                }

                // ====================New Package Full Imagge add ============================================
                $file_name     = $_FILES['international_package_full_image']['name'];
                
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');

                $file_name = $_FILES['international_package_full_image'];
                $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');

                if($file_name['name']!="")
                {
                    $ext = explode('.',$_FILES['international_package_full_image']['name']); 
                    $config['file_name'] = rand(1000,90000);

                    if(!in_array($ext[1],$arr_extension))
                    {
                        $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                    }
                }   

               $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
            
                $config['upload_path']   = './uploads/international_package_full_image/';
                $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg';  
                $config['max_size']      = '10000';
                $config['file_name']     = $file_name_to_dispaly_pdf;
                $config['overwrite']     = TRUE;
                $this->load->library('upload',$config);
                $this->upload->initialize($config); // Important
                
                if(!$this->upload->do_upload('international_package_full_image'))
                {  
                    $data['error'] = $this->upload->display_errors();
                    $this->session->set_flashdata('error_message',$this->upload->display_errors());
                    redirect($this->module_url_path.'/edit/'.$id);
                }
                if($file_name['name']!="")
                {   
                    $file_name = $this->upload->data();
                    $new_img_filename = $file_name_to_dispaly_pdf;
                }
                else
                {
                    $new_img_filename = $this->input->post('international_package_full_image',TRUE);
                    
                }

                 // ===============

                 $file_name     = $_FILES['inclusion_img']['name'];

                 $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');
 
                 $file_name = $_FILES['inclusion_img'];
                 $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');
 
                 if($file_name['name']!="")
                 {
                     $ext = explode('.',$_FILES['inclusion_img']['name']); 
                     $config['file_name'] = rand(1000,90000);
 
                     if(!in_array($ext[1],$arr_extension))
                     {
                         $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                     }
                 }   
 
                 $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
             
                 $config['upload_path']   = './uploads/international_inclusion_img/';
                 $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg';  
                 $config['max_size']      = '10000';
                 $config['file_name']     = $file_name_to_dispaly_pdf;
                 $config['overwrite']     = TRUE;
                 $this->load->library('upload',$config);
                 $this->upload->initialize($config); // Important
                 
                 if(!$this->upload->do_upload('inclusion_img'))
                 {  
                     $data['error'] = $this->upload->display_errors();
                     $this->session->set_flashdata('error_message',$this->upload->display_errors());
                     redirect($this->module_url_path.'/edit/'.$id);
                 }
                 if($file_name['name']!="")
                 {   
                     $file_name = $this->upload->data();
                     $inclusion_img_filename = $file_name_to_dispaly_pdf;
                 }
                 else
                 {
                     $inclusion_img_filename = $this->input->post('inclusion_img',TRUE);
                     
                 }
 
                  // ===============
 
                  $file_name     = $_FILES['tc_img']['name'];
 
                  $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');
  
                  $file_name = $_FILES['tc_img'];
                  $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');
  
                  if($file_name['name']!="")
                  {
                      $ext = explode('.',$_FILES['tc_img']['name']); 
                      $config['file_name'] = rand(1000,90000);
  
                      if(!in_array($ext[1],$arr_extension))
                      {
                          $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                      }
                  }   
  
                  $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
              
                  $config['upload_path']   = './uploads/international_tc_img/';
                  $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg';  
                  $config['max_size']      = '10000';
                  $config['file_name']     = $file_name_to_dispaly_pdf;
                  $config['overwrite']     = TRUE;
                  $this->load->library('upload',$config);
                  $this->upload->initialize($config); // Important
                  
                  if(!$this->upload->do_upload('tc_img'))
                  {  
                      $data['error'] = $this->upload->display_errors();
                      $this->session->set_flashdata('error_message',$this->upload->display_errors());
                      redirect($this->module_url_path.'/edit/'.$id);
                  }
                  if($file_name['name']!="")
                  {   
                      $file_name = $this->upload->data();
                      $tc_img_filename = $file_name_to_dispaly_pdf;
                  }
                  else
                  {
                      $tc_img_filename = $this->input->post('tc_img',TRUE);
                      
                  }

              
                $academic_year  = $this->input->post('academic_year'); 
                $package_type  = $this->input->post('package_type'); 
                $tour_number        = trim($this->input->post('tour_number'));
                $tour_title        = trim($this->input->post('tour_title'));
                $destinations = trim($this->input->post('destinations'));
                $rating = trim($this->input->post('rating'));
                $cost = trim($this->input->post('cost'));
                $tour_number_of_days = trim($this->input->post('tour_number_of_days'));
                $short_description = trim($this->input->post('short_description'));
                $full_description = trim($this->input->post('full_description'));
                $boarding_office = implode(",", $this->input->post('boarding_office'));
                $hotel_type = trim($this->input->post('hotel_type'));
                $zone_name = trim($this->input->post('zone_name'));
                
                $arr_insert = array(
                    'academic_year'   =>   $academic_year,
                    'package_type'   =>   $package_type,
                    'tour_number'          => $tour_number,
                    'tour_title'          => $tour_title,
                    'destinations'          => $destinations,
                    'rating'          => $rating,
                    'cost'          => $cost,
                    'tour_number_of_days'          => $tour_number_of_days,
                    'short_description'        => $short_description,
                    'full_description'        => $full_description,   
                    'image_name'    => $filename,
                    'pdf_name'    => $pdf_filename,
                    'international_package_full_image'    => $new_img_filename,
                    'inclusion_img'             => $inclusion_img_filename,
                    'tc_img'             => $tc_img_filename,
                    'boarding_office'             => $boarding_office,
                    'hotel_type'             => $hotel_type,
                    'zone_name'             => $zone_name
                );
                
                $inserted_id = $this->master_model->insertRecord('international_packages',$arr_insert,true);
                               
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
            else{
                $this->session->set_flashdata('error_message',"Tour Number already exist.");
            }  
        } 
        }
        

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $academic_years_data = $this->master_model->getRecords('academic_years');
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $hotel_type_info = $this->master_model->getRecords('hotel_type');
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $zone_info = $this->master_model->getRecords('zone_master');

        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['academic_years_data'] = $academic_years_data;
        $this->arr_view_data['hotel_type_info'] = $hotel_type_info;
        $this->arr_view_data['zone_info'] = $zone_info;
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

    
   
    
   
  // Active/Inactive
  
  public function active_inactive($id,$type)
    {
	  $id=base64_decode($id);
        if($id!='' && ($type == "yes" || $type == "no") )
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('international_packages');
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
            
            if($this->master_model->updateRecord('international_packages',$arr_update,array('id' => $id)))
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
            $arr_data = $this->master_model->getRecords('international_packages');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('international_packages',$arr_update,$arr_where))
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
		$id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        else
        {   
            $this->db->where('id',$id);
            $this->db->where('is_active','yes');
            $arr_data = $this->master_model->getRecords('international_packages');
            
               $this->db->where('is_active','yes');
        $this->db->where('is_deleted','no');
        $agent_data = $this->master_model->getRecords('agent');
        $this->arr_view_data['agent_data'] = $agent_data;
        
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('academic_year', 'Academic Year', 'required');
                $this->form_validation->set_rules('tour_number', 'Tour Number', 'required');
                $this->form_validation->set_rules('tour_title', 'Tour Title', 'required');
                $this->form_validation->set_rules('rating', 'Rating', 'required');
                $this->form_validation->set_rules('cost', 'Single Per Seat', 'required');
                $this->form_validation->set_rules('tour_number_of_days', 'Tour Number of Days', 'required');
                // $this->form_validation->set_rules('image_name','Package Image', 'callback_handle_upload[edit]');
                if($this->form_validation->run() == TRUE)
                {
                    $this->db->where('id!=',$id);
                    $tourNo_check = $this->master_model->getRecords('international_packages',array('is_deleted'=>'no','tour_number'=>trim($this->input->post('tour_number'))));
                    if(count($tourNo_check)==0){
                 
                 $old_img_name = $this->input->post('old_img_name');
                
                    if(!empty($_FILES['image_name']) && $_FILES['image_name']['name'] !='')
                    {
                    $file_name     = $_FILES['image_name']['name'];
                    $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg');

                    $file_name = $_FILES['image_name'];
                    $arr_extension = array('png','jpg');

                    if($file_name['name']!="")
                    {
                        $ext = explode('.',$_FILES['image_name']['name']); 
                        $config['file_name'] = rand(1000,90000);

                        if(!in_array($ext[1],$arr_extension))
                        {
                            $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                            redirect($this->module_url_path.'/edit/'.$id);
                        }
                    }   

                    $file_name_to_dispaly =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
                    
                    $config['upload_path']   = './uploads/international_packages/';
                    $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|JPEG';  
                    $config['max_size']      = '10000';
                    $config['file_name']     = $file_name_to_dispaly;
                    $config['overwrite']     = TRUE;
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config); // Important
                    
                    if(!$this->upload->do_upload('image_name'))
                    {  
                        $data['error'] = $this->upload->display_errors();
                        $this->session->set_flashdata('error_message',$this->upload->display_errors());
                        redirect($this->module_url_path.'/edit/'.$id);
                    }
                    if($file_name['name']!="")
                    {   
                        $file_name = $this->upload->data();
                        $filename = $file_name_to_dispaly;
                        if($old_img_name!='') unlink('./uploads/international_packages/'.$old_img_name);
                    }
                    else
                    {
                        $filename = $this->input->post('image_name',TRUE);
                    }
                }
                else
                {
                    $filename = $old_img_name;
                }

//============================================================================================================
               $old_pdf_name = $this->input->post('old_pdf_name');
               //    echo '1';
                   
                   if(!empty($_FILES['pdf_name']) && $_FILES['pdf_name']['name'] !='')
                   {
                  $file_name     = $_FILES['pdf_name']['name'];
                   // echo  '<br>';
                   // echo '2';
                   $arr_extension = array('PDF','pdf');
   
                   $file_name = $_FILES['pdf_name'];
                   $arr_extension = array('PDF','pdf');
   
                   if($file_name['name']!="")
                   {
                       $ext = explode('.',$_FILES['pdf_name']['name']); 
                       $config['file_name'] = rand(1000,90000);
   
                       if(!in_array($ext[1],$arr_extension))
                       {
                           $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                           redirect($this->module_url_path.'/edit/'.$id);
                       }
                   }   
   
                  $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
               //    echo  '<br>';
               //    echo '3';
                   $config['upload_path']   = './uploads/international_package_daywise_program/';
                   $config['allowed_types'] = 'PDF|pdf';  
                   $config['max_size']      = '10000';
                   $config['file_name']     = $file_name_to_dispaly_pdf;
                   $config['overwrite']     = TRUE;
                   $this->load->library('upload',$config);
                   $this->upload->initialize($config); // Important
                   
                   if(!$this->upload->do_upload('pdf_name'))
                   {  
                       $data['error'] = $this->upload->display_errors();
                       $this->session->set_flashdata('error_message',$this->upload->display_errors());
                       redirect($this->module_url_path.'/edit/'.$id);
                   }
                   if($file_name['name']!="")
                   {   
                       $file_name = $this->upload->data();
                       $pdf_filename = $file_name_to_dispaly_pdf;
                      // if($old_pdf_name!='') unlink('./uploads/packages/'.$old_pdf_name);
                   }
                   else
                   {
                       $pdf_filename = $this->input->post('pdf_name',TRUE);
                       // echo  '<br>';
                       // echo '4';
                   }
               }
               else
               {
                   $pdf_filename = $old_pdf_name;
                   // echo  '<br>';
                   // echo '5';
               }
               // echo $pdf_filename;
               //    die;

               //============================================================================================================
            $old_new_name = $this->input->post('old_new_name');
                
            if(!empty($_FILES['international_package_full_image']) && $_FILES['international_package_full_image']['name'] !='')
            {
           $file_name     = $_FILES['international_package_full_image']['name'];
            
            $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');

            $file_name = $_FILES['international_package_full_image'];
            $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');

            if($file_name['name']!="")
            {
                $ext = explode('.',$_FILES['international_package_full_image']['name']); 
                $config['file_name'] = rand(1000,90000);

                if(!in_array($ext[1],$arr_extension))
                {
                    $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                    redirect($this->module_url_path.'/edit/'.$id);
                }
            }   

           $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
        
            $config['upload_path']   = './uploads/international_package_full_image/';
            $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg';  
            $config['max_size']      = '10000';
            $config['file_name']     = $file_name_to_dispaly_pdf;
            $config['overwrite']     = TRUE;
            $this->load->library('upload',$config);
            $this->upload->initialize($config); // Important
            
            if(!$this->upload->do_upload('international_package_full_image'))
            {  
                $data['error'] = $this->upload->display_errors();
                $this->session->set_flashdata('error_message',$this->upload->display_errors());
                redirect($this->module_url_path.'/edit/'.$id);
            }
            if($file_name['name']!="")
            {   
                $file_name = $this->upload->data();
                $new_img_filename = $file_name_to_dispaly_pdf;
                if($old_new_name!='') unlink('./uploads/international_package_full_image/'.$old_new_name);
            }
            else
            {
                $new_img_filename = $this->input->post('international_package_full_image',TRUE);
                
            }
        }
        else
        {
            $new_img_filename = $old_new_name;
            
        }

        // ===========================

        $old_inclusion_name = $this->input->post('old_inclusion_name');
                
        if(!empty($_FILES['inclusion_img']) && $_FILES['inclusion_img']['name'] !='')
        {
       $file_name     = $_FILES['inclusion_img']['name'];
        
        $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');

        $file_name = $_FILES['inclusion_img'];
        $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');

        if($file_name['name']!="")
        {
            $ext = explode('.',$_FILES['inclusion_img']['name']); 
            $config['file_name'] = rand(1000,90000);

            if(!in_array($ext[1],$arr_extension))
            {
                $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                redirect($this->module_url_path.'/edit/'.$id);
            }
        }   

       $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
    
        $config['upload_path']   = './uploads/international_inclusion_img/';
        $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg';  
        $config['max_size']      = '10000';
        $config['file_name']     = $file_name_to_dispaly_pdf;
        $config['overwrite']     = TRUE;
        $this->load->library('upload',$config);
        $this->upload->initialize($config); // Important
        
        if(!$this->upload->do_upload('inclusion_img'))
        {  
            $data['error'] = $this->upload->display_errors();
            $this->session->set_flashdata('error_message',$this->upload->display_errors());
            redirect($this->module_url_path.'/edit/'.$id);
        }
        if($file_name['name']!="")
        {   
            $file_name = $this->upload->data();
            $new_inclusion_img_filename = $file_name_to_dispaly_pdf;
            if($old_inclusion_name!='') unlink('./uploads/international_inclusion_img/'.$old_inclusion_name);
        }
        else
        {
            $new_inclusion_img_filename = $this->input->post('inclusion_img',TRUE);
            
        }
    }
    else
    {
        $new_inclusion_img_filename = $old_inclusion_name;
        
    }

    // =============================
    $old_tc_name = $this->input->post('old_tc_name');
        
        if(!empty($_FILES['tc_img']) && $_FILES['tc_img']['name'] !='')
        {
       $file_name     = $_FILES['tc_img']['name'];
        
        $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');

        $file_name = $_FILES['tc_img'];
        $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG');

        if($file_name['name']!="")
        {
            $ext = explode('.',$_FILES['tc_img']['name']); 
            $config['file_name'] = rand(1000,90000);

            if(!in_array($ext[1],$arr_extension))
            {
                $this->session->set_flashdata('error_message','Please Upload png/jpg Files.');
                redirect($this->module_url_path.'/edit/'.$id);
            }
        }   

       $file_name_to_dispaly_pdf =  $this->config->item('project_name').round(microtime(true)).str_replace(' ','_',$file_name['name']);
    
        $config['upload_path']   = './uploads/international_tc_img/';
        $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg';  
        $config['max_size']      = '10000';
        $config['file_name']     = $file_name_to_dispaly_pdf;
        $config['overwrite']     = TRUE;
        $this->load->library('upload',$config);
        $this->upload->initialize($config); // Important
        
        if(!$this->upload->do_upload('tc_img'))
        {  
            $data['error'] = $this->upload->display_errors();
            $this->session->set_flashdata('error_message',$this->upload->display_errors());
            redirect($this->module_url_path.'/edit/'.$id);
        }
        if($file_name['name']!="")
        {   
            $file_name = $this->upload->data();
            $new_tc_img_filename = $file_name_to_dispaly_pdf;
            if($old_tc_name!='') unlink('./uploads/international_tc_img/'.$old_tc_name);
        }
        else
        {
            $new_tc_img_filename = $this->input->post('tc_img',TRUE);
            
        }
    }
    else
    {
        $new_tc_img_filename = $old_tc_name;
        
    }
               
                
                $academic_year  = $this->input->post('academic_year'); 
                $package_type  = $this->input->post('package_type'); 
                $tour_number        = trim($this->input->post('tour_number'));
                $tour_title        = trim($this->input->post('tour_title'));
                $destinations = trim($this->input->post('destinations'));
                $rating = trim($this->input->post('rating'));
                $cost = trim($this->input->post('cost'));
                $tour_number_of_days = trim($this->input->post('tour_number_of_days'));
                $short_description = trim($this->input->post('short_description'));
                $full_description = trim($this->input->post('full_description'));
                $boarding_office = implode(",", $this->input->post('boarding_office'));
                $hotel_type        = trim($this->input->post('hotel_type'));
                $zone_name        = trim($this->input->post('zone_name'));
                 
                
                
                $arr_update = array(
                    'academic_year'   =>   $academic_year,
                    'package_type'   =>   $package_type,
                    'tour_number'          => $tour_number,
                    'tour_title'          => $tour_title,
                    'destinations'          => $destinations,
                    'rating'          => $rating,
                    'cost'          => $cost,
                    'tour_number_of_days'          => $tour_number_of_days,
                    'short_description'        => $short_description,
                    'full_description'        => $full_description,  
                    'image_name'    => $filename,
                    'pdf_name'    => $pdf_filename,
                    'international_package_full_image'    => $new_img_filename,
                    'inclusion_img'             => $new_inclusion_img_filename,
                    'tc_img'             => $new_tc_img_filename,
                    'boarding_office'             => $boarding_office,
                    'hotel_type'             => $hotel_type,
                    'zone_name'             => $zone_name
                );
                
                    $arr_where     = array("id" => $id);
                    $this->master_model->updateRecord('international_packages',$arr_update,$arr_where);
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
                else{
                    $this->session->set_flashdata('error_message',"Tour Number already exist.");
                } 
                }  
            }
        }
        
        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $academic_years_data = $this->master_model->getRecords('academic_years');
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $hotel_type_info = $this->master_model->getRecords('hotel_type');
        
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $zone_info = $this->master_model->getRecords('zone_master');
        
        $this->arr_view_data['academic_years_data']        = $academic_years_data;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['hotel_type_info']        = $hotel_type_info;
        $this->arr_view_data['zone_info']        = $zone_info;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

    // Get Details of Package
    public function details($id)
    {
		$id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   
        
        $fields = "international_packages.*,academic_years.year";
        $this->db->where('international_packages.id',$id);
        $this->db->join("academic_years", 'international_packages.academic_year=academic_years.id','left');
        $arr_data = $this->master_model->getRecords('international_packages',array('international_packages.is_deleted'=>'no'),$fields);
        
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }
   
   
}