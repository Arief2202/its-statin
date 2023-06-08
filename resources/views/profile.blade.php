@extends('layouts.main')


@section('title')
Statin | Konsultasi Statistika
@endsection


@section('content')
    <div class="">
        <div class="row mb-4">
            <div class="col d-flex justify-content-center">
                <a class="btn btn-secondary" style="font-size: 20px;" href="/profile/edit">Edit Profile</a>
            </div>
            <div class="col d-flex justify-content-center">
                <form action="/logout" method="POST">@csrf
                    <button type="submit" class="btn btn-danger" style="font-size: 20px;">Logout</button>
                </form>
            </div>
        </div>
        <div style="row">
            <div class="col d-flex justify-content-center" style="background-color:#7d7d7d;">
                @if(Auth::user()->foto)
                <img src="{{ Auth::user()->foto }}" alt="" style="width: 40%">
                @else
                <img src="/img/no_image.png" style="width:160px; border-radius:20px;">
                @endif
            </div>
        </div>
        <div class="ms-5 me-5 mt-5">

            <h1 style="font-weight:700;font-size: 60px;"> {{ Auth::user()->name }}</h1>
            <div class="row mt-3">
                <div class="col-auto">
                    <i class='bx bx-envelope' style="font-size: 40px;"></i> 
                </div>
                <div class="col d-flex align-items-center">
                    <p style="font-size: 25px;">{{ Auth::user()->email }}</p>
            </div>
            <div class="row">
                <div class="col-auto">
                    <i class='bx bxs-phone' style="font-size: 40px;"></i> 
                </div>
                <div class="col d-flex align-items-center">
                    <p style="font-size: 25px;">{{ Auth::user()->telp }}</p>
            </div>
            <div class="row">
                <div class="col-auto">
                    <i class='bx bxs-user' style="font-size: 40px;"></i> 
                </div>
                <div class="col d-flex align-items-center">
                    <p style="font-size: 25px;">{{ Auth::user()->role == 1 ? "Dosen" : (Auth::user()->role == 2 ? "Admin" : "Mahasiswa")}}</p>
            </div>
            <div class="row">
                <div class="col-auto">
                    <i class='bx bxs-graduation' style="font-size: 40px;"></i> 
                </div>
                <div class="col d-flex align-items-center">
                    <p style="font-size: 25px;">{{  Auth::user()->instansi }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-auto">
                    <i class='bx bx-list-ol' style="font-size: 40px;"></i> 
                </div>
                <div class="col d-flex align-items-center">
                    <p style="font-size: 25px;">@if(Auth::user()->kategori == 1) Konsultasi Statistika @elseif(Auth::user()->kategori == 2) Jasa Analisis Data @else - @endif</p>
            </div>
            <div class="row">
                <div class="col-auto">
                    <i class='bx bxs-briefcase' style="font-size: 40px;"></i> 
                </div>
                <div class="col d-flex align-items-center">
                    @if(Auth::user()->bidangKeahlian_id != 0)
                    <p style="font-size: 25px;">{{ Auth::user()->keahlian->nama }}</p>
                    @else                    
                    <p style="font-size: 25px;">-</p>
                    @endif
            </div>
            <div class="row">
                <div class="col-auto">
                    <i class='bx bx-dollar-circle' style="font-size: 40px;"></i> 
                </div>
                <div class="col d-flex align-items-center">
                    <p style="font-size: 25px;">Rp. {{number_format(Auth::user()->harga, 0, '','.')}} / Jam</p>
                </div>
            </div>

        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="alert alert-secondary ms-2 mt-5 mb-5 ps-5 pe-5" role="alert">
            <p style="font-weight:700; font-size: 40px;">Deskripsi :</p>
            <p style="font-size: 25px;">{{ Auth::user()->deskripsi }}</p>
        </div>
    </div>
    
@endsection

@section('script')
    <script type="text/javascript"> 
        @if (\Session::has('error'))
            alert("{!! \Session::get('error') !!}");
        @endif
        $(document).ready(function(){
            
            $("#jam").on("change keyup paste", function(){
                var jam = $("#jam").val();
                $('#estimasi').val(formatRupiah(jam*{{ Auth::user()->harga}}));
            });
        });
        function formatRupiah(num) {
            var p = num.toFixed(2).split(".");
            return p[0].split("").reverse().reduce(function(acc, num, i, orig) {
                return num + (num != "-" && i && !(i % 3) ? "." : "") + acc;
            }, "");
        };
    </script>
@endsection