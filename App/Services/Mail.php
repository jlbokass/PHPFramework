<?php

namespace App\Services;

use Exception;
use PHPMailer\PHPMailer\PHPMailer;

/**
 * Class Mail
 * url : https://github.com/PHPMailer/PHPMailer
 * PHP 7.4
 */
class Mail
{
    /**
     * @param string $to Recipient
     * @param string $subject Subject
     * @param string $text text-only content of the message
     * @param string $html HTML content of the message
     * @return mixed
     */
    public static function sent(string $to, string $subject, string $text, string $html)
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                       //Enable verbose debug output
            $mail->isSMTP();                                             //Send using SMTP
            $mail->Host       = Config::EMAIL_HOST;                      //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                    //Enable SMTP authentication
            $mail->Username   = Config::EMAIL_USERNAME;                  //SMTP username
            $mail->Password   = Config::EMAIL_PASSWORD;                  //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;             //Enable implicit TLS encryption
            $mail->Port       = 465;                                     //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom(Config::EMAIL_USERNAME, 'Leak Manager');
            $mail->addAddress($to);     //Add a recipient name is optional
            $mail->addReplyTo('leakmanager@2-for-you.fr', 'Information');

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $html;
            $mail->AltBody = $text;

            $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}