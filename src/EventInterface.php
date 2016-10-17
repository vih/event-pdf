<?php

namespace VIH\Event;

interface EventInterface
{
    public function getTitle();
    public function getSpeaker();
    public function getLocation();
    public function getDescription();
    public function getDate();
    public function getPrice();
    public function getUrl();
    public function getImages();
}
