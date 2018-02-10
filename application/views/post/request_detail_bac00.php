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
						<style type="text/css">
						     .rowdata1,.rowdata2{
						     	font-size: 16px;
						     	font-family:all;
                               
                               }
                               tr.table-row {
								  border-spacing: 5em;
								}
							
						</style>

                	
               
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">
									<div class="col-sm-8 col-md-offset-1">
										<h4 style="margin-left:60px;"><?php foreach ($post as $key) { echo  ucfirst($key->First_Name.'    '.$key->Last_Name).':  ';  }?>Request Details</h4>
									</div>
									 <?php foreach ($post as $row) { ?>
									   
									 	<div class="col-sm-6 col-md-offset-1">
									 		<table>
									 		
									 		<tr class="table-row">
										 		<td class="rowdata1 text-right">Status:</td>
										 		<td class="rowdata2 text-left">
										 			<?php if ($row->Post_Status=='waiting approval'){?>
										 			<span class="label label-warning arrowed-in arrowed-in-right">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($row->Post_Status); ?></span>
										 			<?php } else if ($row->Post_Status=='approved'){?>
										 			<span class="label label-success arrowed-in arrowed-in-right">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($row->Post_Status); ?></span>
										 			<?php } else if ($row->Post_Status=='rejected'){?>
										 			<span class="label label-danger arrowed-in arrowed-in-left">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($row->Post_Status); ?></span>
										 			<?php } else{ 
										 		       echo '&nbsp;&nbsp;&nbsp;&nbsp;'. Strtoupper($row->Post_Status);}?>
										 		</td>
										 	</tr>
										 
										 	<?php if ($row->Post_Status=='rejected'){?>
										 		<tr class="table-row">
										 		<td class="rowdata1 text-right">Rejection Reason:</td>
										 		<td class="rowdata2 text-left">
										 			<?php if ($row->Post_Status=='waiting approval'){?>
										 			&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($row->Rejection_Reason); ?>
										 			<?php }?>
										 
										 		</td>
										 	</tr>
										 	<?php }?>
										 	<tr class="table-row">
										 		<td class="rowdata1 text-right">Doc No#:</td>
										 		<td class="rowdata2 text-left">
										 			<a href="<?php echo base_url(); ?>post/download/<?php echo $row->Post_Id.'xform';  ?>"><span >&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($row->Post_Id); ?></span></a>
										 			
										 		</td>
										 	</tr>
									 		<tr class="table-row">
										 		<td class="rowdata1 text-right">Owner:</td>
										 		<td class="rowdata2 text-left">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  ucfirst($key->First_Name.'    '.$key->Last_Name); ?></td>
									 	    </tr>
									 	    <tr class="table-row">
										 		<td class="rowdata1 text-right">Principal Traveler:</td>
										 		<td class="rowdata2 text-left" style="font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  ucfirst($key->First_Name.',   '.$key->Last_Name);?>&nbsp;&nbsp;&nbsp;&nbsp;<?php  echo $row->EmploymentNo;?></td>
									 	   </tr>
									 	   <tr class="table-row">
										 		<td class="rowdata1 text-right">Description:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  $key->Post_Description;?></td>
									 	   </tr>
									 	   <tr>
										 		<td class="rowdata1 text-right">Duration:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  different_in_days($key->Post_StartDate,$key->Post_EndDate).'  days';?></td>
									 	   </tr>
									 	   <tr class="table-row">
										 		<td class="rowdata1 text-right">Start Date:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  date_2_userformat($key->Post_StartDate);?></td>
									 	   </tr>
									 	   <tr class="table-row">
										 		<td class="rowdata1 text-right">End Date:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  date_2_userformat($key->Post_EndDate);?></td>
									 	   </tr>
									 	   <tr class="table-row">
										 		<td class="rowdata1 text-right">Due Date:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  retirement_due($key->Post_EndDate);?></td>
									 	   </tr>
									 	   
									 	   <tr class="table-row">
										 		<td class="rowdata1 text-right">Estmated Total Cost:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  $totalamount.'  '.$key->Currency;?></td>
									 	   </tr>
									 	   <tr class="table-row">
										 		<td class="rowdata1 text-right">Date Submitted:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  date_2_userformat($key->Date_Created);?></td>
									 	   </tr>
									 	   <tr class="table-row">
										 		<td class="rowdata1 text-right">Cost Type:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  $key->Costing_type;?></td>
									 	   </tr>
									 	   <tr class="table-row">
										 		<td class="rowdata1 text-right">Account:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  $key->AccountNo;?></td>
									 	   </tr>

									 	</table>
									 	<div class="col-sm-8">
									 	<table id="simple-table" class="table   table-hover">
									 		
									 			<tr>
									 				<td>Center</td>
									 				<td class="text-right">Amount</td>
									 				
									 				
									 			</tr>
									 		
									 			<?php $total=0; foreach ($requestlist as $row) {?>
									 			
									 			<tr>
									 				<td><?php echo $row->CenterNo ?></td>
									 				<td class="text-right"><?php echo $row->Amount ?></td>
									 				
														 
									 			</tr>
									 			<?php }?>
									 			
									 		
									 	</table>
									</div>
									 </div>
									 					 <!--payout-->
							<?php if(! empty($payoutlist)){
                                 	  foreach ($payoutlist as  $value) { ?>		
							<div class="col-sm-5">
								<div class="widget-box transparent">
									 			
									<div class="widget-header widget-header-small">
													<h4 class="widget-title blue smaller">
														<i class="ace-icon fa fa-rss orange"></i>
														Payments 
													</h4>

													<div class="widget-toolbar action-buttons">
														<a href="#" data-action="reload">
															<i class="ace-icon fa fa-refresh blue"></i>
														</a>
                                                       &nbsp;
														<a href="#" class="pink">
															<i class="ace-icon fa fa-trash-o"></i>
														</a>
													</div>

									</div>

									<div class="widget-body">
										<div class="widget-main padding-8">
											<div id="profile-feed-1" class="profile-feed">

												<div class="profile-activity clearfix">
													<div>
                                         	
														<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Bank Ancount </label>

															<div class="col-sm-9">
																<label class="col-sm-6 control-label no-padding-right" for="form-field-1"> <?php  echo $key->Bank_Name.'  '. $key->BankAccountNo;  ?></label>
																
																 
															</div>
														</div>
													</div>

																
											    </div>
                                 
                                 	  	
													<div class="profile-activity clearfix">
																<div class="form-group">
																	<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Method </label>

																	<div class="col-sm-9">
																	<label class="col-sm-6 control-label no-padding-right" for="form-field-1"> <?php    echo $value->Payment_Method;    ?></label>
																	
																	 
																    </div>
																</div>
													</div>
													<input type="hidden" name="Currency" value="<?php   echo $key->Currency;?>">
													<input type="hidden" name="Post_Id" value="<?php   echo $key->Post_Id;?>">
													<div class="profile-activity clearfix">
																<div class="form-group">
																	<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Amount </label>

																	<div class="col-sm-9">
																	<label class="col-sm-6 control-label no-padding-right" for="form-field-1"> <?php    echo $value->Currency.'  ' .round($value->Payment_Amount_Out_Origin,3).'  ';    ?></label>
																	
																	 
																   </div>
																</div> 
													</div>
													<div class="profile-activity clearfix">
														<div class="form-group">
																	<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Reference </label>

																	<div class="col-sm-9">
																	<label class="col-sm-6 control-label no-padding-right" for="form-field-1"> <?php if ($value->Refference=='') echo 'NONE';else echo $value->Refference;  ?></label>
																	
																	 
																   </div>
														</div> 			
													</div>
													<div class="profile-activity clearfix">
																<div class="form-group">
																	<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Attachment</label>

																	<div class="col-sm-9">
																	<label class="col-sm-6 control-label no-padding-right" for="form-field-1"><a href="<?php echo base_url(); ?>post/download/<?php echo $key->Post_Id.'xreceipt';  ?>">Doc_<?php echo $key->Post_Id; ?></a></label>
																	
																	 
																   </div>
																</div>
													</div>
													<div class="profile-activity clearfix">
															<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right" for="form-field-1"></label>
	                                                           <div class="col-sm-9">
																	<button class="btn btn-info" type="submit">
																		<i class="ace-icon fa fa-check bigger-110"></i>
																		Retire
																	</button>

																</div>
															</div>

														
													</div>


														
											</div>
										</div>
									</div>
								</div>
							</div>
										<?php }} else {?>
									
									<!--/payout-->
									 <!--payout-->
									
							<div class="col-sm-5">
								<div class="widget-box transparent">
									 		<form class="form-horizontal"  role="form" action="<?php echo site_url('payment/payout'); ?>" enctype="multipart/form-data" method="post">	
												<div class="widget-header widget-header-small">
													<h4 class="widget-title blue smaller">
														<i class="ace-icon fa fa-rss orange"></i>
														Payment 
													</h4>

													<div class="widget-toolbar action-buttons">
														<a href="#" data-action="reload">
															<i class="ace-icon fa fa-refresh blue"></i>
														</a>
                                                       &nbsp;
														<a href="#" class="pink">
															<i class="ace-icon fa fa-trash-o"></i>
														</a>
													</div>

												</div>

												<div class="widget-body">
													<div class="widget-main padding-8">
														<div id="profile-feed-1" class="profile-feed">

												<div class="profile-activity clearfix">
													<div>
                                         	
														<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Bank Account </label>

															<div class="col-sm-9">
																<input  type="text" name="AccountNo" value="<?php  echo $key->Bank_Name.'  '. $key->BankAccountNo;  ?>" data-rel="tooltip"  class="col-sm-8" id="id-date-picker-1" readonly="true" />
																 <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Bank Account" title=" ">?</span>
																 <?php echo '<span class="text-danger">'. form_error('AccountNo').'</span>'; ?>
															</div>
														</div>
													</div>

																
											    </div>

												<div class="profile-activity clearfix">
																<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Payment Type</label>

															<div class="col-sm-9">
															<select name="Payment_Method" id="type" class="col-sm-8"   required="true">
																<option value="" >--Payment Type--</option>
																<option value="Cash" >Cash</option>
																<option value="Account" >Bank Account</option>
											               </select>
											               <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Payment method " title=" ">?</span>
																 
															   </div>
															</div>
												</div>
												<input type="hidden" name="Currency" value="<?php   echo $key->Currency;?>">
												<input type="hidden" name="Post_Id" value="<?php   echo $key->Post_Id;?>">
												<input type="hidden" name="Amount" value="<?php   echo $totalamount;?>">
												<input type="hidden" name="Currency" value="<?php   echo $key->Currency;?>">
												<div class="profile-activity clearfix">
																<div class="form-group">

																<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Amount</label>

																<div class="col-sm-9">
																<input  type="text" name="" 
																value="<?php echo $key->Currency.'  ' .$totalamount;  ?>" data-rel="tooltip"  class="col-sm-8" id="id-date-picker-1" readonly="true" />
																 <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Requested Amount " title=" ">?</span>
																
																 
															   </div>
															</div>
												</div>
												<div class="profile-activity clearfix">
																<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Reference</label>

																<div class="col-sm-9">
																<input  type="text" name="Refference" value="" data-rel="tooltip"  class="col-sm-8" id="" />
																 <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="(optional) Payment Reference number " title=" ">?</span>
																
																 
															   </div>
															</div>
												</div>
												<div class="profile-activity clearfix">
																<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Attachment</label>

																<div class="col-sm-9">
																<input  type="file" name="attach"  data-rel="tooltip"  class="col-sm-8" id="id-date-picker-1"  />
																
																 
															   </div>
															</div>
												</div>
												<div class="profile-activity clearfix">
														<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-1"></label>
                                                           <div class="col-sm-9">
																<button class="btn btn-info" type="submit">
																	<i class="ace-icon fa fa-check bigger-110"></i>
																	Pay out
																</button>

															</div>
														</div>

													
												</div>


												</form>		
										</div>
													</div>
												</div>

									</div>
									<!--/payout-->
									<?php } ?>
									
									 	
									</div>
									</div>
									 
									
									 <div class="row">
									 	
									 	
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