<?php
if (!function_exists('route_has_active')) {
    function route_has_active($prefix, $segment = 1)
    {
        $currentUrl = request()->segment($segment);

        // Jika home, segment kosong
        if ($prefix == 'home' && ($currentUrl == '' || $currentUrl == null)) {
            return true;
        }
        return $currentUrl == $prefix;
    }
}
