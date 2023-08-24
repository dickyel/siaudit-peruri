@extends('layouts.superadmin')

@section('title')
    Judul Dashboard Superadmin
@endsection

@section('content')
    <!-- content -->
        <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
        >
            <div class="container-fluid">
                <div class="dashboard-heading">
                    <h2 class="dashboard-title">Tambah Roles</h2>
                    <p class="dashboard-subtitle">
                        Tambah Roles
                    </p>
                </div>
                <div class="dashboard-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                @if($errors->any())
                    
                                    <div class="alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>    
                                    </div>
                                
                                @endif
                                    <form action="{{ route('user.update', $item->id ) }}" method="POST" 
                                    enctype="multipart/form-data"
                                    >
                                    @method('PUT') 
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nama User</label>
                                                    <input type="text" name="nama_users" class="form-control" value="{{ $item->nama_users }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Username(no pokok)</label>
                                                    <input type="text" name="username" class="form-control"
                                                    value="{{ $item->username }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" name="email" 
                                                    value="{{ $item->email }}"class="form-control" required>
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
                                                        <option value="{{ $item->unit_id}}">{{ $item->unit->nama_unit }}</option>
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
                                                        <option value="{{ $item->role_id}}">{{ $item->role->nama_roles }}</option>
                                                        @foreach ($roles as $role)
                                                        <option value="{{ $role->id }}">{{ $role->nama_roles }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Aktif/Tidak</label>
                                                    <select name="is_active" class="form-control">
                                                        <option value="0" @if(old('is_active', $item->is_active) === 0) selected @endif>Tidak Aktif</option>
                                                        <option value="1" @if(old('is_active', $item->is_active) === 1) selected @endif>Aktif</option>
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