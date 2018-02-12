<?php

namespace Craft;

class ContactController extends BaseController
{
    protected $allowAnonymous = ['actionSend'];

    public function actionSend()
    {
    	$subject = Craft::t('subject', [
        	'fullname' => craft()->request->getPost('fullname')
        ]);

        $recipientEmail = craft()->config->get('email');
        $template = $this->renderMailTemplate(craft()->request->getPost());

        if (contact()->send($subject, $recipientEmail, $template))
        {
            $this->returnJson([
                'state' => true,
                'message' => Craft::t('thanksMessage')
            ]);
        }

        $this->returnJson(compact('state'));
    }

    public function renderMailTemplate($data)
    {
        return craft()->templates->render('contact/email', [
            'entry' => $data
        ]);
    }
}