

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
							<h1 style="margin-left: 300px;">Update Bank <!-- <span class="pull-right"><a href="<?php echo base_url();?>employee/newbank_import"><button class="btn btn-info">Import CSV</button></a></span> --></h1>
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
								<form class="form-horizontal" role="form" action="<?php echo site_url('banks/edit_bank'); ?>" method="post">
									<?php // echo validation_errors(); ?>
									<?php foreach ($bank as $value) {?>
										
									
									<div class="form-group  <?php if (!empty(form_error('bankname'))) echo 'has-error';  ?> ">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Bank Name</label>
                                       <input type="hidden" name="bankid" value="<?php echo $value->Bank_Id; ?>">
										<div class="col-sm-9">
											<input  type="text" name="bankname" data-rel="tooltip" class="col-xs-10 col-sm-5" id="form-input" value="<?php if (! empty($value->Bank_Name)) echo  $value->Bank_Name;else  echo set_value('bankname'); ?>" />
											<span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Bank name eg NMB." title=" ">?</span>
											<?php echo '<span class="text-danger">'. form_error('bankname').'</span>'; ?>
										</div>
									</div>
									<div class="space-4"></div>
									<?php } ?>
									

								

									

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