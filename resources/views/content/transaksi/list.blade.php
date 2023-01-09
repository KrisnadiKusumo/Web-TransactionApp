@extends('layout.main')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List Data Transaksi</h3>
        </div>
        <div class="card-body"></div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                </tr>
                <th>Trx Number</th>
                <th>Status</th>
                <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($transaksi as $row)
                    <tr>
                        <td>{{$row->number}}</td>
                        <td>{{$row->created_at}}</td>
                        <td>{!!\App\Helper\Util::getStatusTrx($row->status)!!}</td>
                        <td>
                            <a href="{{url('app/'.$row->number)}}" class="btn btn-primary btn-sm">
                                <i class="fas fa-cart-plus"> </i>
                            </a>
                            <a target="_blank" href="{{route('trx.excel',[$row->number])}}" class="btn btn-sm btn-success"
                               data-toggle="tooltip" data-placement="top" title="Export To Excel">
                                <i class="fas fa-file-excel"></i>
                            </a>
                            <a target="_blank" href="{{route('trx.pdf',[$row->number])}}" class="btn btn-sm btn-danger"
                               data-toggle="tooltip" data-placement="top" title="Export To Excel">
                                <i class="fas fa-file-pdf"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">

    </div>
    </div>
@endsection
