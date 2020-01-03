<!-- Quick stats boxes -->
<!--<div class="container-fluid">-->
	
		
		<div class="col-lg-3">
			<div class="panel bg-teal-400">
				<div class="panel-body">
					<div class="heading-elements">
						<ul class="icons-list">
							<li><a data-action="reload"></a></li>
						</ul>
					</div>
					Jumlah Aset
					<h3 class="no-margin">Aset</h3>
					<div class="text-muted text-size-small"></div>
				</div>
				<div class="container-fluid">
					<div id="members-online"></div>
				</div>
			</div>
		</div>
		
		<div class="col-md-3">
			<div class="panel bg-teal-400">
				<div class="panel-body">
					<div class="heading-elements">
						<ul class="icons-list">
							<li><a data-action="reload"></a></li>
						</ul>
					</div>
					Jumlah Kategori
					<h3 class="no-margin">Kategori</h3>
					<div class="text-muted text-size-small"></div>
				</div>
				<div class="container-fluid">
					<div id="members-online"></div>
				</div>
			</div>
		</div>
		
		<div class="col-md-3">
			<div class="panel bg-teal-400">
				<div class="panel-body">
					<div class="heading-elements">
						<ul class="icons-list">
							<li><a data-action="reload"></a></li>
						</ul>
					</div>
					Jumlah Alat
					<h3 class="no-margin">Alat</h3>
					<div class="text-muted text-size-small"></div>
				</div>
				<div id="server-load"></div>
			</div>
		</div>

		<div class="col-md-3">
			<div class="panel bg-teal-400">
				<div class="panel-body">
					<div class="heading-elements">
						<ul class="icons-list">
							<li><a data-action="reload"></a></li>
						</ul>
					</div>
					Jumlah Alkes
					<h3 class="no-margin">Alkes</h3>
					<div class="text-muted text-size-small"></div>
				</div>
				<div id="today-revenue"></div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-3">
			<div class="sidebar-detached">
				<div class="sidebar sidebar-default">
					<div class="sidebar-content">
						<div class="sidebar-category">
							<div class="category-title">
								<span>Cari Produk</span>
								<ul class="icons-list">
									<li><a href="#" data-action="collapse"></a></li>
								</ul>
							</div>

							<div class="category-content">
								<form action="#">
									<div class="has-feedback has-feedback-right">
										<input type="search" id="no_rm" class="form-control" placeholder="Nama Produk">
										<div class="form-control-feedback">
											<i class="icon-search4 text-size-base text-muted"></i>
										</div>
										<div class="row mt-10">
											<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal_form_pasien" id="cek-rm">Cari</button>
										</div>
									</div>
								</form>
							</div>
						</div>

						<!-- Nama Produk -->
						<div class="sidebar-category">
							<div class="category-title">
								<span>Nama Produk</span>
								<ul class="icons-list">
									<li><a href="#" data-action="collapse"></a></li>
								</ul>
							</div>
							
							<div class="category-content">
								<ul class="media-list">
									<li class="media view_data" id="">
										<a href="#" class="media-left"><img src="assets/images/placeholder.jpg" class="img-sm img-circle" alt=""></a>
										<div class="media-body">
											<a href="#" class="media-heading text-semibold"></a>
											<span class="text-size-mini text-muted display-block"></span>
										</div>
										<div class="media-right media-middle">
											<span class="status-mark bg-success"></span>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<!-- /Nama Produk -->

						<!-- Nama Kategori -->
						<div class="sidebar-category">
							<div class="category-title">
								<span>Nama Kategori</span>
								<ul class="icons-list">
									<li><a href="#" data-action="collapse"></a></li>
								</ul>
							</div>
							
							<div class="category-content 2">
								<ul class="media-list">
									<li class="media">
										<a href="#" class="media-left"><img src="assets/images/placeholder.jpg" class="img-sm img-circle" alt=""></a>
										<div class="media-body">
											<a href="#" id="" class="media-heading text-semibold view_data"></a>
											<span class="text-size-mini text-muted display-block"></span>
										</div>
										<div class="media-right media-middle">
											<span class="status-mark bg-success"></span>
										</div>
									</li>
								</ul>
							</div>
							
						</div>
						
						<!-- Nama Petugas -->
						<div class="sidebar-category">
							<div class="category-title">
								<span>Nama Petugas</span>
								<ul class="icons-list">
									<li><a href="#" data-action="collapse"></a></li>
								</ul>
							</div>
							
							<div class="category-content 2">
								<ul class="media-list">
									<li class="media">
										<a href="#" class="media-left"><img src="assets/images/placeholder.jpg" class="img-sm img-circle" alt=""></a>
										<div class="media-body">
											<a href="#" id="" class="media-heading text-semibold view_data"></a>
											<span class="text-size-mini text-muted display-block"></span>
										</div>
										<div class="media-right media-middle">
											<span class="status-mark bg-success"></span>
										</div>
									</li>
								</ul>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-md-3">
			
		</div>
		
		<div class="col-md-9">
			<div class="alert alert-info alert-styled-left alert-arrow-left alert-component">
				<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
				<h6 class="alert-heading text-semibold">Selamat Datang <?php echo $this->datamapper->rowData('tb_login', 'nama_lengkap', 'id', $this->session->userdata('id'));?></h6>
				Melalui teknologi digital, Aplikasi ini dirancang untuk memudahkan pemilik bisnis dalam menjalankan usahanya. Ketahui alat/aset apa yang paling banyak digunakan dan alat mana yang harus segera di kalilbrasi.
			</div>
		</div>
		
		<div class="col-md-9">
			<div class="alert alert-success alert-styled-left alert-arrow-left alert-component">
				<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
				<h6 class="alert-heading text-semibold">Kemudahan Mengelola Laporan</h6>
				Aplikasi ini memungkinkan Anda untuk melihat laporan data aset harian, mingguan, bulanan dan tahunan. Pahami siklus kalibrasi keseluruhan secara real-time agar Anda dapat memaksimalkan potensi Rumah Sakit.
			</div>
		</div>
		
		<div class="col-md-9">
			<div class="alert alert-primary alert-styled-left alert-arrow-left alert-component">
				<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
				<h6 class="alert-heading text-semibold">Otoritas Petugas</h6>
				Untuk meningkatkan keamanan data aset Anda, semua staf dapat menggunakan aplikasi ini dengan hak akses yang dapat Anda atur sendiri sesuai dengan kebutuhan masing-masing staf.
			</div>
		</div>
	</div>


