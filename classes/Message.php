<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

class Message{

    public function sendMail($email){
    
        $mail = new PHPMailer(true);

        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;        
            $mail->CharSet = "utf-8";// set charset to utf8
            $mail->isSMTP();                                         
            $mail->Host       = 'smtp.gmail.com';                
            $mail->SMTPAuth   = true;                                 
            $mail->Username   = '';       //should be a valid username or email
            $mail->Password   = '';                              
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;     
            $mail->Port       = 465;    
            $mail->SMTPOptions = array(
                                                                'ssl' => array(
                                                                    'verify_peer' => false,
                                                                    'verify_peer_name' => false,
                                                                    'allow_self_signed' => true
                                                                )
                                                            );                                
            //Recipients
            $mail->setFrom('info@revive.ng', 'Revive Support');
            $mail->addAddress($email, 'Visitor');  
            // $mail->addAddress('ellen@example.com');            
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            $mail->addAttachment('../uploads/email_logo.PNG'); 

            //Content
            $mail->isHTML(true);                                 
            $mail->Subject = 'Revive Support';
            $mail->Body    = "Hey, $email!.  Thank you for subscribing to our page. Stay tuned for the latest updates. Namatse!.";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo "<script>alert('Your email has been sent!');
                                    history.back();
                        </script>";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

}