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
                <h5 class="card-header">Kembalikan Buku</h5>
                <div class="card-body">

                    <form method="POST" action="{{ route('kembali') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="buku_id" class="form-label">Buku</label>
                            <select class="form-select @error('buku_id') is-invalid @enderror"
                                aria-label="Default select example" name="buku_id">
                                @foreach ($books as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>

                            @error('buku_id')
                                <div class="invalid-feedback mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                </div>
                <button type="submit" class="btn btn-warning mt-4">Kembalikan</button>
            </div>

            </form>

        </div>
    </div>
    </div>




@endsection
