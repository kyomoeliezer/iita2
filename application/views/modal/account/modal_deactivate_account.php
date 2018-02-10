					
					<div class="page-content">
						
                      
                       <div class="page-header  col-centered">
							<h1 style="margin-left: 100px; font-size: 17px;">Deactivate account ! </h1>
						</div>
							
							<h4 class="widget-title"></h4>

					   
						
						<!-- /.page-header -->

						<div class="row">
							<div class="col-sm-12">

								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal edit" role="form" method="post">
									<?php //echo validation_errors();?>
									<?php foreach ($accountlist as $key) { ?>
									<input  type="hidden" name="Account_Id" data-rel="tooltip" class="col-xs-10 "  value="<?php echo $key->Account_Id; ?>" />
									<input  type="hidden" name="active" data-rel="tooltip" value="0"/>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Account No#</label>

										<div class="col-md-8">
											<input  type="text" name="Account_Number" data-rel="tooltip" class="col-xs-10 " id="Account_Number" value="<?php echo $key->AccountNo; ?>" />
											<span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Account number eg 234578." title=" ">?</span>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Description</label>

										<div class="col-sm-8">
											<textarea  type="text" name="Description" data-rel="tooltip" class="col-xs-10" id="form-input"><?php echo $key->Account_Description; ?></textarea>
											<span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Account title." title="  ">?</span>
										</div>
									</div>

									<div class="space-4"></div>

									
									<div class="space-4"></div>

								

									 <?php } ?>

									<div class="clearfix ">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-danger col-md-8" type="submit">
												<i class="ace-icon fa fa-ban bigger-110"></i>
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

  
  if($('#Account_Number').val() == ''){
      alert('Account is required');
      ev.preventDefault();
               return false;
   }
else {

      $.ajax({
      type: "POST",
      url: '<?php echo base_url(); ?>account/deactivate_account',
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