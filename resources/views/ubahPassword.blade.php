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
            <form action="/profile/edit-password" method="POST">@csrf
                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                <div class="mb-3">
                    <label class="form-label" style="font-size: 40px;">Password Lama</label>
                    <input type="password" class="form-control" style="font-size: 40px;" name="old_password">
                </div>
                <div class="mb-3">
                    <label class="form-label" style="font-size: 40px;">Password Baru</label>
                    <input type="password" class="form-control" style="font-size: 40px;" name="new_password">
                </div>
                <div class="mb-3">
                    <label class="form-label" style="font-size: 40px;">Konfirmasi Password Baru</label>
                    <input type="password" class="form-control" style="font-size: 40px;" name="cnew_password">
                </div>
                <div class="mb-3 d-flex justify-content-end">
                    <a class="btn btn-secondary me-4" style="font-size: 30px;" href="/profile/edit">Cancel</a>
                    <button type="submit" class="btn btn-success" style="font-size: 30px;">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    
@endsection
