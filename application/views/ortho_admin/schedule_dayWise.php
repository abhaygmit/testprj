<script>


function generateCal(month, year){
	$.ajaxSetup({ cache: false });
	if(month=='' || year==''){
	$('#alerts').modal(); 
	$("#alerts #alertTitle").html('Warning');
	$("#alerts #alertContent").html('Please select Month and Year.');
		return false;
	}
	
	$.ajax({url:"<?php echo base_url()?>op_admin/enabledisablecontrol/?month="+month+"&year="+year, success:function(result){
		
	if($.trim(result)=='Disable'){
	//alert("Monthly option is disabled for this month.");
	//dialog("Monthly option is disabled for this month.");
	$('#alerts').modal(); 
	$("#alerts #alertTitle").html('Warning');
	$("#alerts #alertContent").html('Monthly option is disabled for this month');
	$('#monthly_days').css('display', 'none');
	$('#monthlySave').css('display', 'none');
	return false;
	}else{
	
	
	$.ajax({url:"<?php echo base_url()?>op_admin/validateDate/?month="+month+"&year="+year, success:function(validate){
	if($.trim(validate)=='N'){
	//dialog("Back date is not allowed.");
	$('#alerts').modal(); 
	$("#alerts #alertTitle").html('Warning');
	$("#alerts #alertContent").html('Back date is not allowed');
	return false;
	}
	
	user_id = $('#user_id').val();
	mName=$("#month1 option:selected").text();
	//alert(mName);
	$.ajax({url:"<?php echo base_url()?>op_admin/generateMonthly/?month="+month+"&year="+year+"&user_id="+user_id, success:function(result){		
	if($.trim(result)==''){
		//dialog("Please first fill working days from 'Manage Days' section for month ("+mName+") and Year ("+year+")");
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html("Please first fill working days from 'Manage Days' section for month ("+mName+") and Year ("+year+")");
		$('#week').css("display", "none");
		var redirected="<?php echo base_url()?>op_admin/scheduleCalendar";
		//window.location=redirected;
		
	}
	else{
	
	var mon=result.split('~').length-1;
	var tue=result.split('_').length-1;
	var wed=result.split('-').length-1;
	var thu=result.split('!').length-1;
	var fri=result.split('^').length-1;
	var sat=result.split(',').length-1;
	var sun=result.split('|').length-1;
	
	$('#mon_day').val(mon);
	$('#mon_d').text(mon);
	$('#tue_day').val(tue);
	$('#tue_d').text(tue);
	$('#wed_day').val(wed);
	$('#wed_d').text(wed);
	$('#thu_day').val(thu);
	$('#thu_d').text(thu);
	$('#fri_day').val(fri);
	$('#fri_d').text(fri);
	$('#sat_day').val(sat);
	$('#sat_d').text(sat);
	$('#sun_day').val(sun);
	$('#sun_d').text(sun);
	$('#monthly_days').css("display", "block");
	$('#btnPanel').css("display", "block");
	$.ajax({url:"<?php echo base_url()?>op_admin/checkMonthly/?month="+month+"&year="+year+"&user_id="+user_id, success:function(result){
		
		/*if($.trim(result)=='weekly')
		{
			mName=$("#month1 option:selected").text();	
			if (confirm("You already have filled hours for ("+mName+") and Year ("+year+") on weekly basis, do you want to chage it to monthly?")) {
   				$('#monthly_days').css("display", "block");	
			} else {
				$('#monthly_days').css("display", "none");
  				  
			}
			
		}*/
			
		
		}});
	

	}
	
  }});
  
  }});
  }
	}});
 }
 
 
 function generateWeekly(month, year)
{
	$.ajaxSetup({ cache: false });
	if(month=='' || year==''){
		//dialog('Please select Month and Year.');
	$('#alerts').modal(); 
	$("#alerts #alertTitle").html('Warning');
	$("#alerts #alertContent").html('Please select Month and Year.');
		return false;
	}
	$.ajax({url:"<?php echo base_url()?>op_admin/validateDate/?month="+month+"&year="+year+"&user_id="+user_id, success:function(validate){
	if($.trim(validate)=='N'){
	//dialog("Back date is not allowed.");
	$('#alerts').modal(); 
	$("#alerts #alertTitle").html('Warning');
	$("#alerts #alertContent").html('Back date is not allowed');
	return false;
	}
	user_id = $('#user_id').val();	
	mName=$("#month2 option:selected").text();
	$.ajax({
		url:"<?php echo base_url()?>op_admin/generateWeekly/?month="+month+"&year="+year+"&user_id="+user_id,
		success:function(result){
			if($.trim(result)==''){
				//dialog("Please first fill working days from Manage days section for month ("+mName+") and Year ("+year+")");
	$('#alerts').modal(); 
	$("#alerts #alertTitle").html('Warning');
	$("#alerts #alertContent").html("Please first fill working days from Manage days section for month ("+mName+") and Year ("+year+")");
				$('#month').css("display", "none");
				var redirected="<?php echo base_url()?>op_admin/scheduleCalendar";
				window.location=redirected;
			}else{
				var mon=result.split('~').length-1;
				var tue=result.split('_').length-1;
				var wed=result.split('-').length-1;
				var thu=result.split('!').length-1;
				var fri=result.split('^').length-1;
				var sat=result.split(',').length-1;
				var sun=result.split('|').length-1;		
				$('#mon_day').val(mon);
				$('#mon_d').text(mon);
				$('#tue_day').val(tue);
				$('#tue_d').val(tue);
				$('#wed_day').val(wed);
				$('#wed_d').val(wed);
				$('#thu_day').val(thu);
				$('#thu_d').val(thu);
				$('#fri_day').val(fri);
				$('#fri_d').val(fri);
				$('#sat_day').val(sat);
				$('#sat_d').val(sat);
				$('#sun_day').val(sun);
				$('#sun_d').val(sun);				
				$('#monthly_days').css("display", "block");
				$('#btnPanel1').css("display", "block");
				$('#weekCal').html(result);	
				
				
				
				$.ajax({url:"<?php echo base_url()?>op_admin/checkMonthly/?month="+month+"&year="+year+"&user_id="+user_id, success:function(result){
		
			/*if($.trim(result)=='monthly')
			{
			mName=$("#month2 option:selected").text();	
			if (confirm("You already have filled hours for ("+mName+") and Year ("+year+") on monthly basis, do you want to chage it to weekly?")) {
   				$('#weekCal').css("display", "block");	
			} else {
				$('#week').css("display", "none");
  				  
			}
			
		}*/
			
		
		}});
		
	
	
				
				
					 
			}
  }});
  }});
 }
 
 function validate()
 {
	 if($('#mon_hour').val()>12){
		 //dialog('Value cannot exceeds to 12 hours');
	$('#alerts').modal(); 
	$("#alerts #alertTitle").html('Warning');
	$("#alerts #alertContent").html('Value cannot exceeds to 12 hours');
		 $('#mon_hour').focus(); return false;}
	 if($('#tue_hour').val()>12){
		 //dialog('Value cannot exceeds to 12 hours');
	$('#alerts').modal(); 
	$("#alerts #alertTitle").html('Warning');
	$("#alerts #alertContent").html('Value cannot exceeds to 12 hours');	 
		 $('#tue_hour').focus();return false;}
	 if($('#wed_hour').val()>12){
		 //dialog('Value cannot exceeds to 12 hours');
	$('#alerts').modal(); 
	$("#alerts #alertTitle").html('Warning');
	$("#alerts #alertContent").html('Value cannot exceeds to 12 hours');
		 $('#wed_hour').focus();return false;}
	 if($('#thu_hour').val()>12){
		 //dialog('Value cannot exceeds to 12 hours');
	$('#alerts').modal(); 
	$("#alerts #alertTitle").html('Warning');
	$("#alerts #alertContent").html('Value cannot exceeds to 12 hours');
		 $('#thu_hour').focus();return false;}
	 if($('#fri_hour').val()>12){
		 //dialog('Value cannot exceeds to 12 hours');
	$('#alerts').modal(); 
	$("#alerts #alertTitle").html('Warning');
	$("#alerts #alertContent").html('Value cannot exceeds to 12 hours');
		 $('#fri_hour').focus();return false;}
	 if($('#sat_hour').val()>12){
		 //dialog('Value cannot exceeds to 12 hours');
	$('#alerts').modal(); 
	$("#alerts #alertTitle").html('Warning');
	$("#alerts #alertContent").html('Value cannot exceeds to 12 hours');
		 $('#sat_hour').focus();return false;}
	 if($('#sun_hour').val()>12){
		 //dialog('Value cannot exceeds to 12 hours');
	$('#alerts').modal(); 
	$("#alerts #alertTitle").html('Warning');
	$("#alerts #alertContent").html('Value cannot exceeds to 12 hours');
		 $('#sun_hour').focus();return false;}
	 return true;
 }
 function validateWeekly()
 { 
	var chk = true;
	$('#weekCal :text').each(function(){
		if($(this).val() > 12){
			chk = false;
		}
	});
	if(chk) return true;
	//dialog('Value cannot exceeds to 12 hours');
	$('#alerts').modal(); 
	$("#alerts #alertTitle").html('Warning');
	$("#alerts #alertContent").html('Value cannot exceeds to 12 hours');
	return false;
	// return true;
 }

