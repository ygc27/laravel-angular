<?php

namespace ProjetoAngular\OAuth;

use Illuminate\Support\Facades\Auth;

/**
 * Description of PasswordGrantVerifier
 *
 * @author yasmany
 */
class PasswordGrantVerifier {

    public function verify($username, $password) {
        $credentials = [
            'email' => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }

}
