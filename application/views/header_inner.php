<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<meta http-equiv="X-UA-Compatible" content="IE=10,chrome=1">

<title>Office Pilot</title>
<meta content="initial-scale=1.0, maximum-scale=1.0, width=device-width" name="viewport">
<meta name="description" content="">
<meta name="author" content="">
<link href="<?php echo base_url() ?>css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url() ?>css/static.css" rel="stylesheet">
<link href="<?php echo base_url() ?>css/css3style.css" rel="stylesheet">
<link href="<?php echo base_url() ?>css/style.css" rel="stylesheet">
<link href="<?php echo base_url() ?>css/responsive.css" rel="stylesheet">
<link href="<?php echo base_url() ?>css/fonts.css" rel="stylesheet">
<link href="<?php echo base_url() ?>css/font-awesome.css" rel="stylesheet">

<link rel="stylesheet" href="<?php echo base_url()?>css/jquery-ui-1.9.0.custom.css" type="text/css">

<!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
  <![endif]-->
<script>
var WEBSITEURLFORJAVASCRIPT = '<?php echo base_url() ?>';
</script>
<!-- Fav and touch icons -->
<!--<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-1.7.min.js"></script>-->
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-1.10.2.min.js"></script>

<script type="text/javascript" src="<?php echo base_url() ?>js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo base_url() ?>js/validate.js"></script> 


<script type="text/javascript" src="<?php echo base_url()?>js/jquery.tinyscrollbar.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>js/jquery.validate.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>js/account.js"></script> 

<script>
	$(document).ready(function(){
        $('.scrollbar1').tinyscrollbar();
    });
</script>
<script>
var dlgRslt,
    lastTimeDialogClosed = 0;
function dialog(msg) {
    var defaultValue,
        lenIsThree,
        type;

    while (lastTimeDialogClosed && new Date() - lastTimeDialogClosed < 3001) {
        // timer
    }

    lenIsThree = 3 === arguments.length;
    type = lenIsThree ? arguments[2] : (arguments[1] || alert);
    defaultValue = lenIsThree && type === prompt ? arguments[1] : '';

    // store result of confirm() or prompt()
    dlgRslt = type(msg, defaultValue);
    lastTimeDialogClosed = new Date();
} 




</script>
</head>
<body >
  <div class="header-wrap">
  <div class="container">
    <header class="page_header">
      <div class="row-fluid">
        <div class="logoPane"><a href="<?php echo base_url();?>" title="Office Pilot"><img src="<?php echo base_url() ?>/images/images/logo.png"></a></div>
        <div class="iconmenus">
          <div class="divideline first"></div>
          <div class="iconmenuwrap" title="New Schedule" alt="New Schedule"> <a class="rotation" href="<?php echo base_url(); ?>home/newschedule">
            <div class="imenu">
              <div class="icon1"><img src="<?php echo base_url() ?>/images/images/icon1.png" alt="" /></div>
            </div>
            <div class="name">New<br />Schedule</div>
            </a>
            <div class="clear"></div>
          </div>
          <div class="iconmenuwrap" title="Saved Schedules" alt="Schedules"> <a class="rotation" href="<?php echo base_url(); ?>home/savedschedule">
            <div class="imenu">
              <div ><img src="<?php echo base_url() ?>/images/images/icon2.png" alt="" /></div>
            </div>
            <div class="name">Saved <br />
              Schedules</div>
            </a>
            <div class="clear"></div>
          </div>
          <div class="iconmenuwrap" title="Saved Datasets" alt="Saved Datasets"> <a class="rotation" href="<?php echo base_url(); ?>home/datasets">
            <div class="imenu">
              <div class="icon1"><img src="<?php echo base_url() ?>/images/images/icon3.png" alt="" /></div>
            </div>
            <div class="name">Data<br />
              Set</div>
            </a>
            <div class="clear"></div>
          </div>
          <div class="iconmenuwrap" title="Analysis" alt="Analysis"> <a class="rotation" href="<?php echo base_url(); ?>home/analysis">
            <div class="imenu">
              <div class="icon1"><img src="<?php echo base_url() ?>/images/images/icon4.png" alt="" /></div>
            </div>
            <div class="name">Analysis</div>
            </a></div>
          <div class="divideline second"></div>
          <div class="iconmenuwrap" title="Office Pilot Settings" alt="Office Pilot Settings"> <a class="rotation" href="<?php echo base_url(); ?>op_setting/index">
            <div class="imenu">
              <div class="icon1"><img src="<?php echo base_url() ?>/images/images/icon5.png" alt="" /></div>
            </div>
            <div class="name">Settings</div>
            </a></div>
          <div class="iconmenuwrap" title="User's Administration" alt="User's Administration"> <a class="rotation" href="<?php echo base_url(); ?>home/admin">
            <div class="imenu">
              <div class="icon1"><img src="<?php echo base_url() ?>/images/images/icon6.png" alt="" /></div>
            </div>
            <div class="name">Admin</div>
            </a></div>
            <div class="iconmenuwrap" title="Signout" alt="Signout"> <a class="rotation" href="<?php echo base_url(); ?>login/logout">
            <div class="imenu" >
              <div class="icon1" ><img src="<?php echo base_url() ?>/images/images/icon7.png" alt="" /></div>
            </div>
            <div class="name" >Sign out</div>
            </a></div>
            
        </div>
      </div>
    </header>
  </div>
  </div>
  <!-- here comes the content of the pages-->
  <!-- Example row of columns -->
<!-- Modal -->
<div id="alerts" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="<?php echo base_url(); ?>images/closeBtn.png" alt="" /></button>
    <h3 id="myModalLabel"><img src="<?php echo base_url(); ?>images/warningIcon.png" alt="" /><span id="alertTitle"></span></h3>
  </div>
  <div class="modal-body">
    <p id="alertContent"></p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button> 
  </div>
</div>
