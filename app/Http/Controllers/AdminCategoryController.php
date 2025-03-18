<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index(){
        $data = KategoriModel::paginate(5);
        return view('admin.kategori',['data' => $data]);
    }

    public function form(){
        return view('admin.form_kategori');
    }

    public function create(){
        $data = new KategoriModel;
        $data->nama_kategori = request('nama_kategori');
        $data->save();

        return redirect('admin/kategori')->with('status', 'Data berhasil disimpan');
    }

    public function delete($id){
        $data = KategoriModel::where('id', $id)->delete();
        return redirect('admin/kategori')->with('status', 'Data berhasil dihapus');
    }

    public function edit($id){
        $data = KategoriModel::where('id', $id)->first();
        return view('admin.kategori_edit',['data' => $data]);
    }

    public function update(Request $request , $id){
        $data = KategoriModel::where('id', $id)->first();
        $data->nama_kategori = $request->nama_kategori;
        $data->save();
        return redirect('admin/kategori')->with('status', 'Data berhasil diubah');
    }
}
