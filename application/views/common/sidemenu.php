

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa "></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa "></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa "></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa "></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
				
					<li class="">
						<a href="<?php echo base_url(); ?>home">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>
					<?php $CI =& get_instance();
                         $CI->load->model('welcome_model');
                         ?>
					<?php if($CI->welcome_model->check_if_is_employee_only($this->session->userdata['logged_in']['id']) >0){ ?>
					<li class="<?php if ( $this->uri->segment(1)=='employee_statuscheck') echo 'active open';?>">
						<a  class="dropdown-toggle  ">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Requests Status
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							
							

							
							<li class="<?php if (( $this->uri->segment(2)=='request_status')) echo 'active';?>">

								<a href="<?php echo  site_url('employee_statuscheck/request_status'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Request Status
								</a>
								

								<b class="arrow"></b>
							</li>

							
						</ul>
					</li>
					<?php } 
                    else {
					?>
					<?php if($this->session->userdata['logged_in']['Cashier_Role']==1){ ?>
					<li class="<?php if ( $this->uri->segment(1)=='post') echo 'active open';?>">
						<a  class="dropdown-toggle  ">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Requests
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							
							

							
							<li class="<?php if (( $this->uri->segment(2)=='approved')) echo 'active';?>">

								<a href="<?php echo  site_url('post/approved'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Approved 
								</a>
								

								<b class="arrow"></b>
							</li>
							
						</ul>
					</li>
					<?php } ?>
                   <?php if($this->session->userdata['logged_in']['Finance_Officer_Role']==1){ ?>
					<li class="<?php if ( $this->uri->segment(1)=='post') echo 'active open';?>">
						<a href="" class="dropdown-toggle  ">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Requests
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="<?php if ( $this->uri->segment(2)=='newpost') echo 'active'; ?>">
								<a href="<?php echo  site_url('post/newpost'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									New Requests
								</a>

								<b class="arrow"></b>
							</li>
							

							
							<li class="<?php if (( $this->uri->segment(2)=='approved')) echo 'active';?>">

								<a href="<?php echo  site_url('post/approved'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Approved 
								</a>
								

								<b class="arrow"></b>
							</li>
							<li class="<?php if (( $this->uri->segment(2)=='paid')) echo 'active';?>">

								<a href="<?php echo  site_url('post/paid'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Paid 
								</a>
								

								<b class="arrow"></b>
							</li>
							<li class="<?php if (( $this->uri->segment(2)=='rejectedposts')) echo 'active';?>">

								<a href="<?php echo  site_url('post/rejectedposts'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Rejected 
								</a>
								

								<b class="arrow"></b>
							</li>
							<li class="<?php if (( $this->uri->segment(1)=='post')&& ($this->uri->segment(2)=='')) echo 'active';?>">

								<a href="<?php echo  site_url('post'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Requests Status
								</a>
								

								<b class="arrow"></b>
							</li>
							


						</ul>
					</li>
					<?php } ?>
	
					<?php if($this->session->userdata['logged_in']['Senior_Finance_Role']==1){ ?>
					<li class="<?php if ( $this->uri->segment(1)=='senior_finance_post') echo 'active open';?>">
						<a href="" class="dropdown-toggle  ">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Requests
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							

							<li class="<?php if (( $this->uri->segment(1)=='senior_finance_post')&& ($this->uri->segment(2)=='')) echo 'active';?>">

								<a href="<?php echo  site_url('senior_finance_post'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Requests Status
								</a>
								

								<b class="arrow"></b>
							</li>
							<li class="<?php if (( $this->uri->segment(2)=='rejectedposts')) echo 'active';?>">

								<a href="<?php echo  site_url('senior_finance_post/rejectedposts'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Rejected
								</a>
								

								<b class="arrow"></b>
							</li>
							


						</ul>
					</li>
					<?php }?>
					<?php if($this->session->userdata['logged_in']['Head_Finance_Role']==1){ ?>
					<li class="<?php if ( $this->uri->segment(1)=='head_finance_post') echo 'active open';?>">
						<a href="" class="dropdown-toggle  ">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Request
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							

							<li class="<?php if (( $this->uri->segment(1)=='head_finance_post')&& ($this->uri->segment(2)=='')) echo 'active';?>">

								<a href="<?php echo  site_url('head_finance_post'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Requests Status
								</a>
								

								<b class="arrow"></b>
							</li>
							<li class="<?php if (( $this->uri->segment(2)=='rejectedposts')) echo 'active';?>">

								<a href="<?php echo  site_url('head_finance_post/rejectedposts'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Rejected 
								</a>
								

								<b class="arrow"></b>
							</li>
							


						</ul>
					</li>
                   <?php }?>
                   <li class="<?php if ( $this->uri->segment(1)=='payment') echo 'active open';?>">
						<a href="r" class="dropdown-toggle">
							<i class="menu-icon fa fa-tag"></i>
							<span class="menu-text"> Payments </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="<?php if ( $this->uri->segment(2)=='paid_post') echo 'active';?>">
								<a href="<?php echo base_url();?>payment/paid_post">
									<i class="menu-icon fa fa-caret-right"></i>
									Payments 
								</a>

								<b class="arrow"></b>
							</li>
							<li class="<?php if ( $this->uri->segment(2)=='retired_list') echo 'active';?>">
								<a href="<?php echo base_url();?>payment/retired_list">
									<i class="menu-icon fa fa-caret-right"></i>
									Retirements 
								</a>

								<b class="arrow"></b>
							</li>
							<li class="<?php if ( $this->uri->segment(2)=='retired_approvedlist') echo 'active';?>">
								<a href="<?php echo base_url();?>payment/retired_approvedlist">
									<i class="menu-icon fa fa-caret-right"></i>
									Approved Retirements
								</a>

								<b class="arrow"></b>
							</li>
							<li class="<?php if ( $this->uri->segment(2)=='retired_rejectedlist') echo 'active';?>">
								<a href="<?php echo base_url();?>payment/retired_rejectedlist">
									<i class="menu-icon fa fa-caret-right"></i>
									Rejected Retirements
								</a>

								<b class="arrow"></b>
							</li>
							<li class="<?php if ( $this->uri->segment(2)=='retired_closedlist') echo 'active';?>">
								<a href="<?php echo base_url();?>payment/retired_closedlist">
									<i class="menu-icon fa fa-caret-right"></i>
									Closed Retirements
								</a>

								<b class="arrow"></b>
							</li>
							

<!-- 							<li class="">
								<a href="inbox.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Pay in
								</a>

								<b class="arrow"></b>
							</li -->
							<!-- <li class="<?php if ( $this->uri->segment(2)=='rate') echo 'active';?>">
								<a href="<?php echo base_url(); ?>payment/rate">
									<i class="menu-icon fa fa-caret-right"></i>
									Rate
								</a>

								<b class="arrow"></b>
							</li> -->

							
						</ul>
					</li>
                   	<li class="<?php if ( $this->uri->segment(1)=='report') echo 'active open';?>">
						<a href="nn" class="dropdown-toggle">
							<i class="menu-icon fa fa-bars"></i>
							<span class="menu-text"> Reports </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="<?php if (( $this->uri->segment(1)=='report')&& ($this->uri->segment(2)=='')) echo 'active';?>">
								<a href="<?php echo site_url('report'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									All payments
								</a>

								<b class="arrow"></b>
							</li>
							<li class="<?php if (( $this->uri->segment(2)=='report_by_person')) echo 'active';?>">
								<a href="<?php echo site_url('report/report_by_person'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Report by Reserved
								</a>

								<b class="arrow"></b>
							</li>
							<li class="<?php if (( $this->uri->segment(2)=='report_by_account')) echo 'active';?>">
								<a href="<?php echo site_url('report/report_by_account'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Report by Account
								</a>

								<b class="arrow"></b>
							</li>
							<li class="<?php if (( $this->uri->segment(2)=='report_by_center')) echo 'active';?>">
								<a href="<?php echo site_url('report/report_by_center'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Report by Center
								</a>

								<b class="arrow"></b>
							</li>
							<li class="<?php if (( $this->uri->segment(2)=='report_by_status')) echo 'active';?>">
								<a href="<?php echo site_url('report/report_by_status'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Report by Status
								</a>

								<b class="arrow"></b>
							</li>

							
							
<!-- 
							<li class="<?php if ( $this->uri->segment(2)=='thisweek') echo 'active';?>">
								<a href="<?php ECHO site_url('report/thisweek'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									This Week
								</a>

								<b class="arrow"></b>
							</li>
							<li class="<?php if ( $this->uri->segment(2)=='lastweek') echo 'active';?>">
								<a href="<?php ECHO site_url('report/lastweek'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Last Week
								</a>

								<b class="arrow"></b>
							</li>
							<li class="<?php if ( $this->uri->segment(2)=='thismonth') echo 'active';?>">
								<a href="<?php ECHO site_url('report/thismonth'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									This Month
								</a>

								<b class="arrow"></b>
							</li> -->

							
						</ul>
					</li>
                   <?php if (($this->session->userdata['logged_in']['Senior_Finance_Role']==1) || ($this->session->userdata['logged_in']['Finance_Officer_Role']==1)){ ?>
					<li class="<?php if ( $this->uri->segment(1)=='employee') echo 'active open';?>">
						<a href="" class="dropdown-toggle">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text"> Employee</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							 <?php if ($this->session->userdata['logged_in']['Finance_Officer_Role']==1){ ?>
							<li class="<?php if ( $this->uri->segment(2)=='newemployee') echo 'active';?>">
								<a href="<?php echo site_url('employee/newemployee'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									New Employee
								</a>

								<b class="arrow"></b>
							</li>
							<?php }?>
							<li class="<?php if (( $this->uri->segment(1)=='employee')&& ($this->uri->segment(2)=='')) echo 'active';?>">
								<a href="<?php echo site_url('employee'); ?>">
									
									<i class="menu-icon fa fa-caret-right"></i>
									Active
								</a>

								<b class="arrow"></b>
							</li>
							<li class="<?php if (( $this->uri->segment(1)=='employee')&& ($this->uri->segment(2)=='inactive_employee')) echo 'active';?>">
								<a href="<?php echo site_url('employee/inactive_employee'); ?>">
									
									<i class="menu-icon fa fa-caret-right"></i>
									Inactive
								</a>

								<b class="arrow"></b>
							</li>
							<li class="<?php if (( $this->uri->segment(1)=='employee')&& ($this->uri->segment(2)=='rejected_employee')) echo 'active';?>">
								<a href="<?php echo site_url('employee/rejected_employee'); ?>">
									
									<i class="menu-icon fa fa-caret-right"></i>
									Rejected
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>

					<li class="<?php if ( $this->uri->segment(1)=='center') echo 'active open';?>">
						<a href="nn" class="dropdown-toggle">
							<i class="menu-icon fa fa-ticket"></i>
							<span class="menu-text">Cost Center </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							 <?php if ($this->session->userdata['logged_in']['Finance_Officer_Role']==1){ ?>
							<li class="<?php if ( $this->uri->segment(2)=='newcenter') echo 'active';?>">
								<a href="<?php ECHO site_url('center/newcenter'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									New Cost Center
								</a>

								<b class="arrow"></b>
							</li>
							<?php }?>
							<li class="<?php if (( $this->uri->segment(1)=='center')&& ($this->uri->segment(2)=='')) echo 'active';?>">
								<a href="<?php echo site_url('center'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Cost Center list
								</a>

								<b class="arrow"></b>
							</li>
                          

							
						</ul>
					</li>
					<li class="<?php if ( $this->uri->segment(1)=='account') echo 'active open';?>">
						<a href="d" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Accounts </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
                           <?php if ($this->session->userdata['logged_in']['Finance_Officer_Role']==1){ ?>
							<li class="<?php if ( $this->uri->segment(2)=='newaccount') echo 'active';?>">
								<a href="<?php echo site_url('account/newaccount'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									New Account
								</a>

								<b class="arrow"></b>
							</li>
							<?php }?>
							<li class="<?php if (( $this->uri->segment(1)=='account')&& ($this->uri->segment(2)=='')) echo 'active';?>">
								<a href="<?php echo site_url('account'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Account
								</a>

								<b class="arrow"></b>
							</li>

							

							
						</ul>
					</li>
					<li class="<?php if ( $this->uri->segment(1)=='banks') echo 'active open';?>">
						<a href="d" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Banks </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
                           <?php if ($this->session->userdata['logged_in']['Finance_Officer_Role']==1){ ?>
							<li class="<?php if ( $this->uri->segment(2)=='newbank') echo 'active';?>">
								<a href="<?php echo site_url('banks/newbank'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									New Banks
								</a>

								<b class="arrow"></b>
							</li>
							<?php }?>
							<li class="<?php if (( $this->uri->segment(1)=='banks')&& ($this->uri->segment(2)=='')) echo 'active';?>">
								<a href="<?php echo site_url('account'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Banks
								</a>

								<b class="arrow"></b>
							</li>

							

							
						</ul>
					</li>
					<li class="<?php if ( $this->uri->segment(2)=='rate') echo 'active open';?>">
						<a href="d" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Rate </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="<?php if (( $this->uri->segment(2)=='rate')&& ($this->uri->segment(2)=='rate')) echo 'active';?>">
								<a href="<?php echo site_url('payment/rate'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Rate
								</a>

								<b class="arrow"></b>
							</li>

							
						</ul>
					</li>

					
					<?php }} ?>
					<li>
					<a href="<?php echo base_url(); ?>welcome/logout">
									<i class="menu-icon fa fa-sign-out"></i>
									Sign Out
								</a> 
					</li>

				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>
