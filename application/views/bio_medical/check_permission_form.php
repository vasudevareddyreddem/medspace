<section class="content">
	<div class="container-fluid">
		<!-- Basic Validation -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>Check Security code</h2>
					</div>
					<div class="body">
						<form id="add_invoice" autocomplete="off" action="<?php echo base_url('plant/permissionpost'); ?>" method="POST">
							<div class="">
								<div class="row ">
								<div class="form-group col-md-6">
										<label >Enter security code</label>
										<input type="text" class="form-control" name="security_code" id="security_code" placeholder="Enter security code" >
								</div>					
								<div class="form-group">
                            <div class="col-lg-9 col-lg-offset-3">
                                <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Submit</button>
                            </div>
							</div>
						</form>
							</div>
						<div class="clearfix">&nbsp;</div>
					</div>
				</div>
			</div>
		</div>
</section>
