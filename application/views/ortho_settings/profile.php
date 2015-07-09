<script>
function profilePg()
{
	window.location="<?php echo base_url()?>op_setting/profile";
}
</script>
<div class="container">
  <div class="row-fluid">
     <div class="selectHow_txtWrap clearfix pTop20 font18"> <?php $this->load->view('breadcrumb');?></div>
     <div style="font-weight:bold; color:#009900; margin-left:480px;"> <?php if($this->session->userdata('updateSuccess')){echo $this->session->userdata('updateSuccess');}?></div>
    <section>
      <article>
        <div class="inconwrap">
          <div class="soswrap1" >
           <?php include('op_leftmenu.php');?>
       </div>       
        <form action="" method="post" name="updateProfile" id="updateProfile"  >
          <div class="qawrap1" >
            <h2>Manage Profile</h2>
            
             <div style="width:50%; float:left">
             
             
        <div class="hlogin">
              <div class="hlogin_label">Name</div>
              <div class="hlogin_inputs" style="padding-top:7px">
                <?php echo $result->full_name;?>
              </div>
              <div class="clear"></div>
            </div>
             <div class="hlogin">
              <div class="hlogin_label">Email </div>
              <div class="hlogin_inputs" style="padding-top:7px">
                <?php echo $result->email;?>
              </div>
              <div class="clear"></div>
            </div>
             <div class="hlogin">
              <div class="hlogin_label">Practice ID </div>
              <div class="hlogin_inputs" style="padding-top:7px">
               <?php echo $result->practice_id;?>
                </div>
              <div class="clear"></div>
            </div>
            <div class="hlogin">
              <div class="hlogin_label">Address </div>
              <div class="hlogin_inputs" style="padding-top:7px">
                <?php echo $result->address_line1;?>
              </div>
              <div class="clear"></div>
            </div>
            <div class="hlogin">
              <div class="hlogin_label"> </div>
              <div class="hlogin_inputs" style="padding-top:7px">
                <?php echo $result->address_line2;?>
              </div>
              <div class="clear"></div>
            </div>
           
            <div class="hlogin">
              <div class="hlogin_label">State </div>
              <div class="hlogin_inputs" style="padding-top:7px">
           <?php echo $result->state;?>
              </div>
              <div class="clear"></div>
            </div>
             <div class="hlogin">
              <div class="hlogin_label">Country </div>
              <div class="hlogin_inputs" style="padding-top:7px">
              <?php $countryNm=$this->common_model->countryNm($result->country);?>
                <?php echo $countryNm[0]->country;?>
              </div>
              <div class="clear"></div>
            </div>
            
            <div class="hlogin">
              <div class="hlogin_label">Zipcode </div>
              <div class="hlogin_inputs" style="padding-top:7px">
           <?php echo $result->zipcode;?>
              </div>
              <div class="clear"></div>
            </div>
             <div class="hlogin">
              <div class="hlogin_label">Phone </div>
              <div class="hlogin_inputs" style="padding-top:7px">
               <?php echo $result->phone;?>
              </div>
              <div class="clear"></div>
            </div>
             <div class="hlogin">
              <div class="hlogin_label">Updated on</div>
              <div class="hlogin_inputs" style="padding-top:7px">
               <?php echo date('M d Y', strtotime($result->modified_by));?>
              </div>
              <div class="clear"></div>
            </div>
            
           
            
            
             <div class="hlogin">
           <div > <input type="button" name="Save" class="btnactive m5r" style="border:0px" value="Edit" onclick="javascript: return window.location.href='update_profile'" ></div>
           <div> <input type="button" name="cancel" class="btninactive" value="Cancel" onclick="return history.go(-1)" ></div>
           			
              <!--<div class="btnactive m5r"><a href="javascript:void(0);" onclick="submit_form('scheduleTemplate');">Save As New Dataset</a></div>
              <div class="btnactive"><a href="<?php echo base_url().'template/createTemplate'?>">Build Schedule Template</a></div>-->
            </div>
            <div class="clear"></div>
          </div>
 
 <?php if($result->profile_image!=''){?>
 
 <div style="width:50%; float:right; "><img src="<?php echo base_url().'uploads/'.$result->profile_image;?>" style="width:100px; height:100px;"/></div>
 <?php } ?>
 </div>
  
 
 
          </form> 
          <div class="clear"></div>
        </div>
      </article>
      </article>
    </section>
  </div>
</div>
<!--<div class="container">
    <div class="row-fluid">
      <div class="selectHow_txtWrap clearfix pTop20 font18">Welcome <?php echo $full_name; ?> To Dashboard</div>
      <section class="register">
      <p>&nbsp;</p>
      <p>Under Construction</p>
      <p>&nbsp;</p>
      <p>Practice ID : <?php echo $practice_id; ?></p>
      </section>  
    </div>
 </div>-->