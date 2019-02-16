<?php
/*
 *  CONFIGURE EVERYTHING HERE
 */
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$name = $fname . ' '.$lname;
$email = $_POST['email'];
$message = $_POST['tarea'];
$from = 'admin@wampserver.invalid';
$email_subject = "New Form Submission";
$email_body = "User Name: $name.\n".
                "User Email: $email.\n".
                "User Message: $message.\n";
$to = "aman29271@gmail.com";
//$headers ="From: $form \r\n";
//$headers .= "Reply-To:$email \r\n";
//mail($to,$email_subject,$email_body,$headers);


//date_default_timezone_set('Etc/UTC');
//
//// Edit this path if PHPMailer is in a different location.
//require 'PHPMailer/vendor/autoload.php';
//
//$mail = new PHPMailer;
//$mail->isSMTP();
//
///*
// * Server Configuration
// */
//
//$mail->Host = 'smtp.gmail.com'; // Which SMTP server to use.
//$mail->Port = 587; // Which port to use, 587 is the default port for TLS security.
//$mail->SMTPSecure = 'tls'; // Which security method to use. TLS is most secure.
//$mail->SMTPAuth = true; // Whether you need to login. This is almost always required.
//$mail->Username = "good.one.1291@gmail.com"; // Your Gmail address.
//$mail->Password = "neversaynever"; // Your Gmail login password or App Specific Password.
//
///*
// * Message Configuration
// */
//
//$mail->setFrom($from, 'Awesome Website'); // Set the sender of the message.
//$mail->addAddress('aman29271@gmail.com', $name); // Set the recipient of the message.
//$mail->Subject = $email_subject; // The subject of the message.
//
///*
// * Message Content - Choose simple text or HTML email
// */
//
//// Choose to send either a simple text email...
//$mail->Body = $email_body; // Set a plain text body.
//
//// ... or send an email with HTML.
////$mail->msgHTML(file_get_contents('contents.html'));
//// Optional when using HTML: Set an alternative plain text message for email clients who prefer that.
////$mail->AltBody = 'This is a plain-text message body'; 
//
//// Optional: attach a file
//$mail->addAttachment('images/phpmailer_mini.png');
//
//if ($mail->send()) {
//    echo "Your message was sent successfully!";
//} else {
//    echo "Mailer Error: " . $mail->ErrorInfo;
//}
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * This uses traditional id & password authentication - look at the gmail_xoauth.phps
 * example to see how to use XOAUTH2.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
require '../vendor/autoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "good.one.1291@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "neversaynever";
//Set who the message is to be sent from
$mail->setFrom('info@samnivesha.epizy.com', 'Samnivesha');
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress('aman29271@gmail.com', 'John Doe');
//Set the subject line
$mail->Subject = 'PHPMailer GMail SMTP test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}
//Section 2: IMAP
//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
//You can use imap_getmailboxes($imapStream, '/imap/ssl') to get a list of available folders or labels, this can
//be useful if you are trying to get this working on a non-Gmail IMAP server.
function save_mail($mail)
{
    //You can change 'Sent Mail' to any other folder or tag
    $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";
    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->good.one.1291, $mail->neversaynever);
    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);
    return $result;
}
header("Location:/index.html");