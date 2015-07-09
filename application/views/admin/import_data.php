<?php include('admin_header.php');?>
<?php include('admin_left.php');?>
      <div class="rightColm">
        <div class="result_opt">
          <div class="left">
            <h2>Import Data And Generate Code</h2>
          </div>
          <div class="right" style="color:#FF0000">* Fields required</div>
        </div>
        <div class="border_r"></div>
        <div class="clear pTop10"></div>
        <div class="rightContWrap"	>
          <div class="rightContFrm">
            <?php $eror=validation_errors();
 			if($eror!=''){?>
            <div class="errorNotePane">
              <div class="errorNote">
                <div class="errorNoteTitle"> Error Notification</div>
                <div class="errorNotetxt"> <?php echo validation_errors(); ?> <br />
                </div>
              </div>
            </div>
            <div style="text-align:center; font-size:14px; color:#006633;">
              <?php }
			 if(@$message!=""){ echo $message.'<br/>'.$message2; }
			 ?>
            </div>
            <div class="adminAddWrap">
              <form action="" method="POST" id="imp_form" name="imp_form" enctype="multipart/form-data">
                <div class="adminFldRw posit_err">
                  <div class="admin_Labl" style="width:250px;">State <span style="color:#FF0000"> *</span></div>
                  <div class="">
                    <select id="state" name="state" style="border:1px solid #6D6D6D; color:#555555; font-size:12px; margin:3px 0; padding:6px 8px; margin-right:15px; width:230px;">
                      <?php foreach($usaStateList as $state){?>
                      <option value="<?php echo $state->statename;?>"><?php echo $state->statename;?></option>
                      <?php } ?>
                    </select>
                    <span id="usernameerr" class="error"></span></div>
                </div>
                <div class="adminFldRw posit_err">
                  <div class="admin_Labl" style="width:250px;">Profession <span style="color:#FF0000"> *</span></div>
                  <div class="">
                    <select id="category_id" name="category_id" style="border:1px solid #6D6D6D; color:#555555; font-size:12px; margin:3px 0; padding:6px 8px; margin-right:15px; width:230px;">
                      <?php foreach($professionList as $proff){?>
                      <option value="<?php echo $proff->id;?>"><?php echo $proff->category_name;?></option>
                      <?php } ?>
                    </select>
                    <span id="usernameerr" class="error"></span></div>
                </div>
                <div class="adminFldRw posit_err">
                  <div class="admin_Labl" style="width:250px;">Import Data <span style="color:#FF0000"> *(xls sheet only)</span></div>
                  <div class="">
                    <input type="file" name="importedFile" id="importedFile" size="24" value="" style="border:1px solid #6D6D6D; color:#555555; font-size:12px; margin:3px 0; padding:6px 8px; margin-right:15px; width:230px;">
                    <input type="hidden" name="files" id="files" value="1" />
                    <span id="usernameerr" class="error"></span></div>
                </div>
                <div class="adminFldRw pTop10">
                  <div class="admin_Labl" style="width:250px;">&nbsp;</div>
                  <div class="left">
                    <div class="btn left">
                      <input type="image" src="images/admin/btn_submit.png" name="submit" id="submit" value="IMPORT" />
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="left"><img src="images/admin/content_btm.png" width="996" height="7" alt="" /></div>
    </div>
    <div class="clear"></div>
  </div>
  <!-- END CONTENT -->
  <div class="clear"></div>
</div>
<?php include('admin_footer.php');?>
