@if($orders->count() > 0)
    @foreach ($orders as $rows)
        @if($loop->iteration %2 == 0 )
        <tr class="odd">
        @else
        <tr>
            @endif

            <td>{{$rows->soNo}}</td>
            <td>{{ date("d/m/Y", strtotime($rows->orderDate)) }}</td>
            <td>{{$rows->customerName}}</td>
            <td>{{$rows->statusText}}</td>
        </tr>
    @endforeach
        <tr>
            <td style="text-align: left";><button class="btn btn-primary" id="btncetak"><i class="fa fa-print"></i> Cetak Laporan</button></td>
            <td colspan="3" style="text-align: right";>{{ $orders->links() }}</td>
        </tr>
@else
    <tr>
        <td colspan="4">Data tidak ditemukan!</td>
    </tr>
@endif