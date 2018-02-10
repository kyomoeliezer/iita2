<div class="main-content">
				<div class="main-content-inner">
					

					<div class="page-content">
						

						<div class="page-header">
							<h3>
								<?php if (isset($search_result_desc)) echo $search_result_desc; ?>
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									 <?php //echo $desc; ?>
								</small>
							</h3>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								
								<div class="row">
									<div class="col-xs-12">
										

										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										

										
										<div>
											<table id="dynamic-table" class="table table-striped  table-hover">
												<thead>
													<!-- <tr><td colspan=12 style="color:orange;font-size: 15px;">
														<a href="<?php echo site_url('report/report_by_account');?>"><button class="btn btn-info pull-right">Search</button></a>
													</td></tr> -->
													<tr>
														<th>Date</th>
														<th>Description</th>
														<th>DocumentNo</th>
														<th>Currency</th>
														<th>Conversion Date</th>
														<th>Rate</th>
														<th>Paid Out(Orign)</th>
														<th>Paid In(Orign)</th>
														<th>Paid Out(USD)</th>
														<th>Paid In(USD)</th>
														
														<th>Account</th>
														 <th>Center</th>
														  <th style="color: orange;">Status</th>
														<th>Reserved</th>
													</tr>
												</thead>

												<tbody>
													<?php 
													$class='';
													foreach ($paidlist as $row) {
													if ((different_in_days_compare_today($row->Post_EndDate) > 14) &&($row->Post_Status=='paid'))  $class='class="danger"';  ?>
													<tr <?php echo $class;?>>
														
                                                        <td><?php echo  date_2_userformat($row->Payment_Date); ?></td>
                                                         <td><?php echo  $row->Post_Description; ?></td>
														<td>
															<a href="<?php echo base_url(); ?>post/request_details/<?php echo $row->Post_Id; ?>"><?php echo  $row->Post_Id; ?></a>
														</td>
														<td><?php if (empty($row->Currency)) echo 'USD';else echo  $row->Currency; ?></td>
														<td><?php echo  date_2_userformat($row->Payment_Date); ?></td>
														<td><?php if ($row->Payment_Amount_In_Origin !=0) echo  ($row->Payment_Amount_In_USD/$row->Payment_Amount_In_Origin); else if ($row->Payment_Amount_Out_Origin !=0)  echo  ($row->Payment_Amount_Out_USD/$row->Payment_Amount_Out_Origin); ?></td>
														<td><?php echo  $row->Payment_Amount_Out_Origin; ?></td>
														<td><?php echo  $row->Payment_Amount_In_Origin; ?></td>
														<td><?php echo  round($row->Payment_Amount_Out_USD,2); ?></td>
														<td><?php echo  round($row->Payment_Amount_In_USD,2); ?></td>
														
														<td class="hidden-480" ><?php echo  $row->AccountNo; ?> </td>
														<td class="hidden-480"><?php echo  $row->CenterNo; ?></td>
														<td class="hidden-480" style="color: orange;"><?php echo  $row->Post_Status; ?></td>
														<td class="hidden-480"><?php echo  $row->EmploymentNo; ?></td>

													</tr>
													<?php  $class='';}?>
												</tbody>
											</table>
										</div>
																					<div class="col-xs-8 ">

											<table id="table2" class="table" width=50%>
												<br/><br/>
												
										
												<thead>
													 <tr><td  colspan=12 style="background-color: #FFF;text-align: center;">
													 	<h6>UN RETIRED PAYMENTS</h6>
													</td></tr> 
													<tr>
														<th>Date</th>
														<th>Over Due Days</th>
														<th>Description</th>
														<th>DocumentNo</th>
														<th>Currency</th>
														
														<th>Paid Out(USD)</th>
														
														
														<th >Account</th>
														<th>Center</th>
														<th>Reserved</th>
													</tr>
												</thead>

												<tbody>
													<?php 
													$Payment_Amount_In_Origin_total=$Payment_Amount_In_USD_total=$Payment_Amount_Out_Origin_total=$Payment_Amount_In_USD_total=$Payment_Amount_Out_USD_total=0;
													foreach ($paidlist_unretired as $row) {
														$Payment_Amount_In_USD_total =$Payment_Amount_In_USD_total+$row->Payment_Amount_In_USD;
														$Payment_Amount_In_Origin_total =$Payment_Amount_In_Origin_total+$row->Payment_Amount_In_Origin;
														$Payment_Amount_Out_Origin_total =$Payment_Amount_Out_Origin_total+$row->Payment_Amount_Out_Origin;
														$Payment_Amount_Out_USD_total =$Payment_Amount_Out_USD_total+$row->Payment_Amount_Out_USD;
													
													
													if ((different_in_days_compare_today($row->Post_EndDate) > 14) &&($row->Post_Status=='paid'))  $class='class="danger"';  ?>
													<tr <?php echo $class;?>>
														
                                                        <td><?php echo  date_2_userformat($row->Payment_Date); ?></td>
                                                       <td> <?php echo different_in_days_compare_today($row->Post_EndDate); ?></td>
                                                         <td><?php echo  $row->Post_Description; ?></td>
														<td>
															<a href="<?php echo base_url(); ?>post/request_details/<?php echo $row->Post_Id; ?>"><?php echo  $row->Post_Id; ?></a>
														</td>
														<td><?php if (empty($row->Currency)) echo 'USD';else echo  $row->Currency; ?></td>
														<td><?php echo  $row->Payment_Amount_Out_Origin; ?></td>
														<td class="hidden-480" ><?php echo  $row->AccountNo; ?> </td>
														<td class="hidden-480"><?php echo  $row->CenterNo; ?></td>
														<td class="hidden-480"><?php echo  $row->EmploymentNo; ?></td>

													</tr>
													<?php }?>
													<tr>
														
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														
														<td style="color:blue; font-weight: 200px;font-style: bold;">TOTAL</td>
														<td style="color:blue; font-weight: 200px;font-style: bold;"><?php echo round($Payment_Amount_Out_Origin_total,3); ?></td>
														<!-- <td style="color:blue; font-weight: 200px;font-style: bold;"><?php echo round($Payment_Amount_In_Origin_total,2); ?></td>
														<td style="color:blue; font-weight: 200px;font-style: bold;"><?php echo round($Payment_Amount_Out_USD_total,2); ?></td>
														<td style="color:blue; font-weight: 200px;font-style: bold;"><?php echo round($Payment_Amount_In_USD_total,2); ?></td> -->
														
														<td></td>
														<td></td>
														<td></td>
														

														
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
			<?php  $this->load->view('common/include_footer');?>

		<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url();?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/dataTables.buttons.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/buttons.flash.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/buttons.html5.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/buttons.print.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/buttons.colVis.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/dataTables.select.min.js"></script>

		<!-- ace scripts -->
		<script src="<?php echo base_url();?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				//initiate dataTables plugin
				var myTable = 
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: true,
					"aoColumns": [
					  { "bSortable": false },
					  null, null,null,null,null, null,null,null,null, null,null,null,
					  { "bSortable": false }
					],
					"aaSorting": [],
					
					
					//"bProcessing": true,
			        //"bServerSide": true,
			        //"sAjaxSource": "http://127.0.0.1/table.php"	,
			
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
			
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
			
					//"iDisplayLength": 50
			
			
					select: {
						style: 'multi'
					}
			    } );
			
			<?php $this->load->view('common/include_script'); ?>