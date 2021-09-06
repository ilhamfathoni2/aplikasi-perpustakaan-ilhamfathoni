<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Transaksi;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function show($id)
    {
        $title = 'Pinjam Buku';
        $books = DB::table('books')->where('id', '=', $id)->get();

        return view('/transaksi', [
            'title' => $title,
            'books' => $books
        ]);
    }

    public function showkembali()
    {
        $title = 'Kembalikan Buku';
        $books = DB::table('books')->get();

        return view('/kembali', [
            'title' => $title,
            'books' => $books
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'buku_id' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'anggota_id' => 'required',

        ]);

        $transaksi = Transaksi::create([
            'buku_id' => $request->buku_id,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
            'anggota_id' => $request->anggota_id,
            'status' => 'pinjam'
        ]);


        $transaksi->buku->where('id', $transaksi->buku_id)
            ->update([
                'stok' => ($transaksi->buku->stok - 1),
            ]);

        session()->flash('success', 'Berhasil pinjam buku');
        return redirect('/');
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::all();

        $transaksi->update([
            'status' => 'kembali'
        ]);

        $transaksi->buku->update([
            'stok' => 1,
        ]);

        session()->flash('success', 'Berhasil mengembalikan buku');
        return redirect('/');
    }
}
