@extends('layouts.main')

@section('konten')

    <a class="btn btn-secondary mb-4" href="/" role="button">Kembali</a>

    @if (session()->has('gagal'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('gagal') }}
        </div>
    @endif

    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <h5 class="card-header">Tambah Kategori</h5>
                <div class="card-body">
                    <form method="POST" action="{{ route('kategori') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nameca" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control @error('nameca') is-invalid @enderror" id="nameca"
                                name="nameca">

                            @error('nameca')
                                <div class="invalid-feedback mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Tambah</button>
                    </form>

                </div>
            </div>

            <div class="col-sm-6 mt-4">
                <div class="card">
                    <h5 class="card-header">Kategori</h5>
                    <div class="card-body">
                        @foreach ($category as $data)
                            <ul>
                                <li>{{ $data->nameca }}</li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
