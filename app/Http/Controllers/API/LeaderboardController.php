<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Leaderboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\LeaderboardResource;

class LeaderboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leaderboard = Leaderboard::all();
        return response(['leaderboard' => LeaderboardResource::collection($leaderboard), 'message' => 'Data berhasil di tampilkan', 200]);
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
            'nilai_quiz_pemain' => 'required',
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'validasi salah']);
        }

        $leaderboard = Leaderboard::create($data);

        return response(['leaderboard' => new LeaderboardResource($leaderboard), 'message'=>'berhasil ditambahkan'],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Leaderboard $leaderboard)
    {
        return response(['leaderboard' => new LeaderboardResource($leaderboard), 'message'=>'berhasil diabmil'],200);
    }

    public function showByJenisSoal($id)
    {
        $var = Leaderboard::where('id_jenis_soal', $id)->orderByDesc('nilai_quiz_pemain')->get();
        return response()->json([
            'success' => true,
            'message' => 'Login sukses',
            'data' => $var
        ]);
    }

    public function showByJenisSoalSiswa($idJenis, $idSiswa)
    {
       // $header1 = $request->header('Header1');
        //$header2 = $request->header('Header2');

        $var = Leaderboard::where('id_jenis_soal', $idJenis)->where('id_siswa', $idSiswa)->get();
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
    public function update(Request $request, Leaderboard $leaderboard)
    {
        $leaderboard -> update($request->all());

        return response(['leaderboard' => new LeaderboardResource($leaderboard), 'message'=>'berhasil diubah'],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leaderboard $leaderboard)
    {
        $leaderboard -> delete();

        return response(['message'=>'DAata terhapus']);
    }
}
