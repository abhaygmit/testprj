
<div class="container">
  <div class="row-fluid">
   <div class="selectHow_txtWrap clearfix pTop20 font18"> <?php $this->load->view('breadcrumb');?></div>
    <section>
      <article>
        <div class="inconwrap">
          <div class="soswrap1" >
           <?php include('op_leftmenu.php');?>
       </div>   
       
           
        <form action="" method="post" name="addScheduleTime" id="addScheduleTime"  >
          <div class="qawrap1" >
          
          <?php //echo $result['schedule_time_intvl'];?>
          
            <?php $params=$this->uri->segment(3); ?>
            <h2>Other Practice Settings</h2>
            
            <div class="hlogin">
              <div class="hlogin_label">Stagger Chair Start </div>
              <div class="hlogin_inputs">
                <select name="staggerChair" id="staggerChair" style="color:#000" >
                             
                
                <option value="1" <?php echo ($result['stagger_chair']==1)?'selected':'';?>>YES</option>
                <option value="2" <?php echo ($result['stagger_chair']==2)?'selected':'';?>>NO</option>
                
                
                </select>
                <?php if(form_error('procAbbr')){ echo form_error('procAbbr'); } ?>
              </div>
              <div class="clear"></div>
            </div>
       
       
       <div class="hlogin">
              <div class="hlogin_label">Offer Same Day Start </div>
              <div class="hlogin_inputs">
                <select name="offerSameDay" id="offerSameDay" style="color:#000" >
                <option value="1" <?php echo ($result['same_day_start']==1)?'selected':'';?>>YES</option>
                <option value="2" <?php echo ($result['same_day_start']==2)?'selected':'';?>>NO</option>
              
                
                </select>
                <?php if(form_error('procAbbr')){ echo form_error('procAbbr'); } ?>
              </div>
              <div class="clear"></div>
            </div>
       	
        	<div class="hlogin">
              <div class="hlogin_label">Other Appointment Avg. </div>
              <div class="hlogin_inputs">
                <input type="text" name="otherApt" id="otherApt" value="<?php echo ($result['other_apt_avg']!='')?$result['other_apt_avg']:'';?><?php echo (isset($_POST['otherApt'])!='')?$_POST['otherApt']:'';?>" style="color:#000" />
                <?php if(form_error('procAbbr')){ echo form_error('procAbbr'); } ?>
              </div>
              <div class="clear"></div>
            </div>
       
            
            
            <!-- <div class="hlogin">
              <div class="hlogin_label">Schedule Time Interval <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <select name="scheduleT" id="scheduleT" style="color:#000" >
                <option value="" >-----Select Schedule Time Interval-----</option>
               
                
                <option value="3" <?php echo ($result['schedule_time_intvl']==3)?'selected':'';?>>3 Minutes</option>
                <option value="5" <?php echo ($result['schedule_time_intvl']==5)?'selected':'';?>>5 Minutes</option>
                 <option value="10" <?php echo ($result['schedule_time_intvl']==10)?'selected':'';?>>10 Minutes</option>
                <option value="15" <?php echo ($result['schedule_time_intvl']==15?"selected":"");?>>15 Minutes</option>
                 <option value="20" <?php echo ($result['schedule_time_intvl']==20)?'selected':'';?>>20 Minutes</option>
              
                
                </select>
              </div>
              <div class="clear"></div>
            </div>-->
            <div class="hlogin">
              <div class="hlogin_label">Description </div>
              <div class="hlogin_inputs">
                <input type="text" name="desc" id="desc" value="<?php echo ($result['description']!='')?$result['description']:'';?><?php echo (isset($_POST['desc'])!='')?$_POST['desc']:'';?>" style="color:#000" />
                <?php if(form_error('procAbbr')){ echo form_error('procAbbr'); } ?>
              </div>
              <div class="clear"></div>
            </div>
            
            
            
                    
             <div class="hlogin">
           <div > <input type="submit" name="Save" class="btnactive m5r" style="border:0px" value="Save" ></div>
           <div> <input type="button" name="cancel" class="btninactive" value="Cancel" onclick="javascript: return history.go(-1)" ></div>
           			
              <!--<div class="btnactive m5r"><a href="javascript:void(0);" onclick="submit_form('scheduleTemplate');">Save As New Dataset</a></div>
              <div class="btnactive"><a href="<?php echo base_url().'template/createTemplate'?>">Build Schedule Template</a></div>-->
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