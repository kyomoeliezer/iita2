<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class report_model extends CI_Model
{

	function basic_index_report()
	      {
	      	/*$this->db->select('*');
	      	$this->db->from('payments');
	      	$this->db->join('post', 'Post_Id=fk_payment_Post_Id');
	      	$this->db->join('center', 'CenterId=fk_post_CenterId');
	      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
	      	$this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');*/
	      	$this->db->select('SUM(Amount) AS Post_Amount,EmploymentNo,CenterNo, Post_Id,AccountNo,Post_Description,pdt_Payment_Amount_In_USD as Payment_Amount_In_USD,pdt_Payment_Amount_In_Origin as Payment_Amount_In_Origin,pdt_Payment_Amount_Out_Origin as Payment_Amount_Out_Origin,pdt_Payment_Amount_Out_USD as Payment_Amount_Out_USD,`post`.`Currency`,Payment_Date,Payment_Method,Post_Status,Post_EndDate');
	     	 $this->db->from('request_details');
	     	 $this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
	     	 $this->db->join('payment_details','fk_details_Request_Details_Id=Request_Details_Id');
	     	 $this->db->join('center','fk_request_details_CenterId=CenterId');
	     	 $this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
	     	 $this->db->join('payments', 'Post_Id=fk_payment_Post_Id');
	      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
            ///
	      	/*$this->db->where('Retirement_Status','closed');*/ 
	      	///
	      	$this->db->group_by('payment_details_Id');
	      	$this->db->order_by('Post_Id');
	      	$this->db->order_by('CenterNo');
	      	
	      	return $this->db->get()->result();
	      }
	function payments_report_lastmonth()
	      {
	      	$where='MONTH(Payment_Date)=MONTH(NOW())-1';
	      	$this->db->select('SUM(Amount) AS Post_Amount,EmploymentNo,CenterNo, Post_Id,AccountNo,Post_Description,pdt_Payment_Amount_In_USD as Payment_Amount_In_USD,pdt_Payment_Amount_In_Origin as Payment_Amount_In_Origin,pdt_Payment_Amount_Out_Origin as Payment_Amount_Out_Origin,pdt_Payment_Amount_Out_USD as Payment_Amount_Out_USD,`post`.`Currency`,Payment_Date,Payment_Method,Post_Status,Post_EndDate');
	     	 $this->db->from('request_details');
	     	 $this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
	     	 $this->db->join('payment_details','fk_details_Request_Details_Id=Request_Details_Id');
	     	 $this->db->join('center','fk_request_details_CenterId=CenterId');
	     	 $this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
	     	 $this->db->join('payments', 'Post_Id=fk_payment_Post_Id');
	      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
	      	$this->db->where($where);
            ///
	      	/*$this->db->where('Retirement_Status','closed');*/ 
	      	///
	      	$this->db->group_by('payment_details_Id');
	      	$this->db->order_by('Post_Id');
	      	$this->db->order_by('CenterNo');
	      	
	      	return $this->db->get()->result();
	      }
	function payment_retired_report_lastmonth()
	      {
	      	$where='MONTH(Payment_Date)=MONTH(NOW())-1';
	      	$this->db->select('SUM(Amount) AS Post_Amount,EmploymentNo,CenterNo, Post_Id,AccountNo,Post_Description,pdt_Payment_Amount_In_USD as Payment_Amount_In_USD,pdt_Payment_Amount_In_Origin as Payment_Amount_In_Origin,pdt_Payment_Amount_Out_Origin as Payment_Amount_Out_Origin,pdt_Payment_Amount_Out_USD as Payment_Amount_Out_USD,`post`.`Currency`,Payment_Date,Payment_Method,Post_Status,Post_EndDate');
	     	 $this->db->from('request_details');
	     	 $this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
	     	 $this->db->join('payment_details','fk_details_Request_Details_Id=Request_Details_Id');
	     	 $this->db->join('center','fk_request_details_CenterId=CenterId');
	     	 $this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
	     	 $this->db->join('payments', 'Post_Id=fk_payment_Post_Id');
	      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
	      	$this->db->where($where);
            ///
	      	$this->db->where('Retirement_Status','closed'); 
	      	///
	      	$this->db->group_by('payment_details_Id');
	      	$this->db->order_by('Post_Id');
	      	$this->db->order_by('CenterNo');
	      	
	      	return $this->db->get()->result();
	      }
	function payment_unretired_report_lastmonth()
	      {
	      	$where='MONTH(Payment_Date)=MONTH(NOW())-1';
	      	$this->db->select('SUM(Amount) AS Post_Amount,EmploymentNo,CenterNo, Post_Id,AccountNo,Post_Description,pdt_Payment_Amount_In_USD as Payment_Amount_In_USD,pdt_Payment_Amount_In_Origin as Payment_Amount_In_Origin,pdt_Payment_Amount_Out_Origin as Payment_Amount_Out_Origin,pdt_Payment_Amount_Out_USD as Payment_Amount_Out_USD,`post`.`Currency`,Payment_Date,Payment_Method,Post_Status,Post_EndDate');
	     	 $this->db->from('request_details');
	     	 $this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
	     	 $this->db->join('payment_details','fk_details_Request_Details_Id=Request_Details_Id');
	     	 $this->db->join('center','fk_request_details_CenterId=CenterId');
	     	 $this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
	     	 $this->db->join('payments', 'Post_Id=fk_payment_Post_Id');
	      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
	      	$this->db->where($where);
            ///
	      	$this->db->where('Retirement_Status !=','closed');
	      	$this->db->or_where('Post_Status','paid'); 
	      	///
	      	$this->db->group_by('payment_details_Id');
	      	$this->db->order_by('Post_Id');
	      	$this->db->order_by('CenterNo');
	      	
	      	return $this->db->get()->result();
	      }

////////////////year report////////////////////////////
	      	function payments_report_thisyear()
	      {
	      	$where='YEAR(Payment_Date)=YEAR(NOW())';
	      	$this->db->select('SUM(Amount) AS Post_Amount,EmploymentNo,CenterNo, Post_Id,AccountNo,Post_Description,pdt_Payment_Amount_In_USD as Payment_Amount_In_USD,pdt_Payment_Amount_In_Origin as Payment_Amount_In_Origin,pdt_Payment_Amount_Out_Origin as Payment_Amount_Out_Origin,pdt_Payment_Amount_Out_USD as Payment_Amount_Out_USD,`post`.`Currency`,Payment_Date,Payment_Method,Post_Status,Post_EndDate');
	     	 $this->db->from('request_details');
	     	 $this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
	     	 $this->db->join('payment_details','fk_details_Request_Details_Id=Request_Details_Id');
	     	 $this->db->join('center','fk_request_details_CenterId=CenterId');
	     	 $this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
	     	 $this->db->join('payments', 'Post_Id=fk_payment_Post_Id');
	      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
	      	$this->db->where($where);
            ///
	      	/*$this->db->where('Retirement_Status','closed');*/ 
	      	///
	      	$this->db->group_by('payment_details_Id');
	      	$this->db->order_by('Post_Id');
	      	$this->db->order_by('CenterNo');
	      	
	      	return $this->db->get()->result();
	      }
	function payment_retired_report_thisyear()
	      {
	      	$where='YEAR(Payment_Date)=YEAR(NOW())';
	      	$this->db->select('SUM(Amount) AS Post_Amount,EmploymentNo,CenterNo, Post_Id,AccountNo,Post_Description,pdt_Payment_Amount_In_USD as Payment_Amount_In_USD,pdt_Payment_Amount_In_Origin as Payment_Amount_In_Origin,pdt_Payment_Amount_Out_Origin as Payment_Amount_Out_Origin,pdt_Payment_Amount_Out_USD as Payment_Amount_Out_USD,`post`.`Currency`,Payment_Date,Payment_Method,Post_Status,Post_EndDate');
	     	 $this->db->from('request_details');
	     	 $this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
	     	 $this->db->join('payment_details','fk_details_Request_Details_Id=Request_Details_Id');
	     	 $this->db->join('center','fk_request_details_CenterId=CenterId');
	     	 $this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
	     	 $this->db->join('payments', 'Post_Id=fk_payment_Post_Id');
	      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
	      	$this->db->where($where);
            ///
	      	$this->db->where('Retirement_Status','closed'); 
	      	///
	      	$this->db->group_by('payment_details_Id');
	      	$this->db->order_by('Post_Id');
	      	$this->db->order_by('CenterNo');
	      	
	      	return $this->db->get()->result();
	      }
	function payment_unretired_report_thisyear()
	      {
	      	$where='YEAR(Payment_Date)=YEAR(NOW())';
	      	$this->db->select('SUM(Amount) AS Post_Amount,EmploymentNo,CenterNo, Post_Id,AccountNo,Post_Description,pdt_Payment_Amount_In_USD as Payment_Amount_In_USD,pdt_Payment_Amount_In_Origin as Payment_Amount_In_Origin,pdt_Payment_Amount_Out_Origin as Payment_Amount_Out_Origin,pdt_Payment_Amount_Out_USD as Payment_Amount_Out_USD,`post`.`Currency`,Payment_Date,Payment_Method,Post_Status,Post_EndDate');
	     	 $this->db->from('request_details');
	     	 $this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
	     	 $this->db->join('payment_details','fk_details_Request_Details_Id=Request_Details_Id');
	     	 $this->db->join('center','fk_request_details_CenterId=CenterId');
	     	 $this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
	     	 $this->db->join('payments', 'Post_Id=fk_payment_Post_Id');
	      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
	      	$this->db->where($where);
            ///
	      	$this->db->where('Retirement_Status !=','closed');
	      	$this->db->or_where('Post_Status','paid'); 
	      	///
	      	$this->db->group_by('payment_details_Id');
	      	$this->db->order_by('Post_Id');
	      	$this->db->order_by('CenterNo');
	      	
	      	return $this->db->get()->result();
	      }


///////////// end year ///////////////////////////////

/*	function basic_index_report_thisweek()
	      {
	      	$where=' WEEKOFYEAR(Payment_Date)=WEEKOFYEAR(NOW())';
	      	$this->db->select('*');
	      	$this->db->from('payments');
	      	$this->db->join('post', 'Post_Id=fk_payment_Post_Id');
	      	$this->db->join('center', 'CenterId=fk_post_CenterId');
	      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
	      	$this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
	      	$this->db->where($where);
	      	return $this->db->get()->result();
	      }
	function basic_index_report_lastweek()
	      {
	      	$where='WEEKOFYEAR(Payment_Date)=WEEKOFYEAR(NOW())-1';
	      	$this->db->select('*');
	      	$this->db->from('payments');
	      	$this->db->join('post', 'Post_Id=fk_payment_Post_Id');
	      	$this->db->join('center', 'CenterId=fk_post_CenterId');
	      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
	      	$this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
	      	$this->db->where($where);
	      	return $this->db->get()->result();
	      }
	function basic_index_report_thismonth()
	      {
	      	$where='MONTH(Payment_Date)=MONTH(NOW())';
	      	$this->db->select('*');
	      	$this->db->from('payments');
	      	$this->db->join('post', 'Post_Id=fk_payment_Post_Id');
	      	$this->db->join('center', 'CenterId=fk_post_CenterId');
	      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
	      	$this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
	      	$this->db->where($where);
	      	return $this->db->get()->result();
	      }*/
	function report_by_account($acc='all', $startdate='',$enddate='',$type='all')
	      {
	      	if($acc=='all') $whr_acc='1'; else $whr_acc="AccountNo='".$acc."'";
	      	if($startdate=='') $whr_stdate='1'; else $whr_stdate="Payment_Date >= '".$startdate."'";
	      	if($enddate=='') $whr_stend='1'; else $whr_stend="Payment_Date < '".$enddate."'";
	      	if($type=='all') $whr_type='1'; else $whr_type='Type ="'.$type.'"';
	      	$this->db->select('SUM(Amount) AS Post_Amount,EmploymentNo,CenterNo, Post_Id,AccountNo,Post_Description,pdt_Payment_Amount_In_USD as Payment_Amount_In_USD,pdt_Payment_Amount_In_Origin as Payment_Amount_In_Origin,pdt_Payment_Amount_Out_Origin as Payment_Amount_Out_Origin,pdt_Payment_Amount_Out_USD as Payment_Amount_Out_USD,`post`.`Currency`,Payment_Date,Payment_Method,Post_Status,Post_EndDate');
	     	 $this->db->from('request_details');
	     	 $this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
	     	  $this->db->join('payment_details','fk_details_Request_Details_Id=Request_Details_Id');
	     	  $this->db->join('center','fk_request_details_CenterId=CenterId');
	     	 $this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
	     	 $this->db->join('payments', 'Post_Id=fk_payment_Post_Id');
	      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
	      	///
	      	$this->db->where('Retirement_Status','closed'); 
	      	///
	      	if ($acc !='all') $this->db->where($whr_acc);
	      	if ($startdate !='') $this->db->where($whr_stdate);
	      	if ($enddate !='') $this->db->where($whr_stend);
	      	if ($type !='all') $this->db->where($whr_type);
	      	$this->db->group_by('payment_details_Id');
	      	$this->db->order_by('payment_details_Id','DESC');
	      	return $this->db->get()->result();
	      }
	function report_by_account_unretired($acc='all', $startdate='',$enddate='',$type='all')
	      {
	      	if($acc=='all') $whr_acc='1'; else $whr_acc="AccountNo='".$acc."'";
	      	if($startdate=='') $whr_stdate='1'; else $whr_stdate="Payment_Date >= '".$startdate."'";
	      	if($enddate=='') $whr_stend='1'; else $whr_stend="Payment_Date < '".$enddate."'";
	      	if($type=='all') $whr_type='1'; else $whr_type='Type ="'.$type.'"';
	      	$this->db->select('SUM(Amount) AS Post_Amount,EmploymentNo,CenterNo, Post_Id,AccountNo,Post_Description,pdt_Payment_Amount_In_USD as Payment_Amount_In_USD,pdt_Payment_Amount_In_Origin as Payment_Amount_In_Origin,pdt_Payment_Amount_Out_Origin as Payment_Amount_Out_Origin,pdt_Payment_Amount_Out_USD as Payment_Amount_Out_USD,`post`.`Currency`,Payment_Date,Payment_Method,Post_Status,Post_EndDate');
	     	 $this->db->from('request_details');
	     	 $this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
	     	  $this->db->join('payment_details','fk_details_Request_Details_Id=Request_Details_Id');
	     	  $this->db->join('center','fk_request_details_CenterId=CenterId');
	     	 $this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
	     	 $this->db->join('payments', 'Post_Id=fk_payment_Post_Id');
	      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
	      	///
	      	//$this->db->where('Retirement_Status','closed'); 
	      	///
	      	if ($acc !='all') $this->db->where($whr_acc);
	      	if ($startdate !='') $this->db->where($whr_stdate);
	      	if ($enddate !='') $this->db->where($whr_stend);
	      	if ($type !='all') $this->db->where($whr_type);
	      	$this->db->where('Post_Status','paid');
	      	$this->db->group_by('payment_details_Id');
	      	$this->db->order_by('payment_details_Id','DESC');
	      	return $this->db->get()->result();
	      }
	function report_by_center($center='all', $startdate='',$enddate='',$type='all')
	      {
	      	if($center=='all') $whr_ccenter='1'; else $whr_ccenter="CenterNo='".$center."'";
	      	if($startdate=='') $whr_stdate='1'; else $whr_stdate="Payment_Date >= '".$startdate."'";
	      	if($enddate=='') $whr_stend='1'; else $whr_stend="Payment_Date < '".$enddate."'";
	      	$this->db->select('SUM(Amount) AS Post_Amount,EmploymentNo,CenterNo, Post_Id,AccountNo,Post_Description,pdt_Payment_Amount_In_USD as Payment_Amount_In_USD,pdt_Payment_Amount_In_Origin as Payment_Amount_In_Origin,pdt_Payment_Amount_Out_Origin as Payment_Amount_Out_Origin,pdt_Payment_Amount_Out_USD as Payment_Amount_Out_USD,`post`.`Currency`,Payment_Date,Payment_Method,Post_Status,Post_EndDate');
	     	 $this->db->from('request_details');
	     	 $this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
	     	  $this->db->join('payment_details','fk_details_Request_Details_Id=Request_Details_Id');
	     	  $this->db->join('center','fk_request_details_CenterId=CenterId');
	     	 $this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
	     	 $this->db->join('payments', 'Post_Id=fk_payment_Post_Id');
	      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
	      	///
	      	/*$this->db->where('Retirement_Status','closed');*/ 
	      	///
	      	if ($center !='all') $this->db->where($whr_ccenter);
	      	if ($startdate !='') $this->db->where($whr_stdate);
	      	if ($enddate !='') $this->db->where($whr_stend);
	      	
	      	$this->db->group_by('payment_details_Id');
	      	$this->db->order_by('payment_details_Id','DESC');
	      	return $this->db->get()->result();
	      }
		function report_by_center_unretired($center='all', $startdate='',$enddate='',$type='all')
	      {
	      	if($center=='all') $whr_ccenter='1'; else $whr_ccenter="CenterNo='".$center."'";
	      	if($startdate=='') $whr_stdate='1'; else $whr_stdate="Payment_Date >= '".$startdate."'";
	      	if($enddate=='') $whr_stend='1'; else $whr_stend="Payment_Date < '".$enddate."'";
	      	$this->db->select('SUM(Amount) AS Post_Amount,EmploymentNo,CenterNo, Post_Id,AccountNo,Post_Description,pdt_Payment_Amount_In_USD as Payment_Amount_In_USD,pdt_Payment_Amount_In_Origin as Payment_Amount_In_Origin,pdt_Payment_Amount_Out_Origin as Payment_Amount_Out_Origin,pdt_Payment_Amount_Out_USD as Payment_Amount_Out_USD,`post`.`Currency`,Payment_Date,Payment_Method,Post_Status,Post_EndDate');
	     	 $this->db->from('request_details');
	     	 $this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
	     	  $this->db->join('payment_details','fk_details_Request_Details_Id=Request_Details_Id');
	     	  $this->db->join('center','fk_request_details_CenterId=CenterId');
	     	 $this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
	     	 $this->db->join('payments', 'Post_Id=fk_payment_Post_Id');
	      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
	      	///
	      	/*$this->db->where('Retirement_Status','closed');*/ 
	      	///
	      	if ($center !='all') $this->db->where($whr_ccenter);
	      	if ($startdate !='') $this->db->where($whr_stdate);
	      	if ($enddate !='') $this->db->where($whr_stend);
	      	 $this->db->where('Post_Status','paid');
	      	
	      	$this->db->group_by('payment_details_Id');
	      	$this->db->order_by('payment_details_Id','DESC');
	      	return $this->db->get()->result();
	      }
	function report_by_person($person='all', $startdate='',$enddate='')
	      {
	      	if($person=='all') $whr_person='1'; else $whr_person="EmploymentNo='".$person."'";
	      	if($startdate=='') $whr_stdate='1'; else $whr_stdate="Payment_Date >= '".$startdate."'";
	      	if($enddate=='') $whr_stend='1'; else $whr_stend="Payment_Date < '".$enddate."'";
	      	/*if($type=='all') $whr_type='1'; else $whr_type='Type ="'.$type.'"';*/
	      	$this->db->select('SUM(Amount) AS Post_Amount,EmploymentNo,CenterNo, Post_Id,AccountNo,Post_Description,pdt_Payment_Amount_In_USD as Payment_Amount_In_USD,pdt_Payment_Amount_In_Origin as Payment_Amount_In_Origin,pdt_Payment_Amount_Out_Origin as Payment_Amount_Out_Origin,pdt_Payment_Amount_Out_USD as Payment_Amount_Out_USD,`post`.`Currency`,Payment_Date,Payment_Method,Post_Status,Post_EndDate');
	     	 $this->db->from('request_details');
	     	 $this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
	     	  $this->db->join('payment_details','fk_details_Request_Details_Id=Request_Details_Id');
	     	 $this->db->join('center','fk_request_details_CenterId=CenterId');
	     	 $this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
	     	 $this->db->join('payments', 'Post_Id=fk_payment_Post_Id');
	      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
	      	///
	      	/*$this->db->where('Retirement_Status','closed'); */
	      	///
	      	if ($person !='all') $this->db->where($whr_person);
	      	if ($startdate !='') $this->db->where($whr_stdate);
	      	if ($enddate !='') $this->db->where($whr_stend);
	      	/*if ($type !='all') $this->db->where($whr_type);*/
	      	$this->db->group_by('payment_details_Id');
	      	$this->db->order_by('payment_details_Id','DESC');
	      	return $this->db->get()->result();
	      }
function report_by_person_unretired($person='all', $startdate='',$enddate='')
	      {
	      	if($person=='all') $whr_person='1'; else $whr_person="EmploymentNo='".$person."'";
	      	if($startdate=='') $whr_stdate='1'; else $whr_stdate="Payment_Date >= '".$startdate."'";
	      	if($enddate=='') $whr_stend='1'; else $whr_stend="Payment_Date < '".$enddate."'";
	      	/*if($type=='all') $whr_type='1'; else $whr_type='Type ="'.$type.'"';*/
	      	$this->db->select('SUM(Amount) AS Post_Amount,EmploymentNo,CenterNo, First_Name,Last_Name,Post_Id,AccountNo,Post_Description,pdt_Payment_Amount_In_USD as Payment_Amount_In_USD,pdt_Payment_Amount_In_Origin as Payment_Amount_In_Origin,pdt_Payment_Amount_Out_Origin as Payment_Amount_Out_Origin,pdt_Payment_Amount_Out_USD as Payment_Amount_Out_USD,`post`.`Currency`,Payment_Date,Payment_Method,Post_Status,Post_EndDate');
	     	 $this->db->from('request_details');
	     	 $this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
	     	  $this->db->join('payment_details','fk_details_Request_Details_Id=Request_Details_Id');
	     	 $this->db->join('center','fk_request_details_CenterId=CenterId');
	     	 $this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
	     	 $this->db->join('payments', 'Post_Id=fk_payment_Post_Id');
	      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
	      	///
	      /*	$this->db->where('Retirement_Status','closed'); */
	      	///
	      	if ($person !='all') $this->db->where($whr_person);
	      	if ($startdate !='') $this->db->where($whr_stdate);
	      	if ($enddate !='') $this->db->where($whr_stend);
	      	 $this->db->where('Post_Status','paid');
	      	$this->db->group_by('payment_details_Id');
	      	$this->db->order_by('payment_details_Id','DESC');
	      	return $this->db->get()->result();
	      }
function report_by_person_summary($person='all', $startdate='',$enddate='')
	      {
	      	if($person=='all') $whr_person='1'; else $whr_person="EmploymentNo='".$person."'";
	      	if($startdate=='') $whr_stdate='1'; else $whr_stdate="Payment_Date >= '".$startdate."'";
	      	if($enddate=='') $whr_stend='1'; else $whr_stend="Payment_Date < '".$enddate."'";
	      	/*if($type=='all') $whr_type='1'; else $whr_type='Type ="'.$type.'"';*/
	      	$this->db->select("sum((case when ( `Post_Status` in ('paid','retired')) then 1 else 0 end)) AS `Number_payments`,
	      		sum((case when ( `Post_Status` in ('paid','retired')) then  `payment_details`.`pdt_Payment_Amount_Out_USD` else 0 end)) AS `Total_payments`,
	      		sum((case when ( `Post_Status` in ('retired')) then 1 else 0 end)) AS `Number_retired`,
	      		sum((case when ( `Post_Status` in ('paid')) then `payment_details`.`pdt_Payment_Amount_Out_USD` else 0 end)) AS `Total_retirement`");
	     	 $this->db->from('request_details');
	     	 $this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
	     	  $this->db->join('payment_details','fk_details_Request_Details_Id=Request_Details_Id');
	     	 $this->db->join('center','fk_request_details_CenterId=CenterId');
	     	 $this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
	     	 $this->db->join('payments', 'Post_Id=fk_payment_Post_Id');
	      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
	      	///
	      	/*$this->db->where('Retirement_Status','closed');*/ 
	      	///
	      	if ($person !='all') $this->db->where($whr_person);
	      	if ($startdate !='') $this->db->where($whr_stdate);
	      	if ($enddate !='') $this->db->where($whr_stend);
	      	 //$this->db->where('Post_Status','paid');
	      	//$this->db->group_by('payment_details_Id');
	      	/*$this->db->order_by('payment_details_Id','DESC');*/
	      	return $this->db->get()->result();
	      }
function report_by_status($status='all', $startdate='',$enddate='')
	      {
	      	if($status=='all') $whr_status='1'; else $whr_status="Post_Status='".$status."'";
	      	if($startdate=='') $whr_stdate='1'; else $whr_stdate="Payment_Date >= '".$startdate."'";
	      	if($enddate=='') $whr_stend='1'; else $whr_stend="Payment_Date < '".$enddate."'";
	      	/*if($type=='all') $whr_type='1'; else $whr_type='Type ="'.$type.'"';*/
	      	$this->db->select('SUM(Amount) AS Post_Amount,EmploymentNo,CenterNo, Post_Id,AccountNo,Post_Description,pdt_Payment_Amount_In_USD as Payment_Amount_In_USD,pdt_Payment_Amount_In_Origin as Payment_Amount_In_Origin,pdt_Payment_Amount_Out_Origin as Payment_Amount_Out_Origin,pdt_Payment_Amount_Out_USD as Payment_Amount_Out_USD,`post`.`Currency`,Payment_Date,Payment_Method,Post_Status,Post_EndDate');
	     	 $this->db->from('request_details');
	     	 $this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
	     	  $this->db->join('payment_details','fk_details_Request_Details_Id=Request_Details_Id');
	     	 $this->db->join('center','fk_request_details_CenterId=CenterId');
	     	 $this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
	     	 $this->db->join('payments', 'Post_Id=fk_payment_Post_Id');
	      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
	      	///
	      	/*$this->db->where('Retirement_Status','closed');*/ 
	      	///
	      	if ($status !='all') $this->db->where($whr_status);
	      	if ($startdate !='') $this->db->where($whr_stdate);
	      	if ($enddate !='') $this->db->where($whr_stend);
	      	/*if ($type !='all') $this->db->where($whr_type);*/
	      	$this->db->group_by('payment_details_Id');
	      	$this->db->order_by('payment_details_Id','DESC');
	      	return $this->db->get()->result();
	      }
function report_by_status_unretired($status='all', $startdate='',$enddate='')
	      {
	      	if($status=='all') $whr_status='1'; else $whr_status="Post_Status='".$status."'";
	      	if($startdate=='') $whr_stdate='1'; else $whr_stdate="Payment_Date >= '".$startdate."'";
	      	if($enddate=='') $whr_stend='1'; else $whr_stend="Payment_Date < '".$enddate."'";
	      	/*if($type=='all') $whr_type='1'; else $whr_type='Type ="'.$type.'"';*/
	      	$this->db->select('SUM(Amount) AS Post_Amount,EmploymentNo,CenterNo, Post_Id,AccountNo,Post_Description,pdt_Payment_Amount_In_USD as Payment_Amount_In_USD,pdt_Payment_Amount_In_Origin as Payment_Amount_In_Origin,pdt_Payment_Amount_Out_Origin as Payment_Amount_Out_Origin,pdt_Payment_Amount_Out_USD as Payment_Amount_Out_USD,`post`.`Currency`,Payment_Date,Payment_Method,Post_Status,Post_EndDate');
	     	 $this->db->from('request_details');
	     	 $this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
	     	  $this->db->join('payment_details','fk_details_Request_Details_Id=Request_Details_Id');
	     	 $this->db->join('center','fk_request_details_CenterId=CenterId');
	     	 $this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
	     	 $this->db->join('payments', 'Post_Id=fk_payment_Post_Id');
	      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
	      	///
	      	/*$this->db->where('Retirement_Status','closed');*/ 
	      	///
	      	if ($status !='all') $this->db->where($whr_status);
	      	if ($startdate !='') $this->db->where($whr_stdate);
	      	if ($enddate !='') $this->db->where($whr_stend);
	      	/*if ($type !='all') $this->db->where($whr_type);*/
	      	$this->db->where('Post_Status','paid');
	      	$this->db->group_by('payment_details_Id');
	      	$this->db->order_by('payment_details_Id','DESC');
	      	return $this->db->get()->result();
	      }

	
}