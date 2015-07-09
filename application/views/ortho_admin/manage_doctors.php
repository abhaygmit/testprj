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
          
            <h2>Doctors List</h2>
          <div class="hlogin" style="padding:0px">
          	<div class="rw_hdrno" title="Serial no" alt="Serial no">No.</div>
            <div class="rw_hdr_nm" style="width:160px">Doctor Name</div>
            <div class="rw_hdr1">Email</div>
            <div class="rw_hdr_st" style="width:80px">Woring Hours</div>
           <div class="rw_hdr_st" title="Status" alt="Status" style="width:80px">Status</div>
            
            <div class="rw_hdr_del" title="Action" alt="Action" style="width:60px">Edit</div>
            <div class="rw_hdr_del" title="Action" alt="Action" style="width:60px">Delete</div>
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
				foreach($result as $res){?>
          	<div class="rw_dtrno"><?php echo $i++;?></div>
            <div class="rw_dtr_nm" style="width:160px"><?php echo $res['doctor_name'];?></div>
            <div class="rw_dtr1"><?php echo $this->common_model->displayTextWithDefinedLength($res['doctor_email'], 40);?></div>
            <div class="rw_dtr_edt" style="width:80px"><?php echo $res['working_hours'];?></div>
            <div class="rw_dtr_st" style="width:80px"><?php echo ($res['status']=='1')?'Active':'Inactive';?></div>
            <div class="rw_dtr_edt" style="width:60px"><a href="<?php echo base_url().'op_admin/addDoctor/'.$res['id'];?>" title="Edit Doctor <?php echo $res['doctor_name']; ?>" alt="Edit Doctor <?php echo $res['doctor_name']; ?>">Edit</a> </div>
         <div class="rw_dtr_edt" style="width:60px">   <a href="<?php echo base_url().'op_admin/deleteDoctor/'.$res['id'];?>" onclick="return confirm('Are you sure you want to delete <?php echo $res['doctor_name']; ?>?')" title="Delete Doctor <?php echo $res['doctor_name']; ?>" alt="Delete Doctor <?php echo $res['doctor_name']; ?>" >Delete</a></div>
            <?php }}else {
				echo '<div class="errorText">'.$this->config->item('notFound').'</div>'; }?>
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