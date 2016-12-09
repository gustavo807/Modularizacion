<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Mail\Mailer;

class ProspectMail {



    protected $mailer;
    protected $from = 'no-reply@alivetech.mx';
    protected $to;
    protected $view;
    protected $data = [];
    protected $emails = array("dianaguzmane@alivetech.mx", "juliovega@alivetech.mx", "abrahamlara@alivetech.mx");

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
        $this->subject = 'Nuevo cuestionario de prospección en el sistema.';
        return $this->view('mails.prospección');

    }

    public function sendEmailProspect()
    {
      $this->to = $this->emails;
      $this->view = 'mails.prospeccion';
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
