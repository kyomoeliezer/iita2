<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class banks extends CI_Controller {
  function __Construct(){
  parent::__Construct ();
      if (!$this->session->userdata('logged_in'))
        { 
        $this->session->set_userdata('last_page', current_url());
         			                           
               redirect('welcome/login');  
        }

   $this->load->model('employee_model'); 
   $this->load->library('csvimport');
}

function index()
    {     $data['title']='Advance and Travel Management';
    	  $this->load->view('common/head');
		   $this->load->view('common/top-menu');
		   $this->load->view('common/sidemenu');
		   $data['banks']=$this->employee_model->get_banks();
		   $this->load->view('banks/banklist',$data);

    }

function newbank()
   {

	    $data['title']='Advance and Travel Management';
		   $this->load->view('common/head');
		   $this->load->view('common/top-menu');
		   $this->load->view('common/sidemenu');
		   $this->load->library('form_validation');
		  
		   $this->form_validation->set_rules('bankname', 'bank name', 'trim|required|xss_clean');
		   

		   if($this->form_validation->run() == FALSE)
		   { 
		   	//$data['banks']=$this->employee_model->get_banks();
		   	$this->load->view('banks/new_bank',$data);
		    $this->load->view('common/footer');
		   }
		   else
		   {

		   	$data = array('Bank_Name' => $this->input->post('bankname')
		   	             );
		   	$employ_id=$this->employee_model->insert_banks($data);
		   	 $this->session->set_flashdata('message_name',
				 'Success! Bank Added');
        redirect('banks/');
         }
       



}
function edit_bank()
   {
           $bankid=$this->uri->segment(3);
           if (empty($bankid)){$bankid=$this->input->post('bankid');}
	       $data['title']='Advance and Travel Management';
		   $this->load->view('common/head');
		   $this->load->view('common/top-menu');
		   $this->load->view('common/sidemenu');
		   $this->load->library('form_validation');
		  
		   $this->form_validation->set_rules('bankname', 'bank name', 'trim|required|xss_clean');
		   

		   if($this->form_validation->run() == FALSE)
		   { 
		   	$data['bank']=$this->employee_model->get_bank_id($bankid);
		   	//$data['banks']=$this->employee_model->get_banks();
		   	$this->load->view('banks/edit_bank',$data);
		    $this->load->view('common/footer');
		   }
		   else
		   {
            $bankid=$this->input->post('bankid');
		   	$data = array('Bank_Name' => $this->input->post('bankname')
		   	             );
		   	$employ_id=$this->employee_model->update_banks($data,$bankid);
		   	$this->session->set_flashdata('message_name',
				 'Success! Bank Update');
		   	redirect('banks/');
         }
        
        //redirect('banks/');



}

function newbank_import()
		{
				   $data['title']='Advance and Travel Management';
				   $this->load->view('common/head');
				   $this->load->view('common/top-menu');
				   $this->load->view('common/sidemenu');
				   $this->load->library('form_validation');
                    $this->form_validation->set_rules('attach_test', 'test status', 'trim|required|xss_clean');
					if($this->form_validation->run() == FALSE)
					   { 
					   	
					   	$this->load->view('banks/new_banks_import',$data);
					    $this->load->view('common/footer');
					   }
					else{
					   //attach a file
			            $file_name='banks_'.replace_slashe_to_underscore(date('Y-m-d-H-i-s'));
			            $upload_path = './import/banks/';
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
			            	$this->load->view('banks/newbank_import',$data);
					      $this->load->view('common/footer');
			              }
                        else{   $this->load->library('upload', $config);
            	              	$file_data = $this->upload->data();
							  	$file_path =  './import/banks/'.$file_data['file_name'];
							  	/////////////get the list
							  	//var_dump($file_data);
							  	// $this->csvimport->get_array($file_path);
								 if ($this->csvimport->get_array($file_path)) {
					                $csv_array = $this->csvimport->get_array($file_path);
					                
					                foreach ($csv_array as $row) {
					                	$bank_id=$this->employee_model->get_bank_id_by_name($row['BankName']);
					                	if ($bank_id ==0){ $bank_id=''; }
					                    $insert_data = array(
					                        'Bank_Name'=>$row['BankName'],
					                        
					                        'fk_bank_Employee_Id'=>$this->session->userdata['logged_in']['id']

					                    );
					                   	$this->employee_model->insert_banks($insert_data);

									  
					                }
					                $this->session->set_flashdata('message_name', 'Csv Data Imported Succesfully');
					                redirect('banks/');
					            }
					            else{
                                    $data['error']='Error occured!, contact the admin to fix it';
					                $this->load->view('bank/newbank_import',$data);
					                $this->load->view('common/footer');

                                   }
                            }
						}
                }



}
