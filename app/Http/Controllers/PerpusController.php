<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PerpusController extends Controller
{
    public function home()
    {
        $title = 'Home';
        $datas = DB::table('books')
            ->leftJoin('categories', 'books.category_id', '=', 'categories.id')
            ->select('books.name', 'books.stok', 'books.image', 'categories.nameca', 'categories.id')
            ->get();

        return view('/home', [
            'title' => $title,
            'datas' => $datas
        ]);
    }

    public function showtambahbuku()
    {
        $title = 'Tambah Buku';
        $category = Categories::all();

        return view('/tambah-buku', [
            'title' => $title,
            'category' => $category
        ]);
    }

    public function storeBook(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'stok' => 'required',
            'image' => 'required',
            'image.*' => 'mimes:jpeg,jpg,png,pdf|max:1048',
            'deskripsi' => 'required',
            'category_id' => 'required'
        ]);

        if ($request->hasFile('image')) {

            $files = $request->file('image');

            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $Namafoto = time() . rand(5, 999) . '.' . $extension;
                $file->storeAs('public', $Namafoto);

                Books::create([
                    'name' => $request->name,
                    'stok' => $request->stok,
                    'image' => $Namafoto,
                    'deskripsi' => $request->deskripsi,
                    'category_id' => $request->category_id,
                ]);
            }
            session()->flash('success', 'Tambah buku berhasil');
            return redirect('/');
        }
        return redirect()->back()->with('gagal', 'Gagal tambah buku');
    }

    public function hapusBuku($id, $image)
    {
        if (Storage::exists('public' . $image)) {
            Storage::delete('public' . $image);
        }
        DB::table('books')->where('id', $id)->delete();

        session()->flash('success', 'File berhasil dihapus');
        return redirect()->back();
    }
}
