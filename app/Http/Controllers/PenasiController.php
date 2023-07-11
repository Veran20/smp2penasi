<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Penasi;

class PenasiController extends Controller
{
    public function buatPenasi(){

        $penasi = Penasi::All();

        return view ('buatPenasi', compact('penasi'));
    }

    public function tambahPenasi(Request $req)
    {
        $penasi = new Penasi;

        $penasi->jenis = $req->get('pilih');
        $penasi->deskripsi = $req->get('deskripsi');
        $penasi->berkasPendukung = $req->get('berkasPendukung');

        if ($req->hasFile('berkasPendukung')) {
            $extension = $req->file('berkasPendukung')->extension();
            $filename = 'berkasPendukung'.time().'.'.$extension;
            $req->file('berkasPendukung')->storeAs(
                'public/berkasPendukung', $filename
            );
            $penasi->berkasPendukung = $filename ;
        }

        $penasi->save();

        $notification = array(
            'message' =>'Pengaduan/Aspirasi berhasil dikirim', 
            'alert-type' =>'success'
        );

        return redirect()->route('penasi')->with($notification);
    }
}
