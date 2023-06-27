<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\kelolaPengguna;

class KelolaPenggunaController extends Controller
{
    public function kelolaPengguna(){

        $users = User::All();

        return view ('dataPengguna', compact('users'));
    }

    public function tambahPengguna(Request $req)
    {
        $validate = $req->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'nomor_induk' => 'required',
            // 'password' => 'required',
        ]);

        $user = new User;

        $user->name = $req->get('name');
        $user->email = $req->get('email');
        $user->nomor_induk = $req->get('nomor_induk');
        // $user->password =;
        $user->password = Hash::make($req->get('password'));

        $user->save();

        $notification = array(
            'message' =>'Pengguna berhasil ditambahkan', 
            'alert-type' =>'success'
        );

        return redirect()->route('tambahPengguna')->with($notification);
        // return redirect()->route('tambahPengguna');
    }
}
