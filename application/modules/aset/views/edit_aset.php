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
<form role="form" action="#" method="post" id="form-aset">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-head">
            </div>
            <div class="panel-body">
                    <div class="form-body">
					<?php 
						if(!empty($e_aset)){
							$no = 1;
							foreach($e_aset as $u){
					?>
                        <div class="row">
							<div class="col-md-4">
								<label class="">Nama Alat</label>
								<div class="form-group">
									<div class="input-group input-group-xs">
										<span class="input-group-addon"><i class="icon-grid5"></i></span>
										<b><input type="text" id="nama_alat" name="nama_alat" class="form-control" value="<?php echo $u->nama_alat ?>"></b>
									</div>
								</div>
                            </div>
							<div class="col-md-4">
								<label class="">Kategori Alat</label>
                                <div class="input-group input-group-xs">
									<span class="input-group-addon"><i class="icon-grid5"></i></span>
									<b><select class="form-control" id="kategori_alat" name="kategori_alat">
											<option value="<?php echo $u->kategori_alat ?>"><?php echo $u->kategori_alat ?> </option>
											<option value="0">Alat Medis</option>
											<option value="1">Alat Non Medis</option>
										</select></b>
								</div>  
                            </div>
							<div class="col-md-4">
								<label class="">Merk</label>
                                <div class="input-group input-group-xs">
									<span class="input-group-addon"><i class="icon-grid5"></i></span>
									<b><input type="text" class="form-control" id="merk" name="merk" value="<?php echo $u->merk ?>"></b>
								</div>  
                            </div>
                        </div>
						
						<div class="row">
							<div class="col-md-4">
								<label class="">Tipe</label>
								<div class="form-group">
									<div class="input-group input-group-xs">
										<span class="input-group-addon"><i class="icon-grid5"></i></span>
										<b><input type="text" id="ippe" name="tipe" class="form-control" value="<?php echo $u->tipe ?>"></b>
									</div>
								</div>
                            </div>
							<div class="col-md-4">
								<label class="">No Seri</label>
                                <div class="input-group input-group-xs">
									<span class="input-group-addon"><i class="icon-grid5"></i></span>
									<b><input type="text" id="no_seri" name="no_seri" class="form-control" value="<?php echo $u->no_seri ?>"></b>
								</div>  
                            </div>
							<div class="col-md-4">
								<label class="">Instalasi</label>
                                <div class="input-group input-group-xs">
									<span class="input-group-addon"><i class="icon-grid5"></i></span>
									<b><select class="select" id="instalasi" name="instalasi">
										<option value="<?php echo $u->instalasi ?>"><?php echo $u->instalasi ?></option>
                                        <option></option>
										<?php
												$instalasi = $this->utilities->selectQuery("SELECT * FROM `tb_instalasi` WHERE status = '0'", 'nama_instalasi', 'nama_instalasi');
												if(!empty($instalasi))
												{
													foreach($instalasi as $ins)
													{
														echo $ins;	
													}
												}
											?>
                                    </select></b>
								</div>  
                            </div>
                        </div>
						
						<div class="row">
							<div class="col-md-4">
								<label class="">Ruangan</label>
								<div class="form-group">
									<div class="input-group input-group-xs">
										<span class="input-group-addon"><i class="icon-grid5"></i></span>
										<b><select class="select" id="ruangan" name="ruangan">
											<option value="<?php echo $u->ruangan ?>"><?php echo $u->ruangan ?></option>
											<option></option>
											<?php
												$ruangan = $this->utilities->selectQuery("SELECT * FROM `tb_ruangan` WHERE status = '0'", 'nama_ruangan', 'nama_ruangan');
												if(!empty($ruangan))
												{
													foreach($ruangan as $ru)
													{
														echo $ru;	
													}
												}
											?>
										</select></b>
									</div>
								</div>
                            </div>
							<div class="col-md-4">
								<label class="">Lokasi</label>
                                <div class="input-group input-group-xs">
									<span class="input-group-addon"><i class="icon-grid5"></i></span>
									<b><input type="text" id="lokasi" name="lokasi" class="form-control" value="<?php echo $u->lokasi ?>"></b>
								</div>  
                            </div>
							<div class="col-md-4">
								<label class="">Kondisi Alat</label>
                                <div class="input-group input-group-xs">
									<span class="input-group-addon"><i class="icon-grid5"></i></span>
									<b><select class="select" id="kondisi_alat" name="kondisi_alat">
                                        <option value="<?php echo $u->kondisi_alat ?>"><?php echo $u->kondisi_alat ?></option>
                                        <option value="Baik">Baik</option>
                                        <option value="Rusak ringan">Rusak Ringan</option>
                                        <option value="Rusak berat">Rusak Berat</option>
                                    </select></b>
								</div>  
                            </div>
                        </div>
						
						<div class="row">
							<div class="col-md-4">
								<label class="">Keterangan</label>
								<div class="form-group">
									<div class="input-group input-group-xs">
										<span class="input-group-addon"><i class="icon-grid5"></i></span>
										<b><input type="text" id="keterangan" name="keterangan" class="form-control" value="<?php echo $u->keterangan ?>"></b>
									</div>
								</div>
                            </div>
							<div class="col-md-4">
								<label class="">Level Resiko</label>
                                <div class="input-group input-group-xs">
									<span class="input-group-addon"><i class="icon-grid5"></i></span>
									<b><select class="select" id="level_resiko" name="level_resiko">
                                        <option value="<?php echo $u->level_resiko ?>"><?php echo $u->level_resiko ?></option>
                                        <option value="Low">Low</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Hight">Hight</option>
                                    </select></b>
								</div>  
                            </div>
							<div class="col-md-4">
								<label class="">Kepemilikan</label>
                                <div class="input-group input-group-xs">
									<span class="input-group-addon"><i class="icon-grid5"></i></span>
									<b><select class="select" id="kepemilikan" name="kepemilikan">
                                        <option value="<?php echo $u->kepemilikan ?>"><?php echo $u->kepemilikan ?></option>
                                        <option value="Rumah Sakit">Rumah Sakit</option>
                                        <option value="KSO">KSO</option>
                                        <option value="Hibah">Hibah</option>
                                    </select></b>
								</div>  
                            </div>
                        </div>
						
						<div class="row">
							<div class="col-md-4">
								<label class="">Supplier</label>
								<div class="form-group">
									<div class="input-group input-group-xs">
										<span class="input-group-addon"><i class="icon-grid5"></i></span>
										<b><select class="select" id="supplier" name="supplier">
											<option value="<?php echo $u->supplier ?>"><?php echo $u->supplier ?></option>
											<option>
											<?php
												$supplier = $this->utilities->selectQuery("SELECT * FROM `tb_supplier` WHERE status = '0'", 'id_supplier', 'nama_supplier');
												if(!empty($instalasi))
												{
													foreach($supplier as $sp)
													{
														echo $sp;	
													}
												}
											?>
											</option>
										</select></b>
									</div>
								</div>
                            </div>
							<div class="col-md-4">
								<label class="">Daya Listrik</label>
                                <div class="input-group input-group-xs">
									<span class="input-group-addon"><i class="icon-grid5"></i></span>
									<b><input type="number" id="daya_listrik" name="daya_listrik" class="form-control" value="<?php echo $u->daya_listrik ?>"></b>
								</div>  
                            </div>
							<div class="col-md-4">
								<label class="">Status Alat</label>
                                <div class="input-group input-group-xs">
									<span class="input-group-addon"><i class="icon-grid5"></i></span>
									<b><select class="select" id="status_alat" name="status_alat">
                                        <option value="<?php echo $u->status_alat ?>"><?php echo $u->status_alat ?></option>
                                        <option value="Aktif">Aktif</option>
                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                    </select></b>
								</div>  
                            </div>
                        </div>
						
						<div class="row">
							<div class="col-md-4">
								<label class="">Perlu Maintenance ?</label>
								<div class="form-group">
									<div class="input-group input-group-xs">
										<span class="input-group-addon"><i class="icon-grid5"></i></span>
										<b><select class="form-control" id="perlu_maintenance" name="perlu_maintenance">
											<option value="<?php echo $u->perlu_maintenance ?>"><?php echo $u->perlu_maintenance ?></option>
											<option value="Ya">Ya</option>
											<option value="Tidak">Tidak</option>
										</select></b>
									</div>
								</div>
                            </div>
							<div class="col-md-4">
								<label class="">Perlu Kalibrasi ?</label>
								<div class="input-group input-group-xs">
								<span class="input-group-addon"><i class="icon-grid5"></i></span>
									<b><select class="form-control" id="perlu_kalibrasi" name="perlu_kalibrasi">
										<option value="<?php echo $u->perlu_kalibrasi ?>"><?php echo $u->perlu_kalibrasi ?></option>
										<option value="Ya">Ya</option>
										<option value="Tidak">Tidak</option>
									</select></b>
								</div>
							</div>
                    </div>
					<?php }} ?>
            	</div>
			</div> <!-- /Panel Body-->
        </div> <!-- /Panel Default-->
    </div>
	
	<!--	Informasi Dokumen-->
	<!--<div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-head"></div>
            <div class="panel-body">
				<div class="row">
					<div class="col-md-3">
						<label class="">SOP Operator</label>
						<div class="form-group">
							<div class="input-group input-group-xs">
								<span class="input-group-addon"><i class="icon-grid5"></i></span>
								<input type="file" id="sop_operator" name="sop_operator" class="form-control" placeholder="SOP Operator">
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<label class="">SOP Maintenance</label>
						<div class="input-group input-group-xs">
							<span class="input-group-addon"><i class="icon-grid5"></i></span>
							<input type="file" id="sop_maintenance" name="sop_maintenance" class="form-control" placeholder="SOP Maintenance">
						</div>  
					</div>
					
					<div class="col-md-3">
						<label class="Services Manual">Service Manual</label>
						<div class="input-group input-group-xs">
							<span class="input-group-addon"><i class="icon-grid5"></i></span>
							<input type="file" id="service_manual" name="service_manual" class="form-control" placeholder="Services Manual">
						</div>  
					</div>
					
					<div class="col-md-3">
						<label class="">Calibration Certificate</label>
						<div class="input-group input-group-xs">
							<span class="input-group-addon"><i class="icon-grid5"></i></span>
							<input type="file" id="calibration_certificate" name="calibration_certificate" class="form-control" placeholder="Calibration Certificate">
						</div>  
					</div>
				</div>
			</div>
		</div>
	</div>	-->
	
	

