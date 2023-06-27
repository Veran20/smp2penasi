@extends('adminlte::page')

@section('title', 'admin')

@section('content_header')
    <h1 class="ml-2 text-dark">KELOLA DATA PENGGUNA</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="card card-default">
        <div class="card-body">
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal">
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
                            <div class="text-center">
                            <button type="button" class="btn btn-warning btn-sm btn-rounded" id="btn-edit-user" data-toggle="modal" data-id="{{$user->id}}" data-target="#exampleModal">
                                Edit
                            </button>
                                
                               <button type="button" class="btn btn-danger btn-sm btn-rounded" onclick="deleteConfirmation('{{$user->id}}','{{$user->name}}')">
                                    Hapus
                               </button>
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
