@extends('layout.main')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Apakah Anda Yakin Ingin Menghapus?</h3>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('pr.delete', [$product->id])}}">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input class="form-control col-3" value="{{$product->name}}" type="text" name="name" required disabled>
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input class="form-control col-3" value="{{$product->price}}" type="number" min="1" name="price" required disabled>
                </div>
                <a class="btn btn-info" href="{{route('pr.list')}}">Kembali</a>
                <button class="btn btn-danger" type="submit">Hapus</button>
            </form>
        </div>
        <div class="card-footer"></div>
    </div>

@endsection
