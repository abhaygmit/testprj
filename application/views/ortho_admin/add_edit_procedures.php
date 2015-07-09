<script>
function showGrid(val, tmBreak, class_id){
	//alert(tmBreak);
 $(document).ready(function(){
 class_id=$('#class_id').val();	 
 $.post("<?php echo base_url()?>op_admin/showGrid/?val="+val+"&tm="+tmBreak+"&cl="+class_id, function(result){
 $("#doctorAssign").html(result);
 });
  });
 }
 
 
 function validate()
 {
	 if($('#procErr')!='')
	 {
		 //dialog("procedure abbreviation is already exist");
		 $('#alerts').modal(); 
	$("#alerts #alertTitle").html('Warning');
	$("#alerts #alertContent").html('procedure abbreviation is already exist.');
		$('#procAbbr').val('');
		$('#procAbbr').focus();
		 return false;	
	 }
	 if($('#procErr')!='')
	 {
		 dialog("procedure name is already exist");
		 $('#procName').val('');
		$('#procName').focus();
		 return false;	
	 }
 }
 
 function getScTime(val)
 {
	
    $.ajax({url:"<?php echo base_url()?>op_admin/getScTime/?tm="+val, success:function(result){
		/// alert(result);
	$("#scTime").html(result);
	}});
 }
 
 
