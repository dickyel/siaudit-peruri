@extends('layouts.superadmin')

@section('title')
    Judul Dashboard Superadmin
@endsection

@section('content')
    <!-- content -->
    <div
        class="section-content section-dashboard-home"
        data-aos="fade-up"
    >
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Dashboard</h2>
                <p class="dashboard-subtitle">
                    Lihat 
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Temuan
                                </div>
                                <div class="dashboard-card-subtitle">
                                    10
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Rekomendasi
                                </div>
                                <div class="dashboard-card-subtitle">
                                20
                                </div>
                                
                            
                            </div>
                        </div>
                    
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Status Temuan 
                                </div>
                                <div>
                                <canvas id="temuan" style="height: 226px; width: 100%">
                                </canvas>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
                <div class="row mt-3">
                
                    <div class="col-lg-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                            <form class="form" method="" action=''>
                                <div class="form-group w-100 mb-3">
                                    
                                    <input type="text" name="keyword" class="form-control w-75 d-inline" id="keyword" placeholder="Ketikkan sesuatu" value="">
                                    <button type="submit" class="btn btn-primary mb-1">Cari</button>
                                </div>
                            </form>
                            </div>
                            <div class="col-md-4">
                            <select name="" id="selectTemuan" class="form-control" onchange="showForm()">
                                <option value="">Filter Tahun</option>
                                <option value="temuan1">Terpilih Temuan </option>
                                
                            </select>
                            </div>
                            <div class="col-md-4">
                            <select name="" id="selectTemuan" class="form-control" onchange="showForm()">
                                <option value="">Filter Temuan & Rekomendasi</option>
                                <option value="temuan1">Terpilih Temuan </option>
                                
                            </select>
                            </div>
                            

                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped scroll-horizontal-vertical w-100" id="crudTable">
                                <thead class="text-center">
                                    <tr>
                                    <th>No</th>
                                    <th>Deskripsi Temuan</th>
                                    <th>Nomor Temuan</th>
                                    <th>PIC Unit Kerja/Divisi</th>
                                    <th>Aksi</th>
                                    </tr>
                                
                                </thead>
                                <tbody class="text-center">
                                    <td>
                                    <input type="checkbox" name="" id="">
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>   
                                    <button  class="btn btn-primary " data-toggle="modal" data-target="#myApproval">Approval</button>
                                    <!-- The Modal -->
                        
                                    <span>
                                    <button class="btn btn-info" data-toggle="modal" data-target="#myDetail">Detail </button>
                                    </span>
                                </td>
                                </tbody>
                            
                                </table>
                                <button  class="btn btn-danger " data-toggle="modal" data-target="#myAdmin">Kirim ke Admin SPI</button>
                            </div>
                            
                            </div>
                        
                        </div>
                        
                        
                        </div>
                    </div>


                    
                    </div>
                </div>
            </div>

        
        </div>

        
    </div>

@endsection