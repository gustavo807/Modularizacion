<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactMail extends Mailable
{
  protected $mailer;
  protected $from;
  protected $to;
  protected $name;
  protected $view;
  protected $msg;
  protected $data = [];
  protected $emails = array("dianaguzmane@alivetech.mx");

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
      $this->subject = 'Nuevo Mensaje en la página web.';
      return $this->view('mails.contacto')
                ->with($name, $from, $msgFrom);

  }


  public function enviarEmailContacto($nameFrom, $mailFrom, $msgFrom)
  {
    $this->to = $this->emails;
    $this->name = $nameFrom;
    $this->from = $mailFrom;
    $this->msg = $msgFrom;
    $this->view = 'mails.contact';

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
