<section class="content">
        <div class="container-fluid">
       
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Edit Disposal Plant</h2>
                       
                        </div>
                        <div class="body">
                    <form id="defaultForm" method="post" class="form-horizontal" action="<?php echo base_url('plant/editpost'); ?>">
					<input type="hidden" name="p_id" id="p_id" value="<?php echo isset($plant_detail['p_id'])?$plant_detail['p_id']:'';?>">
						<div class="form-group">
                            <label class="col-lg-3 control-label">Disposal Plant Name</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="disposal_plant_name" id="disposal_plant_name" placeholder="Disposal Plant Name" value="<?php echo isset($plant_detail['disposal_plant_name'])?$plant_detail['disposal_plant_name']:'';?>" />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-3 control-label">Disposal Plant ID</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="disposal_plant_id" id="disposal_plant_id" placeholder="Disposal Plant ID" value="<?php echo isset($plant_detail['disposal_plant_id'])?$plant_detail['disposal_plant_id']:'';?>" />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-3 control-label">Mobile</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter mobile" value="<?php echo isset($plant_detail['mobile'])?$plant_detail['mobile']:'';?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email address</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="email"  id="email" placeholder="Enter Email address" value="<?php echo isset($plant_detail['email'])?$plant_detail['email']:'';?>" />
                            </div>
                        </div>

                        <
						<div class="form-group">
                            <label class="col-lg-3 control-label">Address</label>
                            <div class="col-lg-5">
                                <textarea class="form-control" rows="5" id="address" name="address"><?php echo isset($plant_detail['address'])?$plant_detail['address']:'';?></textarea>
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
                                <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Add Disposal Plant</button>
                                
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
           
            disposal_plant_name: {
                validators: {
					notEmpty: {
						message: 'Disposal Plant Name is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Disposal Plant Name can only consist of alphanumaric, space and dot'
					}
				}
            },
			disposal_plant_id: {
                validators: {
					notEmpty: {
						message: 'Disposal Plant ID is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Disposal Plant ID can only consist of alphanumaric, space and dot'
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
