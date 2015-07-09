<script>
function reset_form()
{
	document.getElementById("firstName").value='';
	document.getElementById("lastName").value='';	
	document.getElementById("address1").value='';	
	document.getElementById("address2").value='';	
	document.getElementById("city").value='';	
	document.getElementById("state").value='';	
	document.getElementById("country").value='';	
	document.getElementById("zip").value='';	
	document.getElementById("creditCardNumber").value='';
	document.getElementById("cvv2Number").value='';	
	
}

</script>
<style>
.success{color:#009900;}
</style>

<div class="container">
    <div class="row-fluid">
      <?php if($this->session->userdata('msg')){ ?>   
      <span class="rederror" id="main_error"><?php echo $this->session->userdata('msg'); ?></span>
      <?php } ?>
      <div class="selectHow_txtWrap clearfix pTop20 font18">Please provide following informations:</div>
      <form method="post" action=""  namne="payment_form" id="payment_form">
      <div class="stp5_frmWrap">
        <div class="forminwrap">
          <div class="fldLable">First Name:<span class="rederrorstar">*&nbsp;&nbsp;</span></div>
          <div class="fldWrap">
            <input type="text" name="firstName" id="firstName" value="<?php echo ($_POST['firstName'])?$_POST['firstName']:$firstname; ?>" placeholder="First Name">
            <span class="rederror"><?php echo form_error('firstName'); ?></span>
          </div>
          <div class="clear"></div>
        </div>
          <div class="forminwrap">
          <div class="fldLable">Last Name:<span class="rederrorstar">*&nbsp;&nbsp;</span></div>
          <div class="fldWrap">
            <input type="text" name="lastName" id="lastName" value="<?php echo ($_POST['lastName'])?$_POST['lastName']:$lastname; ?>" placeholder="Last Name">
            <span class="rederror"><?php echo form_error('lastName'); ?></span>
          </div>
          <div class="clear"></div>
        </div>
        <div class="forminwrap">
          <div class="fldLable">Address1:<span class="rederrorstar">*&nbsp;&nbsp;</span></div>
          <div class="fldWrap">
            <input type="text" name="address1" id="address1" value="<?php echo $_POST[address1]; ?>" placeholder="Address 1">
            <span class="rederror"><?php echo form_error('address1'); ?></span>
          </div>
          <div class="clear"></div>
        </div>
          <div class="forminwrap">
          <div class="fldLable">Address2:</div>
          <div class="fldWrap">
            <input type="text" name="address2" id="address2" value="<?php echo $_POST[address2]; ?>" placeholder="Address 2">
            <span class="rederror"><?php echo form_error('address2'); ?></span>
          </div>
          <div class="clear"></div>
        </div>
        <div class="forminwrap">
          <div class="fldLable">City:<span class="rederrorstar">*&nbsp;&nbsp;</span></div>
          <div class="fldWrap">
            <input type="text" name="city" id="city" value="<?php echo $_POST[city]; ?>" placeholder="City">
            <span class="rederror"><?php echo form_error('city'); ?></span>
          </div>
          <div class="clear"></div>
        </div>
        <div class="forminwrap">
          <div class="fldLable">State:<span class="rederrorstar">*&nbsp;&nbsp;</span></div>
          <div class="fldWrap">
            <input type="text" name="state" id="state" value="<?php echo $_POST[state]; ?>" placeholder="State">
            <span class="rederror"><?php echo form_error('state'); ?></span>
          </div>
          <div class="clear"></div>
        </div>
        <div class="forminwrap">
          <div class="fldLable">Country:<span class="rederrorstar">*&nbsp;&nbsp;</span></div>
          <div class="fldWrap">
            <select name="country" id="country" id="country">   
            <option value="">Select</option>    
            <?php //asd($countylist); 
            if(count($countylist)>0)
            {
                foreach($countylist as $k=>$v)
                {
            ?>
            <option value="<?php echo $v->ccode; ?>" <?php echo ($_POST[country] == $v->ccode)?'selected':'' ?>><?php echo utf8_decode($v->country); ?></option>     
            <?php  
                }
            }
            ?>  
            </select>
            
            <span class="rederror"><?php echo form_error('country'); ?></span>
          </div>
          <div class="clear"></div>
        </div>
        <div class="forminwrap">
          <div class="fldLable">Zip:<span class="rederrorstar">*&nbsp;&nbsp;</span></div>
          <div class="fldWrap">
            <input type="text" name="zip" id="zip" value="<?php echo $_POST[zip]; ?>" placeholder="Zip">
            <span class="rederror"><?php echo form_error('zip'); ?></span>
          </div>
          <div class="clear"></div>
        </div>
       <!-- <div class="forminwrap">
          <div class="fldLable"><span class="rederrorstar">*&nbsp;&nbsp;</span>Amount:</div>
          <div class="fldWrapsmall">-->
              <input type="hidden" name="amount" value="1.00" placeholder="amount" readonly>
           <!-- <span class="rederror"><?php echo form_error('amount'); ?></span>
          </div>
          <div class="clear"></div>
        </div>-->
       <div class="forminwrap">
          <div class="fldLable">Card Type:<span class="rederrorstar">*&nbsp;&nbsp;</span></div>
          <div class="fldWrap">
               <select name="creditCardType" id="creditCardType" >   
               <option value="">--Select Card--</option>                 
                <option value="Visa" >Visa</option>
                <option value="MasterCard">MasterCard</option>
                <option value="Discover">Discover</option>
                <option value="Amex">American Express</option>
               </select>
              <span class="rederror"><?php echo form_error('creditCardType'); ?></span>
          </div>
          <div class="clear"></div>
        </div>
        <div class="forminwrap">
          <div class="fldLable">Card Number:<span class="rederrorstar">*&nbsp;&nbsp;</span></div>
          <div class="fldWrap">
               <input type="text" autocomplete="off" name="creditCardNumber" id="creditCardNumber" maxlength="16" placeholder="Card Number" value=""/>
               <span class="rederror"><?php echo form_error('creditCardNumber'); ?></span>
          </div>
          <div class="clear"></div>
        </div>
        <div class="forminwrap">
          <div class="fldLable">Card Expiry:<span class="rederrorstar">*&nbsp;&nbsp;</span></div>
          <div class="fldWrap">
               <select name="expDateMonth" id="expDateMonth" style="width:141px;">
                <option value="1">01</option>
                <option value="2">02</option>
                <option value="3">03</option>
                <option value="4">04</option>
                <option value="5">05</option>
                <option value="6">06</option>
                <option value="7">07</option>
                <option value="8">08</option>
                <option value="9">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                </select>
                <select name="expDateYear" id="expDateYear" style="width:142px;">
                <?php
                    for($i=date('Y');$i<date('Y')+10;$i++)
                    {
                ?>
                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                <?php
                    }
                ?>
                </select>
          </div>
          <div class="clear"></div>
        </div>
        <div class="forminwrap">
          <div class="fldLable">CVV Number:<span class="rederrorstar">*&nbsp;&nbsp;</span></div>
          <div class="fldWrap">
               <input type="password" autocomplete="off" name="cvv2Number" id="cvv2Number" maxlength="3" placeholder="CVV" value=""/>
               <span class="rederror"><?php echo form_error('cvv2Number'); ?></span>
          </div>
          <div class="clear"></div>
        </div>
        
         <div class="forminwrap">
          <div class="fldLable"></div>
          <div class="fldWrap" style="text-align:justify">
          We recognize that our users expect privacy and security for their personal and financial affairs. We understand that, by selecting us for your needs, you have entrusted us to safeguard your personal financial information. We want you to be informed of our commitment to protect the privacy of your personal financial information with the following privacy principles and practices.
          </div>
          <div class="clear"></div>
        </div>
        
        
        
        <div class="forminwrap">
          <div class="fldLable">&nbsp;</div>
          <div class="fldWrap">
              <div ><input class="btnactive_input" type="submit" name="pay_submit_btn" value="Pay Now"></div>
              <div><input class="btninactive" type="button" name="pay_cancel_btn" value="Cancel" onclick="reset_form('payment_form');"></div>
          </div>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
      </div>
      </form>
    </div>
</div>