<?php

namespace App\Utilities;

/**
 * 文字列変換Utilityクラス
 */
class StrConv
{
    /**
     * スネークケースの文字列をキャメルケースの文字列に変換する
     *
     * @param string $str
     * @return string
     */
    public static function underscore(string $str): string
    {
        return ltrim(strtolower(preg_replace('/[A-Z]/', '_\0', $str)), '_');
    }

    /**
     * キャメルケースの文字列をスネークケースの文字列に変換する
     *
     * @param string $str
     * @return string
     */
    public static function camelize(string $str): string
    {
        return lcfirst(strtr(ucwords(strtr($str, ['_' => ' '])), [' ' => '']));
    }
    
    /**
     * NULLを空に変換
     *
     * @param string|null $str
     * @return string|null
     */
    public static function adjustEmpty(?string $str): ?string
    {
        $ret = $str;

        $ret = \str_replace(null, "", $ret);
        $ret = \str_replace("NULL", "", $ret);

        return $ret;
    }
}
