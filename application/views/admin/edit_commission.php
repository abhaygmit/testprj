<?php include('admin_header.php');?>
<?php include('admin_left.php');?>
<script type="text/javascript" src="<?php echo base_url();?>js/category_validation.js"></script>
<div class="rightColm">
            <div class="result_opt">
                <div class="left"><h2>Edit Commission</h2></div>
				<div class="right" style="color:#FF0000">* Fields required</div>
            </div>
			<div class="border_r"></div>
			<?php 
			$parent = $categoryToEdit[0]->parent_id;
			$parent_name = $this->categorymodel->getCategoryToEdit($parent);
			//echo $parent_name[0]->category_name;
			//echo '<pre>';print_r($categoryToEdit);
			?>
            <div class="clear pTop10"></div>
            <div class="adminAddWrap">
			<form action="<?php echo site_url('commissions/view_commissions/');?>" method="POST" id="commission_form" name="service_form">
		       
				<div class="adminFldRw posit_err">
                	<div class="admin_Labl">Select Type<span style="color:#FF0000">*</span></div>
	                <div class="adminInptTxt">
						<select name="category_name" id="category_name">
							<option value=''>--Select Type--</option>
							<?php foreach($categorydata as $cat){?>
								<option value="<?php echo $cat['id'];?>" <?php echo ($cat['id']==$categoryToEdit[0]->id?'selected':'');?>><?php echo $cat['account_type'];?></option>
							<?php }?>	
						</select>
					</div>
                </div>
            	
                <div class="adminFldRw posit_err">
                	<div class="admin_Labl">Commission %<span style="color:#FF0000">*</span></div>
	                <div class="adminInptTxt">
						<input type="text" name="commissionPer" id="commissionPer"  value="<?php echo $categoryToEdit[0]->commission_in_percentage;?>"/>
					</div>
                </div>
                 <div class="adminFldRw posit_err">
                	<div class="admin_Labl">Minimum Booking To Qualify<span style="color:#FF0000">*</span></div>
	                <div class="adminInptTxt">
						<input type="text" name="minqty" id="minqty"  value="<?php echo $categoryToEdit[0]->min_booking_to_qualify;?>"/>
					</div>
                </div>
                
                
                <div class="adminFldRw posit_err">
				<input type="hidden" name="status" id="status" value="1" />
                	<!--<div class="admin_Labl">Commission Status<span style="color:#FF0000">*</span></div>
	                <div class="adminInptTxt">
						<select name="status" id="status">
							<option value="">--Select Status--</option>
							<option value="1" <?php ($categoryToEdit[0]->status=='1'?'selected':'');?>>Active</option>
							<option value="0" <?php ($categoryToEdit[0]->status=='0'?'selected':'');?>>In-active</option>
						</select>
						<div class="btn left">
							<span class="franklin-g">
								<input type="hidden" name="submit" id="submit" value="update" />
								<input type="hidden" name="id" id="id" value="<?php echo $categoryToEdit[0]->id;?>" />
							</span>
						</div>
					</div>
                </div>-->
                
				<?php 
				 $checkDate=$this->commissionmodel->checkmodifiedDate($this->uri->segment(3));
		//print_r($checkDate);
			
		$modifiedd= date('Y-m-d', strtotime($checkDate[0]['modified']));	
		 $start=strtotime($modifiedd, "+30 days");
		 $check1=date('Y-m-d H:i:s');
		$check=strtotime($check1);
		  if($check < $start):
		  
		  ?>
		  <div class="adminFldRw pTop10">
				 	<div class="admin_Labl">&nbsp;</div>
					<div class="left">
						<div class="btn left">
						<img src="images/admin/btn_submit.png"  />
						<div class="clear"></div>
							<span class="franklin-g">
							
								You can not modify commssions within 1 month.
							</span>
						</div>
					</div>	
                	
				</div>
		  <?php
		  else:
		  ?>
				
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
                
			<?php endif; ?>
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