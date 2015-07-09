<script>
var interTArr = [0, 0, 0];
function getRulesetData(val){
	//alert(val);
   fullurl="<?php echo base_url()?>home/getRulesetData/?id="+val;
    var AJAX1 = null;
   if (window.XMLHttpRequest) {
      AJAX1=new XMLHttpRequest();//for Mozila
   } else {
      AJAX1=new ActiveXObject("Microsoft.XMLHTTP");
   }
   if (AJAX1==null) {
      alert("Your browser doesn't support AJAX.");
      return false
   } else {
      AJAX1.open("POST",fullurl,true);
      AJAX1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  AJAX1.send(null);
      AJAX1.onreadystatechange = function() {
       if (AJAX1.readyState==4){
		document.getElementById('rulesetData').innerHTML= AJAX1.responseText;	
		//alert(AJAX1.responseText);
	   }else{ }
   	  }
  }
}

function checkValue()
{	
	if($('#selectDt').val()=='')
	{
		//alert('Please select date.');
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html('Please select date.');
		$('#selectDt').focus();
		return false;
	}	
	if($('#dsetName').val()==0 || $('#dsetName').val()=='')
	{
		//alert('Please enter dataset name');
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html('Please enter dataset name.');
		$('#dsetName').val("");
		$('#dsetName').focus();
		return false;
	}
	if($('#noCol').val()==0 || $('#noCol').val()=='')
	{
		//alert('Please enter dataset name');
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html('Please # of columns.');
		$('#noCol').val("");
		$('#noCol').focus();
		return false;
	}
	if($('#scheduleT').val()=='')
	{
		//alert('Please enter dataset name');
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html('Please select schedule time interval');
		$('#scheduleT').val("");
		$('#scheduleT').focus();
		return false;
	}
	if($('#startTime').val()=='')
	{
		//alert('Please enter dataset name');
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html('Please select start time');
		$('#startTime').val("");
		$('#startTime').focus();
		return false;
	}
	
	
	
	var btArr = [];
	$('.breakType').each(function(){
		btArr.push($(this).val());
	});
	if(btArr.length != $.unique(btArr).length){
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html('Break Type cannot be same.');
		return false;
	}	
	var btInx = [];
	$('.tmInterVal').each(function(){
		btInx.push($(this).prop("selectedIndex"))
	});
	
	if(document.getElementById("InputsWrapper").style.display=="block"){
	if($.inArray(0, btInx) != -1){
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html('Please select Time Limit.');
		return false;
	}
	}
	btArr = [];
	btInx = [];
	$('.applyTime').each(function(){
		btArr.push($(this).val());
		btInx.push($(this).prop("selectedIndex"))
	});
	if(document.getElementById("InputsWrapper").style.display=="block"){
	if($.inArray(0, btInx) != -1){
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html('Please select Time To Schedule.');
		return false;
	}
	}
	
	if(btArr.length != $.unique(btArr).length){
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html('Time To Schedule cannot be same.');
		return false;
	}
	return true;
}

function checkBrk(val)
{
	//alert(val);
	if($('#break').val()==val)
	{
		//alert($('#break').val());
		//dialog('Lunch is already selected.');
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html(val+' is already selected.');
		return false;
	}
}

