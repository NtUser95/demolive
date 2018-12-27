<?php
/**
 * Created by PhpStorm.
 * User: YOBA
 * Date: 27.12.2018
 * Time: 18:38
 */

namespace Helpers;

// Надеюсь, это никто и никогда не увидит.
class Flashes
{
    public static function generate(String $type, $msg) : String
    {
        $tpl = "<div class='msg-{$type}'>";
        $tpl .= "<span class='msg-body'>{$msg}</span>";
        $tpl .= "</div>";

        return $tpl;
    }
}