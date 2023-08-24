@extends('layouts.superadmin')

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
                <h2 class="dashboard-title">Upload File LHA</h2>
                <p class="dashboard-subtitle">
                    Lihat File LHA
                </p>
            </div>

            <div class="row mt-4">
            
                <div class="col-md-6">
                    <form action="{{ route('superadmin.lha.index') }}" class="form" method="GET">
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
                @php $incrementLha = 0 @endphp
                @if(!empty($lhas) && $lhas->count())
                    @foreach($lhas as $lha)
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="lha-thumbnail">
                                        <img src="{{ asset('./sitinjut/images/thumbnail-peruri.jpg') }}" alt="" class="w-100">
                                    </div>
                                    <a href="">
                                        <div class="tha-text text-center mt-4">
                                            <p>{{ $lha->nama_file_lhas }}</p>
                                            <p>{{ $lha->tanggal_upload_lhas }}</p>
                                        </div>
                                    </a>
                                 
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center py-5">
                        Tidak ada LHA
                    </div>
                @endif   
            </div>

            <div class="col-12 float-end mt-4">
            
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
