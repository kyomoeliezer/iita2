<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class employee extends CI_Controller {
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
	public function newemployee()
	{
		  $data['title']='Advance and Travel Management';
		   $this->load->view('common/head');
		   $this->load->view('common/top-menu');
		   $this->load->view('common/sidemenu');
		   $this->load->library('form_validation');
		   $this->form_validation->set_rules('EmployeeId', 'Employee Id', 'trim|required|xss_clean|is_unique[employee.EmploymentNo]');
		    $this->form_validation->set_rules('FirstName', 'FirstName', 'trim|required|xss_clean');
		    $this->form_validation->set_rules('LastName', 'LastName', 'trim|required|xss_clean');
		    $this->form_validation->set_rules('MiddleName', 'MiddleName', 'trim|xss_clean');
		   $this->form_validation->set_rules('Email', 'Email', 'trim|required|xss_clean|valid_email');
		   $this->form_validation->set_rules('Mobile', 'Mobile', 'trim|required|xss_clean');
		   $this->form_validation->set_rules('AccountNo', 'Account number', 'trim|xss_clean');
		   $this->form_validation->set_rules('budgetholder', 'budget holder', 'trim|xss_clean');
		   $this->form_validation->set_rules('employee', 'employee', 'trim|xss_clean');
		   $this->form_validation->set_rules('financeofficer', 'finance officer', 'trim|xss_clean');
		   $this->form_validation->set_rules('seniorfinance', 'senior finance ', 'trim|xss_clean');
		   $this->form_validation->set_rules('Asistant_accountant', 'assistant account', 'trim|xss_clean');
		   $this->form_validation->set_rules('headadmins', 'head admins ', 'trim|xss_clean');
		   $this->form_validation->set_rules('Bank_Id', 'bank name', 'trim|xss_clean');
		   

		   if($this->form_validation->run() == FALSE)
		   { 
		   	$data['banks']=$this->employee_model->get_banks();
		   	$this->load->view('employee/new_employee',$data);
		    $this->load->view('common/footer');
		   }
		   else
		   {

		   	$data = array('EmploymentNo' => $this->input->post('EmployeeId'),
		   		          'First_Name' => $this->input->post('FirstName'),
		   		          'fk_employee_Bank_Id'=>$this->input->post('Bank_Id'),
		   		          'Middle_Name' => $this->input->post('MiddleName'),
		   		          'Last_Name' => $this->input->post('LastName'),
		   		          'Email' => $this->input->post('Email'),
		   		          'password' =>'password',
		   		          'Mobile' => $this->input->post('Mobile'),
		   		          'BankAccountNo' => $this->input->post('AccountNo'),
		   		          'fk_user_Employee_Id'=>$this->session->userdata['logged_in']['id'],
		   		          'Created_By'=>$this->session->userdata['logged_in']['id'],
		   		          'Employee_Created_Date'=>date('Y-m-d H:i:s')
		   	             );
		   	$employ_id=$this->employee_model->insert_employee($data);

		   	$data_employee = array(
		   				  'Finance_Officer_Role'=>$this->input->post('financeofficer'),
		   		          'Employee_Role'=> $this->input->post('employee'),
		   		          'Asistant_accountant' => $this->input->post('Asistant_accountant'),
		   		          'Senior_Finance_Role' => $this->input->post('seniorfinance'),
		   		          'Head_Finance_Role' => $this->input->post('headadmins'),
		   		          'Cashier_Role' => $this->input->post('Cashier'),
		   		          'fk_role_Employee_Id'=>$employ_id
		   	             );

            $this->employee_model->insert_role($data_employee);
            $this->session->set_flashdata('message_name',
				 'Success! Employee Added');
            foreach ($this->common_model->get_senior_head_mail as $row) {
             $msg ='';
             $email=$row->Email;
             $subject="NEW EMPLOYEE CREATED NEED YOUR APPROVAL";
             $msg .="Hello &nbsp;&nbsp;<b>".$row->First_Name.'</b><br>';
            $msg .= "A new employee with Person Acc No  ".  $this->input->post('EmployeeId')." have been created please login to activate it
            <br/>";
            $msg .="Thanks for  using the system!";
            $this->common_model->send_email($email,$subject,$msg);
            	
            }
            
            
            redirect('employee/newemployee');
            
		   }
	
		
		
	}
public function index()
	{   	$data['head']='Employees';
		$data['title']='Advance and Travel Management';
		$this->load->view('common/head');
		$this->load->view('common/top-menu');
		$this->load->view('common/sidemenu');
		$data['employeeslist']=$this->employee_model->employees();


		$this->load->view('employee/employeelist',$data);
		//$this->load->view('common/table_footer');
	}
function inactive_employee()
       {
       	$data['head']='Inactive Employees';
       	$data['title']='Advance and Travel Management';
       	$data['head']='Inactive Employee';
		$this->load->view('common/head');
		$this->load->view('common/top-menu');
		$this->load->view('common/sidemenu');
		$data['employeeslist']=$this->employee_model->inactive_employee();


		$this->load->view('employee/inactive_employeelist',$data);
       	
       }
function rejected_employee()
       {
       	
       	$data['head']='Rejected Employee';

		$this->load->view('common/head');
		$this->load->view('common/top-menu');
		$this->load->view('common/sidemenu');
		$data['employeeslist']=$this->employee_model->rejected_employee();


		$this->load->view('employee/rejected_employeelist',$data);
       	
       }
function edit_employee()
  {
	  	$EmployeeId=$this->uri->segment(3);
	  	$this->load->library('form_validation');
	   $this->form_validation->set_rules('EmployeeId', 'Employee Id', 'trim|required|xss_clean');
	    $this->form_validation->set_rules('FirstName', 'FirstName', 'trim|required|xss_clean');
	    $this->form_validation->set_rules('LastName', 'LastName', 'trim|required|xss_clean');
	    $this->form_validation->set_rules('MiddleName', 'MiddleName', 'trim|xss_clean');
	   $this->form_validation->set_rules('Email', 'Email', 'trim|required|xss_clean|valid_email');
	   $this->form_validation->set_rules('Mobile', 'Mobile', 'trim|required|xss_clean');
	   $this->form_validation->set_rules('AccountNo', 'Account number', 'trim|required|xss_clean');
	     $this->form_validation->set_rules('budgetholder', 'budget holder', 'trim|xss_clean');
		   $this->form_validation->set_rules('employee', 'employee', 'trim|xss_clean');
		   $this->form_validation->set_rules('financeofficer', 'finance officer', 'trim|xss_clean');
		   $this->form_validation->set_rules('seniorfinance', 'senior finance ', 'trim|xss_clean');
		   $this->form_validation->set_rules('Asistant_accountant', 'assistant account', 'trim|xss_clean');
		   $this->form_validation->set_rules('headadmins', 'head admins ', 'trim|xss_clean');
		   $this->form_validation->set_rules('Bank_Id', 'bank name', 'trim|xss_clean');
	   if($this->form_validation->run() == FALSE)
	   { 
	   	$data['employeelist']=$this->employee_model->employee_by_id($EmployeeId);
	   	$this->load->view('modal/employee/modal_edit_employee',$data); 
	   	/*$this->load->view('modal/modal_footer',$data);*/

	   }
	  else {
	  		$data = array('EmploymentNo' => $this->input->post('EmployeeId'),
		   		          'First_Name' => $this->input->post('FirstName'),
		   		          'Middle_Name' => $this->input->post('MiddleName'),
		   		          'Last_Name' => $this->input->post('LastName'),
		   		          'fk_employee_Bank_Id'=>$this->input->post('Bank_Id'),
		   		          'Email' => $this->input->post('Email'),
		   		          'Mobile' => $this->input->post('Mobile'),
		   		          'Active_Status' =>0,
		   		          'BankAccountNo' => $this->input->post('AccountNo')
		   		          
		   	             );
	  		$this->employee_model->update_employee($data,$this->input->post('Employee_Id'));
	  	    $employ_id=$this->input->post('Employee_Id');

		   	$data_employee = array(
		   				  'Finance_Officer_Role'=>$this->input->post('financeofficer'),
		   		          'Employee_Role'=> $this->input->post('employee'),
		   		          'Asistant_accountant' => $this->input->post('Asistant_accountant'),
		   		          'Senior_Finance_Role' => $this->input->post('seniorfinance'),
                          'Cashier_Role' => $this->input->post('Cashier'),
		   		          'Head_Finance_Role' => $this->input->post('headadmins')
		   		         
		   	             );
         $this->employee_model->update_role($data_employee,$this->input->post('Employee_Id'));
         foreach ($this->common_model->get_senior_head_mail as $row) {
         	$msg ='';
            	$email=$row->Email;
            $subject="UPDATED EMPLOYEE NEED YOUR APPROVAL";
             $msg="Hello &nbsp;&nbsp;<b>".$row->First_Name.'</b><br>';
            $msg .= "A new employee with Person Acc No  ".  $this->input->post('EmployeeId')." have been updated please login to activate it
            <br/>";
            $msg .="Thanks for  using the system!";
            $this->common_model->send_email($email,$subject,$msg);
            	
            }
	  	  $this->session->set_flashdata('message_name',
				 'Success! Employee Updated');
	     }
  }

  function deactivate_employee()
  {
	  	$EmployeeId=$this->uri->segment(3);
	  	$this->load->library('form_validation');
	   $this->form_validation->set_rules('active', 'active status', 'trim|required|xss_clean');

	   if($this->form_validation->run() == FALSE)
	   { 
	   	$data['employeelist']=$this->employee_model->employee_by_id($EmployeeId);
	   	$this->load->view('modal/employee/modal_deactivate_employee',$data); 
	   	/*$this->load->view('modal/modal_footer',$data);*/

	   }
	  else {
	  		$data = array('Active_Status' => 0, 'Reject_Reason'=>$this->input->post('Reason')
		   	             );
	  	 $this->employee_model->update_employee($data,$this->input->post('Employee_Id'));	
	  	  $this->session->set_flashdata('message_name',
				 'Success! Employee deactivated');
	     }
   }
   function reject_employee()
  {
	  	$EmployeeId=$this->uri->segment(3);
	  	$this->load->library('form_validation');
	   $this->form_validation->set_rules('active', 'active status', 'trim|required|xss_clean');

	   if($this->form_validation->run() == FALSE)
	   { 
	   	$data['employeelist']=$this->employee_model->employee_by_id($EmployeeId);
	   	$this->load->view('modal/employee/modal_reject_employee',$data); 
	   	/*$this->load->view('modal/modal_footer',$data);*/

	   }
	  else {
	  		$data = array('Active_Status' => 2, 'Reject_Reason'=>$this->input->post('Reason')
		   	             );
	  	 $this->employee_model->update_employee($data,$this->input->post('Employee_Id'));	
	  	  $this->session->set_flashdata('message_name',
				 'Success! Employee Rejected');
	     }
   }
 function activate_employee()
	  {
		  	$EmployeeId=$this->uri->segment(3);
		  	$this->load->library('form_validation');
		   $this->form_validation->set_rules('active', 'active status', 'trim|required|xss_clean');

		   if($this->form_validation->run() == FALSE)
		   { 
		   	$data['employeelist']=$this->employee_model->employee_by_id($EmployeeId);
		   	$this->load->view('modal/employee/modal_senior_finance_activate_employee',$data); 
		   	/*$this->load->view('modal/modal_footer',$data);*/

		   }
		  else {
		  		$data = array('Active_Status' => 1,
		  			          'Activated_Date' => date('Y-m-d H:i:s'),
		  			          'Activated_By' => $this->session->userdata['logged_in']['id']
			   	             );
		  	 $this->employee_model->update_employee($data,$this->input->post('Employee_Id'));	
		  	  $this->session->set_flashdata('message_name',
					 'Success! Employee deactivated');
		     }
	   }

function newemployee_import()
		{
				   $data['title']='Advance and Travel Management';
				   $this->load->view('common/head');
				   $this->load->view('common/top-menu');
				   $this->load->view('common/sidemenu');
				   $this->load->library('form_validation');
                    $this->form_validation->set_rules('attach_test', 'test status', 'trim|required|xss_clean');
					if($this->form_validation->run() == FALSE)
					   { 
					   	
					   	$this->load->view('employee/new_employee_import',$data);
					    $this->load->view('common/footer');
					   }
					else{
					   //attach a file
			            $file_name='employees_'.replace_slashe_to_underscore(date('Y-m-d-H-i-s'));
			            $upload_path = './import/employees/';
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
			            	$this->load->view('employee/new_employee_import',$data);
					      $this->load->view('common/footer');
			              }
                        else{   $this->load->library('upload', $config);
            	              	$file_data = $this->upload->data();
							  	$file_path =  './import/employees/'.$file_data['file_name'];
							  	/////////////get the list
							  	//var_dump($file_data);
							  	// $this->csvimport->get_array($file_path);
								 if ($this->csvimport->get_array($file_path)) {
					                $csv_array = $this->csvimport->get_array($file_path);
					                
					                foreach ($csv_array as $row) {
					                	$bank_id=$this->employee_model->get_bank_id_by_name($row['BankName']);
					                	if ($bank_id ==0){ $bank_id=''; }
					                    $insert_data = array(
					                        'First_Name'=>$row['FirstName'],
					                        'Last_Name'=>$row['LastName'],
					                        'Middle_Name'=>$row['MiddleName'],
					                        'EmploymentNo'=>$row['Reserved'],
					                        'fk_employee_Bank_Id'=>$bank_id,
					                        'Email'=>$row['Email'],
					                        'Mobile'=>$row['Mobile'],
					                        'BankAccountNo'=>$row['BankAccountNo'],
					                        'fk_user_Employee_Id'=>$this->session->userdata['logged_in']['id']

					                    );
					                   	$employ_id=$this->employee_model->insert_employee($insert_data);

									   	$data_employee_role = array(
									   		          'Employee_Role'=>1,
									   		          'fk_role_Employee_Id'=>$employ_id
									   	             );

							            $this->employee_model->insert_role($data_employee_role);
					                }
					                $this->session->set_flashdata('message_name', 'Csv Data Imported Succesfully');
					                redirect('employee/inactive_employee');
					            }
					            else{
                                    $data['error']='Error occured!, contact the admin to fix it';
					                $this->load->view('employee/new_employee_import',$data);
					                $this->load->view('common/footer');

                                   }
                            }
						}
                }




}
