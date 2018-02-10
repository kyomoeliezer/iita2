<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class common_model extends CI_Model
{
    
function send_email($to,$subject,$message)
    {

        /*$this->email->from($this->company_email(),$this->company_name());
        $this->email->to($email_to); 
        $this->email->subject($subject);
        $this->email->message($message);    
        $this->email->send();*/
        
$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
    <title>' . html_escape($subject) . '</title>
    <style type="text/css">
        body {
            font-family: Arial, Verdana, Helvetica, sans-serif;
            font-size: 16px;
        }
    </style>
</head>
<body>
' . $message . '
</body>
</html>';

$result = $this->email
    ->from($this->company_email())
    ->reply_to('info@mifumotz.com')    // Optional, an account where a human being reads.
    ->to($to)
    ->cc('eliezer.kyomo@mifumotz.com')
 
    ->subject($subject)
    ->message($body)
    ->send();

    }
function company_name()
    {
        
        $this->db->select('Company_Name');
        $this->db->from('setting');
        $this->db->order_by('Setting_Id','DESC');
        $this->db->limit(1);
        foreach ($this->db->get()->result() as $row) {
            $cmpname=$row->Company_Name;
        }
        return $cmpname;

    }
function do_upload($file_name,$upload_path)
    {
        $error='';
        $config['file_name']          = $file_name;
        $config['upload_path']          = $upload_path;
        $config['overwrite'] = TRUE;
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 1009000;
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        if(! $this->upload->do_upload('attach')){
          $error= $this->upload->display_errors(); 
        }
     return $error;
    }
function do_upload_custom($file_name,$upload_path,$fieldname)
    {
        $error='';
        $config['file_name']          = $file_name;
        $config['upload_path']          = $upload_path;
        $config['overwrite'] = TRUE;
        $config['allowed_types']        = 'pdf|csv';
        $config['max_size']             = 1009000;
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        if(! $this->upload->do_upload($fieldname)){
          $error= $this->upload->display_errors(); 
        }
     return $error;
    }
function company_email()
    {
        
        $this->db->select('Company_Source_Email');
        $this->db->from('setting');
        $this->db->order_by('Setting_Id','DESC');
        $this->db->limit(1);
        foreach ($this->db->get()->result() as $row) {
            $cmpemail=$row->Company_Source_Email;
        }
        return $cmpemail;

    }
function get_all_head_and_senior_finance_mail()
    {
/*          $this->db->select('First_Name','email');
            $this->db->from('employee');
            $this->db->join('role','fk_role_Employee_Id=Employee_Id');
            $this->db->where('Senior_Finance_Role',1);
            $this->db->or_where('Head_Finance_Role',1);
            $this->db->or_where('Finance_Officer_Role',1);
            return  $this->db->get()->result();*/
            $this->db->select('First_Name,Email');
            $this->db->from('employee');
            $this->db->join('role','fk_role_Employee_Id=Employee_Id');
            $this->db->where('Senior_Finance_Role',1);
           // $this->db->where('test',1);
            $this->db->or_where('Head_Finance_Role',1);
            return  $this->db->get()->result();
    }
function get_senior_head_mail()
    {
            $this->db->select('First_Name,Email');
            $this->db->from('employee');
            $this->db->join('role','fk_role_Employee_Id=Employee_Id');
            $this->db->where('Senior_Finance_Role',1);
            //$this->db->where('test',1);
            $this->db->or_where('Head_Finance_Role',1);
            return  $this->db->get()->result();
    }
function get_all_cashier_mail()
   {
            $this->db->select('First_Name,Email');
            $this->db->from('employee');
            $this->db->join('role','fk_role_Employee_Id=Employee_Id');
            //$this->db->where('Senior_Finance_Role',1);*/
            //$this->db->where('test',1);
            $this->db->where('Cashier_Role',1);
            return  $this->db->get()->result();

   }
function get_head_mail()
    {
            $this->db->select('First_Name,Email');
            $this->db->from('employee');
            $this->db->join('role','fk_role_Employee_Id=Employee_Id');
          $this->db->where('Senior_Finance_Role',1);
            //$this->db->or_where('test',1);
          return  $this->db->get()->result();
    }
function get_employee_mail($id)
    {
            $this->db->select('First_Name','Email');
            $this->db->from('employee');
            $this->db->join('post','fk_post_EmployeeId=Employee_Id');
            $this->db->where('Post_Id',$id);
            return  $this->db->get()->result();
    }
function get_employee_detail($id)
    {
            $this->db->select('First_Name,Last_Name,EmploymentNo,Email');
            $this->db->from('employee');
            /*$this->db->join('post','EmployeeId=Employee_Id');*/
            $this->db->where('Employee_Id',$id);
            /*$this->db->or_where('Head_Finance_Role',1);*/

            $list=$this->db->get()->result();
            if (! empty($list)){
            foreach ($list as $key) {
                $data=$key->EmploymentNo.':'.$key->First_Name.':'.$key->Last_Name.':'.$key->Email;
            }
            }
            else $data='';
            return  $data;

    }
function get_cc_budget_holder($centerid)
    {
        $data='';
            $this->db->select('First_Name,Email,CenterNo');
            $this->db->from('employee');
            $this->db->join('center','EmploymentNo=Budget_Holder_ReservedId');
            $this->db->where('CenterId',$centerid);
            /*$this->db->or_where('Head_Finance_Role',1);*/
            foreach ($this->db->get()->result() as $key) {
                $data=$key->CenterNo.'$'.$key->Email.'$'.$key->First_Name;
            }
            return  $data;
    }

function send_notification_on_retirement()
   {
        $this->select('SUM(Amount) AS Post_Amount,Post_Id,  Payment_Date,Post_Description,Post_EndDate,Post_StartDate,EmploymentNo');
        $this->db->from('request_details');
        $this->db->join('post', 'fk_request_details_Post_Id=Post_Id');
        $this->db->join('employee', 'Employee_Id=fk_post_EmployeeId');
        $this->db->where('Post_EndDate <',date('Y-m-d'));
        $this->db->group_by('Post_Id');
        $this->db->order_by('Post_Id','DESC');
        return $this->db->get();
   }
}