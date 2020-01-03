<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/ui/prism.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/handsontable/handsontable.min.js"></script>
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
<form role="form" action="#" method="post" id="form-aset">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-head">
            </div>
            <div class="panel-body">
                    <div class="form-body">			
                        <div class="row">
							<div class="col-md-12">
								<label class="">Tanggal Kalibrasi</label>
								<div class="form-group">
									<div class="input-group input-group-xs">
										<span class="input-group-addon"><i class="icon-grid5"></i></span>
										<b><input type="date" id="tgl_kalibrasi" name="tgl_kalibrasi" class="form-control" placeholder="Nama Alat"></b>
									</div>
								</div>
                            </div>
							
							<div class="col-md-4">
								<div class="form-group">
									<div class="panel-footer text-right">
										<div class="input-group input-group-xs">
											<button type="submit" class="btn btn-primary " id="submit-registrasi">Simpan</button>
											<button type="reset" class="btn btn-outline btn-secondary btn-outline-1x" onClick="history.go(-1)">Kembali</button>
										</div>
									</div>
								</div>
                            </div>
							
							
                    </div>
            	</div>
			</div> <!-- /Panel Body-->
        </div> <!-- /Panel Default-->
    </div>
</form>

	<div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-head">
            </div>
			<?php
				if(!empty($set_kalibrasi)){
					foreach($set_kalibrasi as $u){
			?>
            <div class="panel-body">
				<h5>Riwayat kalibrasi</h5>
				<?php
					$kalibrasi = $u->tgl_kalibrasi;
					if(empty($kalibrasi)){
						echo "<h5>Alat Ini Belum Pernah Dijadwalkan Dikalibrasi</h5>";
					} else {
						echo $u->tgl_kalibrasi;
					}
				?>
			</div> <!-- /Panel Body-->
			<?php }} ?>
        </div> <!-- /Panel Default-->
    </div>

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
								}, 
								function() {
									window.location.href = "";
								}
								);
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