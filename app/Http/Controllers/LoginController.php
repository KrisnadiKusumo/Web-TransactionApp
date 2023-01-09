<?php

namespace App\Http\Controllers;

use App\Mail\RegisterConfirmMail;
use App\Model\Auth;
use App\Model\User;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function verifikasiUser()
    {
        $username = request('username');
        $password = request('password');
        $user = Auth::verifyUser($username, $password);
        if($user == null){
            return redirect(route('login.index'))
                ->withErrors(["Kombinasi Username dan Password Salah"]);
        }
        $token = Auth::createToken($user->id);
        session(
            [
                'token' => $token,
                'nama' => $user->nama
            ]
        );
        return redirect(route('pr.dashboard'));
    }

    public function logout()
    {
        session()->forget('token');
        session()->forget('nama');
        return redirect(route('login.index'));
    }

    public function register()
    {
        return view('layout.register');
    }

    public function createRegister()
    {
        $email_confirm_token = md5(date('Y-m-d H:i:s').''.request('username'));
        $userCreate = [
            'nama' => request('nama'),
            'username' => request('username'),
            'password' => password_hash(request('password'),PASSWORD_DEFAULT),
            'role' => 'admin',
            'email_confirm_token' => md5($email_confirm_token),
            'active' => 'N'
            ];
        User::createNew($userCreate);
        Mail::to(request('username'))->send(new RegisterConfirmMail($userCreate));
        return redirect(route('login.index'));
    }

    public function confirmEmail($emailConfirmToken)
    {
        $user = User::getByEmailConfirmToken($emailConfirmToken);
        if($user !== NULL){
            User::setUserToActive($user->id);
            return redirect(route('login.index'));
        }
        return redirect(route('login.index'))
            ->withErrors(["Akun anda tidak ditemukan"]);;

    }
}
