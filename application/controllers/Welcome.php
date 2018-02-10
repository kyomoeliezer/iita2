<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class welcome extends CI_Controller {
	
  function __construct()
	{
	   parent::__construct();		 
	   $this->load->model('post_model','',TRUE);
	   $this->load->model('welcome_model','',TRUE);
	   $this->load->model('payment_model','',TRUE);

	}	

 public function index()
	{
		
		$this->load->view('login');
	}

function tologin()
{
	 $data['title']='Mifumotz Technologies ';
	$this->load->view('backend/common/header'); 
	$this->load->view('backend/to_login');

}

function forget_password()
    {
 
	    	$data['title']='Mifumotz CRM ';
		   $this->load->library('form_validation');
		   //$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean')
		
		   $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email|callback_check_forget_email');

		   if($this->form_validation->run() == FALSE)
		   { 
	     		$this->load->view('backend/common/header'); 
		 		$this->load->view('backend/forget_password');
		   }
		  
    }
function send_test_mail()
{
	$this->load->library('email');

$subject = 'TESTING EMAIL FROM IITA ATM';
$message = '<p style="color:green;">This message has been sent for testing from <b> Advance managment system </b>.</p>';

// Get full html:
$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
    <title>' . html_escape($subject) . '</title>
    <style type="text/css">
        body {
            font-family: Arial, Verdana, Helvetica, sans-serif;
            font-size: 16px;
        }
    </style>
</head>
<body>
' . $message . '
</body>
</html>';
// Also, for getting full html you may use the following internal method:
//$body = $this->email->full_html($subject, $message);

$result = $this->email
    ->from('info@mifumotz.com')
    ->reply_to('kyomo89elieza@gmail.com')    // Optional, an account where a human being reads.
    ->to('H.Mrisha@cgiar.org')
    ->cc('kyomo89elieza@gmail.com')
    ->subject($subject)
    ->message($body)
    ->send();
exit;
}



 public function login()
	{
   $this->load->library('form_validation');
 
   $this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'password', 'trim|xss_clean|callback_check_database');
   //echo $this->input->post('email');
   //echo $this->input->post('email');
 
   if($this->form_validation->run() == FALSE)
   { 
     $this->load->view('login');
   }
   else
   {
	   /*if($this->session->userdata['logged_in']['password']==md5('123999')){*/
	   	if($this->session->userdata['logged_in']['email']==md5('123999')){
		     redirect('Login/change_password');  
	   }
	   else {
			    $url=$this->session->userdata('last_page');
			   
			   if ((! empty($url)) && (substr($url,0) !='w') ){

			    redirect($url, 'refresh');
			    }
				 //Go to private area
				else{
				if ($this->session->userdata['logged_in']['Finance_Officer_Role']==1) redirect('home', 'refresh');
			     else if ($this->session->userdata['logged_in']['Senior_Finance_Role']==1) redirect('home', 'refresh');
				
				else if ($this->session->userdata['logged_in']['Head_Finance_Role']==1) redirect('home', 'refresh');
				else if ($this->session->userdata['logged_in']['Asistant_accountant_Role']==1) redirect('post/approved', 'refresh');
				else if ($this->session->userdata['logged_in']['Cashier_Role']==1) redirect('post/approved', 'refresh');
				else if ($this->welcome_model->check_if_is_employee_only($this->session->userdata['logged_in']['id']) > 0 ) redirect('employee_statuscheck/request_status', 'refresh');
				}
           }	
	}


	}
 function test_login_id()
  {
    echo $this->welcome_model->check_if_is_employee_only($this->session->userdata['logged_in']['id']);
  }
	
