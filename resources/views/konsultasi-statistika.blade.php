<?php
?>
@extends('layouts.main')

@section('title')
Statin | Konsultasi Statistika
@endsection


@section('content')
    <button type="button" class="btn btn-outline-secondary pe-4 mb-4 ms-3" style="font-size:30px; border-radius:20px;" onclick="history.back()">< Back</button>
    <div class="ms-5 me-5 mb-5">
        
        <div class="col d-flex justify-content-center">
            <h1 style="font-weight:700; color:blue;">Kategori Konsultasi</h1>
        </div>

        <a class="link-card" href="/dashboard/konsultasi-statistika/mahasiswa">
            <div class="card mt-5">
                <div class="row p-3">
                    <div class="col">
                        <i class='bx bxs-user'  style="font-weight:700; font-size:80px;"></i>
                    </div>
                    <div class="col d-flex justify-content-end align-items-center" style="font-weight:700; font-size:42px;">
                        MAHASISWA
                    </div>
                </div>
            </div>
        </a>

        <a class="link-card" href="/dashboard/konsultasi-statistika/dosen">
            <div class="card mt-5">
                <div class="row p-3">
                    <div class="col">
                        <i class='bx bxs-graduation'  style="font-weight:700; font-size:80px;"></i>
                    </div>
                    <div class="col d-flex justify-content-end align-items-center" style="font-weight:700; font-size:42px;">
                        DOSEN
                    </div>
                </div>
            </div>
        </a>

    </div>
    
@endsection