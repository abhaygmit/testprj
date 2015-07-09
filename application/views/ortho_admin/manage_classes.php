<div class="container">
  <div class="row-fluid">
   <div class="selectHow_txtWrap clearfix pTop20 font18"> <?php echo $this->load->view('breadcrumb');?></div>
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
          
          <h2>Class List</h2>
          <div class="hlogin" style="padding:0px; width:106.5%">
          	<div class="rw_hdrno" title="Serial no." alt="Serial no">No.</div>
            <div class="rw_hdr_nm" title="Class name" alt="Class ID" style="width:52px" >Class ID</div>
            <div class="rw_hdr_nm" title="Class name" alt="Class name" style="width:165px" >Class Name</div>
            <!--<div class="rw_hdr1">Color</div>-->
            <div class="rw_hdr1" style="width:80px" title="Manage resources" alt="Manage resources">Time Attribute</div>
            <div class="rw_hdr1" style="width:80px" title="Manage resources" alt="Manage resources">Class Attribute</div>
            <div class="rw_hdr_st" style="width:80px" title="Class status" alt="Class status">Status</div>
            <div class="rw_hdr_edt" title="Edit class" alt="Edit class">Edit</div>
            <div class="rw_hdr_del" title="Delete class" alt="Delete class">Delete</div>
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
            
                        
            
              <div class="hlogin" style="padding:0px; width:106.5%">
              <?php
			  $i=1;
			  if(!empty($result)){
			   foreach($result as $res){
				   if($res['time_attribute']=='E')
				   {$attr='End';}elseif($res['time_attribute']=='M'){$attr='Mid';}elseif($res['time_attribute']=='S'){$attr='Start';}
					$q=$this->db->query("select * from op_attributes where id='".$res['class_attribute']."'")->result_array();
					   
				   ?>
              <div class="rw_dtrno"><?php echo $i++;?></div>
              <div class="rw_dtr_nm" style="width:7%"><?php echo $this->common_model->displayTextWithDefinedLength($res['id'], 30);?></div>
            <div class="rw_dtr_nm" style="width:22.5%"><?php echo $this->common_model->displayTextWithDefinedLength($res['class_name'], 30);?></div>
           <!-- <div class="rw_dtr1"><?php echo $res['color_code'];?></div>-->
             <div class="rw_dtr1" style="width:80px"><?php echo $attr;?></div>
             <div class="rw_dtr1" style="width:80px"><?php echo (isset($q[0]['attribute'])!=''?$q[0]['attribute']:'&nbsp;');?></div>
            <div class="rw_dtr_st" style="width:80px"><?php echo ($res['status']=='1')?'Active':'Inactive';?></div>
            <div class="rw_dtr_edt"><a href="<?php echo base_url().'op_admin/addClass/'.$res['id'];?>" title="Edit Class <?php echo $res['class_name']; ?>" alt="Edit class <?php echo $res['class_name']; ?>">Edit</a></div>
            <div class="rw_dtr_del"><a href="<?php echo base_url().'op_admin/deleteClass/'.$res['id'];?>" onclick="return confirm('Are you sure you want to delete <?php echo $res['class_name']; ?>?')" title="Delete class <?php echo $res['class_name']; ?>" alt="Delete Class <?php echo $res['class_name']; ?>" >Delete</a></div>
            <?php } }else {
				echo '<div class="errorText">'.$this->config->item('notFound').'</div>';}?>
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
