<style>
  .slideSign{
	color:#f00;
}  
</style>



<script type="text/javascript">
$(document).ready(function(){
	$("#expanderHead").click(function(){
		$("#expanderContent").slideToggle();
		if ($("#expanderSign").text() == "+"){
			$("#expanderSign").html("−")
		}
		else {
			$("#expanderSign").text("+")
		}
	});
});
</script>


<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Propositions
                                    <div style="width: 200px; float: right; text-align: right; "><a href="">Create Proposition</a></div>
                                </div>
                                

				<div class="panel-body">
                                   
                                    
                                    
                                    
                                    
                                    
                                     <div class="adminAddWrap">
            	<div class="tablWrap">
 <?php 
 $tournament=array('1'=>'STPL Triangular Series');
 $match=array('1'=>'Strikers vs All Stars');
 $status=array('0'=>'In-active', '1'=>'Active');
?>
    <form name="frm_view" id="frm_view" action="" method="post">
   <div style="width:100%; float:left; "> 
        <div style="width:100px; float:left; height:30px"><label class="lblTxtCtrl">Tournament:<span style="color:990000;">*</span></label></div>
        <div style="width:300px; float:left"><select name="tournament_id" id="tournament_id" class="selectBoxAb" style="width:80%" onChange="getTNm()" >
                    <option value="0">Select Tournament</option>
                   <?php foreach($tournament as $key=>$value){?>
                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                   <?php } ?>
                    </select>
                    </div>
                    <div style="width:100px; float:left"> <label class="lblTxtCtrl">Match:<span style="color:990000;">*</span></label></div>
                  <div style="width:300px; float:left">  <select name="match_id" id="match_id" class="selectBoxAb" style="width:80%" onChange="getMNm()" >
                    <option value="0">Select Match</option>
                   <?php foreach($match as $key=>$value){?>
                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                   <?php } ?>
                    </select>
                    </div>
                   <div style="width:100px; float:left">
                   <input type="submit" name="save" value="Generate" class="btn" />
                   </div> 
                    
    </div>
    
    
    <div style="clear:both"></div>
    

        <div style="width: 100%; display=<?php echo $disp; ?>">
            <div style="border-radius: 4px 4px 0px 0px; border:1px solid #009900; height: 40px; padding: 5px; background-color: #08C">
                <div style="width:5%;"  class="lstRowHeader">S.No.</div>
               
                <div style="width:15%;" class="lstRowHeader"><a href="" style="color:white;">User Name</a> </div>
                <div style="width:20%;" class="lstRowHeader"><a href="" style="color:white;">Email</a> </div>
                <div style="width:15%;" class="lstRowHeader"><a href="" style="color:white;">Betting Code</a></div>
                <div style="width:10%;" class="lstRowHeader"><a href="" style="color:white;">Bet On</a></div>
                <div style="width:10%;" class="lstRowHeader"><a href="" style="color:white;">Answer</a></div>
                <div class="no-bgImage lstRowHeader" align="center" style="width:10%;">Bet Amount</div>
                <div class="no-bgImage lstRowHeader" align="center" style="width:10%;">Winner</div>
              </div>
              <?php
        if(count($data) >0)
        {
          //echo '<pre>';print_r($data); exit;
        ?>
             
       <?php
	  $limit = @$_REQUEST['per_page'];
		if($limit==''){
                    $i=1;
		}else{
                    $i=$limit+1;
		}
                
            foreach($data as $row){
		
           ?>
            <div style="border:1px solid #009900; min-height: 40px; padding: 5px; ">
                <div class="left" style="width:5%"><?php echo $i;?><?php /*?><input type="checkbox" name="selId[]" id="selId" value="<?php echo $row->id;?>" /><?php */?></div>
               
                <div class="left" style="width:15%"><?php echo ($row->user_name?displayText($row->user_name, 30):'N/A')?></div>
                <div style="width:20%" class="left"><a id="expanderHead"><?php echo ($row->user_email?displayText($row->user_email, 30):'N/A') ?></a></div>
                
                <div class="left" style="width:15%"><?php echo $row->betting_code;?></div>
                <div class="left" style="width:10%"><?php echo $row->bet_id;?></div>
                <div class="left" style="width:10%"><?php echo ($row->bet_as==1)?"NO":"YES";?></div>
                <div class="left" style="width:10%; text-align: center"><?php echo ($row->bet_amount?displayText($row->bet_amount, 30):'N/A') ?>
            </div>
            	 <div class="left" style="width:10%; text-align: center">
                 <input type="hidden" name="tid" value="<?php echo $row->tournament_id;?>" />
                 <input type="hidden" name="mid" value="<?php echo $row->match_id;?>" />
                 <input type="hidden" name="bid" value="<?php echo $row->id;?>" />
                 <input type="hidden" name="pid" value="<?php echo $row->proposition_id;?>" />
                 <input type="hidden" name="bet_as" value="<?php echo $row->bet_as;?>" />
                 
				 <input type="checkbox" name="winner[<?php echo $row->id; ?>]" id="winner[]"> 
            </div>
                </div>
            
  
              
              <?php $i++;}?>
              <?php }else{
            ?>
              <tr>
                <tr> <td colspan="6"> No Record Available.</td></tr>
              </tr>
              <?php
            } // endif check result
			
            ?>
           <div style="text-align:center;margin-top:10px"> <input type="submit" name="generate" value="Generate Result" class="btn" /></div>
            </div>
          </form>
                </div>
                
                 	<?php if(count($data)>0){?>
                    <div class="paging">
                      <ul class="pagination paginationA paginationA01">
                        <?php // $page_links; ?>
                      </ul>
                    </div>
                    <?php }?>
            </div>
                                    
                                 <br>
                                     
				</div>
			</div>
		</div>
	</div>
</div>

