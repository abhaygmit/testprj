<script type="text/javascript" src="<?php echo base_url()?>jscolor/jscolor.js"></script>
<script>
function resetAll()
{
	if($('#clErr').val()=='error')
	{
		return history.go(-2);
	}
	else
	{
		return history.go(-1);
	}
	
	//return history.go(-1);
	
}
function isNumberKey()
      {
		  
		  
       	var spclChars = "!@#$%^&*()+=|]}[{:;?/><,\"'"; // specify special characters
		var content = $("#clName").val();
		for (var i=0;i<content.length;i++)
		{
			if (spclChars.indexOf(content.charAt(i)) != -1)
			{
				$('#alerts').modal(); 
				$("#alerts #alertTitle").html('Warning');
				$("#alerts #alertContent").html('Special characters are not allowed.');
				return false;
			}
		} 
      }
	  
	$(document).ready(function(){
$('body').on('keydown', 'input, select, textarea', function(e) {
    var self = $(this)
      , form = self.parents('form:eq(0)')
      , focusable
      , next
      ;
    if (e.keyCode == 13) {
        focusable = form.find('input,a,select,button,textarea').filter(':visible');
        next = focusable.eq(focusable.index(this)+1);
        if (next.length) {
            next.focus();
        } else {
            form.submit();
        }
        return false;
    }
});
 });
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
        <form action="" method="post" name="addClass" id="addClass" onSubmit="isNumberKey()"  >
          <div class="qawrap1" >
          <?php $params=$this->uri->segment(3); ?>
            <h2><?php echo ($params!='')?'Edit':'Add New';?> Class</h2>
           
        <div class="hlogin">
              <div class="hlogin_label">Class Name <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
              
                <input type="text" name="clName" id="clName" value="<?php echo (isset($_POST['clName'])!='')?$_POST['clName']:$result['class_name'];?> " onblur="isNumberKey()"   />
              
                <span style="color:#FF0000"> <?php if(form_error('clName')){echo form_error('clName'); echo '<input type="hidden" id="clErr" value="error" />';} ?></span>
              </div>
              <div class="clear"></div>
            </div>
            
            
             <div class="hlogin">
              <div class="hlogin_label">Class Attribute <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs" >
                <select name="classAttribute" id="classAttribute" style="color:#000">
                <option value="" >-----Class Attribute-----</option>
                <?php foreach($attributeList as $attr){?>
                <?php if($result['class_attribute']!=''){$clAttr=$result['class_attribute'];}
			  else if($_POST['classAttribute']!=''){$clAttr=$_POST['classAttribute'];}?>
                <option value="<?php echo $attr['id'];?>" <?php echo ($clAttr==$attr['id']?"selected":'');?>><?php echo $attr['attribute'];?></option>
               <?php } ?>
                
                </select>
                 <span style="color:#FF0000"> <?php if(form_error('classAttribute')){echo form_error('classAttribute');} ?></span>
              </div>
              <div class="clear"></div>
            </div>
            
            
            
             <div class="hlogin">
              <div class="hlogin_label">Time Attribute <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs" >
                <select name="timeAttribute" id="timeAttribute" style="color:#000">
                <option value="" >-----Time Attribute-----</option>
                <?php if($result['time_attribute']!=''){$tmAttr=$result['time_attribute'];}
			  else if($_POST['timeAttribute']!=''){$tmAttr=$_POST['timeAttribute'];}?>
                <option value="S" <?php echo ($tmAttr=='S'?"selected":'');?>>Start</option>
                <option value="M" <?php echo ($tmAttr=='M'?"selected":'');?>>Mid</option>
                <option value="E" <?php echo ($tmAttr=='E'?"selected":'');?>>End</option>
                
                </select>
                 <span style="color:#FF0000"> <?php if(form_error('timeAttribute')){echo form_error('timeAttribute');} ?></span>
              </div>
              <div class="clear"></div>
            </div>
            
            
            
             <div class="hlogin">
              <div class="hlogin_label">Color Code <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs">
              <?php if($result['color_code']!=''){$colorC=$result['color_code'];}
			  else if($_POST['colorCode']!=''){$colorC=$_POST['colorCode'];}?>
                <input type="text" name="colorCode" class="color" id="colorCode" value="<?php echo $colorC;?>"  />
                 <span style="color:#FF0000"> <?php if(form_error('colorCode')){echo form_error('colorCode');} ?></span>
              </div>
              <div class="clear"></div>
            </div>
            
             <div class="hlogin">
              <div class="hlogin_label">Status <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs" >
                <select name="status" id="status" style="color:#000">
               
                 <?php if($result['status']!=''){$st=$result['status'];}
			  		   else if($_POST['status']!=''){$st=$_POST['status'];}?>
                       
                <option value="1" <?php echo ($st==1?'selected':'');?>>Active</option>
                <option value="0" <?php echo ($st==0?'selected':'');?>>Inactive</option>
                <option value="" <?php echo ($st==''?'selected':'');?> >-----Select status-----</option>
                
                </select>
                 <span style="color:#FF0000"> <?php if(form_error('status')){echo form_error('status');} ?></span>
              </div>
              <div class="clear"></div>
            </div>
            
             <div class="hlogin">
           <div > <input type="submit" name="Save" class="btnactive m5r" style="border:0px" value="Save" onClick="isNumberKey()" ></div>
           <div> <input type="button" name="cancel" class="btninactive" value="Cancel" onclick="resetAll()" ></div>
           			
             
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
