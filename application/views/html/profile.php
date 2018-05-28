
<?php //echo '<pre>';print_r($profile_detail);exit; ?>
<section class="content">
   <div class="container-fluid">
      <!-- Basic Validation -->
      <div class="row clearfix">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
               <div class="header">
                  <h2>Profile</h2>
				  <a  href="" class="btn btn-sm btn-primary " style="float:right;margin-top:-20px">Edit Profile</a>
               </div>
               <div class="body">
                  <div class="col-md-12 ">
                     <div class="col-sm-4" style="border-right:1px solid #ddd;">
                        <div  align="center">
                           <div >
                              <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive" style="max-height:100px;max-width:auto;"> 
                           </div>
                           <input id="profile-image-upload" id="profile_pic" name="profile_pic" onchange="Checkfiles()" class="hidden" type="file">
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
	
	function Checkfiles(){
		var fup = document.getElementById('profile_pic');
		var fileName = fup[0].value;
		var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
		if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG")
		{
		return true;
		} 
		else
		{
		alert("Upload Gif or Jpg images only");
		return false;
		}

	}
  $(function() {
    $('#profile-image1').on('click', function() {
        $('#profile-image-upload').click();
    });
});       
  </script> 