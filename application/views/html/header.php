
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
	 <link href="<?php echo base_url(); ?>assets/vendor/css/bootstrap-datepicker.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url(); ?>assets/vendor/css/themes/all-themes.css" rel="stylesheet" />
	<script src="<?php echo base_url(); ?>assets/vendor/plugins/jquery/jquery.min.js"></script>
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <!--<div class="page-loader-wrapper">
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
    </div>-->
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
                <a class="navbar-brand" href="<?php echo base_url('dashboard'); ?>">Medspace</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
			
			
			
            </div>
        </div>
    </nav>
	
	<?php //echo '<pre>';print_r($details);exit; ?>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
				<?php if($details['profile_pic']!=''){ ?>
                    <img src="<?php echo base_url('assets/files/'.$details['profile_pic']); ?>" width="48" height="48" alt="User" />
                <?php }else{ ?>
				        <img src="<?php echo base_url(); ?>assets/vendor/images/user.png" width="48" height="48" alt="User" />

				<?php } ?>  
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo isset($details['name'])?$details['name']:''; ?></div>
                    <div class="email"><?php echo isset($details['email_id'])?$details['email_id']:''; ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
						<?php if($details['role']!=1 && $details['role']!=0){  ?>
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
                    <li class="<?php if(isset($u_url) && $u_url==base_url('dashboard')){echo "active"; } ?>">
                        <a href="<?php echo base_url('dashboard'); ?>">
                            <i class="material-icons">dashboard </i>
                            <span>Dashboard</span>
                        </a>
                    </li>
					<?php if($details['role']==5){ ?>
					<?php if(isset($admin_list) && count($admin_list)>0){ ?>
					<li class="<?php if(isset($u_url) && $u_url==base_url('hospital/waste')){echo "active"; } ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">accessibility</i>
                            <span>Waste List</span>
                        </a>
                        <ul class="ml-menu">
							<?php foreach($admin_list as $list){?>
							   <li>
									<a href="<?php echo base_url('hospital/waste/'.base64_encode($list['a_id'])); ?>">  <i class="material-icons" style="margin-top:-4px; margin-right:5px">chevron_right</i> <?php echo isset($list['name'])?$list['name']:''; ?></a>
								</li>
							<?php } ?>
                        </ul>
                    </li>
					<li class="<?php if(isset($u_url) && $u_url==base_url('hospital/wasteimages')){echo "active"; } ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">accessibility</i>
                            <span>Waste Images List</span>
                        </a>
                        <ul class="ml-menu">
							<?php foreach($admin_list as $list){?>
							   <li>
									<a href="<?php echo base_url('hospital/wasteimages/'.base64_encode($list['a_id'])); ?>">  <i class="material-icons" style="margin-top:-4px; margin-right:5px">chevron_right</i> <?php echo isset($list['name'])?$list['name']:''; ?></a>
								</li>
							<?php } ?>
                        </ul>
                    </li>
					<?php } ?>
					
					<?php }else if($details['role']==0){ ?>
					<li class="<?php if(isset($u_url) && $u_url==base_url('user/add')){echo "active"; } ?><?php if(isset($u_url) && $u_url==base_url('user/lists')){echo "active"; } ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">accessibility</i>
                            <span>Add User</span>
                        </a> 
                        <ul class="ml-menu">
                           <li>
								<a href="<?php echo base_url('user/add'); ?>">  <i class="material-icons" style="margin-top:-4px; margin-right:5px">chevron_right</i> Add Users</a>
							</li>
							<li>
								<a href="<?php echo base_url('user/lists'); ?>"> <i class="material-icons" style="margin-top:-4px; margin-right:5px">chevron_right</i>List</a>
							</li>
                            
                        </ul>
                    </li> 
					<li class="<?php if(isset($u_url) && $u_url==base_url('user/govtadd')){echo "active"; } ?><?php if(isset($u_url) && $u_url==base_url('user/govtlists')){echo "active"; } ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">accessibility</i>
                            <span>Add Govt Login</span>
                        </a> 
                        <ul class="ml-menu">
                           <li>
								<a href="<?php echo base_url('user/govtadd'); ?>">  <i class="material-icons" style="margin-top:-4px; margin-right:5px">chevron_right</i> Add Users</a>
							</li>
							<li>
								<a href="<?php echo base_url('user/govtlists'); ?>"> <i class="material-icons" style="margin-top:-4px; margin-right:5px">chevron_right</i>List</a>
							</li>
                            
                        </ul>
                    </li> 
					<?php }else if($details['role']==1){  ?>
                   <li class="<?php if(isset($u_url) && $u_url==base_url('plant/add')){echo "active"; } ?><?php if(isset($u_url) && $u_url==base_url('plant/lists')){echo "active"; } ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">ac_unit</i>
                            <span>CBWTF</span>
                        </a>
                        <ul class="ml-menu">
                           <li>
								<a href="<?php echo base_url('plant/add'); ?>"> <i class="material-icons" style="margin-top:-4px; margin-right:5px">chevron_right</i>  Add CBWTF</a>
							</li>
							<li>
								<a href="<?php echo base_url('plant/lists'); ?>">  <i class="material-icons" style="margin-top:-4px; margin-right:5px">chevron_right</i> CBWTF List</a>
							</li>
                        </ul>
                    </li>
                    
					<li class="<?php if(isset($u_url) && $u_url==base_url('hospital/add')){echo "active"; } ?><?php if(isset($u_url) && $u_url==base_url('hospital/lists')){echo "active"; } ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">accessibility</i>
                            <span>Health Care Facility</span>
                        </a>
                        <ul class="ml-menu">
                           <li>
								<a href="<?php echo base_url('hospital/add'); ?>">  <i class="material-icons" style="margin-top:-4px; margin-right:5px">chevron_right</i> Add Health Care Facility</a>
							</li>
							<li>
								<a href="<?php echo base_url('hospital/lists'); ?>"> <i class="material-icons" style="margin-top:-4px; margin-right:5px">chevron_right</i>  Health Care Facility List</a>
							</li>
							<li>
								<a href="<?php echo base_url('hospital/waste_list'); ?>"> <i class="material-icons" style="margin-top:-4px; margin-right:5px">chevron_right</i>  Waste List</a>
							</li>
							<li>
								<a href="<?php echo base_url('hospital/wasteimages/'); ?>"> <i class="material-icons" style="margin-top:-4px; margin-right:5px">chevron_right</i>  Waste Images List</a>
							</li>
                            
                        </ul>
                    </li>
					<li class="<?php if(isset($u_url) && $u_url==base_url('garbage/add')){echo "active"; } ?><?php if(isset($u_url) && $u_url==base_url('garbage/lists')){echo "active"; } ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">local_shipping</i>
                            <span>BMW Vehicle </span>
                        </a>
                        <ul class="ml-menu">
                           <li>
								<a href="<?php echo base_url('garbage/add'); ?>">  <i class="material-icons" style="margin-top:-4px; margin-right:5px">chevron_right</i>  Add BMW Vehicle</a>
							</li>
							<li>
								<a href="<?php echo base_url('garbage/lists'); ?>">  <i class="material-icons" style="margin-top:-4px; margin-right:5px">chevron_right</i> BMW Vehicle List</a>
							</li>
                            
                        </ul>
                    </li>
					
					<li class="<?php if(isset($u_url) && $u_url==base_url('invoice/index')){echo "active"; } ?><?php if(isset($u_url) && $u_url==base_url('invoice/checkpermission')){echo "active"; } ?><?php if(isset($u_url) && $u_url==base_url('invoice/lists')){echo "active"; } ?><?php if(isset($u_url) && $u_url==base_url('invoice/stcokhisotory')){echo "active"; } ?><?php if(isset($u_url) && $u_url==base_url('invoice/addstock')){echo "active"; } ?><?php if(isset($u_url) && $u_url==base_url('invoice/stock')){echo "active"; } ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">ac_unit</i>
                            <span>Cover invoice</span>
                        </a>
                        <ul class="ml-menu">
                           <li>
								<a href="<?php echo base_url('invoice/checkpermission'); ?>"> <i class="material-icons" style="margin-top:-4px; margin-right:5px">chevron_right</i> Add</a>
							</li>
							<li>
								<a href="<?php echo base_url('invoice/lists'); ?>">  <i class="material-icons" style="margin-top:-4px; margin-right:5px">chevron_right</i>List</a>
								<a href="<?php echo base_url('invoice/addstock'); ?>">  <i class="material-icons" style="margin-top:-4px; margin-right:5px">chevron_right</i>Stock add</a>
								<a href="<?php echo base_url('invoice/stcokhisotory'); ?>">  <i class="material-icons" style="margin-top:-4px; margin-right:5px">chevron_right</i>Stock History</a>
								<a href="<?php echo base_url('invoice/stock'); ?>">  <i class="material-icons" style="margin-top:-4px; margin-right:5px">chevron_right</i>Stock View</a>
							</li>
                        </ul>
                    </li>
                  
					<li class="<?php if(isset($u_url) && $u_url==base_url('plant/print_stickers')){echo "active"; } ?>">
                        <a href="<?php echo base_url('plant/print_stickers'); ?>">
                            <i class="material-icons">ac_unit</i>
                            <span>Print Stickers</span>
                        </a>
                    </li> 
					<li class="<?php if(isset($u_url) && $u_url==base_url('plant/print_count')){echo "active"; } ?>">
                        <a href="<?php echo base_url('plant/print_count'); ?>">
                            <i class="material-icons">ac_unit</i>
                            <span>Print Stickers count</span>
                        </a>
                    </li>
                    
					
					<?php }else if($details['role']==3){  ?>
					<!--Garbage-->
					<li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">home</i>
                            <span>BMW vehicle  Man portal </span>
                        </a>
                        <ul class="ml-menu">
                           <li>
								<a href="garbage-truck-man.php">Scan</a>
							</li>
							
                            
                        </ul>
                    </li>
					
					<?php }else if($details['role']==4){   ?>
					 <li class="<?php if(isset($u_url) && $u_url==base_url('plant/details')){echo "active"; } ?><?php if(isset($u_url) && $u_url==base_url('plant/details_list')){echo "active"; } ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">ac_unit</i>
                            <span>CBWTF </span>
                        </a>
                        <ul class="ml-menu">
                           <li>
								<a href="<?php echo base_url('plant/details'); ?>"> <i class="material-icons" style="margin-top:-4px; margin-right:5px">chevron_right</i>  Add Waste</a>
								<a href="<?php echo base_url('plant/details_list'); ?>">  <i class="material-icons" style="margin-top:-4px; margin-right:5px">chevron_right</i> Waste List</a>
							</li>
							
                            
                        </ul>
                    </li>
					<li class="<?php if(isset($u_url) && $u_url==base_url('plant/disposal')){echo "active"; } ?><?php if(isset($u_url) && $u_url==base_url('plant/disposal_list')){echo "active"; } ?>">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">filter_hdr</i>
                            <span>Disposal Waste </span>
                        </a>
                        <ul class="ml-menu">
                           <li>
								<a href="<?php echo base_url('plant/disposal'); ?>"> <i class="material-icons" style="margin-top:-4px; margin-right:5px">chevron_right</i>  Add Disposal Waste</a>
								<a href="<?php echo base_url('plant/disposal_list'); ?>">  <i class="material-icons" style="margin-top:-4px; margin-right:5px">chevron_right</i> Disposal  List</a>
							</li>
							
                            
                        </ul>
                    </li>
					<li class="<?php if(isset($u_url) && $u_url==base_url('plant/bio_medical_waste_list')){echo "active"; } ?>">
                        <a href="<?php echo base_url('plant/bio_medical_waste_list'); ?>" class="">
                            <i class="material-icons">filter_hdr</i>
                            <span>Bio Medical Waste </span>
                        </a>
                       
                    </li>
					
					<?php }else if($details['role']==2){  ?>
					<li class="<?php if(isset($u_url) && $u_url==base_url('hospital/bio_medical')){echo "active"; } ?><?php if(isset($u_url) && $u_url==base_url('hospital/bio_medical_view')){echo "active"; } ?>">

                        <a href="<?php echo base_url('hospital/bio_medical'); ?>" class="">
                            <i class="material-icons">filter_hdr</i>
                            <span> Bio Medical Waste </span>
                        </a>
                       
                    </li>
					
					<li class="<?php if(isset($u_url) && $u_url==base_url('hospital/bio_medicallist')){echo "active"; } ?><?php if(isset($u_url) && $u_url==base_url('hospital/bio_medical_view')){echo "active"; } ?>">

                        <a href="<?php echo base_url('hospital/bio_medicallist'); ?>" class="">
                            <i class="material-icons">filter_hdr</i>
                            <span> Bio Medical Waste List</span>
                        </a>
                       
                    </li>
					<li class="<?php if(isset($u_url) && $u_url==base_url('hospital/garbage_list')){echo "active"; } ?>">

                        <a href="<?php echo base_url('hospital/garbage_list'); ?>" class="">
                            <i class="material-icons">insert_drive_file</i>
                            <span>BMW Data Report </span>
                        </a>
                        <ul class="ml-menu">
                           <li>
								<!--<a href="<?php echo base_url('hospital/invoice_list'); ?>">Invoice List</a>
								<a href="<?php echo base_url('hospital/garbage_list'); ?>">BMW List</a>-->
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