<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>NIA</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($anggota as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->nim }}</td>
                <td>{{ $item->nia }}</td>
            </tr>
        @empty
            <tr><td colspan="5">Data Belum Tersedia</td></tr>
        @endforelse
    </tbody>
</table>
