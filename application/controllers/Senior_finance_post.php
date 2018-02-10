<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class senior_finance_post extends CI_Controller {
  function __Construct(){
  parent::__Construct ();
         if (!$this->session->userdata('logged_in'))
        { 
        $this->session->set_userdata('last_page', current_url());
         			                           
               redirect('welcome/login');  
        }
   $this->load->model('post_model'); 
   $this->load->model('employee_model');
   $this->load->model('center_model'); 
   $this->load->model('account_model');
   $this->load->model('payment_model');  
   //$this->load->model('common_model');
}

public function index()
	{
		$data['title']='Advance and Travel Management';
		$this->load->view('common/head');
		$this->load->view('common/top-menu');
		$this->load->view('common/sidemenu');
		$data['postlist']=$this->post_model->siniorfinance_posts_all_info();
		$this->load->view('senior_finance/senior_finance_postlist',$data);
		//$this->load->view('common/table_footer');
	}
public function rejectedposts()
	{
		$data['title']='Advance and Travel Management';
		$this->load->view('common/head');
		$this->load->view('common/top-menu');
		$this->load->view('common/sidemenu');
		$data['postlist']=$this->post_model->rejected_posts_all_info();


		$this->load->view('b_h/b_h_rejectedpostlist',$data);
		//$this->load->view('common/table_footer');
	}

function senior_finance_review_post()
  {
	  	
	  	    $postid=$this->uri->segment(3);
	  	    $data['title']='Advance and Travel Management';
		    $this->load->view('common/head');
		    $this->load->view('common/top-menu');
		    $this->load->view('common/sidemenu');
        $data['travel_list']=$this->post_model->get_travel_list($postid);
        $data['postlist']=$this->post_model->postdetail_by_id($postid);
        $data['requestlist']=$this->post_model->get_request_amounts($postid);
	   	    $this->load->view('senior_finance/review_post',$data); 
	   	    $this->load->view('common/footer');
	 }

function approve()
         {
              
         	$data = array('Senior_Finance' => 'approved');
          $postid=$this->uri->segment(3);
         	$this->post_model->update_post($data,$this->uri->segment(3));
	  		  	   ///send email to ALL FINANCE
          $emaillist=$this->common_model->get_all_head_and_senior_finance_mail();
            foreach ( $emaillist as $row) {
            $email=$row->Email;
             $subject="YOUR REQUEST NO ".$post_id.' HAVE BEEN APPROVED BY SENIOR FINANCE';
            /*$msg="Hello".$row->First_Name;*/
            $msg="Hello &nbsp;&nbsp;<b>".$row->First_Name.'</b><br>';
             $msg .= "a travel  request with ID  ".  $post_id." have been APPROVED by Sinior Finance";
            $this->common_model->send_email($email,$subject,$msg);	
            }

            ///send email to employee
            $emaillist=$this->common_model->get_employee_mail($post_id);
            foreach ( $emaillist as $row) {
            $email=$row->Email;
            $subject="YOUR REQUEST NO ".$post_id.' HAVE BEEN APPROVED BY SENIOR FINANCE';
            /*$msg="Hello".$row->First_Name;*/
            $msg="Hello &nbsp;&nbsp;<b>".$row->First_Name.'</b><br>';
            $msg .="Your travel  request with ID  ".  $post_id." have been APPROVED by Sinior  Finance ";
            $this->common_model->send_email($email,$subject,$msg);	
            }
         	$this->session->set_flashdata('message_name',
				 'Success! Post approved');
	  	     redirect('senior_finance_post');

         }

 function delete_post()
  {
	  	$postid=$this->uri->segment(3);
	  	
	  	if ($this->post_model->delete_post($postid)){
	  		$this->session->set_flashdata('message_name',
				 'Success! Center activated');
         
	  	}
	  	else{
	  	          $this->session->set_flashdata('message_name',
				 'Failed! '.$postid.' Not deleted ,foreign key constraint');
	  	     }
     redirect('post'); 
	  	  
	    
  }

  function reject_post()
  {
	   $postid=$this->uri->segment(3);
	   $data['Post_Id']=$postid;
	   
	   $this->load->library('form_validation');
	   $this->form_validation->set_rules('reject', 'reject', 'trim|required|xss_clean');

	   if($this->form_validation->run() == FALSE)
	   { 
	   	
	   	$this->load->view('modal/post_action/senior_finance/modal_review_post_reject',$data); 
	   	$this->load->view('modal/modal_footer',$data);

	   }
       else {
		  		$data = array('Senior_Finance' => 'rejected',
		  			           'Post_Status' => 'rejected',
		  			           'Rejection_Reason' => $this->input->post('Reject_Reason')
		  	                  );
		  	  $this->post_model->update_post($data,$this->input->post('Post_Id'));
		  	  		  	   ///send email to ALL FINANCE
            $emaillist=$this->common_model->get_all_head_and_senior_finance_mail();
            foreach ( $emaillist as $row) {
            $email=$row->Email;
             $subject="REQUEST NO ".$post_id.' HAVE BEEN REJECTED';
            $msg="Hello &nbsp;&nbsp;<b>".$row->First_Name.'</b><br>';
            $msg .= "A travel  request with ID  ".  $post_id." have been REJECTED by Sinior of Finance due to  ".strtoupper($this->input->post('Reject_Reason'));
            $this->common_model->send_email($email,$subject,$msg);	
            }

            ///send email to employee
            $emaillist=$this->common_model->get_employee_mail($this->input->post('Post_Id'));
            foreach ( $emaillist as $row) {
            $email=$row->Email;
            $subject="YOUR REQUEST NO ".$post_id.' HAVE BEEN REJECTED';
           $msg ="Hello &nbsp;&nbsp;<b>".$row->First_Name.'</b><br>';
            $msg .= "Your travel  request with ID  ".  $post_id." have been REJECTED by Sinior of Finance due to  ".strtoupper($this->input->post('Reject_Reason'));
            $this->common_model->send_email($email,$subject,$msg);	
            }	
		  	  $this->session->set_flashdata('message_name',
					 'Success! Post Rejected');
		     }
  }
function reject_retirement()
   {
     $postid=$this->uri->segment(3);
     $data['Post_Id']=$postid;
     
     $this->load->library('form_validation');
     $this->form_validation->set_rules('reject', 'reject', 'trim|required|xss_clean');

     if($this->form_validation->run() == FALSE)
     { 
      
      $this->load->view('modal/post_action/senior_finance/modal_reject_retirement',$data); 
      $this->load->view('modal/modal_footer',$data);

     }
  else {
          $data2 = array(
                       'Retirement_Status' => 'rejected',
                      'Rejection_Reasoan_Retirement' => $this->input->post('Reject_Reason')
                          );
          $this->payment_model->update_payment_by_Post_id($data2,$this->input->post('Post_Id'));
           ///send email to ALL FINANCE
            $emaillist=$this->common_model->get_all_head_and_senior_finance_mail();
            foreach ( $emaillist as $row) {
            $email=$row->Email;
             $subject="Retirement for  ".$post_id.' have been rejected';
            $msg="Hello &nbsp;&nbsp;<b>".$row->First_Name.'</b><br>';
            $msg .= "A travel  retirement with ID  ".  $post_id." have been REJECTED by Senior Finance due to  ".strtoupper($this->input->post('Reject_Reason'));
            $this->common_model->send_email($email,$subject,$msg);  
            }

            ///send email to employee
            $emaillist=$this->common_model->get_employee_mail($this->input->post('Post_Id'));
            foreach ( $emaillist as $row) {
            $email=$row->Email;
            $subject="Your retirement for  ".$post_id.' have been rejected';
            $msg="Hello &nbsp;&nbsp;<b>".$row->First_Name.'</b><br>';
            $msg .="Your travel  request with ID  ".  $post_id." have been REJECTED by Senior Finance due to  ".strtoupper($this->input->post('Reject_Reason'));
            $this->common_model->send_email($email,$subject,$msg);  
            } 
          $this->session->set_flashdata('message_name',
           'Success! Retirement Rejected');
          redirect('payment/retired_list');
         }

   }
 function approve_retirement()
         {
            $post_id=  $this->uri->segment(3);
          $get_pay_detail=$this->payment_model->payment_in_get_change($this->uri->segment(3));
          foreach ($get_pay_detail as $row) {
           $change=abs($row->Payment_Amount_Out_Origin - $row->Cash_Retired_Origin);
          }
          if ($change > 0)  $data = array('Retirement_Status' => 'approved');
          else if ($change == 0){  $data = array('Retirement_Status' => 'closed',
              
              'closing_id'=>$this->session->userdata['logged_in']['id'],
                     'closing_date'=>date('Y-m-d H:i:s') );

        }
         
          $this->payment_model->update_payment_by_Post_id($data,$this->uri->segment(3));
               ///send email to ALL FINANCE
          $emaillist=$this->common_model->get_all_head_and_senior_finance_mail();
            foreach ( $emaillist as $row) {
            $email=$row->Email;
             $subject="Request retirent for ".$post_id.' have been APPROVED by Senior Finance';
            /*$msg="Hello".$row->First_Name;*/
            $msg="Hello &nbsp;&nbsp;<b>".$row->First_Name.'</b><br>';
             $msg .= "A travel  retirement with ID  ".  $post_id." have been APPROVED by Sinior Finance";
            $this->common_model->send_email($email,$subject,$msg);  
            }

            ///send email to employee
            $emaillist=$this->common_model->get_employee_mail($post_id);
            foreach ( $emaillist as $row) {
            $email=$row->Email;
            $subject="Your Request retirent for ".$post_id.' have been APPROVED by Senior Finance';
            /*$msg="Hello".$row->First_Name;*/
            $msg="Hello &nbsp;&nbsp;<b>".$row->First_Name.'</b><br>';
             $msg .= "A travel  retirement with ID  ".  $post_id." have been APPROVED by Sinior Finance";
            $this->common_model->send_email($email,$subject,$msg);  
            }
          $this->session->set_flashdata('message_name',
         'Success! Retirement approved');
           redirect('payment/retired_list');

         }


}
