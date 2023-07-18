@extends('layouts.main')

@section('main-body')
    <h1 class="mt-4">{{ $title }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/juara">{{ $title }}</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
              </svg>
            Tambah Data
        </div>
        <div class="card-body">
            <form action="/juara" method="post">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="id_peserta" class="form-label">Peserta</label>
                        <select name="id_peserta" id="id_peserta" class="form-select @error('id_peserta') is-invalid @enderror" aria-describedby="validationPeserta">
                            @foreach ($dataPeserta as $rowPeserta)
                                @if (old('id_peserta') == $rowPeserta->id)
                                    <option value="{{ $rowPeserta->id }}" selected>{{ $rowPeserta->nama }}</option>
                                @else
                                    <option value="{{ $rowPeserta->id }}">{{ $rowPeserta->nama }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('id_peserta')
                            <div class="invalid-feedback" id="validationPeserta">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Input keterangan">{{ old('keterangan') }}</textarea>
                    </div>
                </div>
    
                <div class="row mt-5">
                    <div class="col d-flex justify-content-center">
                        <a href="/juara" class="btn btn-secondary">
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