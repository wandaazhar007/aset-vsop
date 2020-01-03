<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/datatables/extensions/buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/pages/datatables_extension_buttons_init.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/pages/form_layouts.js"></script>

<style>
	.btn {
    padding: 8px 18px;
    border: 0 none;
    font-weight: 300;
    letter-spacing: 1px;
/*    text-transform: uppercase;*/
}
 
.btn:focus, .btn:active:focus, .btn.active:focus {
    outline: 0 none;
}
 
.btn-primary {
    background: #009999;
    color: #ffffff;
}
 
.btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .open > .dropdown-toggle.btn-primary {
    background: #33a6cc;
}
 
.btn-primary:active, .btn-primary.active {
    background: #007299;
    box-shadow: none;
}
</style>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">List Users</h5>
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
				<th>Username</th>
				<th>Nama</th>
				<th>Jabatan</th>
				<th>Email</th>
				<!--<th>Tanggal Input</th>-->
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				if(!empty($user))
				{

					$no = 1;
					foreach($user as $u)
					{ 
			?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $u->username?></td>
				<td><?php echo $u->nama_lengkap?></td>

				<td><?php echo $this->datamapper->rowData('tb_group','nama_group','id_group', $u->group);?></td>
				<td><?php echo $u->email?></td>
				<?php /*?><td><?php echo $u->tgl_input?></td><?php */?>
				<td><?php echo $this->utilities->cekStatusAdmin($u->status)?></td>
				<td class="text-center">
					<ul class="icons-list">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-menu9"></i>
							</a>

							<ul class="dropdown-menu dropdown-menu-right">
								<li><a href="<?php echo base_url();?>users/detail/<?php echo $u->id;?>">Edit</a>
								</li>
								<li><a onClick="return confirm('Apakah Anda yakin ingin Menghapus Data User Ini ?')" href="<?php echo base_url();?>users/delete/<?php echo $u->id;?>">Delete</a>
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

<div id="modal_form_users" class="modal fade" style="display: none;">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header bg-teal">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h5 class="modal-title">Tambah Data User</h5>
			</div>

			<form role="form" action="#" id="form-users" method="post" class="form-horizontal">
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label col-sm-3">Username</label>
						<div class="col-sm-9">
							<input type="text" id="username" name="username" class="form-control">
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-3">Password</label>
						<div class="col-sm-9">
							<input type="password" name="password" id="password" class="form-control">
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-3">Nama Lengkap</label>
						<div class="col-sm-9">
							<input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-3 control-label">Jabatan</label>
						<div class="col-lg-9">
							<select name="group" data-placeholder="Pilih Jabatan" class="select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
								<option></option>
								<?php
											$group = $this->utilities->selectQuery("SELECT * FROM `tb_group`", 'id_group', 'nama_group');
											if(!empty($group))
											{
												foreach($group as $gp)
												{
													echo $gp;	
												}
											}
										?>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-3">No Handphone</label>
						<div class="col-sm-9">
							<input type="text" name="no_hp" id="no_hp" class="form-control">
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-3">Email</label>
						<div class="col-sm-9">
							<input type="text" name="email" id="email" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3">Alamat</label>
						<div class="col-sm-9">
							<input type="text" name="alamat" id="alamat" class="form-control">
						</div>
					</div>

				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-link legitRipple" data-dismiss="modal">Close<span class="legitRipple-ripple" style="left: 54.223%; top: 26.3158%; transform: translate3d(-50%, -50%, 0px); width: 224.828%; opacity: 0;"></span></button>
					<button type="submit" class="btn btn-primary" id="submit-form"><i class="glyphicon glyphicon-saved"></i>&nbsp;Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$.extend( $.fn.dataTable.defaults, {
			autoWidth: false,
			dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
			language: {
				search: '<span>Filter:</span> _INPUT_',
				lengthMenu: '<span>Show:</span> _MENU_',
				paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
			}
		});
		
		$('.datatables-lists').DataTable({
			buttons: {
				dom: {
					button: {
						className: 'btn btn-teal'
						
					}
				},
				buttons: [
					{extend: 'copy'},
					{extend: 'csv'},
					{extend: 'excel'},
					{extend: 'pdf'},
					{extend: 'print'},
					{text: '<data-toggle="modal" data-target="#modal_form_usersn"> <i class="icon-plus-circle2"></i> Tambah User ',
					className: 'btn bg-teal-400',
						action: function(e, dt, node, config) {
						$('#modal_form_users').modal('show');
					}
				}
				]
			}
		});
		
		$('.dataTables_filter input[type=search]').attr('placeholder','Cari Nama User...');
		$('.dataTables_length select').select2({
			minimumResultsForSearch: Infinity,
			width: 'auto'
		});
	});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		var form = $('#form-users');
		$("#submit-form").click(function(e){
			e.preventDefault();
			Swal.fire({   
			title: "Apakah Data Sudah Benar ?",   
			text: "Pastikan data yang anda cantumkan sudah sesuai!",   
			type: "warning",   
			showCancelButton: true,   
			confirmButtonColor: "#DD6B55",   
			confirmButtonText: "Yes",   
			cancelButtonText: "No, cancel plx!",
			}).then((result) => {
			  if (result.value) {
				$.ajax({
					type: 'post',
					url: '<?php echo base_url();?>users/save',
					data: form.serialize(),
					error: function () {
						Swal.fire("Gagal !!!", "Terjadi Kesalahan Mengirim data ke Server :)", "error");
					},
					success: function (response) {
						var notif = $.parseJSON(response);
//						var notif = $.stringify(response);
						var title = notif.title;
						var message = notif.message;
						if(notif.status == 0)
							{
								Swal.fire({   
								title: title,   
								text: message,   
								type: "error",   
								showCancelButton: false,   
								confirmButtonColor: "#DD6B55",   
								confirmButtonText: "Ok"
								})
							}
						else
							{
								Swal.fire(title, message, "success");
							}
					}
				});
			  }else {     
					Swal.fire("Cancelled", "Registrasi anda Telah di Batalkan", "error");   
				} 
			})

		});
	});	
</script>