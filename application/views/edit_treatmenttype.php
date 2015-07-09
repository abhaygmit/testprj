<div class="container">
    <div class="row-fluid">
      <div class="selectHow_txtWrap clearfix pTop20 font18">Edit Treatment:</div>
      <form method="post" action="" namne="add_tx__form" id="add_tx__form">
      <input type="hidden" name="txnid" value="<?php echo $txnid; ?>"/>
      <div class="stp5_frmWrap">
        <div class="forminwrap">
          <div class="fldLable">Treatment Type:</div>
          <div class="fldWrap">
            <input type="text" name="tx_type" id="tx_type" maxlength="255" value="<?php echo $treatmentdetails->treatment_name; ?>" placeholder="Treatment Type" />  
            <span class="rederror"><?php echo form_error('tx_type'); ?></span>
          </div>
          <div class="clear"></div>
        </div>
          <div class="forminwrap">
          <div class="fldLable">Treatment Avg Time:</div>
          <div class="fldWrap">
            <input type="text" name="tx_avg_time" id="tx_avg_time" maxlength="255" value="<?php echo $treatmentdetails->tx_avg_time; ?>" placeholder="Treatment Avg Time" />  
            <span class="rederror"><?php echo form_error('tx_avg_time'); ?></span>
          </div>
          <div class="clear"></div>
        </div>
          <div class="forminwrap">
          <div class="fldLable">Treatment Visits:</div>
          <div class="fldWrap">
            <input type="text" name="tx_visit" id="tx_visit" maxlength="255" value="<?php echo $treatmentdetails->tx_visit_required; ?>" placeholder="Treatment Visit" />  
            <span class="rederror"><?php echo form_error('tx_visit'); ?></span>
          </div>
          <div class="clear"></div>
        </div>
          <div class="forminwrap">
          <div class="fldLable">Treatment Time Gap:</div>
          <div class="fldWrap">
            <input type="text" name="tx_timegap" id="tx_timegap" maxlength="255" value="<?php echo $treatmentdetails->tx_time_gap; ?>" placeholder="Treatment Time Gap" />  
            <span class="rederror"><?php echo form_error('tx_timegap'); ?></span>
          </div>
          <div class="clear"></div>
        </div>
        <div class="forminwrap">
          <div class="fldLable">&nbsp;</div>
          <div class="fldWrap">
                <div><input class="btnactive_input" type="submit" name="txnadd_submit_btn" value="Update"></div>
                <div><input class="btninactive" type="button" name="txnadd_cancel_btn" value="Cancel" onclick="reset_form('add_tx__form');"></div>           
          </div>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
      </div>
      </form>
    </div>
  </div>