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

        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Deskripsi Temuan</th>
                                        <th>Nomor Temuan</th>
                                        <th>Tingkat Resiko</th>
                                        <th>Tanggal Dibuat</th>
                                        <th>Tanggal Jatuh Tempo</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
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

    function stripTags(html) {
        var doc = new DOMParser().parseFromString(html, 'text/html');
        return doc.body.textContent || "";
    }
    // AJAX DataTable
    var datatable = $('#crudTable').DataTable({
        processing: true,
        serverSide: true,
        ordering: true,
        ajax: {
            url: '{!! url()->current() !!}',
        },
        columns: [
            { data: 'id', name: 'id' },
            {
                data: 'deskripsi_temuan',
                name: 'deskripsi_temuan',
                render: function (data, type, row) {
                    var strippedData = stripTags(data);
                    return strippedData;
                }
            },
            { data: 'nomor_temuan', name: 'nomor_temuan' },
            { data: 'tingkat_resiko', name: 'tingkat_resiko' },
            { data: 'tgl_upload_temuans', name: 'tgl_upload_temuans' },
            { data: 'tgl_jatuh_tempo', name: 'tgl_jatuh_tempo' },
            
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false,
                width: '10%'
            },
        ]
    });
</script>
@endpush