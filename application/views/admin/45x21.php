<style>
*{
	font-family: 'Source Sans Pro', sans-serif;
	padding:0px;
	margin:0px;
}
.loop > .sticker{
	float:left;
	margin:0mm 1.1mm;
}
.yellow-col{
	background-color:yellow;
	width:20px;
	height:20px;
	margin:0 auto;
}
.red-col{
	background-color:red;
	width:20px;
	height:20px;
	margin:0 auto;
}
.blue-col{
	background-color:blue;
	width:20px;
	height:20px;
	margin:0 auto;
}
.white-col{
	background-color:f5f5f5;
	width:20px;
	height:20px;
	margin:0 auto;
}
</style>
<div  style="width:22cm;text-align:center;">
<div  style="margin-top:2.45cm">
<?php if(isset($print_details) && count($print_details)>0){ ?>
<?php foreach($print_details as $list){ ?>
		<div class="loop" style="margin:0 7.8mm;">
		<div class="sticker" style="width:45.7mm;height:21.1mm;background:#fff;overflow:hidden">
				<div >
					<div style="padding:0px;margin:0px;font-size:8px"><span><?php echo substr($list[0]['h_name'], 0, 32); ?>... </span></div>
				
				</div>
				<div class="">
					<div>
						<table style="width:100%;padding:0px 5px;font-size:9px;" align="center">
							<tbody>
								<tr>
								<td style="text-align:center">
										<div style="text-align:center;line-height: 20px;" class="<?php echo $list[0]['category'] ; ?>-col"><?php if($list[0]['type']=='Yellow(C)'){ echo "C";} ?></div>
										<div style="font-size:8px">SN<?php echo $list[0]['ptcnt'] ; ?></div>
										<div style="font-size:6px"><span><?php echo $list[0]['category'] ; ?> </span> Bag</div>
									</td>
									<td rowspan="4" style="vertical-align: top;text-align:left" ><img style="width:auto;height:11mm;padding:1px 0px;" src="<?php echo base_url('assets/hospital_waste_barcodes/'.$list[0]['barcode']); ?>" alt="<?php echo $list[0]['barcode'] ; ?>" ></td>
										
								</tr>
								
								
							</tbody>
						</table>
					</div>
					
				</div>
				<div style="font-size:8px;"><?php echo substr($list[0]['cbwtf'], 0, 32); ?>...</div>
		</div>
		<div class="sticker" style="width:45.7mm;height:21.1mm;background:#fff;overflow:hidden">
				<div >
					<div style="padding:0px;margin:0px;font-size:8px"><span><?php echo substr($list[1]['h_name'], 0, 32); ?>... </span></div>
				
				</div>
				<div class="">
					<div>
						<table style="width:100%;padding:0px 5px;font-size:9px;" align="center">
							<tbody>
								<tr>
								<td style="text-align:center">
										<div style="text-align:center;line-height: 20px;" class="<?php echo $list[1]['category'] ; ?>-col"><?php if($list[1]['type']=='Yellow(C)'){ echo "C";} ?></div>
										<div style="font-size:8px">SN<?php echo $list[1]['ptcnt'] ; ?></div>
										<div style="font-size:6px"><span><?php echo $list[1]['category'] ; ?> </span> Bag</div>
									</td>
									<td rowspan="4" style="vertical-align: top;"><img style="width:auto;height:11mm;padding:1px 0px;" src="<?php echo base_url('assets/hospital_waste_barcodes/'.$list[1]['barcode']); ?>" alt="<?php echo $list[1]['barcode'] ; ?>" ></td>
									
									
								</tr>
								
							</tbody>
						</table>
					</div>
				</div>
					<div style="font-size:8px;"><?php echo substr($list[1]['cbwtf'], 0, 32); ?>...</div>
		</div>
		<div class="sticker" style="width:45.7mm;height:21.1mm;background:#fff;overflow:hidden">
				<div >
					<div style="padding:0px;margin:0px;font-size:8px"><span><?php echo substr($list[2]['h_name'], 0, 32); ?>... </span></div>
				
				</div>
				<div class="">
					<div>
						<table style="width:100%;padding:0px 5px;font-size:9px;" align="center">
							<tbody>
								<tr>
								<td style="text-align:center">
										<div style="text-align:center;line-height: 20px;" class="<?php echo $list[2]['category'] ; ?>-col"><?php if($list[2]['type']=='Yellow(C)'){ echo "C";} ?></div>
										<div style="font-size:8px">SN<?php echo $list[2]['ptcnt'] ; ?></div>
										<div style="font-size:6px"><span><?php echo $list[2]['category'] ; ?> </span> Bag</div>
									</td>
									<td rowspan="4" style="vertical-align: top;"><img style="width:auto;height:11mm;padding:1px 0px;" src="<?php echo base_url('assets/hospital_waste_barcodes/'.$list[2]['barcode']); ?>" alt="<?php echo $list[2]['barcode'] ; ?>" ></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div style="font-size:8px;"><?php echo substr($list[2]['cbwtf'], 0, 32); ?>...</div>
		</div>
		<div class="sticker" style="width:45.7mm;height:21.1mm;background:#fff;overflow:hidden">
				<div >
					<div style="padding:0px;margin:0px;font-size:8px"><span><?php echo substr($list[3]['h_name'], 0, 32); ?>... </span></div>
				
				</div>
				<div class="">
					<div>
						<table style="width:100%;padding:0px 5px;font-size:9px;" align="center">
							<tbody>
								<tr>
								<td style="text-align:center">
										<div style="text-align:center;line-height: 20px;" class="<?php echo $list[3]['category'] ; ?>-col"><?php if($list[3]['type']=='Yellow(C)'){ echo "C";} ?></div>
										<div style="font-size:8px">SN<?php echo $list[3]['ptcnt'] ; ?></div>
										<div style="font-size:6px"><span><?php echo $list[3]['category'] ; ?> </span> Bag</div>
									</td>
									<td rowspan="4" style="vertical-align: top;"><img style="width:auto;height:11mm;padding:1px 0px;" src="<?php echo base_url('assets/hospital_waste_barcodes/'.$list[3]['barcode']); ?>" alt="<?php echo $list[3]['barcode'] ; ?>" ></td>
									
								</tr>
									
							</tbody>
						</table>
					</div>
				</div>
				<div style="font-size:8px;"><?php echo substr($list[3]['cbwtf'], 0, 32); ?>...</div>
		</div>
		</div>
	<?php } ?>
	<?php } ?>
	
		
		
		
		
		
</div>
</div>
