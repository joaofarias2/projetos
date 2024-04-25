<?php

require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';
require '../vendor/phpmailer/phpmailer/src/Exception.php';


use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;

class EmailSender
{
    private $conn;
    private $mailer;

    public function __construct($conn)
    {
        $this->conn = $conn;
        $this->mailer = new PHPMailer(true);
        $this->initMailer();
    }

    private function initMailer()
    {
        try {
           
            $this->mailer->isSMTP();
            $this->mailer->Host = 'smtp.gmail.com';
            $this->mailer->SMTPAuth = true;
            $this->mailer->Username = 'testeparamercadinho@gmail.com'; 
            $this->mailer->Password = 'vnnz tctv escy gzep'; 
            $this->mailer->SMTPSecure = 'tls';
            $this->mailer->Port = 587;

            
            $this->mailer->setFrom('testeparamercadinho@gmail.com', 'Mercadinho');
            $this->mailer->Subject = 'Newsletter Subscription';
            $this->mailer->Body = 'Thank you for subscribing to our newsletter!';

            
            $sql = "SELECT email FROM newsletter";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $recipients = $stmt->fetchAll(PDO::FETCH_COLUMN);

           
            foreach ($recipients as $recipient) {
                $this->mailer->addAddress($recipient);
            }

            
            $this->mailer->isHTML(true);
        } catch (Exception $e) {
            echo 'Error initializing PHPMailer: ' . $e->getMessage();
            exit;
        }
    }

    public function sendEmail()
    {
        try {
            $this->mailer->send();
            echo 'Email sent successfully';
        } catch (Exception $e) {
            echo 'Error sending email: ' . $e->getMessage();
        }
    }
}

require_once 'dbh.php';

$emailSender = new EmailSender($conn);
$emailSender->sendEmail();


