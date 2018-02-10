<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class welcome_model extends CI_Model
{
	
	function employee_by_email_password($email,$passwd)
	      {
	      	$this->db->select('*');
	      	$this->db->from('employee');
	      	$this->db->join('role','fk_role_Employee_Id=Employee_Id');
	      	$this->db->where('Email',$email);
	      	$this->db->where('Password','password');
	      	return $this->db->get();
	      }
function employee_email_using_old_password($email,$passwd)
	      {
	      	$this->db->select('*');
	      	$this->db->from('employee');
	      	$this->db->where('Email',$email);
	      	$this->db->where('Password','password');
	      	return $this->db->get();
	      }
	function center_by_id($id)
	     {
	     	$this->db->select('*');
	      	$this->db->from('center');
	      	$this->db->where('CenterId',$id);
	      	return $this->db->get()->result();

	     }
	function update_center($data,$id)
	    {   
	    	$this->db->where('CenterId',$id);
	    	$this->db->update('center',$data);
	    }
	function check_if_is_employee_only($id)
	    {   
	    	$this->db->select('*');
	      	$this->db->from('role');
	      	//$this->db->join('role','fk_role_Employee_Id=Employee_Id');
	      	$this->db->where('fk_role_Employee_Id',$id);
	      	$this->db->where('Employee_Role',1);
	      	$this->db->where('Finance_Officer_Role IS  NULL');
	      	$this->db->where('Senior_Finance_Role IS  NULL');
	      	$this->db->where('Head_Finance_Role IS  NULL');
	      	$this->db->where('Asistant_accountant IS  NULL');
	      	$this->db->where('Cashier_Role IS  NULL ');
	      	$this->db->where('Cashier_Role IS  NULL ');
	      	return $this->db->get()->num_rows();
	    }

	
}