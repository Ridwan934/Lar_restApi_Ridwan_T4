<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\produk;
use Illuminate\Support\Facades\Hash;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::query()->get();
        return response()->json([
            "status" => true,
            "message" => "",
            "data" => $produk
        ]);
    }

    public function show($id)
    {
        $produk = Produk::query()->where("id", $id)->first();

        if ($produk == null) {
            return response()->json([
                "status" => false,
                "message" => "Pengguna tidak ditemukan",
                "data" => null
            ]);
        }

        return response()->json([
            "status" => true,
            "message" => "",
            "data" => $produk
        ]);
    }

    public function store(Request $request)
    {
        $payload = $request->all();
        if (!isset($payload["nama"])) {
            return response()->json([
                "status" => false,
                "message" => "wajib ada nama",
                "data" => null
            ]);
        }
        if (!isset($payload["deskripsi"])) {
            return response()->json([
                "status" => false,
                "message" => "wajib ada deskripsi",
                "data" => null
            ]);
        }
        if (!isset($payload["gambar"])) {
            return response()->json([
                "status" => false,
                "message" => "wajib ada gambar",
                "data" => null
            ]);
        }
        if (!isset($payload["harga"])) {
            return response()->json([
                "status" => false,
                "message" => "wajib ada harga",
                "data" => null
            ]);
        }

        $produk = Produk::query()->create($payload);
        return response()->json([
            "status" => true,
            "message" => "",
            "data" => $produk
        ]);
    }
    function update($id,Request $request){
        $produk = Produk::query()->where('id',$id)->first();
        if($produk == null){
            return response()->json([
                "status" =>false,
                "message" => "data tidak ditemukan",
                "data" => null
            ]);
        }
        $produk->fill($request->all());
        $produk->save();
        return response()->json([
            'status' => true,
            'message' => 'data telah berubah',
            "data"=> $produk
        ]);
    }

    function destroy($id){
        $delete =  Produk::query()->where("id", $id)->delete();
        return response()->json([
            'status' =>true,
            'message' => 'data telah dihapus'
        ]);
    }
}