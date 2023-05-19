<?php 
//   Controller for: home page
// Author: Rupali Patil
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Tour_expenses extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('tour_manager_sess_id')=="") 
        { 
                redirect(base_url().'tour_manager/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('tour_manager_panel_slug')."tour_manager/tour_expenses";
        $this->module_title       = "Tour Expenses";
        $this->module_url_slug    = "tour_expenses";
        $this->module_view_folder = "tour_expenses/";
        $this->arr_view_data = [];
	 }

        public function index()
        {
        $tour_manager_sess_name = $this->session->userdata('tour_manager_name');
        $id = $this->session->userdata('tour_manager_sess_id'); 

        $record = array();
        $fields = "tour_expenses.*,expense_type.expense_type_name,expense_category.expense_category";
        $this->db->where('tour_expenses.is_deleted','no');
        $this->db->order_by('tour_expenses.id','desc');
        $this->db->join("expense_type", 'tour_expenses.expense_type=expense_type.id','left');
        $this->db->join("expense_category", 'tour_expenses.expense_category_id=expense_category.id','left');
        $arr_data = $this->master_model->getRecords('tour_expenses',array('tour_expenses.is_deleted'=>'no'),$fields);
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

        public function add()
        {  
            $tour_manager_sess_name = $this->session->userdata('tour_manager_name');
            $id = $this->session->userdata('tour_manager_sess_id'); 

            $this->db->where('is_deleted','no');
            $this->db->where('is_active','yes');
            $this->db->order_by('id','ASC');
            $expense_type_data = $this->master_model->getRecords('expense_type');
            // print_r($expense_type_data); die;  

        if($this->input->post('submit'))
        {
                $expense_type  = $this->input->post('expense_type');
                $expense_category  = $this->input->post('expense_category');
                $expense_amt  = $this->input->post('expense_amt');
                $expense_date  = $this->input->post('expense_date');
                $tour_expenses_remark  = $this->input->post('tour_expenses_remark');
                
                $arr_insert = array(
                'expense_type' =>   $expense_type,
                'expense_category_id' =>   $expense_category,
                'expense_amt' =>   $expense_amt,
                'expense_date' =>   $expense_date,
                'tour_expenses_remark' =>   $tour_expenses_remark
                ); 
                $inserted_id = $this->master_model->insertRecord('tour_expenses',$arr_insert,true);
                         //sleep(2);
                    
                 if($inserted_id > 0)
                 {
                     $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                     redirect($this->module_url_path.'/index');
                 }
                 else
                 {
                     $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                 }
                //  redirect($this->module_seat_type_room_type.'/add/'.$iid);
                 redirect($this->module_url_path.'/index');
                // }   
        }
 
         $this->arr_view_data['tour_manager_sess_name'] = $tour_manager_sess_name;
         $this->arr_view_data['action']          = 'add';
         $this->arr_view_data['expense_type_data']        = $expense_type_data;
         $this->arr_view_data['page_title']      = " Add ".$this->module_title;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."add";
         $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
    }


    public function edit($id="")
        {  
            // echo $id; die;
            $tour_manager_sess_name = $this->session->userdata('tour_manager_name');
            $iid = $this->session->userdata('tour_manager_sess_id'); 

            $tid=base64_decode($id);
            if ($tid=='') 
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path.'/index');
            }   
            else
            {   
                $this->db->where('id',$tid);
                $arr_data = $this->master_model->getRecords('tour_expenses');
            }
         if($this->input->post('submit'))
         {
            $expense_type  = $this->input->post('expense_type');
            $expense_category  = $this->input->post('expense_category');
            $expense_amt  = $this->input->post('expense_amt');
            $expense_date  = $this->input->post('expense_date');
            $tour_expenses_remark  = $this->input->post('tour_expenses_remark');
                 
                    $arr_update = array(
                        'expense_type' =>   $expense_type,
                        'expense_category_id' =>   $expense_category,
                        'expense_amt' =>   $expense_amt,
                        'expense_date' =>   $expense_date,
                        'tour_expenses_remark' =>   $tour_expenses_remark
                 );
                    $arr_where     = array("id" => $tid);
                    $inserted_id = $this->master_model->updateRecord('tour_expenses',$arr_update,$arr_where);
                        
                 if($inserted_id > 0)
                 {
                     $this->session->set_flashdata('success_message',ucfirst($this->module_title)." Added Successfully.");
                     redirect($this->module_url_path.'/index/'.$tid);
                 }
                 else
                 {
                     $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                 }
                 redirect($this->module_url_path.'/index');
                }   
        //    }

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        $this->db->order_by('id','ASC');
        $expense_type_data = $this->master_model->getRecords('expense_type');
        // print_r($expense_type_data); die;  

        $this->db->where('is_deleted','no');
        $this->db->where('is_active','yes');
        // $this->db->where('id',$iid);
        $this->db->order_by('id','ASC');
        $expense_category_data = $this->master_model->getRecords('expense_category');
        // print_r($expense_category_data); die;  

        $record = array();
        $fields = "tour_expenses.*,expense_type.expense_type_name,expense_category.expense_category";
        $this->db->where('tour_expenses.is_deleted','no');
        $this->db->order_by('tour_expenses.id','desc');
        $this->db->where('tour_expenses.id',$tid);
        $this->db->join("expense_type", 'tour_expenses.expense_type=expense_type.id','left');
        $this->db->join("expense_category", 'tour_expenses.expense_category_id=expense_category.id','left');
        $tour_expenses_all = $this->master_model->getRecords('tour_expenses',array('tour_expenses.is_deleted'=>'no'),$fields);
        // print_r($tour_expenses_all); die;

         $this->arr_view_data['tour_manager_sess_name'] = $tour_manager_sess_name;
         $this->arr_view_data['tour_expenses_all'] = $tour_expenses_all;
         $this->arr_view_data['expense_type_data'] = $expense_type_data;
         $this->arr_view_data['expense_category_data'] = $expense_category_data;
         $this->arr_view_data['page_title']      = " Edit ".$this->module_title;
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
         $this->load->view('tour_manager/layout/agent_combo',$this->arr_view_data);
        }

        // Delete
    
    public function delete($id)
    {
        $tour_manager_sess_name = $this->session->userdata('tour_manager_name');
        $iid = $this->session->userdata('tour_manager_sess_id'); 
        
       $id=base64_decode($id);
        if(is_numeric($id))
        {   
            $this->db->where('id',$id);
            $arr_data = $this->master_model->getRecords('tour_expenses');

            if(empty($arr_data))
            {
                $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                redirect($this->module_url_path);
            }
            $arr_update = array('is_deleted' => 'yes');
            $arr_where = array("id" => $id);
                 
            if($this->master_model->updateRecord('tour_expenses',$arr_update,$arr_where))
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


  public function get_category(){ 
        // POST data 
        // $all_b=array();
       $district_data = $this->input->post('did');
        // print_r($boarding_office_location); die;
                        $this->db->where('is_deleted','no');
                        $this->db->where('is_active','yes');
                        $this->db->where('expense_type',$district_data);   
                        $data = $this->master_model->getRecords('expense_category');
        echo json_encode($data);
  }


}