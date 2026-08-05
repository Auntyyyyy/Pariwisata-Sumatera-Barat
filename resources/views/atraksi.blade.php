@extends('layouts.app')

@section('title', 'Daftar Atraksi')

@section('content')
<section class="page-section">
    <div class="container">

        {{-- Breadcrumb navigasi --}}
        <nav aria-label="breadcrumb" class="text-center">
            <ol class="breadcrumb breadcrumb-nature justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Atraksi</li>
            </ol>
        </nav>

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4" data-reveal>
            <div>
                <span class="section-eyebrow"><i class="bi bi-stars"></i> Atraksi Wisata</span>
                <h2 class="section-title mb-0">Daftar Atraksi</h2>
            </div>
            <a href="{{ route('atraksi.create') }}" class="btn-nature">
                <i class="bi bi-plus-lg"></i> Tambah Atraksi
            </a>
        </div>

        <div class="row g-4">
            @forelse ($atraksiList as $index => $atraksi)
                <div class="col-sm-6 col-lg-4">
                    <div class="gallery-card" data-reveal style="transition-delay: {{ ($index % 3) * 0.08 }}s;">
                        <div class="gallery-card-img">
                            <img src="{{ asset('images/' . $atraksi->gambar) }}" alt="Foto {{ $atraksi->nama }}">
                            <span class="gallery-card-tag">{{ $atraksi->kategori }}</span>
                        </div>

                        <div class="gallery-card-body">
                            <h3 class="gallery-card-title">{{ $atraksi->nama }}</h3>
                            <p class="gallery-card-desc">{{ Str::limit($atraksi->deskripsi, 80) }}</p>

                            <div class="gallery-card-meta">
                                <span class="fw-semibold" style="font-family: var(--font-heading); color: var(--leaf-green-dark);">
                                    {{ $atraksi->harga == 0 ? 'Gratis' : 'Rp ' . number_format($atraksi->harga, 0, ',', '.') }}
                                </span>

                                <div class="d-flex gap-2">
                                    <a href="{{ route('atraksi.edit', $atraksi->id) }}" class="btn-icon-nature edit" title="Edit {{ $atraksi->nama }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <button type="button"
                                            class="btn-icon-nature danger"
                                            title="Hapus {{ $atraksi->nama }}"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalHapusAtraksi"
                                            data-atraksi-nama="{{ $atraksi->nama }}"
                                            data-atraksi-action="{{ route('atraksi.destroy', $atraksi->id) }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-stars" style="font-size: 2.4rem; color: var(--sea-blue);"></i>
                    <p class="text-secondary mt-3 mb-0">Belum ada atraksi yang ditambahkan.</p>
                </div>
            @endforelse
        </div>

    </div>
</section>

{{-- ============================= MODAL KONFIRMASI HAPUS ============================= --}}
<div class="modal fade modal-nature" id="modalHapusAtraksi" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>

            <div class="modal-body">
                <div class="modal-nature-icon">
                    <i class="bi bi-exclamation-triangle"></i>
                </div>
                <h3 class="modal-nature-title">Hapus Atraksi Ini?</h3>
                <p class="modal-nature-text">
                    Kamu akan menghapus <strong id="modalHapusAtraksiNama">atraksi ini</strong> secara permanen.
                    Tindakan ini tidak bisa dibatalkan.
                </p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-nature-outline-soft" data-bs-dismiss="modal">
                    Batal
                </button>
                <form id="formHapusAtraksi" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-nature-danger">
                        <i class="bi bi-trash"></i> Ya, Hapus
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modalHapusAtraksi = document.getElementById('modalHapusAtraksi');

        modalHapusAtraksi.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const atraksiNama = button.getAttribute('data-atraksi-nama');
            const atraksiAction = button.getAttribute('data-atraksi-action');

            document.getElementById('modalHapusAtraksiNama').textContent = atraksiNama;
            document.getElementById('formHapusAtraksi').setAttribute('action', atraksiAction);
        });
    });
</script>
@endsection