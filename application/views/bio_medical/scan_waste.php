<section class="content">
	<div class="container-fluid">
		<!-- Basic Validation -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>Scan waste details</h2>
						<a href="<?php echo base_url('plant/rescanwaste'); ?>">Rescan</a>
					</div>
					<div class="body">
						<form id="add_waste" action="<?php echo base_url('plant/scanwastepost'); ?>" method="POST">
						<div class="">
								 <div class="row">
									 <div class="form-group col-md-6">
											<label >Hospital</label>
											<select class="form-control" name="h_id" required>
												<option value="">Select</option>
												<?php if(isset($hos_list) && count($hos_list)>0){ ?>
													<?php foreach($hos_list as $li){ ?>
														<option value="<?php echo $li['h_id']; ?>"><?php echo $li['hospital_name']; ?></option>
													<?php } ?>
												<?php } ?>
											</select>
									</div> 
									<div class="form-group col-md-6">
											<label >BMW Vehicle </label>
											<select class="form-control" name="trcuk_id" required>
												<option value="">Select</option>
												<?php if(isset($truck_list) && count($truck_list)>0){ ?>
													<?php foreach($truck_list as $li){ ?>
														<option value="<?php echo $li['a_id']; ?>"><?php echo $li['truck_reg_no']; ?></option>
													<?php } ?>
												<?php } ?>
											</select>
									</div>
									<div class="col-md-6">
									   <label>From</label>
									   <div class="input-group date">
										  <input type="text" name="from_date" class="form-control" value=""  placeholder="From Date" id="jss-date" required>
										  <div class="input-group-addon">
											 <span class="glyphicon glyphicon-th"></span>
										  </div>
									   </div>
									</div>
									<div class="col-md-6">
									   <label>To</label>
									   <div class="input-group date">
										  <input  placeholder="To Date" type="text" name="to_date" value="" class="form-control" id="js-date" required>
										  <div class="input-group-addon">
											 <span class="glyphicon glyphicon-th"></span>
										  </div>
									   </div>
									</div>
									<div class="form-group col-md-6">
											<label >Yellow Waste Bags Range</label>
											<div class="row">
												<div class="col-md-6">
													 <div class="input-group date">
													  <input  placeholder="Bags Range From" type="text" name="y_b_r_w_b_from" value="" class="form-control"  required>
													 </div>
												 </div>
												 <div class="col-md-6">
													 <div class="input-group date">
													  <input  placeholder="Bags Range To" type="text" name="y_b_r_w_b_to" value="" class="form-control" required>
													 </div>
												 </div>
										   </div>
									</div>
									<div class="form-group col-md-6">
											<label >Yellow Waste Kgs Range</label>
											<div class="row">
												<div class="col-md-6">
													 <div class="input-group date">
													  <input  placeholder="kgs Range From" type="text" name="y_b_r_w_k_from" value="" class="form-control"  required>
													 </div>
												 </div>
												 <div class="col-md-6">
													 <div class="input-group date">
													  <input  placeholder="kgs Range To" type="text" name="y_b_r_w_k_to" value="" class="form-control" required>
													 </div>
												 </div>
										   </div>
									</div>
									<div class="form-group col-md-6">
											<label >Blue Waste Bags Range</label>
											<div class="row">
												<div class="col-md-6">
													 <div class="input-group date">
													  <input  placeholder="Bags Range From" type="text" name="b_b_r_w_b_from" value="" class="form-control" required>
													 </div>
												 </div>
												 <div class="col-md-6">
													 <div class="input-group date">
													  <input  placeholder="Bags Range To" type="text" name="b_b_r_w_b_to" value="" class="form-control"  required>
													 </div>
												 </div>
										   </div>
									</div>
									<div class="form-group col-md-6">
											<label >Blue Waste Kgs Range</label>
											<div class="row">
												<div class="col-md-6">
													 <div class="input-group date">
													  <input  placeholder="kgs Range From" type="text" name="b_b_r_w_k_from" value="" class="form-control"  required>
													 </div>
												 </div>
												 <div class="col-md-6">
													 <div class="input-group date">
													  <input  placeholder="kgs Range To" type="text" name="b_b_r_w_k_to" value="" class="form-control"required>
													 </div>
												 </div>
										   </div>
									</div>
									<div class="form-group col-md-6">
											<label >Red Waste Bags Range</label>
											<div class="row">
												<div class="col-md-6">
													 <div class="input-group date">
													  <input  placeholder="Bags Range From" type="text" name="r_b_r_w_b_from" value="" class="form-control"  required>
													 </div>
												 </div>
												 <div class="col-md-6">
													 <div class="input-group date">
													  <input  placeholder="Bags Range To" type="text" name="r_b_r_w_b_to" value="" class="form-control" required>
													 </div>
												 </div>
										   </div>
									</div>
									<div class="form-group col-md-6">
											<label >Red Waste Kgs Range</label>
											<div class="row">
												<div class="col-md-6">
													 <div class="input-group date">
													  <input  placeholder="kgs Range From" type="text" name="r_b_r_w_k_from" value="" class="form-control"  required>
													 </div>
												 </div>
												 <div class="col-md-6">
													 <div class="input-group date">
													  <input  placeholder="kgs Range To" type="text" name="r_b_r_w_k_to" value="" class="form-control" required>
													 </div>
												 </div>
										   </div>
									</div>
									<div class="form-group col-md-6">
											<label >White Waste Bags Range</label>
											<div class="row">
												<div class="col-md-6">
													 <div class="input-group date">
													  <input  placeholder="Bags Range From" type="text" name="w_b_r_w_b_from" value="" class="form-control" required>
													 </div>
												 </div>
												 <div class="col-md-6">
													 <div class="input-group date">
													  <input  placeholder="Bags Range To" type="text" name="w_b_r_w_b_to" value="" class="form-control"  required>
													 </div>
												 </div>
										   </div>
									</div>
									<div class="form-group col-md-6">
											<label >White Waste Kgs Range</label>
											<div class="row">
												<div class="col-md-6">
													 <div class="input-group date">
													  <input  placeholder="kgs Range From" type="text" name="w_b_r_w_k_from" value="" class="form-control"  required>
													 </div>
												 </div>
												 <div class="col-md-6">
													 <div class="input-group date">
													  <input  placeholder="kgs Range To" type="text" name="w_b_r_w_k_to" value="" class="form-control"  required>
													 </div>
												 </div>
										   </div>
									</div>
									<div class="form-group col-md-6">
											<label >Yellow(c) Waste Bags Range</label>
											<div class="row">
												<div class="col-md-6">
													 <div class="input-group date">
													  <input  placeholder="Bags Range From" type="text" name="yc_b_r_w_b_from" value="" class="form-control" required>
													 </div>
												 </div>
												 <div class="col-md-6">
													 <div class="input-group date">
													  <input  placeholder="Bags Range To" type="text" name="yc_b_r_w_b_to" value="" class="form-control"  required>
													 </div>
												 </div>
										   </div>
									</div>
									<div class="form-group col-md-6">
											<label >Yellow(c) Waste Kgs Range</label>
											<div class="row">
												<div class="col-md-6">
													 <div class="input-group date">
													  <input  placeholder="kgs Range From" type="text" name="yc_b_r_w_k_from" value="" class="form-control"  required>
													 </div>
												 </div>
												 <div class="col-md-6">
													 <div class="input-group date">
													  <input  placeholder="kgs Range To" type="text" name="yc_b_r_w_k_to" value="" class="form-control" required>
													 </div>
												 </div>
										   </div>
									</div>
									<div class="col-sm-4">
									   <label>&nbsp;</label>
									   <div class="input-group date">
										  <button class="btn btn-primary btn-sm">Add
										  </button>										  
									   </div>
									</div>
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
$(document).ready(function() {
    $('#js-date').datepicker(
   {  
   format: 'dd-mm-yyyy',
   autoclose:true,
   endDate: "today",
   });
   
   }); 
   $(document).ready(function() {
    $('#jss-date').datepicker(
   {  
   format: 'dd-mm-yyyy',
   autoclose:true,
   endDate: "today",
   });
   
   });
	
</script>