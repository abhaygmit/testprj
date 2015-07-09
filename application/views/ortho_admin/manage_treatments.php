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
          
            <h2>Treatment Type List</h2>
          <div class="hlogin" style="padding:0px">
          	<div class="rw_hdrno" title="Serial no" alt="Serial no">No.</div>
            <div class="rw_hdr_nm">Treatment Name</div>
            <div class="rw_hdr1">Price</div>
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
			   foreach($result as $res){?>
          	<div class="rw_dtrno"><?php echo $i++; ?></div>
            <div class="rw_dtr_nm"><?php echo $this->common_model->displayTextWithDefinedLength($res['treatment_name'], 30);?></div>
            <div class="rw_dtr1"><?php echo $res['price'];?></div>
            <div class="rw_dtr_st"><?php echo ($res['status']=='1')?'Active':'Inactive';?></div>
            <div class="rw_dtr_edt"><a href="<?php echo base_url().'op_admin/addTreatment/'.$res['id'];?>" title="Edit Treatment <?php echo $res['treatment_name']; ?>" alt="Edit Treatment <?php echo $res['treatment_name']; ?>">Edit</a></div>
            <div class="rw_dtr_del"><a href="<?php echo base_url().'op_admin/deleteTreatment/'.$res['id'];?>" onclick="return confirm('Are you sure you want to delete <?php echo $res['treatment_name']; ?>?')" title="Delete Treatment <?php echo $res['treatment_name']; ?>" alt="Delete Treatment <?php echo $res['treatment_name']; ?>" >Delete</a></div>
            <?php }  } else {
				echo '<div class="errorText">'.$this->config->item('notFound').'</div>';
			}
				?>
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
