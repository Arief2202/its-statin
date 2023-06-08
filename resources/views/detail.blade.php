@extends('layouts.main')


@section('title')
Statin | Konsultasi Statistika
@endsection


@section('content')
    <button type="button" class="btn btn-outline-secondary pe-4 mb-4 ms-3" style="font-size:30px; border-radius:20px;" onclick="history.back()">< Back</button>
    <div class="">
        <div style="row">
            <div class="col d-flex justify-content-center" style="background-color:#7d7d7d;">
                @if($user->foto)
                <img src="{{ $user->foto }}" alt="" style="width: 40%">
                @else
                <img src="/img/no_image.png" style="height:180px; border-radius:20px;">
                @endif
            </div>
        </div>
        <div class="ms-5 me-5 mt-5">

            <h1 style="font-weight:700;font-size: 60px;"> {{ $user->name }}</h1>
            <div class="row mt-5">
                <div class="col-auto">
                    <i class='bx bx-dollar-circle' style="font-size: 40px;"></i> 
                </div>
                <div class="col d-flex align-items-center">
                    <p style="font-size: 25px;">Rp. {{number_format($user->harga, 0, '','.')}} / Jam</p>
                </div>
            </div>
            <div class="row">
                <div class="col-auto">
                    <i class='bx bxs-graduation' style="font-size: 40px;"></i> 
                </div>
                <div class="col d-flex align-items-center">
                    <p style="font-size: 25px;">Alumni {{  $user->instansi }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-auto">
                    <i class='bx bxs-briefcase' style="font-size: 40px;"></i> 
                </div>
                <div class="col d-flex align-items-center">
                    <p style="font-size: 25px;">{{ $user->keahlian->nama }}</p>
            </div>
            <div class="row">
                <div class="col-auto">
                    <i class='bx bxs-user' style="font-size: 40px;"></i> 
                </div>
                <div class="col d-flex align-items-center">
                    <p style="font-size: 25px;">{{ $user->role == 1 ? "Dosen" : "Mahasiswa" }}</p>
            </div>
            @if(Auth::user()->id != $user->id)
            <div class="row mt-5" style="padding: 0em; margin:0em;">
                <a type="button" class="btn btn-primary" style="font-size:40px; border-radius:20px;" href="/user/order/{{ $user->id }}">Konsultasi</a>
            </div>
            @endif
        </div>
        
        <div class="alert alert-secondary m-1 mt-5 mb-5 ps-5 pe-5" role="alert">
            <p style="font-weight:700; font-size: 40px;">Deskripsi :</p>
            <p style="font-size: 25px;">{{ $user->deskripsi }}</p>
        </div>
    </div>
    
@endsection