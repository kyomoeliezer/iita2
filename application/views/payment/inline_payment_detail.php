<div class="main-content">
				<div class="main-content-inner">
					

					<div class="page-content">
						

						<div class="page-header">
							<h1>
								Request : <?php echo $Post_Id; ?>
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Details
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
												<h4 class="widget-title lighter smaller">REQUEST DETAILS</h4>
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
													PAY OUT
													<span class="smaller-80"></span>
												</h4>
											</div>
                                           
											<div class="widget-body">

												<div class="widget-main padding-8">
												<div class="dd dd-draghandle">
													<?php if(($row->Post_Status !='waiting for approval') &&($row->Post_Status !='rejected')) { ?>
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
														<?php $paid=0;foreach ($paymentlist as $r) {

															$paid=$paid+$r->Payment_Amount_Out_USD;
															}
															 
															 ?>
															 
														<?php 

															if ($paid !=0) { 
															echo '<div class="dd2-content">PAID AMOUNT <span class="pull-right orange"> USD:'. $paid.'</span></div>';?>
															<div class="dd-handle dd2-handle">
																<i class="normal-icon ace-icon  fa fa-money green bigger-130"></i>

																<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
															</div>
															<?php
															echo '<div class="dd2-content"><a href="'.base_url().'post/download/'.$row->Post_Id.'">Reciept </a></div>';   
                                                               }
															 else if (($paid ==0)&&($this->session->userdata['logged_in']['email']=='finance@iita.com')){ 
															echo '<div class="dd2-content"><a href="'.base_url().'payment/payout/'.$row->Post_Id.'"><button class="btn btn-info">PAY OUT</button></a><span class="pull-right orange"></span></div>';
															 }
                                                           else echo '<div class="dd2-content">Not yet';
															   ?>
															   
														</li>
															<?php
															 }
															 
                                            else if ($row->Post_Status=='rejected') { $paid=0; echo '<span class="label label-sm label-danger">Rejected cannot be paid</span>';}
                                            else { $paid=0; echo '<span class="label label-sm label-info">Will be Active after approval</span>';}
											?>
												
										          </div>
                                                  
												</div>

											
											
											</div>
											
										</div>
									</div>
									<div class="col-sm-4">
										<div class="widget-box widget-color-grey">
											<div class="widget-header">
												<h4 class="widget-title lighter smaller">
													PAY IN
													<span class="smaller-80"></span>
												</h4>
											</div>
                                          
											<div class="widget-body">
												<div class="widget-main padding-8">
												<div class="dd dd-draghandle">
											       <ol class="dd-list">
											   <?php if ($paid !=0){ ?>
													<li class="dd-item dd2-item" data-id="18">
															<div class="dd-handle dd2-handle">
																<i class="normal-icon ace-icon  fa fa-credit-card green bigger-130"></i>

																<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
															</div>
															<div class="dd2-content"><?php echo $row->BankAccountNo; ?></div>
														</li>
														<?php $retire=0;foreach ($retirelist as $r) {

															$retire=$retire+$r->Payment_Amount_In_USD;
													}
													  
													 ?>
														<li class="dd-item dd2-item" data-id="18">
															<div class="dd-handle dd2-handle">
																<i class="normal-icon ace-icon  fa fa-money green bigger-130"></i>

																<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
															</div>
															<?php 
															if (($retire !=0)) { 
															echo '<div class="dd2-content">RETIRED AMOUNT <span class="pull-right orange"> USD:'. $retire.'</span></div>';   
                                                               }
															 else if  (($retire ==0)){ 
															echo '<div class="dd2-content"><a href="'.base_url().'payment/payin/'.$row->Post_Id.'"><button class="btn btn-info">PAY IN</button> </a> <span class="pull-right orange">   </span></div>';
															 }  ?>
														</li>
														<?php }
                                                         else echo '<span class="label label-sm label-warning">Will be Active after pay out</span>';
														 ?>
												
										          </div>
                                                  
												</div>

												
											
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

		
			<?php //$this->load->view('common/include_footer');?>

		<script src="<?php //echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
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
			
				<?php  $this->load->view('common/include_script'); ?>