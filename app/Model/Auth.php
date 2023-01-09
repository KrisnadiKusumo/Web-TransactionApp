<?php

namespace App\Model;

use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class Auth
{
    public static function verifyUser($username, $password)
    {
        $query = "select * from users where username=?";
        $user = collect(DB::select($query,[$username]))->first();
        if($user != NULL){
            if(password_verify($password,$user->password)){
                return $user;
            }
        }
        return NULL;
    }

    public static function createToken($idUser)
    {
        $token = md5(date('Y-m-d H:i:s').$idUser);
        DB::table('users')
            ->where('id','=', $idUser)
            ->update(['token'=>$token]);
        return $token;
    }
}
