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
											<td colspan="2" style="background:yellow;height:40px;"></td>
											<td colspan="2" style="background:red;height:40px;"></td>
											<td colspan="2" style="background:blue;height:40px;"></td>
											<td colspan="2" style="background:#f5f5f5;height:40px;"></td>
											<td colspan="2" style="background:yellow;height:40px;text-align:center;vertical-align:middle;font-size:25px;">C </td>
											<td style="border-bottom:0px"> &nbsp;</td>
											<td style="border-bottom:0px"> &nbsp;</td>
											<td style="border-bottom:0px"> &nbsp;</td>
											
											
										</tr>
                                        <tr>
											<th rowspan="">No of  Bags</th>
                                            <th> No of kgs</th>
											
                                            
											<th>No of   Bags</th>
                                            <th> No of kgs</th>
											
                                           	<th>No of  Bags</th>
                                            <th> No of Kgs</th>
											<th>No of  Bags</th>
                                            <th> No of Kgs</th>
											
											<th>No of  Bags</th>
                                            <th > No of kgs</th>
                                            <th style="border-top:0px" >Date & Time</th>
                                            <th style="border-top:0px">Status</th>
                                            <th style="border-top:0px">Action</th>
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
											<td><?php echo htmlentities($list['infected_c_waste_qty']); ?></td>
											<td><?php echo htmlentities($list['infected_c_waste_kgs']); ?></td>
                                            
                                            <td><?php echo date('M j h:i a',strtotime(htmlentities($list['create_at'])));?></td>
                                            <td><?php if($list['status']==1){ echo "Active"; }else{ echo "Deactive";} ?></td>
                                            <td>
											<?php if($list['invoice_file']!=''){ ?>
											<a target="_blank" href="<?php echo base_url('assets/invoices/'.$list['invoice_file']); ?>">Download Invoice</a></td>
											<?php } ?>
                                            
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
	
