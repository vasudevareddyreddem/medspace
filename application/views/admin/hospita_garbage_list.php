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
											<th>No of Yellow Bags</th>
                                            <th>Yellow No of kgs</th>
                                            
											<th>No of Red  Bags</th>
                                            <th>Red No of kgs</th>
											
                                           	<th>No of Blue Bags</th>
                                            <th>Blue No of Kgs</th>
											<th>No of White Bags</th>
                                            <th>White No of Kgs</th>
                                            <th>Date & Time</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php if(isset($garbage_list) && count($garbage_list)>0){ ?>
									    <tbody>
									<?php foreach($garbage_list as $list){ ?>
                                
                                        <tr>
											<td><?php echo htmlentities($list['infected_waste_qty']); ?></td>

											<td><?php echo htmlentities($list['infected_waste_kgs']); ?></td>
											<td><?php echo htmlentities($list['infected_plastics_qty']); ?></td>

											<td><?php echo htmlentities($list['infected_plastics_kgs']); ?></td>
											<td><?php echo htmlentities($list['glassware_watse_qty']); ?></td>

											<td><?php echo htmlentities($list['glassware_watse_kgs']); ?></td>
											<td><?php echo htmlentities($list['genaral_waste_qty']); ?></td>

											<td><?php echo htmlentities($list['genaral_waste_kgs']); ?></td>
                                            
                                            <td><?php echo date('M j h:i A',strtotime(htmlentities($list['create_at'])));?></td>
                                            <td><?php if($list['status']==1){ echo "Active"; }else{ echo "Deactive";} ?></td>
                                            <td><a target="_blank" href="<?php echo base_url('assets/invoices/'.$list['invoice_file']); ?>">Download Invoice</a></td>
                                            
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
	
