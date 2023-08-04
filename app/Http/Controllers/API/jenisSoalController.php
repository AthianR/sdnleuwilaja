<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\JenisSoal;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Http\Resources\JenisSoalResource;

class jenisSoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenisSoal = JenisSoal::all();
        return response(['jeniSoal' => JenisSoalResource::collection($jenisSoal), 'message' => 'Data berhasil di tampilkan', 200]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data,[
            'nama_jenis_soal' => 'required',
            'create_by' => 'required|exists:users,id',
            'update_by' => 'required|exists:users,id'
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'validasi salah']);
        }

        $jenisSoal = JenisSoal::create($data);

        return response(['jenisSoal' => new JenisSoalResource($jenisSoal), 'message'=>'berhasil ditambahkan'],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisSoal $jenisSoal)
    {
        return response(['jenisSoal' => new JenisSoalResource($jenisSoal), 'message'=>'berhasil diabmil'],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisSoal $jenisSoal)
    {
        $jenisSoal -> update($request->all());

        return response(['jeniSoal' => new JenisSoalResource($jenisSoal), 'message'=>'berhasil diubah'],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisSoal $jenisSoal)
    {
        $jenisSoal -> delete();

        return response(['message'=>'DAata terhapus']);
    }
}
