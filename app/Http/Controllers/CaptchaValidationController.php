<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptchaValidationController extends Controller
{
    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

    public function captchaValidation(Request $request)
    {
        $rules = [
            'captcha' => 'required|captcha'
        ];
        $validator = validator()->make(request()->all(), $rules);
        if ($validator->fails()) {
            return false;
        } else {
            return true;
        }
    }
}
