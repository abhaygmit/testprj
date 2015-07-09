  <div class="container">
    <div class="row-fluid">
      <div style="position:relative" id="div1" >
       <?php 
	       if(($this->session->userdata('logged_in')))
           { 
		 	 $user=$this->session->userdata('logged_in');
			 $usrD=$this->users_model->getUserById($user['id']);
			 $crumb=$this->uri->segment(2);
			 if($crumb=='admin' || ($this->uri->segment(1)=='op_admin' && $crumb=='')){?>
             	<span style="font-size:15px;font-weight:bold;"><?php echo strtoupper($usrD[0]->full_name);?></span>'s Admin       
             <?php  
                 }}if($crumb=='classes'){?>
				<span style="font-size:15px;font-weight:bold;"><?php echo strtoupper($usrD[0]->full_name);?></span>'s Admin > <a href="<?php echo base_url()?>op_admin/classes">Manage Classes</a>      
			<?php }elseif($crumb=='addClass'){?>
           		<span style="font-size:15px;font-weight:bold;"><?php echo strtoupper($usrD[0]->full_name);?></span>'s Admin > <a href="<?php echo base_url()?>op_admin/classes">Manage Classes</a> > <a href="<?php echo base_url()?>op_admin/addClass">Add Edit Class</a>
                <?php }elseif($crumb=='resources'){?>
           		<span style="font-size:15px;font-weight:bold;"><?php echo strtoupper($usrD[0]->full_name);?></span>'s Admin > <a href="<?php echo base_url()?>op_admin/classes">Manage Classes </a> > Map Class Resources
            <?php }elseif($crumb=='procedures'){?>
                <span style="font-size:15px;font-weight:bold;"><?php echo strtoupper($usrD[0]->full_name);?></span>'s Admin > <a href="<?php echo base_url()?>op_admin/procedures">Manage Procedures </a>     
            <?php }elseif($crumb=='addProcedure'){?>
               	<span style="font-size:15px;font-weight:bold;"><?php echo strtoupper($usrD[0]->full_name);?></span>'s Admin ><a href="<?php echo base_url()?>op_admin/procedures"> Manage Procedures</a> > <a href="<?php echo base_url()?>op_admin/addProcedure">Add Edit Procedure</a>     
            <?php } 
             elseif($crumb=='doctors'){?>
               	<span style="font-size:15px;font-weight:bold;"><?php echo strtoupper($usrD[0]->full_name);?></span>'s Admin > <a href="<?php echo base_url()?>op_admin/doctors">Manage Doctors     
            
             <?php }elseif($crumb=='addDoctor'){?>
               	<span style="font-size:15px;font-weight:bold;"><?php echo strtoupper($usrD[0]->full_name);?></span>'s Admin > <a href="<?php echo base_url()?>op_admin/doctors">Manage Doctors</a> > <a href="<?php echo base_url()?>op_admin/addDoctor">Add Edit Doctor</a> 
                
                <?php }elseif($crumb=='docTime'){?>
               	<span style="font-size:15px;font-weight:bold;"><?php echo strtoupper($usrD[0]->full_name);?></span>'s Admin > <a href="<?php echo base_url()?>op_admin/doctors">Manage Doctors</a> > <a href="<?php echo base_url()?>op_admin/docTime">Time Allotment</a> 
                    
                <?php }elseif($crumb=='treatments'){?>
               	<span style="font-size:15px;font-weight:bold;"><?php echo strtoupper($usrD[0]->full_name);?></span>'s Admin > <a href="<?php echo base_url()?>op_admin/treatments">Manage Treatments</a>      
     			<?php }elseif($crumb=='addTreatment'){?>
               	<span style="font-size:15px;font-weight:bold;"><?php echo strtoupper($usrD[0]->full_name);?></span>'s Admin > <a href="<?php echo base_url()?>op_admin/treatments">Manage Treatments</a> > <a href="<?php echo base_url()?>op_admin/addTreatment">Add Edit Treatment</a>               
                <?php }elseif($crumb=='breaks'){?>
               	<span style="font-size:15px;font-weight:bold;"><?php echo strtoupper($usrD[0]->full_name);?></span>'s Admin ><a href="<?php echo base_url()?>op_admin/breaks"> Manage Time Interval</a>     
                <?php }elseif($crumb=='addBreak'){?>
               	<span style="font-size:15px;font-weight:bold;"><?php echo strtoupper($usrD[0]->full_name);?></span>'s Admin > <a href="<?php echo base_url()?>op_admin/breaks">Manage Time Interval</a> > <a href="<?php echo base_url()?>op_admin/addBreak">Add Edit Time Interval</a>     
                
                
                <?php }elseif($crumb=='scheduleCalendar'){?>
               	<span style="font-size:15px;font-weight:bold;"><?php echo strtoupper($usrD[0]->full_name);?></span>'s Admin > <a href="<?php echo base_url()?>op_admin/scheduleCalendar"></a> > <a href="<?php echo base_url()?>op_admin/scheduleCalendar">Manage Days</a>   
                
                <?php }elseif($crumb=='dayWise'){?>
               	<span style="font-size:15px;font-weight:bold;"><?php echo strtoupper($usrD[0]->full_name);?></span>'s Admin > <a href="<?php echo base_url()?>op_admin/scheduleCalendar">Manage Days</a> > <a href="<?php echo base_url()?>op_admin/dayWise">Manage Hours</a>   
                
                <?php }elseif($crumb=='practiceInputs'){?>
               	<span style="font-size:15px;font-weight:bold;"><?php echo strtoupper($usrD[0]->full_name);?></span>'s Admin > <a href="<?php echo base_url()?>op_admin/practiceInputs">Practice Inputs</a>   
                
                <?php }elseif($crumb=='calculatedClasses'){?>
               	<span style="font-size:15px;font-weight:bold;"><?php echo strtoupper($usrD[0]->full_name);?></span>'s Admin > <a href="<?php echo base_url()?>op_admin/practiceInputs">Practice Inputs</a> > <a href="<?php echo base_url()?>home/calculatedClasses">Class Required</a>   
                
                
                
                
                 <?php }elseif($crumb=='welcome'){?>
               	<span style="font-size:15px;font-weight:bold;">Welcome- <?php echo strtoupper($usrD[0]->full_name);?></span>     
                  <?php }elseif($crumb=='newschedule'){?>
               	<span style="font-size:15px;font-weight:bold;">Welcome- <?php echo strtoupper($usrD[0]->full_name);?></span>     
                  <?php }elseif($crumb=='analysis'){?>
               	<span style="font-size:15px;font-weight:bold;">Welcome- <?php echo strtoupper($usrD[0]->full_name);?></span>    
                <?php }elseif($crumb=='datasets'){?>
               	<span style="font-size:15px;font-weight:bold;">Welcome- <?php echo strtoupper($usrD[0]->full_name);?></span>    
                <?php }elseif($crumb=='savedschedule'){?>
               	<span style="font-size:15px;font-weight:bold;">Welcome- <?php echo strtoupper($usrD[0]->full_name);?></span>     
                
            <?php } ?>
            
            
            
            
             </div>
          <div class="clear"></div>
          </div>
        
    </div>
  </div>
  