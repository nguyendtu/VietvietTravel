<?php
/**
 * Created by PhpStorm.
 * User: @TuNguyen: duytu.nguyen@outlook.com
 * Date: 3/29/2016
 * Time: 11:30 AM
 */
namespace app\components;

class Helpers{

    public static function limit_text($text, $limit) {
        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos = array_keys($words);
            $text = substr($text, 0, $pos[$limit]) . '...';
        }
        return $text;
    }
}



?>