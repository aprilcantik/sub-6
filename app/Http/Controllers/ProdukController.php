<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\produk;

//return type View
use Illuminate\View\View;

use Illuminate\Http\Request;

class produkController extends Controller

{
    public function index(){

        //get posts
        $produk = produk::get();

        //render view with posts
        return view('produk.index', compact('produk'));
    }
    public function create(){
        return view('produk.create');
    }
    public function store(Request $request){
        produk::create([
            'produk' => $request->produk,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect('/produk');
    }
    public function edit($id)
    {
    $produk = produk::find($id);
    return view('produk.edit', compact('produk'));
    }
    public function destroy($id)
    {
        $produk = produk::find($id);

        if (!$produk) {
            return redirect('/produk')->with('error', 'Produk tidak ditemukan');
        }

        $produk->delete();

        return redirect('/produk')->with('success', 'Produk berhasil dihapus');
    }
    public function update(Request $request, $id)
    {
    $produk = produk::find($id);
    $produk->update([
        'produk' => $request->produk,
        'price'   => $request->price,
        'stock'   => $request->stock,
    ]);

    return redirect('/produk');
    }
}