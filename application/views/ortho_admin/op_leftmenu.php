<?php 
 $type=$this->uri->segment(2);
 
 if($type=='classes' || $type=='addClass' || $type=='resources' ){ ?>
 <h2>Manage Classes</h2>
            <div >
              <div class="sogrid font16"> <a href="<?php echo base_url().'op_admin/addClass'?>">Add New Class</a>
                <div class="clearboth"></div>
              </div>
              <div class="sogrid font16">
                <div class="sogl"><a href="<?php echo base_url().'op_admin/classes'?>">View Classes</a> </div>
               
                <div class="clearboth"></div>
              </div>
              
            </div>
          
          <?php } elseif($type=='procedures' || $type=='addProcedure' || $type=='uploadCSV' || $type=='proc_details'){?>
		  <h2>Manage Procedures</h2>
            <div >
              <div class="sogrid font16"><a href="<?php echo base_url().'op_admin/addProcedure'?>"> Add New Procedure</a>
                <div class="clearboth"></div>
              </div>
              <div class="sogrid font16">
                <div class="sogl"><a href="<?php echo base_url().'op_admin/procedures'?>">View Procedures</a>
                 </div>
               
                <div class="clearboth"></div>
              </div>
              
            </div>
          
          <?php }elseif($type=='doctors' || $type=='addDoctor' || $type=='docTime'){ ?>
		  <h2>Manage Doctors</h2>
            <div >
              <div class="sogrid font16"> <a href="<?php echo base_url().'op_admin/addDoctor'?>">Add New Doctor</a>
                <div class="clearboth"></div>
              </div>
              
               <div class="sogrid font16">
                <div class="sogl"><a href="<?php echo base_url().'op_admin/docTime'?>">Time Allotment</a> </div>
               
                <div class="clearboth"></div>
              </div>
              
              <div class="sogrid font16">
                <div class="sogl"><a href="<?php echo base_url().'op_admin/doctors'?>">View Doctors</a> </div>
               
                <div class="clearboth"></div>
              </div>
              
            </div>
            
             <?php }elseif($type=='treatments' || $type=='addTreatment'){ ?>
		  <h2>Manage Treatments</h2>
            <div >
              <div class="sogrid font16"> <a href="<?php echo base_url().'op_admin/addTreatment'?>">Add New Treatment type</a>
                <div class="clearboth"></div>
              </div>
              <div class="sogrid font16">
                <div class="sogl" style="width:80%";><a href="<?php echo base_url().'op_admin/treatments'?>">View Treatment Types</a> </div>
               
                <div class="clearboth"></div>
              </div>
              
            </div>
            
             <?php }elseif($type=='breaks' || $type=='addBreak'){ ?>
		  <h2>Manage Time Interval</h2>
            <div >
              <div class="sogrid font16"> <a href="<?php echo base_url().'op_admin/addBreak'?>">Add Time Interval</a>
                <div class="clearboth"></div>
              </div>
              <div class="sogrid font16">
                <div class="sogl"><a href="<?php echo base_url().'op_admin/breaks'?>">View Interval List</a> </div>
               
                <div class="clearboth"></div>
              </div>
              
            </div>
         
          
          
            <?php }elseif($type=='scheduleCalendar' || $type=='dayWise'){ ?>
		  <h2>Manage Days & Hours</h2>
            <div >
              <div class="sogrid font16"> <a href="<?php echo base_url().'op_admin/scheduleCalendar'?>">Manage Days</a>
                <div class="clearboth"></div>
              </div>
              <div class="sogrid font16">
                <div class="sogl"><a href="<?php echo base_url().'op_admin/dayWise'?>">Manage Hours</a> </div>
               
                <div class="clearboth"></div>
              </div>
              
            </div>
            
            
            
            <?php }elseif($type=='practiceInputs' || $type=='calculatedClasses'){ ?>
		  <h2>Manage Practice Inputs</h2>
            <div >
              <div class="sogrid font16"> <a href="<?php echo base_url().'op_admin/practiceInputs'?>">Practice Inputs</a>
                <div class="clearboth"></div>
              </div>
              <div class="sogrid font16">
                <div class="sogl"><a href="<?php echo base_url().'home/calculatedClasses'?>">Class Required  </a> </div>
               
                <div class="clearboth"></div>
              </div>
              
            </div>
            
            
         
          <?php } ?>
          
          
          
          
		   <div class="sogrid gralt">
                <div class="sogl"><a href="<?php echo base_url().'home/admin'?>">Main Menu</a> </div>
               
                <div class="clearboth"></div>
              </div>