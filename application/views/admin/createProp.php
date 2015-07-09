
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
                            <div class="panel-heading" ><span style="font-size: 14px; font-weight: bold;">Create Proposition</span>
                                    <div style="width: 200px; float: right; text-align: right; "><a href="<?php echo base_url()?>admin/proposition">View Propositions</a></div>
                                </div>
                                

				<div class="panel-body">
                                    
    <script>
        function getTNm()
        {
            
            var a=$('#tournament_id>option:selected').text();
            $('#tournament_name').val(a);
        }
        function getMNm()
        {
            var a=$('#match_id>option:selected').text();
            $('#match_name').val(a);
        }
        
    </script>                                  
<?php 
 $tournament=array('1'=>'STPL Triangular Series');
 $match=array('1'=>'Strikers vs All Stars', '2'=>'All Stars vs Strikers');
 $status=array('0'=>'In-active', '1'=>'Active');
?>
<form  method="post" action="">                 

    <ul>

       <li>
       		<label class="lblTxtCtrl">Tournament:<span style="color:990000;">*</span></label>
            <select name="tournament_id" id="tournament_id" class="selectBoxAb" onChange="getTNm()" >
            <option value="0">Select Tournament</option>
           <?php foreach($tournament as $key=>$value){?>
           	<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
           <?php } ?>
            </select>
            
        </li>
         <li>
           <label class="lblTxtCtrl">Match:<span style="color:990000;">*</span></label>
            <select name="match_id" id="match_id" class="selectBoxAb" onChange="getMNm()" >
            <option value="0">Select Match</option>
           <?php foreach($match as $key=>$value){?>
           	<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
           <?php } ?>
            </select>
            
            
          
        </li>
        
        
        <li>
            <input type="hidden" id="tournament_name" name="tournament_name"/>
            <input type="hidden" id="match_name" name="match_name"/>
            <label class="lblTxtCtrl">Proposition Title:<span style="color:990000;">*</span></label>
            <input type="text" name="proposition_title" id="proposition_title" class="form-control" placeholder="Proposition Title" >
            
        </li>
           
         <li>
            <label class="lblTxtCtrl">Status:<span style="color:990000;">*</span></label>
            <select name="status" id="status" class="selectBoxAb"  >
            <option value="0">Select Status</option>
           <?php foreach($status as $key=>$value){?>
           	<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
           <?php } ?>
            </select>
        </li>
           

        <li>
        	 <input type="submit" class="btn" value="Save" name="submit"  style="margin-left:200px"  >
            
        </li>
    </ul>
</form>




</div>
			</div>
		</div>
	</div>
</div>

