<script>

function openDiv(month, year)
{
	$.ajaxSetup({ cache: false });
	if(month=='' || year==''){
		//dialog('Please select Month and Year.');
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html('Please select Month and Year.');
		return false;
	} 
	$.ajax({url:"<?php echo base_url()?>op_admin/validateDate/?month="+month+"&year="+year, success:function(validate1){
		if($.trim(validate1)=='N'){
			//dialog("Past date is not allowed.");
			$('#alerts').modal(); 
			$("#alerts #alertTitle").html('Warning');
			$("#alerts #alertContent").html('Past date is not allowed.');
			return false;
		}else{
			
			$.ajax({url:"<?php echo base_url()?>op_admin/getInputsData/?month="+month+"&year="+year, success:function(result){
				//alert(result);
				var inputs=result.split('@');
				if(inputs){
					$('#e_tx_len').val(inputs[4]);
					$('#e_conv_rate').val(inputs[5]);
					$('#annual_goal').val(inputs[6]);
					$('#avg_tx_intvl').val(inputs[7]);
					$('#active_P').val(inputs[8]);
					$('#no_chairs').val(inputs[9]);
					$('#no_rooms').val(inputs[10]);
					$('#no_docs').val(inputs[11]);
					$('#avg_tx_fee').val(inputs[12]);
					if(isNaN(inputs[13])){
						$('#completion_per_month').val('');
					}else{
						$('#completion_per_month').val(Math.round(inputs[13]));
					}
					if(isNaN(inputs[14])){
						$('#avg_start_per_month').val('');	
					}else{
						$('#avg_start_per_month').val(Math.round(inputs[14]));
					}
				}
				$('#inputsD').css("display", "block");
			}});
		}
	}});
}

function checkValue()
{
	if($('#e_tx_len').val()==0)
	{
		//dialog('Please enter value greater than 0');
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html('Please enter value greater than 0');
		$('#e_tx_len').val("");
		$('#e_tx_len').focus();
		return false;
	}
	if($('#e_conv_rate').val()==0)
	{
		//dialog('Please enter value greater than 0');
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html('Please enter value greater than 0');
		$('#e_conv_rate').val("");
		$('#e_conv_rate').focus();
		return false;
	}
	if($('#annual_goal').val()==0)
	{
		//dialog('Please enter value greater than 0');
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html('Please enter value greater than 0');
		$('#annual_goal').val("");
		$('#annual_goal').focus();
		return false;
	}
	if($('#avg_tx_intvl').val()==0)
	{
		//dialog('Please enter value greater than 0');
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html('Please enter value greater than 0');
		$('#avg_tx_intvl').val("");
		$('#avg_tx_intvl').focus();
		return false;
	}
	if($('#active_P').val()==0)
	{
		//dialog('Please enter value greater than 0');
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html('Please enter value greater than 0');
		$('#active_P').val("");
		$('#active_P').focus();
		return false;
	}
	if($('#no_chairs').val()==0)
	{
		//dialog('Please enter value greater than 0');
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html('Please enter value greater than 0');
		$('#no_chairs').val("");
		$('#no_chairs').focus();
		return false;
	}
	if($('#no_rooms').val()==0)
	{
		//dialog('Please enter value greater than 0');
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html('Please enter value greater than 0');
		$('#no_rooms').val("");
		$('#no_rooms').focus();
		return false;
	}
	if($('#no_docs').val()==0)
	{
		//dialog('Please enter value greater than 0');
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html('Please enter value greater than 0');
		$('#no_docs').val("");
		$('#no_docs').focus();
		return false;
	}
	if($('#no_docs').val() > 10)
	{
		//dialog('No of doctors is not greater than 10');
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html('Please enter value greater than 0');
		$('#no_docs').val("");
		$('#no_docs').focus();
		return false;
	}
	if($('#avg_tx_fee').val()==0)
	{
		//dialog('Please enter value greater than 0');
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html('Please enter value greater than 0');
		$('#avg_tx_fee').val("");
		$('#avg_tx_fee').focus();
		return false;
	}
	
	return true;
}

