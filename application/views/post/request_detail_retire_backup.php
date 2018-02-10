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
									 	   
									 	   <tr class="table-row" style="color:orange;">
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
									
							<div class="col-sm-5">
								<div class="widget-box transparent">
									 		<form class="form-horizontal" id="form"  role="form" action="<?php echo site_url('payment/payin'); ?>" enctype="multipart/form-data" method="post">	
									 			<?php //echo validation_errors();?>
												<div class="widget-header widget-header-small">
													<h4 class="widget-title blue smaller">
														<i class="ace-icon fa fa-rss orange"></i>
														Retiment 
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
															<label class="col-sm-3 control-label no-padding-right " for="form-field-2" style="color:orange;">Paid Amount (<?php echo $key->Currency; ?>) </label>

															<div class="col-sm-9" >
																<input  type="text" id="paid_amount" name="AccountNo" value="<?php  echo $totalamount;  ?>" data-rel="tooltip"  class="col-sm-8" id="id-date-picker-1" readonly="true" style="color:orange;" />
																 <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Taken Amount" title=" ">?</span>
																
															</div>
														</div>
													</div>			
											    </div>

												<div class="profile-activity clearfix">
													<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Retirement Type</label>

														<div class="col-sm-9">
															<select name="Retirement_Type" id="type" class="col-sm-8"   required="true">
																
																<option value="Balanced Retirement" >Balanced Retirement</option>
																<option value="Over Retirement" >Over Retirement</option>
																<option value="Under Retirement" >Under Retirement</option>
											               </select>
											               <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Payment method " title=" ">?</span>
																 
														</div>
													</div>
												</div>
												<input type="hidden" name="Currency" id="Currency" value="<?php   echo $key->Currency;?>">
												<input type="hidden" name="Post_Id" value="<?php   echo $key->Post_Id;?>">
												<input type="hidden" name="Total_Amount" value="<?php   echo $totalamount;?>"> 
												<div class="profile-activity clearfix">
																<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Retire Amount</label>

																<div class="col-sm-9">
																<input  type="text" id="retire_amount" name="Amount" value="" data-rel="tooltip"  class="col-sm-8"  required="true" />
																 <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Retired Amount" title=" ">?</span>
																
																 
															   </div>
															</div>
												</div>
												<div class="profile-activity clearfix">
																<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Retire. Attach</label>

																<div class="col-sm-9">
																<input  type="file" name="attach_retire"  data-rel="tooltip"  class="col-sm-8" id="id-date-picker-1" required="true" />
																
																 
															   </div>
															</div>
												</div>
												<div class="profile-activity clearfix" id="under_amount_div">
																<div class="form-group">
																<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Returned Amount</label>

																<div class="col-sm-9">
																<input  type="text" id="under_amount" name="Under_Amount" value="" data-rel="tooltip"  class="col-sm-8"   />
																 <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Amount Required to be returned from  employee " title=" ">?</span>
															   </div>
															</div>
												</div>
												<div class="profile-activity clearfix" id="extra_amount_div">
																<div class="form-group" >
																<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Paid Amount</label>

																<div class="col-sm-9">
																<input  type="text" id="extra_amount" name="Extra_Amount" value="" data-rel="tooltip"  class="col-sm-8" id=""  />
																 <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Amount Required to be paid to an employee " title=" ">?</span>
																
																 
															   </div>
															</div>
												</div>
												<div class="profile-activity clearfix" id="attach_extra_div">
																<div class="form-group" >
																<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Receipt</label>

																<div class="col-sm-9">
																<input  type="file" id ="attach_receipt" name="attach_receipt"  data-rel="tooltip"  class="col-sm-8" id="id-date-picker-1"   />
																
																 
															   </div>
															</div>
												</div>
												
												
												<div class="profile-activity clearfix">
														<div class="form-group">
															<label class="col-sm-3 control-label no-padding-right" for="form-field-1"></label>
                                                           <div class="col-sm-9">
																<button class="btn btn-info" id="submit_button">
																	<i class="ace-icon fa fa-check bigger-110"></i>
																	Pay in
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

		<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
			<script>
				$(window).on("beforeunload", function() {
	        		return "Are sure you want to leave the page";
	       		 });
			//alert($('#paid_amount').val());
			$(function() {
			 $('#under_amount_div,#extra_amount_div,#attach_extra_div').hide();	
			       amount=$('#paid_amount').val();
			       currency=$('#Currency').val();

		        	 $('#retire_amount').val(amount);
		        	 $("#retire_amount").prop("readonly", true);
		     
		    $('#type').change(function(){
		     if($('#type').val() == 'Balanced Retirement') {
		        	 $('#under_amount_div,#extra_amount_div,#attach_extra_div').hide();
		        	 amount=$('#paid_amount').val();

		        	 $('#retire_amount').val(amount);
		        	 $("#retire_amount").prop("readonly", true);
		           
		        } 
		     else if($('#type').val() == 'Under Retirement')
		        {

                $('#under_amount_div,#attach_extra_div').show();
	        	$('#extra_amount_div').hide();
	        	$("#retire_amount").prop("readonly", false);
	        	$('#retire_amount').val('');
	             } 
	        else if($('#type').val() == 'Over Retirement')
		        {
                $('#extra_amount_div,#attach_extra_div').show();
	        	$('#under_amount_div').hide();
	        	$("#retire_amount").prop("readonly", false);
	        	$('#retire_amount').val('');
	             }
	    });
		

	});
$("#submit_button").click(function(e){
	//alert(parseInt($('#extra_amount').val())+parseInt($('#retire_amount').val()));

      if ($('#type').val() == 'Under Retirement'){

      	if ($('#under_amount').val()==''){alert('Returned Amount  is required');e.preventDefault(); }
        else if ($('#attach_receipt').val()==''){alert('Receipt is required');e.preventDefault(); }

      	 else if ((parseInt($('#under_amount').val(),10)+parseInt($('#retire_amount').val(),10)) != parseInt(amount,10))
      	 	 {
      	 	 	
      	      alert('The amount specified are not equal to PAID AMOUNT '+currency+'  '+amount);
      	      e.preventDefault();
      	     }
      }
      else if ($('#type').val() == 'Over Retirement'){ 
        if ($('#extra_amount').val()==''){alert('Paid Amount is required');e.preventDefault(); }
        else if ($('#attach_receipt').val()==''){alert('Receipt is required');e.preventDefault(); }

        else if ((parseInt($('#extra_amount').val(),10)+parseInt($('#retire_amount').val(),10)) < parseInt(amount,10)) {
      	alert('The sum of paid and retired must be greater than  PAID AMOUNT '+currency+'  '+amount);
         
	    	}
	    }

   });
  


</script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url();?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php //echo base_url();?>assets/js/bootstrap.min.js"></script>

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
							</script>

