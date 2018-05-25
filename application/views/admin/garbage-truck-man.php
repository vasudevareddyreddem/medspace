<?php include("header.php"); ?>
<section class="content">
        <div class="container-fluid">
       
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Scan</h2>
                       
                        </div>
                        <div class="body">
						<div class="row">
						<div class="">
						<div class="col-md-2  col-md-offset-3">
							<button class="btn btn-primary pull-right ">Scan Barcode</button>
						</div>
						<div class="col-md-6 hidden-sm hidden-xs" style="z-index:1" >
						<div class="popover fade right in" role="tooltip" id="popover436935" style="top: 0;  display: block;">
							<div class="arrow" style="top: 50%;"></div>
							
							<div class="popover-content">Click here to scan the barcode</div>
						</div>
						</div>
						</div>
						</div>
						<hr>
						<br>
                    <form id="defaultForm" method="post" class="form-horizontal" action="target.php">
					
						<div class="col-md-6 px-25px">
						<div class="form-group">
                            <label class="label-control">Hospital Name</label>
                            <div class="">
                                <input type="text" class="form-control" name="username" value="Test hopital 1" />
                            </div>
                        </div>
                        </div>
						<div class="col-md-6 px-25px">
						<div class="form-group">
                            <label class="label-control">Hospital ID</label>
                            <div class="">
                                <input type="text" class="form-control" name="username" value="Hosp123456" />
                            </div>
                        </div>
                        </div>
						<div class="col-md-6 px-25px">
						<div class="form-group">
                            <label class="label-control">Hospital Email</label>
                            <div class="">
                                <input type="email" class="form-control" name="username" value="hosp@medispace.com" />
                            </div>
                        </div>
                        </div>
						<div class="col-md-6 px-25px">
						<div class="form-group">
                            <label class="label-control">Mobile</label>
                            <div class="">
                                <input type="text" class="form-control" name="username" value="8500226782" />
                            </div>
                        </div>
                        </div>
						<div class="col-md-6 px-25px">
						<div class="form-group">
                            <label class="label-control">Hospital Barcode no</label>
                            <div class="">
                                <input type="text" class="form-control" name="username" value="Bar123456" />
                            </div>
                        </div>
                        </div>
						<div class="col-md-6 px-25px">
						<div class="form-group">
                            <label class="label-control">Others</label>
                            <div class="">
                                <input type="text" class="form-control" name="username" value="others1" />
                            </div>
                        </div>
                        </div>
						<div class="clearfix"></div>
						<hr>
						<div class="row">
							<div class="col-md-3">
							<h4 class="text-center text-success">Genaral Waste</h4>
								<div class="py-4">
									<img class="img-responsive" src="images/greenbox.png" alt="greenbox">
								</div>
								<input type="text" class="form-control" placeholder="Enter Genaral waste in Kgs">
							</div>
							<div class="col-md-3">
							<h4 class="text-center text-danger">Infected Plastics</h4>
									<div class="py-4">
									<img class="img-responsive" src="images/redbox.png" alt="greenbox">
								</div>
								<input type="text" class="form-control" placeholder="Enter Genaral waste in Kgs">
							</div>
							<div class="col-md-3">
								<h4 class="text-center text-warning">Infected Waste</h4>
									<div class="py-4">
									<img class="img-responsive" src="images/yellowbox.png" alt="greenbox">
								</div>
								<input type="text" class="form-control" placeholder="Enter Genaral waste in Kgs">
							</div>
							<div class="col-md-3">
								<h4 class="text-center text-primary">Glassware</h4>
									<div class="py-4">
									<img class="img-responsive" src="images/bluebox.png" alt="greenbox">
								</div>
								<input type="text" class="form-control" placeholder="Enter Genaral waste in Kgs">
							</div>
							
						</div>
						<br>
						<br>
                        <div class="form-group ">
                            <div class="text-center ">
                                <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Submit</button>
                                <button type="submit" class="btn btn-warning" name="signup" value="Sign up">Reset</button>
                                
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
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

    $('#defaultForm').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            firstName: {
                group: '.col-lg-4',
                validators: {
                    notEmpty: {
                        message: 'The first name is required and cannot be empty'
                    }
                }
            },
            lastName: {
                group: '.col-lg-4',
                validators: {
                    notEmpty: {
                        message: 'The last name is required and cannot be empty'
                    }
                }
            },
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_\.]+$/,
                        message: 'The username can only consist of alphabetical, number, dot and underscore'
                    },
                    remote: {
                        type: 'POST',
                        url: 'remote.php',
                        message: 'The username is not available'
                    },
                    different: {
                        field: 'password,confirmPassword',
                        message: 'The username and password cannot be the same as each other'
                    }
                }
            },
            email: {
                validators: {
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    identical: {
                        field: 'confirmPassword',
                        message: 'The password and its confirm are not the same'
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    }
                }
            },
            confirmPassword: {
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required and cannot be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    }
                }
            },
            birthday: {
                validators: {
                    date: {
                        format: 'YYYY/MM/DD',
                        message: 'The birthday is not valid'
                    }
                }
            },
            gender: {
                validators: {
                    notEmpty: {
                        message: 'The gender is required'
                    }
                }
            },
            'languages[]': {
                validators: {
                    notEmpty: {
                        message: 'Please specify at least one language you can speak'
                    }
                }
            },
            'programs[]': {
                validators: {
                    choice: {
                        min: 2,
                        max: 4,
                        message: 'Please choose 2 - 4 programming languages you are good at'
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
<?php include("footer.php"); ?>
