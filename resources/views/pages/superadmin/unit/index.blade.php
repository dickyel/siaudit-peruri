@extends('layouts.superadmin')

@section('title')
    Role
@endsection

@section('content')
    <!-- content -->
    

    
        <!-- content -->
        
        <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
        >
            <div class="container-fluid">
                <div class="dashboard-heading">
                    <h2 class="dashboard-title">Tabel Unit</h2>
                    <p class="dashboard-subtitle">
                        Lihat Unit
                    </p>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{  route('unit.create') }}" class="btn btn-primary mb-3">
                                    + Tambah unit
                                </a>
                                <div class="table-responsive">
                                    <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Kode Unit</th>
                                                <th>Nama Unit</th>
                                    
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
                { data: 'kode_unit', name: 'kode_unit' },
                { data: 'nama_unit', name: 'nama_unit' },
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
