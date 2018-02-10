					
					<div class="page-content">
						
                      
                       <div class="page-header  col-centered">
							<h1 style="margin-left: 100px; font-size: 17px;">Deactivate center ! </h1>
						</div>
							
							<h4 class="widget-title"></h4>

					   
						
						<!-- /.page-header -->

						<div class="row">
							<div class="col-sm-12">

								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal edit" role="form" method="post">
									<?php echo validation_errors();?>
									<?php foreach ($centerlist as $key) { ?>
									<input  type="hidden" name="CenterId" data-rel="tooltip" class="col-xs-10 "  value="<?php echo $key->CenterId; ?>" />
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Center No#</label>

										<div class="col-md-8">
											<input  type="text" name="Center_Number" data-rel="tooltip" class="col-xs-10 " id="Center_Number" value="<?php echo $key->CenterNo; ?>" />
											<span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Center number eg 234578." title=" ">?</span>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Project</label>

										<div class="col-sm-8">
											<textarea  type="text" name="Description" data-rel="tooltip" class="col-xs-10" id="form-input"><?php echo $key->Center_Description; ?></textarea>
											<span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Project or center title." title="  ">?</span>
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-md-3 control-label no-padding-right" for="form-field-2"> Start date</label>

										<div class="col-sm-8">
											<input  type="text" name="StartDate" data-rel="tooltip"  class="col-xs-10 date-picker" id="id-date-picker-1" placeholder="<?php echo date('Y-m-d');?>" data-date-format="yyyy-mm-dd" value="<?php echo $key->StartDate; ?>" />
											 <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Project start date" title=" ">?</span>
										</div>
									</div>
									<div class="space-4"></div>
									<input  type="hidden" name="active" value='0' />
									<div class="form-group">
										<label class="col-md-3 control-label no-padding-right" for="form-field-2"> End date</label>

										<div class="col-sm-8">
											<input  type="text" name="EndDate" data-rel="tooltip"  class="col-xs-10  date-picker" id="id-date-picker-1" placeholder="<?php echo date('Y-m-d');?>" data-date-format="yyyy-mm-dd" value="<?php echo $key->EndDate; ?>" />
											 <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Project end date." title="">?</span>
										</div>
									</div>

									<div class="space-4"></div>

								

									 <?php } ?>

									<div class="clearfix ">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Deactivate
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

  
  if($('#Center_Number').val() == ''){
      alert('Center is required');
      ev.preventDefault();
               return false;
   }
else {

      $.ajax({
      type: "POST",
      url: '<?php echo base_url(); ?>center/activate_center',
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