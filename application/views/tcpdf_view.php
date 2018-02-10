<?php
tcpdf();
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = "PDF Report";
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
ob_start();
    // we can have any view part here like HTML, PHP etc
//$content =file_get_contents('http://localhost/iita/post/');
$html='';
/*$html .= '<style>'.file_get_contents(base_url().'assets/font-awesome/4.5.0/css/font-awesome.min.css').'</style>';
$html .= '<style>'.file_get_contents(base_url().'assets/css/bootstrap.min.css').'</style>';
$html .= '<style>'.file_get_contents(base_url().'assets/css/fonts.googleapis.com.css').'</style>';*/
    $html .= '
    
    <table id="dynamic-table" class="table table-striped  table-hover" >
												<thead>
													<tr>
														<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
														<th>PostNo</th>
														<th>Amount</th>
														<th>Description</th>
														<th>Reserved/Person Acc No</th>
														
														<th>Account</th>
                                                         <th class="hidden-480">Rejection Reason</th>
                                                         
                                                        
                                                     
													</tr>
												</thead>

												<tbody>
													';
													foreach ($postlist as $row) {
													$html .='<tr>
														<td class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>

														<td>
															<a href="'. base_url().'post/request_details/'. $row->Post_Id.'">'. $row->Post_Id.'</a>
														</td>
														<td>'. $row->Post_Amount.'</td>
														<td>'. $row->Post_Description.'</td>
														<td class="hidden-480">'.  $row->EmploymentNo.'</td>
														
														<td class="hidden-480">'. $row->AccountNo.'</td>
														<td class="hidden-480">'. $row->Rejection_Reason.' </td>

														
											
													</tr>';
												}
													$html .='
													
												</tbody>
											</table>';


    
ob_end_clean();
$obj_pdf->writeHTML($html, true, false, true, false, '');
$obj_pdf->Output('output.pdf', 'I');
?>