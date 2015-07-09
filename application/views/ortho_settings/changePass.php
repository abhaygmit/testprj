<div class="container">
  <div class="row-fluid">
   <div class="selectHow_txtWrap clearfix pTop20 font18"> <?php $this->load->view('breadcrumb');?></div>
    <section>
      <article>
        <div class="inconwrap">
          <div class="soswrap1" >
           <?php include('op_leftmenu.php');?>
       </div>       
        <form action="" method="post" name="changePass" id="changePass"  >
          <div class="qawrap1" >
            <h2>Change Password</h2>
            
            <div class="hlogin">
              <div class="hlogin_label"></div>
              <div class="hlogin_inputs" style="font-weight:bold; color:#009900; margin-left:40%;">
                <?php 
				if(isset($message)){
				echo $message;}?>
              </div>
              <div class="clear"></div>
            </div>
            
             <div class="hlogin">
              <div class="hlogin_label">Current Password<span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <input type="password" name="curr_pass" id="curr_pass" value="<?php echo (isset($_POST['curr_pass'])!='')?$_POST['curr_pass']:'';?>"  />
                <?php if(form_error('curr_pass')){echo form_error('curr_pass');} ?>
              </div>
              <div class="clear"></div>
            </div>
            
            <div class="hlogin">
              <div class="hlogin_label">New Password <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <input type="password" name="new_pass" id="new_pass" value="<?php echo (isset($_POST['new_pass'])!='')?$_POST['new_pass']:'';?>"  />
              </div>
              <div class="clear"></div>
            </div>
            
        <div class="hlogin">
              <div class="hlogin_label">Confirm New Password<span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <input type="password" name="confirmPass" id="confirmPass" value="<?php echo (isset($_POST['confirmPass'])!='')?$_POST['confirmPass']:'';?>"  />
              </div>
              <div class="clear"></div>
            </div>
             
            
          
            
             <div class="hlogin">
           <div > <input type="submit" name="Save" class="btnactive m5r" style="border:0px" value="Save" ></div>
           <div> <input type="button" name="cancel" class="btninactive" value="Cancel" onclick="javascript: return history.go(-1)" ></div>
           			
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