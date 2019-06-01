<style>
	.table>caption+thead>tr:first-child>td, .table>caption+thead>tr:first-child>th, .table>colgroup+thead>tr:first-child>td, .table>colgroup+thead>tr:first-child>th, .table>thead:first-child>tr:first-child>td, .table>thead:first-child>tr:first-child>th {

		text-align:center;
		
		 vertical-align: middle ;
	}
	table.table-bordered.dataTable th, table.table-bordered.dataTable td {
    border-left-width: 0;
    vertical-align: middle;
	text-align:center;
}
</style>
<section class="content">
	<!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               HCF Waste  List
                            </h2>
                         
                        </div>
                        <div class="body">
						<form action="<?php echo base_url('hospital/waste'); ?>" method="post">
						<input type="hidden" id="a_id" name="a_id" value="<?php echo isset($a_id)?$a_id:''; ?>">
								<div class="">
									<div class="row">
       
         <div class="col-md-4">
		  <label>From</label>
            <div class="input-group date">
                <input type="text" name="from_date" class="form-control" id="jss-date" required>
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
        </div>
		 <div class="col-md-4">
		  <label>To</label>
            <div class="input-group date">
                <input type="text" name="to_date" class="form-control" id="js-date" required>
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
        </div> 
		<div class="col-md-4">
		  <label>&nbsp;</label>
            <div class="input-group date">
               <button class="btn btn-primary btn-sm">Search</button>
            </div>
        </div>
    </div>
   
  
								</div>

							</form>
							<div class="clearfix">&nbsp;</div>
                            <div class="table-responsive">
							
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
											<thead>
											  <tr>
												<th class="vetical-text-angle"  rowspan="3">S.No</th>
												<th  rowspan="3">Name of the HCF</th>
												<th  rowspan="3">Address</th>
												<th  colspan="9">Details of Bio medical Generated by the HCF (Qty. of BMW in Kg)</th>
												<th  colspan="10">Details of Bio medical Waste received by the CBWTF</th>
												<th  rowspan="2">Difference in waste collected and received (+/- in Kg)
</th>
											  </tr> 
											  <tr>
												<th rowspan="2">Date</th>
												<th class="bg-yellow" colspan="2">Yellow</th>
												<th class="bg-red" colspan="2">Red</th>
												<th colspan="2">White</th>
												<th class="bg-blue" colspan="2">Blue</th>
												<th rowspan="2">Date</th>
												<th rowspan="2">Address of receipt of waste
</th>
												<th class="bg-yellow" colspan="2">Yellow</th>
												<th class="bg-red" colspan="2">Red</th>
												<th colspan="2">White</th>
												<th class="bg-blue" colspan="2">Blue</th>
											  </tr>
											  <tr>
												<th>No. of Bags</th>
												<th>Quantity</th>
												<th>No. of Bags</th>
												<th>Quantity</th>
												<th>No. of containers</th>
												<th>Quantity</th>
												<th>No. of Bags</th>
												<th>Quantity</th>	
												<th>No. of Bags</th>
												<th>Quantity</th>
												<th>No. of Bags</th>
												<th>Quantity</th>
												<th>No. of containers</th>
												<th>Quantity</th>
												<th>No. of Bags</th>
												<th>Quantity</th>
												<th>&nbsp;</th>
											  </tr>
											  
											</thead>
											<?php if(isset($waste_list) && count($waste_list)>0){ ?>
											 <tbody>
												<?php $cnt=1;foreach($waste_list as $list){ ?>
												<tr>
												<td> <?php echo $cnt; ?></td>
												<td> <?php echo htmlentities($list['hospital_name']); ?></td>
												<td title="<?php echo htmlentities($list['current_address']); ?>"><?php echo substr($list['current_address'], 0, 15); ?>...</td>
												<td> <?php echo htmlentities($list['date']); ?></td>
												
												<td><?php echo htmlentities($list['infected_waste_qt']); ?></td>
												<td><?php echo htmlentities($list['infected_waste_kg']); ?></td>
												<td><?php echo htmlentities($list['infected_plastics_qt']); ?></td>
												<td><?php echo htmlentities($list['infected_plastics_kg']); ?></td>
												
												<td><?php echo htmlentities($list['genaral_waste_qt']); ?></td>
												<td><?php echo htmlentities($list['genaral_waste_kg']); ?></td>
												<td><?php echo htmlentities($list['glassware_watse_qt']); ?></td>
												<td><?php echo htmlentities($list['glassware_watse_kg']); ?></td>
												<!-- bio waste -->
												<td> <?php echo htmlentities($list['date']); ?></td>
												<td title="<?php echo htmlentities($list['bio_current_address']); ?>"><?php echo substr($list['bio_current_address'], 0, 15); ?>...</td>
												<td><?php echo htmlentities($list['bio_infected_waste_qt']); ?></td>
												<td><?php echo htmlentities($list['bio_infected_waste_kg']); ?></td>
												
												<td><?php echo htmlentities($list['bio_infected_plastics_qt']); ?></td>
												<td><?php echo htmlentities($list['bio_infected_plastics_kg']); ?></td>
												
												<td><?php echo htmlentities($list['bio_genaral_waste_qt']); ?></td>
												<td><?php echo htmlentities($list['bio_genaral_waste_kg']); ?></td>
												
												<td><?php echo htmlentities($list['bio_glassware_watse_qt']); ?></td>
												<td><?php echo htmlentities($list['bio_glassware_watse_kg']); ?></td>
												
												
												<td> <?php echo htmlentities($list['total']); ?>-<?php echo htmlentities($list['bio_total']); ?> =  <?php echo ($list['total']-$list['bio_total']) ; ?></td>
												
											  </tr>
												<?php $cnt++;} ?>
												</tbody>
												<?php } ?>
												
											  
											
										  </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
</section>
	<script type="text/javascript">
   $(document).ready(function() {
    $('#js-date').datepicker(
	{  
		format: 'mm-dd-yyyy',
		autoclose:true,
		endDate: "today",
	});
	
}); 
 $(document).ready(function() {
    $('#jss-date').datepicker(
	{  
		format: 'mm-dd-yyyy',
		autoclose:true,
		endDate: "today",
	});
	
});
</script>
