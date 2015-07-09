<?php include('admin_header.php');?>
<?php include('admin_left.php');?>
<script type="text/javascript">
function checkstatus(id)
{
	var answer = confirm("Are you sure you want to delete?")
	if (answer)
	{
		window.location="<?php echo base_url();?>users/deleteuser/?id="+id;
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
                <div class="left"><h2>Manage Users</h2></div>
            </div>
            <div class="clear"></div>
            <?php if(isset($message)){?><div  style=<?=$cls?>><strong><?php echo $message ;?></strong></div><?php }?>
            <div class="p10">
            <form name="search_user" id="search_user" action="" method="get">
			<center>
            <table width="70%">
            	<tr>
                	<td style="width:70px">Search:</td>
					<td style="width:200px"> 
                    <div class="adminInptTxt">
            			<input type="text" name="keyword" id="keyword" maxlength="150"  value="<?php echo @$_REQUEST['keyword']; ?>"/> 
                    </div>
               		</td>
                    <td>
                    	<input type="image" src="images/admin/btn_search.png" name="search"> 
			 		</td>
                    <td style="width:200px; margin-left:20px;">
                    	<a href="<?php echo base_url();?>manageprofessionals/viewMostAccessedProfessionals"><img src="images/admin/show_all.png" border="0"  /></a>
                    </td>
				</tr>
            </table>
			</center>
			</form>
            </div>
        <div class="tablWrap viewPerm">
          <table width="100%" cellpadding="0" cellspacing="0" class="tHeader">
              <tr>
                <th class="col13">Name</th>
				<th class="col27">Email</th>
                <th class="col13">Profession</th>
                <?php /*?><th class="col13">City</th><?php */?>
				<th class="col13">Most Access Prof.</th>
                <th class="col13">Most Unique Access Prof.</th>
                <th class="col13">Nos. of Complainets</th>
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
            if(count($userslist)>0)
            {
             	foreach($userslist as $userlist)
			 	{				
			?>
			  <tr>
			  <td class="col13"><?php echo $userlist->first_name.' '.$userlist->last_name;?></td>
			  <td class="col27"><?php echo $userlist->email;?></td>
              <td class="col13"><?php echo $userlist->subCatName.'<br/>'.$userlist->catName;?></td>
			  <td class="col13"><?php echo $userlist->accessCount; ?></td>
			  <td class="col13"><?php $x = $this->professional_model->mostUniqueAccessProfesionalById($userlist->id); echo $x[0]->totalUniqueAccess; ?></td>
              <td class="col13"><?php $y =    $this->professional_model->getProfesionalComplaintsById($userlist->id); echo $y[0]->totalComplaints; ?></td>
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