<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/datatables/datatables.min.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/datatables/extensions/jszip/jszip.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/datatables/extensions/buttons.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/pages/datatables_extension_buttons_init.js"></script>

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
	<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/pages/form_select2.js"></script>
<!-- /theme JS files -->

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
				<form action="<?php echo base_url()?>laporan" id="form-registrasi" method="get" class="form-horizontal form-bordered" role="form" enctype="multipart/form-data">
					<div class="form-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<div class="col-md-12">
										<div class="input-group">
											<div class="input-group">
												<input type="text" class="form-control daterange-single" id="date" name="tgla" />
												<span class="input-group-addon">TO</span>
												<input type="text" class="form-control daterange-single" id="date" name="tglb"  />
												<span class="input-group-addon"><i class="icon-calendar22"></i></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="panel-footer text-center">
                            <button type="submit" id="submit-laporan" class="btn bg-teal-400 btn-labeled"><b><i class="icon-search4"></i></b>Cari</button>
                        </div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="panel panel-flat">
		<div class="panel-heading">
	<!--		<h5 class="panel-title">List Laporan</h5>-->
			<div class="heading-elements">
				<ul class="icons-list">
					<li><a data-action="collapse"></a></li>
					<li><a data-action="reload"></a></li>
					<li><a data-action="close"></a></li>
				</ul>
			</div>
		</div>

<!--		<table class="table datatable-button-html5-basic" id="pendaftaran">-->
			<table class="table datatables-lists">
			<thead>
				<tr>
					<th>No</th>
					<th>Kode Alat</th>
					<th>Nama Alat</th>
					<th>Merk</th>
					<th>Kategori Alat</th>
					<th>Instalasi</th>
					<th>Tahun Pengadaan</th>
					<th>Supplier</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if(!empty($laporan))
				{

					$no = 1;
					foreach($laporan as $u)
					{ 
				?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $u->kode_alat ?></td>
					<td><?php echo $u->nama_alat ?></td>
					<td><?php echo $u->merk ?></td>
					<td>
						<?php 
							if($u->kategori_alat === 0){
								echo "Alat Medis";
							} else if ($u->kategori_alat === 1) {
								echo "Alat Non Medis";
							}
								echo "Nn";
						?>
					</td>
					<td><?php echo $u->instalasi ?></td>
					<td><?php echo $u->tahun_pengadaan ?></td>
					<td><?php echo $u->supplier ?></td>
					<td></td>
				</tr>
				<?php }}?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$.extend( $.fn.dataTable.defaults, {
			autoWidth: false,
			dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
			language: {
				search: '<span>Filter:</span> _INPUT_',
				lengthMenu: '<span>Show:</span> _MENU_',
				paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
			}
		});
		
		$('.datatables-lists').DataTable({
			buttons: {
				dom: {
					button: {
						className: 'btn btn-teal'
					}
				},
				buttons: [
					{extend: 'copy'},
					{extend: 'csv'},
					{extend: 'excel'},
					{extend: 'pdf'},
					{extend: 'print'}
				]
			}
		});
		
		
		$('.dataTables_filter input[type=search]').attr('placeholder','Cari data laporan...');
		$('.dataTables_length select').select2({
			minimumResultsForSearch: Infinity,
			width: 'auto'
		});
	});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>
