<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/datatables/extensions/buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/pages/datatables_extension_buttons_init.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/pages/form_layouts.js"></script>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">List Master Tindakan Dokter</h5>
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
				<th>Nama Tindakan</th>
				<th>Harga</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				if(!empty($allTindakan))
				{
					$no = 1;
					foreach($allTindakan as $t)
					{ 
			?>
			<tr>
				<td><?php echo $no++ ;?></td>
				<td><?php echo $t->nama_tindakan ;?></td>
				<td><?php echo $this->utilities->rupiah($t->harga_tindakan) ;?></td>
				<td class="text-center">
					<ul class="icons-list">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-menu9"></i>
							</a>

							<ul class="dropdown-menu dropdown-menu-right">
								<li><a href="<?php echo base_url();?>masters/tindakan_dokter/detail/<?php echo $t->id_tindakan_master;?>">Edit</a>
								</li>
								<li><a onClick="return confirm('Apakah Anda yakin ingin Menghapus Data Tindakan Ini ?')" href="<?php echo base_url();?>masters/tindakan_dokter/delete/<?php echo $t->id_tindakan_master;?>">Delete</a>
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

<!--Modal-->
<div id="modal_tindakan_dokter" class="modal fade" style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h5 class="modal-title">Tambah Tindakan Dokter</h5>
			</div>

			<form action="#" id="tindakan-dokter" class="form-horizontal">
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label col-sm-3">Nama Tindakan</label>
						<div class="col-sm-9">
							<input type="text" name="nama_tindakan" id="nama_tindakan" class="form-control">
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-3">Harga Tindakan</label>
						<div class="col-sm-9">
							<input type="text" name="harga_tindakan" id="harga_tindakan" class="form-control">
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
			buttons: [
				{
					text: '<i class="icon-plus-circle2"></i>  Tindakan',
					className: 'btn bg-success-400',
					action: function(e, dt, node, config) {
						$('#modal_tindakan_dokter').modal('show');
					}
				}
			]
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
		var form = $('#tindakan-dokter');
		$("#submit-form").click(function(e){
			e.preventDefault();
			Swal.fire({   
			title: "Apakah Data Tindakan Dokter Sudah Benar ?",   
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
					url: '<?php echo base_url();?>masters/tindakan_dokter/save',
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
								var url_redir = notif.redirect;
								Swal.fire({   
								title: title,   
								text: message,   
								type: "success",   
								showCancelButton: false,   
								confirmButtonColor: "#66BB6A",   
								confirmButtonText: "Ok"
								}).then(function(){
								  location.reload();
								});
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