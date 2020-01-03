<?php $nama_lengkap = $this->datamapper->rowData('tb_login', 'nama_lengkap', 'id', $this->session->userdata('id'));?>
<?php $gambar_profile =  $this->datamapper->rowData('tb_login', 'foto', 'id', $this->session->userdata('id'));?>
<div class="sidebar sidebar-main sidebar-fixed">
	<div class="sidebar-content">

		<!-- User menu -->
		<div class="sidebar-user-material">
			<div class="category-content">
				<div class="sidebar-user-material-content">
					<a href="#"><img src="<?php echo base_url($gambar_profile);?>" class="img-circle img-responsive" alt=""></a>
						
					<h6>Hai! <?php echo $nama_lengkap;?></h6>
					<span class="text-size-small">Selamat datang</span>
				</div>

				<div class="sidebar-user-material-menu">
					<a href="#user-nav" data-toggle="collapse"><span>My account</span> <i class="caret"></i></a>
				</div>
			</div>

			<div class="navigation-wrapper collapse" id="user-nav">
				<ul class="navigation">
					<li><a href="<?php echo base_url('main/profile');?>"><i class="icon-user-plus"></i> <span>My profile</span></a></li>
					<li><a href="<?php echo base_url('main/logout');?>"><i class="icon-switch2"></i> <span>Logout</span></a></li>
				</ul>
			</div>
		</div>
		<!-- /user menu -->


		<!-- Main navigation -->
		<div class="sidebar-category sidebar-category-visible">
			<div class="category-content no-padding">
				<ul class="navigation navigation-main navigation-accordion">

					<!-- Main -->
					<li><a href="<?php echo base_url();?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
					<!-- /main -->

					<!-- Forms -->
					<li class="navigation-header"><span>Modul Aset</span> <i class="icon-menu" title="Forms"></i></li>
					<li><a href="<?php echo base_url('aset');?>"><i class="icon-user-tie"></i> <span>Data Aset</span></a></li>
					<li><a href="<?php //echo base_url('registrasi');?>"><i class="icon-pen-plus"></i> <span>Data Alkes</span></a></li>
					<li><a href="<?php //echo base_url('tindakan');?>"><i class="icon-aid-kit"></i> <span>Alkes</span></a></li>
					<li><a href="<?php //echo base_url('kasir');?>"><i class="icon-coins"></i> <span>Kategori</span></a></li>
					<li><a href="<?php //echo base_url('laporan');?>"><i class="icon-printer"></i> <span>Laporan</span></a></li>
					
					<li class="navigation-header"><span>Master Data</span> <i class="icon-menu" title="Forms"></i></li>
					
					<li>
						<a href="#"><i class="icon-user-plus"></i> <span>Data Supplier</span></a>
						<ul>
							<li><a href="<?php echo base_url('supplier');?>"><i class="icon-brain"></i> <span>Nama Supplier</span></a></li>
						</ul>
					</li>
					
					<li>
						<a href="#"><i class="icon-user-plus"></i> <span>Data Instalasi</span></a>
						<ul>
							<li><a href="<?php echo base_url('instalasi');?>"><i class="icon-brain"></i> <span>Nama Instalasi</span></a></li>
						</ul>
					</li>
					
					<li>
						<a href="#"><i class="icon-home4"></i> <span>Data Ruangan</span></a>
						<ul>
							<li><a href="<?php echo base_url('ruangan');?>">Nama Ruangan</a></li>
						</ul>
					</li>
					
					<li>
						<a href="#"><i class="icon-users"></i> <span>Data User</span></a>
						<ul>
							<li><a href="<?php echo base_url('users');?>"><i class="icon-user-plus"></i><span>User</span></a></li>
							<li><a href="<?php echo base_url('users/groups');?>"><i class="icon-users4"></i><span>Hak Akses</span></a></li>
						</ul>
					</li>
					<li><a href="<?php echo base_url('option');?>"><i class="icon-gear"></i> <span>Options</span></a></li>
					<li><a href="<?php echo base_url('option');?>"><i class="icon-cog"></i><span>Option</span></a></li>
					
					<!-- /page kits -->

				</ul>
			</div>
		</div>
		<!-- /main navigation -->

	</div>
</div>