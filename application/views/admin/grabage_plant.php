<section class="content">
        <div class="container-fluid">
                  	 <div id="sucessmsg" style="display:none;"></div>

            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
							BMW Vehicle Details</h2>
                       
                        </div>
                        <div class="body">
						<div class="row">
						<div class="">
						
						<div class="col-md-4  col-md-offset-2">
						 
							<input type="text" class="form-control" onkeyup="search_truck(this.value);" placeholder="Enter Vehicle Registration Number">
						</div>
						<div class="col-md-6 hidden-sm hidden-xs" style="z-index:1" >
						<div class="popover fade right in" role="tooltip" id="popover436935" style="top: 0;  display: block;">
							<div class="arrow" style="top: 50%;"></div>
							
							<div class="popover-content">Enter your Garbage Truck Number to get details</div>
						</div>
						</div>
						</div>
						</div>
						<hr>
						<br>
					
						<!--<div class="col-md-6 px-25px">
						<div class="form-group">
                            <label class="label-control">Route Number</label>
                            <div class="">
                                <input type="text" class="form-control" id="route_number" name="route_number" value="" />
                            </div>
                        </div>
                        </div>-->
						
						<div class="col-md-6 px-25px">
						<div class="form-group">
                            <label class="label-control">Driver Name</label>
                            <div class="">
                                <input type="email" class="form-control" id="drivername" name="drivername" value="" />
                            </div>
                        </div>
                        </div>
						<div class="col-md-6 px-25px">
						<div class="form-group">
                            <label class="label-control"> Driver Mobile Number</label>
                            <div class="">
                                <input type="text" class="form-control" id="drivermobile" name="drivermobile" value="" />
                            </div>
                        </div>
                        </div>
						
						<div class="clearfix"></div>
						<hr>
						   <form id="defaultForm" method="post" class="form-horizontal" action="<?php echo base_url('plant/addwaste'); ?>">
							<input type="hidden" name="truck_id" id="truck_id" value="">
							<input type="hidden" name="route_id" id="route_id" value="">
						<div class="row">
							<div class="col-md-3 form-group">
								<h4 class="text-center text-warning">YELLOW</h4>
									<div class="py-4">
									<img class="img-responsive" src="<?php echo base_url(); ?>assets/vendor/images/yellowbox.png" alt="greenbox">
								</div>
								<input type="text" id="inf_waste_in_qty" name="inf_waste_in_qty" class="form-control" placeholder="Enter No of Bags">
								<br>
								<input type="text" id="inf_waste_in_Kg" name="inf_waste_in_Kg" class="form-control" placeholder="Enter No of Kgs">

							</div>
							<div class="col-md-3 form-group">
							<h4 class="text-center text-danger">RED</h4>
									<div class="py-4">
									<img class="img-responsive" src="<?php echo base_url(); ?>assets/vendor/images/redbox.png" alt="greenbox">
								</div>
									
								<input type="text" id="inf_pla_waste_in_qty" name="inf_pla_waste_in_qty" class="form-control" placeholder="Enter No of Bags">
							<br>
								<input type="text" id="inf_pla_waste_in_Kg" name="inf_pla_waste_in_Kg" class="form-control" placeholder="Enter No of Kgs">
							</div>
							
							<div class="col-md-3 form-group">
								<h4 class="text-center text-primary">BLUE</h4>
									<div class="py-4">
									<img class="img-responsive" src="<?php echo base_url(); ?>assets/vendor/images/bluebox.png" alt="greenbox">
								</div>
									
								<input type="text" id="glassware_waste_in_qty" name="glassware_waste_in_qty" class="form-control" placeholder="Enter No of Bags">
							<br>
								<input type="text" id="glassware_waste_in_kg" name="glassware_waste_in_kg" class="form-control" placeholder="Enter No of Kgs">
							</div>
							<div class="col-md-3 form-group">
							<h4 class="text-center text-success">WHITE</h4>
								<div class="py-4">
									<img class="img-responsive" src="<?php echo base_url(); ?>assets/vendor/images/greenbox.png" alt="greenbox">
								</div>
																<input type="text" id="gen_waste_in_qty" name="gen_waste_in_qty" class="form-control" placeholder="Enter No of Bags"><br>

								<input type="text" id="gen_waste_in_Kg" name="gen_waste_in_Kg" class="form-control" placeholder="Enter No of Kgs"><br>
							</div>
							
						</div>
					
						<hr>
					
						
						<br>
                        <div class="form-group ">
                            <div class="text-center ">
                                <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Submit</button>
                                
                            </div>
                        </div>
                    </form>
					<div class="clearfix">&nbsp;</div>
					
                        </div>
                    </div>
                </div>
            </div>

            
            
    </section>
	<script type="text/javascript">
	
	function search_truck(val){
		var number=val.length;
		if(number >9){
				 jQuery.ajax({
   					url: "<?php echo site_url('plant/get_truck_details');?>",
   					data: {
   						truck_id: val,
   					},
   					dataType: 'json',
   					type: 'POST',
   					success: function (data) {
						jQuery('#sucessmsg').show();
						$('#truck_id').val();
						$('#route_number').val();
						$('#drivermobile').val();
						$('#drivername').val();
						$('#route_id').val();
						if(data.msg==1){
							$('#truck_id').val(data.t_id);
							$('#route_number').val(data.r_no);
							$('#drivermobile').val(data.number);
							$('#drivername').val(data.name);
							$('#route_id').val(data.r_no);
							//$('#sucessmsg').html('<div class="alert_msg1 animated slideInUp bg-succ">Truck Regn number are displayed. <i class="glyphicon glyphicon-ok text-success ico_bac" aria-hidden="true"></i></div>');  

						}else{
							alert("Vehicle Registration Number is  wrong. Please  try  again once");  

						}
						
   					
   				 }
   				});
			
		}
		
	}
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

    $('#defaultForm').bootstrapValidator({
//        
        fields: {
            gen_waste_in_Kg: {
                validators: {
					notEmpty: {
						message: 'No of Kgs is required'
					},
					regexp: {
					regexp: /^[0-9.]*$/,
					message: 'No of Kgs can only consist of digits and dot'
					}
				}
            },
            gen_waste_in_qty: {
                 validators: {
					notEmpty: {
						message: 'No of bags is required'
					},
					regexp: {
					regexp: /^[0-9.]*$/,
					message: 'No of bags can only consist of digits and dot'
					}
				}
            },
			inf_pla_waste_in_Kg: {
                validators: {
					notEmpty: {
						message: 'No of Kgs is required'
					},
					regexp: {
					regexp: /^[0-9.]*$/,
					message: 'No of Kgs can only consist of digits and dot'
					}
				}
            },
            inf_pla_waste_in_qty: {
                 validators: {
					notEmpty: {
						message: 'No of bags is required'
					},
					regexp: {
					regexp: /^[0-9.]*$/,
					message: 'INo of bags can only consist of digits and dot'
					}
				}
            },
			inf_waste_in_Kg: {
                  validators: {
					notEmpty: {
						message: 'No of Kgs is required'
					},
					regexp: {
					regexp: /^[0-9.]*$/,
					message: 'No of Kgs can only consist of digits and dot'
					}
				}
            },
            inf_waste_in_qty: {
                 validators: {
					notEmpty: {
						message: 'No of bags is required'
					},
					regexp: {
					regexp: /^[0-9.]*$/,
					message: 'No of bags can only consist of digits and dot'
					}
				}
            },
			glassware_waste_in_kg: {
                  validators: {
					notEmpty: {
						message: 'No of Kgs is required'
					},
					regexp: {
					regexp: /^[0-9.]*$/,
					message: 'No of Kgs can only consist of digits and dot'
					}
				}
            },
            glassware_waste_in_qty: {
                 validators: {
					notEmpty: {
						message: 'No of bags is required'
					},
					regexp: {
					regexp: /^[0-9.]*$/,
					message: 'No of bags can only consist of digits and dot'
					}
				}
            }
        }
    });

    // Validate the form manually
    $('#validateBtn').click(function() {
        $('#defaultForm').bootstrapValidator('validate');
    });

    $('#resetBtn').click(function() {
        $('#defaultForm').data('bootstrapValidator').resetForm(true);
    });
});
</script>
