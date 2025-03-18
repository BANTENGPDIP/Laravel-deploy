<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeritaModels;
use App\Models\KategoriModel;

class AdminBeritaController extends Controller
{
    public function table(){
       $data = BeritaModels::join('category','berita.id_kategori','category.id')
       ->select('berita.*','category.nama_kategori')
       ->paginate(5);
       
       return view('/admin/table',['data' => $data]);
    }

    public function index(){
        $jumlahOlahraga = BeritaModels::join('category', 'berita.id_kategori', 'category.id')
        ->where('category.nama_kategori', 'Olahraga')
        ->count();

        $jumlahPolitik = BeritaModels::join('category', 'berita.id_kategori', 'category.id')
        ->where('category.nama_kategori', 'Politik')
        ->count();

        $jumlahHiburan = BeritaModels::join('category', 'berita.id_kategori', 'category.id')
        ->where('category.nama_kategori', 'Hiburan')
        ->count();

        $jumlahTeknologi = BeritaModels::join('category','berita.id_kategori','category.id')
        ->where('category.nama_kategori', 'Teknologi')
        ->count();


        return view('admin.dashboard',['jumlahOlahraga' => $jumlahOlahraga, 'jumlahPolitik' => $jumlahPolitik, 'jumlahHiburan'=>$jumlahHiburan,'jumlahTeknologi'=>$jumlahTeknologi]);
    }

    public function form(){
        $list_kategori = KategoriModel::get();
        return view('admin/form',['list_kategori' => $list_kategori]);
    }

    public function create(Request $request){
        $image_name = time().'.'.$request->gambar->extension();
        $request->gambar->move(public_path('uploads'), $image_name);

        $data = new BeritaModels();
        $data->judul = $request->judul;
        $data->isi = $request->isi;
        $data->id_kategori = $request->kategori;
        $data->gambar = $image_name;
        $data->save();
        return redirect('/admin/table')->with('status','Data berhasil ditambahkan');
    }
    

    public function delete($id){
        $data = BeritaModels::where('id', $id)->delete();
        return redirect('/admin/table')->with('status','Data berhasil dihapus');
    }

    public function edit($id){
        $data = BeritaModels::where('id', $id)->first();
        $list_kategori = KategoriModel::get();
        return view('admin.table_edit',['data' => $data, 'list_kategori' => $list_kategori]);
    }

    public function update(Request $request, $id){
        $data = BeritaModels::where('id', $id)->first();

        if ($request->hasFile('gambar')) {

            $image_name = time().'.'.$request->gambar->extension();

            $request->gambar->move(public_path('uploads'), $image_name);

            $data->gambar = $image_name;
        }
    
        $data->judul = $request->judul;
        $data->isi = $request->isi;
        $data->id_kategori = $request->kategori;
        $data->save();

        return redirect('/admin/table')->with('status','Data berhasil diubah');
    }

    public function set_headline($status, $id){
        $data = BeritaModels::where('id', $id)->first();
        $data ->is_headline = $status;
        $data->save();

        return redirect('/admin/table');
    }
   
}
