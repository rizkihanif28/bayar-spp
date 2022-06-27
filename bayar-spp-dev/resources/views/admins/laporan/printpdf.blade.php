<!DOCTYPE html>
<html>

<head>
    <title>GENERATE PDF</title>
</head>

<body>
    <br><br>
    <h2 class="text-center" style="font-family: sans-serif;">Laporan Pembayaran SPP</h2>
    <br>
    <b>Dari Tanggal {{ \Carbon\Carbon::parse(request()->tanggal_mulai)->format('d-m-Y') }} -
        {{ \Carbon\Carbon::parse(request()->tanggal_selesai)->format('d-m-Y') }}</b><br><br>
    <table style="" border="1" cellspasing="0" cellpadding="10" widht="100%">
        <thead>
            <tr>
                <th scope="col" style="font-family: sans-serif;">No</th>
                <th scope="col" style="font-family: sans-serif;">Nama Siswa</th>
                <th scope="col" style="font-family: sans-serif;">NIS</th>
                <th scope="col" style="font-family: sans-serif;">Kelas</th>
                <th scope="col" style="font-family: sans-serif;">Tanggal Bayar</th>
                <th scope="col" style="font-family: sans-serif;">Bulan</th>
                <th scope="col" style="font-family: sans-serif;">Jumlah Bayar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $item)
                <tr>
                    <th scope="row" style="font-family: sans-serif;">{{ $loop->iteration }}</th>
                    <td style="font-family: sans-serif;">{{ $item->siswa->nama_siswa }}</td>
                    <td style="font-family: sans-serif;">{{ $item->nis }}</td>
                    <td style="font-family: sans-serif;">{{ $item->siswa->kelas->nama_kelas }}</td>
                    <td style="font-family: sans-serif;">
                        {{ \Carbon\Carbon::parse($item->tanggal_bayar)->format('d-m-Y') }}</td>
                    <td style="font-family: sans-serif;">{{ $item->bulan_bayar }}</td>
                    <td style="font-family: sans-serif;">{{ $item->jumlah_bayar }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
