<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Mail\WelcomeMail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use Illuminate\Contracts\Mail\Mailer;

class WelcomeMail {

    protected $mailer;
    protected $from = 'no-reply@alivetech.mx';
    protected $to;
    protected $view;
    protected $data = [];

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Mailer $mailer)
    {
      $this->mailer = $mailer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->name = 'Alive Tech';
        $this->subject = 'Bienvenido al sistema de documentación de proyectos.';
        return $this->view('mails.welcome');

    }

    public function sendEmailConfirmation(User $user)
    {
      $this->to = $user->email;
      $this->view = 'mails.welcome';
      $this->data = compact('user');

      $this->deliver();
    }

    public function deliver()
    {
      $this->mailer->send($this->view, $this->data, function($message){
        $message->from($this->from, 'Alive Tech')
                ->to($this->to);
      });
    }

}
