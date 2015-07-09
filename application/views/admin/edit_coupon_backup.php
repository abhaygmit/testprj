<?php include('admin_header.php');?>
<?php include('admin_left.php');?>
<script type="text/javascript" src="<?php echo base_url();?>js/category_validation.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/jquery.datepick.js"></script>
<link href="<?php echo base_url()?>css/jquery.datepick.css" rel="stylesheet" type="text/css">
	
<script type="text/javascript">
$(function() {
	$('#valid_from').datepick();
	$('#valid_to').datepick();
});
</script>

<div class="rightColm">
            <div class="result_opt">
                <div class="left"><h2>Edit Coupon</h2></div>
				<div class="right" style="color:#FF0000">* Fields required</div>
            </div>
			<div class="border_r"></div>
		    <div class="clear pTop10"></div>
            <div class="adminAddWrap">
			<form action="<?php echo site_url('coupons/view_coupons/');?>" method="POST" id="coupon_form" name="coupon_form">
		       
				
            	
                <div class="adminFldRw posit_err">
                	<div class="admin_Labl">Coupon Name<span style="color:#FF0000">*</span></div>
	                <div class="adminInptTxt">
						<input type="text" name="coupon_code" id="coupon_code"  value="<?php echo $categoryToEdit[0]->coupon_code;?>" readonly/>
					</div>
                </div>
                
                <div class="adminFldRw posit_err">
                	<div class="admin_Labl">Active From<span style="color:#FF0000">*</span></div>
	                <div class="adminInptTxt">
						<input type="text" name="valid_from" id="valid_from"  value="<?php echo $categoryToEdit[0]->valid_from;?>"/>
					</div>
                </div>
                
                 <div class="adminFldRw posit_err">
                	<div class="admin_Labl">Active To<span style="color:#FF0000">*</span></div>
	                <div class="adminInptTxt">
						<input type="text" name="valid_to" id="valid_to"  value="<?php echo $categoryToEdit[0]->valid_to;?>"/>
					</div>
                </div>
                
                <div class="adminFldRw posit_err">
                	<div class="admin_Labl">Coupon Amount<span style="color:#FF0000">*</span></div>
	                <div class="adminInptTxt">
						<input type="text" name="discount_amt" id="discount_amt"  value="<?php echo $categoryToEdit[0]->discount_amt;?>"/>
					</div>
                </div>
                
                <div class="adminFldRw posit_err">
                	<div class="admin_Labl">Coupon Status<span style="color:#FF0000">*</span></div>
	                <div class="adminInptTxt">
						<select name="status" id="status">
							<option value=''>--Select Status--</option>
							<option value="1" <?php echo ($categoryToEdit[0]->status=='1'?'selected':'');?>>Active</option>
							<option value="0" <?php echo ($categoryToEdit[0]->status=='0'?'selected':'');?>>In-active</option>
						</status>
						<div class="btn left">
							<span class="franklin-g">
								<input type="hidden" name="submit" id="submit" value="update" />
								<input type="hidden" name="id" id="id" value="<?php echo $categoryToEdit[0]->id;?>" />
							</span>
						</div>
					</div>
                </div>
                
                <div class="adminFldRw pTop10">
				 	<div class="admin_Labl">&nbsp;</div>
					<div class="left">
						<div class="btn left">
							<span class="franklin-g">
								<input type="image"  src= "images/admin/btn_submit.png"/>
							</span>
						</div>
					</div>	
                	
				</div>
                
			
			</form>
		    </div>
      </div>
    </div>
   </div>
    <div class="left"><img src="images/content_btm.png" width="996" height="7" alt="" /></div>
    <div class="clear"></div>
    
  </div>
  <!-- END CONTENT -->
  
  <div class="clear"></div>
</div>
<?php include('admin_footer.php');?>