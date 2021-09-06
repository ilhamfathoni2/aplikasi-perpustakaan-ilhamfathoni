@extends('layouts.main')

@section('konten')
    <a href="/" class="btn btn-secondary mb-3">Kembali</a>

    @foreach ($books as $item)
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $item->name }}</h5>
                <p class="card-text">{{ $item->deskripsi }}</p>
                <h6 class="card-text">Stok : <b>{{ $item->stok }}</b></h6>
            </div>
    @endforeach

    @foreach ($category as $data)
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Kategori : <b>{{ $data->nameca }}</b></li>
        </ul>
    @endforeach
    </div>
@endsection
