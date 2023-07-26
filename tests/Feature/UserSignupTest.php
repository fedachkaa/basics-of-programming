<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class UserSignupTest extends TestCase
{
    use RefreshDatabase;

    public function test_signup_screen_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_user_can_sign_up(): void
    {
        $userData = User::factory()->make();

        $response = $this->post('/register', [
            'name' => $userData->name,
            'surname' => $userData->surname,
            'email' => $userData->email,
            'password' => $userData->password,
            'password_confirmation' => $userData->password,
        ]);

        $response->assertRedirect('/');

        $this->assertDatabaseHas('users', [
            'name' => $userData->name,
            'surname' => $userData->surname,
            'email' => $userData->email,
        ]);

        $this->assertTrue(session()->has('success'));

        $this->assertEquals('Майже готово! Щоб завершити процес реєстрації та активувати ваш обліковий запис, ми просимо вас підтвердити свою електронну пошту. Лист підтвердження вже надіслано.',
            session('success'));

        $this->assertAuthenticated();

        $user = User::where('email', $userData->email)->first();

        Notification::fake();
        $user->sendEmailVerificationNotification();
        Notification::assertSentTo($user, VerifyEmail::class);
    }
}
