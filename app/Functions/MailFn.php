<?php

namespace App\Functions;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Str;
use App\Mail\ResetMail;


class MailFn
{
    public static function forgot($email)
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            return false;
        }

        $token = Str::random(20);

        DB::table('password_resets')->insert([
            'email' => $user->email,
            'token' => $token,
        ]);

        $mail = new ResetMail(['token' => $token]);

        Mail::to($user->email)->send($mail);
        return true;
    }

    public static function contact($data)
    {
        $mail = new ContactMail($data);
        /*$mail->withSwiftMessage(function ($message) use ($data) {
            $message->setFrom($data['email'], $data['name']);
        });*/
        Mail::to(env('MAIL_CONTACT_ADDRESS'))->send($mail);
        return true;
    }
}
