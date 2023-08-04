<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Http\Resources\SiswaResource;

class SiswaController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'NIK' => 'required|unique:siswa|numeric',
            'nama' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'create_by' => 'required|exists:users,id',
            'update_by'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Ada kesalahan',
                'data' => $validator->errors()
            ]);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $siswa = Siswa::create($input);

        $success['token'] = $siswa->createToken('auth_token')->plainTextToken;
        $success['name'] = $siswa->nama_siswa;

        return response()->json([
            'success' => true,
            'message' => 'Sukses register',
            'data' => $success
        ]);

    }

    public function login(Request $request)
    {
        if (Auth::guard('api')->attempt(['NIK' => $request->NIK, 'password' => $request->password])) {

            $auth = Auth::guard('api')->user();
            $success['token'] = $auth->createToken('auth_token')->plainTextToken;
            $success['NIK'] = $auth->NIK;
            $success['nama'] = $auth->nama;

            return response()->json([
                'success' => true,
                'message' => 'Login sukses',
                'data' => $success
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Cek email dan password lagi',
                'data' =>  $request->password
            ]);
        }
    }

    public function siswaById($id)
    {
        $var = Siswa::where('id', $id)->get();
        return response()->json([
            'success' => true,
            'message' => 'Login sukses',
            'data' => $var
        ]);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => ' sukses logout'
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        //
    }
}
