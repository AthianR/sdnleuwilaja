<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SoalQuiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\SoalQuizResource;
class SoalQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $soalQuiz = SoalQuiz::all();
        return response(['soalQuiz' => SoalQuizResource::collection($soalQuiz), 'message' => 'Data berhasil di tampilkan', 200]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data,[
            'id_jenis_soal'=> 'required|exists:jenis_soal,id',
            'isi_soal_quiz'=> 'required|unique:soal_quiz',
            'jawaban_benar'=> 'required',
            'jawaban_opsional_1'=> 'required',
            'jawaban_opsional_2'=> 'required',
            'jawaban_opsional_3'=> 'required',
            'create_by'=> 'required|exists:users,id',
            'update_by'=> 'required|exists:users,id'
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'validasi salah']);
        }

        $soalQuiz = SoalQuiz::create($data);

        return response(['soalQuiz' => new SoalQuizResource($soalQuiz), 'message'=>'berhasil ditambahkan'],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(SoalQuiz $soalQuiz)
    {
        return response(['soalQuiz' => new SoalQuizResource($soalQuiz), 'message'=>'berhasil diabmil'],200);
    }

    public function showByjenisQuiz($id)
    {
        //ingat diubah 15
        $count = 15;
        //$var = SoalQuiz::where('id_jenis_soal', $id)->get();
        $randomData = SoalQuiz::where('id_jenis_soal', $id)->inRandomOrder()->limit($count)->get();
        return response(['data' => new SoalQuizResource($randomData), 'message'=>'berhasil diabmil'],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SoalQuiz $soalQuiz)
    {
        $soalQuiz -> update($request->all());

        return response(['soalQuiz' => new SoalQuizResource($soalQuiz), 'message'=>'berhasil diubah'],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SoalQuiz $soalQuiz)
    {
        $soalQuiz -> delete();

        return response(['message'=>'DAata terhapus']);
    }
}
