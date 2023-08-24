@extends('layouts.adminspi')

@section('title')
    LHA Admin SPI
@endsection

@section('content')
    <!-- content -->
        
    <div
        class="section-content section-dashboard-home"
        data-aos="fade-up"
    >
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Upload File Report</h2>
                <p class="dashboard-subtitle">
                    Lihat File Report
                </p>
            </div>

            <button class="btn btn-primary" id="btnBuatForm btn btn-success" onclick="toggleForm()">Tambahkan Laporan</button>

        
            
            <form id="myForm" class="hidden" action="{{ route('adminspi.report.store') }}" enctype="multipart/form-data" method="post">
                @csrf
                <!-- Isi formulir di sini -->
                <div class="row">
                    <div class="col-md-12">
                    <div class="card mt-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="created_date">Nama File</label>
                                        <input class="form-control" type="text" id="nama_file_report" name="nama_file_reports">
                                    
                                    </div>
                                </div>
                            
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="tanggal_upload">Tanggal Upload</label>
                                        <input class="form-control" type="date" id="tanggal_upload_report" name="tanggal_upload_reports">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="document_file">File Dokumen</label>
                                        <input class="form-control" type="file" id="file_report" name="file_reports">
                                    
                                    </div>
                                </div>
                            </div>
                        

                            <button type="submit" class="btn btn-primary mt-2 ">Submit</button>
                        </div>
                    </div>
                    </div>
                    
                </div>  

                
            </form>

            <div class="row mt-4">
            
                <div class="col-md-6">
                    <form action="{{ route('adminspi.report.index') }}" class="form" method="GET">
                        <div class="form-group">
                            <input type="text" name="keyword" id="keyword" class="form-control w-75 d-inline" value="{{ request('keyword') }}">
                            <button type="submit" class="btn btn-primary">
                            Cari
                            </button>
                        </div>
                    
                    </form>
                </div>
            </div>

            <div class="row mt-4">
                @php $incrementReport = 0 @endphp
                @if(!empty($reports) && $reports->count())
                    @foreach($reports as $report)
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="lha-thumbnail">
                                        <img src="{{ asset('./sitinjut/images/thumbnail-peruri.jpg') }}" alt="" class="w-100">
                                    </div>
                                    <a href="">
                                        <div class="tha-text text-center mt-4">
                                            <p>{{ $report->nama_file_reports }}</p>
                                            <p>{{ $report->tanggal_upload_reports }}</p>
                                        </div>
                                    </a>
                                    <div class="text-center">
                                        <a href="{{ route('adminspi.report.edit', $report->id ) }}" class="btn btn-primary mt-2" >
                                            <img src="{{ asset('./sitinjut/images/pen.svg') }}" alt="" width="20px">
                                        </a>
                                        <span>
                                            <form id="delete-form{{ $report->id }}" action="{{ route('adminspi.report.delete', ['id' => $report->id]) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger mt-2" onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this report?')) document.getElementById('delete-form{{ $report->id }}').submit();"> 
                                                    <img src="{{ asset('./sitinjut/images/trash.svg') }}" alt="" width="20px">
                                                </button>
                                            </form>

                                        </span>
                                        <span><a href="{{ route('adminspi.report.download',['id' => $report->id] ) }}" class="btn btn-success mt-2" > 
                                            <img src="{{ asset('./sitinjut/images/download.svg') }}" alt="" width="20px">
                                        </a></span>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center py-5">
                        Tidak ada report
                    </div>
                @endif   
            </div>

            <div class="col-12 float-end mt-4">
            {{ $reports->links() }}
            </div>
        
            
            
        </div>
        
        
        
    </div>

@endsection

@push('after-scripts')
<script>
    function toggleForm() {
    var form = document.getElementById("myForm");
    form.classList.toggle("hidden");
    }
</script>
@endpush
