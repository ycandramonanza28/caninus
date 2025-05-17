@extends('layouts.backend.master')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pasien/ Data Riwayat Medis/ Detail Riwayat
                    Medis/</span> Tambah Riwayat Medis</h4>
            @if (session('error'))
                <div class="alert alert-danger text-dark">
                    {{ session('error') }}
                </div>
            @endif
            <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Tambah Riwayat Medis</h5>
                            <small class="text-muted float-end">{{ $history->name }}</small>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('medical.history.store', $history->id) }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="name">Nama <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name"
                                            class="form-control  @error('name') is-invalid @enderror" id="name"
                                            placeholder="Masukan Nama ..." value="{{ $history->name ?? old('name') }}"
                                            readonly />
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="private_doctor">Dokter Pribadi <span
                                            class="text-grey" style="font-size: 10px"><i>(Opsional)</i></span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="private_doctor"
                                            class="form-control  @error('private_doctor') is-invalid @enderror"
                                            id="private_doctor" placeholder="Dokter Pribadi ..."
                                            value="{{ old('private_doctor') }}" />
                                        @error('private_doctor')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="serious_illness">Penyakit Serius / Operasi
                                        <span class="text-grey"style="font-size: 10px"><i>(Opsional)</i></span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="serious_illness"
                                            class="form-control  @error('serious_illness') is-invalid @enderror"
                                            id="serious_illness" placeholder="Penyakit Serius / Operasi ..."
                                            value="{{ old('serious_illness') }}" />
                                        @error('serious_illness')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="under_doctor_care">Dalam Perawatan Dokter
                                        <span class="text-grey"style="font-size: 10px"><i>(Opsional)</i></span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="under_doctor_care"
                                            class="form-control  @error('under_doctor_care') is-invalid @enderror"
                                            id="under_doctor_care" placeholder="Dalam Perawatan Dokter ..."
                                            value="{{ old('under_doctor_care') }}" />
                                        @error('under_doctor_care')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="in_drug_consumption">Dalam Konsumsi Obat
                                        <span class="text-grey"style="font-size: 10px"><i>(Opsional)</i></span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="in_drug_consumption"
                                            class="form-control  @error('in_drug_consumption') is-invalid @enderror"
                                            id="in_drug_consumption" placeholder="Dalam Konsumsi Obat ..."
                                            value="{{ old('in_drug_consumption') }}" />
                                        @error('in_drug_consumption')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="blood_transfusion">Pernah Transfusi <span
                                            class="text-grey"style="font-size: 10px"><i>(Opsional)</i></span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="blood_transfusion"
                                            class="form-control  @error('blood_transfusion') is-invalid @enderror"
                                            id="blood_transfusion" placeholder="Pernah Transfusi ..."
                                            value="{{ old('blood_transfusion') }}" />
                                        @error('blood_transfusion')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="smoker">Perokok <span
                                            class="text-grey"style="font-size: 10px"><i>(Opsional)</i></span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="smoker"
                                            class="form-control  @error('smoker') is-invalid @enderror" id="smoker"
                                            placeholder="Perokok ..." value="{{ old('smoker') }}" />
                                        @error('smoker')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="info-item">
                                        <div class="row">
                                            <div class="col-12 col-md-3 col-lg-3">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="heart_defects"
                                                    id="heart_defects" value="1" {{ old('heart_defects') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="heart_defects">Kelainan
                                                        Jantung</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-3 col-lg-3">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="blood_pressure"
                                                        id="blood_pressure" value="1" {{ old('blood_pressure') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="blood_pressure">Tekanan
                                                        Darah
                                                        Tinggi</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-3 col-lg-3">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="diabetes"
                                                        id="diabetes" value="1" {{ old('diabetes') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="diabetes">Diabetes</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-3 col-lg-3">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="hepatitis_jaundice_liver" id="hepatitis_jaundice_liver"
                                                        value="1" {{ old('hepatitis_jaundice_liver') ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="hepatitis_jaundice_liver">Hepatitis /
                                                        Jaundice
                                                        / Liver</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="info-item">
                                        <div class="row">
                                            <div class="col-12 col-md-3 col-lg-3">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="ashma"
                                                        id="ashma" value="1" {{ old('ashma') ? 'checked' : '' }}> <label class="form-check-label"
                                                        for="ashma">Ashma</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-3 col-lg-3">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="therapy_cancer"
                                                        id="therapy_cancer" value="1" {{ old('therapy_cancer') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="therapy_cancer">Terapi
                                                        Kanker</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-3 col-lg-3">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="blood_disorders" id="blood_disorders" value="1" {{ old('blood_disorders') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="blood_disorders">Kelainan
                                                        Darah</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-3 col-lg-3">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="hiv_aids"
                                                        id="hiv_aids" value="1" {{ old('hiv_aids') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="hiv_aids">HIV /
                                                        AIDS</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="info-item">
                                        <div class="row">
                                            <div class="col-12 col-md-3 col-lg-3">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="digestive_tract" id="digestive_tract" value="1" {{ old('digestive_tract') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="digestive_tract">Penyakit
                                                        Saluran Pencernaan</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-3 col-lg-3">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="epilepsy"
                                                        id="epilepsy" value="1" {{ old('epilepsy') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="epilepsy">Epilepsi</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-3 col-lg-3">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="pregnant"
                                                        id="pregnant" value="1"  {{ old('pregnant') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="pregnant">Hamil</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-3 col-lg-3">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="drink_blood_thinners" id="drink_blood_thinners"
                                                        value="1" {{ old('drink_blood_thinners') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="drink_blood_thinners">Minum
                                                        Pengencer Darah</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="info-item">
                                        <div class="row">
                                            <div class="col-12 col-md-3 col-lg-3">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="taking_medicine_osteoporosis"
                                                        id="taking_medicine_osteoporosis" value="1" {{ old('taking_medicine_osteoporosis') ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="taking_medicine_osteoporosis">Minum Obat
                                                        Osteoporosis</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-3 col-lg-3">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" name="allergy"
                                                        id="allergy" value="1" {{ old('allergy') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="allergy">Alergi</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-3 col-lg-3">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="other"
                                                        value="1" {{ old('other') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="other">Lainnya</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3" id="other-input" style="display: none;">
                                    <label class="col-sm-2 col-form-label" for="other-text">Lainnya 
                                        <span class="text-grey" style="font-size: 10px"><i>(Opsional)</i></span>
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="other" class="form-control @error('other') is-invalid @enderror" 
                                               id="other-text" placeholder="Lainnya ..." value="{{ old('other') }}" />
                                        @error('other')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Cek status checkbox saat halaman dimuat
            if ($('#other').is(':checked')) {
                $('#other-input').show(); // Tampilkan input jika checkbox dicentang
            } else {
                $('#other-input').hide(); // Sembunyikan input jika checkbox tidak dicentang
                $('#other-text').val(''); // Hapus nilai input jika checkbox tidak dicentang
            }
    
            // Fungsi untuk menangani perubahan checkbox
            $('#other').change(function() {
                if ($(this).is(':checked')) {
                    $('#other-input').show(); // Tampilkan input jika checkbox dicentang
                } else {
                    $('#other-input').hide(); // Sembunyikan input jika checkbox tidak dicentang
                    $('#other-text').val(''); // Hapus nilai input jika checkbox tidak dicentang
                }
            });
        });
    </script>
@endsection
