<?php include('admin_header.php');?>
<?php include('admin_left.php');?>
<script type="text/javascript" src="<?php echo base_url();?>js/category_validation.js"></script>
<style>
.selText{font-weight:normal; color:#000000; font-size:14px;}
</style>
<div class="rightColm">
            <div class="result_opt">
                <div class="left"><h2>Add New Service</h2></div>
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

			<?php //echo '<pre>';print_r($categorydata);
			$eror=validation_errors();
 			if($eror!='')
				{?>
				<div style="border:1px solid #ff0000;margin:0px auto; width:350px; padding:10px; background:#FFECEC; margin-bottom:10px"> 
					<?php echo validation_errors(); ?> 
				</div>
			<?php 
				}?>
			<?php if(isset($message)){?><div  style=<?=$cls?>><strong><?php echo $message ;?></strong></div><?php }?>
			<form action="" method="POST" id="service_form" name="service_form">
				
            	
                <div class="adminFldRw posit_err">
                	<div class="admin_Labl">Service Name<span style="color:#FF0000">*</span></div>
	                <div class="adminInptTxt">
						<input type="text" name="enter_category" id="enter_category"  value=""/>
					</div>
                </div>
                
                <div class="adminFldRw posit_err">
                	<div class="admin_Labl">Select Category<span style="color:#FF0000">*</span></div>
	                <div class="adminInptTxt">
						<select name="category_name" id="category_name" class="selText">
							<option value=''>--Select Category--</option>
							<?php foreach($categorydata as $cat){?>
								<option value="<?php echo $cat->id;?>"><?php echo str_replace('\\', '',$cat->category_name);?></option>
							<?php }?>	
						</select>
					</div>
                </div>
                
                <div class="adminFldRw posit_err">
                	<div class="admin_Labl">Service Status<span style="color:#FF0000">*</span></div>
	                <div class="adminInptTxt">
						<select name="status" id="status" class="selText">
							<option value=''>--Select Status--</option>
							<option value="1">Active</option>
							<option value="0">In-active</option>
						</select>
						<div class="btn left">
							<span class="franklin-g">
								<input type="hidden" name="submit" id="submit" value="ADD" />
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
    </div><div class="left"><img src="images/admin/content_btm.png" width="996" height="7" alt="" /></div></div>
   
    </div>
    <div class="clear"></div>
  </div>
  <!-- END CONTENT -->
  <div class="clear"></div>
</div>
<?php include('admin_footer.php');?>