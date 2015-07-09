
<script type="text/javascript" src="<?php echo base_url()?>fancybox/jquery.fancybox-1.3.3.pack.js"></script>


<script>
    
    function testfunc(val)
    {
        //url1='{{ url("agenda/getAttendees") }}'+'/'+val;
        //$.ajax({url:url1, success:function(getAttendees){
         
          //  $('#viewAttendee').html(getAttendees);  
            $('#bet_id').val(val);
            $('#placeBet').bPopup();
            
        //}});
        
    }
    
    function placeBet(betID)
    {
       
        
        if($('#user_email').val()==''){
            alert('Please enter email address');
            return false;
            
        }
        if(IsEmail($('#user_email').val())==false){
                alert('Please insert correct email address');
                return false;
            }
        if($('#user_name').val()==''){
            alert('Please enter your name');
            return false;
            
        }
        if($('#bet_amount').val()==''){
            alert('Please enter betting amount');
            return false;
            
        }
         if($('#bet_option').val()==0){
            alert('Please select your answer');
            return false;
            
        }
        if(isNaN($('#bet_amount').val())){
            alert('Please enter numbers only for betting amount');
            return false;
        }
        x=$('#bet_amount').val();
        if( String(x).search(/^\s*(\+|-)?((\d+(\.\d+)?)|(\.\d+))\s*$/) != -1 && ( x<50 || x >200 ))
        {
                alert("Betting amount should be between 50 to 200");
                return false;
        }
        
        $('#placeBet_btn').css('display', 'none');
        val=$('#user_name').val()+'_'+$('#bet_amount').val()+'_'+$('#bet_option').val()+'_'+$('#match_id').val()+'_'+$('#bet_id').val()+'_'+$('#user_email').val();
        //alert(val);
        url1='{{ url("props/placeBet") }}'+'/'+val;
        $.ajax({url:url1, success:function(getAttendees){
         
         if(getAttendees==1)
         {
            alert('Your Bet has been successfully placed.');
            $('#user_name').val('');
            $('#bet_amount').val('');
            $('#bet_option').val(0);
            location.reload();
        }
        else if(getAttendees==0){
            alert('Your bet has not placed, please try again');
        }
        else {
            alert('Your already have placed bet on this proposition.');
            $('#user_name').val('');
            $('#bet_amount').val('');
            $('#bet_option').val(0);
            location.reload();
        }
           //$('#viewAttendee').html(getAttendees);  
         //  $('#placeBet').bPopup();
            
        }});
    }
function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) {
           return false;
        }else{
           return true;
        }
      }
      
   
</script>   


<style type="text/css">
.numbers {
    padding: 0px;
    width: 45px;
    text-align: center;
    font-family: Arial;             
    font-size: 28px;
    font-weight: bold;    /* options are normal, bold, bolder, lighter */
    font-style: normal;   /* options are normal or italic */
    color: #FFFFFF;       /* change color using the hexadecimal color codes for HTML */
}
.title {    /* the styles below will affect the title under the numbers, i.e., “Days”, “Hours”, etc. */
    border-style: none;
    padding: 0px 0px 3px 0px;
    width: 45px;
    text-align: center;
    font-family: Arial;
    font-size: 10px;
    font-weight: bold;    /* options are normal, bold, bolder, lighter */
    color: #FFFFFF;       /* change color using the hexadecimal color codes for HTML */
}
#table {
    width: 400px;
    height: 70px;
    border-style: ridge;
    border-width: 3px;
    border-color: #666666;       /* change color using the hexadecimal color codes for HTML */
    background-color: #222222;   /* change color using the hexadecimal color codes for HTML */
    margin: 0px auto;
    position: relative;   /* leave as "relative" to keep timer centered on your page, or change to "absolute" then change the values of the "top" and "left" properties to position the timer */
    top: 0px;            /* change to position the timer */
    left: 0px;            /* change to position the timer; delete this property and it's value to keep timer centered on page */
}
</style>

<script type="text/javascript">

/*
Count down until any date script-
By JavaScript Kit (www.javascriptkit.com)
Over 200+ free scripts here!
Modified by Robert M. Kuhnhenn, D.O. 
on 5/30/2006 to count down to a specific date AND time,
on 10/20/2007 to a new format, and 1/10/2010 to include
time zone offset.
*/

