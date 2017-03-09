@if($invoice->count() > 0)
    @foreach ($invoice as $rows)
        @if($loop->iteration %2 == 0 )
            <tr class="odd">
        @else
            <tr>
                @endif

                <td>{{$rows->invoiceNo}}</td>
                <td>{{ date("d/m/Y", strtotime($rows->invoiceDate)) }}</td>
                <td>{{$rows->customerName}}</td>
                <td>{{ number_format($rows->total,0,',','.') }}</td>
                <td>{{ number_format($rows->discount,0,',','.') }}</td>
                <td>{{ number_format($rows->grandtotal,0,',','.') }}</td>
                <td>{{$rows->statusText}}</td>
            </tr>
            @endforeach
            <tr>
                <td style="text-align: left";><button class="btn btn-primary" id="btncetak"><i class="fa fa-print"></i> Cetak Laporan</button></td>
                <td colspan="5" style="text-align: right";>{{ $invoice->links() }}</td>
            </tr>
            @else
                <tr>
                    <td colspan="7">Data tidak ditemukan!</td>
                </tr>
            @endif