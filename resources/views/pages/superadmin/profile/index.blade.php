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
                            <div class="profile-data py-5 px-3">
                            <ul class="list-unstyled">
                                <li>Nama <span>: <strong>{{ $user->nama_users }}</strong></span></li>
                                <li>Username <span>:  <strong>{{ $user->username }}</strong></span></li>
                                <li>Email <span>:  <strong>{{ $user->email }}</strong></span></li>
                                <li>Sebagai <span>:  <strong>{{ $user->role->nama_roles }}</strong></span></li>
                            </ul>
                            <a href="{{ route('superadmin.profile.edit') }}" class="btn btn-primary">
                                Ubah Data
                            </a>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
    </div>
@endsection