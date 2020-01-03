<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/plugins/tables/datatables/extensions/buttons.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/limitless/');?>js/pages/datatables_extension_buttons_init.js"></script>

<?php 
if( !empty($all) || !isset($all) )
{
	foreach($all as $i){ 
?>
<div class="row">
	<div class="col-md-12">
			<div class="panel panel-white">
			<div class="panel-heading">
				<h6 class="panel-title">Draft Invoice<a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
				<div class="heading-elements">
					<button type="button" class="btn btn-default btn-xs heading-btn legitRipple" 
							<?php if( $i->status_trans == '1')
									{
										echo 'disabled>';
									}
									else
									{
										echo '><a href="'. base_url('kasir/save_invoice/'.$i->id_registrasi.'').'">';
									}
							?>
		
					<i class="icon-file-check position-left"></i> Save</a></button>
					<button type="button" class="btn btn-default btn-xs heading-btn legitRipple"
						<?php if( $i->status_trans == '0')
									{
										echo 'disabled>';
									}
									else
									{
										echo '><a href="'. base_url('kasir/cetak_invoice/'.$i->id_registrasi.'').'">';
									}
							?>
						
						
						
						<i class="icon-printer position-left"></i> Print</a></button>
				</div>
			</div>

			<div id="invoice-editable" contenteditable="true" class="cke_editable cke_editable_inline cke_contents_ltr" tabindex="0" spellcheck="false" role="textbox" aria-label="Rich Text Editor, invoice-editable" title="Rich Text Editor, invoice-editable" aria-describedby="cke_66" style="position: relative;">
				<div class="panel-body no-padding-bottom">
					<div class="row">
						<div class="col-sm-6 content-group">
							<img data-cke-saved-src="assets/images/logo_demo.png" src="assets/images/logo_demo.png" class="content-group mt-10" alt="" style="width: 120px;">
							<ul class="list-condensed list-unstyled">
								<li>KLINIK MRC</li>
								<li>Layanan Dokter Rehabilitasi Medik</li>
								<li>Jl. Rawa Buntu Utara UA 23 Sektor 1-2 EXT Serpong</li>
								<li>0819-0824-2345</li>
							</ul>
						</div>
						<div class="col-sm-6 content-group">
							<div class="invoice-details">
								<h5 class="text-uppercase text-semibold">Invoice #<?php echo $i->id_transaksi ;?></h5>
								<ul class="list-condensed list-unstyled">
									<li>Tanggal : <span class="text-semibold"><?php echo $this->utilities->tanggal(date("Y-m-d")); ?></span></li>
									<!--<li>Due date: <span class="text-semibold">May 12, 2015</span></li>-->
								</ul>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-lg-9 content-group">
							<span class="text-muted">Invoice To:</span>
							<ul class="list-condensed list-unstyled">
								<li><h5><?php echo $i->nama_pasien ;?></h5></li>
								<li><span class="text-semibold"><?php echo $i->no_rm ;?></span></li>
								<li><?php echo $i->alamat ;?></li>
								<li><?php echo $i->no_hp ;?></li>
								<li><a data-cke-saved-href="#" href="#"><?php echo $i->email ;?></a></li>
							</ul>
						</div>

					</div>
				</div>

				<div class="table-responsive">
					<table class="table table-lg cke_show_border">
						<thead>
							<tr>
								<th>Nama Tindakan</th>
								<th>Pelaksana</th>
								<th class="col-sm-2">Harga</th>
								<th class="col-sm-1">Qty</th>
								<th class="col-sm-2">Total</th>
							</tr>
						</thead>
						<tbodyp
							<?php
							if( !empty($allitem) || !isset($allitem) )
								{
									foreach($allitem as $p){ 
								?>
							<tr>
								<td>
									<?php echo $p->nama_tindakan ;?>
								</td>
								<td><?php echo $p->nama_petugas ;?></td>
								<td>Rp. <?php echo $p->harga_tindakan ;?></td>
								<td><?php echo $p->jumlah ;?></td>
								<td><span class="text-semibold">Rp. <?php echo $total = ($p->harga_tindakan*$p->jumlah) ;?></span></td>
							</tr>
							<?php }} ?>
						</tbody>
					</table>
				</div>
				<div class="panel-body">
					<div class="row invoice-payment">
						<div class="col-sm-7">
							<div class="content-group">
							</div>
						</div>
						<div class="col-sm-5">
							<div class="content-group">
								<h6>Total due</h6>
								<div class="table-responsive no-border">
									<table class="table cke_show_border">
										<tbody>
											<tr>
												<th>Total:</th>
												<td class="text-right text-primary">
													<h5 class="text-semibold">
													<?php 
													if(!empty($allitem))
													{
														$total = 0;
														foreach($allitem as $u)
														{ 
															$tindakan = (($u->harga_tindakan*$u->jumlah));
															$total = $total + $tindakan;
														}

														echo $this->utilities->rupiah($total);
													}
												?>	
													</h5>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php }} ?>