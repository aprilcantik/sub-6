<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ApiController extends Controller
{
    public function product_index(){
        $produk = Produk::get();
        return response()->json($produk);
    }

    public function produk_store(Request $request){
        Produk::insert([
            'produk'        => $request->api_produk,
            'price'         => $request->api_price,
            'stock'         => $request->api_stock,

        ]);
        $response = array(
            'responseCode'     => '00',
            'responseStatus'   => 'Success'
        );
        return response()->json($response);
    }
    public function produk_by_id($id) {
        $produk = Produk::where('id',$id)->get();
        return response()->json($produk);
    }
    

}