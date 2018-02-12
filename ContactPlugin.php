<?php

namespace Craft;

class ContactPlugin extends BasePlugin
{
    public function getName()
    {
        return Craft::t('contact');
    }

    public function getVersion()
    {
        return '1.0';
    }

    public function getDeveloper()
    {
        return 'Webstudio Zimmerli';
    }

    public function getDeveloperUrl()
    {
        return 'http://www.webstudio-zimmerli.ch';
    }
}

/**
 * 	Convenience Plugin Instance
 *
 * @return mixed
 */
function contact()
{
    return Craft::app()->getComponent('contact');
}