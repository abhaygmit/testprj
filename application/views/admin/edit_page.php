<?php include('admin_header.php');?>
<?php include('admin_left.php');?>
<script type="text/javascript" src="<?php echo base_url();?>js/category_validation.js"></script>
<div class="rightColm">
            <div class="result_opt">
                <div class="left"><h2>Edit Page</h2></div>
				<div class="right" style="color:#FF0000">* Fields required</div>
            </div>
			<div class="border_r"></div>
			<?php 
			/*echo '<pre>';
			print_r($pageToEdit);
			echo '</pre>';*/
			?>
            <div class="clear pTop10"></div>
            <div class="adminAddWrap">
			<form action="<?php echo site_url('pages/view_pages/');?>" method="POST" id="page_form" name="page_form">
		        <div class="adminFldRw posit_err">
                	<div class="admin_Labl_new">Page Name<span style="color:#FF0000">*</span></div>
	                <div class="adminInptTxt">
						<input type="text" name="page_name" id="page_name" value="<?php echo $pageToEdit[0]->page_name;?>"/>
					</div>
                </div>
                
                <div class="adminFldRw posit_err">
                	<div class="admin_Labl_new">Page Title<span style="color:#FF0000">*</span></div>
	                <div class="adminInptTxt">
						<input type="text" name="page_title" id="page_title" value="<?php echo $pageToEdit[0]->page_title;?>"/>
					</div>
                </div>
                
                <div class="adminFldRw posit_err">
                	<div class="admin_Labl_new">Meta Keywords<span style="color:#FF0000">*</span></div>
	                <div class="adminInptTxt">
						<input type="text" name="meta_keywords" id="meta_keywords" value="<?php echo $pageToEdit[0]->meta_keywords;?>"/>
					</div>
                </div>
                
                <div class="adminFldRw posit_err">
                	<div class="admin_Labl_new">Meta Description</div>
	                <div class="adminInptTxt">
						<input type="text" name="meta_description" id="meta_description" value="<?php echo $pageToEdit[0]->meta_description;?>"/>
					</div>
                </div>
                
                <div class="adminFldRw posit_err">
                	<div class="admin_Labl_new">Page Content<span style="color:#FF0000">*</span></div>
	                <div class="adminInptTxt" style="margin-top:-20px;margin-left:150px; width:600px;" >
						<textarea name="page_content" id="page_content"><?php echo $pageToEdit[0]->page_content;?></textarea>
					</div>
                </div>
                
               <div class="adminFldRw posit_err">
                	<!--<div class="admin_Labl_new">Page Status<span style="color:#FF0000">*</span></div>-->
	                <div class="adminInptTxt">
						<!--<select name="status" id="status">
							<option value=''>--Select Status--</option>
							<option value="1" <?php echo ($pageToEdit[0]->status==1?'selected':'');?>>Active</option>
							<option value="0" <?php echo ($pageToEdit[0]->status==0?'selected':'');?>>In-active</option>
						</select>-->
						<div class="btn left">
							<span class="franklin-g">
								<input type="hidden" name="submit" id="submit" value="update" />
								<input type="hidden" name="parent_id" value="0" />
								<input type="hidden" name="id" value="<?php echo $pageToEdit[0]->id;?>" />
							</span>
						</div>
					</div>
                </div>
				
				
				
				
				
				
				
                
                <div class="adminFldRw pTop10">
				 	<div class="admin_Labl_new">&nbsp;</div>
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
    <script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
	<script type="text/javascript">
		CKEDITOR.replace( 'page_content',
		{
			filebrowserBrowseUrl : '/scheduudle/ckfinder/ckfinder.html',

			filebrowserImageBrowseUrl : '/scheduudle/ckfinder/ckfinder.html?Type=Images',
			filebrowserFlashBrowseUrl : '/scheduudle/ckfinder/ckfinder.html?Type=Flash',
			filebrowserUploadUrl : '/scheduudle/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
			filebrowserImageUploadUrl : '/scheduudle/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
			filebrowserFlashUploadUrl : '/scheduudle/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
		});
	</script>
  </div>
  <!-- END CONTENT -->
  
  <div class="clear"></div>
</div>
<?php include('admin_footer.php');?>