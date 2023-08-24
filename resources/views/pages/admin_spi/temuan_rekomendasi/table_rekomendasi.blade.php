@extends('layouts.adminspi')

@section('title')
    Bagian Tabel Rekomendasi
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
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        
                                        <th>Deskripsi Temuan </th>
                                        <th>Rekomendasi</th>
                                        <th>Status Rekomendasi</th>
                                        <th>Tanggapan Auditee</th>
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
    // Function to remove HTML tags from a string
    function stripTags(html) {
        var doc = new DOMParser().parseFromString(html, 'text/html');
        return doc.body.textContent || "";
    }

    // AJAX DataTable
    var datatable = $('#crudTable').DataTable({
        rowsGroup: [1], 
        processing: true,
        serverSide: true,
        ordering: true,
        ajax: {
            url: '{!! url()->current() !!}',
        },
        columns: [
            {
                data: null,
                name: 'checkbox',
                orderable: false,
                searchable: false,
                render: function (data) {
                    return '<input type="checkbox" value="' + data.id + '">';
                },
            },
            {
                data: 'temuan.deskripsi_temuan',
                name: 'temuan.deskripsi_temuan',
                className: 'group',
                render: function (data) {
                    // Split the data into separate lines
                    var lines = data.split('\n');
                    // Create HTML elements for each line
                    var html = lines.map(function (line) {
                        return '<div>' + line + '</div>';
                    }).join('');
                    return html;
                },
            },
            { 
                data: 'deskripsi_rekomendasi',
                name: 'deskripsi_rekomendasi',
                render: function (data) {
                    // Menghilangkan tag HTML dari konten CKEditor
                    return stripTags(data);
                },
               // Kolom ini tidak perlu ditampilkan, karena sudah digabungkan di kolom pertama
            },

            { data: 'status_rekomendasi', name: 'status_rekomendasi' },
            { 
                data: 'tanggapan_auditee',
                name: 'tanggapan_auditee',
                render: function (data) {
                    // Menghilangkan tag HTML dari konten CKEditor
                    return stripTags(data);
                },
            },
            //...
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