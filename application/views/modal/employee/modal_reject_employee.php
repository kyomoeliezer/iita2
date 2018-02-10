					
					<div class="page-content">
						
                      
                       <div class="page-header  col-centered">
							<h1 style="margin-left: 100px; font-size: 17px;">Reject employee ! </h1>
						</div>
							
							<h4 class="widget-title"></h4>

					   
						
						<!-- /.page-header -->

						<div class="row">
							<div class="col-sm-12">

								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal edit" role="form" method="post">
									<?php echo validation_errors();?>
									<?php foreach ($employeelist as $key) { ?>
									<input  type="hidden" name="Employee_Id" id="Employee_Id" data-rel="tooltip" class="col-xs-10 "  value="<?php echo $key->Employee_Id; ?>" />
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Employee ID#</label>

										<div class="col-md-8">
											<input  type="text" name="EmployeeId" readonly="true" data-rel="tooltip" class="col-xs-10" id="EmployeeId" value="<?php echo $key->EmploymentNo; ?>" required="true" />
											
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> First name</label>

										<div class="col-md-8">
											<input  type="text" name="FirstName" readonly="true" id="FirstName" value="<?php echo $key->First_Name;  ?>" data-rel="tooltip"  class="col-xs-10" required="true" />
											 
										</div>
									</div>

									<div class="space-4"></div>

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Middle name</label>

										<div class="col-md-8">
											<input  type="text" name="MiddleName" readonly="true" data-rel="tooltip" value="<?php echo $key->Middle_Name; ?>"  class="col-xs-10" required="true" />
											  
											   
										</div>
									</div>
									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Last name</label>

										<div class="col-md-8">
		                       <input  type="text" name="LastName" data-rel="tooltip" readonly="true"  class="col-xs-10" value="<?php echo $key->Last_Name; ?>" required="true"  />
											 
											  
										</div>
									</div>

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Account Number</label>

										<div class="col-md-8">
		                       <input  type="text" name="AccountNo" data-rel="tooltip" readonly="true"  value="<?php echo $key->BankAccountNo; ?>"  class="col-xs-10" required="true" />
											 
											 
										</div>
									</div>
								<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="Mobile"> Mobile</label>

										<div class="col-md-8">
		                       <input  type="text" name="Mobile" data-rel="tooltip" readonly="true" class="col-xs-10" id="Mobile" value="<?php echo $key->Mobile; ?>" class="col-xs-10 col-sm-5" required="true" />
											  
											  
										</div>
									</div>
									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Email</label>

										<div class="col-md-8">
		                       <input  type="email" name="Email" data-rel="tooltip" readonly="true"  class="col-xs-10" value="<?php echo $key->Email; ?>" required="true" />
											 
											  
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Rejection Reason</label>

										<div class="col-md-8">
		                       			<textarea type="text" required="true" name="Reason" value="" class="col-xs-10"></textarea>    
										</div>
									</div>

								<input  type="hidden" name="active" id="active"  value="345" />

									 <?php } ?>

									<div class="clearfix ">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-danger col-md-8" type="submit">
												<i class="ace-icon fa fa-close bigger-110"></i>
												Reject
											</button>

											
										</div>
									</div>

									<div class="hr hr-24"></div>

									
									 </form>
									</div>
								</div><!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
							<?php $this->load->view('modal/modal_footer'); ?>
<script>


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
      url: '<?php echo base_url(); ?>employee/reject_employee',
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