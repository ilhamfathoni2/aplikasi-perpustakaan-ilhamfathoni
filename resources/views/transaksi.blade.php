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
                <h5 class="card-header">Pinjam Buku</h5>
                <div class="card-body">

                    <form method="POST" action="{{ route('pinjam') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="buku_id" class="form-label">ID Buku</label>
                            <select class="form-select @error('buku_id') is-invalid @enderror"
                                aria-label="Default select example" name="buku_id">
                                @foreach ($books as $item)
                                    <option value="{{ $item->id }}" selected>{{ $item->id }}</option>
                                @endforeach
                            </select>

                            @error('buku_id')
                                <div class="invalid-feedback mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="anggota_id" class="form-label">Nama Peminjam</label>
                            <input type="text" class="form-control @error('anggota_id') is-invalid @enderror"
                                id="anggota_id" name="anggota_id">

                            @error('anggota_id')
                                <div class="invalid-feedback mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                            <input type="date" class="form-control @error('tgl_pinjam') is-invalid @enderror"
                                id="tgl_pinjam" name="tgl_pinjam">

                            @error('tgl_pinjam')
                                <div class="invalid-feedback mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tgl_kembali" class="form-label">Tanggal Pengembalian</label>
                            <input type="date" class="form-control @error('tgl_kembali') is-invalid @enderror"
                                id="tgl_kembali" name="tgl_kembali">

                            @error('tgl_kembali')
                                <div class="invalid-feedback mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        @foreach ($books as $item)
                            <div class="card" style="width: 18rem;">
                                <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                    <p class="card-text">{{ $item->deskripsi }}</p>
                                    <h6 class="card-text">Stok : <b>{{ $item->stok }}</b></h6>
                        @endforeach
                </div>
                <button type="submit" class="btn btn-warning mt-4">Pinjam</button>
            </div>

            </form>

        </div>
    </div>
    </div>




@endsection
