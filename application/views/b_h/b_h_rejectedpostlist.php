<div class="main-content">
				<div class="main-content-inner">
					

					<div class="page-content">
						<?php $this->load->view('common/boot_setting');?>
						

						<div class="page-header">
							<h1>
								Rejected Posts
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									List
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								
								<div class="row">
									<div class="col-xs-12">
										

										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										

										<?php 
                              if (! empty($this->session->flashdata('message_name'))){?>
                              <div class="alert alert-success pull-right"> <?php echo  $this->session->flashdata('message_name');?> </div> 
                         <?php }?>
										<div>
											<table id="dynamic-table" class="table table-striped  table-hover">
												<thead>
													<tr>
														<th class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
														<th>PostNo</th>
														<th>Amount</th>
														<th>Description</th>
														<th>Reserved/Person Acc No</th>
														
														<th>Account</th>
                                                         <th class="hidden-480">Rejection Reason</th>
                                                         
                                                        <th class="hidden-480">Senior Finance</th>
                                                        
                                                        <th class="hidden-480">Head F& Admin</th>
                                                        <th class="hidden-480">Action</th>
                                                     
													</tr>
												</thead>

												<tbody>
													<?php foreach ($postlist as $row) {?>
													<tr>
														<td class="center">
															<label class="pos-rel">
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</td>

														<td>
															<a href="<?php echo base_url(); ?>post/request_details/<?php echo $row->Post_Id; ?>"><?php echo  $row->Post_Id; ?></a>
														</td>
														<td><?php echo  $row->Post_Amount; ?></td>
														<td><?php echo  $row->Post_Description; ?></td>
														<td class="hidden-480"><?php echo  $row->EmploymentNo; ?></td>
														
														<td class="hidden-480"><?php echo  $row->AccountNo; ?> </td>
														<td class="hidden-480"><?php echo  $row->Rejection_Reason; ?> </td>
														<!-- <td class="hidden-480"><?php echo  $row->Budget_Holder; ?><span class="label label-sm label-warning">Reviewing</span></td> -->
														
														<td class="hidden-480"><?php  
														if ($row->Senior_Finance=='Not yet') echo '<span class="label label-sm label-warning">'.$row->Senior_Finance.'</span>'; 
                                                         else if ($row->Senior_Finance=='rejected') echo '<span class="label label-sm label-danger">'.$row->Senior_Finance.'</span>';
                                                         else if ($row->Senior_Finance=='approved') echo '<span class="label label-sm label-success">'.$row->Senior_Finance.'</span>';
                                                         
														?> </td>
														<td class="hidden-480"><?php  
														if ($row->Head_Finance_Admin=='Not yet') echo '<span class="label label-sm label-warning">'.$row->Head_Finance_Admin.'</span>'; 
                                                         else if ($row->Head_Finance_Admin=='rejected') echo '<span class="label label-sm label-danger">'.$row->Head_Finance_Admin.'</span>';
                                                         else if ($row->Head_Finance_Admin=='approved') echo '<span class="label label-sm label-success">'.$row->Head_Finance_Admin.'</span>';
                                                        
														?> </td>

														<td>

															<div class="hidden-sm hidden-xs action-buttons">
																<?php if ($this->session->userdata['logged_in']['Finance_Officer_Role']==1){?>
																<a href="<?php echo base_url();?>post/correct_post/<?php echo $row->Post_Id;?>"  title="Edit"   <i class="ace-icon fa fa-pencil bigger-130"></i></a>
																<?php } ?>
                                            
                                                               
																
															</div>

															
														</td>
														
											
													</tr>
													<?php }?>
												</tbody>
											</table>
										</div>
									</div>
								</div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
				<!-- basic scripts -->

		
			<?php $this->load->view('common/include_footer');?>

		<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url();?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

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
					  null, null,null,null,null, null,null,null,
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
			
				<?php $this->load->view('common/include_script'); ?>