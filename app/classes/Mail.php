<?php


namespace App\Classes;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Mail
{
    protected $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer();
        $this->setUp();
    }

    public function setUp()
    {
        $this->mail->isSMTP();
        $this->mail->Host = getenv('SMTP_HOST');
        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port = getenv('SMTP_PORT');// TCP port to connect to

        $environment = getenv('APP_ENV');

        if ($environment === 'local') {
            $this->mail->SMTPDebug = '2'; // or SMTP::DEBUG_SERVER; // or 2
        }

        $this->mail->Username = getenv('EMAIL_USERNAME');
        $this->mail->Password = getenv('EMAIL_PASSWORD');

        $this->mail->isHTML(true);
       // $this->mail->SingleTo = true;

        $this->mail->setFrom(getenv('EMAIL_USERNAME'), getenv('APP_NAME'));
    }

    public function send($data)
    {
        $this->mail->addAddress($data['to'], $data['name']);
        $this->mail->Subject = $data['subject'];
        $this->mail->Body = make($data['view'], ['data' => $data['body']]);

        return $this->mail->send();
    }
}