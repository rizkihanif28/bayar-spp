<table id="table-data" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Id Siswa</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jenis Kelamin</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>

    @foreach ($data as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->siswa_id }}</td>
            <td>{{ $item->nis }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->jenis_kelamin }}</td>
            <td>{{ $item->kelas }}</td>
            <td>{{ $item->jurusan }}</td>
            <td>{{ $item->alamat }}</td>
            <td>{{ $item->telepon }}</td>
            <td>
                <button class="btn btn-success btn-sm">Update</button>
                <button class="btn btn-danger btn-sm">Delete</button>
                {{-- <div class="btn-group" role="group">
                    <button type="button" class="btn btn-success">Update</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </div> --}}
            </td>
        </tr>
    @endforeach
</table>
