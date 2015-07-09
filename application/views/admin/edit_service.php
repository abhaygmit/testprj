<?php include('admin_header.php');?>
<?php include('admin_left.php');?>
<script type="text/javascript" src="<?php echo base_url();?>js/category_validation.js"></script>
<div class="rightColm">
            <div class="result_opt">
                <div class="left"><h2>Edit Category</h2></div>
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
			<form action="<?php echo site_url('services/view_services/');?>" method="POST" id="service_form" name="service_form">
		       
				
            	
                <div class="adminFldRw posit_err">
                	<div class="admin_Labl">Service Name<span style="color:#FF0000">*</span></div>
	                <div class="adminInptTxt">
						<input type="text" name="enter_category" id="enter_category"  value="<?php echo $categoryToEdit[0]->service_name;?>"/>
					</div>
                </div>
                
                <div class="adminFldRw posit_err">
                	<div class="admin_Labl">Select Category<span style="color:#FF0000">*</span></div>
	                <div class="adminInptTxt">
						<select name="category_name" id="category_name">
							<option value=''>--Select Category--</option>
							<?php foreach($categorydata as $cat){?>
								<option value="<?php echo $cat->id;?>" <?php echo ($cat->id==$categoryToEdit[0]->category_id?'selected':'');?>><?php echo $cat->category_name;?></option>
							<?php }?>	
						</select>
					</div>
                </div>
                
                <div class="adminFldRw posit_err">
                	<div class="admin_Labl">Service Status<span style="color:#FF0000">*</span></div>
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