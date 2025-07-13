<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Berita Acara Mutasi</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            font-size: 14pt;
            margin: 40px 60px;
        }

        h3, h4 {
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .judul {
            margin-bottom: 30px;
        }

        p {
            text-align: justify;
            margin: 10px 0;
        }

        .content {
            margin-left: 40px;
        }

        .nomor {
            width: 30px;
            display: inline-block;
        }

        .label {
            width: 180px;
            display: inline-block;
        }

        .value {
            display: inline-block;
        }

        .ttd {
            margin-top: 10px;
        }

        .ttd table {
            width: 100%;
            text-align: center;
        }

        .ttd td {
            vertical-align: bottom;
            height: 120px;
        }
    </style>
</head>
<body onload="window.print()">

    <h3>AMIK TARUNA PROBOLINGGO</h3>
    <h4 class="judul">BERITA ACARA<br>MUTASI SARANA DAN PRASARANA</h4>

    <p>Pada hari ini <span style="text-decoration: underline;">............................</span>, tanggal
    <span style="text-decoration: underline;">{{ \Carbon\Carbon::parse($pengajuan->tanggal)->format('d-m-Y') }}</span> telah disetujui dan dilakukan mutasi lokasi Sarana dan Prasarana sebagai berikut:</p>

    <div class="content">
        <p><span class="nomor">1.</span><span class="label">Nama Barang</span><span class="value">: {{ $pengajuan->sapras->nama_barang ?? '-' }}</span></p>
        <p><span class="nomor">2.</span><span class="label">Kode Barang</span><span class="value">: {{ $pengajuan->sapras->kode_inventaris }}</span></p>
        <p><span class="nomor">3.</span><span class="label">Uraian Spesifikasi</span><span class="value">: {{ $pengajuan->alasan ?? '-' }}</span></p>
        <p><span class="nomor">4.</span><span class="label">Lokasi Lama</span><span class="value">: {{ $pengajuan->dari ?? '-' }}</span></p>
        <p><span class="nomor">5.</span><span class="label">Lokasi Baru</span><span class="value">: {{ $pengajuan->ke ?? '-' }}</span></p>
    </div>

    <p>Demikian Berita Acara ini dibuat untuk menjadi pedoman selanjutnya.</p>

    <div class="ttd">
        <table>
            <tr>
                <td colspan="2">Probolinggo, ........................................</td>
            </tr>
            <tr>
                <td>Penanggung Jawab Lama</td>
                <td>Penanggung Jawab Baru</td>
            </tr>
            <tr>
                <td>............................................</td>
                <td>............................................</td>
            </tr>
            <tr>
                <td colspan="2"><br><br>Mengetahui, Admin Sarpras</td>
            </tr>
            <tr>
                <td colspan="2">............................................</td>
            </tr>
        </table>
    </div>

</body>
</html>
