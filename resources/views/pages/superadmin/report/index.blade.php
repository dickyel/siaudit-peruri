@extends('layouts.adminspi')

@section('title')
    LHA Admin SPI
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
                    <h2 class="dashboard-title">Upload File Report</h2>
                    <p class="dashboard-subtitle">
                        Lihat File Report
                    </p>
                </div>

              

                <div class="row mt-4">
                
                    <div class="col-md-6">
                        <form action="{{ route('superadmin.report.index') }}" class="form" method="GET">
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
