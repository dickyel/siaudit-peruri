@extends('layouts.adminspi')

@section('title')
    Bagian Tambah Temuan
@endsection

@section('content')
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
>
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Temuan & Rekomendasi</h2>
            <p class="dashboard-subtitle">
                Update & Lihat Temuan & Rekomendasi 
            </p>
        </div>

        @include('components.menu_temuan_rekomendasi')
        <!-- <ul class="nav nav-pills nav-justified mt-4">
            <li class="nav-item">
            <a class="nav-link btn-primary active" aria-current="page" href="#">Tambah Temuan</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Tambah Rekomendasi</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Tabel Temuan</a>
            </li>
            
            <li class="nav-item">
            <a class="nav-link ">Tabel Rekomendasi</a>
            </li>
        </ul> -->

        <div id="appForm">
            @if($errors->any())
                    
                <div class="alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>    
                </div>
            
            @endif
            <form id="myForm" class="mt-4" enctype="multipart/form-data" method="post" action="{{ route('adminspi.update_temuan', $temuan->id) }}">
            @csrf
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="card mt-2 mb-4">
                            <div class="card-body">
                            <header>
                                <h5>Edit Temuan</h5>
                                <p>Silahkan edit temuan</p>
                            </header>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="date_temuan">Pilih Tanggal Temuan</label>
                                        <input class="form-control" type="date" name="tgl_upload_temuans" value="{{ $temuan->tgl_upload_temuans }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="date_temuan">Pilih Tanggal Jatuh Tempo</label>
                                        <input type="date" class="form-control" name="tgl_jatuh_tempo" value="{{ $temuan->tgl_jatuh_tempo }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="date_temuan">Nomor Temuan</label>
                                        <input type="text" class="form-control" name="nomor_temuan" value="{{ $temuan->nomor_temuan }}">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="date_temuan">Option Tingkat Resiko</label>
                                        <select  class="form-control" name="tingkat_resiko" value="{{ $temuan->tingkat_resiko }}">
                                        <option value="sedang">Sedang</option>
                                        <option value="ringan">Ringan</option>
                                        <option value="sulit">Sulit</option>
                                        
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="description_temuan">Deskripsi Temuan</label>
                                        <textarea class="form-control" name="deskripsi_temuan" id="editor" >{!!$temuan->deskripsi_temuan!!}</textarea>

                                    </div>
                                </div>

                              
                            </div>
                        
                            <button  class="btn btn-primary mt-2">Submit</button>
                    
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
    
    
    
</div>
@endsection

@push('after-scripts')
  <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('editor');
  </script>
@endpush
