@extends('layouts.main')
@section('title')
Statin | Konsultasi Statistika
@endsection


@section('content')
    <button type="button" class="btn btn-outline-secondary pe-4 ms-3" style="font-size:30px; border-radius:20px;" onclick="history.back()">< Back</button>
    <div class="ms-5 me-5">        
        <div class="col d-flex justify-content-center">
            <h1 style="font-weight:700; color:blue;">Kategori Analisis</h1>
        </div>
        @foreach($bidangKeahlians as $category)
            {{-- @dd($category) --}}
            <a class="link-card" href="/dashboard/analisis-data/{{$category->nama}}">
                <div class="card mt-5">
                    <div class="row p-3">
                        <div class="col">
                            <i class='{{ $category->image }}'  style="font-weight:700; font-size:80px;"></i>
                        </div>
                        <div class="col d-flex justify-content-end align-items-center" style="font-weight:700; font-size:42px;">
                            {{ $category->nama }}
                        </div>
                    </div>
                </div>
            </a>
        @endforeach

    </div>
    
@endsection