function checkClick(id)
{
	//alert(id)
	if($('#id').checked==true){
	var n = $("input:checkbox:checked").length;
	var w = $("input:checkbox").length;
	var a=w-n;
	$('#nonWorkingdays').val(n);
	$('#workingdays').val(a);}
	else
	{
		var n = $("input:checkbox:checked").length;
	var w = $("input:checkbox").length;
	var a=w-n;
	
	$('#nonWorkingdays').val(n);
	$('#workingdays').val(a);
	}
}
function showHide(id)
{
	
	if(document.getElementById("monthly").checked==true)
	{
		$('#monthly_days').css('display', 'none');
		$('#month').css('display', 'block');
		$('#week').css('display', 'none');
	}
	if(document.getElementById("weekly").checked==true)
	{
	//$('#weekCal').css('display', 'none');
	$('#week').css('display', 'block');
	$('#month').css('display', 'none');
	}
}

function getSumOfDays(month, year)
{
	$.ajax({url:"<?php echo base_url()?>op_admin/getSumOfDays/?month="+month+"&year="+year, success:function(result){
		
	//	alert(result);
		var days=result.split('@');
		if(days){
		$('#mon_hour').val(days[0]);
		$('#tue_hour').val(days[1]);
		$('#wed_hour').val(days[2]);
		$('#thu_hour').val(days[3]);
		$('#fri_hour').val(days[4]);
		$('#sat_hour').val(days[5]);
		$('#sun_hour').val(days[6]);
		}
		else
		{
		$('#mon_hour').val();
		$('#tue_hour').val();
		$('#wed_hour').val();
		$('#thu_hour').val();
		$('#fri_hour').val();
		$('#sat_hour').val();
		$('#sun_hour').val();
		}
		}});
}

