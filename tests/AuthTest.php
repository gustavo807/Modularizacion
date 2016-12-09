<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthTest extends TestCase
{

  use DatabaseTransactions;

  /**@test**/

  function user_registers_but_must_confirm_email()
  {
    $this->visit('register')
    ->type('JohnDoe', 'name')
    ->type('john@example.com', 'email')
    ->type('password', 'password')
    ->press('Register');

    $this->see('Confirm email')
    ->seeInDatabase('users', ['name' => 'JohnDoe', 'active' => 0]);
  }
}
