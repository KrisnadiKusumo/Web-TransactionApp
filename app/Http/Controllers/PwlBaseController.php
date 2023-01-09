<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

abstract class PwlBaseController extends Controller
{
    private $user;
    public function __construct()
    {
        $this->middleware(function ($request,$next){
            $token = session('token');
            $user = User::getByToken($token);
            if($user == null){
                Redirect::to(route('login.index'))->send();
                exit;
            }
            #login berhasil
            $this->User = $user;
            return $next($request);
        });
    }
    public function getIdUser()
    {
        return $this->User->id;
    }
    public function isSuperadmin()
    {
        $result = false;
        if($this->User->role === 'superadmin'){
            $result = true;
        }
        return $result;
    }
    public function onlySuperAdmin()
    {
      if($this->User->role !== 'superadmin'){
          throw new AccessDeniedHttpException();
      }
    }
}