function getWeeklyData(month, year)
{
	$.ajax({url:"<?php echo base_url()?>op_admin/getWeeklyData/?month="+month+"&year="+year, success:function(result){
		
	//	alert(result);
		var days=result.split('@');
		if(days){
		$('#mon_hour').val(days[0]);
		$('#tue_hour').val(days[1]);
		$('#wed_hour').val(days[2]);
		$('#thu_hour').val(days[3]);
		$('#fri_hour').val(days[4]);
		$('#sat_hour').val(days[5]);
		$('#sun_hour').val(days[6]);
		}
		else
		{
		$('#mon_hour').val();
		$('#tue_hour').val();
		$('#wed_hour').val();
		$('#thu_hour').val();
		$('#fri_hour').val();
		$('#sat_hour').val();
		$('#sun_hour').val();
		}
		}});
}

function getEnableDate(month, year)
{
	$.ajax({url:"<?php echo base_url()?>op_admin/enabledisablecontrol/?month="+month+"&year="+year, success:function(result){
		
	if($.trim(result)=='Disable'){
	//dialog("Monthly option is disabled for this month.");
	$('#alerts').modal(); 
	$("#alerts #alertTitle").html('Warning');
	$("#alerts #alertContent").html("Monthly option is disabled for this month.");
	$('#monthly_days').css('display', 'none');
	$('#monthlySave').css('display', 'none');
	return false;
	}
	}});
	
}


