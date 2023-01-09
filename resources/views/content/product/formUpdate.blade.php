@extends('layout.main')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Update Product</h3>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('pr.update',[$product->id])}}">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input class="form-control col-3" value="{{$product->name}}" type="text" name="name" required />
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input class="form-control col-3" value="{{$product->price}}" type="number" min="1" name="price" required />
                </div>
                <div class="form-group">
                    <label for="">Expired</label>
                    <input class="form-control col-3" value="{{$product->expired}}" type="date" name="expired" required />
                </div>
                <div class="form-group">
                    <label for="">Stock</label>
                    <input class="form-control col-3" value="{{$product->stock}}" type="number" min="1" name="stock" required />
                </div>
                <input type="hidden" name="id" value="{{$product->id}}">
                <a class="btn btn-info" href="{{route('pr.list')}}">Kembali</a>
                <button class="btn btn-success" type="submit">Save</button>
            </form>
        </div>
        <div class="card-footer"></div>
    </div>

@endsection
