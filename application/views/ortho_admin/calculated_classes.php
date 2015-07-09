<script>
function generateCal(month, year)
{
	if(month=='' || year==''){
		//dialog('Please select Month and Year.');
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html('Please select Month and Year.');
		return false;
	}
	$.ajax({url:"<?php echo base_url()?>home/getCalculatedData/?month="+month+"&year="+year, success:function(result){
	//alert(result);
	if($.trim(result)==''){
		//dialog('No data for this month and year.');
		$('#alerts').modal(); 
		$("#alerts #alertTitle").html('Warning');
		$("#alerts #alertContent").html('No data for this month and year.');
		$('#month').css("display", "none");
		
		location.reload();
	}
	else{
	var calData=result.split('|');
	//alert(calData[0]+' '+calData[1]);
	$('#exam').text(Math.round(calData[0]));
	$('#start').text(Math.round(calData[1]));
	$('#treatment').text(Math.round(calData[2]));
	$('#finish').text(Math.round(calData[3]));
	$('#other').text(Math.round(calData[4]));
	$('#record').text(Math.round(calData[6]));
	$('#totalApt').text(Math.round(calData[7]));
	
	
	$('#month').css("display", "block");
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
          <div class="qawrap1" style="min-height:350px">
            <h2>Class Required</h2>
          <form action="" method="post" name="scheduleTime" id="scheduleTime"  >
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
              <input type="button" name="generate" id="generate" value="Generate" class="btnactive m5r" onClick="generateCal($('#month1').val(), $('#year').val())"  /> 
              </div>
              
            </div>
            <div class="clear"></div>
             </form>
      <div id="month" style="display:none">
            
      <div id="monthly_days">
      
      
      <div style="margin-left:100px" id="countDays">
      <div style="float:left; padding:7px; font-weight:bold; width:180px"># of Exam Needed:</div>
      <div style="float:left"><label name="exam" id="exam" style="border:none; box-shadow:none; padding-top:5px" /></div>
      </div>
      <div class="clear"></div>
            
      <div style="margin-left:100px" id="countDays">
      <div style="float:left; padding:7px; font-weight:bold;width:180px"># of Starts Needed:</div>
      <div style="float:left"><label name="start" id="start" style="border:none; box-shadow:none; padding-top:5px" /></div>
      </div>
      <div class="clear"></div>
            
      <div style="margin-left:100px" id="countDays">
      <div style="float:left; padding:7px; font-weight:bold;width:180px"># of Treatments Needed:</div>
      <div style="float:left"><label name="treatment" id="treatment" style="border:none; box-shadow:none; padding-top:5px" /></div>
      </div>
      <div class="clear"></div>
            
      <div style="margin-left:100px" id="countDays">
      <div style="float:left; padding:7px; font-weight:bold;width:180px"># of Finish Needed:</div>
      <div style="float:left"><label name="finish" id="finish" style="border:none; box-shadow:none; padding-top:5px" /></div>
      </div>
      <div class="clear"></div>
            
      <div style="margin-left:100px" id="countDays">
      <div style="float:left; padding:7px; font-weight:bold;width:180px;"># of Other Needed:</div>
      <div style="float:left"><label name="record" id="record" style="border:none; box-shadow:none; padding-top:5px;" /></div>
      </div>
      <div class="clear"></div>
            
      <div style="margin-left:100px" id="countDays">
      <div style="float:left; padding:7px; font-weight:bold;width:180px;"># of Records Needed:</div>
      <div style="float:left"><label name="other" id="other" style="border:none; box-shadow:none; padding-top:5px;" /></div>
      </div>
      <div style="clear:both"></div>
           
            
     <div style="margin-left:100px; border-top:#000 solid 1px" id="countDays">
     <div style="float:left; padding:7px; font-weight:bold;width:180px">Total Appointment Needed:</div>
     <div style="float:left"><label name="totalApt" id="totalApt" style="border:none; box-shadow:none; font-weight:bold; size:14px; padding-top:5px" /></div>
     </div>
     <div class="clear"></div>    
          
            
            </div>
             </div>
          
          </div>
          
        </div>
        
     </article>
    </section>
  </div>
</div>


