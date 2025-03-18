@extends('admin/layout')

@section('konten')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Form</h1>

    <!-- Form Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Input Data</h6>
        </div>
        <div class="card-body">
            <form action="/admin/kategori/create" method="POST">
                @csrf 

                <div class="form-group">
                    <label for="isi">Nama Kategori</label>
                    <input type="isi" class="form-control" name="nama_kategori" placeholder="Enter your isi"></input>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection