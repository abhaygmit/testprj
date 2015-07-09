<?php include('admin_header.php');?>
<?php include('admin_left.php');?>
<script language="javascript">
function deletePlan(id)
{
   if(confirm("Are you sure to delete this plan?"))
   {
	   window.location='<?php echo base_url();?>membership_plan/delete_plan/'+id;
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
                <div class="left"><h2>View Plans</h2></div>
            </div>
            <div class="clear"></div>
             <?php if(isset($message)){?><div style=<?php echo $cls?>><strong><?php echo $message ;?></strong></div><?php }?>
            <div class="tablWrap viewPerm">
			 <table cellspacing="0" cellpadding="0" class="tHeader">
              <tr>
                <th class="col_slNo">S No.</th>
                <th class="col_cname" style="width:250px;">Plan</th>
                <th class="col_cState" style="width:120px;">Fee</th>                
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
				if(count($plandata)>0)
				{
					//echo "<pre>";
					//print_r($cmsdata);

				foreach($plandata as $plan_detail)
				{
				
				
				?>  
				 	
                    <tr>
				
						<td style="width:54px;"><?php echo $i;?></td>

						<td  style="width:351px;"><?php echo $plan_detail->plan; ?> 
						
						
						</td>
						<td style="width:165px;" align="center">$<?php echo $plan_detail->fee; ?> 
						
						
						</td>						
						<td >
				   		<a href="membership_plan/edit_plan/<?php echo $plan_detail->id; ?>/<?php if($page_nos!=''){echo $page_nos;}?>" title="Edit"><img src="images/user_edit.png"  /></a> 

						<a href="javascript:void(null)" onclick="return deletePlan('<?php echo $plan_detail->id;?>')" title="Delete">
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
