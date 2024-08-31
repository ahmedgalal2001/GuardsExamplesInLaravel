<?php

if (!function_exists('isGuardFull')) {
    function isGuardFull($guard)
    {
        $maxUsers = 100; // Define the maximum number of users for a guard

        switch ($guard) {
            case 'parent':
                return \App\Models\Parents::count() >= $maxUsers;
            case 'instructor':
                return \App\Models\Instructors::count() >= $maxUsers;
            default:
                return false;
        }
    }
}
