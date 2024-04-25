<?php

require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';
require '../vendor/phpmailer/phpmailer/src/Exception.php';


use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
class Newsletter
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function insertEmail($email)
    {
        $sql = "INSERT INTO newsletter (email) VALUES (:email)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        if ($stmt->execute()) {
            $this->sendWelcomeEmail($email);
            return true;
        } else {
            return false;
        }
    }

    public function emailExists($email)
    {
        $sql = "SELECT * FROM newsletter WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    private function sendWelcomeEmail($email)
    {
        $mailer = new PHPMailer(true);

        try {
            $mailer->isSMTP();
            $mailer->Host = 'smtp.gmail.com';
            $mailer->SMTPAuth = true;
            $mailer->Username = ''; 
            $mailer->Password = ''; 
            $mailer->SMTPSecure = 'tls';
            $mailer->Port = 587;

            $mailer->setFrom('', 'Mercadinho');
            $mailer->addAddress($email);
            $mailer->Subject = 'Newsletter Subscription';
            $mailer->Body = 'Thank you for subscribing to our newsletter!';

            $mailer->send();
        } catch (Exception $e) {
            echo 'Error sending welcome email: ' . $e->getMessage();
        }
    }
}

require_once 'dbh.php';
$newsletter = new Newsletter($conn);


  