<section class="content">
        <div class="container-fluid">
                  	 <div id="sucessmsg" style="display:none;"></div>

            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
							 Biomedical waste list</h2>
                       
                        </div>
						<div class="body">
						
  <div class="table-responsive">
                                <table id="example" class="table table-bordered table-striped table-hover dataTable ">
                                    <thead>
                                        <tr>
                                            <th>HCF Name </th>
                                            <th>No of Bags </th>
                                            <th>No of kgs / No of grams</th>
                                            <th>Category</th>
                                            <th>Weight Type</th>
                                            <th>Date & Time </th>
                                            <th>Action </th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    
                                    <?php if(isset($bio_medical_list) && count($bio_medical_list)>0){ ?>
										    <tbody>
									<?php foreach($bio_medical_list as $list){ ?>
                                
                                        <tr>
                                            <td><?php echo htmlentities($list['hospital_name']); ?></td>
                                            <td><?php echo htmlentities($list['no_of_bags']); ?></td>
                                            <td><?php echo htmlentities($list['no_of_kgs']); ?></td>
                                            <td><?php echo htmlentities($list['color_type']); ?></td>
                                            <td><?php echo htmlentities($list['weight_type']); ?></td>
                                            <td><?php echo date('d- M- Y H:i:s',strtotime(htmlentities($list['create_at'])));?></td>
                                            <td>
											<?php if($list['invoice_file']==''){ ?>
											<a target="_blank" href="<?php echo base_url('plant/print_biomedical_waste/'.base64_encode($list['id'])); ?>">Print</a>
											<?php }else{ ?>
												<a target="_blank" href="<?php echo base_url('assets/bio_invoices/'.$list['invoice_file']); ?>">Print</a>

											<?php } ?>
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


            
            
    </section>

	<script type="text/javascript">

	$(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );

</script>
