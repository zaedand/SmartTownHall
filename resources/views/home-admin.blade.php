@extends('panel')
@section('title','Admin')
@section('content')

<div class="container mt-5">
    <div class="card rounded-3 border-0">
        <div class="row g-0">
            <div class="col-md-6 bg-darkolivegreen d-flex align-items-center">
                <div class="card-body text-center text-md-start">
                    <h2 class="card-title mb-4">Selamat Datang Kembali</h2>
                    <h1 style="text-decoration:underline">{{ Auth::user()->username }}</h1>
                    <p class="card-text">Mari kelola data penduduk dengan mudah dan efisien dengan <span style="color:rgb(0, 200, 255)">Smart Town Hall</span></p>
                </div>
            </div>
            <div class="col-md-6">
                <img style="border-radius: 40px" src="{{ asset('image/townhall.jpg') }}" class="img-fluid rounded-end" alt="Kota Image">
            </div>
        </div>
    </div>
</div>

@endsection
