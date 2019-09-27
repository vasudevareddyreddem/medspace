<style>
*{
	margin:0;
	padding:0;
	font-family:arial;
}
.barcode-div img{
	height:4.8cm;
}
.sticker-logo {
	
	text-align:center;
	padding-bottom:0.1cm;
}
.sticker-logo img{
	height:1.5cm;
	margin:0 auto;
	text-align:center;
}
.hosptal_name{
	text-align:center;
	font-size:17px;
	letter-spaci1ng:0.2px;
	min-height:1cm;
	}
.hosptal_name1{
	text-align:center;
	font-size:17px;
	letter-spacing:0.2px;
	
	min-height:1.5cm;
}
.qr-code{
	text-align:center;
	margin:0.1cm 0;
}
.address-section{
	font-size:14px;
	letter-spacing:0.2px;
	margin-top:0.1.5cm;
	text-align:center;
	font-size:11px;
	min-height:0.8cm;
	line-height:0.4cm;
}
.address-section-con{
	font-size:11px;
	letter-spacing:0.2px;
	margin-top:0.1cm;
	text-align:center;
	
}
.hazard img{
	width:50px;
	position: absolute;
	right:0.5cm;
	
}
.authorised{
	font-size:10px;
	text-align:center
}
</style>
<div style="width:21cm;height:29.7cm;overflow:hidden;">
	<div class="row" style="position:relative;margin-top:1.9cm">
		<div style="width:8.5cm;height:12cm;border:1px solid #aaa;overflow:hidden;margin-left:1.33cm">
			<div style="padding:20px 5px;position: relative;">
			<div class="hazard">
				<img style="" src="<?php echo base_url('assets/vendor/images/biohazard.png');?>" alt="bar code" />
			</div>
			<div class="sticker-logo">
			<?php if($plant_details['logo']!=''){ ?>
			<img src="<?php echo base_url('assets/plant_logo/'.$plant_details['logo']); ?>">
			<?php }else{ ?>
			<img src="<?php echo base_url('assets/plant_logo/noimage.jpg'); ?>">
			<?php } ?>
				
			</div>
			<div class="hosptal_name">
				<?php echo $plant_details['disposal_plant_name']; ?> 
				<div class="authorised">
					(Authorised by <?php echo isset($plant_details['state'])?$plant_details['state']:' '; ?>. Pollution Control Board)
				</div>
			</div>
			
				<div style="border-bottom:1px solid #ddd;margin:0.1cm 0;"></div>
			<div class="qr-code">
				Bio-Medical Waste QR code
			</div>
				<div class="barcode-div" style="text-align:center" id="printThis<?php echo htmlentities($hospital_detail['h_id']); ?>">
					<img style="" src="<?php echo base_url('assets/hospital_barcodes/'.$hospital_detail['barcode']);?>" alt="bar code" />
				</div>
				<div class="hosptal_name1">
					<?php echo $hospital_detail['hospital_name']; ?> 
					<?php echo ', '.$hospital_detail['city']; ?> 
					
				</div>
				
				<div style="border-bottom:1px solid #ddd;margin:0.1cm 0;"></div>
				
				<div class="address-section">
				<?php echo isset($plant_details['address1'])?$plant_details['address1'].',':''; ?>
				<?php echo isset($plant_details['address2'])?$plant_details['address2'].',':''; ?>
				<?php echo isset($plant_details['city'])?$plant_details['city'].',':''; ?>
				<?php echo isset($plant_details['state'])?$plant_details['state'].',':''; ?>
				<?php echo isset($plant_details['country'])?$plant_details['country'].',':''; ?>
				<?php echo isset($plant_details['pincode'])?$plant_details['pincode'].'.':''; ?>
				</div>
				<div class="address-section-con">
				<?php echo isset($plant_details['mobile'])?$plant_details['mobile']:''; ?> | <?php echo isset($plant_details['email'])?$plant_details['email']:''; ?>
				</div>
				
				
			</div>
		</div>
		
	</div>
	
	
</div>
<script>
	function myFunction() {
		    document.getElementById("print_btn").style.display = 'none';
	    window.print();
	}
</script>