{{--
    TEMPLATE FORM TAMBAH DESTINASI
    - Restyled: Modern Minimalist + Nature
    - name="...", action route, dan @csrf TIDAK diubah
--}}

@extends('layouts.app')

@section('title', 'Tambah Destinasi')

@section('content')
<section class="page-section">
    <div class="container">

        {{-- Breadcrumb navigasi --}}
        <nav aria-label="breadcrumb" class="text-center">
            <ol class="breadcrumb breadcrumb-nature justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('destinations') }}">Destinations</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Destinasi</li>
            </ol>
        </nav>

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card-nature" data-reveal>

                    <div class="card-nature-header">
                        <span class="section-eyebrow" style="background: rgba(255,255,255,0.18); color: var(--white);">
                            <i class="bi bi-plus-circle"></i> Destinasi Baru
                        </span>
                        <h2>Tambah Destinasi Baru</h2>
                        <p>Lengkapi informasi destinasi wisata di bawah ini.</p>
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

                        <form action="{{ route('destinations.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="nama" class="form-label form-label-nature">Nama Destinasi</label>
                                <input
                                    type="text"
                                    class="form-control form-control-nature"
                                    id="nama"
                                    name="nama"
                                    value="{{ old('nama') }}"
                                    placeholder="contoh: Istana Siak Sri Indrapura"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label form-label-nature">Deskripsi</label>
                                <textarea
                                    class="form-control form-control-nature"
                                    id="deskripsi"
                                    name="deskripsi"
                                    rows="4"
                                    placeholder="Ceritakan tentang destinasi ini..."
                                    required
                                >{{ old('deskripsi') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="gambar" class="form-label form-label-nature">Nama File Gambar</label>
                                <input
                                    type="text"
                                    class="form-control form-control-nature"
                                    id="gambar"
                                    name="gambar"
                                    value="{{ old('gambar') }}"
                                    placeholder="contoh: istana-siak.jpg"
                                    required
                                >
                                <div class="form-text-nature">
                                    <i class="bi bi-info-circle"></i> Sementara isi nama file gambar yang sudah tersedia di folder public/images.
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
                                        value="{{ old('jam_buka') }}"
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
                                        value="{{ old('jam_tutup') }}"
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
                                    value="{{ old('lokasi') }}"
                                    placeholder="contoh: Kecamatan Siak, Kabupaten Siak"
                                >
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn-nature">
                                    <i class="bi bi-check2"></i> Simpan Destinasi
                                </button>
                                <a href="{{ route('destinations') }}" class="btn-nature-outline-soft">
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