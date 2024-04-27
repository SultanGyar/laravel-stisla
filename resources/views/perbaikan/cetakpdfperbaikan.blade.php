<!DOCTYPE html>
<html>

<head>
    <title>:: LAPORAN DATA PERBAIKAN</title>
    <link href="styles_cetak.css" rel="stylesheet" type="text/css">
    <style>
        /* Tambahkan properti CSS untuk orientasi landscape */
        @page {
            size: landscape;
        }

        /* Sisipkan gaya yang ada di dalam tag <style> ke dalam tag <head> */
        body,
        td,
        th {
            font-family: Courier New, Courier, monospace;
        }

        body {
            margin: 0px auto 0px;
            padding: 3px;
            font-size: 12px;
            color: #333;
            width: 95%;
            background-position: top;
            background-color: #fff;
        }

        .table-list {
            clear: both;
            text-align: left;
            border-collapse: collapse;
            margin: 0px 0px 10px 0px;
            background: #fff;
        }

        .table-list td {
            color: #333;
            font-size: 12px;
            border-color: #fff;
            border-collapse: collapse;
            vertical-align: center;
            padding: 3px 5px;
            border-bottom: 1px #CCCCCC solid;
        }
    </style>
</head>

<body>
    <center>
        <h2> LAPORAN DATA PERBAIKAN </h2>
        <p>Range Date : {{ $startDate }} s/d {{ $endDate }}</p>
    </center>
    <table class="table-list" width="100%" border="0" cellspacing="1" cellpadding="2">
        <thead>
            <tr>
                <td bgcolor="#F5F5F5">No</td>
                <td bgcolor="#F5F5F5">ID Perbaikan</td>
                <td bgcolor="#F5F5F5">Tanggal</td>
                <td bgcolor="#F5F5F5">Nama Alat</td>
                <td bgcolor="#F5F5F5">ID Alat</td>
                <td bgcolor="#F5F5F5">Pelapor</td>
                <td bgcolor="#F5F5F5">Kelas</td>
                <td bgcolor="#F5F5F5">Keterangan</td>
            </tr>
        </thead>
        <tbody>
            @foreach($perbaikan as $key => $data)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $data->id_perbaikan }}</td>
                <td>{{ $data->tanggal }}</td>
                <td>{{ $data->nama_alat }}</td>
                <td>{{ $data->fperalatan->id_alat }}</td>
                <td>{{ $data->nama_pelapor }}</td>
                <td>{{ $data->kelas }}</td>
                <td>{{ $data->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>