					
					<div class="page-content">
						
                      
                       <div class="page-header  col-centered">
							<h1 style="margin-left: 100px; font-size: 17px;">Post Rejection ! </h1>
						</div>
							
							<h4 class="widget-title"></h4>

					   
						
						<!-- /.page-header -->

						<div class="row">
							<div class="col-sm-12">

								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal reject" role="form" method="post">
									<input  type="hidden" name="reject" value="reject" />
									<input  type="hidden" name="Post_Id" id="Post_Id" data-rel="tooltip" class="col-xs-10 "  value="<?php echo $Post_Id; ?>" />
									
									<div class="space-4"></div>
									<div class="form-group" >
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> PostID</label>

										<div class="col-sm-8">
											<input  type="text"  class="col-xs-10" id="form-input" value="<?php echo $Post_Id; ?>" readonly="true" />
											
											
										</div>
									</div>
									<div class="form-group" >
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Rejection Reason</label>

										<div class="col-sm-8">
											<textarea  type="text" name="Reject_Reason"  id="Reject_Reason"  data-rel="tooltip" class="col-xs-10" id="form-input" required="true"></textarea>
											
											
										</div>
									</div>
									

									<div class="clearfix ">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-danger" type="submit">
												<i class="ace-icon fa fa-ban bigger-110"></i>
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


$('.reject').submit( function (ev) {
    ev.preventDefault();
  
  
  if($('#Reject_Reason').val() == ''){
      alert('Reason is required');
      ev.preventDefault();
               return false;
   }
else {

      $.ajax({
      type: "POST",
      url: '<?php echo base_url(); ?>b_h_post/reject_post',
      data:$('.reject').serialize(),
      
      success:  function(data){
         alert(data);
        //alert('Success! center updated');*/
        /*location.reload();*/
        window.location.replace("<?php echo base_url(); ?>b_h_post");
      }

    });
    return;

   }
});

</script> 