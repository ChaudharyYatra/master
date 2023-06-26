<?php 
//   Controller for: home page
// Author: Mahesh Mhaske
// Start Date: 16-08-2022
// last updated: 16-08-2022
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_general_enquiry extends CI_Controller {
	 
	function __construct() {

        parent::__construct();
        if($this->session->userdata('agent_sess_id')=="") 
        { 
                redirect(base_url().'agent/login'); 
        }
        $this->module_url_path    =  base_url().$this->config->item('agent_panel_slug')."/contact_general_enquiry";
        $this->module_url_path_domestic_followup    =  base_url().$this->config->item('agent_panel_slug')."/general_enquiry_followup";
		$this->module_url_path_booking_basic_info    =  base_url().$this->config->item('agent_panel_slug')."/booking_basic_info";
        $this->module_title       = "General Enquiries";
        $this->module_title_followup       = "General Enquiry Followup";
        $this->module_url_slug    = "contact_general_enquiry";
        $this->module_view_folder = "contact_general_enquiry/";
        $this->arr_view_data = [];
	 }

     public function index()
     {
         $agent_sess_name = $this->session->userdata('agent_name');
         $id=$this->session->userdata('agent_sess_id');

        $record = array();
        $fields = "enquiries.*,agent.agent_name,packages.tour_title";
        $this->db->order_by('enquiries.created_at','desc');
        $this->db->where('enquiries.is_deleted','no');
        $this->db->where('enquiries.booking_process','no');
        $this->db->where('enquiries.agent_id',$id);
        $this->db->join("agent", 'enquiries.agent_id=agent.id','left');
        $this->db->join("packages", 'enquiries.tour_number=packages.id','left');
        $this->db->order_by("enquiries.id", "desc");
        $arr_data = $this->master_model->getRecords('enquiries',array('enquiries.is_deleted'=>'no'),$fields);
        // print_r($arr_data); die;

        $this->db->where('is_deleted','no');
        $this->db->where('status','approved');
        $followup_reason_data = $this->master_model->getRecords('followup_reason');
        
         $this->arr_view_data['followup_reason_data'] = $followup_reason_data;
         $this->arr_view_data['agent_sess_name']        = $agent_sess_name;
         $this->arr_view_data['module_url_path_domestic_followup'] = $this->module_url_path_domestic_followup;
         $this->arr_view_data['listing_page']    = 'yes';
         $this->arr_view_data['arr_data']        = $arr_data;
         $this->arr_view_data['page_title']      = $this->module_title." List";
         $this->arr_view_data['module_title']    = $this->module_title;
         $this->arr_view_data['module_title_followup']    = $this->module_title_followup;
         $this->arr_view_data['module_url_path_booking_basic_info'] = $this->module_url_path_booking_basic_info;
         $this->arr_view_data['module_url_path'] = $this->module_url_path;
         $this->arr_view_data['middle_content']  = $this->module_view_folder."index";
         $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
        
     }

  
     public function domestic_followup()
   {
       $agent_sess_name = $this->session->userdata('agent_name');
       $id=$this->session->userdata('agent_sess_id');
        
        if($this->input->post('submit'))
        {
               
            $this->form_validation->set_rules('follow_up_time', 'follow up time', 'required');
            $this->form_validation->set_rules('next_followup_date', 'next follow up time', 'required');
            $this->form_validation->set_rules('follow_up_comment', 'follow up comment', 'required');
            
            if($this->form_validation->run() == TRUE)
            { 
                $follow_up_time  = $this->input->post('follow_up_time'); 
                $next_followup_date  = $this->input->post('next_followup_date');
                $follow_up_comment  = $this->input->post('follow_up_comment'); 
                $enquiry_id  = $this->input->post('enquiry_id'); 
                $followup_reason  = $this->input->post('followup_reason'); 
                $current_date= date('Y-m-d');
                $arr_insert = array(
                    'follow_up_time'   =>   $follow_up_time, 
                    'next_followup_date'   =>   $next_followup_date, 
                    'follow_up_comment'   =>   $follow_up_comment,
                    'general_enquiry_id'   =>   $enquiry_id,
                    'follow_up_date' => $current_date,
                    'followup_reason' => $followup_reason,
                    'ftaken_by' => 'Agent'
                );
                
               $inserted_id = $this->master_model->insertRecord('domestic_followup',$arr_insert,true);

                $this->db->where('is_deleted','no');
                $this->db->where('is_active','yes');
                $this->db->where('id',$id);
                $this->db->order_by('id','DESC');
                $agent_data_email = $this->master_model->getRecord('agent');

                $this->db->where('is_deleted','no');
               //  $this->db->where('is_active','yes');
                $this->db->where('id',$enquiry_id);
                $booking_enquiry_data = $this->master_model->getRecord('booking_enquiry');

                $agent_email=$agent_data_email['email'];
                $agent_name=$agent_data_email['agent_name'];

                $user_email=$booking_enquiry_data['email'];
                $first_name=$booking_enquiry_data['first_name'];
                $last_name=$booking_enquiry_data['last_name'];

               $arr_update = array(
                   'followup_status'   =>   'yes'
               );
               $arr_where     = array("id" => $enquiry_id);
              $this->master_model->updateRecord('enquiries',$arr_update,$arr_where);
                          
				$from_email='chaudharyyatra8@gmail.com';
                if($user_email !='')
                {
                  
                   $msg="<html>
                               <head>
                                   <style type='text/css'>
                                       body {font-family: Verdana, Geneva, sans-serif}
                                   </style>
                               </head>
                               <body background=".base_url()."uploads/email/email1.jpg>
                                   <h3>Dear&nbsp;".$first_name."&nbsp;".$last_name."</h3>
                                   <p>I hope this email finds you well. I am writing to follow up on your inquiry about a tour 
                                       booking with our travel agency.
                                   </p>
                                   <p>I wanted to know if you had any further questions or if you were ready to book the tour. 
                                       If you are ready to book, I can provide you with more details about the tour and the booking process.
                                   </p>
                                   <p>Please let me know if you have any questions or if you would like to proceed with booking your tour. 
                                       I look forward to hearing from you.</p>
                                   <p>Sincerely,</p>
                                   <h5>ChoudharyYatra Company</h5>
                               </body>
                               </html>";
                   // echo $msg;
                   $subject='Thank You For Enquiry';
                   //$this->send_mail($user_email,$from_email,$msg,$subject,$cc=null);
                   // die;
				}
				
				if($agent_email !='')
                {
                   $msg_email="<html>
                               <head>
                                   <style type='text/css'>
                                       body {font-family: Verdana, Geneva, sans-serif}
                                   </style>
                               </head>
                               <body background=".base_url()."uploads/email/email1.jpg>
                                   <h3>Dear&nbsp;".$agent_name."</h3>
                                   <p>I hope this message finds you well. I am writing to let you know that a new inquiry has been encountered in your account from a customer. We would 
                                       appreciate it if you could assist them with their travel-related needs.
                                   </p>
                                   <p>Please review the inquiry details and take the necessary action to resolve the inquiry. If you have any questions or need any additional information, please do 
                                       not hesitate to contact Head Office. 
                                   </p>
                                   <p>Thank you for your prompt attention to this matter.</p>
                                   <p>Sincerely,</p>
                                   <h5>ChoudharyYatra Company</h5>
                                   <a href=".base_url()."admin/login>Click Here</a>
                               </body>
                               </html>";
                               $subject_email=' New Enquiry from customer';
                  // $this->send_mail($agent_email,$from_email,$msg_email,$subject_email,$cc=null);
				}
                    $this->session->set_flashdata('success_message',ucfirst($this->module_title_followup). " Added Successfully.");
                    redirect($this->module_url_path_domestic_followup.'/index/'.$enquiry_id);
                   
                }

                else
                {
                    $this->session->set_flashdata('error_message',"Something Went Wrong While Adding The ".ucfirst($this->module_title).".");
                }
                redirect($this->module_url_path.'/index');
            }  
            else{
               redirect($this->module_url_path.'/index');
           } 
        


   }


     public function delete($id)
     {
        $agent_sess_name = $this->session->userdata('agent_name');
         
         if(is_numeric($id))
         {   
             $this->db->where('id',$id);
             $arr_data = $this->master_model->getRecords('booking_enquiry');
 
             if(empty($arr_data))
             {
                 $this->session->set_flashdata('error_message','Invalid Selection Of Record');
                 redirect($this->module_url_path);
             }
             $arr_update = array('is_deleted' => 'yes');
             $arr_where = array("id" => $id);
                  
             if($this->master_model->updateRecord('enquiries',$arr_update,$arr_where))
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

         $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
     }

    // Edit

    // public function edit($id)
    // {
    //     $agent_sess_name = $this->session->userdata('agent_name');
    //     // $id=$this->session->userdata('agent_sess_id');

    //     if ($id=='') 
    //     {
    //         $this->session->set_flashdata('error_message','Invalid Selection Of Record');
    //         redirect($this->module_url_path.'/index');
    //     }  

    //     if(is_numeric($id))
    //     {   
    //         $this->db->where('id',$id);
    //         $arr_data = $this->master_model->getRecords('enquiries');
    //         if($this->input->post('submit'))
    //         {
    //             $this->form_validation->set_rules('first_name', 'first_name', 'required');
    //             $this->form_validation->set_rules('last_name', 'last_name', 'required');
    //             $this->form_validation->set_rules('email_address', 'email_address', 'required');
    //             $this->form_validation->set_rules('mobile_number', 'mobile_number', 'required');
    //             $this->form_validation->set_rules('wp_mobile_number', 'whatsapp mobile number', 'required');
    //             $this->form_validation->set_rules('gender', 'gender', 'required');
                
                
    //             if($this->form_validation->run() == TRUE)
    //             {
    //                 $first_name  = $this->input->post('first_name'); 
    //                 $last_name  = $this->input->post('last_name'); 
    //                 $mobile_number  = $this->input->post('mobile_number'); 
    //                 $email_address  = $this->input->post('email_address'); 
    //                 $gender  = $this->input->post('gender'); 
    //                 $media_source_name         = $this->input->post('media_source_name');
	// 			 	$wp_mobile_number         = $this->input->post('wp_mobile_number');
                    
    //                 $arr_update = array(
    //                     'first_name'   =>   $first_name,   
    //                     'last_name'   =>   $last_name, 
    //                     'mobile_number'   =>   $mobile_number, 
    //                     'email'   =>   $email_address, 
    //                     'gender'   =>   $gender, 
    //                     'package_id'   =>   $tour_number,
    //                     'media_source_name'    =>$media_source_name,
	// 					'wp_mobile_number'    =>$wp_mobile_number,
    //                  	'other_tour_name'    =>$other_tour_name,
	// 					'MrandMrs'   =>   $mrandmrs,
    //                     'seat_count'    =>$enq_seat_count
    //                 );
    //                 $arr_where     = array("id" => $id);
    //                 $this->master_model->updateRecord('enquiries',$arr_update,$arr_where);
    //                 if($id > 0)
    //                 {
    //                     $this->session->set_flashdata('success_message',$this->module_title." Information Updated Successfully.");
    //                 }
    //                 else
    //                 {
    //                     $this->session->set_flashdata('error_message'," Something Went Wrong While Updating The ".ucfirst($this->module_title).".");
    //                 }
    //                 redirect($this->module_url_path.'/index');
    //             }   
    //         }
    //     }
    //     else
    //     {
    //         $this->session->set_flashdata('error_message','Invalid Selection Of Record');
    //         redirect($this->module_url_path.'/index');
    //     }

    //     $this->db->where('is_deleted','no');
    //     $this->db->where('is_active','yes');
    //     $this->db->order_by('tour_number','ASC');
    //     $packages_data = $this->master_model->getRecords('packages');

    //     $this->db->order_by('id','desc');
    //     $this->db->where('is_deleted','no');
    //     $booking_enquiry_data = $this->master_model->getRecords('enquiries');

    //     $this->db->where('is_deleted','no');
    //     $media_source_data = $this->master_model->getRecords('media_source');

         
    //     $this->arr_view_data['arr_data']        = $arr_data;
    //     $this->arr_view_data['packages_data']        = $packages_data;
    //     $this->arr_view_data['booking_enquiry_data'] = $booking_enquiry_data;
    //     $this->arr_view_data['media_source_data'] = $media_source_data;
    //     $this->arr_view_data['agent_sess_name'] = $agent_sess_name;
    //     $this->arr_view_data['page_title']      = "Edit ".$this->module_title;
    //     $this->arr_view_data['module_title']    = $this->module_title;
    //     $this->arr_view_data['module_url_path'] = $this->module_url_path;
    //     $this->arr_view_data['middle_content']  = $this->module_view_folder."edit";
    //     $this->load->view('agent/layout/agent_combo',$this->arr_view_data);
    // }
	
	   public function send_mail($to_email,$from_email,$msg,$subject,$cc=null) {
         
        $this->load->library('email');
        $mail_config = array();
        $mail_config['smtp_host'] = 'smtp.gmail.com';
        $mail_config['smtp_port'] = '587';
        $mail_config['smtp_user'] = 'chaudharyyatra8@gmail.com';
        $mail_config['_smtp_auth'] = TRUE;
        $mail_config['smtp_pass'] = 'xmjhmjfqzaqyrlht';
        $mail_config['smtp_crypto'] = 'tls';
        $mail_config['protocol'] = 'smtp';
        $mail_config['mailtype'] = 'html';
        $mail_config['send_multipart'] = FALSE;
        $mail_config['charset'] = 'utf-8';
        $mail_config['wordwrap'] = TRUE;
        $this->email->initialize($mail_config);
        $this->email->set_newline("\r\n");
     
       //$from_email = "chaudharyyatra8@gmail.com";
      // $to_email = $to_email;
       //Load email library
       $this->email->from($from_email, 'Choudhary Yatra');
       $this->email->to($to_email);
       $this->email->subject($subject);
       $this->email->message($msg);
       //Send mail
       if($this->email->send())
       {
          //echo "send";
          $this->session->set_flashdata("email_sent","Congragulation Email Send Successfully.");
       }else{
          $this->email->print_debugger();
           echo $this->email->print_debugger(array('headers'));  
          echo "Eroor";
       }
   }


}