function getScheduleDate(val)
{
	var dt=val.split('/');
	month=dt[0];
	year=dt[2];
	day=dt[1];
	
	$.ajax({url:"<?php echo base_url()?>home/getSchedultDate/?month="+month+"&year="+year+"&day="+day, success:function(validate){
		//alert(validate);
	if($.trim(validate)=='hours')
	{
		//alert("Working hours not set for "+val);
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html("No working days in "+val);
		$('#selectDt').val('');
		$('#wHDiv').css('display', 'none');
		$('#eTime').val('');
		$('#eTm').css('display', 'none');
		$('#startTime').val('');
		$('#selectDt').focus();
		return false;
	}
	else if($.trim(validate)=='N'){
		//alert("Working hours not set for "+val);
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html("No working days in "+val);
		$('#selectDt').val('');
		$('#wHDiv').css('display', 'none');
		$('#eTime').val('');
		$('#eTm').css('display', 'none');
		$('#startTime').val('');
		$('#selectDt').focus();
		return false;
		
	}
	else if($.trim(validate)=='NODATA'){
		//alert("Working hours not set for "+val);
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html("No working days in "+val);
		$('#selectDt').val('');
		$('#wHDiv').css('display', 'none');
		$('#eTime').val('');
		$('#eTm').css('display', 'none');
		$('#startTime').val('');
		$('#selectDt').focus();
		return false;
		
	}
	else if($.trim(validate)=='NOINPUTDATA'){
		//alert("Practice Master Inputs not set for "+val);
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html("No working days in "+val);
		$('#selectDt').val('');
		$('#wHDiv').css('display', 'none');
		$('#eTime').val('');
		$('#eTm').css('display', 'none');
		$('#startTime').val('');
		$('#selectDt').focus();
		return false;
		
	}
	else{
	var wHour=validate.split('@');
	//wHour[1] = '';
	$('#scheduleData').html(wHour[0]);
	//if(wHour[1]!='undefined'){
		$('#wHDiv').css('display', 'block');
	//	alert('undefined ='+wHour[1]+'\n'+wHour[0]);
		$('#wH').text(wHour[1]);
		$('#startTime').val('');
		$('#eTime').text('');
		$('#inActive').css('display', 'none');
		$('#active').css('display', 'block');
	}
	}});
	
	
}
function addMinutes(time, minsToAdd) {
	function D(J){ return (J<10? '0':'') + J;};
	var piece = time.split(':');
	var mins = piece[0]*60 + +piece[1] + +minsToAdd;
	return D(mins%(24*60)/60 | 0) + ':' + D(mins%60);  
}

function subMinutes(time, minsToSub) {
	function D(J){ return (J<10? '0':'') + J;};
	var piece = time.split(':');
	var mins = piece[0]*60 + +piece[1] + -minsToSub;
	return D(mins%(24*60)/60 | 0) + ':' + D(mins%60);  
}
function getEndTime(obj, inx){
	var sum = 0;
	interTArr[inx] = $(obj).val();
	$.each(interTArr,function(key, value){
		sum += parseInt(value);
	});
	var workH=$('#aptHours').val();
	var dt=$('#selectDt').val();
	var startTm=$('#startTime').val();
	if(workH=='' || dt==''){
		//alert('Please select date.');
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html('Please select date.');
		$("#startTime").val('');
		$('#intTm').val('');
		
		return false;
		
	
	}else{		
		var btArr = [];
		$('.tmInterVal').each(function(){
			btArr.push($(this).val());
		});
		var endT = (parseInt(startTm)+parseInt(workH))+':00', endTH = parseInt(startTm)+parseInt(workH);
		if(endTH > 23)
		{
			$('#alerts').modal(); 
			$("#alerts #alertTitle").html('Warning');
			$("#alerts #alertContent").html('Schedule time not for tomorrow.');
			$("#startTime").val('');
			$('#eTm').css('display', 'none');
			return false;
		}				
		var d = new Date("October 13, 2020 " + addMinutes(endT, sum)); 
		var h = d.getHours()  % 12;
		if (h == 0) {
			h += 12;
		}
		var m = d.getMinutes();
		var s = d.getSeconds();			
		var amPm = "AM";
		if ( d.getHours() > 11 ) {
			amPm = "PM"
			//h = h - 12;
		} else {
			amPm = "AM"
			//h = h;
		}
		if (h < 10) h = '0' + h; 
		if (m < 10) m = '0' + m;	
		
		if((h>='12' || h=='6') && amPm=='AM')
		{
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html('Schedule time not for tomorrow.');
		$('.tmInterVal').val('');
		return false;
		}
		dateString = h + ':' + m + ' ' + amPm;
		$('#eTm').show();
		$('#eTime').text(dateString);
		$('#endTime').val(endTH);		
		/*if($('#eTime').text().split(':')[1].split(' ')[0]+sum == 1){
		}*/
	}
}
function get24HrsTime(time){
	var hours = Number(time.match(/^(\d+)/)[1]);
	var minutes = Number(time.match(/:(\d+)/)[1]);
	var AMPM = time.match(/\s(.*)$/)[1];
	if(AMPM == "PM" && hours<12) hours = hours+12;
	if(AMPM == "AM" && hours==12) hours = hours-12;
	var sHours = hours.toString();
	var sMinutes = minutes.toString();
	if(hours<10) sHours = "0" + sHours;
	if(minutes<10) sMinutes = "0" + sMinutes;
	return sHours + ":" + sMinutes;
}
function getEndTimeAfterSub(obj, inx){
	var sub = 0;
	var workH=$('#aptHours').val();
	var dt=$('#selectDt').val();
	var startTm=$('#startTime').val();
	var endT= get24HrsTime($('#eTime').text()); 
	sum = $(obj).val();		
	var d = new Date("October 13, 2020 " + subMinutes(endT, sum)); 
	var h = d.getHours()  % 12;
	if (h == 0){
		h += 12;
	}
	var m = d.getMinutes();
	var s = d.getSeconds();			
	var amPm = "AM";
	if( d.getHours() > 11 ){
		amPm = "PM"
	} else {
		amPm = "AM"
	}
	if (h < 10) h = '0' + h; 
	if (m < 10) m = '0' + m;	
	dateString = h + ':' + m + ' ' + amPm;
	$('#eTime').text(dateString);
}

