<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/pages/form_layouts.js"></script>

<div class="row">
	<div class="col-md-12">

		<!-- Basic layout-->
		<?php 
				if(!empty($get_detail))
				{

					foreach($get_detail as $u)
					{ 
			?>
		<form role="form" action="#" id="form-update" method="post" class="form-horizontal">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title">Detail Tindakan Dokter<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
					<div class="heading-elements">
						<ul class="icons-list">
							<li><a data-action="collapse"></a></li>
							<li><a data-action="reload"></a></li>
							<li><a data-action="close"></a></li>
						</ul>
					</div>
				</div>

				<div class="panel-body">
					
					<div class="form-group hide">
						<div class="col-sm-9">
							<input type="text" name="id_tindakan_master" id="id_tindakan_master" value="<?php echo $u->id_tindakan_master;?>" class="form-control">
						</div>
					</div>
						
					<div class="form-group">
						<label class="control-label col-sm-3">Nama Tindakan Dokter</label>
						<div class="col-sm-9">
							<input type="text" name="nama_tindakan" id="nama_tindakan" value="<?php echo $u->nama_tindakan;?>" class="form-control">
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-3">Harga Tindakan</label>
						<div class="col-sm-9">
							<input type="text" name="harga_tindakan" id="harga_tindakan" value="<?php echo $u->harga_tindakan;?>" class="form-control">
						</div>
					</div>

					<div class="text-right">
						<button type="submit" class="btn btn-primary legitRipple" id="submit-form">Submit form <i class="icon-arrow-right14 position-right"></i></button>
					</div>
				</div>
			</div>
		</form>
		<!-- /basic layout -->
		<?php }}?> 
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		var form = $('#form-update');
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
					url: '<?php echo base_url();?>masters/tindakan_dokter/update',
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
