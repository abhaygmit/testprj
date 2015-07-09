<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo base_url()?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Login</title>
<link href="css/admin_style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo  base_url();?>js/ddaccordion.js"></script>
<script>
ddaccordion.setCookie("submenuheader", '-1c');
</script>
</head>
<body>
<div class="bd_wrap">
<div class="login_wrapper">
  <div class="login_form">
	 <div class="logo_login"><a href="<?php  echo base_url();?>admin/" title=""><img src="images/logo.png" alt="" /></a> </div>
    <div class="loginFrmMid">
      <div class="loginTitle"><h1>Forgot Password</h1></div>
      <div class="form-area" style="padding-top:5px">
<?php if(isset($success)){?> <center><div class="error_box" style="color:#ffffcc"><?php echo $success;?></div><center><?php } ?>
<?php if(isset($message)){?> <div class="error_box"><?php echo $message;?></div><?php } ?>
<?php if(isset($suc_message)){?> <div style="border: 0 solid #000000;color: #000000; margin: 10px;padding: 84px 5px 100px;
    text-align: center;width: 470px;font-size: 15px;"><?php echo $suc_message;?></div><?php } else {?>

 <?php $eror=validation_errors();
 if($eror!=''){?>
<div class="error_box"> <?php echo validation_errors(); ?> </div>
<?php }?>
  <div style="padding:10px 0px 20px 10px; font-size:13px; ">Enter your e-mail address below and we'll send you, your password.</div>
  <?php if(isset($msg)) echo $msg;?>
  <form action="" method="POST" class="" id="user_login" name="user_login" onsubmit="return validateLoginForm()">
  <div class="frmRow">
              <div class="frmlbl">Email:</div>
              <div class="frmtxtfld uname">
               <input type="text" name="email" id="email" value="<?php //echo set_value('email'); ?>" class="required" />
              </div>
            </div>
			<div class="clear pTop10"></div>
            <div class="frmRow">
              <div class="left"><!--<input type="checkbox" name="interests[]" id="" value="" /><label>Remember me</label>--></div>
              <div class="right"><span class="button"><a href="<?php echo base_url();?>admin"><img border="0" src="<?php echo base_url();?>images/btn_cancel.png"></a></span></div>
              <div class="right" style="padding-right:10px;"><span class="button"><input type="image" tabindex="3" name="submit" id="submit" src="<?php echo base_url();?>images/btn_submit.png"  /></span></div>
            </div>
    <!--<table width="90%" cellspacing="4" cellpadding="4" align="center">
       <tr>
        <td class="regLbl"><span class="style7">Email <span style="color:red">*</span></span></td>
        <td class="regInpt"> <input type="text" name="email" id="email" value="<?php //echo set_value('email'); ?>" class="required" /> </td>
      </tr>
  <tr>
	  <td class="regLbl"></td>
	  <td class="regInpt" style="padding-top: 15px;"><input type="image" src="images/btn_submit.png" alt="" />&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php base_url(); ?>"><img src="images/button_can.png"></a></td>
	  </tr>
    </table>-->
  </form>
 </div>
      
    </div>
    <div class="clear"></div>
    <?php } ?>
	
  </div>
</div>
<div class="footer_login_pg">
  <div class="footer">Copyright &copy; 2013 Ometrics. All Rights Reserved.</div>
</div>
</div>
</body>
</html>