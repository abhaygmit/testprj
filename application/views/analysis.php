
<script src="<?php echo base_url()?>js/knockout-3.0.0.js"></script>
<script src="<?php echo base_url()?>js/globalize.min.js"></script>
<script src="<?php echo base_url()?>js/dx.chartjs.js"></script>
<style>
.pane
{
    position: relative;
    background-color: #ffffff;
    border: 1px solid #cfcfcf;
    border-radius: 3px;
    text-align: center;
   /* width: 850px;*/
    height: 440px;
    padding: 50px;
    margin: 0 auto;
    box-shadow: 0px 1px 3px 0px #e3e3e3;
    box-shadow: 0px 1px 3px 0px rgba(112,112,112,0.05);
}

    .pane .long-title
    {
        position: absolute;
        top: 15px;
        text-align: center;
       /* width: 850px;*/
        overflow: hidden;
    }
</style>

<script>
function generate(month, year){
	if(month=='' || year==''){
	$('#alerts').modal(); 
	$("#alerts #alertTitle").html('Warning');
	$("#alerts #alertContent").html('Please select Month and Year.');
	return false;
	}
	
}
</script>
<style>
.lbl20{width:20%; float:left; font-size:13px; }
.lbl30{width:30%; float:left; font-weight:bold;}
.lftHeading{font-weight:bold;}
</style>
<div class="container">
  <div class="row-fluid">
       <div class="selectHow_txtWrap clearfix pTop20 font18"> <?php $this->load->view('breadcrumb');?></div>
    <section>
      <article>
        <div class="inconwrap" style="padding:0px">
          <div class="soswrap1">
        
          <form action="<?php echo base_url().'home/analysis';?>" method="post" name="getAnalysis" id="getAnalysis"  >
            <h2>Analysis Reports</h2>
            <div class="soconwrap" style="padding:15px; background-color:#fff">
              <div class="hlogin_label font16" style="color:#333333; background-color:#FFF; font-size:12px"> From:<span style="color:#F00">*</span></div>
              	<div class="hlogin_inputs" style="padding-top:6px;">
               <input type="text" name="selectFrom" id="selectFrom" readonly value="<?php echo ($_POST['selectFrom']?$_POST['selectFrom']:'')?>"  /></div>
                
              <div class="hlogin_label font16" style="color:#333333; background-color:#FFF; font-size:12px"> To:<span style="color:#F00">*</span></div>
              <div class="hlogin_inputs" style="padding-top:6px;">
                 <input type="text" name="selectTo" id="selectTo" readonly value="<?php echo ($_POST['selectTo']?$_POST['selectTo']:'')?>"  /></div>
              
              
             <!--/* <div class="hlogin_label font16" style="color:#333333; background-color:#FFF; font-size:12px"> Type:</div>
              <div class="hlogin_inputs" style="padding-top:6px;">
                <select name="aType" id="aType" style="color:#000"  >
                <option value="" >---Report Type---</option>
                <option value="m" >Monthly</option>
                <option value="y" >Weekly</option>
                </select></div>
             */-->
              
              
                <div class="clearboth"></div>
              </div>
              <div class="sogrid gralt">
                <div class="sogl"> </div>
                <div class="sogr" style="width:24%"><input type="submit" name="generateAnalysis" class="btnactive m5r" style="border:0px" value="Generate" onclick="return generate()" ></div>
                <div class="clearboth"></div>
              </div>
              
              
            </div>
          </div>
       </form>
           <div class="qawrap1">
            <h2 style="color:#333333">Quick Analysis</h2>
           
           
           
           <div id="mContent">
           
            <div class="hlogin" >
             <div>
             <?php $dd=date($jval[0]->year.'-'.$jval[0]->month.'-'.$jval[0]->day);?>
             <div class="lbl20">Month:</div>
             <div class="lbl30"><?php echo date('F', strtotime($dd)); ?></div>
             <div class="lbl20">Year:</div>
             <div class="lbl30"><?php echo date('Y', strtotime($dd)); ?></div>	
             </div>
             
             
             <div>
             <div class="lbl20">Working Days:</div>
             <div class="lbl30"><?php echo $jval[0]->workingHours->working_days; ?></div>
             <div class="lbl20">Type:</div>
             <div class="lbl30">Monthly</div>	
             </div>
             
             <div>
             <div class="lbl20"># of Doctors:</div>
             <div class="lbl30"><?php echo $jval[0]->docEstimatedApts->no_of_docs; ?></div>
             <div class="lbl20">% of work:</div>
             <div class="lbl30"><?php foreach($jval[0]->docEstimatedApts->doc_apt_plan as $key=>$val){echo trim($val->docEstimatedPctg.'-');}?></div>	
             </div>
             <hr>
             <div style="margin-top:60px">
             <div style="width:50%; float:left;">
             <div class="lftHeading">Appointments</div>
             <div>Start Appointments:</div>
             <div>Exam Appointments:</div>
             <div>Treatment Appointments:</div>
             <div>Finish Appointments:</div>
             <div>Record Appointments:</div>
             <div>Other Appointments:</div>
             <div style="font-weight:bold">Total Appointments:</div>
             </div>
             <div style="width:24%; float:left;border-right:solid 1px #999; text-align:center">
             <div class="lftHeading">Planned</div>
              <div><?php echo round($dataVal['startNeeded']);?></div>
             <div><?php echo round($dataVal['examNeeded']);?></div>
             <div><?php echo round($dataVal['treatmentNeeded']);?></div>
             <div><?php echo round($dataVal['finishNeeded']);?></div>
             <div><?php echo round($dataVal['recordNeeded']);?></div>
             <div><?php echo round($dataVal['otherNeeded']);?></div>
             <div style="font-weight:bold"><?php echo round($dataVal['totalApt']);?></div>
             </div>
              <div style="width:24%; float:left; text-align:center">
             <div class="lftHeading">Actual</div>
             <div>12</div>
             <div>23</div>
             <div>155</div>
             <div>4</div>
             <div>5</div>
             <div>1</div>
             <div style="font-weight:bold">200</div>
             
             </div>
             </div>
       		 <div class="clear"></div>
         
         <!-- <div style="margin-top:20px">
             <div style="width:50%; float:left;">
             <div class="lftHeading">Doctors:</div>
            <?php for($i=1;$i<=$noDoc;$i++){?>
             <div>Appointments for doctor<?php echo $i;?>:</div>
             <?php } ?>
              <div style="font-weight:bold">Total Appointments:</div>
             
             
             
             
             </div>
             <div style="width:24%; float:left;border-right:solid 1px #999; text-align:center">
             <div class="lftHeading">Planned</div>
             <?php 
			//$apts=explode('-', $tot);
			//pr($apts);
			for($t=1;$t<=$jval[0]->docEstimatedApts->no_of_docs;$t++){ ?>
              <div><?php echo $t;?></div>
             <?php } ?>
             <div style="font-weight:bold">200</div>
             </div>
             
             <div style="width:24%; float:left; text-align:center">
             <div class="lftHeading">Actual</div>
             <div>12</div>
             <div>23</div>
             <div>155</div>
            
             <div style="font-weight:bold">200</div>
             
             </div>
             
            </div>
       
          <div class="clear"></div>
       -->  
       <div style="margin:20px 0px 20px 0px ">
             <div style="width:50%; float:left;">
             <div class="lftHeading">Monthly Revenue</div>
             <div>Monthly revenue</div>
             </div>
             <div style="width:24%; float:left;border-right:solid 1px #999; text-align:center">
             <div class="lftHeading">Planned</div>
              <div>$<?php echo number_format(round($dataVal['plannedRevenue']), 2);?></div>
            
             </div>
              <div style="width:24%; float:left; text-align:center">
             <div class="lftHeading">Actual</div>
             <div>$22000</div>
           
             
             </div>
             </div>
       		 <div class="clear"></div>
          
          <div class="pane" style="margin-top:20px">
				<div class="long-title"><h3></h3></div>
				<div id="chartContainer" class="case-container" style="width: 100%; height: 440px;"></div>
				
			</div>
          <div class="clear"></div>
          
          <div class="pane">
				<div class="long-title"><h3></h3></div>
				<div id="chartContainer1" class="case-container" style="width: 100%; height: 440px;"></div>
				
			</div>
          
          
        </div>
        
        </div>
        </div>
      </article>
      </article>
    </section>
  </div>
