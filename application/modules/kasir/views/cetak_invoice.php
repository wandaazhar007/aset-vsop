
<html>

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Editable Invoice</title>
	
	<link rel='stylesheet' type='text/css' href='<?php echo base_url('assets/invoice/');?>css/style.css' />
	<link rel='stylesheet' type='text/css' href='<?php echo base_url('assets/invoice/');?>css/print.css' media="print" />
	<script type='text/javascript' src='<?php echo base_url('assets/invoice/');?>js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='<?php echo base_url('assets/invoice/');?>js/example.js'></script>

</head>

<body>
<?php 
if( !empty($all) || !isset($all) )
{
	foreach($all as $i){ 
?>
	<div id="page-wrap">
		<div>
		<img id="image" src="<?php echo base_url('assets/images/');?>logo_rmc.jpg" alt="logo" style="width: 200px;height: 150px;float: left"/>
		<center>
		<br>
		<h1>KLINIK MRC</h1>
		<h3>Layanan Dokter Rehabilitasi Medik</h3>
		<h3>Jl. Rawa Buntu Utara UA 23 Sektor 1-2 EXT Serpong</h3>
		<h3>No. Telp : 0819-0824-2345</h3>
		</center>
		</div>
	
		<div style="clear:both"></div>
		<hr style="border: 3px solid #000000">
		<br>
		<div id="customer">

			<h5 id="customer-title"><?php echo $i->no_rm ;?> / <?php echo $i->nama_pasien ;?></h5>
			<p><br><br><?php echo $i->alamat ;?></p>
			<br>
            <table id="meta">
                <tr>
                    <td class="meta-head">Invoice </td>
					<td><p style="font-size: 12px"> #<?php echo $i->id_invoice ;?></p></td>
                </tr>
                <tr>

                    <td class="meta-head">Tanggal</td>
                    <td><p style="font-size: 14px"><?php echo $this->utilities->tanggal(date("Y-m-d")); ?></p></td>
                </tr>

            </table>
		
		</div>
		
		<table id="items">
		
		  <tr>
		      <th>Nama Tindakan</th>
		      <th>Pelaksana</th>
		      <th>Harga</th>
		      <th>Qty</th>
		      <th>Total</th>
		  </tr>
		  <?php
			if( !empty($allitem) || !isset($allitem) )
				{
					foreach($allitem as $p){ 
			?>
			
		  <tr class="item-row">
		      <td class="description"><?php echo $p->nama_tindakan ;?></td>
		      <td class="item-name"><?php echo $p->nama_petugas ;?></td>
		      <td><?php echo $this->utilities->rupiah($p->harga_tindakan) ;?></td>
		      <td><?php echo $p->jumlah ;?></td>
		      <td><?php $total = ($p->harga_tindakan*$p->jumlah) ;
							echo $this->utilities->rupiah($total);
				
				?></td>
		  </tr>
			<?php }} ?>

		
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance" style="text-align: center">Total</td>
		      <td class="total-value balance"><div class="due">
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
				  </div></td>
		  </tr>
		
		</table>
		<br>
		<div style= "float: right">
		<center>
		<p> Tangerang Selatan, <?php echo $this->utilities->tanggal(date("Y-m-d")); ?> </p>	
		<p> KASIR </p>
		
		<br>
		<br>
		<br>
		<br>
		
		<p> <?php echo $this->datamapper->rowData('tb_login', 'nama_lengkap', 'id', $this->session->userdata('id')); ?> </p>
		</center>
		</div>
		<br><br><br><br>
		<br><br><br><br>
		<div>
		<hr style="border: 1px solid #000000">
		<p> Copyright by Appdev.id</p>
		</div>
		
		
	
	</div>
	<?php }} ?>
</body>

</html>