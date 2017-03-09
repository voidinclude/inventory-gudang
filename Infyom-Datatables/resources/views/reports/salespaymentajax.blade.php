@if($payment->count() > 0)
    @foreach ($payment as $rows)
        @if($loop->iteration %2 == 0 )
            <tr class="odd">
        @else
            <tr>
        @endif

                <td>{{$rows->paymentNo}}</td>
                <td>{{ date("d/m/Y", strtotime($rows->paymentDate)) }}</td>
                <td>{{$rows->customerName}}</td>
                <td>{{ strtoupper($rows->payType) }}</td>
                <td>{{ number_format($rows->total,0,',','.') }}</td>
            </tr>
    @endforeach
        <tr>
            <td style="text-align: left";><button class="btn btn-primary" id="btncetak"><i class="fa fa-print"></i> Cetak Laporan</button></td>
            <td colspan="4" style="text-align: right";>{{ $payment->links() }}</td>
        </tr>
@else
    <tr>
        <td colspan="6">Data tidak ditemukan!</td>
    </tr>
@endif