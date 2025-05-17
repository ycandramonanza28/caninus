@extends('layouts.backend.master')
@section('content')
<style>
    #imagePreview img {
        max-width: 100%;
        max-height: 200px;
        border-radius: 8px;
    }
</style>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Voucher/ </span> Edit Voucher</h4>
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
                        <form action="{{ route('voucher.update', $voucher->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="code">Kode <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="code"
                                        class="form-control  @error('code') is-invalid @enderror" id="code"
                                        placeholder="kode" value="{{ old('code') ? old('code') : $voucher->code }}" readonly />
                                    @error('code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="name">Nama Voucher <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="name"
                                        class="form-control  @error('name') is-invalid @enderror"
                                        id="name"
                                        value="{{ old('name') ? old('name') : $voucher->name }}" />
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="description">Deskripsi <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control  @error('description') is-invalid @enderror">{{ old('description') ? old('description') : $voucher->description }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="image">Gambar <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" value="{{ old('image') }}" />
                                    <div id="imagePreview" class="mt-2">
                                        <!-- Gambar yang dipilih akan muncul di sini -->
                                        @if($voucher->image)
                                            <img src="{{ asset('storage/' . $voucher->image) }}" alt="Image Preview" class="img-fluid" id="currentImage">
                                        @endif
                                    </div>
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="start_date">Tanggal Mulai <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="date" name="start_date"
                                        class="form-control  @error('start_date') is-invalid @enderror"
                                        id="start_date"
                                        value="{{ old('start_date') ? old('start_date') : $voucher->start_date }}" />
                                    @error('start_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="start_time">Waktu Mulai <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="time" name="start_time"
                                        class="form-control  @error('start_time') is-invalid @enderror"
                                        id="start_time"
                                        value="{{ old('start_time') ? old('start_time') : \Carbon\Carbon::parse($voucher->start_time)->format('H:i') }}" />
                                    @error('start_time')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="end_date">Tanggal Akhir <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="date" name="end_date"
                                        class="form-control  @error('end_date') is-invalid @enderror"
                                        id="end_date"
                                        value="{{ old('end_date') ? old('end_date') : $voucher->end_date }}" />
                                    @error('end_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="end_time">Waktu Akhir <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="time" name="end_time"
                                        class="form-control  @error('end_time') is-invalid @enderror"
                                        id="end_time"
                                        value="{{ old('end_time') ? old('end_time') : \Carbon\Carbon::parse($voucher->end_time)->format('H:i') }}" />
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('imagePreview');
        
        imageInput.addEventListener('change', function (event) {
            const file = event.target.files[0];  // Ambil file yang dipilih
            const reader = new FileReader();

            // Jika file ada dan merupakan gambar
            if (file && file.type.startsWith('image/')) {
                reader.onload = function (e) {
                    // Jika ada gambar sebelumnya, hapus
                    const existingImage = document.getElementById('currentImage');
                    if (existingImage) {
                        existingImage.remove();
                    }

                    // Buat elemen gambar baru
                    const img = document.createElement('img');
                    img.src = e.target.result;  // Set src ke gambar yang dipilih
                    img.alt = 'Image Preview';
                    img.classList.add('img-fluid');
                    img.id = 'currentImage'; // Gambar baru yang akan ditampilkan

                    // Tambahkan gambar ke dalam div #imagePreview
                    imagePreview.appendChild(img);
                };

                // Baca file gambar
                reader.readAsDataURL(file);
            } else {
                alert('Harap pilih file gambar.');
            }
        });
    });
</script>
@endsection
