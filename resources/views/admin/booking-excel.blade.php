<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Peminjam</th>
            <th>PIC Name</th>
            <th>PIC Phone</th>
            <th>Nama Kegiatan</th>
            <th>Deskripsi</th>
            <th>Tanggal</th>
            <th>Jam Mulai</th>
            <th>Jam Selesai</th>
            <th>Status</th>
            <th>Tanggal Pengajuan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bookings as $index => $booking)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $booking->peminjam }}</td>
            <td>{{ $booking->pic_name }}</td>
            <td>{{ $booking->pic_phone }}</td>
            <td>{{ $booking->nama_kegiatan }}</td>
            <td>{{ $booking->deskripsi }}</td>
            <td>{{ $booking->tanggal }}</td>
            <td>{{ $booking->jam_mulai }}</td>
            <td>{{ $booking->jam_selesai }}</td>
            <td>{{ ucfirst($booking->status) }}</td>
            <td>{{ $booking->created_at->format('d-m-Y H:i') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
