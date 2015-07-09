<?php include('admin_header.php');?>
<?php include('admin_left.php');?>
<script language="javascript">
function deleteCoupon(id)
{
   if(confirm("Are you sure to delete this coupon?"))
   {
	   window.location='<?php echo base_url();?>coupon/delete_coupon/'+id;
       return true;
   }
   else
   {
     return false;
   }
}
</script>
<?php 

$page_nos = $this->uri->segment(3);

			$cls='"border:1px solid #ff0000;margin:0px auto; width:350px; padding:10px; background:#FFECEC; margin-bottom:10px"';
			if($this->session->userdata('msg')!="")
			{
				$message=$this->session->userdata('msg');
				$cls='"border:1px solid #0000ff;margin:0px auto; width:350px; padding:10px; background:#D9DAFF; margin-bottom:10px"';
			}
			?>
<div class="rightColm">
            <div class="result_opt">
                <div class="left"><h2>View Coupons</h2></div>
            </div>
            <div class="clear"></div>
             <?php if(isset($message)){?><div style=<?php echo $cls?>><strong><?php echo $message ;?></strong></div><?php }?>
            <div class="tablWrap viewPerm">
			 <table cellspacing="0" cellpadding="0" class="tHeader">
              <tr>
                <th class="col_slNo">S No.</th>
                <th class="col_cname" style="width:250px;">Coupon Code</th>
                <th class="col_cState" style="width:120px;">No. of Use</th>
                <th class="col_cState" style="width:120px;">Start Date</th>
				<th class="col_cState" style="width:100px;">Expire Date</th>
                <th class="col_edit" style="width:46px;">Action</th>
			</tr>
			</table>
			<table cellspacing="0" cellpadding="0">
<?php
				$limit = $this->uri->segment(3);
				if($limit=='')
					{
						$i=1;
					}
				else
					{
						$i=$limit+1;
					}
				if(count($coupondata)>0)
				{
					//echo "<pre>";
					//print_r($cmsdata);

				foreach($coupondata as $coupon_detail)
				{
				
				
				?>  
				 	
                    <tr>
				
						<td style="width:34px;"><?php echo $i;?></td>

						<td  style="width:235px;"><?php echo $coupon_detail->coupon_code; ?> 
						
						
						</td>
						<td style="width:109px;" align="center"><?php echo $coupon_detail->no_of_use; ?> 
						
						
						</td>
						<td style="width:110px;" align="center"><?php echo $coupon_detail->start_date; ?> 
						
						
						</td>
						<td align="center"><?php echo $coupon_detail->expire_date; ?> 
						
						
						</td>
						<td >
				   		<a href="coupon/edit_coupon/<?php echo $coupon_detail->id; ?>/<?php if($page_nos!=''){echo $page_nos;}?>" title="Edit"><img src="images/user_edit.png"  /></a> 

						<a href="javascript:void(null)" onclick="return deleteCoupon('<?php echo $coupon_detail->id;?>')" title="Delete">
						<img src="<?php echo base_url();?>images/trash.png" /></a>
					  </td>
					</tr>
				
				
              <?php 
					
				   
					
					$i++;}}
				?>
			</table>
                <div class="left"><img src="images/tabl_btm.png" width="678" height="6" alt="" /></div>
            </div>
            

            
            
            <div class="paging">
            
                <ul class="pagination paginationA paginationA01">
                <?php  echo $paging ?>
                </ul>
               
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
