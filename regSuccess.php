
<?php include "header.php";  ?>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* Exception class. */
require 'C:\PHPMailer\src\Exception.php';

/* The main PHPMailer class. */
require 'C:\PHPMailer\src\PHPMailer.php';

/* SMTP class, needed if you want to use SMTP. */
require 'C:\PHPMailer\src\SMTP.php';

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = $_SESSION['emailHost'];
$mail->SMTPAuth = true;
// //paste one generated by Mailtrap
// //paste one generated by Mailtrap
$mail->Username =$_SESSION['emailUserID'];
$mail->Password =$_SESSION['emailPassword'];
$mail->SMTPSecure = 'tls';
$mail->Port = $_SESSION['emailPort'];
//$mail->Port = 465;
//From email address and name
$mail->From = $_SESSION['emailUserID'];
$mail->FromName = "Fotopia";


//To address and name
// ;
// // //Recipient name is optional
// //;
// ;
// $mail->addAddress("sidambara.selvan@adrgrp.com","Sid");

$mail->addAddress($_REQUEST['email']);


//Address to which recipient will reply
$mail->addReplyTo($_SESSION['emailUserID'], "Reply");

//CC and BCC
//$mail->addCC("cc@example.com");
//$mail->addBCC("bcc@example.com");

//Send HTML or Plain Text email
$mail->isHTML(true);


$mail->Subject = "Signup Successful";
$mail->Body = "<html><head><style>.titleCss {font-family: \"Roboto\",Helvetica,Arial,sans-serif;font-weight:600;font-size:18px;color:#0275D8 }.emailCss { width:100%;border:solid 1px #DDD;font-family: \"Roboto\",Helvetica,Arial,sans-serif; } </style></head><table cellpadding=\"5\" class=\"emailCss\"><tr><td align=\"left\"><img src=\"".$_SESSION['project_url']."logo.png\" /></td><td align=\"center\" class=\"titleCss\">REGISTRATION SUCCESSFUL</td><td align=\"right\">".$_SESSION['support_team_email']."<br>".$_SESSION['support_team_phone']."</td></tr><tr><td colspan=\"2\"><br><br>";
//$mail->AltBody = "This is the plain text version of the email content";




$mail->Body.="<b>Dear {{Registrered_User_Name}},</b><br><br>

You are successfully registered as a {{Type_of_user}}.<br>
Please click on the below button to verify your email.<br>
<a href={{login_url}} style=\"color:#000;padding: 5px;background: #aad1d6;border-radius: 5px;text-decoration: none;\">Verify Email</a><br><br>
<p>Please follow the below link for the instructions to enable your calendar sync with fotopia.</p>
<a href={{project_url}}Calendar-setup-instructions.pdf download>Instructions to sync your calendar with fotopia</a>
<br><br><span style=\"font-size:10px;font-weight:bold;\">*This is an auto generated email notification from Fotopia. Please do not reply back to this email. For any support please write to support@fotopia.no</span><br><br>
Thanks,<br>
Fotopia Team.";

$mail->Body.="<br><br></td></tr></table></html>";
$mail->Body=str_replace('{{Type_of_user}}', $_REQUEST['type'], $mail->Body);
$mail->Body=str_replace('{{project_url}}', $_SESSION['project_url'], $mail->Body);
$mail->Body=str_replace('{{Registrered_User_Name}}',$_REQUEST['name']." ".$_REQUEST['lname'], $mail->Body);
if($_REQUEST['type']=='Realtor')
{
$mail->Body=str_replace('{{login_url}}', $_SESSION['project_url']."login.php?approve=1&email=".$_REQUEST['email']."&code=".$_REQUEST['code'], $mail->Body);
}
else
{
$mail->Body=str_replace('{{login_url}}', $_SESSION['project_url']."admin/index.php?approve=1&email=".$_REQUEST['email']."&code=".$_REQUEST['code'], $mail->Body);
}
//echo $mail->Body;exit;



try {
    $mail->send();
    //echo "Message has been sent successfully";
} catch (Exception $e) {
	echo $e->getMessage();
    echo "Mailer Error: " . $mail->ErrorInfo;
}
?> 
<div class="container content box-middle-container full-screen-size" data-sub-height="238">
            <div class="row">
                <div class="col-md-12 text-center box-middle">

                    <div>
                        <hr class="space m">
                        <h1 style="font-size:80px"><i class="fa fa-check" style="color:green"></i></h1>
                        <h1 id="label_registration_success" adr_trans="label_registration_success">Registration Successful!</h1>
                        <br>
                        <div class="col-md-3">&nbsp;</div>
                        <div class="col-md-6" style="margin-left:3.3%;text-align:left;">
                        <h5>Welcome to Fotopia!</h5>
                        <h5>Please check your email and click on "Verify email" to activate your account.</h5>
                        </div>
                        <hr class="space m">
                        <a class="anima-button btn-ms btn adr-cancel circle-button"  href="index.php"><i class="fa fa-long-arrow-left"></i>Back to home</a>
                    </div>
                </div>
            </div>
        </div>

		<?php include "footer.php";  ?>
