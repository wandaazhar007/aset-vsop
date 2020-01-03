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

<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/pages/form_layouts.js"></script>

<div class="row">
	<div class="col-md-12">

		<!-- Basic layout-->
		<?php 
				if(!empty($detail_instalasi))
				{

					foreach($detail_instalasi as $u)
					{ 
			?>
		<form role="form" action="#" id="form-update" method="post" class="form-horizontal">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<?php echo $this->session->flashdata('success');?>
    				<?php echo $this->session->flashdata('danger');?>
					<a href="<?php echo base_url('instalasi'); ?>"><i class="glyphicon glyphicon-arrow-left"></i> &nbsp; Kembali</a>
					<h5 class="panel-title" align="center">Edit Data Instalasi<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
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
							<input type="text" name="id_instalasi" id="id_instalasi" value="<?php echo $u->id_instalasi;?>" class="form-control">
						</div>
					</div>
						
					<div class="form-group">
						<label class="control-label col-sm-3">Nama Instalasi</label>
						<div class="col-sm-9">
							<input type="text" name="nama_instalasi" id="nama_instalasi" value="<?php echo $u->nama_instalasi;?>" class="form-control">
						</div>
					</div>

					<div class="text-right">
						<button type="submit" class="btn btn-primary" id="submit-form"><i class="glyphicon glyphicon-saved"></i>&nbsp;Update</button>
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
			title: "Apakah Data Sudah Benar ?",   
			text: "Pastikan data yang anda update sudah benar!",   
			type: "warning",   
			showCancelButton: true,   
			confirmButtonColor: "#009999",   
			confirmButtonText: "Yes",   
			cancelButtonText: "No, cancel!",
			}).then((result) => {
			  if (result.value) {
				$.ajax({
					type: 'post',
					url: '<?php echo base_url();?>instalasi/update',
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
								setTimeout(function(){
												  window.location.href = "<?php echo base_url() ?>/instalasi";
											}, 1000);
							}
					}
				});
			  }else {     
					Swal.fire("Cancelled", "Update Data di Batalkan", "error");   
				} 
			})

		});
	});	
</script>
