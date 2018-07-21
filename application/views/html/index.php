<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title></title>
   

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>assets/vendor/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/css/bootstrapValidator.min.css" rel="stylesheet">
	

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>assets/vendor/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>assets/vendor/plugins/animate-css/animate.css" rel="stylesheet" />
	  <!-- JQuery DataTable Css -->
    <link href="<?php echo base_url(); ?>assets/vendor/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Morris Chart Css-->
    <link href="<?php echo base_url(); ?>assets/vendor/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>assets/vendor/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendor/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url(); ?>assets/vendor/css/themes/all-themes.css" rel="stylesheet" />
	<script src="<?php echo base_url(); ?>assets/vendor/plugins/jquery/jquery.min.js"></script>
</head>
<body class="login-page">
    <div class="login-box">
       
        <div class="card card-container" style="top:50">
            <div class="body">
			<div class="">
				<h1 class="text-center">Medspace</h1>
			</div>
                <form id="defaultForm" method="post" class="form-horizontal py-5" action="<?php echo base_url('admin/loginpost'); ?>">
						<div class="form-group">
                          
                            <div class="">
                                <input type="text" name="email_id" id="email_id" class="form-control border-r-0" name="username" placeholder="Enter User Name" />
                            </div>
                        </div>
						<div class="form-group">
                     
                            <div class="">
                                <input type="password" name="password" id="password" class="form-control border-r-0"  placeholder="Enter Password" />
                            </div>
                        </div>
						<div class="form-group">
                     
                            <div class="pull-right">
                               <a target="_blnak" href="<?php echo base_url('privacypolicy'); ?>">Privacy policy</a>
                               <a href="<?php echo base_url('admin/forgotpassword'); ?>">Forgot Password?</a>
                            </div>
                        </div>
						

                       

                        <div class="form-group">
                          
                            <div class=" ">
                                <button type="submit" class="btn btn-primary btn-block" name="signup" value="Sign up">Login</button>
                                
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>

</body>
<script type="text/javascript">
$(document).ready(function() {
    $('#defaultForm').bootstrapValidator({
        fields: {
            
            email_id: {
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
            }
        }
    });

});
</script>


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