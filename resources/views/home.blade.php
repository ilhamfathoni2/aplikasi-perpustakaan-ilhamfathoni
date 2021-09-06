@extends('layouts.main')

@section('konten')

    <a class="btn btn-primary mb-4" href="/tambah-buku" role="button"><b>+</b> Tambah Buku</a>
    <a class="btn btn-success mb-4" href="/tambah-kategori" role="button"><b>+</b> Tambah Kategori</a>

    @if (session()->has('success'))
        <div class="alert alert-info" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="card">
        <h5 class="card-header">Buku</h5>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <tr class="bg-primary text-white text-center">
                    <th>No.</th>
                    <th>Judul</th>
                    <th>Stok</th>
                    <th>Foto</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
                @php
                    $i = 0;
                @endphp
                @foreach ($datas as $item)
                    <tr>
                        <td class="text-center">{{ ++$i }}</td>
                        <td>{{ $item->name }}</td>
                        <td class="text-center">{{ $item->stok }}</td>
                        <td class="text-center">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="image"
                                style="width: 50px; border-radius: 5px; border: 3px white solid;">
                        </td>
                        <td>{{ $item->nameca }}</td>
                        <td class="text-center">
                            <a class="btn btn-info" href="#" role="button">Detail</a>
                            <a class="btn btn-warning" href="#" role="button">Pinjam</a>
                            <a class="btn btn-danger" href="{{ url('/' . $item->id, $item->image) }}"
                                role="button">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>



@endsection
