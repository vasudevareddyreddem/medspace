
                       
				<div   style="width:189px;height:189px;border:1px solid #ddd;overflow:hidden;">
					<div style=" ;padding:10px;">
					 <div  style="margin:3px 20px">Bio Medical Waste </div>
							 <div style="margin:3px 20px;font-size:14px">Date: <span><?php echo date('d- M- Y',strtotime(htmlentities($bio_medicaldetails['create_at'])));?></span></div>
										
							 <div class="" id="printThis<?php echo htmlentities($bio_medicaldetails['id']); ?>">
								<img style="width:auto; height: 80px;margin-left:40px;" src="<?php echo base_url('assets/bio_medical_barcodes/'.$bio_medicaldetails['barcode']);?>" alt="bar code">
										 <div style="margin:2px;font-size:11px;	"><?php echo htmlentities($bio_medicaldetails['color_type']); ?> <?php echo htmlentities($bio_medicaldetails['no_of_kgs']); ?>.<?php echo htmlentities($bio_medicaldetails['weight_type']); ?> [Bags <?php echo htmlentities($bio_medicaldetails['no_of_bags']); ?>]</div>
										 <div style="margin:3px;font-size:13px;"><strong><?php echo $bio_medicaldetails['hospital_name']; ?></strong></div>
										
							 </div>
					</div>
                </div>
				<div class="clearfix">&nbsp;</div>
				<a onclick="myFunction()" id="print_btn" style="border:none;background-color:#00b0e4;color:#fff;padding:5px;border-radius:5px;">print</button>
     


<script>
function myFunction() {
	    document.getElementById("print_btn").style.display = 'none';
    window.print();
}
</script>