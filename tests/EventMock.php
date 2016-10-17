<?php

namespace VIH\Event\Tests;

use VIH\Event\EventInterface;

class EventMock implements EventInterface
{
    function getTitle()
    {
        return 'My lecture title';
    }

    function getDescription()
    {
        return 'My somewhat long description which has lots of cool lingo, so people want to buy the lecture.';
    }

    public function getSpeaker()
    {
        return 'Lars Olesen';
    }

    public function getLocation()
    {
        return 'Vejle Idrætshøjskole';
    }

    public function getDate()
    {
        return '14. juni 1976, kl. 20.00-22.00';
    }

    public function getPrice()
    {
        return '50 kroner';
    }

    public function getUrl()
    {
        return 'http://vih.dk/foredrag';
    }

    public function getImages()
    {
        return;
    }
}
