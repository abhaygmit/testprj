
<div class="container">
  <div class="row-fluid">
     <div class="selectHow_txtWrap clearfix pTop20 font18"> <?php $this->load->view('breadcrumb');?></div>
    <section>
      <article>
        <div class="inconwrap">
          <div class="soswrap1" >
           <?php include('op_leftmenu.php');?>
       </div>       
        <form action="" method="post" name="addDoctor" id="addDoctor"  >
          <div class="qawrap1" >
             <?php $params=$this->uri->segment(3); ?>
            <h2><?php echo ($params!='')?'Edit':'Add New';?> Doctor</h2>
             
        <div class="hlogin">
              <div class="hlogin_label">Doctor Name <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <input type="text" name="docName" id="docName" value="<?php echo ($result['doctor_name']!='')?$result['doctor_name']:'';?><?php echo ($_POST['docName']!='')?$_POST['docName']:'';?>"  />
              </div>
              <div class="clear"></div>
            </div>
             <div class="hlogin">
              <div class="hlogin_label">Email <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <input type="text" name="email" id="emamil" value="<?php echo ($result['doctor_email']!='')?$result['doctor_email']:'';?><?php echo ($_POST['email']!='')?$_POST['email']:'';?>"  />
              </div>
              <div class="clear"></div>
            </div>
             <div class="hlogin">
              <div class="hlogin_label">Qualification <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <input type="text" name="qualification" id="qualification" value="<?php echo ($result['doctor_qualification']!='')?$result['doctor_qualification']:'';?><?php echo ($_POST['qualification']!='')?$_POST['qualification']:'';?>"  />
              </div>
              <div class="clear"></div>
            </div>
            <div class="hlogin">
              <div class="hlogin_label">Address <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <input type="text" name="address" id="address" value="<?php echo ($result['doctor_address1']!='')?$result['doctor_address1']:'';?><?php echo ($_POST['address']!='')?$_POST['address']:'';?>"  />
              </div>
              <div class="clear"></div>
            </div>
            
            <div class="hlogin">
              <div class="hlogin_label">City <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <input type="text" name="city" id="city" value="<?php echo ($result['doctor_city']!='')?$result['doctor_city']:'';?><?php echo ($_POST['city']!='')?$_POST['city']:'';?>"  />
              </div>
              <div class="clear"></div>
            </div>
            <div class="hlogin">
              <div class="hlogin_label">State <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <input type="text" name="state" id="state" value="<?php echo ($result['doctor_state']!='')?$result['doctor_state']:'';?><?php echo ($_POST['state']!='')?$_POST['state']:'';?>"  />
              </div>
              <div class="clear"></div>
            </div>
            
            <div class="hlogin">
              <div class="hlogin_label">Zipcode <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <input type="text" name="zip" id="zip" value="<?php echo ($result['doctor_zipcode']!='')?$result['doctor_zipcode']:'';?><?php echo ($_POST['zip']!='')?$_POST['zip']:'';?>"  />
              </div>
              <div class="clear"></div>
            </div>
             <div class="hlogin">
              <div class="hlogin_label">Phone <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <input type="text" name="phone" id="phone" value="<?php echo ($result['doctor_phone']!='')?$result['doctor_phone']:'';?><?php echo ($_POST['phone']!='')?$_POST['phone']:'';?>"  />
              </div>
              <div class="clear"></div>
            </div>
             <div class="hlogin">
              <div class="hlogin_label">Emergency Phone</div>
              <div class="hlogin_inputs">
                <input type="text" name="emergency_phone" id="emergency_phone" value="<?php echo ($result['doctor_emergency_phone']!='')?$result['doctor_emergency_phone']:'';?><?php echo ($_POST['emergency_phone']!='')?$_POST['emergency_phone']:'';?>"  />
              </div>
              <div class="clear"></div>
            </div>
            
            <div class="hlogin">
              <div class="hlogin_label">Hour Works <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <select name="hourworks" id="hourworks" style="color:#000" >
                <option value="" >-----Hour works in a day-----</option>
                <?php for($i=1; $i<10; $i++){ ?>
                <option value="<?php echo $i; ?>" <?php echo ($result['working_hours']==$i?'selected':'');?>><?php echo $i;?> Hours</option>
                <?php } ?>
                
                </select>
              </div>
              <div class="clear"></div>
            </div>
            
             <div class="hlogin">
              <div class="hlogin_label">Status <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <select name="status" id="status" style="color:#000" >
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