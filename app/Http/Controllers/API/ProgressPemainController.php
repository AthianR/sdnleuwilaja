<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ProgressPemain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProgressPemainResource;

class ProgressPemainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $progressPemain = ProgressPemain::all();
        return response(['progressPemain' => ProgressPemainResource::collection($progressPemain), 'message' => 'Data berhasil di tampilkan', 200]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data,[
            'id_siswa' => 'required|exists:siswa,id',
            'id_jenis_soal' => 'required|exists:jenis_soal,id',
            'progress_pemain' => 'required',
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'validasi salah']);
        }

        $progressPemain = ProgressPemain::create($data);

        return response(['progressPemain' => new ProgressPemainResource($progressPemain), 'message'=>'berhasil ditambahkan'],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(ProgressPemain $progressPemain)
    {
        return response(['progressPemain' => new ProgressPemainResource($progressPemain), 'message'=>'berhasil diabmil'],200);
    }

    public function showByJenisSoalSiswa($idJenis, $idSiswa)
    {
       // $header1 = $request->header('Header1');
        //$header2 = $request->header('Header2');

        $var = ProgressPemain::where('id_jenis_soal', $idJenis)->where('id_siswa', $idSiswa)->get();
        return response()->json(
            $var
        );
        //return response()->json([
        //    'Header1' => $header1,
        //    'Header2' => $header2,
       // ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProgressPemain $progressPemain)
    {
        $progressPemain -> update($request->all());

        return response(['progressPemain' => new ProgressPemainResource($progressPemain), 'message'=>'berhasil diubah'],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgressPemain $progressPemain)
    {
        $progressPemain -> delete();

        return response(['message'=>'DAata terhapus']);
    }
}
