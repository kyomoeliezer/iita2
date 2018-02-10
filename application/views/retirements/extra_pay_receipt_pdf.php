<?php
ob_start();
tcpdf();

$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = "IITA TANZANIA";
$obj_pdf->SetTitle($title);
$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();

              
			$html='
			<link rel="stylesheet" href="'. base_url().'assets/css/bootstrap.min.css" />
             <style>
                     .text-right{text-align:right;}
                     .text-left{text-align:left;}
                     .table 
                     {
					    border-collapse:separate;
					    border-spacing:0 10px;

                     }
                     .center 
                     {
                      margin: 0 auto; 
                      text-align:center;
                     }
				     table
				     {
				      margin: 0 auto; /* or margin: 0 auto 0 auto */
				     }
				     table.table1 {
                           border-collapse: collapse;
                        }

			  </style>
					';
						$html .= '<div style="text-align:center; ">;
						
								  <table class="table">
								  <tr>
									 	<td colspan="2" style="text-align: left; border-top:none;">
									 					<h3><b> Requester: ';
									 					 foreach ($post as $key) { 
									 					 	$html .=  $key->EmploymentNo.'    '.strtoupper($key->First_Name.'   '.$key->Last_Name).'   ' ;  }

									 					 	$html .=' </b></h3>
									 				</td>
									 	</tr></table><br/><br/>';
						$html .= '<table class="table1">
						          <tr style="line-height: 100%;">
                                  <td style="border-top:none;border-bottom: 1px #f1f1f1; border-bottom-width: thin; ">Reserved</td>
                                  <td style="border-top:none;border-bottom: 1px #f1f1f1; border-bottom-width: thin; ">Description</td>
                                  <td style="border-top:none;border-bottom: 1px #f1f1f1; border-bottom-width: thin; ">Start Date</td>
                                  <td style="border-top:none;border-bottom: 1px #f1f1f1; border-bottom-width: thin; ">End Date</td>
                                  <td style="border-top:none;border-bottom: 1px #f1f1f1; border-bottom-width: thin; ">Received</td>
                                  <td style="border-top:none;border-bottom: 1px #f1f1f1; border-bottom-width: thin; ">Retired</td>
                                  <td style="border-top:none;border-bottom: 1px #f1f1f1; border-bottom-width: thin; ">Received/Returned</td>

						          </tr>';
						foreach ($change as $row) {
							
						

						$html .='<tr style="line-height: 30px;">
						       <td>'.$row->EmploymentNo.'</td>    
						       <td>'.$row->Post_Description.'</td>  
						       <td>'.date_2_userformat($row->Post_StartDate).'</td>
						       <td>'.date_2_userformat($row->Post_EndDate).'</td>
						       <td>'.$row->Payment_Amount_Out_Origin.'</td>
						       <td>'.$row->Cash_Retired_Origin.'</td> ';
						       if ($row->Cash_Retired_Origin > $row->Payment_Amount_In_Origin) {
						       $html .='
						       <td style="color:red;">'.($row->Cash_Retired_Origin-$row->Payment_Amount_Out_Origin).'</td> '; 
						       //$msg='You have received';
						       $msg='<span style="color:green;">You have received</span>';
						       }
						       else { 
						       	$msg='<span style="color:red;">You have paid</span>';
						        $html .='<td style="color:green;">'.($row->Cash_Retired_Origin-$row->Payment_Amount_Out_Origin).'</td>';
						      }
						      $html .='</tr>';
						      }
						      $html .='</table><br/><br/><br/>';
						      $html .='<div class="signature">
						      <table>
						      <tr><td style="width:50%; text-align:left; padding-right:20px;"><b>Issued By</b><br/><br/><span style=" border-bottom: 1px dotted #000;
                             text-decoration: none;">CASHIER-DAR</span></td>
						      <td style="width:50%;text-align:right; padding-left:20px;"><b>'.$msg.' '.strtoupper($row->Currency).' '.($row->Cash_Retired_Origin-$row->Payment_Amount_Out_Origin). 
						      '<br/><br/>Staff Signature</b><br/><br/>
                             <b>............................</b>
                             <br/><br/>
                             <b>
						      </td></tr>

						      </table>

						      </div>';

									  


		
			ob_end_clean();
$obj_pdf->writeHTML($html, true, false, true, false, '');
ob_end_clean();
$obj_pdf->Output('Request '.$Post_Id.' Details.pdf', 'D');
?>