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
                           <input id="profile-image-upload" class="hidden" type="file">
                           <div style="color:#999;" >click here to change profile image</div>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <h4 >Truck Driver Name </h4>
                        </span>
                        <span>
                           <p>Driver</p>
                        </span>
                     </div>
                     <div class="clearfix"></div>
                     <hr style="margin:5px 0 5px 0;">
					 <br>
                     <div class="col-sm-5 col-xs-6 tital " >First Name:</div>
                     <div class="col-sm-7 col-xs-6 ">Prasad</div>
                     <div class="clearfix"></div>
                     <div class="bot-border"></div>
                     <div class="col-sm-5 col-xs-6 tital " >Middle Name:</div>
                     <div class="col-sm-7"> Shankar</div>
                     <div class="clearfix"></div>
                     <div class="bot-border"></div>
                     <div class="col-sm-5 col-xs-6 tital " >Last Name:</div>
                     <div class="col-sm-7"> Huddedar</div>
                     <div class="clearfix"></div>
                     <div class="bot-border"></div>
                     <div class="col-sm-5 col-xs-6 tital " >Date Of Joining:</div>
                     <div class="col-sm-7">15 Jun 2016</div>
                     <div class="clearfix"></div>
                     <div class="bot-border"></div>
                     <div class="col-sm-5 col-xs-6 tital " >Date Of Birth:</div>
                     <div class="col-sm-7">11 Jun 1998</div>
                     <div class="clearfix"></div>
                     <div class="bot-border"></div>
                     <div class="col-sm-5 col-xs-6 tital " >Place Of Birth:</div>
                     <div class="col-sm-7">Shirdi</div>
                     <div class="clearfix"></div>
                     <div class="bot-border"></div>
                     <div class="col-sm-5 col-xs-6 tital " >Nationality:</div>
                     <div class="col-sm-7">Indian</div>
                     <div class="clearfix"></div>
                     <div class="bot-border"></div>
                     <div class="col-sm-5 col-xs-6 tital " >Relition:</div>
                     <div class="col-sm-7">Hindu</div>
                  </div>
					<!-- edit profile start-->
					<form id="defaultForm" method="post" class="form-horizontal" action="<?php echo base_url('hospital/addpost'); ?>">
						<div class="form-group">
                            <label class="col-lg-3 control-label">Hospital Name</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="hospital_name" id="hospital_name" value="Enter Hospital Name" />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-3 control-label">Hospital ID</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="hospital_id" id="hospital_id" value="Enter Hospital ID" />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-3 control-label">Mobile</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="mobile" id="mobile" value="Enter mobile" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email address</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" name="email" id="email" value="Enter Email address" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Password</label>
                            <div class="col-lg-5">
                                <input type="password" class="form-control" id="password" name="password" value="Enter Password" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Retype password</label>
                            <div class="col-lg-5">
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" value="Enter Confirm Password " />
                            </div>
                        </div> 
						<div class="form-group">
                            <label class="col-lg-3 control-label">Address</label>
                            <div class="col-lg-5">
                                <textarea class="form-control" rows="5" id="address" name="address"></textarea>
                            </div>
                        </div>

                       
                        <div class="form-group">
                            <label class="col-lg-3 control-label" id="captchaOperation"></label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control" name="captcha" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-9 col-lg-offset-3">
                                <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Upadate</button>
                                
                            </div>
                        </div>
                    </form>
					<!-- edit profile end-->
                  <div class="clearfix">&nbsp;</div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
	<script>
              $(function() {
    $('#profile-image1').on('click', function() {
        $('#profile-image-upload').click();
    });
});       
              </script> 