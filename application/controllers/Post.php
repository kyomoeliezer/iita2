<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class post extends CI_Controller {
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
	public function newpost()
	{
		  $data['title']='Advance and Travel Management';
		   $this->load->view('common/head');
		   $this->load->view('common/top-menu');
		   $this->load->view('common/sidemenu');
		   $this->load->library('form_validation');
		 
		   
		   $this->form_validation->set_rules('Account_Id', 'account', 'trim|required|xss_clean');
		   //$this->form_validation->set_rules('Center_Id', 'center', 'trim|required|xss_clean');
		   $this->form_validation->set_rules('Center_type', 'cost type', 'trim|required|xss_clean');
		   $this->form_validation->set_rules('Currency', 'Currency', 'trim|required|xss_clean');
		   $this->form_validation->set_rules('Center_single', 'center number', 'trim|required|xss_clean');
		   $this->form_validation->set_rules('Amount_single', 'Amount', 'trim|required|xss_clean');
		 
		   $this->form_validation->set_rules('Center_shared1', 'center number', 'trim|xss_clean');
		   $this->form_validation->set_rules('Amount_shared1', 'Amount', 'trim|xss_clean');
		   $this->form_validation->set_rules('Center_shared2', 'center number', 'trim|xss_clean');
		   $this->form_validation->set_rules('Amount_shared2', 'Amount', 'trim|xss_clean');

		   $this->form_validation->set_rules('Person_Id', 'staff', 'trim|required|xss_clean|callback_unpaid_or_unretired_project');
		   //$this->form_validation->set_rules('Amount', 'amount', 'trim|required|xss_clean');
		   $this->form_validation->set_rules('Description', 'Description', 'trim|required|xss_clean');
		   $this->form_validation->set_rules('StartDate', 'Start date', 'trim|required|xss_clean');
		   $this->form_validation->set_rules('EndDate', 'End date', 'trim|required|xss_clean');
		   if (empty($_FILES['attach']['name']))
				{
				    $this->form_validation->set_rules('attach', 'Attachment', 'required');
				}
		   

		   if($this->form_validation->run() == FALSE)
		   { 
		   	$data['personlist']=$this->employee_model->employees();
		   	$data['centerlist']=$this->center_model->centers();
		   	$data['accountlist']=$this->account_model->accounts();
		   	$this->load->view('post/finance_new_post',$data);
		    $this->load->view('common/footer');
		   }
		   else
		   {
             $description=$this->input->post('Description');
             $Person_Id=$this->input->post('Person_Id');
             $person_data=explode(':', $this->common_model->get_employee_detail($Person_Id));
             $p_fname=$person_data[1];
             $p_lname=$person_data[2];
             $p_email=$person_data[3];
             $p_reserved=$person_data[0];
		   	$data = array('fk_post_AccountId' => $this->input->post('Account_Id'),
		   		           //'fk_post_CenterId' => $this->input->post('Center_Id'),
		   		           'fk_post_EmployeeId' => $Person_Id,
		   		           'Costing_type'=>$this->input->post('Center_type'),
		   		           'Currency' => $this->input->post('Currency'),
		   		           'Post_StartDate' => $this->input->post('StartDate'),
		   		           'Post_EndDate' => $this->input->post('EndDate'),
		   		           'Post_Description' => $description,
		   		           
		   		           'Date_Created'=>date('Y-m-d H:i:s')
		   	             );
            $doc_No=$this->post_model->insert_post($data);
            // 1 is an id for travel account in a db
            if ($this->input->post('Account_Id')=='1')
            {
            	$from=$this->input->post('from');
            	$to=$this->input->post('to');
            	$departure=$this->input->post('departure');
            	$arrival=$this->input->post('arrival');
            	

            	foreach($from as $key=>$value)
					{
						$travel_data= array(
            		              'City_From' => $value,
            		              'City_To' => $to[$key],
            		              'Departure_Date' => $departure[$key],
            		              'Arrival_Date' => $arrival[$key],
            		              'fk_travel_Post_Id' =>$doc_No );

                    $this->post_model->insert_travel_list($travel_data);
					}
            	
            }

            //attach a file
            $file_name='request_form_'.$doc_No;
            $upload_path = './request_form/';
            $attach_error=$this->common_model->do_upload($file_name,$upload_path);
         //insert the post details
/*cc1*/ if (! empty($this->input->post('Center_single'))){
          	$ccdetail= explode('$',$this->common_model->get_cc_budget_holder($this->input->post('Center_single')));
            $data_single = array('fk_request_details_Post_Id' =>$doc_No,
		   		           'fk_request_details_CenterId' => $this->input->post('Center_single'),
		   		           'Amount' => $this->input->post('Amount_single'),
		   		           'dtls_Date_Created'=>date('Y-m-d H:i:s')
		   	             );
            $this->post_model->insert_post_details($data_single);
            ///send email to budget
            if ($ccdetail !=''){
            $name=$ccdetail[2];
            $email=$ccdetail[1];
             $subject="NEW REQUEST CREATED WAITING FOR APPROVAL";
            $msg="Hello &nbsp;&nbsp;<b>".$name.'</b><br>';
            $msg .= "A travel request with a CC <b> ".  $ccdetail[0]."</b>  have been created<br/><br/><br/>
              Description: <b> ".$description."<br/>
              Reserved ID: <b> ".$p_reserved."  ".$p_fname."  ".$p_lname."<br/>
              CC: <b> ".$ccdetail[0]."<br/>

            ";
            $this->common_model->send_email($email,$subject,$msg);
            }	
            //budget email end
              }

 /*cc2*/ if (! empty($this->input->post('Center_shared1'))) {
            	$ccdetail=explode('$',$this->common_model->get_cc_budget_holder($this->input->post('Center_shared1')));
            $data_shared1 = array('fk_request_details_Post_Id' => $doc_No,
		   		           'fk_request_details_CenterId' => $this->input->post('Center_shared1'),
		   		           'Amount' => $this->input->post('Amount_shared1'),
		   		           'dtls_Date_Created'=>date('Y-m-d H:i:s')
		   	             );
             $this->post_model->insert_post_details($data_shared1);
             ///send email to budget
             if ($ccdetail !=''){
            $name=$ccdetail[2];
            $email=$ccdetail[1];
             $subject="NEW REQUEST CREATED WAITING FOR APPROVAL";
            $msg="Hello &nbsp;&nbsp;<b>".$name.'</b><br>';
            $msg .= "A travel request with a CC <b> ".  $ccdetail[0]."</b>  have been created<br/><br/><br/>
              Description: <b> ".$description."<br/>
              Reserved ID: <b> ".$p_reserved."  ".$p_fname."  ".$p_lname."<br/>
              CC: <b> ".$ccdetail[0]."<br/>

            ";
            $this->common_model->send_email($email,$subject,$msg);	
        	}
            //budget email end
                    }

/*cc3*/ if (! empty($this->input->post('Center_shared2'))){
	         $ccdetail=explode('$', $this->common_model->get_cc_budget_holder($this->input->post('Center_shared2')));
            $data_shared2 = array('fk_request_details_Post_Id' =>  $doc_No,
		   		           'fk_request_details_CenterId' => $this->input->post('Center_shared2'),
		   		           'Amount' => $this->input->post('Amount_shared2'),
		   		           'dtls_Date_Created'=>date('Y-m-d H:i:s')
		   	             );
            $this->post_model->insert_post_details($data_shared2);
            ///send email to budget
            if ($ccdetail !=''){
            $name=$ccdetail[2];
            $email=$ccdetail[1];
             $subject="NEW REQUEST CREATED WAITING FOR APPROVAL";
            $msg="Hello &nbsp;&nbsp;<b>".$name.'</b><br>';
            $msg .= "A travel request with a CC <b> ".  $ccdetail[0]."</b>  have been created<br/><br/><br/>
              Description: <b> ".$description."<br/>
              Reserved ID: <b> ".$p_reserved."  ".$p_fname."  ".$p_lname."<br/>
              CC: <b> ".$ccdetail[0]."<br/>

            ";
            $this->common_model->send_email($email,$subject,$msg);
            }	
            //budget email end
                    }
            ///end insert details

            $this->session->set_flashdata('message_name',
				 'Success! Post Created  '.$doc_No.' '.$attach_error);
            //send email to senior finanace
        $emaillist=$this->common_model->get_senior_head_mail();
            foreach ( $emaillist as $row) {
            $email=$row->Email;
             $subject="NEW REQUEST CREATED WAITING FOR APPROVAL";
            $msg="Hello &nbsp;&nbsp;<b>".$row->First_Name.'</b><br>';
            $msg .="A new travel request with doc number  ".  $doc_No." have been created please login to verify it
            ";
            $this->common_model->send_email($email,$subject,$msg);	
            }
            ///
            
           ///send email to employee

             $subject="NEW REQUEST CREATED WAITING FOR APPROVAL";
            $msg="Hello &nbsp;&nbsp;<b>".$p_fname.'</b><br>';
            $msg .= " Your travel request with doc number  ".  $doc_No." have been created wait for an approval";
            $this->common_model->send_email($p_email,$subject,$msg);	
            

 
            redirect('post/newpost');
            
		   }
	
		
		
	}
function unpaid_or_unretired_project($EmployeeID)
     {
     	$centernumber = $this->input->post('Center_Id');

     	$result = $this->post_model->check_unfinished_or_unretired_centers($centernumber, $EmployeeID);

     	if($result->num_rows() <=0)
                  {
                  	return TRUE;
                  }
        else {
        	 foreach ($this->center_model->center_by_id($centernumber) as $center)
        	 	  {
                    $CenterNo=$center->CenterNo;
        	 	  }

     
			     $this->form_validation->set_message('unpaid_or_unretired_project', 'Have unfinished or un retired posts for  center <a target="_blank" href="'.base_url().'post/post_by_id_center/'.$EmployeeID.'/'.$centernumber.'">'.$CenterNo.' Click to view</a>');
			     return false;
				 
			   }
     }

 function index()
	{
		$data['title']='Advance and Travel Management';
		$this->load->view('common/head');
		$this->load->view('common/top-menu');
		$this->load->view('common/sidemenu');
		//$data['postlist']=$this->post_model->posts_all_info();
		$data['postlist']=$this->post_model->post();
		$this->load->view('post/postlist',$data);
		//$this->load->view('common/table_footer');
	}
	
   function get_new_selection()
          {
          	$selection=$this->uri->segment(3);
          	if ($selection=='shared'){

          	}

          } 

 function approved()
	{
		$data['title']='Advance and Travel Management';
		$this->load->view('common/head');
		$this->load->view('common/top-menu');
		$this->load->view('common/sidemenu');
		$data['postlist']=$this->post_model->approved_posts_all_info();
		$this->load->view('post/approved_postlist',$data);
		//$this->load->view('common/table_footer');
	}
 function payed_details()
	{
		$postid=$this->uri->segment(3);
		$data['Post_Id']=$postid;
		$data['title']='Advance and Travel Management';
		$this->load->view('common/head');
		$this->load->view('common/top-menu');
		$this->load->view('common/sidemenu');
		$data['retirelist']=$this->payment_model->retire_by_postid($postid);
		$data['paymentlist']=$this->payment_model->payment_by_postid($postid);
		$data['postlist']=$this->post_model->postdetail_by_id($postid);
		$this->load->view('payment/inline_payment_detail',$data);
		$this->load->view('common/footer');
	}
function request_details()
        {
        $postid=$this->uri->segment(3);
		$data['Post_Id']=$postid;
		$data['title']='Advance and Travel Management';
		$this->load->view('common/head');
		$this->load->view('common/top-menu');
		$this->load->view('common/sidemenu');
		$data['travel_list']=$this->post_model->get_travel_list($postid);
		$data['totalamount']=$this->post_model->get_request_total_amount($postid);
		$data['post']=$this->post_model->post_by_id($postid);
		$data['payoutlist']=$this->payment_model->payment_out_by_postid($postid);
		$data['payintlist']=$this->payment_model->payment_in_by_postid($postid);
		$data['requestlist']=$this->post_model->get_request_amounts($postid);
		$this->load->view('post/request_detail',$data);
		$this->load->view('common/footer');


        }
function request_details_pdf()
        {
        //$this->load->library('pdf');
        $postid=$this->uri->segment(3);
    		$data['Post_Id']=$postid;
    		$data['title']='Advance and Travel Management';
    		$data['travel_list']=$this->post_model->get_travel_list($postid);
    		$data['totalamount']=$this->post_model->get_request_total_amount($postid);
    		$data['post']=$this->post_model->post_by_id($postid);
    		$data['payoutlist']=$this->payment_model->payment_out_by_postid($postid);
    		$data['payintlist']=$this->payment_model->payment_in_by_postid($postid);
    		$data['requestlist']=$this->post_model->get_request_amounts($postid);
    		$data['change']=$this->payment_model->payment_in_get_change($postid);
/*		$this->pdf->load_view('common/head');
		$this->pdf->load_view('common/top-menu');
		$this->pdf->load_view('common/sidemenu');*/
		$this->load->view('post/request_detail_pdf',$data);
    //$this->load->view('retirements/extra_pay_receipt_pdf',$data);
        }
function request_details_final()
        {
        $postid=$this->uri->segment(3);
		$data['Post_Id']=$postid;
		$data['title']='Advance and Travel Management';
		$this->load->view('common/head');
		$this->load->view('common/top-menu');
		$this->load->view('common/sidemenu');
		$data['totalamount']=$this->post_model->get_request_total_amount($postid);
		$data['post']=$this->post_model->post_by_id($postid);
		$data['payoutlist']=$this->payment_model->payment_out_by_postid($postid);
		$data['payintlist']=$this->payment_model->payment_in_by_postid($postid);
		$data['requestlist']=$this->post_model->get_request_amounts($postid);
		$this->load->view('post/request_detail_paid_retired',$data);
		$this->load->view('common/footer');

        }
function download()
    {
    	$downid=explode('x',$this->uri->segment(3) );
    	$postid=$downid[0];
    	$type=$downid[1];
    	if ($type=='receipt'){
    	 $data = file_get_contents("receipt/receipt_".$postid.'.pdf'); // Read the file's contents
        $name = 'receipt_'.$postid.'.pdf';	
    	}
    	else if ($type=='form'){
    	 $data = file_get_contents("request_form/request_form_".$postid.'.pdf'); // Read the file's contents
        $name = 'request_form_'.$postid.'.pdf';	
    	}
    	else if ($type=='retiredoc'){
    	 $data = file_get_contents("retiredoc/retire_".$postid.".pdf"); // Read the file's contents
        $name = 'retiredoc_'.$postid.'.pdf';	
    	}
    	else if ($type=='csv_employ_temp'){
    	 $data = file_get_contents("import/employees/csvtemplate.csv"); // Read the file's contents
        $name = 'csvtemplate.csv';	
    	}
    	else if ($type=='csv_center_temp'){
    	 $data = file_get_contents("import/center/csv_costcenter_template.csv"); // Read the file's contents
        $name = 'csv_costcenter_template.csv';	
    	}
    	else if ($type=='over'){
    	 $data = file_get_contents("retiredoc/overretiredoc/retire_over_".$postid.'.pdf'); // Read the file's contents
        $name = "retire_over_".$postid.'.pdf';	
    	}
    	else if ($type=='under'){
    	 $data = file_get_contents("retiredoc/underretiredoc/retire_under_".$postid.".pdf"); // Read the file's contents
        $name = "retire_under_".$postid.".pdf";	
    	}
            else if ($type=='csv_bank_template'){
       $data = file_get_contents("import/banks/csv_bank_template.csv"); // Read the file's contents
        $name = "csv_bank_template.csv"; 
      }
      
       force_download($name, $data);

    }

 
	
 function rejectedposts()
	{

		$data['title']='Advance and Travel Management';
		$this->load->view('common/head');
		$this->load->view('common/top-menu');
		$this->load->view('common/sidemenu');
		$data['postlist']=$this->post_model->rejected_posts_all_info();


		$this->load->view('b_h/b_h_rejectedpostlist',$data);
		//$this->load->view('common/table_footer');

	}
function tcpdf()
    {   //$this->load->library('pdf');
    	/*$data['title']='Advance and Travel Management';
		$this->load->view('common/head');
		$this->load->view('common/top-menu');
		$this->load->view('common/sidemenu');*/
		//$data['postlist']=$this->post_model->rejected_posts_all_info();
		$data['postlist']=$this->post_model->post();
    	//$this->pdf->load_view('b_h/b_h_rejectedpostlist',$data);
		$this->load->view('tcpdf_view', $data);
    }
function edit_post()
  {
	  	
	  	 $postid=$this->uri->segment(3);
	  	 if (empty($postid)) $postid=$this->input->post('postid');
	  	 $data['title']='Advance and Travel Management';
		   $this->load->view('common/head');
		   $this->load->view('common/top-menu');
		   $this->load->view('common/sidemenu');
	  	$this->load->library('form_validation');
		 
		   $this->form_validation->set_rules('Person_Id', 'staff', 'trim|required|xss_clean');
		   $this->form_validation->set_rules('Account_Id', 'account', 'trim|required|xss_clean');
		   //$this->form_validation->set_rules('Center_Id', 'center', 'trim|required|xss_clean');
		   //$this->form_validation->set_rules('Amount', 'amount', 'trim|required|xss_clean');
		   $this->form_validation->set_rules('Description', 'Description', 'trim|required|xss_clean');
		   $this->form_validation->set_rules('StartDate', 'Start date', 'trim|required|xss_clean');
		   $this->form_validation->set_rules('EndDate', 'End date', 'trim|required|xss_clean');


	   if($this->form_validation->run() == FALSE)
	   { 
        $data['postid']=$postid;
        $data['centerlist']=$this->post_model->get_request_amounts($postid);
        $data['travel_list']=$this->post_model->get_travel_list($postid);
        $data['personlist']=$this->employee_model->employees();
		    $data['centerlist']=$this->center_model->centers();
		   	$data['accountlist']=$this->account_model->accounts();
		   	$data['postlist']=$this->post_model->postdetail_by_id($postid);
        $data['postlist']=$this->post_model->postdetail_by_id($postid);
	      //$data['postlist']=$data1=$this->post_model->post_by_id($postid);
	      $data['requestlist']=$this->post_model->get_request_amounts($postid);
	  
	   	$this->load->view('post/finance_edit_post',$data);
	   	$this->load->view('common/footer');

	   }
	  else {
	  		/*$data = array('fk_post_AccountId' => $this->input->post('Account_Id'),
		   		           'fk_post_CenterId' => $this->input->post('Center_Id'),
		   		           'fk_post_EmployeeId' => $this->input->post('Person_Id'),
		   		           'Post_Amount' => $this->input->post('Amount'),
		   		           'Post_StartDate' => $this->input->post('StartDate'),
		   		           'Post_EndDate' => $this->input->post('EndDate'),
		   		           'Post_Description' => $this->input->post('Description')
		   	             );
	  	 $this->post_model->update_post($data,$this->input->post('Post_Id'));*/
	  	 //var_dump($this->post_model->get_post_by_id($postid) );
      foreach ($this->post_model->get_post_by_id($postid) as $key) {
      	$Post_Status=$key->Post_Status;
      	$Head_Finance_Admin=$key->Head_Finance_Admin;
      	$Senior_Finance=$key->Senior_Finance;
      }
      if (($Post_Status == 'waiting approval') && ($Senior_Finance == 'Not yet') && ($Head_Finance_Admin =='Not yet') ) {
	  	 $data = array('fk_post_AccountId' => $this->input->post('Account_Id'),
		   		           'fk_post_CenterId' => $this->input->post('Center_Id'),
		   		           'fk_post_EmployeeId' => $this->input->post('Person_Id'),
		   		           //'Post_Amount' => $this->input->post('Amount'),
		   		           'Post_StartDate' => $this->input->post('StartDate'),
		   		           'Post_EndDate' => $this->input->post('EndDate'),
		   		           'Post_Description' => $this->input->post('Description')
		   	             );
       $postid=$this->input->post('postid');
      
        $this->post_model->update_post($data,$this->input->post('postid'));
        //test leo
       if ($this->input->post('Account_Id')=='1')
            {
              $travel_id=$this->input->post('travel_id');
              $from=$this->input->post('from');
              $to=$this->input->post('to');
              $departure=$this->input->post('departure');
              $arrival=$this->input->post('arrival');
              

              foreach($from as $key=>$value)
          {
            if (! empty($travel_id[$key])){
              $travel_data_update='';
              $travel_data_update= array(
                              'City_From' => $value,
                              'City_To' => $to[$key],
                              'Departure_Date' => $departure[$key],
                              'Arrival_Date' => $arrival[$key]);
                              //'fk_travel_Post_Id' =>$postid );
             
             $this->post_model->update_travel_list($travel_data_update,$travel_id[$key]);
            }
            else {
              $travel_data='';
            $travel_data= array(
                              'City_From' => $value,
                              'City_To' => $to[$key],
                              'Departure_Date' => $departure[$key],
                              'Arrival_Date' => $arrival[$key],
                              'fk_travel_Post_Id' =>$postid );
                     $this->post_model->insert_travel_list($travel_data);
                    
          }
        }
              
            }
        //attach a file
        if (! empty($_FILES['attach']['name']))
	        {
		        $file_name='request_form_'.$this->input->post('postid');
		        $upload_path = './request_form/';
		        echo $attach_error=$this->common_model->do_upload($file_name,$upload_path);
	         }
         //insert the post details
         //insert the post details
         $Amount=$this->input->post('Amount');
          $Center=$this->input->post('Center');
          $reqstid=$this->input->post('requestid');

         //$coutsingle=count($single);
          $i=0;
          while ($i<=count($Amount)){
          if (empty($Amount[$i])){
            $this->post_model->delete_post_details($reqstid[$i]);
          }
          if (! empty($Amount[$i])){
          	 
            			$amount_list = array(
		   		           'fk_request_details_CenterId' =>$Center[$i] ,
		   		           'Amount' => $Amount[$i]
		   		           
		   	             );
            if (empty($reqstid[$i])){
              $check_available=$this->post_model->chech_if_same_center_isnot_repeated_in_same_post($postid,$Center[$i]);
              if ($check_available->num_rows > 0){
                foreach ($check_available->result() as $trow) {
                 $amount = $trow->Amount;
                 $req_id= $trow->Request_Details_Id;
                }
                $amount_list_update = array('Amount' => $Amount[$i]+$amount );
                $this->post_model->update_post_details($amount_list_update,$req_id);
              }
              else {
            	$data_new = array('fk_request_details_Post_Id' =>  $postid,
		   		           'fk_request_details_CenterId' => $Center[$i],
		   		           'Amount' => $Amount[$i],
		   		           'dtls_Date_Created'=>date('Y-m-d H:i:s')
		   	             );
            $this->post_model->insert_post_details($data_new);
               }
              }

            else $this->post_model->update_post_details($amount_list,$reqstid[$i]);
              }

              $i++;
              }	
	  	  $this->session->set_flashdata('message_name',
				 'Success! Post Updated');
	  	  
	     } 
	    else{
            $this->session->set_flashdata('message_failed',
				 'Failed! Only unattended request can be edited ');
	  	    }
	  redirect('post');
	 }
  }

  function correct_post()
  {
	  	
	  	 $postid=$this->uri->segment(3);
	  	 if (empty($postid)) $postid=$this->input->post('postid');
	  	 $data['title']='Advance and Travel Management';
		   $this->load->view('common/head');
		   $this->load->view('common/top-menu');
		   $this->load->view('common/sidemenu');
	  	$this->load->library('form_validation');
		 
		   $this->form_validation->set_rules('Person_Id', 'staff', 'trim|required|xss_clean');
		   $this->form_validation->set_rules('Account_Id', 'account', 'trim|required|xss_clean');
		   //$this->form_validation->set_rules('Center_Id', 'center', 'trim|required|xss_clean');
		   //$this->form_validation->set_rules('Amount', 'amount', 'trim|required|xss_clean');
		   $this->form_validation->set_rules('Description', 'Description', 'trim|required|xss_clean');
		   $this->form_validation->set_rules('StartDate', 'Start date', 'trim|required|xss_clean');
		   $this->form_validation->set_rules('EndDate', 'End date', 'trim|required|xss_clean');

	   if($this->form_validation->run() == FALSE)
	   { 
            $data['postid']=$postid;
        	$data['personlist']=$this->employee_model->employees();
		    $data['centerlist']=$this->center_model->centers();
		   	$data['accountlist']=$this->account_model->accounts();
		   	$data['postlist']=$this->post_model->postdetail_by_id($postid);
	      	//$data['postlist']=$data1=$this->post_model->post_by_id($postid);
	      	$data['requestlist']=$this->post_model->get_request_amounts($postid);
	  
	   	$this->load->view('post/finance_unreject_post',$data);
	   	$this->load->view('common/footer');

	   }
	  else {

	  	 $data = array('fk_post_AccountId' => $this->input->post('Account_Id'),
		   		           'fk_post_CenterId' => $this->input->post('Center_Id'),
		   		           'fk_post_EmployeeId' => $this->input->post('Person_Id'),
		   		           //'Post_Amount' => $this->input->post('Amount'),
		   		           'Post_StartDate' => $this->input->post('StartDate'),
		   		           'Post_EndDate' => $this->input->post('EndDate'),
		   		           'Senior_Finance' => 'Not yet',
		   		           'Head_Finance_Admin' => 'Not yet',
		   		           'Post_Status' => 'waiting approval',
		   		           'Post_Description' => $this->input->post('Description')
		   	             );
        $this->post_model->update_post($data,$this->input->post('postid'));
        if (empty($_FILES['attach']['name']))
	        {
		        $file_name='request_form_'.$this->input->post('postid');
		        $upload_path = './request_form/';
		        $attach_error=$this->common_model->do_upload($file_name,$upload_path);
	         }
         //insert the post details
         $Amount=$this->input->post('Amount');
         $Center=$this->input->post('Center');
         $reqstid=$this->input->post('requestid');
         //$coutsingle=count($single);
          $i=0;
          while ($i<=count($Amount)){
          if (empty($Amount[$i])){
            $this->post_model->delete_post_details($reqstid[$i]);
          }
          if (! empty($Amount[$i])){
          	 
            			$amount_list = array(
		   		           'fk_request_details_CenterId' =>$Center[$i] ,
		   		           'Amount' => $Amount[$i]
		   		           
		   	             );
            if (empty($reqstid[$i])){
              $check_available=$this->post_model->chech_if_same_center_isnot_repeated_in_same_post($postid,$Center[$i]);
              if ($check_available->num_rows > 0){
                foreach ($check_available->result() as $trow) {
                 $amount = $trow->Amount;
                 $req_id= $trow->Request_Details_Id;
                }
                $amount_list_update = array('Amount' => $Amount[$i]+$amount );
                $this->post_model->update_post_details($amount_list_update,$req_id);
              }
              else {
                  	$data_new = array('fk_request_details_Post_Id' =>  $postid,
      		   		           'fk_request_details_CenterId' => $Center[$i],
      		   		           'Amount' => $Amount[$i],
      		   		           'dtls_Date_Created'=>date('Y-m-d H:i:s')
      		   	             );
                }
            $this->post_model->insert_post_details($data_new);
               }

            else $this->post_model->update_post_details($amount_list,$reqstid[$i]);
              }

              $i++;
              }	
	  	  $this->session->set_flashdata('message_name',
				 'Success! Post Updated');
	  	  }
	  	
	  	
	  	  redirect('post');
	     
  }
 function delete_post()
  {
	  	$postid=$this->uri->segment(3);
	  	
	  	$this->post_model->delete_post($postid);
	  		$this->session->set_flashdata('message_name',
				 'Success! Successfull deleted');
     redirect('post'); 
	  	  
	    
  }
function post_by_id_center()
       {
        $Employee_Id=$this->uri->segment(3);
        $centernumber=$this->uri->segment(4);
       	$data['title']='Advance and Travel Management';
		$this->load->view('common/head');
		$this->load->view('common/top-menu');
		$this->load->view('common/sidemenu');
        $data['postlist']=$this->post_model->check_unfinished_or_unretired_centers($centernumber, $Employee_Id);
		$this->load->view('post/employee_unfinished_requests',$data);
       }
   


}
