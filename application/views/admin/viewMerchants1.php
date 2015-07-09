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
                <div class="left"><h2>Manage Merchants</h2></div>
            </div>
            <div class="clear"></div>
            <?php if(isset($message)){?><div  style=<?=$cls?>><strong><?php echo $message ;?></strong></div><?php }?>
          <div class="tablWrap viewPerm">
          <table width="100%" cellpadding="0" cellspacing="0" class="tHeader">
              <tr>
              	<th style="width:25px">ID</th>
                <th class="col13" style="width:20%">Name</th>
				<th class="col13" style="width:20%">Email</th>
                <th class="col13">Profile Name</th>
               	<th class="col13">Registered IP</th>
				<th class="col13" style="width:18%">Join Date</th>
                <th class="action no-bgImage">Status</th>
				<th class="action no-bgImage">Action</th>
              </tr>
			<?php
           // $limit = $_REQUEST['per_page'];
            
            
            if(count($userslist)>0)
            {
				$status=$this->db->query("select commission.min_booking_to_qualify, mact.account_type  from set_commission_for_website commission
								left join merchant_account_type mact on mact.id=commission.merchant_account_type_id")->result_array();
								/*echo '<pre>';print_r($status);echo '</pre>';*/
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
				//print_r($userslist);			
				  if($userlist->register_from==0)
				    $register="Website";
				  else if($userlist->register_from==1)
				    $register="Facebook";
  			      else if($userlist->register_from==2)
				    $register="Google";		
				    
				    /*$address = $userlist->billing_address_line1;
				    if($userlist->billing_address_line2!='') $address.=',<br/>'.$userlist->billing_address_line2;
				    if($userlist->billing_state!='') $address.=',<br/>'.$userlist->billing_state.','.$userlist->billing_country;
				    if($userlist->billing_zipcode!='') $address.=','.$userlist->billing_zipcode;*/
			   ?>
			  <tr>
			  <td><?php echo $j++;?></td>
			  <td class="col13"><a href="<?php echo base_url().'index.php/merchants/m_details/'.$userlist->id?>"><?php echo $userlist->full_name;?></a></td>
			  <td class="col13"><?php echo $userlist->email;?></td>
			  <td class="col13"><?php echo $userlist->profile_name;?></td>
			  <td class="col13"><?php echo $userlist->register_ip;?></td>
			  <td class="col13"><?php echo date('jS F Y', strtotime($userlist->account_creation_date)); ?></td>
			  <td class="action">
              <?php	
		 $count=$this->db->query("select count('merchant_id') as merchant_id from appointment_booked where merchant_id='".$userlist->id."'")->result_array();
		// echo $count[0]['merchant_id'];
			if($count[0]['merchant_id']>= 0 && $count[0]['merchant_id'] < $status[1]['min_booking_to_qualify'] ):
			echo $status[0]['account_type'];
			elseif($count[0]['merchant_id']>= $status[1]['min_booking_to_qualify'] && $count[0]['merchant_id'] < $status[2]['min_booking_to_qualify']):
			echo $status[1]['account_type'];
			elseif($count[0]['merchant_id']>= $status[2]['min_booking_to_qualify']):
			echo $status[2]['account_type'];
			endif;
			
		?>
             </td>
			  <td class="col13"> <a href="<?php echo site_url('merchants/merchant_status/'.$userlist->id.'/'. ($userlist->active_status==0? '1':'0'));?>" onclick="return confirm('Are you want to <?php echo ($userlist->active_status==0)?"activate":"deactivate"?> this merchant?')" ><?php if($userlist->active_status==0){echo '<img src="images/admin/red.png" border="0" title="In-active" alt="In-active">';}else{ echo '<img src="images/admin/green.png" border="0" title="Active" alt="Active">'; } ?>
                </a></td>
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