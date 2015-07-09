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
     <form action="" method="post" name="addResource" id="addResource"  >
          <div class="qawrap1" >
            <h2>Map Class Resources</h2>
             <div class="hlogin">
              <div class="hlogin_inputs" style="font-size:14px; font-weight:bold;">
                Class: <?php echo $classList[0]['class_name'];?>
                <input type="hidden" name="class_id" id="class_id" value="<?php echo $classList[0]['id'];?>" />
              </div>
              <div class="clear"></div>
            </div>
            <?php /*foreach($resourceMaster as $rsMaster){
				switch($rsMasater['resource']){
					case "doctor":
					$nm='doc';
					break;
					case "room":
					$nm='room';
					break;
					case "chair":
					$nm='chair';
					break;
					case "assistant":
					$nm='staff';
					break;
				
				}
				
				
				*/
				 ?>
            <!-- <div class="hlogin" style="padding:5px;">
              <input type="checkbox" name="<?php echo $nm;?>" id="<?php echo $nm;?>" value="<?php echo ($resource['doctor']=='1')?'1':'0';?>" <?php echo ($resource['doctor']=='1')?'checked':'';?> onClick="checkProp(this.id)"  /> <?php echo $rsMaster['resource'];?>
              <div class="clear"></div>
            </div>-->
            <?php //} ?>
           <div class="hlogin">
              <div class="hlogin_inputs" style="padding:5px;">
              <input type="checkbox" name="doc" id="doc" value="1" checked="checked" disabled  <?php ($resource['doctor']=='1')?'checked':'';?> onClick="checkProp(this.id)"  /> Doctors
              </div>
              <div class="clear"></div>
              <div id="docDiv" style="display:none">
              <div style="width:200px; margin-left:50px;">
              <?php foreach($docDetails as $docInfo){?>
              	<div style="width:20px; float:left; padding:2px"><input type="radio" name="docName_<?php echo $docInfo['id']; ?>" id="docName_<?php echo $docInfo['id']; ?>"></div><div style="float:left; padding:5px"><?php echo $docInfo['doctor_name']; ?></div>
                <?php } ?>
              </div>
              </div>
            </div>
             <div class="hlogin">
              <div class="hlogin_inputs" style="padding:5px;">
              <input type="checkbox" name="room" id="room" onClick="checkProp(this.id)" value="<?php echo ($resource['room']=='1')?'1':'0';?>" <?php echo ($resource['room']=='1')?'checked':'';?> /> Room
              </div>
              <div class="clear"></div>
            </div>
             <div class="hlogin">
              <div class="hlogin_inputs" style="padding:5px;">
               <input type="checkbox" name="chair" id="chair" onClick="checkProp(this.id)" value="<?php echo ($resource['chair']=='1')?'1':'0';?>" <?php echo ($resource['chair']=='1')?'checked':'';?> /> Chair
              </div>
              <div class="clear"></div>
            </div>
             <div class="hlogin">
              <div class="hlogin_inputs" style="padding:5px;">
              <input type="checkbox" name="staff" id="staff" onClick="checkProp(this.id)" value="<?php echo ($resource['assistance']=='1')?'1':'0';?>" <?php echo ($resource['assistance']=='1')?'checked':'';?> /> Chair side assistance 
              </div>
              <div class="clear"></div>
            </div>
             <div class="hlogin">
           <div > <input type="submit" name="Save" class="btnactive m5r" style="border:0px" value="Save" onclick="return checkClass('<?php echo $classList[0]['class_name'];?>')" ></div>
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