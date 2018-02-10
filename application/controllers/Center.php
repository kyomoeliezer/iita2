<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class center extends CI_Controller {
  function __Construct(){
  parent::__Construct ();
      if (!$this->session->userdata('logged_in'))
        { 
        $this->session->set_userdata('last_page', current_url());
         			                           
               redirect('welcome/login');  
        }

   $this->load->model('center_model'); 
   $this->load->model('employee_model');
    $this->load->library('csvimport');
}
	public function newcenter()
	{
		  $data['title']='Advance and Travel Management';
		   $this->load->view('common/head');
		   $this->load->view('common/top-menu');
		   $this->load->view('common/sidemenu');
		   $this->load->library('form_validation');
		   $this->form_validation->set_rules('Center_Number', 'Center number', 'trim|required|xss_clean|is_unique[center.CenterNo]');
		   $this->form_validation->set_message('is_unique', 'Center is already registered.');
		    $this->form_validation->set_rules('Description', 'Description', 'trim|xss_clean');
		    $this->form_validation->set_rules('BudgetHolder', 'budget holder', 'trim|required|xss_clean');
		   $this->form_validation->set_rules('StartDate', 'StartDate', 'trim|required|xss_clean');
		   $this->form_validation->set_rules('EndDate', 'EndDate', 'trim|required|xss_clean');

		   if($this->form_validation->run() == FALSE)
		   { 
		   	$data['personlist']=$this->employee_model->get_budget_holders();
		   	$this->load->view('center/new_center',$data);
		    $this->load->view('common/footer');
		   }
		   else
		   {
		   	$data = array('CenterNo' => $this->input->post('Center_Number'),
		   		          'Center_Created_By'=>$this->session->userdata['logged_in']['id'],
		   		          'Budget_Holder_ReservedId'=>$this->input->post('BudgetHolder'),
		   		          'Center_Description' => $this->input->post('Description'),
		   		          'StartDate'=>$this->input->post('StartDate'),
		   		          'EndDate'=>$this->input->post('EndDate'),

		   		          'Date_Created'=>date('Y-m-d H:i:s')
		   	             );
            $this->center_model->insert_center($data);
            $this->session->set_flashdata('message_name',
				 'Success! Center Created');
            redirect('center/newcenter');
            
		   }
	
		
		
	}
	public function index()
	{
		$data['title']='Advance and Travel Management';
		$this->load->view('common/head');
		$this->load->view('common/top-menu');
		$this->load->view('common/sidemenu');
		$data['centerlist']=$this->center_model->centerlist();


		$this->load->view('center/centerlist',$data);
		//$this->load->view('common/table_footer');
	}
function edit_center()
  {
	  	$centerid=$this->uri->segment(3);
	  	$this->load->library('form_validation');
	   $this->form_validation->set_rules('Center_Number', 'Center number', 'trim|required|xss_clean');
	    $this->form_validation->set_rules('Description', 'Description', 'trim|xss_clean');
	   $this->form_validation->set_rules('StartDate', 'StartDate', 'trim|required|xss_clean');
	   $this->form_validation->set_rules('EndDate', 'EndDate', 'trim|required|xss_clean');
	   $this->form_validation->set_rules('BudgetHolder', 'Budget holder', 'trim|required|xss_clean');

	   if($this->form_validation->run() == FALSE)
	   { 
	   	$data['personlist']=$this->employee_model->get_budget_holders();
	   	$data['centerlist']=$this->center_model->center_by_id($centerid);
	   	$this->load->view('modal/center/modal_edit_center',$data); 
	   	/*$this->load->view('modal/modal_footer',$data);*/

	   }
	  else {
	  		$data = array('CenterNo' => $this->input->post('Center_Number'),
		   		          'Center_Description' => $this->input->post('Description'),
		   		          'StartDate'=>$this->input->post('StartDate'),
		   		          'EndDate'=>$this->input->post('EndDate'),
		   		          'Budget_Holder_ReservedId' => $this->input->post('BudgetHolder')
		   	             );
	  	  $this->center_model->update_center($data,$this->input->post('CenterId'));
	  	  $this->session->set_flashdata('message_name',
				 'Success! Center Updated');
	  	  
	     }
  }
 function activate_center()
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

function newcenter_import()
		{
				   $data['title']='Advance and Travel Management';
				   $this->load->view('common/head');
				   $this->load->view('common/top-menu');
				   $this->load->view('common/sidemenu');
				   $this->load->library('form_validation');
                    $this->form_validation->set_rules('attach_test', 'test status', 'trim|required|xss_clean');
					if($this->form_validation->run() == FALSE)
					   { 
					   	
					   	$this->load->view('center/new_center_import',$data);
					    $this->load->view('common/footer');
					   }
					else{
					   //attach a file
			            $file_name='center_'.replace_slashe_to_underscore(date('Y-m-d-H-i-s'));
			            $upload_path = './import/center/';
			            $attach_error=$this->common_model->do_upload_custom($file_name,$upload_path,'attach');
			            /////
			             $config['file_name']          = $file_name;
					    $config['upload_path']          = $upload_path;
					    $config['overwrite'] = TRUE;
				        $config['allowed_types']        = 'pdf|csv';
				        $config['max_size']             = 1009000;
			            ////
			            if ($attach_error !=''){
			            	$data['error']=$attach_error;
			            	$this->load->view('center/new_center_import',$data);
					      $this->load->view('common/footer');
			              }
                        else{   $this->load->library('upload', $config);
            	              	$file_data = $this->upload->data();
							  	$file_path =  './import/center/'.$file_data['file_name'];
							  	/////////////get the list
							  	//var_dump($file_data);
							  	// $this->csvimport->get_array($file_path);
								 if ($this->csvimport->get_array($file_path)) {
					                $csv_array = $this->csvimport->get_array($file_path);
					                foreach ($csv_array as $row) {
					                    $insert_data = array(
					                        'CenterNo'=>$row['Cost_CenterNo'],
					                        'Center_Description'=>$row['Center_Description'],
					                        'StartDate'=>date_2_dbformat($row['Start_Date']),
					                        'EndDate'=>date_2_dbformat($row['End_Date']),
					                        'Budget_Holder_ReservedId'=>$row['Budget_Holder_Id'],
					                        'Center_Created_By'=>$this->session->userdata['logged_in']['id']
					                        

					                    );

					                    $this->center_model->insert_center($insert_data);
					                }
					                $this->session->set_flashdata('message_name', 'Csv Data Imported Succesfully');
					                redirect('center');
					            }
					            else{
                                    $data['error']='Error occured!, contact the admin to fix it';
					                $this->load->view('center/new_center_import',$data);
					                $this->load->view('common/footer');

                                   }
                            }
						}
                }

   


}
