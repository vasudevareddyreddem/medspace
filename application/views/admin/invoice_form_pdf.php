<!DOCTYPE html>
<html>
<head>
<style>
table, td, th {
  border: 1px solid black;
  padding:5px;
  font-size:10px
}
table {
    table-layout: fixed;
    word-wrap: break-word;
}
table {
  border-collapse: collapse;
  width: 100%;
}
*{
	padding:0;
	margin:0;
	font-family:arial;
}
p{
margin:2px
}

</style>
</head>
<body>

<h2 style="text-align:center;margin:5px 0px">Tax Invoice</h2>

<table>
  <tr>
    <td rowspan="2" width="70%">
		<h5 style="font-size:14px;"><?php echo isset($p_details['disposal_plant_name'])?$p_details['disposal_plant_name']:''; ?></h5>
		<h5 style="font-size:14px;">GST No: <?php echo isset($details['gst_no'])?$details['gst_no']:''; ?></h5>
		<p style="font-size:13px;font-weight:300"><?php echo isset($p_details['address1'])?$p_details['address1'].',':''; ?>
		<?php echo isset($p_details['address2'])?$p_details['address2'].',':''; ?>
		<?php echo isset($p_details['city'])?$p_details['city'].',':''; ?>
		<?php echo isset($p_details['country'])?$p_details['country'].',':''; ?>
		<?php echo isset($p_details['pincode'])?$p_details['pincode']:''; ?>
		State Name	: <?php echo isset($p_details['state'])?$p_details['state']:''; ?>,
		Code : <?php echo isset($p_details['type'])?$p_details['type']:''; ?>,
		E-Mail : <?php echo isset($p_details['email'])?$p_details['email']:''; ?>		</p>
	</td>
    <td>
		<div>Invoice No:	<?php echo isset($invoice_ids['c_i_id'])?$invoice_ids['c_i_id']+1:''; ?> </div>
	</td>
    <td>Dated : <?php echo Date('d-m-Y'); ?></td>  
  </tr> 
  <tr>  
    
    <td >
		<div>Mode of Payment</div>
		<div><?php echo isset($details['payment_type'])?$details['payment_type']:''; ?></div>	
	</td>
	 <td >
		<div>Executive Name : <?php echo isset($details['supplier_ref'])?$details['supplier_ref']:''; ?> </div>		
	</td>
  </tr>  
  
<tr>
    <td rowspan="5" width="50%">
		<h5>Buyer
			<?php echo isset($hcf_details['hospital_name'])?$hcf_details['hospital_name']:''; ?></h5>
		<p><?php echo isset($hcf_details['address1'])?$hcf_details['address1'].',':''; ?>
		<?php echo isset($hcf_details['address2'])?$hcf_details['address2'].',':''; ?>
		<?php echo isset($hcf_details['city'])?$hcf_details['city'].',':''; ?>
		<?php echo isset($hcf_details['country'])?$hcf_details['country'].',':''; ?>
		<?php echo isset($hcf_details['pincode'])?$hcf_details['pincode']:''; ?>
		State Name	: <?php echo isset($hcf_details['state'])?$hcf_details['state']:''; ?>,
		Code : <?php echo isset($hcf_details['type'])?$hcf_details['type']:''; ?>
		E-Mail : <?php echo isset($hcf_details['email'])?$hcf_details['email']:''; ?>
		</p>
	</td>
    
  
  </tr>
      
  
  <tr>  
    <td>
		<div>Root No</div>
		<div><?php echo isset($details['lr_rr_no'])?$details['lr_rr_no']:''; ?></div>
		
	</td>
   
		<td>
				<div>Motor Vehicle No</div>
					<div><?php echo isset($details['motor_vehicle_no'])?$details['motor_vehicle_no']:''; ?></div>
		</td>
	
	
  </tr> 
  <tr>  
		<td colspan="2">
				<div>Terms of Delivery : <?php echo isset($details['terms_of_delivery'])?$details['terms_of_delivery']:''; ?></div>
					
		</td>
  </tr>
