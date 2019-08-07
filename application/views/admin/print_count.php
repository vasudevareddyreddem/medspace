<section class="content">
	<!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Print Stickers count List
                            </h2>
                         
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Number</th>
                                            <th>Range</th>
                                            <th>Date & Time</th>
                                            
                                        </tr>
                                    </thead>
                                    <?php if(isset($s_count_list) && count($s_count_list)>0){ ?>
									  <tbody>
									<?php foreach($s_count_list as $list){ ?>
                                  
                                        <tr>
                                            <td><?php echo htmlentities($list['type']); ?></td>
                                            <td><?php echo htmlentities($list['num']); ?></td>
                                            <td><?php echo htmlentities($list['tnum']); ?></td>
                                            <td><?php echo date('j M Y   h:i A',strtotime(htmlentities($list['created_at'])));?></td>
                                           
                                            
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
	
