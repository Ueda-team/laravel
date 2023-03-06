<?php

namespace App\Models;

use App\Lib\R2;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method create(array $array)
 * @method static where(string $string, $id)
 */
class Work extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'outline',
        'preview',
        'price',
        'url',
        'category_id',
        'user_id',
        'auction_id',
        'buy_id',
        'types'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'verified_at' => 'datetime',
    ];

    public static function getImage($id, $class=""): string
    {
        $work = WorkFile::where('work_id', $id)->first();
        return '<img src="' . R2::work_get($work ? $work->name : null) . '" class="' . $class . '"alt="user avatar" onError="this.onerror=null;this.src=\'' . asset('img/sampleimage.png') . '\'">';
    }
}
