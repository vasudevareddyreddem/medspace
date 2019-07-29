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
	margin:1mm;
	height:25mm;
}
</style>
<div  style="width:82mm;height:100%;text-align:center;">
<?php if(isset($print_details) && count($print_details)>0){ ?>
<?php foreach($print_details as $list){ ?>
		<div class="loop" >
		<?php if(isset($list[0]) && count($list[0])>0){ ?>
		<div class="sticker" style="width:38mm;height:25mm;background:#fff;overflow:hidden;">
				<div style="padding-top:2mm;">
				<div >
					<h3 style="padding:0px;margin:0px;font-size:10px">Bio-medical waste barcode</h3>
				
				</div>
				<div class="">
					<div>
						<table style="width:100%;font-size:9px;" align="center">
							<tbody>
								<tr>
									<td rowspan="4"  style="vertical-align: top;"><img style="width:auto;height:10mm;padding:2px 0px;" src="<?php echo base_url('assets/hospital_waste_barcodes/'.$list[0]['barcode']); ?>" alt="<?php echo $list[0]['barcode'] ; ?>" ></td>
									<td style="">Category</td>
									<td ><?php echo $list[0]['category'] ; ?> </td>
								</tr>
								<tr>
									<td style="vertical-align: top;">HCF</td>
									<td ><span style="height:10px;overflow:hidden;"><?php echo $list[0]['h_name'] ; ?></span></td>
								</tr>
								<tr style="vertical-align: top;">
									<td>CBWTF</td>
									<td style="line-height:10px;"><?php echo $list[0]['cbwtf'] ; ?></td>
								</tr>
								
							</tbody>
						</table>
					</div>
				</div>
				</div>
		</div>
		<?php } ?>
		<?php if(isset($list[1]) && count($list[1])>0){ ?>
		<div class="sticker" style="width:38mm;height:25mm;background:#fff;overflow:hidden;">
				<div style="padding-top:2mm;">
				<div >
					<h3 style="padding:0px;margin:0px;font-size:10px">Bio-medical waste barcode</h3>
				
				</div>
				<div class="">
					<div>
						<table style="width:100%;font-size:9px;" align="center">
							<tbody>
								<tr>
									<td rowspan="4"><img style="width:auto;height:10mm;padding:2px 0px;" src="<?php echo base_url('assets/hospital_waste_barcodes/'.$list[1]['barcode']); ?>" alt="<?php echo $list[1]['barcode'] ; ?>" ></td>
									<td style="">Category</td>
									<td ><span><?php echo $list[1]['category'] ; ?></span></td>
								</tr>
								<tr>
									<td>HCF</td>
									<td><span><?php echo $list[1]['h_name'] ; ?></span></td>
								</tr>
								<tr>
									<td>CBWTF</td>
									<td style="line-height:10px;"><?php echo $list[1]['cbwtf'] ; ?></td>
								</tr>
								
							</tbody>
						</table>
					</div>
				</div>
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
