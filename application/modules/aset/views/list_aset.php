<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/datatables/extensions/buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/pages/datatables_extension_buttons_init.js"></script>
<style>
hr.new4 {
  border: 1px solid #0C8C97;
}
</style>
<div class="panel panel-flat">
<?php echo $this->session->flashdata('success');?>
    <?php echo $this->session->flashdata('danger');?>
<!--	<hr class="new4">-->
	<div class="panel-heading">
		 <h5 class="panel-title">List Data Aset</h5>
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
				<th>Kode Alat</th>
				<th>Nama Alat</th>
				<th>Merk</th>
				<th>Kategori Alat</th>
				<th>Instalasi</th>
				<th>Tahun Pengadaan</th>
				<th>Supplier</th>
				<th>Status</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 1;
				if(!empty($f_aset)){
					foreach($f_aset as $u){
					
			?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $u->kode_alat ?></td>
				<td><?php echo $u->nama_alat ?></td>
				<td><?php echo $u->merk ?></td>
				<td>
					<?php 
						if($u->kategori_alat === 0){
							echo "Alat Medis";
						} else if ($u->kategori_alat === 1) {
							echo "Alat Non Medis";
						}
							echo "Nn";
					?>
				</td>
				<td><?php echo $u->instalasi ?></td>
				<td><?php echo $u->tahun_pengadaan ?></td>
				<td><?php echo $u->supplier ?></td>
				<td><?php 
						$status = $u->status;
						if($status === '0'){
					?>
						<button type="button" class="btn btn-danger btn-icon btn-rounded legitRipple">    <i class="icon-cross3"></i></button>
					<?php
						}else {
					?>
						<button type="button" class="btn btn-primary btn-icon btn-rounded legitRipple">    <i class="icon-check"></i></button>
					<?php } ?>
				</td>
				<td class="text-center">
					<ul class="icons-list">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-menu9"></i>
							</a>

							<ul class="dropdown-menu dropdown-menu-right">
								<li><a href="<?php echo base_url() ?>aset/set_kalibrasi/<?php echo $u->id_alat ?>">Set Kalibrasi</a>
								</li>
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
</div>

<!--Modal Detail Pasien-->
<div class="modal fade" id="modalDetail">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="largeModalLabel"></h4>
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
					{
					text: '<i class="icon-plus-circle2"></i>  Data Baru',
					className: 'btn bg-teal-400',
					action: function(e, dt, node, config) {
						window.location.href = "<?php echo base_url('aset/form_aset');?>";
					}
				}
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
<?php 
	if(!empty($f_aset)){
		foreach($f_aset as $u){
?>

<script type="text/javascript">
	$(document).ready(function(){
//		var form = $('#form-aset');
		$("#btn_delete").click(function(e){
			e.preventDefault();
			Swal.fire({   
			title: "Apakah Anda Yakin Akan Mengahapus Data Ini ?",   
			text: "Pastikan data yang akan Anda hapus suda tepat!",   
			type: "warning",   
			showCancelButton: true,   
			confirmButtonColor: "#009999",   
			confirmButtonText: "Yes",   
			cancelButtonText: "No, cancel plx!",
			}).then((result) => {
			  if (result.value) {
				$.ajax({
					type: 'post',
					url: '<?php echo base_url();?>aset/delete/',
//					data: form.serialize(),
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
					Swal.fire("Cancelled", "Hapus data telah Anda batalkan", "error");   
				} 
			});

		});
	});	
</script>
<?php }} ?> 
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