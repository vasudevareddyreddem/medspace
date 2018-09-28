
<?php //echo '<pre>';print_r($print_details);exit; ?>
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
		<div class="sticker" style="width:100mm;height:40mm;background:#fff;border:1px solid #ddd;margin-top:1mm">
				<div >
					<h3 style="padding:0px;margin:0px;">Bio-medical waste barcode</h3>
					<img style="width:auto;height:15mm;padding:5px 0px;" src="<?php echo base_url('assets/hospital_barcodes/'.$list[0]['barcode']); ?>" alt="<?php echo $list[0]['barcode'] ; ?>" >
				</div>
				<div class="">
					<div>
						<table style="width:100%;padding:0px 20px;font-size:14px;line-height:15px;" align="center">
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
		<div class="sticker" style="width:100mm;height:40mm;background:#fff;border:1px solid #ddd;margin-left:3mm;margin-top:1mm">
				<div >
					<h3 style="padding:0px;margin:0px;">Bio-medical waste barcode</h3>
					<img style="width:auto;height:15mm;padding:5px 0px;" src="<?php echo base_url('assets/hospital_barcodes/'.$list[1]['barcode']); ?>" alt="Barcode" >
				</div>
				<div class="">
					<div>
						<table style="width:100%;padding:0px 20px;font-size:14px;line-height:15px;" align="center">
							<tbody>
								<tr>
									<td style="">Category</td>
									<td ><span><?php echo $list[1]['category'] ; ?> </span>bag</td>
								</tr>
								<tr>
									<td>HCF</td>
									<td><span><?php echo $list[1]['h_name'] ; ?>
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
		</div>
		
	<?php } ?>
	<?php } ?>
		
		
</div>
