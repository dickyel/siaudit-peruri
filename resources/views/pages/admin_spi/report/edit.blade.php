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
            
        <form id="myForm"action="{{ route('report.update' ,$report->id ) }}" enctype="multipart/form-data" method="post">
            @method('PUT')
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
                                        <input class="form-control" type="text" id="nama_file_reports" name="nama_file_reports" value="{{ $report->nama_file_reports }}">
                                    
                                    </div>
                                </div>
                            
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="tanggal_upload">Tanggal Upload</label>
                                        <input class="form-control" type="date" id="tanggal_upload_reports" name="tanggal_upload_reports" value="{{ $report->tanggal_upload_reports }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="document_file">File Dokumen</label>
                                        <input class="form-control" type="file" id="file_reports" name="file_reports" value="{{ $report->file_reports }}">
                                    
                                    </div>
                                </div>
                            </div>
                        

                            <button type="submit" class="btn btn-primary mt-2 ">Submit</button>
                        </div>
                    </div>
                </div>
                
            </div>  

            
        </form>

    
                
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
