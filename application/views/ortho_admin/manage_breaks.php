<div class="container">
  <div class="row-fluid">
   <div class="selectHow_txtWrap clearfix pTop20 font18"> <?php $this->load->view('breadcrumb');?></div>
    <section>
      <article>
        <div class="inconwrap">
          <div class="soswrap1" >
           <?php include('op_leftmenu.php');?>
       </div>
       
        <form action="<?php echo base_url().'template/createDataset';?>" method="post" name="scheduleTemplate" id="scheduleTemplate"  >
        <div class="hzScr">
         <div class="hzScW">
          <div class="qawrap1" >
          
            <h2>Time Interval List</h2>
          <div class="hlogin" style="padding:0px">
          	<div class="rw_hdrno" title="Serial no" alt="Serial no">No.</div>
            <div class="rw_hdr_nm" title="Break type" alt="Break type" style="width:200px">Break Type</div>
            <div class="rw_hdr1" title="Break time interval" alt="Break time interval" style="width:70px">Break Time</div>
            <div class="rw_hdr_st" title="Color code" alt="Color code" style="width:70px">Color Code</div>
             <div class="rw_hdr_st" title="Status" alt="Status">Status</div>
            <div class="rw_hdr_edt" title="Edit" alt="Edit">Edit</div>
            <div class="rw_hdr_del" title="Delete" alt="Delete">Delete</div>
          </div>           
            <div class="clearboth"></div>
          
            
            <div class="scrollbar1">
              <div class="scrollbar">
                <div class="scroller_arw_up"></div>
                <div class="track">
                  <div class="thumb"></div>
                </div>
                <div class="scroller_arw_dwn"></div>
              </div>
              <div id="to_maintain_footer_height" class="viewport">
                <div class="overview">
            
              <div class="hlogin" style="padding:0px">
              <?php
			  $i=1;
			   if(!empty($result)){
			   foreach($result as $res){
				  
				   ?>
          	<div class="rw_dtrno"><?php echo $i++; ?></div>
            <div class="rw_dtr_nm" style="width:200px"><?php echo $this->common_model->displayTextWithDefinedLength($res['break_type'], 30);?></div>
            <div class="rw_dtr1" style="width:70px"><?php echo $res['time_interval'];?></div>
             <div class="rw_dtr_st" style="width:70px"><?php echo ($res['color_code']!='')?'#'.$res['color_code']:'&nbsp;';?></div>
            <div class="rw_dtr_st"><?php echo ($res['status']=='1')?'Active':'Inactive';?></div>
            <div class="rw_dtr_edt"><a href="<?php echo base_url().'op_admin/addBreak/'.$res['id'];?>" title="Edit <?php echo $res['break_type']; ?>" alt="Edit <?php echo $res['break_type']; ?>">Edit</a></div>
            <div class="rw_dtr_del"><a href="<?php echo base_url().'op_admin/deleteBreak/'.$res['id'];?>" onclick="return confirm('Are you sure you want to delete <?php echo $res['break_type']; ?>?')" title="Delete <?php echo $res['break_type']; ?>" alt="Delete <?php echo $res['break_type']; ?>" >Delete</a></div>
            <?php } }else {
				echo '<div class="errorText">'.$this->config->item('notFound').'</div>';
			}?>
          </div>
            
            </div>
            </div>
            </div>
  </div></div>
          </form> 
          <div class="clear"></div>
        </div>
      </article>
      </article>
    </section>
  </div>
</div>
<!--<div class="container">
    <div class="row-fluid">
      <div class="selectHow_txtWrap clearfix pTop20 font18">Welcome <?php echo $full_name; ?> To Dashboard</div>
      <section class="register">
      <p>&nbsp;</p>
      <p>Under Construction</p>
      <p>&nbsp;</p>
      <p>Practice ID : <?php echo $practice_id; ?></p>
      </section>  
    </div>
 </div>-->