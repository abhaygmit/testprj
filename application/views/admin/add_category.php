<?php include('admin_header.php');?>
<?php include('admin_left.php'); ?>
<script type="text/javascript" src="<?php echo base_url();?>js/category_validation.js"></script>
<div class="rightColm">
            <div class="result_opt">
                <div class="left"><h2>Add New Category / Sub Category</h2></div>
				<div class="right" style="color:#FF0000">* Fields required</div>
            </div>
            <?php 
			$cls='"border:1px solid #ff0000;margin:0px auto; width:350px; padding:10px; background:#FFECEC; margin-bottom:10px"';
			if($this->session->userdata('msg')!="")
			{
				$message=$this->session->userdata('msg');
				$cls='"border:1px solid #0000ff;margin:0px auto; width:350px; padding:10px; background:#D9DAFF; margin-bottom:10px"';
			}
			?>
			<div class="border_r"></div>
			
            <div class="clear pTop10"></div>
            <div class="adminAddWrap">

			<?php 
			$eror=validation_errors();
 			if($eror!='')
				{?>
				<div style="border:1px solid #ff0000;margin:0px auto; width:350px; padding:10px; background:#FFECEC; margin-bottom:10px"> 
					<?php echo validation_errors(); ?> 
				</div>
			<?php 
				}?>
			<?php if(isset($message)){?><div  style=<?php echo $cls?>><strong><?php echo $message ;?></strong></div><?php }?>
			<form action="" method="POST" class="" id="category_form" name="category_form" onsubmit="return validateCategoryForm()">
				<div class="rightContFrm" >
            	<div class="adminFldRw">
				
                	<div class="admin_Labl">
						Select Option
					</div>
	                <div><input type="radio" name="select" value="1" checked="checked" onclick="showtextbox('1')" />Category<input type="radio" name="select" value="0"  onclick="showtextbox('0')" />Sub Category
					</div>
                </div>
            	<div class="adminFldRw" id="ShowSubCategoryDivId" style="display:none;">
				
                	<div class="admin_Labl" style="width:125px;">
						Select Category
					</div>
	                <div class="adminInpt">
						<select name="select_category" id="select_category">
						<?php foreach($CategoryDetails as $categoryDetail) {?>
						<option value="<?php echo $categoryDetail->id;?>"><?php echo $categoryDetail->category_name; ?></option>
						<?php }?>
						</select>
					</div>
                </div>
                <div class="adminFldRw posit_err">
                	<div class="admin_Labl" style="width:125px;">Name<span style="color:#FF0000">*</span></div>
	                <div class="adminInptTxt">
						<input type="text" name="enter_category" id="enter_category" maxlength="60"  value=""/><span id="enter_category_err" class="error"></span>
					</div>
                </div>
				 <div class="adminFldRw pTop10">
				 	<div class="admin_Labl">&nbsp;</div>
				<div class="left"><div class="btn left"><span class="franklin-g"><input type="image"  src= "images/btn_submit.png"/></span></div></div>	
                <input type="hidden" name="submit" id="submit" value="ADD" />
				</div>
				</form>
            </div>
      </div>
    </div></div>
   <div class="left"><img src="images/content_btm.png" width="966" height="7" alt="" /></div>
    </div>
    
    <div class="clear"></div>
    
  </div>
  <!-- END CONTENT -->
  
  <div class="clear"></div>
</div>
<?php include('admin_footer.php');?>