<!--	Informasi Administratif-->
	<div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-head"></div>
            <div class="panel-body">
			<?php
				if(!empty($e_aset)){
					foreach($e_aset as $u){
					
					}
				}
			?>
				<div class="row">
					<div class="col-md-3">
						<label class="">Tahun Pengadaan</label>
						<div class="form-group">
							<div class="input-group input-group-xs">
								<span class="input-group-addon"><i class="icon-grid5"></i></span>
								<input type="number" id="tahun_pengadaan" name="tahun_pengadaan" class="form-control" value="<?php echo $u->tahun_pengadaan ?>">
							</div>
						</div>
					</div>
					
					<div class="col-md-3">
						<label class="">Sumber Dana</label>
						<div class="form-group">
							<div class="input-group input-group-xs">
								<span class="input-group-addon"><i class="icon-grid5"></i></span>
								<input type="text" id="sumber_dana" name="sumber_dana" class="form-control" value="<?php  echo $u->sumber_dana?>">
							</div>
						</div>
					</div>
					
					<div class="col-md-3">
						<label class="">Present Year</label>
						<div class="input-group input-group-xs">
							<span class="input-group-addon"><i class="icon-grid5"></i></span>
							<input type="number" id="present_year" name="present_year" class="form-control" <?php echo $u->present_year ?></inpu>>
						</div>  
					</div>
					
					<div class="col-md-3">
						<label class="">Expected Life Time</label>
						<div class="input-group input-group-xs">
							<span class="input-group-addon"><i class="icon-grid5"></i></span>
							<input type="number" id="expected_life_time" name="expected_life_time" class="form-control" value="<?php echo $u->expected_life_time ?>">
						</div>  
					</div>
					
					<div class="col-md-3">
						<label class="">Harga Beli</label>
						<div class="input-group input-group-xs">
							<span class="input-group-addon"><i class="icon-grid5"></i></span>
							<input type="number" id="harga_beli" name="harga_beli" class="form-control" value="<?php echo $u->harga_beli ?>">
						</div>  
					</div>
					
				</div>
				<div class="panel-footer text-right">
					<button type="submit" class="btn btn-primary " id="submit-registrasi">Simpan</button>
					<button type="reset" class="btn btn-outline btn-secondary btn-outline-1x" onClick="history.go(-1)">Kembali</button>
				</div>
			</div>
		</div>
	</div>
</form>

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
								}, function() {
									window.location.href = "";
								});
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