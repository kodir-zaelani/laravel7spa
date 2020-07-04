<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        // perhatikan pada url yng didefinisikan pada Http::post ('')
        $response = Http::post('http://localhost/laravel7spa/public/oauth/token',[
            'grant_type' => 'client_credentials', // 'grant_type' => 'password', akan tampil error
            'client_id' => '2', // lihat di table oauth_client
            'client_secret' => 'KBmh11aFLWih606lYSFN6cGZ8ykZrfVz18fMhJJ3', // lihat di table oauth_client
            'username' => '$request->email',
            'password' => '$request->password',
            'scope' => ''
        ]);

        if ($response->clientError()) {
            return $response->json('error email atau password salah', 400);
        }
        elseif ($response->serverError()) {
            return $response->json('Server error',500);
        }

        return $response->body();

    }
}
