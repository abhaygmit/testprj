<?php include('admin_header.php');?>
<?php include('admin_left.php');?>
<?php 
$page_no_data = $this->uri->segment(4);
?>
<script type="text/javascript" src="<?php echo base_url();?>js/category_validation.js"></script>
<div class="rightColm">
            <div class="result_opt">
                <div class="left"><h2>Edit Category / Sub Category</h2></div>
				<div class="right" style="color:#FF0000">* Fields required</div>
            </div>
			<div class="border_r"></div>
			<?php 
			$parent = $categoryToEdit[0]->parent_id;
			$parent_name = $this->categorymodel->getCategoryToEdit($parent);
			//echo $parent_name[0]->category_name;
			?>
            <div class="clear pTop10"></div>
            <div class="adminAddWrap">
			<form action="category/view_category/" method="POST" id="category_form" name="category_form" onsubmit="return validateCategoryForm()">
				<div class="rightContFrm" >
            	<div class="adminFldRw">
				
                	<div class="admin_Labl">
						Select Option
					</div>
					
	                <div><input type="radio" name="select" value="1" <?php if($parent==0){ echo 'checked="checked"'; } ?> onclick="showtextbox('1')" />Category<input type="radio" name="select" value="0"  onclick="showtextbox('0')" <?php if($parent>0){ echo 'checked="checked"'; } ?> />Sub Category
					</div>
                </div>
            	<div class="adminFldRw" id="ShowSubCategoryDivId"  <?php if($parent==0){ echo 'style="display:none;"'; } ?> >
				
                	<div class="admin_Labl" style="width:125px;">
						Select Category
					</div>
	                <div class="adminInpt">
						<select name="select_category" id="select_category" name="select_category">
						<?php foreach($categoryDetails as $categoryDetail) {?>
						<option value="<?php echo $categoryDetail->id;?>" <?php if($parent_name[0]->category_name == $categoryDetail->category_name){echo 'SELECTED="SELECTED"';}?>><?php echo $categoryDetail->category_name; ?></option>
						<?php }?>
						</select>
					</div>
                </div>
                <div class="adminFldRw posit_err">
                	<div class="admin_Labl" style="width:125px;">Name<span style="color:#FF0000">*</span></div>
	                <div class="adminInptTxt">
						<input type="text" name="enter_category" id="enter_category" maxlength="60"  value="<?php echo $categoryToEdit[0]->category_name;?>"/><span id="enter_category_err" class="error"></span>
                       <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $categoryToEdit[0]->id; ?>" />
                       <?php $top_parent_id=$this->categorymodel->get_top_parent($categoryToEdit[0]->id); ?>
                       <input type="hidden" name="get_parent_id" id="get_parent_id" value="<?php echo $top_parent_id[0]->id; ?>" />
                       <input type="hidden" name="page_no_data" id="page_no_data" value="<?php echo $page_no_data?>" />
                       <input type="hidden" name="submit" id="submit" value="update" />
					</div>
                </div>
				 <div class="adminFldRw pTop10">
				 	<div class="admin_Labl">&nbsp;</div>
				<div class="left"><div class="btn left"><span class="franklin-g"><input type="image"  src= "images/btn_submit.png"/></span>
                &nbsp;&nbsp;<a onclick="history.go(-1)" href="javascript:void('0')">
                         	<img src= "images/btn_cancel.png" name="cancel" id="cancel" value="cancel" tabindex="31" />
                         </a>
                </div></div>	
                
				</div>
				</form>
            </div>
      </div>
    </div>
   </div>
    <div class="left"><img src="images/content_btm.png" width="966" height="7" alt="" /></div>
    <div class="clear"></div>
    
  </div>
  <!-- END CONTENT -->
  
  <div class="clear"></div>
</div>
<?php include('admin_footer.php');?>