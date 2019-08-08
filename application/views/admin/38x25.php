<style>
*{
	font-family: 'Source Sans Pro', sans-serif;
	padding:0px;
	margin:0px;
}
 .sticker{
	float:left;
	
	
}
.loop{
	margin-top:1mm;
	height:25mm;
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
<div  style="width:100%;height:100%;text-align:center;">
<?php if(isset($print_details) && count($print_details)>0){ ?>
<?php foreach($print_details as $list){ ?>
		<div class="loop" >
		<?php if(isset($list[0]) && count($list[0])>0){ ?>
		<div class="sticker" style="width:38mm;height:25mm;background:#fff;overflow:hidden;">
				<div style="">
				<div >
					<div style="padding:0px;margin:0px;font-size:10px"><?php echo $list[0]['h_name'] ; ?></span></div>
				
				</div>
				<div class="">
					<div>
						<table style="width:100%;font-size:9px;" align="center">
							<tbody>
								<tr>
									<td rowspan="4"  style="vertical-align: top;text-align:right" ><img style="width:auto;height:10mm;padding:2px 0px;" src="<?php echo base_url('assets/hospital_waste_barcodes/'.$list[0]['barcode']); ?>" alt="<?php echo $list[0]['barcode'] ; ?>" ></td>
									<td style="text-align:center">
										<div style="text-align:center" class="<?php echo $list[0]['category'] ; ?>-col"></div>
										<div>MD<?php echo $list[0]['ptcnt'] ; ?></div>
									</td>
									
								</tr>
								
								
								
							</tbody>
						</table>
						
					</div>
				</div>
				<div >
					<div style="padding:0px;margin:0px;font-size:10px"><?php echo $list[0]['cbwtf'] ; ?></span></div>
				
				</div>
				</div>
		</div>
		<?php } ?>
		<?php if(isset($list[1]) && count($list[1])>0){ ?>
		<div class="sticker" style="width:38mm;height:25mm;background:#fff;overflow:hidden;">
				<div style="">
				<div >
					<div style="padding:0px;margin:0px;font-size:10px"><?php echo $list[1]['h_name'] ; ?></div>
				
				</div>
				<div class="">
					<div>
						<table style="width:100%;font-size:9px;" align="center">
							<tbody>
								<tr>
									<td rowspan="4" style="text-align:right"><img style="width:auto;height:10mm;padding:2px 0px;" src="<?php echo base_url('assets/hospital_waste_barcodes/'.$list[1]['barcode']); ?>" alt="<?php echo $list[1]['barcode'] ; ?>" ></td>
								
									<td style="text-align:center">
										<div style="text-align:center" class="<?php echo $list[1]['category'] ; ?>-col"></div>
										<div>MD<?php echo $list[1]['ptcnt'] ; ?></div>
									</td>
									<!--<td ><span><?php echo $list[1]['category'] ; ?></span></td>-->
								</tr>
								
								
							</tbody>
						</table>
					</div>
				</div>
				<div style="padding:0px;margin:0px;font-size:10px"><?php echo $list[1]['cbwtf'] ; ?></div>
				</div>
		</div>
		<?php } ?>
		</div>
		<?php } ?>
		<?php } ?>
		
</div>
				
							</tbody>
						</table>
					</div>
				</div>
				</div>
		</div>
		</div>
		
		
		
		
		
		
		
</div>
