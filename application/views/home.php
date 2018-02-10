<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Dashboard</li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Dashboard

								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									overview &amp; stats
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<!-- <div class="alert alert-block alert-success">
									<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>

									<i class="ace-icon fa fa-check green"></i>

									Welcome to
									<strong class="green">
										Ace
										<small>(v1.4)</small>
									</strong>,
	лёгкий, многофункциональный и простой в использовании шаблон для админки на bootstrap 3.3.6. Загрузить исходники с <a href="https://github.com/bopoda/ace">github</a> (with minified ace js/css files).
								</div> -->

								<div class="row">
									<div class="space-6"></div>

									<div class="col-sm-7 infobox-container">
										
										<?php foreach ($number_summary as $num ) {?>
											
										

										<div class="infobox infobox-red">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-desktop"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo $num->NoPost_paid_and_unpaid; ?></span>
												<div class="infobox-content">Requests</div>
											</div>
										</div>

										<div class="infobox infobox-orange2">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-tag"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo $num->NoPost_Paid; ?></span>
												<div class="infobox-content">Payments</div>
											</div>

											
										</div>
										<div class="infobox infobox-green">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-tag"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo $num->NoPost_Retired; ?></span>
												<div class="infobox-content">Retired</div>
											</div>

											
										</div>


									 <?php }	?>

										<div class="space-6"></div>
										<?php
										$CI =& get_instance();
										 $CI->load->model('rate_model');
										//$this->load->model('rate_model');
										
                                         $paid_total=$retired=$unpaid=0;
                                         
										 foreach ($sum_summary as $key ) {
											
										$Currency=$key->Currency;
										$rate=$CI->rate_model->get_rate_percurrency($Currency);
										if ($Currency=='TZS') {
											$paid_total = $paid_total+ ($key->Post_paid_and_unpaid/$rate);
											$retired =$retired+ ($key->Post_Retired/$rate);
											$unpaid =$unpaid+ ($key->Post_Paid_only/$rate);
										} else  if ($Currency=='USD') {
											$paid_total =$paid_total+ $key->Post_paid_and_unpaid;
											$retired =$retired + $key->Post_Retired;
											$unpaid =$unpaid + $key->Post_Paid_only;

										}


									}


											?>

										<div class="infobox infobox-blue infobox-small infobox-dark">
											<div class="infobox-chart">
												<span class="sparkline" data-values="3,4,2,3,4,4,2,2"></span>
											</div>

											<div class="infobox-data">
												<div class="infobox-content">Paid(USD)</div>
												<div class="infobox-content"><?php echo round($paid_total,2); ?></div>
											</div>
										</div>

										<div class="infobox infobox-green infobox-small infobox-dark">
											<div class="infobox-progress">
												<div class="easy-pie-chart percentage" data-percent="<?php if ($paid_total !=0) echo round($retired/$paid_total)*100; else echo '0'; ?>" data-size="39">
													<span class="percent"><?php if ($paid_total !=0) echo round($retired/$paid_total)*100; else echo '0'; ?></span>%
												</div>
											</div>

											<div class="infobox-data">
												<div class="infobox-content">Retired </div>
												<div class="infobox-content"><?php echo round(($retired),2); ?></div>
											</div>
										</div>
										<div class="infobox infobox-red infobox-small infobox-dark">
											<div class="infobox-progress">
												<div class="easy-pie-chart percentage" data-percent="<?php if ($paid_total !=0) echo round(($unpaid/$paid_total)*100); else echo '0'; ?>" data-size="39">
													<span class="percent"><?php if ($paid_total !=0) echo round(($unpaid/$paid_total)*100); else echo '0'; ?></span>%
												</div>
											</div>

											<div class="infobox-data">
												<div class="infobox-content">UnRetired </div>
												<div class="infobox-content"><?php echo round(($unpaid),2); ?></div>
											</div>
										</div>
										<?php //} ?>

									</div>

									<div class="vspace-12-sm"></div>

                            <div class="col-sm-5">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-signal"></i>
													Quick Reports
												</h4>

												<div class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="ace-icon fa fa-chevron-up"></i>
													</a>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main padding-4">
													<!-- <div id="sales-charts"></div> -->
                                                   <div class="col-sm-4 pull-left">
                                                   	<div class="row">
																<div class="col-xs-8 label label-lg label-info arrowed-in arrowed-right">
																	<b><?php echo month_2_word(date('m')-1); ?></b>
																</div>
															</div>
														

															<div>
																<ul class="list-unstyled spaced">
																	<li>
																		<a style="text-decoration:none;" href="<?php echo base_url(); ?>Report/payments_lastmonth"><i class="ace-icon fa fa-caret-right blue"></i>Payments</a>
																	</li>

																	<li>
																		<a style="text-decoration:none;" href="<?php echo base_url(); ?>Report/payments_retired_lastmonth"><i class="ace-icon fa fa-caret-right red"></i>Un Retired</a>
																	</li>

																	<li>
																		<a style="text-decoration:none;" href="<?php echo base_url(); ?>Report/payments_unretired_lastmonth"><i class="ace-icon fa fa-caret-right green"></i>Retired</a>
																	</li>
																</ul>
															</div>
														</div><!-- /.col -->
														<div class="col-sm-4 pull-right">
															<div class="row">
																<div class="col-xs-8 label label-lg label-info arrowed-in arrowed-right">
																	<b><?php echo date('Y'); ?></b>
																</div>
															</div>

															<div>
																<ul class="list-unstyled spaced">
																	<li>
																		<a style="text-decoration:none;" href="<?php echo base_url(); ?>Report/payments_thisyear"><i class="ace-icon fa fa-caret-right blue"></i>Payments</a>
																	</li>

																	<li>
																		<a style="text-decoration:none;" href="<?php echo base_url(); ?>Report/payments_retired_thisyear"><i class="ace-icon fa fa-caret-right red"></i>Un Retired</a>
																	</li>

																	<li>
																		<a style="text-decoration:none;" href="<?php echo base_url(); ?>Report/payments_unretired_thisyear"><i class="ace-icon fa fa-caret-right green"></i>Retired</a>
																	</li>
																</ul>
															</div>
														</div><!-- /.col -->


												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
								</div><!-- /.row -->

								<div class="hr hr32 hr-dotted"></div>

								<div class="row">
									<div class="col-sm-5">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-star orange"></i>
													Top unretired
												</h4>

												<div class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="ace-icon fa fa-chevron-up"></i>
													</a>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Staff
																</th>

																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>Amount
																</th>

																<th class="hidden-480">
																	<i class="ace-icon fa fa-caret-right blue"></i>Due Days
																</th>
															</tr>
														</thead>

														<tbody>
															
                                                         <?php $days=0; $class=''; foreach ($top5_unretired as $top5row) {?>
                                                         	
                                                         
															<tr>
																<td><?php echo $top5row->EmploymentNo.'  '.$top5row->First_Name.' '.$top5row->Last_Name; ?></td>

																<td>
																	<b class="blue"><?php echo $top5row->Amount;  ?></b>
																</td>

																<td class="hidden-480">
																	<?php if (different_in_days_compare_today($top5row->EndDate) >= 0)
																	{ $days= different_in_days_compare_today($top5row->EndDate); $class='label-danger';} else { $days= '0'; $class="label-info"; } ?>
																	<span class="label <?php echo $class; ?> arrowed"><?php echo $days; ?></span>
																</td>
															</tr>
															<?php }?>

														</tbody>
													</table>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
									<div class="col-sm-7">
										<div class="widget-box">
											<div class="widget-header widget-header-flat widget-header-small">
												<h5 class="widget-title">
													<i class="ace-icon fa fa-signal"></i>
													% Retirement Ratio 
												</h5>


											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div id="piechart-placeholder"></div>

													<div class="hr hr8 hr-double"></div>

													
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->

									
								</div><!-- /.row -->

								<div class="hr hr32 hr-dotted"></div>



								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">&copy; 2018 Mifumotz Technologies Ltd </span>
							
						</span>

						&nbsp; &nbsp;
						<!-- <span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span> -->
					</div>
				</div>
			</div>
			<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url(); ?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="<?php echo base_url(); ?>assets/js/jquery-ui.custom.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.easypiechart.min.js"></script>
	 	<script src="<?php echo base_url(); ?>assets/js/jquery.sparkline.index.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.flot.min.js"></script> 
		<script src="<?php echo base_url(); ?>assets/js/jquery.flot.pie.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.flot.resize.min.js"></script> 

		<!-- ace scripts -->
		<script src="<?php echo base_url(); ?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: ace.vars['old_ie'] ? false : 1000,
						size: size
					});
				})
			
				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html',
									 {
										tagValuesAttribute:'data-values',
										type: 'bar',
										barColor: barColor ,
										chartRangeMin:$(this).data('min') || 0
									 });
				});
			
			
			  //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
			  //but sometimes it brings up errors with normal resize event handlers
			  $.resize.throttleWindow = false;
			
			  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
			  <?php foreach ($piechart as $pie) { $total=$pie->Post_paid_and_unpaid;  $paidonly=$pie->Post_Paid_only; $retired=$pie->Post_Retired;   }   ?>
			  	
			  
				{ label: "Retired",  data: <?php echo round($retired/$total,2); ?>, color: "#006400"},
				
				
				{ label: "UnRetired",  data: <?php echo round( $paidonly/$total,2); ?>, color: "#DA5430"}

				
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne", 
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);
			
			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);
			
			
			  //pie chart tooltip example
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			
			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
			
				/////////////////////////////////////
				$(document).one('ajaxloadstart.page', function(e) {
					$tooltip.remove();
				});
			
			
			
			
				var d1 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d1.push([i, Math.sin(i)]);
				}
			
				var d2 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d2.push([i, Math.cos(i)]);
				}
			
				var d3 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.2) {
					d3.push([i, Math.tan(i)]);
				}
				
			
				var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
				$.plot("#sales-charts", [
					{ label: "Domains", data: d1 },
					{ label: "Hosting", data: d2 },
					{ label: "Services", data: d3 }
				], {
					hoverable: true,
					shadowSize: 0,
					series: {
						lines: { show: true },
						points: { show: true }
					},
					xaxis: {
						tickLength: 0
					},
					yaxis: {
						ticks: 10,
						min: -2,
						max: 2,
						tickDecimals: 3
					},
					grid: {
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						borderColor:'#555'
					}
				});
			
			
				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			
			
				$('.dialogs,.comments').ace_scroll({
					size: 300
			    });
				
				
				//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				//so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if(ace.vars['touch'] && ace.vars['android']) {
				  $('#tasks').on('touchstart', function(e){
					var li = $(e.target).closest('#tasks li');
					if(li.length == 0)return;
					var label = li.find('label.inline').get(0);
					if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
				  });
				}
			
				$('#tasks').sortable({
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'draggable-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					stop: function( event, ui ) {
						//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
						$(ui.item).css('z-index', 'auto');
					}
					}
				);
				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});
			
			
				//show the dropdowns on top or bottom depending on window height and menu position
				$('#task-tab .dropdown-hover').on('mouseenter', function(e) {
					var offset = $(this).offset();
			
					var $w = $(window)
					if (offset.top > $w.scrollTop() + $w.innerHeight() - 100) 
						$(this).addClass('dropup');
					else $(this).removeClass('dropup');
				});
			
			})
		</script>
	</body>
</html>
