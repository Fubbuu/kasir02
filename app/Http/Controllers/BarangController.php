<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\JenisBarang;

class BarangController extends Controller
{
    public function index()

    {
     $data = array(
         'title' => 'Data barang',
         'data_jenis' => jenisBarang ::all(),
         'data_barang' => Barang ::join('tbl_jenis_barang','tbl_jenis_barang.id','=','tbl_barang.id_jenis')
                        ->select('tbl_barang.*','tbl_jenis_barang.nama_jenis')
                        ->get(),
     );
     return view('admin.master.barang.list',$data);
    }
    public function store(Request $request){

            Barang::create([
            'id_jenis'   => $request->id_jenis,
            'name_barang'=> $request->name_barang,
            'harga'      => $request->harga,
            'stok'       => $request->stok,
            
        ]);
        return redirect('/barang')->with('succes','Data Berhasil Disimpan');
    }
    public function update(Request $request, $id){

        barang::where('id', $id)
        ->where('id', $id)
        ->update([

            'id_jenis'   => $request->id_jenis,
            'name_barang'=> $request->name_barang,
            'harga'      => $request->harga,
            'stok'       => $request->stok,
        ]);
        return redirect('/barang')->with('succes','Data Berhasil Diubah');
    }
    public function destroy($id)
    {
        barang::where('id', $id)->delete();
        return redirect('/barang')->with('succes','Data Berhasil Dihapus');
    }
}
