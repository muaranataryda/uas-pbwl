@extends('layouts.main')

@section('main-body')
    <h1 class="mt-4">{{ $title }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/peserta">{{ $title }}</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
              </svg>
            Edit Data
        </div>
        <div class="card-body">
            <form action="/peserta/{{ $dataPeserta->id }}" method="post">
                @method('put')
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="id_kategori" class="form-label">Kategori Lomba</label>
                        <select name="id_kategori" id="id_kategori" class="form-select">
                            @foreach ($dataKategori as $rowKategori)
                                @if (old('id_kategori', $dataPeserta->id_kategori) == $rowKategori->id)
                                    <option value="{{ $rowKategori->id }}" selected>{{ $rowKategori->nama }}</option>
                                @else
                                    <option value="{{ $rowKategori->id }}">{{ $rowKategori->nama }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="no_peserta" class="form-label">No Peserta</label>
                        <input type="text" name="no_peserta" class="form-control @error('no_peserta') is-invalid @enderror" id="no_peserta" placeholder="Input no peserta" value="{{ $dataPeserta->no_peserta }}" required readonly>
                    </div>
                </div>
                <div class="row mb-3 mt-5">
                    <div class="col-md-4">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" id="nik" placeholder="Input nik" value="{{ old('nik', $dataPeserta->nik) }}" required>
                        @error('nik')
                            <div class="invalid-feedback" id="nik">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Input nama" value="{{ old('nama', $dataPeserta->nama) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
                            <option value="LAKI-LAKI" @if (old('jenis_kelamin', $dataPeserta->jenis_kelamin) == 'LAKI-LAKI') {{ 'selected' }} @endif>LAKI-LAKI</option>
                            <option value="PEREMPUAN" @if (old('jenis_kelamin', $dataPeserta->jenis_kelamin) == 'PEREMPUAN') {{ 'selected' }} @endif>PEREMPUAN</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3 mt-5">
                    <div class="col-md-6">
                        <label for="hp" class="form-label">No HP</label>
                        <input type="text" name="hp" class="form-control" id="hp" placeholder="Input no hp" value="{{ old('hp', $dataPeserta->hp) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="tgl_lahir" class="form-label">Tgl Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" placeholder="Input tgl lahir" value="{{ old('tgl_lahir', $dataPeserta->tgl_lahir) }}" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" placeholder="Input alamat">{{ old('alamat', $dataPeserta->alamat) }}</textarea>
                    </div>
                </div>
    
                <div class="row mt-5">
                    <div class="col d-flex justify-content-center">
                        <a href="/peserta" class="btn btn-secondary">
                            Back
                        </a>
                        <button type="submit" class="btn btn-success ms-2">Simpan</button>
                        <button type="reset" class="btn btn-primary ms-2">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection