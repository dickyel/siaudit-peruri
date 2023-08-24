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
                <h2 class="dashboard-title">Upload File LHA</h2>
                <p class="dashboard-subtitle">
                    Lihat File LHA
                </p>
            </div>

            <button class="btn btn-primary" id="btnBuatForm btn btn-success" onclick="toggleForm()">Tambahkan LHA</button>

        
            
            <form id="myForm" class="hidden" action="{{ route('adminspi.lha.store') }}" enctype="multipart/form-data" method="post">
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
                                            <input class="form-control" type="text" id="nama_file_lhas" name="nama_file_lhas">
                                        </div>
                                    </div>
                                    
                                
                                    <div class="col-md-6">
                                        <div class="form-group mt-2">
                                            <label for="tanggal_upload">Tanggal Upload</label>
                                            <input class="form-control" type="date" id="tanggal_upload_lha" name="tanggal_upload_lhas">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mt-2">
                                            <label for="document_file">File Dokumen</label>
                                            <input class="form-control" type="file" id="file_lha" name="file_lhas">
                                        
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
                    <form action="{{ route('adminspi.lha.index') }}" class="form" method="GET">
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
                                            <p>{{ $lha->tanggal_upload_lha }}</p>
                                        </div>
                                    </a>
                                    <div class="text-center">
                                        <a href="{{ route('adminspi.lha.edit', $lha->id ) }}" class="btn btn-primary mt-2" >
                                            <img src="{{ asset('./sitinjut/images/pen.svg') }}" alt="" width="20px">
                                        </a>
                                        <span>
                                            <form id="delete-form{{ $lha->id }}" action="{{ route('adminspi.lha.delete', ['id' => $lha->id]) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger mt-2" onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this lha?')) document.getElementById('delete-form{{ $lha->id }}').submit();"> 
                                                    <img src="{{ asset('./sitinjut/images/trash.svg') }}" alt="" width="20px">
                                                </button>
                                            </form>

                                        </span>
                                        <span><a href="{{ route('adminspi.lha.download',['id' => $lha->id] ) }}" class="btn btn-success mt-2" > 
                                            <img src="{{ asset('./sitinjut/images/download.svg') }}" alt="" width="20px">
                                        </a></span>
                                    </div>
                                    
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
