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

        <div id="appForm">
            <form id="myForm" class="mt-4" enctype="multipart/form-data" method="post" action="{{ route('adminspi.store.temuan') }}">
            @csrf
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="card mt-2 mb-4">
                            <div class="card-body">
                            <header>
                                <h5>Tambah Temuan</h5>
                                <p>Silahkan tambah temuan dengan melakukan klik tombol tambah temuan</p>
                            </header>
                            <div v-for="(row, index) in rows" :key="index">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mt-2">
                                            <label for="date_temuan">Pilih Tanggal Temuan</label>
                                            <input class="form-control" type="date" :name="'rows[' + index + '][tgl_upload_temuans]'" v-model="row.tgl_upload_temuans">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mt-2">
                                            <label for="date_temuan">Pilih Tanggal Jatuh Tempo</label>
                                            <input type="date" class="form-control" :name="'rows[' + index + '][tgl_jatuh_tempo]'" v-model="row.tgl_jatuh_tempo">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mt-2">
                                            <label for="date_temuan">Nomor Temuan</label>
                                            <input type="text" class="form-control" :name="'rows[' + index + '][nomor_temuan]'" v-model="row.nomor_temuan">
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="date_temuan">Option Tingkat Resiko</label>
                                            <select  class="form-control" :name="'rows[' + index + '][tingkat_resiko]'" v-model="row.tingkat_resiko" >
                                            <option value="sedang">Sedang</option>
                                            <option value="ringan">Ringan</option>
                                            <option value="sulit">Sulit</option>
                                            
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mt-2">
                                            <label for="description_temuan">Deskripsi Temuan</label>
                                            <textarea class="form-control" :name="'rows[' + index + '][deskripsi_temuan]'" v-model="row.deskripsi_temuan" v-ckeditor></textarea>

                                        </div>
                                    </div>

                                    <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-danger" @click="deleteRow(index)">Hapus</button>
                                    </div>
                                    <hr class="mt-2 mb-3"/>
                                </div>
                            </div>
                            <button  class="btn btn-primary mt-2">Submit</button>
                            <button type="button" class="btn btn-info mt-2 ml-2" @click="addRow">Tambah Temuan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
    
    
    
</div>
@endsection

@push('after-scripts')
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<!-- <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script> -->

<script>
    // Custom directive to initialize CKEditor
    Vue.directive('ckeditor', {
        inserted: function (el) {
            CKEDITOR.replace(el);
        },
        unbind: function (el) {
            CKEDITOR.instances[el.name].destroy();
        }
    });

    new Vue({
        el: '#appForm',
        data() {
            return {
                rows: [
                    {
                        tgl_upload_temuans: '',
                        tgl_jatuh_tempo: '',
                        nomor_temuan: '',
                        deskripsi_temuan: '',
                        tingkat_resiko: 'sedang',
                    }
                ]
            };
        },
        methods: {
            addRow() {
                this.rows.push({
                    tgl_upload_temuans: '',
                    tgl_jatuh_tempo: '',
                    nomor_temuan: '',
                    deskripsi_temuan: '',
                    tingkat_resiko: '',
                });
            },
            deleteRow(index) {
                this.rows.splice(index, 1);
            }
        }
    });
</script>
@endpush