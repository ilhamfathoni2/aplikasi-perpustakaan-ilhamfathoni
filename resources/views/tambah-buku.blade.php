@extends('layouts.main')

@section('konten')

    <a class="btn btn-secondary mb-4" href="/" role="button">Kembali</a>

    @if (session()->has('gagal'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('gagal') }}
        </div>
    @endif

    <div class="row mb-5">
        <div class="col-sm-6">
            <div class="card">
                <h5 class="card-header">Tambah Buku</h5>
                <div class="card-body">

                    <form method="POST" action="{{ route('addbooks') }}" enctype="multipart/form-data">

                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Buku</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name">

                            @error('name')
                                <div class="invalid-feedback mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="text" class="form-control @error('stok') is-invalid @enderror" id="stok"
                                name="stok">

                            @error('stok')
                                <div class="invalid-feedback mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Foto Buku</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                name="image[]">

                            @error('image')
                                <div class="invalid-feedback mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                                name="deskripsi">

                            @error('deskripsi')
                                <div class="invalid-feedback mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-select @error('category_id') is-invalid @enderror"
                                aria-label="Default select example" name="category_id">
                                <option>Pilih Kategori</option>
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->nameca }}</option>
                                @endforeach
                            </select>

                            @error('category_id')
                                <div class="invalid-feedback mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Tambah</button>
                    </form>

                </div>
            </div>
        </div>
    </div>



@endsection
