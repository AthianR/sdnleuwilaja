<?php

namespace App\Http\Controllers;

use App\Models\JenisSoal;
use App\Models\Leaderboard;
use App\Models\Siswa;
use App\Models\SoalQuiz;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function siswa(){
        $siswa = Siswa::paginate(10);
        // dd($siswa);

        return view('daftar_siswa', compact('siswa'));
    }

    public function soal(Request $id){
       $soal = SoalQuiz::select(
                            'jenis_soal.nama_jenis_soal as jenis_soal',
                            'soal_quiz.isi_soal_quiz as soal_quiz', 
                            'soal_quiz.jawaban_benar as jawaban_benar', 
                            'soal_quiz.jawaban_opsional_1 as jawaban_1', 
                            'soal_quiz.jawaban_opsional_2 as jawaban_2', 
                            'soal_quiz.jawaban_opsional_3 as jawaban_3')
                        ->join('jenis_soal', 'soal_quiz.id_jenis_soal', '=', 'jenis_soal.id')
                        ->paginate(10);
                        // dd($soal);
        return view('daftar_soal', compact('soal'));
    }

    public function leaderboard(){
        $leaderboard = Leaderboard::select(
                        'siswa.nama as nama_siswa',
                        'siswa.NIK as nis',
                        'jenis_soal.nama_jenis_soal as jenis_soal',
                        'leaderboard.nilai_quiz_pemain as nilai_pemain')
                    ->join('siswa', 'leaderboard.id_siswa', '=', 'siswa.id')
                    ->join('jenis_soal', 'leaderboard.id_jenis_soal', '=','jenis_soal.id')
                    ->paginate(10);
                    // dd($leaderboard);
            return view('leaderboard', compact('leaderboard'));
    }
}
