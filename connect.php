<?php
	require("english.php");
	require("phpmailer/phpmailer.php");

//function sendMail($to, $to_name, $from = "", $from_name, $subject, $message, $isHTML = true)
//{
function sendMail($emailparams = array())
{
	$mail = new PHPMailer();
	$isHTML = true;
	$mail->IsSMTP();                                   // send via SMTP
	$mail->Host     = SMTP_SERVER; // SMTP servers
	$mail->SMTPAuth = true;     // turn on SMTP authentication
	$mail->Port 	=SMTP_PORT;
	$mail->Username = SMTP_USER;  // SMTP username
	$mail->Password = SMTP_PASSWD; // SMTP password
	$from   =   "info@officepilot.com";
        $from_name = "Office Pilot";
	$mail->From     = $from;
	$mail->FromName = $from_name;
	$mail->AddAddress($emailparams['email'],$emailparams['to_name']); 
	//$mail->AddAddress(OPTIONAL_EMAIL);               // optional name
	$mail->AddReplyTo($from,$from_name);	
	$mail->WordWrap = 50;                              // set word wrap	
	$mail->IsHTML($isHTML);                               // send as HTML	
	$mail->Subject  = $emailparams['email'];
        ############# create here htmlo body ##############
        $emailmessage   =   '<html xmlns="http://www.w3.org/1999/xhtml">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>'.$emailparams['mail_subject'].'</title>
        </head>
        <body>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center" valign="top"><br>
            <br>
            <table width="600" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="70" align="left" valign="middle"><img src="'.EMAIL_IMAGE_PATH.'/logo.png" width="292" height="54" style="display:block;"></td>
              </tr>
              <tr>
                <td align="left" valign="top"><img src="'.EMAIL_IMAGE_PATH.'/top.png" width="600" height="13" style="display:block;"></td>
              </tr>
              <tr>
                <td align="left" valign="top" bgcolor="#564319" style="background-color:#564319; font-family:Arial, Helvetica, sans-serif; padding:10px;"><div style="font-size:36px; color:#ffffff;"><b>Office Pilot</b></div>
                <div style="font-size:13px; color:#a29881;">'.$emailparams['mail_subject'].'</div>        
                  </td>
              </tr>
               <tr>
                <td bgcolor="#ffffff" style="background-color:#ffffff;">'.$emailparams['message'].'</td>
                </tr>
                <tr>
                    <td align="center" valign="middle" style="padding:5px;"><img src="'.EMAIL_IMAGE_PATH.'/divider.gif" width="566" height="30"></td>
                  </tr>
                  <tr>
                <td align="left" valign="top"><img src="'.EMAIL_IMAGE_PATH.'/bot.png" width="600" height="37" style="display:block;"></td>
              </tr>
              </table>
            <br>
            <br></td>
          </tr>
        </table>
        </body>
        </html>';
        ###################################################
	$mail->Body     =   $emailmessage;
	
	if(!$mail->Send())
	{
	   echo $mail->ErrorInfo;die();
	  
	}
	return "SUCCESS_MSG";


}

function sendMailReplyTo($to, $to_name, $from, $from_name, $subject, $message, $repyname, $replyaddress, $isHTML = true)
{
	
	$mail = new PHPMailer();
	
	$mail->IsSMTP();                                   // send via SMTP
	$mail->Host     = SMTP_SERVER; // SMTP servers
	$mail->SMTPAuth = true;     // turn on SMTP authentication
	$mail->Username = SMTP_USER;  // SMTP username
	$mail->Password = SMTP_PASSWD; // SMTP password
	
	$mail->From     = $from;
	$mail->FromName = $from_name;
	$mail->AddAddress($to,$to_name); 
	//$mail->AddAddress(OPTIONAL_EMAIL);               // optional name
	$mail->AddReplyTo($repyname, $replyaddress);
	
	$mail->WordWrap = 50;                              // set word wrap
	
	$mail->IsHTML($isHTML);                               // send as HTML
	
	$mail->Subject  = $subject;
	$mail->Body     =  $message;
	$mail->AltBody  =  ALT_BODY;
	
	if(!$mail->Send())
	{
	   
	 ERROE_MSG . $mail->ErrorInfo;
	 
	}
	
	return SUCCESS_MSG;


}
function sendMailAttachment($to, $to_name, $from, $from_name, $subject, $message, $repyname, $replyaddress, $isHTML = true, $attachment)
{
	
	$mail = new PHPMailer();
	
	$mail->IsSMTP();                                   // send via SMTP
	$mail->Host     = SMTP_SERVER; // SMTP servers
	$mail->SMTPAuth = true;     // turn on SMTP authentication
	$mail->Username = SMTP_USER;  // SMTP username
	$mail->Password = SMTP_PASSWD; // SMTP password
	
	$mail->From     = $from;
	$mail->FromName = $from_name;
	$mail->AddAddress($to,$to_name); 
	//$mail->AddAddress(OPTIONAL_EMAIL);               // optional name
	$mail->AddReplyTo($repyname, $replyaddress);
	
	$mail->WordWrap = 50;                              // set word wrap
	
	$mail->IsHTML($isHTML);                               // send as HTML
	
	$mail->Subject  = $subject;
	$mail->Body     =  $message;
	$mail->AltBody  =  ALT_BODY;
	$mail->AddAttachment($attachment);
	  
	if(!$mail->Send())
	{
	   
	   return ERROE_MSG . $mail->ErrorInfo;
	  
	}
	
	return SUCCESS_MSG;


}
  
?>
