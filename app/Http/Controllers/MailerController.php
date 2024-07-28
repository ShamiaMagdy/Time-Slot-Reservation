<?php

namespace App\Http\Controllers;

use App\Mail\VerificationCodeMail;
use App\Models\VerificationCode;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class MailerController extends Controller
{
    public static function sendVerificationCode($user)
    {
        $verificationCode = rand(100000, 999999);
        VerificationCode::create([
            'email' => $user->email,
            'code' => $verificationCode,
            'expires_at' => Carbon::now()->addMinutes(10),
        ]);
        Mail::to($user->email)->send(new VerificationCodeMail($verificationCode));
    }

    public function checkVerification($email, $verificationcode)
    {
        $actualUserData = VerificationCode::where('email', $email)->first();
        echo $actualUserData;
        if ($actualUserData && $actualUserData->expires_at > now()) {
            if ($actualUserData->code == $verificationcode) {
                $actualUserData->delete();
                return response()->json(['message : ' => 'Verification Success']);
            } else {
                return response()->json(['Error :' => 'Invalid Verification Code']);
            }

        } else {
            return response()->json(['Error : ' => 'Verification Code Has Expired Or Does Not Exsit']);
        }

    }
}
