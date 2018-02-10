<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class account extends CI_Controller {
  function __Construct(){
  parent::__Construct ();
   if (!$this->session->userdata('logged_in'))
        { 
        $this->session->set_userdata('last_page', current_url());
         			                           
               redirect('welcome/login');  
        } 
$this->load->model('account_model'); 
$this->load->model('post_model'); 
   
}
	public function newaccount()
	{
		  $data['title']='Advance and Travel Management';
		   $this->load->view('common/head');
		   $this->load->view('common/top-menu');
		   $this->load->view('common/sidemenu');
		   $this->load->library('form_validation');
		   $this->form_validation->set_rules('Account_Number', 'Account number', 'trim|required|xss_clean|is_unique[account.AccountNo]');
		   $this->form_validation->set_message('is_unique', 'Account is already registered.');
		    $this->form_validation->set_rules('Description', 'Description', 'trim|xss_clean');
		   

		   if($this->form_validation->run() == FALSE)
		   { 
		   	$this->load->view('account/new_account');
		    $this->load->view('common/footer');
		   }
		   else
		   {
		   	$data = array('AccountNo' => $this->input->post('Account_Number'),
		   		          'Account_Description' => $this->input->post('Description'),
		   		          'Date_Created'=>date('Y-m-d H:i:s')
		   	             );
            $this->account_model->insert_account($data);
            $this->session->set_flashdata('message_name',
				 'Success! Account Created');
            redirect('account/newaccount');
            
		   }
	
		
		
	}
	public function index()
	{
		$data['title']='Advance and Travel Management';
		$this->load->view('common/head');
		$this->load->view('common/top-menu');
		$this->load->view('common/sidemenu');
		$data['accountlist']=$this->account_model->accounts();


		$this->load->view('account/accountlist',$data);
		//$this->load->view('common/table_footer');
	}
function edit_account()
  {
	  	
	  	 $accountid=$this->uri->segment(3);
	  	$this->load->library('form_validation');
	   $this->form_validation->set_rules('Account_Number', 'Account number', 'trim|required|xss_clean');
	    $this->form_validation->set_rules('Description', 'Description', 'trim|xss_clean');

	   if($this->form_validation->run() == FALSE)
	   { 


	   	$data['accountlist']=$data1=$this->account_model->account_by_id($accountid);
	  
	   	$this->load->view('modal/account/modal_edit_account',$data); 
	   	$this->load->view('modal/modal_footer',$data);

	   }
	  else {
	  		$data = array('AccountNo' => $this->input->post('Account_Number'),
		   		          'Account_Description' => $this->input->post('Description'),
		   		          
		   	             );
	  	 $this->account_model->update_account($data,$this->input->post('Account_Id'));	
	  	  $this->session->set_flashdata('message_name',
				 'Success! Account Updated');
	     }
  }
 function activate_account()
  {
	  	$centerid=$this->uri->segment(3);
	  	$this->load->library('form_validation');
	   $this->form_validation->set_rules('active', 'active status', 'trim|required|xss_clean');

	   if($this->form_validation->run() == FALSE)
	   { 
	   	$data['centerlist']=$this->center_model->center_by_id($centerid);
	   	$this->load->view('modal/center/modal_activate_center',$data); 
	   	/*$this->load->view('modal/modal_footer',$data);*/

	   }
	  else {
	  		$data = array('Active_Status' => 1
		   	             );
	  	 $this->center_model->update_center($data,$this->input->post('CenterId'));	
	  	  $this->session->set_flashdata('message_name',
				 'Success! Center activated');
	     }
  }
   function deactivate_account()
  {
	   $accountid=$this->uri->segment(3);
	   $this->load->library('form_validation');
	   $this->form_validation->set_rules('active', 'active status', 'trim|required|xss_clean');

	   if($this->form_validation->run() == FALSE)
	   { 
	   	$data['accountlist']=$this->account_model->account_by_id($accountid);
	   	$this->load->view('modal/account/modal_deactivate_account',$data); 
	   	/*$this->load->view('modal/modal_footer',$data);*/

	   }
	  else {
	  		$data = array('Active_Status' => 0
		   	             );
	  	 $this->account_model->update_account($data,$this->input->post('Account_Id'));	
	  	  $this->session->set_flashdata('message_name',
				 'Success! Account deactivated');
	     }
  }
  	public function account_payments()
	{
		$data['account']=$account_id=$this->uri->segment(3);
		$data['title']='Advance and Travel Management';
		$this->load->view('common/head');
		$this->load->view('common/top-menu');
		$this->load->view('common/sidemenu');
		//$data['postlist']=$this->post_model->posts_all_info();
		$data['paidlist']=$this->post_model->post_by_account($account_id);


		$this->load->view('account/acc_payments',$data);
		//$this->load->view('common/table_footer');
	}
   


}
