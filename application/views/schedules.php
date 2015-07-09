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
          
            <h2>Saved Schedules</h2>
          <div class="hlogin" style="padding:0px">
          
          	<div class="rw_hdrno" title="Serial no" alt="Serial no" style="width:40px">No.</div>
            <div class="rw_hdr_edt" title="Dataset Name" alt="Dataset Name" style="width:200px">Schedule Name</div>
            <div class="rw_hdr1" title="Schedule Date" alt="Schedule Date" style="width:100px">Schedule Date</div>
            <div class="rw_hdr1" title="Total Appointments" alt="Total Appointments" style="width:80px">Total Apts.</div>
            <div class="rw_hdr1" title="# of doctors" alt="# of doctors" style="width:80px"># Docs</div>
            <div class="rw_hdr1" title="Working Days" alt="Working days" style="width:80px">Working Days</div>
            <div class="rw_hdr_del" title="schedule start time" alt="schedule start time" style="width:70px">Start Time</div>
            <div class="rw_hdr_del" title="schedule end time" alt="schedule end time" style="width:70px">End Time</div>
            <div class="rw_hdr_del" title="dataset creation date" alt="dataset creation date" style="width:100px">Action</div>
            
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
			 // pr($result);
			  $i=1;
			   if(!empty($result)){
			   foreach($result as $res){
				 $json=json_decode($res['save_actual_JSON']);
				// pr($json); 
				  $scheduleDt1=$json->year.'-'.$json->month.'-'.$json->day;
				  $scheduleDt=date('j F Y', strtotime($scheduleDt1));
				 $start_time=explode(':', $json->time_slot->start_time);
				 $end_time=explode(':', $json->time_slot->end_time);
				 $rulesetID=$json->rulesetId;
				 $rsetName=$this->db->query("select * from rulesets where id='$rulesetID'")->result();
				   ?>
          	<div class="rw_dtrno" style="width:38px"><?php echo $i++; ?></div>
            <div class="rw_dtr_edt" style="width:200px">
			<?php echo $this->common_model->displayTextWithDefinedLength($rsetName[0]->ruleset_name, 25);?>
            
            </div>
            <div class="rw_dtr1" style="width:100px"><?php echo $scheduleDt;?></div>
            <div class="rw_dtr1" style="width:80px"><?php echo $json->docEstimatedApts->no_apt_applied;?></div>
            <div class="rw_dtr1" style="width:80px"><?php echo $json->docEstimatedApts->no_of_docs;?></div>
            <div class="rw_dtr1" style="width:80px"><?php echo $json->workingHours->working_days;?></div>
            
            <?php
					$currDt=strtotime(date('Y-m-d'));
					$workDt=strtotime(date('Y-m-d', strtotime($res['working_date'])));
					if($workDt > $currDt){
						$edtLink=1;
					}else{
						$edtLink=0;
					}
			?>
            
            <div class="rw_dtr_del" style="width:70px"><?php echo ($start_time[0]>12)?($start_time[0]-12).":00 PM":$start_time[0].":00 AM"; ?></div>
            <div class="rw_dtr_del" style="width:70px"><?php echo ($end_time[0]>12)?($end_time[0]-12).":00 PM":$end_time[0].":00 AM"; ?></div>
            <div class="rw_dtr_del" style="width:100px">
            <?php if($edtLink==1){ ?>
            <a href="<?php echo base_url().'template/edit_schedule/'.$res['ruleset_id']?>" >Edit</a>
            <?php }else{ ?>
            <span style="color:#CCC" title="Post dated appointment can not be edit" alt="Post dated appointment can not be edit">Edit</span>
            <?php } ?>
           | <a href="<?php echo base_url().'template/delete_schedule/'.$res['ruleset_id']?>" onClick="return confirm('Are you sure you want to delete schedule')" >Delete</a></div>
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
