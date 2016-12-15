<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\ContactMailable;
use Illuminate\Http\Request;
use App\Http\Requests\ContactoRequest;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function alivetech(){
        return view('athome');
    }

    public function industria(){
        return view('alivetech.industria');
    }

    public function academia(){
        return view('alivetech.academia');
    }

    public function gobierno(){
        return view('alivetech.gobierno');
    }

    public function transferencia(){
        return view('alivetech.transferencia');
    }

    public function home(){
        return view('welcome');
    }

    public function about(){
        return view('alivetech.about');
    }

    public function privacy(){
        return view('alivetech.privacy');
    }

    public function emailContactForm(ContactoRequest $request){
      $nameFrom = $request->get('name');
      $mailFrom = $request->get('email');
      $mailMsg = $request->get('message');
      Mail::send('mails.contact', ['nombre' => $nameFrom, 'email' => $mailFrom, 'mensaje' => $mailMsg], function ($message)
      {
          $message->to('contacto@alivetech.mx');
      });
      flash('Gracias por su mensaje. El personal de AliveTech se pondrá en contacto con usted');
      return redirect('/#section-contact');
    }




}
