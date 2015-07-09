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
	$.ajax({url:"<?php echo base_url()?>op_admin/validateDate/?month="+month+"&year="+year, success:function(validate){
	if($.trim(validate)=='N'){
	//dialog("Back date is not allowed.");
	$('#alerts').modal(); 
	$("#alerts #alertTitle").html('Warning');
	$("#alerts #alertContent").html('Back date is not allowed.');
	return false;
	}
	user_id = $('#user_id').val();
	$.ajax({url:"<?php echo base_url()?>op_admin/generateCal/?month="+month+"&year="+year+"&user_id="+user_id, success:function(result){
	$("#calendar").html(result);
	var n = $("input:checkbox:checked").length;
	var w = $("input:checkbox").length;
	var a=w-n;
	$('#nonWorkingdays').val(n);
	$('#workingdays').val(a);
	$('#countDays').css("display", "block");
	$('#chkBox_msg_div').css("display", "block");
	$('#btnPanel').css('display', 'block');
  }});
  }});
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
     <form action="" method="post" name="scheduleTime" id="scheduleTime"  >
          <div class="qawrap1" >
            <h2>Manage Days</h2>
           
           
          
           <div class="hlogin">
           		<div style="width:20%; float:left; margin-top:13px">Select Month/Year:</div>
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
              <?php $d=date('Y');
			  $dt=$d+9;
			  for($d;$d<=$dt;$d++){
			  ?>
              <option value="<?php echo $d;?>"><?php echo $d;?> </option>
              <?php } ?>
              </select> 
              </div>
              
              <div class="hlogin_inputs" style="padding:5px; float:left;width:18%; margin-top:5px">
              <input type="button" name="generate" id="generate" value="Generate" class="btnactive m5r" onClick="generateCal($('#month').val(), $('#year').val())"  /> 
              </div>
              <div class="clear"></div>
              
              
            </div>
            <div class="clear"></div>
            
            
            <div id="calendar"></div>
            
            <div class="clear"></div>
            
            <div style="display:none; margin-left:100px" id="countDays">
            	<div style="float:left; padding:7px; font-weight:bold;">Working days:</div>
            	<div style="float:left"><input type="text" name="workingdays" id="workingdays" style="width:50%" readonly /></div>
            	<div style="float:left;padding:7px;font-weight:bold;">Non working days:</div>
            	<div style="float:left"><input type="text" name="nonWorkingdays" id="nonWorkingdays" style="width:50%" readonly />
            	<input type="hidden" name="user_id" id="user_id" value="<?php echo $uid;?>"/>
            	</div>	
            </div>
            
             <div class="hlogin">
             <div id="btnPanel" style="display:none"> 
           		<div > <input type="submit" name="Save" class="btnactive m5r" style="border:0px" value="Save" ></div>
           		<div> <input type="button" name="cancel" class="btninactive" value="Cancel" onclick="javascript: return history.go(-1)" ></div>
             </div>
           	   	<div id="chkBox_msg_div" style="color:Red;float:right;width:300px;display:none;">
           	   		<B>Note:</B> Select a checkbox to make the day Non-Working.
           	   	</div>
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


