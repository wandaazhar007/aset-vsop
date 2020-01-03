<div class="row">
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="user-avtar">
                    <center><img class="img-fluid" src="<?php echo base_url(); ?>assets/images/user.jpg" alt=""></center>
                </div>
                <div class="user-details text-center pt-3">
                    <h2></h2>
                </div>
            </div>
        </div>
    </div>
	<?php
		if(!empty($get_detail))
				{
					$no = 1;
					foreach($get_detail as $i)
					{ 
	?>
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-head">
                <div class="panel-title">
                </div>
            </div>
            <div class="panel-body">
                <form role="form" action="#" method="post" id="form-registrasi">
                    <div class="form-body">
						<div class="row">
							<div class="col-md-6">
                                <div class="hidden">
                                    <input type="text" class="form-control" name="id_registrasi" id="id_registrasi" value="<?php echo $i->id_registrasi ;?>">
                                </div>
                            </div>
							<div class="col-md-6">
                                <div class="hidden">
                                    <input type="text" class="form-control" name="id_pasien" id="id_pasien" value="<?php echo $i->id_pasien ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
							<div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Nama Pasien</label>
                                    <input type="text" class="form-control" name="nama_pasien" id="nama_pasien" value="<?php echo $i->nama_pasien ;?>">
                                </div>
                            </div>
							<div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">No Rekam Medis</label>
                                    <input type="text" class="form-control" name="no_rm" id="no_rm" value="<?php echo $i->no_rm ?>" readonly>
									<span class="help-block"><i>No Rekam Medis tidak bisa di edit</i></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        	<div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">NIK</label>
                                    <input type="number" class="form-control" name="nik" id="nik" value="<?php echo $i->nik ?>">
                                </div>
                            </div>
							<div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Jenis Kelamin</label>
                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                        <option value=""></option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?php echo $i->tempat_lahir ?>">
									<span class="help-block"><i>Isi dengan nama Kota/Kabupaten</i></span>
                                </div>
                            </div>
							<div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo $i->tanggal_lahir ?>">
									<span class="help-block"><i>*Isi Tanggal dengan format dd/mm/yyyy</i></span>
                                </div>
                            </div>
                        </div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label">No Handphone</label>
									<input type="number" class="form-control" name="no_hp" id="no_hp" value="<?php echo $i->no_hp ?>">
									<span class="form-text"></span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label">Jaminan Pembayaran</label>
									<select class="form-control" id="select-jaminan" name="jaminan_pembayaran">
                                        <option value=""></option>
                                        <option value="Umum">UMUM</option>
                                        <option value="Bpjs">BPJS</option>
                                    </select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label">E-mail</label>
									<input type="email" class="form-control" name="email" id="email" value="<?php echo $i->email ?>">
									<span class="form-text"></span>
								</div>
							</div>
							<div class="col-md-6">
								
							</div>
						</div>
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label class="col-form-label">Alamat</label>
                                    <textarea type="text" class="form-control" name="alamat" id="alamat"><?php echo $i->alamat ?></textarea>
                                </div>
                            </div>
                        </div>
						<?php }} ?>
						
                        <div class="panel-footer text-right">
                            <button type="submit" class="btn btn-primary mr-2" id="submit-registrasi">Update</button>
                            <button type="reset" class="btn btn-outline btn-secondary btn-outline-1x" onClick="history.go(-1)">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		var form = $('#form-registrasi');
		$("#submit-registrasi").click(function(e){
			e.preventDefault();
			Swal.fire({   
			title: "Apakah Data Pasien Sudah Benar ?",   
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
					url: '<?php echo base_url();?>registrasi/update',
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
//								Swal.fire(title, message, "success");
								Swal.fire(title, message, "success");
								setTimeout(function(){
												  window.location.href = "<?php echo base_url() ?>/registrasi";
											}, 3000);
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