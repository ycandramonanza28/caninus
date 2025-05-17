@extends('layouts.backend.master')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pasien/</span> Data Catatan Treatments</h4>
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
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered p">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Catatan Treatment</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($treatmentRecord as $record)
                                    <tr>
                                        <td>
                                            <span class="fab fa-angular fa-lg text-dark me-3">{{ $record->id }}</span>
                                        </td>
                                        <td>{{ $record->name }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"  href="{{ route('treatment.show', $record->id) }}">
                                                        <i class='bx bx-info-circle'></i> Lihat Detail
                                                    </a>
                                                    {{--  <a class="dropdown-item" href="{{ route('medical.history.show',$history->id )}}"><i class='bx bx-info-circle'></i> Lihat</a>   --}}
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
    <script>
        function confirmDelete(event) {
            if (!confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                event.preventDefault(); // Batalkan penghapusan jika user menekan "Batal"
            }
        }
    </script>
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
