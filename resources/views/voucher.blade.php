@extends('layouts.backend.master')
@section('content')
    <style>
        .modal-body {
            max-height: 400px;
            /* Set a maximum height for the modal body */
            overflow-y: auto;
            /* Allow scrolling if content overflows */
            word-wrap: break-word;
            /* Ensure long words break and wrap to the next line */
            white-space: normal;
            /* Allow text to break and wrap normally */
        }
    </style>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Voucher</h4>
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
                <div class="row justify-content-start">
                    <div class="col-sm-2 mt-4 mx-4">
                        <a href="{{ route('voucher.create') }}" class="btn btn-primary">+ Tambah Voucher</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered p">
                            <thead>
                                <tr>
                                    <th>ID Voucher</th>
                                    <th>Nama Voucher</th>
                                    <th>Gambar</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu Berakhir</th>
                                    <th>Description</th> <!-- New column for Description -->
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vouchers as $key => $voucher)
                                    @php
                                        // Get current date and time
                                        $now = \Carbon\Carbon::now('Asia/Jakarta'); // Adjust time zone as needed
                                        // Get the start and end datetime of the voucher
                                        $start = \Carbon\Carbon::parse(
                                            $voucher->start_date . ' ' . $voucher->start_time,
                                            'Asia/Jakarta',
                                        );
                                        $end = \Carbon\Carbon::parse(
                                            $voucher->end_date . ' ' . $voucher->end_time,
                                            'Asia/Jakarta',
                                        );
                                        // Check if current time is greater than or equal to start and less than or equal to end
                                        $isActive = $now >= $start && $now <= $end;
                                    @endphp
                                    <tr>
                                        <td>{{ $voucher->code }}</td>
                                        <td>{{ $voucher->name }}</td>
                                        <td>
                                            @if ($voucher->image)
                                                <img src="{{ asset('storage/' . $voucher->image) }}" alt="Voucher Image"
                                                    style="width: 100px; height: auto;">
                                            @else
                                                No image
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($voucher->start_date)->format('d-m-Y') }} : {{ \Carbon\Carbon::parse($voucher->start_time)->format('H:i') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($voucher->end_date)->format('d-m-Y') }} : {{ \Carbon\Carbon::parse($voucher->end_time)->format('H:i') }}</td>
                                        <td>
                                            <!-- Trigger button for modal -->
                                            <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                                data-bs-target="#descriptionModal{{ $voucher->id }}">
                                                View Description
                                            </button>
                                        </td>
                                        <td>
                                            <span class="badge {{ $isActive ? 'bg-success' : 'bg-danger' }}">
                                                {{ $isActive ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('voucher.edit', $voucher->id) }}"><i
                                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <form action="{{ route('voucher.destroy', $voucher->id) }}" method="POST" onsubmit="return confirmDelete(event)">
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

                        <!-- Modal Structure -->
                        @foreach ($vouchers as $voucher)
                            <div class="modal fade" id="descriptionModal{{ $voucher->id }}" tabindex="-1"
                                aria-labelledby="descriptionModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg"> <!-- Added modal-lg for larger modal size -->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="descriptionModalLabel">Voucher Description</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>{{ $voucher->description }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!--/ Bordered Table -->
        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
    {{--  <script>
        function confirmDelete(event) {
            if (!confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                event.preventDefault(); // Batalkan penghapusan jika user menekan "Batal"
            }
        }
    </script>  --}}
@endsection
