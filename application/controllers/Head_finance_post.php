<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class head_finance_post extends CI_Controller {
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
}

public function index()
	{
		$data['title']='Advance and Travel Management';
		$this->load->view('common/head');
		$this->load->view('common/top-menu');
		$this->load->view('common/sidemenu');
		$data['postlist']=$this->post_model->headfinance_posts_all_info();


		$this->load->view('head_finance/head_finance_postlist',$data);
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

function head_finance_review_post()
  {
		  	$postid=$this->uri->segment(3);
		  	$data['title']='Advance and Travel Management';
		    $this->load->view('common/head');
		    $this->load->view('common/top-menu');
		    $this->load->view('common/sidemenu');
            $data['travel_list']=$this->post_model->get_travel_list($postid);
            $data['postlist']=$this->post_model->postdetail_by_id($postid);
            $data['requestlist']=$this->post_model->get_request_amounts($postid);
	   	    $this->load->view('head_finance/review_post',$data); 
	   	    $this->load->view('common/footer');
	 }

function approve()
         {
            $post_id=$this->uri->segment(3);
         	$data_post = array('
         		 Post_Status' => 'approved',
         		 'Head_Finance_Admin' => 'approved' );
         	$this->post_model->update_post($data_post,$post_id); 
         	$this->session->set_flashdata('message_name',
				 'Success! Post approved');
         			 ///send email to ALL FINANCE
            $emaillist=$this->common_model->get_all_head_and_senior_finance_mail();
            foreach ( $emaillist as $row) {
            $email=$row->Email;
             $subject="REQUEST NO ".$post_id.' HAVE BEEN APPROVED';
            $msg="Hello &nbsp;&nbsp;<b>".$row->First_Name.'</b><br>';
            $msg .= "A travel  request with doc number  ".  $post_id." have been approved, it is now waiting for payment";
            $this->common_model->send_email($email,$subject,$msg);	
            }
            ///send email to CASHIER
            $emaillist=$this->common_model->get_all_cashier_mail();
            foreach ( $emaillist as $row) {
            $email=$row->Email;
             $subject="REQUEST NO ".$post_id.' HAVE BEEN APPROVED';
            $msg="Hello &nbsp;&nbsp;<b>".$row->First_Name.'</b><br>';
            $msg .= "A travel  request with doc number  ".  $post_id." have been approved, it is now waiting for your payment";
            $this->common_model->send_email($email,$subject,$msg);  
            }

            ///send email to employee
            $emaillist=$this->common_model->get_employee_mail($post_id);
            foreach ( $emaillist as $row) {
            $email=$row->Email;
            $subject="YOUR REQUEST NO ".$post_id.' HAVE BEEN APPROVED';
            $msg="Hello &nbsp;&nbsp;<b>".$row->First_Name.'</b><br>';
            $msg .= " Your travel request with doc number  ".  $post_id." have been approved, it is now waiting for payment";
            $this->common_model->send_email($email,$subject,$msg);	
            }
 
	  	     redirect('head_finance_post');

         }


function reject_post()
  {
	   $data['Post_Id']=$this->uri->segment(3);
	   $this->load->library('form_validation');
	   $this->form_validation->set_rules('reject', 'reject', 'trim|required|xss_clean');

	   if($this->form_validation->run() == FALSE)
	   { 
	   	
	   	$this->load->view('modal/post_action/head_finance/modal_review_post_reject',$data); 
	   	$this->load->view('modal/modal_footer',$data);

	   }
  else {
		  		$data2 = array(
		  			           'Post_Status' => 'rejected',
		  			          'Head_Finance_Admin' => 'rejected',
		  			          'Rejection_Reason' => $this->input->post('Reject_Reason')
		  	                  );
		  	  $this->post_model->update_post($data2,$this->input->post('Post_Id'));
		  	   ///send email to ALL FINANCE
            $emaillist=$this->common_model->get_all_head_and_senior_finance_mail();
            foreach ( $emaillist as $row) {
            $email=$row->Email;
             $subject="REQUEST NO ".$post_id.' HAVE BEEN REJECTED';
            $msg="Hello &nbsp;&nbsp;<b>".$row->First_Name.'</b><br>';
            $msg .= "A travel  request with ID  ".  $post_id." have been REJECTED by Head of Finance due to  ".strtoupper($this->input->post('Reject_Reason'));
            $this->common_model->send_email($email,$subject,$msg);	
            }

            ///send email to employee
            $emaillist=$this->common_model->get_employee_mail($this->input->post('Post_Id'));
            foreach ( $emaillist as $row) {
            $email=$row->Email;
            $subject="YOUR REQUEST NO ".$post_id.' HAVE BEEN REJECTED';
            $msg="Hello &nbsp;&nbsp;<b>".$row->First_Name.'</b><br>';
            $msg .="Your travel  request with ID  ".  $post_id." have been REJECTED by Head of Finance due to  ".strtoupper($this->input->post('Reject_Reason'));
            $this->common_model->send_email($email,$subject,$msg);	
            }	
		  	  $this->session->set_flashdata('message_name',
					 'Success! Post Rejected');
		     }
  }
   
}