var current="Betting Closed in!"    //-->enter what you want the script to display when the target date and time are reached, limit to 20 characters
var year=2015;    //-->Enter the count down target date YEAR
var month=07;      //-->Enter the count down target date MONTH
var day=04;       //-->Enter the count down target date DAY
var hour=18;      //-->Enter the count down target date HOUR (24 hour clock)
var minute=31;    //-->Enter the count down target date MINUTE
var tz=+5;        //-->Offset for your timezone in hours from UTC (see http://wwp.greenwichmeantime.com/index.htm to find the timezone offset for your location)

//    DO NOT CHANGE THE CODE BELOW!
var montharray=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");

function countdown(yr,m,d,hr,min){
    theyear=yr;themonth=m;theday=d;thehour=hr;theminute=min;
    var today=new Date();
    var todayy=today.getYear();
    if (todayy < 1000) {todayy+=1900;}
    var todaym=today.getMonth();
    var todayd=today.getDate();
    var todayh=today.getHours();
    var todaymin=today.getMinutes();
    var todaysec=today.getSeconds();
    var todaystring1=montharray[todaym]+" "+todayd+", "+todayy+" "+todayh+":"+todaymin+":"+todaysec;
    var todaystring=Date.parse(todaystring1)+(tz*1000*60*60);
    var futurestring1=(montharray[m-1]+" "+d+", "+yr+" "+hr+":"+min);
    var futurestring=Date.parse(futurestring1)-(today.getTimezoneOffset()*(1000*60));
    var dd=futurestring-todaystring;
    var dday=Math.floor(dd/(60*60*1000*24)*1);
    var dhour=Math.floor((dd%(60*60*1000*24))/(60*60*1000)*1);
    var dmin=Math.floor(((dd%(60*60*1000*24))%(60*60*1000))/(60*1000)*1);
    var dsec=Math.floor((((dd%(60*60*1000*24))%(60*60*1000))%(60*1000))/1000*1);
    if(dday<=0&&dhour<=0&&dmin<=0&&dsec<=0){
        document.getElementById('count2').innerHTML=current;
        document.getElementById('count2').style.display="inline";
        document.getElementById('count2').style.width="390px";
        document.getElementById('dday').style.display="none";
        document.getElementById('dhour').style.display="none";
        document.getElementById('dmin').style.display="none";
        document.getElementById('dsec').style.display="none";
        document.getElementById('days').style.display="none";
        document.getElementById('hours').style.display="none";
        document.getElementById('minutes').style.display="none";
        document.getElementById('seconds').style.display="none";
        document.getElementById('spacer1').style.display="none";
        document.getElementById('spacer2').style.display="none";
        return;
    }
    else {
        document.getElementById('count2').style.display="none";
        document.getElementById('dday').innerHTML=dday;
        document.getElementById('dhour').innerHTML=dhour;
        document.getElementById('dmin').innerHTML=dmin;
        document.getElementById('dsec').innerHTML=dsec;
        setTimeout("countdown(theyear,themonth,theday,thehour,theminute)",1000);
    }
}
</script>



<body onload="countdown(year,month,day,hour,minute)">
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default" style="margin-top: 20px">
                            <div class="panel-heading" style="font-weight:bold"  >
                                
                               
                                Current proposition 
                               
                                <span style="text-align:center; margin-left: 290px">Betting Closed in!</span>
                            <table id="table" border="0">
    <tr>
        <td align="center" colspan="6"><div class="numbers" id="count2" style="padding: 5px 0 0 0; "></div></td>
    </tr>
    <tr id="spacer1">
        <td align="center" ><div class="numbers" ></div></td>
        <td align="center" ><div class="numbers" id="dday"></div></td>
        <td align="center" ><div class="numbers" id="dhour"></div></td>
        <td align="center" ><div class="numbers" id="dmin"></div></td>
        <td align="center" ><div class="numbers" id="dsec"></div></td>
        <td align="center" ><div class="numbers" ></div></td>
    </tr>
    <tr id="spacer2">
        <td align="center" ><div class="title" ></div></td>
        <td align="center" ><div class="title" id="days">Days</div></td>
        <td align="center" ><div class="title" id="hours">Hours</div></td>
        <td align="center" ><div class="title" id="minutes">Minutes</div></td>
        <td align="center" ><div class="title" id="seconds">Seconds</div></td>
        <td align="center" ><div class="title" ></div></td>
    </tr>
