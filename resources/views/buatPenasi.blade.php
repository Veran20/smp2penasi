@extends('adminlte::page')

@section('title', 'admin')

@section('content_header')
    <h1 class="ml-2 text-dark">BUAT PENGADUAN ATAU ASPIRASI</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="card card-default">
        <div class="card-body">
        <form class="forms-sample" method="POST" action="{{route('tambahPenasi')}}" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="jenis">Silahkan Pilih Jenis</label>
                <select class="custom-select" id="pilih" name="pilih">
                    <option value= "" hidden></option>
                    <option value="1">Pengaduan</option>
                    <option value="2">Aspirasi</option>
                </select>
            </div> 
            <div class="form-deskripsi">
                <label for="exampleFormControlTextarea1">Deskripsi</label>
                <input class="form-control" id="deskripsi" name="deskripsi" rows="3">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Berkas Pendukung</label>
                <input type="file" class="form-control rounded" id="berkasPendukung" name="berkasPendukung" placeholder="Berkas Pendukung">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection