<?php include('admin_header.php');?>
<?php include('admin_left.php');?>
      <div class="rightColm"  >
        <div class="result_opt">
          <div class="left">
            <h2><?php echo strtoupper($trans->apt_title)?>'s Details</h2>
          </div>
          <div class="right" style="color:#999999; font-size:16px"></div>
        </div>
        <div class="border_r" ></div>
        <div class="clear pTop10"></div>
        <div class="rightContWrap"	>
          <div class="rightContFrmM" style="width:760px;" >
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
			  
			  
			 
			  <div class="traDetailContent">
			  		<div class="traDetailHead">Merchant Details</div>
	                
			  </div>
			<div class="traDetailContent">
			  		<div class="traDetailHead">User Details</div>
	                
			  </div>

			  <div class="clear"></div>
			  
			 
			  <div class="traDetailContent">
		      <div class="admin_LablM">Name :</div>
	          <div class="adminInptTxt1"><?php echo $trans->full_name;?></div>
			  </div>
			 		  <div class="traDetailContent">
			  	 	  <div class="admin_LablM">Name :</div>
	                  <div class="adminInptTxt1"><?php echo $trans->user_name;?></div>
			          </div>
			 
			  <div class="clear"></div>
			  
			  
			  <div class="traDetailContent">
		      <div class="admin_LablM">Email :</div>
	          <div class="adminInptTxt1"><?php echo $trans->email;?></div>
			  </div>
			     	  <div class="traDetailContent">
			  	 	  <div class="admin_LablM">Email :</div>
	                  <div class="adminInptTxt1"><?php echo $trans->uemail;?></div>
			          </div>
			 
			  <div class="clear"></div>
			 
			
			  <div class="traDetailContent">
		     		  <div class="admin_LablM">Address :</div>
	                  <div class="adminInptTxt1"><?php echo $trans->address_line1;?>&nbsp;<?php echo $trans->address_line2;?><?php echo $trans->state;?>&nbsp;<?php echo $trans->country;?><br /><?php echo $trans->zipcode;?><?php echo $trans->prefix;?><?php echo $trans->phone;?></div>
			  </div>
			  <div class="traDetailContent">
			  	 	  <div class="admin_LablM">Address :</div>
	                  <div class="adminInptTxt1"><?php echo $trans->add1;?> &nbsp;<?php echo $trans->add2;?><br /><?php echo $trans->uzip;?></div>
			  </div>
			 
			  <div class="clear"></div>
			 
			 		  <div class="traDetailContent">
		     		  <div class="admin_LablM">Rating :</div>
	                  <div class="adminInptTxt1"><?php echo $trans->merchant_rating_form_yelp;?></div>
			  		  </div>
		  						<div class="traDetailContent">
			  	 	  			<div class="admin_LablM">Phone :</div>
	                  			<div class="adminInptTxt1">+<?php echo $trans->uprefix;?><?php echo $trans->uphone;?></div>
		 						</div>
		 
		 
		  <div class="clear"></div>
		
			 		  <div class="traDetailContent">
		     		  <div class="admin_LablM">Phone :</div>
	                  <div class="adminInptTxt1">+<?php echo $trans->prefix;?><?php echo $trans->phone;?></div>
			  		  </div>
		  						<div class="traDetailContent">
			  	 	  			<div class="admin_LablM">Payment Profile Id :</div>
	                  			<div class="adminInptTxt1"><?php echo $trans->auth_profile_id;?></div>
		 						</div>
		 
		 
		  <div class="clear"></div>
		   <div class="traDetailContent">
		     		  <div class="admin_LablM">Profile Name :</div>
	                  <div class="adminInptTxt1"><?php echo $trans->profile_name;?></div>
			  		  </div>
		  						<div class="traDetailContent">
			  	 	  			<div class="admin_LablM">Shipping Id :</div>
	                  			<div class="adminInptTxt1"><?php echo $trans->auth_shipping_id;?></div>
		 						</div>
		 
		 
		  <div class="clear"></div>
			
				 
			  <div class="traDetailContent">
		     		  <div class="admin_LablM"></div>
	                  <div class="adminInptTxt1"></div>
			  </div>
		  <div class="traDetailContent">
			  	 	  <div class="admin_LablM"></div>
	                  <div class="adminInptTxt1"></div>
		 </div>
			 
			 <div class="clear"></div>
			 
		  <!--<div class="tablWrap viewPerm">
          <table width="100%" cellpadding="0" cellspacing="0" class="tHeader">
              <tr>
              	
                <th >Name</th>
				<th >Time</th>
                <th >Price</th>
               	<th >Consumer</th>
				<th >Booked On</th>
                <th >Status</th>
              </tr>
			<?php $stDate=$trans->apt_year.'-'.$trans->apt_month.'-'.$trans->apt_day.' '.$trans->apt_time;?>
          	  <tr>
			 
			  <td ><a href="<?php echo base_url().'index.php/merchants/booking_details/'.$userlist['aptid']?>"><?php echo $trans->apt_title;?></a></td>
			  <td ><?php echo date("h:i A, D d-M-Y",strToTime($stDate));?></td>
			  <td ><?php echo ($trans->price)?$trans->price:0;?></td>
			  <td ><?php $uinfo=$this->common_model->getUserInfo($trans->user_id);
		echo $uinfo[0]['full_name'];
		
		?></td>
			  <td class="col13"><?php echo date('jS F Y', strtotime($trans->account_creation_date)); ?></td>
			  <td class="action">
              <?php echo $this->common_model->getBookingStatusById($userlist['status']);?>
             </td>
			</tr>
			
			
		    </table>
            <div class="left"><img src="images/admin/purpl_btm_sml.png" width="765" height="6" alt="" /></div>
            </div>
			 
			 
			-->
			  
			 
			  <div class="traDetailContent">
			  		<div class="traDetailHead" >Appointment Details</div>
	                
			  </div>
			  
			   <div class="traDetailContent">
			  		<div class="traDetailHead">Pricing Details</div>
	                
			  </div>
			  
			  <div class="clear"></div>
			  
			 
			  <div class="traDetailContent">
			  		<div class="admin_LablM">Title :</div>
	                <div class="adminInptTxt1"><?php echo $trans->apt_title;?></div>
			  </div>
			 
			  
								  <div class="traDetailContent">
										<div class="admin_LablM">Payment Id :</div>
										<div class="adminInptTxt1"><?php echo $trans->user_payment_id;?></div>
								  </div>
			  <div class="clear"></div>
			  
			   <div class="traDetailContent">
			  		<div class="admin_LablM"> Date :</div>
	                <div class="adminInptTxt1"><?php echo $trans->apt_month.'-'.$trans->apt_day.'-'.$trans->apt_year;?> (<?php echo date('l', strtotime($trans->apt_day_of_week));?>)</div>
			  </div>
			   <div class="traDetailContent">
										<div class="admin_LablM"> Price :</div>
										<div class="adminInptTxt1"><?php echo $trans->price;?></div>
								  </div>
			  <div class="clear"></div>
			  
			   <div class="traDetailContent">
			  		<div class="admin_LablM"> Time :</div>
	                <div class="adminInptTxt1"><?php echo $trans->apt_time;?></div>
			  </div>
			  
			  <?php 
			  $cart=$this->db->query("SELECT apt.*, cp.discount_amt as discount_amt, cp.coupon_code as coupon_code
								FROM appointment_booked apt
								LEFT JOIN coupons cp ON cp.id = apt.discount_id
								WHERE apt.user_id='".$trans->user_id."' and apt.id='".$trans->aptid."'")->result_array();
								//echo '<pre>';print_r($cart); echo '</pre>';
								$total=($trans->price - $cart[0]['discount_amt']);
			  ?>
			  
			  
			   <div class="traDetailContent">
										<div class="admin_LablM">Discount Amt. :</div>
										<div class="adminInptTxt1"><?php echo number_format($cart[0]['discount_amt'], 2);?></div>
								  </div>
			  <div class="clear"></div>
			    <div class="traDetailContent">
			  		<div class="admin_LablM"> Status:</div>
	                <div class="adminInptTxt1">
					<?php if($trans->booking_status=='0'):
							$stat='Unpaid';
						  elseif($trans->booking_status=='1'):
						  $stat='Processing';
						  elseif($trans->booking_status=='2'):
						  $stat='Paid';
						  else:
						  $stat='Cancelled';
						  endif;
					?> 
					
					<?php echo $stat;?></div>
			  </div>
			   <div class="traDetailContent">
										<div class="admin_LablM">Total :</div>
										<div class="adminInptTxt1"><?php echo number_format($total, 2); ?></div>
								  </div>
			  <div class="clear"></div>
			 
			  <div class="traDetailContent">
										<div class="admin_LablM" style="margin-left:30px"><input type="button" name="paynow" id="paynow" value="Pay now" style="background-color:#FF0000; color:#FFFFFF; " /></div>
										<div class="adminInptTxt1"></div>
								  </div>
			  
                
			      </div>
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