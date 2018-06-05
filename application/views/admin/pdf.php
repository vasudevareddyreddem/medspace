<!doctype html>

<?php //echo '<pre>';print_r($details); ?>
<?php //echo '<pre>';print_r($garbage_details);exit; ?>
<head>
    <meta charset="utf-8">
    <title>hospital invoice</title>
    
    <style>
	.page-invoice{
	    
			position:relative;
	}
    .invoice-box {
   
        <!-- margin: auto; -->
        <!-- padding: 30px; -->
        <!-- border: 1px solid #eee; -->
        <!-- box-shadow: 0 0 10px rgba(0, 0, 0, .15); -->
        font-size: 14px;
        line-height: 20px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
	
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    <!-- .invoice-box table tr td:nth-child(2) { -->
        <!-- text-align: right; -->
    <!-- } -->
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 10px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
	table, td, th {    
    border: 1px solid #ddd;
    text-align: left;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 10px;
}
    </style>
</head>

<body>
    <div class="page-invoice">
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0" >
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="<?php echo base_url(); ?>assets/vendor/img/fav.png" style=" width:100px;">
                            </td>
							<td >
                               <h1 style="text-align:center;">Medspace</h1>
                               <p style="text-align:center;color:#F80">BY PRACHA TECHNOLOGIES PVT LTD.  </p>
                            </td>
                            
                          
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                             <div>
								<strong>Hospital Name : </strong> <?php echo $details['hospital_name']; ?>, 
							 </div>
							 <div>
								<strong>Hospital ID : </strong> <?php echo $details['hospital_id']; ?>, 
							 </div>
							 <div>
								<strong>Garbage collection Adddress:  </strong> <?php echo $garbage_details['current_address']; ?> 
							 </div> 
							 <div>
								<strong>Date:  </strong> <?php echo date('Y-m-d H:i:s'); ?> 
							 </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
		<h2>INVOICE </h2>


<table class="bodered-table">
  <tr>
    <td>Invoice# </td>
    <td colspan="3">INV-PT-<?php echo $garbage_details['invoice_id']; ?></td>
  
  </tr>
  <tr>
    <td>Invoice Date </td>
    <td colspan="3"><?php echo date('Y-m-d H:i:s'); ?></td>
  
  </tr>
  <tr>
    <td>Payment Mode </td>
    <td colspan="3">&nbsp;</td>
  
  </tr>
  
   

  <tr>
    <td colspan="2"> Genaral Waste in Bags Qty(kg's):</td>
    <td> <?php echo $garbage_details['genaral_waste_kgs']; ?></td>
  </tr> 
  <tr>
    <th colspan="2">Genaral Waste in Bags(no's):  </th>
    <th><?php echo $garbage_details['genaral_waste_qty']; ?></th>
  </tr>
  <tr>
     <th colspan="2">Infected Plastics in Bags Qty(kg's):</th>
    <th><?php echo $garbage_details['infected_plastics_kgs']; ?></th>
  </tr> 
    <tr>
     <th colspan="2">Infected Plastics in Bags(no's):</td>
    <td> <?php echo $garbage_details['infected_plastics_qty']; ?></td>
  </tr>
  <tr>
     <th colspan="2">Infected Waste in Bags Qty(kg's):</th>
    <th><?php echo $garbage_details['infected_waste_kgs']; ?></th>
  </tr> 
    <tr>
     <th colspan="2">Infected Waste  in Bags(no's): </td>
    <td> <?php echo $garbage_details['infected_waste_qty']; ?></td>
  </tr>
  <tr>
     <th colspan="2">Glassware Waste in Bags Qty(kg's):</th>
    <th><?php echo $garbage_details['glassware_watse_kgs']; ?></th>
  </tr> 
    <tr>
     <th colspan="2">Glassware Waste in Bags(no's):</td>
    <td> <?php echo $garbage_details['glassware_watse_qty']; ?></td>
  </tr> 
  

</table>
<p style="text-align:center;margin-top:50px;">This is a system generated invoice and hence physical signature is not required</p>


    </div>
	<div style="clear:both">&nbsp;</div>
	<br>
	
	
	<div style="background:#333;width:100%;">
		<p style="color:#fff;padding:10px 20px;text-align:center;"><?php echo $details['address']; ?>
  </p>
	</div>
    </div>
</body>
</html>