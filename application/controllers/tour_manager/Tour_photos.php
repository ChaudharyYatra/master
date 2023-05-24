<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tour_photos extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('tour_manager_sess_id')=="") 
        { 
                redirect(base_url().'tour_manager/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/tour_photos";
        $this->module_title       = "Tour Photos";
        $this->module_url_slug    = "tour_photos";
        $this->module_view_folder = "tour_photos/";    
        $this->load->library('upload');
	}

	public function index()
	{
        $tour_manager_sess_name = $this->session->userdata('tour_manager_name');
        $id = $this->session->userdata('tour_manager_sess_id'); 

        $fields = "tour_photos.*,packages.tour_title,packages.tour_number,package_date.journey_date";
        $this->db->where('tour_photos.is_deleted','no');
        // $this->db->where('tour_photos.is_active','yes');
        $this->db->join("packages", 'tour_photos.package_id=packages.id','left');
        $this->db->join("package_date", 'packages.id=package_date.package_id','left');
        $arr_data = $this->master_model->getRecords('tour_photos',array('tour_photos.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->arr_view_data['tour_manager_sess_name']        = $tour_manager_sess_name;
        $this->arr_view_data['listing_page']    = 'yes';
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = $this->module_title." List";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
       
	}
	
	
    public function add($id)
    {   
        $tour_manager_sess_name = $this->session->userdata('tour_manager_name');
        $iid = $this->session->userdata('tour_manager_sess_id'); 

        $id=base64_decode($id);
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
            $this->form_validation->set_rules('destinations', 'destinations', 'required');
            // $this->form_validation->set_rules('image_name', 'image_name', 'required');
            
            if($this->form_validation->run() == TRUE)
            {

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

                $config['upload_path']   = './uploads/tour_photos/';
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


                $destinations	  = $this->input->post('destinations'); 

                $arr_insert = array(
                    'destination'   =>   $destinations,
                    'image_name	'   =>   $filename,
                    'package_id	'   =>   $id,
                    'tour_manager_id'   =>   $iid

                );

                $inserted_id = $this->master_model->insertRecord('tour_photos',$arr_insert,true);

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
     }
     else
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }

        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['tour_manager_sess_name'] = $tour_manager_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['page_title']      = " Add Instruction For Tour Manager";
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
    }


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

        if($id!='')
        {   
            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('destinations', 'destinations', 'required');

                if($this->form_validation->run() == TRUE)
                {

                //  print_r($_REQUEST);

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
                    
                    $config['upload_path']   = './uploads/tour_photos/';
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
                        if($old_img_name!='') unlink('./uploads/tour_photos/'.$old_img_name);
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

                $destinations	  = $this->input->post('destinations'); 

                $arr_update = array(
                    'destination'   =>   $destinations,
                    'image_name	'   =>   $filename,

                );

                $arr_where     = array("id" => $id);
                $inserted_id = $this->master_model->updateRecord('tour_photos',$arr_update,$arr_where);
                
                    if($inserted_id > 0)
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
        else
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }
        
        $this->db->where('id',$id);
        $this->db->where('is_active','yes');
        $this->db->where('is_deleted','no');
        $arr_data = $this->master_model->getRecords('tour_photos');
        // print_r($arr_data); die;
    
        $this->arr_view_data['tour_manager_sess_name']        = $tour_manager_sess_name;
        $this->arr_view_data['arr_data']        = $arr_data;
        // $this->arr_view_data['arr_data_main']        = $arr_data_main;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
    }

    // Delete
    
    public function delete($id)
    {
        $id=base64_decode($id);
        if($id!='')
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('tour_photos');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('tour_photos',$arr_update,$arr_where))
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
   


// =================================================================
// Active/Inactive
public function active_inactive($id,$type)
{
    if($id!="" && ($type == "yes" || $type == "no") )
    {   
        $this->db->where('id',$id);
        $arr_data = $this->master_model->getRecords('tour_photos');
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
        
        if($this->master_model->updateRecord('tour_photos',$arr_update,array('id' => $id)))
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


// =======================================================================================================
    // Get Details of Package
    // public function details($id)
    // {
	// 	$id=base64_decode($id);
    //     if ($id=='') 
    //     {
    //         $this->session->set_flashdata('error_message','Invalid Selection Of Record');
    //         redirect($this->module_url_path.'/index');
    //     }   
        
    //     $fields = "packages.*,academic_years.year";
    //     $this->db->where('packages.id',$id);
    //     $this->db->join("academic_years", 'packages.academic_year=academic_years.id','left');
    //     $arr_data = $this->master_model->getRecords('packages',array('packages.is_deleted'=>'no'),$fields);
        
    //     $this->arr_view_data['arr_data']        = $arr_data;
    //     $this->arr_view_data['page_title']      = $this->module_title." Details ";
    //     $this->arr_view_data['module_title']    = $this->module_title;
    //     $this->arr_view_data['module_url_path'] = $this->module_url_path;
    //     $this->arr_view_data['middle_content']  = $this->module_view_folder."details";
    //     $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    // }
   
   
}