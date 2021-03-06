<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Waste list</title>
    
    <style>
	td{
		font-size:14px;
	}
	th{
		font-weight:600;
		font-size:14px;
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
	.invoice-box table th {
        padding: 5px;
        vertical-align: top;
		text-align:center;
		
    }
    

    
    .invoice-box table tr.top table td {
        padding-bottom: 0px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        
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
    
    table {
  border-collapse: collapse;
}

table, th, td {
  border: 1px solid black;
}
.bg-yellow {
    background-color: yellow;
    color: #fff;
}
.bg-red {
    background-color: red;
    color: #fff;
}
.bg-blue{
    background-color: blue;
    color: #fff;
}
.bg-white{
    background-color: white;
    color: #000;
}
.text-center{
	text-align:center;
}

    </style>
</head>

<body>
    <div class="invoice-box" style="width:210mm;height:297mm;text-align:center;border:1px solid #ddd;" >
		<table cellpadding="0" cellspacing="0" style="border:1px solid #aaa;border-bottom:0px solid #fff;width:100%;">
			<tr>
				<th colspan="6"><h3 style="text-algin:center">Plant name</h3></th>
			
			</tr>
			<tr>
				<th>Health Care Facility</th>
				<th>Health Care Facility ID</th>
				<th>Health Care Facility Type</th>
				<th>Mobile</th>
				<th>No fo Beds</th>
				<th>Barcode</th>
			
			</tr>
			<?php if(isset($details) && count($details)>0){ ?>
			<?php foreach($details as $li){ ?>
			<tr>
				<td><?php echo isset($li['hospital_name'])?$li['hospital_name']:''; ?></td>
				<td><?php echo isset($li['h_id'])?$li['h_id']:''; ?></td>
				<td><?php $states = array ('BH' => 'Bedded Hospital', 'CL' => 'Clinic', 'DI' => 'Dispensary', 'HO' => 'Homeopathy', 'MH' => 'Mobile Hospital', 'SI' => 'Siddha', 'UN' => 'Unani', 'VH' => 'Veterinary Hospital', 'YO' => 'Yoga', 'AH' => 'Animal House', 'BB' => 'Blood Bank', 'DH' => 'Dental Hospital ', 'NH' => 'Nursing Home', 'PL' => 'Pathological Laboratory', 'FA' => 'Institutions/Schools/Companies etc. with First Aid facilities', 'HC' => 'Health Camp'); ?>
											<?php foreach($states as $key=>$state):
											if(isset($li['type'])&& $li['type'] == $key):
											echo $state;
											else : 
											$selected = '';
											endif;
											?>
											<?php endforeach; ?></td>
				<td><?php echo isset($li['mobile'])?$li['mobile']:''; ?></td>
				<td><?php echo isset($li['no_of_beds'])?$li['no_of_beds']:''; ?></td>
				<td><img style="width:100px" src="<?php echo base_url('assets/hospital_barcodes/'.$li['barcode']);?>"></td>
			</tr>
			<?php } ?>			
			<?php } ?>
			
			
        </table>
	
    </div>
</body>
</html>
