<section class="content">
	<!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Health Care Facility List
                            </h2>
							
                        </div>
						<form action="<?php echo base_url('prints/prints'); ?>" target="_blank" method="POST">
                        <div class="body">
                            <div class="table-responsive">
                                <table id="example" class="example table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
											<th>Health Care Facility</th>
                                            <th>City</th>
                                            <th>Route No</th>
                                            <th>Health Care Facility Type</th>
											 <th>No fo Beds</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    
                                    <?php if(isset($hospital_list) && count($hospital_list)>0){ ?>
										    <tbody>
									<?php foreach($hospital_list as $list){ ?>
                                
                                        <tr>

                                            <td><?php echo htmlentities($list['hospital_name']); ?></td>
                                            <td><?php echo htmlentities($list['city']); ?></td>
                                            <td><?php echo htmlentities($list['route_number']); ?></td>
                                            <td>
											<?php $states = array ('BH' => 'Bedded Hospital', 'CL' => 'Clinic', 'DI' => 'Dispensary', 'HO' => 'Homeopathy', 'MH' => 'Mobile Hospital', 'SI' => 'Siddha', 'UN' => 'Unani', 'VH' => 'Veterinary Hospital', 'YO' => 'Yoga', 'AH' => 'Animal House', 'BB' => 'Blood Bank', 'DH' => 'Dental Hospital ', 'NH' => 'Nursing Home', 'PL' => 'Pathological Laboratory', 'FA' => 'Institutions/Schools/Companies etc. with First Aid facilities', 'HC' => 'Health Camp'); ?>
											<?php foreach($states as $key=>$state):
											if(isset($list['type'])&& $list['type'] == $key):
											echo $state;
											else : 
											$selected = '';
											endif;
											?>
											<?php endforeach; ?>
											
											</td>
											   <td><?php echo htmlentities($list['no_of_beds']); ?></td>

                                            <td><?php echo htmlentities($list['email']); ?></td>
                                            <td><?php echo htmlentities($list['mobile']); ?></td>
                                            <td><a href="<?php echo base_url('hospital/wasteindetails/'.base64_encode($list['h_id'])); ?>">View</a></td>
                                           
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
	
