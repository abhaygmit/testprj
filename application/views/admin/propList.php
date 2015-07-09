
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js" type="text/javascript"></script>-->
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
                                    <div style="width: 200px; float: right; text-align: right; "><a href="<?php echo base_url()?>admin/createProps">Create Proposition</a></div>
                                </div>
                                

				<div class="panel-body">
                                   
                                    
                                    
                                    
                                    
                                    
                                     <div class="adminAddWrap">
            	<div class="tablWrap">
  
    <form name="frm_view" id="frm_view" action="" method="post">

        <div style="width: 100%;">
            <div style="border-radius: 4px 4px 0px 0px; border:1px solid #009900; height: 40px; padding: 5px; background-color: #08C">
                <div style="width:5%;"  class="lstRowHeader">S.No.</div>
               
                <div style="width:40%;" class="lstRowHeader"><a href="" style="color:white;">Tournament</a> </div>
                <div style="width:25%;" class="lstRowHeader"><a href="" style="color:white;">Match</a> </div>
                <div style="width:20%;" class="lstRowHeader"><a href="" style="color:white;">Match Date</a></div>
                <div class="no-bgImage lstRowHeader" align="center" style="width:10%;">Action</div>
              </div>
              <?php
        if(count($data) >0)
        {
          
        ?>
             
       <?php
	  $limit = @$_REQUEST['per_page'];
		if($limit==''){
                    $i=1;
		}else{
                    $i=$limit+1;
		}
            foreach($data as $row){
		//prn($row);
           ?>
            <div style="border:1px solid #009900; min-height: 40px; padding: 5px; ">
                <div class="left" style="width:5%"><?php echo $i;?></div>
               
                <div class="left" style="width:40%"><?php echo ($row->tournament_name?displayText($row->tournament_name, 30):'N/A')?></div>
                <div style="width:25%" class="left"><a id="expanderHead"><?php echo ($row->match_name?displayText($row->match_name, 30):'N/A')?></a></div>
                
                <div class="left" style="width:20%"><?php echo date('M d Y H:i',strtotime($row->match_date));?></div>
                <div class="left" style="width:10%; text-align: center">
                 <a href="<?php ?>"><img src="<?php echo base_url()?>images/user_edit.png" /></a>  
                 <a href="<?php ?>"><img src="<?php echo base_url()?>images/icon_delete.png" onclick="return confirm('Are you sure you want to delete prop.')" /></a>   
                 
                 <a href="">
                     <?php if($row->status==1) {?>
                     <img src="<?php echo base_url()?>images/green.png" alt="Active" title="Active" /></a>  
                     <?php }elseif($row->status==0){ ?>
                 <img src="<?php echo base_url()?>images/red.png" alt="In-Active" title="In-Active" /></a>  
                     <?php } ?>  
                
                </div>
                
                <div id="expanderContent" style="display:none; margin-top: 35px; margin-left: 20px">
                        <form name="frm_view" id="frm_view" action="" method="post">

        <div style="width: 100%;">
            <div style="border-radius: 4px 4px 0px 0px; border:1px solid #009900; height: 40px; padding: 5px; background-color: #ccc">
                <div style="width:5%;"  class="lstRowHeader">S.No.</div>
               <div style="width:50%;" class="lstRowHeader"><a href="" style="color:white;">Proposed to bet on</a> </div>
               
                <div style="width:15%;" class="lstRowHeader"><a href="" style="color:white;">Match</a> </div>
                <div style="width:10%;" class="lstRowHeader"><a href="" style="color:white;">Match Date</a></div>
                <div class="no-bgImage lstRowHeader" align="center" style="width:10%;">Action</div>
                <div class="no-bgImage lstRowHeader" align="center" style="width:5%;">Yes</div>
                <div class="no-bgImage lstRowHeader" align="center" style="width:5%;">No</div>
              </div>
              <?php
        if(count($data) >0)
        {
          
        ?>
             
       <?php
	 $data1=$this->db->query("select propositions.*, matches.match_date from propositions left join matches on matches.id=propositions.match_id where match_id=$row->id ")->result();
            foreach($data1 as $row1){
               if(!empty($row1->id)){
                $ids= $row1->id;
		$query=$this->db->query("select sum(bet_amount) as bet_amount from user_bets where bet_id=$ids and bet_as=2")->result();
                  
                
                $query1=$this->db->query("select sum(bet_amount) as bet_amount from user_bets where bet_id=$ids and bet_as=1")->result();
                  
               }
              
           ?>
            <div style="border:1px solid #009900; min-height: 30px; padding: 5px; ">
                <div class="left" style="width:5%"><?php echo $i;?></div>
               <div class="left" style="width:50%"><?php echo ($row1->proposition_title?displayText($row1->proposition_title, 70):'N/A')?></div>
                
                <div style="width:15%" class="left"><?php echo  ($row1->match_name?displayText($row1->match_name, 30):'N/A') ?></div>
                
                <div class="left" style="width:10%"><?php echo date('d/m/Y H:i',strtotime($row1->match_date));?></div>
                <div class="left" style="width:10%; text-align: center">
                 <a href="<?php echo base_url()?>admin/createProps"><img src="<?php echo base_url()?>images/user_edit.png" /></a>  
                 <a href="<?php echo base_url().'admin/deleteProp/'.$row->id?>"><img src="<?php echo base_url()?>images/icon_delete.png" onclick="return confirm('Are you sure you want to delete prop.')" /></a>   
                 
                
                </div>
                <div class="left" style="width:5%; text-align: right;font-size:10px"><?php echo (!empty($query[0]->bet_amount)?$query[0]->bet_amount:""); ?> |</div>
                <div class="left" style="width:5%; text-align: right;font-size:10px"><?php echo (!empty($query1[0]->bet_amount)?$query1[0]->bet_amount:""); ?></div>
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
            </div>
          </form>
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
