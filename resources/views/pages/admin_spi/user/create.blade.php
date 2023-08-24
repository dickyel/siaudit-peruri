@extends('layouts.superadmin')

@section('title')
    Judul Dashboard Admin SPI
@endsection

@section('content')
    <!-- content -->

    <div
        class="section-content section-dashboard-home"
        data-aos="fade-up"
    >
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Tambah User</h2>
                <p class="dashboard-subtitle">
                    Tambah User
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('user.store') }}" method="POST" 
                                enctype="multipart/form-data"
                                >
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama User</label>
                                                <input type="text" name="nama_users" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Username(no pokok)</label>
                                                <input type="text" name="username" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="email" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Unit</label>
                                                <select name="unit_id" class="form-control">
                                                    @foreach ($units as $unit)
                                                    <option value="{{ $unit->id }}">{{ $unit->nama_unit }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Roles</label>
                                                <select name="role_id" class="form-control">
                                                    @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->nama_roles }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Aktif/Tidak</label>
                                                <select name="is_active" class="form-control">
                                                    <option value="0">Tidak Aktif</option>
                                                    <option value="1">Aktif</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-success px-5">
                                                Simpan Sekarang
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection