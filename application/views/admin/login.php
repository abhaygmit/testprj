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
    <div class="logo_login"><a href="<?php  echo base_url();?>admin/" title=""><span style="font-size:16px; color:#00F; font-weight:bold;">CricSPL</span></a> </div>
    <div class="loginFrmMid">
      <div class="loginTitle"></div>
      <div class="form-area">
        <form action="<?php  echo base_url();?>admin/checkLogin" method="post">
            <div class="frmRow">
              <div class="frmlbl">Username:</div>
              <div class="frmtxtfld uname">
                <input type="text" value="User id" tabindex="1" onblur="if(this.value=='')this.value='User id';" onfocus="if(this.value=='User id')this.value='';" onclick="if(this.value=='User id')this.value='';" value="User id" id="username" name="username" />
              </div>
            </div>
            <div class="frmRow">
              <div class="frmlbl">Password:</div>
              <div class="frmtxtfld pwd">
               <input type="password" value="12345678..." tabindex="2" onfocus="if(this.value=='12345678...')this.value='';" onblur="if(this.value=='')this.value='12345678...';" onclick="if(this.value=='12345678...')this.value='';"  value="12345678..."  name="password" id="password" />
              </div>
            </div>
            <div class="clear pTop10"></div>
            <div class="frmRow">
              <div class="left"><!--<input type="checkbox" name="interests[]" id="" value="" /><label>Remember me</label>--></div>
              <div class="right"><span class="button"><input type="image" tabindex="3" name="submit" id="submit" src="images/btn_login.png"  /></span></div>
            </div>
       </form>  
      </div>
      <!-- <div class="forgotPwd"><a href="admin/forgotpass" title="">Forgot Password</a></div> -->
    </div>
    <div class="clear"></div>
	<?php if($this->session->userdata('msg')!=""){?>
             <div class="errorNotePane">
                 <div class="errorNote">
                    <div class="errorNoteTitle"> Error Notification          </div>
                    <div class="errorNotetxt">Please enter valid username and password.</div>
                    
                    </div>
             </div>
			 	<?php }?>
    
  </div>
</div>
<div class="footer_login_pg">
  <div class="footer"></div>
</div>
</div>
</body>
</html>