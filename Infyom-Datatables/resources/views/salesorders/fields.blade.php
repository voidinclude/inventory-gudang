<div class="form-group col-sm-2">
    <label for="orderDate">Tanggal Pesan:</label>
    <input type="text" name="orderDate" id="orderDate" value="{{ $dataPesan['orderDate'] }}" class="form-control input-large" placeholder="dd-mm-YYYY" {{ $disabled }}>
</div>

<div class="form-group col-sm-2">
    <label for="needDate">Tanggal Dibutuhkan:</label>
    <input type="text" name="needDate" id="needDate" value="{{ $dataPesan['needDate'] }}" class="form-control input-large" placeholder="dd-mm-YYYY" {{ $disabled }}>
</div>

<div class="form-group col-sm-2"></div>

<div class="form-group col-sm-6">
    <label for="soNo">Nomor Faktur:</label>
    <input type="text" name="soNo" id="soNo" class="form-control input-small" readonly="readonly" value="{{ $dataPesan["soNo"] }}" {{ $disabled }}>
</div>

<div class="form-group col-sm-6">
    <label for="customerName">Customer:</label>
    <input type="text" value="{{ $dataPesan["customerName"] }}" name="customerName" id="customerName" class="form-control input-medium" placeholder="Nama Customer, Kode Customer" {{ $disabled }} {{ ($action == 'edit' ? 'readonly="readonly"' : '') }}>
    <input type="hidden" value="{{ $dataPesan["customerID"] }}" name="customerID" id="customerID"  {{ $disabled }}>
    <input type="hidden" value="{{ $dataPesan["customerName"] }}" name="customerLabel" id="customerLabel"  {{ $disabled }}>
</div>

<div class="form-group col-sm-6">
    <label for="customerAddress">Alamat Customer:</label>
    <textarea class="form-control" readonly="readonly" name="customerAddress" cols="50" rows="2" id="customerAddress" {{ $disabled }}>{{ $dataPesan["customerAddress"] }}</textarea>
</div>

<div class="form-group col-sm-12 col-lg-12">
    <label class="label-inline">Produk</label>
    <div class="input-group">
        <input type="text" name="itemName" id="itemName" class="form-control" placeholder="Nama Produk, Kode Produk" {{ $disabled }}>
        <input type="hidden" name="itemID" id="itemID" {{ $disabled }}>
        <input type="hidden" name="itemSKU" id="itemSKU" {{ $disabled }}>
        <input type="hidden" name="itemPrice" id="itemPrice" {{ $disabled }}>
        <input type="hidden" name="itemPricelabel" id="itemPricelabel" {{ $disabled }}>
        <input type="hidden" name="itemUnit" id="itemUnit" {{ $disabled }}>
        <input type="hidden" name="itemLabel" id="itemLabel" {{ $disabled }}>
        <span class="input-group-btn">
            <button class="btn btn-default" type="button" id="pushtoTable" {{ $disabled }}><i class="fa fa-plus"></i> Tambah Produk</button>
        </span>
    </div>
</div>

<div class="col-sm-12 col-lg-12">
    <div class="table-responsive">
        <table id="detailso" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="header">SKU</th>
                    <th class="header">NAMA PRODUK</th>
                    <th class="header">HARGA</th>
                    <th class="header">QTY</th>
                    <th class="header">UNIT</th>
                    <th class="header">SUBTOTAL</th>
                    <th class="header"></th>
                </tr>
            </thead>
            <tbody id="loaditems">
            @if($items != null)
            @foreach ($items as $items)
                <tr id="tr-{{ $loop->iteration }}">
                    <td>{{ $items->sku }}</td>
                    <td>{{ $items->productName }}</td>
                    <td style="text-align: right;">Rp. {{ number_format($items->price,0,',','.') }}</td>
                    <td>
                        <div class="input-group" style="width: 150px;">
                            <input type="hidden" name="item_id[]" value="{{ $items->productID }}">
                            <input type="hidden" name="item_code[]" value="{{ $items->sku }}">
                            <input type="hidden" name="item_name[]" value="{{ $items->productName }}">
                            <input type="hidden" name="item_price[]" value="{{ $items->price }}">
                            <input name="item_qty[]" type="text" class="form-control input-medium input-sm input-qty"
                                   data-price="{{ $items->price }}" data-rowid="{{ $loop->iteration }}" id="qty{{ $loop->iteration }}" value="{{ $items->qty }}" {{ $disabled }}>
                            <span class="input-group-btn">
                                <button class="btn btn-default btn-sm pushQty" type="button" data-id="{{ $loop->iteration }}" {{ $disabled }}>
                                    <i class="fa fa-pencil"></i> Ubah</button>
                            </span>
                        </div></td>
                    <td>
                        @if ($items->unit === 1)
                            SET
                        @elseif ($items->qty > 1)
                            PCS
                        @else
                            LSN
                        @endif
                    </td>
                    <td style="text-align: right;">RP. <span id="subrow{{ $loop->iteration }}">{{ number_format($items->qty * $items->price,0,',','.') }}</span></td>
                    <td><button class="btn btn-danger btn-sm deleteRow" data-id="{{ $loop->iteration }}" {{ $disabled }}>
                            <i class="fa fa-times"></i></button>
                    </td>
                </tr>
            @endforeach
            @endif
            </tbody>
            <tfoot>
            <tr>
                <th colspan="5" style="text-align: right;">Total <span id="tItems">0</span> Item(s)</th>
                <th style="text-align: right;">Rp. <span id="tPrice">0</span></th>
                <th></th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>


<div class="form-group col-sm-12 col-lg-12">
    <label for="note">Keterangan:</label>
    <textarea class="form-control" name="note" cols="50" rows="3" id="note" {{ $disabled }}>{{ $dataPesan["note"] }}</textarea>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <button class="btn btn-primary" type="submit" {{ $disabled }}><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
    @if($action == 'edit')
        <a href="{{ route('salesorders.show', $salesorders->id) }}" target="_blank" class='btn btn-success '>
            <i class="glyphicon glyphicon-print"></i> Cetak Surat Jalan
        </a>
    @endif
    <a href="{!! route('salesorders.index') !!}" class="btn btn-default">Batal</a>
</div>
