<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
Hai {{$user['nama']}} ({{$user['username']}}), <br>
Pendaftaran anda sudah kami terima, <br>
Silakan klik link dibawah ini untuk mengaktivasi akun anda. <br>
    <a href="{{route('register.confirm',[$user['email_confirm_token']])}}">Klik Disini</a>
</body>
</html>
