<div class="p-2">
    <div class="form-group mb-4">
        <input type="text" name="siswa-id" class="form-control" id="siswa_id" placeholder="ID SISWA" required>
    </div>

    <div class="form-group mb-4">
        <input type="text" name="nis" class="form-control" id="nis" placeholder="NIS" required>
    </div>

    <div class="form-group mb-4">
        <input type="name" name="name" class="form-control" id="name" placeholder="Nama" required>
    </div>

    <div class="form-group mb-4">
        <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" required>
    </div>

    <div class="form-group mb-4">
        <input class="form-control" list="datalistOptions" id="jenis_kelamin" placeholder="Jenis Kelamin" required>
        <datalist id="datalistOptions">
            <option value="L">
            <option value="P">
        </datalist>
    </div>

    <div class="form-group mb-4">
        <input class="form-control" list="datalistKelas" id="kelas" placeholder="Kelas" required>
        <datalist id="datalistKelas">
            <option value="X">
            <option value="XI">
            <option value="XII">
        </datalist>
    </div>

    <div class="form-group mb-4">
        <input class="form-control" list="datalistJurusan" id="jurusan" placeholder="Jurusan" required>
        <datalist id="datalistJurusan">
            <option value="Teknik Sepeda Motor">
            <option value="Teknik Kendaraan Ringan">
            <option value="Akutansi">
            <option value="Administrasi Perkantoran">
        </datalist>
    </div>

    <div class="form-group mb-3">
        <textarea class="form-control" id="alamat" rows="3" placeholder="Alamat" required></textarea>
    </div>

    <div class="form-group mb-4">
        <input type="text" name="telepon" class="form-control" id="telepon" placeholder="Telepon" required>
    </div>

    <div class="form-group">
        <button class="btn btn-success mt-2" onclick="store()">Submit</button>
    </div>
</div>
