<?php

namespace App\Models;


// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Siswa extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'siswa';

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'NIK',
        'nama',
        'password',
        'create_by',
        'update_by',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    public function leaderboard(){
    	return $this->hasMany(Leaderboard::class);
    }
    public function progressPemain(){
    	return $this->hasMany(ProgressPemain::class);
    }
    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
    return 'id';
    }
}
