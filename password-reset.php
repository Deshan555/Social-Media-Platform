<?php

include('config.php');

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\SMTP;

use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";

if(isset($_POST['reset-pass']))
{
    $email_address = $_POST['email'];

    echo $email_address;

    $sql_query = "SELECT User_ID FROM USERS WHERE EMAIL = '$email_address';";

    $stmt = $conn->prepare($sql_query);

    $stmt->execute();

    $stmt->store_result();

    if($stmt->num_rows() > 0)
    {
        require 'config.php';

        $pass = randomPassword();

        $secure_password = md5($pass);

        $SQL_UPDATE = "UPDATE users SET PASSWORD_S = '$secure_password' WHERE EMAIL = '$email_address';";

        $stmt = $conn->prepare($SQL_UPDATE);

        if ($stmt->execute()) {

            $full_name = "EventsWave User";

            header('location:index.php');

            mailer($email_address, $pass, $full_name);
        }
        else{
            header('location: Reset-Password.php?error_message=System Error Try Again');
        }
    }else{
        header('location: Reset-Password.php?error_message=Your E-Mail Not Registered In This Platform');
    }
}


function randomPassword()
{
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';

    $pass = array();

    $alphaLength = strlen($alphabet) - 1;

    for ($i = 0; $i < 8; $i++)
    {
        $n = rand(0, $alphaLength);

        $pass[] = $alphabet[$n];
    }

    return implode($pass);
}

