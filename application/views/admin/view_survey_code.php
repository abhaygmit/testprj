<?php include('admin_header.php');?>
<?php include('admin_left.php');?>
<div class="rightColm">
            <div class="result_opt">
                <div class="left"><h2>View Survey Widget Code</h2></div>
                <div class="right"><a href="<?php echo base_url(); ?>users/viewSurveyQuestion/<?php echo $back; ?>"><< Back</a></div>
            </div>
            <div class="clear"></div>
            <div class="tablWrap viewPerm">
             <div class="stp4ColL">
                <div class="stp4_opt h120">
                  <textarea style="width:500px;color: #ACADAD;height:200px; border: 1px solid #CCCCCC;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;" onclick="select_all(this)"><!-- Placed at the end of the document so the pages load faster --><script type="text/javascript" src="http://<?php echo $servername; ?>/widget/widget.php?<?php echo trim($key); ?>" charset="UTF-8"></script><!-- Placed at the end of the document so the pages load faster --></textarea>
                  <div class="clear"></div>
                </div>
              </div>
             <div class="left"><img src="<?php echo base_url(); ?>images/purpl_tabl_btm.png" width="678" height="6" alt="" /></div>
            </div>
    </div>
    
    <div class="clear"></div>
    
  </div><div class="left"><img src="images/content_btm.png" width="966" height="7" alt="" /></div></div>
  <!-- END CONTENT -->
  
  <div class="clear"></div>
</div>
<?php include('admin_footer.php');?>
<script type="text/javascript">
    function select_all(obj) {
        var text_val=eval(obj);
        text_val.focus();
        text_val.select();
        if (!document.all) return; // IE only
        r = text_val.createTextRange();
        r.execCommand('copy');
    }
</script>


