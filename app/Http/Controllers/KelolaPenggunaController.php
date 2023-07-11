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

        return view ('kelolaPengguna', compact('users'));
    }

    public function tambahPengguna(Request $req)
    {
        $validate = $req->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'nomor_induk' => 'required',
            'password' => 'required',
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

        if($user){
            return redirect()->route('dataPengguna')->with($notification);
        }else{
            return redirect()->route('/register');
        }
        
        // return redirect()->route('tambahPengguna');
    }
    
    public function ubahPengguna(Request $req)
    {
        $user = User::find($req->get('id'));

        $validate = $req->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'nomor_induk' => 'required',
            // 'password' => 'required',
        ]);

        $user->name = $req->get('name');
        $user->email = $req->get('email');
        $user->nomor_induk = $req->get('nomor_induk');
        // $user->password = $req->get('password');

        $user->save();

        $notification = array(
            'message' =>'Data Pengguna berhasil diubah', 'alert-type' =>'success'
        );

        return redirect()->route('dataPengguna')->with($notification);
    }

    public function getPengguna($id){
        $user = User::find($id);
        dd($user);
        return response()->json($user);
    }
}


