<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/datatables/extensions/buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/pages/datatables_extension_buttons_init.js"></script>

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
		 <h5 class="panel-title"><?php echo $title ?></h5>
		<div class="heading-elements">
			<ul class="icons-list">
				<li><a data-action="collapse"></a></li>
				<li><a data-action="reload"></a></li>
				<li><a data-action="close"></a></li>
			</ul>
		</div>
	</div>
	

	<!--<div class="row-lg-12">
		<div class="panel panel-default">
            <div class="panel-head">
            </div>
            <div class="panel-body">
                <form role="form" action="#" method="post" id="form-ruangan">
                    <div class="form-body">			
                        <div class="row">
							<div class="col-md-4">
								<label class="">Nama Ruangan</label>
								<div class="form-group">
									<div class="input-group input-group-xs">
										<span class="input-group-addon"><i class="icon-grid5"></i></span>
										<input type="text" id="nama_ruangan" name="nama_ruangan" class="form-control" placeholder="Nama Ruangan">
									</div>
								</div>
                            </div>
						
                        <div class="panel-footer text-left">
                            <button type="submit" class="btn btn-primary btn-xs mr-2 " id="submit-registrasi">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
	</div>-->

	<table class="table datatables-lists">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Ruangan</th>
				<th>Tangga Input</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 1;
				if(!empty($f_ruangan)){
					foreach($f_ruangan as $u){
					
			?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $u->nama_ruangan ?></td>
				<td><?php echo $u->timestamp ?></td>
				<td class="text-center">
					<ul class="icons-list">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-menu9"></i>
							</a>

							<ul class="dropdown-menu dropdown-menu-right">
								<li><a href="<?php echo base_url() ?>ruangan/detail/<?php echo $u->id_ruangan ?>">Edit</a>
								</li>
								<li><a href="<?php echo base_url();?>ruangan/delete/<?php echo $u->id_ruangan;?>" onClick="return confirm('Apakah Anda yakin ingin Menghapus Data Instalasi Ini ?')">Delete</a>
								</li>
							</ul>
						</li>
					</ul>
				</td>
			</tr>
			</tr>
			<?php }} ?>
		</tbody>
	</table>
</div>

<!--Modal Tambah Ruangan-->
<div id="modal-form-ruangan" class="modal fade" style="display: none;">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header bg-teal">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h5 class="modal-title">Tambah Data Ruangan</h5>
			</div>

			<form role="form" action="#" id="form-ruangan" method="post" class="form-horizontal">
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label col-sm-3">Nama Ruangan</label>
						<div class="col-sm-9">
							<input type="text" name="nama_ruangan" id="nama_ruangan" class="form-control" placeholder="Nama Ruangan">
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
<!--Modal Detail Pasien-->
<div class="modal fade" id="modalDetail">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="largeModalLabel">Modal title</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
			<div id="detail-result"></div>
			
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-warning">Save changes</button>
			</div>
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
					{text: '<data-toggle="modal" data-target="#modal-form-ruangan"> <i class="icon-plus-circle2"></i> Tambah Ruangan ',
					className: 'btn bg-teal-400',
						action: function(e, dt, node, config) {
						$('#modal-form-ruangan').modal('show');
					}
				}
				]
			}
		});
		
		
		$('.dataTables_filter input[type=search]').attr('placeholder','Cari Nama Ruangan...');
		$('.dataTables_length select').select2({
			minimumResultsForSearch: Infinity,
			width: 'auto'
		});
	});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		var form = $('#form-ruangan');
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
					url: '<?php echo base_url();?>ruangan/save',
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
//								confirmButtonText: "Ok"
								}, function() {
									window.location.href = "";
								});
							}
						else
							{
								Swal.fire(title, message, "success");
								setTimeout(function(){
												  window.location.href = "<?php echo base_url() ?>/ruangan";
											}, 1000);
							}
					}
				});
			  }else {     
					Swal.fire("Cancelled", "Input data Telah di Batalkan", "error");   
				} 
			})

		});
	});	
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#dataTable').DataTable();
		$('#dataTable').on('click', '.view_data', function(){
			var detailPasien = $(this).attr('id');
			$.ajax({
				url: "<?php echo base_url()?>pendaftaran/get_pasien_result",
				method: "POST",
				data: { detailPasien:detailPasien },
				success: function(data){
				$('#detail-result');
				$('#modalDetail').modal('show');
				}
			});
		});
	});
</script>