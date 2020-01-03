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
                <form role="form" action="#" method="post" id="form-registrasi">
                    <div class="form-body">
						<div class="form-group">
							<div class="col-md-6">
								<div class="input-group">
									<label class="col-form-label" for="no_rm">RM</label>
										<input type="text" class="form-control" name="no_rm" id="no_rm" placeholder="Silahkan Isi No RM">
										<span class="input-group-btn mt-10">
											<button class="btn btn-default btn-xs" id="cek-rm" type="button">Cek RM</button>
										</span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<div class="col-md-6">
 	                            	<label class="col-form-label">Nama Pasien</label>
    	                            <input type="text" class="form-control" name="nama_pasien" id="nama_pasien" readonly>
								</div>
                            </div>
                        </div>
						
						</br>
                        <div class="row">
                        	<div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">NIK</label>
                                    <input type="number" class="form-control" name="nik" id="nik" readonly>
                                </div>
                            </div>
							<div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Jenis Kelamin</label>
                                    <input class="form-control" id="jenis_kelamin" name="jenis_kelamin" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" readonly>
                                </div>
                            </div>
							<div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Tanggal Lahir</label>
                                    <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" readonly>
                                </div>
                            </div>
                        </div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label">Email</label>
									<input type="text" class="form-control" name="email" id="email" readonly>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label">No Handphone</label>
									<input type="number" class="form-control" name="no_hp" id="no_hp" readonly>
								</div>
							</div>
						</div>
					
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="col-form-label">Jaminan Pembayaran</label>
									<select class="form-control" id="select-jaminan" name="jaminan_pembayaran">
                                        <option value="">------</option>
                                        <option value="Umum">UMUM</option>
                                        <option value="Bpjs">BPJS</option>
                                    </select>
								</div>
							</div>
						</div>
					
						<div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label class="col-form-label">Alamat</label>
                                    <textarea type="text" class="form-control" name="alamat" id="alamat"></textarea>
                                </div>
                            </div>
                        </div>
						
                        <div class="panel-footer text-right">
                            <button type="submit" class="btn btn-primary mr-2" id="submit-registrasi">Simpan</button>
                            <button type="reset" class="btn btn-outline btn-secondary btn-outline-1x" onClick="history.go(-1)">Kembali</button>
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
		
	  	var url = '<?php echo base_url();?>registrasi/getrm';
		
 		$(document).on('click','#cek-rm',function(e){
		
			if(e.keyCode==6){
				e.preventDefault();
			}
		
			  var no_rm = $('#no_rm').val();
		  //Ajax Load data from ajax
			  $.ajax({
					url : url+"/"+no_rm,
					type: "GET",
					dataType: "JSON",
					success: function(data){
				  	if(data == null)
					{
						Swal.fire({   
								title: "Data Tidak Ditemukan / Belum Terdaftar",   
								type: "error",   
								showCancelButton: false,   
								confirmButtonColor: "#DD6B55",   
								confirmButtonText: "Ok"
							});
					}else{
						{
							$('#form-registrasi [name="nik"]').val(data.nik);
							$('#form-registrasi [name="nama_pasien"]').val(data.nama_pasien)
							$('#form-registrasi [name="jenis_kelamin"]').val(data.jenis_kelamin)
							$('#form-registrasi [name="tempat_lahir"]').val(data.tempat_lahir)
							$('#form-registrasi [name="tanggal_lahir"]').val(data.tanggal_lahir)
							$('#form-registrasi [name="email"]').val(data.email)
							$('#form-registrasi [name="no_hp"]').val(data.no_hp)
							$('#form-registrasi [name="alamat"]').val(data.alamat)
						}
					}
				}
			}); 
			
			return false;
		});
	});
</script>

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
					url: '<?php echo base_url();?>registrasi/save_lama',
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