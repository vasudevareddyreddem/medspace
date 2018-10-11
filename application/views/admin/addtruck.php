<section class="content">
        <div class="container-fluid">
       
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Add BMW Vehicle</h2>
                       
                        </div>
                        <div class="body">
                    <form id="defaultForm" method="post" class="form-horizontal" action="<?php echo base_url('garbage/addpost');?>">
						<div class="form-group">
                            <label class="col-lg-3 control-label">Vehicle Registration Number</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="truck_reg_no" id="truck_reg_no" placeholder="Ex : TS02AB4562" />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-3 control-label">Vehicle Owner Name</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="owner_name" id="owner_name" placeholder="Enter Vehicle Owner Name" />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-3 control-label">Vehicle Insurance Number</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="insurence_number" id="insurence_number" placeholder="Enter Vehicle Insurance Number" />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-3 control-label"> Owner Mobile Number</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="owner_mobile" id="owner_mobile" placeholder="Enter Owner Mobile Number" />
                            </div>
                        </div>
						
						<hr>
                       <div class="form-group">
                            <label class="col-lg-3 control-label">Driver Name</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="driver_name" id="driver_name" placeholder="Driver Name" />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-3 control-label">Driver Licence Number</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="driver_lic_no"  id="driver_lic_no" placeholder="Driver Licence Number" />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-3 control-label">Driver Licence Badge Number</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="driver_lic_bad_no" id="driver_lic_bad_no" placeholder="Driver Licence Badge Number" />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-3 control-label"> Driver Mobile</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="driver_mobile" id="driver_mobile" placeholder="Driver Mobile" />
                            </div>
                        </div>
						
						
						<hr>
						 <div class="form-group">
                            <label class="col-lg-3 control-label">Email address</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email address" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Password</label>
                            <div class="col-lg-5">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Confirm Password</label>
                            <div class="col-lg-5">
                                <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Enter Confirm Password " />
                            </div>
                        </div>
<div class="form-group">
                            <label class="col-lg-3 control-label">Address 1</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" id="address1" name="address1" placeholder="Enter Address 1  " />
                            </div>
                        </div> 
						<div class="form-group">
                            <label class="col-lg-3 control-label">Address 2</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" id="address2" name="address2" placeholder="Enter Address 2" />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-3 control-label">City</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" id="city" name="city" placeholder="Enter City " />
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
                                <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country " />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-3 control-label">Pincode</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter Pincode " />
                            </div>
                        </div> 						
                    

                        <div class="form-group">
                            <div class="col-lg-9 col-lg-offset-3">
                                <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Add BMW Vehicle</button>
                                
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
    
    $('#defaultForm').bootstrapValidator({
//       
        fields: {
            truck_reg_no: {
                validators: {
					notEmpty: {
						message: 'Vehicle Registration Number is required'
					},
					regexp: {
					regexp: /^[A-Za-z0-9]{10}$/,
					message: 'Vehicle Registration Number can only consist of Alphanumeric and digits'
					}
				}
            },
            owner_name: {
                validators: {
					notEmpty: {
						message: 'Owner name is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Owner name can only consist of Alphanumeric, space and dot'
					}
				}
            },
			insurence_number: {
                validators: {
					notEmpty: {
						message: 'Vehicle Insurance Number is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Vehicle Insurance Number can only consist of Alphanumeric, space and dot'
					}
				}
            },
			owner_mobile: {
                 validators: {
					 notEmpty: {
						message: ' Owner Mobile Number is required'
					},
                    regexp: {
					regexp:  /^[0-9]{10}$/,
					message:' Owner Mobile Number must be 10 digits'
					}
                }
            },
            driver_name: {
                validators: {
					notEmpty: {
						message: 'Driver name is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Driver name can only consist of Alphanumeric, space and dot'
					}
				}
            },
            driver_lic_no: {
                validators: {
					notEmpty: {
						message: 'Driver Licence Number is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Driver Licence Number can only consist of Alphanumeric, space and dot'
					}
				}
            },
			driver_lic_bad_no: {
                validators: {
					notEmpty: {
						message: 'Driver Licence badge number is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Driver Licence badge number can only consist of Alphanumeric, space and dot'
					}
				}
            },
            driver_mobile: {
               validators: {
					 notEmpty: {
						message: ' Driver Mobile Number is required'
					},
                    regexp: {
					regexp:  /^[0-9]{10}$/,
					message:' Driver Mobile Number must be 10 digits'
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
						message: 'Password and Confirm Password do not match'
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
