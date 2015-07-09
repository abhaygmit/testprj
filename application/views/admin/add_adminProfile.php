<?php include('admin_header.php');?>
<?php include('admin_left.php');?>
<script type="text/javascript" src="<?php echo base_url();?>js/category_validation.js"></script>
<div class="rightColm">
            <div class="result_opt">
                <div class="left"><h2>Add Profile</h2></div>
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
			<form action="" method="POST" id="add_profile" name="add_profile">
				
            <?php 
			$query=$this->db->query("select * from admin where id='1'")->result_array();
			
			?>
                <div class="adminFldRw posit_err">
                	<div class="admin_Labl">Name<span style="color:#FF0000">*</span></div>
	                <div class="adminInptTxt">&nbsp;&nbsp;&nbsp;
						<input type="text" name="admin_name" id="admin_name"  value="<?php echo($_POST['admin_name'])?$_POST['admin_name']:$query[0]['name'];?>"/>
					</div>
                </div>
                
                <div class="adminFldRw posit_err">
                	<div class="admin_Labl">Address Line1<span style="color:#FF0000">*</span></div>
	                <div class="adminInptTxt">&nbsp;&nbsp;&nbsp;
						<input type="text" name="add1" id="add1"  value="<?php echo($_POST['add1'])?$_POST['add1']:$query[0]['addressLine1'];?>"/>
					</div>
                </div>
				
				<div class="adminFldRw posit_err">
                	<div class="admin_Labl">Address Line2<span style="color:#FF0000"></span></div>
	                <div class="adminInptTxt">&nbsp;&nbsp;&nbsp;
						<input type="text" name="add2" id="add2"  value="<?php echo($_POST['add2'])?$_POST['add2']:$query[0]['addressLine2'];?>"/>
					</div>
                </div>
				
				<div class="adminFldRw posit_err">
                	<div class="admin_Labl">State<span style="color:#FF0000">*</span></div>
	                <div class="adminInptTxt">&nbsp;&nbsp;&nbsp;
						<input type="text" name="state" id="state"  value="<?php echo($_POST['state'])?$_POST['state']:$query[0]['state'];?>"/>
					</div>
                </div>
				<div class="adminFldRw posit_err">
                	<div class="admin_Labl">Country<span style="color:#FF0000">*</span></div>
	                <div class="adminInptTxt">&nbsp;&nbsp;&nbsp;
						<input type="text" name="country" id="country"  value="<?php echo($_POST['country'])?$_POST['country']:$query[0]['country'];?>"/>
					</div>
                </div>
				<div class="adminFldRw posit_err">
                	<div class="admin_Labl">Zip<span style="color:#FF0000">*</span></div>
	                <div class="adminInptTxt">&nbsp;&nbsp;&nbsp;
						<input type="text" name="zip" id="zip"  value="<?php echo($_POST['zip'])?$_POST['zip']:$query[0]['zipcode'];?>"/>
					</div>
                </div>
				<div class="adminFldRw posit_err">
                	<div class="admin_Labl">Country code<span style="color:#FF0000">*</span></div>
	                <span style="float:left; padding-top:5px; width:11px">+</span><div class="adminInptTxt">
					<input type="text" name="prefix" id="prefix" maxlength="5" value="<?php echo($_POST['prefix'])?$_POST['prefix']:$query[0]['prefix'];?>" />
					</div>
                </div>
				
                
                <div class="adminFldRw posit_err">
                	<div class="admin_Labl">Phone<span style="color:#FF0000">*</span></div>
	                <div class="adminInptTxt">&nbsp;&nbsp;&nbsp;
						<input type="text" name="phone" id="phone" maxlength="12"  value="<?php echo($_POST['phone'])?$_POST['phone']:$query[0]['phone'];?>"/>
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