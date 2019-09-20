<section class="content">
	<div class="container-fluid">
		<!-- Basic Validation -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>Add Invoice</h2>
					</div>
					<div class="body">
						<form id="add_invoice" target="_balnk" action="<?php echo base_url('invoice/addpost'); ?>" method="POST">
							<div class="">
								<div class="row ">
								<div class="form-group col-md-6">
										<label >Invoice No</label>
										<input type="text" class="form-control" name="e_way_bill_no" placeholder="Invoice No" >
									</div>
								<div class="form-group col-md-6">
										<label for="email">Select Plant</label>
										<select class="form-control" name="plant_id">
											<option value="">select </option>
											<?php if(isset($p_list) && count($p_list)>0){?>
												<?php foreach($p_list as $li){ ?>
													<option value="<?php echo $li['p_id']; ?>"><?php echo $li['disposal_plant_name']; ?> </option>
												<?php } ?>											
											<?php } ?>											
										</select>
									</div>
									
									<div class="form-group col-md-6">
										<label for="email">Select Hcf</label>
										<select class="form-control" name="hcf_id">
											<option value="">select </option>
											<?php if(isset($h_list) && count($h_list)>0){?>
												<?php foreach($h_list as $li){ ?>
													<option value="<?php echo $li['h_id']; ?>"><?php echo $li['hospital_name']; ?> </option>
												<?php } ?>											
											<?php } ?>											
										</select>
									</div>
									<div class="form-group col-md-6">
										<label >Delivery Note</label>
										<input type="text" class="form-control" name="notes" placeholder="Enter Delivery Note" >
									</div>
									<div class="form-group col-md-6">
										<label >Mode/Terms of Payment</label>
											<select class="form-control" name="payment_type">
												<option value="">select </option>
												<option value="Cash">Cash </option>																					
											</select>	
									</div>
									<div class="form-group col-md-6">
										<label >Supplier Name </label>
										<input type="text" class="form-control" name="supplier_ref" placeholder="Enter Supplier’s Ref" >
									</div>
									<div class="form-group col-md-6">
										<label >Other Reference(s)</label>
										<input type="text" class="form-control" name="other_reference" placeholder="Enter Other Reference" >
									</div>
									<div class="form-group col-md-6">
										<label >Buyer’s Order No</label>
										<input type="text" class="form-control" name="buyer_order_no" placeholder="Enter Buyer’s Order No" >
									</div>
									<div class="form-group col-md-6">
										<label >Dated</label>
										<input type="text" class="form-control" name="dated" placeholder="Enter Dated" >
									</div>
									<div class="form-group col-md-6">
										<label >Despatch Document No</label>
										<input type="text" class="form-control" name="despatch_document_no" placeholder="Enter Despatch Document No" >
									</div>
									<div class="form-group col-md-6">
										<label >Delivery Note Date </label>
										<input type="text" class="form-control" name="delivery_note_date" placeholder="Enter Delivery Note Date " >
									</div>
									<div class="form-group col-md-6">
										<label >Despatched throug </label>
										<input type="text" class="form-control" name="despatched_throug" placeholder="Enter Despatched throug" >
									</div>
									<div class="form-group col-md-6">
										<label >Destination </label>
										<input type="text" class="form-control" name="destination" placeholder="Enter Destination" >
									</div>
									<div class="form-group col-md-6">
										<label >Root  No </label>
										<input type="text" class="form-control" name="lr_rr_no" placeholder="Enter Bill of Lading/LR-RR No" >
									</div>
									<div class="form-group col-md-6">
										<label>Motor Vehicle No.</label>
										<input type="text" class="form-control" name="motor_vehicle_no" placeholder="Enter Motor Vehicle No" >
									</div>
									<div class="form-group col-md-6">
										<label>Terms of Delivery</label>
										<input type="text" class="form-control" name="terms_of_delivery" placeholder="Enter Terms of Delivery" >
									</div>
									<div class="form-group col-md-6">
										<label>GST</label>
										<input type="text" class="form-control" name="igst" placeholder="Enter IGST" value="<?php echo isset($bank_details['gst'])?$bank_details['gst']:'0'; ?>" >
									</div>
									<div class="form-group col-md-6">
										<label>Bank Name</label>
										<input type="text" class="form-control" name="bank_name" placeholder="Enter Bank Name" value="<?php echo isset($bank_details['bank_name'])?$bank_details['bank_name']:''; ?>" >
									</div>
									<div class="form-group col-md-6">
										<label>A/c No</label>
										<input type="text" class="form-control" name="ac_no" placeholder="Enter A/c No" value="<?php echo isset($bank_details['ac_no'])?$bank_details['ac_no']:''; ?>" >
									</div>
									<div class="form-group col-md-6">
										<label>Branch & IFS Code </label>
										<input type="text" class="form-control" name="ifsc" placeholder="Enter Branch & IFS Code" value="<?php echo isset($bank_details['ifsc'])?$bank_details['ifsc']:''; ?>" >
									</div>
									
								</div>
								
									<table class="table table-bordered table-hover" id="tab_logic">
										<tbody>
											<tr id='addr0'>
												<td>
													<div class="form-group">
														<label>Category</label>
														<div class=" ">
															<select class="form-control" name="category[]">
																<option value = "">Select</option>
																<option value = "Yellow">Yellow</option>
																<option value = "Red">Red</option>
																<option value = "Blue">Blue</option>
																<option value = "White">White</option>																				
															</select>
														</div>
													</div>
												</td>
												<td>
													<div class="form-group">
														<label>Size</label>
														<div class=" ">
															<input   name="size[]" placeholder="Example:100 x 40 (mm) " type="text" class="form-control ">
														</div>
													</div>
												</td>
												<td>
													<div class="form-group">
													<label>HSN/SAC</label>
														<div class=" ">
															<input   name="hsn_sac[]"placeholder="HSN/SAC" type="text" class="form-control ">
														</div>
													</div>
												</td>
												<td>
													<div class="form-group">
													<label>Quantity</label>
														<div class=" ">
															<input name="quantity[]" placeholder="Quantity" type="text" class="form-control ">
														</div>
													</div>
												</td>
												<td>
													<div class="form-group">
													<label>Rate</label>
														<div class=" ">
															<input name="rate[]" placeholder="Rate" type="text" class="form-control ">
														</div>
													</div>
												</td>
												<td>
													<div class="form-group">
													<label>Disc. %</label>
														<div class=" ">
															<input name="discount[]" placeholder="Disc. %" type="text" class="form-control " value="0">
														</div>
													</div>
												</td>
											</tr>
											<tr id='addr1'></tr>
										</tbody>
									</table>	<a id="add_row" class="btn btn-default pull-left">Add Row</a>
									<a id='delete_row' class="pull-right btn btn-default">Delete Row</a>
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
	      $('#addr'+i).html('<td><div class="form-group"><label>Category</label><div class=" "><select class="form-control" name="category[]"><option value = "">Select</option><option value = "Yellow">Yellow</option><option value = "Red">Red</option><option value = "Blue">Blue</option><option value = "White">White</option></select></div></div></td><td><div class="form-group"><label>Size</label><div class=" "><input   name="size[]" placeholder="Example:100 x 40 (mm) " type="text" class="form-control "></div></div></td><td><div class="form-group"><label>HSN/SAC</label><div class=" "><input   name="hsn_sac[]" placeholder="HSN/SAC" type="text" class="form-control "></div></div></td><td><div class="form-group"><label>Quantity</label><div class=" "><input name="quantity[]" placeholder="Quantity" type="text" class="form-control "></div></div></td><td><div class="form-group"><label>Rate</label><div class=" "><input name="rate[]" placeholder="Rate" type="text" class="form-control "></div></div></td><td><div class="form-group"><label>Disc. %</label><div class=" "><input name="discount[]" placeholder="Disc. %" type="text" value="0" class="form-control "></div></div><td>');
	
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