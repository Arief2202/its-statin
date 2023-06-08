@extends('layouts.main')

@section('title')
Statin | Dashboard
@endsection

@section('content')
    <div class="ms-3">
        <div class="category">
            <div class="row">
                <div class="col" style="font-weight:700; font-size:25px;">
                    Konsultasi Statistika
                </div>
                <div class="col d-flex justify-content-end">
                    <a href="/dashboard/konsultasi-statistika">Selengkapnya</a>
                </div>
            </div>
            <div class="row">
                @foreach($statistikas as $statistika)
                <div class="col p-4">
                    <a href="/user/detail/{{ $statistika->id }}" class="link-card">
                        <div class="card">
                            <div class="p-2">
                                <div class="d-flex justify-content-center">
                                    @if($statistika->foto)
                                    <img src="{{ $statistika->foto }}" style="width:80%; border-radius:20px;">
                                    @else
                                    <img src="/img/no_image.png" style="height:180px; border-radius:20px;">
                                    @endif
                                </div>
                                <div class="d-flex justify-content-center">
                                    <p class="m-0 p-0" style="font-weight:700; font-size:12px;">{{ $statistika->name }}</p>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <p class="m-0 p-0" style="font-size:10px;">{{ $statistika->role == 1 ? "Dosen"  : "Mahasiswa"}}</p>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <p class="m-0 p-0" style="font-weight:700; font-size:10px;">{{ $statistika->institusi }}</p>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <p class="m-0 p-0" style="font-weight:700; font-size:15px;">Rp. {{number_format($statistika->harga, 0, '','.')}}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach               
            </div>
        </div>
        
        <div class="category">
            <div class="row">
                <div class="col" style="font-weight:700; font-size:25px;">
                    Jasa Analisis Data
                </div>
                <div class="col d-flex justify-content-end">
                    <a href="/dashboard/analisis-data">Selengkapnya</a>
                </div>
            </div>
            <div class="row">
                @foreach($analisisDatas as $analisisData)
                <div class="col p-4">
                    <a href="/user/detail/{{ $analisisData->id }}" class="link-card">
                        <div class="card">
                            <div class="p-2">
                                <div class="d-flex justify-content-center">
                                    @if($analisisData->foto)
                                    <img src="{{ $analisisData->foto }}" style="width:80%; border-radius:20px;">
                                    @else
                                    <img src="/img/no_image.png" style="height:180px; border-radius:20px;">
                                    @endif
                                </div>
                                <div class="d-flex justify-content-center">
                                    <p class="m-0 p-0" style="font-weight:700; font-size:12px;">{{ $analisisData->name }}</p>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <p class="m-0 p-0" style="font-size:10px;">{{ $analisisData->keahlian->nama }}</p>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <p class="m-0 p-0" style="font-weight:700; font-size:10px;">{{ $analisisData->institusi }}</p>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <p class="m-0 p-0" style="font-weight:700; font-size:15px;">Rp. {{number_format($analisisData->harga, 0, '','.')}}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach                   
            </div>
        </div>
        
        <div class="category">
            <div class="row">
                <div class="col" style="font-weight:700; font-size:25px;">
                    Jasa Survey
                </div>
                <div class="col d-flex justify-content-end">
                    <a href="/dashboard/survey">Selengkapnya</a>
                </div>
            </div>
            <div class="me-4 ms-3">
                <a class="link-card" href="/survey/1">
                    <div class="card mt-3 mb-5">
                        <div class="row p-3">
                            <div class="col-auto">
                                <i class='bx bx-list-check' style="font-weight:700; font-size:80px;"></i>
                            </div>
                            <div class="col d-flex justify-content-end align-items-center" style="font-weight:700; font-size:42px;">
                                1 - 100 Responden
                            </div>
                        </div>
                    </div>
                </a>
                <a class="link-card" href="/survey/2">
                    <div class="card mb-5">
                        <div class="row p-3">
                            <div class="col-auto">
                                <i class='bx bx-list-check'  style="font-weight:700; font-size:80px;"></i>
                            </div>
                            <div class="col d-flex justify-content-end align-items-center" style="font-weight:700; font-size:42px;">
                                101 - 500 Responden
                            </div>
                        </div>
                    </div>
                </a>
                <a class="link-card" href="/survey/3">
                    <div class="card mb-5">
                        <div class="row p-3">
                            <div class="col-auto">
                                <i class='bx bx-list-check'  style="font-weight:700; font-size:80px;"></i>
                            </div>
                            <div class="col d-flex justify-content-end align-items-center" style="font-weight:700; font-size:42px;">
                                501 - 1000 Responden
                            </div>
                        </div>
                    </div>
                </a>
                <a class="link-card" href="/survey/4">
                    <div class="card mt-3">
                        <div class="row p-3">
                            <div class="col-auto">
                                <i class='bx bx-list-check'  style="font-weight:700; font-size:80px;"></i>
                            </div>
                            <div class="col d-flex justify-content-end align-items-center" style="font-weight:700; font-size:42px;">
                                1000+ Responden
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            {{-- <div class="row">
                @for($i=0; $i<3; $i++)
                <div class="col p-4">
                    <a href="#" class="link-card">
                        <div class="card">
                            <div class="p-2">
                                <div class="d-flex justify-content-center">
                                    <img src="/img/light.png" style="width:80%">
                                </div>
                                <div class="d-flex justify-content-center">
                                    <p class="m-0 p-0" style="font-weight:700; font-size:12px;">Mohammad Arief Darmawan</p>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <p class="m-0 p-0" style="font-size:10px;">Fullstack Developer</p>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <p class="m-0 p-0" style="font-weight:700; font-size:10px;">Alumni ITS</p>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <p class="m-0 p-0" style="font-weight:700; font-size:15px;">Rp. 2000000</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endfor                
            </div> --}}
        </div>

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
