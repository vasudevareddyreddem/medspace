<style>
*{
	font-family: 'Source Sans Pro', sans-serif;
}
.loop > .sticker{
	float:left;
}
</style>
<div  style="width:210mm;height:297mm;text-align:center;">
<?php if(isset($print_details) && count($print_details)>0){ ?>
<?php foreach($print_details as $list){ ?>
		<div class="loop" style="margin:0 2mm;">
		<div class="sticker" style="width:50mm;height:35mm;background:#fff;border:1px solid #ddd;margin-top:1mm">
				<div >
					<h4 style="padding:0px;margin:0px;font-size:14px;">Bio-medical waste barcode</h4>
					<img style="width:auto;height:12mm;padding:4px 0px;" src="<?php echo base_url('assets/hospital_barcodes/'.$list[0]['barcode']); ?>" alt="<?php echo $list[0]['barcode'] ; ?>" >
				</div>
				<div class="">
					<div>
						<table style="width:100%;padding:0px 10px;font-size:13px;line-height:12px;" align="center">
							<tbody>
								<tr>
									<td style="">Category</td>
									<td ><span><?php echo $list[0]['category'] ; ?> </span>bag</td>
								</tr>
								<tr>
									<td>HCF</td>
									<td><span><?php echo $list[0]['h_name'] ; ?> </span></td>
								</tr>
								<tr>
									<td>CBWTF</td>
									<td><?php echo $list[0]['cbwtf'] ; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
		</div>
		<div class="sticker" style="width:50mm;float:left;height:35mm;background:#fff;border:1px solid #ddd;margin-top:1mm;margin-left:1mm">
				<div >
					<h4 style="padding:0px;margin:0px;font-size:14px;">Bio-medical waste barcode</h4>
					<img style="width:auto;height:12mm;padding:4px 0px;" src="<?php echo base_url('assets/hospital_barcodes/'.$list[1]['barcode']); ?>" alt="<?php echo $list[1]['barcode'] ; ?>" >
				</div>
				<div class="">
					<div>
						<table style="width:100%;padding:0px 10px;font-size:13px;line-height:12px;" align="center">
							<tbody>
								<tr>
									<td style="">Category</td>
									<td ><span><?php echo $list[1]['category'] ; ?> </span>bag</td>
								</tr>
								<tr>
									<td>HCF</td>
									<td><span><?php echo $list[1]['h_name'] ; ?> </span></td>
								</tr>
								<tr>
									<td>CBWTF</td>
									<td><?php echo $list[1]['cbwtf'] ; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
		</div>
		<div class="sticker" style="width:50mm;float:left;height:35mm;background:#fff;border:1px solid #ddd;margin-top:1mm;margin-left:1mm">
				<div >
					<h4 style="padding:0px;margin:0px;font-size:14px;">Bio-medical waste barcode</h4>
					<img style="width:auto;height:12mm;padding:4px 0px;" src="<?php echo base_url('assets/hospital_barcodes/'.$list[2]['barcode']); ?>" alt="<?php echo $list[2]['barcode'] ; ?>" >
				</div>
				<div class="">
					<div>
						<table style="width:100%;padding:0px 10px;font-size:13px;line-height:12px;" align="center">
							<tbody>
								<tr>
									<td style="">Category</td>
									<td ><span><?php echo $list[2]['category'] ; ?> </span>bag</td>
								</tr>
								<tr>
									<td>HCF</td>
									<td><span><?php echo $list[2]['h_name'] ; ?> </span></td>
								</tr>
								<tr>
									<td>CBWTF</td>
									<td><?php echo $list[2]['cbwtf'] ; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
		</div>
		<div class="sticker" style="width:50mm;float:left;height:35mm;background:#fff;border:1px solid #ddd;margin-top:1mm;margin-left:1mm">
				<div >
					<h4 style="padding:0px;margin:0px;font-size:14px;">Bio-medical waste barcode</h4>
					<img style="width:auto;height:12mm;padding:4px 0px;" src="<?php echo base_url('assets/hospital_barcodes/'.$list[3]['barcode']); ?>" alt="<?php echo $list[3]['barcode'] ; ?>" >
				</div>
				<div class="">
					<div>
						<table style="width:100%;padding:0px 10px;font-size:13px;line-height:12px;" align="center">
							<tbody>
								<tr>
									<td style="">Category</td>
									<td ><span><?php echo $list[3]['category'] ; ?> </span>bag</td>
								</tr>
								<tr>
									<td>HCF</td>
									<td><span><?php echo $list[3]['h_name'] ; ?> </span></td>
								</tr>
								<tr>
									<td>CBWTF</td>
									<td><?php echo $list[3]['cbwtf'] ; ?></td>
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
