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
  border-collapse: collapse;
  width: 100%;
}
*{
	padding:0;
	margin:0;
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
    <td rowspan="3" width="50%">
		<h5><?php echo isset($p_details['disposal_plant_name'])?$p_details['disposal_plant_name']:''; ?></h5>
		<p><?php echo isset($p_details['address1'])?$p_details['address1'].',':''; ?>
		<?php echo isset($p_details['address2'])?$p_details['address2'].',':''; ?>
		<?php echo isset($p_details['city'])?$p_details['city'].',':''; ?>
		<?php echo isset($p_details['country'])?$p_details['country'].',':''; ?>
		<?php echo isset($p_details['pincode'])?$p_details['pincode']:''; ?>
		State Name	: <?php echo isset($p_details['state'])?$p_details['state']:''; ?>,
		Code : <?php echo isset($p_details['type'])?$p_details['type']:''; ?>
		E-Mail : <?php echo isset($p_details['email'])?$p_details['email']:''; ?>		</p>
	</td>
    <td>
		<div>Invoice No:	<?php echo isset($invoice_ids['c_i_id'])?$invoice_ids['c_i_id']+1:''; ?> </div>
		<div>e-Way Bill No: <?php echo isset($details['e_way_bill_no'])?$details['e_way_bill_no']:''; ?></div>
	</td>
    <td>Dated : <?php echo Date('d-m-Y'); ?></td>  
  </tr> 
  <tr>  
    <td>
		<div>Delivery Note: <?php echo isset($details['notes'])?$details['notes']:''; ?> </div>		
	</td>
    <td>
		<div>Mode/Terms of Payment</div>
		<div><?php echo isset($details['payment_type'])?$details['payment_type']:''; ?></div>	
	</td>
  </tr>  
  <tr>  
    <td>
		<div>Supplier’s Ref : <?php echo isset($details['supplier_ref'])?$details['supplier_ref']:''; ?> </div>		
	</td>
    <td>
		<div>Other Reference(s) : <?php echo isset($details['other_reference'])?$details['other_reference']:''; ?></div>	
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
    <td>
		<div>Buyer’s Order No: <?php echo isset($details['buyer_order_no'])?$details['buyer_order_no']:''; ?> </div>
		
	</td>
    <td>Dated : <?php echo isset($details['dated'])?$details['dated']:''; ?> </td>
  
  </tr>
    <tr>
  
    <td>
		<div>Despatch Document No : <?php echo isset($details['despatch_document_no'])?$details['despatch_document_no']:''; ?></div>
		
	</td>
		<td>Dated : <?php echo isset($details['delivery_note_date'])?$details['delivery_note_date']:''; ?></td>
	
  </tr>   
  <tr>  
    <td>
		<div>Despatch Document through</div>
		<div><?php echo isset($details['despatched_throug'])?$details['despatched_throug']:''; ?></div>
		
	</td>
		<td>
				<div>Destination</div>
					<div><?php echo isset($details['destination'])?$details['destination']:''; ?></div>
		</td>
	
  </tr>  
  <tr>  
    <td>
		<div>Bill of Lading/LR-RR No</div>
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
	<th>Quantity</th>
	<th>Rate</th>
	<th>per</th>
	<th>Disc. %</th>
	<th>Amount</th>
  <tr>
  <?php $t_kgs='';$t_c_amt='';$cnt_ar=0;$cnt=1;foreach($details['category'] as $li){ ?>
	  <?php if($li!=''){ ?>
		  <tr>
			<td><?php echo $cnt; ?></td>
			<td> <?php echo isset($details['category'][$cnt_ar])?$details['category'][$cnt_ar]:''; ?> <?php echo isset($details['size'][$cnt_ar])?$details['size'][$cnt_ar]:''; ?> </td>
			<td> <?php echo isset($details['hsn_sac'][$cnt_ar])?$details['hsn_sac'][$cnt_ar]:''; ?> </td>
			<td> <?php echo isset($details['quantity'][$cnt_ar])?$details['quantity'][$cnt_ar]:''; ?> </td>
			<td> <?php echo isset($details['rate'][$cnt_ar])?$details['rate'][$cnt_ar]:''; ?> </td>
			<td>kgs </td>
			<td><?php echo isset($details['discount'][$cnt_ar])?$details['discount'][$cnt_ar]:''; ?> </td>
			<td> <?php 
				$amount = $details['quantity'][$cnt_ar]*$details['rate'][$cnt_ar];
				$percentToGet = $details['discount'][$cnt_ar];
				$percentInDecimal = $percentToGet / 100;
				$percent = $percentInDecimal * $amount;
				echo $total_amt=$amount-$percent;
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

	<td colspan="8" style="text-align:right"><span ><?php echo isset($t_c_amt)?$t_c_amt:''; ?> </span></td>
  </tr>
  <tr>
	<td colspan="6" style="text-align:right"><span >IGST </span></td>
	<td colspan="2" style="text-align:right"><span>
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
	<th><?php echo isset($t_kgs)?$t_kgs:''; ?> kgs </th>
	<td>&nbsp; </td>
	<td>&nbsp; </td>
	<td>&nbsp; </td>
	<th><?php
		$over_amt=isset($t_c_amt)?$t_c_amt+$gst_percent_amt:'';
		echo $over_amt; ?></th>
  </tr>
<tr>
	<td colspan="8"><strong>Amount Chargeable (in words)INR</strong>:
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
		<td>Rate</td>
		<td>Amout</td>
		
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
<table>
	<tr>
		<th colspan="3" style="text-algin:center"> Company’s Bank Details</th>
	</tr>
	<tr>
		<th>Bank Name</th>
		<th>AC no</th>
		<th>Branch & IFSC no</th>
	</tr>
	<tr>
		<td><?php echo isset($details['bank_name'])?$details['bank_name']:''; ?></td>
		<td><?php echo isset($details['ac_no'])?$details['ac_no']:''; ?></td>
		<td><?php echo isset($details['ifsc'])?$details['ifsc']:''; ?></td>
	</tr>
</table>
<table>
	<tr>
		<td><span style="  text-decoration-line: underline;">Declaration</span>
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
