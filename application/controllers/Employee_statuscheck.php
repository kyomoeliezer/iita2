<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class employee_statuscheck extends CI_Controller {
  function __Construct(){
  parent::__Construct ();
   if (!$this->session->userdata('logged_in'))
        { 
        $this->session->set_userdata('last_page', current_url());
         			                           
               redirect('welcome/login');  
        }
   $this->load->model('payment_model');
   $this->load->model('post_model'); 
   $this->load->model('employee_model');
   $this->load->model('center_model'); 
   $this->load->model('account_model'); 
   $this->load->model('common_model'); 
}
function request_status()
  {
   $data['title']='Advance and Travel Management';
   $this->load->view('common/head');
   $this->load->view('common/top-menu');
   $this->load->view('common/sidemenu');
   $data['postlist']=$this->post_model->get_post_status_by_loginid($this->session->userdata['logged_in']['id']);
   $this->load->view('employee_statuscheck/post_status',$data);
  }
function retirement_status()
  {
     $data['title']='Advance and Travel Management';
     $this->load->view('common/head');
     $this->load->view('common/top-menu');
     $this->load->view('common/sidemenu');
     $data['request_status_login_id']=$this->post_model->get_post_status_by_loginid($this->session->userdata['logged_in']['id']);
     $this->load->view('employee_statuscheck/post_status',$data);
  }

}
