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
                <div class="left"><h2>View Import Data</h2></div>
            </div>
            <div class="clear"></div>
            <?php if(isset($message)){?><div  style=<?=$cls?>><strong><?php echo $message ;?></strong></div><?php }?>
            <div class="p10">
            <form name="search_user" id="search_user" action="" method="get">
			<center>
            <table width="100%">
            	<tr>
                	<td width="450" style="width:70px">Search Name / License No.:</td>
					<td width="200" style="width:200px"> 
                    <div class="adminInptTxt">
            			<input type="text" name="keyword" id="keyword" maxlength="150" value="<?php echo @$_REQUEST['keyword']; ?>"/> 
                    </div>
               		</td>
                    <td width="108">
                    	<input type="image" src="images/admin/btn_search.png" name="search"> 
			 		</td>
                    <td width="108" style="width:200px; margin-left:20px;">
                    	<a href="<?php echo base_url();?>manageprofessionals/viewImportedProfessionals"><img src="images/admin/show_all.png" border="0"  /></a>
                    </td>
				</tr>
            </table>
			</center>
			</form>
            </div>
        <div class="tablWrap viewPerm">
          <table width="100%" cellpadding="0" cellspacing="0" class="tHeader">
              <tr>
                <th class="col13">License</th>
                <th class="col13">Name</th>
				<th class="col27">Verification Code</th>
                <th class="col13">Address</th>
                <th class="col13">City, State</th>
				<th class="col13">Zip</th>
                <th class="action no-bgImage">Action</th>
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
				  if($userlist->register_from==0)
				    $register="Website";
				  else if($userlist->register_from==1)
				    $register="Facebook";
  			      else if($userlist->register_from==2)
				    $register="Google";		
			   ?>
			  <tr>
			  <td class="col13"><?php echo $userlist->license;?></td>
              <td class="col13"><?php echo $userlist->name;?></td>
			  <td class="col27"><?php echo $userlist->verification_code;?></td>
              <td class="col13"><?php echo $userlist->address;?></td>
			  <td class="col13"><?php echo $userlist->city.', '.$userlist->state; ?></td>
              <td class="col13"><?php echo $userlist->zip; ?></td>
			  <td class="action">
              	<?php /*?><a href="<?php echo base_url()?>users/Viewusers?id=<?php echo $userlist->id; ?>&email=<?php echo $userlist->email;?>&username=<?php echo $userlist->username;?>&flag=reset_password" onclick="return checkValid()">
                	<img src="images/admin/reset_password.gif" border="0" title="Reset Password" alt="Reset Password">
                </a>&nbsp;
                <a href="javascript:void(0);" onclick="return checkstatus(<?php echo $userlist->id; ?>)" title="Delete">
                	<img src="images/admin/trash.png" border="0"  />
                </a>&nbsp;<?php */?>
                <?php if($userlist->status==0){echo '<img src="images/admin/red.png" border="0" title="Inctive" alt="Inctive">';}else{ echo '<img src="images/admin/green.png" border="0" title="Active" alt="Active">'; } ?>
                <?php /*?><a href="users/userstatus/<?php echo $userlist->id; ?>/<?php if($userlist->status==0){echo '1';}else{ echo '0'; } ?>" ></a><?php */?>
             </td>
			</tr>
			<?php $i++;} }else {?>
			<div class="tablRowAlt"><div class="noRecord"><?php  echo "<b>No record found.</b>";?></div></div>
			<?php } ?>
		    </table>
            <div class="left"><img src="images/admin/purpl_btm_sml.png" width="765" height="6" alt="" /></div>
            </div>
            <div class="paging" style="width:765px;">
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