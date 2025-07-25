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

if (!function_exists('route_has_active_admin')) {
    function route_has_active_admin($prefix, $segment = 2)
    {
        $currentUrl = request()->segment($segment);

        // Jika home, segment kosong
        if ($prefix == 'home' && ($currentUrl == '' || $currentUrl == null)) {
            return true;
        }
        return $currentUrl == $prefix;
    }
}

if (!function_exists('format_rupiah')) {
    function format_rupiah($angka)
    {
        $hasil = number_format($angka, 0, ",", ".");
        return $hasil;
    }
}

if (!function_exists('isAdmin')) {
    function isAdmin($user)
    {
        return $user && $user->role === 'admin';
    }
}

if (!function_exists('isUser')) {
    function isUser($user)
    {
        return $user && $user->role === 'peserta';
    }
}

if (!function_exists('storage')) {
    function storage($path)
    {
        return Illuminate\Support\Facades\Storage::url($path);
    }
}
