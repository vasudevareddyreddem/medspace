https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css
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
						<form action="<?php echo base_url('hospital/waste_list'); ?>" method="post">
								<div class="container">
									<div class="row">
       
         <div class="col-sm-3">
		  <label>From</label>
            <div class="input-group date">
                <input type="text" name="from_date" class="form-control" id="jss-date" required>
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
        </div>
		 <div class="col-sm-3">
		  <label>To</label>
            <div class="input-group date">
                <input type="text" name="to_date" class="form-control" id="js-date" required>
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
        </div> 
		<div class="col-sm-3">
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
											<th>HCF Name</th>
											<th>No of Yellow bags</th>
                                            <th>No of kgs (Yellow )</th>											 
											<th>No of Red Bags</th>
                                            <th>No of kgs (Red)</th>
                                            <th>No of Blue Bags</th> 
											<th>No of Kgs (Blue)</th>											
                                            <th>No of White Bags</th>											

											<th>No of Kgs (White)</th>
											<th>Date</th>
                                            
                                        </tr>
                                    </thead>
                                    <?php if(isset($waste_list) && count($waste_list)>0){ ?>

									    <tbody>
									<?php foreach($waste_list as $list){ ?>
                                
                                        <tr>
                                            
                                            <td><?php echo htmlentities($list['hospital_name']); ?></td>
											 <td><?php echo htmlentities($list['infected_waste_qty']); ?></td>
											<td><?php echo htmlentities($list['infected_waste_kgs']); ?></td>
											 <td><?php echo htmlentities($list['infected_plastics_qty']); ?></td>
											<td><?php echo htmlentities($list['infected_plastics_kgs']); ?></td>
											 <td><?php echo htmlentities($list['glassware_watse_qty']); ?></td>
											<td><?php echo htmlentities($list['glassware_watse_kgs']); ?></td>
											<td><?php echo htmlentities($list['genaral_waste_qty']); ?></td>
                                            <td><?php echo htmlentities($list['genaral_waste_kgs']); ?></td>
                                            <td><?php echo htmlentities($list['date']); ?></td>
                                            
                                            
                                        </tr>
										
                                
									<?php } ?>
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
