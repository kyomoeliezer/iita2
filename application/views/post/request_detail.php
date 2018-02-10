<div class="main-content">
				<div class="main-content-inner">
					

					<div class="page-content">
						

						<div class="page-header">
							<h1>
								Request : <?php echo $Post_Id; ?>
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Details<span class="pull-right"><a   href="<?php echo base_url(); ?>post/request_details_pdf/<?php echo $Post_Id;   ?>"><button><i class="fa fa-file-pdf-o"></i>Pdf</button></a><span>
								</small>
							</h1>
						</div><!-- /.page-header -->
						

                	
               
						<div class="row"
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">
									
									<div class="col-sm-8 col-md-offset-2">
									 <table class="table unborder" width=50%>
									<tr>
									 				<td colspan="2" style="text-align: center; border-top:none;">
									 					<h3><b> Request Details For<?php foreach ($post as $key) { echo  "  ".ucfirst($key->First_Name."    ".$key->Last_Name)." "  ;  }?></b></h3>
									 				</td>
									 	</tr>
									 <?php foreach ($post as $row) { ?>
									   
									 
									 			
									 		
									 		<tr class="table-row">
										 		<td class="rowdata1 text-right" style="border: none;">Status:</td>
										 		<td class="rowdata2 text-left" style="border: none;">
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
										 		<td class="rowdata1 text-right" style="border: none;">Rejection Reason:</td>
										 		<td class="rowdata2 text-left" style="border: none;">
										 			<?php if ($row->Post_Status=='waiting approval'){?>
										 			&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($row->Rejection_Reason); ?>
										 			<?php }?>
										 
										 		</td>
										 	</tr>
										 	<?php }?>
										 	<tr class="table-row">
										 		<td class="rowdata1 text-right" style="border: none;">Doc No#:</td>
										 		<td class="rowdata2 text-left" style="border: none;">
										 			<a href="<?php echo base_url(); ?>post/download/<?php echo $row->Post_Id.'xform';  ?>"><span >&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($row->Post_Id); ?></span></a>
										 			
										 		</td>
										 	</tr>
									 		<tr class="table-row">
										 		<td class="rowdata1 text-right" style="border: none;">Owner:</td>
										 		<td class="rowdata2 text-left" style="border: none;border: none;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  ucfirst($key->First_Name.'    '.$key->Last_Name); ?></td>
									 	    </tr>
									 	    <tr class="table-row">
										 		<td class="rowdata1 text-right" style="border: none;">Principal Traveler:</td>
										 		<td class="rowdata2 text-left" style="font-weight: bold;border: none;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  ucfirst($key->First_Name.',   '.$key->Last_Name);?>&nbsp;&nbsp;&nbsp;&nbsp;<?php  echo $row->EmploymentNo;?></td>
									 	   </tr>
									 	   <tr class="table-row">
										 		<td class="rowdata1 text-right" style="border: none;">Description:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold;border: none;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  $key->Post_Description;?></td>
									 	   </tr>
									 	   <tr>
										 		<td class="rowdata1 text-right" style="border: none;">Duration:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold;border: none;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  different_in_days($key->Post_StartDate,$key->Post_EndDate).'  days';?></td>
									 	   </tr>
									 	   <tr class="table-row">
										 		<td class="rowdata1 text-right" style="border: none;">Start Date:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold;border: none;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  date_2_userformat($key->Post_StartDate);?></td>
									 	   </tr>
									 	   <tr class="table-row">
										 		<td class="rowdata1 text-right" style="border: none;">End Date:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold;border: none;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  date_2_userformat($key->Post_EndDate);?></td>
									 	   </tr>
									 	   <tr class="table-row">
										 		<td class="rowdata1 text-right" style="border: none;">Due Date:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold;border: none;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  retirement_due($key->Post_EndDate);?></td>
									 	   </tr>
									 	   
									 	   <tr class="table-row" style="color:orange;">
										 		<td class="rowdata1 text-right" style="border: none;">Estmated Total Cost:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold;border: none;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  $totalamount.'  '.$key->Currency;?></td>
									 	   </tr>
									 	   <tr class="table-row">
										 		<td class="rowdata1 text-right" style="border: none;">Date Submitted:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold;border: none;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  date_2_userformat($key->Date_Created);?></td>
									 	   </tr>
									 	   <tr class="table-row">
										 		<td class="rowdata1 text-right" style="border: none;">Cost Type:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold;border: none;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  $key->Costing_type;?></td>
									 	   </tr>
									 	   <tr class="table-row">
										 		<td class="rowdata1 text-right" style="border: none;">Account:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold; border: none;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  $key->AccountNo.'  '.$key->Account_Description;?></td>
									 	   </tr>

									 	</table>
									 	<div class="col-sm-8 col-md-offset-1">
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
									<?php if (! empty($travel_list)){ ?>
																		 	<div class="col-sm-8 col-md-offset-1">
									 	<table  class="table   table-hover">
									 		
									 			<tr>
									 				<td style="border-top:none;border-bottom: 1px #f1f1f1; border-bottom-width: thin; color:orange;">From</td>
									 				<td style="border-top:none;border-bottom: 1px #f1f1f1;border-bottom-width: thin; color:orange;">To</td>
									 				<td style="border-top:none;border-bottom: 1px #f1f1f1;border-bottom-width: thin; color:orange;">Departure</td>
									 				<td class="text-right" style="border-top:none; border-bottom: 1px #f1f1f1;border-bottom-width: thin; color:orange;">Arrival</td>
									 				
									 				
									 			</tr>
									 		
									 			<?php $total=0; foreach ($travel_list as $trow1) {?>
									 			
									 			<tr>
									 				<td style="border:none;"><?php echo  $trow1->City_From; ?></td>		
									 				<td style="border:none;"><?php echo $trow1->City_To; ?></td>
									 				<td style="border:none;"><?php echo  date_2_userformat($trow1->Departure_Date); ?></td>
									 				<td class="text-right" style="border:none;"><?php echo  date_2_userformat($trow1->Arrival_Date); ?></td>	 
									 			</tr>
									 			<?php }?>
									 			
									 		
									 	</table>
									 	
									</div>

                                     
                                     <?php }?>

									 </div>
							</div>  <!--roww-->

						<div class="row col-sm-8 col-md-offset-2">	
							<div class="col-sm-12">
								<div class="widget-box transparent">
												<div class="">
													<h4 class="widget-title blue smaller">
														<i class="ace-icon fa fa-caret-square-o-up orange"></i>
														Payment
													</h4>

													<!-- <div class="widget-toolbar action-buttons">
														<a href="#" data-action="reload">
															<i class="ace-icon fa fa-refresh blue"></i>
														</a>
                                                       &nbsp;
														<a href="#" class="pink">
															<i class="ace-icon fa fa-trash-o"></i>
														</a>
													</div> -->

												</div>

												<div class="widget-body">
													<div class="widget-main padding-8">
														<div id="profile-feed-1" class="profile-feed">
														<?php if (! empty($payoutlist)){ ?>	
															<table class="table">
																	<thead>
																		<tr>
																			<th class="center">Date</th>
																			<th>Amount(Origin)</th>
																		<th class="hidden-xs">Currency</th>
																		<th class="hidden-480">Amount(USD)</th>
																		<th>Rate</th>
																		<th>Doc</th>
																	</tr>
																</thead>
																<tbody>
																<?php foreach ($payoutlist as $value) {?>
																	
																
																	<tr>
																		<td class="center"><?php echo date_2_userformat($value->Payment_Date); ?></td>
                                                                        <td class="center"><?php echo $value->Payment_Amount_Out_Origin; ?></td>
																		<td class="center"><?php echo $value->Currency; ?></td>
																		<td class="center"><?php echo round($value->Payment_Amount_Out_USD,3); ?></td>
																		<td class="center"><?php  
																		if ($value->Payment_Amount_Out_USD== $value->Payment_Amount_Out_Origin) echo '1'; else { if ($value->Payment_Amount_Out_USD !=0) echo   (1/($value->Payment_Amount_Out_Origin/$value->Payment_Amount_Out_USD));
                                                                             else echo '0';
																		} ?></td>

																		<td class="center"><a href="<?php echo base_url(); ?>post/download/<?php echo $value->fk_payment_Post_Id.'xreceipt';  ?>"><span ><?php echo strtoupper($value->fk_payment_Post_Id); ?></span></a></td>
																	</tr>
																	<?php }?>
																</tbody>
															</table>
										<?php
										  } 
										 else if ($key->Post_Status =='approved'){
                                          if ($this->session->userdata['logged_in']['Finance_Officer_Role']==1){
										 	?>

                                          <a href="<?php echo base_url(); ?>payment/payout/<?php echo $key->Post_Id; ?>"><button class="btn btn-info" >PAYOUT</button></a>
										<?php } } else {
																echo "WAITING FOR APPROVAL";
															}

															?>
																		
													    					
														</div>
													</div>
												</div>

								</div> 	
							</div>
						</div>

							<div class="row col-sm-8 col-md-offset-2">
								<div class="widget-box transparent">
												<div class="">
													<h4 class="widget-title blue smaller">
														<i class="ace-icon fa fa-caret-square-o-down orange"></i>
														Retirement 
													</h4>

												</div>

												<div class="widget-body">
													<div class="widget-main padding-8">
														<div id="profile-feed-1" class="profile-feed">
																<div class="profile-activity clearfix">
															<?php if (! empty($payintlist)){ ?>
															<table class="table">
																	<thead>
																		<tr>
																			<th class="center">Date</th>
																			<th>Amount(Origin)</th>
																		<th class="hidden-xs">Currency</th>
																		<th class="hidden-480">Amount(USD)</th>
																		<th>Rate</th>
																		<th>Change</th>
																		<th>Doc</th>
																	</tr >
																</thead>
																<tbody>
																<?php foreach ($payintlist as $trow) {?>
																	
																
																	<tr>
																		<td class="center"><?php echo date_2_userformat($trow->Payment_Date); ?></td>
                                                                        <td class="center"><?php echo $trow->Payment_Amount_In_Origin; ?></td>
																		<td class="center"><?php echo $trow->Currency; ?></td>
																		<td class="center"><?php echo round($trow->Payment_Amount_In_USD,3); ?></td>
																		<td class="center"><?php  
																		if ($trow->Payment_Amount_In_USD== $trow->Payment_Amount_In_Origin) echo '1'; else echo   (1/($trow->Payment_Amount_In_Origin/$trow->Payment_Amount_In_USD)); ?></td>
																		<td class="center"><?php echo ($trow->Cash_Retired_Origin-$trow->Payment_Amount_In_Origin);?></td>
																		
																		<td class="center"><a href="<?php echo base_url(); ?>post/download/<?php echo $trow->fk_payment_Post_Id.'xretiredoc';  ?>"><span ><?php echo strtoupper($trow->fk_payment_Post_Id); ?></span></a></td>
																		
																	</tr>
																	<?php }?>
																</tbody>
															</table>
															<?php
														    } 
															else if ($key->Post_Status =='paid'){
                                                             if ($this->session->userdata['logged_in']['Finance_Officer_Role']==1){
																?>

                                                            <a href="<?php echo base_url(); ?>payment/payin/<?php echo $key->Post_Id; ?>"><button class="btn btn-info" >RETIRE</button></a>
															<?php } }
															else {
																//echo "WAITING FOR APPROVAL";
															}

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

		<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
			<script>
				/*$(window).on("beforeunload", function() {
	        		return "Are sure you want to leave the page";
	       		 });*/
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

                      <style type="text/css">

									
									.table  td {
									    border-style: none;
									}
									
							
						</style>