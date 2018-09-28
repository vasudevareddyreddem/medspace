<section class="content">
        <div class="container-fluid">
       
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Print Stickers</h2>
                       
                        </div>
                        <div class="body">
						
                    <form id="defaultForm" method="post" class="form-horizontal" action="">
						<div class="form-group">
                            <label class="col-lg-3 control-label">HCF</label>
                            <div class="col-lg-5">
                                <select class="form-control" required="required" name="type" id="type" style="width:100%;">
                                    <option value = "">Select</option>
                                    <option value = "">xxxxxx</option>
                                    <option value = "">xxxxxx</option>
                                    <option value = "">xxxxxx</option>
                                    <option value = "">xxxxxx</option>
                                </select>  
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">CBWTF</label>
                            <div class="col-lg-5">
                                <select class="form-control" required="required" name="type" id="type" style="width:100%;">
                                    <option value = "">Select</option>
                                    <option value = "">xxxxxx</option>
                                    <option value = "">xxxxxx</option>
                                    <option value = "">xxxxxx</option>
                                    <option value = "">xxxxxx</option>
                                </select>  
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Category</label>
                            <div class="col-lg-5">
                                <select class="form-control" required="required" name="type" id="type" style="width:100%;">
                                    <option value = "">Select</option>
                                    <option value = "">Yellow</option>
                                    <option value = "">Red</option>
                                    <option value = "">Blue</option>
                                    <option value = "">White</option>
                                </select>  
                            </div>
                        </div>     
					
						<div class="form-group">
                            <label class="col-lg-3 control-label">Sticker Size</label>
                            <div class="col-lg-5">
                                <select class="form-control" required="required" name="type" id="type" style="width:100%;">
                                    <option value = "">Select</option>
                                    <option value = "">100 x 40 (mm)</option>
                                    <option value = "">50 x 35 (mm)</option>
                                    
                                </select>  
                            </div>
                        </div> 

                      
                        <div class="form-group">
                            <div class="col-lg-9 col-lg-offset-3">
                                <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Genarate Stickers</button>
                            </div>
                        </div>
                    </form>
                        </div>
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
            hospital_name: {
                 validators: {
					notEmpty: {
						message: 'Health Care Facility is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Health Care Facility can only consist of Alphanumeric, space and dot'
					}
				}
            },
			
			type: {
                 validators: {
					  notEmpty: {
						message: 'Type is required'
					}
                }
            },
			route_number: {
                 validators: {
					  notEmpty: {
						message: 'Route Number is required'
					},
                    regexp: {
					regexp:  /^[0-9]*$/,
					message:'Route Number can only consist of digits'
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
			no_of_beds: {
                validators: {
					 notEmpty: {
						message: 'No of beds is required'
					},
                    regexp: {
					regexp:  /^[0-9]*$/,
					message:'No of beds must be 10 digits'
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
