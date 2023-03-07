<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Lib\R2;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Claim extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'work_id',
        'price',
        'isPaid'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
    ];

    public static function getImage($id, $class=""): string
    {
        $work = WorkFile::where('work_id', $id)->first();
        return '<img src="' . R2::work_get($work ? $work->name : null) . '" class="' . $class . '"alt="user avatar" onError="this.onerror=null;this.src=\'' . asset('img/sampleimage.png') . '\'">';
    }
}
