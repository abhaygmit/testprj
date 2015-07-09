<div class="container">
  <div class="row-fluid">
    <?php if($this->session->userdata('msg')){ ?>   
    <span class="rederror" id="main_error"><?php echo $this->session->userdata('msg'); ?></span>
    <?php } ?>
    <section>
      <article>
        <div class="inconwrap">
            <div class="selectHow_txtWrap clearfix pTop20 font18">Manage Treatment Types:</div>
            <table cellspacing="0" cellpadding="0" border="1" width="100%">
                <tr>
                    <th class="bluebg">S.No</th>
                    <th class="bluebg">Treatment Name</th>
                    <th class="bluebg">Treatment Avg Time</th>
                    <th class="bluebg">Treatment Visit Required</th>
                    <th class="bluebg">Time Gap</th>
                    <th class="bluebg">Action</th>
                </tr>
                <?php 
                    if(count($treatmenttype)>0){
                    $i=1;
                    foreach($treatmenttype as $k=>$v)
                    {
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $v->treatment_name; ?></td>
                    <td><?php echo $v->tx_avg_time; ?></td>
                    <td><?php echo $v->tx_visit_required; ?></td>
                    <td><?php echo $v->tx_time_gap; ?></td>
                    <td><a href="<?php echo base_url().'home/edit_treatmenttype/'.toPublicId($v->id) ?>">Edit</a> / <a href="javascript:void(0)" onclick="confirmdeletetreatment(<?php echo toPublicId($v->id); ?>)">Delete</a></td>
                </tr>
                <?php
                   $i++; }
                } ?>
                
            </table>
            <div class="clear"></div>
            <br/>
            <form name="add_treatment_type" id="add_treatment_type" action="<?php echo base_url() ?>home/add_treatmenttype">
                <div class="btnactive m5r">
                    <a href="javascript:void(0);" onclick="submit_form('add_treatment_type');">Add Treatment Type</a>
                </div>
            </form>
            
          <div class="clear"></div>
        </div>
      </article>
      </article>
    </section>
  </div>
</div>