<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Models\Edit;


class EditController extends Controller
{
    public function index()

    {
     $data = array(
         'title' => ' Edit data user',
         'data_edit' => Edit::all(),
     );
     return view('admin.master.user.edit',$data);
    }
    
    public function update(Request $request, $id){

        Edit::where('id', $id)
        ->where('id', $id)
        ->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);
        return redirect('/user/edit')->with('succes','Data Berhasil Diubah');
    }
}
