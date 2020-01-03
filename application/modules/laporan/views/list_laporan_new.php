<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/datatables/datatables.min.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/datatables/extensions/jszip/jszip.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/datatables/extensions/buttons.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/pages/datatables_extension_buttons_html5.js"></script>

	<script type="text/javascript" src="<?php echo base_url('assets/backend/assets/');?>plugin/notifications/jgrowl.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/backend/assets/');?>plugin/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/backend/assets/');?>plugin/daterangepicker/daterangepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/pickers/anytime.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/backend/assets/');?>plugin/pickadate/picker.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/pickers/pickadate/picker.date.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/pickers/pickadate/picker.time.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/backend/assets/');?>plugin/pickadate/legacy.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/pages/picker_date.js"></script>

	<script type="text/javascript" src="<?php echo base_url('assets/backend/assets/');?>plugin/ui/ripple.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/core/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/pages/form_select2.js"></script>
<!-- /theme JS files -->

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h6 class="panel-title"><?php echo $title;?></h6>
				<div class="heading-elements">
					<ul class="icons-list">
						<li><a data-action="collapse"></a></li>
						<li><a data-action="reload"></a></li>
						<li><a data-action="close"></a></li>
					</ul>
				</div>
			</div>

			<div class="panel-body" align="center">
				<form action="" id="form-laporan" method="get" class="form-horizontal form-bordered" role="form" enctype="multipart/form-data">
					<div class="form-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<div class="col-md-12">
										<div class="input-group">
											<div class="input-group">
												<input type="text" class="form-control daterange-single" name="tgla" />
												<span class="input-group-addon">TO</span>
												<input type="text" class="form-control daterange-single" name="tglb"  />
												<span class="input-group-addon"><i class="icon-calendar22"></i></span>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2">Pilih Jenis Laporan </label>
									<div class="col-md-10">
										<select class="select-search" id="jenis" name="jenis" data-placeholder="Click To Choose...">
											<option value="">----------------------------</option>
											<option value="1">Pendaftaran</option>
											<option value="2">Keuangan</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="panel-footer text-right">
                            <button type="submit" id="submit-laporan" class="btn bg-primary-400 btn-labeled"><b><i class="icon-search4"></i></b>Cari</button>
                        </div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div id="data_tabel"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	
	var i = 0;
	var form = $('#form-laporan');
	
	$("#submit-laporan").click(function(e){
		
		$.ajax({
		type: 'GET',
		url: '<?php echo base_url()?>laporan/laporan_new/get_data?tgla='+tgla+'&tglb='+tglb+'&jenis='+jenis,
		dataType: 'html',
		beforeSend: function() {
			i++;
		},
		success: function(res) {
			if (res !== '') {
				$('#data_tabel').html(res);
			} else {
				$('#data_tabel').html('');
				Swal.fire({
					  title: '<strong>Data Tidak Ditemukan</strong>',
					  type: 'info',
					  showConfrimButton: false,
					  timer:2000
					})
			}
		},
		error: function(xhr) {
			$(placeholder).text(xhr.statusText + xhr.responseText);
		},
		complete: function() {
			i--;
			if (i <= 0) {
				setTimeout(function(){
				$(placeholder).text('');
				}, 500);
			}
		},
		});
	});
});
</script>