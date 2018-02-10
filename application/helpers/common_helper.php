<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function date_2_userformat($date){
	$originalDate = $date;
   return $newDate = date("d/m/Y", strtotime($originalDate));
}
function date_2_dbformat($date){
  $originalDate = $date;
   return $newDate = date("Y-m-d", strtotime($originalDate));
}
function different_in_days($date1,$date2)
{
  $date1 = $date1;
  $date2 =$date2;
  $diff = abs(strtotime($date2) - strtotime($date1));

$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
return $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
}

function different_in_days_compare_today($date)
  {
/*  $date1 = $date;
  $today =date('Y-m-d');
  $diff = strtotime($today) - strtotime($date1);

$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));

return $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));*/
$now = time(); // or your date as well
$your_date = strtotime($date);
$datediff = $now - $your_date;

return round($datediff / (60 * 60 * 24));

  }

function retirement_due($date)
  {
  	$date = date_create($date);
	date_add($date, date_interval_create_from_date_string('14 days'));
	return date_format($date, 'd/m/Y');
  }
//remove slashes from the date
function replace_slashe_to_underscore($date) 
{
  return str_replace("-", "_", $date);
}

function month_2_word($month)
      {
        $dateObj   = DateTime::createFromFormat('!m', $month);
       return $monthName = $dateObj->format('F'); // March

      }
function month_2_word_and_year($month)
      {
        $dateObj   = DateTime::createFromFormat('!m', $month);
       return $monthName = $dateObj->format('F').'  '.date('Y'); // March

      }
