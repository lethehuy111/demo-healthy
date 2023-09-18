<?php

use App\Globals\Constants;

if (!function_exists('format_only_date')) {

    function format_only_date(string $date): string
    {
        return 'A Global Function with ' . $date;
    }

    function compact_title(string $title): string
    {
        return strlen($title) > Constants::TITLE_MAX_LENGTH ?
            substr($title,0,Constants::TITLE_MAX_LENGTH)."..." :
            $title;
    }
}
