@extends('layouts.main')


@section('title')
Statin | Konsultasi Statistika
@endsection


@section('content')
    <button type="button" class="btn btn-outline-secondary pe-4 mb-4 ms-3" style="font-size:30px; border-radius:20px;" onclick="history.back()">< Back</button>
    <div class="">
        <div style="row">
            <div class="col d-flex justify-content-center" style="background-color:#7d7d7d;">
                @if($user->foto)
                <img src="{{ $user->foto }}" alt="" style="width: 40%">
                @else
                <img src="/img/no_image.png" style="width:160px; border-radius:20px;">
                @endif
            </div>
        </div>
        <div class="ms-5 me-5 mt-5">

            <h1 style="font-weight:700;font-size: 60px;"> {{ $user->name }}</h1>
            <div class="row mt-5">
                <div class="col-auto">
                    <i class='bx bxs-graduation' style="font-size: 40px;"></i> 
                </div>
                <div class="col d-flex align-items-center">
                    <p style="font-size: 25px;">Alumni {{  $user->instansi }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-auto">
                    <i class='bx bxs-briefcase' style="font-size: 40px;"></i> 
                </div>
                <div class="col d-flex align-items-center">
                    <p style="font-size: 25px;">{{ $user->keahlian->nama }}</p>
            </div>
            <div class="row">
                <div class="col-auto">
                    <i class='bx bx-dollar-circle' style="font-size: 40px;"></i> 
                </div>
                <div class="col d-flex align-items-center">
                    <p style="font-size: 25px;">Rp. {{number_format($user->harga, 0, '','.')}} / Jam</p>
                </div>
            </div>

            <form action="/user/order" enctype="multipart/form-data" method="POST"> @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <div class="row">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-5">
                                <label for="formFile" class="form-label" style="font-size: 30px;">Lama Konsultasi :</label>
                                <div class="input-group">
                                    <input type="number" style="font-size: 30px;" class="form-control" min="0" value="1" id="jam" name="jam" required>
                                    <span class="input-group-text" id="basic-addon2" style="font-size: 30px;" >Jam</span>
                                </div>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-5">
                                <label for="formFile" class="form-label" style="font-size: 30px;">Estimasi Harga :</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2" style="font-size: 30px;" >Rp. </span>
                                    <input type="text" style="font-size: 30px;" class="form-control" id="estimasi" name="estimasi" min="0" value="{{number_format($user->harga, 0, '','.')}}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3">
                        <label for="formFile" class="form-label" style="font-size: 30px;">File Lampiran :</label>
                        <input class="form-control" type="file" id="formFile" style="font-size: 30px;" name="lampiran">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3">
                        <label for="formFile" class="form-label" style="font-size: 30px;">Deskripsi :</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi" style="font-size: 30px;" required></textarea>
                    </div>
                </div>
                <div class="row mt-5" style="padding: 0em; margin:0em;">
                    <button type="submit" class="btn btn-primary" style="font-size:40px; border-radius:20px;">Kirim</button>
                </div>
            </form>
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
                $('#estimasi').val(formatRupiah(jam*{{ $user->harga}}));
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