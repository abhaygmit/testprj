<script type="text/javascript" src="<?php echo base_url()?>jscolor/jscolor.js"></script>
<div class="container">
  <div class="row-fluid">
   <div class="selectHow_txtWrap clearfix pTop20 font18"> <?php $this->load->view('breadcrumb');?></div>
    <section>
      <article>
        <div class="inconwrap">
          <div class="soswrap1" >
           <?php include('op_leftmenu.php');?>
       </div>       
        <form action="" method="post" name="addBreak" id="addBreak"  >
          <div class="qawrap1" >
             <?php $params=$this->uri->segment(3); ?>
            <h2><?php echo ($params!='')?'Edit':'Add New';?> Time Interval</h2>
            <!-- <div class="hlogin">
              <div class="hlogin_label">Interval Type</div>
              <div class="hlogin_inputs">
                <select name="class_id" id="class_id" >
                <option value="" >-Select Class-</option>
                <?php foreach($classList as $res){?>
                
                <option value="<?php echo $res[id];?>" <?php echo ($result[class_id]==$res['id']?'selected':'');?>><?php echo $res['class_name'] ?></option>
               <?php } ?>
                
                </select>
              </div>
              <div class="clear"></div>
            </div>-->
            <?php echo $result['break_type']; ?>
            <div class="hlogin">
              <div class="hlogin_label">Interval Type <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <!--<input type="text" name="breakType" id="breakType" value="<?php echo ($result['break_type']!='')?$result['break_type']:'';?><?php echo ($_POST['breakType']!='')?$_POST['breakType']:'';?>"  />-->
                <select id="breakType" name="breakType" style="color:#000">
     <option value="">-----break Type-----</option>
     <option value="LUNCH" <?php echo ($result['break_type']=='LUNCH')?'selected':"";?> <?php echo ($_POST['breakType']=='LUNCH')?'selected':'';?> >LUNCH</option>
     <option value="MEETING" <?php echo ($result['break_type']=="MEETING")?'selected':'';?> <?php echo ($_POST['breakType']=='MEETING')?'selected':'';?>>MEETING</option>
     <option value="TEA" <?php echo ($result['break_type']=="TEA")?'selected':'';?> <?php echo ($_POST['breakType']=='TEA')?'selected':'';?>>TEA</option>
     
               
               </select>
                
                 <?php if(form_error('breakType')){echo form_error('breakType');} ?>
              </div>
              <div class="clear"></div>
            </div>
            
            <div class="hlogin">
              <div class="hlogin_label">Description</div>
              <div class="hlogin_inputs">
                <input type="text" name="description" id="description" value="<?php echo ($_POST['description']!='')?$_POST['description']:$result['description'];?>"  />
              </div>
              <div class="clear"></div>
            </div>
            
        <div class="hlogin">
              <div class="hlogin_label">Time Interval <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
              <!--  <input type="text" name="tmInterval" id="tmInterval" value="<?php echo ($result['time_interval']!='')?$result['time_interval']:'';?><?php echo ($_POST['tmInterval']!='')?$_POST['tmInterval']:'';?>"  />-->
    <select name="tmInterval" id="tmInterval" style="color:#000">
    <option value="">-----Time Interval-----</option>
    <option value="15" <?php echo ($result['time_interval'])=='15'?"selected":'';?> <?php echo ($_POST['tmInterval']!='15')?"selected":'';?>>15 Minutes</option>
    <option value="30" <?php echo ($result['time_interval'])=='30'?"selected":'';?> <?php echo ($_POST['tmInterval']!='30')?"selected":'';?>>30 Minutes</option>
    <option value="45" <?php echo ($result['time_interval'])=='45'?"selected":'';?> <?php echo ($_POST['tmInterval']!='45')?"selected":'';?>>45 Minutes</option>
    <option value="60" <?php echo ($result['time_interval'])=='60'?"selected":'';?> <?php echo ($_POST['tmInterval']!='60')?"selected":'';?>>60 Minutes</option>
    <option value="75" <?php echo ($result['time_interval'])=='75'?"selected":'';?> <?php echo ($_POST['tmInterval']!='75')?"selected":'';?>>75 Minutes</option>
    <option value="90" <?php echo ($result['time_interval'])=='90'?"selected":'';?> <?php echo ($_POST['tmInterval']!='90')?"selected":'';?>>90 Minutes</option>
    <option value="105" <?php echo ($result['time_interval']=='105')?"selected":'';?><?php echo ($_POST['tmInterval']!='105')?"selected":'';?>>105 Minutes</option>    
    <option value="120" <?php echo ($result['time_interval']=='120')?"selected":'';?> <?php echo ($_POST['tmInterval']!='120')?"selected":'';?>>120 Minutes</option>
    </select>
              </div>
              <div class="clear"></div>
            </div>
             <div class="hlogin">
              <div class="hlogin_label">Allowed No.<span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
     <select id="noOfBreaks" name="noOfBreaks" style="color:#000">
     <option value="">-----Allowed # of break-----</option>
     <option value="1" <?php echo ($result['no_of_breaks_allowed']=='1')?"selected":'';?> <?php echo ($_POST['noOfBreaks']=='1')?'selected':'';?>>1</option>
     <option value="2" <?php echo ($result['no_of_breaks_allowed']=='2')?"selected":'';?> <?php echo ($_POST['noOfBreaks']=='2')?'selected':'';?>>2</option>
     <option value="3" <?php echo ($result['no_of_breaks_allowed']=='3')?"selected":'';?> <?php echo ($_POST['noOfBreaks']=='3')?'selected':'';?>>3</option>
     <option value="4" <?php echo ($result['no_of_breaks_allowed']=='4')?'selected':'';?> <?php echo ($_POST['noOfBreaks']=='4')?'selected':'';?>>4</option>
               
               </select>
              </div>
              <div class="clear"></div>
            </div>
            
             <div class="hlogin">
              <div class="hlogin_label">Time Attribute <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs" >
                <select name="timeAttribute" id="timeAttribute" style="color:#000">
                <option value="" >-----Time Attribute-----</option>
                <option value="S" <?php echo ($result['SME_option']=='S'?"selected":'');?> <?php echo ($_POST['timeAttribute']=='S')?'selected':'';?>>Start</option>
                <option value="M" <?php echo ($result['SME_option']=='M'?"selected":'');?> <?php echo ($_POST['timeAttribute']=='M')?'selected':'';?>>Mid</option>
                <option value="E" <?php echo ($result['SME_option']=='E'?"selected":'');?> <?php echo ($_POST['timeAttribute']=='E')?'selected':'';?>>End</option>
                
                </select>
                 <span style="color:#FF0000"> <?php if(form_error('timeAttribute')){echo form_error('timeAttribute');} ?></span>
              </div>
              <div class="clear"></div>
            </div>
            
            <div class="hlogin">
              <div class="hlogin_label">Time to Apply <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
             
    <select name="applyTime" id="applyTime" style="color:#000">
    <option value="">-----Time to Apply-----</option>
    <?php $i='7';
		for($i;$i<=23; $i++){
	?>
    <option value="<?php echo $i;?>" <?php echo ($result['break_time']==$i)?"selected":'';?> <?php echo ($_POST['applyTime']!='')?'selected':'';?>><?php echo ($i<12)?$i.':00 AM':(($i==12)?$i.':00 PM':($i-12). ':00 PM');?></option>
    <?php } ?>
    
    </select>
    <span style="color:#FF0000"> <?php if(form_error('applyTime')){echo form_error('applyTime');} ?></span>
              </div>
              <div class="clear"></div>
            </div>
            
            
            
             <div class="hlogin">
              <div class="hlogin_label">Color Code <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <input type="text" name="colorCode" class="color" id="colorCode" value="<?php echo (isset($_POST['color_code'])!='')?$_POST['color_code']:$result['color_code']?>"  />
              </div>
              <div class="clear"></div>
            </div>
            
             <div class="hlogin">
              <div class="hlogin_label">Status <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <select name="status" id="status" style="color:#000">
                <option value="" >-----Select status-----</option>
                <option value="1" <?php echo ($result['status']==1?'selected':'');?> <?php echo ($_POST['status']!=''?'selected':'');?>>Active</option>
                <option value="0" <?php echo ($result['status']==0?'selected':'');?> <?php echo ($_POST['status']!=''?'selected':'');?>>Inactive</option>
                
                </select>
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