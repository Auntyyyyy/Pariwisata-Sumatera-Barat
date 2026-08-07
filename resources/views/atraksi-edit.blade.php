@extends('layouts.app')

@section('title', 'Edit ' . $atraksi->nama)

@section('content')
<section class="page-section">
    <div class="container">

        {{-- Breadcrumb navigasi --}}
        <nav aria-label="breadcrumb" class="text-center">
            <ol class="breadcrumb breadcrumb-nature justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('atraksi') }}">Atraksi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit {{ $atraksi->nama }}</li>
            </ol>
        </nav>

        <div class="row justify-content-center">
            <div class="col-lg-6">

                <div class="card-nature" data-reveal>

                    <div class="card-nature-header">
                        <span class="section-eyebrow" style="background: rgba(255,255,255,0.18); color: var(--white);">
                            <i class="bi bi-pencil-square"></i> Edit Data
                        </span>
                        <h2>Edit Atraksi</h2>
                        <p>Perbarui informasi untuk {{ $atraksi->nama }}.</p>
                    </div>

                    <div class="card-nature-body">

                        <form action="{{ route('atraksi.update', $atraksi->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                        <select name="destinasi_id" class="form-select @error('destinasi_id') is-invalid @enderror">
                        <option value="" selected disabled>-- Pilih Destinasi --</option>
                        @foreach ($destinasiList as $destinasi)
                            <option value="{{ $destinasi->id }}"
                            {{ old('destinasi_id', $atraksi->destinasi_id) == $destinasi->id ? 'selected' : '' }}>
                            {{ $destinasi->nama }}
                            </option>
                        @endforeach
                       </select>

                            <div class="mb-3">
                                <label for="nama" class="form-label form-label-nature">Nama Atraksi</label>
                                <input type="text" name="nama" id="nama"
                                       class="form-control form-control-nature @error('nama') is-invalid @enderror"
                                       value="{{ old('nama', $atraksi->nama) }}">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label form-label-nature">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" rows="4"
                                          class="form-control form-control-nature @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $atraksi->deskripsi) }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="kategori" class="form-label form-label-nature">Kategori</label>
                                <select name="kategori" id="kategori"
                                        class="form-select form-control-nature @error('kategori') is-invalid @enderror">
                                    <option value="Budaya" {{ old('kategori', $atraksi->kategori) == 'Budaya' ? 'selected' : '' }}>Budaya</option>
                                    <option value="Alam" {{ old('kategori', $atraksi->kategori) == 'Alam' ? 'selected' : '' }}>Alam</option>
                                    <option value="Kuliner" {{ old('kategori', $atraksi->kategori) == 'Kuliner' ? 'selected' : '' }}>Kuliner</option>
                                </select>
                                @error('kategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="harga" class="form-label form-label-nature">Harga (Rp)</label>
                                <input type="number" name="harga" id="harga"
                                       class="form-control form-control-nature @error('harga') is-invalid @enderror"
                                       value="{{ old('harga', $atraksi->harga) }}">
                                @error('harga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text-nature">
                                    <i class="bi bi-info-circle"></i> Isi 0 kalau gratis.
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="gambar" class="form-label form-label-nature">Nama File Gambar</label>
                                <input type="text" name="gambar" id="gambar"
                                       class="form-control form-control-nature @error('gambar') is-invalid @enderror"
                                       value="{{ old('gambar', $atraksi->gambar) }}">
                                @error('gambar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text-nature">
                                    <i class="bi bi-info-circle"></i> Nama file gambar yang tersimpan di folder public/images.
                                </div>
                            </div>

                            <div class="d-flex flex-wrap gap-2">
                                <button type="submit" class="btn-nature">
                                    <i class="bi bi-check2"></i> Simpan Perubahan
                                </button>
                                <a href="{{ route('atraksi') }}" class="btn-nature-outline-soft">
                                    Batal
                                </a>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
@endsection