<section class="content">
	<div class="container-fluid">
		<!-- Basic Validation -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>Rescan waste details</h2>
					</div>
					<div class="body">
						<form id="add_waste" action="<?php echo base_url('plant/rescanwastepost'); ?>" method="POST">
						<input type="hidden" name="a_id" value="<?php echo isset($pdetails['a_id'])?$pdetails['a_id']:''; ?>">
						<input type="hidden" name="p_id" value="<?php echo isset($pdetails['p_id'])?$pdetails['p_id']:''; ?>">
						<input type="hidden" name="plantaddress" value="<?php echo isset($pdetails['plantaddress'])?$pdetails['plantaddress']:''; ?>">
						<input type="hidden" name="lat" value="<?php echo isset($pdetails['lat'])?$pdetails['lat']:''; ?>">
						<input type="hidden" name="lng" value="<?php echo isset($pdetails['lng'])?$pdetails['lng']:''; ?>">
							<div class="">
								 <div class="row">
									 <div class="form-group col-md-6">
											<label >Hospital</label>
											<select class="form-control" name="h_id">
												<option value="">Select</option>
												<?php if(isset($hos_list) && count($hos_list)>0){ ?>
													<?php foreach($hos_list as $li){ ?>
														<option value="<?php echo $li['h_id']; ?>"><?php echo $li['hospital_name']; ?></option>
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
									<div class="col-sm-4">
									   <label>&nbsp;</label>
									   <div class="input-group date">
										  <button class="btn btn-primary btn-sm">Rescan
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