</table>
<table>
  <tr >
	<th>Sl No</th>
	<th>Description of Goods</th>
	<th>HSN/SAC</th>
	<th>Quantity / Pieces</th>
	<th>Rate</th>
	<th colspan="2" style="text-align:right">Amount</th>
	</tr>
 
  <?php $t_kgs='';$t_c_amt='';$cnt_ar=0;$cnt=1;foreach($details['category'] as $li){ ?>
	  <?php if($li!=''){ ?>
		  <tr>
			<td style="border-top:0px;border-bottom:0px;text-align:center"><?php echo $cnt; ?></td>
			<td style="border-top:0px;border-bottom:0px;text-align:center"> <?php echo isset($details['category'][$cnt_ar])?$details['category'][$cnt_ar]:''; ?> <?php echo isset($details['size'][$cnt_ar])?$details['size'][$cnt_ar]:''; ?> </td>
			<td style="border-top:0px;border-bottom:0px;text-align:center"> <?php echo isset($details['hsn_sac'][$cnt_ar])?$details['hsn_sac'][$cnt_ar]:''; ?> </td>
			<td style="border-top:0px;border-bottom:0px;text-align:center"> <?php echo isset($details['quantity'][$cnt_ar])?$details['quantity'][$cnt_ar]:''; ?> </td>
			<td style="border-top:0px;border-bottom:0px;text-align:center"> <?php echo isset($details['rate'][$cnt_ar])?$details['rate'][$cnt_ar]:''; ?> </td>
			
			<td colspan="2" style="border-top:0px;text-align:right"> <?php 
				$amount = $details['quantity'][$cnt_ar]*$details['rate'][$cnt_ar];
				echo $total_amt=$amount;
				?>		
			</td>
			<?php 
			$t_c_amt +=$total_amt;
			$t_kgs +=$details['quantity'][$cnt_ar];
			?>
		  </tr>
		<?php } ?>
  <?php $cnt_ar++;$cnt++;} ?>
   
  
  <tr>
  <td style="text-align:right;border-top:0px;border-bottom:0px;">&nbsp;</td>
  <td style="text-align:right;border-top:0px;border-bottom:0px;">&nbsp;</td>
  <td style="text-align:right;border-top:0px;border-bottom:0px;">&nbsp;</td>
  <td style="text-align:right;border-top:0px;border-bottom:0px;">&nbsp;</td>
	<td  style="border-top:0px;border-bottom:0px;">&nbsp; </td>
	<td  style="text-align:center;border-top:0px;border-bottom:0px;"><span >GST -(<?php echo isset($details['igst'])?$details['igst']:''; ?>) % </span></td>
	<td  style="text-align:right;border-top:0px;border-left: 0px;"><span >
	<?php $T_amount =$t_c_amt;
			$p_ToGet=$details['igst'];
			$p_Decimal = $p_ToGet / 100;
			echo $gst_percent_amt=$p_Decimal * $T_amount;
			?> 
	</span>
	</td>
  </tr>
     <tr>
	<th>&nbsp;</th>
	<th>Total</th>
	<td>&nbsp;</td>
	<th><?php echo isset($t_kgs)?$t_kgs:''; ?> Pieces </th>

	<td>&nbsp; </td>
	<th colspan="2" style="text-align:right"><?php
		$over_amt=isset($t_c_amt)?$t_c_amt+$gst_percent_amt:'';
		echo $over_amt; ?></th>
  </tr>
<tr>
	<td colspan="7"><strong>Amount Chargeable (in words)INR</strong>:
	<?php echo $this->livemumtowordclsconvert->mycustom_convert_num($over_amt); ?>
</td>
</tr>  
</table>



<table>
	<tr>
		<th rowspan="2">HSN/SAC</th>
		<th rowspan="2">Taxable Value</th>
		<th colspan="2">Integrated Tax</th>
		<th rowspan="2">Total Tax Amount</th>
	</tr>
	<tr>
		<td>GST </td>
		<td>Gst Amout</td>
		
	</tr>	
	<tr>
		<td>&nbsp;</td>
		<td><?php echo isset($t_c_amt)?$t_c_amt:''; ?></td>
		<td><?php echo isset($details['igst'])?$details['igst']:''; ?></td>
		<td><?php echo isset($gst_percent_amt)?$gst_percent_amt:''; ?></td>
		<td><?php echo isset($gst_percent_amt)?$gst_percent_amt:''; ?></td>
		
	</tr>
	<tr>
		<th>Total</th>
		<td><?php echo isset($t_c_amt)?$t_c_amt:''; ?></td>
		<td><?php echo isset($details['igst'])?$details['igst']:''; ?></td>
		<td><?php echo isset($gst_percent_amt)?$gst_percent_amt:''; ?></td>
		<td><?php echo isset($gst_percent_amt)?$gst_percent_amt:''; ?></td>
		
	</tr>
	<tr>
		<td colspan="5" ><strong>Amount Chargeable (in words)INR:</strong>
		<?php echo $this->livemumtowordclsconvert->mycustom_convert_num($gst_percent_amt); ?>
		</td>
	</tr>
</table>
<table style="border-top:0px;border-bottom:0px;">
	<tr style="border-top:0px;border-bottom:0px;">
		
		<th  style="text-align:left;border-left:0px;border-top:0px; border-bottom:0px;">
			<div>Company’s Bank Details</div>
			
			<div>Bank Name : <?php echo isset($details['bank_name'])?$details['bank_name']:''; ?></div>
		<div>AC no :<?php echo isset($details['ac_no'])?$details['ac_no']:''; ?></div>
		<div>AC Holder Name :<?php echo isset($details['ac_holder_name'])?$details['ac_holder_name']:''; ?></div>
		<div>Branch : <?php echo isset($details['branch'])?$details['branch']:''; ?></div>
		<div>IFSC no : <?php echo isset($details['ifsc'])?$details['ifsc']:''; ?></div>
		</th>
	</tr>

	
</table>
<table>
	<tr>
		<td style="width:70%"><span style="  text-decoration-line: underline;">Declaration</span>
		<p>We declare that this invoice shows the actual price of
the goods described and that all particulars are true
and correct.
</p>
		</td>
		<td>
			<h5>for <?php echo isset($p_details['disposal_plant_name'])?$p_details['disposal_plant_name']:''; ?></h5>
			<br>
			<br>
			<div>Authorised Signatory</div>
		</td>
	</tr>
</table>
<p style="text-align:center;margin-top:10px">This is a Computer Generated Invoice</p>
</body>
</html>
