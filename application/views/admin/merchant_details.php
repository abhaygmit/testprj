<?php include('admin_header.php');?>
<?php include('admin_left.php');?>
      <div class="rightColm"  >
        <div class="result_opt">
          <div class="left">
            <h2><?php echo strtoupper($row['full_name']);?>'s Details</h2>
          </div>
          <div class="right" style="color:#999999; font-size:16px"><?php echo strtoupper($row['full_name']);?>'s Earns- <strong><?php echo ($earning['earning']>0)?$earning['earning']:0;?></strong></div>
        </div>
        <div class="border_r" ></div>
        <div class="clear pTop10"></div>
        <div class="rightContWrap"	>
          <div class="rightContFrmM" >
            <?php $eror=validation_errors();//echo '<pre>';print_r($row);echo '</pre>';
 			if($eror!=''){?>
            <div class="errorNotePane" >
              <div class="errorNote">
                <div class="errorNoteTitle"> Error Notification</div>
                <div class="errorNotetxt"> <?php echo validation_errors(); ?> <br />
                </div>
              </div>
            </div>
            <?php }?>
            <div class="adminAddWrap">
              <form action="" method="POST"  id="edit_user_form"  >
				
				<div class="adminFldRwM posit_err" style="float:left;">
                	<div class="admin_LablM">Full Name :</div>
	                <div class="adminInptTxt1"><?php echo $row['full_name'];?></div>
	                
                </div>
				
				<div class="adminFldRwM posit_err" style="float:right">
                	<div class="admin_LablM">Email :</div>
	                <div class="adminInptTxt1">
	                	<?php echo $row['email'];?>
                    </div>
                </div>
                
                <div class="adminFldRwM posit_err" style="float:left;">
                	<div class="admin_LablM">Address Line1 :</div>
	                <div class="adminInptTxt1">
	                	<?php echo $row['address_line1'];?>
	                </div>
                </div>
                
                <div class="adminFldRwM posit_err" style="float:right">
                	<div class="admin_LablM">Address Line2 :</div>
	                <div class="adminInptTxt1">
	              <?php echo $row['address_line2'];?>
	                </div>
                </div>
                
                <div class="adminFldRwM posit_err" style="float:left;">
                	<div class="admin_LablM">Zipcode :</div>
	                <div class="adminInptTxt1">
	               <?php echo $row['zipcode'];?>
	                </div>
                </div>
                
                <div class="adminFldRwM posit_err" style="float:right">
                	<div class="admin_LablM">State :</div>
	                <div class="adminInptTxt1">
	                	<?php echo $row['State'];?>
	                </div>
                </div>
                
                <div class="adminFldRwM posit_err" style="float:left;">
                	<div class="admin_LablM">Country :</div>
	                <div class="adminInptTxt1">
	                	<?php echo $row['country'];?>
	                </div>
                </div>
                
                <div class="adminFldRwM posit_err" style="float:right">
                	<div class="admin_LablM">Website :</div>
	                <div class="adminInptTxt1">
	                	<?php echo $row['website'];?>
	                </div>
                </div>
                
                <div class="adminFldRwM posit_err" style="float:left;">
                	<div class="admin_LablM">Profile Name :</div>
	                <div class="adminInptTxt1">
	                	<?php echo $row['profile_name'];?>
	                </div>
                </div>
                
                <div class="adminFldRwM posit_err" style="float:right">
                	<div class="admin_LablM">Rating :</div>
	                <div class="adminInptTxt1">
	                	<?php echo $row['merchant_rating_form_yelp'];?>
	                </div>
                </div>
                
                
			      </div>
                </div>
				
				
				
				<div class="result_opt">
          <div class="left">
            <h2><?php echo strtoupper($row['full_name']);?>'s Transactions</h2>
          </div>
          <div class="right" style="color:#FF0000"></div>
        </div>
				
				
          <div class="tablWrap viewPerm">
          <table width="100%" cellpadding="0" cellspacing="0" class="tHeader">
              <tr>
              	<th >ID</th>
                <th style="width:140px">Name</th>
				<th style="width:140px" >Time</th>
                <th style="width:40px" >Price</th>
               	<th style="width:120px" >Consumer</th>
				<th style="width:135px">Booked On</th>
                <th style="width:135px" >Status</th>
              </tr>
			<?php
           // $limit = $_REQUEST['per_page'];
            
            
            if(count($trans)>0)
            {	
				//echo '<pre>';print_r($trans);echo '</pre>';
            	$j=1;
             	foreach($trans as $userlist)
			 	{	
				
			   ?>
			  <tr>
			  <td  style="width:20px"><?php echo $j++;?></td>
			  <td style="width:140px"><a href="<?php echo base_url().'index.php/merchants/booking_details/'.$userlist['aptid']?>"><?php echo $userlist['apt_title'];?></a></td>
			  <td style="width:140px"><?php echo date("h:i A, D d-M-Y",strToTime($userlist['start_date']));?></td>
			  <td style="width:40px"><?php echo $userlist['price'];?></td>
			  <td style="width:120px"><?php $uinfo=$this->common_model->getUserInfo($userlist['user_id']);
		echo $uinfo[0]['full_name'];
		
		?></td>
			  <td class="col13" style="width:135px"><?php echo date('jS F Y', strtotime($userlist['account_creation_date'])); ?></td>
			  <td class="action">
              <?php $booking_status=$this->common_model->getBookingStatusById($userlist['booking_status']);
			  	if($booking_status=='Admin will pay'):?>
				<a href="<?php echo base_url().'index.php/merchants/paidByAdmin/'.$this->uri->segment(3).'/'.$userlist['aptid']?>"><?php echo $booking_status;?></a>
				<?php else:
				echo $booking_status;
				 endif;	  
			  ?>
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
   	  
				</form>
            </div>
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