</script>


<div class="container">
  <div class="row-fluid">
   <div class="selectHow_txtWrap clearfix pTop20 font18"> <?php echo $this->load->view('breadcrumb');?></div>
    <section>
      <article>
        <div class="inconwrap">
          <div class="soswrap1" >
           <?php include('op_leftmenu.php');?>
       </div>
     
          <div class="qawrap1" >
          
          <div style="text-align:center; font-weight:bold;"> <?php $this->session->userdata('msg');?></div>
            <h2>Manage Hours</h2>
           
           
          <form action="" method="post" name="manageMonthly" id="manageMonthly"  >
           <div class="hlogin">
           		<div style="width:20%; float:left; margin-top:4px; font-weight:bold">Please choose:</div>
                <div class="hlogin_inputs" style="padding:5px; float:left; width:10%">
               
             <input type="radio" name="cal" id="monthly" value="Monthly" onClick="showHide(this.id)" style="margin:0px" /> Monthly
            
              </div>
              <div class="hlogin_inputs" style="padding:5px;float:left;width:20%">
              <input type="radio" name="cal" id="weekly" value="Weekly" style="margin:0px" onClick="showHide(this.id)"> Weekly
              </div>
              
              <div class="hlogin_inputs" style="padding:5px; float:left;width:18%; margin-top:5px">
              <!--<input type="button" name="generate" id="generate" value="Generate" class="btnactive m5r" onClick="generateCal($('#month').val(), $('#year').val())"  /> -->
            </div>
            <div class="clear"></div>
            </div>
            <div class="clear"></div>
           
            
            <div id="month" style="display:none">
            
             <div class="hlogin">
           		<div style="width:20%; float:left; margin-top:13px">Select Month/Year:</div>
              <div class="hlogin_inputs" style="padding:5px; float:left; width:20%">
              <select name="month1" id="month1">
             	 <option value="">--Select month--</option>
             	 <?php foreach($month_arr as $key):?>
              			<option value="<?php echo $key->numeric_value;?>"><?php echo $key->value;?></option>
              	 <?php endforeach;?>
              </select> 
              </div>
              <div class="hlogin_inputs" style="padding:5px;float:left;width:20%">
              <select name="year" id="year">
              <option value="">--Select year--</option>
              <?php $d=date('Y');
			  $dt=$d+9;
			  for($d;$d<=$dt;$d++){
			  ?>
              <option value="<?php echo $d;?>"><?php echo $d;?> </option>
              <?php } ?>
              </select> 
              </div>
              
              <div class="hlogin_inputs" style="padding:5px; float:left;width:18%; margin-top:5px">
              <input type="button" name="generate" id="generate" value="Generate" class="btnactive m5r" onClick="generateCal($('#month1').val(), $('#year').val()), getSumOfDays($('#month1').val(), $('#year').val())"  /> 
              </div>
              <div class="clear"></div>
            </div>
            
            <div id="monthly_days">
            <div style="margin-left:100px" id="countDays">
            <div style="float:left; padding:7px; font-weight:bold; width:100px"># of Monday:</div>
            <div style="width:12%; float:left;"><label id="mon_d" style="padding-top:8px"></label> </div>
            <div style="float:left"><input type="hidden" name="mon_day" id="mon_day" style="width:50%"/>         </div>
            <div style="float:left;padding:7px;font-weight:bold;">Hours Each Monday:</div>
            <div style="float:left"><input type="text" name="mon_hour" id="mon_hour" style="width:50%" onBlur="return validate()" /> </div>
           <div style="float:left"> <label id="mon_in_month" style="padding-top:8px"></label></div>
            </div>
           
            <div class="clear"></div>
            
            <div style="margin-left:100px" id="countDays">
            <div style="float:left; padding:7px; font-weight:bold;width:100px"># of Tuesday:</div>
            <div style="width:12%; float:left; "> <label id="tue_d" style="padding-top:8px"></label></div>
            <div style="float:left"><input type="hidden" name="tue_day" id="tue_day" style="width:50%"/>          </div>
            <div style="float:left;padding:7px;font-weight:bold;">Hours Each Tuesday:</div>
            <div style="float:left"><input type="text" name="tue_hour" id="tue_hour" style="width:50%" onBlur="return validate()" /></div>
           <div style="float:left"> <label id="tue_in_month" style="padding-top:8px"></label></div>
            </div>
            <div class="clear"></div>
            
            <div style="margin-left:100px" id="countDays">
            <div style="float:left; padding:7px; font-weight:bold;width:100px"># of Wednesday:</div>
            <div style="width:9%; float:left; "> <label id="wed_d" style="padding-top:8px"></label></div>
            <div style="float:left"><input type="hidden" name="wed_day" id="wed_day" style="width:50%"/>          </div>
            <div style="float:left;padding:7px;font-weight:bold;">Hours Each Wednesday:</div>
            <div style="float:left"><input type="text" name="wed_hour" id="wed_hour" style="width:50%" onBlur="return validate()" /></div>
           <div style="float:left"> <label id="wed_in_month" style="padding-top:8px"></label></div>
            </div>
            <div class="clear"></div>
            
            <div style="margin-left:100px" id="countDays">
            <div style="float:left; padding:7px; font-weight:bold;width:100px"># of Thursday:</div>
            <div style="width:12%; float:left; "> <label id="thu_d" style="padding-top:8px"></label></div>
            <div style="float:left"><input type="hidden" name="thu_day" id="thu_day" style="width:50%"/>          </div>
            <div style="float:left;padding:7px;font-weight:bold;">Hours Each Thurday:</div>
            <div style="float:left"><input type="text" name="thu_hour" id="thu_hour" style="width:50%" onBlur="return validate()" /></div>
           <div style="float:left"> <label id="thu_in_month" style="padding-top:8px"></label></div>
            </div>
            <div class="clear"></div>
            
            <div style="margin-left:100px" id="countDays">
            <div style="float:left; padding:7px; font-weight:bold;width:100px"># of Friday:</div>
            <div style="width:14%; float:left; "> <label id="fri_d" style="padding-top:8px"></label></div>
            <div style="float:left"><input type="hidden" name="fri_day" id="fri_day" style="width:50%"/>          </div>
            <div style="float:left;padding:7px;font-weight:bold;">Hours Each Friday:</div>
            <div style="float:left"><input type="text" name="fri_hour" id="fri_hour" style="width:50%" onBlur="return validate()" /></div>
           <div style="float:left"> <label id="fri_in_month" style="padding-top:8px"></label></div>
            </div>
            <div class="clear"></div>
            
            <div style="margin-left:100px" id="countDays">
            <div style="float:left; padding:7px; font-weight:bold;width:100px"># of Saturday:</div>
            <div style="width:11.5%; float:left; "> <label id="sat_d" style="padding-top:8px"></label></div>
            <div style="float:left"><input type="hidden" name="sat_day" id="sat_day" style="width:50%" value="0"/>          </div>
            <div style="float:left;padding:7px;font-weight:bold;">Hours Each Saturday:</div>
            <div style="float:left"><input type="text" name="sat_hour" id="sat_hour" style="width:50%" value="0" onBlur="return validate()" readonly  /></div>
           <div style="float:left"> <label id="sat_in_month" style="padding-top:8px"></label></div>
            </div>
            <div class="clear"></div>
            <div style="margin-left:100px" id="countDays">
            <div style="float:left; padding:7px; font-weight:bold;width:100px"># of Sunday:</div>
            <div style="width:13%; float:left; "> <label id="sun_d" style="padding-top:8px"></label></div>
            <div style="float:left"><input type="hidden" name="sun_day" id="sun_day" style="width:50%" value="0"/>          </div>
            <div style="float:left;padding:7px;font-weight:bold;">Hours Each Sunday:</div>
            <div style="float:left"><input type="text" name="sun_hour" id="sun_hour" style="width:50%" value="0" onBlur="return validate()" readonly  /></div>
           <div style="float:left"> <label id="sun_in_month" style="padding-top:8px"></label></div>
            </div>
            <div class="clear"></div>
            
            </div>
            
            
             <div class="hlogin" id="monthlySave">
             <div id="btnPanel" style="display:none"> 
           <div > <input type="submit" name="Save" class="btnactive m5r" style="border:0px" value="Save"  ></div>
           
           <div><input type="button" name="cancel" class="btninactive" value="Cancel" onclick="javascript: return history.go(-1)" />
           </div>
           	
           	<input type="hidden" name="user_id" id="user_id" value="<?php echo $uid;?>"/>
           </div>
             
             </div>
             </div>
           
           </form>
             <form action="" method="post" name="manageWeekly" id="manageWeekly" onSubmit="return validateWeekly()"  >
            <div id="week" style="display:none">
            
            <div class="hlogin">
           		<div style="width:20%; float:left; margin-top:13px">Select Month/Year:</div>
              <div class="hlogin_inputs" style="padding:5px; float:left; width:20%">
              <select name="month2" id="month2">
              	<option value="">--Select month--</option>
              	<?php foreach($month_arr as $key):?>
              			<option value="<?php echo $key->numeric_value;?>"><?php echo $key->value;?></option>
              	<?php endforeach;?>
              
              </select> 
              </div>
              <div class="hlogin_inputs" style="padding:5px;float:left;width:20%">
              <select name="year2" id="year2">
              <option value="">--Select year--</option>
              <?php $d=date('Y');
			  $dt=$d+9;
			  for($d;$d<=$dt;$d++){
			  ?>
              <option value="<?php echo $d;?>"><?php echo $d;?> </option>
              <?php } ?>
              </select> 
              </div>
              
              <div class="hlogin_inputs" style="padding:5px; float:left;width:18%; margin-top:5px">
              <input type="button" name="generate1" id="generate1" value="Generate" class="btnactive m5r" onClick="generateWeekly($('#month2').val(), $('#year2').val())"  /> 
              </div>
              </div>
              <div class="clear"></div>
            
            
            
            
           
           <div id="monthly_days">
            <div id="weekCal"></div>
           </div>
            
            
            
            
            
           <div class="hlogin">
           <div id="btnPanel1" style="display:none"> 
           <div><input type="submit" name="SaveWeekly" class="btnactive m5r" style="border:0px" value="Save" /></div>
           <div><input type="button" name="cancelWeekly" class="btninactive" value="Cancel" onclick="javascript: return history.go(-1)" /></div>
           </div>
            <input type="hidden" name="user_id" id="user_id" value="<?php echo $uid;?>"/>
            </div>
            </div>
            
            </div>
            </form> 
            <div class="clear"></div>
           
            <div class="clear"></div>
          </div>
          
          <div class="clear"></div>
        </div>
     
      </article>
    </section>
  </div>
</div>


