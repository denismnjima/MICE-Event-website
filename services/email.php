<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

$pass = 'eyen gycw ijcq ywll';


function send_email($email,$name,$action){

    $mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtppro.zoho.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'info@buysimutech.co.ke';
    $mail->Password = 'Secmail@@';
    $mail->SMTPSecure = 'tls';  
    $mail->Port = 587;   

    $mail->setFrom('info@buysimutech.co.ke','BuySimu Onboarding');
    $mail->addAddress($email);
    $mail->isHTML(true);
    if($action=='register'){
        $mail->Subject = 'Thank you for you registration ';
        $mail->Body = 'Thanks dude';

               }

                $mail->send();
            } catch (Exception $e){

            }
        }