

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
							<h1 style="margin-left: 300px;">New Cost Center <span class="pull-right"><a href="<?php echo base_url();?>center/newcenter_import"><button class="btn btn-info">Import CSV</button></a></span></h1>
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
								<form class="form-horizontal" role="form" action="<?php echo site_url('center/newcenter'); ?>" method="post">
									<?php // echo validation_errors(); ?>
									<div class="form-group  <?php if (!empty(form_error('Center_Number'))) echo 'has-error';  ?> ">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Cost Center No#</label>

										<div class="col-sm-9">
											<input  type="text" name="Center_Number" data-rel="tooltip" class="col-xs-10 col-sm-5" id="form-input" value="<?php echo set_value('Center_Number'); ?>" />
											<span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Center number eg 234578." title=" ">?</span>
											<?php echo '<span class="text-danger">'. form_error('Center_Number').'</span>'; ?>
										</div>
									</div>
									<div class="space-4"></div>
									<div class="form-group  <?php if (!empty(form_error('Person_Id'))) echo 'has-error';  ?> ">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Budget Holder</label>

										<div class="col-sm-4">
											<select name="BudgetHolder" class="form-control col-xs-10 col-sm-5 chosen-select"  data-rel="tooltip"  data-placeholder="" >
												<option value="">Choose budget holder...  </option>
                                                <?php foreach ($personlist as $key ) {?>
                                                  
                                                  <option value="<?php echo $key->EmploymentNo; ?>" <?php if (set_value('BudgetHolder')==$key->EmploymentNo) echo ' selected';?>><?php echo  $key->EmploymentNo.'::  '  .$key->First_Name .' '.$key->Last_Name ; ?></option>
                                                	
                                                 <?php  } ?>
															
											</select>
											<?php echo '<span class="text-danger">'. form_error('BudgetHolder').'</span>'; ?>
										</div>
									</div>
									<div class="space-4"></div>

									<div class="form-group  <?php if (!empty(form_error('Description'))) echo 'has-error';  ?>" >
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Description</label>

										<div class="col-sm-9">
											<textarea  type="text" name="Description"  required="true" data-rel="tooltip" class="col-xs-10 col-sm-5" id="form-input"><?php echo set_value('Description'); ?></textarea>
											<span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Project or center title." title="  ">?</span>
											<?php echo '<span class="text-danger">'. form_error('Description').'</span>'; ?>
										</div>
									</div>

									<div class="space-4"></div>


									<div class="form-group <?php if (!empty(form_error('StartDate'))) echo 'has-error';  ?>">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Start date</label>

										<div class="col-sm-9">
											<input  type="text" name="StartDate" value="<?php echo set_value('StartDate'); ?>" data-rel="tooltip"  class="col-xs-10 col-sm-5 date-picker" id="id-date-picker-1" placeholder="<?php echo date('Y-m-d');?>" data-date-format="yyyy-mm-dd" />
											 <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Project start date" title=" ">?</span>
											 <?php echo '<span class="text-danger">'. form_error('StartDate').'</span>'; ?>
										</div>
									</div>
									<div class="space-4"></div>
									<div class="form-group  <?php if (!empty(form_error('EndDate'))) echo 'has-error';  ?>">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> End date</label>

										<div class="col-sm-9">
											<input  type="text" name="EndDate" data-rel="tooltip" value="<?php echo set_value('EndDate'); ?>"  class="col-xs-10 col-sm-5 date-picker" id="id-date-picker-1" placeholder="<?php echo date('Y-m-d');?>" data-date-format="yyyy-mm-dd" />
											 <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Project end date." title="">?</span>
											 <?php echo '<span class="text-danger">'. form_error('EndDate').'</span>'; ?>
										</div>
									</div>

									<div class="space-4"></div>

								

									

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