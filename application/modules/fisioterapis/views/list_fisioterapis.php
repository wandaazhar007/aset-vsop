<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/datatables/extensions/buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/pages/datatables_extension_buttons_init.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/pages/form_layouts.js"></script>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">List Fisioterapis</h5>
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
				<th>Nama Fisioterapis</th>
				<th>No Handphone</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				if(!empty($fisioterapis))
				{

					$no = 1;
					foreach($fisioterapis as $u)
					{ 
			?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $u->nama_petugas ?></td>
				<td><?php echo $u->no_hp ?></td>
				<td class="text-center">
					<ul class="icons-list">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-menu9"></i>
							</a>

							<ul class="dropdown-menu dropdown-menu-right">
								<li><a href="<?php echo base_url();?>fisioterapis/detail/<?php echo $u->id_petugas;?>">Edit</a>
								</li>
								<li><a href="<?php echo base_url();?>fisioterapis/delete/<?php echo $u->id_petugas;?>">Delete</a>
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
<div id="modal_form_fisioterapis" class="modal fade" style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h5 class="modal-title">Tambah Data Fisioterapis</h5>
			</div>

			<form role="form" action="#" id="form-fisioterapis" method="post" class="form-horizontal">
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label col-sm-3">Nama Petugas Medis</label>
						<div class="col-sm-9">
							<input type="text" name="nama_petugas" id="nama_petugas" class="form-control">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-3 control-label">Jenis Petugas Medis</label>
						<div class="col-lg-9">
							<select name="id_petugas_jenis" data-placeholder="Pilih Jenis Petugas Medis" class="select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
								<option></option>
								<?php
											$jenis = $this->utilities->selectQuery("SELECT * FROM `tb_petugas_jenis`", 'id_petugas_jenis', 'nama');
											if(!empty($jenis))
											{
												foreach($jenis as $jenis)
												{
													echo $jenis;	
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
							<span class="help-block">name@domain.com</span>
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
					<button type="submit" class="btn btn-primary legitRipple" id="submit-form">Submit form</button>
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
						className: 'btn btn-default'
						
					}
				},
				buttons: [
					{
					text: '<data-toggle="modal" data-target="#modal_form_fisioterapis"> <i class="icon-plus-circle2"></i> Tambah fisioterapis ',
					className: 'btn bg-primary-400',
						action: function(e, dt, node, config) {
						$('#modal_form_fisioterapis').modal('show');
					}
				}
				]
			}
		});
		
		$('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');
		$('.dataTables_length select').select2({
			minimumResultsForSearch: Infinity,
			width: 'auto'
		});
	});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		var form = $('#form-fisioterapis');
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
					url: '<?php echo base_url();?>fisioterapis/save',
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