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
<div  style="width:100%;height:100%;text-align:center;">
	<?php if(isset($print_details) && count($print_details)>0){ ?>
	   <?php foreach($print_details as $list){ ?>
	   <div class="sticker" style="width:50mm;height:50mm;background:#fff;overflow:hidden;position:relative;border:0.1px solid #ddd;margin:3mm 3mm 0mm 3mm;">
		  <div style="">
			 <div >
				<div style="padding:0px;margin-left:8mm;margin-top:1mm;font-size:16px;height:10mm">Seq.No.<?php echo $list['ptcnt'] ; ?> </span></div>
			 </div>
			 <div class="">
				<div>
					<img style="width:auto;height:30mm;padding:2px 0px;" src="<?php echo base_url('assets/hospital_waste_barcodes/'.$list['barcode']); ?>" alt="<?php echo $list['barcode'] ; ?>" >
				</div>
				<div style="position:absolute;top:1mm;left:1mm;line-height: 25px;" class="<?php echo $list['category'] ; ?>-col"><?php if($list['type']=='Yellow(C)'){ echo "C";} ?></div>
			 </div>
			 <div >
				<div style="padding:0px;margin:0px;font-size:15px"><?php echo $list['barcodetext'] ; ?></span></div>
			 </div>
		  </div>
	   </div>
	   <?php } ?>
   <?php } ?>     
</div>