<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/ui/prism.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/handsontable/handsontable.min.js"></script>
<div class="row">

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
<?php 
	if(!empty($e_upload)){
		$no = 1;
		foreach($e_upload as $u){
?>
	<?php echo $this->session->flashdata('success');?>
    <?php echo $this->session->flashdata('danger');?>
    <div class="col-md-4">
        <div class="panel bg-teal-400">
            <div class="panel-head">
            </div>
            <div class="panel-body">
			
			<h3 class="no-margin"><b><?php echo $u->nama_alat ?></b></h3>
			<hr>
                    <div class="form-body">
						
						<table>
							<tr>
								<td>Nama&nbsp;Aset</td>
								<td>&nbsp;:</td>
								<td>&nbsp;<?php echo $u->nama_alat ?></td>
							</tr>
							<tr>
								<td>Kode Aset</td>
								<td>&nbsp;:</td>
								<td>&nbsp;<?php echo $u->kode_alat ?></td>
							</tr><tr>
								<td>Tahun Pengadaan</td>
								<td>&nbsp;:</td>
								<td>&nbsp;<?php echo $u->tahun_pengadaan ?></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</table>
						
						</div>
						
					<?php }} ?>
            	</div>
			</div> <!-- /Panel Body-->
        </div> <!-- /Panel Default-->
		<?php 
			if(!empty($e_upload)){
				$no = 1;
				foreach($e_upload as $u){
		?>
		<div class="col-md-4">
			<div class="panel bg-teal-400">
				<div class="panel-head">
				</div>
					<div class="panel-body">
						<div class="form-body">
						<h6 align="center">
						<?php
						$foto = $u->foto;
							if(empty($foto)){
						?>
								<button type="submit" class="btn btn-default" id="submit-registrasi">Upload Foto Alat</button>
						<?php
							} else{
								echo $u->foto;
							}
						?>
						</h6>
						</div>
					</div>
			</div> <!-- /Panel Body-->
        </div> <!-- /Panel Default-->
		
	
<!--		Informasi Dokumen-->
<!--<form role="form" action="#" method="post" id="form-aset">-->
<form role="form" action="<?php echo base_url('aset/save_upload')?>" method="post">
	<div class="col-md-12">
        <div class="panel bg-teal-400">
            <div class="panel-head"></div>
            <div class="panel-body">
				<div class="row">
					<div class="col-md-3">
						<label class=""><b>SOP OPERATOR</b></label>
						<div class="form-group">
							<div class="input-group input-group-xs">
								<span class="input-group-addon"><i class="icon-folder"></i></span>
								<input value="<?php echo $u->id_alat ?>" name="id_alat">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group input-group-xs">
								<span class="input-group-addon"><i class="icon-folder"></i></span>
								<input type="file" id="sop_operator" name="sop_operator" class="form-control" placeholder="SOP Operator">
							</div>
						</div>
					</div>
					<!--<!--<div class="col-md-3">
						<label class=""><b>SOP MAINTENANCE</b></label>
						<div class="input-group input-group-xs">
							<span class="input-group-addon"><i class="icon-folder"></i></span>
							<input type="file" id="sop_maintenance" name="sop_maintenance" class="form-control" placeholder="SOP Maintenance">
						</div>  
					</div>
					
					<div class="col-md-3">
						<label class="Services Manual"><b>SERVICE MANUAL</b></label>
						<div class="input-group input-group-xs">
							<span class="input-group-addon"><i class="icon-folder"></i></span>
							<input type="file" id="services_manual" name="services_manual" class="form-control" placeholder="Services Manual">
						</div>  
					</div>
					
					<div class="col-md-3">
						<label class=""><b>CERTIFICATE CALIBRATION</b></label>
						<div class="input-group input-group-xs">
							<span class="input-group-addon"><i class="icon-folder"></i></span>
							<input type="file" id="sertifikat_kalibrasi" name="sertifikat_kalibrasi" class="form-control" placeholder="Calibration Certificate">
						</div>  
					</div>-->
				</div>
			</div>
			<div class="panel-footer text-center">
					<button type="submit" class="btn btn-primary " id="submit-upload">Upload</button>
					<button type="reset" class="btn btn-danger" onClick="history.go(-1)">Kembali</button>
				</div>
		</div>
	</div>	
</form>

<?php }} ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>

<!--<script type="text/javascript">
	$(document).ready(function(){
		var form = $('#form-aset');
		$("#submit-upload").click(function(e){
			e.preventDefault();
			Swal.fire({   
			title: "Apakah Dokumen Sudah Benar ?",   
			text: "Pastikan data dokumen sudah sesuai!",   
			type: "warning",   
			showCancelButton: true,   
			confirmButtonColor: "#009999",   
			confirmButtonText: "Yes",   
			cancelButtonText: "No, cancel plx!",
			}).then((result) => {
			  if (result.value) {
				$.ajax({
					type: 'post',
					url: '<?php //echo base_url();?>aset/save_upload',
					data: form.serialize(),
					error: function () {
						Swal.fire("Gagal !!!", "Terjadi Kesalahan Upload Dokumen ke Server :)", "error");
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
												  window.location.href = "<?php //echo base_url() ?>/aset";
											}, 1000);
							}
					}
				});
			  }else {     
					Swal.fire("Cancelled", "Upload dokumen Telah di Batalkan", "error");   
				} 
			})

		});
	});	
</script>-->

<script type="text/javascript">
	$(document).ready(function(){
		$('.select').select2({
		});
	});
</script>