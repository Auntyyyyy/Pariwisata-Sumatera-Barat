@extends('layouts.app')

@section('title', 'Edit ' . $user->name)

@section('content')
<section class="page-section">

    <div class="container">

        {{-- Breadcrumb --}}
        <div class="breadcrumb-nature">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('beranda') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('user') }}">User</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Edit {{ $user->name }}
                    </li>
                </ol>
            </nav>
        </div>

        {{-- Header --}}
        <div class="page-header-nature">
            <span class="section-eyebrow">
                <i class="bi bi-person-gear"></i>
                Manajemen User
            </span>

            <h1 class="section-title">
                Edit Pengguna
            </h1>

            <p class="section-subtitle">
                Perbarui informasi akun pengguna sesuai kebutuhan.
            </p>
        </div>

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="card-nature">

                    <div class="card-nature-header">

                        <h2>
                            <i class="bi bi-pencil-square me-2"></i>
                            Informasi User
                        </h2>

                        <p>
                            Pastikan data yang dimasukkan sudah benar sebelum disimpan.
                        </p>

                    </div>

                    <div class="card-nature-body">

                        {{-- Error --}}
                        @if ($errors->any())
                            <div class="alert-nature-danger mb-4">
                                <strong>Terdapat kesalahan:</strong>

                                <ul class="mb-0 mt-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('user.update',$user->id) }}" method="POST">

                            @csrf
                            @method('PUT')

                            {{-- Nama --}}
                            <div class="form-group-nature">

                                <label class="form-label-nature">
                                    Nama Lengkap
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    class="form-control-nature w-100"
                                    value="{{ old('name',$user->name) }}"
                                    required>

                            </div>

                            {{-- Email --}}
                            <div class="form-group-nature">

                                <label class="form-label-nature">
                                    Email
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control-nature w-100"
                                    value="{{ old('email',$user->email) }}"
                                    required>

                            </div>

                            {{-- Password --}}
                            <div class="form-group-nature">

                                <label class="form-label-nature">
                                    Password Baru
                                </label>

                                <input
                                    type="password"
                                    name="password"
                                    class="form-control-nature w-100">

                                <div class="form-text-nature">
                                    Kosongkan apabila password tidak ingin diubah.
                                </div>

                            </div>

                            {{-- Role --}}
                            <div class="form-group-nature">

                                <label class="form-label-nature">
                                    Role
                                </label>

                                <select
                                    name="role"
                                    class="form-control-nature w-100"
                                    required>

                                    <option value="user"
                                        {{ $user->role=='user' ? 'selected':'' }}>
                                        User
                                    </option>

                                    <option value="admin"
                                        {{ $user->role=='admin' ? 'selected':'' }}>
                                        Administrator
                                    </option>

                                    <option value="CI I O"
                                        {{ $user->role=='CI I O' ? 'selected':'' }}>
                                        CI I O
                                    </option>

                                </select>

                            </div>

                            <div class="d-flex flex-wrap gap-3 mt-4">

                                <button
                                    type="submit"
                                    class="btn-nature">

                                    <i class="bi bi-check-circle"></i>
                                    Simpan Perubahan

                                </button>

                                <a
                                    href="{{ route('user') }}"
                                    class="btn-outline-nature-soft">

                                    <i class="bi bi-arrow-left"></i>
                                    Kembali

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