<!--Modal Detail-->
	<div id="petugasModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h5 class="modal-title">Detail Petugas</h5>
				</div>

				<div class="petugas_result"></div>
			</div>
		</div>
	</div>
<!--//Modal Detail-->
	
<!-- Vertical form modal -->

<!--
	<!--<!--<div id="modal_form_pasien" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h5 class="modal-title" align="center">Data Pasien</h5>
				</div>

				<form role="form" action="#" method="post" id="form-registrasi">
					<div class="modal-body">
						<div class="form-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-form-label">Nama Pasien</label>
										<input type="text" class="form-control" name="nama_pasien" id="nama_pasien" readonly>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-form-label">Jenis Kelamin</label>
										<input class="form-control" id="jenis_kelamin" name="jenis_kelamin" readonly>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-form-label">NIK</label>
										<input type="number" class="form-control" name="nik" id="nik" readonly>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-form-label">Tanggal Lahir</label>
										<input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" readonly>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-form-label">Tempat Lahir</label>
										<input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" readonly>
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
								<div class="col-md-12 ">
									<div class="form-group">
										<label class="col-form-label">Alamat</label>
										<textarea type="text" class="form-control" name="alamat" id="alamat"></textarea>
									</div>
								</div>
							</div>
						</div>
						</div>
					</form>
			</div>
		</div>
	</div>-->
	<!-- /vertical form modal -->


<!--<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>	-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>
	
<script type="text/javascript">
	$(document).ready(function(){
//		$('#dataTable').DataTable();
			$('#category-content').on('click', '.view_data', function(){ 
				var petugasData = $(this).attr('id');
				$.ajax({
					url: "<?php echo base_url()?>main/admin/get_petugas",
					method: "POST",
					data: { petugasData:petugasData },
					success: function(data){
						$('#petugas_result').html(data);
						$('#petugasModal').modal('show');
					}
				}); //end ajax
			});
	});

</script>

<script type="text/javascript">
 	$(document).ready(function(){
		
	  	var url = '<?php echo base_url();?>main/admin/getrm';
		
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
	$('.modal').on('hidden.bs.modal', function(){
		$(this).find('form')[0].reset();
	});
</script>



