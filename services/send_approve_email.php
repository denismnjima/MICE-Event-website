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


function send_onboard_email($email,$name,$action){

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
    if($action=='accept'){
        $mail->Subject = 'Your Documents Have Been Approved,Continue Your Application';
        $mail->Body = '
                                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Welcome to Buysimu</title>
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                                margin: 0;
                                padding: 0;
                                background-color: #ffffff;
                                color: #333333;
                            }
                            .email-container {
                                width: 100%;
                                background-color: #f8f8f8;
                                padding: 20px;
                            }
                            .email-content {
                                max-width: 600px;
                                margin: 0 auto;
                                background-color: #ffffff;
                                border: 1px solid #dddddd;
                                padding: 20px;
                                text-align: center;
                            }
                            a{
                                color: white;
                                text-decoration:none
                                }
                            .logo img {
                                width: 150px;
                            }
                            h1 {
                                color: black;
                                font-size: 25px;
                            }
                            p {
                                font-size: 16px;
                                line-height: 1.5;
                                color: #333333;
                            }
                            .button-container {
                                margin: 20px 0;
                            }
                            .button {
                                background-color: #d32f2f;
                                color: #ffffff;
                                padding: 10px 20px;
                                text-decoration: none;
                                font-size: 16px;
                                border-radius: 5px;
                            }
                            .button a{
                                color:white}
                            .footer {
                                margin-top: 20px;
                                color: #777777;
                                font-size: 14px;
                                align-text:center;
                            }
                                .steps{
                                text-align:left;
                                }
                        </style>
                    </head>
                    <body>
                        <div class="email-container">
                            <div class="email-content">
                                <div class="logo">
                                    <img src="https://buysimutech.co.ke/wp-content/uploads/2024/04/cropped-buy-simu-logo-no-bg.png" alt="Buysimu Logo">
                                </div>
                                <h1>Documents Approved</h1>
                                <p>Dear '.$name.'</p>
                                <hr/>
                                <p>We are pleased to inform you that your documents have been successfully approved.</p>
                                <p>You can now continue with the next steps of your application. Please log in to your account and complete the remaining details at your earliest convenience..</p>
                                <div class="button-container">
                                    <a href="https://client.buysimutech.co.ke/login.php" class="button">Login Now</a>
                                </div>
                                <p>If you have any questions or need assistance, feel free to contact our support team.</p>
                                <p>Kind Regards,<br>The Onboarding Team</p>
                            </div>
                            <div class="footer">
                                &copy; 2024 Buysimu. All rights reserved.
                            </div>
                        </div>
                    </body>
                    </html>
                    ';
               }else{
                 $mail->Subject = 'Documents Not Approved';
                 $mail->Body = '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>Documents Not Approved - Buysimu</title>
                            <style>
                                body {
                                    font-family: Arial, sans-serif;
                                    margin: 0;
                                    padding: 0;
                                    background-color: #ffffff;
                                    color: #333333;
                                }
                                .email-container {
                                    width: 70%;
                                    background-color: #f8f8f8;
                                    padding: 20px;
                                }
                                .email-content {
                                    max-width: 600px;
                                    margin: 0 auto;
                                    background-color: #ffffff;
                                    border: 1px solid #dddddd;
                                    padding: 20px;
                                    text-align: center;
                                }
                                a {
                                    color: white;
                                    text-decoration: none;
                                }
                                .logo img {
                                    width: 150px;
                                }
                                h1 {
                                    color: black;
                                    font-size: 25px;
                                }
                                p {
                                    font-size: 16px;
                                    line-height: 1.5;
                                    color: #333333;
                                }
                                .button-container {
                                    margin: 20px 0;
                                }
                                .button {
                                    background-color: #d32f2f;
                                    color: #ffffff;
                                    padding: 10px 20px;
                                    text-decoration: none;
                                    font-size: 16px;
                                    border-radius: 5px;
                                }
                                .button a {
                                    color: white;
                                }
                                .footer {
                                    margin-top: 20px;
                                    color: #777777;
                                    font-size: 14px;
                                    text-align: center;
                                }
                                .steps {
                                    text-align: left;
                                }
                            </style>
                        </head>
                        <body>
                            <div class="email-container">
                                <div class="email-content">
                                    <div class="logo">
                                        <img src="https://buysimutech.co.ke/wp-content/uploads/2024/04/cropped-buy-simu-logo-no-bg.png" alt="Buysimu Logo">
                                    </div>
                                    <h1>Documents Not Approved</h1>
                                    <p>Dear '.$name.',</p>
                                    <hr/>
                                    <p>We regret to inform you that your documents have not been approved at this time.</p>
                                    <p>We understand that this may be disappointing, but we encourage you to try again after a few months. This will give you time to gather any necessary information or improvements needed for your application.</p>
                                    <p>In the meantime, please remember to keep your account details safe and secure. You can use these details to log in and continue with your application in the future.</p>
                                    <div class="button-container">
                                        <a href="https://client.buysimutech.co.ke/login.php" class="button">Login Now</a>
                                    </div>
                                    <p>If you have any questions or need assistance, feel free to contact our support team.</p>
                                    <p>Kind Regards,<br>The Buysimu Onboarding Team</p>
                                </div>
                                <div class="footer">
                                    &copy; 2024 Buysimu. All rights reserved.
                                </div>
                            </div>
                        </body>
                    </html>';

               }

                $mail->send();
            } catch (Exception $e){

            }
        }