<style>
 *{
   font-family: 'Source Sans Pro', sans-serif;
   padding:0px ;
   margin:0px;
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
.prnt-setup{
	margin-top:0.4mm !important;
}
</style>
<div  style="width:83mm;height:100%;text-align:center;">
<?php //echo '<pre>';print_r($print_details);exit; ?>
<?php if(isset($print_details) && count($print_details)>0){ ?>
<?php $cnt=1;foreach($print_details as $list){ ?>
		<?php if($cnt==1){ ?>
			<div class="loop" style="display:flex;justify-content: center; margin-top:10px">
		<?php }else{ ?>
			<div class="loop prnt-setup" style="display:flex;justify-content: center;">
		<?php } ?>
	
		<?php if(isset($list[0]) && count($list[0])>0){ ?>
		<div class="sticker" style="width:38mm;height:25mm;overflow:hidden;position:relative;">
				
				
					<div style="font-size:10px"><?php echo $list[0]['h_name'] ; ?></span></div>
			
				<div class="">
					<div>
						<table style="width:100%;font-size:9px;" align="center">
							<tbody>
								<tr>
								<td style="text-align:center">
										<div style="text-align:center;line-height: 20px;" class="<?php echo $list[0]['category'] ; ?>-col"><?php if($list[0]['type']=='Yellow(C)'){ echo "C";} ?></div>
										<div>MD<?php echo $list[0]['ptcnt'] ; ?></div>
									</td>
									<td rowspan="4"  style="vertical-align: top;text-align:left" ><img style="width:auto;height:10mm;padding:2px 0px;" src="<?php echo base_url('assets/hospital_waste_barcodes/'.$list[0]['barcode']); ?>" alt="<?php echo $list[0]['barcode'] ; ?>" ></td>
									
									
								</tr>
								
								
								
							</tbody>
						</table>
						
					</div>
				</div>
				<div >
					<div style="font-size:8px"><?php echo $list[0]['cbwtf'] ; ?></span></div>
				
				</div>
				
		</div>
		<?php } ?>
		<?php if(isset($list[1]) && count($list[1])>0){ ?>
		<div class="sticker" style="width:38mm;height:25mm;overflow:hidden;position:relative;">
				
				
					<div style="font-size:10px"><?php echo $list[1]['h_name'] ; ?></div>
				
			
				<div class="">
					<div>
						<table style="width:100%;font-size:9px;" align="center">
							<tbody>
								<tr>
								<td style="text-align:center">
										<div style="text-align:center;line-height: 20px;" class="<?php echo $list[1]['category'] ; ?>-col"><?php if($list[1]['type']=='Yellow(C)'){ echo "C";} ?></div>
										<div>MD<?php echo $list[1]['ptcnt'] ; ?></div>
									</td>
									<td rowspan="4" style="text-align:left"><img style="width:auto;height:10mm;padding:2px 0px;" src="<?php echo base_url('assets/hospital_waste_barcodes/'.$list[1]['barcode']); ?>" alt="<?php echo $list[1]['barcode'] ; ?>" ></td>
								
									
									<!--<td ><span><?php echo $list[1]['category'] ; ?></span></td>-->
								</tr>
								
								
							</tbody>
						</table>
					</div>
				</div>
				<div style="font-size:8px"><?php echo $list[1]['cbwtf'] ; ?></div>
			
		</div>
		<?php } ?>
		</div>
		<?php $cnt++;} ?>
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
