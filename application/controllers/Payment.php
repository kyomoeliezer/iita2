<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class payment extends CI_Controller {
  function __Construct(){
  parent::__Construct ();
   if (!$this->session->userdata('logged_in'))
        { 
        $this->session->set_userdata('last_page', current_url());
         			                           
               redirect('welcome/login');  
        } 

   $this->load->model('payment_model'); 
   $this->load->model('post_model'); 
    $this->load->model('rate_model');
     }
	public function newrate()
	{
		  $data['title']='Advance and Travel Management';
		$this->load->library('form_validation');
        $this->form_validation->set_rules('CountryName', 'country', 'trim|required|xss_clean');
        $this->form_validation->set_rules('CurrencyName', 'currency name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('CurrencyCode', 'currency code', 'trim|required|xss_clean');
        $this->form_validation->set_rules('GBP', 'GBP', 'trim|required|xss_clean');
        $this->form_validation->set_rules('USD', 'USD', 'trim|required|xss_clean');
        $this->form_validation->set_rules('EURO', 'EURO', 'trim|required|xss_clean');
        $this->form_validation->set_rules('YEN', 'YEN', 'trim|required|xss_clean');

	   if($this->form_validation->run() == FALSE)
	   { 
	   	$this->load->view('modal/rate/modal_new_rate');
	   	/*$this->load->view('modal/modal_footer',$data);*/

	   }
	  else {
	  		$data = array('CountryName' => $this->input->post('CountryName'),
	  			           'CurrencyName' => $this->input->post('CurrencyName'),
	  			           'CurrencyCode' => $this->input->post('CurrencyCode'),
	  			           'GBP' => $this->input->post('GBP'),
	  			           'USD' => $this->input->post('USD'),
	  			           'EURO' => $this->input->post('EURO'),
	  			           'YEN' => $this->input->post('YEN'),
	  			           'Currency_Created_Date'=>date('Y-m-d H:i:s')
	  			           
		   	             );
            $this->payment_model->insert_rate($data);
            $this->session->set_flashdata('message_name',
				 'Success! New Rate Added');
            
            
		   }
	
		
		
	}
	public function rate()
	{
		$data['title']='Advance and Travel Management';
		$this->load->view('common/head');
		$this->load->view('common/top-menu');
		$this->load->view('common/sidemenu');
		$data['ratelist']=$this->payment_model->rates();
		$this->load->view('rate/ratelist',$data);
		//$this->load->view('common/table_footer');
	}
function edit_rate()
  {
	  	$currencyid=$this->uri->segment(3);
	  	$this->load->library('form_validation');
        $this->form_validation->set_rules('CountryName', 'country', 'trim|required|xss_clean');
        $this->form_validation->set_rules('CurrencyName', 'currency name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('CurrencyCode', 'currency code', 'trim|required|xss_clean');
        $this->form_validation->set_rules('GBP', 'GBP', 'trim|required|xss_clean');
        $this->form_validation->set_rules('USD', 'USD', 'trim|required|xss_clean');
        $this->form_validation->set_rules('EURO', 'EURO', 'trim|required|xss_clean');
        $this->form_validation->set_rules('YEN', 'YEN', 'trim|required|xss_clean');

	   if($this->form_validation->run() == FALSE)
	   { 
	   	$data['ratelist']=$this->payment_model->rate_by_id($currencyid);
	   	$this->load->view('modal/rate/modal_edit_rate',$data); 
	   	/*$this->load->view('modal/modal_footer',$data);*/

	   }
	  else {
	  		$data = array('CountryName' => $this->input->post('CountryName'),
	  			           'CurrencyName' => $this->input->post('CurrencyName'),
	  			           'CurrencyCode' => $this->input->post('CurrencyCode'),
	  			           'GBP' => $this->input->post('GBP'),
	  			           'USD' => $this->input->post('USD'),
	  			           'EURO' => $this->input->post('EURO'),
	  			           'YEN' => $this->input->post('YEN'),
	  			           'Currency_Update_Date'=>date('Y-m-d H:i:s')
	  			           
		   	             );
	  	 $this->payment_model->update_rate($data,$this->input->post('Currency_Id'));	
	  	  $this->session->set_flashdata('message_name',
				 'Success! Rate Updated');
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

function payin()
	{
		$postid=$this->uri->segment(3);
		$data['title']='Advance and Travel Management';
		$this->load->view('common/head');
		$this->load->view('common/top-menu');
		$this->load->view('common/sidemenu');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('Currency', 'currency', 'trim|required|xss_clean');
	    $this->form_validation->set_rules('Amount', 'Amount', 'trim|required|xss_clean');
	    $this->form_validation->set_rules('Retirement_Type', 'Retire Type', 'trim|required|xss_clean');
	    $this->form_validation->set_rules('Post_Id', 'post', 'trim|required|xss_clean');
	    $this->form_validation->set_rules('Under_Amount', 'under amount', 'trim|xss_clean');
	     $this->form_validation->set_rules('Extra_Amount', 'Over amount', 'trim|xss_clean');
	   if (empty($_FILES['attach_retire']['name']))
				{
				    $this->form_validation->set_rules('attach_retire', 'Attachment', 'required');
				}
	   if($this->form_validation->run() == FALSE)
	   {
	   	if (!empty($this->input->post('Post_Id'))) $postid=$this->input->post('Post_Id');
	   	$data['Post_Id']=$postid;
	    $data['totalamount']=$this->post_model->get_request_total_amount($postid);
		$data['post']=$this->post_model->post_by_id($postid);
		$data['payoutlist']=$this->payment_model->payment_by_postid($postid);
		$data['requestlist']=$this->post_model->get_request_amounts($postid);
		$this->load->view('post/request_detail_retire',$data);
		$this->load->view('common/footer');
	   }
	   else{
	   	
           //Attach retirement doc
			if (! empty($_FILES['attach_retire']['name'])){
	   	         //attach a file
            $file_name='retire_'.$this->input->post('Post_Id');
            $upload_path = './retiredoc/';
            $attach_error=$this->common_model->do_upload_custom($file_name,$upload_path,'attach_retire');
                }
          /////////////////////////////////////////////////////
         //attach return money doc 
          if($this->input->post('Retirement_Type')=='Under Retirement')
            {
            if (! empty($_FILES['attach_receipt']['name'])){
	   	         //attach a file
            
            $file_name='retire_under_'.$this->input->post('Post_Id');
            $upload_path = './retiredoc/underretiredoc';
             
            $attach_error=$this->common_model->do_upload_custom($file_name,$upload_path,'attach_receipt');
                }
               }
            ///
             //atach paid money for over retire
           if($this->input->post('Retirement_Type')=='Over Retirement')
            {
            if (! empty($_FILES['attach_receipt']['name'])){
	   	         //attach a file
            
            $file_name='retire_over_'.$this->input->post('Post_Id');
            $upload_path = './retiredoc/overretiredoc';
             
            $attach_error=$this->common_model->do_upload_custom($file_name,$upload_path,'attach_receipt');
                }
               }
               ///////////////////////////////////////////////////////

	        $rate=$this->rate_model->get_rate_percurrency($this->input->post('Currency'));
	            if ($this->input->post('Currency')=='TZS')
	            {
                         $Amount_in_USD=$this->input->post('Total_Amount')/$rate;
                         $Amount_in_origin=$this->input->post('Total_Amount');

	             }
	             else {
	             	   $Amount_in_origin=$this->input->post('Total_Amount');
                       $Amount_in_USD=$this->input->post('Total_Amount');
	                   }
                
                //----start payment--------///

	                 $data = array('Refference' => $this->input->post('Refference'),
	                 	'Currency' => $this->input->post('Currency'),
	   	  	            'Payment_Amount_In_USD' => $Amount_in_USD, 
	   	  	            'Payment_Amount_In_Origin' => $Amount_in_origin,
	   	  	            'fk_payment_Post_Id' => $this->input->post('Post_Id'),
	   	  	            'Type' =>'payin',
	   	  	            'Cash_Retired_Origin' => $this->input->post('Amount'),

	   	  	            'Retirement_Type'=>$this->input->post('Retirement_Type'),
	   	  	            'Payment_Date' =>date('Y-m-d H:i:s')
	   	                  );
	                 $data_update = array('Post_Status' => 'retired'
		   	             );
	            $this->post_model->update_post($data_update,$this->input->post('Post_Id'));
	            //---end paymment---------//
	            //---start payment list---//
	            //get it
	               $payment_details=$this->post_model->post_details_by_postid($this->input->post('Post_Id'));
	               if (! empty($payment_details)){
	               	foreach ($payment_details as $rowlist) {
	               		
                    if ($this->input->post('Currency')=='TZS')
		                    {
		                    $amount_in_center_orign=$rowlist->Amount;
		                    $amount_in_center_usd=($rowlist->Amount/$rate); 
		                    }
		            else    {
		            	    $amount_in_center_orign=$rowlist->Amount;
		                    $amount_in_center_usd=$rowlist->Amount;
		                    }
	            	   $payment_detail_data = array('fk_details_Request_Details_Id' => $rowlist->Request_Details_Id,
	                 	'pdt_Payment_Amount_In_Origin' => $amount_in_center_orign,
	   	  	            'pdt_Payment_Amount_In_USD' => $amount_in_center_usd
	   	                  );
	            	    $this->payment_model->insert_payment_deteil_list($payment_detail_data);
                        }
	            	}
	           

	            //---end paymentlis----------//

	            $this->payment_model->insert_payment($data);
	          ///send email to ALL FINANCE
	        $post_id=$this->input->post('Post_Id');
            $emaillist=$this->common_model->get_all_head_and_senior_finance_mail();
            foreach ( $emaillist as $row) {
            	$msg ='';
            $email=$row->Email;
             $subject="REQUEST NO ".$this->input->post('Post_Id').' HAVE BEEN RETIRED';
             $msg="Hello &nbsp;&nbsp;<b>".$row->First_Name.'</b><br>';
            $msg .="A travel  request with ID  ".  $post_id." have been RETIRED ";
            $msg .="Thanks for your good cooperation!";
            $this->common_model->send_email($email,$subject,$msg);	
            }
                ///send email to ALL CASHIER 
            $emaillist=$this->common_model->get_all_cashier_mail();
            foreach ( $emaillist as $row) {
            	$msg ='';
            $subject="REQUEST NO ".$this->input->post('Post_Id').' HAVE BEEN RETIRED';
             $msg="Hello &nbsp;&nbsp;<b>".$row->First_Name.'</b><br>';
            $msg .="A travel  request with ID  ".  $post_id." have been RETIRED ";
            $msg .="Thanks for your good cooperation!";
            $this->common_model->send_email($email,$subject,$msg);	
            }

            ///send email to employee
            $emaillist=$this->common_model->get_employee_mail($this->input->post('Post_Id'));
            foreach ( $emaillist as $row) {
            	$msg ='';
                    $subject=$post_id.' HAVE BEEN RETIRED';
             $msg="Hello &nbsp;&nbsp;<b>".$row->First_Name.'</b><br>';
            $msg .="You have retired your travel  request with ID  ".  $post_id."";
            $msg .="Thanks for your good cooperation!";
            $this->common_model->send_email($email,$subject,$msg);	
            }
            ///send email to budget holder
            foreach ($this->post_model->get_request_list_budget_holder($this->input->post('Post_Id')) as $brow){
            	$msg ='';
            	$email=$brow->Email;
             $subject="REQUEST NO ".$this->input->post('Post_Id').' HAVE BEEN RETIRED';
             $msg="Hello &nbsp;&nbsp;<b>".$row->First_Name.'</b><br>';
            $msg .="A travel request with ID  ".  $post_id." and Cost Center ".$brow->CenterNo. '  have been RETIRED<br/>';
           $msg .="Thanks for your good cooperation!";
            $this->common_model->send_email($email,$subject,$msg);

            }
	            $url='post/request_details/'.$this->input->post('Post_Id');
	            redirect($url);
	     }


	}

function payout()
	{
		$postid=$this->uri->segment(3);

		$data['title']='Advance and Travel Management';
		$this->load->view('common/head');
		$this->load->view('common/top-menu');
		$this->load->view('common/sidemenu');
		$this->load->library('form_validation');
	   $this->form_validation->set_rules('Amount', 'Amount', 'trim|required|xss_clean');
	   $this->form_validation->set_rules('Currency', 'currency', 'trim|required|xss_clean');
	   $this->form_validation->set_rules('Refference', 'refference', 'trim|xss_clean');
	   $this->form_validation->set_rules('Post_Id', 'post', 'trim|required|xss_clean');
	   //$this->form_validation->set_rules('Payment_receipt', 'recept', 'trim|xss_clean');
	   if (empty($_FILES['attach']['name']))
				{
				    $this->form_validation->set_rules('attach', 'Attachment', 'required');
				}
	   if($this->form_validation->run() == FALSE)
	   {
	   	if (!empty($this->input->post('Post_Id'))) $postid=$this->input->post('Post_Id');
	   	$data['Post_Id']=$postid;
		$data['totalamount']=$this->post_model->get_request_total_amount($postid);
		$data['post']=$this->post_model->post_by_id($postid);
		$data['payoutlist']=$this->payment_model->payment_by_postid($postid);
		$data['requestlist']=$this->post_model->get_request_amounts($postid);
		$this->load->view('payment/payment_detail_out',$data);
		$this->load->view('common/footer');
	   }
	   else{
	   	

	         if (! empty($_FILES['attach']['name'])){
	   	         //attach a file
            $file_name='receipt_'.$this->input->post('Post_Id');
            $upload_path = './receipt/';
            $attach_error=$this->common_model->do_upload($file_name,$upload_path);
                }
	           
	             $rate=$this->rate_model->get_rate_percurrency($this->input->post('Currency'));
	            if ($this->input->post('Currency') == 'TZS')
	            {
                         $Amount_Out_USD=$this->input->post('Total_Amount')/$rate;
                         $Amount_Out_origin=$this->input->post('Total_Amount');
	             }
	             else {
	             	    $Amount_Out_USD=$this->input->post('Total_Amount');
                        $Amount_Out_origin=$this->input->post('Total_Amount');
	                   }

	            $data = array('Refference' => $this->input->post('Refference'),
	   	  	            'Payment_Amount_Out_USD' =>$Amount_Out_USD,
	   	  	            'Payment_Amount_Out_Origin' =>$Amount_Out_origin,
	   	  	            'Payment_Method' => $this->input->post('Payment_Method'),
	   	  	            'fk_payment_Post_Id' => $this->input->post('Post_Id'),
	   	  	            'Type' =>'payout',
	   	  	            'Bank_Name'=>$this->input->post('Bank_Name'),
	   	  	            'Bank_AccountNo' =>$this->input->post('AccountNo'),
	   	  	            'Retirement_Status'=>'closed',  
	   	  	            'Currency' => $this->input->post('Currency'),
	   	  	            'Cashier'   => $this->input->post('Cashier'),
	   	  	            'Payment_Date' =>date('Y-m-d H:i:s')
	   	                  );
	                 $data_update = array('Post_Status' => 'paid'
		   	             );
	            $this->post_model->update_post($data_update,$this->input->post('Post_Id'));

	            $this->payment_model->insert_payment($data);
              //---start payment list---//
	            //get it
	               $payment_details=$this->post_model->post_details_by_postid($this->input->post('Post_Id'));
	               if (! empty($payment_details)){
	               	foreach ($payment_details as $rowlist) {
	               		
                    if ($this->input->post('Currency')=='TZS')
		                    {
		                    $amount_out_center_orign=$rowlist->Amount;
		                    $amount_out_center_usd=($rowlist->Amount/$rate); 
		                    }
		            else    {
		            	    $amount_out_center_orign=$rowlist->Amount;
		                    $amount_out_center_usd=$rowlist->Amount;
		                    }
	            	   $payment_detail_data = array('fk_details_Request_Details_Id' => $rowlist->Request_Details_Id,
	                 	'pdt_Payment_Amount_Out_Origin' => $amount_out_center_orign,
	   	  	            'pdt_Payment_Amount_Out_USD' => $amount_out_center_usd
	   	                  );
	            	   $this->payment_model->insert_payment_deteil_list($payment_detail_data);
                        }
	            	}
	            

	            //---end paymentlis----------//

	        ///send email to ALL FINANCE get_all_cashier_mail
            $emaillist=$this->common_model->get_all_head_and_senior_finance_mail();
            foreach ( $emaillist as $row) {
            $email=$row->Email;
             $subject="REQUEST NO ".$this->input->post('Post_Id').' HAVE BEEN PAID';	
             $msg="Hello &nbsp;&nbsp;<b>".$row->First_Name.'</b><br>';
            $msg .="A travel  request with ID  ".  $post_id." have been PAID <br/>";
            $msg .="Thanks for your good cooperation!";
            $this->common_model->send_email($email,$subject,$msg);	
            }
             ///send email to ALL cashier 
            $emaillist=$this->common_model->get_all_cashier_mail();
            foreach ( $emaillist as $row) {
            $email=$row->Email;
             $subject="REQUEST NO ".$this->input->post('Post_Id').' HAVE BEEN PAID';	
             $msg="Hello &nbsp;&nbsp;<b>".$row->First_Name.'</b><br>';
            $msg .="A travel  request with ID  ".  $post_id." have been PAID <br/>";
            $msg .="Thanks for your good cooperation!";
            $this->common_model->send_email($email,$subject,$msg);	
            }

            ///send email to employee
            $emaillist=$this->common_model->get_employee_mail($this->input->post('Post_Id'));
            foreach ( $emaillist as $row) {
        
            $msg='';
            $email=$row->Email;
            $subject="YOUR REQUEST NO ".$this->input->post('Post_Id').' HAVE BEEN PAID';
             $msg="Hello &nbsp;&nbsp;<b>".$row->First_Name.'</b><br>';
            $msg .="You have received your travel payment for your  request with ID  ".  $post_id."<br/>";
            $msg .="Thanks for your good cooperation!";
            $this->common_model->send_email($email,$subject,$msg);	
            }
            ///send email to budget holder
            foreach ($this->post_model->get_request_list_budget_holder($this->input->post('Post_Id')) as $brow){
            	$msg='';
            $email=$brow->Email;
            $subject="YOUR REQUEST NO ".$this->input->post('Post_Id').' HAVE BEEN PAID';
             $msg="Hello &nbsp;&nbsp;<b>".$brow->First_Name.'</b><br>';
            $msg .="A travel request with ID  ".  $post_id." and Cost Center ".$brow->CenterNo. '  have been Paid<br/>';
            $msg .="Thanks for your good cooperation!";
            $this->common_model->send_email($email,$subject,$msg);
           

            }
	            $url='post/request_details/'.$this->input->post('Post_Id');
	            redirect($url);
	     }


	}
function paid_post()
   {
   	    $data['title']='Advance and Travel Management';
		$this->load->view('common/head');
		$this->load->view('common/top-menu');
		$this->load->view('common/sidemenu');
		$data['paidlist']=$this->payment_model->payment_out_list();
		$this->load->view('payment/paidlist',$data);

   }
function retired_list()
    {
	$data['title']='Advance and Travel Management';
	$this->load->view('common/head');
	$this->load->view('common/top-menu');
	$this->load->view('common/sidemenu');
    $data['unretired']=$this->payment_model->payment_in_list();
    $this->load->view('retirements/retire_list',$data);

    }
function retired_approvedlist()
       {
    $data['title']='Advance and Travel Management';
	$this->load->view('common/head');
	$this->load->view('common/top-menu');
	$this->load->view('common/sidemenu');
    $data['unretired']=$this->payment_model->payment_in_approved_list();
    $this->load->view('retirements/retire_approved',$data);

       }
function retired_closedlist()
       {
    $data['title']='Advance and Travel Management';
	$this->load->view('common/head');
	$this->load->view('common/top-menu');
	$this->load->view('common/sidemenu');
    $data['unretired']=$this->payment_model->payment_in_closed_list();
    $this->load->view('retirements/retire_closed',$data);

       }
function retired_rejectedlist()
     {
    $data['title']='Advance and Travel Management';
	$this->load->view('common/head');
	$this->load->view('common/top-menu');
	$this->load->view('common/sidemenu');
    $data['unretired']=$this->payment_model->payment_in_rejected_list();
    $this->load->view('retirements/retire_rejected',$data);

       }

function review_retire()
   {   $data['Post_Id']=$postid=$this->uri->segment(3);
   $data['title']='Advance and Travel Management';
	$this->load->view('common/head');
	$this->load->view('common/top-menu');
	$this->load->view('common/sidemenu');
	    $data['retiredlist']=$this->payment_model->payment_in_list_by_postid($postid);
    	$data['totalamount']=$this->post_model->get_request_total_amount($postid);
		$data['post']=$this->post_model->post_by_id($postid);
		$data['payoutlist']=$this->payment_model->payment_by_postid($postid);
		$data['requestlist']=$this->post_model->get_request_amounts($postid);
		$this->load->view('post/request_detail_retire_review',$data);
		$this->load->view('common/footer');
   }
   function extra_pay()
   {   $data['Post_Id']=$postid=$this->uri->segment(3);
   $data['title']='Advance and Travel Management';
	$this->load->view('common/head');
	$this->load->view('common/top-menu');
	$this->load->view('common/sidemenu');
	    $data['retiredlist']=$this->payment_model->payment_in_list_by_postid($postid);
    	$data['totalamount']=$this->post_model->get_request_total_amount($postid);
		$data['post']=$this->post_model->post_by_id($postid);
		$data['payoutlist']=$this->payment_model->payment_by_postid($postid);
		$data['requestlist']=$this->post_model->get_request_amounts($postid);
		$this->load->view('post/request_detail_retire_over_under_pay',$data);
		$this->load->view('common/footer');
   }
/*function rejected_edit_payment()
   {
   	$data['Post_Id']=$postid=$this->uri->segment(3);
   $data['title']='Advance and Travel Management';
	$this->load->view('common/head');
	$this->load->view('common/top-menu');
	$this->load->view('common/sidemenu');
	    $data['retiredlist']=$this->payment_model->payment_in_list_by_postid($postid);
    	$data['totalamount']=$this->post_model->get_request_total_amount($postid);
		$data['post']=$this->post_model->post_by_id($postid);
		$data['payoutlist']=$this->payment_model->payment_by_postid($postid);
		$data['requestlist']=$this->post_model->get_request_amounts($postid);
		$this->load->view('post/request_detail_retire_review_edit',$data);
		$this->load->view('common/footer');

   }*/
function rejected_edit_payment()
	{
		$postid=$this->uri->segment(3);
		$data['title']='Advance and Travel Management';
		$this->load->view('common/head');
		$this->load->view('common/top-menu');
		$this->load->view('common/sidemenu');
		$this->load->library('form_validation');
		
	    $this->form_validation->set_rules('Amount', 'Amount', 'trim|required|xss_clean');
	   /*if (empty($_FILES['attach_retire']['name']))
				{
				    $this->form_validation->set_rules('attach_retire', 'Attachment', 'required');
				}*/
	   if($this->form_validation->run() == FALSE)
	   {
	   	if (!empty($this->input->post('Post_Id'))) $postid=$this->input->post('Post_Id');
	   	$data['Post_Id']=$postid;
/*	    $data['totalamount']=$this->post_model->get_request_total_amount($postid);
		$data['post']=$this->post_model->post_by_id($postid);
		$data['payoutlist']=$this->payment_model->payment_by_postid($postid);
		$data['requestlist']=$this->post_model->get_request_amounts($postid);
		$this->load->view('post/request_detail_retire',$data);
		$this->load->view('common/footer');*/

		$data['retiredlist']=$this->payment_model->payment_in_list_by_postid($postid);
    	$data['totalamount']=$this->post_model->get_request_total_amount($postid);
		$data['post']=$this->post_model->post_by_id($postid);
		$data['payoutlist']=$this->payment_model->payment_by_postid($postid);
		$data['requestlist']=$this->post_model->get_request_amounts($postid);
		$this->load->view('post/request_detail_retire_review_edit',$data);
		$this->load->view('common/footer');
	   }
	   else {
	   	    $paymentid=$this->input->post('Payment_Id');
	   	
           //Attach retirement doc
			if (! empty($_FILES['attach_retire']['name'])){
	   	         //attach a file
            $file_name='retire_'.$this->input->post('Post_Id');
            $upload_path = './retiredoc/';
            $attach_error=$this->common_model->do_upload_custom($file_name,$upload_path,'attach_retire');
                }
          /////////////////////////////////////////////////////
         //attach return money doc 
/*          if($this->input->post('Retirement_Type')=='Under Retirement')
            {
            if (! empty($_FILES['attach_receipt']['name'])){
	   	         //attach a file
            
            $file_name='retire_under_'.$this->input->post('Post_Id');
            $upload_path = './retiredoc/underretiredoc';
             
            $attach_error=$this->common_model->do_upload_custom($file_name,$upload_path,'attach_receipt');
                }
               }*/
            ///
             //atach paid money for over retire
/*           if($this->input->post('Retirement_Type')=='Over Retirement')
            {
            if (! empty($_FILES['attach_receipt']['name'])){
	   	         //attach a file
            
            $file_name='retire_over_'.$this->input->post('Post_Id');
            $upload_path = './retiredoc/overretiredoc';
             
            $attach_error=$this->common_model->do_upload_custom($file_name,$upload_path,'attach_receipt');
                }
               }*/
               ///////////////////////////////////////////////////////

	        $rate=$this->rate_model->get_rate_percurrency($this->input->post('Currency'));
	            if ($this->input->post('Currency')=='TZS')
	            {
                         $Amount_in_USD=$this->input->post('Total_Amount')/$rate;
                         $Amount_in_origin=$this->input->post('Total_Amount');

	             }
	             else {
	             	   $Amount_in_origin=$this->input->post('Total_Amount');
                       $Amount_in_USD=$this->input->post('Total_Amount');
	                   }
                
                //----start payment--------///

	                 $data = array('Refference' => $this->input->post('Refference'),
	                 	/*'Currency' => $this->input->post('Currency'),*/
	   	  	            'Payment_Amount_In_USD' => $Amount_in_USD, 
	   	  	            'Payment_Amount_In_Origin' => $Amount_in_origin,
	   	  	           /* 'fk_payment_Post_Id' => $this->input->post('Post_Id'),*/
	   	  	            /*'Type' =>'payin',*/
	   	  	            'Cash_Retired_Origin' => $this->input->post('Amount'),
	   	  	            'Retirement_Status' =>'updated',
	   	  	            'Retirement_Type'=>$this->input->post('Retirement_Type')
	   	  	            /*'Payment_Date' =>date('Y-m-d H:i:s')*/
	   	                  );
	                 /*$data_update = array('Post_Status' => 'retired'
		   	             );*/
	            /*$this->post_model->update_post($data_update,$this->input->post('Post_Id'));
	            //---end paymment---------//*/
	            //---start payment list---//
	            //get it
	              /* $payment_details=$this->post_model->post_details_by_postid($this->input->post('Post_Id'));
	               if (! empty($payment_details)){
	               	foreach ($payment_details as $rowlist) {
	               		
                    if ($this->input->post('Currency')=='TZS')
		                    {
		                    $amount_in_center_orign=$rowlist->Amount;
		                    $amount_in_center_usd=($rowlist->Amount/$rate); 
		                    }
		            else    {
		            	    $amount_in_center_orign=$rowlist->Amount;
		                    $amount_in_center_usd=$rowlist->Amount;
		                    }
	            	   $payment_detail_data = array('fk_details_Request_Details_Id' => $rowlist->Request_Details_Id,
	                 	'pdt_Payment_Amount_In_Origin' => $amount_in_center_orign,
	   	  	            'pdt_Payment_Amount_In_USD' => $amount_in_center_usd
	   	                  );
	            	    $this->payment_model->insert_payment_deteil_list($payment_detail_data);
                        }
	            	}*/
	           

	            //---end paymentlis----------//

	            $this->payment_model->update_payment_by_Post_id($data,$this->input->post('Post_Id'));
	            		  	  		  	   ///send email to ALL FINANCE
            /*$emaillist=$this->common_model->get_all_head_and_senior_finance_mail();
            foreach ( $emaillist as $row) {
            $email=$row->Email;
             $subject="REQUEST NO ".$this->input->post('Post_Id').' HAVE BEEN RETIRED';
            $msg="Hello".$row->First_Name;
            echo "A travel  request with ID  ".  $post_id." have been RETIRED ";
            $this->common_model->send_email($email,$subject,$msg);	
            }*/

            ///send email to employee
         /*   $emaillist=$this->common_model->get_employee_mail($this->input->post('Post_Id'));
            foreach ( $emaillist as $row) {
            $email=$row->Email;
            $subject=$post_id.' HAVE BEEN RETIRED';
            $msg="Hello".$row->First_Name;
            echo "You have retired your travel  request with ID  ".  $post_id."";
            echo "Thanks for your good cooperation!";
            $this->common_model->send_email($email,$subject,$msg);	
            }*/
	            $url='post/request_details/'.$this->input->post('Post_Id');
	            redirect($url);
	     }


	}
function close_retirement()
     {
     	$paymentid=$this->input->post('Payment_Id');
     	$data = array('Retirement_Status' =>'closed',
     	               'closing_id'=>$this->session->userdata['logged_in']['id'],
     	               'closing_date'=>date('Y-m-d H:i:s') );
     	$this->payment_model->update_payment($data,$paymentid);
     	redirect('payment/retired_approvedlist');
     	
     }
function print_change()
   {
   	$postid=$this->uri->segment(3);
   	$data['change']=$this->payment_model->payment_in_get_change($postid);
   	$data['Post_Id']=$postid;
   	$data['post']=$this->post_model->post_by_id($postid);
   	$this->load->view('retirements/extra_pay_receipt_pdf',$data);
   	//$data['change']=$this->payment_model->payment_in_get_change($postid);
   }

}
