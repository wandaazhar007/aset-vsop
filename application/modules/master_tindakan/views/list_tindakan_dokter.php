<link rel="stylesheet" href="<?php echo base_url('assets/backend/');?>assets/plugin/datatable/datatables.min.css" />

<div class="row">
	<div class="col-12">
    	<div class="panel panel-default">
        	<div class="panel-head">
            	<a href="<?php echo base_url('master_tindakan/tindakan_dokter/input');?>" class="btn btn-outline btn-secondary btn-pill btn-outline-2x m-1">
                    <i class="far fa-edit mr-2"></i><span>Input Master Tindakan</span>
                </a>
				<!--<button class="btn btn-primary btn-pill" data-toggle="modal" data-target="#basicModal">Launch Basic eModal</button>-->
            </div>
            <div class="panel-body">
            	<table class="table table-striped table-bordered responsive-datatable" cellspacing="0" width="100%">
                	<thead>
                    	<tr>
                        	<th>No</th>
							<th>Nama Tindakan</th>
                            <th>Harga Tindakan</th>
                            <th>Kode Tindakan</th>
                            <th>Action</th>
            			</tr>
            		</thead>
                    <tbody>
                    	<?php 
							if(!empty($tindakan))
							{
								
								$no = 1;
								foreach($tindakan as $p)
								{ 
						?>
                       	<tr>
                            <td><?php echo $no++ ?></td>
							<td><?php echo $p->nama_tindakan?></a></td>
                            <td><?php echo $p->harga_tindakan?></td>
                            <td><?php echo $p->kode_tindakan?></td>
                            <td class="text-center">
                            	<button class="btn btn-outline btn-outline-2x btn-pill btn-secondary dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-cogs"></i> </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdown-button-3">
                                    <li><a onClick="return confirm('Apakah Anda yakin ingin Menghapus Data Tindakan Ini ?')" href="<?php echo base_url();?>master_tindakan/tindakan_dokter/delete/<?php echo $p->id_tindakan_dokter;?>">Hapus</a></li>
                                	
									<li><a href="<?php echo base_url();?>master_tindakan/tindakan_dokter/detail/<?php echo $p->id_tindakan_dokter;?>">Edit</a></li>
								</ul>
                        	</td>
                        </tr>
                		<?php }}?>                
                    </tbody>
            	</table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/backend/');?>assets/plugin/datatable/datatables.min.js"></script>

<script type="text/javascript">
	$( document ).ready(function() {
		$('.responsive-datatable').DataTable({
        responsive: true,
        pagingType: 'full_numbers',
        "language": {
            "paginate": {
                "first":       '<i class="ti-angle-double-left"></i>',
                "previous":    '<i class="ti-angle-left"></i>',
                "next":        '<i class="ti-angle-right"></i>',
                "last":        '<i class="ti-angle-double-right"></i>'
            }
        }
    	});
	});
</script>