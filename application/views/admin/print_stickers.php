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
						
                    <form id="defaultForm" method="post" target="_blank" class="form-horizontal" action="<?php echo base_url('prints/print_stickers'); ?>">
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
									 <option value = "Yellow(C)">Yellow(C)</option>

                                </select>  
                            </div>
                        </div>
						<!--<div class="form-group">
                            <label class="col-lg-3 control-label">Font size (px)</label>
                            <div class="col-lg-5">
                                <select class="form-control" name="" id="" style="width:100%;">
                                    <option value = "">Select</option>
                                    <option >1 px</option>
                                    <option >2 px</option>
                                    <option>3 px</option>
                                    <option >4 px</option>
                                    <option >5 px</option>
                                    <option >6 px</option>
                                    <option >7 px</option>
                                    <option >8 px</option>
                                    <option >9 px</option>
                                    <option >10 px</option>
                                    <option >11 px</option>
                                    <option >12 px</option>
                                    <option >13 px</option>
                                    <option >14 px</option>
                                    <option >15 px</option>
                                    <option >16 px</option>
                                    <option >17 px</option>
                                    <option >18 px</option>
                                    <option >19 px</option>
                                    <option >20 px</option>
                                </select>  
                            </div>
                        </div>  -->   
					
						<div class="form-group">
                            <label class="col-lg-3 control-label">Sticker Size</label>
                            <div class="col-lg-5">
                                <select class="form-control" onchange="get_p_type(this.value);"  name="sticker_size" id="sticker_size" style="width:100%;">
                                    <option value = "">Select</option>
                                    <option value ="4">100 x 40 (mm)</option>
                                    <option value ="2">64 x 34 (mm)</option>
                                    <option value ="3">45 x 21 (mm)</option>
                                    <option value ="5">48 x 24 (mm)</option>
                                    <option value ="6">38 x 25 (mm)</option>                                    
                                    <option value ="7">50 x 50 (mm)</option>                                    
                                    <option value ="8">45(d)</option>                                    
                                    <option value ="9">100 x 50 (mm)</option>                                    
                                </select>  
                            </div>
                        </div>
						<div class="form-group" id="s_p_type" style="display:none;">
                            <label class="col-lg-3 control-label">Sticker Count</label>
                            <div class="col-lg-5">
								<input type="text" name="sticker_cont" id="sticker_cont" class="form-control" style="width:100%;" >
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
	function get_p_type(id){
		if(id==6 || id==7){
			$('#s_p_type').show();
		}else{
			$('#s_p_type').hide();
		}
	}
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
            },
			sticker_cont: {
                 validators: {
					  notEmpty: {
						message: 'Sticker count is required'
						},
						regexp: {
						regexp: /^[0-9]+$/,
						message: 'Sticker count can only consist of digits'
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
