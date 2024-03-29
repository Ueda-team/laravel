<?php

namespace App\Lib;

use Illuminate\Support\Facades\Storage;

class R2
{
    public static function avatar_get($name): String
    {
        if(!$name) return '';
        $icon = Storage::disk('r2_avatar')->get($name);
        $base64 = base64_encode($icon);
        $mime = "image/webp";
        return 'data:' . $mime . ';base64,' . $base64;
    }

    public static function avatar_put($path, $filename): bool
    {
        $content = file_get_contents($path);
        return Storage::disk('r2_avatar')->put($filename, $content);
    }

    public static function avatar_exists($name): bool
    {
        return Storage::disk('r2_avatar')->exists($name);
    }

    public static function card_get($name): String
    {
        if(!$name) return '';
        $icon = Storage::disk('r2_card')->get($name);
        $base64 = base64_encode($icon);
        $mime = "image/png";
        return 'data:' . $mime . ';base64,' . $base64;
    }

    public static function work_get($name): string
    {
        if(!$name) return '';
        $icon = Storage::disk('r2_work')->get($name);
        $base64 = base64_encode($icon);
        $mime = "image/png";
        return 'data:' . $mime . ';base64,' . $base64;
    }

    public static function work_put($path, $filename): bool
    {
        $content = file_get_contents($path);
        return Storage::disk('r2_work')->put($filename, $content);
    }

    public static function work_exists($name): bool
    {
        return Storage::disk('r2_work')->exists($name);
    }

}
