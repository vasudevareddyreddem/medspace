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
						<form id="add_invoice" action="<?php echo base_url('invoice/permissionpost'); ?>" method="POST">
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
<script>
	$(document).ready(function(){
	      var i=1;
	     $("#add_row").click(function(){
	      $('#addr'+i).html('<td><div class="form-group"><label>Category</label><div class=" "><select class="form-control" name="category[]"><option value = "">Select</option><option value = "Yellow">Yellow</option><option value = "Red">Red</option><option value = "Blue">Blue</option><option value = "White">White</option></select></div></div></td><td><div class="form-group"><label>Size</label><div class=" "><select class="form-control" name="size[]"><option value = "">Select</option><option value ="100 x 40 (mm)">100 x 40 (mm)</option><option value ="64 x 34 (mm)">64 x 34 (mm)</option><option value ="45 x 21 (mm)">45 x 21 (mm)</option><option value ="48 x 24 (mm)">48 x 24 (mm)</option>	<option value ="38 x 25 (mm)">38 x 25 (mm)</option> </select></div></div></td><td><div class="form-group"><label>HSN/SAC</label><div class=" "><input   name="hsn_sac[]" placeholder="HSN/SAC" type="text" class="form-control "></div></div></td><td><div class="form-group"><label>Quantity</label><div class=" "><input name="quantity[]" placeholder="Quantity" type="text" class="form-control "></div></div></td><td><div class="form-group"><label>Rate</label><div class=" "><input name="rate[]" placeholder="Rate" type="text" class="form-control "></div></div></td><td><div class="form-group"><label>Disc. %</label><div class=" "><input name="discount[]" placeholder="Disc. %" type="text" value="0" class="form-control "></div></div><td>');
	
	      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
	      i++; 
	  });
	     $("#delete_row").click(function(){
	    	 if(i>1){
			 $("#addr"+(i-1)).html('');
			 i--;
			 }
		 });
	
	});
	$(document).ready(function() {
   
    $('#add_invoice').bootstrapValidator({
//       
        fields: {
            e_way_bill_no: {
                validators: {
					notEmpty: {
						message: 'e-Way Bill No is required'
					}
				}
            },
			plant_id: {
                validators: {
					notEmpty: {
						message: 'Plant is required'
					}
				}
            },
			hcf_id: {
                validators: {
					notEmpty: {
						message: 'Hcf is required'
					}
				}
            },igst: {
                validators: {
					notEmpty: {
						message: 'IGST is required'
					}
				}
            },'category[]': {
                validators: {
					notEmpty: {
						message: 'Category is required'
					}
				}
            },'size[]': {
                validators: {
					notEmpty: {
						message: 'Size is required'
					}
				}
            },'quantity[]': {
                validators: {
					notEmpty: {
						message: 'Quantity is required'
					}
				}
            },'rate[]': {
                validators: {
					notEmpty: {
						message: 'Rate is required'
					}
				}
            },'discount[]': {
                validators: {
					notEmpty: {
						message: 'Discount is required'
					}
				}
            }
        }
    });
});
</script>