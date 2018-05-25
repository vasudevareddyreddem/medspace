<section class="content">
	<!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Hospital List
                            </h2>
                         
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Hospital ID</th>
                                            <th>Mobile</th>
                                            <th>Barcode</th>
                                            <th>Reg Date</th>
                                            <th>Amount Paid (Rs)</th>
                                            <th>Due Amount</th>
                                            <th>Status</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <?php if(isset($hospital_list) && count($hospital_list)>0){ ?>
									<?php foreach($hospital_list as $list){ ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo htmlentities($list['hospital_name']); ?></td>
                                            <td><?php echo htmlentities($list['hospital_id']); ?></td>
                                            <td><?php echo htmlentities($list['mobile']); ?></td>
                                            <td ><img style="max-height:50px;width:auto;" class="img-responsive" src="<?php echo base_url('assets/hospital_barcodes/'.$list['barcode']);?>"></td>
                                            <td><?php echo date('M j h:i A',strtotime(htmlentities($list['create_at'])));?></td>
                                            <td><span>(Rs) &nbsp;</span>15000</td>
                                            <td><span>(Rs) &nbsp;</span>10000</td>
                                            <td><?php if($list['status']==1){ echo "Active"; }else{ echo "Deactive";} ?></td>
                                            <td>
											<a href="<?php echo base_url('hospital/edit/'.base64_encode($list['h_id'])); ?>" class="btn btn-sm btn-primary">Edit</a> 
											<a href="<?php echo base_url('hospital/status/'.base64_encode($list['h_id']).'/'.base64_encode($list['status'])); ?>" class="btn btn-sm btn-primary"><?php if($list['status']==1){ echo "Active"; }else{ echo "Deactive";} ?></a> 
											<a href="<?php echo base_url('hospital/delete/'.base64_encode($list['h_id'])); ?>" class="btn btn-sm btn-primary">Delete</a> 
											</td>
                                        </tr>
										
                                    </tbody>
									<?php } ?>
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
	