function docAvailability()
{
	 no_of_docs=$('#no_of_docs').val();
	 no_of_column_need=parseInt(no_of_docs)+1;
	if($('#noCol').val() < no_of_column_need)
	{
		//alert("Atleast "+no_of_column_need+" columns required.");
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html("Atleast "+no_of_column_need+" columns required.");
		$('#noCol').val('');
		return false;
		$('#noCol').focus();
	}
}


$(document).ready(function(){
var MaxInputs       = 2; //maximum select boxes allowed
var InputsWrapper   = $("#InputsWrapper"); //Input boxes wrapper ID
var AddButton       = $("#AddMoreFileBox"); //Add button ID

var x = InputsWrapper.length; //initlal text box count
var FieldCount=1; //to keep track of text box added
AddButton.click(function (e)  //on add input button click
{
        if(x <= MaxInputs) //max input box allowed
        {
            FieldCount++; //text box added increment
            //add input box
			optionVal = '';
			 
			if($('#interval').val()==3)
			{
				for(i=1;i<=20;i++){ k=i*3;
				optionVal+='<option value="'+k+'">'+k+' Minutes</option>';
				 } 
			}
			else if($('#interval').val()==5)
			{
				for(i=1;i<=12;i++){ k=i*5;
				optionVal+='<option value="'+k+'">'+k+' Minutes</option>';
				 } 
			}
			else if($('#interval').val()==10)
			{
				for(i=1;i<=6;i++){ k=i*10;
				optionVal+='<option value="'+k+'">'+k+' Minutes</option>';
				 } 
			}
			else if($('#interval').val()==15)
			{
				for(i=1;i<=4;i++){ k=i*15;
				optionVal+='<option value="'+k+'">'+k+' Minutes</option>';
				 } 
			}
			else if($('#interval').val()==20)
			{
				for(i=1;i<=3;i++){ k=i*20;
				optionVal+='<option value="'+k+'">'+k+' Minutes</option>';
				} 
			}
			if($('#stTm').val()!='')
			{
				optVal='';
				var i=parseInt($('#stTm').val());
				var enTm=parseInt($('#endTime').val());
				//alert(i);
				for(i;i<=enTm;i++)
				{
					optVal+='<option value="'+i+'">';
					optVal+=(i<12)?i+ ":00 AM":((i==12)?i+ ":00 PM":(i-12)+ ":00 PM");
					optVal+='</option>';
				}
			}
			 
			
            $(InputsWrapper).append('<div style="border-radius:8px; padding:5px; border:1px solid #999; margin-top:25px;" class="mainDiv" id="mainDv"'+x+'><div style="width:32%; float:left;padding-top:10px">Break Type</div><div style="margin:5px"><select id="break[]" class="breakType" name="break[]" style="width:68%" onchange="return checkBrk(this.value)"><option value="LUNCH">LUNCH</option><option value="MEETING">MEETING</option><option value="TEA">TEA</option></select></div><div style="width:32%; float:left; padding-top:10px">Time Limit</div><div style="margin:5px"><select class="tmInterVal" name="tmInterval[]" id="tmInterval'+x+'" style="color:#000;width:68%" onchange="getEndTime(this,'+x+')"><option value="">Time Interval</option>'+optionVal+'</select></div><div style="width:32%; float:left;padding-top:10px">Time To Schedule</div><div style="margin:5px"><select class="applyTime" name="applyTime[]" id="applyTime[]" style="color:#000;width:68%"><option value="">Time to Apply</option>'+optVal+'</select></div><div style="float:right; width:10px"><a href="javascript:void(0);" class="removeclass" id="removeclass'+x+'">&times;</a></div></div>');
			$('#removeclass'+x).click(function(){ 
			getEndTimeAfterSub($(this).parent().parent().find('.tmInterVal'), x);
			$(this).parent().closest('.mainDiv').remove();
			x--;
			});
            x++; //text box increment
        }
		else if (x > MaxInputs)
		{
			$('#alerts').modal(); 
			$("#alerts #alertTitle").html('Warning');
			$("#alerts #alertContent").html('Maximum three break type are allowed.');
		}
return false;
});


/*$("body").on("click",".removeclass", function(e){ //user click on remove text
        if( x > 1 ) {
			
			$('#mainDv').remove();
                //$(this).parent('div').remove(); //remove text box
               x--; //decrement textbox
        }
return false;
})*/
	
});

