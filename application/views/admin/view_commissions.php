<?php include('admin_header.php');?>
<?php include('admin_left.php');?>
<script type="text/javascript">
    $(document).ready(function() {
		//by me
    });
	
	function show_more(num)
	{
		var d = "#detailed_view"+num;
		//var v = "#list_view"+num;
		//$(v).toggle(50)
		$(d).toggle(50)
	}

	function imageChange(element) 
	{
		if(document.getElementById(element).src=='<?php echo base_url()?>images/admin/ico_plus.png')
		{
			document.getElementById(element).src='<?php echo base_url()?>images/admin/ico_minus.png';
		}
		else
		{
			document.getElementById(element).src='<?php echo base_url()?>images/admin/ico_plus.png';
		}
	}
</script>
	<?php 
		$cls = '"border:1px solid #ff0000;margin:0px auto; width:350px; padding:10px; background:#FFECEC; margin-bottom:10px"';
		if($this->session->userdata('msg')!="")
		{
			$message=$this->session->userdata('msg');
			$cls = '"border:1px solid #0000ff;margin:0px auto; width:350px; padding:10px; background:#D9DAFF; margin-bottom:10px"';
		}
	?>
	<div class="rightColm">
        <div class="result_opt">
            <div class="left"><h2>View Commissions</h2></div>
			
        </div>
        <div class="clear"></div>
		 <div class="result_opt" style="padding-top:15px; margin-bottom:-5px">
            <div class="left"><h4>Current Commissions</h4></div>
			
        </div>
        <div class="clear"></div>
    <?php if(isset($message)){?><div style=<?=$cls?> ><strong><?php echo $message ;?></strong></div><?php } ?>
            <div class="tablWrap viewPerm">
			 	<table cellspacing="0" cellpadding="0" class="tHeader">
              		<tr>
              			<th class="col_slNo" style="width:300px">ID</th>
                		<th class="col_slNo" style="width:300px">Account Type</th>
                		<th class="col_pname1" style="width:100px">Commission %</th>
                		<th class="col_pname1">Min Booking to Qualify</th>
                		<th class="col_pname1">Commission Status</th>
                		
					</tr>
	<?php
			$limit = $_REQUEST['per_page'];
			if($limit=='')
			{
				$i = 1;
			}
			else
			{
				$i = $limit+1;
			}
			if(count($categoryDetails)>0)
			{
				foreach($categoryDetails as $categoryDetail)
				{
				 	$childs = $this->categorymodel->getCategoryChild($categoryDetail->id);
				 	$catArr = $this->categorymodel->getCategoryToEdit($categoryDetail->category_id);
				?>  
                    <tr>
						<td class="col_slNo"><?php echo $i;?></td>
						
						<td class="col_pname1"><?php if(sizeof($childs)>0){ ?><a href="javascript:void(null);" style="vertical-align:middle;text-decoration:none; " onclick="show_more(<?=($i+1)?>);imageChange('img<?php echo $i;?>');"><img src='images/admin/<?php if($i==1) echo 'ico_minus'; else echo 'ico_plus';?>.png' id="img<?php echo $i;?>"/>&nbsp;<?php echo ucwords($categoryDetail->service_name);?></a> <?php }else{ ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ucwords($categoryDetail->account_type);?> <?php } ?> 
						</td>
						<td class="col_pname1"><?php if(sizeof($childs)>0){ ?><a href="javascript:void(null);" style="vertical-align:middle;text-decoration:none; " onclick="show_more(<?=($i+1)?>);imageChange('img<?php echo $i;?>');"><img src='images/admin/<?php if($i==1) echo 'ico_minus'; else echo 'ico_plus';?>.png' id="img<?php echo $i;?>"/>&nbsp;<?php echo ucwords($categoryDetail->service_name);?></a> <?php }else{ ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ucwords($categoryDetail->commission_in_percentage);?> <?php } ?> 
						</td>
						<td class="col_pname1">
							<?php echo $categoryDetail->min_booking_to_qualify;?>
						</td>
						<td class="col_pname1">
							<?php echo ($categoryDetail->status=='0' ? 'In-active': 'Active');?>
						</td>
						
					</tr>
              <?php 
					if(sizeof($childs)>0) 
					{
						?>
                        <tr>
                        	<td colspan="4" style="padding:0px; margin:0px;">
                            	<div class="detailed_view" id="detailed_view<?=($i+1)?>" style="float:right; padding:0px; margin:0px; display:<?php if($i==1) echo 'block'; else echo 'none';?>;">	
                                	<table cellpadding="0" cellspacing="0" class="tbl632">  
                        <?php
							foreach($childs as $child) { ?>
						 	<tr>
								<td class="col_pname">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;<?php echo $child->category_name;?></td>
                                <td class="col_cState1">
									<a href="<?php echo  site_url('category/edit/'.$child->id);?>" title="Edit">
                                    	<img src="images/admin/edit.png"  /></a>&nbsp;
                                    <a href="<?php echo site_url('category/deletecategory/'.$child->id);?>" onclick="return confirm('Are you want to delete this category?')" title="Delete" alt="Delete">
                            			<img src="<?php echo base_url();?>images/admin/trash.png" />
                           			 </a>
					  			</td>
					   		</tr>
					<?php 
					  }
					?>
                    </table>
                  </div>
               </td>
            </tr>
            <?php
				}
				$i++;
			}
		}
	?>
			</table>
			
			
            <div class="left"><img src="images/admin/tabl_btm.png" width="765" height="6" alt="" /></div>
        </div>
		
		
		
		
		
		<div class="clear"></div>
		 <div class="result_opt" style="padding-top:15px; margin-bottom:-5px">
            <div class="left"><h4>Upcoming Commissions</h4></div>
			
        </div>
       
   
            <div class="tablWrap viewPerm">
			 	<table cellspacing="0" cellpadding="0" class="tHeader">
              		<tr>
              			<th class="col_slNo" style="width:300px">ID</th>
                		<th class="col_slNo" style="width:300px">Account Type</th>
                		<th class="col_pname1" style="width:100px">Commission %</th>
                		<th class="col_pname1">Min Booking to Qualify</th>
                		<th class="col_pname1">Commission Status</th>
                		<th  class="col_cState no-bgImage">Action</th>
					</tr>
	<?php
			$limit = $_REQUEST['per_page'];
			if($limit=='')
			{
				$i = 1;
			}
			else
			{
				$i = $limit+1;
			}
			if(count($upcoming_commission)>0)
			{
				foreach($upcoming_commission as $categoryDetail)
				{
				 	$childs = $this->categorymodel->getCategoryChild($categoryDetail->id);
				 	$catArr = $this->categorymodel->getCategoryToEdit($categoryDetail->category_id);
				?>  
                    <tr>
						<td class="col_slNo"><?php echo $i;?></td>
						
						<td class="col_pname1"><?php if(sizeof($childs)>0){ ?><a href="javascript:void(null);" style="vertical-align:middle;text-decoration:none; " onclick="show_more(<?=($i+1)?>);imageChange('img<?php echo $i;?>');"><img src='images/admin/<?php if($i==1) echo 'ico_minus'; else echo 'ico_plus';?>.png' id="img<?php echo $i;?>"/>&nbsp;<?php echo ucwords($categoryDetail->service_name);?></a> <?php }else{ ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ucwords($categoryDetail->account_type);?> <?php } ?> 
						</td>
						<td class="col_pname1"><?php if(sizeof($childs)>0){ ?><a href="javascript:void(null);" style="vertical-align:middle;text-decoration:none; " onclick="show_more(<?=($i+1)?>);imageChange('img<?php echo $i;?>');"><img src='images/admin/<?php if($i==1) echo 'ico_minus'; else echo 'ico_plus';?>.png' id="img<?php echo $i;?>"/>&nbsp;<?php echo ucwords($categoryDetail->service_name);?></a> <?php }else{ ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ucwords($categoryDetail->commission_in_percentage);?> <?php } ?> 
						</td>
						<td class="col_pname1">
							<?php echo $categoryDetail->min_booking_to_qualify;?>
						</td>
						<td class="col_pname1">
							<?php echo ($categoryDetail->status=='2' ? 'Upcoming': 'In-active');?>
						</td>
						<td class="col_cState" >
						<?php //echo $categoryDetail->set_commission_for_website.id; ?> 
				   			<a href="<?php echo site_url('commissions/edit_upcoming/'.$categoryDetail->id);?>" title="Edit">
                            	<img src="images/admin/edit.png"  />
                            </a>&nbsp;
                            <?php if(count($childs)==0){?>
                            	<a href="<?php echo site_url('commissions/deletecommission/'.$categoryDetail->id);?>" onclick="return confirm('Are you want to delete this commission data?')" title="Delete" alt="Delete">
                           <?php }else{?>
                           		<a href="javascript:void(0);" onclick="alert('Firt delete all the child categories.')" title="Delete" alt="Delete"> 
                           	<?php }?>	
                            	<!--<img src="<?php echo base_url();?>images/admin/trash.png" />-->
                            </a>
					  	</td>
					</tr>
              <?php 
					if(sizeof($childs)>0) 
					{
						?>
                        <tr>
                        	<td colspan="4" style="padding:0px; margin:0px;">
                            	<div class="detailed_view" id="detailed_view<?=($i+1)?>" style="float:right; padding:0px; margin:0px; display:<?php if($i==1) echo 'block'; else echo 'none';?>;">	
                                	<table cellpadding="0" cellspacing="0" class="tbl632">  
                        <?php
							foreach($childs as $child) { ?>
						 	<tr>
								<td class="col_pname">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;<?php echo $child->category_name;?></td>
                                <td class="col_cState1">
									<a href="<?php echo  site_url('category/edit/'.$child->id);?>" title="Edit">
                                    	<img src="images/admin/edit.png"  /></a>&nbsp;
                                    <a href="<?php echo site_url('category/deletecategory/'.$child->id);?>" onclick="return confirm('Are you want to delete this category?')" title="Delete" alt="Delete">
                            			<img src="<?php echo base_url();?>images/admin/trash.png" />
                           			 </a>
					  			</td>
					   		</tr>
					<?php 
					  }
					?>
                    </table>
                  </div>
               </td>
            </tr>
            <?php
				}
				$i++;
			}
		}
	?>
			</table>
			
			
            <div class="left"><img src="images/admin/tabl_btm.png" width="765" height="6" alt="" /></div>
        </div>
		
		
		
		
		
		
		
		
		
		
		
        <div class="paging">
           <ul class="pagination paginationA paginationA01"> </ul>
        </div>
      </div>
    </div>
    <div class="left"><img src="images/admin/content_btm.png" width="996" height="7" alt="" /></div>
    <div class="clear"></div>
  </div>
  <!-- END CONTENT -->
  <div class="clear"></div>
</div>
<?php include('admin_footer.php');?>
<script language="javascript">
function checkValid()
{
   if(confirm("Are you sure to do this?"))
   {
     return true;
   }
   else
   {
     return false;
   }
}
</script>