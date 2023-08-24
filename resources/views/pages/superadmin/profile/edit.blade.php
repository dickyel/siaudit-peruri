@extends('layouts.superadmin')

@section('title')
Bagian Judul Profile
@endsection

@section('content')
    <div
        class="section-content section-dashboard-home"
        data-aos="fade-up"
    >
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Profile</h2>
                <p class="dashboard-subtitle">
                    Lihat Profile mu disistem 
                </p>
            </div>
            <div class="dashboard-content mt-5">
                <div class="row">
                    <div class="col-md-6 align-items-center text-center">
                        <div class="card">
                            <div class="card-body">
                            <img src="{{ asset('./sitinjut/images/frame_login.svg') }}" alt="profile" style="width: 80%; height: 80%px; border-radius: 30px;">
                            </div>
                        </div>
                    
                    </div>
                    <div class="col-md-6 align-items-center">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-data py-3 px-1">
                                    <form action="{{ route('superadmin.profile.update', auth()->id() ) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Nama Karyawan</label>
                                            <input type="text" class="form-control" id="judul" aria-describedby="nama_karyawan" name="nama_users" value="{{ $user->nama_users }}" disabled>
                                        </div>

                                        <div class="mb-3">
                                            <label for="title" class="form-label">Nomor Pokok</label>
                                            <input type="text" class="form-control" id="judul" aria-describedby="nama_karyawan" name="username" value="{{ $user->username }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="title" class="form-label">Email Utama</label>
                                            <input type="text" class="form-control" id="judul" aria-describedby="nama_karyawan" name="email" value="{{ $user->email }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="title" class="form-label">Role</label>
                                            <input type="text" class="form-control" id="judul" aria-describedby="nama_karyawan" name="nama_karyawan" value="{{ $user->role->nama_roles }}" disabled>
                                        </div>

                                        <div class="mb-3">
                                            <label for="title" class="form-label">Alternatif Email</label>
                                            <input type="text" class="form-control" id="judul" aria-describedby="nama_karyawan" name="email2" value="{{ $user->email2 }}" >
                                        </div>

                                        <div class="mb-3">
                                            <label for="title" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="password" aria-describedby="nama_karyawan" name="password">
                                        </div>

                                        <button type="button" class="btn btn-secondary" id="generate-password">
                                            Generate Password Baru
                                        </button>

                                        <button type="submit" class="btn btn-primary">
                                        Simpan Data
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-scripts')
<script>
    document.getElementById('generate-password').addEventListener('click', function() {
        const passwordField = document.getElementById('password');
        const generatedPassword = generateRandomPassword(); // Memanggil fungsi generateRandomPassword yang didefinisikan di bawah
        passwordField.value = generatedPassword;
    });

    function generateRandomPassword(length = 12) {
        const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        let password = "";
        for (let i = 0; i < length; i++) {
            const randomIndex = Math.floor(Math.random() * charset.length);
            password += charset[randomIndex];
        }
        return password;
    }
</script>

@endpush