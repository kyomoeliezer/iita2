

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
							<h1 style="margin-left: 300px;">Import Banks </h1>
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
								<form class="form-horizontal"  enctype="multipart/form-data" role="form" action="<?php echo site_url('banks/newbank_import'); ?>" method="post" >
									<input type="hidden" name="attach_test" value="00" />
									<?php echo validation_errors(); ?>
									<div class="form-group <?php if (!empty(form_error('EmployeeId'))) echo 'has-error';  ?> ">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Banks CSV</label>

										<div class="col-sm-9">
											<input  type="file" name="attach" value="<?php echo set_value('attach'); ?>" data-rel="tooltip" class="col-xs-10 col-sm-5" id="form-input"  />
											<span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Attach a csv file in a template format" title=" ">?</span><br/>
											<span class="text-danger"><?php if (isset($error)) echo $error; else echo form_error('attach');?></span>
										</div>
									</div>
									<div class="space-4"></div>
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info col-md-3" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Import
											</button>

											&nbsp; &nbsp; &nbsp;
											
										</div>
									</div>

									<div class="hr hr-24"></div>

									
									 </form>
									 <p class="col-md-offset-1" style="padding: 100">
								<h4 class="text-danger">The imported data cannot be reversed </h4>
								<h4>Import Procedures</h4>
								<ul>
									<li>Download Csv Template <a style="text-decoration: none;" href="<?php echo base_url(); ?>post/download/<?php echo '1xcsv_bank_template';  ?>" title="Download template for the CSV">here</a> </li>
									<li>Fill your data into the templates.</li>
									<li>Save it in excel csv format.</li>
									<li>Browse to select it.</li>
									<li>Click Import to save it</li>
								</ul>
								
                              </p>
									</div>
								</div><!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
							
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->