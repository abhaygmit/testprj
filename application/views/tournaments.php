<?php //echo 'abhay';?>
<script>

function viewPlayer(val)
{
	if(val==1){
		$('#team1').css('display', 'block');
		$('#team2').css('display', 'none');
		$('#team3').css('display', 'none');
		$('#stats').css('display', 'none');
		$('#pointsTable').css('display', 'none');	
	}
	else if(val==2){
		$('#team2').css('display', 'block');	
		$('#team1').css('display', 'none');
		$('#team3').css('display', 'none');
		$('#stats').css('display', 'none');
		$('#pointsTable').css('display', 'none');
	}
	else if(val==3){
		$('#team3').css('display', 'block');
		$('#team1').css('display', 'none');
		$('#team2').css('display', 'none');	
		$('#stats').css('display', 'none');
		$('#pointsTable').css('display', 'none');
	}
	else if(val=='stats'){
		$('#stats').css('display', 'block');
		$('#team3').css('display', 'none');
		$('#team1').css('display', 'none');
		$('#team2').css('display', 'none');	
		$('#pointsTable').css('display', 'none');
	}
	else if(val=='pointsTable'){

		$('#pointsTable').css('display', 'block');
		$('#stats').css('display', 'none');
		$('#team3').css('display', 'none');
		$('#team1').css('display', 'none');
		$('#team2').css('display', 'none');	
	}
	
}

</script>

<div class="container">
    <div class="row-fluid">
     
      <div class="selectHow_txtWrap clearfix pTop20 font18">

	<div style="float:left; width:80%;">
		<div style="float:left; width:150px; font-size:14px;"><strong>Tournament</strong></div>
		<?php foreach($teams as $team){ ?>
				
			<div style="float:left; width:80px;">	
			<a onclick="viewPlayer(<?php echo $team->id; ?>)" ><?php echo $team->team_name; ?></a></div><?php } ?>
		
		<div style="float:left; width:80px;"><a onclick="viewPlayer('stats')">Stats</a></div>
		<div style="float:left; width:80px;"><a onclick="viewPlayer('pointsTable')">Points Table</a></div>
	</div>
     
     </div>
	<div id="team1" style="display:none">
	<?php foreach($squads as $squad){
		if($squad->team_id==1){		
	?>
	
	<div style="margin-top:60px;">
									
		<div style="width:300px; float:left; font-weight:bold; font-size:13px;margin-top:20px; margin-bottom:50px">
		<div style="width:150px;float:left;text-align:center"><?php echo $squad->team_name;?></div>
		<div style="width:120px; height="100px; padding:5px"><img src="<?php echo base_url()?>images/noimage.png" /></div>
		<div style="width:150px;text-align:center"><?php echo $squad->player_name; ?></div>
		</div>
	</div>				
		<?php }?>
	<?php } ?>
</div>
	<div style="clear:both"></div>
	<div id="team2" style="display:none">
	<?php foreach($squads as $squad){
		if($squad->team_id==2){		
	?>
	<div style="margin-top:60px;">	
		<div style="width:300px; float:left; font-weight:bold; font-size:13px;margin-top:20px; margin-bottom:50px"">
		<div style="width:150px;float:left; text-align:center"><?php echo $squad->team_name;?></div>
		<div style="width:120px; height="100px; padding:5px"><img src="<?php echo base_url()?>images/noimage.png" /></div>
		<div style="width:150px;text-align:center"><?php echo $squad->player_name; ?></div>
		</div>	
	</div>
	<?php }}?>
