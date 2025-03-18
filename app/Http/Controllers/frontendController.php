<?php

namespace App\Http\Controllers;

use App\Models\BeritaModels;
use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function index(){
        $data = BeritaModels::join('category', 'berita.id_kategori', 'category.id')
        ->select('berita.*', 'category.nama_kategori')
        ->get();    


        $headline = BeritaModels::join('category', 'berita.id_kategori', 'category.id')
        ->where('is_headline', 'yes')
        ->select('berita.*', 'category.nama_kategori')
        ->get();   

        return view('index',['data' => $data, 'headline' => $headline]);
    }

    public function detail($id){
        $data = BeritaModels::
        join('category', 'berita.id_kategori', 'category.id')
        ->select('berita.*', 'category.nama_kategori')
        -> where('berita.id',$id)->first();
        if (!$data){
            return view('error404'); 
        }
        return view('detail',['data' => $data]);
    }

    public function category($nama_kategori){
        $data = BeritaModels::
        join('category', 'berita.id_kategori', 'category.id')
        ->select('berita.*', 'category.nama_kategori')
        ->where('nama_kategori',$nama_kategori,) 
        ->get();

        $headline = BeritaModels::join('category', 'berita.id_kategori', '=', 'category.id')
        ->select('berita.*', 'category.nama_kategori')
        ->where('is_headline', 'yes')
        ->where('category.nama_kategori', $nama_kategori)
        ->get();

        if ($data->isEmpty() && $headline->isEmpty()) {
            return view('error404');
        }

        return view('kategory',['data' => $data, 'headline' => $headline]);
    }


    public function indeks(){
        $data = BeritaModels::join('category', 'berita.id_kategori', 'category.id')
        ->select('berita.*', 'category.nama_kategori')
        ->get();    


        return view('indeks',['data' => $data]);
    }


    public function indeks_cari(Request $request){
        $data = BeritaModels::join('category', 'berita.id_kategori', 'category.id')
        ->Where('judul', 'like', '%' .$request->keyword. '%')
        ->select('berita.*', 'category.nama_kategori')
        ->get();    


        return view('indeks',['data' => $data]);
    }

}
