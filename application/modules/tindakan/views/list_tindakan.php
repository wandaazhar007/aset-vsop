<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/datatables/extensions/buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/pages/datatables_extension_buttons_init.js"></script>

<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">List Tindakan Pasien</h5>
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
				<th>Status Transaksi</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			
			<tr>
				<td><</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>
					
				</td>
				<td class="text-center">
					<ul class="icons-list">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="icon-menu9"></i>
							</a>

							<ul class="dropdown-menu dropdown-menu-right">
								<li><a href="<?php //echo base_url();?>tindakan/detail/<?php //echo $p->id_tindakan;?>">Edit</a>
								</li>
								<li><a href="<?php //echo base_url();?>tindakan/delete/<?php //echo $p->id_tindakan;?>">Delete</a>
								</li>
							</ul>
						</li>
					</ul>
				</td>
			</tr>
			<?php//}}?>
		</tbody>
	</table>
</div>

<!--Modal Detail Pasien-->
<div class="modal fade" id="modalDetail">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="largeModalLabel">Modal title</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
			<div id="detail-result"></div>
			
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-warning">Save changes</button>
			</div>
		</div>
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
		
		
		
		$('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');
		$('.dataTables_length select').select2({
			minimumResultsForSearch: Infinity,
			width: 'auto'
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#dataTable').DataTable();
		$('#dataTable').on('click', '.view_data', function(){
			var detailPasien = $(this).attr('id');
			$.ajax({
				url: "<?php echo base_url()?>pendaftaran/get_pasien_result",
				method: "POST",
				data: { detailPasien:detailPasien },
				success: function(data){
				$('#detail-result');
				$('#modalDetail').modal('show');
				}
			});
		});
	});
</script>