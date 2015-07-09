
<div class="container">
  <div class="row-fluid">
    <section>
      <article>
       
          <div style="background-color:#FFF; min-height:300px; border-radius:6px"> 
          
          <div>
          <div style="padding:10px; float:left; width:170px; font-size:13px;">Schedule Date:<span style="font-weight:bold"><?php echo $jData->month;?>/<?php echo $jData->day;?>/<?php echo $jData->year;?></span></div>
          <div style="padding:10px; float:left; width:170px; font-size:13px;">
          estimated Appointments :<span style="font-weight:bold"><?php echo $jData->docEstimatedApts->no_of_apt_per_day;?></span>
          </div>
          <div style="padding:10px; float:left; width:125px; font-size:13px;">
          Number of Doctors:<span style="font-weight:bold"><?php echo $jData->docEstimatedApts->no_of_docs;?></span></div>
          <div style="padding:10px; float:left; width:170px; font-size:13px;">Working Minutes:
          <span style="font-weight:normal">(START)</span>: <span style="font-weight:bold"><?php echo $jData->workingHours->start;?></span><br />
          <span style="margin-left:96px"> (MID)</span>: <span style="font-weight:bold"><?php echo $jData->workingHours->mid;?></span><br/>
          <span style="margin-left:96px">(END)</span>: <span style="font-weight:bold"><?php echo $jData->workingHours->end;?></span>	</div>
          <div style="padding:10px; float:left; width:250px; font-size:13px;">Schedule Start/End Time:
          <span >(Start Time)</span>: <span style="font-weight:bold"><?php echo $jData->time_slot->start_time;?></span><br />
          <span style="margin-left:141px">(End Time)</span>: <span style="font-weight:bold"><?php echo $jData->time_slot->end_time;?></span><br />
          <span style="margin-left:76px">(Practice Time Interval)</span>: <span style="font-weight:bold"><?php echo $jData->time_slot->time_interval;?></span><br />
          <span style="margin-left:109px">(No Of Columns)</span>: <span style="font-weight:bold"><?php echo $jData->time_slot->no_colomns;?></span><br /></div>
          </div>
          <div style="clear:both"></div>
          <div>
           <div style="padding:10px; float:left; width:970px; font-size:13px;border:#e6e6e6 solid 1px; border-radius:8px; margin:5px">
          <span style="font-weight:bold; font-size:14px" >Breaks</span>: 
          <div style="clear:both"></div>
          <?php foreach($jData->break as $key=>$breaks){ ?>
          <span style="font-weight:bold; "><span style="width:100px"><?php echo $key;?></span><span style="font-weight:normal; ">= Interval-><?php echo $breaks->interval;?></span></span>,&nbsp;
          <span style="font-weight:normal; "><?php echo 'Time to apply->'. $breaks->time;?></span><br />
          <?php } ?>
          </div>
          </div>
          
          
          
           <div style="clear:both"></div>
          <div>
           <div style="padding:10px; float:left; width:970px; font-size:13px;border:#e6e6e6 solid 1px; border-radius:8px; margin:5px">
          <span style="font-weight:bold; font-size:14px" >START(S)</span>: 
          <div style="clear:both"></div>
          <?php foreach($jData->S as $key=>$starts){ ?>
          <span style="font-weight:bold; "><span style="width:100px"><?php echo $key;?></span>
          <span style="font-weight:normal; padding:5px">= Procedure ID-><?php echo $starts->proc_id;?></span>,
          <span style="font-weight:normal; padding:5px">Color Code-><?php echo $starts->color_code;?></span>,
          <span style="font-weight:normal; padding:5px">Procedure Length-><?php echo $starts->length;?></span>,
          <span style="font-weight:normal; padding:5px">Procedure Weight-><?php echo $starts->weight;?></span>,
          <span style="font-weight:normal; padding:5px">Class Attribute-><?php echo $starts->class;?></span>,
          <span style="font-weight:normal; padding:5px">Doctor Availability-><?php echo ($starts->docAvailability!='')?$starts->docAvailability:'null';?></span><br />
          
          </span>
          
          <?php } ?>
          </div>
          </div>
          
          
           <div style="clear:both"></div>
          <div>
           <div style="padding:10px; float:left; width:970px; font-size:13px;border:#e6e6e6 solid 1px; border-radius:8px; margin:5px">
          <span style="font-weight:bold; font-size:14px" >MID(M)</span>: 
          <div style="clear:both"></div>
          <?php foreach($jData->M as $key=>$mid){ ?>
          <span style="font-weight:bold; "><span style="width:100px"><?php echo $key;?></span>
          <span style="font-weight:normal; padding:5px">= Procedure ID-><?php echo $mid->proc_id;?></span>,
          <span style="font-weight:normal; padding:5px">Color Code-><?php echo $mid->color_code;?></span>,
          <span style="font-weight:normal; padding:5px">Procedure Length-><?php echo $mid->length;?></span>,
          <span style="font-weight:normal; padding:5px">Procedure Weight-><?php echo $mid->weight;?></span>,
          <span style="font-weight:normal; padding:5px">Class Attribute-><?php echo $mid->class;?></span>,
          <span style="font-weight:normal; padding:5px">Doctor Availability-><?php echo $mid->docAvailability;?></span><br />
          
          </span>
          
          <?php } ?>
          </div>
          </div>
          
           <div style="clear:both"></div>
          <div>
           <div style="padding:10px; float:left; width:970px; font-size:13px; border:#e6e6e6 solid 1px; border-radius:8px; margin:5px">
          <span style="font-weight:bold; font-size:14px" >END(E)</span>: 
          <div style="clear:both"></div>
          <?php foreach($jData->E as $key=>$end){ ?>
          <span style="font-weight:bold; "><span style="width:100px"><?php echo $key;?></span>
          <span style="font-weight:normal; padding:5px">= Procedure ID-><?php echo $end->proc_id;?></span>,
          <span style="font-weight:normal; padding:5px">Color Code-><?php echo $end->color_code;?></span>,
          <span style="font-weight:normal; padding:5px">Procedure Length-><?php echo $end->length;?></span>,
          <span style="font-weight:normal; padding:5px">Procedure Weight-><?php echo $end->weight;?></span>,
          <span style="font-weight:normal; padding:5px">Class Attribute-><?php echo $end->class;?></span>,
          <span style="font-weight:normal; padding:5px">Doctor Availability-><?php echo $end->docAvailability;?></span><br />
          
          </span>
          
          <?php } ?>
          </div>
          </div>
          
          
        <div style="clear:both"></div>  
          
          
         <div style="font-weight:bold; font-size:16px; padding:8px">JSON string for above-</div> 
          
          <div style="margin:8px">
          <div style="padding:20px; margin:8px; font-weight:bold; font-size:12px; border:1px solid #e6e6e6; border-radius:8px; width:850px"><?php echo $gridData['php_generated_JSON'];?></div>
          </div>
          </div>
          <div class="clear"></div>
        
      </article>
      </article>
    </section>
  </div>
</div>

