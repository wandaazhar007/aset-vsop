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


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-head">
            </div>
            <div class="panel-body">
                        <form class="form-horizontal" role="form" action="#" method="post" enctype="multipart/form-data" id="form-input">
                        	<?php 
								if( !empty($tb_option) || !isset($tb_option) )
								{
									foreach($tb_option as $u){ 
							?>
                            <div class="form-group hide">
                                <label class="col-md-2 control-label">ID</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="id" value="<?php echo $u->id ?>" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-2 control-label">Nama Aplikasi</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="nama_aplikasi" id="nama_aplikasi" value="<?php echo $u->nama_aplikasi ?>" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-2 control-label">Deskripsi Aplikasi</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="desc_aplikasi" id="desc_aplikasi" value="<?php echo $u->desc_aplikasi ?>" required>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="col-md-2 control-label">Alamat</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $u->alamat ?>" required>
                                </div>
                            </div>
                            
                            <div class="form-group text-right m-b-0">
                                <button class="btn btn-primary waves-effect waves-light" type="submit" id="submit-option">
                                    Simpan
                                </button>
                                <button type="reset" class="btn btn-default waves-effect m-l-5" onClick="history.go(-1)">
                                    Cancel
                                </button>
                            </div>
						<?php }}?>
                        </form>
                    </div>
                </div>

            </div>
        </div>
		
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>


<script type="text/javascript">
	$(document).ready(function(){
		var form = $('#form-input');
		$('#submit-option').click(function(e){
			e.preventDefault();
			Swal.fire({   
			title: "Apakah Data  Sudah Benar ?",   
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
					url: '<?php echo base_url();?>option/save',
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








