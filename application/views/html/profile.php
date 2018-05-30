
<?php //echo '<pre>';print_r($profile_detail);exit; ?>
<section class="content">
   <div class="container-fluid">
      <!-- Basic Validation -->
      <div class="row clearfix">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
               <div class="header">
                  <h2>Profile</h2>
				   <?php if($profile_detail['role']==4){ ?>
				  <a  href="<?php echo base_url('plant/edit/'.base64_encode($profile_detail['p_id'])); ?>" class="btn btn-sm btn-primary " style="float:right;margin-top:-20px">Edit Profile</a>
				   <?php }else if($profile_detail['role']==2){?>
				   				  <a  href="<?php echo base_url('hospital/edit/'.base64_encode($profile_detail['h_id'])); ?>" class="btn btn-sm btn-primary " style="float:right;margin-top:-20px">Edit Profile</a>

				   <?php } ?>
               </div>
               <div class="body">
                  <div class="col-md-12 ">
                     <div class="col-sm-4" style="border-right:1px solid #ddd;">
                        <div  align="center">
                           <div >
						   <?php if($profile_detail['profile_pic']==''){ ?>
							            <img alt="<?php echo isset($profile_detail['profile_pic'])?$profile_detail['profile_pic']:''; ?>" src="<?php echo base_url('assets/files/nobody_m.original.jpg'); ?>" id="profile-image1" class="img-circle img-responsive" style="max-height:100px;max-width:auto;"> 

						   <?php  }else{ ?>
						   		<img alt="<?php echo isset($profile_detail['profile_pic'])?$profile_detail['profile_pic']:''; ?>" src="<?php echo base_url('assets/files/'.$profile_detail['profile_pic']); ?>" id="profile-image1" class="img-circle img-responsive" style="max-height:100px;max-width:auto;"> 

						   <?php } ?>
                           </div>
                           <form id="upload_file" action="<?php echo base_url('admin/save_profile_pic'); ?>" method="post" enctype="multipart/form-data">
						   <input id="profile-image-upload" id="profile_pic" name="profile_pic" onchange="Checkfiles(this.value)" class="hidden" type="file">
                           </form>
						   <div style="color:#999;" >click here to change profile image</div>
                        </div>
                     </div>
					 
					 <?php if($profile_detail['role']==4){ ?>
                     <div class="col-sm-6">
                        <h4 >Plant  Name </h4>
                        </span>
                        <span>
                           <p><?php echo isset($profile_detail['disposal_plant_name'])?$profile_detail['disposal_plant_name']:''; ?></p>
                        </span>
                     </div>
                     <div class="clearfix"></div>
                     <hr style="margin:5px 0 5px 0;">
					 <br>
                     <div class="col-sm-5 col-xs-6 tital " >Disposal Plant ID:</div>
                     <div class="col-sm-7 col-xs-6 "><?php echo isset($profile_detail['disposal_plant_id'])?$profile_detail['disposal_plant_id']:''; ?></div>
                     <div class="clearfix"></div>
                     <div class="bot-border"></div>
                     <div class="col-sm-5 col-xs-6 tital " >Mobile:</div>
                     <div class="col-sm-7"> <?php echo isset($profile_detail['mobile'])?$profile_detail['mobile']:''; ?></div>
                     <div class="clearfix"></div>
                     <div class="bot-border"></div>
                     <div class="col-sm-5 col-xs-6 tital " >Email address:</div>
                     <div class="col-sm-7"> <?php echo isset($profile_detail['email'])?$profile_detail['email']:''; ?></div>
                     <div class="clearfix"></div>
                     <div class="bot-border"></div>
                     <div class="col-sm-5 col-xs-6 tital " >Address:</div>
                     <div class="col-sm-7"><?php echo isset($profile_detail['address'])?$profile_detail['address']:''; ?></div>
                     <div class="clearfix"></div>
                    <?php }else if($profile_detail['role']==2){ ?>
					 <div class="col-sm-6">
                        <h4 >Hospital  Name </h4>
                        </span>
                        <span>
                           <p><?php echo isset($profile_detail['hospital_name'])?$profile_detail['hospital_name']:''; ?></p>
                        </span>
                     </div>
                     <div class="clearfix"></div>
                     <hr style="margin:5px 0 5px 0;">
					 <br>
                     <div class="col-sm-5 col-xs-6 tital " >Hospital  ID:</div>
                     <div class="col-sm-7 col-xs-6 "><?php echo isset($profile_detail['hospital_id'])?$profile_detail['hospital_id']:''; ?></div>
                     <div class="clearfix"></div>
					  <div class="bot-border"></div>
                     <div class="col-sm-5 col-xs-6 tital " >Mobile:</div>
                     <div class="col-sm-7"> <?php echo isset($profile_detail['mobile'])?$profile_detail['mobile']:''; ?></div>
                     <div class="clearfix"></div>
                     <div class="bot-border"></div>
                     <div class="col-sm-5 col-xs-6 tital " >Email address:</div>
                     <div class="col-sm-7"> <?php echo isset($profile_detail['email'])?$profile_detail['email']:''; ?></div>
                     <div class="clearfix"></div>
					  <div class="bot-border"></div>
                     <div class="col-sm-5 col-xs-6 tital " >Address:</div>
                     <div class="col-sm-7"><?php echo isset($profile_detail['address'])?$profile_detail['address']:''; ?></div>
                     <div class="clearfix"></div>
					 <div class="bot-border"></div>
                     <div class="col-sm-5 col-xs-6 tital " >Barcode:</div>
                     <div class="col-sm-7"><img style="max-height:50px;width:auto;" class="img-responsive" src="<?php echo base_url('assets/hospital_barcodes/'.$profile_detail['barcode']);?>"></div>
                     <div class="clearfix"></div>
					
					<?php } ?>
                  </div>
					<!-- edit profile start-->
					
					<!-- edit profile end-->
                  <div class="clearfix">&nbsp;</div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
	<script>
	
	function Checkfiles(val){
			var fileName =val;
		var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
		if(ext !=''){
			if(ext == "png" || ext == "gif" || ext == "Png" || ext == "jpeg" || ext == "jpg")
			{
					 document.getElementById("upload_file").submit(); 
			} else{
			alert('Uploaded file is not a valid. Only png,gif,Png,jpeg,jpg files are allowed');
			return false;
			}
		}

	}
  $(function() {
    $('#profile-image1').on('click', function() {
        $('#profile-image-upload').click();
    });
});       
  </script> 