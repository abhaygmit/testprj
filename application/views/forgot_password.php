<script>
function goToBase()
{
	window.location="<?php echo base_url();?>";
}
</script>


<div class="container">
    <div class="row-fluid">
        <?php if($this->session->userdata('msg')){ ?>   
            <span class="rederror" id="main_error"><?php echo $this->session->userdata('msg'); ?></span>
        <?php } ?>
      <div class="selectHow_txtWrap clearfix pTop20 font18">Forgot Password:</div>
      <form method="post" action="" namne="forgotpassword_form" id="forgotpassword_form">
      <div class="stp5_frmWrap">
        <div class="forminwrap">
          <div class="fldLable">Email Id:</div>
          <div class="fldWrap">
            <input type="text" name="user_email" id="user_email" maxlength="80" placeholder="Email" />  
            <span class="rederror"><?php echo form_error('user_email'); ?></span>
          </div>
          <div class="clear"></div>
        </div>
        <div class="forminwrap">
          <div class="fldLable">&nbsp;</div>
          <div class="fldWrap">
              <div class="btnactive"><a href="javascript:void(0);" onclick="submit_form('forgotpassword_form');">Send</a></div>
            <div class="btninactive"><a href="javascript:void(0);" onClick="goToBase()">Cancel</a></div>
          </div>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
      </div>
      </form>
    </div>
  </div>