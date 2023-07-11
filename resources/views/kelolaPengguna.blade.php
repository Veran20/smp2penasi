@extends('adminlte::page')

@section('title', 'admin')

@section('content_header')
    <h1 class="ml-2 text-dark">KELOLA DATA PENGGUNA</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="card card-default">
        <div class="card-body">
            <button type="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahModal">
                Tambah Pengguna
            </button>
            <table id="table-data" class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nomor Induk</th>
                        <th>Email</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->nomor_induk}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-warning btn-sm btn-rounded" id="btn-edit-user" data-toggle="modal" data-target="#editModal" data-id="{{$user->id}}">
                                    Edit
                                </button>
                                    
                                <button type="button" class="btn btn-danger btn-sm btn-rounded" onclick="deleteConfirmation('{{$user->id}}','{{$user->name}}')">
                                    Hapus
                                </button>
                            </div>
    
                               <!-- <a type="button" href="/admin/dataPengguna/delete/{{$user->id}}" class="btn btn-danger btn-rounded">
                                Hapus
                                </a> -->
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>    
    </div>
</div>    

<!--- Tambah Modal--->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form class="" method="POST" action="{{route('tambahPengguna')}}" enctype="multipart/form-data">
            @csrf
            <input type="text" class="form-control rounded" id="edit-id" name="id" hidden>
            <div class="form-group">
                <label for="exampleInputUsername1">Nama</label>
                <input type="text" class="form-control rounded" name="name" placeholder="Nama">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Nomor Induk</label>
                <input type="text" class="form-control rounded"  name="nomor_induk" placeholder="Nomor Induk">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Email</label>
                <input type="text" class="form-control rounded" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Password</label>
                <input type="text" class="form-control rounded" name="password" placeholder="Password">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
        </div>
    </div>
  </div>
</div>

<!-- EditModal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ubah Pengguna</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form class="" method="POST" action="{{route('ubahPengguna')}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <input type="text" class="form-control rounded" id="edit-id" name="id" >
            <div class="form-group">
                <label for="exampleInputUsername1">Nama</label>
                <input type="text" class="form-control rounded" id="edit-name" name="name" placeholder="Nama">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Nomor Induk</label>
                <input type="text" class="form-control rounded" id="edit-nomor_induk" name="nomor_induk" placeholder="Nomor Induk">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Email</label>
                <input type="text" class="form-control rounded" id="edit-email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Password</label>
                <input type="text" class="form-control rounded" id="edit-password" name="password" placeholder="Password">
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button> -->
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
        </div>
    </div>
  </div>
</div>
@endsection

@push('myscript')
    <script>

    $(function(){
        $(document).on('click', '#btn-edit-user',function(){
            $('#editModal').modal('show');
            let id = $(this).data('id');
            alert(id);
            console.log("Hello world!" + id);
            // $.ajax({
            //     type: "get",
            //     url: "{{ url('/admin/ajaxadmin/dataPengguna')}}/"+id,
            //     dataType: 'json',
            //     success: function(res){
            //         $('#edit-id').val(res.id);
            //         $('#edit-name').val(res.name);
            //         $('#edit-nomor_induk').val(res.nomor_induk);
            //         $('#edit-email').val(res.email);
            //     },
            // });
        });
    });

    function deleteConfirmation(id, name){
        swal.fire({
            title: "Hapus ?",
            icon: "warning",
            text: "Apakah anda yakin akan menghapus data pengguna dengan nama " + name + " dan id " + id + " ? ",
            showCancelButton: !0,
            confirmButtonText: "Ya, hapus",
            cancelButtonText: "Tidak",
            reverseButtons: !0 
        }).then(function (e){
            if(e.value === true){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: "{{ url('/admin/dataPengguna/delete')}}/" + id,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results){
                        if(results.success === true){
                            swal.fire("Done", results.message, "success");

                            setTimeout(function(){
                                location.reload();
                            },1000);
                        }else{
                            swal.fire("error", results.message, "error");
                        }
                    }
                });
            }else{
                e.dismiss;
            }
        }, function (dismiss){
            return false;
        });
    }
    </script>
@endpush