</table>

                               
                            
                            
                            
                            
                            
                            </div>

				<div class="panel-body">
                                       <div  >
                                      
     
    <?php $dt=strtotime(date('Y-m-d H:i:s', strtotime('2015-07-04 19:00:00')));                                       
      $currdt=strtotime(date('Y-m-d H:i:s', strtotime('+ 330 minutes')));
      if($currdt < $dt){
    ?>                                       
                                        
    <form name="frm_view" id="frm_view" action="" method="post">

        <div style="width: 100%;">
            <div style="border-radius: 4px 4px 0px 0px; border:1px solid #009900; height: 40px; padding: 5px; background-color: #08C">
               
               <div style="width:60%;" class="lstRowHeader"><a href="" style="color:white;">Proposed to bet on</a> </div>
               
                <div style="width:15%;" class="lstRowHeader"><a href="" style="color:white;">Match</a> </div>
                <div style="width:15%;" class="lstRowHeader"><a href="" style="color:white;">Match Date</a></div>
                <div class="no-bgImage lstRowHeader" align="center" style="width:10%;">&nbsp;</div>
              </div>
              <?php
             
              $data=$this->db->query("select p.id, p.tournament_id,p.match_id,p.tournament_name, p.match_name,p.proposition_title, m.match_name, m.match_date from propositions p left join matches m on m.id=p.match_id where m.status=1")->result();
                     // ->select('propositions.id', 'propositions.tournament_id','propositions.match_id','propositions.tournament_name', 'propositions.match_name','propositions.proposition_title', 'matches.match_name', 'matches.match_date' )
                      //->leftJoin('matches', 'matches.id', '=', 'propositions.match_id')
                      //->where('matches.status', '=', '1')
                      //->get();
            //echo '<pre>';print_r($data);exit;
        if(count($data) >0)
        {
          foreach($data as $row){
		 //echo '<pre>'; print_r($data);exit;
           ?>
            <div style="border:1px solid #009900; height: 40px; padding: 5px; ">
                
               <div class="left" style="width:60%"><?php echo $row->proposition_title ?></div>
                
                <div style="width:15%" class="left"> <?php echo $row->match_name ?></div>
                
                <div class="left" style="width:15%"><?php echo date('M d Y H:i',strtotime($row->match_date));?></div>
               
                <div class="left" style="width:10%; text-align: center"><a onclick="testfunc('<?php echo $row->id; ?>')" id="attendeeID_<?php echo $row->id; ?>" style="color:#990000; font-weight: bold">Bet Now</a></div>
                </div>
              
              <?php }?>
              <?php }else{
            ?>
              <tr>
                <tr> <td colspan="6"> No Record Available.</td></tr>
              </tr>
              <?php
            } // endif check result
            ?>
            </div>
        
        
        <div id="placeBet" style="display: none; width: 500px; height: 500px; ">
            
            <div style="background-color: #fff; margin-top: 60px; padding: 10px; border-radius:5px; box-shadow: 4px 6px 13px #2d8ca7">
         <form name="frm_view" id="frm_view" action="" method="post">       
        <ul>

       
         <li>
            
            <label class="lblTxtCtrl">Email ID:<span style="color:990000;">*</span></label>
            <input type="text" name="user_email" id="user_email" class="form-control" placeholder="Email address" >
           
        </li>
        <li>
            <input type="hidden" name="match_id" id="match_id" value="<?php echo $row->match_id;?>" >
            <input type="hidden" name="bet_id" id="bet_id"  >        
            
            <label class="lblTxtCtrl">User Name:<span style="color:990000;">*</span></label>
           
           
        <input type="text" name="user_name" id="user_name" class="form-control" placeholder="User name who place bet" >
         <li>
            
            <label class="lblTxtCtrl">Betting Amount:<span style="color:990000;">*</span></label>
            <select name="bet_amount" id="bet_amount" class="selectBoxAb" >
            <option value="0">Select Bet Amount</option>
            <option value="50">50</option>
            <option value="100">100</option>
            <option value="150">150</option>
            <option value="200">200</option>
            </select>
            
        </li>
           
         <li>
         	<label class="lblTxtCtrl">Your Answer:<span style="color:990000;">*</span></label>
           
            <select name="bet_option" id="bet_option" class="selectBoxAb" onchange="getMNm()" >
            <option value="0">Select Status</option>
            <option value="1">NO</option>
            <option value="2">YES</option>
           
            </select>
           
        </li>
           

        <li>
        <input type="submit" class="btn" value="Place Bet" name="placeBet_btn" id="placeBet_btn" style="margin-left:200px" onClick="placeBet()" >
           
        </li>
    </ul>
         </form>   
                
                
            </div>
        </div>
          </form>
                                           
      <?php } else { ?>                                    
                                           
                                           <div style="font-size:14px; color:#990000; font-weight: bold;"> Betting Closed for this match.                                  
                                           
      <?php } ?>                            </div>
                                     
				</div>
			</div>
		</div>
	</div>
</div>
</body>
