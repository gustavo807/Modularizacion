<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Mail\WelcomeMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;


class RegistroController extends Controller
{
    public function register()
    {
      return view ('auth.register');
    }

    public function postRegister(Request $request, WelcomeMail $mailer)
    {
      //validate the request
      $this->validate($request, [
          'name' => 'required|max:255',
          'email' => 'required|email|max:255|unique:users',
          'password' => 'required|min:6|confirmed',
          'terminos' => 'accepted',
          //'tipo' => 'required',
      ]);

      //create users
      $user = User::create([
          'nombre' => $request['name'],
          'email' => $request['email'],
          'password' => bcrypt($request['password']),
          'rol_id' => '1', //$data['tipo'],
          'activo' => '0', //$data['activo'],
      ]);

        //email confirm
        $mailer->sendEmailConfirmation($user);
      //flash the instructions
        flash('Por favor, revisa tu correo electrónico, te hemos enviado el acceso a tu cuenta.');
      //redirect back
      return redirect('login');

    }

    public function confirmEmail($token)
    {
      $user = User::whereToken($token)->firstOrFail()->confirmEmail();
      flash ('Cuenta registrada. Ahora puedes entar al sistema');
      return redirect('login');
    }

}
