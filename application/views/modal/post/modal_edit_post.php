					
					<div class="page-content">
						
                      
                       <div class="page-header  col-centered">
							<h1 style="margin-left: 100px; font-size: 17px;">Update post ! </h1>
						</div>
							
							<h4 class="widget-title"></h4>

					   
						
						<!-- /.page-header -->

						<div class="row">
							<div class="col-sm-12">

								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal edit" role="form" method="post">
									<?php echo validation_errors();?>
									<?php foreach ($postlist as $key) { ?>
									<input  type="hidden" name="Post_Id" id="Post_Id" data-rel="tooltip" class="col-xs-10 "  value="<?php echo $key->Post_Id; ?>" />
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Post ID#</label>

										<div class="col-md-8">
											<input  type="text" name="Post_Id" data-rel="tooltip" class="col-xs-10" id="Post_Id" value="<?php echo $key->Post_Id; ?>" required="true" readonly="true" />
											<span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Employee ID eg E234578." title=" ">?</span>
										</div>
									</div>
									<?php // echo validation_errors(); ?>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Staff </label>

										<div class="col-sm-7">
											<select name="Person_Id" class="col-xs-8  chosen-select"  data-rel="tooltip"  data-placeholder="" >
												<option value="">Choose staff...  </option>
                                                <?php foreach ($personlist as $k ) {?>
                                                  <option value="<?php echo $k->Employee_Id; ?>" <?php if ($key->fk_post_EmployeeId==$k->Employee_Id) echo ' selected';?>><?php echo $k->First_Name .' '.$k->Last_Name ; ?></option>
                                                	
                                                 <?php  } ?>
															
											</select>
											<?php echo '<span class="text-danger">'. form_error('Person_Id').'</span>'; ?>
										</div>
									</div>

									<div class="space-4"></div>
									<!-- <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Center</label>

										<div class="col-sm-7">
											<select  name="Center_Id" class="col-xs-8 chosen-select" data-rel="tooltip"  data-placeholder="">
												<option value="">Choose center...  </option>
                                                <?php foreach ($centerlist as $row ) {?>
                                                  
                                                  <option value="<?php echo $row->CenterId; ?>" <?php if ($key->fk_post_CenterId==$row->CenterId) echo ' selected';?>><?php echo $row->CenterNo.': '.$row->Center_Description ; ?></option>
                                                	
                                                 <?php  } ?>
															
											</select>

											
										</div>
									</div> -->
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Account</label>

										<div class="col-sm-7">
											<select name="Account_Id" class="col-xs-8 chosen-select"  data-rel="tooltip"  data-placeholder="" >
												<option value="">Choose staff...  </option>
                                                <?php foreach ($accountlist as $low ) {?>
                                                  
                                                  <option value="<?php echo $low->Account_Id; ?>" <?php if ($key->fk_post_AccountId==$low->Account_Id) echo ' selected';?>><?php echo $low->AccountNo.': '.$low->Account_Description ; ?></option>
                                                	
                                                 <?php  } ?>
															
											</select>
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Amount &nbsp;&nbsp;&nbsp;</label>

										<div class="col-sm-8 input-group">
											<span class="input-group-addon">
													<i class="ace-icon fa fa-dollar"></i>
											</span>
											
											 <input type="number" id="" name="Amount"  class="col-xs-10" data-rel="tooltip" autocomplete="off" maxlength="50" value="<?php echo $key->Post_Amount; ?>" required="required" />
											 
											 <?php //echo '<span class="text-danger">'. form_error('Amount').'</span>'; ?>
										</div>
									</div>



									<div class="space-4"></div>
									<div class="form-group" >
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Description</label>

										<div class="col-sm-8">
											<textarea  type="text" name="Description"   data-rel="tooltip" class="col-xs-10" id="form-input" required="true"><?php echo $key->Post_Description; ?></textarea>
											
											
										</div>
									</div>
									<div class="form-group">
									<div class="col-sm-5 col-md-offset-2">
									 											<div class="col-sm-9 input-group">
											<table class="table" style="border-collapse:separate; border-spacing:1.4em;">
												<tr>
													<th><b>Cost Center</b></th>
													<th><b>Amount</b></th>
												</tr>
												<tr id="tr_single">
													<td>
														<select  name="Center_single" class="form-control col-xs-10 col-sm-5 chosen-select" data-rel="tooltip"  data-placeholder="">
															<option value="">Choose center...  </option>
			                                                <?php foreach ($centerlist as $row ) {?>
			                                                  
			                                                  <option value="<?php echo $row->CenterId; ?>" <?php if (set_value('Center_single')==$row->CenterId) echo ' selected';?>><?php echo $row->CenterNo.': '.$row->Center_Description ; ?></option>
			                                                	
			                                                 <?php  } ?>
																		
														</select>
														<?php echo '<span class="text-danger">'. form_error('Center_single').'</span>'; ?>
														
													</td>
													<td style="padding-right: 10px">
														<input  type="number" min="0"  step="any" name="Amount_single" data-rel="tooltip" value="<?php echo set_value('Amount_single'); ?>"  class="" id="id-amount" placeholder="" />
														<?php echo '<span class="text-danger">'. form_error('Amount_single').'</span>'; ?>
														
													</td>
												</tr>
												<tr id="">
													<td>
														<select  name="Center_shared1" id="Center_shared1" class="shared1 form-control col-xs-10 col-sm-5" data-rel="tooltip"   data-placeholder="">
															<option value="">Choose center...  </option>
			                                                <?php foreach ($centerlist as $row ) {?>
			                                                  
			                                                  <option value="<?php echo $row->CenterId; ?>" <?php if (set_value('Center_Id')==$row->CenterId) echo ' selected';?>><?php echo $row->CenterNo.': '.$row->Center_Description ; ?></option>
			                                                	
			                                                 <?php  } ?>
																		
														</select>
														<?php // echo '<span class="text-danger">'. form_error('Center_shared1').'</span>'; ?>
														
													</td>
													<td style="padding-right: 10px">
														<input  type="number" min="0"  step="any" name="Amount_shared1" data-rel="tooltip" value="<?php echo set_value('Amount_shared1'); ?>"  class="shared1" id="id-amount" placeholder="" />
														<?php echo '<span class="text-danger">'. form_error('Amount_shared1').'</span>'; ?>
														
													</td>
												</tr>
												<tr id="">
													<td>
														<select  name="Center_shared2" class="shared2 form-control" data-rel="tooltip" id=""  data-placeholder="">
															<option value="">Choose center...  </option>
			                                                <?php foreach ($centerlist as $row ) {?>
			                                                  
			                                                  <option value="<?php echo $row->CenterId; ?>" <?php if (set_value('Center_shared2')==$row->CenterId) echo ' selected';?>><?php echo $row->CenterNo.': '.$row->Center_Description ; ?></option>
			                                                	
			                                                 <?php  } ?>
																		
														</select>
														<?php echo '<span class="text-danger">'. form_error('Center_shared2').'</span>'; ?>
														
													</td>
													<td style="padding-right: 10px">
														<input  type="number" min="0"  step="any" name="Amount_shared2" data-rel="tooltip" value="<?php echo set_value('Amount_shared2'); ?>"  class="shared2" id="id-amount" placeholder="" />
														<?php echo '<span class="text-danger">'. form_error('Amount_shared2').'</span>'; ?>
														
													</td>
												</tr>
										    </table>
											
										</div>
									</div>
								</div>
									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Start date</label>

										<div class="col-sm-8">
											<input  type="text" name="StartDate" value="<?php echo $key->Post_StartDate; ?>" data-rel="tooltip"  class="col-xs-10  date-picker" id="id-date-picker-1" placeholder="<?php echo date('Y-m-d');?>" data-date-format="yyyy-mm-dd" />
											 <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Project start date" title=" ">?</span>
											
										</div>
									</div>
									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> End date</label>

										<div class="col-sm-8">
											<input  type="text" name="EndDate" data-rel="tooltip" value="<?php echo $key->Post_EndDate; ?>"  class="col-xs-10 date-picker" id="id-date-picker-1" placeholder="<?php echo date('Y-m-d');?>" data-date-format="yyyy-mm-dd" />
											 <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Project end date." title="">?</span>
											 
										</div>
									</div>

									
								

									 <?php } ?>

									<div class="clearfix ">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Save
											</button>

											
										</div>
									</div>

									<div class="hr hr-24"></div>

									
									 </form>
									</div>
								</div><!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
							<?php // $this->load->view('modal/modal_footer'); ?>
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