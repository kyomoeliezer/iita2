
	<script type="text/javascript">
	
	function showAjaxModal(url)
	{
		// SHOWING AJAX PRELOADER IMAGE
		jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url(); ?>assets/images/preloader.gif" /></div>');
		
		// LOADING THE AJAX MODAL
		jQuery('#modal_ajax').modal('show', {backdrop: 'false'});
	
		
		// SHOW AJAX RESPONSE ON REQUEST SUCCESS
		$.ajax({
			url: url,
			success: function(response)
			{
		   
				jQuery('#modal_ajax .modal-body').html(response);
				closeOnEscape: false;
                backdrop: 'static';
			
			dialogClass: "noclose";
			}
		});
	}
        function showAjaxModal3(url)
    {
        // SHOWING AJAX PRELOADER IMAGE
        jQuery('#modal_ajax2').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url(); ?>assets/images/preloader.gif" /></div>');
        
        // LOADING THE AJAX MODAL
        jQuery('#modal_ajax').modal('show', {backdrop: 'false'});
    
        
        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        $.ajax({
            url: url,
            success: function(response)
            {
           
                jQuery('#modal_ajax .modal-body').html(response);
                closeOnEscape: false;
                backdrop: 'static';
            
            dialogClass: "noclose";
            }
        });
    }
    function showAjaxModal2(url)
    {
        // SHOWING AJAX PRELOADER IMAGE
        jQuery('#modal_ajax2 .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url(); ?>assets/images/preloader.gif" /></div>');
        
        // LOADING THE AJAX MODAL
        jQuery('#modal_ajax2').modal('show', {backdrop: 'false'});
    
        
        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        $.ajax({
            url: url,
            success: function(response)
            {
           
                jQuery('#modal_ajax2 .modal-body2').html(response);
                closeOnEscape: false;
                backdrop: 'static';
            
            dialogClass: "noclose";
            }
        });
    }
</script>

    
    <!-- (Ajax Modal)-->
    <div class="modal fade" id="modal_ajax">
        <div class="modal-dialog" style="width:600px;">
            <div class="modal-content" ">
                
                <div class="modal-header" style="text-align:center;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <!-- <h4 class="modal-title"><?php echo 'M-CRM'; ?> </h4> -->
                </div>
                
                <div class="modal-body" style="margin:0px;">
                 
                    
                    
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

        <div class="modal fade" id="modal_ajax2">
        <div class="modal-dialog" style="width:800px;">
            <div class="modal-content" ">
                
                <div class="modal-header" style="text-align:center;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><?php echo 'M-CRM'; ?> </h4>
                </div>
                
                <div class="modal-body" style="margin:0px;">
                
                    
                    
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <script type="text/javascript">
	function confirm_modal(delete_url)
	{
		jQuery('#modal-4').modal('show', {backdrop: 'static'});
		document.getElementById('delete_link').setAttribute('href' , delete_url);
	}
    function confirm_deactivate(delete_url)
    {
        jQuery('#modal-deactivate').modal('show', {backdrop: 'static'});
        document.getElementById('deactivate_link').setAttribute('href' , deactivate_link);
    }
      function confirm_modal_approval(approve_link)
    {
        jQuery('#modal-approve').modal('show', {backdrop: 'static'});
        document.getElementById('approve_link').setAttribute('href' , approve_link);
    }
     function confirm_modal_review(review_link)
    {
        jQuery('#modal-review').modal('show', {backdrop: 'static'});
        document.getElementById('review_link').setAttribute('href' , review_link);
    }
          function confirm_modal_close(approve_link)
    {
        jQuery('#modal-close').modal('show', {backdrop: 'static'});
        document.getElementById('close_link').setAttribute('href' , approve_link);
    }
    
	</script>
    
    <!-- (Normal Modal)-->
    <div class="modal fade" id="modal-4">
        <div class="modal-dialog" >
            <div class="modal-content" style="margin-top:100px;">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
                </div>
                
                
                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="#" class="btn btn-danger" id="delete_link"><?php echo 'delete';?></a>
                    <a href="#" class="btn btn-info" data-dismiss="modal" id="confirm_link"><?php echo 'NO';?></a>
                    <!--<button type="button" class="btn btn-info" data-dismiss="modal"><?php echo 'cancel';?></button>-->
                </div>
            </div>
        </div>
    </div>
     <div class="modal fade" id="modal-review">
        <div class="modal-dialog" >
            <div class="modal-content" style="margin-top:100px;">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align:center;">Have you reviewed this ?</h4>
                </div>
                
                
                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="#" class="btn btn-success" id="review_link"><?php echo 'YES';?></a>
                    <a href="#" class="btn btn-danger" data-dismiss="modal" ><?php echo 'NO';?></a>
                    <!--<button type="button" class="btn btn-info" data-dismiss="modal"><?php echo 'cancel';?></button>-->
                </div>
            </div>
        </div>
    </div>

   <div class="modal fade" id="modal-approve">
        <div class="modal-dialog" >
            <div class="modal-content" style="margin-top:100px;">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align:center;">Do you want to approve this ?</h4>
                </div>
                
                
                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="#" class="btn btn-success" id="approve_link"><?php echo 'Approve';?></a>
                    <a href="#" class="btn btn-danger" data-dismiss="modal" ><?php echo 'NO';?></a>
                    <!--<button type="button" class="btn btn-info" data-dismiss="modal"><?php echo 'cancel';?></button>-->
                </div>
            </div>
        </div>
    </div>
 <div class="modal fade" id="modal-close">
        <div class="modal-dialog" >
            <div class="modal-content" style="margin-top:100px;">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align:center;">Do you want to close this ?</h4>
                </div>
                
                
                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="#" class="btn btn-success" id="close_link"><?php echo 'Close';?></a>
                    <a href="#" class="btn btn-danger" data-dismiss="modal" ><?php echo 'NO';?></a>
                    <!--<button type="button" class="btn btn-info" data-dismiss="modal"><?php echo 'cancel';?></button>-->
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-deactivate">
        <div class="modal-dialog" >
            <div class="modal-content" style="margin-top:100px;">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align:center;">Deactivate ?</h4>
                </div>
                
                
                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="#" class="btn btn-danger" id="deactivate_link"><?php echo 'Yes';?></a>
                   
                </div>
            </div>
        </div>
    </div>
       <div class="modal fade" id="confirm_modal_activate">
        <div class="modal-dialog" >
            <div class="modal-content" style="margin-top:100px;">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align:center;">Activate ?</h4>
                </div>
                
                
                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="#" class="btn btn-danger" id="activate_link"><?php echo 'Activate';?></a>
                    <!--<button type="button" class="btn btn-info" data-dismiss="modal"><?php echo 'cancel';?></button>-->
                </div>
            </div>
        </div>
    </div>



    <style type="text/css">
    .modal {
      overflow-y:auto;
    } 
    </style>
   