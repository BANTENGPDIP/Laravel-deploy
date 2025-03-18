@extends('admin/layout')

@section('konten')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Form</h1>

    <!-- Form Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data</h6>
        </div>
        <div class="card-body">
            <form action="/admin/update/{{$data->id}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>judul</label>
                    <input type="text" class="form-control" name="judul" placeholder="Enter your judul" value="{{$data->judul}}">
                </div>

                <div class="form-group">
                    <label for="isi">Isi</label>
                    <textarea type="isi" class="form-control" name="isi" placeholder="Enter your isi">{{$data->isi}}</textarea>
                </div>

                <div class="form-group">
                    <label for="isi">Kategori</label>
                    <select name="kategori" class="form-control" id="">
                        <option value="">Pilih Kategori</option>
                        @foreach($list_kategori as $category)
                        <option value="{{ $category->id }}" @if($data->id_kategori == $category->id) selected @endif>{{ $category->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <img src="/uploads/{{$data->gambar}}" width="20%" alt="">
                </div>

                <div class="form-group">
                    <label for="isi">Gambar</label>
                    <input type="file" name="gambar" class="form-control" alt="">

                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection