<style>
    .rederror
    {
        color:red;font-size:10px;
    }
</style>
<div class="container">
      <section class="register">
      <?php
		
            if($this->session->userdata('msg') != '')
            {

                 echo '<span class="rederror">'.$this->session->userdata('msg')."</span><br><br>";
            }

        ?>    
      <h1>Login</h1>
      <br>
      <center>
          <span class="rederror"><?php echo $this->session->flashdata('loginerror'); ?></span>
      </center>
      <form method="post" action="">
      <div class="reg_section personal_info">
      <h3>Your Login Details</h3>
      <input type="text" name="username" value="<?php echo set_value('username'); ?>" placeholder="Email / Practice ID">
      <span class="rederror"><?php echo form_error('username'); ?></span>
      <input type="password" name="password" value="" placeholder="Password">
      <span class="rederror"><?php echo form_error('password'); ?></span>
      </div>
      <p class="submit"><input type="submit" name="commit" value="Sign In"></p>
      <p><a href="<?php echo base_url(); ?>">Register Now</a></p>
      </form>
    </section>
  </div>