<?php namespace HACKson\Statuses\Events;


class StatusWasPublished {


    private $body;

    function __construct($body)
    {
        $this->body = $body;
    }
}