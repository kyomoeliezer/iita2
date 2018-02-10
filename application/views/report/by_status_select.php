

			
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
							<h1 style="margin-left: 300px;">Report Per Status </h1>
						</div>
							
							<h4 class="widget-title"></h4>

					   
						
						<!-- /.page-header -->

						<div class="row">


							<div class="col-xs-12">

								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" action="<?php echo site_url('report/report_by_status'); ?>"  method="post" enctype="multipart/form-data">

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">  &nbsp;&nbsp;&nbsp;</label>

										<div class="col-sm-12 input-group">
											<table style="border-collapse:separate; border-spacing:1.4em;">
												<tr>
													<th><b>Status</b></th>
													
													<th><b>Start Date</b></th>
													<th><b>End Date</b></th>
												</tr>
												<tr id="tr_single">
													<td>
														<select  name="status" class="form-control col-xs-10 col-sm-5 chosen-select" data-rel="tooltip"  data-placeholder="">
															<option value="all">All   </option>
															<option value="paid">Paid  </option>
															<option value="retired">Retired </option>
			                                                
																		
														</select>
														<?php echo '<span class="text-danger">'. form_error('status').'</span>'; ?>
														
													</td>
													
													<td style="padding-right: 10px">
														<input  type="text" name="startdate" value="<?php echo set_value('startdate'); ?>" data-rel="tooltip"  class="date-picker" id="id-date-picker-1" placeholder="<?php echo date('Y-m-d');?>" data-date-format="yyyy-mm-dd" />
														<?php echo '<span class="text-danger">'. form_error('startdate').'</span>'; ?>
														
													</td>
													<td style="padding-right: 10px">
														<input  type="text" name="enddate" value="<?php echo set_value('enddate'); ?>" data-rel="tooltip"  class="date-picker" id="id-date-picker-1" placeholder="<?php echo date('Y-m-d');?>" data-date-format="yyyy-mm-dd" />
														<?php echo '<span class="text-danger">'. form_error('enddate').'</span>'; ?>
														
													</td>
													<td>
														<button class="btn btn-info" type="submit">
															<i class="ace-icon fa fa-check bigger-110"></i>
															Query
														</button>
													</td>
												</tr>

										    </table>
											
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
		<script>
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


</script>

		<?php $this->load->view('common/include_footer');?>