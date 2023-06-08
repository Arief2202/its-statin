@extends('layouts.main')


@section('title')
Statin | Konsultasi Statistika
@endsection


@section('content')
    <div class="">
        <div style="row">
            <div class="col d-flex justify-content-center" style="background-color:#7d7d7d;">
                <img src="{{ Auth::user()->foto }}" alt="" id="preview" style="width: 40%">
            </div>
        </div>
        <div class="ms-5 me-5 mt-5">
            <form action="/profile/edit" method="POST" enctype="multipart/form-data">@csrf
                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                <h1 style="font-weight:700;font-size: 60px;"> {{ Auth::user()->name }}</h1>
                <div class="mb-3">
                    <label class="form-label" style="font-size: 40px;">Foto</label>
                    <input type="file" class="form-control" style="font-size: 40px;" id="foto" name="foto"  onchange="updatePreview()">
                </div>
                <div class="mb-3">
                    <label class="form-label" style="font-size: 40px;">Nama</label>
                    <input type="text" class="form-control" style="font-size: 40px;" name="name" value="{{ Auth::user()->name }}">
                </div>
                <div class="mb-3">
                    <label class="form-label" style="font-size: 40px;">Email</label>
                    <input type="email" class="form-control" style="font-size: 40px;" name="email" value="{{ Auth::user()->email }}">
                </div>
                <div class="mb-3">
                    <label class="form-label" style="font-size: 40px;">No Telephone</label>
                    <input type="text" class="form-control" style="font-size: 40px;" name="telp" value="{{ Auth::user()->telp }}">
                </div>
                <div class="mb-3">
                    <label class="form-label" style="font-size: 40px;">Instansi</label>
                    <input type="text" class="form-control" style="font-size: 40px;" name="instansi" value="{{ Auth::user()->instansi }}">
                </div>
                @if(Auth::user()->kategori != 0)
                    <div class="mb-3">
                        <label class="form-label" style="font-size: 40px;">Kategori</label>
                        <select class="form-select" style="font-size: 40px;" aria-label="Default select example" name="kategori">
                            <option value="1" @if(Auth::user()->kategori == 1) selected @endif>Konsultasi Statistika</option>
                            <option value="2" @if(Auth::user()->kategori == 2) selected @endif>Jasa Analisis Data</option>
                        </select>
                    </div>
                @endif
                <div class="mb-3">
                    <label class="form-label" style="font-size: 40px;">Keahlian</label>
                    <select class="form-select" style="font-size: 40px;" aria-label="Default select example" name="bidangKeahlian_id">
                        @foreach($keahlians as $keahlian)
                        <option value="{{ $keahlian->id }}" @if(Auth::user()->bidangKeahlian != 0 && Auth::user()->keahlian->id == $keahlian->id) selected @endif>{{$keahlian->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" style="font-size: 40px;">Harga</label>
                    <input type="text" class="form-control" style="font-size: 40px;" name="harga" value="{{ Auth::user()->harga }}">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label" style="font-size: 30px;">Deskripsi :</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi" style="font-size: 30px;" required>{{ Auth::user()->deskripsi }}</textarea>
                </div>
                <div class="row">
                    <div class="col mb-4">
                        <div class="col d-flex justify-content-start">
                            <a class="btn btn-secondary" style="font-size: 30px;" href="/profile/edit-password">Ubah Password</a>
                        </div>
                    </div>
                    <div class="col mb-3 d-flex justify-content-end">
                        <button class="btn btn-secondary me-4" style="font-size: 30px;" onclick="history.back()">Cancel</button>
                        <button type="submit" class="btn btn-success" style="font-size: 30px;">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection

@section('script')
    <script type="text/javascript">
        function updatePreview(){
            const image = document.getElementById("foto");
            document.getElementById("preview").src = URL.createObjectURL(image.files[0]);
        }
    </script>
@endsection