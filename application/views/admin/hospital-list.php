<section class="content">
	<!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Health Care Facility List<a target="_blank" href="<?php echo base_url('hospital/prints'); ?>" class="pull-right"><button class="btn btn-primary btn-sm">Print All Hospitals</button></a>
                            </h2>
							
                        </div>
						<form action="<?php echo base_url('prints/prints'); ?>" target="_blank" method="POST">
                        <div class="body">
                            <div class="table-responsive">
                                <table id="example" class="example table table-bordered table-striped table-hover dataTable ">
                                    <thead>
                                        <tr>
											<th>Select All <input type="checkbox" name="check_all" id="check_all" value=""/>
											<button type="submit" class="btn btn-primary btn-sm">Print</button></th>
                                            <th>Health Care Facility</th>
                                            <th>Health Care Facility ID</th>
                                            <th>Health Care Facility Type</th>
                                            <th>Mobile</th>
                                            <th>No fo Beds</th>
                                            <th>Barcode</th>
                                            <th>Reg Date & Time</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    
                                    <?php if(isset($hospital_list) && count($hospital_list)>0){ ?>
										    <tbody>
									<?php foreach($hospital_list as $list){ ?>
                                
                                        <tr>
											<td><input type="checkbox" class="checkbox" name="h_ids[]" value="<?php echo isset($list['h_id'])?$list['h_id']:''; ?>"></td>

                                            <td><?php echo htmlentities($list['hospital_name']); ?></td>
                                            <td><?php echo htmlentities($list['hospital_id']); ?></td>
                                            <td>
											<?php $states = array ('BH' => 'Bedded Hospital', 'CL' => 'Clinic', 'DI' => 'Dispensary', 'HO' => 'Homeopathy', 'MH' => 'Mobile Hospital', 'SI' => 'Siddha', 'UN' => 'Unani', 'VH' => 'Veterinary Hospital', 'YO' => 'Yoga', 'AH' => 'Animal House', 'BB' => 'Blood Bank', 'DH' => 'Dental Hospital ', 'NH' => 'Nursing Home', 'PL' => 'Pathological Laboratory', 'FA' => 'Institutions/Schools/Companies etc. with First Aid facilities', 'HC' => 'Health Camp'); ?>
											<?php foreach($states as $key=>$state):
											if(isset($list['type'])&& $list['type'] == $key):
											echo $state;
											else : 
											$selected = '';
											endif;
											?>
											<?php endforeach; ?>
											
											</td>
                                            <td><?php echo htmlentities($list['mobile']); ?></td>
                                            <td><?php echo htmlentities($list['no_of_beds']); ?></td>
                                            <td ><img style="max-height:80px;width:80px;"  src="<?php echo base_url('assets/hospital_barcodes/'.$list['barcode']);?>"></td>
                                            <td><?php echo date('Y M j h:i A',strtotime(htmlentities($list['create_at'])));?></td>
                                           <td><?php if($list['status']==1){ echo "Active"; }else{ echo "Deactive";} ?></td>
										
                                            <td>
											<a href="<?php echo base_url('hospital/edit/'.base64_encode($list['h_id'])); ?>" class="btn btn-sm btn-primary">Edit</a> 
											<a href="<?php echo base_url('hospital/status/'.base64_encode($list['h_id']).'/'.base64_encode($list['status'])); ?>" class="btn btn-sm btn-primary"><?php if($list['status']==0){ echo "Active"; }else{ echo "Deactive";} ?></a> 
											<a href="<?php echo base_url('hospital/delete/'.base64_encode($list['h_id'])); ?>" class="btn btn-sm btn-primary">Delete</a>
											<a target="_blank" href="<?php echo base_url('hospital/idcard/'.base64_encode($list['h_id'])); ?>" class="btn btn-sm btn-primary">Id</a>
                                            <a target="_blank" href="<?php echo base_url('prints/barcode/'.base64_encode($list['h_id'])); ?>" class="btn btn-sm btn-primary">Print Barcode</a> 											
											</td>
                                        </tr>
										
                                  
									<?php } ?>
									  </tbody>
									<?php } ?>
                                </table>
								</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
</section>
<script>

$(document).ready(function() {
    $('#example').DataTable( {
        "lengthMenu": [[12, 24, 60, -1], [12, 24, 60, "All"]]
    } );
} );
  $(document).ready(function(){
        $('#check_all').on('click',function(){
            if(this.checked){
                $('.checkbox').each(function(){
                    this.checked = true;
                });
            }else{
                $('.checkbox').each(function(){
                    this.checked = false;
                });
            }
        });

        $('.checkbox').on('click',function(){
            if($('.checkbox:checked').length == $('.checkbox').length){
                $('#check_all').prop('checked',true);
            }else{
                $('#check_all').prop('checked',false);
            }
        });
    });
</script>
	
