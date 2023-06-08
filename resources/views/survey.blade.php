<?php
    $categories = [
        (object)['image' => 'bx bx-bar-chart-alt', 'title' => 'SOSPEN', 'link' => '#'],
        (object)['image' => 'bx bx-bar-chart-alt', 'title' => 'KOMPUTASI', 'link' => '#'],
        (object)['image' => 'bx bx-line-chart', 'title' => 'ANDEF', 'link' => '#'],
        (object)['image' => 'bx bx-bar-chart-alt', 'title' => 'LINGKES', 'link' => '#'],
        (object)['image' => 'bx bx-bar-chart-alt', 'title' => 'SBI', 'link' => '#'],
        (object)['image' => 'bx bx-bar-chart-alt', 'title' => 'DATA ANALISIS', 'link' => '#'],
        (object)['image' => 'bx bx-bar-chart-alt', 'title' => 'ANALISIS TA', 'link' => '#'],
    ];
?>
@extends('layouts.main')

@section('title')
Statin | Konsultasi Statistika
@endsection


@section('content')
    <?php $harga = 0; ?>
    <div class="m-5">
        
        <div class="col d-flex justify-content-center mb-5">
            @if($mode == 1)
            <?php $harga = 1500; ?>
            <h1 style="font-weight:700; font-size:70px; color:blue;">1 - 100 Responden</h1>
            @elseif($mode == 2)
            <?php $harga = 1000; ?>
            <h1 style="font-weight:700; font-size:70px; color:blue;">101 - 500 Responden</h1>
            @elseif($mode == 3)
            <?php $harga = 750; ?>
            <h1 style="font-weight:700; font-size:70px; color:blue;">501 - 1000 Responden</h1>
            @elseif($mode == 4)
            <?php $harga = 500; ?>
            <h1 style="font-weight:700; font-size:70px; color:blue;">1000+ Responden</h1>
            @endif
        </div>
        <form action="/survey/create" method="POST">@csrf
            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
            
            <div class="mb-3">
                <label class="form-label" style="font-size: 40px;">Tema</label>
                <input type="text" class="form-control" style="font-size: 40px;" name="tema" required>
            </div>
            <div class="mb-3">
                <label class="form-label" style="font-size: 40px;">Target</label>
                <input type="text" class="form-control" style="font-size: 40px;" name="target" required>
            </div>
            <div class="mb-3">
                <label class="form-label" style="font-size: 40px;">Target Umur</label>
                <div class="input-group mb-3">
                    <input type="number" class="form-control" style="font-size: 40px;" name="target_umur" required> 
                    <span class="input-group-text" style="font-size: 40px;" id="basic-addon2">Tahun</span>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" style="font-size: 40px;">Harga</label>
                <div class="input-group mb-3">
                    <input type="number" class="form-control" style="font-size: 40px;" name="harga" value="{{ $harga }}" disabled>
                    <span class="input-group-text" style="font-size: 40px;" id="basic-addon2">/ responden</span>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" style="font-size: 40px;">Email</label>
                <input type="text" class="form-control" style="font-size: 40px;" value="{{ Auth::user()->email }}" disabled>
            </div>
            <div class="mb-5">
                <label class="form-label" style="font-size: 40px;">Pertanyaan yang akan diajukan :</label>
                <textarea type="text" class="form-control" style="font-size: 40px;" name="pertanyaan" rows="3" required></textarea>
            </div>

            <div class="row">
                <div class="col mb-3 d-flex justify-content-end">
                    <input type="hidden" name="harga" value="{{ $harga }}">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <a class="btn btn-secondary me-4" style="font-size: 30px;" href="/">Cancel</a>
                    <button type="submit" class="btn btn-success" style="font-size: 30px;">Simpan</button>
                </div>
            </div>
        </form>

    </div>
    
@endsection