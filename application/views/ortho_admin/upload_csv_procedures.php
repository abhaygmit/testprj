<script>
function showGrid(val, tmBreak, class_id){
 $(document).ready(function(){
 class_id=$('#class_id').val();	 
 $.post("<?php echo base_url()?>op_admin/showGrid/?val="+val+"&tm="+tmBreak+"&cl="+class_id, function(result){
 $("#doctorAssign").html(result);
 });
  });
 }
 
 
 
 
 function getScTime(val)
 {
	
    $.ajax({url:"<?php echo base_url()?>op_admin/getScTime/?tm="+val, success:function(result){
		/// alert(result);
	$("#scTime").html(result);
	}});
 }

</script>
<script type="text/javascript">
var _validFileExtensions = [".csv"];

function Validate(oForm) {
	
    var arrInputs = oForm.getElementsByTagName("input");
    for (var i = 0; i < arrInputs.length; i++) {
        var oInput = arrInputs[i];
		
        if (oInput.type == "file") {
            var sFileName = oInput.value;
			
			if(sFileName=='')
			{
				$('#alerts').modal(); 
				$("#alerts #alertTitle").html('Warning');
				$("#alerts #alertContent").html('Please select CSV File.');
				return false;
			}
			
			/*if($("#uploadCSV").val()!='opProc.csv')
			{
				alert($("#uploadCSV").val());
				$('#alerts').modal(); 
				$("#alerts #alertTitle").html('Warning');
				$("#alerts #alertContent").html('Please select the given CSV file format.');
				return false;
			}*/
			
			
			
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }

                if (!blnValid) {
                    //dialog("Please Upload CSV File.");
					$('#alerts').modal(); 
					$("#alerts #alertTitle").html('Warning');
					$("#alerts #alertContent").html('Please select CSV File.');
                    return false;
                }
            }
        }
    }

    return true;
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
        
          <div class="qawrap1" >
         
            <?php $params=$this->uri->segment(3); ?>
            <h2 style="float:left; width:87%">Upload CSV (Procedure)</h2>
            
            <!-- Upload CSV Instructions Start -->
           
            <div class="hlogin">
              
              <div class="hlogin_inputs" style="width:100%">
                <h1 style="color:#666666; font-size:16px">Instructions</h1>
                <div>The file format must be in a Comma Separated values (.CSV).</div>
                <h1 style="color:#666666; font-size:16px">CSV Format</h1>
                <div>There are 9 columns in CSV file format all are required to be filled prior to import in the website. <br>
                <ul>
                <li><span style="font-weight:bold">Class ID</span>: User can enter class id from view classes list on manage classes section. </li>
                <li><span style="font-weight:bold">Procedure Abbreviation</span>: User can enter procedure abbreviation on second column of CSV file. Procedure abbreviation cannot exceed to 4 characters and these will be unique. </li>
                <li><span style="font-weight:bold">Procedure Name</span>: User can enter procedure name on third column of CSV file.  </li>
                <li><span style="font-weight:bold">Practice Time Interval</span>: Practice time interval is set procedure to fall in time format like 3 minutes, 5 minutes, 10 minutes, 15 minutes, 20 minutes. User can enter practice time interval on fourth column of CSV file.  </li>
                <li><span style="font-weight:bold">Procedure Length</span>: Procedure length is duration of procedure timing to complete a procedure. User can enter procedure length on fifth column of CSV file.  </li>
                 <li><span style="font-weight:bold">Procedure Weight</span>: Procedure weight is hierarchy of procedure to come on Start, Mid, Section and set it in (%) User can enter procedure length on sixth column of CSV file.  </li>
                  <li><span style="font-weight:bold">Time Assignment</span>: Time assignment is a comma separated values. and based on (Practice time interval, Procedure length and staff) columns from CSV file. E.g. practice time interval is '5 minutes', procedure length is '15 minutes' so time assignment divided into 3 timeslot of 5 minutes each. and if in staff column of CSV file user set (d,e,a) then in time slot user can put (5,10,15) for staff availability for each staff. i.e. '0-5 minutes for doctor', '5-10 minutes for physical equipment' and '10-15 minutes for assistant'. User can enter procedure length on seventh column of CSV file.  </li>
                  
                  <li><span style="font-weight:bold">Staff</span>: Staff column is also a  comma separated values where user can put ('e=Physical Equipment', 'd=Doctor', 'a=Assistant') these values are incorporated with column 7 and column 6 as defined above. User can enter staff on eighth column of CSV file.  </li>
                  <li><span style="font-weight:bold">Status</span>: Status is set the attribute of procedure on active or inactive on practice level- here (1=Active and 0=Inactive). User can enter staff on ninth column of CSV file.  </li>
                  
                </ul>
                </div>
                <br />
                <form action="" method="post" name="downloadF" id="downloadF" enctype="multipart/form-data"  >
                <div>You can download CSV file format from here and fill the values as described and then import to website.
                <span style="margin-left:10px">
                <a href="javascript:void(0)" style="cursor:pointer"> <input type="image" name="dwnloadCSV" src="<?php echo base_url()?>images/csvico.jpg" style="border:none" /></a>
                </span>
                </div>
                
               </div>
              <div class="clear"></div>
            </div>
            </form>
            <!-- Upload CSV Instructions End -->
            
            
            <form action="" method="post" name="addProcedure" id="addProcedure" enctype="multipart/form-data" onsubmit="return Validate(this);" >
             
            <div class="hlogin" >
              <div class="hlogin_label" style="width:16%">Select CSV File <span style="font-size:12px; color:#F00">*</span></div>
              <div class="hlogin_inputs" style="border-radius:8px; border:1px solid #CCC; padding:8px" >
                <input type="file" name="uploadCSV" id="uploadCSV" />
                 <span style="color:#FF0000"> <?php if(form_error('uploadCSV')){echo form_error('uploadCSV');} ?></span>
               
               <div style="margin-top:10px" > <input type="submit" name="Save" class="btnactive m5r" style="border:0px" value="Save" /></div>
           <div style="margin-top:10px"> <input type="button" name="cancel" class="btninactive" value="Cancel" onclick="javascript: return history.go(-1)" ></div>
           </div>
              <div class="clear"></div>
            </div>
            
            
           <div class="hlogin">
            <div class="hlogin_label"></div>
              <div class="hlogin_inputs">
           
           </div>
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
