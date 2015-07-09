  <?php $type=$this->uri->segment(2);
  if($type=='profile' || $type=='changePass' ||$type=='update_profile' ){ ?>
 
 <h2>Settings</h2>
            <div >
              <div class="sogrid font16"> <a href="<?php echo base_url().'op_setting/profile'?>">Manage Profile</a>
                <div class="clearboth"></div>
              </div>
              <div class="sogrid font16">
                <div class="sogl"><a href="<?php echo base_url().'op_setting/changePass'?>">Change Password</a> </div>
               
                <div class="clearboth"></div>
              </div>
             
          <div class="sogrid font16">
                <div class="sogl" style="width:70%"><a href="<?php echo base_url().'op_setting/addScheduleTime'?>">Other Practice Settings</a> </div>
               
                <div class="clearboth"></div>
              </div>
              
            </div>
          <?php } elseif($type=='scheduleTime' || $type=='addScheduleTime'){?>
           <h2>Other Practice Settings</h2>
           <div class="sogrid font16">
                <div class="sogl" style="width:180px"><a href="<?php echo base_url().'op_setting/addScheduleTime'?>">Other Practice Settings</a> </div>
               
                <div class="clearboth"></div>
              </div>
               <div class="sogrid font16">
                <div class="sogl" style="width:150px"><a href="<?php echo base_url().'op_setting/scheduleTime'?>">View Settings Log</a> </div>
               
                <div class="clearboth"></div>
              </div>
          
          <?php } ?>
         
          
         
		   <div class="sogrid gralt">
                <div class="sogl"><a href="<?php echo base_url().'op_setting/index'?>">Main Menu</a> </div>
               
                <div class="clearboth"></div>
              </div>