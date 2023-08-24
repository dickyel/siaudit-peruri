@extends('layouts.adminspi')

@section('title')
    Bagian Assign Departemen/Divisi
@endsection

@push('after-styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

@endpush

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Assign Data ke Divisi/Departement</h2>
                <p class="dashboard-subtitle">Assign Data ke Divisi/Departement</p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <header>
                                <h5>Pilih Assign</h5>
                                <p>Silahkan assign ke divisi terkait</p>
                            </header>
                            <div class="col-lg-12 col-md-6">
                                <div class="form-group mt-2">
                                    <label for="selectTemuan">Pilih Temuan</label>
                                    <select name="temuan" id="selectTemuan" class="form-control">
                                        <option value="">Pilih Opsi Temuan...</option>
                                        @foreach($temuans as $temuan)
                                            <option value="{{ $temuan->id }}">{!! $temuan->deskripsi_temuan !!}</option>
                                         
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mt-2" id="rekomendasiWrapper" style="display: none;">
                                    <label for="selectRekomendasi">Pilih Rekomendasi</label>
                                    <select name="rekomendasi" id="selectRekomendasi" class="form-control">
                                        <option value="">Pilih Opsi Rekomendasi...</option>
                                    </select>
                                </div>

                                
                                <div class="form-group mt-2" id="rekomendasiInfo" style="display: none;">
                                    <h5>Informasi Rekomendasi</h5>
                                    <form action="{{ route('adminspi.assign.update') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="rekomendasiDeskripsi">Deskripsi Rekomendasi</label>
                                                    <textarea class="form-control" id="rekomendasiDeskripsi" name="newDeskripsi"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="rekomendasiTanggapanAuditee">Tanggapan Auditee</label>
                                                    <textarea class="form-control" id="rekomendasiTanggapanAuditee" name="newTanggapanAuditee"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="rekomendasiStatus">Status Rekomendasi</label>
                                                    <input type="text" class="form-control" id="rekomendasiStatus" name="newStatus" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="selectUser">Pilih User</label>
                                                    <select name="newUserId" id="selectUser" class="form-control">
                                                        <option value="">Pilih User...</option>
                                                        @foreach($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->nama_users }} sebagai {{ $user->role->nama_roles }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col text-right">
                                                <input type="hidden" name="selectedRekomendasiId" id="selectedRekomendasiId" value="">
                                                <button type="submit" class="btn btn-primary">Kirim data</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>


<script>
 
    // ... Previous JavaScript code ...

    // Use the $selectedRekomendasi variable to populate the fields
    var selectedRekomendasiData = {!! json_encode($selectedRekomendasi) !!}; // Replace with the actual data

    if (selectedRekomendasiData) {
        // Populate the CKEditor fields
        CKEDITOR.instances.rekomendasiDeskripsi.setData(selectedRekomendasiData.deskripsi_rekomendasi);
        CKEDITOR.instances.rekomendasiTanggapanAuditee.setData(selectedRekomendasiData.tanggapan_auditee);

        // Populate other form fields
        $('#rekomendasiStatus').val(selectedRekomendasiData.status_rekomendasi);
        $('#selectUser').val(selectedRekomendasiData.user_id).trigger('change');

        // Set the selected rekomendasi ID in the hidden input
        $('#selectedRekomendasiId').val(selectedRekomendasiData.id);

        // Show the rekomendasiInfo section
        $('#rekomendasiInfo').show();
    }

    // ... Rest of your code ...
</script>

<script>
    $(document).ready(function() {
        // Initialize Select2 on the temuan select element
        $('#selectTemuan').select2();
        

        // Event handler for temuan selection
        $('#selectTemuan').on('change', function() {
            var selectedTemuanId = $(this).val();
            if (selectedTemuanId) {
                // Show rekomendasi select box and populate its options
                $('#rekomendasiWrapper').show();
                populateRekomendasiOptions(selectedTemuanId);
            } else {
                // Hide rekomendasi select box
                $('#rekomendasiWrapper').hide();
                $('#selectRekomendasi').empty();
            }
        });


        // Function to populate rekomendasi options based on selected temuan
        function populateRekomendasiOptions(selectedTemuanId) {
            $.ajax({
                url: '/get-related-rekomendasi/' + selectedTemuanId,
                method: 'GET',
                success: function(relatedRekomendasis) {
                    var selectRekomendasi = $('#selectRekomendasi');
                    selectRekomendasi.empty();
                    selectRekomendasi.append($('<option>', {
                        value: '',
                        text: 'Pilih Opsi Rekomendasi...'
                    }));
                    relatedRekomendasis.forEach(function(rekomendasi) {
                        // Sanitize the data using strip_tags
                        var sanitizedText = $('<div>').html(rekomendasi.deskripsi_rekomendasi).text();

                        selectRekomendasi.append($('<option>', {
                            value: rekomendasi.id,
                            text: sanitizedText
                        }));
                    });

                    // Show the information when a recommendation is selected
                    // Show the information when a recommendation is selected
                    // Show the information when a recommendation is selected
                    $('#selectRekomendasi').on('change', function() {
                        var selectedRekomendasiId = $(this).val();
                        if (selectedRekomendasiId) {
                            var selectedRekomendasi = relatedRekomendasis.find(function(rekomendasi) {
                                return rekomendasi.id == selectedRekomendasiId;
                            });

                            if (selectedRekomendasi) {
                                $('#rekomendasiInfo').show();
                                $('#rekomendasiDeskripsi').val(selectedRekomendasi.deskripsi_rekomendasi);
                                $('#rekomendasiStatus').val(selectedRekomendasi.status_rekomendasi);
                                $('#rekomendasiTanggapanAuditee').val(selectedRekomendasi.tanggapan_auditee);
                                $('#selectUser').val(selectedRekomendasi.user_id).trigger('change'); // Set the selected user

                                // Set the selected rekomendasi ID in the hidden input
                                $('#selectedRekomendasiId').val(selectedRekomendasi.id);
                            }
                        } else {
                            $('#rekomendasiInfo').hide();
                            $('#rekomendasiDeskripsi').val('');
                            $('#rekomendasiStatus').val('');
                            $('#rekomendasiTanggapanAuditee').val('');
                            $('#selectUser').val('').trigger('change'); // Clear the selected user
                            $('#selectedRekomendasiId').val(''); // Clear the selected rekomendasi ID
                        }
                    });

                }
            });
        }

      
    });
</script>

@endpush
