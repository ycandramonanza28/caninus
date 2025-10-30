@extends('layouts.backend.master')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pasien/ Data Riwayat Medis/</span> Detail Riwayat Medis</h4>
            @if (session('success'))
                <div class="alert alert-success text-dark">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger text-dark">
                    {{ session('error') }}
                </div>
            @endif
            <!-- Bordered Table -->
            <div class="card">
                @if (isset($medicalHistories))
                    <div class="card-header">
                        <div class="row justify-content-around">
                            <div class="col-6">
                                <a href="{{ route('medical.history.edit', $history->id) }}" class="btn btn-primary"> <i class='bx bx-edit'></i></a>
                                {{-- <button class="btn btn-success"><i class='bx bx-download'></i></button> --}}
                            </div>
                            <div class="col-6 d-flex justify-end">
                                <form action="{{ route('medical.history.destroy', $history->id) }}" method="POST" onsubmit="return confirmDelete(event)">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class='bx bx-trash'></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="card-body">
                    <div class="row">
                        @if (!isset($medicalHistories))
                        <div class="col-md-12 text-center">
                            <h3>Pasien <b>{{ $history->name }}</b> (Belum Ada Data Riwayat Medis)</h3>
                            <a href="{{ route('medical-history.create', $history->id) }}" class="btn btn-primary mx-auto mt-3">+ Tambah Data</a>
                        </div>
                        @else
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="name">Nama :</label>
                            <div class="col-sm-10">
                                <span>{{ $history->name ?? old('name') }}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="private_doctor">Dokter Pribadi  :</label>
                            <div class="col-sm-10">
                                <span>{{ $medicalHistories->private_doctor ?? old('private_doctor') }}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="serious_illness">Penyakit Serius / Operasi :</label>
                            <div class="col-sm-10">
                                <span>{{ $medicalHistories->serious_illness ?? old('serious_illness') }}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="under_doctor_care">Dalam Perawatan Dokter :</label>
                            <div class="col-sm-10">
                                <span>{{ $medicalHistories->under_doctor_care ?? old('under_doctor_care') }}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="in_drug_consumption">Dalam Konsumsi Obat :</label>
                            <div class="col-sm-10">
                                <span>{{ $medicalHistories->in_drug_consumption ?? old('in_drug_consumption') }}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="blood_transfusion">Pernah Transfusi :</label>
                            <div class="col-sm-10">
                                <span>{{ $medicalHistories->blood_transfusion ?? old('blood_transfusion') }}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="smoker">Perokok :</label>
                            <div class="col-sm-10">
                                <span>{{ $medicalHistories->smoker ?? old('smoker') }}</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="info-item">
                                <div class="row">
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="heart_defects"
                                            id="heart_defects" value="1" {{ $medicalHistories->heart_defects ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="heart_defects">Kelainan
                                                Jantung</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="blood_pressure"
                                                id="blood_pressure" value="1" {{ $medicalHistories->blood_pressure ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="blood_pressure">Tekanan
                                                Darah
                                                Tinggi</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="diabetes"
                                                id="diabetes" value="1" {{ $medicalHistories->diabetes ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="diabetes">Diabetes</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox"
                                                name="hepatitis_jaundice_liver" id="hepatitis_jaundice_liver"
                                                value="1" {{ $medicalHistories->hepatitis_jaundice_liver ? 'checked' : '' }} disabled>
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
                                                id="ashma" value="1" {{ $medicalHistories->ashma ? 'checked' : '' }} disabled> <label class="form-check-label"
                                                for="ashma">Ashma</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="therapy_cancer"
                                                id="therapy_cancer" value="1" {{ $medicalHistories->therapy_cancer ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="therapy_cancer">Terapi
                                                Kanker</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox"
                                                name="blood_disorders" id="blood_disorders" value="1" {{ $medicalHistories->blood_disorders ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="blood_disorders">Kelainan
                                                Darah</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="hiv_aids"
                                                id="hiv_aids" value="1" {{ $medicalHistories->hiv_aids ? 'checked' : '' }} disabled>
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
                                                name="digestive_tract" id="digestive_tract" value="1" {{ $medicalHistories->digestive_tract ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="digestive_tract">Penyakit
                                                Saluran Pencernaan</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="epilepsy"
                                                id="epilepsy" value="1" {{ $medicalHistories->epilepsy ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="epilepsy">Epilepsi</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="pregnant"
                                                id="pregnant" value="1"  {{ $medicalHistories->pregnant ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="pregnant">Hamil</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox"
                                                name="drink_blood_thinners" id="drink_blood_thinners"
                                                value="1" {{ $medicalHistories->drink_blood_thinners ? 'checked' : '' }} disabled>
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
                                                id="taking_medicine_osteoporosis" value="1" {{ $medicalHistories->taking_medicine_osteoporosis ? 'checked' : '' }} disabled>
                                            <label class="form-check-label"
                                                for="taking_medicine_osteoporosis">Minum Obat
                                                Osteoporosis</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="allergy"
                                                id="allergy" value="1" {{ $medicalHistories->allergy ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="allergy">Alergi</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="other"
                                                value="1"  {{ $medicalHistories->other ? 'checked' : '' }} disabled>
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
                                <span>{{ $medicalHistories->other ?? old('other') }}</span>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <!--/ Bordered Table -->
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
    <script>
        function confirmDelete(event) {
            if (!confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                event.preventDefault(); // Batalkan penghapusan jika user menekan "Batal"
            }
        }
    </script>
@endsection
