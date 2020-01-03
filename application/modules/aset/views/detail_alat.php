<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/ui/prism.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/handsontable/handsontable.min.js"></script>
<div class="row">
<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/datatables/extensions/buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/pages/datatables_extension_buttons_init.js"></script>
<?php $foto_alat 	= $this->datamapper->rowData('tb_alat', 'foto', 'id_alat', $this->session->userdata('id'));?>

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
hr.new4 {
  border: 1px solid #0C8C97;
}
hr.new5 {
  border: 10px solid #0C8C97;
  border-radius: 1px;
}
</style>
<form role="form" action="#" method="post" id="form-aset">
	
    <div class="col-lg-3">
        <div class="panel panel-default">
            <div class="panel-head">
            </div>
            <div class="panel-body">
				<?php
					if(!empty($d_alat)){
						foreach($d_alat as $u){
				?>
                <div class="form-body">
					<?php echo $foto_alat ?>	
            	</div>
				<?php }} ?>
			</div> <!-- /Panel Body-->
        </div> <!-- /Panel Default-->
    </div>
	
	<div class="col-lg-9">
        <div class="panel panel-default">
            <div class="panel-head">
            </div>
            <div class="panel-body">
                <div class="form-body">
				<hr class="new4">
				<p style="">Ini adalah halaman detail dan riwayat kalibrasi alat</p>
				<hr class="new4">
            	</div>
			</div> <!-- /Panel Body-->
        </div> <!-- /Panel Default-->
    </div>
	
	<div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-head">
            </div>
            <div class="panel-body">
                <div class="form-body">
					<div class="col-md-6">
					<hr class="new5">
						<table>
						<?php
							if(!empty($d_alat)){
								foreach($d_alat as $u){
						?>
							<tr>
								<td>Nama Alat</td>
								<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
								<td><?php echo $u->nama_alat ?></td>
							</tr>
							<tr>
								<td>Kode Alat</td>
								<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
								<td><?php echo $u->kode_alat ?></td>
							</tr>
							<tr>
								<td>Kategori Alat</td>
								<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
								<td><?php echo $u->kategori_alat ?></td>
							</tr>
							<tr>
								<td>Merk</td>
								<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
								<td><?php echo $u->merk ?></td>
							</tr>
							<tr>
								<td>type</td>
								<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
								<td><?php echo $u->tipe ?></td>
							</tr>
							<tr>
								<td>Nomoer Seri</td>
								<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
								<td><?php echo $u->no_seri ?></td>
							</tr>
							<tr>
								<td>Instalasi</td>
								<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
								<td><?php echo $u->instalasi ?></td>
							</tr>
							<tr>
								<td>Ruangan</td>
								<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
								<td><?php echo $u->ruangan ?></td>
							</tr>
							<tr>
								<td>Lokasi</td>
								<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
								<td><?php echo $u->lokasi ?></td>
							</tr>
						<?php }} ?>
						</table>
						<hr class="new4">
					</div>
					<div class="col-md-6">
					<hr class="new5">
						<table>
							<tr>
								<td>Kondisi Alat</td>
								<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
								<td><?php echo $u->kondisi_alat ?></td>
							</tr>
							<tr>
								<td>Katerangan</td>
								<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
								<td><?php echo $u->keterangan ?></td>
							</tr>
							<tr>
								<td>Level Resiko</td>
								<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
								<td><?php echo $u->level_resiko ?></td>
							</tr>
							<tr>
								<td>Kpemilikan</td>
								<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
								<td><?php echo $u->kepemilikan ?></td>
							</tr>
							<tr>
								<td>Supplier</td>
								<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
								<td><?php echo $u->supplier ?></td>
							</tr>
							<tr>
								<td>Daya Listrik</td>
								<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
								<td><?php echo $u->daya_listrik ?></td>
							</tr>
							<tr>
								<td>Status Alat</td>
								<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
								<td><?php echo $u->status_alat ?></td>
							</tr>
							<tr>
								<td>Perlu Maintenance</td>
								<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
								<td><?php echo $u->perlu_maintenance ?></td>
							</tr>
							<tr>
								<td>Perlu kalibrasi</td>
								<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
								<td><?php echo $u->perlu_kalibrasi ?></td>
							</tr>
						</table>
						<hr class="new4">
					</div>
            	</div>
			</div> <!-- /Panel Body-->
        </div> <!-- /Panel Default-->
    </div>
	
	
	

<!--	Informasi Administratif-->
	<div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-head"></div>
            	<div class="panel-body">
					<table class="table datatables-lists">
						<thead>
							<tr>
								<th>No</th>
								<th>Riwayat Kalibrasi</th>
								<th>Keterangan</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$no = 1;
								if(!empty($d_aset)){
									foreach($d_aset as $u){

							?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $u->tgl_update ?></td>
								<td><?php echo $u->keterangan ?></td>
								<td><?php echo $u->status ?></td>
								<td class="text-center">
									<ul class="icons-list">
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>

											<ul class="dropdown-menu dropdown-menu-right">
												<li><a href="<?php echo base_url() ?>aset/upload/<?php echo $u->id_alat ?>">Upload Dokumen</a>
												</li>

												<li><a href="<?php echo base_url() ?>aset/edit/<?php echo $u->id_alat ?>">Edit</a>
												</li>

												<li><a href="<?php echo base_url() ?>aset/detail/<?php echo $u->id_alat ?>">Detail Alat</a>
												</li>
												<li id="btn_delete"><a href="#">Delete</a>
												</li>
											</ul>
										</li>
									</ul>
								</td>
							</tr>
							<?php }} ?>
						</tbody>
					</table>
				
					<div class="panel-footer text-right">
						<button type="submit" class="btn btn-primary " id="submit-registrasi">Simpan</button>
						<button type="reset" class="btn btn-danger" onClick="history.go(-1)">Kembali</button>
					</div>
				</div>
		</div>
	</div>
</form>

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
					{extend: 'print'}
				]
			}
		});
		
		
		$('.dataTables_filter input[type=search]').attr('placeholder','Cari data alat...');
		$('.dataTables_length select').select2({
			minimumResultsForSearch: Infinity,
			width: 'auto'
		});
	});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		var form = $('#form-aset');
		$("#submit-registrasi").click(function(e){
			e.preventDefault();
			Swal.fire({   
			title: "Apakah Data Sudah Benar ?",   
			text: "Pastikan data alat yang Anda isi sudah sesuai!",   
			type: "warning",   
			showCancelButton: true,   
			confirmButtonColor: "#009999",   
			confirmButtonText: "Yes",   
			cancelButtonText: "No, cancel plx!",
			}).then((result) => {
			  if (result.value) {
				$.ajax({
					type: 'post',
					url: '<?php echo base_url();?>aset/save',
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
								confirmButtonColor: "#009999",   
//								confirmButtonText: "Ok"
								}, function() {
									window.location.href = "";
								});
							}
						else
							{
								Swal.fire(title, message, "success");
								setTimeout(function(){
												  window.location.href = "<?php echo base_url() ?>/aset";
											}, 1000);
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

<script type="text/javascript">
	$(document).ready(function(){
		$('.select').select2({
		});
	});
</script>