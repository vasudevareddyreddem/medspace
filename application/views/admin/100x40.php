
<?php //echo '<pre>';print_r($print_details);exit; ?>
<style>
*{
	font-family: 'Source Sans Pro', sans-serif;
}
.loop > .sticker{
	float:left;
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

</style>
<div  style="width:210mm;height:297mm;text-align:center;">
<?php if(isset($print_details) && count($print_details)>0){ ?>
<?php foreach($print_details as $list){ ?>
		<div class="loop" style="margin:0 2mm;">
		<div class="sticker" style="width:100mm;height:40mm;background:#fff;border:1px solid #ddd;margin-top:1mm;position:relative">
				<div >
					<h3 style="padding:0px;margin:5px;">SN<?php echo $list[0]['ptcnt'] ; ?></h3>
					<img style="width:auto;height:16mm;padding:5px 0px;" src="<?php echo base_url('assets/hospital_waste_barcodes/'.$list[0]['barcode']); ?>" alt="<?php echo $list[0]['barcode'] ; ?>" >
				</div>
				<div style="position: absolute;;top:10px;left:10px;line-height: 25px;">
					<div class="<?php echo $list[0]['category'] ; ?>-col"><?php if($list[0]['type']=='Yellow(C)'){ echo "C";} ?></div>
					
				</div>
				
				<div class="">
					<div>
						<table style="width:100%;padding:0px 20px;font-size:14px;line-height:15px;" align="center">
							<tbody>
								<!--<tr>
									<td style="">Category</td>
									<td ><span><?php echo $list[0]['category'] ; ?> </span>bag</td>
								</tr>-->
								<tr>
									<td style="text-align:center;font-size:18px"><?php echo $list[0]['barcodetext'] ; ?> </td>
								</tr>
								
							</tbody>
						</table>
					</div>
				</div>
		</div>
		<div class="sticker" style="width:100mm;height:40mm;background:#fff;border:1px solid #ddd;margin-left:3mm;margin-top:1mm;position:relative">
				<div >
					<h3 style="padding:0px;margin:5px;">SN<?php echo $list[1]['ptcnt'] ; ?></h3>
					<img style="width:auto;height:16mm;padding:5px 0px;" src="<?php echo base_url('assets/hospital_waste_barcodes/'.$list[1]['barcode']); ?>" alt="Barcode" >
				</div>
				<div style="position: absolute;;top:10px;left:10px;line-height: 25px;">
					<div class="<?php echo $list[1]['category'] ; ?>-col"><?php if($list[1]['type']=='Yellow(C)'){ echo "C";} ?></div>
					
				</div>
				<div class="">
					<div>
						<table style="width:100%;padding:0px 20px;font-size:14px;line-height:15px;" align="center">
							<tbody>
								<!--<tr>
									<td style="">Category</td>
									<td ><span><?php echo $list[1]['category'] ; ?> </span>bag</td>
								</tr>-->
									<tr>
									<td style="text-align:center;font-size:18px"><?php echo $list[1]['barcodetext'] ; ?></td>
								</tr>
								
							</tbody>
						</table>
					</div>
				</div>
		</div>
		</div>
		
	<?php } ?>
	<?php } ?>
		
		
</div>
