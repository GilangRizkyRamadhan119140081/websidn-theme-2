@extends('admin.layouts.base')
@section('title', 'ImageCreate')
@section('content')
    <h1 class="h3 mb-4 text-gray-800 bg-white p-3">Daftar Galeri</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="galeri">Daftar Galeri</li>

        </ol>
    </nav>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Klik Petunjuk!
                    </button>
                </h2>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    Some placeholder content for the first accordion panel. This panel is shown by default, thanks to the
                    <code>.show</code> class.
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container-fluid bg-white p-2">
        <a href="{{ route('galeri.create') }}" class="btn btn-primary">Add Galeri</a>
    </div>
    <br>
    <div class="container-fluid bg-white">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Text</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($galeris as $galeri)
                        <tr>
                            <td>{{ $galeri->id }}</td>
                            <td>
                                @if ($galeri->images)
                                    <img src="{{ asset('storage/' . $galeri->images->path) }}" alt="Gambar Home"
                                        width="300" height="200">
                                @else
                                    Gambar tidak tersedia
                                @endif
                            </td>
                            <td>{{ $galeri->texts->paragraph }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Actions">
                                    <a href="{{ route('galeri.edit', $galeri->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <a href="{{ route('galeri.view', $galeri->id) }}" class="btn btn-info btn-sm">View</a>
                                    <form action="{{ route('galeri.delete', $galeri->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
