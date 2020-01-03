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
                <form role="form" action="#" method="post" id="form-supplier2">
                    <div class="form-body">			
                        <div class="row">
							<div class="col-md-4">
								<label class="">Nama Supplier</label>
								<div class="form-group">
									<div class="input-group input-group-xs">
										<span class="input-group-addon"><i class="icon-grid5"></i></span>
										<input type="text" id="nama_supplier" name="nama_supplier" class="form-control" placeholder="Nama Supplier">
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
	</div> -->

	<table class="table datatables-lists">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Supplier</th>
				<th>Contact Person</th>
				<th>No HP</th>
				<th>E-mail</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 1;
				if(!empty($f_supplier)){
					foreach($f_supplier as $u){	
			?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $u->nama_supplier ?></td>
				<td><?php echo $u->contact_person ?></td>
				<td><?php echo $u->no_hp ?></td>
				<td><?php echo $u->email ?></td>
				<td class="text-center">
					<ul class="icons-list">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-menu9"></i>
							</a>

							<ul class="dropdown-menu dropdown-menu-right">
								<li data-target="#modal_form_supplier"><a href="<?php echo base_url() ?>supplier/detail/<?php echo $u->id_supplier ?>">Edit</a>
								</li>
								<li><a href="<?php echo base_url();?>supplier/delete/<?php echo $u->id_supplier;?>" onClick="return confirm('Apakah Anda yakin ingin Menghapus Data Supplier Ini ?')">Delete</a>
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

<!--Modal Form Supplier-->
<div id="modal-form-supplier" class="modal fade" style="display: none;">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header bg-teal">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h5 class="modal-title">Tambah Data supplier</h5>
			</div>

			<form role="form" action="#" id="form-supplier" method="post" class="form-horizontal">
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label col-sm-3">Nama Supplier</label>
						<div class="col-sm-9">
							<input type="text" name="nama_supplier" id="nama_supplier" class="form-control" placeholder="Nama Perusahaan">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-3 control-label">Contact Person</label>
						<div class="col-lg-9">
							<input type="text" name="contact_person" id="contact_person" class="form-control" placeholder="Contact Person">	
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-3">No Hp</label>
						<div class="col-sm-9">
							<input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="08XXXXXXXXX">
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-3">Email</label>
						<div class="col-sm-9">
							<input type="text" name="email" id="email" class="form-control" placeholder="nama@gmail.com">
<!--							<span class="help-block">name@gmail.com</span>-->
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3">Alamat Kantor</label>
						<div class="col-sm-9">
							<textarea rows="5" cols="5" class="form-control" id="alamat" name="alamat" placeholder="Alamat Kantor Supplier"></textarea>
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
		
		//inisialisasi tombol modal form
//		$('.datatables-lists').DataTable({
//			buttons: {
//				dom: {
//					button: {
//						className: 'btn btn-teal'
//						
//					}
//				},
//				buttons: [
//					{
//					text: '<data-toggle="modal" data-target="#modal-form-supplier"> <i class="icon-plus-circle2"></i> Tambah Supplier ',
//					className: 'btn bg-teal-400',
//						action: function(e, dt, node, config) {
//						$('#modal-form-supplier').modal('show');
//					}
//				}
//				]
//			}
//		});
		//.fnDestroy();
		
		//inisialisasi untuk tombol export
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
					text: '<data-toggle="modal" data-target="#modal-form-supplier"> <i class="icon-plus-circle2"></i> Tambah Supplier ',
					className: 'btn bg-teal-400',
						action: function(e, dt, node, config) {
						$('#modal-form-supplier').modal('show');
					}
				}
					
				],
			}
		});
		
		
		$('.dataTables_filter input[type=search]').attr('placeholder','Cari Data Supplier...');
		$('.dataTables_length select').select2({
			minimumResultsForSearch: Infinity,
			width: 'auto'
		});
	});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		var form = $('#form-supplier');
		$("#submit-form").click(function(e){
			e.preventDefault();
			Swal.fire({   
			title: "Apakah Data Sudah Benar ?",   
			text: "Pastikan data yang anda cantumkan sudah sesuai!",   
			type: "warning",   
			showCancelButton: true,   
			confirmButtonColor: "#009999",   
			confirmButtonText: "Yes",   
			cancelButtonText: "No, cancel plx!",
			}).then((result) => {
			  if (result.value) {
				$.ajax({
					type: 'post',
					url: '<?php echo base_url();?>supplier/save',
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
												  window.location.href = "<?php echo base_url() ?>/supplier";
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
//	$(document).ready(function(){
//		$('#dataTable-list').DataTable();
//		$('#dataTable').on('click', '.view_data', function(){
//			var detailPasien = $(this).attr('id');
//			$.ajax({
//				url: "<?php //echo base_url()?>supplier/get_id_supplier",
//				method: "POST",
//				data: { detailPasien:detailPasien },
//				success: function(data){
//				$('#detail-result');
//				$('#modalDetail').modal('show');
//				}
//			});
//		});
//	});
</script>