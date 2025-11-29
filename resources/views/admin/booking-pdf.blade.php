<!DOCTYPE html>
<html>
<head>
    <title>Daftar Booking Auditorium</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            margin: 0;
            font-size: 18px;
        }
        .header p {
            margin: 5px 0;
        }
        .status-approved {
            color: green;
            font-weight: bold;
        }
        .status-pending {
            color: orange;
            font-weight: bold;
        }
        .status-rejected {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>DAFTAR PENGAJUAN BOOKING AUDITORIUM</h1>
        <p>FMIPA Universitas Riau</p>
        <p>Tanggal Cetak: {{ date('d F Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Peminjam</th>
                <th>Kegiatan</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $index => $booking)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    {{ $booking->peminjam }}<br>
                    <small>PIC: {{ $booking->pic_name }}</small>
                </td>
                <td>{{ $booking->nama_kegiatan }}</td>
                <td>{{ \Carbon\Carbon::parse($booking->tanggal)->format('d/m/Y') }}</td>
                <td>{{ $booking->jam_mulai }} - {{ $booking->jam_selesai }}</td>
                <td>
                    @if($booking->status == 'approved')
                        <span class="status-approved">Disetujui</span>
                    @elseif($booking->status == 'pending')
                        <span class="status-pending">Pending</span>
                    @else
                        <span class="status-rejected">Ditolak</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
