
<section class="content">
	<!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               HCF Waste Image  List
                            </h2>
                         
                        </div>
                        <div class="body">
						
							<div class="clearfix">&nbsp;</div>
                            <div class="table-responsive">
							
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
											<th>HCF Name</th>
											<th>Text</th>
											<th>Address</th>
											<th>Image</th>
											<th>Date & Time </th>
                                        </tr>
                                    </thead>
                                    <?php if(isset($waste_imgs) && count($waste_imgs)>0){ ?>

									    <tbody>
									<?php foreach($waste_imgs as $list){ ?>
                                
                                        <tr>
											<td><?php echo htmlentities($list['hospital_name']); ?></td>
										  <td><?php echo htmlentities($list['text']); ?></td>
										  <td title="<?php echo htmlentities($list['address']); ?>"><?php echo substr($list['address'], 0, 15); ?>...</td>
										 <td><img height="50px;" width="50px;" src="<?php echo base_url('assets/hospital-waste-images/'.$list['image']); ?>"></td>
										 <td><?php echo htmlentities($list['create_at']); ?></td>
										
                                            
                                            
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
