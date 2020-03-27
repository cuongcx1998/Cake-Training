<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;

class MailCommonMailer extends Mailer
{
    public function salary($data = [])
    {
        TransportFactory::setConfig('mail', [
            'host' => $data['host'],
            'port' => 587,
            'username' => $data['from'],
            'password' => $data['password'],
            'className' => 'Smtp',
            'tls' => true
        ]);

        $this->setTransport('mail')
             ->setFrom($data['from'])
             ->setTo($data['to'])
             ->emailFormat('html')
             ->setViewVars($data)
             ->setSubject($data['title'])
             ->setAttachments($data['attachment'])
             ->viewBuilder()->setTemplate('salary');
    }

}

