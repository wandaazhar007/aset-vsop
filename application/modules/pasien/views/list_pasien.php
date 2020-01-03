<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/datatables/extensions/buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/pages/datatables_extension_buttons_init.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/pages/form_layouts.js"></script>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">List Data Pasien</h5>
		<div class="heading-elements">
			<ul class="icons-list">
				<li><a data-action="collapse"></a></li>
				<li><a data-action="reload"></a></li>
				<li><a data-action="close"></a></li>
			</ul>
		</div>
	</div>
	<table class="table datatables-lists">
		<thead>
			<tr>
				<th>No</th>
				<th></th>
				<th>No RM</th>
				<th>Nama Pasien</th>
				<th>Jenis Kelamin</th>
				<th>Tanggal Lahir</th>
				<th>Alamat</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				if(!empty($pasien))
				{

					$no = 1;
					foreach($pasien as $u)
					{ 
			?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><img src="<?php echo base_url(); ?>assets/images/user.jpg" alt="" style="width:100px; height:100px"></td>
				<td><?php echo $u->no_rm ?></td>
				<td><?php echo $u->nama_pasien ?></td>
				<td><?php echo $u->jenis_kelamin ?></td>
				<td><?php echo $this->utilities->tanggal($u->tanggal_lahir); ?></td>
				<td><?php echo $u->alamat ?></td>
				<td class="text-center">
					<ul class="icons-list">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-menu9"></i>
							</a>

							<ul class="dropdown-menu dropdown-menu-right">
								<li><a href="<?php echo base_url();?>pasien/detail/<?php echo $u->id_pasien;?>">Edit</a>
								</li>
								
								<li class="view_data" id="<?php echo $u->id_pasien; ?>"><a href="#">Edit Modal</a>
								</li>
								<li><a onClick="return confirm('Apakah Anda yakin ingin Menghapus Data Pasien Ini ?')" href="<?php echo base_url();?>pasien/delete/<?php echo $u->id_pasien;?>">Delete</a>
								</li>
							</ul>
						</li>
					</ul>
				</td>
			</tr>
			<?php }}?>                
		</tbody>
	</table>
</div>
