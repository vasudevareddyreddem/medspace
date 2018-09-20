
                       
				<div   style="width:189px;height:189px;border:1px solid #ddd;overflow:hidden;">
					<div style=" ;padding:10px;">
					 <div  style="margin:3px 10px">Bio Medical Waste</div>
					<div style="margin:3px 10px;font-size:15px">Hospital Name:<strong><?php echo $hospital_detail['hospital_name']; ?></strong></div> 		 
										
							 <div class="" id="printThis<?php echo htmlentities($hospital_detail['h_id']); ?>">
								<img style="width:auto; height:auto;margin-right:30px;" src="<?php echo base_url('assets/hospital_barcodes/'.$hospital_detail['barcode']);?>" alt="bar code">
								
										
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