<?php $template = $this->templates->theme();?>
<?php echo $this->load->view('backend/'.$template.'/header');?>

<body class="navbar-top">

	<!-- Main navbar -->
	<?php echo $this->load->view('backend/'.$template.'/navbar');?>
	
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<?php $sidebar = $this->templates->sidebar(); ?>
			<?php echo $this->load->view('backend/'.$template.'/sidebar/'.$sidebar.'');?>
			
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="breadcrumb-line breadcrumb-line-component" style="margin-top: 15px; margin-bottom: 20px;">
						<ul class="breadcrumb">
							<li><a href="<?php echo base_url();?>"><i class="icon-home2 position-left"></i> Home</a></li>
							<li><a href="#"><?php echo $title;?></a></li>
						</ul>

						<ul class="breadcrumb-elements">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="icon-gear position-left"></i>
									Settings
									<span class="caret"></span>
								</a>

								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="<?php echo base_url('main/logout') ?>"><i class="icon-user-lock"></i> Logout</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">
					
					<?php echo $this->load->view(''.$view.'');?>

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
	<div class="navbar navbar-default navbar-fixed-bottom">
		<ul class="nav navbar-nav no-border visible-xs-block">
			<li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second"><i class="icon-circle-up2"></i></a></li>
		</ul>

		<div class="navbar-collapse collapse" id="navbar-second">
			<div class="navbar-text">
				&copy; 2019. <a href="#">DEMO APLIKASI MANAJEMEN ASSET</a> by <a href="#">VOSP</a>
			</div>

			<div class="navbar-right">
				<ul class="nav navbar-nav">
					<li><a href="#">Tentang Kami</a></li>
					<li><a href="#">Policy</a></li>
					
				</ul>
			</div>
		</div>
	</div>
</body>
</html>
