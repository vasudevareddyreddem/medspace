<section class="content">
        <div class="container-fluid">
       
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Edit CBWTF</h2>
                       
                        </div>
                        <div class="body">
                    <form id="defaultForm" method="post" class="form-horizontal" action="<?php echo base_url('plant/editpost'); ?>" enctype="multipart/form-data">
					<input type="hidden" name="p_id" id="p_id" value="<?php echo isset($plant_detail['p_id'])?$plant_detail['p_id']:'';?>">
						<div class="form-group">
                            <label class="col-lg-3 control-label">CBWTF Name </label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="disposal_plant_name" id="disposal_plant_name" placeholder="Disposal Plant Name" value="<?php echo isset($plant_detail['disposal_plant_name'])?$plant_detail['disposal_plant_name']:'';?>" />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-3 control-label">Mobile </label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter mobile" value="<?php echo isset($plant_detail['mobile'])?$plant_detail['mobile']:'';?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email address </label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="email"  id="email" placeholder="Enter Email address" value="<?php echo isset($plant_detail['email'])?$plant_detail['email']:'';?>" />
                            </div>
                        </div>
							<div class="form-group">
                            <label class="col-lg-3 control-label">Address 1 </label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" id="address1" name="address1" placeholder="Enter Address " value="<?php echo isset($plant_detail['address1'])?$plant_detail['address1']:'';?>"/>
                            </div>
                        </div> 
						<div class="form-group">
                            <label class="col-lg-3 control-label">Address 2 </label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" id="address2" name="address2" placeholder="Enter Address " value="<?php echo isset($plant_detail['address2'])?$plant_detail['address2']:'';?>" />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-3 control-label">City </label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" id="city" name="city" placeholder="Enter City "  value="<?php echo isset($plant_detail['city'])?$plant_detail['city']:'';?>"/>
                            </div>
                        </div> 
						<div class="form-group">
                            <label class="col-lg-3 control-label">State </label>
                            <div class="col-lg-5">
							<?php $states = array ('Andhra Pradesh' => 'Andhra Pradesh', 'Arunachal Pradesh' => 'Arunachal Pradesh', 'Assam' => 'Assam', 'Bihar' => 'Bihar', 'Chhattisgarh' => 'Chhattisgarh', 'Goa' => 'Goa', 'Gujarat' => 'Gujarat', 'Haryana' => 'Haryana', 'Himachal Pradesh' => 'Himachal Pradesh', 'Jammu & Kashmir' => 'Jammu & Kashmir', 'Jharkhand' => 'Jharkhand', 'Karnataka' => 'Karnataka', 'Kerala' => 'Kerala', 'Madhya Pradesh' => 'Madhya Pradesh', 'Maharashtra' => 'Maharashtra', 'Manipur' => 'Manipur', 'Meghalaya' => 'Meghalaya', 'Mizoram' => 'Mizoram', 'Nagaland' => 'Nagaland', 'Odisha' => 'Odisha', 'Punjab' => 'Punjab', 'Rajasthan' => 'Rajasthan', 'Sikkim' => 'Sikkim', 'Tamil Nadu' => 'Tamil Nadu', 'Telangana' => 'Telangana', 'Tripura' => 'Tripura', 'Uttarakhand' => 'Uttarakhand','Uttar Pradesh' => 'Uttar Pradesh', 'West Bengal' => 'West Bengal', 'Andaman & Nicobar' => 'Andaman & Nicobar', 'Chandigarh' => 'Chandigarh', 'Dadra and Nagar Haveli' => 'Dadra and Nagar Haveli', 'Daman & Diu' => 'Daman & Diu', 'Delhi' => 'Delhi', 'Lakshadweep' => 'Lakshadweep', 'Puducherry' => 'Puducherry'); ?>
								  <select class="form-control" required="required" name="state" id="state" style="width:100%;">
								  <option value = "">Select State</option>
									<?php foreach($states as $key=>$state):
											if($plant_detail['state'] == $state):
											$selected ='selected=selected';
											else : 
											$selected = '';
											endif;
										 ?>
										<option value = "<?php echo $state?>" <?php echo $selected;?> ><?php echo $state?></option>
									<?php endforeach; ?>
								  </select>  
                            </div>
                        </div>  
						<div class="form-group">
                            <label class="col-lg-3 control-label">Country </label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country " value="<?php echo isset($plant_detail['country'])?$plant_detail['country']:'';?>" />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-3 control-label">Pincode </label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter Pincode " value="<?php echo isset($plant_detail['pincode'])?$plant_detail['pincode']:'';?>" />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-3 control-label">Logo</label>
                            <div class="col-lg-5">
                                <input type="file" class="form-control" id="image" name="image" />
                            </div>
							<?php if($plant_detail['logo']!=''){ ?>
							<img  height="50px;" src="<?php echo base_url('assets/plant_logo/'.$plant_detail['logo']); ?>">
							<?Php }?>
                        </div>
						<div class="form-group">
							<div class="">
								  <label class="col-lg-3 control-label">Plant Address</label>
								 <div class="col-lg-5">
									<input type="text" class="form-control" name="plantaddress" id="address" value="<?php echo isset($plant_detail['plantaddress'])?$plant_detail['plantaddress']:''; ?>" placeholder="Enter Address" />
								
								<a href="javascript:void(0);" onclick="get_location();" ><img style="width:30px;" src="<?php echo base_url(); ?>assets/vendor/images/location.png" class="img-responsive" alt="detect" title="Click here to Locate"></a>
								<span id="refresh" style="display:none">
									<img style="width:20px;" src="<?php echo base_url(); ?>assets/vendor/images/loading.gif" class="img-responsive" >
								</span>	
								</div>								
							</div>
							<input type="hidden" id="lat" name="lat" value="<?php echo isset($plant_detail['lat'])?$plant_detail['lat']:''; ?>">
							<input type="hidden" id="lng" name="lng" value="<?php echo isset($plant_detail['lng'])?$plant_detail['lng']:''; ?>">
                        </div>

                        <div class="form-group">
                            <div class="col-lg-9 col-lg-offset-3">
                                <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Update CBWTF</button>
                                
                            </div>
                        </div>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
           
            
            
    </section>
	<script type="text/javascript">
	  function get_location(){
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition);
		} else { 
				x.innerHTML = "Geolocation is not supported by this browser.";
		}	  
	} 
	function showPosition(position) {
	$('#refresh').show();
	var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    $.ajax({
        type:'POST',
        url:'<?php echo base_url('plant/get_location'); ?>',
        data:'latitude='+latitude+'&longitude='+longitude,
        success:function(data){
           var obj = JSON.parse(data);
			$('#refresh').hide();
            if(data.msg=1){
				$("#address").val(obj.add);
				$("#lat").val(latitude);
				$("#lng").val(longitude);
				
            }else{
                $("#address").val('Not Available');
            }
        }
    });
}
$(document).ready(function() {
    
    $('#defaultForm').bootstrapValidator({
//       
        fields: {
           
            disposal_plant_name: {
                validators: {
					notEmpty: {
						message: 'CBWTF Name is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'CBWTF Name can only consist of Alphanumeric, space and dot'
					}
				}
            },
			
			mobile: {
                 validators: {
					 notEmpty: {
						message: ' Mobile Number is required'
					},
                    regexp: {
					regexp:  /^[0-9]{10}$/,
					message:'Mobile Number must be 10 digits'
					}
                }
            },
            
            email: {
                 validators: {
					notEmpty: {
						message: 'Email is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
					message: 'Please enter a valid email address. For example johndoe@domain.com.'
					}
				}
            },
            password: {
                 validators: {
					notEmpty: {
						message: 'Password is required'
					},
					stringLength: {
                        min: 6,
                        message: 'Password  must be at least 6 characters'
                    },
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~'"\\|=^?$%*)(_+-]*$/,
					message: 'Password wont allow <>[]'
					}
				}
            },
            confirmPassword: {
                validators: {
						 notEmpty: {
						message: 'Confirm Password is required'
					},
					identical: {
						field: 'password',
						message: 'password and confirm Password do not match'
					}
					}
            },
            address1: {
                 validators: {
					  notEmpty: {
						message: 'Address 1 is required'
					},
                    regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Address 1 wont allow <> [] = % '
					}
                }
            },
			address2: {
                 validators: {
					  
                    regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Address 2 wont allow <> [] = % '
					}
                }
            },	
			city: {
                 validators: {
					  notEmpty: {
						message: 'City is required'
					},
                    regexp: {
					regexp: /^[a-zA-Z]+$/,
					message:'City can only consist of alphabets',
					}
                }
            },
			state: {
                 validators: {
					  notEmpty: {
						message: 'State is required'
					}
                }
            },
			country: {
                 validators: {
					  notEmpty: {
						message: 'Country is required'
					},
                    regexp: {
					regexp: /^[a-zA-Z]+$/,
					message:'Country can only consist of alphabets',
					}
                }
            },
            pincode: {
                  validators: {
					notEmpty: {
						message: 'Pin code is required'
					},
					regexp: {
					regexp: /^[0-9]{5,7}$/,
					message: 'Pin code  must be  5 to 7 characters'
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
