@extends('layouts.backend.master')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Voucher/ </span> Tambah Voucher</h4>
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
                            {{--  <h5 class="mb-0">Basic Layout</h5>
                            <small class="text-muted float-end">Default label</small>  --}}
                        </div>
                        <div class="card-body">
                            <form action="{{ route('voucher.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="code">Kode <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="code"
                                            class="form-control  @error('code') is-invalid @enderror" id="code"
                                            placeholder="kode" value="{{ old('code') ? old('code') : $voucherCode }}" readonly />
                                        @error('code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="name">Nama Voucher <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name"
                                            class="form-control  @error('name') is-invalid @enderror"
                                            id="name"
                                            value="{{ old('name') }}" />
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="description">Deskripsi <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                       <textarea description="description" name="description" id="" cols="30" rows="10" class="form-control  @error('description') is-invalid @enderror"></textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="image">Gambar <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="file" name="image"
                                            class="form-control  @error('image') is-invalid @enderror"
                                            id="image"
                                            value="{{ old('image') }}" />
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="start_date">Tanggal Mulai <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="date" name="start_date"
                                            class="form-control  @error('start_date') is-invalid @enderror"
                                            id="start_date"
                                            value="{{ old('start_date') }}" />
                                        @error('start_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <!-- Jam Mulai -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="start_time">Waktu Mulai <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="time" name="start_time"
                                            class="form-control  @error('start_time') is-invalid @enderror"
                                            id="start_time"
                                            value="{{ old('start_time') }}" />
                                        @error('start_time')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="end_date">Tanggal Akhir <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="date" name="end_date"
                                            class="form-control  @error('end_date') is-invalid @enderror"
                                            id="end_date"
                                            value="{{ old('end_date') }}" />
                                        @error('end_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <!-- Jam Akhir -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="end_time">Waktu Akhir <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="time" name="end_time"
                                            class="form-control  @error('end_time') is-invalid @enderror"
                                            id="end_time"
                                            value="{{ old('end_time') }}" />
                                        @error('end_time')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="row justify-content-end">
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
@endsection
{{--  <x-app-layout>
    <style>
        .title {
            font-size: 30px;
            font-weight: 700;
            padding-bottom: 20px;
        }
    </style>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <div class="card">
                    <div class="card-body">
                        <div class="container text-center">
                            <div class="row justify-content-between mb-3">
                                <div
                                    class="col-12 col-md-6 col-lg-6 d-flex d-md-flex justify-content-md-start d-lg-flex justify-content-lg-start">
                                    <a href="{{ route('patient.create') }}" class="btn btn-primary">+ Tambah Data</a>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered my-0">
                            <thead>
                                <tr>
                                    <th class="d-none d-xl-table-cell">ID</th>
                                    <th class="d-none d-xl-table-cell">Nama</th>
                                    <th class="d-none d-xl-table-cell">TTL</th>
                                    <th class="d-none d-xl-table-cell">Telepon</th>
                                    <th class="d-none d-md-table-cell">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($patients as $patient)
                                <tr>
                                    <td class="d-none d-xl-table-cell">{{ $patient->id }}</td>
                                    <td class="d-none d-xl-table-cell">{{ $patient->name }}</td>
                                    <td class="d-none d-xl-table-cell">{{ $patient->date_of_birth }}</td>
                                    <td class="d-none d-xl-table-cell">{{ $patient->mobile_phone }}</td>
                                    <td>
                                        <a href="{{ route('patient.show', $patient->id)}}" class="text-white btn btn-sm btn-info">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>  --}}


{{--  <x-app-layout>
    <style>
        .title {
            font-size: 30px;
            font-weight: 700;
            padding-bottom: 20px;
        }
    </style>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center"><u>Data Pasien</u></h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('patient.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-4 col-lg-4 mt-4">
                                    <label class="card-title mb-2" for="">Nama Pasien <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" placeholder="Masukan Nama Pasien..">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-4 col-lg-4 mt-4">
                                    <label class="card-title mb-2" for=""> Nama Orang Tua <span
                                            class="text-grey" style="font-size: 10px"><i>(Opsional)</i></span></label>
                                    <input type="text"
                                        class="form-control @error('start_date') is-invalid @enderror"
                                        name="start_date" placeholder="Masukan Nama Orang Tua..">
                                    @error('start_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-4 col-lg-4 mt-4">
                                    <label class="card-title mb-2" for="">Jenis Kelamin <span
                                            class="text-danger">*</span></label>
                                    <br>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender"
                                            id="flexRadioDefault1" checked value="L">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Laki-Laki
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender"
                                            id="flexRadioDefault2" value="P">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-lg-3 mt-4">
                                    <label class="card-title mb-2" for="">Telepon Rumah <span class="text-grey"
                                            style="font-size: 10px"><i>(Opsional)</i></span></label>
                                    <input type="text"
                                        class="form-control @error('house_phone') is-invalid @enderror"
                                        name="house_phone" placeholder="Masukan Nomor..">
                                    @error('house_phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-3 col-lg-3 mt-4">
                                    <label class="card-title mb-2" for="">Telepon Kantor <span class="text-grey"
                                            style="font-size: 10px"><i>(Opsional)</i></label>
                                    <input type="text"
                                        class="form-control @error('office_phone') is-invalid @enderror"
                                        name="office_phone" placeholder="Masukan Nomor..">
                                    @error('office_phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-3 col-lg-3 mt-4">
                                    <label class="card-title mb-2" for="">Nomor HP <span
                                            class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @error('mobile_phone') is-invalid @enderror"
                                        name="mobile_phone" placeholder="Masukan Nomor..">
                                    @error('mobile_phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-3 col-lg-3 mt-4">
                                    <label class="card-title mb-2" for="">Nomor Emergency <span
                                            class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @error('emergency_number') is-invalid @enderror"
                                        name="emergency_number" placeholder="Masukan Nomor..">
                                    @error('emergency_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-4 col-lg-4 mt-4">
                                    <label class="card-title mb-2" for="">Tanggal Lahir <span
                                            class="text-danger">*</span></label>
                                    <input type="date"
                                        class="form-control @error('date_of_birth') is-invalid @enderror"
                                        name="date_of_birth" placeholder="Masukan Tanggal Lahir..">
                                    @error('date_of_birth')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-4 col-lg-4 mt-4">
                                    <label class="card-title mb-2" for="">Tempat Lahir <span
                                            class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @error('place_of_birth') is-invalid @enderror"
                                        name="place_of_birth" placeholder="Masukan Tempat Lahir..">
                                    @error('place_of_birth')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-4 col-lg-4 mt-4">
                                    <label class="card-title mb-2" for="">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" placeholder="Masukan Email..">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-5 col-lg-8 mt-4">
                                    <label class="card-title mb-2" for="">Alamat <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Masukan Alamat.."></textarea>
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-4 col-lg-4 mt-4">
                                    <label class="card-title mb-2" for="">Yang Mereferensikan <span
                                            class="text-grey" style="font-size: 10px"><i>(Opsional)</i></label>
                                    <textarea class="form-control @error('the_referring') is-invalid @enderror" name="the_referring"
                                        placeholder="Masukan Nama Yang Mereferensikan.."></textarea>
                                    @error('the_referring')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-12 col-md-3 col-lg-3">
                                    <button type="submit" class="btn btn-primary submit-btn"> <i
                                            class="align-middle" data-feather="save"></i> Simpan Data Pasien</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>  --}}
