<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Medspace</title>
   

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

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url(); ?>assets/vendor/css/themes/all-themes.css" rel="stylesheet" />
	<script src="<?php echo base_url(); ?>assets/vendor/plugins/jquery/jquery.min.js"></script>
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait Medspace is Loading...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo base_url(); ?>">Medspace</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
			
			
			
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url(); ?>assets/vendor/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo isset($details['name'])?$details['name']:''; ?></div>
                    <div class="email"><?php echo isset($details['email_id'])?$details['email_id']:''; ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
						<?php if($details['role']!=1){  ?>
                            <li><a href="<?php echo base_url('dashboard/profile'); ?>"><i class="material-icons">person</i>Profile</a></li>
                        <?php } ?>
							<li role="seperator" class="divider"></li>
                            <li><a href="<?php echo base_url('dashboard/changepassword'); ?>"><i class="material-icons">input</i>Change Password</a></li>
                            <li><a href="<?php echo base_url('dashboard/logout'); ?>"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="<?php echo base_url('dashboard'); ?>">
                            <i class="material-icons">dashboard </i>
                            <span>Dashboard</span>
                        </a>
                    </li>
					
					<?php if($details['role']==1){ ?>
                   
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">home</i>
                            <span>Hospital</span>
                        </a>
                        <ul class="ml-menu">
                           <li>
								<a href="<?php echo base_url('hospital/add'); ?>">Add hospital</a>
							</li>
							<li>
								<a href="<?php echo base_url('hospital/lists'); ?>">Hospital List</a>
							</li>
                            
                        </ul>
                    </li>
					<li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">home</i>
                            <span>BMW vehical </span>
                        </a>
                        <ul class="ml-menu">
                           <li>
								<a href="<?php echo base_url('garbage/add'); ?>">Add BMW vehical </a>
							</li>
							<li>
								<a href="<?php echo base_url('garbage/lists'); ?>">BMW vehical List</a>
							</li>
                            
                        </ul>
                    </li>
					<li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">home</i>
                            <span>CBWTF</span>
                        </a>
                        <ul class="ml-menu">
                           <li>
								<a href="<?php echo base_url('plant/add'); ?>">Add CBWTF</a>
							</li>
							<li>
								<a href="<?php echo base_url('plant/lists'); ?>">CBWTF List</a>
							</li>
                            
                        </ul>
                    </li>
					
					<?php }else if($details['role']==3){  ?>
					<!--Garbage-->
					<li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">home</i>
                            <span>BMW vehical  Man portal </span>
                        </a>
                        <ul class="ml-menu">
                           <li>
								<a href="garbage-truck-man.php">Scan</a>
							</li>
							
                            
                        </ul>
                    </li>
					
					<?php }else if($details['role']==4){   ?>
					<li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">home</i>
                            <span>Garbage Plant </span>
                        </a>
                        <ul class="ml-menu">
                           <li>
								<a href="<?php echo base_url('plant/details'); ?>">Add Waste</a>
								<a href="<?php echo base_url('plant/details_list'); ?>">Waste List</a>
							</li>
							
                            
                        </ul>
                    </li>
					<li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">home</i>
                            <span>Disposal Waste </span>
                        </a>
                        <ul class="ml-menu">
                           <li>
								<a href="<?php echo base_url('plant/disposal'); ?>">Disposal  Waste</a>
								<a href="<?php echo base_url('plant/disposal_list'); ?>">Disposal  List</a>
							</li>
							
                            
                        </ul>
                    </li>
					
					<?php }else if($details['role']==2){  ?>
					<li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">home</i>
                            <span>Invoice </span>
                        </a>
                        <ul class="ml-menu">
                           <li>
								<a href="<?php echo base_url('hospital/invoice_list'); ?>">Invoice List</a>
								<a href="<?php echo base_url('hospital/garbage_list'); ?>">BMW List</a>
							</li>
							
                            
                        </ul>
                    </li>
					<?php } ?>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                   <a href="javascript:void(0);">Medspace</a>.
                </div>
               
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        
    </section>

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