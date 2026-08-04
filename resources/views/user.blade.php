@extends('layouts.app')

@section('title', 'Daftar User')

@section('content')
<section class="page-section">
    <div class="container">

        {{-- Breadcrumb navigasi --}}
        <nav aria-label="breadcrumb" class="text-center">
            <ol class="breadcrumb breadcrumb-nature justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">User</li>
            </ol>
        </nav>

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4" data-reveal>
            <div>
                <span class="section-eyebrow"><i class="bi bi-people"></i> Manajemen User</span>
                <h2 class="section-title mb-0">Daftar User</h2>
            </div>
            <a href="{{ route('user.create') }}" class="btn-nature">
                <i class="bi bi-plus-lg"></i> Tambah User
            </a>
        </div>

        <div class="table-nature-wrap" data-reveal>
            <div class="table-responsive">
                <table class="table table-nature mb-0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="text-center" style="width: 160px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($userList as $user)
                            <tr>
                                <td class="fw-semibold" style="font-family: var(--font-heading);">{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="role-badge {{ $user->role == 'admin' ? 'role-badge-admin' : 'role-badge-user' }}">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <a href="{{ route('user.edit', $user->id) }}" class="btn-icon-nature edit" title="Edit {{ $user->name }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <button type="button"
                                                class="btn-icon-nature danger"
                                                title="Hapus {{ $user->name }}"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalHapusUser"
                                                data-user-name="{{ $user->name }}"
                                                data-user-action="{{ route('user.destroy', $user->id) }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5">
                                    <i class="bi bi-person-x" style="font-size: 2rem; color: var(--sea-blue);"></i>
                                    <p class="text-secondary mt-2 mb-0">Belum ada user yang ditambahkan.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>

{{-- ============================= MODAL KONFIRMASI HAPUS ============================= --}}
<div class="modal fade modal-nature" id="modalHapusUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>

            <div class="modal-body">
                <div class="modal-nature-icon">
                    <i class="bi bi-exclamation-triangle"></i>
                </div>
                <h3 class="modal-nature-title">Hapus User Ini?</h3>
                <p class="modal-nature-text">
                    Kamu akan menghapus <strong id="modalHapusUserNama">user ini</strong> secara permanen.
                    Tindakan ini tidak bisa dibatalkan.
                </p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-nature-outline-soft" data-bs-dismiss="modal">
                    Batal
                </button>
                <form id="formHapusUser" action="" method="POST">
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
    // Isi modal konfirmasi dengan nama user & action route yang tepat
    // setiap kali tombol hapus di salah satu baris tabel ditekan.
    document.addEventListener('DOMContentLoaded', function () {
        const modalHapusUser = document.getElementById('modalHapusUser');

        modalHapusUser.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const userName = button.getAttribute('data-user-name');
            const userAction = button.getAttribute('data-user-action');

            document.getElementById('modalHapusUserNama').textContent = userName;
            document.getElementById('formHapusUser').setAttribute('action', userAction);
        });
    });
</script>
@endsection