<section class="content">
	<!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Covers Stock History
                            </h2>
                         
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Yellow</th>
                                            <th>Red</th>
                                            <th>White</th>
                                            <th>Blue</th>
                                            <th>Yellow(C)</th>
                                            <th>Created Date & Time</th>
                                        </tr>
                                    </thead>
                                    
										
										<?php if(isset($hdetails) && count($hdetails)>0){ ?>
										   <tbody>
												<?php foreach($hdetails as $list){ ?>
													<tr>
														<td><?php echo ($list['yellow']); ?></td>
														<td><?php echo ($list['red']); ?></td>
														<td><?php echo ($list['white']); ?></td>
														<td><?php echo ($list['blue']); ?></td>
														<td><?php echo ($list['yellowc']); ?></td>
														
														<td><?php echo date('Y M j h:i A',strtotime(htmlentities($list['created_at'])));?></td>
														
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
	
