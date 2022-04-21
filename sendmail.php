<?php
//session_start(); 
require "phpmailer/class.phpmailer.php";
require "phpmailer/class.smtp.php";
require "phpmailer/phpmailer.lang-en.php";

//require "config.php";

if(isset($_POST['submit']))
{
	//echo "<pre>";print_r($_POST);die;
	
	$form_name=@$_POST['form_name'];
	$form_email=@$_POST['form_email'];
	$form_subject=@$_POST['form_subject'];
	$form_phone=@$_POST['form_phone'];
	$form_message=@$_POST['form_message'];
	
	
	

//print_r($_POST);

//$useremail=$email;
 $message='<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GTRAC</title> 
	</head>

<body style="margin:0; padding:0; background-color:#F2F2F2;">

    <span style="display: block; width: 640px !important; max-width: 640px; height: 1px" class="mobileOff"></span>

    <center>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#F2F2F2">
            <tr>
                <td align="center" valign="top">

                    <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper" bgcolor="#FFFFFF" style="border-bottom: 2px solid #9b1010;">
                        <tr>
                            <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="center" valign="top">

                                <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                    <tr>
                                        <td align="center" valign="top">
                                            <h3>India Mergers</h3>
                                        </td>
                                    </tr>
                                </table>

                            </td>
                        </tr>
                        <tr>
                            <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
                        </tr>
                    </table>

                    <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper" bgcolor="#fafafa">
                        <tr>
                            <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="center" valign="top">

                                <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                    <tr>
                                        <td align="center" valign="top">
                                            <h2>Thank You!!</h2>
                                           <p style="font-size: 16px;">Your filled details are given below:</p>
                                        </td>
                                    </tr>
                                </table>

                            </td>
                        </tr>
                        <tr>
                            <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
                        </tr>
                    </table>

                    <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper" bgcolor="#FFFFFF">
                        <tr>
                            <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="center" valign="top">
                                

                                <table width="600" cellpadding="0" cellspacing="0" border="0" class="container" style="border-bottom: 1px solid #f1f1f1">
                                   
                                    <tr>
                                        <td width="300" class="mobile" align="" valign="top" style="color: #9A9A9A; padding: 6px;">
                                            Name :
                                        </td>
                                        <td width="300" class="mobile" align="" valign="top" style="padding: 6px;">
                                           '.@$_POST['form_name'].'
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="300" class="mobile" align="" valign="top" style="color: #9A9A9A; padding: 6px;">
                                            Email :
                                        </td>
                                        <td width="300" class="mobile" align="" valign="top" style="padding: 6px;">
                                           '.@$_POST['form_email'].'
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="300" class="mobile" align="" valign="top" style="color: #9A9A9A; padding: 6px;">
                                            Subject :
                                        </td>
                                        <td width="300" class="mobile" align="" valign="top" style="padding: 6px;">
                                           '.@$_POST['form_subject'].'
                                        </td>
                                    </tr>
									  <tr>
                                        <td width="300" class="mobile" align="" valign="top" style="color: #9A9A9A; padding: 6px;">
                                            Phone :
                                        </td>
                                        <td width="300" class="mobile" align="" valign="top" style="padding: 6px;">
                                           '.@$_POST['form_phone'].'
                                        </td>
                                    </tr>
									  <tr>
                                        <td width="300" class="mobile" align="" valign="top" style="color: #9A9A9A; padding: 6px;">
                                            Message :
                                        </td>
                                        <td width="300" class="mobile" align="" valign="top" style="padding: 6px;">
                                           '.@$_POST['form_message'].'
                                        </td>
                                    </tr>
									 
                                </table>
                                
                    
                                
                                
              
                                
         

     
                    
                    <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper" bgcolor="#F2F2F2">
                        <tr>
                            <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="center" valign="top">

                                <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
                                    <tr>
                                        <td align="center" valign="top">
                                            <p style="font-size: 12px; color: black;">Address: ITG Telematics Pvt. Ltd. , B- 100  2nd Floor Neelkanth Building  Naraina, Industrial area Phase -1, New Delhi- 110028. </p>
                                        </td>
                                    </tr>
                                </table>

                            </td>
                        </tr>
                        <tr>
                            <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
                        </tr>
                    </table>
	 </td>
            </tr>
        </table>
    </center>
</body>

</html>';
	//die();


	$mail=new PHPMailer(true);
		
		$Subject=" ThankYou Mail";
		$mail->IsSMTP();
		$mail->SMTPAuth   = true;     // enable SMTP authentication
		$mail->SMTPSecure = "ssl";    // sets the prefix to the servier
		$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
		$mail->Port       = 465;      // set the SMTP port
		
		
		$mail->Username   = "gtracsbmail@gmail.com";  // GMAIL username
		$mail->Password   = "gtrac@123";  
		 $mail->From       = "gtracsbmail@gmail.com";
		$mail->FromName   = "IndiaMergers";

		
		//$mail->SetLanguage( "en","./fromtoemail/rawaj/language/" );
		
		$mail->AltBody    = ""; //Text Body
		//$mail->WordWrap   = 50; // set word wrap
		
		//$mail->AddReplyTo("abc@g-trac.in","G-trac");
		$mail->IsHTML(true);
		
		
		$mail->Subject    = $Subject;
	
	
		//$mail->AddAddress("upender@g-trac.in","<email>");
		//$mail->AddAddress($useremail,"<email>");
		//$mail->AddCC("upender@g-trac.in");
		//$mail->AddAddress('sharmajatinj3@gmail.com',"<email>");
		$mail->AddAddress('upender@indiamergers.co.in',"<email>");
		$textTosend =$message;
		
		$mail->IsHTML(true);
		
		$mail->Body = $textTosend ;
		
		if(!$mail->Send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
		die();
		}
		$mail->ClearAddresses();
		$mail->ClearAttachments();
		//echo "Mail Sent Successfully!!";
		
	echo "<script type='text/javascript'>alert('Form Submitted Successfully!!');document.location='index.html'</script>";
	
	
	
	
}

	
?>
<style type="text/css">
        /* Outlines the grids, remove when sending */
        /*table td {
            border: 1px solid cyan;
        }*/

        /* CLIENT-SPECIFIC STYLES */
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            font-size: 14px;
            line-height: 20px;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        /* RESET STYLES */
        img {
            border: 0;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* ANDROID CENTER FIX */
        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }

        /* MEDIA QUERIES */
        @media all and (max-width:639px) {
            .wrapper {
                width: 320px !important;
                padding: 0 !important;
            }

            .container {
                width: 300px !important;
                padding: 0 !important;
            }

            .mobile {
                width: 300px !important;
                display: block !important;
                padding: 0 !important;
            }

            .img {
                width: 100% !important;
                height: auto !important;
            }

            *[class="mobileOff"] {
                width: 0px !important;
                display: none !important;
            }

            *[class*="mobileOn"] {
                display: block !important;
                max-height: none !important;
            }
        }
    </style>	