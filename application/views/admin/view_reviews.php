<?php include('admin_header.php');?>
<?php include('admin_left.php');?>
<script type="text/javascript">
function checkstatus(id)
{
	var answer = confirm("Are you sure you want to delete?")
	if (answer)
	{
		window.location="<?php echo base_url();?>merchants/deleteMerchant/?id="+id;
	}
	else
	{
		return false;
	}
}
</script>
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
                <div class="left"><h2>User's Review List</h2></div>
            </div>
            <div class="clear"></div>
            <?php if(isset($message)){?><div  style=<?=$cls?>><strong><?php echo $message ;?></strong></div><?php }?>
          <div class="tablWrap viewPerm">
          <table width="100%" cellpadding="0" cellspacing="0" class="tHeader">
              <tr>
              	<th style="width:25px">ID</th>
                <th class="col13" style="width:16%">Consumer</th>
				<th class="col13" style="width:16%">Merchant</th>
                <th class="col13" style="width:16%">Subject</th>
               	<th class="col13" style="width:27%">Comments</th>
				<th class="col13" style="width:16%">Post Date</th>
                <th class="action no-bgImage" style="width:16%">Status</th>
              </tr>
			<?php
            if(count($userslist)>0)
            {
				$limit = $this->uri->segment(3);
			if($limit=='')
			{
				$j = 1;
			}
			else
			{
				$j = $limit+1;
			}
				//$j=1;
             	foreach($userslist as $userlist)
			 	{	
			   ?>
			  <tr>
			  <td><?php echo $j++;?></td>
			  <?php $usernm=$this->common_model->getUserInfo($userlist->user_id);
			  $merchantNm=$this->common_model->getMerchantInfo($userlist->merchant_id);?>
			  <td class="col13"><?php echo $usernm[0]['full_name'];?></td>
			  <td class="col13"><?php echo $merchantNm[0]['full_name'];?></td>
			  <td class="col13"><?php echo $userlist->subject;?></td>
			  <td class="col13"><?php echo $userlist->comments;?></td>
			  <td class="col13"><?php echo date('jS F Y', strtotime($userlist->created)); ?></td>
			  <td class="action">
                    <a href="<?php echo site_url('reviews/deletereview/'.$userlist->id);?>" onclick="return confirm('Are you want to delete this review?')" title="Delete" alt="Delete">
                	<img src="images/admin/trash.png" border="0"  />
                    </a>|
                <a href="<?php echo site_url('reviews/reviewstatus/'.$userlist->id.'/'. ($userlist->status==0? '1':'0'));?>" ><?php if($userlist->status==0){echo '<img src="images/admin/red.png" border="0" title="In-active" alt="In-active">';}else{ echo '<img src="images/admin/green.png" border="0" title="Active" alt="Active">'; } ?>
                </a>
             </td>
			</tr>
			<?php $i++;} }else {?>
			<div class="tablRowAlt"><div class="noRecord"><?php  echo "<b>No record found.</b>";?></div></div>
			<?php } ?>
		    </table>
            <div class="left"><img src="images/admin/purpl_btm_sml.png" width="765" height="6" alt="" /></div>
            </div>
            <div class="paging">
              <ul class="pagination paginationA paginationA01">
                <?php  echo $paging ?>
              </ul>
      		</div>
   	  </div>
    <div class="clear"></div>
  </div><div class="left"><img src="images/admin/content_btm.png" width="996" height="7" alt="" /></div></div>
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