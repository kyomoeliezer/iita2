<div class="main-content">
				<div class="main-content-inner">
					

					<div class="page-content">
						

						<div class="page-header">
							<h1>
								Retirement
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									record the processed retirement
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
												<h4 class="widget-title lighter smaller">Post Details</h4>
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
														<i class="normal-icon ace-icon  fa fa-clock-o orange bigger-130"></i>

														<i class="drag-icon ace-icon fa fa-money bigger-125"></i>
													</div>
													<div class="dd2-content orange"><?php echo 'USD:'. $row->Post_Amount; ?></div>
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
										<div class="widget-box widget-color-green">
											<div class="widget-header">
												<h4 class="widget-title lighter smaller">
													PAID
													<span class="smaller-80"></span>
												</h4>
											</div>
                                          
											<div class="widget-body">
												<div class="widget-main padding-8">
												<div class="dd dd-draghandle">
											       <ol class="dd-list">
											
													<li class="dd-item dd2-item" data-id="18">
															<div class="dd-handle dd2-handle">
																<i class="normal-icon ace-icon  fa fa-credit-card green bigger-130"></i>

																<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
															</div>
															<div class="dd2-content"><?php echo $row->BankAccountNo; ?></div>
														</li>
														<li class="dd-item dd2-item" data-id="18">
															<div class="dd-handle dd2-handle">
																<i class="normal-icon ace-icon  fa fa-money green bigger-130"></i>

																<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
															</div>
															<div class="dd2-content">PAID AMOUNT <span class="pull-right orange"> USD: <?php $paid=0;foreach ($paymentlist as $key) {

															$paid=$paid+$key->Payment_Amount_Out_USD;
													}
													echo $paid;

													 ?> </span></div>
														</li>
												
										          </div>
                                                  
												</div>

												
											
											</div>
										</div>
									</div>
									<form class="form-" role="form" action="<?php echo site_url('payment/payin'); ?>" method="post">
										<div class="form-group">
										<input  type="hidden" name="Post_Id" value="<?php echo $row->Post_Id;?>" />
													<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Currency</label>

													<div class="col-sm-6">
														<select name="currency" class="col-xs-6 col-sm-5" id="form-input" required="true">
                                                            <option value="">Select currency</option>
															<option value="TZS">TZS</option>
															<option value="USD">USD</option>
															
														</select>
													</div>
													<?php echo '<span class="text-danger">'. form_error('currency').'</span>'; ?>
									</div>
									<div class="form-group">
										<input  type="hidden" name="Post_Id" value="<?php echo $row->Post_Id;?>" />
													<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Amount</label>

													<div class="col-sm-6">
														<input  type="text" name="Amount" class="col-xs-6 col-sm-5" id="form-input" value="<?php if (empty(set_value('Amount'))) echo $paid; else echo set_value('Amount'); ?>" />
														
														<?php echo '<span class="text-danger">'. form_error('Amount').'</span>'; ?>
													</div>
									</div>
									<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tansc Refference</label>

													<div class="col-sm-6">
														<input  type="text" name="Refference" class="col-xs-6 col-sm-5" id="form-input" value="<?php set_value('Refference'); ?>" required="true"/>
														
														<?php echo '<span class="text-danger">'. form_error('Refference').'</span>'; ?>
													</div>
									</div>
												<div class="space-4"></div>
										<div class="form-group">
													<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Attach  Receipt</label>

													<div class="col-sm-6">
														<input  type="file" name="Receipt" class="col-xs-6 col-sm-5" id="form-input" value="<?php echo set_value('Amount'); ?>" />
														
														<?php echo '<span class="text-danger">'. form_error('Receipt').'</span>'; ?>
													</div>
												</div>
										<div class="clearfix form-actions">
											<div class="space-4"></div>
										<div class="col-md-4">
											<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Retire
											</button>

										</div>
									</div>

                                        </form>


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