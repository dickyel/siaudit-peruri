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
            <form id="myForm" class="mt-4" enctype="multipart/form-data" method="post" action="{{ route('adminspi.store.rekomendasi') }}">
            @csrf
            <div class="row">
                
                <div class="col-md-12">
                <div class="card mt-2 mb-4">
                    <div class="card-body">
                    <header>
                        <h5>Tambah Rekomendasi</h5>
                        <p>Silahkan tambah rekomendasi dengan melakukan klik tombol tambah rekomendasi</p>
                    </header>
                    <div v-for="(row, index) in rows" :key="index">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mt-2">
                                <label for="temuan_id">Pilih Temuan</label>
                                <select class="form-control" :name="'rows[' + index + '][temuan_id]'" v-model="row.temuan_id">
                                    <!-- Loop through each Temuan object -->
                                    @foreach($temuan as $t)
                                        <option value="{{ $t->id }}">{!! $t->deskripsi_temuan !!}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mt-2">
                                    <label for="date_temuan">Pilih Status Rekomendasi</label>
                                    <select  class="form-control" :name="'rows[' + index + '][status_rekomendasi]'" v-model="row.status_rekomendasi">
                                    <option value="sudah sesuai">SS (Sudah Sesuai)</option>
                                    <option value="belum sesuai">BS (Belum Sesuai)</option>
                                    <option value="belum sesuai">BTL (Belum ditindaklanjuti)</option>
                                    <option value="tidak dapat ditindaklanjuti">TDTL (Tidak dapat ditindaklanjuti)</option>
            
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group mt-2">
                                    <label for="deskripsi_rekomendasi">Deskripsi Rekomendasi</label>
                                    <textarea class="form-control" :name="'rows[' + index + '][deskripsi_rekomendasi]'" v-model="row.deskripsi_rekomendasi" v-ckeditor></textarea>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mt-2">
                                    <label for="tanggapan_auditee">Tanggapan Auditee</label>
                                    <textarea class="form-control" :name="'rows[' + index + '][tanggapan_auditee]'" v-model="row.tanggapan_auditee" v-ckeditor></textarea>

                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-danger" @click="deleteRow(index)">Hapus</button>
                            </div>
                            <hr class="mt-2 mb-3"/>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    <button type="button" class="btn btn-info mt-2 ml-2" @click="addRow">Tambah Rekomendasi</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
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
                        temuan_id: '',
                        status_rekomendasi: '',
                        deskripsi_rekomendasi: '',
                        tanggapan_auditee: '',
                    }
                ]
            };
        },
        methods: {
            addRow() {
                this.rows.push({
                  temuan_id: '',
                  status_rekomendasi: '',
                  deskripsi_rekomendasi: '',
                  tanggapan_auditee: '',
                });
            },
            deleteRow(index) {
                this.rows.splice(index, 1);
            }
        }
    });
</script>

@endpush