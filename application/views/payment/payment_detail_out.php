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
									 	<div class="col-sm-10">
									 	<table id="simple-table" class="table   table-hover">
									 		
									 			<tr>
									 				<td style="border-top:none;border-bottom: 0.3px #f1f1f1;; border-bottom-width: thin;">Cost Center</td>
									 				<td style="border-top:none;border-bottom: 0.3px #f1f1f1;border-bottom-width: thin;">Description</td>
									 				<td style="border-top:none;border-bottom: 0.3px #f1f1f1;border-bottom-width: thin;">Budget Holder</td>
									 				<td class="text-right" style="border-top:none; border-bottom: 0.3px #f1f1f1;border-bottom-width: thin;">Amount</td>
									 				
									 				
									 			</tr>
									 		
									 			<?php $total=0; foreach ($requestlist as $row) {?>
									 			
									 			<tr>
									 				<td style="border:none;"><?php echo  $row->CenterNo; ?></td>		
									 				<td style="border:none;"><?php echo $row->Center_Description; ?></td>
									 				<td style="border:none;"><?php echo  $row->First_Name.'  '.$row->Last_Name; ?></td>
									 				<td class="text-right" style="border:none;"><?php echo  $row->Amount; ?></td>	 
									 			</tr>
									 			<?php }?>
									 			
									 		
									 	</table>
									 	
									</div>
									 </div>

									
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
													<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Payment Type</label>

															<div class="col-sm-9">
															<select name="Payment_Method" id="ptype" class="col-sm-8"   required="true">
																<option value="" >--Payment Type--</option>
																<option value="Cash" >Cash</option>
																<option value="Account" >Bank Account</option>
											               </select>
											               <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Payment method " title=" ">?</span>
																 
															   </div>
															</div>
												</div>

												<div class="profile-activity clearfix BankAccountNo">
													<div>
                                         	
														<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Bank Name </label>

															<div class="col-sm-9">
																<input  type="text" name="Bank_Name" value="" data-rel="tooltip"  class="col-sm-8 bank" id="id-date-picker-1"  />
																 <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Bank Name" title=" ">?</span>
																 
															</div>
														</div>
													</div>

																
											    </div>
											     <div class="profile-activity clearfix BankAccountNo">
													<div>
                                         	
														<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Bank Account</label>

															<div class="col-sm-9">
																<input  type="text" name="AccountNo" value=""  data-rel="tooltip"  class="col-sm-8 bank" id="id-date-picker-1" />
																 <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Bank Account" title=" ">?</span>
																 
															</div>
														</div>
													</div>

																
											    </div>
											   <!--  <div class="profile-activity clearfix BankAccountNo">
													<div>
                                         	
														<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Bank <?php  echo $key->Bank_Name.'  '. $key->BankAccountNo;  ?>Account </label>

															<div class="col-sm-9">
																<input  type="text" name="AccountNo" value="" data-rel="tooltip"  class="col-sm-8" id="id-date-picker-1" readonly="true" />
																 <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Bank Account" title=" ">?</span>
																 
															</div>
														</div>
													</div>

																
											    </div> -->
											    <div class="profile-activity clearfix Cashier">
													<div>
                                         	
														<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Cashier </label>

															<div class="col-sm-9">               
																<select class="col-sm-8" name="Cashier" id="cash_detail" >
                                                                <option value="" >--select cashier--</option>
																<option value="CASHIER-DAR" >CASHIER DAR</option>
																<option value="CASHIER-AR" >CASHIER ARUSHA</option>
																	

																</select>


															<!-- 	<input  type="text" name="Cashier" value="CASHIER-DAR" data-rel="tooltip"  class="col-sm-8" id="id-date-picker-1" readonly="true" /> -->
																 <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Cashier" title=" ">?</span>
																 
															</div>
														</div>
													</div>
																
											    </div>


												<input type="hidden" name="Currency" value="<?php   echo $key->Currency;?>">
												<input type="hidden" name="Post_Id" value="<?php   echo $key->Post_Id;?>">
												<input type="hidden" name="Total_Amount" value="<?php   echo $totalamount;?>">
												<div class="profile-activity clearfix">
																<div class="form-group">

																<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Amount</label>

																<div class="col-sm-9">
																<input  type="text" name="Amount" value="<?php   echo $key->Currency.'  ' .$totalamount;  ?>" data-rel="tooltip"  class="col-sm-8" id="id-date-picker-1" readonly="true" />
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
																<input  type="file" name="attach"  data-rel="tooltip"  class="col-sm-8" id="id-date-picker-1"  required="true" />
																
																 
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

