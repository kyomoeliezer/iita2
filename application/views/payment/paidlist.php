<div class="main-content">
				<div class="main-content-inner">
					

					<div class="page-content">
						

						<div class="page-header">
							<h1>
								Payments
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									 <?php echo 'List'; ?>
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								
								<div class="row">
									<div class="col-xs-12">
										

										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										

										<?php 
                              if (! empty($this->session->flashdata('message_name'))){?>
                              <div class="alert alert-success pull-right"> <?php echo  $this->session->flashdata('message_name');?> </div> 
                         <?php }?>
										<div>
											<table id="dynamic-table" class="table table-striped  table-hover">
												<thead>
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
														
														<th>Reserved</th>
													</tr>
												</thead>

												<tbody>
													<?php foreach ($paidlist as $row) {?>
													<tr>
														
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
														<td class="hidden-480"><?php echo  $row->AccountNo; ?> </td>
														
														<td class="hidden-480"><?php echo  $row->EmploymentNo; ?></td>

													</tr>
													<?php }?>
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
					  null, null,null,null,null, null,null,null,null, null,
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