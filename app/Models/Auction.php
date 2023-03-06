<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method create(array $array)
 * @method static where(string $string, $id)
 */
class Auction extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'start_price',
        'max_price',
        'start_date',
        'end_date',
        'status'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
    ];

    public static function diff($date): string
    {
        date_default_timezone_set("Asia/Tokyo");
        $datetime = new DateTime($date);
        $current = new DateTime('now');
        $diff = $current->diff($datetime);
        if($diff->days > 0){
            return $diff->days . '日';
        }else if($diff->h > 0){
            return $diff->h . '時間';
        }else if($diff->i > 0){
            return $diff->i . '分' . $diff->s . '秒';
        }else{
            return $diff->s . '秒';
        }
    }

}
