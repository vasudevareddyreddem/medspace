<section class="content">
        <div class="container-fluid">
                  	 <div id="sucessmsg" style="display:none;"></div>

            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
							Add Biomedical waste Details</h2>
                       
                        </div>
						<div class="body">
						
					<div class="modal-content">
							 <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Print Barcode</h4>
							 </div>
							 <div class="modal-body" id="printThis<?php echo htmlentities($bio_medicaldetails['id']); ?>">
								<div  class="row">
								   <div  class="col-md-6 col-md-offset-3">
									  <div class="text-center">
										 <h4>Date:<span><?php echo date('d- M- Y',strtotime(htmlentities($bio_medicaldetails['create_at'])));?></span></h4>
										 <h4>Bio Medical Waste Disposal</h4>
										 <?php if(isset($bio_medicaldetails['profile_pic']) && $bio_medicaldetails['profile_pic']!=''){ ?>
										 <img style="width:100px; height: auto;" src="<?php echo base_url('assets/files/'.$bio_medicaldetails['profile_pic']); ?>" alt="Hospital Logo">
										 <?php }else{ ?>
										 <img style="width:100px; height: auto;" src="<?php echo base_url(); ?>assets/vendor/images/medwasteicon.png" alt="bar code">
										 <?php } ?>
										 <div class="clearfix">&nbsp;</div>
										 <img style="width:auto; height: 60px;" src="<?php echo base_url('assets/bio_medical_barcodes/'.$bio_medicaldetails['barcode']);?>" alt="bar code">
										 <h4><?php echo htmlentities($bio_medicaldetails['color_type']); ?> <?php echo htmlentities($bio_medicaldetails['no_of_kgs']); ?>.<?php echo htmlentities($bio_medicaldetails['weight_type']); ?> [Bags <?php echo htmlentities($bio_medicaldetails['no_of_bags']); ?>]</h4>
										 <p><?php echo $bio_medicaldetails['hospital_name']; ?></p>
										 <p><?php echo $bio_medicaldetails['address1'].', '.$bio_medicaldetails['address2'].', '.$bio_medicaldetails['city'].', '.$bio_medicaldetails['state'].', '.$bio_medicaldetails['country'].', '.$bio_medicaldetails['pincode'].'.'; ?></p>
									  </div>
								   </div>
								</div>
							 </div>
							 <div class="modal-footer">
								<div class="modal-footer">
										<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
										<button id="btnPrint<?php echo htmlentities($bio_medicaldetails['id']); ?>" type="button" class="btn btn-default">Print</button>
								  </div>
							 </div>
						  </div>
					  
						
                        </div>
                    </div>
                </div>
            </div>


            
            
    </section>


