
<div class="container">
  <div class="row-fluid">
   <div class="selectHow_txtWrap clearfix pTop20 font18"> <?php $this->load->view('breadcrumb');?></div>
    <section>
      <article>
        <div class="inconwrap">
          <div class="soswrap1" >
           <?php include('op_leftmenu.php');?>
       </div>       
        <form action="" method="post" name="addTreatment" id="addTreatment"  >
          <div class="qawrap1" >
             <?php $params=$this->uri->segment(3); ?>
            <h2><?php echo ($params!='')?'Edit':'Add New';?> Treatment</h2>
             <div class="hlogin">
              <div class="hlogin_label">Procedure <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <select name="proc_id" id="proc_id" style="color:#000" >
                <option value="" >-----Select Procedure-----</option>
                <?php foreach($procList as $res){?>
                
                <option value="<?php echo $res[id];?>" <?php echo ($result[procedure_id]==$res['id']?'selected':'');?>><?php echo $res['procedure_name'] ?></option>
               <?php } ?>
                
                </select>
              </div>
              <div class="clear"></div>
            </div>
            <!--<div class="hlogin">
              <div class="hlogin_label">Treatment Abbr.</div>
              <div class="hlogin_inputs">
                <input type="text" name="treatAbbr" id="treatAbbr" value="<?php echo ($result['treatment_name']!='')?$result['treatment_name']:'';?><?php echo ($_POST['procAbbr']!='')?$_POST['procAbbr']:'';?>"  />
              </div>
              <div class="clear"></div>
            </div>-->
        <div class="hlogin">
              <div class="hlogin_label">Treatment Name <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <input type="text" name="treatName" id="treatName" value="<?php echo ($result['treatment_name']!='')?$result['treatment_name']:'';?><?php echo ($_POST['treatName']!='')?$_POST['treatName']:'';?>"  />
                <?php if(form_error('treatName')){echo form_error('treatName');} ?>
              </div>
              <div class="clear"></div>
            </div>
            
              <div class="hlogin">
              <div class="hlogin_label">Length(minutes) <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
      <select name="treatTime" id="treatTime" style="color:#000">
      <option value="">-----Procedure Length-----</option>
      <option value="15" <?php echo ($result['tx_avg_time']==15)?'selected':'';?> <?php echo ($_POST['treatTime']!='')?'selected':'';?>>15 Minutes</option>
      <option value="30" <?php echo ($result['tx_avg_time']==30)?'selected':'';?> <?php echo ($_POST['treatTime']!='')?'selected':'';?>>30 Minutes</option>
      <option value="45" <?php echo ($result['tx_avg_time']==45)?'selected':'';?> <?php echo ($_POST['treatTime']!='')?'selected':'';?>>45 Minutes</option>
      <option value="60" <?php echo ($result['tx_avg_time']==60)?'selected':'';?> <?php echo ($_POST['treatTime']!='')?'selected':'';?>>60 Minutes</option>
      <option value="75" <?php echo ($result['tx_avg_time']==75)?'selected':'';?> <?php echo ($_POST['treatTime']!='')?'selected':'';?>>75 Minutes</option>
      <option value="90" <?php echo ($result['tx_avg_time']==90)?'selected':'';?> <?php echo ($_POST['treatTime']!='')?'selected':'';?>>90 Minutes</option>
      <option value="105" <?php echo ($result['tx_avg_time']==105)?'selected':'';?> <?php echo ($_POST['treatTime']!='')?'selected':'';?>>105 Minutes</option>
      <option value="120" <?php echo ($result['tx_avg_time']==120)?'selected':'';?> <?php echo ($_POST['treatTime']!='')?'selected':'';?>>120 Minutes</option>
      </select>
              </div>
              <div class="clear"></div>
            </div>
            
             
            <div class="hlogin">
              <div class="hlogin_label">Price <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <input type="text" name="price" id="price" value="<?php echo ($result['price']!='')?number_format($result['price'], 0):'';?><?php echo ($_POST['price']!='')?$_POST['price']:'';?>"  />
              </div>
              <div class="clear"></div>
            </div>
            
             <div class="hlogin">
              <div class="hlogin_label">Status <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <select name="status" id="status"  style="color:#000">
                <option value="" >-----Select status-----</option>
                <option value="1" <?php echo ($result[status]==1?'selected':'');?>>Active</option>
                <option value="0" <?php echo ($result[status]==0?'selected':'');?>>Inactive</option>
                
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