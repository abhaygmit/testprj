<?php include('admin_header.php');?>
<?php include('admin_left.php');?>
<script type="text/javascript" src="<?php echo base_url();?>js/chage_password_validation.js"></script>
<div class="rightColm">
            <div class="result_opt">
                <div class="left"><h2>Change Password</h2></div>
				<div class="right" style="color:#FF0000">* Fields required</div>
            </div>
			
			 <div class="border_r"></div>
			
            <div class="clear pTop10"></div>
			
			 
            <div class="adminAddWrap">
			<?php 
			$eror=validation_errors();
 			if($eror!='')
				{?>
				<div style="border:1px solid #ff0000;margin:0px auto; width:80%; padding:10px; background:#FFECEC; margin-bottom:10px"> 
					<?php echo validation_errors(); ?> 
				</div>
			<?php } elseif(isset($msg)) {?>
			<div style="border:1px solid #0000ff;margin:0px auto; width:80%; padding:10px; background:#D9DAFF; margin-bottom:10px"> 
					<?php echo $msg; ?> 
			</div>
			<?php }elseif(isset($msg_success) && $msg_success !=""){  ?>
			<div style="border:1px solid;margin:0px auto; width:80%; padding:10px;color: #4F8A10;background-color: #DFF2BF; margin-bottom:10px"> 
					<?php echo $msg_success; ?> 
			</div>
			<?php } ?>
			<form action="" method="POST" id="change_password_form" name="change_password_form">
			<div class="rightContWrap" >
			<div class="rightContFrm" >
            	<div class="adminFldRw posit_err">
				   	<div class="admin_Labl">Old Password<span style="color:#FF0000"> * </span></div>
	                <div class="adminInptTxt">
						<input type="password" name="old_password" id="old_password" maxlength="15" style="width: 235px;" value=""/>
					</div>
                </div>
                <div class="adminFldRw posit_err">
                	<div class="admin_Labl">New Password<span style="color:#FF0000"> * </span></div>
	                <div class="adminInptTxt">
						<input type="password" name="new_password" id="new_password"  maxlength="15" style="width: 235px;" value=""/>
					</div>
                </div>
				<div class="adminFldRw posit_err">
                	<div class="admin_Labl">Confirm Password<span style="color:#FF0000"> * </span></div>
	                <div class="adminInptTxt">
						<input type="password" name="confirm_password" id="confirm_password" maxlength="15" style="width: 235px;" value="">
					</div>
                </div>
				 <div class="adminFldRw pTop10">
				 	<div class="admin_Labl">&nbsp;</div>
				<div class="left"><div class="btn left"><span class="franklin-g"><input type="image"  src= "images/btn_update.png" name="submit" id="submit" value="ADD" /></span></div></div>	
				</div>
				 
				</div>
				</div>
				</form>
            </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <!-- END CONTENT -->
  <div class="clear"></div>
</div>
<!-- END BODY -->

<div class="clear"></div>
<?php include('admin_footer.php');?>