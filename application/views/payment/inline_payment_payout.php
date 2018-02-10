<div class="main-content">
				<div class="main-content-inner">
					

					<div class="page-content">
						

						<div class="page-header">
							<h1>
								Payments Process
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									record the processed payment
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">
									<div class="col-sm-4 col-md-offset-2">
										<div class="widget-box widget-color-blue2">
											<div class="widget-header">
												<h4 class="widget-title lighter smaller">Request Details</h4>
											</div>

								<div class="widget-body">
								   <div class="widget-main padding-6">
									<div class="vspace-16-sm"></div>
                                    <?php foreach ($postlist as $row) {?>
										<div class="dd dd-draghandle">
											<ol class="dd-list">
												<li class="dd-item dd2-item" data-id="13">
													<div class="dd-handle dd2-handle">
														<i class="normal-icon ace-icon orange fa fa-tasks blue bigger-130"></i>

														<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
													</div>
													<div class="dd2-content"><?php echo $row->Post_Id;  ?></div>
												</li>
												<li class="dd-item dd2-item" data-id="13">
													<div class="dd-handle dd2-handle">
														<i class="normal-icon ace-icon orange fa fa-user blue bigger-130"></i>

														<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
													</div>
													<div class="dd2-content"><?php echo strtoupper($row->First_Name.'  '.$row->Last_Name);  ?></div>
												</li>
												<li class="dd-item dd2-item" data-id="14">
													<div class="dd-handle dd2-handle">
														<i class="normal-icon ace-icon  fa fa-money orange bigger-130"></i>

														<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
													</div>
													<div class="dd2-content orange"><?php echo 'USD: '. $row->Post_Amount; ?></div>
												</li>

												<li class="dd-item dd2-item" data-id="14">
													<div class="dd-handle dd2-handle">
														<i class="normal-icon ace-icon  fa fa-clock-o orange bigger-130"></i>

														<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
													</div>
													<div class="dd2-content"><?php echo $row->Date_Created; ?></div>
												</li>

												<li class="dd-item dd2-item" data-id="15">
													<div class="dd-handle dd2-handle">
														<i class="normal-icon ace-icon fa fa-comments orange bigger-130"></i>

														<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
													</div>
													<div class="dd2-content">Payment Details</div>

													<ol class="dd-list">
														<li class="dd-item dd2-item" data-id="16">
															<div class="dd-handle dd2-handle">
																<i class="normal-icon ace-icon fa fa-exchange pink bigger-130"></i>

																<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
															</div>
															<div class="dd2-content"><?php echo $row->CenterNo.'    :'.$row->Center_Description; ?></div>
														</li>

														<li class="dd-item dd2-item dd-colored" data-id="17">
															<div class="dd-handle dd2-handle btn-info">
																<i class="normal-icon ace-icon pink fa fa-hdd-o bigger-130"></i>

																<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
															</div>
															<div class="dd2-content"><?php echo  $row->EmploymentNo.'   :Reserved ID'; ?></div>
														</li>

														<li class="dd-item dd2-item" data-id="18">
															<div class="dd-handle dd2-handle">
																<i class="normal-icon ace-icon pink fa fa-eye green bigger-130"></i>

																<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
															</div>
															<div class="dd2-content"><?php echo  $row->AccountNo.'   :'.$row->Account_Description; ?></div>
														</li>
														<li class="dd-item dd2-item" data-id="18">
															<div class="dd-handle dd2-handle">
																<i class="normal-icon ace-icon pink fa fa-credit-card green bigger-130"></i>

																<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
															</div>
															<div class="dd2-content"><?php echo  $row->BankAccountNo.'   :Bank Account'; ?></div>
														</li>
													</ol>
												</li>

												<li class="dd-item dd2-item" data-id="19">
													<div class="dd-handle dd2-handle">
														<i class="normal-icon ace-icon fa fa-calendar blue bigger-130"></i>

														<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
													</div>
													<div class="dd2-content"><?php echo $row->Post_StartDate.'&nbsp;&nbsp;&nbsp;&nbsp;          TO                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row->Post_EndDate; ?></div>
												</li>
											</ol>
										</div>
										
									
									 

													
												</div>
											</div>
										</div>
									</div>

									<div class="col-sm-4">
										<div class="widget-box widget-color-orange">
											<div class="widget-header">
												<h4 class="widget-title lighter smaller">
													Pay out
													<span class="smaller-80"></span>
												</h4>
											</div>
                                          <?php //echo validation_errors(); ?>
											<div class="widget-body">
												<div class="widget-main padding-8">
												<?php echo form_open_multipart('payment/payout');?>
													<li class="dd-item dd2-item" data-id="18">
															<div class="dd-handle dd2-handle">
																<i class="normal-icon ace-icon  fa fa-credit-card green bigger-130"></i>

																<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
															</div>
															<div class="dd2-content"><?php echo  $row->BankAccountNo.'   :'.strtoupper($row->First_Name.'  '.$row->Last_Name); ?></div>
														</li>
													<input type="hidden" name="Post_Id" value="<?php echo $row->Post_Id ?>" />
													<div class="input-group">
														
														<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Currency</label>
														<span class="input-group-addon">
																		<i class="fa fa-exchange green bigger-110"></i>
																	</span>
																	<select class="col-sm-8 form-control" name="currency" width="300" id="id-date-picker-4" type="text">
																		<option value="">Select currency</option>
																	 <option value="USD">USD</option>
																	<option value="TZS">TZS</option>

																	 </select>
																	 
													</div>
													<?php echo '<span class="text-danger pull-reft">'. form_error('currency').'</span>'; ?>
													<div class="space-4"></div>
													<div class="space-4"></div>
													<div class="input-group">
														<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Amount</label>
														<span class="input-group-addon">
																		<i class="fa fa-money green bigger-110"></i>
																	</span>
																	<input class="form-control" id="id-date-picker-1"  name="Amount" value="<?php echo $row->Post_Amount; ?>" type="text"  />			
													</div>
													 <?php echo '<span class="text-danger pull-reft">'. form_error('Amount').'</span>'; ?>
													<div class="space-4"></div>
													<div class="space-4"></div>
													<div class="input-group">
														<label class="col-sm-2 control-label no-padding-right" for="form-field-1">Reference </label>
														<span class="input-group-addon">
																		<i class="fa fa-archive green bigger-110"></i>
																	</span>
																	<input type="text" class="form-control" name="Refference" id="id-date-picker-1"   />
														
																
													</div>
													<?php echo '<span class="text-danger pull-reft">'. form_error('Refference').'</span>'; ?>	
													<div class="space-4"></div>
													<div class="space-4"></div>
													<div class="widget-body">
													<div class="widget-main">
														<div class="form-group">
															<label class="col-sm-2 control-label no-padding-right" for="form-field-1">Attachment </label>
															<div class="col-xs-12">
																<input type="file" name="Payment_receipt" id="id-input-file-2" />
															</div>
															<?php echo '<span class="text-danger">'. form_error('Payment_receipt').'</span>'; ?>
														</div>
													</div>
												</div>

											<div class="clearfix form-actions">
												  <div class="col-md-offset-3 col-md-9">
													<button class="btn btn-info verify" type="submit" >
														<i class="ace-icon fa fa-check bigger-110"></i>
														Save
													</button>
												
												
												</div>
											</div>


                                                  
												</div>
											</form>
											</div>
										</div>
									</div>
								</div>
								<?php }?>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
				<!-- basic scripts -->

		
			<?php $this->load->view('common/include_footer');?>

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
					  null, null,null,null,null, null,null,null,null,
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