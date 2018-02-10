<div class="main-content">
				<div class="main-content-inner">
					

					<div class="page-content">
						

						<div class="page-header">
							<h1>
								<?php echo $head; ?>
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									 List
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
														<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
														<th>Person Acc No#</th>
														<th>Name</th>
														<th class="hidden-480">Email</th>
														<th class="hidden-480">Mobile</th>
                                                        <th class="hidden-480">AccountNo</th>
                                                        <th class="hidden-480">Reason</th>
                                                        <th class="hidden-480">Status</th>
														<?php ?>
														<th class="hidden-480">Action</th>
														<?php ?>
													</tr>
												</thead>

												<tbody>
													<?php foreach ($employeeslist as $row) {?>
													<tr>
														<td class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>

														<td>
															<a href="#"><?php echo  $row->EmploymentNo; ?></a>
														</td>
														<td><?php echo  $row->First_Name.'  '.$row->Last_Name; ?></td>
														<td class="hidden-480"><?php echo  $row->Email; ?></td>
														<td class="hidden-480"><?php echo  $row->Mobile; ?></td>
														<td class="hidden-480"><?php echo  $row->BankAccountNo; ?></td>
														<td class="hidden-480"><?php echo  $row->Reject_Reason; ?></td>
														<td class="hidden-480"><?php if ($row->Active_Status==1) echo  'Active'; else echo 'Inactive'; ?></td>

                                                         
														<td>
															<div class="hidden-sm hidden-xs action-buttons">
																<!-- <a class="blue" href="http">
																	<i class="ace-icon fa fa-search-plus bigger-130"></i>
																</a> -->

																<!-- <a class="green" href="#">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a> -->
																<?php if ($this->session->userdata['logged_in']['Senior_Finance_Role']==1) {?>
																 <a href="javascript:;"  title="Activate" onclick="showAjaxModal('<?php echo base_url();?>employee/activate_employee/<?php echo $row->Employee_Id;?>');">  <i class="ace-icon fa fa-check-square-o bigger-130"></i></a>
																 <a href="javascript:;"  title="Reject" onclick="showAjaxModal('<?php echo base_url();?>employee/reject_employee/<?php echo $row->Employee_Id;?>');">  <i class="ace-icon fa fa-close bigger-130"></i></a>
																 <?php }?>
																
                                                                <?php if ($this->session->userdata['logged_in']['Finance_Officer_Role']==1){?>
																
																<a href="javascript:;"  title="Edit" onclick="showAjaxModal('<?php echo base_url();?>employee/edit_employee/<?php echo $row->Employee_Id;?>');">  <i class="ace-icon fa fa-pencil bigger-130"></i></a>

                                            
                                                               <?php }?>
																
															</div>

															
														</td>
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
					  null, null,null,null,null,null,null,
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