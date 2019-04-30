<?php
/**
 * Created by PhpStorm.
 * User: mohammad
 * Date: 4/30/19
 * Time: 4:07 AM
 */

namespace App\Mailer;


use App\User;
use Illuminate\Mail\Mailer;

class AppMailer
{
protected $from = 'mj.ranjbar.94@gmail.com';
protected $to;
protected $view;
protected $data = [];
protected $mailer;

public function __construct(Mailer $mailer)
{

    $this->mailer = $mailer;

}

    public function sendEmailConfirmationTo(User $user)
    {
        $this->to = $user->email;
        $this->view = 'emails.confirm';
        $this->data = compact('user');
        $this->deliver();

}

    public function deliver()
    {
        $this->mailer->send($this->view,$this->data,function ($message){

            $message->from($this->from,'admin');
            $message->to($this->to)->subject('please confirm your email!');

        });

}


}