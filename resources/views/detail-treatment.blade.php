@extends('layouts.backend.master')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pasien/ Data Catatan Treatment/</span> Detail
                Catatan Treatment</h4>
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
                <div class="card-header">
                    <div class="row justify-content-start">
                        <div class="col-6">
                            <a href="{{ route('treatment.create', $treatmentRecord->id) }}" class="btn btn-primary">+ Tambah
                                Treatment Record</a>
                            <a href="{{ route('treatment.export.pdf',  $treatmentRecord->id) }}" class="btn btn-danger">Pdf<i class='bx bx-download'></i></a>
                            <a href="{{ route('treatment.export.excel',  $treatmentRecord->id) }}" class="btn btn-success">Excel<i class='bx bx-download'></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap mt-3">
                        <table class="table table-bordered">
                            <tr>
                                <td width="50%">
                                    <table width="100%">
                                        <tr>
                                            <td width="30%"><b>Nama</b></td>
                                            <td width="5%">:</td>
                                            <td width="65%">{{ $treatmentRecord->name }}</td>
                                        </tr>
                                    </table>
                                </td>
                                <td width="50%">
                                    <table width="100%">
                                        <tr>
                                            <td width="30%"><b>T / Tgl Lahir</b></td>
                                            <td width="5%">:</td>
                                            <td width="65%">{{ $treatmentRecord->date_of_birth }}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%">
                                        <tr>
                                            <td width="30%"><b>Alamat</b></td>
                                            <td width="5%">:</td>
                                            <td width="65%">{{ $treatmentRecord->address }}</td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table width="100%">
                                        <tr>
                                            <td width="30%"><b>Pekerjaan</b></td>
                                            <td width="5%">:</td>
                                            <td width="65%"></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%">
                                        <tr>
                                            <td width="30%"><b>Telepon</b></td>
                                            <td width="5%">:</td>
                                            <td width="65%">{{ $treatmentRecord->mobile_phone }}</td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table width="100%">
                                        <tr>
                                            <td width="30%"><b>Tanda Tangan</b></td>
                                            <td width="5%">:</td>
                                            <td width="65%"></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                    </div>

                    <div class="row mb-3">
                        <span class="mt-4">Riwayat Penyakit</span>
                        <div class="info-item">
                            <div class="row">
                                @if (isset($medicalHistory->heart_defects) && $medicalHistory->heart_defects == true)
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="heart_defects"
                                                id="heart_defects" value="1"
                                                {{ $medicalHistory->heart_defects ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="heart_defects">Kelainan
                                                Jantung</label>
                                        </div>
                                    </div>
                                @endif
                                @if (isset($medicalHistory->blood_pressure) ? $medicalHistory->blood_pressure == true : false)
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="blood_pressure"
                                                id="blood_pressure" value="1"
                                                {{ $medicalHistory->blood_pressure ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="blood_pressure">Tekanan
                                                Darah
                                                Tinggi</label>
                                        </div>
                                    </div>
                                @endif
                                @if (isset($medicalHistory->diabetes) ? $medicalHistory->diabetes == true : false)
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="diabetes" id="diabetes"
                                                value="1" {{ $medicalHistory->diabetes ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="diabetes">Diabetes</label>
                                        </div>
                                    </div>
                                @endif
                                @if (isset($medicalHistory->hepatitis_jaundice_liver)  ? $medicalHistory->hepatitis_jaundice_liver == true :false)
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="hepatitis_jaundice_liver"
                                                id="hepatitis_jaundice_liver" value="1"
                                                {{ $medicalHistory->hepatitis_jaundice_liver ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="hepatitis_jaundice_liver">Hepatitis /
                                                Jaundice
                                                / Liver</label>
                                        </div>
                                    </div>
                                @endif
                                @if (isset($medicalHistory->ashma) ?  $medicalHistory->ashma == true : false)
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="ashma" id="ashma"
                                                value="1" {{ $medicalHistory->ashma ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="ashma">Ashma</label>
                                        </div>
                                    </div>
                                @endif
                                @if (isset($medicalHistory->therapy_cancer) ?$medicalHistory->therapy_cancer == true : false)
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="therapy_cancer"
                                                id="therapy_cancer" value="1"
                                                {{ $medicalHistory->therapy_cancer ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="therapy_cancer">Terapi
                                                Kanker</label>
                                        </div>
                                    </div>
                                @endif
                                @if (isset($medicalHistory->blood_disorders) ? $medicalHistory->blood_disorders == true : false)
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="blood_disorders"
                                                id="blood_disorders" value="1"
                                                {{ $medicalHistory->blood_disorders ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="blood_disorders">Kelainan
                                                Darah</label>
                                        </div>
                                    </div>
                                @endif
                                @if (isset($medicalHistory->hiv_aids) ? $medicalHistory->hiv_aids == true : false)
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="hiv_aids"
                                                id="hiv_aids" value="1"
                                                {{ $medicalHistory->hiv_aids ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="hiv_aids">HIV /
                                                AIDS</label>
                                        </div>
                                    </div>
                                @endif
                                @if (isset($medicalHistory->digestive_tract) ? $medicalHistory->digestive_tract == true : false)
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="digestive_tract"
                                                id="digestive_tract" value="1"
                                                {{ $medicalHistory->digestive_tract ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="digestive_tract">Penyakit
                                                Saluran Pencernaan</label>
                                        </div>
                                    </div>
                                @endif
                                @if (isset($medicalHistory->epilepsy) ? $medicalHistory->epilepsy == true : false)
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="epilepsy"
                                                id="epilepsy" value="1"
                                                {{ $medicalHistory->epilepsy ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="epilepsy">Epilepsi</label>
                                        </div>
                                    </div>
                                @endif
                                @if (isset($medicalHistory->pregnant) ?  $medicalHistory->pregnant == true : false)
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="pregnant"
                                                id="pregnant" value="1"
                                                {{ $medicalHistory->pregnant ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="pregnant">Hamil</label>
                                        </div>
                                    </div>
                                @endif
                                @if (isset($medicalHistory->drink_blood_thinners) ? $medicalHistory->drink_blood_thinners == true : false)
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="drink_blood_thinners"
                                                id="drink_blood_thinners" value="1"
                                                {{ $medicalHistory->drink_blood_thinners ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="drink_blood_thinners">Minum
                                                Pengencer Darah</label>
                                        </div>
                                    </div>
                                @endif
                                @if (isset($medicalHistory->taking_medicine_osteoporosis) ? $medicalHistory->taking_medicine_osteoporosis == true : false)
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox"
                                                name="taking_medicine_osteoporosis" id="taking_medicine_osteoporosis"
                                                value="1"
                                                {{ $medicalHistory->taking_medicine_osteoporosis ? 'checked' : '' }}
                                                disabled>
                                            <label class="form-check-label" for="taking_medicine_osteoporosis">Minum Obat
                                                Osteoporosis</label>
                                        </div>
                                    </div>
                                @endif
                                @if (isset($medicalHistory->allergy) ? $medicalHistory->allergy == true  : false)
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="allergy"
                                                id="allergy" value="1"
                                                {{ $medicalHistory->allergy ? 'checked' : '' }} disabled>
                                            <label class="form-check-label" for="allergy">Alergi</label>
                                        </div>
                                    </div>
                                @endif
                                @if (isset($medicalHistory->other ) ? $medicalHistory->other == true : false)
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="other"
                                                value="1" {{ $medicalHistory->other ? 'checked' : '' }} disabled>
                                            <label class="form-check-label"
                                                for="other">{{ $medicalHistory->other }}</label>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive text-nowrap mt-3">
                        <table class="table table-bordered p">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>DATE</th>
                                    <th>TOOTH</th>
                                    <th>DIAGNOSA</th>
                                    <th>TREATMENT NOTES</th>
                                    <th>NOTE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($treatmentNote as $note)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <span
                                                class="fab fa-angular fa-lg text-dark me-3">{{ \Carbon\Carbon::parse($note->created_at)->locale('id')->translatedFormat('d F Y H:i') }}</span>
                                        </td>
                                        <td>{{ $note->tooth }}</td>
                                        <td>{{ $note->diagnosa }}</td>
                                        <td>{{ $note->treatment_note }}</td>
                                        <td>{{ $note->note }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('treatment.edit', $note->id) }}"><i
                                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <form action="{{ route('treatment.destroy', $note->id) }}"
                                                        method="POST" onsubmit="return confirmDelete(event)">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item"><i
                                                                class="bx bx-trash me-1"></i> Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--/ Bordered Table -->
        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
    {{--  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    </script>  --}}
    <script>
        function confirmDelete(event) {
            if (!confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                event.preventDefault(); // Batalkan penghapusan jika user menekan "Batal"
            }
        }
    </script>
@endsection
