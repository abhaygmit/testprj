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
<div class="rightColm">
            <div class="result_opt">
                <div class="left"><h2>Edit Page</h2></div>
				<div class="right" style="color:#FF0000">* Fields required</div>
            </div>
            <div class="clear"></div>
             <?php if(isset($message)){?><div  style=" <?php echo $cls; ?> "><strong><?php echo $message ;?></strong></div> <?php }?>
			 <div class="border_r"></div>
			
            <div class="clear pTop10"></div>
            <div class="adminAddWrap">
			<form action="cms/edit_page" method="POST" class="" id="cms_form" name="cms_form" onsubmit="return validateCmsForm()">
			<input type="hidden" name="id" value="<?php echo $page_detail[0]->id;?>">
				<div  >

				<input type="hidden" name="parent_id" value="0">
				<!-- <div class="adminFldRw posit_err">
				
                	<div class="admin_Labl">Parent Page<span style="color:#FF0000"> * </span></div>
	                <div class="adminInptTxt ">
						<select name="parent_id" id="parent_id">
						<option value="0">No Parent</option>
						<?php foreach($parent_page as $parent_page) {?>
						<option value="<?php echo $parent_page->id;?>" <?php if($page_detail[0]->parent_id==$parent_page->id) echo "selected" ;?>><?php echo $parent_page->title; ?></option>
						<?php }?>
						</select>
					</div>
                </div> -->
                
            	<div class="adminFldRw posit_err">
				
                	<div class="admin_Labl">Page Title<span style="color:#FF0000"> * </span></div>
	                <div class="adminInptTxt ">
						<input type="text" name="title" id="title" maxlength="40" value="<?php echo $page_detail[0]->title;?>" onblur="return clearDiv();" <?php if(($page_detail[0]->id)==1 || ($page_detail[0]->id)==2 || ($page_detail[0]->id)==3) echo 'readonly';?>/><span id="cms_title_err" class="error"></span>
					</div>
                </div>

				<div class="adminFldRw posit_err">
				
                	<div class="admin_Labl">Meta Keyword</div>
	                <div class="adminInptTxt ">
						<input type="text" name="meta_keyword" id="meta_keyword" maxlength="90" value="<?php echo $page_detail[0]->meta_keyword;?>" /><span id="meta_keyword_err" class="error"></span>
					</div>
                </div>


				<div class="adminFldRw posit_err">
				
                	<div class="admin_Labl">Meta Description</div>
	                <div class="adminInptTxt ">
						<input type="text" name="meta_description" id="meta_description" maxlength="140" value="<?php echo $page_detail[0]->meta_description;?>"/><span id="meta_description_err" class="error"></span>
					</div>
                </div>

				<div class="adminFldRw posit_err">
				
                	<div class="admin_Labl">Sort Order</div>
	                <div class="adminInptTxt ">
						<input type="text" name="sort_order" id="sort_order" maxlength="3" value="<?php echo $page_detail[0]->sort_order;?>" /><span id="sort_order_err" class="error"></span>
					</div>
                </div>


				<div class="adminFldRw_mngHM posit_err">
				
                	<div class="admin_Labl">Green Bar<span style="color:#FF0000">  </span></div>

					<div style="float:left;width:495px;">

				   <?php 
					$this->ckeditor->config['toolbar'] = 'Basic';
					echo $this->ckeditor->editor("green_bar",stripslashes(html_entity_decode($page_detail[0]->green_bar)));
					?>

					
					</div>
	                
                </div>


                <div class="adminFldRw posit_err" style="width:100%">
                	<div>Content<span style="color:#FF0000"> *</span></div>
	                <div>
					<?php $desc_data =  stripslashes(html_entity_decode($page_detail[0]->description));?>
                    <?php 
					$this->ckeditor->config['toolbar'] = 'Full';
					echo $this->ckeditor->editor("description",$desc_data);
					?>
						<span id="cms_desc_err" class="error"></span>
					</div>
                </div>
				 <div class="adminFldRw pTop10">
				 	<div class="admin_Labl">&nbsp;</div>
				<div class="left"><div class="btn left"><span class="franklin-g"><input type="image"  src= "images/btn_update.png"/>&nbsp;</span><a href="javascript:void(null)" onclick="history.go(-1)"><img  src= "images/btn_cancel.png" border="0" /></a></div></div>	
                <input type="hidden" name="cms_id" id="cms_id" value="<?php echo $page_detail[0]->id;?>">
				</div>
				</form>
            </div>
      </div>
    </div>
    </div>
    <div class="left"><img src="images/content_btm.png" width="966" height="7" alt="" /></div>
    </div>
    
    <div class="clear"></div>
    
  </div>
  <!-- END CONTENT -->
  
  <div class="clear"></div>
</div>
<?php include('admin_footer.php');?>