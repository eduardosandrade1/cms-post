<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{


    public function create()
    {
        return view('login');
    }


    public function store(LoginRequest $request)
    {
        // try {

        //     $attempt = Auth::attempt([
        //         'email' => $request->post('email'),
        //         'password' => $request->post('password'),
        //     ]);

        //     if ( ! $attempt ) {
        //         return redirect()->route('login.create')->withErrors("Login ou senha inválidos");
        //     }

        //     return redirect()->route('home');

        // } catch (Exception $e) {
        //     Log::error($e->getMessage() . " " . $e->getLine());
        //     return redirect()->route('login.create');
        // }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
