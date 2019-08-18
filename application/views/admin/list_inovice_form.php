<section class="content">
	<!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Colour Invoice List
                            </h2>
                         
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Invoice</th>
                                            <th>e-Way Bill No</th>
                                            <th>HCF</th>
                                            <th>Plant</th>
                                            <th>Created Date & Time</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    
										
										<?php if(isset($invoice_list) && count($invoice_list)>0){ ?>
										   <tbody>
												<?php foreach($invoice_list as $list){ ?>
													<tr>
														<td><?php echo ($list['invoice_id']); ?></td>
														<td><?php echo ($list['e_way_bill_no']); ?></td>
														<td><?php echo ($list['hospital_name']); ?></td>
														<td><?php echo ($list['disposal_plant_name']); ?></td>
														<td><?php echo date('Y M j h:i A',strtotime(htmlentities($list['created_at'])));?></td>
														<td>
															<a download target="_blank" href="<?php echo base_url('assets/invoices_form/'.$list['invoice_name']); ?>" class="btn btn-sm btn-primary">Download</a> 
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
	
