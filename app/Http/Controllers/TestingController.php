<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class TestingController
{
    public function mail()
    {
        $emailPenerima = "krisnadi.a2042@student.ukrimuniversity.ac.id";
        $mail = Mail::to($emailPenerima)
            ->send(new TestMail());
        dd($mail);
    }
}
