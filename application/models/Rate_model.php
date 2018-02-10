<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class rate_model extends CI_Model
{
	
	function insert_rate($data)
	         {
	         	$this->db->insert('rate',$data);
	         }
	function rate()
	      {
	      	$this->db->select('*');
	      	$this->db->from('rate');
	      	return $this->db->get()->result();
	      }
	function rate_by_id($id)
	     {
	     	$this->db->select('*');
	      	$this->db->from('rate');
	      	$this->db->where('Rate_Id',$id);
	      	return $this->db->get()->result();

	     }
	function update_rate($data,$id)
	    {   
	    	$this->db->where('Rate_Id',$id);
	    	$this->db->update('rate',$data);
	    }
	function get_rate()
	    {
	    	$this->db->select('*');
	    	$this->db->from('currency');
	    	$this->db->order_by('Currency_Id','DESC');
	    	$this->db->limit(1);
	    	//$this->db->get()->result();
	    	 
	     return $this->db->get()->result();
	    }
	function get_rate_percurrency($str_currency)
	   {
	   	$rate=0;
	   	foreach ($this->get_rate() as $row) {
	   	  /*if ($str_currency=='GBP') $rate=$row->GBP;*/
	   	  if ($str_currency=='TZS') $rate=$row->USD;
	   	  /*else if ($str_currency=='EURO') $rate=$row->EURO;
	   	  else if ($str_currency=='YEN') $rate=$row->YEN;
	   	  else if ($str_currency=='TZS') $rate=1;*/
	   	}
	   	return $rate;
	   }
	
}