function mailer($sending_address, $password, $full_name)
{
    $mail = new PHPMailer(true);

    //Enable SMTP debugging.

    $mail->SMTPDebug = 3;

    //Set PHPMailer to use SMTP.

    $mail->isSMTP();

    //Set SMTP host name

    $mail->Host = "smtp.gmail.com";

    //Set this to true if SMTP host requires authentication to send email

    $mail->SMTPAuth = true;

    //Provide username and password

    $mail->Username = "deshanja@sltc.ac.lk";

    $mail->Password = "cweorfeorufthkbf";

    //If SMTP requires TLS encryption then set it

    $mail->SMTPSecure = "tls";

    //Set TCP port to connect to

    $mail->Port = 587;

    $mail->From = "dj.amarasinghe.dev@gmail.com";

    $mail->FromName = $full_name;

    $mail->addAddress($sending_address, $full_name);

    $mail->isHTML(true);

    $mail->Subject = "Change Account Password";

    $mail->Body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

    <html xmlns:v="urn:schemas-microsoft-com:vml">
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
        <!--[if !mso]--><!-- -->
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,700" rel="stylesheet">
        <!-- <![endif]-->
    
        <title>EventsWave Email</title>
    
        <style type="text/css">
            body {
                width: 100%;
                background-color: #ffffff;
                margin: 0;
                padding: 0;
                -webkit-font-smoothing: antialiased;
                mso-margin-top-alt: 0px;
                mso-margin-bottom-alt: 0px;
                mso-padding-alt: 0px 0px 0px 0px;
            }
            
            p,
            h1,
            h2,
            h3,
            h4 {
                margin-top: 0;
                margin-bottom: 0;
                padding-top: 0;
                padding-bottom: 0;
            }
            
            span.preheader {
                display: none;
                font-size: 1px;
            }
            
            html {
                width: 100%;
            }
            
            table {
                font-size: 14px;
                border: 0;
            }
            /* ----------- responsivity ----------- */
            
            @media only screen and (max-width: 640px) {
                /*------ top header ------ */
                .main-header {
                    font-size: 20px !important;
                }
                .main-section-header {
                    font-size: 28px !important;
                }
                .show {
                    display: block !important;
                }
                .hide {
                    display: none !important;
                }
                .align-center {
                    text-align: center !important;
                }
                .no-bg {
                    background: none !important;
                }
                /*----- main image -------*/
                .main-image img {
                    width: 440px !important;
                    height: auto !important;
                }
                /* ====== divider ====== */
                .divider img {
                    width: 440px !important;
                }
                /*-------- container --------*/
                .container590 {
                    width: 440px !important;
                }
                .container580 {
                    width: 400px !important;
                }
                .main-button {
                    width: 220px !important;
                }
                /*-------- secions ----------*/
                .section-img img {
                    width: 320px !important;
                    height: auto !important;
                }
                .team-img img {
                    width: 100% !important;
                    height: auto !important;
                }
            }
            
            @media only screen and (max-width: 479px) {
                /*------ top header ------ */
                .main-header {
                    font-size: 18px !important;
                }
                .main-section-header {
                    font-size: 26px !important;
                }
                /* ====== divider ====== */
                .divider img {
                    width: 280px !important;
                }
                /*-------- container --------*/
                .container590 {
                    width: 280px !important;
                }
                .container590 {
                    width: 280px !important;
                }
                .container580 {
                    width: 260px !important;
                }
                /*-------- secions ----------*/
                .section-img img {
                    width: 280px !important;
                    height: auto !important;
                }
            }
        </style>
        <!-- [if gte mso 9]><style type=”text/css”>
            body {
            font-family: arial, sans-serif!important;
            }
            </style>
        <![endif]-->
    </head>
    
    
    <body class="respond" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
        <!-- pre-header -->
        <table style="display:none!important;">
            <tr>
                <td>
                    <div style="overflow:hidden;display:none;font-size:1px;color:#ffffff;line-height:1px;font-family:Arial;maxheight:0px;max-width:0px;opacity:0;">

                    </div>
                </td>
            </tr>
        </table>
        <!-- pre-header end -->
        <!-- header -->
        <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff">
    
            <tr>
                <td align="center">
                    <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">
    
                        <tr>
                            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                        </tr>
    
                        <tr>
                            <td align="center">
    
                                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">
    
                                    <tr>
                                        <td align="center" height="70" style="height:70px;">
                                            <a href="" style="display: block; border-style: none !important; border: 0 !important;"><img width="100" border="0" style="display: block; width: 400px;" src="https://files.fm/thumb_show.php?i=kdr4wgxz9" alt="" /></a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
    
                        <tr>
                            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                        </tr>
    
                    </table>
                </td>
            </tr>
        </table>
        <!-- end header -->
    
        <!-- big image section -->
        <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff" class="bg_color">
    
            <tr>
                <td align="center">
                    <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">
                        <tr>
    
                        </tr>
                        <tr>
                            <td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="center" style="color: #343434; font-size: 24px; font-family: Quicksand, Calibri, sans-serif; font-weight:700;letter-spacing: 3px; line-height: 35px;" class="main-header">
    
    
                                <div style="line-height: 35px">
    
                                    WELCOME TO <span style="color: #5caad2;">EVENTSWAVE</span>
    
                                </div>
                            </td>
                        </tr>
    
                        <tr>
                            <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                        </tr>
    
                        <tr>
                            <td align="center">
                                <table border="0" width="40" align="center" cellpadding="0" cellspacing="0" bgcolor="eeeeee">
                                    <tr>
                                        <td height="2" style="font-size: 2px; line-height: 2px;">&nbsp;</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
    
                        <tr>
                            <td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                        </tr>
    
                        <tr>
                            <td align="center">
                                <table border="0" width="400" align="center" cellpadding="0" cellspacing="0" class="container590">
                                    <tr>
                                        <td align="center" style="color: #888888; font-size: 16px; font-family: "Work Sans", Calibri, sans-serif; line-height: 24px;">
    
    
                                            <div style="line-height: 24px">
                                            
                                            Hi EventsWave User,<br><br>
                                            
                                            There was a request to change your password!<br>
                                            
                                            If you did not make this request then please ignore this email
                                            
                                            <br>
                                            
                                            Otherwise, please use this regenrated password as your new password.
                                            
                                            <br><br>
                                                
                                            <br><br>New Password :'. $password .

        '
                                            <br><br>You can access your account at any time by clicking on the link below.
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
    
                        <tr>
                            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                        </tr>
    
                        <tr>
                            <td align="center">
                                <table border="0" align="center" width="160" cellpadding="0" cellspacing="0" bgcolor="5caad2" style="">
    
                                    <tr>
                                        <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                                    </tr>
    
                                    <tr>
                                        <td align="center" style="color: #ffffff; font-size: 14px; font-family: "Work Sans", Calibri, sans-serif; line-height: 26px;">
    
    
                                            <div style="line-height: 26px;">
                                                <a href="https://eventswave-sltc.eastus.cloudapp.azure.com/" style="color: #ffffff; text-decoration: none;">Visit</a>
                                            </div>
                                        </td>
                                    </tr>
    
                                    <tr>
                                        <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                                    </tr>
    
                                </table>
                            </td>
                        </tr>
    
    
                    </table>
    
                </td>
            </tr>
    
        </table>
        <!-- end section -->
    
        <!-- contact section -->
        <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff" class="bg_color">
    
            <tr class="hide">
                <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
            </tr>
            <tr>
                <td height="40" style="font-size: 40px; line-height: 40px;">&nbsp;</td>
            </tr>
    
            <tr>
                <td height="60" style="border-top: 1px solid #e0e0e0;font-size: 60px; line-height: 60px;">&nbsp;</td>
            </tr>
    
            <tr>
                <td align="center">
                    <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590 bg_color">
    
                        <tr>
                            <td>
                                <table border="0" width="300" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="container590">
    
                                    <tr>
                                        <!-- logo -->
                                        <td align="left">
                                            <a href="" style="display: block; border-style: none !important; border: 0 !important;"><img width="80" border="0" style="display: block; width: 180px;" src="https://files.fm/thumb_show.php?i=kdr4wgxz9" alt="" /></a>
                                        </td>
                                    </tr>
    
                                    <tr>
                                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                                    </tr>
    
                                    <tr>
                                        <td align="left" style="color: #888888; font-size: 14px; font-family: , Calibri, sans-serif; line-height: 23px;" class="text_color">
                                            <div style="color: #333333; font-size: 14px; font-family:  Calibri, sans-serif; font-weight: 600; mso-line-height-rule: exactly; line-height: 23px;">
    
                                                Email us: <br/> <a href="mailto:" style="color: #888888; font-size: 14px; font-family: , Calibri, Sans-serif; font-weight: 400;">djayashanka750@gmail.com</a>
    
                                            </div>
                                        </td>
                                    </tr>
    
                                </table>
    
                                <table border="0" width="2" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="container590">
                                    <tr>
                                        <td width="2" height="10" style="font-size: 10px; line-height: 10px;"></td>
                                    </tr>
                                </table>
    
                                <table border="0" width="200" align="right" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;" class="container590">
    
                                    <tr>
                                        <td class="hide" height="45" style="font-size: 45px; line-height: 45px;">&nbsp;</td>
                                    </tr>
    
    
    
                                    <tr>
                                        <td height="15" style="font-size: 15px; line-height: 15px;">&nbsp;</td>
                                    </tr>
    
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
    
            <tr>
                <td height="60" style="font-size: 60px; line-height: 60px;">&nbsp;</td>
            </tr>
    
        </table>
        <!-- end section -->
    
       
    
    </body>
    
    </html>';

    $mail->AltBody = "This is the plain text version of the email content";

    try
    {
        $mail->send();

        echo "Message has been sent successfully";

    }
    catch (Exception $e)
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}