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
	
