

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
                       	<?php foreach ($postlist as $key) { ?>
							<h1 style="margin-left: 200px;">Request Review/<span style="color:orange;"><?php echo $key->Post_Id.'/'.$key->Post_Status;?> </span></h1>
						</div>
							
							<h4 class="widget-title"></h4>

					   
						
						<!-- /.page-header -->

						<div class="row">
							<?php 
                              if (! empty($this->session->flashdata('message_name'))){?>
                              <div class="alert alert-success pull-right"> <?php echo  $this->session->flashdata('message_name');?> </div> 
                         <?php }?> 

							<div class="col-xs-12">

								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form"  method="post">
									
									<?php // echo validation_errors(); ?>
									<input  type="hidden" name="approve" value="approve" />
									<input  type="hidden" name="Request_Details_Id" id="Post_Id" data-rel="tooltip" class="col-xs-10 "  value="<?php echo $key->Post_Id; ?>" />
									<div class="form-group  <?php if (!empty(form_error('Person_Id'))) echo 'has-error';  ?> ">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Reserved/Staff </label>

										<div class="col-sm-4">
											<input  type="text" name="" data-rel="tooltip" class="col-xs-10" id="" value="<?php echo $key->EmploymentNo.'    '.$key->First_Name.' '.$key->Last_Name ; ?>" required="true" readonly="true" />
										</div>
									</div>
									
									<div class="form-group  <?php if (!empty(form_error('Account_Id'))) echo 'has-error';  ?> ">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Account</label>

										<div class="col-sm-4">
											<input  type="text" name="" data-rel="tooltip" class="col-xs-10" id="" value="<?php echo $key->AccountNo.'    '.$key->Account_Description; ?>" required="true" readonly="true" />	
										</div>
									</div>
									<div class="form-group  <?php if (!empty(form_error('Amount'))) echo 'has-error';  ?> ">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Amount &nbsp;&nbsp;&nbsp;</label>

										<div class="input-group">
											<span class="input-group-addon">
													<?php echo '<span style="color:orange;" >'. $key->Currency.'</span>';  ?>
											</span>
											
											 <input type="text"  name="Amount"  id="amount" class="col-xs-4" data-rel="tooltip" autocomplete="off" maxlength="50" value="<?php echo $key->Post_Amount; ?>" readonly="true"/>
											 
											 <?php //echo '<span class="text-danger">'. form_error('Amount').'</span>'; ?>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Description</label>

										<div class="col-sm-4">
											<textarea  type="text" name="Description"   data-rel="tooltip" class="col-xs-10" id="form-input" readonly="true"><?php echo $key->Post_Description; ?></textarea>
											
											
										</div>
									</div>

									<div class="space-4"></div>
									<div class="form-group <?php if (!empty(form_error('StartDate'))) echo 'has-error';  ?>">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Start date</label>

										<div class="col-sm-4">
											<input  type="text" name="StartDate" value="<?php echo $key->Post_StartDate; ?>" data-rel="tooltip"  class="col-xs-10  date-picker" id="id-date-picker-1" placeholder="<?php echo date('Y-m-d');?>" data-date-format="yyyy-mm-dd" readonly="true" />
										</div>
									</div>
									<div class="space-4"></div>
									<div class="form-group  <?php if (!empty(form_error('EndDate'))) echo 'has-error';  ?>">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> End date</label>

										<div class="col-sm-4">
											<input  type="text" name="EndDate" data-rel="tooltip" value="<?php echo $key->Post_EndDate; ?>"  class="col-xs-10 date-picker" id="id-date-picker-1" placeholder="<?php echo date('Y-m-d');?>" data-date-format="yyyy-mm-dd" readonly="true" />
										</div>
									</div>
									<div class="space-4"></div>
									<div class="form-group  <?php if (!empty(form_error('EndDate'))) echo 'has-error';  ?>">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Document</label>

										<div class="col-sm-4">
											<span class="col-xs-10"><a href="<?php echo base_url(); ?>post/download/<?php echo $key->Post_Id.'xform';  ?>"><span >&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($key->Post_Id); ?></span></a>  </span>
										</div>
									</div>

									
									<div class="space-4"></div>
									<div class="form-group">
									<div class="col-sm-5 col-md-offset-2">
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

								

									
								</form>

									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info verify" onclick="confirm_modal_approval('<?php echo base_url();?>senior_finance_post/approve/<?php echo $key->Post_Id;?>');" >
												<i class="ace-icon fa fa-check bigger-110"></i>
												Approve
											</button>
										

											&nbsp; &nbsp; &nbsp;
											<button class="btn btn-danger"  onclick="showAjaxModal('<?php echo base_url();?>senior_finance_post/reject_post/<?php echo $key->Post_Id;?>')">
												<i class="ace-icon fa fa-ban bigger-110"></i>
												Reject
											</button>
										
										</div>
									</div>
									<?php }?>

									<div class="hr hr-24"></div>

									
									
									</div>
								</div><!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->

						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
			<?php $this->load->view('common/include_footer');?>
<script>
/*	$('#amount').click( function (ev) {
	var value = $('#amount').value();
var num = '$' + value.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
 alert(num);
});*/

$('.edit').submit( function (ev) {
    ev.preventDefault();

  
  if($('#Employee_Id').val() == ''){
      alert('Center is required');
      ev.preventDefault();
               return false;
   }
else {

      $.ajax({
      type: "POST",
      url: '<?php echo base_url(); ?>post/edit_post',
      data:$('.edit').serialize(),
      
      success:  function(data){
        // alert(data);
        //alert('Success! center updated');*/
        location.reload();
      }

    });
    return;

   }
});

</script>

<!--[endif]-->
		<!-- <script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url(); ?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script> -->
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="<?php echo base_url(); ?>assets/js/excanvas.min.js"></script>
		<![endif]-->
		
		
		

