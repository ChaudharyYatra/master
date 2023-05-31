<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Assign_staff extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('supervision_sess_id')=="") 
        { 
                redirect(base_url().'supervision/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('tour_operation_manager_panel_slug')."tour_operation_manager/assign_staff";
        $this->module_title       = "Assign Staff  ";
        $this->module_url_slug    = "assign_staff";
        $this->module_view_folder = "assign_staff/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');

        // $this->db->where('is_deleted','no');
        // $arr_data = $this->master_model->getRecords('assign_staff');
        // print_r($arr_data); die;

        $fields = "assign_staff.*,package_type.package_type,packages.tour_title";
        $this->db->where('assign_staff.is_deleted','no');
        $this->db->join("package_type", 'assign_staff.package_type=package_type.id','left');
        $this->db->join("packages", 'assign_staff.tour_number=packages.id','left');
        $arr_data = $this->master_model->getRecords('assign_staff',array('assign_staff.is_deleted'=>'no'),$fields);


        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('tour_operation_manager/layout/tour_operation_manager_combo',$this->arr_view_data);
       
	}
	
	
    public function add()
    {   
        $supervision_sess_name = $this->session->userdata('supervision_name');
        $id = $this->session->userdata('supervision_sess_id');   


        
        if($this->input->post('submit'))
        {

            $this->form_validation->set_rules('package_type', 'package type', 'required');
            $this->form_validation->set_rules('tour_number', 'tour number', 'required');
            $this->form_validation->set_rules('staff_name', 'staff_name', 'required');
            $this->form_validation->set_rules('mobile_number', 'mobile_number', 'required');
            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('gender', 'gender', 'required');

            
            if($this->form_validation->run() == TRUE)
            {

              if($_FILES['image_name']['name']!=''){

                $file_name     = $_FILES['image_name']['name'];
                $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg','pdf','PDF');

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

                $config['upload_path']   = './uploads/tour_operation_manager/';
                $config['allowed_types'] = 'png|jpg|jpeg|JPG|PNG|JPEG|pdf|PDF'; 
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
             } 
             else{
                $filename  = '';
             }


                $package_type	  = $this->input->post('package_type'); 
                $tour_number	  = $this->input->post('tour_number');
                $staff_name	  = $this->input->post('staff_name'); 
                $mobile_number = $this->input->post('mobile_number');
                $email          = $this->input->post('email');
                $gender	        = $this->input->post('gender');

                $arr_insert = array(
                    'package_type'   =>   $package_type,
                    'tour_number'   =>   $tour_number,
                    'staff_name'   =>   $staff_name,
                    'mobile_number'   =>   $mobile_number,
                    'email'   =>   $email,
                    'gender'   =>   $gender,
                    'image_name	'   =>   $filename
                );

                $inserted_id = $this->master_model->insertRecord('assign_staff',$arr_insert,true);
                
                               
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


        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');  
        $package_type = $this->master_model->getRecords('package_type');

        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['package_type']        = $package_type;
        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['page_title']      = " Assign Staff";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('tour_operation_manager/layout/tour_operation_manager_combo',$this->arr_view_data);
    }


   
    // Edit - Get data for edit
    
    public function edit($id)
    {
        $supervision_sess_name = $this->session->userdata('supervision_name');

		if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        if(is_numeric($id))
        {   

            $this->db->where('id',$id);
            $this->db->where('is_active','yes');
            $this->db->where('is_deleted','no');
            $arr_data = $this->master_model->getRecords('assign_staff');
  
        
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('package_type', 'package type', 'required');
                $this->form_validation->set_rules('tour_number', 'tour number', 'required');
                $this->form_validation->set_rules('staff_name', 'staff_name', 'required');
                $this->form_validation->set_rules('mobile_number', 'mobile_number', 'required');
                $this->form_validation->set_rules('email', 'email', 'required');
                $this->form_validation->set_rules('gender', 'gender', 'required');

                if($this->form_validation->run() == TRUE)
                {

                    
                    $old_img_name = $this->input->post('old_img_name');
                
                    if(!empty($_FILES['image_name']) && $_FILES['image_name']['name'] !='')
                    {
                    $file_name     = $_FILES['image_name']['name'];
                    $arr_extension = array('png','jpg','JPEG','PNG','JPG','jpeg','PDF','pdf');

                    $file_name = $_FILES['image_name'];
                    $arr_extension = array('png','jpg','jpeg','PNG','JPG','JPEG','PDF','pdf');

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
                    
                    $config['upload_path']   = './uploads/tour_operation_manager/';
                    $config['allowed_types'] = 'JPEG|PNG|png|jpg|JPG|jpeg|PDF|pdf';  
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
                        if($old_img_name!='') unlink('./uploads/tour_operation_manager/'.$old_img_name);
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
                


                $package_type	  = $this->input->post('package_type'); 
                $tour_number	  = $this->input->post('tour_number');
                $staff_name	  = $this->input->post('staff_name'); 
                $mobile_number = $this->input->post('mobile_number');
                $email          = $this->input->post('email');
                $gender	        = $this->input->post('gender');

                $arr_update = array(
                    'package_type'   =>   $package_type,
                    'tour_number'   =>   $tour_number,
                    'staff_name'   =>   $staff_name,
                    'mobile_number'   =>   $mobile_number,
                    'email'   =>   $email,
                    'gender'   =>   $gender,
                    'image_name	'   =>   $filename
                );

            
                $arr_where     = array("id" => $id);
                $this->master_model->updateRecord('assign_staff',$arr_update,$arr_where);
                

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
        
        $this->db->where('is_deleted','no');
		$this->db->order_by('tour_number','ASC');
        $packages_data = $this->master_model->getRecords('packages');
        //  print_r($packages_data); die;

        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $package_type = $this->master_model->getRecords('package_type');
        // print_r($package_type); die;

        
        $this->arr_view_data['supervision_sess_name'] = $supervision_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['packages_data']        = $packages_data;
        $this->arr_view_data['package_type']        = $package_type;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('tour_operation_manager/layout/tour_operation_manager_combo',$this->arr_view_data);
    }

    // Delete
    
    public function delete($id)
    {

        if($id!='')
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('assign_staff');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('assign_staff',$arr_update,$arr_where))
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



      // Active/Inactive
  
  public function active_inactive($id,$type)
  {

      if($id!='' && ($type == "yes" || $type == "no") )
      {   
          $this->db->where('id',$id);
          $arr_data = $this->master_model->getRecords('assign_staff');
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
          
          if($this->master_model->updateRecord('assign_staff',$arr_update,array('id' => $id)))
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


  public function get_package(){ 
    // POST data 
    // $all_b=array();
    $district_data = $this->input->post('did');
        // print_r($boarding_office_location); die;
                        $this->db->where('is_deleted','no');
                        $this->db->where('is_active','yes');
                        $this->db->where('package_type',$district_data);   
                        $data = $this->master_model->getRecords('packages');
        echo json_encode($data);
    }

// =======================================================================================================
    // Get Details of Package
    public function details($id)
    {
		$id=base64_decode($id);
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   
        
        $fields = "packages.*,academic_years.year";
        $this->db->where('packages.id',$id);
        $this->db->join("academic_years", 'packages.academic_year=academic_years.id','left');
        $arr_data = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
        
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." Details ";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
        $this->load->view('tour_operation_manager/layout/tour_operation_manager_combo',$this->arr_view_data);
    }



   
   
}