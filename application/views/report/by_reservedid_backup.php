
<div class="main-content">
				<div class="main-content-inner">
					

					<div class="page-content">
						

						<div class="page-header" style="text-align: center;">
							<h4>
								<?php /*var_dump($paidlist); */
								if (isset($search_result_desc)) echo $search_result_desc; ?>
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									 <?php //echo $desc; ?>
								</small>
								<!-- <span class="print pull-right" onClick=""><button id="cmd">pdf</button></span> -->
							</h4>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								
								<div class="row">
									<div class="col-xs-12">
										

										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										

										
										<div>
											<table id="dynamic-table" class="table table-striped  table-hover">
												<thead>
													<!-- <tr><td colspan=12 style="color:orange;font-size: 15px;"><?php /*if (isset($search_result_desc)) echo $search_result_desc;*/ ?>
														<a href="<?php echo site_url('report/report_by_person');?>"><button class="btn btn-info pull-right">Search</button></a>
													</td></tr> -->
													<tr>
														<th>Date</th>
														<th>Description</th>
														<th>DocumentNo</th>
														<th>Currency</th>
														<th>Conversion Date</th>
														<th>Rate</th>
														<th>Paid Out(Orign)</th>
														<th>Paid In(Orign)</th>
														<th>Paid Out(USD)</th>
														<th>Paid In(USD)</th>
														
														<th >Account</th>
														<th>Center</th>
														<th style="color: orange;">Reserved</th>
													</tr>
												</thead>

												<tbody>
													<?php 
													$class='';
													///sum of colums
														$Payment_Amount_In_Origin_total=$Payment_Amount_In_USD_total=$Payment_Amount_Out_Origin_total=$Payment_Amount_In_USD_total=$Payment_Amount_Out_USD_total=0;
													foreach ($paidlist as $row) {
														$Payment_Amount_In_USD_total =$Payment_Amount_In_USD_total+$row->Payment_Amount_In_USD;
														$Payment_Amount_In_Origin_total =$Payment_Amount_In_Origin_total+$row->Payment_Amount_In_Origin;
														$Payment_Amount_Out_Origin_total =$Payment_Amount_Out_Origin_total+$row->Payment_Amount_Out_Origin;
														$Payment_Amount_Out_USD_total =$Payment_Amount_Out_USD_total+$row->Payment_Amount_Out_USD;
														
														///
													if ((different_in_days_compare_today($row->Post_EndDate) > 14) &&($row->Post_Status=='paid'))  $class='class="danger"';  ?>
													<tr <?php //echo $class;?>>
														
                                                        <td><?php echo  date_2_userformat($row->Payment_Date); ?></td>
                                                         <td><?php echo  $row->Post_Description; ?></td>
														<td>
															<a href="<?php echo base_url(); ?>post/request_details/<?php echo $row->Post_Id; ?>"><?php echo  $row->Post_Id; ?></a>
														</td>
														<td><?php if (empty($row->Currency)) echo 'USD';else echo  $row->Currency; ?></td>
														<td><?php echo  date_2_userformat($row->Payment_Date); ?></td>
														<td><?php if ($row->Payment_Amount_In_Origin !=0) echo  ($row->Payment_Amount_In_USD/$row->Payment_Amount_In_Origin); else if ($row->Payment_Amount_Out_Origin !=0)  echo  ($row->Payment_Amount_Out_USD/$row->Payment_Amount_Out_Origin); ?></td>
														<td><?php echo  $row->Payment_Amount_Out_Origin; ?></td>
														<td><?php echo  $row->Payment_Amount_In_Origin; ?></td>
														<td><?php echo  round($row->Payment_Amount_Out_USD,2); ?></td>
														<td><?php echo  round($row->Payment_Amount_In_USD,2); ?></td>
														
														<td class="hidden-480" ><?php echo  $row->AccountNo; ?> </td>
														<td class="hidden-480"><?php echo  $row->CenterNo; ?></td>
														<td class="hidden-480" style="color: orange;"><?php echo  $row->EmploymentNo; ?></td>

													</tr>
													<?php $class=''; }?>
													<tr>
														
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td style="color:blue; font-weight: 200px;font-style: bold;">TOTAL</td>
														<td style="color:blue; font-weight: 200px;font-style: bold;"><?php echo round($Payment_Amount_Out_Origin_total,3); ?></td>
														<td style="color:blue; font-weight: 200px;font-style: bold;"><?php echo round($Payment_Amount_In_Origin_total,2); ?></td>
														<td style="color:blue; font-weight: 200px;font-style: bold;"><?php echo round($Payment_Amount_Out_USD_total,2); ?></td>
														<td style="color:blue; font-weight: 200px;font-style: bold;"><?php echo round($Payment_Amount_In_USD_total,2); ?></td>
														
														<td></td>
														<td></td>
														<td></td>
														

														
													</tr>
												</tbody>
											</table>
										</div>
											<div class="col-xs-8 ">

											<table id="" class="table" width=50%>
												<br/><br/>
												
										
												<thead>
													 <tr><td  colspan=12 style="background-color: #FFF;text-align: center;">
													 	<h6>UN RETIRED PAYMENTS</h6>
													</td></tr> 
													<tr>
														<th>Date</th>
														<th>Description</th>
														<!-- <th>DocumentNo</th> -->
														<th>Currency</th>
														
														<th>Paid Out(USD)</th>
														
														
														<th >Account</th>
														<th>Center</th>
														<th>Reserved</th>
													</tr>
												</thead>

												<tbody>
													<?php 
													
													foreach ($paidlist_unretired as $row) {
													if ((different_in_days_compare_today($row->Post_EndDate) > 14) &&($row->Post_Status=='paid'))  $class='class="danger"';  ?>
													<tr <?php echo $class;?>>
														
                                                        <td><?php echo  date_2_userformat($row->Payment_Date); ?></td>
                                                         <td><?php echo  $row->Post_Description; ?></td>
														<!-- <td>
															<a href="<?php echo base_url(); ?>post/request_details/<?php echo $row->Post_Id; ?>"><?php echo  $row->Post_Id; ?></a>
														</td> -->
														<td><?php if (empty($row->Currency)) echo 'USD';else echo  $row->Currency; ?></td>
														<td><?php echo  $row->Payment_Amount_Out_Origin; ?></td>
														<td class="hidden-480" ><?php echo  $row->AccountNo; ?> </td>
														<td class="hidden-480"><?php echo  $row->CenterNo; ?></td>
														<td class="hidden-480"><?php echo  $row->EmploymentNo; ?></td>

													</tr>
													<?php }?>
												</tbody>
											</table>
										</div>
										<div class="col-xs-4 ">
											<table id="" class="table" width=50%>
												<br/><br/>
												
										
												<thead>
													 <tr><td  colspan=12 style="background-color: #FFF;text-align: center;">
													 	<h6>SUMMARY</h6>
													</td></tr> 
													<tr>
														<th># Paid</th>
														<th># Retired</th>
														<!-- <th>DocumentNo</th> -->
														<th>Retired(USD)</th>
														<th>Unretired(USD)</th>
														
													</tr>
												</thead>

												<tbody>
													<?php foreach ($paidlist_summary as $row_sum) { ?>
													<tr>
														<td><?php echo $row_sum->Number_payments; ?></td>
														<td><?php echo $row_sum->Number_retired; ?></td>
														<td class="hidden-480" ><?php echo round($row_sum->Total_payments,2); ?> </td>
														<td class="hidden-480"><?php echo round($row_sum->Total_retirement,2); ?></td>
														
                                                     <?php } ?>
													</tr>
													
												</tbody>
											</table>
										</div>


										</div>
									</div>
								</div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
			<?php  //$this->load->view('common/include_footer');?>

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
					"lengthMenu": [[-1], ["All"]],
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false },
					  null, null,null, null, null,null, null,null, null, null,
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
			
				
				
				$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
				
				new $.fn.dataTable.Buttons( myTable, {
					buttons: [
				/*	  {
						"extend": "colvis",
						"text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
						"className": "btn btn-white btn-primary btn-bold",
						columns: ':not(:first):not(:last)'
					  },*/
					/*  {
						"extend": "copy",
						"text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },*/
					  {
						"extend": "csv",
						"text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  /*{
						"extend": "excel",
						"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },*/
					  {
						"extend": "pdf",
						"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  }
					  /*{
						"extend": "print",
						"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
						"className": "btn btn-white btn-primary btn-bold",
						autoPrint: false,
						message: 'This print was produced using the Print button for DataTables'
					  }	*/	  
					]
				} );
				myTable.buttons().container().appendTo( $('.tableTools-container') );
				
				//style the message box
				var defaultCopyAction = myTable.button(1).action();
				myTable.button(1).action(function (e, dt, button, config) {
					defaultCopyAction(e, dt, button, config);
					$('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
				});
				
				
				var defaultColvisAction = myTable.button(0).action();
				myTable.button(0).action(function (e, dt, button, config) {
					
					defaultColvisAction(e, dt, button, config);
					
					
					if($('.dt-button-collection > .dropdown-menu').length == 0) {
						$('.dt-button-collection')
						.wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
						.find('a').attr('href', '#').wrap("<li />")
					}
					$('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
				});
			
				////
			
				setTimeout(function() {
					$($('.tableTools-container')).find('a.dt-button').each(function() {
						var div = $(this).find(' > div').first();
						if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
						else $(this).tooltip({container: 'body', title: $(this).text()});
					});
				}, 500);
				
				
				
				
				
				myTable.on( 'select', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
					}
				} );
				myTable.on( 'deselect', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
					}
				} );
			
			
			
			
				/////////////////////////////////
				//table checkboxes
				$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
				
				//select/deselect all rows according to table header checkbox
				$('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$('#dynamic-table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) myTable.row(row).select();
						else  myTable.row(row).deselect();
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
					var row = $(this).closest('tr').get(0);
					if(this.checked) myTable.row(row).deselect();
					else myTable.row(row).select();
				});
			
			
			
				$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
					e.stopImmediatePropagation();
					e.stopPropagation();
					e.preventDefault();
				});
				
				
				
				//And for the first simple table, which doesn't have TableTools or dataTables
				//select/deselect all rows according to table header checkbox
				var active_class = 'active';
				$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if($row.is('.detail-row ')) return;
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});
			
				
			
				/********************************/
				//add tooltip for small view action buttons in dropdown menu
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				
				//tooltip placement on right or left
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
				
				
				
				
				/***************/
				$('.show-details-btn').on('click', function(e) {
					e.preventDefault();
					$(this).closest('tr').next().toggleClass('open');
					$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
				});
				/***************/
				
				
				
				
				
				/**
				//add horizontal scrollbars to a simple table
				$('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
				  {
					horizontal: true,
					styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
					size: 2000,
					mouseWheelLock: true
				  }
				).css('padding-top', '12px');
				*/
			
			
			})
		</script>
<script src="<?php echo base_url(); ?>assets/js/jspdf.min.js"></script>
<script>
var doc = new jsPDF();
var specialElementHandlers = {
    '.clearfix': function (element, renderer) {
        return true;
    }
};

$('#cmd').click(function () {
    doc.fromHTML($('#dynamic-table').html(), 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.save('sample-file.pdf');
});
</script>
			
			<?php //$this->load->view('common/include_script'); ?>