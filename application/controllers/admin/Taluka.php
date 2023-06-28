<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Taluka extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
	    $this->arr_view_data = [];
        if($this->session->userdata('chy_admin_id')=="") 
        { 
                redirect(base_url().'admin/login'); 
        }
		
        $this->module_url_path    =  base_url().$this->config->item('admin_panel_slug')."/taluka";
        $this->module_title       = "Taluka Master";
        $this->module_url_slug    = "taluka";
        $this->module_view_folder = "taluka/";
	}

	public function index()
	{  
        // $this->db->order_by('id','desc');
        // $this->db->where('is_deleted','no');
        // $arr_data = $this->master_model->getRecords('state');

        $fields = "taluka_table.*,country.country_name,.state.state_name,district_table.district";
        $this->db->order_by('taluka_table.id','asc');        
        $this->db->where('taluka_table.is_deleted','no');        
        $this->db->join("country", 'taluka_table.country_id=country.id','left');
        $this->db->join("state", 'taluka_table.state_id=state.id','left');
        $this->db->join("district_table", 'taluka_table.district_id=district_table.id','left');
        $arr_data = $this->master_model->getRecords('taluka_table',array('taluka_table.is_deleted'=>'no'),$fields);

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

        if($this->input->post('submit'))
        {
            $this->form_validation->set_rules('country_id', 'country id', 'required');
            $this->form_validation->set_rules('state_id', 'state id', 'required');
            $this->form_validation->set_rules('district_id', 'district id', 'required');
            $this->form_validation->set_rules('taluka', 'taluka', 'required');

            if($this->form_validation->run() == TRUE)
            {
                $country_id = $this->input->post('country_id');
                $state_id = $this->input->post('state_id');
                $district_id = $this->input->post('district_id');
                $taluka = $this->input->post('taluka');

                $arr_insert = array(
                    'country_id'   =>   $country_id,
                    'state_id'   =>   $state_id,
                    'district_id'   =>   $district_id,
                    'taluka'   =>   $taluka
                    
                );
                

                $this->db->where('taluka',$taluka);
                $this->db->where('is_deleted','no');
                $this->db->where('is_active','yes');
                $city_exist_data = $this->master_model->getRecords('taluka_table');
                if(count($city_exist_data) > 0)
                {
                    $this->session->set_flashdata('error_message',"Taluka ".$taluka." Already Exist.");
                    redirect($this->module_url_path.'/add');
                }
                
                $inserted_id = $this->master_model->insertRecord('taluka_table',$arr_insert,true);
                               
                if($inserted_id > 0)
                {    
                    $this->session->set_flashdata('success_message',"District Added Successfully.");
                    redirect($this->module_url_path.'/index');
                }
                else
                {
                    $this->session->set_flashdata('error_message'," Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/index');
            }   
        }


        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $country_name_data = $this->master_model->getRecords('country');


        $this->arr_view_data['action']          = 'add';
        $this->arr_view_data['page_title']      = " Add ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['country_name_data']    = $country_name_data;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

    
   
  // Active/Inactive
  
  public function active_inactive($id,$type)
    {
        if(is_numeric($id) && ($type == "yes" || $type == "no") )
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('taluka_table');
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
            
            if($this->master_model->updateRecord('taluka_table',$arr_update,array('id' => $id)))
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
        
        if(is_numeric($id))
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('taluka_table');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }

            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('taluka_table',$arr_update,$arr_where))
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
        if ($id=='') 
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }   

        if(is_numeric($id))
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('taluka_table');

            foreach($arr_data  as $arr_data_info){
                $district_id = $arr_data_info['district_id'];
            }

            if($this->input->post('submit'))
            {
                $this->form_validation->set_rules('country_id', 'country id', 'required');
                $this->form_validation->set_rules('state_id', 'state id', 'required');
                $this->form_validation->set_rules('district_id', 'district id', 'required');
                $this->form_validation->set_rules('taluka', 'taluka', 'required');

                if($this->form_validation->run() == TRUE)
                {
                    $country_id = $this->input->post('country_id');
                    $state_id = $this->input->post('state_id');
                    $district_id = $this->input->post('district_id');
                    $taluka = $this->input->post('taluka');

                    $this->db->where('taluka',$taluka);
                    $this->db->where('id!='.$id);
                    $this->db->where('is_deleted','no');
                    $city_exist_data = $this->master_model->getRecords('taluka_table');

                    if(count($city_exist_data) > 0)
                    {
                        $this->session->set_flashdata('error_message',"Taluka ".$taluka." Already Exist.");
                        redirect($this->module_url_path.'/add');
                    }

                   $arr_update = array(
                    'country_id'   =>   $country_id,
                    'state_id'   =>   $state_id,
                    'district_id'   =>   $district_id,
                    'taluka'   =>   $taluka
                    
                    );

                    $arr_where     = array("id" => $id);
                    $this->master_model->updateRecord('taluka_table',$arr_update,$arr_where);

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
        else
        {
            $this->session->set_flashdata('error_message','Invalid Selection Of Record');
            redirect($this->module_url_path.'/index');
        }


        $this->db->order_by('id','desc');
        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $country_data = $this->master_model->getRecords('country');
        // print_r($country_data); die;

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $state_name_data = $this->master_model->getRecords('state');

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->where('state_id',$district_id);
        $district_name_data = $this->master_model->getRecords('district_table');

        $this->arr_view_data['arr_data']        = $arr_data;
        $this->arr_view_data['state_name_data']        = $state_name_data;
        $this->arr_view_data['district_name_data']        = $district_name_data;
        $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
        $this->arr_view_data['module_title']    = $this->module_title;
        $this->arr_view_data['country_data']    = $country_data;
        $this->arr_view_data['module_url_path'] = $this->module_url_path;
        $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
        $this->load->view('admin/layout/admin_combo',$this->arr_view_data);
    }

    public function get_state(){ 
        // POST data 
        // $all_b=array();
       $state_data = $this->input->post('did');
        // print_r($boarding_office_location); die;
                        $this->db->where('is_deleted','no');
                        $this->db->where('is_active','yes');
                        $this->db->where('country_id',$state_data);   
                        $data = $this->master_model->getRecords('state');
        echo json_encode($data);
    }

    public function get_district(){ 
        // POST data 
        // $all_b=array();
       $district_data = $this->input->post('did');
        // print_r($boarding_office_location); die;
                        $this->db->where('is_deleted','no');
                        $this->db->where('is_active','yes');
                        $this->db->where('state_id',$district_data);   
                        $data = $this->master_model->getRecords('district_table');
        echo json_encode($data);
    }
   
}