<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>

<script  src="<?php echo base_url(); ?>assets/dist/js/index.js"></script>
<!--[endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url(); ?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

	>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>


		<!-- ace scripts -->
		<script src="<?php echo base_url(); ?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/ace.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/moment.js"></script>

		<!-- inline scripts related to this page -->

		<script type="text/javascript">
              
			
				if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true}); 
					//resize the chosen on window resize
			
					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});
			
			
					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}

				$( "#input-span-slider" ).slider({
					value:1,
					range: "min",
					min: 1,
					max: 12,
					step: 1,
					slide: function( event, ui ) {
						var val = parseInt(ui.value);
						$('#form-field-5').attr('class', 'col-xs-'+val).val('.col-xs-'+val);
					}
				});
			
			
				
				//"jQuery UI Slider"
				//range slider tooltip example
				$( "#slider-range" ).css('height','200px').slider({
					orientation: "vertical",
					range: true,
					min: 0,
					max: 100,
					values: [ 17, 67 ],
					slide: function( event, ui ) {
						var val = ui.values[$(ui.handle).index()-1] + "";
			
						if( !ui.handle.firstChild ) {
							$("<div class='tooltip right in' style='display:none;left:16px;top:-6px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>")
							.prependTo(ui.handle);
						}
						$(ui.handle.firstChild).show().children().eq(1).text(val);
					}
				}).find('span.ui-slider-handle').on('blur', function(){
					$(this.firstChild).hide();
				});
				
				
				$( "#slider-range-max" ).slider({
					range: "max",
					min: 1,
					max: 10,
					value: 2
				});
				
				$( "#slider-eq > span" ).css({width:'90%', 'float':'left', margin:'15px'}).each(function() {
					// read initial values from markup and remove that
					var value = parseInt( $( this ).text(), 10 );
					$( this ).empty().slider({
						value: value,
						range: "min",
						animate: true
						
					});
				});

				//pre-show a file name, for example a previously selected file
				//$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])
			
			
				$('#id-input-file-3').ace_file_input({
					style: 'well',
					btn_choose: 'Drop files here or click to choose',
					btn_change: null,
					no_icon: 'ace-icon fa fa-cloud-upload',
					droppable: true,
					thumbnail: 'small'//large | fit
					//,icon_remove:null//set null, to hide remove/reset button
					/**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
					/**,before_remove : function() {
						return true;
					}*/
					,
					preview_error : function(filename, error_code) {
						//name of the file that failed
						//error_code values
						//1 = 'FILE_LOAD_FAILED',
						//2 = 'IMAGE_LOAD_FAILED',
						//3 = 'THUMBNAIL_FAILED'
						//alert(error_code);
					}
			
				}).on('change', function(){
					//console.log($(this).data('ace_input_files'));
					//console.log($(this).data('ace_input_method'));
				});

				$('.date-picker').datepicker({
					minDate: 0 
				})
				    
			       
			 
	
				//or change it into a date range picker
				$('.input-daterange').datepicker({autoclose:true});
	
				.prev().on(ace.click_event, function(){
					$(this).next().focus();
				});
			
				
			
				
				if(!ace.vars['old_ie']) $('#date-timepicker1').datetimepicker({
				 //format: 'MM/DD/YYYY h:mm:ss A',//use this option to display seconds
				 icons: {
					time: 'fa fa-clock-o',
					date: 'fa fa-calendar',
					up: 'fa fa-chevron-up',
					down: 'fa fa-chevron-down',
					previous: 'fa fa-chevron-left',
					next: 'fa fa-chevron-right',
					today: 'fa fa-arrows ',
					clear: 'fa fa-trash',
					close: 'fa fa-times'
				 }
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});



			$(function () {

                 $('.date-picker').datetimepicker({  minDate:new Date()});
           });
	
		</script>

<script>
$(function() {

	$('.BankAccountNo').hide();
	$('.Cashier').show();		
      //$('.shared2,.shared1').prop('disabled', 'disabled');
    $('#ptype').change(function(){
    	
        if($('#ptype').val() == 'Account') {
        	 $('.BankAccountNo').show();
        	 $('.bank').prop('required',true);
        	 $('.Cashier').hide();
        	 $('#cash_detail').prop('required',false);
           
        } else {

        	$('.BankAccountNo').hide();
        	 $('.bank').prop('required',false);
        	 $('.Cashier').show();
        	 $('#cash_detail').prop('required',true)
             
          
        } 
    });
});
</script>