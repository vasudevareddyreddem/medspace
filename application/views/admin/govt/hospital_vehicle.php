<section class="content">
	<!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Vehicle List
                            </h2>
							
                        </div>
						<form action="<?php echo base_url('prints/prints'); ?>" target="_blank" method="POST">
                        <div class="body">
                            <div class="table-responsive">
                                <table id="example" class="example table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
											<th>Vehicle Registration Number</th>
                                            <th>Driver Name</th>
                                            <th>Licence Number</th>
                                            <th>Badge Number</th>
											 <th>Mobile</th>
                                            <th>Email</th>
                                            <th>City</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    
                                    <?php if(isset($vehicle_list) && count($vehicle_list)>0){ ?>
										    <tbody>
									<?php foreach($vehicle_list as $list){ ?>
                                
                                        <tr>

                                            <td><?php echo htmlentities($list['truck_reg_no']); ?></td>
                                            <td><?php echo htmlentities($list['driver_name']); ?></td>
                                            <td><?php echo htmlentities($list['driver_lic_no']); ?></td>
                                            
											   <td><?php echo htmlentities($list['driver_lic_bad_no']); ?></td>
											   <td><?php echo htmlentities($list['driver_mobile']); ?></td>

                                            <td><?php echo htmlentities($list['email']); ?></td>
                                            <td><?php echo htmlentities($list['city']); ?></td>
                                            <td><a href="<?php echo base_url('hospital/vehicle_route_details/'.base64_encode($list['t_id'])); ?>">View</a></td>
                                           
                                        </tr>
										
                                  
									<?php } ?>
									  </tbody>
									<?php } ?>
                                </table>
								</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
</section>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 2, "asc" ]]
    } );
} );
</script>
	
