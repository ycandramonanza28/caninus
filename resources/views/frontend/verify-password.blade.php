@extends('layouts.frontend.master')
@section('title', 'Caninus | Home')
@section('content')
    <div class="wrapper">
        <div class="container mt-5 mb-5">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Masukan Password</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                    placeholder="Masukan Email">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Masukan Password</label>
                <input type="password" name="password" class="form-control" id="exampleFormControlInput1"
                    placeholder="Masukan Password">
            </div>
            <button class="btn btn-primary">Simpan</button>
        </div>
    </div>
    </div>
@endsection
