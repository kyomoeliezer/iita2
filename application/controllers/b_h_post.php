<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class b_h_post extends CI_Controller {
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
		$data['postlist']=$this->post_model->posts_all_info();


		$this->load->view('b_h/b_h_postlist',$data);
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

function b_h_review_post()
  {
	  	
	  	 $Request_Details_Id=$this->uri->segment(3);
	  	  $data['title']='Advance and Travel Management';
		    $this->load->view('common/head');
		    $this->load->view('common/top-menu');
		    $this->load->view('common/sidemenu');
            $data['postlist']=$this->post_model->postdetail_by_id($Request_Details_Id);
	   	    $this->load->view('b_h/b_h_review_post',$data); 
	   	    $this->load->view('common/footer');
	 }

function b_h_approve()
         {
              
         	$data = array('Budget_Holder' => 'approved');
         	$this->post_model->update_post_request_detail($data,$this->uri->segment(3)); 
         	$this->session->set_flashdata('message_name',
				 'Success! Post approved');
	  	     redirect('b_h_post');

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
		   $post1=explode('x',$this->uri->segment(3));
		   $data['Post_Id']=$post1[0];
		   $data['rq_Id']=$post1[1];
		   $this->load->library('form_validation');
		   $this->form_validation->set_rules('reject', 'reject', 'trim|required|xss_clean');

		   if($this->form_validation->run() == FALSE)
		   { 
		   	
		   	$this->load->view('modal/post_action/b_h/modal_b_h_review_post_reject',$data); 
		   	$this->load->view('modal/modal_footer',$data);

		   }
		  else {
		  		$data2 = array('Budget_Holder' => 'rejected',
		  			          'Rejection_Reason' => $this->input->post('Reject_Reason')
		  	                  );
		  	  $this->post_model->update_post_request_detail($data2,$this->input->post('Req_Id'));
		  	    $data_post = array('Post_Status' => 'rejected' );
		  	  $this->post_model->update_post($data_post,$this->input->post('Post_Id'));	
		  	  $this->session->set_flashdata('message_name',
					 'Success! Post Rejected');
		     }
	  }
    function very_post()
  {
	   $data['Post_Id']=$this->uri->segment(3);
	   $this->load->library('form_validation');
	   $this->form_validation->set_rules('reject', 'reject', 'trim|required|xss_clean');

	   if($this->form_validation->run() == FALSE)
	   { 
	   	
	   	$this->load->view('modal/post_action/modal_b_h_review_post_reject',$data); 
	   	$this->load->view('modal/modal_footer',$data);

	   }
	  else {
	  		/*$data = array('Active_Status' => 0
		   	             );
	  	 $this->account_model->update_account($data,$this->input->post('Account_Id'));*/	
	  	  $this->session->set_flashdata('message_name',
				 'Success! Account deactivated');
	  	  redirect('b_h_post');
	     }
  }
   


}
