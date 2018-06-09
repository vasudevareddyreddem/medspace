<section class="content">
	<!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               CBWTF daily report
                            </h2>
                         
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Name & Address of the CBWTF  </th>
                                            <th>Date </th>
                                            <th>Time </th>
                                            <th>Yellow  No. of Bags </th>
                                            <th>Yellow  Quantity</th>
                                            <th>Red No. of Bags </th>
                                            <th>Red Quantity</th>
											<th>White No. of Bags </th>
                                            <th>White Quantity</th>
											<th>Blue No. of Bags </th>
                                            <th>Blue Quantity</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    
                                    
                                    <?php if(isset($hospital_reports) && count($hospital_reports)>0){ ?>
										    <tbody>
									<?php foreach($hospital_reports as $list){ ?>
                                
                                        <tr>
                                            <td><?php echo htmlentities($list['plant_name']); ?>,<?php echo htmlentities($list['address']); ?></td>
                                            <td><?php echo htmlentities($list['datetime']); ?></td>
                                            <td><?php echo htmlentities($list['datetime']); ?></td>
                                            <td><?php echo htmlentities($list['yellow_no_of_Bags']); ?></td>
                                            <td><?php echo htmlentities($list['yellow_qty']); ?></td>
                                            <td><?php echo htmlentities($list['red_no_of_Bags']); ?></td>
                                            <td><?php echo htmlentities($list['red_qty']); ?></td>
                                            <td><?php echo htmlentities($list['white_no_of_Bags']); ?></td>
                                            <td><?php echo htmlentities($list['white_qty']); ?></td>
                                            <td><?php echo htmlentities($list['blue_no_of_Bags']); ?></td>
                                            <td><?php echo htmlentities($list['blue_qty']); ?></td>
                                           
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
	
