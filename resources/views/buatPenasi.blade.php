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
                <label for="kategori">Silahkan Pilih Kategori</label>
                <select class="custom-select" id="kategori" name="kategori">
                    <option value="">--Kategori--</option>
                    <option value="Pengaduan">Pengaduan</option>
                    <option value="Aspirasi">Aspirasi</option>
                </select>
            </div> 
            <div class="form-deskripsi">
                <label for="exampleFormControlTextarea1">Deskripsi</label>
                <input class="form-control" id="deskripsi" name="deskripsi" rows="3">
            </div>
            <div>
                <label for="jenis">Silahkan Pilih Jenis</label>
                <select class="custom-select" id="jenis" name="jenis">
                <option value="">--Jenis--</option>
                    <option value="Pengaduan">Kegiatan Belajar Mengajar (KBM)</option>
                    <option value="Aspirasi">Psikologi</option>
                    <option value="Aspirasi">Kekerasan</option>
                    <option value="Aspirasi">Sarana dan Prasana</option>
                    <!-- <option value= "" hidden></option>
                    <option value="1">Pengaduan</option>
                    <option value="2">Aspirasi</option> -->
                </select>
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

@push('myscript')
    <script>
        $(function(){
            // $('#kategori').change(function () {
            $(document).on('change', '#kategori', function() { 
                // var id = $(this).find(':selected');
                var kategori = $(this).find("option:selected").val();
                alert("1"); 
                // $.ajax({
                //     type: 'POST',
                //     url: '../includSe/continent.php',
                //     data: {
                //         'id': id
                //     },
                //     success: function (data) {
                //         // the next thing you want to do 
                //         var $country = $('#country');
                //         $country.empty();
                //         $('#city').empty();
                //         for (var i = 0; i < data.length; i++) {
                //             $country.append('<option id=' + data[i].sysid + ' value=' + data[i].name + '>' + data[i].name + '</option>');
                //         }

                //         //manually trigger a change event for the contry so that the change handler will get triggered
                //         $country.change();
                //     }
            // });

            });
        }); 
    </script>
@endpush