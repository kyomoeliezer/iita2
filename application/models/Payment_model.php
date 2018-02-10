<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class payment_model extends CI_Model
{
	
	function insert_payment($data)
	         {
	         	$this->db->insert('payments',$data);
	         }
	    function insert_payment_deteil_list($data)
	       {
	       	$this->db->insert('payment_details',$data);
	       }
	    function update_payment_deteil_list($id,$data)
	       {
	       	$this->db->where('fk_details_Request_Details_Id',$id);
	       	$this->db->update('payment_details',$data);
	       }
		function insert_rate($data)
	         {
	         	$this->db->insert('currency',$data);
	         }
	    function update_payment_by_Post_id($data,$postid)
	         {
        
	         	$this->db->where('fk_payment_Post_Id',$postid);
	         	$this->db->where('Type','payin');
	         	$this->db->update('payments',$data);

	         }
	    function rate()
	      {
	      	$this->db->select('*');
	      	$this->db->from('rate');
	      	$this->db->order_by('Rate_Id','DESC');

	      	return $this->db->get()->result();
	      }
	function rates()
	      {
	      	$this->db->select('*');
	      	$this->db->from('currency');
      	$this->db->order_by('Currency_Id','DESC');

	      	return $this->db->get()->result();
	      }
	function payment()
	      {
	      	$this->db->select('*');
	      	$this->db->from('payments');
	      	return $this->db->get()->result();
	      }
		function rate_by_id($id)
	     {
	     	$this->db->select('*');
	      	$this->db->from('currency');
	      	$this->db->where('Currency_Id',$id);
	      	return $this->db->get()->result();

	     }
	function payment_by_id($id)
	     {
	     	$this->db->select('*');
	      	$this->db->from('payments');
	      	$this->db->where('Payment_Id',$id);
	      	return $this->db->get()->result();

	     }
		function payment_by_postid($id)
	     {
	     	$this->db->select('*');
	      	$this->db->from('payments');
	      	$this->db->where('Type !=','payin');
	      	$this->db->where('fk_payment_Post_Id',$id);
	      	//$this->db->limit(1);
	      	return $this->db->get()->result();

	     }
function payment_in_by_postid($id)
	     {
	     	$this->db->select('*');
	      	$this->db->from('payments');
	      	$this->db->where('Type','payin');
	      	$this->db->where('fk_payment_Post_Id',$id);
	      	$this->db->order_by('Payment_Id','DESC');
	      	$this->db->limit(1);
	      	return $this->db->get()->result();

	     }
	function payment_out_by_postid($id)
	     {
	     	$this->db->select('*');
	      	$this->db->from('payments');
	      	$this->db->where('Type','payout');
	      	$this->db->where('fk_payment_Post_Id',$id);
	      	$this->db->order_by('Payment_Id','DESC');
	      	$this->db->limit(1);
	      	return $this->db->get()->result();

	     }
	function retire_by_postid($id)
	     {
	     	$this->db->select('*');
	      	$this->db->from('payments');
	      	$this->db->where('Type','retire');
	      	$this->db->where('fk_payment_Post_Id',$id);
	      	$this->db->where('Retirement_Status','closed');
	      	/*$this->db->limit(1);*/
	      	return $this->db->get()->result();

	     }
	function update_payment($data,$id)
	    {   
	    	$this->db->where('Payment_Id',$id);
	    	$this->db->update('payments',$data);
	    }
		function update_rate($data,$id)
	    {   
	    	$this->db->where('Currency_Id',$id);
	    	$this->db->update('currency',$data);
	    }

	function payment_out_list()
	{
	   $this->db->select('SUM(Amount) AS Post_Amount,EmploymentNo, Post_Id,AccountNo,Post_Description, 	Payment_Amount_In_USD,Payment_Amount_In_Origin,Payment_Amount_Out_Origin,Payment_Amount_Out_USD,`post`.`Currency`,Payment_Date, 	Payment_Method,');
	     	 $this->db->from('request_details');
	     	 $this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
	     	 $this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
	     	 $this->db->join('payments', 'Post_Id=fk_payment_Post_Id');
	      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
	      	$this->db->where('Retirement_Status','closed'); 
	      	$this->db->group_by('Payment_Id');

	      	$this->db->order_by('Payment_Id','DESC');
	      	return $this->db->get()->result();
	}
	function payment_in_list()
	{
	   $this->db->select('SUM(Amount) AS Post_Amount,EmploymentNo, Post_Id,AccountNo,Post_Description,Retirement_Status, Retirement_Type,fk_payment_Post_Id,	Payment_Amount_In_USD,Payment_Amount_In_Origin,Payment_Amount_Out_Origin,Payment_Amount_Out_USD,`post`.`Currency`,Payment_Date, 	Payment_Method');
	     	 $this->db->from('request_details');
	     	$this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
	     	 $this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
	     	 $this->db->join('payments', 'Post_Id=fk_payment_Post_Id');
	      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
	      	$this->db->where('Type','payin');
	      	//$this->db->where('Retirement_Status','closed'); 
	      	$this->db->group_by('Post_Id');
	      	//$this->db->order_by('Payment_Id','DESC');

	      	return $this->db->get()->result();
	}
	function payment_in_list_by_postid($postid)
	   {
	   	$this->db->select('*');
	     	 $this->db->select('SUM(Amount) AS Post_Amount,EmploymentNo, `payments`.`Currency`, Post_Id,AccountNo,Post_Description,Retirement_Status,Retirement_Type,fk_payment_Post_Id,Payment_Id,	Payment_Amount_In_USD,Payment_Amount_In_Origin,Payment_Amount_Out_Origin,Payment_Amount_Out_USD,Payment_Date,Payment_Method');
	     	 $this->db->from('request_details');
	     	$this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
	     	 $this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
	     	 $this->db->join('payments', 'Post_Id=fk_payment_Post_Id');
	      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
	      	$this->db->where('Type','payin');
	      	$this->db->where('fk_payment_Post_Id',$postid);
	      	$this->db->group_by('Post_Id');
	      	//$this->db->order_by('Payment_Id','DESC');

	      	return $this->db->get()->result();

	   }
	function payment_in_approved_list()
	{
			   $this->db->select('SUM(Amount) AS Post_Amount,EmploymentNo, Post_Id,AccountNo,Post_Description,Retirement_Status, Cash_Retired_Origin,Retirement_Type,fk_payment_Post_Id,	Payment_Amount_In_USD,Payment_Amount_In_Origin,Payment_Amount_Out_Origin,Payment_Amount_Out_USD,`post`.`Currency`,Payment_Date, 	Payment_Method');
	     	 $this->db->from('request_details');
	     	$this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
	     	 $this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
	     	 $this->db->join('payments', 'Post_Id=fk_payment_Post_Id');
	      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
	      	$this->db->where('Type','payin');
	      	$this->db->where('Retirement_Status','approved');
	      	$this->db->group_by('Post_Id');
	      	//$this->db->order_by('Payment_Id','DESC');

	      	return $this->db->get()->result();
	}
   	function payment_in_closed_list()
	{
			$this->db->select('SUM(Amount) AS Post_Amount,EmploymentNo, Post_Id,AccountNo,Post_Description,Retirement_Status, Cash_Retired_Origin,Retirement_Type,fk_payment_Post_Id,	Payment_Amount_In_USD,Payment_Amount_In_Origin,Payment_Amount_Out_Origin,Payment_Amount_Out_USD,`post`.`Currency`,Payment_Date, 	Payment_Method');
	     	 $this->db->from('request_details');
	     	$this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
	     	 $this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
	     	 $this->db->join('payments', 'Post_Id=fk_payment_Post_Id');
	      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
	      	$this->db->where('Type','payin');
	      	$this->db->where('Retirement_Status','closed');
	      	$this->db->group_by('Post_Id');
	      	//$this->db->order_by('Payment_Id','DESC');

	      	return $this->db->get()->result();
	}
	
	function payment_in_rejected_list()
		{
			   $this->db->select('SUM(Amount) AS Post_Amount,EmploymentNo, Post_Id,AccountNo,Post_Description,Retirement_Status,Cash_Retired_Origin, Retirement_Type,fk_payment_Post_Id,	Payment_Amount_In_USD,Payment_Amount_In_Origin,Payment_Amount_Out_Origin,Payment_Amount_Out_USD,`post`.`Currency`,Payment_Date, 	Payment_Method');
	     	 $this->db->from('request_details');
	     	$this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
	     	 $this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
	     	 $this->db->join('payments', 'Post_Id=fk_payment_Post_Id');
	      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
	      	$this->db->where('Type','payin');
	      	$this->db->where('Retirement_Status','rejected');
	      	$this->db->group_by('Post_Id');
	      	//$this->db->order_by('Payment_Id','DESC');

	      	return $this->db->get()->result();
	}
	function payment_in_get_change($postid)
		{
			   $this->db->select('SUM(Amount) AS Post_Amount,EmploymentNo, Post_Id,AccountNo,Post_Description,Retirement_Status,SUM(Cash_Retired_Origin) as Cash_Retired_Origin , Retirement_Type,fk_payment_Post_Id,Payment_Amount_In_USD,SUM(Payment_Amount_In_Origin) as Payment_Amount_In_Origin,Sum(Payment_Amount_Out_Origin) as Payment_Amount_Out_Origin ,Payment_Amount_Out_USD,`post`.`Currency`,Payment_Date, Post_StartDate, Post_EndDate,Cashier,Last_Name,First_Name,	Payment_Method');
	     	 $this->db->from('request_details');
	     	$this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
	     	 $this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
	     	 $this->db->join('payments', 'Post_Id=fk_payment_Post_Id');
	      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
	      	//$this->db->where('Type','payin');
	      	//$this->db->where('Retirement_Status','rejected');
	      	$this->db->where('Post_Id',$postid);
	      	//$this->db->group_by('Post_Id');
	      	//$this->db->order_by('Payment_Id','DESC');

	      	return $this->db->get()->result();
	}
function get_post_summary_first_home_panel()
         {
         	$this->db->select("sum((case when ( `Post_Status` in  ('paid','retired')) then Amount else 0 end)) AS `Post_paid_and_unpaid`,
                               sum((case when ( `Post_Status` in  ('retired')) then Amount else 0 end)) AS `Post_Retired`,
                               sum((case when ( `Post_Status` in  ('paid')) then Amount else 0 end)) AS `Post_Paid_only`,Currency
         		");
         	$this->db->from('request_details');
	     	$this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
	     	$this->db->group_by('Currency');
	     	return $this->db->get()->result();

         }
function get_post_summary_home_panel_piechart()
         {
         	$this->db->select("sum((case when ( `Post_Status` in  ('paid','retired')) then 1 else 0 end)) AS `Post_paid_and_unpaid`,
                               sum((case when ( `Post_Status` in  ('retired')) then 1 else 0 end)) AS `Post_Retired`,
                               sum((case when ( `Post_Status` in  ('paid')) then 1 else 0 end)) AS `Post_Paid_only`,Currency
         		");
         	$this->db->from('request_details');
	     	$this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
	     	
	     	return $this->db->get()->result();

         }
function get_post_number_first_home_panel()
         {
         	$this->db->select("sum((case when ( `Post_Status` in  ('paid','retired','waiting approval','approved')) then 1 else 0 end)) AS `NoPost_paid_and_unpaid`,
                               sum((case when ( `Post_Status` in  ('retired')) then 1 else 0 end)) AS `NoPost_Retired`,
                               sum((case when ( `Post_Status` in  ('paid','retired')) then 1 else 0 end)) AS `NoPost_Paid`
         		");
         	$this->db->from('request_details');
	     	$this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
	     	//$this->db->group_by('Currency');
	     	return $this->db->get()->result();

         }
function get_top5_unretired_home_panel()
         {
         	$this->db->select("First_Name,Last_Name,Payment_Amount_Out_USD as Amount,EmploymentNo,Post_EndDate as EndDate
         		");
         	$this->db->from('payments');
	     	$this->db->join('post', 'fk_payment_Post_Id=Post_Id');
	     	$this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
	     	$this->db->where('Post_Status','paid');
	     	$this->db->limit(5);
	     	//$this->db->group_by('Currency');
	     	return $this->db->get()->result();

         }
}