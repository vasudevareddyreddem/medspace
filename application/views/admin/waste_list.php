<section class="content">
	<!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Waste  List
                            </h2>
                         
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>BMW vehicle Id</th>
                                            <th>Driver Name</th>
                                            <th>Driver Mobile Number</th>
											<th>Yellow No of Bags</th>
                                            <th>Yellow No of kgs</th>											 
											<th>Red No of Bags</th>
                                            <th>Red No of kgs</th>
                                            <th>Blue No of Bags</th> 
											<th>Blue No of Kgs</th>											
                                            <th>White No of Bags</th>											

											<th>White No of Kgs</th>
                                            <th>Date & Time</th>
                                            
                                        </tr>
                                    </thead>
                                    <?php if(isset($waste_list) && count($waste_list)>0){ ?>

									    <tbody>
									<?php foreach($waste_list as $list){ ?>
                                
                                        <tr>
                                            <td><?php echo htmlentities($list['truck_reg_no']); ?></td>
                                            <td><?php echo htmlentities($list['driver_name']); ?></td>
                                            <td><?php echo htmlentities($list['driver_mobile']); ?></td>
											 <td><?php echo htmlentities($list['inf_waste_in_qty']); ?></td>
											<td><?php echo htmlentities($list['inf_waste_in_Kg']); ?></td>
											 <td><?php echo htmlentities($list['inf_pla_waste_in_qty']); ?></td>
											<td><?php echo htmlentities($list['inf_pla_waste_in_Kg']); ?></td>
											 <td><?php echo htmlentities($list['glassware_waste_in_qty']); ?></td>
											<td><?php echo htmlentities($list['glassware_waste_in_kg']); ?></td>
											<td><?php echo htmlentities($list['gen_waste_in_qty']); ?></td>
                                            <td><?php echo htmlentities($list['gen_waste_in_Kg']); ?></td>
                                           <td><?php echo date('M j h:i A',strtotime(htmlentities($list['create_at'])));?></td>
                                            
                                            
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
	
