@extends('layouts.backend.master')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pasien/ Data Catatan Treatment/ Detail Catatan Treatment/</span> Tambah Catatan Treatment</h4>
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
                            <h5 class="mb-0">Tambah Catatan Treatment</h5>
                            <small class="text-muted float-end">{{ $treatmentRecord->name }}</small>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('treatment.store', $treatmentRecord->id) }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="name">Nama <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name"
                                            class="form-control  @error('name') is-invalid @enderror" id="name"
                                            placeholder="Masukan Nama ..." value="{{ $treatmentRecord->name ?? old('name') }}"
                                            readonly />
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="tooth">Tooth <span
                                            class="text-grey" style="font-size: 10px"><i>(Opsional)</i></span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="tooth"
                                            class="form-control  @error('tooth') is-invalid @enderror"
                                            id="tooth" placeholder="Tooth ..."
                                            value="{{ old('tooth') }}" />
                                        @error('tooth')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="diagnosa">Diagnosa <span
                                            class="text-grey" style="font-size: 10px"><i>(Opsional)</i></span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="diagnosa"
                                            class="form-control  @error('diagnosa') is-invalid @enderror"
                                            id="diagnosa" placeholder="Diagnosa ..."
                                            value="{{ old('diagnosa') }}" />
                                        @error('diagnosa')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="treatment_note">Treatment Note <span
                                            class="text-grey" style="font-size: 10px"><i>(Opsional)</i></span></label>
                                    <div class="col-sm-10">
                                        <textarea type="text" name="treatment_note"
                                            class="form-control  @error('treatment_note') is-invalid @enderror"
                                            id="treatment_note" placeholder="Treatment Note ..." />{{ old('treatment_note') }}</textarea>
                                        @error('treatment_note')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="note">Note <span
                                            class="text-grey" style="font-size: 10px"><i>(Opsional)</i></span></label>
                                    <div class="col-sm-10">
                                        <textarea type="text" name="note"
                                            class="form-control  @error('note') is-invalid @enderror"
                                            id="note" placeholder="Treatment Note ..."/>{{ old('note') }}</textarea>
                                        @error('note')
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
