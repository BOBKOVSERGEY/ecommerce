<?php


namespace App\Classes;


use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

class ErrorHandler
{
    public function handleErrors($error_number, $error_message, $error_file, $error_line)
    {
        $error = "[
        {$error_number} An error occurred in file
        {$error_file} on line {$error_line}: {$error_message};
        ]";

        $environment = getenv('APP_ENV');
        if ($environment === 'local') {
            $whoops = new Run();
            $whoops->pushHandler(new PrettyPageHandler());
            $whoops->register();
        } else {
            $data = [
                'to' => getenv('ADMIN_EMAIL'),
                'subject' => 'System error',
                'view' => 'errors',
                'name' => 'admin',
                'body' => $error
            ];
            $this->emailAdmin($data);
            $this->outputFriendlyError();
        }
    }

    public function outputFriendlyError()
    {
        ob_end_clean();
        view('errors/generic');
        exit;
    }

    public function emailAdmin($data)
    {
        $mail = new Mail();
        $mail->send($data);
    }
}