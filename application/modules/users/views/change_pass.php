<div class="row">
	<div class="col-lg-12">
        <div class="panel panel-default">
            
			<?php foreach($login as $u){ ?>
        	<div class="panel-body">
                <form role="form" action="<?php echo base_url(); ?>users/savepass" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="id" value="<?php echo $u->id ?>" hidden=""> 
                                </div>
                            </div>
                        </div>
                    <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                          <label class="col-form-label">Password</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="icon-lock"></i></span>
                              </div>
                              <input type="password" class="form-control" value="<?php echo $u->password ?>" readonly>
                          </div>
                      	</div>
                      </div>
                   </div> 
                    
                    <div class="row">
                       <div class="col-md-6">
                        <div class="form-group">
                          <label class="col-form-label">Password Baru</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="icon-lock"></i></span>
                              </div>
                              <input type="password" class="form-control" name="password" required>
                          </div>
                      </div>
                    </div>
                   </div>
						<div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                                    <button type="reset" class="btn btn-outline btn-secondary btn-outline-1x" onClick="history.go(-1)">Cancel</button>
                                </div>
                            </div>
                    	</div>
                	</div>
                </form>
              <?php } ?>
             </div>
        </div>
	</div>
</div>