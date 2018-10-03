<section class="content">
        <div class="container-fluid">
       
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Print Stickers</h2>
                       
                        </div>
                        <div class="body">
						
                    <form id="defaultForm" method="post" target="_blank" class="form-horizontal" action="<?php echo base_url('prints/stickers_print'); ?>">
						<div class="form-group">
                            <label class="col-lg-3 control-label">HCF</label>
                            <div class="col-lg-5">
                                <select class="form-control" name="hcf_name" id="hcf_name" style="width:100%;">
                                    <option value="">Select</option>
									<?php if(isset($hcf_list) && count($hcf_list)>0){ ?>
										<?php  foreach($hcf_list as $list){ ?>
										<option value ="<?php echo $list['h_id']; ?>"><?php echo $list['hospital_name']; ?></option>
									   <?php } ?>
                                   <?php } ?>
                                </select>  
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">CBWTF</label>
                            <div class="col-lg-5">
                                <select class="form-control"  name="cbwtf_id" id="cbwtf_id" style="width:100%;">
                                     <option value="">Select</option>
									<?php if(isset($cbwtf_list) && count($cbwtf_list)>0){ ?>
										<?php  foreach($cbwtf_list as $list){ ?>
										<option value ="<?php echo $list['p_id']; ?>"><?php echo $list['disposal_plant_name']; ?></option>
									   <?php } ?>
                                   <?php } ?>
                                </select>  
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Category</label>
                            <div class="col-lg-5">
                                <select class="form-control" name="category_type" id="category_type" style="width:100%;">
                                    <option value = "">Select</option>
                                    <option value = "Yellow">Yellow</option>
                                    <option value = "Red">Red</option>
                                    <option value = "Blue">Blue</option>
                                    <option value = "White">White</option>
                                </select>  
                            </div>
                        </div>     
					
						<div class="form-group">
                            <label class="col-lg-3 control-label">Sticker Size</label>
                            <div class="col-lg-5">
                                <select class="form-control"  name="sticker_size" id="sticker_size" style="width:100%;">
                                    <option value = "">Select</option>
                                    <option value = "4">100 x 40 (mm)</option>
                                    <option value = "2">50 x 35 (mm)</option>
                                    
                                </select>  
                            </div>
                        </div> 

                      
                        <div class="form-group">
                            <div class="col-lg-9 col-lg-offset-3">
                                <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Generate Stickers</button>
                            </div>
                        </div>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
           
    </div>
            
    </section>
	<script type="text/javascript">
$(document).ready(function() {
    
    $('#defaultForm').bootstrapValidator({
//     
        fields: {
            hcf_name: {
                 validators: {
					notEmpty: {
						message: 'HCF is required'
					}
				}
            },
			
			cbwtf_id: {
                 validators: {
					  notEmpty: {
						message: 'CBWTF is required'
					}
                }
            },
			category_type: {
                 validators: {
					  notEmpty: {
						message: 'Category is required'
					}
                }
            },
			sticker_size: {
                 validators: {
					  notEmpty: {
						message: 'Sticker Size is required'
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
