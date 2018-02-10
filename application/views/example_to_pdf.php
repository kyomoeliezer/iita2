<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Travel and Cash Advance management</title>
		<meta name="description" content="Static &amp; Dynamic Tables" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
       <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/chosen.min.css" />
       		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-colorpicker.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fonts.googleapis.com.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-rtl.min.css" />
		<script src="<?php echo base_url(); ?>assets/js/ace-extra.min.js"></script>

	</head>







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
						

                	
               
						<div class="row"
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">
									
									<div class="col-sm-8 col-md-offset-2">
									 <table class="table unborder" width=50%>
									<tr>
									 				<td colspan="2" style="text-align: center; border-top:none;">
									 					<h3><b> Request Details For<?php foreach ($post as $key) { echo  '   '.ucfirst($key->First_Name.'    '.$key->Last_Name).'  ';  }?></b></h3>
									 				</td>
									 	</tr>
									 <?php foreach ($post as $row) { ?>
									   
									 
									 			
									 		
									 	<div class="col-sm-4 col-md-offset-4">
									 	<table id="simple-table" class="table   table-hover">
									 		
									 			<tr>
									 				<td style="border-top:none;margin-bottom: 1px #000;">Center</td>
									 				<td class="text-right" style="border-top:none; margin-bottom: 1px;">Amount</td>
									 				
									 				
									 			</tr>
									 		
									 			<?php $total=0; foreach ($requestlist as $row) {?>
									 			
									 			<tr>
									 				<td style="border:none;"><?php echo $row->CenterNo ?></td>
									 				<td class="text-right" style="border:none;"><?php echo $row->Amount ?></td>
									 				
														 
									 			</tr>
									 			<?php }?>
									 			
									 		
									 	</table>
									 	
									</div>
									 </div>
							</div>  <!--roww-->

						<div class="row col-sm-8 col-md-offset-2">	
							<div class="col-sm-12">
								<div class="widget-box transparent">
												<div class="">
													<h4 class="widget-title blue smaller">
														<i class="ace-icon fa fa-caret-square-o-up orange"></i>
														Payment
													</h4>

													<!-- <div class="widget-toolbar action-buttons">
														<a href="#" data-action="reload">
															<i class="ace-icon fa fa-refresh blue"></i>
														</a>
                                                       &nbsp;
														<a href="#" class="pink">
															<i class="ace-icon fa fa-trash-o"></i>
														</a>
													</div> -->

												</div>

												<div class="widget-body">
													<div class="widget-main padding-8">
														<div id="profile-feed-1" class="profile-feed">
														<?php if (! empty($payoutlist)){ ?>	
															<table class="table">
																	<thead>
																		<tr>
																			<th class="center">Date</th>
																			<th>Amount(Origin)</th>
																		<th class="hidden-xs">Currency</th>
																		<th class="hidden-480">Amount(USD)</th>
																		<th>Rate</th>
																		<th>Doc</th>
																	</tr>
																</thead>
																<tbody>
																<?php foreach ($payoutlist as $value) {?>
																	
																
																	<tr>
																		<td class="center"><?php echo date_2_userformat($value->Payment_Date); ?></td>
                                                                        <td class="center"><?php echo $value->Payment_Amount_Out_Origin; ?></td>
																		<td class="center"><?php echo $value->Currency; ?></td>
																		<td class="center"><?php echo round($value->Payment_Amount_Out_USD,3); ?></td>
																		<td class="center"><?php  
																		if ($value->Payment_Amount_Out_USD== $value->Payment_Amount_Out_Origin) echo '1'; else { if ($value->Payment_Amount_Out_USD !=0) echo   (1/($value->Payment_Amount_Out_Origin/$value->Payment_Amount_Out_USD));
                                                                             else echo '0';
																		} ?></td>
																		<td class="center"><a href="<?php echo base_url(); ?>post/download/<?php echo $value->fk_payment_Post_Id.'xreceipt';  ?>"><span ><?php echo strtoupper($value->fk_payment_Post_Id); ?></span></a></td>
																	</tr>
																	<?php }?>
																</tbody>
															</table>
										<?php
										  } 
										 else if ($key->Post_Status =='approved'){?>

                                          <a href="<?php echo base_url(); ?>payment/payout/<?php echo $key->Post_Id; ?>"><button class="btn btn-info" >PAYOUT</button></a>
										<?php }else {
																echo "WAITING FOR APPROVAL";
															}

															?>
																		
													    					
														</div>
													</div>
												</div>

								</div> 	
							</div>
						</div>

							<div class="row col-sm-8 col-md-offset-2">
								<div class="widget-box transparent">
												<div class="">
													<h4 class="widget-title blue smaller">
														<i class="ace-icon fa fa-caret-square-o-down orange"></i>
														Retirement 
													</h4>

												</div>

												<div class="widget-body">
													<div class="widget-main padding-8">
														<div id="profile-feed-1" class="profile-feed">
																<div class="profile-activity clearfix">
															<?php if (! empty($payintlist)){ ?>
															<table class="table">
																	<thead>
																		<tr>
																			<th class="center">Date</th>
																			<th>Amount(Origin)</th>
																		<th class="hidden-xs">Currency</th>
																		<th class="hidden-480">Amount(USD)</th>
																		<th>Rate</th>
																		<th>Change</th>
																		<th>Doc</th>
																	</tr >
																</thead>
																<tbody>
																<?php foreach ($payintlist as $trow) {?>
																	
																
																	<tr>
																		<td class="center"><?php echo date_2_userformat($trow->Payment_Date); ?></td>
                                                                        <td class="center"><?php echo $trow->Payment_Amount_In_Origin; ?></td>
																		<td class="center"><?php echo $trow->Currency; ?></td>
																		<td class="center"><?php echo round($trow->Payment_Amount_In_USD,3); ?></td>
																		<td class="center"><?php  
																		if ($trow->Payment_Amount_In_USD== $trow->Payment_Amount_In_Origin) echo '1'; else echo   (1/($trow->Payment_Amount_In_Origin/$trow->Payment_Amount_In_USD)); ?></td>
																		<td class="center"><?php echo ($trow->Cash_Retired_Origin-$trow->Payment_Amount_In_Origin);?></td>
																		<td class="center"><a href="<?php echo base_url(); ?>post/download/<?php echo $trow->fk_payment_Post_Id.'xreceipt';  ?>"><span ><?php echo strtoupper($trow->fk_payment_Post_Id); ?></span></a></td>
																	</tr>
																	<?php }?>
																</tbody>
															</table>
															<?php
														    } 
															else if ($key->Post_Status =='paid'){?>

                                                            <a href="<?php echo base_url(); ?>payment/payin/<?php echo $key->Post_Id; ?>"><button class="btn btn-info" >RETIRE</button></a>
															<?php }
															else {
																//echo "WAITING FOR APPROVAL";
															}

															?>
																		
													    		</div>			
														</div>
													</div>
												</div>

								</div> 	
							</div>
						
									 

                                   <?php }?>
									


								
							

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

		
			