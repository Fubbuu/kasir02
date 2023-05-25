<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisBarang;


class JenisBarangController extends Controller

{
    public function index()

    {
     $data = array(
         'title' => 'Data jenis barang',
         'data_jenis' => jenisbarang::all(),
     );
     return view('admin.master.jenisbarang.list',$data);
    }
    public function store(Request $request){

            jenisbarang::create([
            'nama_jenis' => $request->nama_jenis,
            
        ]);
        return redirect('/jenisbarang')->with('succes','Data Berhasil Disimpan');
    }
    public function update(Request $request, $id){

        jenisbarang::where('id', $id)
        ->where('id', $id)
        ->update([
            'nama_jenis' => $request->nama_jenis,
           
        ]);
        return redirect('/jenisbarang')->with('succes','Data Berhasil Diubah');
    }
    public function destroy($id)
    {
        jenisbarang::where('id', $id)->delete();
        return redirect('/jenisbarang')->with('succes','Data Berhasil Dihapus');
    }
}
