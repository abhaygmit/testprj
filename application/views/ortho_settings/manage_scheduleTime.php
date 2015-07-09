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
          
            <h2>Schedule Time Log</h2>
          <div class="hlogin" style="padding:0px">
          	<div class="rw_hdrno" title="Serial no" alt="Serial no" style="min-height:40px">No.</div>
            <!--<div class="rw_hdr_nm" style="width:80px; text-align:center">Schedule Time Interval</div>-->
            <div class="rw_hdr_edt" title="Procedure Abbriviation" alt="Procedure Abbriviation" style="width:80px;min-height:40px">Stagger Chair</div>
            <div class="rw_hdr_edt" title="Procedure Abbriviation" alt="Procedure Abbriviation" style="width:90px;min-height:40px">Same Day Start</div>
            <div class="rw_hdr_edt" title="Procedure Abbriviation" alt="Procedure Abbriviation" style="width:90px;min-height:40px">Other Apt. Avg.</div>
            <div class="rw_hdr_st" title="Modified" alt="Modified" style="width:230px; min-height:40px">Valid From -To</div>
            <div class="rw_hdr_st" title="Modified" alt="Modified" style="width:80px;min-height:40px">Status</div>
            
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
              <div id="to_maintain_footer_height" class="viewport" style="width:99%">
                <div class="overview">
            
              <div class="hlogin" style="padding:0px">
              <?php
			  $i=1;
			 
			   if(!empty($result)){
			   foreach($result as $res){?>
          	<div class="rw_dtrno"><?php echo $i++; ?></div>
            <!--<div class="rw_dtr_nm" style="width:80px"><?php echo $this->common_model->displayTextWithDefinedLength($res['schedule_time'], 25);?> Minutes</div>-->
            <div class="rw_dtr_edt" style="width:80px"><?php echo ($res['stg']==1)?"YES":"NO";?></div>
            <div class="rw_dtr_edt" style="width:90px"><?php echo ($res['same_day']==1)?"YES":"NO";?></div>
            <div class="rw_dtr_edt" style="width:90px"><?php echo ($res['other_avg']!='')?$res['other_avg']:"&nbsp;";?></div>
           
            <div class="rw_dtr_st" style="width:230px"><?php echo date('M-d-Y', strtotime($res['cDate']));?>- <?php echo date('M-d-Y', strtotime($res['mDate']));?></div>
            <div class="rw_dtr_st" style="width:80px"><?php echo ($res['id']==$master['id'])?"<a href='".base_url()."op_setting/addScheduleTime'>Active</a>":"In-Active";?></div>
           
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
