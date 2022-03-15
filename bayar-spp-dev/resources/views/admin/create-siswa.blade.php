{{-- <div class="form-floating">
        <input type="siswa-id" name="siswa-id" class="form-control rounded-top @error('siswa-id') is-invalid @enderror"
            placeholder="ID SISWA" required autocomplete="siswa-id" value="{{ old('siswa-id') }}" autofocus>
        <label for="id-siswa">{{ __('ID SISWA') }}</label>
        @error('siswa-id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-floating mt-1">
        <input type="nis" name="nis" class="form-control rounded-top @error('nis') is-invalid @enderror"
            placeholder="NIS SISWA" required autocomplete="nis" value="{{ old('nis') }}">
        <label for="nis">{{ __('NIS SISWA') }}</label>
        @error('nis')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-floating mt-1">
        <input type="name" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name"
            placeholder="Name" required autocomplete="name" value="{{ old('name') }}" autofocus>
        <label for="name">{{ __('NAMA SISWA') }}</label>

        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div> --}}

<div class="mb-4">
    <input type="text" name="siswa-id" class="form-control" id="siswa-id" placeholder="ID SISWA" required>
</div>

<div class="mb-4">
    <input type="text" name="nis" class="form-control" id="nis" placeholder="NIS" required>
</div>

<div class="mb-4">
    <input type="name" name="name" class="form-control" id="name" placeholder="Nama" required>
</div>

<div class="mb-4">
    <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" required>
</div>

<div class="mb-4">
    <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Jenis Kelamin" required>
    <datalist id="datalistOptions">
        <option value="Laki-Laki">
        <option value="Perempuan">
    </datalist>
</div>

<div class="mb-4">
    <input class="form-control" list="datalistKelas" id="exampleDataList" placeholder="Kelas" required>
    <datalist id="datalistKelas">
        <option value="X">
        <option value="XI">
        <option value="XII">
    </datalist>
</div>

<div class="mb-4">
    <input class="form-control" list="datalistJurusan" id="exampleDataList" placeholder="Jurusan" required>
    <datalist id="datalistJurusan">
        <option value="Teknik Sepeda Motor">
        <option value="Teknik Kendaraan Ringan">
        <option value="Akutansi">
        <option value="Administrasi Perkantoran">
    </datalist>
</div>

<div class="mb-3">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat" required></textarea>
</div>

<div class="mb-4">
    <input type="text" name="telepon" class="form-control" id="telepon" placeholder="Telepon" required>
</div>



<button class="btn btn-success mt-2" onclick="store()">Submit</button>
