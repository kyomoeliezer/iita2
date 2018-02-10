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
			  </style>
					';
						$html .= '<div style="text-align:center; ">;
						
								  <table class="table">
								  <tr>
									 	<td colspan="2" style="text-align: center; border-top:none;">
									 					<h3><b> Request Details For';
									 					 foreach ($post as $key) { 
									 					 	$html .='   '.ucfirst($key->First_Name.'   '.$key->Last_Name).'   ' ;  }

									 					 	$html .='</b></h3>
									 				</td>
									 	</tr>';
									  foreach ($post as $row) { 
									   
									 
									 			
									 	$html .='	
									 		<tr class="table-row">
										 		<td class="rowdata1 text-right" style="border: none;" align="right">Status:</td>
										 		<td class="rowdata2 text-left" align="left" >';
										 			 if ($row->Post_Status=='waiting approval'){
										 			$html .='<span class="label label-warning arrowed-in arrowed-in-right">&nbsp;&nbsp;&nbsp;&nbsp;'.strtoupper($row->Post_Status).'</span>';
										 			
										 			 } 
										 			 else if ($row->Post_Status=='approved'){

										 			$html .='<span class="label label-success arrowed-in arrowed-in-right">&nbsp;&nbsp;&nbsp;&nbsp;'.strtoupper($row->Post_Status).'</span>';

										 			 } else if ($row->Post_Status=='rejected'){

										 			$html .='<span class="label label-danger arrowed-in arrowed-in-left">&nbsp;&nbsp;&nbsp;&nbsp;'.strtoupper($row->Post_Status).'</span>';
										 			
										 			 } else{ 
										 		      $html .='&nbsp;&nbsp;&nbsp;&nbsp;'. Strtoupper($row->Post_Status);
										 		  }

										 		$html .='</td></tr>';
										 
										 	if ($row->Post_Status=='rejected'){
										 		$html .='<tr class="table-row">
										 		<td class="rowdata1 text-right" align="right" style="border: none;">Rejection Reason:</td>
										 		<td class="rowdata2 text-left"  align="left" style="border: none;">';
										 			 if ($row->Post_Status=='waiting approval'){
										 			$html .='&nbsp;&nbsp;&nbsp;&nbsp;'. strtoupper($row->Rejection_Reason);
										 			 }
										 
										 		$html .='</td></tr>';
										 	 }


										 	$html .='<tr class="table-row">
										 		<td class="rowdata1 text-right"  style="border: none;">Doc No#:</td>
										 		<td class="rowdata2 text-left" style="border: none;">
										 			<span >&nbsp;&nbsp;&nbsp;&nbsp;'. strtoupper($row->Post_Id).'</span>
										 			
										 		</td></tr>';
										 	//$html .= '</table>';

									 		$html .= '<tr class="table-row">
										 		<td class="rowdata1 text-right" style="border: none;">Owner:</td>
										 		<td class="rowdata2 text-left" style="border: none;border: none;">&nbsp;&nbsp;&nbsp;&nbsp;'.ucfirst($key->First_Name.'    '.$key->Last_Name).'</td>
									 	    </tr>
									 	    <tr class="table-row">
										 		<td class="rowdata1 text-right" style="border: none;">Principal Traveler:</td>
										 		<td class="rowdata2 text-left" style="font-weight: bold;border: none;">&nbsp;&nbsp;&nbsp;&nbsp;'.ucfirst($key->First_Name.',   '.$key->Last_Name).'&nbsp;&nbsp;&nbsp;&nbsp;'.   $row->EmploymentNo.'</td>
									 	   </tr>
									 	   <tr class="table-row">
										 		<td class="rowdata1 text-right" style="border: none;">Description:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold;border: none;">&nbsp;&nbsp;&nbsp;&nbsp;'. $key->Post_Description.'</td>
									 	   </tr>
									 	   <tr>
										 		<td class="rowdata1 text-right" style="border: none;">Duration:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold;border: none;">&nbsp;&nbsp;&nbsp;&nbsp;'.  different_in_days($key->Post_StartDate,$key->Post_EndDate).'  days</td>
									 	   </tr>
									 	   <tr class="table-row">
										 		<td class="rowdata1 text-right" style="border: none;">Start Date:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold;border: none;">&nbsp;&nbsp;&nbsp;&nbsp;'.date_2_userformat($key->Post_StartDate).'</td>
									 	   </tr>
									 	   <tr class="table-row">
										 		<td class="rowdata1 text-right" style="border: none;">End Date:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold;border: none;">&nbsp;&nbsp;&nbsp;&nbsp;'.  date_2_userformat($key->Post_EndDate).'</td>
									 	   </tr>
									 	   <tr class="table-row">
										 		<td class="rowdata1 text-right" style="border: none;">Due Date:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold;border: none;">&nbsp;&nbsp;&nbsp;&nbsp;'. retirement_due($key->Post_EndDate).'</td>
									 	   </tr>
									 	   
									 	   <tr class="table-row" style="color:orange;">
										 		<td class="rowdata1 text-right" style="border: none;">Estmated Total Cost:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold;border: none;">&nbsp;&nbsp;&nbsp;&nbsp;'. $totalamount.'  '.$key->Currency.'</td>
									 	   </tr>
									 	   <tr class="table-row">
										 		<td class="rowdata1 text-right" style="border: none;">Date Submitted:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold;border: none;">&nbsp;&nbsp;&nbsp;&nbsp;'. date_2_userformat($key->Date_Created).'</td>
									 	   </tr>
									 	   <tr class="table-row">
										 		<td class="rowdata1 text-right" style="border: none;">Cost Type:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold;border: none;">&nbsp;&nbsp;&nbsp;&nbsp;'. $key->Costing_type.'</td>
									 	   </tr>
									 	   <tr class="table-row">
										 		<td class="rowdata1 text-right" style="border: none;">Account:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold; border: none;">&nbsp;&nbsp;&nbsp;&nbsp;'.  $key->AccountNo.'</td>
									 	   </tr></table>';
									 	    $html .= '
									 	<table class="table">
									 		
									 			<tr>
									 				<td style="border-top:none;border-bottom: 0.3px #f1f1f1;; border-bottom-width: thin;">Cost Center</td>
									 				<td style="border-top:none;border-bottom: 0.3px #f1f1f1;border-bottom-width: thin;">Description</td>
									 				<td style="border-top:none;border-bottom: 0.3px #f1f1f1;border-bottom-width: thin;">Budget Holder</td>
									 				<td class="text-right" style="border-top:none; border-bottom: 0.3px #f1f1f1;border-bottom-width: thin;">Amount</td>
									 				
									 				
									 			</tr>';
									 		
									 			$total=0; foreach ($requestlist as $row) {
									 			
									 			$html .='<tr>
									 				<td style="border:none;">'. $row->CenterNo. '</td>		
									 				<td style="border:none;">'. $row->Center_Description. '</td>
									 				<td style="border:none;">'. $row->First_Name.'  '.$row->Last_Name. '</td>
									 				<td class="text-right" style="border:none;">'. $row->Amount.'</td>	 
									 			</tr>';
									 			 }
									 			
									 		
									 $html .='</table>
									 	   
									 	  
									 	  
									';
                            $html .='
                         
								
												';
														 

														 $html .='<br/><br/><br/>';
									if (! empty($travel_list)){
																		 	
									 	$html .='<table  class="table   table-hover">
									 		
									 			<tr>
									 				<td style="border-top:none;border-bottom: 1px #f1f1f1; border-bottom-width: thin; color:orange;">From</td>
									 				<td style="border-top:none;border-bottom: 1px #f1f1f1;border-bottom-width: thin; color:orange;">To</td>
									 				<td style="border-top:none;border-bottom: 1px #f1f1f1;border-bottom-width: thin; color:orange;">Departure</td>
									 				<td class="text-right" style="border-top:none; border-bottom: 1px #f1f1f1;border-bottom-width: thin; color:orange;">Arrival</td>
									 				
									 				
									 			</tr>';
									 		
									 			foreach ($travel_list as $trow1) {
									 			
									 			$html .='<tr>
									 				<td style="border:none;">'. $trow1->City_From.'</td>		
									 				<td style="border:none;">'.$trow1->City_To.'</td>
									 				<td style="border:none;">'. date_2_userformat($trow1->Departure_Date).'</td>
									 				<td class="text-right" style="border:none;">'.  date_2_userformat($trow1->Arrival_Date).'</td>	 
									 			</tr>';
									 			 }
									 			
									 		
									 	$html .='</table>';
									 	
									

                                     
                                     }
                                     if (! empty($payoutlist)){ 

															$html .='<table class="table">
																	
                                                                        <tr>
                                                                        <td colspan="6" style="text-align:left; color:green;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PAYMENTS</td>
                                                                        </tr>
																		<tr>
																	    <td style="border-top:none;border-bottom: 0.3px #f1f1f1;; border-bottom-width: thin;">Date</td>
																	    <td style="border-top:none;border-bottom: 0.3px #f1f1f1;; border-bottom-width: thin;">Amount(Origin)</td>
																		<td style="border-top:none;border-bottom: 0.3px #f1f1f1;; border-bottom-width: thin;">Currency</td>
																		<td style="border-top:none;border-bottom: 0.3px #f1f1f1;; border-bottom-width: thin;">Amount(USD)</td>
																		<td style="border-top:none;border-bottom: 0.3px #f1f1f1;; border-bottom-width: thin;">Rate</td>
																		<td style="border-top:none;border-bottom: 0.3px #f1f1f1;; border-bottom-width: thin;">Doc</td>
																	</tr>
																
																';
																 foreach ($payoutlist as $value) {
																	
																
																	 $html .='<tr>
																		<td class="center">'.date_2_userformat($value->Payment_Date).'</td>
                                                                        <td class="center">'.$value->Payment_Amount_Out_Origin.'</td>
																		<td class="center">'.$value->Currency.'</td>
																		<td class="center">'.round($value->Payment_Amount_Out_USD,3).'</td>
																		<td class="center">'; 
																		if ($value->Payment_Amount_Out_USD== $value->Payment_Amount_Out_Origin) $html .='1'; else { if ($value->Payment_Amount_Out_USD !=0) $html .=  round((1/($value->Payment_Amount_Out_Origin/$value->Payment_Amount_Out_USD)),5);
                                                                             else $html .= '0';
																		} 
																		$html .='</td>
																		<td class="center"><span>'.strtoupper($value->fk_payment_Post_Id).'</span></td>
																	</tr>';
																	 }
																$html .='
															</table>';
										
										  } 
										 else if ($key->Post_Status =='approved'){

                                          }else {
																$html .='<br/><br/><table><tr><td style="color:red;">PAYMENT IS WAITING FOR APPROVAL</td></tr><table>';
															}

															
																		
													   if (! empty($payintlist)){  					
														$html .='<br/><br/><br/><br/>	
															<table class="table">
																	
                                                                        <tr>
                                                                        <td colspan="6" style="text-align:left; color:orange;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RETIREMENTS</td>
                                                                        </tr>
																		<tr>
																	    <td style="border-top:none;border-bottom: 0.3px #f1f1f1;width=15%;  border-bottom-width: thin;">Date</td>
																	    <td style="border-top:none;border-bottom: 0.3px #f1f1f1;width=15%;  border-bottom-width: thin;">Amount(Origin)</td>
																		<td style="border-top:none;border-bottom: 0.3px #f1f1f1;width=15%;  border-bottom-width: thin;">Currency</td>
																		<td style="border-top:none;border-bottom: 0.3px #f1f1f1;width=15%;  border-bottom-width: thin;">Amount(USD)</td>
																		<td style="border-top:none;border-bottom: 0.3px #f1f1f1;width=15%;  border-bottom-width: thin;">Rate</td>
																		<td style="border-top:none;border-bottom: 0.3px #f1f1f1;width=15%;  border-bottom-width: thin;">Change</td>
																		
																		
																	</tr>
																
																';
																 foreach ($payintlist as $trow) {
																	
																
																	$html .='<tr>
																		<td class="center">'. date_2_userformat($trow->Payment_Date).'</td>
                                                                        <td class="center">'. $trow->Payment_Amount_In_Origin.'</td>
																		<td class="center">'. $trow->Currency.'</td>
																		<td class="center">'. round($trow->Payment_Amount_In_USD,3).'</td>
																		<td class="center">';  
																		if ($trow->Payment_Amount_In_USD== $trow->Payment_Amount_In_Origin) $html .= '1'; else { $html .=   round((1/($trow->Payment_Amount_In_Origin/$trow->Payment_Amount_In_USD)),5);}
																			$html .='</td>
																		<td class="center">'. ($trow->Cash_Retired_Origin-$trow->Payment_Amount_In_Origin).'</td>
																		
																		
																	</tr>';
																	 }
																$html .='
															</table>';

							$html .='</div>
						</div>
						<!--/row-->';
									 	}
									 }


		
			ob_end_clean();
$obj_pdf->writeHTML($html, true, false, true, false, '');
ob_end_clean();
$obj_pdf->Output('Request '.$Post_Id.' Details.pdf', 'D');
?>