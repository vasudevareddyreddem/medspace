<section class="content">
	<!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                BMW Vehicle List
                            </h2>
                         
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>BMW vehical No</th>
                                            <th>Owner Name</th>
                                            <th>Driver Name</th>
                                            <th>Driver Licence No</th>
                                            <th>Join Date & Time</th>
                                            <th>Status</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    
										
										<?php if(isset($tuck_list) && count($tuck_list)>0){ ?>
										   <tbody>
									<?php foreach($tuck_list as $list){ ?>
                                 
                                        <tr>
                                            <td><?php echo htmlentities($list['truck_reg_no']); ?></td>
                                            <td><?php echo htmlentities($list['owner_name']); ?></td>
                                            <td><?php echo htmlentities($list['driver_name']); ?></td>
                                            <td><?php echo htmlentities($list['driver_lic_no']); ?></td>
                                            <td><?php echo date('Y M j h:i A',strtotime(htmlentities($list['create_at'])));?></td>
                                              <td><?php if($list['status']==1){ echo "Active"; }else{ echo "Deactive";} ?></td>

                                            <td>
											<a href="<?php echo base_url('garbage/edit/'.base64_encode($list['t_id'])); ?>" class="btn btn-sm btn-primary">Edit</a> 
											<a href="<?php echo base_url('garbage/status/'.base64_encode($list['t_id']).'/'.base64_encode($list['status'])); ?>" class="btn btn-sm btn-primary"><?php if($list['status']==0){ echo "Active"; }else{ echo "Deactive";} ?></a> 
											
											<a href="<?php echo base_url('garbage/delete/'.base64_encode($list['t_id'])); ?>" class="btn btn-sm btn-primary">Delete</a> 
											</td>
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
	
