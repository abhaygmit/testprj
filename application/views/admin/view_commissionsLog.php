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
            <div class="left"><h2>View Commissions Log</h2></div>
        </div>
        <div class="clear"></div>
    <?php if(isset($message)){?><div style=<?=$cls?> ><strong><?php echo $message ;?></strong></div><?php } ?>
            <div class="tablWrap viewPerm">
			 	<table cellspacing="0" cellpadding="0" class="tHeader">
              		<tr>
              			<th class="col_slNo" style="width:300px">ID</th>
                		<th class="col_slNo" style="width:300px">Type</th>
                		<th class="col_pname1" style="width:100px">Commission %</th>
                		<th class="col_pname1">Min Booking to Qualify</th>
                		<th class="col_pname1">Rule Start Date</th>
						<th class="col_pname1">Rule End Date</th>
						<th class="col_pname1">Date Modified</th>

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
				 	$admin=$this->commissionmodel->getAdminType($categoryDetail->admin_id);
					$type=$this->commissionmodel->getType($categoryDetail->type);
				?>  
                    <tr>
						<td class="col_slNo"><?php echo $i;?></td>
						
						<td class="col_pname1"><?php echo ucwords($type[0]['account_type']);?>	</td>
						<td class="col_pname1"><?php echo ucwords($categoryDetail->commission_percent);?></td>
						<td class="col_pname1"><?php echo ucwords($categoryDetail->min_booking_to_qfy);?></td>
						<td class="col_pname1"><?php echo ucwords($categoryDetail->rule_start_datetime);?></td>
						<td class="col_pname1"><?php echo ucwords($categoryDetail->rule_end_datetime);?></td>
						<td class="col_pname1"><?php echo ($categoryDetail->modified_date);?></td>
					</tr>
              <?php 
					
				$i++;
			}
		}
	?>
			</table>
            <div class="left"><img src="images/admin/tabl_btm.png" width="765" height="6" alt="" /></div>
        </div>
        <div class="paging">
           <ul class="pagination paginationA paginationA01"> <?php  echo $paging ?></ul>
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