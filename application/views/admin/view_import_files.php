<?php include('admin_header.php');?>
<?php include('admin_left.php');?>
      <div class="rightColm">
        <div class="result_opt">
          <div class="left">
            <h2>View Import Data</h2>
          </div>
        </div>
        <div class="clear"></div>
        <div class="p10"> </div>
        <div class="tablWrap viewPerm">
          <table width="100%" cellpadding="0" cellspacing="0" class="tHeader">
            <tr>
              <th class="col13">State</th>
              <th class="col13">Profession</th>
              <th class="col27">File Name</th>
              <th class="col13">Total Record On File</th>
              <th class="action no-bgImage">Date</th>
            </tr>
            <?php
            $limit = $_REQUEST['per_page'];
            if($limit=='')
            {
            	$i = 1;
            }
            else
            {
           		$i = $limit+1;
            }
            if(count($userslist)>0)
            {
             	foreach($userslist as $userlist)
			 	{				
			   ?>
            <tr>
              <td class="col13"><?php echo $userlist->state;?></td>
              <td class="col13"><?php echo $userlist->category_name;?></td>
              <td class="col13"><?php echo $userlist->file_name;?></td>
              <td class="col27"><?php echo $userlist->total_recordes;?></td>
              <td class="col13"><?php echo $userlist->current_date;?></td>
            </tr>
            <?php $i++;} }else {?>
            <div class="tablRowAlt">
              <div class="noRecord">
                <?php  echo "<b>No record found.</b>";?>
              </div>
            </div>
            <?php } ?>
          </table>
          <div class="left"><img src="<?php echo base_url();?>images/admin/purpl_btm_sml.png" width="765" height="6" alt="" /></div>
        </div>
        <div class="paging" style="width:765px;">
          <ul class="pagination paginationA paginationA01">
            <?php  echo $paging ?>
          </ul>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="left"><img src="<?php echo base_url();?>images/admin/content_btm.png" width="996" height="7" alt="" /></div>
  </div>
  <!-- END CONTENT -->
  <div class="clear"></div>
</div>
<?php include('admin_footer.php');?>
