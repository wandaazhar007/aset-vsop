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
                    <span class="panel-title-text">Input Master Tindakan</span>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" action="#<?php //echo base_url(); ?>pendaftaran/save" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Nama Tindakan</label>
                                    <input type="text" class="form-control" name="rm_rsu">
                                    <span class="form-text">Silahkan isi nama tindakan</span> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Kode Tindakan</label>
                                    <input type="text" class="form-control" name="rm_puskesmas">
                                    <span class="form-text">Silahkan isi kode tindakan </span> 
                                </div>
                            </div>
                        </div>
						
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label">Harga Tindakan</label>
                                    <input type="text" class="form-control" name="nama_pasien" placeholder="Rp.">
                                    <span class="form-text">Silahkan harga tindakan</span> 
                                </div>
                            </div>
                        </div>
                	</div>
                                           
                        <div class="panel-footer text-right">
                            <button type="submit" class="btn btn-success mr-2">Submit</button>
                            <button type="reset" class="btn btn-outline btn-secondary btn-outline-1x" onClick="history.go(-1)">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>