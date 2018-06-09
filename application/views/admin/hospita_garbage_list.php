<section class="content">
	<!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               BMW List
                            </h2>
                         
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>General Waste in Kgs</th>
                                            <th>General Waste packet qty</th>
                                            <th>Infected Plastics in Kgs</th>
                                            <th>Infected Plastics packet qty</th>
                                            <th>Infected waste in Kgs</th>
                                            <th>Infected waste packet qty</th>
                                            <th>Glassware waste in Kgs</th>
                                            <th>Glassware waste packet qty</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <?php if(isset($garbage_list) && count($garbage_list)>0){ ?>
									    <tbody>
									<?php foreach($garbage_list as $list){ ?>
                                
                                        <tr>
                                            <td><?php echo htmlentities($list['genaral_waste_kgs']); ?></td>
                                            <td><?php echo htmlentities($list['genaral_waste_qty']); ?></td>
                                            <td><?php echo htmlentities($list['infected_plastics_kgs']); ?></td>
                                            <td><?php echo htmlentities($list['infected_plastics_qty']); ?></td>
                                            <td><?php echo htmlentities($list['infected_waste_kgs']); ?></td>
                                            <td><?php echo htmlentities($list['infected_waste_qty']); ?></td>
                                            <td><?php echo htmlentities($list['glassware_watse_kgs']); ?></td>
                                            <td><?php echo htmlentities($list['glassware_watse_qty']); ?></td>
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
	
