<div class="container">
    <div class="row-fluid">
      <?php if($this->session->userdata('msg')){ ?>   
      <span class="rederror" id="main_error"><?php echo $this->session->userdata('msg'); ?></span>
      <?php } ?>
      <div class="selectHow_txtWrap clearfix pTop20 font18">Change Password:</div>
      <form method="post" action="" namne="changepassword_form" id="changepassword_form">
      <div class="stp5_frmWrap">
        <div class="forminwrap">
          <div class="fldLable">Old Password:</div>
          <div class="fldWrap">
            <input type="password" name="old_pass" id="old_pass" maxlength="80" />  
            <span class="rederror"><?php echo form_error('old_pass'); ?></span>
          </div>
          <div class="clear"></div>
        </div>  
        <div class="forminwrap">
          <div class="fldLable">New Password:</div>
          <div class="fldWrap">
            <input type="password" name="new_pass" id="new_pass" maxlength="80" />  
            <span class="rederror"><?php echo form_error('new_pass'); ?></span>
          </div>
          <div class="clear"></div>
        </div>
        <div class="forminwrap">
          <div class="fldLable">Confirm Password:</div>
          <div class="fldWrap">
            <input type="password" name="cnew_pass" id="cnew_pass" maxlength="80" />  
            <span class="rederror"><?php echo form_error('cnew_pass'); ?></span>
          </div>
          <div class="clear"></div>
        </div>
        <div class="forminwrap">
          <div class="fldLable">&nbsp;</div>
          <div class="fldWrap">
              <div><input class="btnactive_input" type="submit" name="cpass_submit_btn" value="Change"></div>
              <div><input class="btninactive" type="button" name="cpass_submit_btn" value="Cancel" onclick="reset_form('changepassword_form');"></div>           
          </div>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
      </div>
      </form>
    </div>
  </div>