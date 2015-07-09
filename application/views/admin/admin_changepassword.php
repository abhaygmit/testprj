<?php include('admin_header.php');?>
<?php include('admin_left.php');?>

<div class="rightColm">
            <div class="result_opt">
                <div class="left"><h2>Change Password</h2></div>
                 <?php if(isset($message)){?><div align="center"><strong><?php echo $message ;?></strong></div><?php }?>
            </div>
			
			 <div class="border_r"></div>
			
            <div class="clear pTop10"></div>
			
			 <?php $eror=validation_errors();
 if($eror!=''){?>
			<div class="errorNotePane">
                 <div class="errorNote">
                    <div class="errorNoteTitle"> Error Notification</div>
                    <div class="errorNotetxt"> <?php echo validation_errors(); ?>
						<br />
					</div>
                    </div>
             </div>
			 <?php }?>
            <div class="adminAddWrap">
 
			<form action="" method="POST" class="" id="register" >
            	<input type="hidden" name="adminid" value="<?php echo $id ?>" />
                <div class="adminFldRw">
                	<div class="admin_Labl franklin-m">Password</div>
	             <div class="adminInpt"><input type="text" name="password" id="password" maxlength="40" value="<?php echo set_value('first_name'); ?>"/></div>
                </div>
                <div class="adminFldRw">
                	<div class="admin_Labl franklin-m">Confirm Password</div>
	                <div class="adminInpt"><input type="text" name="confirm_password" maxlength="40" id="confirm_password"  value="<?php echo set_value('last_name'); ?>" /></div>
                </div>
				
                 <div class="adminFldRw pTop10">
				 	<div class="admin_Labl">&nbsp;</div>
				 	<div class="left"><div class="btn left"><span class="franklin-g"><input type="submit" name="submit" id="submit" value="ADD" /></span></div></div>	
                </div>
				</form>
            </div>
      </div>
    </div>
    <div class="left"><img src="images/admin_images/content_btm.png" width="966" height="7" alt="" /></div>
    <div class="clear"></div>
  </div>
  <!-- END CONTENT -->
  <div class="clear"></div>
</div>
<!-- END BODY -->

<div class="clear"></div>
<?php include('admin_footer.php');?>