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
                                            <th>Driver Mobile</th>
                                            <th>General Waste in Bags Qty(kgs)</th>
                                            <th>General Waste in Bags(no's)</th>
                                            <th>Infected Plastics in Bags Qty(kgs)</th>
                                            <th>Infected Plastics in Bags(no's)</th>
                                            <th>Infected Waste in Bags Qty(kgs)</th>
                                            <th>Infected Waste  in Bags(no's)</th>
                                            <th>Glassware Waste in Bags Qty(kgs)</th>
                                            <th>Glassware Waste in Bags(no's)</th>
                                            <th>Date & time</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <?php if(isset($waste_list) && count($waste_list)>0){ ?>

									    <tbody>
									<?php foreach($waste_list as $list){ ?>
                                
                                        <tr>
                                            <td><?php echo htmlentities($list['truck_reg_no']); ?></td>
                                            <td><?php echo htmlentities($list['driver_name']); ?></td>
                                            <td><?php echo htmlentities($list['driver_mobile']); ?></td>
                                            <td><?php echo htmlentities($list['gen_waste_in_Kg']); ?></td>
                                            <td><?php echo htmlentities($list['gen_waste_in_qty']); ?></td>
                                            <td><?php echo htmlentities($list['inf_pla_waste_in_Kg']); ?></td>
                                            <td><?php echo htmlentities($list['inf_pla_waste_in_qty']); ?></td>
                                            <td><?php echo htmlentities($list['inf_waste_in_Kg']); ?></td>
                                            <td><?php echo htmlentities($list['inf_waste_in_qty']); ?></td>
                                            <td><?php echo htmlentities($list['glassware_waste_in_kg']); ?></td>
                                            <td><?php echo htmlentities($list['glassware_waste_in_qty']); ?></td>
                                            <td><?php echo date('M j h:i A',strtotime(htmlentities($list['create_at'])));?></td>
                                            <td><?php if($list['status']==1){ echo "Active"; }else{ echo "Deactive";} ?></td>
                                            
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
	
