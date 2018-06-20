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
							<div class="col-md-6 px-25px">
						<div class="form-group">
                            <label class="label-control">No of Bags</label>
                            <div class="">
								<input type="text" id="no_of_bags" name="no_of_bags" class="form-control" placeholder="Enter No of Bags">
                            </div>
                        </div>
                        </div>
						<div class="col-md-6 px-25px">
						<div class="form-group">
                            <label class="label-control">No of Kgs</label>
                            <div class="">
								<input type="text" id="no_of_kgs" name="no_of_kgs" class="form-control" placeholder="Enter No of Kgs">
                            </div>
                        </div>
                        </div>
						<div class="col-md-6 px-25px">
                            <label class="col-lg-3 control-label">Category</label>
                            <div class="col-lg-12 form-group">
								  <select class="form-control"  name="color_type" id="color_type" style="width:100%;">
								  <option value = "">Select</option>
								  <option value = "yellow">Yellow</option>
								  <option value = "Red">Red</option>
								  <option value = "Blue">Blue</option>
								  <option value = "White (ppc)">White (ppc)</option>
								  </select>  
                            </div>
                        </div>
						<div class="col-md-6 px-25px">
                            <label class="col-lg-3 control-label">Weight Type</label>
                            <div class="col-lg-12 form-group">
								  <select class="form-control"  name="weight_type" id="weight_type" style="width:100%;">
								  <option value = "">Select</option>
								  <option value = "Grams">Grams</option>
								  <option value = "Kgs">Kgs</option>
								  </select>  
                            </div>
                        </div> 
						
						<div class="clearfix"></div>
						
                        <div class="form-group ">
                            <div class="text-center ">
                                <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Submit</button>
                                
                            </div>
                        </div>
                    </form>
					<div class="clearfix">&nbsp;</div>
					
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
