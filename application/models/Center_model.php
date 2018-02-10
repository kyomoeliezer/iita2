<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class center_model extends CI_Model
{
	
	function insert_center($data)
	         {
	         	$this->db->insert('center',$data);
	         }
	function centers()
	      {
	      	$this->db->select('*');
	      	$this->db->from('center');
	      	$this->db->where('`center`.`Active_Status`',1);
	      	$this->db->join('employee','EmploymentNo=Budget_Holder_ReservedId','left');
	      	return $this->db->get()->result();
	      }
		function centerlist()
	      {
	      	$this->db->select('*');
	      	$this->db->from('center');
	      	$this->db->join('employee','EmploymentNo=Budget_Holder_ReservedId');
	      	return $this->db->get()->result();
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
	
}