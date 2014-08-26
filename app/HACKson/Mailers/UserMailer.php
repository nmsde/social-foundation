<?php
/**
 * Created by PhpStorm.
 * User: jimmitjoo
 * Date: 14-08-23
 * Time: 22:18
 */

namespace HACKson\Mailers;

use HACKson\Users\User;

class UserMailer extends Mailer {

    public function sendWelcomeMessageTo(User $user)
    {
        $subject = Lang::get('default.Welcome To') . ' ' . Lang::get('default.Sitename') . '!';
        $view = 'emails.registration.confirm';
        $data = [];

        return $this->sendTo($user, $subject, $view, $data);
    }

} 