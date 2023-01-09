<style>
    th {
        border: 2px solid #000000;
        background: #aaaaaa;
        padding: 4px 8px 4px 8px;
    }
    td {
        border: 2px solid #000000;
    }
    .text-right{
        text-align: right;
    }
</style>
<h1>Laporan Transaksi {{$trxNumber}}</h1>

<table style="width: 100%;">
    <thead>
    <tr>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Harga Barang</th>
        <th>Jumlah Barang</th>
        <th>Total Barang</th>
    </tr>
    </thead>
    <tbody>
    @php
        $total = 0;
    @endphp
    @foreach($itemTransaksi as $row)
        @php
            $totalItem = (int)$row->price * (int)$row->amount;
            $total += $totalItem;
        @endphp
        <tr>
            <td>{{$row->code}}</td>
            <td>{{$row->name}}</td>
            <td class="text-right text-monospace">{{App\Helper\Util::rupiah($row->price)}} </td>
            <td class="text-right text-monospace">{{$row->amount}}</td>
            <td class="text-right text-monospace">{{App\Helper\Util::rupiah($totalItem)}}</td>
        </tr>
    @endforeach
    <tr>
        <td colspan="4">Total Belanja</td>
        <td class="text-right text-monospace">{{\App\Helper\Util::rupiah($total)}}</td>
    </tr>
    </tbody>
</table>

