<style>
*{
	font-family: 'Source Sans Pro', sans-serif;
}
.loop > .sticker{
	float:left;
	margin:1.1mm;
}
</style>
<div  style="width:210mm;height:297mm;text-align:center;border:1px solid #ddd;">
<?php if(isset($print_details) && count($print_details)>0){ ?>
<?php foreach($print_details as $list){ ?>
		<div class="loop" style="margin:0 7.8mm;margin-top:22mm">
		<div class="sticker" style="width:45.7mm;20mm;background:#fff;border:1px solid #ddd;overflow:hidden">
				<div >
					<h3 style="padding:0px;margin:0px;font-size:10px">Bio-medical waste barcode</h3>
				
				</div>
				<div class="">
					<div>
						<table style="width:100%;padding:0px 5px;font-size:9px;" align="center">
							<tbody>
								<tr>
									<td rowspan="4"><img style="width:auto;height:13mm;padding:2px 0px;" src="<?php echo base_url('assets/hospital_waste_barcodes/'.$list[0]['barcode']); ?>" alt="<?php echo $list[0]['barcode'] ; ?>" ></td>
									<td style="">Category</td>
									<td><span><?php echo $list[0]['category'] ; ?> </span>bag</td>
								</tr>
								<tr>
									<td>HCF</td>
									<td><span><?php echo $list[0]['h_name'] ; ?> </span></td>
								</tr>
								<tr>
									<td>CBWTF</td>
									<td style="line-height:10px;"><?php echo $list[0]['cbwtf'] ; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
		</div>
		<div class="sticker" style="width:45.7mm;20mm;background:#fff;border:1px solid #ddd;overflow:hidden">
				<div >
					<h3 style="padding:0px;margin:0px;font-size:10px">Bio-medical waste barcode</h3>
				
				</div>
				<div class="">
					<div>
						<table style="width:100%;padding:0px 5px;font-size:9px;" align="center">
							<tbody>
								<tr>
									<td rowspan="4"><img style="width:auto;height:13mm;padding:2px 0px;" src="<?php echo base_url('assets/hospital_waste_barcodes/'.$list[1]['barcode']); ?>" alt="<?php echo $list[1]['barcode'] ; ?>" ></td>
									<td style="">Category</td>
									<td><span><?php echo $list[1]['category'] ; ?> </span>bag</td>
								</tr>
								<tr>
									<td>HCF</td>
									<td><span><?php echo $list[1]['h_name'] ; ?> </span></td>
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
		<div class="sticker" style="width:45.7mm;20mm;background:#fff;border:1px solid #ddd;overflow:hidden">
				<div >
					<h3 style="padding:0px;margin:0px;font-size:10px">Bio-medical waste barcode</h3>
				
				</div>
				<div class="">
					<div>
						<table style="width:100%;padding:0px 5px;font-size:9px;" align="center">
							<tbody>
								<tr>
									<td rowspan="4"><img style="width:auto;height:13mm;padding:2px 0px;" src="<?php echo base_url('assets/hospital_waste_barcodes/'.$list[2]['barcode']); ?>" alt="<?php echo $list[2]['barcode'] ; ?>" ></td>
									<td style="">Category</td>
									<td><span><?php echo $list[2]['category'] ; ?> </span>bag</td>
								</tr>
								<tr>
									<td>HCF</td>
									<td><span><?php echo $list[2]['h_name'] ; ?> </span></td>
								</tr>
								<tr>
									<td>CBWTF</td>
									<td style="line-height:10px;"><?php echo $list[2]['cbwtf'] ; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
		</div>
		<div class="sticker" style="width:45.7mm;20mm;background:#fff;border:1px solid #ddd;overflow:hidden">
				<div >
					<h3 style="padding:0px;margin:0px;font-size:10px">Bio-medical waste barcode</h3>
				
				</div>
				<div class="">
					<div>
						<table style="width:100%;padding:0px 5px;font-size:9px;" align="center">
							<tbody>
								<tr>
									<td rowspan="4"><img style="width:auto;height:13mm;padding:2px 0px;" src="<?php echo base_url('assets/hospital_waste_barcodes/'.$list[3]['barcode']); ?>" alt="<?php echo $list[3]['barcode'] ; ?>" ></td>
									<td style="">Category</td>
									<td><span><?php echo $list[3]['category'] ; ?> </span>bag</td>
								</tr>
								<tr>
									<td>HCF</td>
									<td><span><?php echo $list[3]['h_name'] ; ?> </span></td>
								</tr>
								<tr>
									<td>CBWTF</td>
									<td style="line-height:10px;"><?php echo $list[3]['cbwtf'] ; ?></td>
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
