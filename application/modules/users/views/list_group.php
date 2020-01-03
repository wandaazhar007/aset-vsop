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
		<h5 class="panel-title">List Jabatan</h5>
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
				<th>Jabatan</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				if(!empty($group))
				{

					$no = 1;
					foreach($group as $g)
					{ 
			?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $g->nama_group?></td>
				<td class="text-center">
					<ul class="icons-list">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-menu9"></i>
							</a>

							<ul class="dropdown-menu dropdown-menu-right">
								<li><a href="<?php echo base_url();?>users/groups/detail/<?php echo $g->id_group;?>">Edit</a>
								</li>
								<li><a href="<?php echo base_url();?>users/groups/delete/<?php echo $g->id_group;?>">Delete</a>
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

<div id="modal_form_group" class="modal fade" style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-teal-400">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h5 class="modal-title">Tambah Data Jabatan</h5>
			</div>

			<form role="form" action="#" id="form-group" method="post" class="form-horizontal">
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label col-sm-3">Nama Jabatan</label>
						<div class="col-sm-9">
							<input type="text" id="nama_group" name="nama_group" class="form-control">
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-link legitRipple" data-dismiss="modal">Close<span class="legitRipple-ripple" style="left: 54.223%; top: 26.3158%; transform: translate3d(-50%, -50%, 0px); width: 224.828%; opacity: 0;"></span></button>
					<button type="submit" class="btn btn-primary legitRipple" id="submit-form">Simpan</button>
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
					text: '<data-toggle="modal" data-target="#modal_form_group"> <i class="icon-plus-circle2"></i> Tambah Jabatan ',
					className: 'btn bg-teal-400',
						action: function(e, dt, node, config) {
						$('#modal_form_group').modal('show');
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
		var form = $('#form-group');
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
					url: '<?php echo base_url();?>users/groups/save',
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