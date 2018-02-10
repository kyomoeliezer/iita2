<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class home extends CI_Controller {
	
  function __construct()
	{

	   parent::__construct();
	    if (!$this->session->userdata('logged_in'))
        { 
        $this->session->set_userdata('last_page', current_url());
         			                           
               redirect('welcome/login');  
        }		 
	   $this->load->model('post_model','',TRUE);
	   $this->load->model('welcome_model','',TRUE);
	   $this->load->model('payment_model','',TRUE);

	}	

 public function index()
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

   }

	
}
?>
