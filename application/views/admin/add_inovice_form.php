<section class="content">
	<div class="container-fluid">
		<!-- Basic Validation -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>Add Invoice</h2>
					</div>
					<div class="body">
						<form>
							<div class="">
								<div class="col-md-12 ">
									<table class="table table-bordered table-hover" id="tab_logic">
										<tbody>
											<tr id='addr0'>
												<td>
													<div class="form-group">
													<label>Field 1</label>
														<div class=" ">
															<input type="text" class="form-control" placeholder="field 1">
														</div>
													</div>
												</td>
												<td>
													<div class="form-group">
													<label>Field 2</label>
														<div class=" ">
															<input placeholder="field 2" type="text" class="form-control ">
														</div>
													</div>
												</td>
												<td>
													<div class="form-group">
													<label>Field 3</label>
														<div class=" ">
															<input placeholder="field 3" type="text" class="form-control ">
														</div>
													</div>
												</td>
												<td>
													<div class="form-group">
													<label>Field 4</label>
														<div class=" ">
															<input placeholder="field 4" type="text" class="form-control ">
														</div>
													</div>
												</td>
												<td>
													<div class="form-group">
													<label>Field 5</label>
														<div class=" ">
															<input placeholder="field 5" type="text" class="form-control ">
														</div>
													</div>
												</td>
											</tr>
											<tr id='addr1'></tr>
										</tbody>
									</table>	<a id="add_row" class="btn btn-default pull-left">Add Row</a>
									<a id='delete_row' class="pull-right btn btn-default">Delete Row</a>
								</div>
							</div>
						</form>
						<div class="clearfix">&nbsp;</div>
					</div>
				</div>
			</div>
		</div>
</section>
<script>
	$(document).ready(function(){
	      var i=1;
	     $("#add_row").click(function(){
	      $('#addr'+i).html("<td><input type='text' placeholder='Field 1' class='form-control'/></td><td><input type='text' placeholder='Field 2' class='form-control'/></td><td><input type='text' placeholder='Field 3' class='form-control'/></td><td><input type='text' placeholder='Field 4' class='form-control'/></td><td><input type='text' placeholder='Field 5' class='form-control'/></td>");
	
	      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
	      i++; 
	  });
	     $("#delete_row").click(function(){
	    	 if(i>1){
			 $("#addr"+(i-1)).html('');
			 i--;
			 }
		 });
	
	});
</script>