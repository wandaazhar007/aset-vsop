<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/ui/prism.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/handsontable/handsontable.min.js"></script>


<!-- Info alert -->
<div class="alert alert-info alert-styled-left alert-arrow-left alert-component">
	<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
	<h6 class="alert-heading text-semibold">Modul Tindakan Pasien</h6>
	Petugas dapat memberikan tindakan Dokter atau Fisioterapi secara Multiple Select, yang akan automatis Masuk kedalam Tabel Tindakan Pasien. <strong>Pastikan Tindakan Sudah Benar !!!</strong>.
</div>
<!-- /info alert -->

<!-- Grid -->
<div class="row">
	<div class="col-md-8">
		<div class="row">
			<div class="col-md-12">
				<!-- Vertical form -->
				<div class="panel">
					<div class="panel-heading bg-success">
						<h5 class="panel-title"><strong>SELECT DATA TINDAKAN</strong></h5>
						<div class="heading-elements">
							<ul class="icons-list">
								<li><a data-action="collapse"></a></li>
								<li><a data-action="close"></a></li>
							</ul>
						</div>
					</div>

					<div class="panel-body">
						<form>
							<div class="content-group">
								<h6 class="text-semibold">Pilih Tindakan Medis Dokter</h6>
								<p class="content-group-sm">Silahkan anda pilih tindakan medis apa saja yang anda inginkan dengan cara mengetikan sesuatu di bawah ini: </p>
								<div class="row">
									<div class="col-md-6">
										
										<select data-placeholder="Pilih 'tindakan'" class="select" id="select_dokter">
											<option></option>
											<?php
												$dok = $this->utilities->selectQuery("SELECT * FROM `tb_tindakan_master` WHERE id_tindakan_jenis = '1' AND trash = '0'", 'id_tindakan_master', 'nama_tindakan');
												if(!empty($dok))
												{
													foreach($dok as $dk)
													{
														echo $dk;	
													}
												}
											?>
										</select>
										
									</div>
									<div class="col-md-6">
										
										<select data-placeholder="Pilih 'Dokter'" class="select" id="select_petugas_dokter">
											<option></option>
											<?php
												$pet = $this->utilities->selectQuery("SELECT * FROM `tb_petugas` WHERE id_petugas_jenis = '1' AND trash = '0'", 'id_petugas', 'nama_petugas');
												if(!empty($pet))
												{
													foreach($pet as $ptgs)
													{
														echo $ptgs;	
													}
												}
											?>
										</select>
										
									</div>
								</div>
								<hr>
								<div class="text-right">
									<button type="button" class="btn btn-primary" id="button-tindakan-dokter">Submit Tindakan <i class="icon-arrow-right14 position-right"></i></button>
								</div>
							</div>

							<div class="content-group">
								<h6 class="text-semibold">Pilih Tindakan Fisioterapist</h6>
								<p class="content-group-sm">Silahkan anda pilih tindakan Fisioterapist apa saja yang anda inginkan dengan cara mengetikan sesuatu di bawah ini: </p>
								
								<div class="row">
									<div class="col-md-6">
										
										<select data-placeholder="Pilih 'tindakan'" class="select" id="select_fisio">
											<option></option>
											<?php
												$fisio = $this->utilities->selectQuery("SELECT * FROM `tb_tindakan_master` WHERE id_tindakan_jenis = '2' AND trash = '0'", 'id_tindakan_master', 'nama_tindakan');
												if(!empty($fisio))
												{
													foreach($fisio as $fs)
													{
														echo $fs;	
													}
												}
											?>
										</select>
										
									</div>
									<div class="col-md-6">
										
										<select data-placeholder="Pilih 'Fisioterapis'" class="select" id="select_petugas_fisio">
											<option></option>
											<?php
												$petf = $this->utilities->selectQuery("SELECT * FROM `tb_petugas` WHERE id_petugas_jenis = '2' AND trash = '0'", 'id_petugas', 'nama_petugas');
												if(!empty($petf))
												{
													foreach($petf as $ptgsf)
													{
														echo $ptgsf;	
													}
												}
											?>
										</select>
										
									</div>
								</div>
								<hr>
								<div class="text-right">
									<button type="button" class="btn btn-primary" id="button-tindakan-fisio">Submit Tindakan <i class="icon-arrow-right14 position-right"></i></button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			
			<div class="col-md-12">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h5 class="panel-title"><strong>Table List Tindakan</strong></h5>
						<div class="heading-elements">
							<ul class="icons-list">
								<li><a data-action="collapse"></a></li>
								<li><a data-action="reload"></a></li>
								<li><a data-action="close"></a></li>
							</ul>
						</div>
					</div>

					<div class="panel-body">
						Table di bawah ini merupakan data Tindakan Medis Dokter dan Data Tindakan Fisioterapist secara dinamis dan bisa diedit langsung di tabel
					</div>

					<div class="table-responsive">
						<table class="table table-bordered table-lg">
							<tbody id="tr-td">
								<tr class="border-double active">
									<th colspan="5">Tindakan Medis Dokter</th>
									<?php
										if(!empty($item_dokter))
										{
											$no = 1;
											foreach($item_dokter as $idok)
											{ 
												$data_petugas_dokter = $this->datamapper->rowData("tb_petugas", 'nama_petugas', 'id_petugas', $idok->id_petugas);
												echo '<tr>
													<td class="d-none id_tdm_dokter">
														'.$idok->id_tindakan_master.'
													</td>
													<td>
														<strong>'.$idok->nama_tindakan.'</strong>
													</td>
													<td>
														'.$data_petugas_dokter.'
													</td>
													<td class="harga_td">'.$idok->harga_tindakan.'</td>
													<td class="text-center">
														<button type="button" class="btn btn-danger btn-icon legitRipple" onclick="delItem(\''.$idok->id_tindakan_item.'\')"><i class="icon-trash"></i></button>
													</td>
												</tr>';
												
											}
											
										}
									?>
								</tr>
							</tbody>
						</table>
					</div>
					
					<div class="table-responsive">
						<table class="table table-bordered table-lg">
							<tbody id="tr-tf">
								<tr class="border-double active">
									<th colspan="5">Tindakan Fisioterapist</th>
									<?php
										if(!empty($item_fisio))
										{
											$no = 1;
											foreach($item_fisio as $ifis)
											{ 
												$data_petugas_fisio = $this->datamapper->rowData("tb_petugas", 'nama_petugas', 'id_petugas', $ifis->id_petugas);
												echo '<tr>
													<td class="d-none id_tdm_fisio">
														'.$ifis->id_tindakan_master.'
													</td>
													<td>
														<strong>'.$ifis->nama_tindakan.'</strong>
													</td>
													<td>
														'.$data_petugas_fisio.'
													</td>
													<td class="harga_tf">'.$ifis->harga_tindakan.'</td>
													<td class="text-center">
														<button type="button" class="btn btn-danger btn-icon legitRipple" onclick="delItem(\''.$ifis->id_tindakan_item.'\')"><i class="icon-trash"></i></button>
													</td>
												</tr>';
												
											}
											
										}
									?>
								</tr>
							</tbody>
						</table>
					</div>
					
				</div>
			</div>
		</div>
		<!-- /vertical form -->

	</div>
	
	<div class="col-md-4">
		<div class="row">
			<div class="col-md-12">
				<!-- Horizontal form -->
				<div class="panel">
					<div class="panel-heading bg-danger">
						<h5 class="panel-title"><strong>Total Harga Tindakan</strong></h5>
						<div class="heading-elements">
							<ul class="icons-list">
								<li><a data-action="collapse"></a></li>
								<li><a data-action="close"></a></li>
							</ul>
						</div>
					</div>

					<div class="panel-body">
						<style type="text/css">
						.tg  {border-collapse:collapse;border-spacing:0;}
						.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
						.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
						.tg .tg-cly1{text-align:center;vertical-align:middle}
						.tg .tg-cyhs{font-weight:bold;background-color:#efefef;text-align:left;vertical-align:middle}
						.tg .tg-gg7l{background-color:#efefef;text-align:center;vertical-align:middle}
						.tg .tg-yla0{font-weight:bold;text-align:left;vertical-align:middle}
						.tg .tg-2eyt{font-weight:bold;border-color:#efefef;text-align:center;vertical-align:middle;background-color:#efefef}
						.tg .tg-0a7q{border-color:#efefef;text-align:center;vertical-align:middle;background-color:#efefef}
						</style>
						<table class="tg" style="width: 100%">
						<colgroup>
						<col style="table-layout: fixed; width: 250px">
						<col>
						</colgroup>
						  <tr>
							<th class="tg-cyhs">Harga Tindakan Dokter</th>
							<th class="tg-gg7l" id="sum-td"></th>
						  </tr>
						  <tr>
							<td class="tg-yla0">Harga Tindakan Fisioterapi</td>
							<td class="tg-cly1" id="sum-tf"></td>
						  </tr>
						  <tr>
							<td class="tg-2eyt">TOTAL</td>
							<td class="tg-0a7q" id="sum-tot"></td>
						  </tr>
						  <tr>
							<td class="tg-2eyt">
								<a href="<?php echo base_url();?>tindakan/save_tindakan/<?php echo $id_regis;?>/<?php echo $no_cm;?>">
									<button type="button" class="btn btn-success" id="btn_post_tindakan"><i class="icon-check"></i> Proses Tindakan </button>
								</a>
							</td>
							<td class="tg-0a7q">
								<button type="button" class="btn btn-warning" id="btn_reset_tindakan"><i class="icon-cross"></i> Batalkan </button>
							</td>
						  </tr>
							
						</table>
					</div>
				</div>
				<!-- /horizotal form -->
			</div>
			
			<div class="col-md-12">
				<!-- Horizontal form -->
				<div class="panel">
					<div class="panel-heading bg-success">
						<h5 class="panel-title"><strong>Detail Profile Pasien</strong></h5>
						<div class="heading-elements">
							<ul class="icons-list">
								<li><a data-action="collapse"></a></li>
								<li><a data-action="close"></a></li>
							</ul>
						</div>
					</div>

					<div class="panel-body">
						<?php
							if(!empty($get_detail))
									{
										$no = 1;
										foreach($get_detail as $i)
										{ 
						?>
						<form>
							<div class="form-body">
								<div class="row">
									<div class="col-md-6">
										<div class="hidden">
											<input type="text" class="form-control" id="id_registrasi" value="<?php echo $i->id_registrasi ;?>" readonly>
										</div>
									</div>
									<div class="col-md-6">
										<div class="hidden">
											<input type="text" class="form-control" id="id_pasien" value="<?php echo $i->id_pasien ?>" readonly>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label"><strong>Nama Pasien</strong></label>
											<input type="text" class="form-control" id="nama_pasien" value="<?php echo $i->nama_pasien ;?>" readonly>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label"><strong>No Rekam Medis</strong></label>
											<input type="text" class="form-control" id="no_rm" value="<?php echo $i->no_rm ?>" readonly>
											<span class="help-block"><i>No Rekam Medis tidak bisa di edit</i></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label"><strong>NIK</strong></label>
											<input type="number" class="form-control" id="nik" value="<?php echo $i->nik ?>" readonly>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label"><strong>Jenis Kelamin</strong></label>
											<select class="form-control" id="jenis_kelamin"  readonly >
												<option value="<?php echo $i->jenis_kelamin ?>"><?php echo $i->jenis_kelamin ?></option>
												<option value="Laki-Laki">Laki-Laki</option>
												<option value="Perempuan">Perempuan</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label"><strong>Tempat Lahir</strong></label>
											<input type="text" class="form-control" id="tempat_lahir" value="<?php echo $i->tempat_lahir ?>" readonly>
											<span class="help-block"><i>Isi dengan nama Kota/Kabupaten</i></span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label"><strong>Tanggal Lahir</strong></label>
											<input type="date" class="form-control" id="tanggal_lahir" value="<?php echo $i->tanggal_lahir ?>" readonly>
											<span class="help-block"><i>*Isi Tanggal dengan format dd/mm/yyyy</i></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label"><strong>No Handphone</strong></label>
											<input type="number" class="form-control" id="no_hp" value="<?php echo $i->no_hp ?>" readonly>
											<span class="form-text"></span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label"><strong>Jaminan Pembayaran</strong></label>
											<select class="form-control" id="select-jaminan" readonly>
												<option value="<?php echo $i->jaminan_pembayaran ?>"><?php echo $i->jaminan_pembayaran ?></option>
												<option value="Umum">UMUM</option>
												<option value="Bpjs">BPJS</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label"><strong>E-mail</strong></label>
											<input type="email" class="form-control" id="email" value="<?php echo $i->email ?>" readonly>
											<span class="form-text"></span>
										</div>
									</div>
									<div class="col-md-6">

									</div>
								</div>
								<div class="row">
									<div class="col-md-12 ">
										<div class="form-group">
											<label class="col-form-label"><strong>Alamat</strong></label>
											<textarea type="text" class="form-control" id="alamat" readonly><?php echo $i->alamat ?></textarea>
										</div>
									</div>
								</div>
							</div>
						</form>
						<?php }} ?>
					</div>
				</div>
				<!-- /horizotal form -->
			</div>
		</div>
	</div>

	
</div>
<!-- /grid -->

<script type="text/javascript">
	$(document).ready(function(){
		$('.select').select2({
		});
	});
</script>

<script type="text/javascript">
	
	$(document).ready(function(){
		$( "#button-tindakan-dokter" ).click(function() {
			var foo = $('#select_dokter').val(); 
			var id_reg = $('#id_registrasi').val();
			var sel_pet_dok = $('#select_petugas_dokter').val();
			$.ajax({
				//Alamat url harap disesuaikan dengan lokasi script pada komputer anda
				url	     : '<?php echo base_url('tindakan/push_tindakan_item');?>',
				type     : 'POST',
				dataType : 'JSON',
				data     : {idreg:id_reg, tindakan_dokter:foo, petugas_dokter:sel_pet_dok},
				success  : function(callBack){
					//var callBack = $.parseJSON(respons);
					var title = callBack.title;
					var data_tindakan = callBack.data_tind;
					var message = callBack.message;
					if(callBack.status == 1)
						{
							$.each(data_tindakan, function(i, item) {
								$('#tr-td').append(data_tindakan[i]);
							});
							//alert(respons);
							$("#select_dokter").val("");
							$("#select_dokter").trigger("change");
							$("#select_petugas_dokter").val("");
							$("#select_petugas_dokter").trigger("change");
							Swal.fire({   
								title: title,   
								text: message,   
								type: "success",   
								showCancelButton: false,   
								confirmButtonColor: "#DD6B55",   
								confirmButtonText: "Ok"
								});
						}
					else
						{
							Swal.fire({   
								title: title,   
								text: message,   
								type: "error",   
								showCancelButton: false,   
								confirmButtonColor: "#DD6B55",   
								confirmButtonText: "Ok"
								});
						}
					
				},
				complete: function (data) {
				  	jumTD(); 
				 }
			});
		});
		
		$( "#button-tindakan-fisio" ).click(function() {
			var foof = $('#select_fisio').val(); 
			var id_reg_f = $('#id_registrasi').val();
			var sel_pet_fisio = $('#select_petugas_fisio').val();
			$.ajax({
				//Alamat url harap disesuaikan dengan lokasi script pada komputer anda
				url	     : '<?php echo base_url('tindakan/push_tindakan_item');?>',
				type     : 'POST',
				dataType : 'JSON',
				data     : {idreg:id_reg_f, tindakan_fisio:foof, petugas_fisio:sel_pet_fisio},
				success  : function(callBack){
					//var callBack = $.parseJSON(respons);
					var title = callBack.title;
					var data_tindakan = callBack.data_tind;
					var message = callBack.message;
					if(callBack.status == 1)
						{
							$.each(data_tindakan, function(i, item) {
								$('#tr-tf').append(data_tindakan[i]);
							});
							//alert(respons);
							$("#select_fisio").val("");
							$("#select_fisio").trigger("change");
							$("#select_petugas_fisio").val("");
							$("#select_petugas_fisio").trigger("change");
							Swal.fire({   
								title: title,   
								text: message,   
								type: "success",   
								showCancelButton: false,   
								confirmButtonColor: "#DD6B55",   
								confirmButtonText: "Ok"
								});
						}
					else
						{
							Swal.fire({   
								title: title,   
								text: message,   
								type: "error",   
								showCancelButton: false,   
								confirmButtonColor: "#DD6B55",   
								confirmButtonText: "Ok"
								});
						}
					
				},
				complete: function (data) {
					
				  	jumTF(); 
				 }
			});
		});
		
		
		
	});
	
	function jumTD()
	{
		var sumTD = 0;
		$('.harga_td').each(function(){
			sumTD += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
			$('#sum-td').text(sumTD);
		});
		

		//var hargaTD_TD = $('#sum-td').text();
		//var hargaTF_TD = $('#sum-tf').text();
		//var hargaTOT_TD = hargaTD_TD + hargaTF_TD;

		//$('#sum-tot').text(hargaTOT_TD);
	}

	function jumTF()
	{
		var sumTF = 0;
		$('.harga_tf').each(function(){
			sumTF += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
			$('#sum-tf').text(sumTF);
		});
		//var hargaTD_TF = $('#sum-td').text();
		//var hargaTF_TF = $('#sum-tf').text();
		//var hargaTOT_TF = hargaTD_TF + hargaTF_TF;
		//$('#sum-tot').text(hargaTOT_TF);
	}
	
	function delItem(id_tindakan_item)
	{
		$.ajax({
			//Alamat url harap disesuaikan dengan lokasi script pada komputer anda
			url	     : '<?php echo base_url('tindakan/push_delete_item');?>',
			type     : 'POST',
			dataType : 'JSON',
			data     : {id_tindakan_item:id_tindakan_item},
			success  : function(respons){
				Swal.fire({   
							title: respons.title,   
							text: respons.message,   
							type: "success",   
							showCancelButton: false,   
							confirmButtonColor: "#DD6B55",   
							confirmButtonText: "Ok"
							});
				$('#'+id_tindakan_item).empty();
				
			},
			complete: function (data) {
					jumTD();
				  	jumTF(); 
				 }
		});
	}
	
	$(document).ready(function(){
		  //function to calculate total
		  calculateTotal = function(){
			  var total = (parseFloat($('#sum-td').text()) || 0.0 ) +
						  (parseFloat($('#sum-tf').text()) || 0.0 );
			  //alert(total);
			  $('#sum-tot').text(total);
		  };
		
		$('#sum-td').bind('DOMSubtreeModified',function(event) {
			$('#sum-td').text(); // how many of bread1, multiply with 2.5 price
		  	calculateTotal();
		});
		
		$('#sum-tf').bind('DOMSubtreeModified',function(event) {
			$('#sum-tf').text();
		  	calculateTotal();
		});
	});
</script>