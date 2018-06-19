
<style>
@media screen {
  #printSection {
      display: none;
  }
}

@media print {
  body * {
    visibility:hidden;
  }
  #printSection, #printSection * {
    visibility:visible;
  }
  #printSection {
    position:absolute;
    left:0;
    top:0;
  }
}


</style>
<section class="content">
	<!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2> Bio Medical Waste List</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>No of bags </th>
                                            <th>No of kgs / No of grams</th>
                                            <th>Category</th>
                                            <th>Weight Type</th>
                                            <th>Barcode</th>
                                            <th>Date </th>
                                            <th>Action </th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    
                                    <?php if(isset($bio_medical_list) && count($bio_medical_list)>0){ ?>
										    <tbody>
									<?php foreach($bio_medical_list as $list){ ?>
                                
                                        <tr>
                                            <td><?php echo htmlentities($list['no_of_bags']); ?></td>
                                            <td><?php echo htmlentities($list['no_of_kgs']); ?></td>
                                            <td><?php echo htmlentities($list['color_type']); ?></td>
                                            <td><?php echo htmlentities($list['weight_type']); ?></td>
                                            <td ><img style="max-height:550px;width:auto;"  src="<?php echo base_url('assets/bio_medical_barcodes/'.$list['barcode']);?>"></td>
                                            <td><?php echo date('d- M- Y',strtotime(htmlentities($list['create_at'])));?></td>
                                            <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal<?php echo htmlentities($list['id']); ?>">Print</button></td>
                                          
                                           
                                        </tr>
													<div id="myModal<?php echo htmlentities($list['id']); ?>" class="modal fade" role="dialog">
					   <div class="modal-dialog">
						  <div class="modal-content">
							 <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Print Barcode</h4>
							 </div>
							 <div class="modal-body" id="printThis<?php echo htmlentities($list['id']); ?>">
								<div  class="row">
								   <div  class="col-md-6 col-md-offset-3">
									  <div class="text-center">
										 <h4>Date:<span><?php echo date('d- M- Y',strtotime(htmlentities($list['create_at'])));?></span></h4>
										 <h4>Bio Medical Waste Disposal</h4>
										 <?php if(isset($bio_medical_list[0]['profile_pic']) && $bio_medical_list[0]['profile_pic']!=''){ ?>
										 <img style="width:100px; height: auto;" src="<?php echo base_url('assets/files/'.$bio_medical_list[0]['profile_pic']); ?>" alt="Hospital Logo">
										 <?php }else{ ?>
										 <img style="width:100px; height: auto;" src="<?php echo base_url(); ?>assets/vendor/images/medwasteicon.png" alt="bar code">
										 <?php } ?>
										 <div class="clearfix">&nbsp;</div>
										 <img style="width:auto; height: 60px;" src="<?php echo base_url('assets/bio_medical_barcodes/'.$list['barcode']);?>" alt="bar code">
										 <h4><?php echo htmlentities($list['color_type']); ?> <?php echo htmlentities($list['no_of_kgs']); ?>.<?php echo htmlentities($list['weight_type']); ?> [Bags <?php echo htmlentities($list['no_of_bags']); ?>]</h4>
										 <p><?php echo $list['hospital_name']; ?></p>
										 <p><?php echo $list['address1'].', '.$list['address2'].', '.$list['city'].', '.$list['state'].', '.$list['country'].', '.$list['pincode'].'.'; ?></p>
									  </div>
								   </div>
								</div>
							 </div>
							 <div class="modal-footer">
								<div class="modal-footer">
										<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
										<button id="btnPrint<?php echo htmlentities($list['id']); ?>" type="button" class="btn btn-default">Print</button>
								  </div>
							 </div>
						  </div>
					   </div>
					</div>
					

<script>
document.getElementById("btnPrint<?php echo htmlentities($list['id']); ?>").onclick = function () {
    printElement(document.getElementById("printThis<?php echo htmlentities($list['id']); ?>"));
}

function printElement(elem) {
    var domClone = elem.cloneNode(true);
    
    var $printSection = document.getElementById("printSection");
    
    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }
    
    $printSection.innerHTML = "";
    $printSection.appendChild(domClone);
    window.print();
}
</script>
                                  
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

