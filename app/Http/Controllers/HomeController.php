<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\SoalQuiz;
use App\Models\JenisSoal;
use App\Models\Leaderboard;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Models\ProgressPemain;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\StreamedResponse;

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
        $countSoal = DB::table('soal_quiz')->count();
        $countSiswa = DB::table('siswa')->count();
        $countJenisSoal = DB::table('jenis_soal')->count();
        // dd($countSoal, $countSiswa, $countJenisSoal);
        return view('home', compact('countSiswa', 'countSoal', 'countJenisSoal'));
    }

    public function siswa()
    {
        $siswa = Siswa::paginate(10);
        // dd($siswa);

        return view('daftar_siswa', compact('siswa'));
    }

    public function soal(Request $id)
    {
        $soal = SoalQuiz::select('jenis_soal.nama_jenis_soal as jenis_soal', 'soal_quiz.isi_soal_quiz as soal_quiz', 'soal_quiz.jawaban_benar as jawaban_benar', 'soal_quiz.jawaban_opsional_1 as jawaban_1', 'soal_quiz.jawaban_opsional_2 as jawaban_2', 'soal_quiz.jawaban_opsional_3 as jawaban_3')
            ->join('jenis_soal', 'soal_quiz.id_jenis_soal', '=', 'jenis_soal.id')
            ->get();
        // dd($soal);
        return view('daftar_soal', compact('soal'));
    }

    public function leaderboard()
    {
        $leaderboard = Leaderboard::select('siswa.nama as nama_siswa', 'siswa.NIK as nis', 'jenis_soal.nama_jenis_soal as jenis_soal', 'leaderboard.nilai_quiz_pemain as nilai_pemain')
            ->join('siswa', 'leaderboard.id_siswa', '=', 'siswa.id')
            ->join('jenis_soal', 'leaderboard.id_jenis_soal', '=', 'jenis_soal.id')
            ->paginate(10);
        // dd($leaderboard);
        return view('leaderboard', compact('leaderboard'));
    }

    public function progres()
    {
        $id = ProgressPemain::pluck('id');
        $progres = Siswa::select('siswa.nama as nama_siswa', 'progress_pemain.progress_pemain as progres')
            ->join('progress_pemain', 'siswa.id', '=', 'progress_pemain.id_siswa')
            ->whereIn('progress_pemain', $id)
            ->get();
        // dd($progres);

        return view('progres', compact('progres'));
    }

    public function storeSiswa(Request $request)
    {
        // Validasi data yang diterima dari form input
        $request->validate([
            'NIK' => 'required|unique:siswa',
            'nama' => 'required',
            'password' => 'required|min:8',
            // Tambahkan validasi untuk kolom lain jika diperlukan
        ]);

        // Membuat objek model Siswa dengan data dari form input
        $siswa = new Siswa();
        $siswa->NIK = $request->NIK;
        $siswa->nama = $request->nama;
        $siswa->password = Hash::make($request->password);
        $siswa->create_by = Auth::user()->id;
        $siswa->update_by = Auth::user()->id;

        // Simpan data ke dalam database
        $siswa->save();

        // Redirect ke halaman lain atau tampilkan pesan berhasil jika diperlukan
        return redirect()
            ->route('daftar.siswa')
            ->with('success', 'Data siswa berhasil disimpan.');
    }

    public function destroySiswa($id)
    {
        // Cari data siswa berdasarkan ID
        $siswa = Siswa::find($id);

        // Jika data siswa ditemukan, hapus data dari database
        if ($siswa) {
            $siswa->delete();
            // Redirect ke halaman lain atau tampilkan pesan berhasil jika diperlukan
            return redirect()
                ->route('daftar.siswa')
                ->with('success', 'Data siswa berhasil dihapus.');
        } else {
            // Jika data siswa tidak ditemukan, tampilkan pesan error atau redirect ke halaman lain jika diperlukan
            return redirect()
                ->route('daftar.siswa')
                ->with('error', 'Data siswa tidak ditemukan.');
        }
    }
}
