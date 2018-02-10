<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class post_model extends CI_Model
{
	
	function insert_post($data)
	         {
	         	$this->db->insert('post',$data);
	         	$l_i_id=$this->db->insert_id();
	         	$this->db->select('*');
	      	    $this->db->from('post');
	      	    $this->db->where('Post_InsertId',$l_i_id);
	      	    foreach ($this->db->get()->result() as $row) {
	      	    	$Post_Id=$row->Post_Id;
	      	    }
	      	    return $Post_Id;

	         }
	function insert_post_details($data)
	         {
	         	$this->db->insert('request_details',$data);
	         }
    function chech_if_same_center_isnot_repeated_in_same_post($postid,$centerid)
	         {
	         	$this->db->select('Amount,Request_Details_Id');
	         	$this->db->from('request_details');
	         	$this->db->where('fk_request_details_CenterId',$centerid);
	         	$this->db->where('fk_request_details_Post_Id',$postid);
	         	return $this->db->get();
	         }
		function insert_travel_list($data)
	         {
	         	$this->db->insert('travel_details',$data);
	         }
		function update_travel_list($data,$id)
	         {
	         	$this->db->where('Travel_Id',$id);
	         	$this->db->update('travel_details',$data);
	         }
	function get_post_by_id($id)
	         {
	         	$this->db->select('*');
	         	$this->db->from('post');
	         	$this->db->where('Post_Id',$id);
	         	return $this->db->get()->result();
	         }
	function update_post_details($data,$id)
	         {
	         	$this->db->where('Request_Details_Id',$id);
	         	$this->db->update('request_details',$data);
	         }
	function delete_post_details($id)
	         {
	         	$this->db->where('Request_Details_Id',$id);
	         	$this->db->delete('request_details');
	         }
	function posts()
	      {
	      	$this->db->select('*');
	      	$this->db->from('post');
	      	return $this->db->get()->result();
	      }
	function get_travel_list($postid)
	     {
	     	$this->db->select('*');
	     	$this->db->from('travel_details');
	     	$this->db->where('fk_travel_Post_Id',$postid);
	     	return $this->db->get()->result();
	     }
	function post_details_by_postid($postid)
	     {
	     	$this->db->select('Amount,Request_Details_Id');
	     	$this->db->from('request_details');
	     	$this->db->where('fk_request_details_Post_Id',$postid);
	     	$this->db->order_by('Request_Details_Id','DESC');
	     	return $this->db->get()->result();
	     }
	function post()
	     {
		     	$this->db->select('SUM(Amount) AS Post_Amount,First_Name,Last_Name,EmploymentNo,Post_Id,AccountNo,Post_Description,Post_EndDate,Post_StartDate, 	Currency,`Senior_Finance`,`Head_Finance_Admin`,Post_Status');
		     	 $this->db->from('request_details');
		     	 $this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
		     	 $this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
		      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
		      	$this->db->where('Post_Status !=','rejected');
		      	/*$this->db->join('center', 'fk_request_details_CenterId=CenterId');*/
		      	$this->db->group_by('Post_Id');
		      	$this->db->order_by('Post_Id','DESC');
		      	return $this->db->get()->result();
	     }
	function post_by_account($id){
		   /* $sql='SELECT SUM(Payment_Amount_Out_USD) AS out_usd,SUM(Payment_Amount_in_USD) AS in_usd, EmploymentNo  from payments
				    INNER join post on (fk_payment_Post_Id=Post_Id)
					INNER join employee on (fk_post_EmployeeId=Employee_Id)
					INNER join account on (fk_post_AccountId=Account_Id)
					WHERE AccountNo='.$id.' 
					GROUP BY EmploymentNo';
				return $this->db->query($sql)->result();*/
		    $this->db->select('*');
	      	$this->db->from('post');
	      	$this->db->join('center', 'CenterId=fk_post_CenterId');
	      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
	      	$this->db->join('payments', 'Post_Id=fk_payment_Post_Id');
	      	$this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
	      	$this->db->where('AccountNo',$id);
	      	$this->db->order_by('Payment_Date','DESC');
	      	$this->db->order_by('Payment_Id','ASC');
	      	//$this->db->where('Post_Status','paid');
	      	return $this->db->get()->result();

	}
		function posts_all_info()
	      {
	      	$where=' `request_details`.`Head_Finance_Admin` !="rejected" AND  `request_details`.`Senior_Finance` !="rejected"';
	      	    $this->db->select('SUM(Amount) AS Post_Amount,First_Name,Last_Name,EmploymentNo,Post_Id,AccountNo,Post_Description,Post_EndDate,Post_StartDate, 	Currency,`Senior_Finance`,`Head_Finance_Admin`,Post_Status');
		     	$this->db->from('request_details');
		     	$this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
		     	$this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
		      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
		      	/*$this->db->join('center', 'fk_request_details_CenterId=CenterId');*/
		      	$this->db->where($where);
		      	$this->db->group_by('Post_Id');
		      	$this->db->order_by('Post_Id','DESC');
		      	return $this->db->get()->result();
	      }
	  function  siniorfinance_posts_all_info()
	       {
	       	$where=' Head_Finance_Admin !="rejected" AND  Senior_Finance !="rejected"';
      	   $this->db->select('SUM(Amount) AS Post_Amount,First_Name,Last_Name,EmploymentNo,Post_Id,AccountNo,Post_Description,Post_EndDate,Post_StartDate, 	Currency,`Senior_Finance`,`Head_Finance_Admin`,Post_Status');
		     	$this->db->from('request_details');
		     	$this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
		     	$this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
		      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
	      	$this->db->where($where);
	      	$this->db->group_by('Post_Id');
	      	$this->db->order_by('Post_Id','DESC');
	      	return $this->db->get()->result();

	       }
	 function headfinance_posts_all_info()
	         {
	         $where=' Head_Finance_Admin !="rejected" AND  Senior_Finance ="approved"';
	      	$this->db->select('SUM(Amount) AS Post_Amount,First_Name,Last_Name,EmploymentNo,Post_Id,AccountNo,Post_Description,Post_EndDate,Post_StartDate, 	Currency,`Senior_Finance`,`Head_Finance_Admin`,Post_Status');
		     	$this->db->from('request_details');
		     	$this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
		     	$this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
		      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
		      	$this->db->where($where);
		      	$this->db->group_by('Post_Id');
		      	$this->db->order_by('Post_Id','DESC');
		      	return $this->db->get()->result();

	         }

	function rejected_posts_all_info()
	       {
	       	$where='`Head_Finance_Admin`="rejected" OR  `Senior_Finance`="rejected"';
	       	$this->db->select('SUM(Amount) AS Post_Amount,First_Name,Last_Name,Rejection_Reason, EmploymentNo,Post_Id,AccountNo, Post_Description, Post_EndDate,Post_StartDate,Currency,`Senior_Finance`,`Head_Finance_Admin`,Post_Status');
		     	 $this->db->from('request_details');
		     	 $this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
		     	 $this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
		      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
		      	
		      	$this->db->where($where);
		      	$this->db->group_by('Post_Id');
		      	$this->db->order_by('Post_Id','DESC');
		      	return $this->db->get()->result();

	       }
		function approved_posts_all_info()
	       {
	       	$where='`Head_Finance_Admin`="approved" AND `Senior_Finance`="approved"';
	       	    $this->db->select('SUM(Amount) AS Post_Amount,First_Name,Last_Name,EmploymentNo,Post_Id,AccountNo,Post_Description,Post_EndDate,Post_StartDate, 	Currency,`Senior_Finance`,`Head_Finance_Admin`,Post_Status');
		     	$this->db->from('request_details');
		     	$this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
		     	$this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
		      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
		      	/*$this->db->join('center', 'fk_request_details_CenterId=CenterId');*/
		      	$this->db->where($where);
		      	$this->db->group_by('Post_Id');
		      	$this->db->order_by('Post_Id','DESC');
		      	return $this->db->get()->result();

	       }
	function post_by_id($id)
	     {
	     	$this->db->select('*');
	      	$this->db->from('post');
	      	 $this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
	      	 $this->db->join('banks','Bank_Id=fk_employee_Bank_Id');
	      	 $this->db->join('account', 'Account_Id=fk_post_AccountId');
	      	$this->db->where('Post_Id',$id);
	      	$this->db->group_by('Post_Id');		      	
	      	return $this->db->get()->result();

	     }
		function get_request_list_budget_holder($postid)
		   {
		   	$this->db->select('email,First_Name,CenterNo');
		   $this->db->from('request_details');
	       $this->db->join('center', 'fk_request_details_CenterId=CenterId');
	       $this->db->join('employee', 'Budget_Holder_ReservedId=EmploymentNo','left');
	       $this->db->where('fk_request_details_Post_Id',$postid);
	       return $this->db->get()->result();
		   }

	function get_request_amounts($postid)
	   {
	   	$this->db->select('*');
	   $this->db->from('request_details');
       $this->db->join('center', 'fk_request_details_CenterId=CenterId');
       $this->db->join('employee', 'Budget_Holder_ReservedId=EmploymentNo','left');
       $this->db->where('fk_request_details_Post_Id',$postid);
       return $this->db->get()->result();
	   }
		function get_request_total_amount($postid)
	   {
	   	$this->db->select('SUM(Amount) as Amount');
	   $this->db->from('request_details');
       $this->db->join('center', 'fk_request_details_CenterId=CenterId');
       $this->db->where('fk_request_details_Post_Id',$postid);
       foreach ($this->db->get()->result() as $key) {
        	$amount=$key->Amount;
        } 
       return $amount;
	   }
	function postdetail_by_id($id)
	     {
	     	      $this->db->select('SUM(Amount) AS Post_Amount,Account_Description,First_Name,Last_Name,Rejection_Reason, EmploymentNo,Post_Id,AccountNo,Post_StartDate,Post_EndDate,fk_post_EmployeeId, fk_post_AccountId,Costing_type, Post_Description, Post_EndDate,Post_StartDate,Currency,`Senior_Finance`,`Head_Finance_Admin`,Post_Status');
		     	 $this->db->from('request_details');
		     	 $this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
		     	 $this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
		      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
		      	/*$this->db->join('center', 'fk_request_details_CenterId=CenterId');*/
	      	    $this->db->where('Post_Id',$id);

	      	return $this->db->get()->result();

	     }
	function post_payed_detail_by_id($id)
	    {
	    	$this->db->select('*');
	      	$this->db->from('post');
	      	$this->db->join('center', 'CenterId=fk_post_CenterId');
	      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
	      	$this->db->join('payments', 'Post_Id=fk_payment_Post_Id');
	      	$this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
	      	$this->db->where('Post_Id',$id);
	      	$this->db->where('Post_Status','paid');
            return $this->db->get()->result();

	    }
	function update_post($data,$id)
	    {   
	    	$this->db->where('Post_Id',$id);
	    	$this->db->update('post',$data);
	    }
	function update_post_request_detail($data,$id)
	       {
	       	$this->db->where('Request_Details_Id',$id);
	    	$this->db->update('request_details',$data);

	       }
	function delete_post($id)
	    {
	    	$this->db->where('Post_Id',$id);
	    	$this->db->delete('post');
	    }
function check_unfinished_or_unretired_centers($center,$person_id)
         {
         	$where=array('paid','waiting approval','approved');
         	$this->db->select('*');
         	$this->db->where('fk_post_CenterId',$center);
	      	$this->db->where('fk_post_EmployeeId',$person_id);
	      	$this->db->where_in($where);
	      	$this->db->from('post');
	      	$this->db->join('center', 'CenterId=fk_post_CenterId');
	      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
	      	$this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
	      	
	      	return $this->db->get();

         }
function get_post_status_by_loginid($id)
	     {
	      	//$where=' `request_details`.`Head_Finance_Admin` !="rejected" AND  `request_details`.`Senior_Finance` !="rejected"';
	      	    $this->db->select('SUM(Amount) AS Post_Amount,First_Name,Last_Name,EmploymentNo,Post_Id,AccountNo,Post_Description,Post_EndDate,Post_StartDate, 	Currency,`Senior_Finance`,`Head_Finance_Admin`,Post_Status');
		     	$this->db->from('request_details');
		     	$this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
		     	$this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
		      	$this->db->join('account', 'Account_Id=fk_post_AccountId');
		      	/*$this->db->join('center', 'fk_request_details_CenterId=CenterId');*/
		      	//$this->db->where($where);
		      	$this->db->where('Employee_Id',$id);
		      	$this->db->group_by('Post_Id');
		      	$this->db->order_by('Post_Id','DESC');
		      	return $this->db->get()->result();
	      }
}