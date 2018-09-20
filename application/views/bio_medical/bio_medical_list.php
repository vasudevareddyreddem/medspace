<section class="content">
	<!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Biomedical Waste List
                            </h2>
                         
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                       <tr>
									        <th>S.NO</th>
                                            <th>No of Bags </th>
                                            <th>No of kgs / No of grams</th>
                                            <th>Category</th>
                                            <th>Weight Type</th>
                                            <th>Barcode</th>
                                            <th>Date & Time </th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    
										
										 <?php $cnt=1;  if(isset($bio_medical_list) && count($bio_medical_list)>0){ ?>
										    <tbody>
									<?php $cnt=1; foreach($bio_medical_list as $list){ ?>
                                
                                        <tr>
										    <td><?php echo $cnt; ?>  </td>
                                            <td><?php echo htmlentities($list['no_of_bags']); ?></td>
                                            <td><?php echo htmlentities($list['no_of_kgs']); ?></td>
                                            <td><?php echo htmlentities($list['color_type']); ?></td>
                                            <td><?php echo htmlentities($list['weight_type']); ?></td>
                                            <td ><img style="max-height:550px;width:auto;"  src="<?php echo base_url('assets/bio_medical_barcodes/'.$list['barcode']);?>"></td>
                                            <td><?php echo date('d- M- Y H:i:s',strtotime(htmlentities($list['create_at'])));?></td>
                                           
                                        </tr>
											
                                  
									<?php $cnt++;} ?>
									  </tbody>
									<?php $cnt++;} ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
</section>
	
