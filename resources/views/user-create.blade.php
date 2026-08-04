@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')
<div class="page-section">
    <div class="container">

        <nav aria-label="breadcrumb" class="d-flex justify-content-center">
            <div class="breadcrumb-nature">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user') }}">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah User</li>
                </ol>
            </div>
        </nav>

        @if ($errors->any())
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="alert-nature-danger mb-4">
                        <div class="d-flex align-items-start gap-2">
                            <i class="bi bi-exclamation-circle-fill mt-1"></i>
                            <div>
                                <strong class="d-block mb-1">Periksa kembali data Anda</strong>
                                <ul class="mb-0 ps-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card-nature" data-reveal>

                    <div class="card-nature-header">
                        <span class="section-eyebrow" style="background: rgba(255,255,255,0.18); color: var(--white);">
                            <i class="bi bi-person-plus-fill"></i> Manajemen User
                        </span>
                        <h2>Tambah User Baru</h2>
                        <p>Lengkapi data di bawah untuk menambahkan akun pengguna baru.</p>
                    </div>

                    <div class="card-nature-body">
                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf

                            <div class="form-group-nature">
                                <label for="name" class="form-label-nature">Nama Lengkap</label>
                                <input type="text"
                                       class="form-control form-control-nature @error('name') is-invalid @enderror"
                                       id="name" name="name" value="{{ old('name') }}"
                                       placeholder="Masukkan nama lengkap" required>
                                @error('name')
                                    <div class="form-text-nature text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group-nature">
                                <label for="email" class="form-label-nature">Email</label>
                                <input type="email"
                                       class="form-control form-control-nature @error('email') is-invalid @enderror"
                                       id="email" name="email" value="{{ old('email') }}"
                                       placeholder="nama@email.com" required>
                                @error('email')
                                    <div class="form-text-nature text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group-nature">
                                <label for="password" class="form-label-nature">Password</label>
                                <input type="password"
                                       class="form-control form-control-nature @error('password') is-invalid @enderror"
                                       id="password" name="password"
                                       placeholder="Minimal 8 karakter" required>
                                <div class="form-text-nature">Gunakan kombinasi huruf dan angka agar lebih aman.</div>
                                @error('password')
                                    <div class="form-text-nature text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group-nature">
                                <label for="role" class="form-label-nature">Role</label>
                                <select class="form-control form-control-nature @error('role') is-invalid @enderror"
                                        id="role" name="role" required>
                                    <option value="" disabled selected>Pilih role pengguna</option>
                                    <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>User</option>
                                    <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                                @error('role')
                                    <div class="form-text-nature text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex gap-2 mt-4">
                                <button type="submit" class="btn-nature">
                                    <i class="bi bi-check-lg"></i> Simpan User
                                </button>
                                <a href="{{ route('user') }}" class="btn-nature-outline-soft">
                                    Batal
                                </a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection