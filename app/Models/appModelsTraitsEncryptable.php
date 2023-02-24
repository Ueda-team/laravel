<?php
namespace App\Models;

use Illuminate\Support\Facades\Crypt;

/**
 * カラムの暗号化を行う
 * use先で$this->encryptableを定義
 * 同じ文字列でも暗号化のたびに結果が変わるので、検索には使えない
 * 検索を行う場合は全取得後phpでフィルタリングする
 */
trait appModelsTraitsEncryptable
{
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if (in_array($key, $this->encryptable, true))
        {
            return !empty($value) ? Crypt::decrypt($value) : null;
        }
        return $value;
    }

    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->encryptable, true))
        {
            $value = !empty($value) ? Crypt::encrypt($value) : null;
        }
        return parent::setAttribute($key, $value);
    }
}
