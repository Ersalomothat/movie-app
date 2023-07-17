<?php

if (!function_exists('get_age')) {
    function get_age($birthOfdate): int
    {
        $now = new \DateTime();
        $birthDate = new \DateTime($birthOfdate);
        return $now->diff($birthDate)->y;
    }
}

if (!function_exists('arrayToStr')) {
    function arrayToStr(array $arr): string
    {
        return implode(',', $arr);
    }
}
