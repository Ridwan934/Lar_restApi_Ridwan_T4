<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {
        $pengguna = Pengguna::query()->get();
        return response()->json([
            "status" => true,
            "message" => "",
            "data" => $pengguna
        ]);
    }
    public function show($id)
    {
        $pengguna = Pengguna::query()->where("id", $id)->first();

        if ($pengguna == null) {
            return response()->json([
                "status" => false,
                "message" => "Pengguna tidak ditemukan",
                "data" => null
            ]);
        }

        return response()->json([
            "status" => true,
            "message" => "",
            "data" => $pengguna
        ]);
    }

    public function store(Request $request)
    {
        $payload = $request->all();
        if (!isset($payload["username"])) {
            return response()->json([
                "status" => false,
                "message" => "wajib ada nama",
                "data" => null
            ]);
        }
        if (!isset($payload["email"])) {
            return response()->json([
                "status" => false,
                "message" => "wajib ada email",
                "data" => null
            ]);
        }
        if (!isset($payload["password"])) {
            return response()->json([
                "status" => false,
                "message" => "wajib ada password",
                "data" => null
            ]);
        }

        $pengguna = Pengguna::query()->create($payload);
        return response()->json([
            "status" => true,
            "message" => "",
            "data" => $pengguna
        ]);
    }
    function update($id,Request $request){
        $pengguna = Pengguna::query()->where('id',$id)->first();
        if($pengguna == null){
            return response()->json([
                "status" =>false,
                "message" => "data tidak ditemukan",
                "data" => null
            ]);
        }
        $pengguna->fill($request->all());
        $pengguna->save();
        return response()->json([
            'status' => true,
            'message' => 'data telah berubah',
            "data"=> $pengguna
        ]);
    }

    function destroy($id){
        $delete =  Pengguna::query()->where("id", $id)->delete();
        return response()->json([
            'status' =>true,
            'message' => 'data telah dihapus'
        ]);
    }
}



// function index ()
// {
//     $pengguna = Pengguna::query()->get();
//     return response ()->json([
//         "status" =>true,
//         "message" =>
//     ])
// }

// function show() {
//     $pengguna = Pengguna::query()
//     ->where ("id", $id)
//     ->first();
//     if ($pengguna == null) {
//         return response()->json([
//             "status" => false,
//             "message" => "pengguna tidak ditemukan",
//             "data" => null
//         ])
//     }
//     ;
// }

// function store () {}
//  $payload = $request->all();
//  if (!isset ($payload ['nama'])) {
//     return response ()->json([
//      "status" => true,
//      "message" => "",
//      "data"  
//     ])
//  }
// function () {}