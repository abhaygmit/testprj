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
				<div class="panel-heading">
                                    <div style="width: 200px; float: right; text-align: right; "></div>
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
  
    <div style="text-align:center; font-weight:bold; font-size:18px; padding:10px; color:#990000"><?php echo $data[0]->match_name;?> Bet Winners</div>
<div style="clear:both"></div>
        <div style="width: 100%; ">
            <div style="border-radius: 4px 4px 0px 0px; border:1px solid #009900; height: 40px; padding: 5px; background-color: #08C">
                
               
                <div style="width:15%;" class="lstRowHeader"><a href="" style="color:white;">Tournament</a> </div>
                <div style="width:20%;" class="lstRowHeader"><a href="" style="color:white;">Match</a> </div>
                <div style="width:25%;" class="lstRowHeader"><a href="" style="color:white;">Proposition</a></div>
                <div style="width:15%;" class="lstRowHeader"><a href="" style="color:white;">User Name</a></div>
                <div style="width:10%;" class="lstRowHeader"><a href="" style="color:white;">Betting Code</a></div>
                <div class="no-bgImage lstRowHeader" align="center" style="width:10%;">Bet Amount</div>
                
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
                
               
                <div class="left" style="width:15%"><?php echo ($row->tournament_name?displayText($row->tournament_name, 30):'N/A')?></div>
                <div style="width:20%" class="left"><?php echo ($row->match_name?displayText($row->match_name, 30):'N/A') ?></div>
                
                <div class="left" style="width:25%"><?php echo ($row->proposition_title?displayText($row->proposition_title, 40):'N/A') ?></div>
                <div class="left" style="width:15%"><?php echo ($row->user_name?displayText($row->user_name, 30):'N/A') ?></div>
                <div class="left" style="width:10%"><?php echo $row->betting_code;?></div>
                <div class="left" style="width:10%; text-align: center"><?php echo ($row->bet_amount?displayText($row->bet_amount, 30):'N/A') ?>
            </div>
            	 
                </div>
            
  
              
              <?php $i++;}
			$query1=$this->db->query("select sum(bet_amount) as total from user_bets
						Left join bet_result on bet_result.bet_id=user_bets.id where bet_result.tournament_id=1 and bet_result.match_id=1")->result();
		?>
			<div style="text-align:right;font-size:16px; font-weight:bold; color:#000099;">Total: <?php echo $query1[0]->total;?> </div>
              <?php }else{
            ?>
              <tr>
                <tr> <td colspan="6"> No Record Available.</td></tr>
              </tr>
              <?php
            } // endif check result
			
            ?>
          
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

