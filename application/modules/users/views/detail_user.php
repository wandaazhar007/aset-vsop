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

<div class="row">
	 <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-body">
            <?php 
            if( !empty($user) || !isset($user) )
            {
                foreach($user as $u){ 
            ?>
                <div class="user-avtar">
<!--                    <center><img class="img-fluid" src="<?php //echo base_url(); ?>assets/images/user.jpg" alt=""></center>-->
                    <center><img class="img-fluid" src="<?php echo base_url(); echo $u->foto;?>" alt=""></center>
                </div>
                <div class="user-details text-center pt-3">
                    <h2><?php echo $u->nama_lengkap ?></h2>
                </div>
            </div>
        </div>
    </div>
	<div class="col-lg-8">

		<!-- Basic layout-->
		<form role="form" action="#" id="form-update" method="post" class="form-horizontal">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<a href="<?php echo base_url('users'); ?>"><i class="glyphicon glyphicon-arrow-left"></i> &nbsp; Kembali</a>
					<h5 class="panel-title">Detail Data User<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
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
							<input type="text" name="id" value="<?php echo $u->id ?>" class="form-control">
						</div>
					</div>
						
					<div class="form-group">
						<label class="control-label col-sm-3">Username</label>
						<div class="col-sm-9">
							<input type="text" name="username" value="<?php echo $u->username ?>" class="form-control">
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-3">Nama Lengkap</label>
						<div class="col-sm-9">
							<input type="text" name="nama_lengkap" value="<?php echo $u->nama_lengkap ?>" class="form-control">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 control-label">Hak Akses</label>
						<div class="col-sm-9">
							<select name="group" data-placeholder="Pilih ak Akses User" class="select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
								<option value="<?php echo $u->group ?>"><?php echo $this->datamapper->rowData('tb_group','nama_group','id_group', $u->group);?></option>
								<option>...</option>
								<?php
                                                $group = $this->utilities->selectQuery("SELECT * FROM `tb_group`", 'id_group', 'nama_group');
                                                if(!empty($group))
                                                {
                                                    foreach($group as $gp)
                                                    {
                                                        echo $gp;	
                                                    }
                                                }
                                            ?>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-3">No Handphone</label>
						<div class="col-sm-9">
							<input type="number" name="no_hp" id="no_hp" value="<?php echo $u->no_hp;?>" class="form-control">
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-3">Email</label>
						<div class="col-sm-9">
							<input type="text" name="email" id="email" value="<?php echo $u->email;?>"  class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-3">Alamat</label>
						<div class="col-sm-9">
							<textarea rows="5" cols="5" class="form-control" id="alamat" name="alamat" placeholder="Alamat Kantor Supplier"><?php echo $u->alamat; ?></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-3">Foto Profil</label>
						<div class="col-sm-9">
							<input type="file" name="foto" id="foto" class="form-control">
						</div>
					</div>
					
					<div class="form-group">
						 <label class="control-label col-sm-3">Status</label>
						 <div class="col-sm-9">
							<select name="status" data-placeholder="Pilih Status" class="select select2-hidden-accessible" tabindex="-1" aria-hidden="true">
							 <option value="<?php echo $u->status ?>">
							  <?php 
									if($u->status == '0'){
										
										echo 'Tidak Aktif';
										
									}else{
										
										echo 'Aktif';
										
									}
								 ?>
							 </option>
							<option>...</option>
							<option value="0">Tidak Aktif</option>
							<option value="1">Aktif</option>    
							</select>
						</div>
					</div>

					<div class="text-right">
						<button type="submit" class="btn btn-primary legitRipple" id="submit-form"><i class="glyphicon glyphicon-saved"></i>&nbsp;Simpan</button>
						</button>
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
			title: "Apakah Data User Sudah Benar ?",   
			text: "Pastikan data user yang anda isi sudah sesuai!",   
			type: "warning",   
			showCancelButton: true,   
			confirmButtonColor: "#009999",   
			confirmButtonText: "Yes",   
			cancelButtonText: "No, cancel plx!",
			}).then((result) => {
			  if (result.value) {
				$.ajax({
					type: 'post',
					url: '<?php echo base_url();?>users/update',
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
					Swal.fire("Cancelled", "Update data user Telah dibatalkan", "error");   
				} 
			})

		});
	});	
</script>
