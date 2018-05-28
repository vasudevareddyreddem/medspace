<section class="content">
        <div class="container-fluid">
       
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Add Garbage Trucks</h2>
                       
                        </div>
                        <div class="body">
                    <form id="defaultForm" method="post" class="form-horizontal" action="<?php echo base_url('garbage/addpost');?>">
						<div class="form-group">
                            <label class="col-lg-3 control-label">Truck Regn number</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="truck_reg_no" id="truck_reg_no" placeholder="Ex : TS 02 4562" />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-3 control-label">Regd Owner</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="owner_name" id="owner_name" placeholder="Enter Owner name" />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-3 control-label">Truck Insurence Number</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="insurence_number" id="insurence_number" placeholder="Enter Truck Insurence Number" />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-3 control-label"> Owner Mobile</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="owner_mobile" id="owner_mobile" placeholder="Enter Owner Mobile" />
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
                            <label class="col-lg-3 control-label">Driver Licence badge number</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="driver_lic_bad_no" id="driver_lic_bad_no" placeholder="Driver Licence badge number" />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-3 control-label"> Driver Mobile</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="driver_mobile" id="driver_mobile" placeholder="Driver Mobile" />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-3 control-label"> Route Number</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="route_no" id="route_no" placeholder="Route Number" />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-3 control-label"> Description</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="description" id="description" placeholder="Description" />
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
                            <label class="col-lg-3 control-label">Retype password</label>
                            <div class="col-lg-5">
                                <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Enter Confirm Password " />
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
                                <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Add Garbage Truck</button>
                                
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
            truck_reg_no: {
                validators: {
					notEmpty: {
						message: 'Truck Regn number is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9.]+$/,
					message: 'Truck Regn number can only consist of alphanumaric, space and dot'
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
					message: 'Owner name can only consist of alphanumaric, space and dot'
					}
				}
            },
			insurence_number: {
                validators: {
					notEmpty: {
						message: 'Truck Insurence Number is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Truck Insurence Number can only consist of alphanumaric, space and dot'
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
					message: 'Driver name can only consist of alphanumaric, space and dot'
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
					message: 'Driver Licence Number can only consist of alphanumaric, space and dot'
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
					message: 'Driver Licence badge number can only consist of alphanumaric, space and dot'
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
			route_no: {
               validators: {
					notEmpty: {
						message: 'Route Number is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Route Number can only consist of alphanumaric, space and dot'
					}
				}
            },
			description: {
               validators: {
					notEmpty: {
						message: 'Description is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Description can only consist of alphanumaric, space and dot'
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
            address: {
                 validators: {
					  notEmpty: {
						message: 'Address is required'
					},
                    regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Address2 wont allow <> [] = % '
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
