<?php include('admin_header.php');?>
<?php include('admin_left.php');?>
<?php 
$cls='"border:1px solid #ff0000;margin:0px auto; width:350px; padding:10px; background:#FFECEC; margin-bottom:10px"';
if($this->session->userdata('msg')!="")
{
	$message=$this->session->userdata('msg');
	$cls='"border:1px solid #0000ff;margin:0px auto; width:350px; padding:10px; background:#D9DAFF; margin-bottom:10px"';
}
?>
<div class="rightColm">
            <div class="result_opt">
                <div class="left"><h2>View Survey Question</h2></div>
                <div class="right"><a href="<?php echo base_url(); ?>users/Viewusers"><< Back</a></div>
            </div>
            <div class="clear"></div>
            <?php if(isset($message)){?><div  style=<?php echo $cls?>><strong><?php echo $message ;?></strong></div><?php }?>
            <div class="tablWrap viewPerm">
            <table cellspacing="0" cellpadding="0" class="tHeader">
              <tr>
               
                <th class="col13">Domain</th>
                <th class="col13">Question</th>
                <th class="col13">Status</th>
                <th class="col13">Answered</th>
                <th class="action no-bgImage">Code</th>
              </tr>
      
<?php
$limit = $this->uri->segment(3);
if($limit=='')
{
$i=1;
}
else
{
$i=$limit+1;
}
if(count($surveylist)>0)
{
 foreach($surveylist as $surveylistone){
 
 ?>
	   <tr>
            <td class="col13"><?php echo $surveylistone->domain;?></td>
            <td class="col13"><?php echo $surveylistone->question_a;?></td>
            <td class="col13" align="center">
                <?php if(isset($surveylistone->status) && $surveylistone->status == 1){ ?>
                <img title="Active" src="<?php echo base_url(); ?>images/green.png">
                <?php }else { ?>
                <img title="Pause" src="<?php echo base_url(); ?>images/yellow.png">
                <?php } ?>
            </td>
            <td class="col13" align="center"><?php echo $surveylistone->answeredcount; ?></td>
            <td class="action"><a href="<?php echo base_url(); ?>users/viewSurveyCode/<?php echo $surveylistone->key; ?>/<?php echo $user_id ?>"><img title="Copy Code" height="16" width="16" src="<?php echo base_url(); ?>images/copy.png"></a></td>
           </tr>
            <?php $i++;} }else {?>
	     <div class="tablRowAlt"><div class="noRecord"><?php  echo "No record found ";?></div></div>
              <?php  } ?>
            </table>
             <div class="left"><img src="images/purpl_tabl_btm.png" width="678" height="6" alt="" /></div>
            </div>
            
           <div class="paging">
            
                <ul class="pagination paginationA paginationA01">
                <?php  echo $paging ?>
                </ul>
               
 
      </div>
    </div>
    
    <div class="clear"></div>
    
  </div><div class="left"><img src="images/content_btm.png" width="966" height="7" alt="" /></div></div>
  <!-- END CONTENT -->
  
  <div class="clear"></div>
</div>
<?php include('admin_footer.php');?>
<script language="javascript">
function checkValid()
{
   if(confirm("Are you sure to do this?"))
   {
     return true;
   }
   else
   {
     return false;
   }
}
</script>

