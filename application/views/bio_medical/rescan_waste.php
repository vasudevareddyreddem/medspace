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
							<div class="">
								<div class="row ">
								<div class="form-group col-md-6">
										<label >Type</label>
										<select class="form-control" name="type">
											<option value="">select</option>
											<option value="1">Before</option>
											<option value="2">Present</option>
										</select>
								</div>
								<div class="form-group col-md-6">
										<label >Vehicel</label>
										<select class="form-control" name="vehicle_id">
											<option value="">Select</option>
											<?php if(isset($v_list) && count($v_list)>0){ ?>
												<?php foreach($v_list as $li){ ?>
													<option value="<?php echo $li['t_id']; ?>"><?php echo $li['truck_reg_no']; ?></option>
												<?php } ?>
											<?php } ?>
										</select>
								</div>
								<div class="form-group col-md-6">
										<label >Address</label>
										<input type="text" class="form-control" name="c_address" id="c_address" placeholder="Enter current address" >
										<input type="hidden" name="lat" id="lat" value="">
										<input type="hidden" name="lng" id="lng" value="">
								</div>					
								
								<div class="col-md-6">
									<button type="submit" class="btn btn-primary" name="signup" value="Sign up">Submit</button>
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
    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(showPosition);
    }else{ 
        $('#c_address').html('Geolocation is not supported by this browser.');
    }
});

function showPosition(position) {
	$('#refresh').show();
	var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    $.ajax({
        type:'POST',
        url:'<?php echo base_url('plant/location'); ?>',
        data:'latitude='+latitude+'&longitude='+longitude,
        success:function(data){
			var obj = JSON.parse(data);
			$('#refresh').hide();
            if(data.msg=1){
				$("#c_address").val(obj.add);
				$("#lat").val(latitude);
				$("#lng").val(longitude);
            }else{
                $("#c_address").val('Not Available');
				$("#lat").val(latitude);
				$("#lng").val(longitude);
            }
        }
    });
}
	$(document).ready(function() {
   
    $('#add_waste').bootstrapValidator({
//       
        fields: {
            type: {
                validators: {
					notEmpty: {
						message: 'Type is required'
					}
				}
            },
			vehicle_id: {
                validators: {
					notEmpty: {
						message: 'Vechile is required'
					}
				}
            },c_address: {
                validators: {
					notEmpty: {
						message: 'Cureent Address is required'
					}
				}
            }
        }
    });
});
</script>