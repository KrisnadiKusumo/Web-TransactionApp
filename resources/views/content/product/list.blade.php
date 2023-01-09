@extends('layout.main')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Product</h3>
    </div>
    <div class="card-body">
        <a class="btn btn-outline-primary mb-2" href="{{route('pr.formNew')}}">Add New Product</a>
        <table class="table table-sm table-bordered table-striped">
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Name</th>
                <th>Price</th>
                <th>Expired</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>
            @php($no = 1)
            @foreach($products as $product)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$product->code}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->expired}}</td>
                    <td>{{$product->stock}}</td>
                    <td>
                        <a class="btn btn-sm btn-warning" href="{{route('pr.formUpdate',[$product->id])}}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button type="button" class="btn btn-sm btn-danger btn-konfirmasi-hapus" data-toggle="modal" data-target="#modal-konfirmasi-hapus">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
        @endforeach
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-konfirmasi-hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Anda Yakin Ingin Hapus Data Ini?
                <br>Id Produk  : <b id="modal-id-produk"></b>
                <br>Nama Produk : <b id="modal-nama-produk"></b>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="#" id="btn-proses-hapus" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>

<script>
    $(function (){
        $('.btn-konfirmasi-hapus').click(function () {
            let namaProduk = $(this).data('nama-produk');
            let idProduk = $(this).data('id-produk');
            $('#modal-id-produk').text(idProduk);
            $('#modal-nama-produk').text(namaProduk);
            $('#modal-konfirmasi-hapus').modal('show');
            $('#btn-proses-hapus').attr('href', '/product/'+ idProduk +'/delete');
        });
    });
</script>
    @endsection
