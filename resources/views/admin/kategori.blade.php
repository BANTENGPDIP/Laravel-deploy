@extends('admin/layout')

@section('konten')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kategori</h1>

    @if (session('status'))
    <div id="alert-message" class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <a href="/admin/kategori/tambah" class="btn btn-primary mb-4">Tambah Kategori</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nama Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = ($data->currentPage() - 1) * $data->perPage() + 1;
                        @endphp
                        @foreach($data as $post)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{ $post->nama_kategori }}</td>
                            <td>
                                <a href="/admin/kategori/edit/{{ $post->id }}"><label class="badge badge-primary">EDIT</label></a>
                                <a href="/admin/kategori/hapus/{{ $post->id }}"><label class="badge badge-danger">DELETE</label></a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
            {{ $data->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection