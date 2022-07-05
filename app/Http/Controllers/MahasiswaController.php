<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    //
    public function index()
    {
    $data['mahasiswas'] = Mahasiswa::orderBy('id','desc')->paginate(5);
    return view('index', $data);
    }
    /**
    * Perlihatkan formulir untuk membuat resource baru.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
    return view('create');
    }
    /**
    * Simpan resource yang baru dibuat di penyimpanan.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
    $request->validate([
    'nama' => 'required',
    'jurusan' => 'required',
    'phone' => 'required'
    ]);
    $mahasiswa = new Mahasiswa;
    $mahasiswa->nama = $request->nama;
    $mahasiswa->jurusan = $request->jurusan;
    $mahasiswa->phone = $request->phone;
    $mahasiswa->save();
    return redirect()->route('index')
    ->with('sukses','Mahasiswa has been created successfully.');
    }
    /**
    * Menampilkan resource yang ditentukan.
    *
    * @param  \App\mahasiswa  $company
    * @return \Illuminate\Http\Response
    */
    public function show(Mahasiswa $mahasiswa)
    {
    return view('show',compact('mahasiswa'));
    } 
    /**
    * Tampilkan formulir untuk mengedit resource yang ditentukan.
    *
    * @param  \App\Mahasiswa  $company
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $mahasiswa=Mahasiswa::find($id);
        $d=['mahasiswa'=>$mahasiswa];
        return view('edit')->with($d);
    }
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\mahasiswa  $company
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
    $request->validate([
    'nama' => 'required',
    'jurusan' => 'required',
    'phone' => 'required',
    ]);
    $mahasiswa = Mahasiswa::find($id);
    $mahasiswa->nama = $request->nama;
    $mahasiswa->jurusan = $request->jurusan;
    $mahasiswa->phone = $request->phone;
    $mahasiswa->save();
    return redirect()->route('index')
    ->with('sukses','Mahasiswa Has Been updated successfully');
    }
    /**
    * Hapus resource yang ditentukan dari penyimpanan.
    *
    * @param  \App\Mahasiswa  $company
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $mahasiswa=Mahasiswa::find($id);
        $mahasiswa->delete();
        return redirect()->route('index')
        ->with('sukses','Mahasiswa has been deleted successfully');
    }

}
