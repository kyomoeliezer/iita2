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

   $this->load->model('cashier_model'); 
/*   $this->load->model('employee_model');
   $this->load->model('center_model'); 
   $this->load->model('account_model')*/; 
}