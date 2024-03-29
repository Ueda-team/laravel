<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Lib\R2;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method static where(string $string, mixed $id)
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'user_name',
        'email',
        'password',
        'avatar',
        'card'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getAvatar($id): string
    {
        $user = User::where('id', $id)->first();
        return '<img src="' . R2::avatar_get($user->avatar) . '" alt="user avatar" onError="this.onerror=null;this.src=\'' . asset('img/no-icon.png') . '\'">';
    }

    public static function isAdmin($id): bool
    {
        $user = PersonalInformation::where('user_id', $id)->first();
        return $user->admin;
    }
}
