<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cetak Pengajuan Mutasi SAPRAS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }

        .noborder td {
            border: none;
            text-align: left;
            padding: 4px;
        }

        .section-title {
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>

    <h2 style="text-align: center;">AMIK TARUNA PROBOLINGGO</h2>
    <h3 style="text-align: center;">PENGAJUAN MUTASI / PINDAH LOKASI SARANA DAN PRASARANA</h3>

    <div class="section-title">A. PENGAJUAN MUTASI :</div>
    <table class="noborder">
        <tr>
            <td>No. Formulir</td>
            <td>: {{ $pengajuan->id }}</td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>: {{ \Carbon\Carbon::parse($pengajuan->tanggal)->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td>Nama Pengaju</td>
            <td>: {{ $pengajuan->user->name }}</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>: - </td>
        </tr>
        <tr>
            <td>Unit Asal</td>
            <td>: {{ $pengajuan->dari ?? '-' }}</td>
        </tr>
        <tr>
            <td>Unit Tujuan</td>
            <td>: {{ $pengajuan->ke }}</td>
        </tr>
    </table>

    <div class="section-title">B. BARANG YANG DIMUTASI :</div>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Barang</th>
                <th>Kode Inventaris</th>
                <th>Jumlah</th>
                <th>Alasan Mutasi</th>
                <th>Dari Ke</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>{{ $pengajuan->sapras->nama_barang ?? '-' }}</td>
                <td>{{ $pengajuan->sapras->kode_inventaris }}</td>
                <td>{{ $pengajuan->jumlah }}</td>
                <td>{{ $pengajuan->alasan }}</td>
                <td>{{ $pengajuan->dari ?? '-' }} → {{ $pengajuan->ke }}</td>
            </tr>
        </tbody>
    </table>

    <div class="section-title">C. PERSETUJUAN :</div>
    <table class="noborder">
        <tr>
            <td>1. Disetujui oleh Atasan Unit Asal<br>
                Nama: ............................................................<br>
                Tanda Tangan & Tanggal: ..................................
            </td>
        </tr>
        <tr>
            <td>2. Disetujui oleh Atasan Unit Tujuan<br>
                Nama: ............................................................<br>
                Tanda Tangan & Tanggal: ..................................
            </td>
        </tr>
        <tr>
            <td>3. Petugas Inventarisasi/Pengelola Aset<br>
                Nama: ............................................................<br>
                Tanda Tangan & Tanggal: ..................................
            </td>
        </tr>
    </table>

    <strong>Catatan Tambahan:</strong> ________________________________________

    <script>
        window.print(); // cetak otomatis
    </script>
</body>

</html>
