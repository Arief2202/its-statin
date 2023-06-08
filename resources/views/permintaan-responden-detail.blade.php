@extends('layouts.main')


@section('title')
Statin | Konsultasi Statistika
@endsection


@section('content')
    <a type="button" class="btn btn-outline-secondary pe-4 mb-4 ms-3" style="font-size:30px; border-radius:20px;" href="@if(Auth::user()->role == 2) /permintaan-responden @else /history @endif">< Back</a>
    <div class="">
        <div style="row">
            <div class="col d-flex justify-content-center" style="background-color:#7d7d7d;">
                <img src="{{ $survey->buyer->foto }}" alt="" style="width: 40%">
            </div>
        </div>
        <div class="ms-5 me-5 mt-5">

            <h1 style="font-weight:700;font-size: 60px;"> {{ $survey->buyer->name }}</h1>
            <div class="row mt-5">
                <div class="col-auto">
                    <i class='bx bxs-graduation' style="font-size: 40px;"></i> 
                </div>
                <div class="col d-flex align-items-center">
                    <p style="font-size: 25px;">Alumni {{  $survey->buyer->instansi }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-auto">
                    <i class='bx bxs-briefcase' style="font-size: 40px;"></i> 
                </div>
                <div class="col d-flex align-items-center">
                    <p style="font-size: 25px;">{{ $survey->buyer->keahlian->nama ?? '-' }}</p>
            </div>
            <div class="row">
                <div class="col-auto">
                    <i class='bx bx-dollar-circle' style="font-size: 40px;"></i> 
                </div>
                <div class="col d-flex align-items-center">
                    <p style="font-size: 25px;">Rp. {{number_format($survey->harga, 0, '','.')}} / Responden</p>
                </div>
            </div>

                <div class="row">
                    <div class="row mb-3">
                        <div class="col-auto">
                            <label for="formFile" class="form-label" style="font-size: 30px;">Status :</label>
                        </div>
                        <div class="col-auto d-flex justify-content-end mt-2">
                            @if($survey->status == 0)
                                <p class="ps-4 pe-4" style="background-color:rgb(255, 192, 120); color:black; font-size:20px; border-radius:20px;">Menunggu Konfirmasi</p>
                            @elseif($survey->status == 1)
                                <p class="ps-4 pe-4" style="background-color:rgb(255, 120, 120); color:black; font-size:20px; border-radius:20px;">Ditolak</p>
                            @elseif($survey->status == 2)
                                <p class="ps-4 pe-4" style="background-color:rgb(242, 255, 120); color:black; font-size:20px; border-radius:20px;">Diterima</p>
                            @elseif($survey->status == 3)
                                <p class="ps-4 pe-4" style="background-color:rgb(130, 255, 140); color:black; font-size:20px; border-radius:20px;">Selesai</p>
                            @endif
                        </div>
                    </div>
                </div>

                @if($survey->status == 0 && Auth::user()->role == 2)
                <div class="row mt-5" style="padding: 0em; margin:0em;">
                    <div class="col">
                        <form action="/permintaan-responden" method="POST">@csrf
                            <input type="hidden" name="id" value="{{ $survey->id }}">
                            <input type="hidden" name="status" value="1">
                            <button type="submit" class="btn btn-danger" style="font-size:40px; border-radius:20px; width:100%;">Tolak</button>
                        </form>
                    </div>
                    <div class="col">
                        <form action="/permintaan-responden" method="POST">@csrf
                            <input type="hidden" name="id" value="{{ $survey->id }}">
                            <input type="hidden" name="status" value="2">
                            <button type="submit" class="btn btn-success" style="font-size:40px; border-radius:20px; width:100%;">Terima</button>
                        </form>
                    </div>
                </div>
                @endif

                @if($survey->status == 2 && Auth::user()->role == 2)
                <div class="row mt-5" style="padding: 0em; margin:0em;">
                    <a type="submit" class="btn btn-primary" style="font-size:40px; border-radius:20px;" href="https://wa.me/{{ $survey->buyer->telp }}">Chat Whatsapp</a>
                </div>
                <div class="row mt-5" style="padding: 0em; margin:0em;">
                    <form action="/permintaan-responden" method="POST">@csrf
                        <input type="hidden" name="id" value="{{ $survey->id }}">
                        <input type="hidden" name="status" value="3">
                        <div class="mb-3">
                            <label class="form-label" style="font-size: 40px;">Jumlah Responden</label>
                            <input type="number" class="form-control" style="font-size: 40px;" name="jumlahResponden" required>
                        </div>
                        <button type="submit" class="btn btn-success" style="font-size:40px; border-radius:20px; width:100%;">Selesaikan</button>
                    </form>
                </div>
                @endif
        </div>
    </div>
    
@endsection
