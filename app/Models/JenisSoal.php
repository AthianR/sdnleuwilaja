<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSoal extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'jenis_soal';

    use HasFactory;

    protected $fillable = [
        'nama_jenis_soal',
        'create_by',
        'update_by'
    ];

    public function leaderboard(){
    	return $this->hasMany(Leaderboard::class);
    }

    public function progressPemain(){
    	return $this->hasMany(ProgressPemain::class);
    }

    public function soalQuiz(){
    	return $this->hasMany(SoalQuiz::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
