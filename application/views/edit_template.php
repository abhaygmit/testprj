<style>
#no_doctors .dropdown-menu{overflow:auto !important; height:200px !important; min-width: 150px !important;}
#no_rooms .dropdown-menu{overflow:auto !important; height:200px !important; min-width: 150px !important;}
#no_chairs .dropdown-menu{overflow:auto !important; height:200px !important; min-width: 150px !important;}
#no_staff .dropdown-menu{overflow:auto !important; height:200px !important; min-width: 150px !important;}
#no_patients .dropdown-menu{overflow:auto !important; height:200px !important; min-width: 150px !important;}
#no_classes .dropdown-menu{overflow:auto !important; height:200px !important; min-width: 150px !important;}
#no_procedures .dropdown-menu{overflow:auto !important; height:200px !important; min-width: 150px !important;}
#no_breaks .dropdown-menu{overflow:auto !important; height:200px !important; min-width: 150px !important;}
</style>

<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/customEdit.js"></script>
<script language="javascript" type="text/javascript">
	jsonData = <?php echo $this->data['jsonData']; ?>;
	baseURL = "<?php echo base_url(); ?>";
</script> 
<div class="container">
  <div class="row-fluid">
    <section>
      <article>
        <div class="inconwrap">
          <div class="schedule_wrap">
            <h2>Saved Schedules</h2>            
            <!-- 03 OCt 2013 -->
            <div class="navbar">
              <div class="container">              
                <ul class="nav">
                  <li class="dropdown" id="no_doctors">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">
                         <span class="left"><img src="<?php echo base_url(); ?>images/doctor.png" alt="" title="Doctors" /></span>
                         <span class="divider-vertical newdivider"></span>
                    </a> 
                  </li>
                  <li class="dropdown" id="no_rooms">
                  	<a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">
                        <span class="left"><img src="<?php echo base_url(); ?>images/room.png" alt="" title="Rooms" /></span>
                        <span class="divider-vertical newdivider"></span>
                    </a> 
                  </li>
                  <li class="dropdown" id="no_chairs">
                  	<a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">
                        <span class="left"><img src="<?php echo base_url(); ?>images/chair.png" alt="" title="Chairs" /></span>
                        <span class="divider-vertical newdivider"></span>
                    </a> 
                  </li>
                  <li class="dropdown" id="no_staff">
                  	<a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">
                    	<span class="left"><img src="<?php echo base_url(); ?>images/stuff.png" alt="" title="Assistant" /></span>
                        <span class="divider-vertical newdivider"></span>
                    </a> 
                  </li>
                  <li class="dropdown" id="no_patients">
                  	<a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">
                        <span class="left"><img src="<?php echo base_url(); ?>images/patient.png" alt="" title="Patients" /></span>
                        <span class="divider-vertical newdivider"></span>
                    </a> 
                  </li>
                  <li class="dropdown" id="no_classes">
                  	<a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">
                    	<span class="left"><img src="<?php echo base_url(); ?>images/classes.png" alt="" title="Classes" /></span>
                        <span class="divider-vertical newdivider"></span>
                    </a> 
                  </li>
                  <li class="dropdown" id="no_procedures">
                  	<a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">
                    	<span class="left"><img src="<?php echo base_url(); ?>images/process.png" alt="" title="Procedures" /></span>
                        <span class="divider-vertical newdivider"></span>
                    </a>
                  </li>
                  <li class="dropdown" id="no_breaks">
                  	<a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">
                    	<span class="left"><img src="<?php echo base_url(); ?>images/breaks.png" alt="" title="Breaks" /></span>
                        <span class="divider-vertical newdivider"></span>
                    </a>
                  </li>
                  <li class="dropdown">
                  	<a id="copy" class="dropdown-toggle" href="javascript:void(0);">
                    	<span class="left"><img src="<?php echo base_url(); ?>images/copyIcon.png" alt="" title="Copy Cell" /></span>
                        <span class="divider-vertical newdivider"></span>
                    </a>
                  </li>
                  <li class="dropdown">
                  	<a id="paste" class="dropdown-toggle" href="javascript:void(0);">
                    	<span class="left"><img src="<?php echo base_url(); ?>images/pasteIcon.png" alt="" title="Paste Cell" /></span> 
                        <span class="divider-vertical newdivider"></span>
                    </a>
                  </li>
                  <li class="dropdown">
                  	<a id="clearCell" class="dropdown-toggle" href="javascript:void(0);">
                    	<span class="left"><img src="<?php echo base_url(); ?>images/clearCellIcon.png" alt="" title="Clear Cell" /></span>
                    </a>
                  </li>
                  <li class="dropdown" style="float:right;">                 
		              <input type="submit" name="dset[]" class="btnactive m5r" style="border:0px; font-weight:bold" id="saveBtn" value="Update Schedule" />
                  </li>
                </ul>                
              </div>
            </div>
            <div class="clear"></div>
            <div style="width:100%; overflow:auto">
              <div style="width:1000px; overflow:auto">
                <div class="schedule_head" id="schedule_head" style="width:104px; float:left; border-bottom: 1px solid #999999;"></div>
                <div style="width: 861px; overflow: scroll; overflow:hidden" id="top">
                  <div style="z-index: 7500; width: 1200px;" id="mainContainer">
                    <div class="cell_headwrap" id="headerTitleSlots"></div>
                  </div>
                </div>
                <div style="height: 376px; float:left;  border: solid 1px green; overflow: scroll; overflow:hidden" id="panel">
                  <div style="z-index: 7500; height: 515px;">
                    <div class="schedule_container" id="timeSlots"></div>
                  </div>
                </div>
                <div style="height: 395px; float:left; overflow: scroll; position: static; border-right:1px solid #999; border-bottom:1px solid #999;" onscroll="syncScrolls()" id="data">
                  <div style="top: 100px; width: 861px; height: 515px;">
                    <div class="calendar_wrap" id='mainInnerContainer'>                       
                      <div class="cell_wrap" id="headerTitleSlots">
                      	<div id="contentRows"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div style="clear:both"></div>
              </div>
            </div>            
            <!--End Calander--> 
          </div>
          <div class="clear"></div>
        </div>
      </article>
      </article>
    </section>
  </div>
</div>
<!-- Modal -->
<div id="alerts" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="<?php echo base_url(); ?>images/closeBtn.png" alt="" /></button>
    <h3 id="myModalLabel"><img src="<?php echo base_url(); ?>images/warningIcon.png" alt="" /><span id="alertTitle"></span></h3>
  </div>
  <div class="modal-body">
    <p id="alertContent"></p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button> 
  </div>
</div>