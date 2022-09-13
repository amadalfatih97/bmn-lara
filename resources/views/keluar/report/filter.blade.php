<div style="text-align: center">
    <h2>Laporan Permintaan Barang</h2>
</div>
<hr>
<table class=" mx-2 my-3 " width="312px">
    <tr>
        <td>Dari Tanggal </td>
        <td>{{date('d M Y', strtotime($startdate))}}</td>
    </tr>
    <tr>
        <td>Hingga Tanggal </td>
        <td>{{date('d M Y', strtotime($enddate))}}</td>
    </tr>
</table>
<hr>

<div class=" mx-2 mb-2">
    <table width="100%">
        <thead>
            <td><b>No</b></td>
            <td><b>Tanggal</b></td>
            <td><b>User</b></td>
            <td><b>Jumlah Item</b></td>
        </thead>
        @foreach ($trans as $no => $items)
        <tbody>
            <td>{{++$no}}</td>
            <td>{{date('d M Y', strtotime($items->tanggal_trans))}}</td>
            <td>{{$items->user_fk}}</td>
            <td>{{$items->jumlah}}</td>
        </tbody>
        @endforeach
    </table>
</div>
<hr>
<div style="text-align:right; padding:96px 69px 0;">
    <u>
        <b>Penaggung Jawab</b>
    </u>
</div>
