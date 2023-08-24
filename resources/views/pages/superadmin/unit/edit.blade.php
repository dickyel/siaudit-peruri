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
                                    <form action="{{ route('unit.update', $item->id ) }}" method="POST" 
                                    enctype="multipart/form-data"
                                    >
                                    @method('PUT') 
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Kode Unit</label>
                                                    <input type="text" name="kode_unit" class="form-control" value="{{ $item->kode_unit }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nama Unit</label>
                                                    <input type="text" name="nama_unit" class="form-control" value="{{ $item->nama_unit }}" required>
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