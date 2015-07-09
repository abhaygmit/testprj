
<?php //$this->load->view('head_banner');?>

<div class="clear"></div>
<form name="contactus" id="contactus" method="post" action="<?php echo site_url('home/contact_us');?>">
  <section id="wrapper">
  <div class="logContainer">
  
    <?php 
			$eror=validation_errors();
 			if($eror!='')
				{?>
				
				<table cellspacing="0" cellpadding="0" align="center" >
				<tr>
				<td style="border:1px solid #ff0000;background:#FFECEC; color:#ff0000; font-size:11px"><?php echo validation_errors(); ?></td>
				</tr>
				</table>
			<?php }?>
   		 <?php 
			$cls='"border:1px solid #F0FC71;margin:15px auto 0px; width:350px; padding:10px; background:#E9EEB2;"';
			if($this->session->userdata('msg')!="")
			{
				$message=$this->session->userdata('msg');
				$cls='"border:1px solid #F0FC71;margin:15px auto 0px; width:350px; padding:10px; background:#E9EEB2;"';
			}
			?>
		<div style="text-align:center; width:100%;"><?php if(isset($message)){?><div  style=<?=$cls?>><strong><?php echo $message ;?></strong></div><?php }?></div>
  <div class="home2_whtbg_colL">
    <div class="home2_whtbg_colL_mid">
      <div class="home_grybox_wrap">
        
       
        <div class="innerWarp" style="width:930px;">
          <div style="float:left; width:450px;">
            <h2 class="login_register_head">Contact Us</h2>
            
			
			<div class="logoingwrap">
              <div class="loginin_text loginText">Email<span class="redTxt">*</span> :</div>
              <div class="logininh" >
                <input type="text" value="<?php echo ($post_back['email'] =='') ? $records[0]['email']: $post_back['email']?>" maxlength="200" size="35" id="email" name="email">
              </div>
            </div>
            <div class="logoingwrap">
              <div class="loginin_text loginText">Name<span class="redTxt">*</span> :</div>
              <div class="logininh" >
                <input type="text" maxlength="13" size="35" id="cname" name="cname" value="<?php echo ($this->validation->password !='')? $this->validation->password : $records[0]['password']; ?>" />
              </div>
            </div>
			
			
			<div class="logoingwrap">
              <div class="loginin_text loginText">Subject<span class="redTxt">*</span> :</div>
              <div class="logininh" >
                <input type="text" value="<?php echo ($post_back['email'] =='') ? $records[0]['email']: $post_back['email']?>" maxlength="200" size="35" id="subject" name="subject">
              </div>
            </div>
            <div class="logoingwrap">
              <div class="loginin_text loginText">Message<span class="redTxt">*</span> :</div>
              <div class="logininh" >
                <textarea name="queryMsg" id="queryMsg" rows="" cols="27"></textarea>
              </div>
            </div>
			
            <div class="logoingwrap">
              <div class="loginin_text">&nbsp;</div>
              <div class="logininh" >
                <div class="inbtns" >
                  <div >
                    <div class="grnbtn_bg left">
                      <input name="submit" type="submit" value=" Send " class="inputBtn">
                    </div>
                    <div >

                      <input name="return_url" id="return_url" type="hidden" value="<?php echo $return_url;?>"/>
                    </div>
                   
                    
					<div class="clear"></div>
                    </div>
                  <input name="id" type="hidden" id="id" value="<?php echo ($post_back['id'] =='') ? $records[0]['id']: $post_back['id']?>">
                </div>
              </div>
              <div class="clear"></div>
            </div>
          </div>  
	  
		  
		   <div class="left" style="width:450px; float:right; padding-top:50px" >
                      <div class="login_or_img"></div>
                      <div style="float:left;padding-left:50px;"> 
					  <div class="clear pTop10"> <strong>	Customer Support Via Phone</strong>				 </div>
					 
					 <div class="clear pTop10" style="padding-top:2px"> 855-MYDUUDLE (855-693-8835) </div>
					  <div class="clear pTop10" style="padding-top:2px"> Please call this number any query you have. </div>
					 					 </div>
                    </div>
         
          <div class="clear"></div>
        </div>
      </div>
    </div>
  </div>
  </section>
</form>
<div class="clear"></div>
