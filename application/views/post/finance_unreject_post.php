

			
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">

						 <ul class="breadcrumb">
							<!-- <li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="">Home</a>
							</li>

							<li>
								<a href="">Center</a>
							</li> -->
							<!-- <li class="active"><a href="">New Center</a></li> -->
						</ul><!-- /.breadcrumb --> 

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>

					<div class="page-content">
						
                      <?php $this->load->view('common/boot_setting');?>
                       <div class="page-header  col-centered">
							<h1 style="margin-left: 300px;">Update Request </h1>
						</div>
							
							<h4 class="widget-title"></h4>

					   
						
						<!-- /.page-header -->

						<div class="row">
							<?php 
                              if (! empty($this->session->flashdata('message_name'))){?>
                              <div class="alert alert-success pull-right"> <?php echo  $this->session->flashdata('message_name');?> </div> 
                         <?php }?> 
                         <?php foreach ($postlist as $rqst) {?>
                         	
                        

							<div class="col-xs-12">

								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" action="<?php echo site_url('post/correct_post'); ?>" enctype="multipart/form-data" method="post">
									<?php  echo validation_errors(); ?>
									<div class="form-group  <?php if (!empty(form_error('Person_Id'))) echo 'has-error';  ?> ">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Reserved/Person Acc </label>

										<div class="col-sm-4">
											<input type="hidden" name="postid" value="<?php echo $postid; ?>" />
											<select name="Person_Id" class="form-control col-xs-10 col-sm-5 chosen-select"  data-rel="tooltip"  data-placeholder="" required="true">
												<option value="">Choose Person Acc...  </option>
                                                <?php foreach ($personlist as $key ) {?>
                                                  
                                                  <option value="<?php echo $key->Employee_Id; ?>" <?php if ((set_value('Person_Id')==$key->Employee_Id) | ($rqst->fk_post_EmployeeId==$key->Employee_Id)) echo ' selected';?>><?php echo  $key->EmploymentNo.'::  '  .$key->First_Name .' '.$key->Last_Name ; ?></option>
                                                	
                                                 <?php  } ?>
															
											</select>
											<?php echo '<span class="text-danger">'. form_error('Person_Id').'</span>'; ?>
										</div>
									</div>
									<div class="form-group  <?php if (!empty(form_error('Account_Id'))) echo 'has-error';  ?> ">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Account</label>

										<div class="col-sm-4">
											<select name="Account_Id" class="form-control col-xs-10 col-sm-5 chosen-select"  data-rel="tooltip"  data-placeholder="" required="true">
												<option value="">Choose account...  </option>
												
                                                <?php foreach ($accountlist as $low ) {?>
                                                  
                                                  <option value="<?php echo $low->Account_Id; ?>" <?php if (($rqst->fk_post_AccountId==$low->Account_Id) |(set_value('Account_Id')==$low->Account_Id)) echo ' selected';?>><?php echo $low->AccountNo.': '.$low->Account_Description ; ?></option>
                                                	
                                                 <?php  } ?>
															
											</select>
											
											<?php echo '<span class="text-danger">'. form_error('Account_Id').'</span>'; ?>
										</div>
									</div>

									<div class="form-group  <?php if (!empty(form_error('Description'))) echo 'has-error';  ?>" >
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Description</label>

										<div class="col-sm-9">
											<textarea  type="text" name="Description"   data-rel="tooltip" class="col-xs-10 col-sm-5" id="form-input" required="true"><?php if (! empty($rqst->Post_Description)) echo $rqst->Post_Description;  echo set_value('Description'); ?></textarea>
											
											<?php echo '<span class="text-danger">'. form_error('Description').'</span>'; ?>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Currency</label>

										<div class="col-sm-4">
											<select name="Currency" class="form-control col-xs-10 col-sm-5"  data-rel="tooltip"  data-placeholder="" required="true">
												<option value="">Choose currency </option>
												<option value="TZS" <?php if (($rqst->Currency=='TZS')|(set_value('Currency')=='TZS')) echo ' selected';?>>TZS</option>
												<option value="USD"  <?php if (($rqst->Currency=='USD')| (set_value('Currency')=='USD')) echo ' selected';?>>USD</option>
												<option value="GBP" <?php if (($rqst->Currency=='GBP')| (set_value('Currency')=='GBP')) echo ' selected';?>>GBP</option>
												<option value="YEN" <?php if (($rqst->Currency=='YEN')| (set_value('Currency')=='YEN')) echo ' selected';?>>YEN</option>
															
											</select>
											
											<?php echo '<span class="text-danger">'. form_error('Currency').'</span>'; ?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Cost Type</label>

										<div class="col-sm-4">
											<select name="Center_type" id="type" class="form-control col-xs-10 col-sm-5"  data-rel="tooltip"  data-placeholder="" required="true">
												<option value="single" <?php if (($rqst->Costing_type=='single') | (set_value('Center_type')=='single')) echo ' selected';?>>Single Cost center </option>
												<option value="shared" <?php if (($rqst->Costing_type=='shared') | (set_value('Center_single')=='shared')) echo ' selected';?>>Shared Cost Center </option>
												
															
											</select>
											
											<?php echo '<span class="text-danger">'. form_error('Currency').'</span>'; ?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">  &nbsp;&nbsp;&nbsp;</label>

										<div class="col-sm-9 input-group">
											
											<table style="border-collapse:separate; border-spacing:1.4em;">
												<tr>
													<th><b>Cost Center</b></th>
													<th><b>Amount</b></th>
												</tr>
												<?php foreach ($requestlist as $fetched) {?>
													
												
												<tr id="tr_single">
													<td>


														<input type="hidden" name="requestid[]" value="<?php echo $fetched->Request_Details_Id; ?>" />
														<select  name="Center[]" class="form-control col-xs-10 col-sm-5 chosen-select" data-rel="tooltip"  data-placeholder="">
															<option value="">Choose center...  </option>
			                                                <?php foreach ($centerlist as $row ) {?>
			                                                  
			                                                  <option value="<?php echo $row->CenterId; ?>" <?php if (($fetched->fk_request_details_CenterId==$row->CenterId) |  (set_value('Center')==$row->CenterId)) echo ' selected';?>><?php echo $row->CenterNo.': '.$row->Center_Description ; ?></option>
			                                                	
			                                                 <?php  } ?>
																		
														</select>
														<?php echo '<span class="text-danger">'. form_error('Center_single').'</span>'; ?>
														
													</td>
													<td style="padding-right: 10px">
														<input  type="number" min="0"  step="any" name="Amount[]" data-rel="tooltip" value="<?php if (! empty($fetched->Amount)) echo $fetched->Amount; else  echo set_value('Amount'); ?>"  class="" id="id-amount" placeholder="" />
														<?php echo '<span class="text-danger">'. form_error('Amount_single').'</span>'; ?>
														
													</td>
												</tr>
												<?php } ?>
												<tr id="">
													<td>
														<select  name="Center[]" id="Center_shared1" class="shared1 form-control col-xs-10 col-sm-5" data-rel="tooltip"   data-placeholder="">
															<option value="">Choose center...  </option>
			                                                <?php foreach ($centerlist as $row ) {?>
			                                                  
			                                                  <option value="<?php echo $row->CenterId; ?>" <?php if (set_value('Center_Id')==$row->CenterId) echo ' selected';?>><?php echo $row->CenterNo.': '.$row->Center_Description ; ?></option>
			                                                	
			                                                 <?php  } ?>
																		
														</select>
														<?php // echo '<span class="text-danger">'. form_error('Center_shared1').'</span>'; ?>
														
													</td>
													<td style="padding-right: 10px">
														<input  type="number" min="0"  step="any" name="Amount[]" data-rel="tooltip" value="<?php echo set_value('Amount'); ?>"  class="shared1" id="id-amount" placeholder="" />
														<?php echo '<span class="text-danger">'. form_error('Amount').'</span>'; ?>
														
													</td>
												</tr>
												
										    </table>
											
										</div>
									</div>


									<div class="space-4"></div>
									<div class="form-group <?php if (!empty(form_error('StartDate'))) echo 'has-error';  ?>">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Start date</label>

										<div class="col-sm-9">
											<input  type="text" name="StartDate" value="<?php if (! empty($rqst->Post_StartDate)) echo $rqst->Post_StartDate; else echo set_value('StartDate'); ?>" data-rel="tooltip"  class="col-xs-10 col-sm-5 date-picker" id="id-date-picker-1" placeholder="<?php echo date('Y-m-d');?>" data-date-format="yyyy-mm-dd" />
											 <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Project start date" title=" ">?</span>
											 <?php echo '<span class="text-danger">'. form_error('StartDate').'</span>'; ?>
										</div>
									</div>
									<div class="space-4"></div>
									<div class="form-group  <?php if (!empty(form_error('EndDate'))) echo 'has-error';  ?>">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> End date</label>

										<div class="col-sm-9">
											<input  type="text" name="EndDate" data-rel="tooltip" value="<?php if (! empty($rqst->Post_EndDate)) echo $rqst->Post_EndDate; else echo set_value('EndDate'); ?>"  class="col-xs-10 col-sm-5 date-picker" id="id-date-picker-1"  data-date-format="yyyy-mm-dd" />
											 <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Project end date." title="">?</span>
											 <?php echo '<span class="text-danger">'. form_error('EndDate').'</span>'; ?>
										</div>
									</div>

									
									<div class="space-4"></div>
									<div class="form-group  <?php if (!empty(form_error('File'))) echo 'has-error';  ?>">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Attachment</label>

										<div class="col-sm-9">
											<a href="<?php echo base_url(); ?>post/download/<?php echo $rqst->Post_Id.'xform'; ?>" title="Attachment"><span  class="col-xs-10 col-sm-5">View Docs</span></a>
											 <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content=Attach a file." title="">?</span>
											 <?php echo '<span class="text-danger">'. form_error('File').'</span>'; ?>
										</div>
									</div>
									<div class="space-4"></div>
									<div class="form-group  <?php if (!empty(form_error('File'))) echo 'has-error';  ?>">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Change Attachment(pdf)</label>

										<div class="col-sm-9">
											<input  type="file" name="attach" data-rel="tooltip" value=""  class="col-xs-10 col-sm-5"    />
											 <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content=Attach a file." title="">?</span>
											 <?php echo '<span class="text-danger">'. form_error('File').'</span>'; ?>
										</div>
									</div>

									<?php } ?>
									

								

									

									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Update
											</button>

											
										</div>
									</div>

									<div class="hr hr-24"></div>

									
									 </form>
									</div>
								</div><!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->

						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->



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
		<!-- <script>
			$(function() {
			
      $('.shared2,.shared1').prop('disabled', 'disabled');
    $('#type').change(function(){
    	
        if($('#type').val() == 'shared') {
        	 $('.shared2,.shared1').removeAttr('disabled');
           
        } else {

        	$('.shared2,.shared1').prop('disabled', 'disabled');
             
          
        } 
    });
});


</script> -->

		<?php $this->load->view('common/include_footer');?>