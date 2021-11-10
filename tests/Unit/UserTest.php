<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_login_form()
    {
        $response = $this->get('/student-login');

        $response->assertStatus(200);
    }

    public function test_email_duplication()
    {
       $user1 = User::make([
        'name' => 'washington',
        'phone_number' => '0712345',
        'registration_number' => '12345',
        'email' => 'wash@gmail.com',
        'password' => Hash::make('12345'),
       ]);

       $user2 = User::make([
        'name' => 'Awala',
        'phone_number' => '07123456',
        'registration_number' => '123456',
        'email' => 'wash@gmail.com',
        'password' => Hash::make('123456'),
       ]);

       $this->assertTrue($user1->email != $user2->email);
    }
}
