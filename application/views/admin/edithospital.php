<section class="content">
        <div class="container-fluid">
       
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Edit Hospital</h2>
                       
                        </div>
                        <div class="body">
                    <form id="defaultForm" method="post" class="form-horizontal" action="<?php echo base_url('hospital/editpost'); ?>">
						<input type="hidden" name="hos_id" id="hos_id" value="<?php echo isset($hospital_detail['h_id'])?$hospital_detail['h_id']:'';?>">
						<div class="form-group">
                            <label class="col-lg-3 control-label">Hospital Name</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="hospital_name" id="hospital_name" value="<?php echo isset($hospital_detail['hospital_name'])?$hospital_detail['hospital_name']:'';?>" placeholder="Enter Hospital Name" />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-3 control-label">Mobile</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter mobile"  value="<?php echo isset($hospital_detail['mobile'])?$hospital_detail['mobile']:'';?>"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email address</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email address"  value="<?php echo isset($hospital_detail['email'])?$hospital_detail['email']:'';?>"/>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-3 control-label">Address 1</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" id="address1" name="address1" placeholder="Enter Address " value="<?php echo isset($hospital_detail['address1'])?$hospital_detail['address1']:'';?>"/>
                            </div>
                        </div> 
						<div class="form-group">
                            <label class="col-lg-3 control-label">Address 2</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" id="address2" name="address2" placeholder="Enter Address " value="<?php echo isset($hospital_detail['address2'])?$hospital_detail['address2']:'';?>" />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-3 control-label">City</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" id="city" name="city" placeholder="Enter City "  value="<?php echo isset($hospital_detail['city'])?$hospital_detail['city']:'';?>"/>
                            </div>
                        </div> 
						<div class="form-group">
                            <label class="col-lg-3 control-label">State</label>
                            <div class="col-lg-5">
							<?php $states = array ('Andhra Pradesh' => 'Andhra Pradesh', 'Arunachal Pradesh' => 'Arunachal Pradesh', 'Assam' => 'Assam', 'Bihar' => 'Bihar', 'Chhattisgarh' => 'Chhattisgarh', 'Goa' => 'Goa', 'Gujarat' => 'Gujarat', 'Haryana' => 'Haryana', 'Himachal Pradesh' => 'Himachal Pradesh', 'Jammu & Kashmir' => 'Jammu & Kashmir', 'Jharkhand' => 'Jharkhand', 'Karnataka' => 'Karnataka', 'Kerala' => 'Kerala', 'Madhya Pradesh' => 'Madhya Pradesh', 'Maharashtra' => 'Maharashtra', 'Manipur' => 'Manipur', 'Meghalaya' => 'Meghalaya', 'Mizoram' => 'Mizoram', 'Nagaland' => 'Nagaland', 'Odisha' => 'Odisha', 'Punjab' => 'Punjab', 'Rajasthan' => 'Rajasthan', 'Sikkim' => 'Sikkim', 'Tamil Nadu' => 'Tamil Nadu', 'Telangana' => 'Telangana', 'Tripura' => 'Tripura', 'Uttarakhand' => 'Uttarakhand','Uttar Pradesh' => 'Uttar Pradesh', 'West Bengal' => 'West Bengal', 'Andaman & Nicobar' => 'Andaman & Nicobar', 'Chandigarh' => 'Chandigarh', 'Dadra and Nagar Haveli' => 'Dadra and Nagar Haveli', 'Daman & Diu' => 'Daman & Diu', 'Delhi' => 'Delhi', 'Lakshadweep' => 'Lakshadweep', 'Puducherry' => 'Puducherry'); ?>
								  <select class="form-control" required="required" name="state" id="state" style="width:100%;">
								  <option value = "">Select State</option>
									<?php foreach($states as $key=>$state):
											if($hospital_detail['state'] == $state):
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
                            <label class="col-lg-3 control-label">Country</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country " value="<?php echo isset($hospital_detail['country'])?$hospital_detail['country']:'';?>" />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-3 control-label">Pincode</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter Pincode " value="<?php echo isset($hospital_detail['pincode'])?$hospital_detail['pincode']:'';?>" />
                            </div>
                        </div> 
						<div class="form-group">
                            <label class="col-lg-3 control-label">Barcode</label>
                            <div class="col-lg-5">
                               <img style="max-height:50px;width:auto;" class="img-responsive" src="<?php echo base_url('assets/hospital_barcodes/'.$hospital_detail['barcode']);?>">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-3 control-label" id="captchaOperation"></label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control" name="captcha" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-9 col-lg-offset-3">
                                <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Update Hospital</button>
                                
                            </div>
                        </div>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
           
            
            
    </section>
	<script type="text/javascript">
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

    $('#defaultForm').bootstrapValidator({
//     
        fields: {
            hospital_name: {
                 validators: {
					notEmpty: {
						message: 'Hospital Name is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Hospital Name can only consist of alphanumaric, space and dot'
					}
				}
            },
            mobile: {
                validators: {
					 notEmpty: {
						message: 'Mobile Number is required'
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
					  notEmpty: {
						message: 'Address 2 is required'
					},
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
            },
            
            
            captcha: {
                validators: {
                    callback: {
                        message: 'Wrong answer',
                        callback: function(value, validator) {
                            var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                            return value == sum;
                        }
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
