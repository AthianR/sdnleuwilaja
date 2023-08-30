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
use Laravel\Ui\Presets\React;
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
        $progres = ProgressPemain::all();
        $progresIpa = ProgressPemain::select('progress_pemain.id_jenis_soal as id_jenis', DB::raw('SUM(progress_pemain.progress_pemain) as total_progres'))
            ->where('progress_pemain.id_jenis_soal', '=', 1)
            ->groupBy('progress_pemain.id_jenis_soal')
            ->get();

        $progresIps = ProgressPemain::select('progress_pemain.id_jenis_soal as id_jenis', DB::raw('SUM(progress_pemain.progress_pemain) as total_progres'))
            ->where('progress_pemain.id_jenis_soal', '=', 2)
            ->groupBy('progress_pemain.id_jenis_soal')
            ->get();

        $progresBi = ProgressPemain::select('progress_pemain.id_jenis_soal as id_jenis', DB::raw('SUM(progress_pemain.progress_pemain) as total_progres'))
            ->where('progress_pemain.id_jenis_soal', '=', 3)
            ->groupBy('progress_pemain.id_jenis_soal')
            ->get();

        $progresSb = ProgressPemain::select('progress_pemain.id_jenis_soal as id_jenis', DB::raw('SUM(progress_pemain.progress_pemain) as total_progres'))
            ->where('progress_pemain.id_jenis_soal', '=', 4)
            ->groupBy('progress_pemain.id_jenis_soal')
            ->get();

        $progresPk = ProgressPemain::select('progress_pemain.id_jenis_soal as id_jenis', DB::raw('SUM(progress_pemain.progress_pemain) as total_progres'))
            ->where('progress_pemain.id_jenis_soal', '=', 5)
            ->groupBy('progress_pemain.id_jenis_soal')
            ->get();
        // dd($progresIpa,$progresIps,$progresBi,$progresSb,$progresPk);
        // dd($countSoal, $countSiswa, $countJenisSoal);
        return view('home', compact('countSiswa', 'countSoal', 'countJenisSoal', 'progres', 'progresIpa', 'progresIps', 'progresBi', 'progresSb', 'progresPk'));
    }

    public function siswa()
    {
        $siswa = Siswa::all();
        // dd($siswa);
        // $siswa = Siswa::with('progressPemain')->get();

        return view('daftar_siswa', compact('siswa'));
    }

    public function tampil($id)
    {
        $siswa = Siswa::all();
        $siswa_id = Siswa::find($id);
        $progress = DB::table('siswa')
            ->join('progress_pemain', 'siswa.id', '=', 'progress_pemain.id_siswa')
            ->join('jenis_soal', 'progress_pemain.id_jenis_soal', '=', 'jenis_soal.id')
            ->where('id_siswa', $id)
            ->get();
        $singleProgress = $progress->first();
        // dd($singleProgress);
        // dd($siswa_id);
        return view('tampil_siswa', compact('siswa', 'siswa_id', 'progress', 'singleProgress'));
    }

    public function soal(Request $id)
    {
        $soal = SoalQuiz::select('jenis_soal.nama_jenis_soal as jenis_soal', 'soal_quiz.id_jenis_soal as id_jenis', 'soal_quiz.isi_soal_quiz as soal_quiz', 'soal_quiz.jawaban_benar as jawaban_benar', 'soal_quiz.jawaban_opsional_1 as jawaban_1', 'soal_quiz.jawaban_opsional_2 as jawaban_2', 'soal_quiz.jawaban_opsional_3 as jawaban_3', 'soal_quiz.id as id')
            ->join('jenis_soal', 'soal_quiz.id_jenis_soal', '=', 'jenis_soal.id')
            ->get();
        $jenis = JenisSoal::all();
        // dd($soal);
        return view('daftar_soal', compact('soal', 'jenis'));
    }

    public function leaderboard()
    {
        $leaderboard = Leaderboard::select('siswa.nama as nama_siswa', 'siswa.NIK as nis', 'jenis_soal.nama_jenis_soal as jenis_soal', 'leaderboard.nilai_quiz_pemain as nilai_pemain')
            ->join('siswa', 'leaderboard.id_siswa', '=', 'siswa.id')
            ->join('jenis_soal', 'leaderboard.id_jenis_soal', '=', 'jenis_soal.id')
            ->get();
        // dd($leaderboard);
        return view('leaderboard', compact('leaderboard'));
    }

    public function progres()
    {
        $progres = ProgressPemain::select('siswa.nama as nama_siswa', 'siswa.NIK as nis', 'progress_pemain.progress_pemain as progres', 'jenis_soal.nama_jenis_soal as jenis_soal')
            ->join('siswa', 'progress_pemain.id_siswa', '=', 'siswa.id')
            ->join('jenis_soal', 'progress_pemain.id_jenis_soal', '=', 'jenis_soal.id')
            ->get();
        // dd($progres);

        return view('progres', compact('progres'));
    }

    public function storeSiswa(Request $request)
    {
        $request->validate([
            'NIK' => 'required|numeric|unique:siswa',
            'nama' => 'required',
            'password' => 'required|min:4',
        ]);

        $siswa = new Siswa();
        $siswa->NIK = $request->NIK;
        $siswa->nama = $request->nama;
        $siswa->password = Hash::make($request->password);
        $siswa->create_by = Auth::user()->id;
        $siswa->update_by = Auth::user()->id;

        $siswa->save();

        return redirect()
            ->route('daftar.siswa')
            ->with('success', 'Data siswa berhasil disimpan.');
    }

    public function storeSoal(Request $request)
    {
        $request->validate([
            'jenis_soal' => 'required',
            'isi_soal' => 'required|string|max:550',
            'jawaban_benar' => 'required|string',
            'jawaban_opsional_1' => 'required|string',
            'jawaban_opsional_2' => 'required|string',
            'jawaban_opsional_3' => 'required|string',
        ]);

        $soal = new SoalQuiz();
        $soal->id_jenis_soal = $request->jenis_soal;
        $soal->isi_soal_quiz = $request->isi_soal;
        $soal->jawaban_benar = $request->jawaban_benar;
        $soal->jawaban_opsional_1 = $request->jawaban_opsional_1;
        $soal->jawaban_opsional_2 = $request->jawaban_opsional_2;
        $soal->jawaban_opsional_3 = $request->jawaban_opsional_3;
        $soal->create_by = Auth::user()->id;
        $soal->update_by = Auth::user()->id;

        $soal->save();

        return redirect()
            ->route('daftar.soal')
            ->with('success', 'Data soal berhasil ditambahkan');
    }

    public function destroySiswa($id)
    {
        try {
            DB::beginTransaction();
            $hapusLeaderboard = Leaderboard::where('id_siswa', '=', $id)->delete();
            $hapusProgress = ProgressPemain::where('id_siswa', '=', $id)->delete();
            $hapusSiswa = Siswa::where('id', '=', $id)->delete();
            if ($hapusLeaderboard && $hapusProgress && $hapusSiswa) {
                DB::commit();
                return redirect()
                    ->route('daftar.siswa')
                    ->with('success', 'Data siswa berhasil dihapus.');
            } else {
                DB::rollback();
                return redirect()
                    ->route('daftar.siswa')
                    ->with('error', 'Data siswa tidak ditemukan.');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()
                ->route('daftar.siswa')
                ->with('error', 'Terjadi kesalahan saat menghapus data siswa.');
        }
    }

    public function destroySoal($id)
    {
        $soal = SoalQuiz::find($id);

        if (!$soal) {
            return redirect()
                ->route('daftar.soal')
                ->with('error', 'Data soal tidak ditemukan.');
        }

        $soal->delete();

        return redirect()
            ->route('daftar.soal')
            ->with('success', 'Data soal berhasil dihapus.');
    }

    public function updateSoal(Request $request, $id)
    {
        $soal = SoalQuiz::findOrFail($id);
        $request->validate([
            // 'id_jenis_soal' => 'required',
            'isi_soal' => 'required',
            'jawaban_benar' => 'required',
            'jawaban_opsional_1' => 'required',
            'jawaban_opsional_2' => 'required',
            'jawaban_opsional_3' => 'required',
        ]);
        // dd($soal);

        // Update data siswa dengan data dari form
        $soal->id_jenis_soal = $soal->id_jenis_soal;
        $soal->isi_soal_quiz = $request->isi_soal;
        $soal->jawaban_benar = $request->jawaban_benar;
        $soal->jawaban_opsional_1 = $request->jawaban_opsional_1;
        $soal->jawaban_opsional_2 = $request->jawaban_opsional_2;
        $soal->jawaban_opsional_3 = $request->jawaban_opsional_3;
        // tambahkan atribut lain jika ada

        $soal->save();

        return redirect()
            ->route('daftar.soal')
            ->with('success', 'Data soal berhasil diupdate.');
    }

    public function editSoal($id)
    {
        $jenis = JenisSoal::all();
        $soal = SoalQuiz::findOrFail($id);
        $soalfull = SoalQuiz::select('jenis_soal.nama_jenis_soal as jenis_soal', 'soal_quiz.id_jenis_soal as id_jenis', 'soal_quiz.isi_soal_quiz as soal_quiz', 'soal_quiz.jawaban_benar as jawaban_benar', 'soal_quiz.jawaban_opsional_1 as jawaban_1', 'soal_quiz.jawaban_opsional_2 as jawaban_2', 'soal_quiz.jawaban_opsional_3 as jawaban_3', 'soal_quiz.id as id_soal')
            ->join('jenis_soal', 'soal_quiz.id_jenis_soal', '=', 'jenis_soal.id')
            ->where('soal_quiz.id', $id)
            ->first();
        // dd($soalfull);
        return view('edit_soal', compact('soal', 'soalfull', 'jenis'));
    }

    public function editSiswa($id)
    {
        $siswa = Siswa::findorfail($id);
        return view('edit_siswa', compact('siswa'));
    }

    public function updateSiswa(Request $request, $id)
    {
        // Validasi data yang dikirim dari form
        $request->validate([
            'nama' => 'required',
            'password' => 'required|min:4',
            'konfirmasi_password' => 'required|same:password',
        ]);

        // Cari data siswa berdasarkan ID
        $siswa = Siswa::find($id);

        // Periksa apakah data siswa ditemukan
        if (!$siswa) {
            return redirect()
                ->back()
                ->with('error', 'Data siswa tidak ditemukan.');
        }

        // Update data siswa dengan data yang dikirim dari form
        $siswa->nama = $request->nama;
        $siswa->password = Hash::make($request->password); // Hash password baru sebelum menyimpan

        // Simpan perubahan data siswa
        $siswa->save();

        return redirect()
            ->route('daftar.siswa')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }
}
