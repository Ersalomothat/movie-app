<?php

if (!function_exists('get_age')) {
    function get_age($birthOfdate):int
    {
        $now = new \DateTime();
        $birthDate = new \DateTime($birthOfdate);
        return $now->diff($birthDate)->y;
    }
}
