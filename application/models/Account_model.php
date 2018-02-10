<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class account_model extends CI_Model
{
	
	function insert_account($data)
	         {
	         	$this->db->insert('account',$data);
	         }
	function accounts()
	      {
	      	$this->db->select('*');
	      	$this->db->from('account');
	        $this->db->where('Active_Status',1);
	      	return $this->db->get()->result();
	      }
	function account_by_id($id)
	     {
	     	$this->db->select('*');
	      	$this->db->from('account');
	      	$this->db->where('Account_Id',$id);
	      	return $this->db->get()->result();

	     }
	function update_account($data,$id)
	    {   
	    	$this->db->where('Account_Id',$id);
	    	$this->db->update('account',$data);
	    }
	
}