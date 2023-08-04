<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoalQuiz extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'soal_quiz';

    use HasFactory;

    protected $fillable = [
        'id_jenis_soal',
        'isi_soal_quiz',
        'jawaban_benar',
        'jawaban_opsional_1',
        'jawaban_opsional_2',
        'jawaban_opsional_3',
        'create_by',
        'update_by'
    ];

    public function jenisSoal(){
    	return $this->belongsToMany(JenisSoal::class);
    }
    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
    return 'id_jenis_soal';
    }
}
