<section class="content">
	<!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Covers Invoice List
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
                                            <th>Used Covers Quantity</th>
                                            <th>Remaining Covers Quantity</th>
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
														<td>
															Yellow : <?php echo isset($list['yellow'])?$list['yellow']:'0'; ?>,
															Red : <?php echo isset($list['red'])?$list['red']:'0'; ?>,
															White : <?php echo isset($list['white'])?$list['white']:'0'; ?>,
															Blue : <?php echo isset($list['blue'])?$list['blue']:'0'; ?>,
															Yellow(c) : <?php echo isset($list['yellowc'])?$list['yellowc']:'0'; ?>
															
														</td>
														<td>
															Yellow : <?php echo isset($sdetails['yellow'])?$sdetails['yellow']:'0'; ?>,
															Red : <?php echo isset($sdetails['red'])?$sdetails['red']:'0'; ?>,
															White : <?php echo isset($sdetails['white'])?$sdetails['white']:'0'; ?>,
															Blue : <?php echo isset($sdetails['blue'])?$sdetails['blue']:'0'; ?>,
															Yellow(c) : <?php echo isset($sdetails['yellowc'])?$sdetails['yellowc']:'0'; ?>
															
														</td>
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
	
