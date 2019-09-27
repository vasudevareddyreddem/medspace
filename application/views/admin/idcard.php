
<style>
*{
margin:0px;
padding:0px;

}
body {
			
			font-family:'verdana';
		}
		
		.id-card {
			
			background-color: #fff;
			height:8.6cm;
			width:5.5cm;
			
			border-radius:10px;
			text-align: center;
			overflow:hidden;
			border:1px solid #ff5722;
			
			
		}
		.id-card img {
			margin: 0 auto;
		}
		.header  {
			width:5.5cm;
			height:40px;
			overflow:hidden;
			background:#fff;
			color:#000;
			display: table-cell;
		vertical-align: middle;
		width:8.5cm;
		padding:0 0.1cm
		border-radius:10px 10px 0px 0px;
		}
		
		.photo  {
			width: 70px;
			height:70px;
			border-radius:50%;
    	
			overflow:hidden;
			margin:0 auto;
			border:1px solid #ddd;
			
		}
		.photo img {
			width: auto;
			height:70px;
			
    		
		}
		h2 {
			font-size: 12px;
			margin: 5px 0 0 0;
		}
		
		.qr-code img {
			height: 2.4cm;
			margin-top:0.1cm;
		}
		p {
			font-size: 5px;
			margin: 2px;
		}
		.id-card-hook {
			background-color: #000;
		    width: 70px;
		    margin: 0 auto;
		    height: 15px;
		    border-radius: 5px 5px 0 0;
		}
		.id-card-hook:after {
			content: '';
		    background-color: #d7d6d3;
		    width: 47px;
		    height: 6px;
		    display: block;
		    margin: 0px auto;
		    position: relative;
		    top: 6px;
		    border-radius: 4px;
		}
		.id-card-tag-strip {
			width: 45px;
		    height: 40px;
		    background-color: #003f7f;
		    margin: 0 auto;
		    border-radius: 5px;
		    position: relative;
		    top: 9px;
		    z-index: 1;
		    border: 1px solid #04284d;
		}
		.id-card-tag-strip:after {
			content: '';
		    display: block;
		    width: 100%;
		    height: 1px;
		    background-color: #c1c1c1;
		    position: relative;
		    top: 10px;
		}
		.id-card-tag {
			width: 0;
			height: 0;
			border-left: 100px solid transparent;
			border-right: 100px solid transparent;
			border-top: 100px solid #50b339;
			margin: -10px auto -30px auto;
		}
		.id-card-tag:after {
			content: '';
		    display: block;
		    width: 0;
		    height: 0;
		    border-left: 50px solid transparent;
		    border-right: 50px solid transparent;
		    border-top: 100px solid #d7d6d3;
		    margin: -10px auto -30px auto;
		    position: relative;
		    top: -130px;
		    left: -50px;
		}
		.role-title {
			font-size:11px;
			text-algin:center;
			margin:0.1cm 0;
		}
		.mobile-num {
			font-size:12px;
			margin-top:0.1cm;
			text-align:left;
		}
		.mobile-num span{
			width:100px;
		}
		
</style>

	<div class="id-card-holder">
		<div class="id-card">
			
			<div class="header">
				<h5 style="margin:0.1cm 0"><?php echo isset($details['plant_name'])?$details['plant_name']:''; ?></h5>
			</div>
			<div style="padding: 5px">
			<div class="photo">
				<?php if($details['profile_pic']!=''){ ?>
					<img src="<?php echo base_url('assets/plant_logo/'.$details['profile_pic']); ?>">
				<?php }else{ ?>
					<img src="<?php echo base_url('assets/plant_logo/pic.png'); ?>">
				<?php } ?>
			</div>
			<h2><?php echo isset($details['name'])?$details['name']:''; ?></h2>
			<div class="role-title"><?php echo isset($details['role'])?$details['role']:''; ?></div>
			<div class="qr-code">
				<img src="<?php echo base_url('assets/login_qrcode_img/'.$details['qr_code']); ?>">
			<div class="mobile-num"><span> Mobile &nbsp;</span>: <?php echo isset($details['mobile'])?$details['mobile']:''; ?></div>
			<div class="mobile-num"><span> Email </span> : <?php echo isset($details['email_id'])?$details['email_id']:''; ?></div>
			
			
			
			
			

		</div>
		</div>
	</div>