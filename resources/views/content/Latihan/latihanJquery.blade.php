@extends('layout.main')
@section('content')
    <p class="coba">
        Hello World 1
    </p>
    <p class="coba">
        Hello World 2
    </p>
    <p class="coba">
        Hello World 3
    </p>

    <button id="btn-sembunyikan-semua">Sembunyikan Semua</button>
    <button id="btn-sembunyikan-terakhir">Sembunyikan yang terakhir</button>

    <script>
        $(function () {
            //bisa melakukan code jquerydi dalam ini
            $('#btn-sembunyikan-semua').click(function () {
                $('p').hide();
            });
            $('#btn-sembunyikan-terakhir').click(function () {
                $('.coba2').hide();
            });
        });
    </script>
@endsection
