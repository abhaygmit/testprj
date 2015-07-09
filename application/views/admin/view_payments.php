<?php include('admin_header.php');?>
<?php include('admin_left.php');?>
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
                <div class="left"><h2>Manage Payments</h2></div>
            </div>
            <div class="clear"></div>
            <?php if(isset($message)){?><div  style=<?php echo $cls?>><strong><?php echo $message ;?></strong></div><?php  } ?>
            <div class="p10">
            	<form name="search_user" id="search_user" action="" method="GET">
			
			<center><table width="70%"><tr><td style="width:70px" nowrap="nowrap">
			Search Plan:</td><td style="width:200px"> <div class="adminInptTxt"><input type="text" name="keyword" id="keyword" maxlength="150"  value="<?php echo @$_GET['keyword']; ?>"/> </div></td><td><input type="image" src="images/btn_search.png" name="search"> 
			 </td><td style="width:200px; margin-left:20px;"><a href="<?php echo base_url();?>users/Viewpayments"><img src="images/show_all.png"  /></a></td>
			</tr></table>
			</center>
			</form>
            </div>
            
            <div class="tablWrap viewPerm">
			

			
            
<?php
//print_r($paymentslist);
$limit = $this->uri->segment(3);
if($limit=='')
{
$i=1;
}
else
{
$i=$limit+1;
}
if(count($paymentslist)>0)
{
?>
<table cellspacing="0" cellpadding="0" class="tHeader">
              <tr>
               
                <th class="col13">User</th>
				<!-- <th class="col27">Email</th> -->
				<th class="col13">Plan</th>
                <th class="col13">Amount</th>
				<th class="col13">Transaction no.</th>
				<!-- <th class="col13">Is Admin</th> -->
                <th class="action no-bgImage">Payment date</th>
              </tr>
      
<?php
 foreach($paymentslist as $pmtlist){
 
 ?>
			<tr>
                <td class="col13"><?php echo $this->users_model->getUserName($pmtlist->user_id);?></td>
				<!-- <th class="col27">Email</th> -->
				<td class="col13"><?php echo $pmtlist->plan;?></td>
                <td class="col13"><?php echo $pmtlist->currency.' '.$pmtlist->amount; ?></td>
				<td class="col13"><?php echo $pmtlist->transaction_number; ?></td>
				<!-- <th class="col13">Is Admin</th> -->
                <td class="col13"><?php echo $pmtlist->payment_date; ?></td>
           
          </tr>
                
                <?php $i++;} 
				
				?>
				</table>
				<?php
				
				
				}else {?>
			   
				<div class="tablRowAlt"><div class="noRecord"><?php  echo "No record found ";?></div></div>
                    
				<?php  } ?>
				
                <div class="left"><img src="images/purpl_tabl_btm.png" width="678" height="6" alt="" /></div>
            </div>
            
           <div class="paging">
            
                <ul class="pagination paginationA paginationA01">
                <?php  echo $paging ?>
                </ul>
               
 
      </div>
    </div>
    
    <div class="clear"></div>
    
  </div><div class="left"><img src="images/content_btm.png" width="966" height="7" alt="" /></div></div>
  <!-- END CONTENT -->
  
  <div class="clear"></div>
</div>
<?php include('admin_footer.php');?>


