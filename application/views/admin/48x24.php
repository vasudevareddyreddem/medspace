<style>
*{
	font-family: 'Source Sans Pro', sans-serif;
	margin:0px;
	padding:0px;
	
}
.loop > .sticker{
	float:left;
	border-radius:5px;
	margin-top:1px;
	
}
.yellow-col{
	background-color:yellow;
	width:25px;
	height:25px;
	margin:0 auto;
}
.red-col{
	background-color:red;
	width:25px;
	height:25px;
	margin:0 auto;
}
.blue-col{
	background-color:blue;
	width:25px;
	height:25px;
	margin:0 auto;
}
.white-col{
	background-color:f5f5f5;
	width:25px;
	height:25px;
	margin:0 auto;
}
</style>
<div  style="width:210mm;height:297mm;text-align:center;margin-top:8mm; margin-left:4mm">
<?php if(isset($print_details) && count($print_details)>0){ ?>
			<?php foreach($print_details as $list){ ?>
				<div class="loop"  >
				<div class="sticker" style="width:49.5mm;height:24mm;background:#fff;overflow:hidden;margin-right:3mm;">
						<div >
							<div style="padding:0px;margin:0px;font-size:8px"><?php echo $list[0]['h_name'] ; ?> 
							</div>
						
						</div>
						<div class="">
							<div>
								<table style="width:100%;padding:0px 5px;font-size:9px;" align="center">
									<tbody>
										<tr>
											<td rowspan="4" style="vertical-align: top;text-align:right" ><img style="width:auto;height:13mm;" src="<?php echo base_url('assets/hospital_waste_barcodes/'.$list[0]['barcode']); ?>" alt="<?php echo $list[0]['barcode'] ; ?>" ></td>
										<td style="text-align:center">
										<div style="text-align:center;line-height: 25px;" class="<?php echo $list[0]['category'] ; ?>-col"><?php if($list[0]['type']=='Yellow(C)'){ echo "C";} ?></div>
										<div>MD<?php echo $list[0]['ptcnt'] ; ?></div>
									</td>
										</tr>
										
										
									</tbody>
								</table>
							</div>
						<div >
							<div style="padding:0px;margin:0px;font-size:8px"><?php echo $list[0]['cbwtf'] ; ?>
							</div>
						
						</div>
						</div>
				</div>
				<div class="sticker" style="width:49.5mm;height:24mm;background:#fff;overflow:hidden;margin-right:3mm;">
						<div style="padding:0px;margin:0px;font-size:8px"><?php echo $list[1]['h_name'] ; ?> 
</div>
						<div class="">
							<div>
								<table style="width:100%;padding:0px 5px;font-size:9px;" align="center">
									<tbody>
										<tr>
											<td rowspan="4" style="vertical-align: top;text-align:right"><img style="width:auto;height:13mm;" src="<?php echo base_url('assets/hospital_waste_barcodes/'.$list[1]['barcode']); ?>" alt="<?php echo $list[1]['barcode'] ; ?>" ></td>
												<td style="text-align:center">
										<div style="text-align:center;line-height: 25px;" class="<?php echo $list[1]['category'] ; ?>-col"><?php if($list[1]['type']=='Yellow(C)'){ echo "C";} ?></div>
										<div>MD<?php echo $list[1]['ptcnt'] ; ?></div>
									</td>
										</tr>
									
										
									</tbody>
								</table>
							</div>
							
						</div>
						<div style="padding:0px;margin:0px;font-size:8px"><?php echo $list[1]['cbwtf'] ; ?>
							</div>
				</div>
				<div class="sticker" style="width:49.5mm;height:24mm;background:#fff;overflow:hidden;margin-right:3mm;">
						<div >
							<div style="padding:0px;margin:0px;font-size:10px"><?php echo $list[2]['h_name'] ; ?> 
							</div>
						
						</div>
						<div class="">
							<div>
								<table style="width:100%;padding:0px 5px;font-size:9px;" align="center">
									<tbody>
										<tr>
											<td rowspan="4" style="vertical-align: top;text-align:right"><img style="width:auto;height:13mm;" src="<?php echo base_url('assets/hospital_waste_barcodes/'.$list[2]['barcode']); ?>" alt="<?php echo $list[2]['barcode'] ; ?>" ></td>
											<td style="text-align:center">
										<div style="text-align:center;line-height: 25px;" class="<?php echo $list[2]['category'] ; ?>-col"><?php if($list[2]['type']=='Yellow(C)'){ echo "C";} ?></div>
										<div>MD<?php echo $list[2]['ptcnt'] ; ?></div>
									</td>
										</tr>
									
										
									</tbody>
								</table>
							</div>
						</div>
						<div style="padding:0px;margin:0px;font-size:8px"><?php echo $list[0]['cbwtf'] ; ?>
							</div>
				</div>
				<div class="sticker" style="width:49.5mm;height:24mm;background:#fff;overflow:hidden">
						<div >
							<div style="padding:0px;margin:0px;font-size:8px"><?php echo $list[3]['h_name'] ; ?> 
							</div>
						
						</div>
						<div class="">
							<div>
								<table style="width:100%;padding:0px 5px;font-size:9px;" align="center">
									<tbody>
										<tr>
											<td rowspan="4" style="vertical-align: top;text-align:right"><img style="width:auto;height:13mm;" src="<?php echo base_url('assets/hospital_waste_barcodes/'.$list[3]['barcode']); ?>" alt="<?php echo $list[3]['barcode'] ; ?>" ></td>
											<td style="text-align:center">
										<div style="text-align:center;line-height: 25px;" class="<?php echo $list[3]['category'] ; ?>-col"><?php if($list[3]['type']=='Yellow(C)'){ echo "C";} ?></div>
										<div>MD<?php echo $list[3]['ptcnt'] ; ?></div>
									</td>
										</tr>
										
									
									</tbody>
								</table>
							</div>
						</div>
						<div style="padding:0px;margin:0px;font-size:8px"><?php echo $list[3]['cbwtf'] ; ?>
							</div>
				</div>		
				</div>
				<?php } ?>
		<?php } ?>
		
		
		
		
		
</div>
