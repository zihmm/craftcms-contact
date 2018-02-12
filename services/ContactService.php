<?php

namespace Craft;

class ContactService extends BaseApplicationComponent
{
    public function send($subject, $to, $template)
    {
        $mail = new EmailModel([
            'toEmail' => $to ? $to : $this->getRecipientMailAddress(),
            'subject' => $subject,
            'body' => $template
        ]);

        return craft()->email->sendEmail($mail);
    }

    protected function getRecipientMailAddress()
    {
    	$configMail = craft()->config->get('email');
    	return $configMail ? $configMail : craft()->systemSettings->getSetting('email', 'emailAddress');
    }
}