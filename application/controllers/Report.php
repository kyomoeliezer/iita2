<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class report extends CI_Controller {
  function __Construct(){
  parent::__Construct ();
      if (!$this->session->userdata('logged_in'))
        { 
        $this->session->set_userdata('last_page', current_url());
         			                           
               redirect('welcome/login');  
        }

   $this->load->model('report_model'); 
   $this->load->model('account_model'); 
   $this->load->model('employee_model'); 
   $this->load->model('center_model'); 
}
function index()
  {
  	 $data['desc']='from the begining';
  	$data['title']='Advance and Travel Management';
  	 $this->load->view('common/head');
	 $this->load->view('common/top-menu');
	 $this->load->view('common/sidemenu');
	 $this->load->library('form_validation');
	 $data['paidlist']=$this->report_model->basic_index_report();
	 //$data['paidlist']=$this->report_model->report_by_account('1527','2017-02-11');
	 $this->load->view('report/basic_index_2',$data);
    
  }
  function payments_lastmonth()
      {

      $data['title']='Advance and Travel Management';
      $data['desc']='For Last Month '.month_2_word_and_year(date('m')-1);
  	 $this->load->view('common/head');
	 $this->load->view('common/top-menu');
	 $this->load->view('common/sidemenu');
	 $this->load->library('form_validation');
	 $data['paidlist']=$this->report_model->payments_report_lastmonth();
	 $this->load->view('report/basic_index_2',$data);

      }
   function payments_retired_lastmonth()
      {

      $data['title']='Advance and Travel Management';
      $data['desc']='For Last Month '.month_2_word_and_year(date('m')-1);
  	 $this->load->view('common/head');
	 $this->load->view('common/top-menu');
	 $this->load->view('common/sidemenu');
	 $this->load->library('form_validation');
	 $data['paidlist']=$this->report_model->payment_retired_report_lastmonth();
	 $this->load->view('report/basic_index_2',$data);

      }
      function payments_unretired_lastmonth()
      {

      $data['title']='Advance and Travel Management';
      $data['desc']='For Last Month '.month_2_word_and_year(date('m')-1);
  	 $this->load->view('common/head');
	 $this->load->view('common/top-menu');
	 $this->load->view('common/sidemenu');
	 $this->load->library('form_validation');
	 $data['paidlist']=$this->report_model->payment_unretired_report_lastmonth();
	 $this->load->view('report/basic_index_2',$data);

      }
      function payments_thisyear()
      {

      $data['title']='Advance and Travel Management';
      $data['desc']='This year '.date('Y');
  	 $this->load->view('common/head');
	 $this->load->view('common/top-menu');
	 $this->load->view('common/sidemenu');
	 $this->load->library('form_validation');
	 $data['paidlist']=$this->report_model->payments_report_thisyear();
	 $this->load->view('report/basic_index_2',$data);

      }
   function payments_retired_thisyear()
      {

      $data['title']='Advance and Travel Management';
      $data['desc']='This year '.date('Y');
  	 $this->load->view('common/head');
	 $this->load->view('common/top-menu');
	 $this->load->view('common/sidemenu');
	 $this->load->library('form_validation');
	 $data['paidlist']=$this->report_model->payment_retired_report_thisyear();
	 $this->load->view('report/basic_index_2',$data);

      }
      function payments_unretired_thisyear()
      {

      $data['title']='Advance and Travel Management';
      $data['desc']='This year '.date('Y');
  	 $this->load->view('common/head');
	 $this->load->view('common/top-menu');
	 $this->load->view('common/sidemenu');
	 $this->load->library('form_validation');
	 $data['paidlist']=$this->report_model->payment_unretired_report_thisyear();
	 $this->load->view('report/basic_index_2',$data);

      }



   function deactivate_center()
  {
	  	$centerid=$this->uri->segment(3);
	  	$this->load->library('form_validation');
	   $this->form_validation->set_rules('active', 'active status', 'trim|required|xss_clean');

	   if($this->form_validation->run() == FALSE)
	   { 
	   	$data['centerlist']=$this->center_model->center_by_id($centerid);
	   	$this->load->view('modal/center/modal_deactivate_center',$data); 
	   	/*$this->load->view('modal/modal_footer',$data);*/

	   }
	  else {
	  		$data = array('Active_Status' => 0
		   	             );
	  	 $this->center_model->update_center($data,$this->input->post('CenterId'));	
	  	  $this->session->set_flashdata('message_name',
				 'Success! Center deactivated');
	     }
  }
 function report_by_account()
 	{
     $data['desc']='from the begining';
  	 $data['title']='Advance and Travel Management';
  	 $this->load->view('common/head');
	 $this->load->view('common/top-menu');
	 $this->load->view('common/sidemenu');
	 $this->load->library('form_validation');
	 $this->form_validation->set_rules('account','account','trim|xss_clean');
	 $this->form_validation->set_rules('startdate', 'startdate', 'trim|xss_clean');
	 $this->form_validation->set_rules('EndDate', 'EndDate', 'trim|xss_clean');
	 $this->form_validation->set_rules('type', 'type', 'trim|xss_clean');
		 if($this->form_validation->run() == FALSE)
		   { 
		   	$data['accountlist']=$this->account_model->accounts();
		   	$this->load->view('report/by_accunt_select',$data);
		   	$this->load->view('common/footer');

		   }
	    else {
          $startdate=$this->input->post('startdate');
         $enddate=$this->input->post('enddate');
         $account=$this->input->post('account');
         if ($account=='all') $account_desc=' ALL ACCOUNT'; else $account_desc=' '.$account.' ';  
         if ($startdate=='') $startdate_desc=''; else $startdate_desc='  FROM '.date_2_userformat($startdate);
         if ($enddate=='') $enddate_desc=''; else $enddate_desc='  TO   '.date_2_userformat($enddate);
        
         $data['search_result_desc']='PAYMENT LIST FOR ACCOUNT: '.$account_desc.$startdate_desc.$enddate_desc;
		 $data['paidlist']=$this->report_model->report_by_account($account,$startdate,$enddate);
		  $data['paidlist_unretired']=$this->report_model->report_by_account_unretired($account,$startdate,$enddate);
		 $this->load->view('report/by_account',$data);
	 	  }

	}
 function report_by_center()
 	{
     $data['desc']='from the begining';
  	 $data['title']='Advance and Travel Management';
  	 $this->load->view('common/head');
	 $this->load->view('common/top-menu');
	 $this->load->view('common/sidemenu');
	 $this->load->library('form_validation');
	 $this->form_validation->set_rules('center','center','trim|xss_clean');
	 $this->form_validation->set_rules('startdate', 'startdate', 'trim|xss_clean');
	 $this->form_validation->set_rules('enddate', 'enddate', 'trim|xss_clean');
	 $this->form_validation->set_rules('type', 'type', 'trim|xss_clean');
		 if($this->form_validation->run() == FALSE)
		   { 
		   	$data['centerlist']=$this->center_model->centers();
		   	$this->load->view('report/by_center_select',$data);
		   	$this->load->view('common/footer');

		   }
	    else {
          $startdate=$this->input->post('startdate');
         $enddate=$this->input->post('enddate');
         $center=$this->input->post('center');
         if ($center=='all') $center_desc=' ALL COST CENTER '; else $center_desc=' '.$center.' ';  
         if ($startdate=='') $startdate_desc=''; else $startdate_desc='  FROM '.date_2_userformat($startdate);
         if ($enddate=='') $enddate_desc=''; else $enddate_desc='  TO   '.date_2_userformat($enddate);
        
         $data['search_result_desc']='PAYMENT LIST FOR COST CENTER: '.$center_desc.$startdate_desc.$enddate_desc;
		 $data['paidlist']=$this->report_model->report_by_center($center,$startdate,$enddate);
		 $data['paidlist_unretired']=$this->report_model->report_by_center_unretired($center,$startdate,$enddate);
		 $this->load->view('report/by_center',$data);
	 	  }

	}
 function report_by_person()
 	{
     $data['desc']='from the begining';
  	 $data['title']='Advance and Travel Management';
  	 $this->load->view('common/head');
	 $this->load->view('common/top-menu');
	 $this->load->view('common/sidemenu');
	 $this->load->library('form_validation');
	 $this->form_validation->set_rules('reserved','reserved','trim|xss_clean');
	 $this->form_validation->set_rules('startdate', 'startdate', 'trim|xss_clean');
	 $this->form_validation->set_rules('enddate', 'enddate', 'trim|xss_clean');
	 $this->form_validation->set_rules('type', 'type', 'trim|xss_clean');
		 if($this->form_validation->run() == FALSE)
		   { 
		   	$data['personlist']=$this->employee_model->employees();
		   	$this->load->view('report/by_reserve_select',$data);
		   	$this->load->view('common/footer');

		   }
	    else {
          $startdate=$this->input->post('startdate');
         $enddate=$this->input->post('enddate');
         $reserved=$this->input->post('reserved');
         if ($reserved=='all') $reserved_desc=' ALL RESERVED'; else $reserved_desc=' '.strtoupper($reserved).' ';  
         if ($startdate=='') $startdate_desc=''; else $startdate_desc='  FROM '.date_2_userformat($startdate);
         if ($enddate=='') $enddate_desc=''; else $enddate_desc='  TO   '.date_2_userformat($enddate);
        
         $data['search_result_desc']='PAYMENT LIST FOR '.$reserved_desc.$startdate_desc.$enddate_desc;
		 $data['paidlist']=$this->report_model->report_by_person($reserved,$startdate,$enddate);
		 $data['paidlist_unretired']=$this->report_model->report_by_person_unretired($reserved,$startdate,$enddate);
		 $data['paidlist_summary']=$this->report_model->report_by_person_summary($reserved,$startdate,$enddate);
		 $this->load->view('report/by_reservedid',$data);
	 	  }

	}
 function report_by_status()
 	{
     $data['desc']='from the begining';
  	 $data['title']='Advance and Travel Management';
  	 $this->load->view('common/head');
	 $this->load->view('common/top-menu');
	 $this->load->view('common/sidemenu');
	 $this->load->library('form_validation');
	 $this->form_validation->set_rules('status','status','trim|xss_clean');
	 $this->form_validation->set_rules('startdate', 'startdate', 'trim|xss_clean');
	 $this->form_validation->set_rules('enddate', 'enddate', 'trim|xss_clean');
	 $this->form_validation->set_rules('type', 'type', 'trim|xss_clean');
		 if($this->form_validation->run() == FALSE)
		   { 
		   	$data['personlist']=$this->employee_model->employees();
		   	$this->load->view('report/by_status_select',$data);
		   	$this->load->view('common/footer');

		   }
	    else {
          $startdate=$this->input->post('startdate');
         $enddate=$this->input->post('enddate');
         $status=$this->input->post('status');
         if ($status=='all') $status_desc=' ALL STATUS '; else $status_desc=' '.strtoupper($status).' ';  
         if ($startdate=='') $startdate_desc=''; else $startdate_desc='  FROM '.date_2_userformat($startdate);
         if ($enddate=='') $enddate_desc=''; else $enddate_desc='  TO   '.date_2_userformat($enddate);
        
         $data['search_result_desc']='PAYMENT LIST FOR '.$status_desc.$startdate_desc.$enddate_desc;
		 $data['paidlist']=$this->report_model->report_by_status($status,$startdate,$enddate);
		 $data['paidlist_unretired']=$this->report_model->report_by_status_unretired($status,$startdate,$enddate);
		/* $data['paidlist_unretired']=$this->report_model->report_by_person_unretired($reserved,$startdate,$enddate);
		 $data['paidlist_summary']=$this->report_model->report_by_person_summary($reserved,$startdate,$enddate);*/
		 $this->load->view('report/by_status',$data);
	 	  }

	}


}
