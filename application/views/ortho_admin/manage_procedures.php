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
          
            <h2 style="float:left; width:83%; border:none">Procedures List</h2><a href="<?php echo base_url()?>op_admin/uploadCSV">
            <div class="btnactive m5r" style="border:0px">Upload from CSV</div></a>  
            <div class="clear"></div>
           <hr style="border-bottom: 1px dotted #D8D88D;color: #666666; margin:0px">&nbsp;</hr>
          <div class="hlogin" style="padding:0px">
          	<div class="rw_hdrno" title="Serial no" alt="Serial no">No.</div>
            <div class="rw_hdr_nm" style="width:150px">Procedure Name</div>
            <div class="rw_hdr_edt" title="Procedure Abbriviation" alt="Procedure Abbriviation" style="width:80px">Abbreviation</div>
            <div class="rw_hdr1" style="width:100px">Length in minutes</div>
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
              <div id="to_maintain_footer_height" class="viewport" style="width:99%">
                <div class="overview">
            
              <div class="hlogin" style="padding:0px">
              <?php
			  $i=1;
			   if(!empty($result)){
			   foreach($result as $res){?>
          	<div class="rw_dtrno"><?php echo $i++; ?></div>
            <div class="rw_dtr_nm" style="width:150px"><a href="<?php echo base_url().'op_admin/proc_details/'.$res['id']?>"><?php echo $this->common_model->displayTextWithDefinedLength($res['procedure_name'], 25);?></a></div>
            <div class="rw_dtr_edt" style="width:80px"><?php echo $res['proc_abbr'];?></div>
            <div class="rw_dtr1" style="width:100px"><?php echo $res['procedure_length_in_minutes'];?></div>
            <div class="rw_dtr_st"><?php echo ($res['status']=='1')?'Active':'Inactive';?></div>
            <div class="rw_dtr_edt"><a href="<?php echo base_url().'op_admin/addProcedure/'.$res['id'];?>" title="Edit Procedure <?php echo $res['procedure_name']; ?>" alt="Edit Procedure <?php echo $res['procedure_name']; ?>">Edit</a></div>
            <div class="rw_dtr_del"><a href="<?php echo base_url().'op_admin/deleteProcedure/'.$res['id'];?>" onclick="return confirm('Are you sure you want to delete <?php echo $res['procedure_name']; ?>?')" title="Delete Procedure <?php echo $res['procedure_name']; ?>" alt="Delete Procedure <?php echo $res['procedure_name']; ?>" >Delete</a></div>
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