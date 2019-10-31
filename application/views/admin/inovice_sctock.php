<section class="content">
	<div class="container-fluid">
		<!-- Basic Validation -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						 <span class="h3">Stock adjustment</span>  <span class="pull-right">Last Updated Time :<?php echo isset($details['updated_at'])?$details['updated_at']:''; ?></span>
					</div>
					<div class="body">
						<form id="add_invoice" action="<?php echo base_url('invoice/stockpost'); ?>" method="POST">
							<div class="">
								<div class="row ">
								<div class="form-group col-md-6">
										<label >Yellow</label>
										<input type="text" class="form-control" name="yellow" id="yellow" value="<?php echo isset($details['yellow'])?$details['yellow']:''; ?>" placeholder="Enter yellow stcok" >
								</div>
								<div class="form-group col-md-6">
										<label >Red</label>
										<input type="text" class="form-control" name="red" id="red" value="<?php echo isset($details['red'])?$details['red']:''; ?>" placeholder="Enter red stcok" >
								</div>
								<div class="form-group col-md-6">
										<label>White</label>
										<input type="text" class="form-control" name="white" id="white" value="<?php echo isset($details['white'])?$details['white']:''; ?>" placeholder="Enter white stcok" >
								</div>
								<div class="form-group col-md-6">
										<label >Blue</label>
										<input type="text" class="form-control" name="blue" id="blue" value="<?php echo isset($details['blue'])?$details['blue']:''; ?>" placeholder="Enter blue stcok" >
								</div>
								<div class="form-group col-md-6">
										<label >Yellow(C)</label>
										<input type="text" class="form-control" name="yellowc" id="yellowc" value="<?php echo isset($details['yellowc'])?$details['yellowc']:''; ?>" placeholder="Enter Yellow(C) stcok" >
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
<script>
	
	$(document).ready(function() {
   
    $('#add_invoice').bootstrapValidator({
//       
        fields: {
            yellow: {
                validators: {
					notEmpty: {
						message: 'Yellow is required'
					}
				}
            },red: {
                validators: {
					notEmpty: {
						message: 'Red is required'
					}
				}
            },white: {
                validators: {
					notEmpty: {
						message: 'White is required'
					}
				}
            },blue: {
                validators: {
					notEmpty: {
						message: 'Blue is required'
					}
				}
            },yellowc: {
                validators: {
					notEmpty: {
						message: 'Yellow(c) is required'
					}
				}
            }
        }
    });
});
</script>