function getDocPercentage(month, year){
	if(month=='' || year==''){
		//alert('Please select Month and Year.');
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html('Please select Month and Year.');
		return false;
	} 
	$.ajax({url:"<?php echo base_url()?>op_admin/getDoctimeInPer/?month="+month+"&year="+year, success:function(result){
		//alert(result);
		$('#TextBoxDiv1').html(result);
	}});
}
  
function genDocGrid(counter){
  	if(counter == ''){
		return false;
	}
	else if(counter > 10){
		//dialog('No of doctors will not be greater than 10');
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html('No of doctors will not be greater than 10');
		$('#no_docs').val("");
		$('#no_docs').focus();
		return false;
	}
	$.ajax({url:"<?php echo base_url()?>op_admin/getInputs/?counter="+counter, success:function(result){
		$('#TextBoxDiv1').html(result);
	}});
  }

function calcSum(){			
	var summ = 0;
	var counter = $('#no_docs').val();
	
	for(i=1;i<=counter;i++){
		var num = parseInt($.trim($('#doctor_'+i).val()))
		if(num){
			summ += num;
		}
		if($.trim($('#doctor_'+i).val())=="")
		{
			//dialog('Doctor time can not be blank.');
			$('#alerts').modal(); 
			$("#alerts #alertTitle").html('Warning');
			$("#alerts #alertContent").html('Doctor time can not be blank.');
			return false;
		}
	}
	if(summ > 100 || summ < 100){
		//dialog("Sum of doctor should not be more or less than 100%.");
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html('Sum of doctor should not be more or less than 100%.');
		return false;
	}
	
}
  
  
  function calc_completion_per_month(){
	var active_P=$('#active_P').val();
	var tx_len=$('#e_tx_len').val(); 
	var annual_goal=$('#annual_goal').val();
	
	completion=(parseInt(active_P)/parseInt(tx_len));
	avg_start_per_month=Math.round(parseInt(active_P)*((parseInt(annual_goal)/100)/12)+completion);
	
	if(isNaN(completion)){
		$('#completion_per_month').val('');
	}else{
	$('#completion_per_month').val(Math.round(completion));}
	if(isNaN(avg_start_per_month)){
		$('#avg_start_per_month').val('');
	}else{
	$('#avg_start_per_month').val(Math.round(avg_start_per_month));
	}
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
        <form action="" method="post" name="manage_inputs" id="manage_inputs" onSubmit="return calcSum()">
          <div class="qawrap1" >
             <?php $params=$this->uri->segment(3); ?>
            <h2>Manage Practice Inputs</h2>
            
            
             <div class="hlogin">
           		<div style="width:23%; float:left; margin-top:13px;font-size:14px;">Select Month & Year:</div>
              	<div class="hlogin_inputs" style="padding:5px; float:left; width:20%">
              		<select name="month" id="month">
              			<option value="">--Select month--</option>
              			<?php foreach($month_arr as $key):?>
              				<option value="<?php echo $key->numeric_value;?>"><?php echo $key->value;?></option>
              			<?php endforeach;?>	
              
              		</select> 
              	</div>
              <div class="hlogin_inputs" style="padding:5px;float:left;width:20%">
              	<select name="year" id="year">
              		<option value="">--Select year--</option>
              		<?php $d=date('Y');  $dt=$d+9;
              		 for($d;$d<=$dt;$d++){?>
              			<option value="<?php echo $d;?>"><?php echo $d;?> </option>
              		<?php } ?>
              	</select> 
              </div>
              
              <div class="hlogin_inputs" style="padding:5px; float:left;width:18%; margin-top:5px">
              	<input type="button" name="generate" id="generate" value="Generate" class="btnactive m5r" onClick="openDiv($('#month').val(), $('#year').val()), getDocPercentage($('#month').val(), $('#year').val())"  /> 
              </div>
              <div class="clear"></div>
            </div>
            <div id="inputsD" style="display:none">
            
            <div class="hlogin">
              <div class="hlogin_label">Estimated Treatment Length (Months) <span class="rederrorstar">*</span></div>
              <div class="hlogin_inputs">
              		<input type="text" name="e_tx_len" id="e_tx_len" onBlur="calc_completion_per_month()"/>
              </div>
              <div class="clear"></div>
            </div>
         	
            <div class="hlogin">
              <div class="hlogin_label">Estimated Conversion Rate (%) <span class="rederrorstar">*</span></div>
              <div class="hlogin_inputs">
              		<input type="text" name="e_conv_rate" id="e_conv_rate" />
              </div>
              <div class="clear"></div>
            </div>
          
            <div class="hlogin">
              <div class="hlogin_label">Annual Growth/Decline Goal  (%) <span class="rederrorstar">*</span></div>
              <div class="hlogin_inputs">
              		<input type="text" name="annual_goal" id="annual_goal" />
              </div>
              <div class="clear"></div>
            </div>  
            <div class="hlogin">
              <div class="hlogin_label">Average Treatment Interval  (weeks) <span class="rederrorstar">*</span></div>
              <div class="hlogin_inputs">
              	<input type="text" name="avg_tx_intvl" id="avg_tx_intvl" value="<?php //echo ($result['average_treatment_interval']!='')?$result['average_treatment_interval']:'';?><?php //echo ($_POST['avg_tx_intvl']!='')?$_POST['avg_tx_intvl']:'';?>"/>
              </div>
              <div class="clear"></div>
            </div>
            <div class="hlogin">
              <div class="hlogin_label">Active Patients <span class="rederrorstar">*</span></div>
              <div class="hlogin_inputs">
              		<input type="text" name="active_P" id="active_P" onBlur="calc_completion_per_month()" />
              </div>
              <div class="clear"></div>
            </div>
            <div class="hlogin">
              <div class="hlogin_label"># of Clinical Chairs <span class="rederrorstar">*</span></div>
              <div class="hlogin_inputs">
              		<input type="text" name="no_chairs" id="no_chairs" />
              </div>
              <div class="clear"></div>
            </div>
            <div class="hlogin">
              <div class="hlogin_label"># of EXAM rooms <span class="rederrorstar">*</span></div>
              <div class="hlogin_inputs">
              		<input type="text" name="no_rooms" id="no_rooms" />
              </div>
              <div class="clear"></div>
            </div>
            <div class="hlogin">
              <div class="hlogin_label"># of Doctors <span class="rederrorstar">*</span></div>
              <div class="hlogin_inputs">
              		<input type="text" name="no_docs" id="no_docs" onBlur="genDocGrid(this.value)" />
              </div>
              <div class="clear"></div>
            </div>
            
            <div class="hlogin">
              <div class="hlogin_label"></div>
              <div class="hlogin_inputs">
              		
                    
                   
   						 <div id="TextBoxDiv1">
                         
      						 
  						  </div>
					
                    
                    
                    
              </div>
              <div class="clear"></div>
            </div>
            
            		
            <div class="hlogin">
              <div class="hlogin_label">Average TX Fee  ($)<span class="rederrorstar">*</span></div>
              <div class="hlogin_inputs">
              		<input type="text" name="avg_tx_fee" id="avg_tx_fee" />
              </div>
              <div class="clear"></div>
            </div>
            		
            <div class="hlogin">
              <div class="hlogin_label">Calculated Completions Per Month <span class="rederrorstar">*</span></div>
              <div class="hlogin_inputs">
              		<input type="text" name="completion_per_month" id="completion_per_month" readonly />
              </div>
              <div class="clear"></div>
            </div>		
            		
            <div class="hlogin">
              <div class="hlogin_label">Calculated Average Starts per Month <span class="rederrorstar">*</span></div>
              <div class="hlogin_inputs">
              		<input type="text" name="avg_start_per_month" id="avg_start_per_month" readonly />
              </div>
              <div class="clear"></div>
            </div>
     
     <div id="saveBtn" style="display:block">
       		<div class="hlogin">
           <div > <input type="submit" name="Save" class="btnactive m5r" style="border:0px" value="Save" onclick="return checkValue()" /></div>
           <div> <input type="button" name="cancel" class="btninactive" value="Cancel" onclick="javascript: return history.go(-1)" ></div>
           			
            
            </div>
            
            </div>
            
            <div class="clear"></div>
          </div>
            
            </div>
           
          </form> 
          <div class="clear"></div>
        </div>
      </article>
    </section>
  </div>
</div>
