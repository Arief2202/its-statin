@extends('layouts.main')


@section('title')
Statin | Konsultasi Statistika
@endsection


@section('content')
    <button type="button" class="btn btn-outline-secondary pe-4 mb-4 ms-3" style="font-size:30px; border-radius:20px;" onclick="history.back()">< Back</button>
    <div class="">
        <div style="row">
            <div class="col d-flex justify-content-center" style="background-color:#7d7d7d;">
                <img src="{{ $order->seller->foto }}" alt="" style="width: 40%">
            </div>
        </div>
        <div class="ms-5 me-5 mt-5">

            <h1 style="font-weight:700;font-size: 60px;"> {{ $order->seller->name }}</h1>
            <div class="row mt-5">
                <div class="col-auto">
                    <i class='bx bxs-graduation' style="font-size: 40px;"></i> 
                </div>
                <div class="col d-flex align-items-center">
                    <p style="font-size: 25px;">Alumni {{  $order->seller->instansi }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-auto">
                    <i class='bx bxs-briefcase' style="font-size: 40px;"></i> 
                </div>
                <div class="col d-flex align-items-center">
                    <p style="font-size: 25px;">{{ $order->seller->keahlian->nama ?? "-" }}</p>
            </div>
            <div class="row">
                <div class="col-auto">
                    <i class='bx bx-dollar-circle' style="font-size: 40px;"></i> 
                </div>
                <div class="col d-flex align-items-center">
                    <p style="font-size: 25px;">Rp. {{number_format($order->seller->harga, 0, '','.')}} / Jam</p>
                </div>
            </div>

                <div class="row">
                    <div class="row mb-3">
                        <div class="col-auto">
                            <label for="formFile" class="form-label" style="font-size: 30px;">Status :</label>
                        </div>
                        <div class="col-auto d-flex justify-content-end mt-2">
                            @if($order->status == 0)
                                <p class="ps-4 pe-4" style="background-color:rgb(255, 192, 120); color:black; font-size:20px; border-radius:20px;">Menunggu Konfirmasi</p>
                            @elseif($order->status == 1)
                                <p class="ps-4 pe-4" style="background-color:rgb(255, 120, 120); color:black; font-size:20px; border-radius:20px;">Ditolak</p>
                            @elseif($order->status == 2)
                                <p class="ps-4 pe-4" style="background-color:rgb(242, 255, 120); color:black; font-size:20px; border-radius:20px;">Diterima</p>
                            @elseif($order->status == 3)
                                <p class="ps-4 pe-4" style="background-color:rgb(130, 255, 140); color:black; font-size:20px; border-radius:20px;">Selesai</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-5">
                                <label for="formFile" class="form-label" style="font-size: 30px;">Lama Konsultasi :</label>
                                <div class="input-group">
                                    <input type="number" style="font-size: 30px;" class="form-control" min="0" value="{{ $order->durasi }}" id="jam" name="jam" required disabled>
                                    <span class="input-group-text" id="basic-addon2" style="font-size: 30px;" >Jam</span>
                                </div>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-5">
                                <label for="formFile" class="form-label" style="font-size: 30px;">Harga Total :</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2" style="font-size: 30px;" >Rp. </span>
                                    <input type="text" style="font-size: 30px;" class="form-control" id="estimasi" name="estimasi" min="0" value="{{number_format($order->seller->harga*$order->durasi, 0, '','.')}}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3">
                        <label for="formFile" class="form-label" style="font-size: 30px;">File Lampiran :</label>
                        <div class="col-5">
                            <a href="/{{ $order->lampiran }}" download="" class="btn btn-secondary form-control" style="font-size: 30px;">Download</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3">
                        <label for="formFile" class="form-label" style="font-size: 30px;">Deskripsi :</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi" style="font-size: 30px;" required disabled>{{ $order->deskripsi }}</textarea>
                    </div>
                </div>

                @if($order->status == 0 && Auth::user()->id == $order->seller_id)
                <div class="row mt-5" style="padding: 0em; margin:0em;">
                    <div class="col">
                        <form action="/order/detail" method="POST">@csrf
                            <input type="hidden" name="id" value="{{ $order->id }}">
                            <input type="hidden" name="status" value="1">
                            <button type="submit" class="btn btn-danger" style="font-size:40px; border-radius:20px; width:100%;">Tolak</button>
                        </form>
                    </div>
                    <div class="col">
                        <form action="/order/detail" method="POST">@csrf
                            <input type="hidden" name="id" value="{{ $order->id }}">
                            <input type="hidden" name="status" value="2">
                            <button type="submit" class="btn btn-success" style="font-size:40px; border-radius:20px; width:100%;">Terima</button>
                        </form>
                    </div>
                </div>
                @endif

                @if($order->status == 2)
                <div class="row mt-5" style="padding: 0em; margin:0em;">
                    <a type="submit" class="btn btn-primary" style="font-size:40px; border-radius:20px;"
                    @if(Auth::user()->id == $order->seller->id)
                        href="https://wa.me/{{ $order->buyer->telp }}"
                    @else
                        href="https://wa.me/{{ $order->seller->telp }}"
                    @endif
                    >Chat Whatsapp</a>
                </div>
                <div class="row mt-5" style="padding: 0em; margin:0em;">
                    <form action="/order/detail" method="POST">@csrf
                        <input type="hidden" name="id" value="{{ $order->id }}">
                        <input type="hidden" name="status" value="3">
                        <button type="submit" class="btn btn-success" style="font-size:40px; border-radius:20px; width:100%;">Selesaikan</button>
                    </form>
                </div>
                @endif
        </div>
    </div>
    
@endsection
