<?php include('admin_header.php');?>
<?php include('admin_left.php');
/*echo '<pre>';
print_r($_SERVER);
echo($_COOKIE);
echo '</pre>';*/
?>
<div class="rightColm">
            <div class="result_opt">
                <div class="left"><h2>Create New User</h2></div>
				<div class="right" style="color:#FF0000">* Fields required</div>
            </div>
			 <div class="border_r"></div>
            <div class="clear pTop10"></div>
			<div class="rightContWrap"	>
          	<div class="rightContFrm">
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
			<form action="" method="POST"  id="registration_form"  >
				
				<div class="adminFldRw posit_err">
                	<div class="admin_Labl">Full Name<span class="red_txt">*</span></div>
	                <div class="adminInptTxt"><input type="text" name="full_name" id="full_name"/></div>
	                
                </div>
				
				<div class="adminFldRw posit_err">
                	<div class="admin_Labl">Email<span class="red_txt">*</span></div>
	                <div class="adminInptTxt">
	                	<input type="text" name="email" id="email" value="<?php echo set_value('email'); ?>"/>
                    </div>
                </div>
                
                
                <div class="adminFldRw posit_err">
                	<div class="admin_Labl">Password<span class="red_txt">*</span></div>
	                <div class="adminInptTxt">
	                	<input type="password" name="password" id="password" value="<?php echo set_value('password'); ?>"/>
	                </div>
                </div>
                
                <div class="adminFldRw posit_err">
                	<div class="admin_Labl">Confirm Password<span class="red_txt">*</span></div>
	                <div class="adminInptTxt">
	                	<input type="password" name="con_password" id="con_password" value="<?php echo set_value('password'); ?>"/>
	                </div>
                </div>
                
                
                <div class="adminFldRw posit_err">
                	<div class="admin_Labl">Billing Address Line 1<span class="red_txt">*</span></div>
	                <div class="adminInptTxt">
	                	<input type="text" name="billing_address_line1" id="billing_address_line1" value="<?php echo set_value('billing_address_line1'); ?>"/>
	                </div>
                </div>
                
                <div class="adminFldRw posit_err">
                	<div class="admin_Labl">Billing Address Line 2</div>
	                <div class="adminInptTxt">
	                	<input type="text" name="billing_address_line2" id="billing_address_line2" value="<?php echo set_value('billing_address_line2');?>"/>
	                </div>
                </div>
                
                <div class="adminFldRw posit_err">
                	<div class="admin_Labl">Billing Zipcode<span class="red_txt">*</span></div>
	                <div class="adminInptTxt">
	                	<input type="text" name="billing_zipcode" id="billing_zipcode" value="<?php echo set_value('billing_zipcode'); ?>"/>
	                </div>
                </div>
                
                <div class="adminFldRw posit_err">
                	<div class="admin_Labl">Billing State<span class="red_txt">*</span></div>
	                <div class="adminInptTxt">
	                	<input type="text" name="billing_state" id="billing_state" value="<?php echo set_value('billing_state');?>"/>
	                </div>
                </div>
                
                <div class="adminFldRw posit_err">
                	<div class="admin_Labl">Billing Country<span class="red_txt">*</span></div>
	                <div class="adminInptTxt">
	                	<input type="text" name="billing_country" id="billing_country" value="<?php echo set_value('billing_country'); ?>"/>
	                </div>
                </div>
                
                <div class="adminFldRw posit_err">
                	<div class="admin_Labl">Physical Address Line 1<span class="red_txt">*</span></div>
	                <div class="adminInptTxt">
	                	<input type="text" name="physical_address_line1" id="physical_address_line1" value="<?php echo set_value('physical_address_line1'); ?>"/>
	                </div>
                </div>
                
                <div class="adminFldRw posit_err">
                	<div class="admin_Labl">Physical Address Line 2</div>
	                <div class="adminInptTxt">
	                	<input type="text" name="physical_address_line2" id="physical_address_line2" value="<?php echo set_value('physical_address_line2');?>"/>
	                </div>
                </div>
                
                <div class="adminFldRw posit_err">
                	<div class="admin_Labl">Physical Address Zipcode</div>
	                <div class="adminInptTxt">
	                	<input type="text" name="physical_address_zip_code" id="physical_address_zip_code" value="<?php echo set_value('physical_address_zip_code'); ?>"/>
	                </div>
                </div>
                
                
			    <div class="adminFldRw pTop10">
				 	<div class="admin_Labl">&nbsp;</div>
				 	<div class="left">
				 		<div class="btn left">
				 			<span class="franklin-g">
				 				<input type="image"  src= "images/admin/btn_submit.png" name="submit" id="submit" value="ADD" />
				 			</span>
				 		</div>
				 	</div>
				 	<!--<input type="hidden" name="pre_creation_cookies_view" value="<?php print_r($_COOKIE);?>"/>
				 	<input type="hidden" name="creation_path" value=""/>-->
				 	<input type="hidden" name="register_ip" value="<?php echo $_SERVER['REMOTE_ADDR'];?>"/>
				 	<input type="hidden" name="status" value="1"/>	
				 	<input type="hidden" name="payment_status" value="0"/>
                </div>
				</form>
            </div>
        </div>
      </div>
   </div>
   </div>
    <div class="left"><img src="images/admin/content_btm.png" width="996" height="7" alt="" /></div>
    <div class="clear"></div>
  </div>
  <!-- END CONTENT -->
  <div class="clear"></div>
</div>
<?php include('admin_footer.php');?>