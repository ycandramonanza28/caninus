<x-app-layout>
    <style>
        .title {
            font-size: 30px;
            font-weight: 700;
            padding-bottom: 20px;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        header {
            background-color: #000000;
            color: white;
            padding: 1rem;
            text-align: center;
        }

        .riwayat-medis {
            background-color: #ff4d4d !important;
        }

        .container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1,
        h2 {
            color: #333;
            text-align: center;
        }

        .info {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin: 1rem 0;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem 0;
            border-bottom: 1px solid #ddd;
        }

        .info-item span {
            font-weight: bold;
            margin-right: 10px;
        }

        .buttons {
            text-align: center;
            margin-top: 2rem;
        }

        .btn {
            text-decoration: none;
            padding: 0.75rem 1.5rem;
            margin: 0 0.5rem;
            font-size: 1rem;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-edit {
            background-color: #ffc107;
        }

        .btn-delete {
            background-color: #dc3545;
        }

        .btn:hover {
            opacity: 0.9;
        }
    </style>
    <x-slot name="header">
    </x-slot>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <header>
                                    <h1 class="text-white">Detail Pasien</h1>
                                </header>
                                <div class="container">
                                    <h2>Informasi Pasien</h2>
                                    <div class="info">
                                        <div class="info-item">
                                            <span>Nama:</span>
                                            <p>{{ $patient->name }}</p>
                                        </div>
                                        <div class="info-item">
                                            <span>Tempat & Tanggal Lahir:</span>
                                            <p>{{ $patient->place_of_birth }},&nbsp;&nbsp;{{ \Carbon\Carbon::parse($patient->date_of_birth)->locale('id')->translatedFormat('d F Y') }}&nbsp;&nbsp;(
                                                {{ \Carbon\Carbon::parse($patient->date_of_birth)->age }} Tahun )</p>
                                        </div>
                                        <div class="info-item">
                                            <span>Jenis Kelamin:</span>
                                            <p>{{ isset($patient->gender) && $patient->gender == 'L' ? 'Laki - Laki' : 'Permpuan' }}
                                            </p>
                                        </div>
                                        <div class="info-item">
                                            <span>Alamat:</span>
                                            <p>{{ $patient->address }}</p>
                                        </div>
                                        <div class="info-item">
                                            <span>No. HP:</span>
                                            <p>{{ $patient->mobile_phone }}</p>
                                        </div>
                                        <div class="info-item">
                                            <span>Telepon Rumah:</span>
                                            <p>{{ !isset($patient->house_phone) ? '-' : $patient->house_phone }}
                                            </p>
                                        </div>
                                        <div class="info-item">
                                            <span>Telepon Kantor:</span>
                                            <p>{{ !isset($patient->office_phone) ? '-' : $patient->office_phone }}
                                            </p>
                                        </div>
                                        <div class="info-item">
                                            <span>Telepon Kantor:</span>
                                            <p>{{ !isset($patient->emergency_number) ? '-' : $patient->emergency_number }}
                                            </p>
                                        </div>
                                        <div class="info-item">
                                            <span>Nama Orang Tua:</span>
                                            <p>{{ $patient->parents_name }}</p>
                                        </div>
                                        <div class="info-item">
                                            <span>Referensi:</span>
                                            <p>{{ !isset($patient->the_referring) ? '-' : $patient->the_referring }}
                                            </p>
                                        </div>
                                        <div class="info-item">
                                            <span>Tanggal Pendaftaran:</span>
                                            <p>{{ \Carbon\Carbon::parse($patient->created_at)->locale('id')->translatedFormat('d F Y') }}
                                            </p>
                                        </div>
                                    </div>
                                    {{--  <div class="buttons">
                                    <a href="#" class="btn btn-back">Kembali</a>
                                    <a href="#" class="btn btn-edit">Edit</a>
                                    <a href="#" class="btn btn-delete">Hapus</a>
                                </div>  --}}
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-12">
                                <header class="riwayat-medis">
                                    <h1 class="text-white">Riwayat Medis</h1>
                                </header>
                                @if (!isset($medicalHistory))
                                    <form action="{{ route('medical.history.store', $patient->id) }}" method="POST">
                                        @csrf
                                        <div class="container">
                                            <h2>Informasi Medis</h2>
                                            <div class="info">
                                                <div class="info-item">
                                                    <span> <label class="card-title mb-2" for="">Dokter
                                                            Pribadi:</span>
                                                    <p>
                                                        <input type="text"
                                                            class="form-control @error('private_doctor') is-invalid @enderror"
                                                            name="private_doctor" placeholder="...........">
                                                        @error('private_doctor')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </p>
                                                </div>
                                                <div class="info-item">
                                                    <span> <label class="card-title mb-2" for="">Penyakit Serius
                                                            /
                                                            Operasi:</span>
                                                    <p>
                                                        <input type="text"
                                                            class="form-control @error('serious_illness') is-invalid @enderror"
                                                            name="serious_illness" placeholder="...........">
                                                        @error('serious_illness')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </p>
                                                </div>
                                                <div class="info-item">
                                                    <span> <label class="card-title mb-2" for="">Dalam Perawatan
                                                            Dokter:</span>
                                                    <p>
                                                        <input type="text"
                                                            class="form-control @error('under_doctor_care') is-invalid @enderror"
                                                            name="under_doctor_care" placeholder="...........">
                                                        @error('under_doctor_care')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </p>
                                                </div>
                                                <div class="info-item">
                                                    <span> <label class="card-title mb-2" for="">Dalam Konsumsi
                                                            Obat:</span>
                                                    <p>
                                                        <input type="text"
                                                            class="form-control @error('in_drug_consumption') is-invalid @enderror"
                                                            name="in_drug_consumption" placeholder="...........">
                                                        @error('in_drug_consumption')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </p>
                                                </div>
                                                <div class="info-item">
                                                    <span> <label class="card-title mb-2" for="">Pernah
                                                            Transfusi
                                                            Darah:</span>
                                                    <p>
                                                        <input type="text"
                                                            class="form-control @error('blood_transfusion') is-invalid @enderror"
                                                            name="blood_transfusion" placeholder="...........">
                                                        @error('blood_transfusion')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </p>
                                                </div>
                                                <div class="info-item">
                                                    <span> <label class="card-title mb-2" for="">Perokok:</span>
                                                    <p>
                                                        <input type="text"
                                                            class="form-control @error('smoker') is-invalid @enderror"
                                                            name="smoker" placeholder="...........">
                                                        @error('smoker')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </p>
                                                </div>
                                                <div class="info-item">
                                                    <div class="row">
                                                        <div class="col-12 col-md-4 col-lg-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="heart_defects" id="heart_defects"
                                                                    value="1">
                                                                <label class="form-check-label"
                                                                    for="heart_defects">Kelainan
                                                                    Jantung</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-4 col-lg-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="blood_pressure" id="blood_pressure"
                                                                    value="1">
                                                                <label class="form-check-label"
                                                                    for="blood_pressure">Tekanan
                                                                    Darah
                                                                    Tinggi</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-4 col-lg-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="diabetes" id="diabetes" value="1">
                                                                <label class="form-check-label"
                                                                    for="diabetes">Diabetes</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="info-item">
                                                    <div class="row">
                                                        <div class="col-12 col-md-4 col-lg-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="hepatitis_jaundice_liver"
                                                                    id="hepatitis_jaundice_liver" value="1">
                                                                <label class="form-check-label"
                                                                    for="hepatitis_jaundice_liver">Hepatitis /
                                                                    Jaundice
                                                                    / Liver</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-4 col-lg-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="ashma" id="ashma" value="1">
                                                                <label class="form-check-label"
                                                                    for="ashma">Ashma</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-4 col-lg-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="therapy_cancer" id="therapy_cancer"
                                                                    value="1">
                                                                <label class="form-check-label"
                                                                    for="therapy_cancer">Terapi
                                                                    Kanker</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="info-item">
                                                    <div class="row">
                                                        <div class="col-12 col-md-4 col-lg-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="blood_disorders" id="blood_disorders"
                                                                    value="1">
                                                                <label class="form-check-label"
                                                                    for="blood_disorders">Kelainan
                                                                    Darah</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-4 col-lg-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="hiv_aids" id="hiv_aids" value="1">
                                                                <label class="form-check-label" for="hiv_aids">HIV /
                                                                    AIDS</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-4 col-lg-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="digestive_tract" id="digestive_tract"
                                                                    value="1">
                                                                <label class="form-check-label"
                                                                    for="digestive_tract">Penyakit
                                                                    Saluran Pencernaan</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="info-item">
                                                    <div class="row">
                                                        <div class="col-12 col-md-4 col-lg-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="epilepsy" id="epilepsy" value="1">
                                                                <label class="form-check-label"
                                                                    for="epilepsy">Epilepsi</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-4 col-lg-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="pregnant" id="pregnant" value="1">
                                                                <label class="form-check-label"
                                                                    for="pregnant">Hamil</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-4 col-lg-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="drink_blood_thinners"
                                                                    id="drink_blood_thinners" value="1">
                                                                <label class="form-check-label"
                                                                    for="drink_blood_thinners">Minum
                                                                    Pengencer Darah</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="info-item">
                                                    <div class="row">
                                                        <div class="col-12 col-md-4 col-lg-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="taking_medicine_osteoporosis"
                                                                    id="taking_medicine_osteoporosis" value="1">
                                                                <label class="form-check-label"
                                                                    for="taking_medicine_osteoporosis">Minum Obat
                                                                    Osteoporosis</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-4 col-lg-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="allergy" id="allergy" value="1">
                                                                <label class="form-check-label"
                                                                    for="allergy">Alergi</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-4 col-lg-4">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="other" value="1">
                                                                <label class="form-check-label"
                                                                    for="other">Lainnya</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="info-item" id="otherInput" style="display: none;">
                                                    <span> <label class="card-title mb-2"
                                                            for="">Lainnya:</span>
                                                    <p>
                                                        <input type="text"
                                                            class="form-control @error('other') is-invalid @enderror"
                                                            name="other" placeholder="...........">
                                                        @error('other')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="buttons">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                @endif
                                @if ($medicalHistory)
                                    <div class="container">
                                        <h2>Informasi Medis</h2>
                                        <div class="info">
                                            <div class="info-item">
                                                <span> <label class="card-title mb-2" for="">Dokter
                                                        Pribadi:</span>
                                                <p>
                                                    {{ isset($medicalHistory->private_doctor) && $medicalHistory->private_doctor != '' ? $medicalHistory->private_doctor : '-' }}
                                                </p>
                                            </div>
                                            <div class="info-item">
                                                <span> <label class="card-title mb-2" for="">Penyakit Serius
                                                        /
                                                        Operasi:</span>
                                                <p>
                                                    {{ isset($medicalHistory->serious_illness) && $medicalHistory->serious_illness != '' ? $medicalHistory->serious_illness : '-' }}
                                                </p>
                                            </div>
                                            <div class="info-item">
                                                <span> <label class="card-title mb-2" for="">Dalam Perawatan
                                                        Dokter:</span>
                                                <p>
                                                    {{ isset($medicalHistory->under_doctor_care) && $medicalHistory->under_doctor_care != '' ? $medicalHistory->under_doctor_care : '-' }}
                                                </p>
                                            </div>
                                            <div class="info-item">
                                                <span> <label class="card-title mb-2" for="">Dalam Konsumsi
                                                        Obat:</span>
                                                <p>
                                                    {{ isset($medicalHistory->in_drug_consumption) && $medicalHistory->in_drug_consumption != '' ? $medicalHistory->in_drug_consumption : '-' }}
                                                </p>
                                            </div>
                                            <div class="info-item">
                                                <span> <label class="card-title mb-2" for="">Pernah
                                                        Transfusi
                                                        Darah:</span>
                                                <p>
                                                    {{ isset($medicalHistory->blood_transfusion) && $medicalHistory->blood_transfusion != '' ? $medicalHistory->blood_transfusion : '-' }}
                                                </p>
                                            </div>
                                            <div class="info-item">
                                                <span> <label class="card-title mb-2" for="">Perokok:</span>
                                                <p>
                                                    {{ isset($medicalHistory->smoker) && $medicalHistory->smoker != '' ? $medicalHistory->smoker : '-' }}
                                                </p>
                                            </div>
                                            <div class="info-item">
                                                <div class="row">
                                                    <div class="col-12 col-md-4 col-lg-4">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="heart_defects" id="heart_defects"
                                                                value="1"
                                                                {{ $medicalHistory->heart_defects == 1 ? 'checked' : '' }}
                                                                disabled>
                                                            <label class="form-check-label"
                                                                for="heart_defects">Kelainan
                                                                Jantung</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4 col-lg-4">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="blood_pressure" id="blood_pressure"
                                                                value="1"
                                                                {{ $medicalHistory->blood_pressure == 1 ? 'checked' : '' }}
                                                                disabled>
                                                            <label class="form-check-label"
                                                                for="blood_pressure">Tekanan
                                                                Darah
                                                                Tinggi</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4 col-lg-4">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="diabetes" id="diabetes" value="1"
                                                                {{ $medicalHistory->diabetes == 1 ? 'checked' : '' }}
                                                                disabled>
                                                            <label class="form-check-label"
                                                                for="diabetes">Diabetes</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="info-item">
                                                <div class="row">
                                                    <div class="col-12 col-md-4 col-lg-4">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="hepatitis_jaundice_liver"
                                                                id="hepatitis_jaundice_liver" value="1"
                                                                {{ $medicalHistory->hepatitis_jaundice_liver == 1 ? 'checked' : '' }}
                                                                disabled>
                                                            <label class="form-check-label"
                                                                for="hepatitis_jaundice_liver">Hepatitis /
                                                                Jaundice
                                                                / Liver</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4 col-lg-4">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="ashma" id="ashma" value="1"
                                                                {{ $medicalHistory->ashma == 1 ? 'checked' : '' }}
                                                                disabled>
                                                            <label class="form-check-label"
                                                                for="ashma">Ashma</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4 col-lg-4">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="therapy_cancer" id="therapy_cancer"
                                                                value="1"
                                                                {{ $medicalHistory->therapy_cancer == 1 ? 'checked' : '' }}
                                                                disabled>
                                                            <label class="form-check-label"
                                                                for="therapy_cancer">Terapi
                                                                Kanker</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="info-item">
                                                <div class="row">
                                                    <div class="col-12 col-md-4 col-lg-4">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="blood_disorders" id="blood_disorders"
                                                                value="1"
                                                                {{ $medicalHistory->blood_disorders == 1 ? 'checked' : '' }}
                                                                disabled>
                                                            <label class="form-check-label"
                                                                for="blood_disorders">Kelainan
                                                                Darah</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4 col-lg-4">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="hiv_aids" id="hiv_aids" value="1"
                                                                {{ $medicalHistory->hiv_aids == 1 ? 'checked' : '' }}
                                                                disabled>
                                                            <label class="form-check-label" for="hiv_aids">HIV /
                                                                AIDS</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4 col-lg-4">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="digestive_tract" id="digestive_tract"
                                                                value="1"
                                                                {{ $medicalHistory->digestive_tract == 1 ? 'checked' : '' }}
                                                                disabled>
                                                            <label class="form-check-label"
                                                                for="digestive_tract">Penyakit
                                                                Saluran Pencernaan</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="info-item">
                                                <div class="row">
                                                    <div class="col-12 col-md-4 col-lg-4">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="epilepsy" id="epilepsy" value="1"
                                                                {{ $medicalHistory->epilepsy == 1 ? 'checked' : '' }}
                                                                disabled>
                                                            <label class="form-check-label"
                                                                for="epilepsy">Epilepsi</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4 col-lg-4">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="pregnant" id="pregnant" value="1"
                                                                {{ $medicalHistory->pregnant == 1 ? 'checked' : '' }}
                                                                disabled>
                                                            <label class="form-check-label"
                                                                for="pregnant">Hamil</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4 col-lg-4">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="drink_blood_thinners" id="drink_blood_thinners"
                                                                value="1"
                                                                {{ $medicalHistory->drink_blood_thinners == 1 ? 'checked' : '' }}
                                                                disabled>
                                                            <label class="form-check-label"
                                                                for="drink_blood_thinners">Minum
                                                                Pengencer Darah</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="info-item">
                                                <div class="row">
                                                    <div class="col-12 col-md-4 col-lg-4">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="taking_medicine_osteoporosis"
                                                                id="taking_medicine_osteoporosis" value="1"
                                                                {{ $medicalHistory->taking_medicine_osteoporosis == 1 ? 'checked' : '' }}
                                                                disabled>
                                                            <label class="form-check-label"
                                                                for="taking_medicine_osteoporosis">Minum Obat
                                                                Osteoporosis</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4 col-lg-4">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="allergy" id="allergy" value="1"
                                                                {{ $medicalHistory->allergy == 1 ? 'checked' : '' }}
                                                                disabled>
                                                            <label class="form-check-label"
                                                                for="allergy">Alergi</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4 col-lg-4">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="other" value="1"
                                                                {{ isset($medicalHistory->other) ? 'checked' : '' }} disabled>
                                                            <label class="form-check-label"
                                                                for="other">Lainnya</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @isset($medicalHistory->other)
                                                <div class="info-item">
                                                    <span> <label class="card-title mb-2" for="">Lainnya:</span>
                                                    <p>
                                                        {{ isset($medicalHistory->other) && $medicalHistory->other != '' ? $medicalHistory->other : '-' }}
                                                    </p>
                                                </div>
                                            @endisset
                                        </div>
                                        <div class="buttons">
                                            <button type="submit" class="btn btn-success">Ubah</button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="col-12 col-md-12 col-lg-12">
                                <!-- Button trigger modal -->
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal" style="font-size: 122px">
                                        Tambah Catatan Treatment
                                    </button>
                                </div>
                             

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <header class="riwayat-medis" style="background-color: #f4f4f9 !important;">
                                    <h1 class="text-dark">Catatan Treatment</h1>
                                </header>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th scope="col">Date</th>
                                            <th scope="col">Tooth</th>
                                            <th scope="col">Diagnosa</th>
                                            <th scope="col">Treatment Notes</th>
                                            <th scope="col">Note</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <th scope="row"></th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                          </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('other').addEventListener('change', function() {
            // Ambil elemen input "Lainnya"

            const otherInput = document.getElementById('otherInput');

            // Tampilkan atau sembunyikan input berdasarkan checkbox
            if (this.checked) {
                otherInput.style.display = 'block';
            } else {
                otherInput.style.display = 'none';
            }
        });
    </script>
</x-app-layout>
