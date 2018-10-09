<section class="content">
	<!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Disposal List
                            </h2>
                         
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Disposal Total</th>
                                            <th>Disposal Qty</th>
                                            <th>Remaining Qty</th>
                                            <th>Date & Time</th>
                                            
                                        </tr>
                                    </thead>
                                    <?php if(isset($disposal_list) && count($disposal_list)>0){ ?>
									  <tbody>
									<?php foreach($disposal_list as $list){ ?>
                                  
                                        <tr>
                                            <td><?php echo htmlentities($list['disposal_total']); ?></td>
                                            <td><?php echo htmlentities($list['disposal_qty']); ?></td>
                                            <td><?php echo htmlentities($list['disposal_remaining']); ?></td>
                                            <td><?php echo date('j M Y   h:i A',strtotime(htmlentities($list['create_at'])));?></td>
                                           
                                            
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
	
