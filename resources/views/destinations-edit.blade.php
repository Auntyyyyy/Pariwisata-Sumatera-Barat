{{--
    TEMPLATE FORM EDIT DESTINASI
    - Restyled: Modern Minimalist + Nature
    - name="...", value="{{ $destinasi->... }}", @method('PUT'), dan action route TIDAK diubah
--}}

@extends('layouts.app')

@section('title', 'Edit ' . $destinasi->nama)

@section('content')
<section class="page-section">
    <div class="container">

        {{-- Breadcrumb navigasi --}}
        <nav aria-label="breadcrumb" class="text-center">
            <ol class="breadcrumb breadcrumb-nature justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('destinations') }}">Destinasi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit {{ $destinasi->nama }}</li>
            </ol>
        </nav>

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card-nature" data-reveal>

                    <div class="card-nature-header">
                        <span class="section-eyebrow" style="background: rgba(255,255,255,0.18); color: var(--white);">
                            <i class="bi bi-pencil-square"></i> Edit Data
                        </span>
                        <h2>Edit Destinasi</h2>
                        <p>Perbarui informasi untuk {{ $destinasi->nama }}.</p>
                    </div>

                    <div class="card-nature-body">

                        {{-- Tampilkan pesan error validasi kalau ada --}}
                        @if ($errors->any())
                            <div class="alert-nature-danger mb-4">
                                <ul class="mb-0 ps-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('destinations.update', $destinasi->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nama" class="form-label form-label-nature">Nama Destinasi</label>
                                <input
                                    type="text"
                                    class="form-control form-control-nature"
                                    id="nama"
                                    name="nama"
                                    value="{{ old('nama', $destinasi->nama) }}"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label form-label-nature">Deskripsi</label>
                                {{-- Perhatikan: isi textarea ditaruh DI ANTARA tag, bukan di value --}}
                                <textarea
                                    class="form-control form-control-nature"
                                    id="deskripsi"
                                    name="deskripsi"
                                    rows="4"
                                    required
                                >{{ old('deskripsi', $destinasi->deskripsi) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="gambar" class="form-label form-label-nature">Nama File Gambar</label>
                                <input
                                    type="text"
                                    class="form-control form-control-nature"
                                    id="gambar"
                                    name="gambar"
                                    value="{{ old('gambar', $destinasi->gambar) }}"
                                    required
                                >
                                <div class="form-text-nature">
                                    <i class="bi bi-info-circle"></i> Nama file gambar yang tersimpan di folder public/images.
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="jam_buka" class="form-label form-label-nature">Jam Buka</label>
                                    <input
                                        type="time"
                                        class="form-control form-control-nature"
                                        id="jam_buka"
                                        name="jam_buka"
                                        value="{{ old('jam_buka', $destinasi->jam_buka) }}"
                                        required
                                    >
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="jam_tutup" class="form-label form-label-nature">Jam Tutup</label>
                                    <input
                                        type="time"
                                        class="form-control form-control-nature"
                                        id="jam_tutup"
                                        name="jam_tutup"
                                        value="{{ old('jam_tutup', $destinasi->jam_tutup) }}"
                                        required
                                    >
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="lokasi" class="form-label form-label-nature">Lokasi</label>
                                <input
                                    type="text"
                                    class="form-control form-control-nature"
                                    id="lokasi"
                                    name="lokasi"
                                    value="{{ old('lokasi', $destinasi->lokasi) }}"
                                >
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn-nature">
                                    <i class="bi bi-check2"></i> Simpan Perubahan
                                </button>
                                <a href="{{ route('destinations.detail', $destinasi->id) }}" class="btn-nature-outline-soft">
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