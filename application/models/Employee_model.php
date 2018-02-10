<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class employee_model extends CI_Model
{
	
	function insert_employee($data)
	         {
	         	$this->db->insert('employee',$data);
	         	return $this->db->insert_id();
	         }
	function insert_role($data)
	         {
	         	$this->db->insert('role',$data);
	         	
	         }
	function insert_banks($data)
	         {
	         	$this->db->insert('banks',$data);
	         	
	         }
		function update_banks($data,$id)
	         {
	         	$this->db->where('Bank_Id',$id);
	         	$this->db->update('banks',$data);
	         	
	         }
	function update_role($data,$id)
	         {
	         	$this->db->where('fk_role_Employee_Id',$id);
	         	$this->db->update('role',$data);
	         	
	         }
	function get_banks()
	       {
	       	$this->db->select('*');
	       	$this->db->from('banks');
	       	return $this->db->get()->result();

	       }
	function get_bank_id($id)
	       {
	       	$this->db->select('*');
	       	$this->db->from('banks');
	       	$this->db->where('Bank_Id',$id);
	       	return $this->db->get()->result();

	       }
	function get_bank_id_by_name($bname)
	       {
	       	$this->db->select('Bank_Id');
	       	$this->db->from('banks');

	       	$this->db->where('Bank_Name',$bname);
	       	foreach ($this->db->get()->result() as $key ) {
	       	 	$bank_id=$key->Bank_Id;
	       	 }
	       	if (! empty($bank_id)) return $bank_id;
	       	else return 0; 

	       }
	function employees()
	      {
	      	$this->db->select('*');
	      	$this->db->from('employee');
	      	$this->db->join('banks','Bank_Id =fk_employee_Bank_Id','left');
	      	$this->db->where('Active_Status',1);
	      	$this->db->order_by('Employee_Id','DESC');
	      	return $this->db->get()->result();
	      }
	function inactive_employee()
	      {
	      	$this->db->select('*');
	      	$this->db->from('employee');
	      	$this->db->where('Active_Status',0);
	      	$this->db->order_by('Employee_Id','DESC');
	      	return $this->db->get()->result();

	      }
		function rejected_employee()
	      {
	      	$this->db->select('*');
	      	$this->db->from('employee');
	      	$this->db->where('Active_Status',2);
	      	return $this->db->get()->result();

	      }
	function employee_by_id($id)
	     {
	     	$this->db->select('*');
	      	$this->db->from('employee');
	      	$this->db->join('role','fk_role_Employee_Id=Employee_Id');
	      	$this->db->where('Employee_Id',$id);
	      	$this->db->order_by('Employee_Id','DESC');
	      	return $this->db->get()->result();

	     }
	function update_employee($data,$id)
	    {   
	    	$this->db->where('Employee_Id',$id);
	    	$this->db->update('employee',$data);
	    }
	function get_budget_holders()
	    {
	    	$this->db->select('*');
	      	$this->db->from('employee');
	      	$this->db->join('role','fk_role_Employee_Id=Employee_Id');
	      	//$this->db->where('Budget_Holder_Role',1);
	      	return $this->db->get()->result();
	    }

	
}