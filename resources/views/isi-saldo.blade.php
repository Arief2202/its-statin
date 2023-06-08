@extends('layouts.main')


@section('title')
Statin | Konsultasi Statistika
@endsection


@section('content')
    <div class="">
        <div class="ms-5 me-5 mt-5">
            @if (\Session::has('error'))
                <div class="alert alert-danger" role="alert" style="font-size: 30px;">
                    {{ \Session::get('error') }}
                </div>
            @endif
            <form action="/isi-saldo" method="POST">@csrf
                <div class="mb-3">
                    <label class="form-label" style="font-size: 40px;">Email Penerima</label>
                    <input type="email" class="form-control" style="font-size: 40px;" name="email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" style="font-size: 40px;">Tambahkan Saldo</label>
                    <input type="number" class="form-control" style="font-size: 40px;" name="saldo">
                </div>
                <div class="mb-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success" style="font-size: 30px;">Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
    
@endsection
