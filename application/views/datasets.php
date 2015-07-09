<head>



</head>
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
        <div class="hzScr1">
         <div class="hzScW1">
          <div class="qawrap1" style="width:98%" >
          
            <h2>Saved Datasets</h2>
          <div class="hlogin" style="padding:0px">
          
          	<div class="rw_hdrno" title="Serial no" alt="Serial no" style="width:40px">No.</div>
            <div class="rw_hdr_edt" title="Dataset Name" alt="Dataset Name" style="width:150px">Dataset Name</div>
            <div class="rw_hdr1" title="# of Rooms" alt="# of Rooms" style="width:55px">Rooms</div>
            <div class="rw_hdr_st" title="# of chairs" alt="# of chairs" style="width:55px">Chairs</div>
            <div class="rw_hdr_edt" title="# of doctors" alt="# of doctors" style="width:55px">Doctors</div>
            <div class="rw_hdr_del" title="# of chairside assistance" alt="# of chairside assistance" style="width:55px">Assistance</div>
            <div class="rw_hdr_del" title="# of columns generated" alt="# of columns generated" style="width:55px">Columns</div>
            <div class="rw_hdr_del" title="# of patient" alt="# of patient" style="width:55px">Patient</div>
            <div class="rw_hdr_del" title="schedule start time" alt="schedule start time" style="width:80px">Start Time</div>
            <div class="rw_hdr_del" title="schedule end time" alt="schedule end time" style="width:80px">End Time</div>
            <div class="rw_hdr_del" title="dataset creation date" alt="dataset creation date" style="width:120px">Created On</div>
            
          </div>           
            <div class="clearboth"></div>
          
            
            <div class="scrollbar1 dsets">
              <div class="scrollbar">
                <div class="scroller_arw_up"></div>
                <div class="track">
                  <div class="thumb"></div>
                </div>
                <div class="scroller_arw_dwn"></div>
              </div>


              <div id="to_maintain_footer_height" class="viewport" style="width:927px">
              
                <div class="overview" >
            
              <div class="hlogin" style="padding:0px">
              <?php
			  $i=1;
			   if(!empty($result)){
			   foreach($result as $res){
				 
				   ?>
          	<div class="rw_dtrno" style="width:38px"><?php echo $i++; ?></div>
            <div class="rw_dtr_edt" style="width:150px">
			<a href="<?php base_url().'home/welcome/'.$res['id'];?>"><?php echo $this->common_model->displayTextWithDefinedLength($res['ruleset_name'], 25);?></a>
            
            </div>
            <div class="rw_dtr1" style="width:55px"><?php echo $res['no_of_rooms'];?></div>
            <div class="rw_dtr_st" style="width:55px"><?php echo $res['no_chairs'];?></div>
            <div class="rw_dtr_edt" style="width:55px"><?php echo $res['no_doctors']; ?></div>
            <div class="rw_dtr_del" style="width:55px"><?php echo $res['no_of_staff']; ?></div>
            <div class="rw_dtr_del" style="width:55px"><?php echo $res['no_of_columns']; ?></div>
            <div class="rw_dtr_del" style="width:55px"><?php echo $res['active_patient']; ?></div>
            <div class="rw_dtr_del" style="width:80px"><?php echo ($res['start_time']>12)?($res['start_time']-12).":00 PM":$res['start_time'].":00 AM"; ?></div>
            <div class="rw_dtr_del" style="width:80px"><?php echo ($res['end_time']>12)?($res['end_time']-12).":00 PM":$res['start_time'].":00 AM"; ?></div>
            <div class="rw_dtr_del" style="width:117px"><?php echo date('M d Y h:i A', strtotime($res['created'])); ?></div>
            <?php }}else {
				echo '<div class="errorText">'.$this->config->item('notFound').'</div>';} ?>
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