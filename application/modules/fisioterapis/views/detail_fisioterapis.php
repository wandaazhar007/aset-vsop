<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/pages/form_layouts.js"></script>

<div class="row">
	<div class="col-md-12">

		<!-- Basic layout-->
		<?php 
				if(!empty($detail_fisioterapis))
				{

					foreach($detail_fisioterapis as $u)
					{ 
			?>
		<form role="form" action="#" id="form-update" method="post" class="form-horizontal">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title">Detail Data Fisioterapis<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
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
							<input type="text" name="id_petugas" id="id_petugas" value="<?php echo $u->id_petugas;?>" class="form-control">
						</div>
					</div>
						
					<div class="form-group">
						<label class="control-label col-sm-3">Nama Petugas Medis</label>
						<div class="col-sm-9">
							<input type="text" name="nama_petugas" id="nama_petugas" value="<?php echo $u->nama_petugas;?>" class="form-control">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 control-label">Jenis Petugas Medis</label>
						<div class="col-sm-9">
							<select name="id_petugas_jenis" data-placeholder="Pilih Jenis Petugas Medis" class="select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
								<option value="<?php echo $u->id_petugas_jenis;?>"> <?php echo $this->datamapper->rowData('tb_petugas_jenis', 'nama', 'id_petugas_jenis', $u->id_petugas_jenis);?> </option>
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
							<input type="text" name="no_hp" id="no_hp" value="<?php echo $u->no_hp;?>" class="form-control">
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-3">Email</label>
						<div class="col-sm-9">
							<input type="text" name="email" id="email" value="<?php echo $u->email;?>"  class="form-control">
							<span class="help-block">name@domain.com</span>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3">Alamat</label>
						<div class="col-sm-9">
							<input type="text" name="alamat" id="alamat" value="<?php echo $u->alamat;?>" class="form-control">
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
					url: '<?php echo base_url();?>fisioterapis/update',
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
