					
					<div class="page-content">
						
                      
                       <div class="page-header  col-centered">
							<h1 style="margin-left: 100px; font-size: 17px;">New Rate ! </h1>
						</div>
							
							<h4 class="widget-title"></h4>

					   
						
						<!-- /.page-header -->

						<div class="row">
							<div class="col-sm-12">

								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal add" role="form" method="post">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Country</label>

										<div class="col-md-8">
											<input  type="text" name="CountryName" data-rel="tooltip" class="col-xs-10 " id="Rate" value="" required="true" />
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Currency name</label>

										<div class="col-md-8">
											<input  type="text" name="CurrencyName" data-rel="tooltip" class="col-xs-10 " id=" 	CurrencyName" value="" required="true" />
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 	Currency code</label>

										<div class="col-md-8">
											<input  type="text" name="CurrencyCode" data-rel="tooltip" class="col-xs-10 " id=" 	CurrencyName" value="" required="true" />
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">GBP</label>

										<div class="col-md-8">
											<input type="number" step="any" min="0" name="GBP" data-rel="tooltip" class="col-xs-10 " id="GBP" value="" required="true" />
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">USD</label>

										<div class="col-md-8">
											<input  type="number" step="any" min="0" name="USD" data-rel="tooltip" class="col-xs-10 " id="USD" value="" required="true" />
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">EURO</label>

										<div class="col-md-8">
											<input type="number" step="any" min="0" name="EURO" data-rel="tooltip" class="col-xs-10 " id="EURO" value="" required="true" />
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">YEN</label>

										<div class="col-md-8">
											<input  type="number" step="any" min="0" name="YEN" data-rel="tooltip" class="col-xs-10 " id="YEN" value="" required="true" />
											
										</div>
									</div>
									<div class="clearfix ">
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
							<?php $this->load->view('modal/modal_footer'); ?>
<script>


$('.add').submit( function (ev) {
    ev.preventDefault();
//alert('helo');
  
  if($('#Rate').val() == ''){
      alert('Rate is required');
      ev.preventDefault();
               return false;
   }
else {

      $.ajax({
      type: "POST",
      url: '<?php echo base_url(); ?>payment/newrate',
      data:$('.add').serialize(),
      
      success:  function(data){
        //alert(data);
        //alert('Success! center updated');*/
        location.reload();
      }

    });
    return;

   }
});

</script> 