<div class="main-content">
				<div class="main-content-inner">
					

					<div class="page-content">
						

						<div class="page-header">
							<h1>
								Request : <?php echo $Post_Id; ?>
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Details
								</small>
							</h1>
						</div><!-- /.page-header -->
						<style type="text/css">
						     .rowdata1,.rowdata2{
						     	font-size: 16px;
						     	font-family:all;
                               
                               }
                               tr.table-row {
								  border-spacing: 5em;
								}
							
						</style>

                	
               
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">
									<div class="col-sm-10 col-md-offset-1">
										<h4 style="margin-left:130px;"><?php foreach ($post as $key) { echo  ucfirst($key->First_Name.'    '.$key->Last_Name).':  ';  }?>Request Details</h4>
									</div>
									 <?php foreach ($post as $row) { ?>
									
									 	<div class="col-sm-10 col-md-offset-2">
									 		<table>
									 		
									 		<tr class="table-row">
										 		<td class="rowdata1 text-right">Status:</td>
										 		<td class="rowdata2 text-left">
										 			<?php if ($row->Post_Status=='waiting approval'){?>
										 			<span class="label label-warning arrowed-in arrowed-in-right">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($row->Post_Status); ?></span>
										 			<?php }?>
										 			<?php if ($row->Post_Status=='approved'){?>
										 			<span class="label label-success arrowed-in arrowed-in-right">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($row->Post_Status); ?></span>
										 			<?php }?>
										 			<?php if ($row->Post_Status=='rejected'){?>
										 			<span class="label label-danger arrowed-in arrowed-in-left">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($row->Post_Status); ?></span>
										 			<?php }?>
										 		</td>
										 	</tr>
										 
										 	<?php if ($row->Post_Status=='rejected'){?>
										 		<tr class="table-row">
										 		<td class="rowdata1 text-right">Rejection Reason:</td>
										 		<td class="rowdata2 text-left">
										 			<?php if ($row->Post_Status=='waiting approval'){?>
										 			<span class="label label-warning arrowed-in arrowed-in-right">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($row->Rejection_Reason); ?></span>
										 			<?php }?>
										 
										 		</td>
										 	</tr>
										 	<?php }?>
										 	<tr class="table-row">
										 		<td class="rowdata1 text-right">Doc No#:</td>
										 		<td class="rowdata2 text-left">
										 			<a href="<?php echo base_url(); ?>post/download/<?php echo $row->Post_Id.'xform';  ?>"><span >&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($row->Post_Id); ?></span></a>
										 			
										 		</td>
										 	</tr>
									 		<tr class="table-row">
										 		<td class="rowdata1 text-right">Owner:</td>
										 		<td class="rowdata2 text-left">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  ucfirst($key->First_Name.'    '.$key->Last_Name); ?></td>
									 	    </tr>
									 	    <tr class="table-row">
										 		<td class="rowdata1 text-right">Principal Traveler:</td>
										 		<td class="rowdata2 text-left" style="font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  ucfirst($key->First_Name.',   '.$key->Last_Name);?>&nbsp;&nbsp;&nbsp;&nbsp;<?php  echo $row->EmploymentNo;?></td>
									 	   </tr>
									 	   <tr class="table-row">
										 		<td class="rowdata1 text-right">Description:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  $key->Post_Description;?></td>
									 	   </tr>
									 	   <tr>
										 		<td class="rowdata1 text-right">Duration:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  different_in_days($key->Post_StartDate,$key->Post_EndDate).'  days';?></td>
									 	   </tr>
									 	   <tr class="table-row">
										 		<td class="rowdata1 text-right">Start Date:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  date_2_userformat($key->Post_StartDate);?></td>
									 	   </tr>
									 	   <tr class="table-row">
										 		<td class="rowdata1 text-right">End Date:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  date_2_userformat($key->Post_EndDate);?></td>
									 	   </tr>
									 	   <tr class="table-row">
										 		<td class="rowdata1 text-right">Estmated Total Cost:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  $totalamount.'  '.$key->Currency;?></td>
									 	   </tr>
									 	   <tr class="table-row">
										 		<td class="rowdata1 text-right">Date Submitted:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  date_2_userformat($key->Date_Created);?></td>
									 	   </tr>
									 	   <tr class="table-row">
										 		<td class="rowdata1 text-right">Cost Type:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  $key->Costing_type;?></td>
									 	   </tr>
									 	   <tr class="table-row">
										 		<td class="rowdata1 text-right">Account:</td>
										 		<td class="rowdata2 text-left" style="font-style: bold;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  $key->AccountNo;?></td>
									 	   </tr>

									 	</table>
									 </div>
									 <div class="col-sm-8 col-md-offset-1">
									 	<table id="simple-table" class="table   table-hover">
									 		
									 			<tr>
									 				<td style="border-top:none;border-bottom: 0.3px #f1f1f1;; border-bottom-width: thin;">Cost Center</td>
									 				<td style="border-top:none;border-bottom: 0.3px #f1f1f1;border-bottom-width: thin;">Description</td>
									 				<td style="border-top:none;border-bottom: 0.3px #f1f1f1;border-bottom-width: thin;">Budget Holder</td>
									 				<td class="text-right" style="border-top:none; border-bottom: 0.3px #f1f1f1;border-bottom-width: thin;">Amount</td>
									 				
									 				
									 			</tr>
									 		
									 			<?php $total=0; foreach ($requestlist as $row) {?>
									 			
									 			<tr>
									 				<td style="border:none;"><?php echo  $row->CenterNo; ?></td>		
									 				<td style="border:none;"><?php echo $row->Center_Description; ?></td>
									 				<td style="border:none;"><?php echo  $row->First_Name.'  '.$row->Last_Name; ?></td>
									 				<td class="text-right" style="border:none;"><?php echo  $row->Amount; ?></td>	 
									 			</tr>
									 			<?php }?>
									 			
									 		
									 	</table>
									 	
									</div>
									 	
									

                                   <?php }?>
									


								</div>
							

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
				<!-- basic scripts -->

		
			<?php //$this->load->view('common/include_footer');?>

		<script src="<?php //echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
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
					  null, null,null,null,null, null,null,null,null,
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
			
				<?php  $this->load->view('common/include_script'); ?>