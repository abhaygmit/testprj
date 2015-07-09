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
//print_r($footer_page_data); 
//echo "</pre>";
?>
<div class="rightColm">
            <div class="result_opt">
                <div class="left"><h2>Manage Footer</h2></div>
				<div class="right" style="color:#FF0000">* Fields required</div>
            </div>
            <div class="clear"></div>
             <?php if(isset($message)){?><div style=<?php echo $cls?>><strong><?php echo $message ;?></strong></div><?php }?>
			 <div class="border_r"></div>
			
            <div class="clear pTop10"></div>
            <div class="adminAddWrap">
			<form action="cms/footer_page" method="POST" class="" id="cms_form" name="cms_form" onsubmit="" enctype="multipart/form-data"/>

			
                <div class="adminFldRw posit_err">
				
                	<div class="admin_Labl">More Info<span style="color:#FF0000"> * </span></div>
					<div class="adminInptTxt " style="background:none;">
					<?php
					$page_ids = explode(',',$footer_page_data[0]->page_ids);

					$footer_data = $this->common_model->getPageList();
					$i=1;
					foreach($footer_data as $footer_data)
					{
						?>
						<input type="checkbox" name="page_ids[]" value="<?php echo $footer_data->id;?>" <?php if(in_array($footer_data->id,$page_ids)) echo 'checked';?>> <?php echo $footer_data->title;
						//if($i%3==0)
						{
							echo '<br />';
						}
						?>
						<?php
						$i++;
					}
					?>
					</div>
	                
                </div>
                
                <div class="adminFldRw posit_err">
				
                	<div class="admin_Labl">Optimizing Tool Links<span style="color:#FF0000"> * </span></div>
					<div class="adminInptTxt " style="background:none;">
					<?php
					$tools_ids = explode(',',$footer_page_data[0]->tools_ids);

					$footer_data = $this->common_model->getPageList();
					$i=1;
					foreach($footer_data as $footer_data)
					{
						?>
						<input type="checkbox" name="tool_ids[]" value="<?php echo $footer_data->id;?>" <?php if(in_array($footer_data->id,$tools_ids)) echo 'checked';?>> <?php echo $footer_data->title;
						//if($i%3==0)
						{
							echo '<br />';
						}
						?>
						<?php
						$i++;
					}
					?>
					</div>
	                
                </div>
                
                
                <div class="adminFldRw_mngHM posit_err">
				
                	<div class="admin_Labl">Testimonial<span style="color:#FF0000"> * </span></div>
					<div class="adminInptTxtArea_mngHM ">
						<textarea cols="20" rows="10" name="testimonials" id="testimonials"><?php echo $footer_page_data[0]->testimonials; ?></textarea>
					</div>
	                
                </div>

				<div class="adminFldRw_mngHM posit_err">
				
                	<div class="admin_Labl">Testimonial Author<span style="color:#FF0000"> * </span></div>
	                <div class="adminInptTxt_mngHM ">
						<input type="text" name="testimonial_author" id="testimonial_author" maxlength="140" value="<?php echo $footer_page_data[0]->testimonial_author; ?>" />
					</div>
                </div>

                <div class="adminFldRw_mngHM posit_err">
				
                	<div class="admin_Labl">Get Social Content<span style="color:#FF0000"> * </span></div>
					<div class="adminInptTxtArea_mngHM ">
						<textarea cols="20" rows="10" name="get_social_content" id="get_social_content"><?php echo $footer_page_data[0]->get_social_content; ?></textarea>
					</div>
	                
                </div>
                
                <div class="adminFldRw_mngHM posit_err">
				
                	<div class="admin_Labl">Twitter Link<span style="color:#FF0000"> * </span></div>
	                <div class="adminInptTxt_mngHM ">
						<input type="text" name="twitter_link" id="twitter_link" maxlength="140"  value="<?php echo $footer_page_data[0]->twitter_link; ?>"/>
					</div>
                </div>
                <div class="adminFldRw_mngHM posit_err">
				
                	<div class="admin_Labl">Facebook Link<span style="color:#FF0000"> * </span></div>
	                <div class="adminInptTxt_mngHM ">
						<input type="text" name="facebook_link" id="facebook_link" maxlength="140" value="<?php echo $footer_page_data[0]->facebook_link; ?>"/>
					</div>
                </div>

				<div class="adminFldRw_mngHM posit_err">
				
                	<div class="admin_Labl">Linkedin Link<span style="color:#FF0000"> * </span></div>
	                <div class="adminInptTxt_mngHM ">
						<input type="text" name="linkedin_link" id="linkedin_link" maxlength="140" value="<?php echo $footer_page_data[0]->linkedin_link; ?>"/>
					</div>
                </div>


                <div class="adminFldRw_mngHM posit_err">
				
                	<div class="admin_Labl">Contact Details<span style="color:#FF0000"> * </span></div>
	               <div style="float:left;width:495px;">
				   <?php 
					
					echo $this->ckeditor->editor("contact_details",stripslashes(html_entity_decode($footer_page_data[0]->contact_details)));
					?>
					<!-- <textarea id="contact_details" style="width:100px; height:200px; background:#ffffff;" name="contact_details" class="widgEditor nothing"><?php echo $footer_page_data[0]->contact_details; ?></textarea> -->
					</div>
                </div>
               
				 <div class="adminFldRw pTop10">
				 <div class="admin_Labl">&nbsp;</div>
				<div class="left"><div class="btn left"><span class="franklin-g"><input type="image"  src= "images/btn_update.png"/>&nbsp;</span>
                <a href="javascript:void(null)" onclick="history.go(-1)"><img  src= "images/btn_cancel.png" border="0" /></a></div></div>	
                
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