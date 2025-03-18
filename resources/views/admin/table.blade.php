@extends('admin/layout')

@section('konten')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Berita</h1>

    @if (session('status'))
    <div id="alert-message" class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <a href="/admin/tambah" class="btn btn-primary mb-4">Tambah Berita</a>

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
                            <th>No</th>
                            <th>Judul</th>
                            <th>Isi</th>
                            <th>Kategori</th>
                            <th>Set Headline</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = ($data->currentPage() - 1) * $data->perPage() + 1;
                        @endphp
                        @foreach($data as $post)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $post->judul }}</td>
                            <td>{{ $post->isi }}</td>
                            <td>{{$post->nama_kategori}}</td>
                            <td>
                                @if($post->is_headline == 'no')
                                <a href="/admin/set-headline/yes/{{$post->id}}">
                                    <label class="badge badge-outline-primary" style="font-size: 1.2rem; padding: 0.5rem 1rem; border: 2px solid #007bff; color: #007bff; background-color: transparent;">
                                        yes
                                    </label>
                                </a>
                                @else
                                <a href="/admin/set-headline/no/{{$post->id}}">
                                    <label class="badge badge-outline-danger" style="font-size: 1.2rem; padding: 0.5rem 1rem; border: 2px solid #dc3545; color: #dc3545; background-color: transparent;">
                                        no
                                    </label>
                                </a>
                                @endif
                            </td>
                            <td><img src="/uploads/{{$post->gambar}}" width="200rem" alt=""></td>
                            <td>
                                <a href="/admin/edit/{{$post->id}}"><label class="badge badge-primary">EDIT</label></a>
                                <a href="#" class="delete-btn" data-id="{{ $post->id }}"><label class="badge badge-danger">DELETE</label></a>
                                <!-- <a href="/admin/hapus/{{$post->id}}" ><label class="badge badge-danger">DELETE</label></a> -->
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