</div>

<script>
  $(document).ready(function(){
    $('#selectFrom').datepicker({
    	//showButtonPanel: true,
    	//closeText: 'Clear',    	 
		//minDate:0,
    	changeMonth: true,
    	changeYear: true
    }).focus(function() {
  		//$(".ui-datepicker-prev, .ui-datepicker-next").remove();
		//$(".ui-datepicker-prev").remove();		 
		$('.ui-datepicker-buttonpane.ui-widget-content .ui-datepicker-close.ui-priority-primary').click(function(){
			$('#selectFrom').val('');
		});	   
	});	
	
	
	$('#selectTo').datepicker({
    	//showButtonPanel: true,
    	//closeText: 'Clear',    	 
		//minDate:0,
    	changeMonth: true,
    	changeYear: true
    }).focus(function() {
  		//$(".ui-datepicker-prev, .ui-datepicker-next").remove();
		//$(".ui-datepicker-prev").remove();		 
		$('.ui-datepicker-buttonpane.ui-widget-content .ui-datepicker-close.ui-priority-primary').click(function(){
			$('#selectTo').val('');
		});	   
	});	
	
	
  });
  
  
  $(function ()  
				{
   var dataSource = [
    { state: "Exam", Planned:<?php echo round($dataVal['examNeeded']);?> , Actual: 476.851 },
    { state: "Start", Planned:<?php echo round($dataVal['startNeeded']);?>, Actual: 195.769 },
    { state: "Treatment", Planned: <?php echo round($dataVal['treatmentNeeded']);?>, Actual: 335.793},
    { state: "Finish", Planned: <?php echo round($dataVal['finishNeeded']);?>, Actual: 374.771 },
    { state: "Other", Planned: <?php echo round($dataVal['recordNeeded']);?>, Actual: 182.373},
	{ state: "Records", Planned:<?php echo round($dataVal['otherNeeded']);?>, Actual: 182.373}
];

$("#chartContainer").dxChart({
    dataSource: dataSource,
    commonSeriesSettings: {
        argumentField: "state",
        type: "bar",
        hoverMode: "allArgumentPoints",
        selectionMode: "allArgumentPoints",
        label: {
            visible: true,
            format: "fixedPoint",
            precision: 0
        }
    },
    series: [
        
        { valueField: "Planned", name: "Planned" },
        { valueField: "Actual", name: "Actual" }
    ],
    title: "Planned Vs Actual Appointments",
    legend: {
        verticalAlignment: "bottom",
        horizontalAlignment: "center"
    },
    pointClick: function (point) {
        this.select();
    }
});
}

			);
  


	$(function ()  
				{
   var dataSource = [
    { country: "Planned", area: <?php echo round($dataVal['plannedRevenue']);?>},
    { country: "Actual", area: 22000 }
   
];

$("#chartContainer1").dxPieChart({
    size:{ 
        width: 500
    },
    dataSource: dataSource,
    series: [
        {
            argumentField: "country",
            valueField: "area",
            label:{
                visible: true,
                connector:{
                    visible:true,           
                    width: 1
                }
            }
        }
    ],
    title: "Planned Vs Actual Revenue"
});
}

			);
  
  
  </script>