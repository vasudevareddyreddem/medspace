<section class="content">
   <div class="container-fluid">
      <!-- Basic Validation -->
      <div class="row clearfix">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
               <div class="header">
                  <h2>Change Password</h2>
               </div>
			   <?php if($this->session->flashdata('success')): ?>
<div class="alert_msg1 animated slideInUp bg-succ">
   <?php echo $this->session->flashdata('success');?> &nbsp; <i class="glyphicon glyphicon-ok text-success ico_bac" aria-hidden="true"></i>
</div>
<?php endif; ?>
<?php if($this->session->flashdata('error')): ?>
<div class="alert_msg1 animated slideInUp bg-warn">
   <?php echo $this->session->flashdata('error');?> &nbsp; <i class="glyphicon glyphicon-ok text-success ico_bac" aria-hidden="true"></i>
</div>
<?php endif; ?>
               <div class="body">
                 
					<!-- edit profile start-->
					<form id="defaultForm" method="post" class="form-horizontal" action="<?php echo base_url('dashboard/changepassword_post'); ?>">
						
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Old Password</label>
                            <div class="col-lg-5">
                                <input type="password" class="form-control" id="password" name="olpassword" id="olpassword" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label"> New Password</label>
                            <div class="col-lg-5">
                                <input type="password" class="form-control" id="password" name="password"  />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-3 control-label">Confirm Password</label>
                            <div class="col-lg-5">
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"  />
                            </div>
                        </div> 
                       

                        <div class="form-group">
                            <div class="col-lg-9 col-lg-offset-3">
                                <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Change Password</button>
                                
                            </div>
                        </div>
                    </form>
					<!-- edit profile end-->
                  <div class="clearfix">&nbsp;</div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
	<script>
              $(function() {
    $('#profile-image1').on('click', function() {
        $('#profile-image-upload').click();
    });
});       
              </script> 
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
            olpassword: {
                 validators: {
					notEmpty: {
						message: 'Old Password is required'
					},
					stringLength: {
                        min: 6,
                        message: 'Old Password  must be at least 6 characters'
                    },
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~'"\\|=^?$%*)(_+-]*$/,
					message: 'Old Password wont allow <>[]'
					}
				}
            }, 
			password: {
                 validators: {
					notEmpty: {
						message: 'New Password is required'
					},
					stringLength: {
                        min: 6,
                        message: 'New Password  must be at least 6 characters'
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
						message: 'Confirm password is required'
					},
					identical: {
						field: 'password',
						message: 'Password and Confirm Password do not match'
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