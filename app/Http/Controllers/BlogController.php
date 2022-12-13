<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\blog;
use Illuminate\Support\Facades\Hash;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::query()->get();
        return response()->json([
            "status" => true,
            "message" => "",
            "data" => $blog
        ]);
    }
    public function show($id)
    {
        $blog = Blog::query()->where("id", $id)->first();

        if ($blog == null) {
            return response()->json([
                "status" => false,
                "message" => "Pengguna tidak ditemukan",
                "data" => null
            ]);
        }

        return response()->json([
            "status" => true,
            "message" => "",
            "data" => $blog
        ]);
    }

    public function store(Request $request)
    {
        $payload = $request->all();
        if (!isset($payload["penulis"])) {
            return response()->json([
                "status" => false,
                "message" => "wajib ada nama",
                "data" => null
            ]);
        }
        if (!isset($payload["judul"])) {
            return response()->json([
                "status" => false,
                "message" => "wajib ada email",
                "data" => null
            ]);
        }
        if (!isset($payload["konten"])) {
            return response()->json([
                "status" => false,
                "message" => "wajib ada password",
                "data" => null
            ]);
        }

        $blog = Blog::query()->create($payload);
        return response()->json([
            "status" => true,
            "message" => "",
            "data" => $blog
        ]);
    }
    function update($id,Request $request){
        $blog = Blog::query()->where('id',$id)->first();
        if($blog == null){
            return response()->json([
                "status" =>false,
                "message" => "data tidak ditemukan",
                "data" => null
            ]);
        }
        $blog->fill($request->all());
        $blog->save();
        return response()->json([
            'status' => true,
            'message' => 'data telah berubah',
            "data"=> $blog
        ]);
    }

    function destroy($id){
        $delete =  Blog::query()->where("id", $id)->delete();
        return response()->json([
            'status' =>true,
            'message' => 'data telah dihapus'
        ]);
    }
}