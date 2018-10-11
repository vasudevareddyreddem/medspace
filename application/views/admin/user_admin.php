<section class="content">
        <div class="container-fluid">
       
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Edit User</h2>
                       
                        </div>
                        <div class="body">
						
                    <form id="defaultForm" method="post" class="form-horizontal" action="<?php echo base_url('user/editpost'); ?>">
						<input  type="hidden" name="a_id" id="a_id" value="<?php echo $user_detail['a_id']; ?>">
						<div class="form-group">
                            <label class="col-lg-3 control-label">Name</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="<?php echo $user_detail['name']; ?>" />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-3 control-label">Mobile Number</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile Number" value="<?php echo $user_detail['mobile']; ?>" />
                            </div>
                        </div>
						
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email address</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email address" value="<?php echo $user_detail['email_id']; ?>" />
                            </div>
                        </div>

                        
						<div class="form-group">
                            <label class="col-lg-3 control-label">Address 1</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" id="address1" name="address1" placeholder="Enter Address 1 " value="<?php echo $user_detail['address1']; ?>"  />
                            </div>
                        </div> 
						<div class="form-group">
                            <label class="col-lg-3 control-label">Address 2</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" id="address2" name="address2" placeholder="Enter Address 2 " value="<?php echo $user_detail['address2']; ?>"  />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-3 control-label">City</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" id="city" name="city" placeholder="Enter City " value="<?php echo $user_detail['city']; ?>"  />
                            </div>
                        </div> 
						<div class="form-group">
                            <label class="col-lg-3 control-label">State</label>
                            <div class="col-lg-5">
							<?php $states = array ('AP' => 'Andhra Pradesh', 'AR' => 'Arunachal Pradesh', 'AS' => 'Assam', 'BR' => 'Bihar', 'CG' => 'Chhattisgarh', 'GA' => 'Goa', 'GJ' => 'Gujarat', 'HR' => 'Haryana', 'HP' => 'Himachal Pradesh', 'JK' => 'Jammu & Kashmir', 'JH' => 'Jharkhand', 'KA' => 'Karnataka', 'KL' => 'Kerala', 'MP' => 'Madhya Pradesh', 'MH' => 'Maharashtra', 'MN' => 'Manipur', 'ML' => 'Meghalaya', 'MZ' => 'Mizoram', 'NL' => 'Nagaland', 'OD' => 'Odisha', 'PB' => 'Punjab', 'RJ' => 'Rajasthan', 'SK' => 'Sikkim', 'TN' => 'Tamil Nadu', 'TS' => 'Telangana', 'TR' => 'Tripura', 'UK' => 'Uttarakhand','UP' => 'Uttar Pradesh', 'WB' => 'West Bengal', 'AN' => 'Andaman & Nicobar', 'CH' => 'Chandigarh', 'DN' => 'Dadra and Nagar Haveli', 'DD' => 'Daman & Diu', 'DL' => 'Delhi', 'LD' => 'Lakshadweep', 'PY' => 'Puducherry'); ?>
								  <select class="form-control" required="required" name="state" id="state" style="width:100%;">
								  <option value = "">Select State</option>
									<?php foreach($states as $key=>$state):
											if(isset($user_detail['state'])&& $user_detail['state'] == $key):
											$selected ='selected=selected';
											else : 
											$selected = '';
											endif;
										 ?>
										<option value = "<?php echo $key?>" <?php echo $selected;?> ><?php echo $state?></option>
									<?php endforeach; ?>
								  </select>  
                            </div>
                        </div> 
						<div class="form-group">
                            <label class="col-lg-3 control-label">Country</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country "  value="<?php echo $user_detail['country']; ?>" />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-3 control-label">Pincode</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter Pincode " value="<?php echo $user_detail['pincode']; ?>"  />
                            </div>
                        </div> 

                       

                        <div class="form-group">
                            <div class="col-lg-9 col-lg-offset-3">
                                <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Update User</button>
                                
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
            name: {
                 validators: {
					notEmpty: {
						message: 'Name is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Name can only consist of Alphanumeric, space and dot'
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
