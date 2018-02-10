<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class crone_job extends CI_Controller {
  function __Construct(){
  parent::__Construct ();
     
   $this->load->model('common_model'); 
   
}
	public function index()
	{
		if ($this->common_model->send_notification_on_retirement()->num_rows() > 0){
			foreach ($$this->common_model->send_notification_on_retirement()->result() as $row) {
				   if (different_in_days($row->Post_EndDate,date('Y-m-d'))=>14){
				   	///send email to ALL FINANCE
		            $emaillist=$this->common_model->get_all_head_and_senior_finance_mail();
		            foreach ( $emaillist as $row) {
		            $email=$row->Email;
		             $subject="REQUEST NO ".$row->Post_Id.' NEED TO BE RETIRED';
		            $msg="Hello".$row->First_Name;
		            echo "A travel  request with ID  ".  $row->Post_Id." is  overdue!, please contact the ".$row->EmploymentNo);
		            $this->common_model->send_email($email,$subject,$msg);	
		            }

		            ///send email to employee
		            $emaillist=$this->common_model->get_employee_mail($row->Post_Id);
		            foreach ( $emaillist as $row) {
		            $email=$row->Email;
		            $subject=$post_id.' IS OVER DUE';
		            $msg="Hello".$row->First_Name;
		            echo "Your travel  with ID  ".  $post_id." need to be retired please retire it to the respective personel");
		            echo "Thanks for your good cooperation!"
		            $this->common_model->send_email($email,$subject,$msg);	
		            }
				   }
			}
		}



		  
	}
}