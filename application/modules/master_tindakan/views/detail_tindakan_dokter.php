<div class="row">
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="user-avtar">
                    <center><img class="img-fluid" src="<?php echo base_url(); ?>assets/img/logo_rmc.jpg" alt=""></center>
                </div>
                <div class="user-details text-center pt-3">
                    <h2></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-head">
                <div class="panel-title">
                    <span class="panel-title-text">Edit Data Tindakan Dokter</span>
                </div>
            </div>
            <div class="panel-body">
			<?php
				if(!empty($detail_tindakan))
				{
					foreach($detail_tindakan as $i)
					{
			?>
                <form role="form" action="<?php echo base_url(); ?>master_tindakan/tindakan_dokter/update" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Nama Tindakan</label>
                                    <input type="text" class="form-control" name="nama_tindakan" id="nama_tindakan" value="<?php echo $i->nama_tindakan ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Kode Tindakan</label>
                                    <input type="text" class="form-control" name="kode_tindakan" id="kode_tindakan" value="<?php echo $i->kode_tindakan ?>">
                                </div>
                            </div>
                        </div>
						
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Harga Tindakan</label>
                                    <input type="text" class="form-control" name="harga_tindakan" id="haga_tindakan" value="<?php echo $i->harga_tindakan ?>">
                                </div>
                            </div>
                        </div>
                	</div>             
                        <div class="panel-footer text-right">
                            <button type="submit" class="btn btn-success mr-2">Submit</button>
                            <button type="reset" class="btn btn-outline btn-secondary btn-outline-1x" onClick="history.go(-1)">Cancel</button>
                        </div>
                    </div>
					<?php }} ?>
                </form>
            </div>
        </div>
    </div>
</div>