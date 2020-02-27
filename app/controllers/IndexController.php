<?php


namespace App\Controllers;


use App\Classes\Mail;

class IndexController extends BaseController
{
    public function show()
    {
        echo 'Inside homePage from Index controller';
        $mail = new Mail();

        $data = [
          'to' => getenv('ADMIN_EMAIL'),
            'subject' => 'Welcome to ecommerce',
            'view' => 'welcome',
            'name' => 'John Doe',
            'body' => 'Testing email sending'
        ];

        if($mail->send($data)) {
            echo 'Email sent successfully';
        } else {
            echo 'Email sending failed';
        }
    }
}