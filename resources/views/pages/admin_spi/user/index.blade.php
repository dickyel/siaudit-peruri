@extends('layouts.adminspi')

@section('title')
    User
@endsection

@section('content')
    <!-- content -->
    <div
        class="section-content section-dashboard-home"
        data-aos="fade-up"
    >
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Tabel User</h2>
                <p class="dashboard-subtitle">
                    Lihat Daftar User
                </p>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{  route('user.create') }}" class="btn btn-primary mb-3">
                                + Tambah user
                            </a>
                            <div class="table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Username/NP</th>
                                            <th>Nama Users</th>
                                            <th>Email</th>
                                            <th>Roles</th>
                                            <th>Unit</th>
                                            <th>Aktif/Tidak</th>
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
        // AJAX DataTable
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { 
                    data: 'DT_RowIndex', 
                    name: 'DT_RowIndex', 
                    orderable: false, 
                    searchable: false,
                    width: '5%',
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                { data: 'username', name: 'username' },
                { data: 'nama_users', name: 'nama_users' },
                { data: 'email', name: 'email' },
                { data: 'role.nama_roles', name: 'role.nama_roles' },
                { data: 'unit.nama_unit', name: 'unit.nama_unit' },
                { 
                    data: 'is_active', 
                    name: 'is_active', 
                    render: function (data) {
                        return data === 1 ? 'Aktif' : 'Tidak Aktif';
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '15%'
                },
            ]
        });
    </script>
@endpush
