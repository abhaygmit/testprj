<div class="container">
    <div class="row-fluid">
      <?php if($this->session->userdata('msg')){ ?>   
      <span class="rederror" id="main_error"><?php echo $this->session->userdata('msg'); ?></span>
      <?php } ?>
     <!-- <div class="selectHow_txtWrap clearfix pTop20 font18"> Admin</div>-->
       <div class="selectHow_txtWrap clearfix pTop20 font18"> <?php $this->load->view('breadcrumb');?></div>
     
      <div class="hloginwrap" style="width:97%">
        
        
        <div class="hlogin left opAdminHm">
          <div class="opAdminMn" title="Manage Classes" alt="Manage Classes" ><a href="<?php echo base_url().'op_admin/classes';?>"><img src="<?php echo base_url()?>images/txclass.jpg" border="0" />Manage Classes</a></div>
        
          <div class="clear"></div>
        </div>
        
        <div class="hlogin left opAdminHm">
          <div class="opAdminMn" title="Manage Procedures" alt="Manage Procedures" style="margin-top:-6px"><a href="<?php echo base_url().'op_admin/procedures';?>">
          <span style="margin-top:20px">
          <img src="<?php echo base_url()?>images/procedure.jpg" border="0" /></span>
          <span style="margin-top:20px">Manage Procedures</span></a></div>
         
          <div class="clear"></div>
        </div>
        
       
        
        
         <!--<div class="hlogin left opAdminHm">
          <div class="opAdminMn" title="Manage Treatment Type" alt="Manage Treatment Type"><a href="<?php echo base_url().'op_admin/treatments'?>">
           <div style="float:left"><img src="<?php echo base_url()?>images/treatments.jpg" border="0" /></div><div style="float:left; padding:42px 0px 5px 9px">Manage Treatment Type</div></a></div>
         
          <div class="clear"></div>
        </div>-->
       
        <!-- <div class="hlogin left opAdminHm">
          <div class="opAdminMn" title="Manage Breaks" alt="Manage Breaks"><a href="<?php echo base_url().'op_admin/breaks'?>">
          <div style="float:left"><img src="<?php echo base_url()?>images/breaks.jpg" border="0" /></div><div style="float:left; padding:38px 0px 5px 9px">Manage Breaks</div></a></div>
         
          <div class="clear"></div>
        </div>
        <div class="clear"></div>-->
       <!-- <div class="hlogin left opAdminHm">
          <div class="opAdminMn" title="Manage Doctors" alt="Manage Doctors"><a href="<?php echo base_url().'op_admin/doctors'?>"><img src="<?php echo base_url()?>images/doctor.jpg" border="0" />Manage Doctors</a></div>
         
          <div class="clear"></div>
        </div>-->
        
        
        <div class="hlogin left opAdminHm">
          <div class="opAdminMn" title="Manage Working Days & Hours" alt="Manage Working Days & Hours"><a href="<?php echo base_url().'op_admin/scheduleCalendar'?>"><img src="<?php echo base_url()?>images/Days_N_Hours.png" border="0" style="width:101px; height:95px" />Manage Working Days & Hours</a></div>
         
          <div class="clear"></div>
        </div>
         <div class="clear"></div>
        
      <div class="hlogin left opAdminHm">
          <div class="opAdminMn" title="Manage Practice Inputs" alt="Manage Practice Inputs"><a href="<?php echo base_url().'op_admin/practiceInputs'?>"><img src="<?php echo base_url()?>images/pratice_management.jpg" border="0" style="width:101px; height:95px" />
          <span style="margin-left:5px">Manage Practice Inputs</span></a></div>
         
          <div class="clear"></div>
        </div>  
     
      </div>
     
    </div>
  </div>