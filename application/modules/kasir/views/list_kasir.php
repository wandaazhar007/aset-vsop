<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/datatables/extensions/buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/pages/datatables_extension_buttons_init.js"></script>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">List Kasir</h5>
		<div class="heading-elements">
			<ul class="icons-list">
				<li><a data-action="collapse"></a></li>
				<li><a data-action="reload"></a></li>
				<li><a data-action="close"></a></li>
			</ul>
		</div>
	</div>

	<table class="table datatables-lists">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Pasien</th>
				<th>No Rekam Medis</th>
				<th>Tanggal Kunjungan</th>
				<th>No Handphone</th>
				<th>Jaminan</th>
				<th>Status Cetak</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				if(!empty($allPasien))
				{
					$no = 1;
					foreach($allPasien as $p)
					{ 
			?>
			<tr>
				<td><?php echo $no++ ;?></td>
				<td><?php echo $p->nama_pasien ;?></a></td>
				<td><?php echo $p->no_rm ;?></td>
				<td><?php echo $this->utilities->tanggal_datetime($p->tgl_input) ;?></td>
				<td><?php echo $p->no_hp ;?></td>
				<td><?php echo $p->jaminan_pembayaran ;?></td>
				<td>
					<?php echo $this->mrclibs->statusinvoice($p->status_cetak);?>
				</td>
				<td class="text-center">
					<ul class="icons-list">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-menu9"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-right">
								<li><a href="<?php echo base_url();?>kasir/create_invoice/<?php echo $p->id_registrasi;?>">Lakukan Pembayaran</a>
								</li>
							</ul>
						</li>
					</ul>
				</td>
			</tr>
			<?php }}?>
		</tbody>
	</table>
</div>

<!--Modal Detail Pasien-->

 
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>

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
			buttons: [
				{
					
				},
				{
					
				}
			]
		});
		
		$('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');
		$('.dataTables_length select').select2({
			minimumResultsForSearch: Infinity,
			width: 'auto'
		});
	});
</script>
