@extends('layouts.main')
@section('title')
Statin | Konsultasi Statistika
@endsection


@section('content')    
    <button type="button" class="btn btn-outline-secondary pe-4 mb-4 ms-3" style="font-size:30px; border-radius:20px;" onclick="history.back()">< Back</button>
    <div class="ms-5 me-5">           
        <div class="col d-flex justify-content-center">
            <h1 style="font-weight:700; color:blue;">{{ $keahlian->nama }}</h1>
        </div>
        @foreach($users as $user)
            {{-- @dd($category) --}}
            <a class="link-card" href="/user/detail/{{$user->id}}">
                <div class="card mt-5">
                    <div class="row p-3">
                        <div class="col-auto">
                            @if($user->foto)
                            <img src="{{ $user->foto }}" alt="foto" style="width:160px; border-radius:20px;">
                            @else
                            <img src="/img/no_image.png" style="width:160px; border-radius:20px;">
                            @endif
                        </div>
                        <div class="col">
                            <p style="font-weight:700; font-size:30px; margin:0em; padding:0em;">{{ $user->name }}</p>
                            <p style="font-size:25px; margin:0em; padding:0em;">Keahlian {{ $keahlian->nama }}</p>
                            <p style="font-size:25px; margin:0em; padding:0em;">Alumni {{ $user->instansi }}</p>
                            <p style="font-weight:700; font-size:30px; margin:0em; padding:0em;">Rp. {{number_format($user->harga, 0, '','.')}}</p>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach

    </div>
    
@endsection