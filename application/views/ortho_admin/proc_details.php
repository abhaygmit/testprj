<script>
function showGrid(val, tmBreak, class_id){
 $(document).ready(function(){
 class_id=$('#class_id').val();	 
 $.post("<?php echo base_url()?>op_admin/showGrid/?val="+val+"&tm="+tmBreak+"&cl="+class_id, function(result){
 $("#doctorAssign").html(result);
 });
  });
 }
</script>
<div class="container">
  <div class="row-fluid">
   <div class="selectHow_txtWrap clearfix pTop20 font18"> <?php $this->load->view('breadcrumb');?></div>
    <section>
      <article>
        <div class="inconwrap">
          <div class="soswrap1" >
           <?php include('op_leftmenu.php');?>
       </div>       
        <form action="" method="post" name="addProcedure" id="addProcedure"  >
          <div class="qawrap1" >
            <?php $params=$this->uri->segment(3); ?>
            <h2><?php echo $result['procedure_name'];?> Detail</h2>
             <div class="hlogin">
              <div class="hlogin_label" style="font-weight:bold; font-size:12px;">Class <span style="font-size:12px; color:#F00"></span></div>
              <div class="hlogin_inputs" style="padding-top:5px">
               
                <?php 
				$classList=$this->opadmin_model->getTxClassDetailsById($result['class_id']);
				foreach($classList as $res){echo $res['class_name']; } ?>
                
               
              </div>
              <div class="clear"></div>
            </div>
            <div class="hlogin">
              <div class="hlogin_label" style="font-weight:bold; font-size:12px;">Procedure Abbr. <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs" style="padding-top:5px">
                <?php echo ($result['proc_abbr']!='')?$result['proc_abbr']:'';?>
              </div>
              <div class="clear"></div>
            </div>
        <div class="hlogin">
              <div class="hlogin_label" style="font-weight:bold; font-size:12px;">Procedure Name <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs" style="padding-top:5px">
				<?php echo ($result['procedure_name']!='')?$result['procedure_name']:'';?>
                </div>
              <div class="clear"></div>
            </div>
             <div class="hlogin">
              <div class="hlogin_label" style="font-weight:bold; font-size:12px;">Length(minutes) <span style="font-size:12px; color:#F00"></span></div>
              <div class="hlogin_inputs" style="padding-top:5px">
              
              
               <?php echo $result['procedure_length_in_minutes'];?> 
              
              </div>
              <div class="clear"></div>
            </div>
            
            <div class="hlogin">
              <div class="hlogin_label" style="font-weight:bold; font-size:12px;">Procedure Time Interval <span style="font-size:12px; color:#F00"></span></div>
              <div class="hlogin_inputs" style="padding-top:5px">
              
              
               <?php echo $result['proc_time_interval'];?> 
              
              </div>
              <div class="clear"></div>
            </div>
            
            <div id="doctorAssign" >
            
            <div class="hlogin"  >
			<div class="hlogin_label"></div>
			<div class="hlogin_inputs" style="padding-top:8px;font-weight:bold; font-size:14px;" >
            <div style="width:100px; float:left; ">Time</div>
            <div style="width:120px; float:left">Resource</div>
            <div style="float:left; width:280px">Description</div>
            </div>
            </div>
            <div class="clear"></div>
            
            
            
            <?php if($this->uri->segment(3) !='')
			{
				$tm=$scheduleTime['schedule_time_intvl'];
				$i=1;
				foreach($resource as $res){
				//pr($res);
				?>
            <div class="hlogin" style="border-bottom:solid 1px #999; border-radius:8px"  >
			<div class="hlogin_label" style="font-weight:bold; font-size:12px;">Time Assignment <?php echo $i++;?></div>
			<div class="hlogin_inputs" style="padding-top:8px;" >
			<div style="width:100px; float:left; "><?php echo $res['assign_time'];?> Minutes</div>
				   <div style="width:120px; float:left">
				  <?php if($res['doctor_id']=='a'){$doc='Staff';}
				  elseif($res['doctor_id']=='e'){$doc='Physical Equipment';}
				  elseif($res['doctor_id']=='d'){$doc='Doctor';}?>
				  
					<?php echo $doc;?>		  
				   </div>
				   <div style="float:left; width:280px"><?php echo ($res['description']!=''?$res['description']:'');?></div>
                   
                  
                   
				   <div style="clear:both"></div>
				   </div>
              <div class="clear"></div>
            </div>
            
			<?php }} ?>
            </div>
            
            
             <div class="hlogin">
              <div class="hlogin_label" style="font-weight:bold; font-size:12px;">Procedure Weight <span style="font-size:12px; color:#F00"></span></div>
              <div class="hlogin_inputs" style="padding-top:8px">
              
              <?php echo $result['proc_weight'];?> %</option>
              </div>
              <div class="clear"></div>
            </div>
            
                
           
            
           
          </form> 
          <div class="clear"></div>
        </div>
      </article>
      </article>
    </section>
  </div>
</div>
