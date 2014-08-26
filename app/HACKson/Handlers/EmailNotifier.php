<?php
/**
 * Created by PhpStorm.
 * User: jimmitjoo
 * Date: 14-08-23
 * Time: 22:12
 */

namespace HACKson\Handlers;

use HACKson\Mailers\UserMailer;
use HACKson\Registration\Events\UserHasRegistered;
use Laracasts\Commander\Events\EventListener;

class EmailNotifier extends EventListener {


    /**
     * @var \HACKson\Mailers\UserMailer
     */
    private $mailer;

    function __construct(UserMailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function whenUserHasRegistered(UserHasRegistered $event)
    {
        $this->mailer->sendWelcomeMessageTo($event->user);
    }
    
} 