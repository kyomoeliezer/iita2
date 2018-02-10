
	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							IITA ATM
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="grey dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-tasks"></i>
								<span class="badge badge-grey"></span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<!-- <li class="dropdown-header">
									<i class="ace-icon fa fa-check"></i>
									4 Tasks to complete
								</li> -->

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<li>
											<a href="#">
												<!-- <div class="clearfix">
													<span class="pull-left">Retirements</span>
													<span class="pull-right">65%</span>
												</div> -->

												<!-- <div class="progress progress-mini">
													<div style="width:65%" class="progress-bar"></div>
												</div> -->
											</a>
										</li>

										<li>
											<a href="#">
												<!-- <div class="clearfix">
													<span class="pull-left">Posts</span>
													<span class="pull-right">35%</span>
												</div> -->

												<!-- <div class="progress progress-mini">
													<div style="width:35%" class="progress-bar progress-bar-danger"></div>
												</div> -->
											</a>
										</li>




									</ul>
								</li>

							
							</ul>
						</li>

						<li class="purple dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<span class="badge badge-important"></span>
							</a>



						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<!-- <img class="nav-user-photo" src="<?php echo base_url(); ?>assets/images/avatars/user.jpg" alt="Jason's Photo" /> -->
								<span class="user-info">
									<small>Welcome! </small>
									<?php
									$email=$this->session->userdata['logged_in']['email'];
                                    $email=explode('@',$email);
                                    $user=$email[0];
                                    echo $user;
									?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<!-- <li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="profile.html">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li> -->

								<li class="divider"></li>

								<li>
									<a href="<?php echo site_url('welcome/logout'); ?>">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>