

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
							<h1 style="margin-left: 300px;">New Employee <span class="pull-right"><a href="<?php echo base_url();?>employee/newemployee_import"><button class="btn btn-info">Import CSV</button></a></span></h1>
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
								<form class="form-horizontal" role="form" action="<?php echo site_url('employee/newemployee'); ?>" method="post">
									<?php //echo validation_errors(); ?>
									<div class="form-group <?php if (!empty(form_error('EmployeeId'))) echo 'has-error';  ?> ">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Person Acc No#</label>

										<div class="col-sm-9">
											<input  type="text" name="EmployeeId" value="<?php echo set_value('EmployeeId'); ?>" data-rel="tooltip" class="col-xs-10 col-sm-5" id="form-input" value="" />
											<span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Person account number eg E234578." title=" ">?</span><br/>
											<?php echo '<span class="text-danger">'. form_error('EmployeeId').'</span>'; ?>
										</div>
									</div>

									

									<div class="space-4"></div>

									<div class="form-group <?php if (! empty(form_error('FirstName'))) echo 'has-error';  ?> ">
										<label class="col-sm-3 control-label no-padding-right" for="FirstName"> First name</label>

										<div class="col-sm-9">
											<input  type="text" name="FirstName" id="FirstName" value="<?php echo set_value('FirstName'); ?>" data-rel="tooltip"  class="col-xs-10 col-sm-5"  />
											 <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Employee first name" title=" ">?</span>
											
											 <?php echo '<span class="text-danger">'.form_error('FirstName').'</span>'; ?>
										</div>
										
									</div>
									<div class="space-4"></div>
									<div class="form-group <?php  if (! empty(form_error('MiddleName'))) echo 'has-error';  ?>">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Middle name</label>

										<div class="col-sm-9">
											<input  type="text" name="MiddleName" data-rel="tooltip" value="<?php echo set_value('MiddleName'); ?>"  class="col-xs-10 col-sm-5" />
											  <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Employee middle name" title=" ">?</span>
											   <?php echo '<span class="text-danger">'.form_error('MiddleName').'</span>'; ?>
										</div>
									</div>
									<div class="space-4"></div>
									<div class="form-group <?php  if (! empty(form_error('LastName'))) echo 'has-error';  ?>">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Last name</label>

										<div class="col-sm-9">
		                       <input  type="text" name="LastName" data-rel="tooltip"  class="col-xs-10 col-sm-5" value="<?php echo set_value('LastName'); ?>"  />
											  <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Employee surname" title=" ">?</span>
											  <?php echo '<span class="text-danger">'.form_error('LastName').'</span>'; ?>
										</div>
									</div>

                                    <div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Bank Name</label>

										<div class="col-sm-4">
											<select name="Bank_Id" class="form-control col-xs-10 col-sm-5"  data-rel="tooltip"  data-placeholder="" >
												<option value="">Select a Bank </option>
												 <?php foreach ($banks as $key ) {?>
                                                  
                                                  <option value="<?php echo $key->Bank_Id; ?>" <?php if (set_value('Bank_Id')==$key->Bank_Id) echo ' selected';?>><?php echo  $key->Bank_Name ; ?></option>
                                                	
                                                 <?php  } ?>
															
											</select>
											
											<?php echo '<span class="text-danger">'. form_error('BankName').'</span>'; ?>
										</div>
									</div>
									<div class="space-4"></div>
									<div class="form-group <?php  if (! empty(form_error('AccountNo'))) echo 'has-error';  ?>">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Account Number</label>

										<div class="col-sm-9">
		                       <input  type="text" name="AccountNo" data-rel="tooltip"  value="<?php echo set_value('AccountNo'); ?>"  class="col-xs-10 col-sm-5" />
											  <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Employee account number" title=" ">?</span>
											  <?php echo '<span class="text-danger">'.form_error('AccountNo').'</span>'; ?>
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group <?php  if (! empty(form_error('Mobile'))) echo 'has-error';  ?>">
										<label class="col-sm-3 control-label no-padding-right" for="Mobile"> Mobile</label>

										<div class="col-sm-9">
		                       <input  type="text" name="Mobile" data-rel="tooltip" id="Mobile" value="<?php echo set_value('Mobile'); ?>" class="col-xs-10 col-sm-5" />
											  <span class="help-button" data-rel="popover" data-trigger="hover"  data-placement="left" data-content="Employee mobile number"  title=" ">?</span>
											  <?php echo '<span class="text-danger">'.form_error('Mobile').'</span>'; ?>
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group <?php  if (! empty(form_error('Email'))) echo 'has-error';  ?>">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Email</label>

										<div class="col-sm-9">
		                       <input  type="email" name="Email" data-rel="tooltip"  class="col-xs-10 col-sm-5" value="<?php echo set_value('Email'); ?>" />
											  <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Employee email address to be used on notifications" title=" ">?</span>
											  <?php echo '<span class="text-danger">'.form_error('Email').'</span>'; ?>
										</div>
									</div>
									<div class="space-4"></div>

								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-2">User Role</label>

										<div class="col-sm-9">
										

										<div class="checkbox">
											<label>
												<input name="employee" value="1" type="checkbox" class="ace" checked />
												<span class="lbl"> Employee</span>
											</label>
											<label>
												<input name="Asistant_accountant" value="1" type="checkbox" class="ace" />
												<span class="lbl">Asistantant Accountant</span>
											</label>
											<label>
												<input name="Cashier" value="1" type="checkbox" class="ace" />
												<span class="lbl">Cashiert</span>
											</label>
											<label>
												<input name="financeofficer" type="checkbox"  value="1"class="ace" />
												<span class="lbl"> Finance Officer</span>
											</label>
											<label>
												<input name="seniorfinance" type="checkbox" value="1" class="ace" />
												<span class="lbl"> Senior Finance</span>
											</label>
											<label>
												<input name="headadmins" type="checkbox" value="1" class="ace" />
												<span class="lbl"> Head Finance & Accounts</span>
											</label>
										</div>
									</div>
									

								</div>
								

								

									

									<div class="clearfix form-actions">
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

						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->