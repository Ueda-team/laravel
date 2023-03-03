<?php

namespace App\Models;

use App\Models\WorkFile;
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

    public static function getImage($id): string
    {
        $workFile = WorkFile::where('work_id', $id)->first();
        return R2::work_get($workFile->name);
    }
}
