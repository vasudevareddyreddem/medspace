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
						<form id="defaultForm" method="post"  action="<?php echo base_url('hospital/addbio_medical_post'); ?>">
							
						<div class="">
    <div class="row clearfix">
        <div class="col-md-12 column table-responsive">
		<form>
            <table class="table table-bordered table-hover" id="tab_logic">
              
                <tbody>
                    <tr id='addr0'>
                       
                        <td>
                       <div class="form-group">
									<label class="label-control">No of Bags</label>
									<div class="">
										<input type="text" id="no_of_bags" name="no_of_bags" class="form-control" placeholder="Enter No of Bags">
									</div>
								</div>
                        </td>
                        <td>
							<div class="form-group">
								<label class="label-control">No of Kgs</label>
								<div class="">
									<input type="text" id="no_of_kgs" name="no_of_kgs" class="form-control" placeholder="Enter No of Kgs">
								</div>
							</div>
                        </td>
                        <td>
							<div class="form-group">
								<label class="label-control">Category</label>
								<div class="">
									<select class="form-control"  name="color_type" id="color_type" style="width:100%;">
									  <option value = "">Select</option>
									  <option value = "yellow">YELLOW</option>
									  <option value = "Red">RED</option>
									  <option value = "Blue">BLUE</option>
									  <option value = "White (ppc)">WHITE (PPC)</option>
									  </select> 								</div>
							</div>
                        </td>
                        <td>
							<div class="form-group">
						<label class="label-control">Weight Type</label>
						<div class="">
							<select class="form-control"  name="weight_type" id="weight_type" style="width:100%;">
							  <option value = "">Select</option>
							  <option value = "Grams">Grams</option>
							  <option value = "Kgs">Kgs</option>
							  </select>
							 </div>
						</div>
                        </td>
                       
                    </tr>
                    <tr id='addr1'></tr>
                </tbody>
            </table>
			</form>
			
        </div>
    </div>
    <!--<a id="add_row" class="btn btn-default pull-left">Add Row</a><a id='delete_row' class="pull-right btn btn-default">Delete Row</a>
	--><div class="form-group ">
                            <div class="text-center ">
                                <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Submit</button>
                                
                            </div>
                        </div>
	<div class="clearfix">&nbsp;</div>
</div>
  </form>
  <div class="table-responsive">
                                <table id="example" class="table table-bordered table-striped table-hover dataTable ">
                                    <thead>
                                        <tr>
                                            <th>No of Bags </th>
                                            <th>No of kgs / No of grams</th>
                                            <th>Category</th>
                                            <th>Weight Type</th>
                                            <th>Barcode</th>
                                            <th>Date & Time </th>
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
                                            <td><?php echo date('d- M- Y H:i:s',strtotime(htmlentities($list['create_at'])));?></td>
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


            
            
    </section>

	<script type="text/javascript">
	      var i=1;
     $("#add_row").click(function(){
      $('#addr'+i).html("<td><div class='form-group'><div class=''><input type='text' id='' name='no_of_bags[]' class='form-control' placeholder='Enter No of Bags'></div></div></td><td><div class='form-group'><div class=''><input type='text' id='' name='no_of_kgs[]' class='form-control' placeholder='Enter No of Kgs'></div></div></td><td>  <div class='form-group'><div class=''><select class='form-control'  name='color_type[]' id='' style='width:100%;'><option value =''>Select</option><option value ='yellow'>YELLOW</option><option value = 'Red'>RED</option><option value ='Blue'>BLUE</option><option value ='White (ppc)'>WHITE (PPC)</option></select></div></div></td><td>  <div class='form-group'><div class=''><select class='form-control'  name='color_type[]' id='' style='width:100%;'><option value =''>Select</option><option value ='Grams'>Grams</option><option value = 'Kgs'>Kgs</option></select></div></div></td>");

      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      i++; 
  });
     $("#delete_row").click(function(){
         if(i>1){
         $("#addr"+(i-1)).html('');
         i--;
         }
     });
	</script>
	<script type="text/javascript">

	$(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
$(document).ready(function() {
    
    $('#defaultForm').bootstrapValidator({
//        
        fields: {
            no_of_kgs: {
                validators: {
					notEmpty: {
						message: 'No of Kgs is required'
					},
					regexp: {
					regexp: /^[0-9.]*$/,
					message: 'No of Kgs can only consist of digits and dot'
					}
				}
            },
            no_of_bags: {
                 validators: {
					notEmpty: {
						message: 'No of bags is required'
					},
					regexp: {
					regexp: /^[0-9.]*$/,
					message: 'No of bags can only consist of digits and dot'
					}
				}
            },
			color_type: {
                validators: {
					notEmpty: {
						message: 'Category is required'
					}
				}
            },
			weight_type: {
                validators: {
					notEmpty: {
						message: 'Weight Type is required'
					}
				}
            }
        }
    });

    // Validate the form manually
    $('#validateBtn').click(function() {
        $('#defaultForm').bootstrapValidator('validate');
    });

    $('#resetBtn').click(function() {
        $('#defaultForm').data('bootstrapValidator').resetForm(true);
    });
});
</script>
