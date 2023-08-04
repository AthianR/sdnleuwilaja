<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaderboard extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'leaderboard';

    use HasFactory;

    protected $fillable = [
        'id_siswa',
        'id_jenis_soal',
        'nilai_quiz_pemain'
    ];

    public function siswa(){
    	return $this->belongsToMany(Siswa::class);
    }

    public function jenisSoal(){
    	return $this->belongsToMany(JenisSoal::class);
    }

    public function getRouteKeyName()
    {
    return 'id_jenis_soal';
    }
}
