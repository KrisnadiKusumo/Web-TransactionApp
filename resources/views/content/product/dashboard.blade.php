@extends('layout.main')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Dashboard</h3>
        </div>
        <div class="card-body">
        <div class="jumbotron">
    <h1 class="display-4"><b>Hai Programmer WEB!</b></h1>
    <p class="lead">Ini adalah hasil Ujian Akhir Semester Matakuliah Pemrograman Web Lanjut.</p>
    <hr class="my-4">
            <div class="image">
                <img src="{{asset('assets/dist/img/Krisnadi.jpg')}}" class="rounded float-center" width="50px" alt="User Image">
            </div>
            <p></p>
    <p>Krisnadi Adi Kusumo <br> NIM: 2042101810 <br>
        Saya adalah Mahasiswa Informatika Universitas Kristen Immanuel Yogyakarta.
    </p>
    <p>Yuk kenal lebih dekat dengan Krisnadi dengan Klik Tombol Dibawah ini!</p>
    <a class="btn btn-primary btn-lg" href="https://www.instagram.com/krisnadi__/" role="button">
        <i class="fab fa-instagram"></i>
    </a>
    <a class="btn btn-primary btn-lg" href="https://www.facebook.com/people/Krisnadi-Adi-Kusumo/100009049629435/" role="button">
        <i class="fab fa-facebook"></i>
    </a>
</div>
    </div>
    </div>
@endsection
