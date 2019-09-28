<style>
   *{
   font-family: 'Source Sans Pro', sans-serif;
   padding:0px;
   margin:0px;
   }
   .yellow-col{
   background-color:yellow;
    width:7mm;
   height:7mm;
   margin:0 auto;
   }
   .red-col{
   background-color:red;
   width:7mm;
   height:7mm;
   margin:0 auto;
   }
   .blue-col{
   background-color:blue;
    width:7mm;
   height:7mm;
   margin:0 auto;
   }
   .white-col{
   background-color:f5f5f5;
   width:7mm;
   height:7mm;
   margin:0 auto;
   }
</style>
<div  style="width:105mm;height:100%;text-align:center;">
	<?php if(isset($print_details) && count($print_details)>0){ ?>
	<?php foreach($print_details as $list){ ?>
	<div style="display:flex;justify-content: center;">
	   <div class="sticker" style="width:50mm;height:50mm;background:#fff;overflow:hidden;position:relative;margin:3mm 0mm 0mm 0mm;border-radius:5px">
		  <div style="">
			 <div >
				<div style="padding:0px;margin-left:8mm;margin-top:1mm;font-size:16px;height:10mm">Seq.No.<?php echo $list[0]['ptcnt'] ; ?> </span></div>
			 </div>
			 <div class="">
				<div>
				   <img style="width:auto;height:30mm;padding:2px 0px;" src="<?php echo base_url('assets/hospital_waste_barcodes/'.$list[0]['barcode']); ?>" alt="<?php echo $list[0]['barcode'] ; ?>" >
				</div>
				<div style="position:absolute;top:1mm;left:1mm" class="<?php echo $list[0]['category'] ; ?>-col"></div>
			 </div>
			 <div >
				<div style="padding:0px;margin:0px;font-size:15px"><?php echo $list[0]['barcodetext'] ; ?></span></div>
			 </div>
		  </div>
	   </div>
	   <div class="sticker" style="width:50mm;height:50mm;background:#fff;overflow:hidden;position:relative;margin:3mm 0mm 0mm 0mm;border-radius:5px">
		  <div style="">
			 <div >
				<div style="padding:0px;margin-left:8mm;margin-top:1mm;font-size:16px;height:10mm">Seq.No.<?php echo $list[1]['ptcnt'] ; ?> </span></div>
			 </div>
			 <div class="">
				<div>
				   <img style="width:auto;height:30mm;padding:2px 0px;" src="<?php echo base_url('assets/hospital_waste_barcodes/'.$list[1]['barcode']); ?>" alt="<?php echo $list[1]['barcode'] ; ?>" >
				</div>
				<div style="position:absolute;top:1mm;left:1mm" class="<?php echo $list[1]['category'] ; ?>-col"></div>
			 </div>
			 <div >
				<div style="padding:0px;margin:0px;font-size:15px"><?php echo $list[1]['barcodetext'] ; ?></span></div>
			 </div>
		  </div>
	   </div>
	   </div>
	<?php } ?>
<?php } ?>

   
   
  
   
</div>