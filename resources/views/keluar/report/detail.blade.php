<div style="text-align: center">
    <h2>Form Permintaan Barang</h2>
</div>
<hr>
<table class=" mx-2 my-3 " width="312px">
    <tr>
        <td>Kode </td>
        <td>{{$trans->kode}}</td>
    </tr>
    <tr>
        <td>Tanggal </td>
        <td>{{date('d M Y', strtotime($trans->tanggal_trans))}}</td>
    </tr>
</table>
<hr>

<div class=" mx-2 mb-2">
    <table width="100%">
        <thead>
            <td><b>No</b></td>
            <td><b>Item</b></td>
            <td><b>Quantity</b></td>
            <td><b>Satuan</b></td>
        </thead>
        @foreach ($detail as $no => $items)
        <tbody>
            <td>{{++$no}}</td>
            <td>{{$items->namabarang}}</td>
            <td>{{$items->quantity}}</td>
            <td>{{$items->namasatuan}}</td>
        </tbody>
        @endforeach
    </table>
</div>
<hr>
<div style="text-align:right; padding:96px 69px 0;">
    <u>
        <b>User Request</b>
    </u>
</div>

<script type="text/javascript">
    window.print();
</script>