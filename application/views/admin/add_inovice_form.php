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
						<form>
							<div class="">
								<div class="row ">
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
										<select class="form-control" name="plant_id">
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
										<label >Supplier’s Ref.</label>
										<input type="text" class="form-control" name="notes" placeholder="Enter Delivery Note" >
									</div>
									<div class="form-group col-md-6">
										<label >Other Reference(s)</label>
										<input type="text" class="form-control" name="notes" placeholder="Enter Delivery Note" >
									</div>
									<div class="form-group col-md-6">
										<label >Buyer’s Order No</label>
										<input type="text" class="form-control" name="notes" placeholder="Enter Delivery Note" >
									</div>
									<div class="form-group col-md-6">
										<label >Dated</label>
										<input type="text" class="form-control" name="notes" placeholder="Enter Delivery Note" >
									</div>
									<div class="form-group col-md-6">
										<label >Despatch Document No</label>
										<input type="text" class="form-control" name="notes" placeholder="Enter Delivery Note" >
									</div>
									<div class="form-group col-md-6">
										<label >Delivery Note Date </label>
										<input type="text" class="form-control" name="notes" placeholder="Enter Delivery Note" >
									</div>
									<div class="form-group col-md-6">
										<label >Despatched throug </label>
										<input type="text" class="form-control" name="notes" placeholder="Enter Delivery Note" >
									</div>
									<div class="form-group col-md-6">
										<label >Destination </label>
										<input type="text" class="form-control" name="notes" placeholder="Enter Delivery Note" >
									</div>
									<div class="form-group col-md-6">
										<label >Bill of Lading/LR-RR No </label>
										<input type="text" class="form-control" name="notes" placeholder="Enter Delivery Note" >
									</div>
									<div class="form-group col-md-6">
										<label>Motor Vehicle No.</label>
										<input type="text" class="form-control" name="notes" placeholder="Enter Delivery Note" >
									</div>
									<div class="form-group col-md-6">
										<label>Terms of Delivery</label>
										<input type="text" class="form-control" name="notes" placeholder="Enter Delivery Note" >
									</div>
									
								</div>
								
									<table class="table table-bordered table-hover" id="tab_logic">
										<tbody>
											<tr id='addr0'>
												<td>
													<div class="form-group">
													<label>Field 1</label>
														<div class=" ">
															<input type="text" class="form-control" placeholder="field 1">
														</div>
													</div>
												</td>
												<td>
													<div class="form-group">
													<label>Field 2</label>
														<div class=" ">
															<input placeholder="field 2" type="text" class="form-control ">
														</div>
													</div>
												</td>
												<td>
													<div class="form-group">
													<label>Field 3</label>
														<div class=" ">
															<input placeholder="field 3" type="text" class="form-control ">
														</div>
													</div>
												</td>
												<td>
													<div class="form-group">
													<label>Field 4</label>
														<div class=" ">
															<input placeholder="field 4" type="text" class="form-control ">
														</div>
													</div>
												</td>
												<td>
													<div class="form-group">
													<label>Field 5</label>
														<div class=" ">
															<input placeholder="field 5" type="text" class="form-control ">
														</div>
													</div>
												</td>
											</tr>
											<tr id='addr1'></tr>
										</tbody>
									</table>	<a id="add_row" class="btn btn-default pull-left">Add Row</a>
									<a id='delete_row' class="pull-right btn btn-default">Delete Row</a>
								</div>
							</div>
						</form>
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
	      $('#addr'+i).html("<td><input type='text' placeholder='Field 1' class='form-control'/></td><td><input type='text' placeholder='Field 2' class='form-control'/></td><td><input type='text' placeholder='Field 3' class='form-control'/></td><td><input type='text' placeholder='Field 4' class='form-control'/></td><td><input type='text' placeholder='Field 5' class='form-control'/></td>");
	
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
</script>