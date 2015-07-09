<script>
function checkProp(id){
if($('#doc').is(':checked')){
	$('#doc').val(1);
	//$('#docDiv').show();
}else{$('#doc').val(0);
//$('#docDiv').hide();
}
if($('#room').is(':checked')){
	$('#room').val(1);
}else{$('#room').val(0);}
if($('#chair').is(':checked')){
	$('#chair').val(1);
}else{$('#chair').val(0);}
if($('#staff').is(':checked')){
	$('#staff').val(1);
}else{$('#staff').val(0);}
}
function checkClass(className)
{
	if(className=='Inactive' && className=='inactive' && className=='INACTIVE')
	{
		//
		return true;
		//
	}
	else if($('#room').val()==1 || $('#doc').val()==1 || $('#chair').val()==1 || $('#staff').val()==1)
	{
	return true;
	}
	else
	{
		alert("select atleast one of the resources.");
		return false;
		document.getElementById('doc').focus();
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
     <form action="" method="post" name="docTimeAllotment" id="docTimeAllotment"  >
          <div class="qawrap1" >
            <h2>Time Allotment in %</h2>
           
           <?php foreach($doctors as $doc){ ?> 
          
           <div class="hlogin">
           		<div style="width:20%; float:left"><?php echo $doc['doctor_name']; ?></div>
              <div class="hlogin_inputs" style="padding:5px;">
              <input type="text" name="doc" id="doc"  /> 
              </div>
              <div class="clear"></div>
              
              <?php } ?>
            </div>
            
             <div class="hlogin">
           <div > <input type="submit" name="Save" class="btnactive m5r" style="border:0px" value="Save" onclick="return checkClass('<?php echo $classList[0]['class_name'];?>')" ></div>
           <div> <input type="button" name="cancel" class="btninactive" value="Cancel" onclick="javascript: return history.go(-1)" ></div>
              
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