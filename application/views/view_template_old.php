<script language="javascript" type="text/javascript">
	jsonData = <?php echo $this->data['jsonData']; ?>;
</script>

<div class="container">
  <div class="row-fluid">
    <section>
      <article>
        <div class="inconwrap">
          <div class="schedule_wrap">
            <h2>Saved Schedules</h2>
            <!--Start Calander-->
            <div class="schedule_title"></div>
            <div class="calendar_container_header">
              <div class="calendar_wrap" id="mainContainer" style="width:1113px">               
                <div class="schedule_container" id="timeSlots" style="float:left;">
                  <div class="schedule_head"></div>
                </div>
                <div class="calendar_container" id="headerSlots" style="float:left;">
                    <div class="cell_headwrap" id="headerTitleSlots">                      
                    </div>
                    <div id="contentRows">
                    </div> 
                </div>
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