function scheduletimeLimit(val, stTm)
{
	
	if(val=='')
	{
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html('Please select schedule time interval.');
		$('#addBrk').css('display', 'block');
		$('#InputsWrapper').css('display', 'none');
		return false;
	}
	else if(stTm=='')
	{
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html('Please select start time.');
		$('#addBrk').css('display', 'block');
		$('#InputsWrapper').css('display', 'none');
		return false;
	}
	else{
	//alert('time to apply='+stTm+' && schedule Timeintval='+ val);
	enTm=$('#endTime').val();
	
	
	//alert(enTm);
	$.ajax({url:"<?php echo base_url()?>home/scheduletimeLimit/?val="+val+"&stTm="+stTm+"&enTm="+enTm, success:function(result){
		var ajaxRes=result.split('@');
		//alert(result);
		$('#intVL').html(ajaxRes[0]);
		$('#intTm').html(ajaxRes[1]);
		
	}});
	
	}
	//$('#addBrk').css('display', 'block');
	//$('#InputsWrapper').css('display', 'none');
}


function addBrk(){
	$('#addBrk').css('display', 'none');
	$('#InputsWrapper').css('display', 'block');
}
</script>

<div class="container">
  <div class="row-fluid">
       <div class="selectHow_txtWrap clearfix pTop20 font18"> <?php $this->load->view('breadcrumb');?></div>
    <section>
      <article>
        <div class="inconwrap">
          <div class="soswrap">
            <h2>Schedule Optimizer Summary</h2>
            <div class="soconwrap">
              <div class="sogrid font16" style="color:#333333"> 12 Schedule Variations based on 5 Data Sets
                <div class="clearboth"></div>
              </div>
              <div class="sogrid gralt">
                <div class="sogl">Predicted annual revenue range: </div>
                <div class="sogr">$678,432 to $1,231,212</div>
                <div class="clearboth"></div>
              </div>
              <div class="sogrid">
                <div class="sogl">Estimated average treatment time:</div>
                <div class="sogr">20 months</div>
                <div class="clearboth"></div>
              </div>
              <div class="sogrid gralt">
                <div class="sogl">Schedule efficiency rating:</div>
                <div class="sogr">83.9%</div>
                <div class="clearboth"></div>
              </div>
              <div class="sogrid">
                <div class="sogl">Last analysis date:</div>
                <div class="sogr">05/28/13</div>
                <div class="clearboth"></div>
              </div>
            </div>
          </div>
       
        <form action="<?php echo base_url().'template/createDataset';?>" method="post" name="scheduleTemplate" id="scheduleTemplate"  >
          <div class="qawrap">
            <h2 style="color:#333333">Quick Analysis</h2>
            <div class="hlogin">
              <div class="hlogin_label">Select Date</div>
              <div class="hlogin_inputs">
              <input type="text" name="selectDt" id="selectDt" onchange="getScheduleDate(this.value)" readonly  />
              </div>
              <div class="clear"></div>
            </div>
            
             <div class="hlogin" id="wHDiv" style="display:none">
              <div class="hlogin_label">Working Hours</div>
              <div class="hlogin_inputs" style="padding-top:6px;">
                 <label name="wH" id="wH" />
              </div>
              <div class="clear"></div>
            </div>
         <div id="rulesetData">  
            <!--=========Implemented on 02-12-2013 for saving a name of rulesets============-->
            <div class="hlogin">
              <div class="hlogin_label">Dataset Name <span class="rederrorstar">*</span></div>
              <div class="hlogin_inputs">
                <input type="text" name="dsetName" id="dsetName" value="<?php echo ($result['ruleset_name'])?$result['ruleset_name']:''?>"  />
                
              </div>
              <div class="clear"></div>
            </div>
             <div class="hlogin">
              <div class="hlogin_label"># of columns <span class="rederrorstar">*</span></div>
              <div class="hlogin_inputs">
                <input type="text" name="noCol" id="noCol" maxlength="3" value="<?php echo (isset($result['no_of_columns']))?$result['no_of_columns']:''?>" onChange="docAvailability()"  />
              </div>
              <div class="clear"></div>
            </div>
            <div class="hlogin">
              <div class="hlogin_label">Schedule Time Interval <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
                <select name="scheduleT" id="scheduleT" style="color:#000"  >
                <option value="" >-----Select Schedule Time Interval-----</option>
                <option value="3" <?php echo ($result['schedule_time_intvl']==3)?'selected':'';?>>3 Minutes</option>
                <option value="5" <?php echo ($result['schedule_time_intvl']==5)?'selected':'';?>>5 Minutes</option>
                <option value="10" <?php echo ($result['schedule_time_intvl']==10)?'selected':'';?>>10 Minutes</option>
                <option value="15" <?php echo ($result['schedule_time_intvl']==15?"selected":"");?>>15 Minutes</option>
                <option value="20" <?php echo ($result['schedule_time_intvl']==20)?'selected':'';?>>20 Minutes</option>
                </select>
              </div>
              <div class="clear"></div>
            </div>
              
            <div class="hlogin">
              <div class="hlogin_label">Start Time <span class="rederrorstar">*</span></div>
              <div class="hlogin_inputs">
                <select name="startTime" id="startTime" onChange="scheduletimeLimit($('#scheduleT').val(), this.value),getEndTime()" >
                <option value="">Select Start Time</option>
                <?php $i=20;
				for($j=6;$j<=$i;$j++){
				 ?>
                  <option value="<?php echo $j;?>" <?php echo ($j==isset($result['start_time']))?'selected':''?>><?php echo ($j<12)?$j.':00 AM':(($j==12)?$j.':00 PM':($j-12). ':00 PM');?></option>
                 
                  <?php } ?>
                </select>
                </div>
              <div class="clear"></div>
            </div>
            
            <div class="hlogin">
              <div class="hlogin_label">Add Break <span class="rederrorstar"></span></div>
              <div class="hlogin_inputs" id="apnd" style="padding:5px;width:70%"> <a onClick="addBrk(), scheduletimeLimit($('#scheduleT').val(), $('#startTime').val())" id="addBrk" style="cursor:pointer">Add Break</a>
            		 <div id="InputsWrapper" style="display:none; ">
						<div style="border-radius:8px; border:1px solid #999; padding:5px;">
                        <div style="width:32%; float:left;padding-top:10px">Break Type</div>
                        <div style="margin:5px" >
						<select id="break[]" class="breakType" name="break[]" style="width:68%">
                        <option value="LUNCH">LUNCH</option>
                        <option value="MEETING">MEETING</option>
                        <option value="TEA">TEA</option>
                        </select>
                        </div>
                        
                        <div style="width:32%; float:left; padding-top:10px">Time Limit</div>
                        
                        <div id="intVL">
                        <div style="margin:5px">
                     
                        <select name="tmInterval[]" class="tmInterVal" id="tmInterval[]" style="color:#000;width:68%"">
                      
                        <option value="">Time Interval</option>
                        <?php if('<script>document.getElementById("scheduleT").selectedIndex==3</script>'){ 
					  		for($i=1;$i<=20;$i++){ $k=$i*3;?>
                        <option value="<?php echo $k;?>"><?php echo $k;?> Minutes</option>
                       	
					  <?php }} elseif('<script>document.getElementById("scheduleT").selectedIndex==5</script>'){
                            for($i=1;$i<=15;$i++){ $k=$i*5;?>
                        <option value="<?php echo $k;?>"><?php echo $k;?> Minutes</option>
                        
                       <?php }} else if('<script>document.getElementById("scheduleT").selectedIndex==10</script>'){
                             for($i=1;$i<=6;$i++){ $k=$i*10; ?>
                        <option value="<?php echo $k;?>"><?php echo $k;?> Minutes</option>
                        
                     <?php }} else if('<script>document.getElementById("scheduleT").selectedIndex==15</script>'){
                           for($i=1;$i<=4;$i++){ $k=$i*15;?>
                           <option value="<?php echo $k;?>"><?php echo $k;?> Minutes</option>
                           
                      <?php }} else if('<script>document.getElementById("scheduleT").selectedIndex==20</script>'){
                            for($i=1;$i<=3;$i++){ $k=$i*20;?>
                        <option value="<?php echo $k;?>"><?php echo $k;?> Minutes</option>
                        <?php }}?>
                        </select>
                        
                        </div>
                        </div>
                        
             
             <div style="width:32%; float:left;padding-top:10px">Time To Schedule</div>
             <div id="intTm">
             <div style="margin:5px">
             
             <select class="applyTime" name="applyTime[]" id="applyTime[]" style="color:#000;width:68%">
    <option value="">Time to Apply</option>
    <?php $i=9;
		for($i;$i<=23; $i++){
	?>
    <option value="<?php echo $i;?>" <?php echo ($result['break_time']==$i)?"selected":'';?> <?php echo ($_POST['applyTime']!='')?'selected':'';?>><?php echo ($i<12)?$i.':00 AM':(($i==12)?$i.':00 PM':($i-12). ':00 PM');?></option>
    <?php } ?>
    
    </select>
             </div> 
             </div>          
                        </div>
                        <div style="float:right; padding-bottom:10px"><a id="AddMoreFileBox"  href="#">Add More</a></div>
					</div>
              </div>
              <div class="clear"></div>
            </div>
            
            
            
            
            
            
           <div class="hlogin" style="display:none" id="eTm">
              <div class="hlogin_label">End Time <span class="rederrorstar">*</span></div>
              <div class="hlogin_inputs">
               <input type="hidden" name="endTime" id="endTime" />
                <label name="eTime" id="eTime"></label>
              </div>
              <div class="clear"></div>
            </div>
           </div>
            <div id="scheduleData"></div>
			<div class="hlogin">
            <div id="active" style="display:none">
           <div style="margin-left:110px;" > <input type="submit" name="dset[]" class="btnactive m5r" style="border:0px" value="<?php echo $this->config->item('dataset_btn_value'); ?>" onclick="return checkValue()" ></div>
           </div>
           
            <div id="inActive">
           <div style="margin-left:110px;" > <input type="submit" name="dset[]" class="m5r" style="border:0px; background-color:#CCC; padding:6px; border-radius:8px; color:#fff" value="<?php echo $this->config->item('dataset_btn_value'); ?>" onclick="return checkValue()" disabled ></div>
           </div>
           
           <div> <!--<input type="submit" name="dset[]" class="btnactive" value="<?php echo $this->config->item('template_btn_value'); ?>" >--></div>
           			
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
<script>
  $(document).ready(function(){
    $('#selectDt').datepicker({
    	//showButtonPanel: true,
    	//closeText: 'Clear',    	 
		minDate:0,
    	changeMonth: true,
    	changeYear: true
    }).focus(function() {
  		//$(".ui-datepicker-prev, .ui-datepicker-next").remove();
		//$(".ui-datepicker-prev").remove();		 
		$('.ui-datepicker-buttonpane.ui-widget-content .ui-datepicker-close.ui-priority-primary').click(function(){
			$('#selectDt').val('');
		});	   
	});	
  });
  </script>