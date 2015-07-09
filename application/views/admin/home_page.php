<?php include('admin_header.php');?>
<?php include('admin_left.php');?>
<script type="text/javascript" src="<?php echo base_url();?>js/cms_validation.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/widgEditor.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>css/widgEditor.css">
 <?php 
			$cls='"border:1px solid #ff0000;margin:0px auto; width:350px; padding:10px; background:#FFECEC; margin-bottom:10px"';
			if($this->session->userdata('msg')!="")
			{
				$message=$this->session->userdata('msg');
				$cls='"border:1px solid #0000ff;margin:0px auto; width:350px; padding:10px; background:#D9DAFF; margin-bottom:10px"';
			}
			?>
<?php 
//echo "<pre>";
//print_r($home_page_data); 
//echo "</pre>";
?>
<div class="rightColm">
            <div class="result_opt">
                <div class="left"><h2>Manage Home Page</h2></div>
				<div class="right" style="color:#FF0000">* Fields required</div>
            </div>
            <div class="clear"></div>
             <?php if(isset($message)){?><div style=<?php echo $cls?>><strong><?php echo $message ;?></strong></div><?php }?>
			 <div class="border_r"></div>
			
            <div class="clear pTop10"></div>
            <div class="adminAddWrap">
			<form action="cms/home_page" method="POST" class="" id="cms_form" name="cms_form" onsubmit="" enctype="multipart/form-data"/>
                <div class="adminFldRw_mngHM posit_err">
				
                	<div class="admin_Labl">Green Bar<span style="color:#FF0000"> * </span></div>

					<div style="float:left;width:495px;">

				   <?php 
					
					echo $this->ckeditor->editor("green_bar",stripslashes(html_entity_decode($home_page_data[0]->green_bar)));
					?>

					
					</div>
	                
                </div>
                <div class="adminFldRw_mngHM posit_err">
				
                	<div class="admin_Labl">Center Left Type<span style="color:#FF0000"> * </span></div>
	                <div class="adminInptTxt_mngHM ">
						<select name="center_left_type" id="center_left_type">
                        	<option value="text" <?php if($home_page_data[0]->center_left_type == 'text'){echo 'selected="selected"'; }?>>Text</option>
                            <option value="image" <?php if($home_page_data[0]->center_left_type == 'image'){echo 'selected="selected"'; }?>>Image</option>
                            <option value="both" <?php if($home_page_data[0]->center_left_type == 'both'){echo 'selected="selected"'; }?>>Both</option>
                        </select>
					</div>
                </div>
                <div class="adminFldRw_mngHM posit_err">
				
                	<div class="admin_Labl">Center Left Text<span style="color:#FF0000"> * </span></div>

					<div style="float:left;width:495px;">

				   <?php 
					
					echo $this->ckeditor->editor("center_left_text",stripslashes(html_entity_decode($home_page_data[0]->center_left_text)));
					?>

					
					</div>
	                
                </div>
                <div class="adminFldRw_mngHM posit_err">
				
                	<div class="admin_Labl">Center Left Image<span style="color:#FF0000"> * </span></div>
	                <div >
						<input type="file" name="center_left_image" id="center_left_image" style="width:495px;"/>
						
					</div>
					<span style="float: right; margin-right: 443px;">
					<img src="view1.php?image=<?php echo base_url()?>images/<?php echo $home_page_data[0]->center_left_image;?>&mode=resize&size=100x80" height="80"   border="0" /></span>
                </div>
                <div class="adminFldRw_mngHM posit_err">
				
                	<div class="admin_Labl">Center Right Text<span style="color:#FF0000"> * </span></div>
	                <div style="float:left;width:495px;">

				   <?php 
					
					echo $this->ckeditor->editor("center_right_text",stripslashes(html_entity_decode($home_page_data[0]->center_right_text)));
					?>
						
					</div>
                </div>
                <div class="adminFldRw_mngHM posit_err">
				
                	<div class="admin_Labl">Question A<span style="color:#FF0000"> * </span></div>
	                <div class="adminInptTxt_mngHM ">
						<input type="text" name="question_a" id="question_a" maxlength="140"  value="<?php echo $home_page_data[0]->question_a; ?>" style="width:490px;"/>
					</div>
                </div>
                <div class="adminFldRw_mngHM posit_err">
				
                	<div class="admin_Labl">Question B<span style="color:#FF0000"> * </span></div>
	                <div class="adminInptTxt_mngHM ">
						<input type="text" name="question_b" id="question_b" maxlength="140" value="<?php echo $home_page_data[0]->question_b; ?>" style="width:490px;"/>
					</div>
                </div>
                <div class="adminFldRw_mngHM posit_err">
				
                	<div class="admin_Labl">Bottom Left<span style="color:#FF0000"> * </span></div>
	               <div style="float:left;width:495px;">

				   <?php 
					
					echo $this->ckeditor->editor("bottom_left",stripslashes(html_entity_decode($home_page_data[0]->bottom_left)));
					?>

					<!-- <textarea id="bottom_left" style="width:100px; height:200px; background:#ffffff;" name="bottom_left" class="widgEditor nothing"><?php echo $home_page_data[0]->bottom_left; ?></textarea> -->
					</div>
                </div>
                <div class="adminFldRw_mngHM posit_err">
				
                	<div class="admin_Labl">Bottom Right<span style="color:#FF0000"> * </span></div>
	               <div style="float:left;width:495px;">

				   <?php 
					
					echo $this->ckeditor->editor("bottom_right",stripslashes(html_entity_decode($home_page_data[0]->bottom_right)));
					?>
					<!-- <textarea id="bottom_right" style="width:100px; height:200px; background:#ffffff;" name="bottom_right" class="widgEditor nothing"><?php echo $home_page_data[0]->bottom_right; ?></textarea> -->
					</div>
                </div>
				 <div class="adminFldRw_mngHM pTop10">
				 <div class="admin_Labl">&nbsp;</div>
				<div class="left"><div class="btn left"><span class="franklin-g"><input type="image"  src= "images/btn_update.png"/>&nbsp;</span>
                <a href="javascript:void(null)" onclick="history.go(-1)"><img  src= "images/btn_cancel.png" border="0" /></a></div></div>	
                <input type="hidden" name="homepage_cms_id" id="homepage_cms_id" value="<?php echo $home_page_data[0]->id;?>">
				</div>
				</form>
            </div>
      </div>
    </div>
    </div>
    <div class="left"><img src="images/content_btm.png" width="966" height="7" alt="" /></div>
    </div>
    
    <div class="clear"></div>
    
  <!-- END CONTENT -->
  
  <div class="clear"></div>
</div>
<?php include('admin_footer.php');?>