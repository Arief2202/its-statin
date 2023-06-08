@extends('layouts.main')
@section('title')
Statin | History
@endsection


@section('content')    
    <div class="ms-5 me-5">           
        <div class="col d-flex justify-content-center">
            <h1 style="font-weight:700; color:blue;">History</h1>
        </div>
        @foreach($orders as $order)
            {{-- @dd($category) --}}
            <a class="link-card" href="/order/detail/{{$order->id}}">
                <div class="card mt-5">
                    <div class="row ps-3 pt-3 pb-3">
                        <div class="col-auto">
                            <img src="{{ $order->seller->foto }}" alt="foto" style="width:160px; border-radius:20px;">
                        </div>
                        <div class="col">
                            <p style="font-weight:700; font-size:30px; margin:0em; padding:0em;">{{ $order->seller->name }}</p>
                            <p style="font-size:20px; margin:0em; padding:0em;">Keahlian {{ $order->seller->keahlian->nama ?? '-' }}</p>
                            <p style="font-size:20px; margin:0em; padding:0em;">Alumni {{ $order->seller->instansi }}</p>
                            <div class="row mt-3">
                                <div class="col">
                                    <p style="font-weight:700; font-size:30px; margin:0em; padding:0em;">Rp. {{number_format($order->seller->harga*$order->durasi, 0, '','.')}}</p>
                                </div>
                                <div class="col mt-1 d-flex justify-content-end align-items-center p-0">
                                    @if($order->status == 0)
                                        <p class="ps-3 pe-3 pt-2 pb-2 m-0" style="background-color:rgb(255, 192, 120); color:black; font-size:20px; border-radius:20px;">Menunggu Konfirmasi</p>
                                    @elseif($order->status == 1)
                                        <p class="ps-3 pe-3 pt-2 pb-2 m-0" style="background-color:rgb(255, 120, 120); color:black; font-size:20px; border-radius:20px;">Ditolak</p>
                                    @elseif($order->status == 2)
                                        <p class="ps-3 pe-3 pt-2 pb-2 m-0" style="background-color:rgb(242, 255, 120); color:black; font-size:20px; border-radius:20px;">Diterima</p>
                                    @elseif($order->status == 3)
                                        <p class="ps-3 pe-3 pt-2 pb-2 m-0" style="background-color:rgb(130, 255, 140); color:black; font-size:20px; border-radius:20px;">Selesai</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
        @foreach($surveys as $survey)
            {{-- @dd($category) --}}
            <a class="link-card" href="/permintaan-responden/{{$survey->id}}">
                <div class="card mt-5">
                    <div class="row ps-3 pt-3 pb-3">
                        <div class="col-auto">
                            <img src="{{ $survey->buyer->foto }}" alt="foto" style="width:160px; border-radius:20px;">
                        </div>
                        <div class="col">
                            <p style="font-weight:700; font-size:30px; margin:0em; padding:0em;">{{ $survey->buyer->name }} (Responden)</p>
                            <p style="font-size:20px; margin:0em; padding:0em;">Keahlian {{ $survey->buyer->keahlian->nama ?? '-' }}</p>
                            <p style="font-size:20px; margin:0em; padding:0em;">Alumni {{ $survey->buyer->instansi }}</p>
                            <div class="row mt-3">
                                <div class="col">
                                    <p style="font-weight:700; font-size:30px; margin:0em; padding:0em;">Rp. {{number_format($survey->harga, 0, '','.')}}</p>
                                </div>
                                <div class="col mt-1 d-flex justify-content-end align-items-center p-0">
                                    @if($survey->status == 0)
                                        <p class="ps-3 pe-3 pt-2 pb-2 m-0" style="background-color:rgb(255, 192, 120); color:black; font-size:20px; border-radius:20px;">Menunggu Konfirmasi</p>
                                    @elseif($survey->status == 1)
                                        <p class="ps-3 pe-3 pt-2 pb-2 m-0" style="background-color:rgb(255, 120, 120); color:black; font-size:20px; border-radius:20px;">Ditolak</p>
                                    @elseif($survey->status == 2)
                                        <p class="ps-3 pe-3 pt-2 pb-2 m-0" style="background-color:rgb(242, 255, 120); color:black; font-size:20px; border-radius:20px;">Diterima</p>
                                    @elseif($survey->status == 3)
                                        <p class="ps-3 pe-3 pt-2 pb-2 m-0" style="background-color:rgb(130, 255, 140); color:black; font-size:20px; border-radius:20px;">Selesai</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach

    </div>
    
@endsection


{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
