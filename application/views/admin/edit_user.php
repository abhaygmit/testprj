<?php include('admin_header.php'); ?>
<?php include('admin_left.php'); ?>
<style>
.rederror p
{
    color:red;font-size:12px;
    padding-top:5px;
}

</style>
<div class="rightColm">
    <div class="result_opt">
        <div class="left"><h2>Edit User</h2></div>
        <div class="right" style="color:#FF0000">* Fields required</div>
    </div>

    <div class="border_r"></div>

    <div class="clear pTop10"></div>
    <div class="rightContWrap"	>
        <div class="rightContFrm">
            <div class="adminAddWrap">
                <form action="users/EdituserProfile/<?php echo $user_encoded; ?>" method="POST"  id="registration_form" >
                    <div class="adminFldRw posit_err">
                        <div class="admin_Labl">Full Name<span style="color:#FF0000">*</span></div>
                        <div class="adminInptTxt"><input type="text" name="full_name" id="full_name" maxlength="30"  value="<?php echo $user_data[0]->full_name; ?>" />
                            <span class="rederror"><?php echo form_error('full_name'); ?></span>
                        </div>

                    </div>

                    <div class="adminFldRw posit_err">
                        <div class="admin_Labl">Practice ID<span style="color:#FF0000">*</span></div>
                        <div class="adminInptTxt"><input type="text" readonly="readonly" name="practice_id" id="practice_id" maxlength="30"  value="<?php echo $user_data[0]->practice_id; ?>" />
                            <span id="last_name_err" class="error"></span>
                        </div>
                    </div>

                    <div class="adminFldRw posit_err">
                        <div class="admin_Labl">Email<span style="color:#FF0000">*</span></div>
                        <div class="adminInptTxt"><input type="text" readonly="readonly" name="email" id="email" maxlength="30" readonly value="<?php echo $user_data[0]->email; ?>" /></div>
                    </div>

                    <div class="adminFldRw posit_err">
                        <div class="admin_Labl">Address 1<span style="color:#FF0000">*</span></div>
                        <div class="adminInptTxt"><input type="text" name="address_line1" id="address_line1" maxlength="30"  value="<?php echo $user_data[0]->address_line1; ?>" />
                            <span id="company_name_err" class="error"></span>
                        </div>
                    </div>

                    <div class="adminFldRw posit_err">
                        <div class="admin_Labl">Address 2<span style="color:#FF0000">*</span></div>
                        <div class="adminInptTxt"><input type="text" name="address_line2" id="address_line2" maxlength="30"  value="<?php echo $user_data[0]->address_line2; ?>" />
                            <span id="street_address_err" class="error"></span>
                        </div>
                    </div>
                    <div class="adminFldRw posit_err">
                        <div class="admin_Labl">State<span style="color:#FF0000">*</span></div>
                        <div class="adminInptTxt"><input type="text" name="state" id="state" maxlength="30"  value="<?php echo $user_data[0]->state; ?>" />
                            <span id="state_err" class="error"></span>
                        </div>
                    </div>

                    <div class="adminFldRw posit_err">
                        <div class="admin_Labl">Country<span style="color:#FF0000">*</span></div>
                        <div class="adminInptTxt">
                            <?php //asd($countylist); ?>
                            <select name="country" id="country">   
                            <option value="">Select</option>    
                            <?php 
                            
                            if(count($countylist)>0)
                            {
                                foreach($countylist as $k=>$v)
                                {
                            ?>
                            <option value="<?php echo $v->ccode; ?>" <?php echo ($user_data[0]->country == $v->ccode)?'selected':'' ?>><?php echo utf8_decode($v->country); ?></option>     
                            <?php  
                                }
                            }
                            ?>  
                            </select>
                        </div>
                    </div>



                    <div class="adminFldRw posit_err">
                        <div class="adminFldRw posit_err">
                            <div class="admin_Labl">Status<span style="color:#FF0000"></span></div>
                            <div class="adminInptTxt">
                                <select name="active_status">
                                    <option value="0" <?php if ($user_data[0]->active_status == '0') echo 'selected'; ?>>Inactive</option>
                                    <option value="1" <?php if ($user_data[0]->active_status == '1') echo 'selected'; ?>>Active</option>                                   
                                </select>

                            </div>
                        </div>


                        <div class="adminFldRw pTop10">
                            <div class="admin_Labl">&nbsp;</div>
                            <div class="left"><div class="btn left"><span class="franklin-g">
                                        <input type="hidden" name="id" value="<?php echo $user_data[0]->id; ?>" />
                                        <input type="image"  src= "images/btn_submit.png" name="submit" id="submit" value="ADD" />
                                        &nbsp;&nbsp;<a onclick="history.go(-1)" href="javascript:void('0')">
                                            <img src= "images/btn_cancel.png" name="cancel" id="cancel" value="cancel" tabindex="31" />
                                        </a>
                                </div></div>	
                        </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>
<div class="clear"></div>
</div>
<!-- END CONTENT -->
<div class="clear"></div>
</div>
<?php include('admin_footer.php'); ?>