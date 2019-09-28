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

<div  style="width:21cm;height:29.7cm;text-align:center;">
<div style="height:2.25cm"></div>
<?php if(isset($print_details) && count($print_details)>0){ ?>
<?php foreach($print_details as $list){ ?>
	<!-- loop start-->
   <div style="display:flex;justify-content: center;">
   <!-- one -->
      <div class="sticker" style="width:45.7mm;height:21.1mm;background:#fff;overflow:hidden;position:relative;margin:0mm 0mm 0mm 0mm;border-radius:5px">
         <div >
            <div >
               <div style="padding:0px;margin-top:1mm;font-size:12px;height:4mm">Seq.No.<?php echo $list[0]['ptcnt'] ; ?> </span></div>
            </div>
            <div class="">
               <div>
                  <img style="width:auto;height:12.5mm;padding:0px;" src="<?php echo base_url('assets/hospital_waste_barcodes/'.$list[0]['barcode']); ?>" alt="<?php echo $list[0]['barcode'] ; ?>" >
               </div>
               <div style="position:absolute;top:2mm;left:2mm;line-height: 25px;" class="<?php echo $list[0]['category'] ; ?>-col"><?php if($list[0]['type']=='Yellow(C)'){ echo "C";} ?></div>
            </div>
            <div >
               <div style="padding:0px;margin:0px;font-size:11px"><?php echo $list[0]['barcodetext'] ; ?></span></div>
            </div>
         </div>
      </div>
	   <!-- one -->
	  <div class="sticker" style="width:45.7mm;height:21.1mm;background:#fff;overflow:hidden;position:relative;margin:0mm 0mm 0mm 3mm;border-radius:5px">
         <div >
            <div >
               <div style="padding:0px;margin-top:1mm;font-size:12px;height:4mm">Seq.No.<?php echo $list[1]['ptcnt'] ; ?> </span></div>
            </div>
            <div class="">
               <div>
                  <img style="width:auto;height:12.5mm;padding:0px;" src="<?php echo base_url('assets/hospital_waste_barcodes/'.$list[1]['barcode']); ?>" alt="<?php echo $list[1]['barcode'] ; ?>" >
               </div>
               <div style="position:absolute;top:2mm;left:2mm;line-height: 25px;" class="<?php echo $list[1]['category'] ; ?>-col"><?php if($list[1]['type']=='Yellow(C)'){ echo "C";} ?></div>
            </div>
            <div >
               <div style="padding:0px;margin:0px;font-size:11px"><?php echo $list[1]['barcodetext'] ; ?></span></div>
            </div>
         </div>
      </div>
	  <div class="sticker" style="width:45.7mm;height:21.1mm;background:#fff;overflow:hidden;position:relative;margin:0mm 0mm 0mm 3mm;border-radius:5px">
         <div >
            <div >
               <div style="padding:0px;margin-top:1mm;font-size:12px;height:4mm">Seq.No.<?php echo $list[2]['ptcnt'] ; ?> </span></div>
            </div>
            <div class="">
               <div>
                  <img style="width:auto;height:12.5mm;padding:0px;" src="<?php echo base_url('assets/hospital_waste_barcodes/'.$list[2]['barcode']); ?>" alt="<?php echo $list[2]['barcode'] ; ?>" >
               </div>
               <div style="position:absolute;top:2mm;left:2mm;line-height: 25px;" class="<?php echo $list[2]['category'] ; ?>-col"><?php if($list[2]['type']=='Yellow(C)'){ echo "C";} ?></div>
            </div>
            <div >
               <div style="padding:0px;margin:0px;font-size:11px"><?php echo $list[2]['barcodetext'] ; ?></span></div>
            </div>
         </div>
      </div>
	  <div class="sticker" style="width:45.7mm;height:21.1mm;background:#fff;overflow:hidden;position:relative;margin:0mm 0mm 0mm 3mm;border-radius:5px">
         <div >
            <div >
               <div style="padding:0px;margin-top:1mm;font-size:12px;height:4mm">Seq.No.<?php echo $list[3]['ptcnt'] ; ?> </span></div>
            </div>
            <div class="">
               <div>
                  <img style="width:auto;height:12.5mm;padding:0px;" src="<?php echo base_url('assets/hospital_waste_barcodes/'.$list[3]['barcode']); ?>" alt="<?php echo $list[3]['barcode'] ; ?>" >
               </div>
               <div style="position:absolute;top:2mm;left:2mm;line-height: 25px;" class="<?php echo $list[3]['category'] ; ?>-col"><?php if($list[3]['type']=='Yellow(C)'){ echo "C";} ?></div>
            </div>
            <div >
               <div style="padding:0px;margin:0px;font-size:11px"><?php echo $list[3]['barcodetext'] ; ?></span></div>
            </div>
         </div>
      </div>
   </div>
   
<?php } ?>
<?php } ?>
   <!-- loop end-->

   
</div>