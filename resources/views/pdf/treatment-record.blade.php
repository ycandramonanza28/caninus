<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catatan Treatment</title>
    <link rel="stylesheet" href="{{ public_path('pdf.css') }}" type="text/css">
</head>

<body>
    <div class="header">
        <table class="w-full treatment">
            <tr>
                <td class="w-quarter logo">
                    <img src="{{ public_path('img/logo.jpg') }}" alt="logo" width="120" />
                </td>
                <td class="w-auto content">
                    <div class="table-responsive text-nowrap mt-3">
                        <table class="table table-bordered">
                            <tr>
                                <td width="100%">
                                    <table width="100%">
                                        <tr>
                                            <td width="30%"><b>Nama</b></td>
                                            <td width="5%">:</td>
                                            <td width="65%">{{ $treatmentRecord->name }}</td>
                                        </tr>
                                    </table>
                                </td>
                                <td width="100%">
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
                                <td width="100%">
                                    <table width="100%">
                                        <tr>
                                            <td width="30%"><b>Alamat</b></td>
                                            <td width="5%">:</td>
                                            <td width="65%">{{ $treatmentRecord->address }}</td>
                                        </tr>
                                    </table>
                                </td>
                                <td width="100%">
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
                                <td width="100%">
                                    <table width="100%">
                                        <tr>
                                            <td width="30%"><b>Telepon</b></td>
                                            <td width="5%">:</td>
                                            <td width="65%">{{ $treatmentRecord->mobile_phone }}</td>
                                        </tr>
                                    </table>
                                </td>
                                <td width="100%">
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
                    {{--  <table class="items">
                        <tr>
                            <td><strong>Nama :</strong></td>
                            <td>{{ $treatmentRecord->name }}</td>
                            <td><strong>T / Tgl Lahir :</strong></td>
                            <td>{{ $treatmentRecord->date_of_birth }}</td>
                        </tr>
                        <tr>
                            <td><strong>Alamat :</strong></td>
                            <td>{{ $treatmentRecord->address }}</td>
                            <td><strong>Pekerjaan :</strong></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><strong>Telepon :</strong></td>
                            <td>{{ $treatmentRecord->mobile_phone }}</td>
                            <td><strong>Tanda Tangan :</strong></td>
                            <td></td>
                        </tr>
                    </table>  --}}
                </td>
            </tr>
        </table>
    </div>

    <div class="margin-top">
        <span>Riwayat Penyakit :</span>
        <div class="w-full">
            <div class="checkbox-group">
                @if (isset($medicalHistory->heart_defects) && $medicalHistory->heart_defects == true)
                    <div class="col-12 col-md-3 col-lg-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="heart_defects" id="heart_defects"
                                value="1" {{ $medicalHistory->heart_defects ? 'checked' : '' }}>
                            <label class="form-check-label" for="heart_defects">Kelainan Jantung</label>
                        </div>
                    </div>
                @endif
                @if (isset($medicalHistory->blood_pressure) && $medicalHistory->blood_pressure == true)
                    <div class="col-12 col-md-3 col-lg-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="blood_pressure" id="blood_pressure"
                                value="1" {{ $medicalHistory->blood_pressure ? 'checked' : '' }}>
                            <label class="form-check-label" for="blood_pressure">Tekanan Darah Tinggi</label>
                        </div>
                    </div>
                @endif
                @if (isset($medicalHistory->diabetes) && $medicalHistory->diabetes == true)
                    <div class="col-12 col-md-3 col-lg-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="diabetes" id="diabetes"
                                value="1" {{ $medicalHistory->diabetes ? 'checked' : '' }}>
                            <label class="form-check-label" for="diabetes">Diabetes</label>
                        </div>
                    </div>
                @endif
                @if (isset($medicalHistory->hepatitis_jaundice_liver) && $medicalHistory->hepatitis_jaundice_liver == true)
                    <div class="col-12 col-md-3 col-lg-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="hepatitis_jaundice_liver"
                                id="hepatitis_jaundice_liver" value="1"
                                {{ $medicalHistory->hepatitis_jaundice_liver ? 'checked' : '' }}>
                            <label class="form-check-label" for="hepatitis_jaundice_liver">Hepatitis / Jaundice /
                                Liver</label>
                        </div>
                    </div>
                @endif
                @if (isset($medicalHistory->ashma) && $medicalHistory->ashma == true)
                    <div class="col-12 col-md-3 col-lg-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="ashma" id="ashma" value="1"
                                {{ $medicalHistory->ashma ? 'checked' : '' }}>
                            <label class="form-check-label" for="ashma">Ashma</label>
                        </div>
                    </div>
                @endif
                @if (isset($medicalHistory->therapy_cancer) && $medicalHistory->therapy_cancer == true)
                    <div class="col-12 col-md-3 col-lg-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="therapy_cancer" id="therapy_cancer"
                                value="1" {{ $medicalHistory->therapy_cancer ? 'checked' : '' }}>
                            <label class="form-check-label" for="therapy_cancer">Terapi
                                Kanker</label>
                        </div>
                    </div>
                @endif
                @if (isset($medicalHistory->blood_disorders) && $medicalHistory->blood_disorders == true)
                    <div class="col-12 col-md-3 col-lg-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="blood_disorders" id="blood_disorders"
                                value="1" {{ $medicalHistory->blood_disorders ? 'checked' : '' }}>
                            <label class="form-check-label" for="blood_disorders">Kelainan
                                Darah</label>
                        </div>
                    </div>
                @endif
                @if (isset($medicalHistory->hiv_aids ) && $medicalHistory->hiv_aids == true)
                    <div class="col-12 col-md-3 col-lg-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="hiv_aids" id="hiv_aids"
                                value="1" {{ $medicalHistory->hiv_aids ? 'checked' : '' }}>
                            <label class="form-check-label" for="hiv_aids">HIV /
                                AIDS</label>
                        </div>
                    </div>
                @endif
                @if (isset($medicalHistory->digestive_tract) && $medicalHistory->digestive_tract == true)
                    <div class="col-12 col-md-3 col-lg-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="digestive_tract" id="digestive_tract"
                                value="1" {{ $medicalHistory->digestive_tract ? 'checked' : '' }}>
                            <label class="form-check-label" for="digestive_tract">Penyakit
                                Saluran Pencernaan</label>
                        </div>
                    </div>
                @endif
                @if (isset($medicalHistory->epilepsy ) && $medicalHistory->epilepsy == true)
                    <div class="col-12 col-md-3 col-lg-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="epilepsy" id="epilepsy"
                                value="1" {{ $medicalHistory->epilepsy ? 'checked' : '' }}>
                            <label class="form-check-label" for="epilepsy">Epilepsi</label>
                        </div>
                    </div>
                @endif
                @if (isset($medicalHistory->pregnant ) && $medicalHistory->pregnant == true)
                    <div class="col-12 col-md-3 col-lg-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="pregnant" id="pregnant"
                                value="1" {{ $medicalHistory->pregnant ? 'checked' : '' }}>
                            <label class="form-check-label" for="pregnant">Hamil</label>
                        </div>
                    </div>
                @endif
                @if (isset($medicalHistory->drink_blood_thinners) && $medicalHistory->drink_blood_thinners == true)
                    <div class="col-12 col-md-3 col-lg-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="drink_blood_thinners"
                                id="drink_blood_thinners" value="1"
                                {{ $medicalHistory->drink_blood_thinners ? 'checked' : '' }}>
                            <label class="form-check-label" for="drink_blood_thinners">Minum
                                Pengencer Darah</label>
                        </div>
                    </div>
                @endif
                @if (isset($medicalHistory->taking_medicine_osteoporosis) && $medicalHistory->taking_medicine_osteoporosis == true)
                    <div class="col-12 col-md-3 col-lg-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="taking_medicine_osteoporosis"
                                id="taking_medicine_osteoporosis" value="1"
                                {{ $medicalHistory->taking_medicine_osteoporosis ? 'checked' : '' }}>
                            <label class="form-check-label" for="taking_medicine_osteoporosis">Minum Obat
                                Osteoporosis</label>
                        </div>
                    </div>
                @endif
                @if (isset($medicalHistory->allergy) && $medicalHistory->allergy == true)
                    <div class="col-12 col-md-3 col-lg-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="allergy" id="allergy"
                                value="1" {{ $medicalHistory->allergy ? 'checked' : '' }}>
                            <label class="form-check-label" for="allergy">Alergi</label>
                        </div>
                    </div>
                @endif
                @if (isset($medicalHistory->other) && $medicalHistory->other == true)
                    <div class="col-12 col-md-3 col-lg-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="other" value="1"
                                {{ $medicalHistory->other ? 'checked' : '' }}>
                            <label class="form-check-label" for="other">{{ $medicalHistory->other }}</label>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>


    <div class="margin-top">
        <table class="w-full treatment">
            <thead>
                <tr>
                    <th>DATE</th>
                    <th>TOOTH</th>
                    <th>DIAGNOSA</th>
                    <th>TREATMENT NOTES</th>
                    <th>NOTE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($treatmentNote as $item)
                    <tr class="items">
                        <td>
                            {{ \Carbon\Carbon::parse($item->created_at)->locale('id')->translatedFormat('d F Y H:i') }}
                        </td>
                        <td>{{ $item['tooth'] }}</td>
                        <td>{{ $item['diagnosa'] }}</td>
                        <td>{{ $item['treatment_note'] }}</td>
                        <td>{{ $item['note'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{--  <div class="footer margin-top">
        <p>Thank you</p>
        <p>&copy; Laravel Daily</p>
    </div>  --}}
</body>

</html>