</script>
<div class="container">
  <div class="row-fluid">
   <div class="selectHow_txtWrap clearfix pTop20 font18"> <?php $this->load->view('breadcrumb');?></div>
    <section>
      <article>
        <div class="inconwrap">
          <div class="soswrap1" >
           <?php include('op_leftmenu.php');?>
       </div>       
        <form action="" method="post" name="addProcedure" id="addProcedure"  >
          <div class="qawrap1" >
            <?php $params=$this->uri->segment(3); ?>
            <h2 style="float:left; width:83%;border:none;"><?php echo ($params!='')?'Edit':'Add New';?> Procedure</h2>
            <a href="<?php echo base_url()?>op_admin/uploadCSV">
            <div class="btnactive m5r" style="border:0px">Upload from CSV</div></a> 
            <div class="clear"></div>
           <hr style="border-bottom: 1px dotted #D8D88D;color: #666666; margin:0px">&nbsp;</hr>
             <div class="hlogin">
              <div class="hlogin_label">Class <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <select name="class_id" id="class_id" style="color:#000" >
                <option value="" >-----Select Class-----</option>
                <?php foreach($classList as $res){?>
                
                <option value="<?php echo $res['id'];?>" <?php echo ($result['class_id']==$res['id']?'selected':'');?>><?php echo $res['class_name'] ?></option>
               <?php } ?>
                
                </select>
              </div>
              <div class="clear"></div>
            </div>
            <div class="hlogin">
              <div class="hlogin_label">Procedure Abbr. <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
              <?php if($this->uri->segment(3)!=''){?>
                <input type="text" name="procAbbr" id="procAbbr" value="<?php echo (isset($_POST['procAbbr'])!='')?$_POST['procAbbr']:$result['proc_abbr'];?>"   readonly/>
                <?php } else { ?>
    			<input type="text" name="procAbbr" id="procAbbr" value="<?php echo (isset($_POST['procAbbr'])!='')?$_POST['procAbbr']:$result['proc_abbr'];?>"  />            
                <?php } ?>
               <span id="procErr" style="color:#FF0000"> <?php if(form_error('procAbbr')){ echo form_error('procAbbr'); } ?></span>
              </div>
              <div class="clear"></div>
            </div>
        <div class="hlogin">
              <div class="hlogin_label">Procedure Name <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
           <input type="text" name="procName" id="procName" value="<?php echo (isset($_POST['procName'])!='')?$_POST['procName']:$result['procedure_name']?>" />
                 <span id="procNmErr" style="color:#FF0000"> <?php if(form_error('procName')){ echo form_error('procName'); } ?></span>
              </div>
              <div class="clear"></div>
            </div>
           
            <div class="hlogin">
              <div class="hlogin_label">Procedure Time Interval <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <select name="scheduleT" id="scheduleT" style="color:#000" onChange="getScTime(this.value)">
                <option value="" >-----Select Procedure Time Interval-----</option>
               
                
                <option value="3" <?php echo ($result['proc_time_interval']=='3')?"selected":"";?>>3 Minutes</option>
                <option value="5" <?php echo ($result['proc_time_interval']=='5')?"selected":"";?>>5 Minutes</option>
                 <option value="10" <?php echo ($result['proc_time_interval']=='10')?"selected":"";?>>10 Minutes</option>
                <option value="15" <?php echo ($result['proc_time_interval']=='15')?"selected":"";?>>15 Minutes</option>
                 <option value="20" <?php echo ($result['proc_time_interval']=='20')?"selected":"";?>>20 Minutes</option>
              
                
                </select>
              </div>
              <div class="clear"></div>
            </div>
            
          
            
             <div class="hlogin">
              <div class="hlogin_label">Length(minutes) <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
             <div id="scTime">
            <?php //echo $result['proc_time_interval'];?>
              <select name="procLength" id="procLength" style="color:#000" onChange="showGrid(this.value, <?php echo $result['proc_time_interval'];?>)">
               <option value="">-----Procedure Length-----</option>
               <?php if($result['proc_time_interval']=='15'){ ?>
               <option value="15" <?php echo ($result['procedure_length_in_minutes']=='15')?'selected':'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>15 Minutes</option>
               <option value="30" <?php echo ($result['procedure_length_in_minutes']=='30')?'selected':'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>30 Minutes</option>
               <option value="45" <?php echo ($result['procedure_length_in_minutes']=='45')?'selected':'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>45 Minutes</option>
               <option value="60" <?php echo ($result['procedure_length_in_minutes']=='60')?'selected':'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>60 Minutes</option>
               <option value="75" <?php echo ($result['procedure_length_in_minutes']=='75')?'selected':'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>75 Minutes</option>
               <option value="90" <?php echo ($result['procedure_length_in_minutes']=='90')?'selected':'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>90 Minutes</option>
               <option value="105" <?php echo ($result['procedure_length_in_minutes']=='105')?'selected':'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>105 Minutes</option>
               <option value="120" <?php echo ($result['procedure_length_in_minutes']=='120')?'selected':'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>120 Minutes</option>
               
               
               <?php } elseif($result['proc_time_interval']=='10'){ ?>
               
               <option value="10" <?php echo ($result['procedure_length_in_minutes']=='10')?'selected':'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>10 Minutes</option>
               <option value="20" <?php echo ($result['procedure_length_in_minutes']=='20')?'selected':'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>20 Minutes</option>
              <option value="30" <?php echo ($result['procedure_length_in_minutes']=='30')?'selected':'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>30 Minutes</option>
               <option value="40" <?php echo ($result['procedure_length_in_minutes']=='40')?'selected':'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>40 Minutes</option>
               <option value="50" <?php echo ($result['procedure_length_in_minutes']=='50')?'selected':'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>50 Minutes</option>
               <option value="60" <?php echo ($result['procedure_length_in_minutes']=='60')?'selected':'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>60 Minutes</option>
              
               
               <?php } elseif($result['proc_time_interval']=='20'){ ?>
               
              
               <option value="20" <?php echo ($result['procedure_length_in_minutes']=='20')?'selected':'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>20 Minutes</option>
              <option value="40" <?php echo ($result['procedure_length_in_minutes']=='40')?'selected':'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>40 Minutes</option>
               <option value="60" <?php echo ($result['procedure_length_in_minutes']=='60')?'selected':'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>60 Minutes</option>
                <option value="80" <?php echo ($result['procedure_length_in_minutes']=='80')?'selected':'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>80 Minutes</option>
              <option value="100" <?php echo ($result['procedure_length_in_minutes']=='100')?'selected':'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>100 Minutes</option>
               <option value="120" <?php echo ($result['procedure_length_in_minutes']=='120')?'selected':'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>120 Minutes</option>
               
               
               <?php } elseif($result['proc_time_interval']=='5'){ ?>
               <option value="5" <?php echo ($result['procedure_length_in_minutes']=='5')?"selected":'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>5 Minutes</option>
               <option value="10" <?php echo ($result['procedure_length_in_minutes']=='10')?"selected":'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>10 Minutes</option>
               <option value="15" <?php echo ($result['procedure_length_in_minutes']=='15')?"selected":'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>15 Minutes</option>
               
                <option value="20" <?php echo ($result['procedure_length_in_minutes']=='20')?"selected":'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>30 Minutes</option>
               <option value="25" <?php echo ($result['procedure_length_in_minutes']=='25')?"selected":'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>45 Minutes</option>
               
              <option value="30" <?php echo ($result['procedure_length_in_minutes']=='30')?"selected":'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>30 Minutes</option>
               <option value="45" <?php echo ($result['procedure_length_in_minutes']=='45')?"selected":'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>45 Minutes</option>
               <option value="60" <?php echo ($result['procedure_length_in_minutes']=='60')?"selected":'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>60 Minutes</option>
               
               
               
               <?php } elseif($result['proc_time_interval']=='3') {?>
                <option value="3" <?php echo ($result['procedure_length_in_minutes']=='3')?'selected':'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>3 Minutes</option>
               <option value="6" <?php echo ($result['procedure_length_in_minutes']=='6')?'selected':'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>6 Minutes</option>
               <option value="9" <?php echo ($result['procedure_length_in_minutes']=='9')?'selected':'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>9 Minutes</option>
               <option value="12" <?php echo ($result['procedure_length_in_minutes']=='12')?'selected':'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>12 Minutes</option>
               <option value="15" <?php echo ($result['procedure_length_in_minutes']=='15')?'selected':'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>15 Minutes</option>
               <option value="30" <?php echo ($result['procedure_length_in_minutes']=='30')?'selected':'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>30 Minutes</option>
               <option value="45" <?php echo ($result['procedure_length_in_minutes']=='45')?'selected':'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>45 Minutes</option>
               <option value="60" <?php echo ($result['procedure_length_in_minutes']=='60')?'selected':'';?> <?php echo ($_POST['procLength']!='')?'selected':'';?>>60 Minutes</option>
               
               <?php } ?>
               </select>
               </div>
              </div>
              <div class="clear"></div>
            </div>
            <div id="doctorAssign" >
            
            <?php if($this->uri->segment(3) !='')
			{
				//pr($resource);
				$tm=$result['proc_time_interval'];//$scheduleTime['schedule_time_intvl'];
				$i=1;
				$k='';
				foreach($resource as $res){
				//echo $res['doctor_id'];
				$j=0;
				$g=$j;
				$f=$j+$k;
				$k+=$tm;
				?>
            <div class="hlogin" >
			<div class="hlogin_label">Time Assignment <?php echo $i++;?></div>
			<div class="hlogin_inputs" >
			<div style="width:80px; float:left; padding-top:5px "><?php echo $f.'-'.$k;?> Minutes</div>
            <input type="hidden" name="assignTime[]" value="<?php echo $f.'-'.$k;?>" />
				   <div style="width:140px; float:left"><select name="docno[]" id="docno[]">
				  <!-- <option value="">-Select Resource-</option>-->
				   
				   
				   <option value="a" <?php echo ($res['doctor_id']=='a'?'selected':'');?>>Staff</option>
                   <option value="e" <?php echo ($res['doctor_id']=='e'?'selected':'');?>>Physical Equipment</option>
                   <option value="d" <?php echo ($res['doctor_id']=='d'?'selected':'');?>>Doctor</option>
				  
				   </select>
				   </div>
				   <div style="float:left; width:280px"><input type="text" name="desc[]" id="desc" value="<?php echo ($res['description']!=''?$res['description']:'');?>" /></div>
				   <div style="clear:both"></div>
				   </div>
              <div class="clear"></div>
            </div>
            
			<?php }} ?>
            </div>
            
            
             <div class="hlogin">
              <div class="hlogin_label">Procedure Weight <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <select name="procWeight" id="procWeight" style="color:#000" >
                <option value="" >-----Select Procedure Weight-----</option>
                <option value="10" <?php echo ($result['proc_weight']==10?'selected':'');?>>10 %</option>
                <option value="20" <?php echo ($result['proc_weight']==20?'selected':'');?>>20 %</option>
                <option value="30" <?php echo ($result['proc_weight']==30?'selected':'');?>>30 %</option>
                <option value="40" <?php echo ($result['proc_weight']==40?'selected':'');?>>40 %</option>
                <option value="50" <?php echo ($result['proc_weight']==50?'selected':'');?>>50 %</option>
                <option value="60" <?php echo ($result['proc_weight']==60?'selected':'');?>>60 %</option>
                <option value="70" <?php echo ($result['proc_weight']==70?'selected':'');?>>70 %</option>
                <option value="80" <?php echo ($result['proc_weight']==80?'selected':'');?>>80 %</option>
                <option value="90" <?php echo ($result['proc_weight']==90?'selected':'');?>>90 %</option>
                <option value="100" <?php echo ($result['proc_weight']==100?'selected':'');?>>100 %</option>
                </select>
              </div>
              <div class="clear"></div>
            </div>
            
                
            
             <!--<div class="hlogin">
              <div class="hlogin_label">Color Code</div>
              <div class="hlogin_inputs">
                <input type="text" name="colorCode" id="colorCode" value="<?php echo ($result['color_code']!='')?$result['color_code']:'';?><?php echo ($_POST['colorCode']!='')?$_POST['colorCode']:'';?>"  />
              </div>
              <div class="clear"></div>
            </div>-->
           <!-- <div class="hlogin">
              <div class="hlogin_label">Price</div>
              <div class="hlogin_inputs">
   <input type="text" name="price" id="price" value="<?php echo ($result['price']!='')?number_format($result['price'], 0):'';?><?php echo (isset($_POST['price'])!='')?$_POST['price']:'';?>"  />
              </div>
              <div class="clear"></div>
            </div>-->
            
             <input type="hidden" name="price" id="price" value="0"  />
            
             <div class="hlogin">
              <div class="hlogin_label">Status <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <select name="status" id="status" style="color:#000" >
                
                <option value="1" <?php echo ($result['status']==1?'selected':'');?>>Active</option>
                <option value="0" <?php echo ($result['status']==0?'selected':'');?>>Inactive</option>
                <option value="" <?php echo ($result['status']==''?'selected':'');?> >-----Select status-----</option>
                </select>
              </div>
              <div class="clear"></div>
            </div>
             <div class="hlogin">
           <div > <input type="submit" name="Save" class="btnactive m5r" style="border:0px" value="Save"  ></div>
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