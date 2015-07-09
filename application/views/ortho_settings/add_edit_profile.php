<script>
function profilePg()
{
	window.location="<?php echo base_url()?>op_setting/profile";
}
</script>
<div class="container">
  <div class="row-fluid">
     <div class="selectHow_txtWrap clearfix pTop20 font18"> <?php $this->load->view('breadcrumb');?></div>
    <section>
      <article>
        <div class="inconwrap">
          <div class="soswrap1" >
           <?php include('op_leftmenu.php');?>
       </div>       
        <form action="" method="post" name="updateProfile" id="updateProfile" enctype="multipart/form-data"  >
          <div class="qawrap1" >
            <h2>Manage Profile</h2>
             
        <div class="hlogin">
              <div class="hlogin_label">Name<span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <input type="text" name="uname" id="uname" value="<?php echo ($result->full_name!='')?$result->full_name:'';?><?php echo ($_POST['uname']!='')?$_POST['uname']:'';?>"  />
              </div>
              <div class="clear"></div>
            </div>
             <div class="hlogin">
              <div class="hlogin_label">Email <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <input type="text" name="email" id="email" value="<?php echo ($result->email!='')?$result->email:'';?><?php echo ($_POST['email']!='')?$_POST['email']:'';?>" readonly  />
              </div>
              <div class="clear"></div>
            </div>
             <div class="hlogin">
              <div class="hlogin_label">Practice <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <input type="text" name="practice_id" id="practice_id" value="<?php echo ($result->practice_id!='')?$result->practice_id:'';?>" disabled />
              </div>
              <div class="clear"></div>
            </div>
            <div class="hlogin">
              <div class="hlogin_label">Address Line1 <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <input type="text" name="address1" id="address1" value="<?php echo ($result->address_line1!='')?$result->address_line1:'';?><?php echo ($_POST['address']!='')?$_POST['address']:'';?>"  />
              </div>
              <div class="clear"></div>
            </div>

			<div class="hlogin">
              <div class="hlogin_label">Address Line2</div>
              <div class="hlogin_inputs">
                <input type="text" name="address2" id="address2" value="<?php echo ($result->address_line2!='')?$result->address_line2:'';?><?php echo ($_POST['address2']!='')?$_POST['address2']:'';?>"  />
              </div>
              <div class="clear"></div>
            </div>
            
           
            <div class="hlogin">
              <div class="hlogin_label">State <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <input type="text" name="state" id="state" value="<?php echo ($result->state!='')?$result->state:'';?><?php echo ($_POST['state']!='')?$_POST['state']:'';?>"  />
              </div>
              <div class="clear"></div>
            </div>
            
             <div class="hlogin">
              <div class="hlogin_label">Country <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <!--<input type="text" name="country" id="country" value="<?php echo ($result->country!='')?$result->country:'';?><?php echo ($_POST['country']!='')?$_POST['country']:'';?>"  />-->
                <select name="country" id="country">
                <option value="">----Country----</option>
                <?php foreach($countylist as $country){ ?>
                <option value="<?php echo $country->ccode;?>" <?php echo ($country->ccode==$result->country)?"selected":"";?>><?php echo $country->country;?></option>
                <?php } ?>
                </select>
                
                
              </div>
              <div class="clear"></div>
            </div>
            
            <div class="hlogin">
              <div class="hlogin_label">Zipcode <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <input type="text" name="zip" id="zip" value="<?php echo ($result->zipcode!='')?$result->zipcode:'';?><?php echo ($_POST['zip']!='')?$_POST['zip']:'';?>"  />
              </div>
              <div class="clear"></div>
            </div>
             <div class="hlogin">
              <div class="hlogin_label">Phone <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <input type="text" name="phone" id="phone" value="<?php echo ($result->phone!='')?$result->phone:'';?><?php echo ($_POST['phone']!='')?$_POST['phone']:'';?>"  />
              </div>
              <div class="clear"></div>
            </div>
             <div class="hlogin">
              <div class="hlogin_label">Website</div>
              <div class="hlogin_inputs">
                <input type="text" name="website" id="website" value="<?php echo ($result->website!='')?$result->website:'';?><?php echo ($_POST['website']!='')?$_POST['website']:'';?>"  />
              </div>
              <div class="clear"></div>
            </div>
            
             <div class="hlogin">
              <div class="hlogin_label">Profile Image</div>
              <div class="hlogin_inputs">
               <div id="file_browse_wrapper" style="float:left">
                <input type="file" id="file_browse" name="userfile" value="">
            </div>
            <?php if($result->profile_image!=''){?>
            <div style="width:100px; float:left; text-align:center">
 				 <img src="<?php echo base_url().'uploads/'.$result->profile_image;?>" style="width:50px; height:50px;"/>
                 <br/><a href="<?php echo base_url().'op_setting/deletePic'?>">Delete</a></div>
 			<?php } ?>
            <div style="float:left"></div>
              </div>
              <div class="clear"></div>
            </div>
            
             <div class="hlogin">
           <div > <input type="submit" name="Save" class="btnactive m5r" style="border:0px" value="Save" ></div>
           <div> <input type="button" name="cancel" class="btninactive" value="Cancel" onclick="profilePg()" ></div>
           			
              <!--<div class="btnactive m5r"><a href="javascript:void(0);" onclick="submit_form('scheduleTemplate');">Save As New Dataset</a></div>
              <div class="btnactive"><a href="<?php echo base_url().'template/createTemplate'?>">Build Schedule Template</a></div>-->
            </div>
            <div class="clear"></div>
          </div>
 
          </form> 
          <div class="clear"></div>
        </div>
      </article>
      </article>
    </section>
  </div>
</div>
