<?php include('admin_header.php');?>
<?php include('admin_left.php');?>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>css/datepicker2.css" />
 <script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
       <script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui.min.js"></script>
       
<script type="text/javascript" src="<?php echo base_url();?>js/coupon_validation.js"></script>



<script type="text/javascript">
             $(function () {

                 var date = new Date();
                 var currentMonth = date.getMonth();
                 var currentDate = date.getDate();
                 var currentYear = date.getFullYear();

                 $('#start_date').datepicker({
                     minDate: new Date(currentYear, currentMonth, currentDate)
                 });
				$('#expire_date').datepicker({
                     minDate: new Date(currentYear, currentMonth, currentDate)
                 });
             });
    </script>

<link rel="stylesheet" href="<?php echo base_url();?>css/widgEditor.css">
 <?php 
			$cls='"border:1px solid #ff0000;margin:0px auto; width:350px; padding:10px; background:#FFECEC; margin-bottom:10px"';
			if($this->session->userdata('msg')!="")
			{
				$message=$this->session->userdata('msg');
				$cls='"border:1px solid #0000ff;margin:0px auto; width:350px; padding:10px; background:#D9DAFF; margin-bottom:10px"';
			}
			?>
			<?php //echo validation_errors(); ?>
<div class="rightColm">
            <div class="result_opt">
                <div class="left"><h2>Add Coupon</h2></div>
				<div class="right" style="color:#FF0000">* Fields required</div>
            </div>
            <div class="clear"></div>
             <?php if(isset($message)){?><div style=<?php echo $cls?>><strong><?php echo $message ;?></strong></div><?php }?>
			 <div class="border_r"></div>
			
            <div class="clear pTop10"></div>
            <div class="adminAddWrap">
			<form action="coupon/add_coupon" method="POST" class="" id="coupon_form" name="coupon_form" onsubmit="return validateCouponForm()">
				<div  >


				              
            	<div class="adminFldRw posit_err">
				
                	<div class="admin_Labl">Coupon Code<span style="color:#FF0000"> * </span></div>
	                <div class="adminInptTxt ">
						<input type="text" name="coupon_code" id="coupon_code" value="<?php echo $_POST['coupon_code']; ?>" onblur="return clearDiv();" maxlength="20"/><span id="coupon_code_err" class="error"><?php echo form_error('coupon_code'); ?></span>
					</div>
                </div>

				<div class="adminFldRw posit_err">
				
                	<div class="admin_Labl">No. of Use<span style="color:#FF0000"> * </span></div>
	                <div class="adminInptTxt ">
						<input type="text" name="no_of_use" id="no_of_use"  value="<?php echo $_POST['no_of_use']; ?>" maxlength="4"/><span id="no_of_use_err" class="error"><?php echo form_error('no_of_use'); ?></span>
					</div>
                </div>


				<div class="adminFldRw posit_err">
				
                	<div class="admin_Labl">Start Date<span style="color:#FF0000"> * </span></div>
	                <div class="adminInptTxt ">
						<input type="text" name="start_date" id="start_date" value="<?php echo $_POST['start_date']; ?>" readonly><span id="start_date_err" class="error"><?php echo form_error('start_date'); ?></span>
					</div>
                </div>

				<div class="adminFldRw posit_err">
				
                	<div class="admin_Labl">Expire Date<span style="color:#FF0000"> * </span></div>
	                <div class="adminInptTxt ">
						<input type="text" name="expire_date" id="expire_date" value="<?php echo $_POST['expire_date']; ?>"  readonly><span id="expire_date_err" class="error"><?php echo form_error('expire_date'); ?></span>
					</div>
                </div>


                
				 <div class="adminFldRw pTop10">
				 	<div class="admin_Labl">&nbsp;</div>
				<div class="left"><div class="btn left"><span class="franklin-g"><input type="image"  src= "images/btn_submit.png"/>&nbsp;</span><a href="javascript:void(null)" onclick="history.go(-1)"><img  src= "images/btn_cancel.png" border="0" /></a></div></div>	
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