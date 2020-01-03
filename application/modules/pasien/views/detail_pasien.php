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
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-head">
            </div>
            <div class="panel-body">
				<?php 
					if(!empty($pasien))
					{

						foreach($pasien as $u)
						{ 
				?>
                <form role="form" action="#" method="post" id="form-update">
                    <div class="form-body">
						<div class="form-group hide">
							<div class="col-sm-9">
								<input type="text" name="id_pasien" id="id_pasien" value="<?php echo $u->id_pasien;?>" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<div class="input-group">
									<label class="col-form-label" for="no_rm">RM</label>
									<input type="text" class="form-control" name="no_rm" id="no_rm" value="<?php echo $u->no_rm;?>" readonly>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<div class="col-md-6">
 	                            	<label class="col-form-label">Nama Pasien</label>
    	                            <input type="text" class="form-control" name="nama_pasien" id="nama_pasien" value="<?php echo $u->nama_pasien;?>" >
								</div>
                            </div>
                        </div>
						</br>
                        <div class="row">
                        	<div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">NIK</label>
                                    <input type="number" class="form-control" name="nik" id="nik" value="<?php echo $u->nik;?>" >
                                </div>
                            </div>
							<div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Jenis Kelamin</label>
                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                        <option value="<?php echo $u->jenis_kelamin;?>"><?php echo $u->jenis_kelamin;?></option>
                                        <option value="Laki-Laki">-----------</option>
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
                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?php echo $u->tempat_lahir;?>">
                                </div>
                            </div>
							<div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo $u->tanggal_lahir;?>" >
                                </div>
                            </div>
                        </div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label">Email</label>
									<input type="text" class="form-control" name="email" id="email" value="<?php echo $u->email;?>" >
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label">No Handphone</label>
									<input type="number" class="form-control" name="no_hp" id="no_hp" value="<?php echo $u->no_hp;?>">
								</div>
							</div>
						</div>
					
						<div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label class="col-form-label">Alamat</label>
                                    <textarea type="text" class="form-control" name="alamat" id="alamat"><?php echo $u->alamat;?></textarea>
                                </div>
                            </div>
                        </div>
						
                        <div class="panel-footer text-right">
                            <button type="submit" class="btn btn-primary mr-2" id="update-pasien">Update</button>
                            <button type="reset" class="btn btn-outline btn-secondary btn-outline-1x" onClick="history.go(-1)">Kembali</button>
                        </div>
                    </div>
                </form>
				<?php }}?>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		var form = $('#form-update');
		$("#update-pasien").click(function(e){
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
					url: '<?php echo base_url();?>pasien/update',
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
//								var url_redir = notif.redirect;
//								Swal.fire({   
//								title: title,   
//								text: message,   
//								type: "success",   
//								showCancelButton: false,   
//								confirmButtonColor: "#66BB6A",   
//								confirmButtonText: "Ok"
//								}).then(function(){
//								  location.reload();
//								});
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