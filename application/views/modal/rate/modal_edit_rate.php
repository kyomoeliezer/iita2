					
					<div class="page-content">
						
                      
                       <div class="page-header  col-centered">
							<h1 style="margin-left: 100px; font-size: 17px;">Update rate ! </h1>
						</div>
							
							<h4 class="widget-title"></h4>

					   
						
						<!-- /.page-header -->

						<div class="row">
							<div class="col-sm-12">

								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal edit" role="form" method="post">
									<?php echo validation_errors();?>
									<?php foreach ($ratelist as $key) { ?>
									<input  type="hidden" name="Currency_Id" id="Currency_Id" data-rel="tooltip" class="col-xs-10 "  value="<?php echo $key->Currency_Id; ?>" />
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Country</label>

										<div class="col-md-8">
											<input  type="text" name="CountryName" data-rel="tooltip" class="col-xs-10 " id="Rate" value="<?php echo $key->CountryName;?>" required="true" />
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Currency name</label>

										<div class="col-md-8">
											<input  type="text" name="CurrencyName" data-rel="tooltip" class="col-xs-10 " id=" 	CurrencyName" value="<?php echo $key->CurrencyName;?>" required="true" />
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 	Currency code</label>

										<div class="col-md-8">
											<input  type="text" name="CurrencyCode" data-rel="tooltip" class="col-xs-10 " id=" 	CurrencyName" value="<?php echo $key->CurrencyCode;?>" required="true" />
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">GBP</label>

										<div class="col-md-8">
											<input type="number" step="any" min="0" name="GBP" data-rel="tooltip" class="col-xs-10 " id="GBP" value="<?php echo $key->GBP;?>" required="true" />
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">USD</label>

										<div class="col-md-8">
											<input  type="number" step="any" min="0" name="USD" data-rel="tooltip" class="col-xs-10 " id="USD" value="<?php echo $key->USD;?>" required="true" />
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">EURO</label>

										<div class="col-md-8">
											<input type="number" step="any" min="0" name="EURO" data-rel="tooltip" class="col-xs-10 " id="EURO" value="<?php echo $key->EURO;?>" required="true" />
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">YEN</label>

										<div class="col-md-8">
											<input  type="number" step="any" min="0" name="YEN" data-rel="tooltip" class="col-xs-10 " id="YEN" value="<?php echo $key->YEN;?>" required="true" />
											
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
							<?php //$this->load->view('modal/modal_footer'); ?>
<script>


$('.edit').submit( function (ev) {
    ev.preventDefault();

  
  if($('#Rate_Id').val() == ''){
      alert('Rate is required');
      ev.preventDefault();
               return false;
   }
else {

      $.ajax({
      type: "POST",
      url: '<?php echo base_url(); ?>payment/edit_rate',
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