					
					<div class="page-content">
						
                      
                       <div class="page-header  col-centered">
							<h1 style="margin-left: 100px; font-size: 17px;">Update employee ! </h1>
						</div>
							
							<h4 class="widget-title"></h4>

					   
						
						<!-- /.page-header -->

						<div class="row">
							<div class="col-sm-12">

								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal edit" role="form" method="post">
									<?php  //echo validation_errors(); ?>
									<?php foreach ($employeelist as $key) { ?>
									<input  type="hidden" name="Employee_Id" id="Employee_Id" data-rel="tooltip" class="col-xs-10 "  value="<?php echo $key->Employee_Id; ?>" />
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Employee ID#</label>

										<div class="col-md-8">
											<input  type="text" name="EmployeeId" data-rel="tooltip" class="col-xs-10" id="EmployeeId" value="<?php echo $key->EmploymentNo; ?>" required="true" />
											<span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Employee ID eg E234578." title=" ">?</span>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> First name</label>

										<div class="col-md-8">
											<input  type="text" name="FirstName" id="FirstName" value="<?php echo $key->First_Name;  ?>" data-rel="tooltip"  class="col-xs-10" required="true" />
											 <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Employee first name" title=" ">?</span>
										</div>
									</div>

									<div class="space-4"></div>

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Middle name</label>

										<div class="col-md-8">
											<input  type="text" name="MiddleName" data-rel="tooltip" value="<?php echo $key->Middle_Name; ?>"  class="col-xs-10"  />
											  <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Employee middle name" title=" ">?</span>
											   
										</div>
									</div>
									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Last name</label>

										<div class="col-md-8">
		                       <input  type="text" name="LastName" data-rel="tooltip"  class="col-xs-10" value="<?php echo $key->Last_Name; ?>" required="true"  />
											  <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Employee surname" title=" ">?</span>
											  
										</div>
									</div>
									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Bank Name</label>

										<div class="col-sm-4">
											<select name="Bank_Id" class="form-control col-xs-10 col-sm-5"  data-rel="tooltip"  data-placeholder="" >
												<option value="">Select a Bank </option>
												 <?php foreach ($banks as $row ) {?>
                                                  
                                                  <option value="<?php echo $row->Bank_Id; ?>" <?php if ((set_value('Bank_Id')==$row->Bank_Id)|($key->fk_employee_Bank_Id==$key->Bank_Id) ) echo ' selected';?>><?php echo  $row->Bank_Name ; ?></option>
                                                 <?php  } ?>
															
											</select>
											
											<?php echo '<span class="text-danger">'. form_error('Bank_Id').'</span>'; ?>
										</div>
									</div>

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Account Number</label>

										<div class="col-md-8">
		                       <input  type="text" name="AccountNo" data-rel="tooltip"  value="<?php echo $key->BankAccountNo; ?>"  class="col-xs-10" required="true" />
											  <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Employee account number" title=" ">?</span>
											 
										</div>
									</div>
								<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="Mobile"> Mobile</label>

										<div class="col-md-8">
		                       <input  type="text" name="Mobile" data-rel="tooltip" class="col-xs-10" id="Mobile" value="<?php echo $key->Mobile; ?>" class="col-xs-10 col-sm-5" required="true" />
											  <span class="help-button" data-rel="popover" data-trigger="hover"  data-placement="left" data-content="Employee mobile number"  title=" ">?</span>
											  
										</div>
									</div>
									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Email</label>

										<div class="col-md-8">
		                       <input  type="email" name="Email" data-rel="tooltip"  class="col-xs-10" value="<?php echo $key->Email; ?>" required="true" />
											  <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Employee email address to be used on notifications" title=" ">?</span>
											  
										</div>
									</div>
																	<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-2">User Role</label>

										<div class="col-sm-9">
										

										<div class="checkbox">
											<label>
												<input name="employee" value="1" type="checkbox" class="ace" <?php if ($key->Employee_Role==1) echo 'checked';?> />
												<span class="lbl"> Employee</span>
											</label>
											
											<label>
												<input name="Asistant_accountant" value="1" type="checkbox" class="ace"  <?php if ($key->Asistant_accountant==1) echo 'checked';?> />
												<span class="lbl">Asistantant Accountant</span>
											</label>
											<label>
												<input name="Cashier" value="1" type="checkbox" class="ace"  <?php if ($key->Cashier_Role==1) echo 'checked';?> />
												<span class="lbl">Cashier</span>
											</label>
											<label>
												<input name="financeofficer" type="checkbox"  value="1"class="ace" <?php if ($key->Finance_Officer_Role==1) echo 'checked';?> />
												<span class="lbl"> Finance Officer</span>
											</label>
											<label>
												<input name="seniorfinance" type="checkbox" value="1" class="ace"  <?php if ($key->Senior_Finance_Role==1) echo 'checked';?>/>
												<span class="lbl"> Senior Finance</span>
											</label>
											<label>
												<input name="headadmins" type="checkbox" value="1" class="ace" <?php if ($key->Head_Finance_Role==1) echo 'checked';?> />
												<span class="lbl"> Head Finance & Accounts</span>
											</label>
											
										</div>
									</div>
									

								</div>

								

									 <?php } ?>

									<div class="clearfix ">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Save
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Reset
											</button>
										</div>
									</div>

									<div class="hr hr-24"></div>

									
									 </form>
									</div>
								</div><!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
							<?php //$this->load->view('modal/modal_footer'); ?>
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
      url: '<?php echo base_url(); ?>employee/edit_employee',
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