</div>
	<div class="clear"></div>
	<div id="team3" style="display:none">
	<?php foreach($squads as $squad){
		if($squad->team_id==3){		
	 ?>
	<div style="margin-top:60px;">
		<div style="width:300px; float:left; font-weight:bold; font-size:13px;margin-top:20px; margin-bottom:50px"">
		<div style="width:150px;float:left;text-align:center"><?php echo $squad->team_name;?></div>
		<div style="width:120px; height="100px; padding:5px"><img src="<?php echo base_url()?>images/noimage.png" /></div>
		<div style="width:150px;text-align:center"><?php echo $squad->player_name; ?></div>
		</div>
	</div>
		<?php }}?>
		</div>
	</div>

	<div id="stats" style="display:none;" >
		
	<div style="width:40%; float:left; padding:5px">	
		<div style="text-align:center; font-weight:bold; font-size:14px;">Batting Statistics</div>	
		<div style="border:1px solid #009900; min-height: 40px; padding: 5px; background-color:#ccc;">
                <div class="left" style="width:7%;">No.</div>
               
                <div class="left" style="width:30%; ">Player Name</div>
                <div style="width:25%" class="left">Match Played</div>
                
                <div class="left" style="width:15%">Runs</div>
		<div class="left" style="width:10%">Sixes</div>
		<div class="left" style="width:12%">Fours</div>
                
	</div>

	             
       <?php
	 
            $i=1;
	    foreach($stats as $row){
		
           ?>
            <div style="border:1px solid #009900; min-height: 40px; padding: 5px; ">
                <div class="left" style="width:5%"><?php echo $i;?></div>
               
                <div class="left" style="width:30%"><?php echo ($row->player_name?displayText($row->player_name, 30):'N/A')?></div>
                <div style="width:25%; text-align:center" class="left"><a id="expanderHead"><?php echo $row->match_played;?></a></div>
                
                <div class="left" style="width:15%;text-align:center"><?php echo $row->runs;?></div>
		<div class="left" style="width:12%;text-align:center"><?php echo $row->sixes;?></div>
		<div class="left" style="width:12%;text-align:center"><?php echo $row->fours;?></div>
                
	</div>


<?php $i++;}?>
              
	</div>


	



		<div style="width:40%; float:left;padding:5px">	
		<div style="text-align:center; font-weight:bold; font-size:14px;">Bowling Statistics</div>	
		<div style="border:1px solid #009900; min-height: 40px; padding: 5px; background-color:#ccc;">
                <div class="left" style="width:5%">No.</div>
               
                <div class="left" style="width:30%">Player Name</div>
                <div style="width:25%" class="left">Match Played</div>
                
                <div class="left" style="width:12%">Overs</div>
		<div class="left" style="width:15%">Runs</div>
		<div class="left" style="width:10%">Wickets</div>
                
	</div>

	
             
       <?php
	  
            $i=1;
	    foreach($bowlerStats as $row){
		
           ?>
            <div style="border:1px solid #009900; min-height: 40px; padding: 5px; ">
                <div class="left" style="width:5%"><?php echo $i;?></div>
               
                <div class="left" style="width:30%"><?php echo ($row->player_name?displayText($row->player_name, 30):'N/A')?></div>
                <div style="width:25%;text-align:center" class="left"><a id="expanderHead"><?php echo $row->match_played;?></a></div>
                
                <div class="left" style="width:10%;text-align:center"><?php echo $row->overs;?></div>
		<div class="left" style="width:15%;text-align:center"><?php echo $row->runs_given;?></div>
		<div class="left" style="width:10%;text-align:center"><?php echo $row->wickets;?></div>
                
	</div>


<?php $i++;}?>
             





	</div>

	















<div id="pointsTable" style="display:none;" >
		
	<div style="width:40%; float:left; padding:5px">	
		<div style="text-align:center; font-weight:bold; font-size:14px;">Points Table</div>	
		<div style="border:1px solid #009900; min-height: 40px; padding: 5px; background-color:#ccc;">
                <div class="left" style="width:7%;">No.</div>
               
                <div class="left" style="width:30%; ">Team Name</div>
                <div style="width:25%" class="left">Match Played</div>
                
                <div class="left" style="width:15%">Wins</div>
		<div class="left" style="width:10%">Lose</div>
		<div class="left" style="width:12%">Points</div>
		<div class="left" style="width:12%">NRR</div>
                
	</div>

	             
       <?php
	 
            $i=1;
	    foreach($stats as $row){
		
           ?>
            <div style="border:1px solid #009900; min-height: 40px; padding: 5px; ">
                <div class="left" style="width:5%"><?php echo $i;?></div>
               
                <div class="left" style="width:30%"><?php echo ($row->player_name?displayText($row->player_name, 30):'N/A')?></div>
                <div style="width:25%; text-align:center" class="left"><a id="expanderHead"><?php echo $row->match_played;?></a></div>
                
                <div class="left" style="width:15%;text-align:center"><?php echo $row->runs;?></div>
		<div class="left" style="width:12%;text-align:center"><?php echo $row->sixes;?></div>
		<div class="left" style="width:12%;text-align:center"><?php echo $row->fours;?></div>
                
	</div>


<?php $i++;}?>
              
	</div>


	



		<div style="width:40%; float:left;padding:5px">	
		<div style="text-align:center; font-weight:bold; font-size:14px;">Bowling Statistics</div>	
		<div style="border:1px solid #009900; min-height: 40px; padding: 5px; background-color:#ccc;">
                <div class="left" style="width:5%">No.</div>
               
                <div class="left" style="width:30%">Player Name</div>
                <div style="width:25%" class="left">Match Played</div>
                
                <div class="left" style="width:12%">Overs</div>
		<div class="left" style="width:15%">Runs</div>
		<div class="left" style="width:10%">Wickets</div>
                
	</div>

	
             
       <?php
	  
            $i=1;
	    foreach($bowlerStats as $row){
		
           ?>
            <div style="border:1px solid #009900; min-height: 40px; padding: 5px; ">
                <div class="left" style="width:5%"><?php echo $i;?></div>
               
                <div class="left" style="width:30%"><?php echo ($row->player_name?displayText($row->player_name, 30):'N/A')?></div>
                <div style="width:25%;text-align:center" class="left"><a id="expanderHead"><?php echo $row->match_played;?></a></div>
                
                <div class="left" style="width:10%;text-align:center"><?php echo $row->overs;?></div>
		<div class="left" style="width:15%;text-align:center"><?php echo $row->runs_given;?></div>
		<div class="left" style="width:10%;text-align:center"><?php echo $row->wickets;?></div>
                
	</div>


<?php $i++;}?>
             





	</div>




    </div>
  </div>
