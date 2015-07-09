<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo base_url()?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CricSPL : Admin</title>
<script src="<?php echo  base_url();?>SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<link href="<?php echo  base_url();?>SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>css/app.css" rel="stylesheet">
<link href="<?php echo base_url() ?>css/menu.css" rel="stylesheet">
<!--[if lte IE 7]>
    <link rel="stylesheet" href="css/ie.css" type="text/css" /> 
<![endif]-->
<link rel="shortcut icon" href="<?php echo  base_url();?>images/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="<?php echo  base_url();?>css/admin_style.css" type="text/css" media="screen" />
<script language="javaScript" type="text/javascript" src="<?php echo  base_url();?>js/jquery-1.7.1.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/menu.js"></script>
<script language="javaScript" type="text/javascript" src="<?php echo  base_url();?>js/validate.js"></script>
<script type="text/javascript" src="<?php echo  base_url();?>js/ddaccordion.js"></script>
<script type="text/javascript">
ddaccordion.init({
	headerclass: "submenuheader", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["suffix", "<img src='<?php echo base_url()?>images/plus.gif' class='statusicon' />", "<img src='<?php echo base_url()?>images/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})
</script>
</head>
<body id="body_admin">
<!-- START HEADER -->
<div class="adminheaderWrap" style="background-color:#dadedf; padding:0px; height:105px;">
<div class="adminheader">
  <div tabindex="1" style="float:left"> <a href="<?php echo base_url()?>admin" tabindex="1"><span  ><img src="<?php echo base_url()?>images/ccLogo.jpg" alt=""  border="0" style="height:100px"/></span></a> </div>
  <div class="baseNav_admin">
    <strong>Welcome Admin</strong> <span class="light" style="font-weight:bold"><?php echo ucwords($this->session->userdata('username')); ?></span> |  <a href="admin/logout"  tabindex="180" >Logout</a>    </div>
    
  <div class="clear"></div>
  
</div>

</div>

<div class="clear"></div>
<div id="menu">
    <ul class="menu">
        <li><a href="#" class="parent"><span>Proposition</span></a>
            <div><ul>
                <li><a href="<?php echo base_url()?>admin/createProps" ><span>Add Proposition</span></a></li>
                <li><a href="<?php echo base_url()?>admin/proposition" ><span>View Proposition</span></a></li>
                <li><a href="<?php echo base_url()?>admin/proposition" ><span>Betting List</span></a></li>
                <li><a href="<?php echo base_url()?>admin/generate_result" ><span>Generate Result</span></a></li>
		<li><a href="<?php echo base_url()?>admin/viewResult" ><span>View Result</span></a></li>
            </ul></div>
        </li>
        <li><a href="#" class="parent"><span>Tournaments</span></a>
            <div><ul>
                    
                 <li><a href="<?php echo base_url()?>/admin/tournament/1" ><span>STPL Triangular Series</span></a></li>       
                    
               
             <!--   <li><a href="#" class="parent"><span>Points Table</span></a>
                    <div><ul>
                        <li><a href="<?php echo base_url()?>/propositions"><span>Add New Department</span></a></li>
                        <li><a href="{{ url('departments') }}"><span>View All Departments</span></a></li>
                    </ul></div>
                </li>    
               <li><a href="#" class="parent"><span>Stats</span></a>
                    <div><ul>
                        <li><a href="{{ url('staffList/create') }}"><span>Add Staff</span></a></li>
                        <li><a href="{{ url('staffList') }}"><span>View Staff List</span></a></li>
                    </ul></div>
                </li>
                 <li><a href="#" class="parent"><span>Gallery</span></a>
                     <div><ul>
                        <li><a href="{{ url('meetings/create') }}"><span>Schedule Meeting</span></a></li>
                        <li><a href="{{ url('meetings') }}"><span>Upcoming Meetings</span></a></li>
                        <li><a href="{{ url('meetings/0/pastMeetings') }}"><span>Past Meetings</span></a></li>
                    </ul></div>
                </li>
                <li><a href="#" class="parent"><span>Agenda</span></a>
                    <div><ul>
                        <li><a href="{{ url('agenda') }}"><span>View Meeting Agenda</span></a></li>
                        <li><a href="{{ url('agenda/create') }}"><span>Add Agenda Item</span></a></li>
                        
                    </ul></div>
                
                </li>
                 <li><a href="#" class="parent"><span>Points Table</span></a></li>
                <li><a href="#" class="parent"><span>Stats</span></a></li>
                <li><a href="#" class="parent"><span>Gallery</span></a></li>-->
                
                
            </ul></div>
        </li>
       
        <li><a href="#" class="parent"><span>Points Table</span></a>
            <div><ul>
                <li><a href="#" ><span>Add Event</span></a></li>
                <li><a href="#" ><span>View Events</span></a></li>
            </ul></div>
        </li>
        <li><a href="#" class="parent"><span>Stats</span></a>
            <div><ul>
                <li><a href="#" ><span>Add Tasks</span></a></li>
                <li><a href="#" ><span>View Task List</span></a></li>
            </ul></div>
        </li>
        
       <li><a href="#" class="parent"><span>Gallery</span></a>
            
        </li>
        <!--<li><a href="#" class="parent"><span>Reports</span></a>
            <div><ul>
                <li><a href="#" ><span>Event Reports</span></a></li>
                <li><a href="#" ><span>Tasks Reports</span></a></li>
                <li><a href="{{ url('agendaReports') }}" ><span>Agenda Reports</span></a></li>
            </ul></div>
        </li>--> 
        
    </ul>
</div>


<!-- END HEADER -->
