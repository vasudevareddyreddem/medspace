<section class="content">
        <div class="container-fluid">
       
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
							Disposal Waste</h2>
                       
                        </div>
                        <div class="body">
						
                    <form id="defaultForm" onsubmit="return check_validations();" method="post" class="form-horizontal" action="<?php echo base_url('plant/adddisposal'); ?>">
					
						<div class="row">
						<div class="col-md-6 px-25px">
						<div class="form-group">
                            <label class="label-control">Disposal Total</label>
                            <div class="">
                                <input type="text" class="form-control" id="disposal_total" name="disposal_total" value="" />
                            </div>
                        </div>
                        </div>
                        
						<div class="col-md-6 px-25px">
						<div class="form-group">
                            <label class="label-control">Disposal Qty</label>
                            <div class="">
                                <input type="text" class="form-control" onkeyup="remainingqty(this.value)" id="disposal_qty" name="disposal_qty" value="" />
                            </div>
                        </div>
                        </div>
						</div>
						<div class="row">
						<div class="col-md-6 px-25px">
						<div class="form-group">
                            <label class="label-control">Remaining Qty</label>
                            <div class="">
                                <input type="text" class="form-control" id="disposal_remaining" name="disposal_remaining" value="" />
                            </div>
                        </div>
                        </div>
                        </div>
						
                        <div class="col-md-12 form-group ">
                            <div class="text-center ">
                                <button type="submit" class="btn btn-primary" name="signup" >Submit</button>
                                
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
	
	function check_validations(){
		var total=$('#disposal_remaining').val();
		var d_total=$('#disposal_total').val();
		var d_q_total=$('#disposal_qty').val();
		if(total=='' && d_total!='' && d_q_total!=''){
			alert('Remaining Qty is required');return false;
		}
	}
	function remainingqty(id){
		var amt=document.getElementById("disposal_total").value;
		var total= amt- id;
		$('#disposal_remaining').val(total);
		
	
	}
$(document).ready(function() {
     $('#defaultForm').bootstrapValidator({
//      
        fields: {
            disposal_total: {
                validators: {
					notEmpty: {
						message: 'Disposal Total is required'
					},
					regexp: {
					regexp: /^[0-9.]*$/,
					message: 'Disposal Total can only consist of digits and dot'
					}
				}
            },
            disposal_qty: {
                 validators: {
					notEmpty: {
						message: 'Disposal Qty is required'
					},
					regexp: {
					regexp: /^[0-9.]*$/,
					message: 'Disposal Qty can only consist of digits and dot'
					}
				}
            },
			disposal_remaining: {
                validators: {
					
					regexp: {
					regexp: /^[0-9.]*$/,
					message: 'Remaining Qty can only consist of digits and dot'
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
