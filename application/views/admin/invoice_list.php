<section class="content">
	<!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Invoice List
                            </h2>
                         
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Invoice id</th>
                                            <th>Name</th>
                                            <th>Current address</th>
                                            <th>Date & time</th>
                                            <th>Status</th>
                                            <th>Acion</th>
                                        </tr>
                                    </thead>
                                    <?php if(isset($invoice_list) && count($invoice_list)>0){ ?>
									  <tbody>
									<?php foreach($invoice_list as $list){ ?>
                                  
                                        <tr>
                                            <td><?php echo htmlentities($list['id']); ?></td>
                                            <td><?php echo htmlentities($list['invoice_name']); ?></td>
                                            <td><?php echo htmlentities($list['current_address']); ?></td>
                                            <td><?php echo date('M j h:i A',strtotime(htmlentities($list['create_at'])));?></td>
                                            <td><?php if($list['status']==1){ echo "Active"; }else{ echo "Deactive";} ?></td>
                                            <td><a href="<?php echo base_url('assets/invoices/'.$list['invoice_file']); ?>" target="_blank" >download</a></td>
                                            
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
	
