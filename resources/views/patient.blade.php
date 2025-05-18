@extends('layouts.backend.master')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pasien/</span> Data Pasien</h4>
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
                <div class="row mb-4 px-2 mt-2">
                    <div class="col-md-6">
                        <a href="{{ route('patient.create') }}" class="btn btn-primary">
                            + Tambah Pasien
                        </a>
                    </div>
                    <div class="col-md-6">
                        <form method="GET" action="{{ route('patient') }}" class="mb-3">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Cari pasien berdasarkan nama..." value="{{ request('search') }}">
                                <button class="btn btn-outline-secondary" type="submit">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        @if ($patients->count())
                            <table class="table table-bordered p">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Umur</th>
                                        <th>Telepon</th>
                                        <th>Waktu Pendaftaran</th>
                                        <th>Actions</th>
                                        <th>Voucher</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($patients as $patient)
                                        <tr>
                                            <td>
                                                <span class="fab fa-angular fa-lg text-dark me-3">{{ $patient->id }}</span>
                                            </td>
                                            <td>{{ $patient->name }}</td>
                                            <td>{{ $patient->gender }}</td>
                                            <td>
                                                <span class="fab fa-angular fa-lg text-dark me-3">(
                                                    {{ \Carbon\Carbon::parse($patient->date_of_birth)->age }} Tahun )</span>
                                            </td>
                                            <td>
                                                <span
                                                    class="fab fa-angular fa-lg text-dark me-3">{{ $patient->mobile_phone }}</span>
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($patient->created_at)->locale('id')->translatedFormat('d F Y H:i') }}
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                            href="{{ route('patient.edit', $patient->id) }}"><i
                                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                                        <form action="{{ route('patient.destroy', $patient->id) }}"
                                                            method="POST" onsubmit="return confirmDelete(event)">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item"><i
                                                                    class="bx bx-trash me-1"></i> Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-dark" data-bs-toggle="modal"
                                                    data-bs-target="#voucherModal-{{ $patient->id }}">
                                                    <i class="bx bx-gift"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $patients->links() }}
                        @elseif(request('search'))
                            <p>Tidak ada pasien ditemukan untuk: <strong>{{ request('search') }}</strong></p>

                        @else
                            <p class="text-center">Tidak ada pasien ditemukan.</p>
                        @endif

                    </div>
                </div>
            </div>
            <!--/ Bordered Table -->
        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
    @if (isset($patients) && $patients->count())
        @foreach ($patients as $patient)
            <div class="modal fade" id="voucherModal-{{ $patient->id }}" tabindex="-1"
                aria-labelledby="voucherModalLabel-{{ $patient->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="voucherModalLabel-{{ $patient->id }}">Kirim Voucher untuk
                                {{ $patient->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('reedem.voucher', $patient->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="voucher_type_{{ $patient->id }}" class="form-label">Kode Voucher</label>
                                    <input type="text" class="form-control" id="voucher_type_{{ $patient->id }}"
                                        name="code" placeholder="Masukkan kode voucher">
                                </div>
                                <button type="submit" class="btn btn-primary">Redeem Voucher</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif


    <!-- Content wrapper -->
    <script>
        function confirmDelete(event) {
            if (!confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                event.preventDefault(); // Batalkan penghapusan jika user menekan "Batal"
            }
        }
    </script>
@endsection