function check_database($password)
{
   //Field validation succeeded.  Validate against database
   $email = $this->input->post('email');
   $results=$this->welcome_model->employee_by_email_password($email,$password);
   if($results->num_rows() > 0)
   {
       foreach ($results->result() as $row) {
       	
       
       $sess_array = array(
       	'id' => $row->Employee_Id,
         'email' => $email,
         'Employee_Role'=>$row->Employee_Role,
         'Budget_Holder_Role'=>$row->Budget_Holder_Role,
         'Senior_Finance_Role'=>$row->Senior_Finance_Role,
         'Head_Finance_Role'=>$row->Head_Finance_Role,
         'Finance_Officer_Role'=>$row->Finance_Officer_Role,
         'Asistant_accountant_Role'=>$row->Asistant_accountant,
         'Cashier_Role'=>$row->Cashier_Role
       );
        }
       
       $this->session->set_userdata('logged_in', $sess_array);
     
     return TRUE;
   }
   else
   {
     
     $this->form_validation->set_message('check_database', 'Invalid username or Password');
     return false;
	 
   }
}

function send_email($email_to,$subject,$message)
		{
			$this->email->from(company_email,company_name);
			$this->email->to($email_to); 
			$this->email->subject($subject);
			$this->email->message($message);	

			$this->email->send();

		}

function check_forget_email($email)
   {
   	$result = $this->post_model->forget_pass_email($email);
     	if ($result->num_rows() > 0){
     		 foreach ($result->result() as $row) {
     		 	$Firstname=$row->FirstName;
     		 }
                    $data= array('Password' => md5('4321*') );
                     $this->db->where('Email',$email);
                     $this->db->update('demo_acc',$data);

                     $msg='Hello '.$Firstname.'<br/><br/>Welcom!  Your new password is 4321*.  Click the link below to login<br/><a href="'.base_url().'Login/verify_login">Mifumotz CRM Login</a>
                     <br/><br/>Thanks for trying mifumotz CRM. If you have more problems please call us on +255752350620 or reply to this mail.';
     		        $this->send_email($Firstname,'info@mifumotz.com',$email,'New Password', $msg);
                     redirect("Login/tologin");	

                	    } 
			 else
			   {
			     
			     $this->form_validation->set_message('check_forget_email', 'Email not registered');
			     return false;
				 
			   }


   }

function change_password()
{
   $data['title']='M-CRM Customer Relation Manager ';
   //This method will have the credentials validation
   $this->load->library('form_validation');
   $data['email']=$this->session->userdata['logged_in']['email'];
   $data['name']=$this->session->userdata['logged_in']['name'];
   $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');
   $this->form_validation->set_rules('cpassword', 'cpassword', 'trim|required|xss_clean'); 
	   if($this->form_validation->run() == FALSE)
	   { 
		  $this->load->view('backend/common/header'); 
		  $this->load->view('backend/change_password', $data);
	   }
	else{
		 $data=array(
		   'Password'=> md5($this->input->post('password'))
		   );
		   $this->post_model->update_pass($data,$this->session->userdata['logged_in']['id']);
				$url=$this->session->userdata('last_page');
				   if(!empty($url)) redirect($url, 'refresh');
					 //Go to private area
					else{
					//var_dump( $this->session->userdata('logged_in'));
					if ($this->session->userdata['logged_in']['Previlage']=='SuperAgent') redirect('Tickets/complaints', 'refresh');
				   else if ($this->session->userdata['logged_in']['Previlage']=='Agent') redirect('Tickets/inbounds_reports', 'refresh');
					else if ($this->session->userdata['logged_in']['Previlage']=='Attendant') redirect('Attendant_Ticket/assigned_tickets', 'refresh');
					} 
	  }   
}

function logout()
   {
   	$this->session->unset_userdata('logged_in');
	$this->session->unset_userdata('last_page');
	$this->session->sess_destroy();
	redirect('welcome','refresh');
   }
/*function dashboard()
   {
   	$data['title']='Advance and Travel Management';
   $this->load->view('common/head');
   $this->load->view('common/top-menu');
   $this->load->view('common/sidemenu');
   $data['sum_summary']=$this->payment_model->get_post_summary_first_home_panel();
   $data['number_summary']=$this->payment_model->get_post_number_first_home_panel();
   $data['top5_unretired']=$this->payment_model->get_top5_unretired_home_panel();
    $data['piechart']=$this->payment_model->get_post_summary_home_panel_piechart();
   $this->load->view('home',$data);
   //$this->load->view('common/include_footer');

   }*/

	
}
?>
