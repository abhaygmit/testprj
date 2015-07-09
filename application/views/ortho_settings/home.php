<div class="container">
    <div class="row-fluid">
      <?php if($this->session->userdata('msg')){ ?>   
      <span class="rederror" id="main_error"><?php echo $this->session->userdata('msg'); ?></span>
      <?php } ?>
     <!-- <div class="selectHow_txtWrap clearfix pTop20 font18"> Admin</div>-->
       <div class="selectHow_txtWrap clearfix pTop20 font18"> <?php $this->load->view('breadcrumb');?></div>
     
      <div class="hloginwrap" style="width:97%">
        
        
        <div class="hlogin left opAdminHm">
          <div class="opAdminMn" title="Manage Profile" alt="Manage Profile" ><a href="<?php echo base_url();?>op_setting/profile"><img src="<?php echo base_url()?>images/profile.jpg" border="0" />Manage Profile</a></div>
        
          <div class="clear"></div>
        </div>
        
        <div class="hlogin left opAdminHm" >
          <div class="opAdminMn" style="padding-top:9px" title="Change Password" alt="Change Password"><a href="<?php echo base_url().'op_setting/changePass';?>"><img src="<?php echo base_url()?>images/changepass.jpg" border="0" />Change Password</a></div>
         
          <div class="clear"></div>
        </div>
        
        
        
         <div class="hlogin left opAdminHm">
          <div class="opAdminMn" title="Other Practice Settings" alt="Other Practice Settings"><a href="<?php echo base_url(); ?>op_setting/addScheduleTime"><img src="<?php echo base_url()?>images/manageScheduleTime.jpg" border="0" />Other Practice Settings</a></div>
         
          <div class="clear"></div>
        
         
        
        
     
      </div>
     
    </div>
  </div>