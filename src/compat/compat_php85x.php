<?php
/**
 *   __ _  ___  ___ ___   ___   ___     ____ _ __ ___   ___
 *  / _` |/  / / __/ _ \ / _ \ /  /    / __/| '_ ` _ \ /  /
 * | (_| |\  \| (_| (_) | (_) |\  \   | (__ | | | | | |\  \
 *  \__,_|/__/ \___\___/ \___/ /__/    \___\|_| |_| |_|/__/
 * 
 * 
 *************************************************************************************
 * @ASCOOS-NAME        : ASCOOS CMS 24'                                              *
 * @ASCOOS-VERSION     : 24.0.0                                                      *
 * @ASCOOS-CATEGORY    : Kernel (Frontend and Administration Side)                   *
 * @ASCOOS-CREATOR     : Drogidis Christos                                           *
 * @ASCOOS-SITE        : www.ascoos.com                                              *
 * @ASCOOS-LICENSE     : [Commercial] http://docs.ascoos.com/lics/ascoos/AGL-F.html  *
 * @ASCOOS-COPYRIGHT   : Copyright (c) 2007 - 2024, AlexSoft Software.               *
 *************************************************************************************
 *
 * @package            : ASCOOS CMS - phpBCL
 * @subpackage         : Core Compatibilities Manager for PHP < 8.5.0
 * @source             : /phpBCL/src/compat/compat_php85x.php
 * @version            : 2.0.0
 * @created            : 2024-11-29 07:40:00 UTC+3
 * @updated            : 
 * @author             : Drogidis Christos
 * @authorSite         : www.alexsoft.gr
 */


/**
 * If the function [ curl_multi_get_handles ] does not exist then we create it.
 * ++ 8.5.0 ---- https://php.watch/versions/8.5/curl_multi_get_handles
 * 
 * @since 2.0.0
 */
if (!defined('PHP_BUILD_DATE')) {
    function php_build_date() {
        ob_start();
        phpinfo(INFO_GENERAL);
        $info = ob_get_clean();
            
        preg_match('@Build Date(?:( => | </td><td class="v">))(?<buildtime>[A-Za-z]{3} (?: \d|\d\d) \d{4} \d{2}:\d{2}:\d{2})@', $info, $matches);
            
         return (string) $matches['buildtime']; // Sep 16 2025 10:44:26
    }

    define('PHP_BUILD_DATE', php_build_date());
} 



/**
 * If the function [ array_first ] does not exist then we create it.
 * ++ 8.5.0 ---- https://php.watch/versions/8.5/array_first-array_last
 * 
 * @since 2.0.4
 */
if (!function_exists('array_first')) {
    /**
     * Returns the first value of a given array.
     *
     * @param array $array The array to get the first value of.
     * @return mixed First value of the array, or null if the array is empty. Note that null itself can also be a valid array value.
     */ 
    function array_first(array $array): mixed {  
        return $array === [] ? null : $array[array_key_first($array)];  
    }
}


/**
 * If the function [ array_last ] does not exist then we create it.
 * ++ 8.5.0 ---- https://php.watch/versions/8.5/array_first-array_last
 * 
 * @since 2.0.4
 */
if (!function_exists('array_last')) {
    /**  
     * Returns the last value of a given array.
     * 
     * @param array $array The array to get the first value of.  
     * @return mixed Last value of the array, or null if the array is empty. Note that null itself can also be a valid array value.
     */
    function array_last(array $array): mixed {  
        return $array === [] ? null : $array[array_key_last($array)];  
    }
}


/**
 * If the function [ locale_is_right_to_left ] does not exist then we create it.
 * ++ 8.5.0 ---- https://php.watch/versions/8.5/locale_is_right_to_left-Locale-isRightToleft
 * 
 * @since 2.0.4
 */
if (!function_exists('locale_is_right_to_left')) {
    /**
     * Returns whether the given $locale has an RTL script.
     *  @param string $locale
     *  @return bool Whether the script is RTL
     */
    function locale_is_right_to_left(string $locale): bool
    {
        /*
        The following polyfill checks if the given $locale parameter matches or prefix-matches with a known list of RTL scripts:
            ar: Arabic
            dv: Dhivehi
            he: Hebrew
            ku-Arab: Kurshish Sorani
            ps: Pashto
            fa: Persian (Farsi)
            sd: Sindhi
            ur: Urdu
            yi: Yiddish
        */
        return (bool) preg_match('/^(?:ar|he|fa|ur|ps|sd|ug|ckb|yi|dv|ku_arab|ku-arab)(?:[_-].*)?$/i', $locale);
    }
}


/**
 * If the function [ get_error_handler ] does not exist then we create it.
 * ++ 8.5.0 ---- https://php.watch/versions/8.5/get_error_handler-get_exception_handler
 * 
 * @since 2.0.4
 */
if (!function_exists('get_error_handler')) {
    /**
     * Returns the currently set error handler, or null if none is set.
     * @return callable|null
     */
    function get_error_handler(): ?callable 
    {
        $handler = set_error_handler(null);
        restore_error_handler();

        return $handler;
    }
}



/**
 * If the function [ get_exception_handler ] does not exist then we create it.
 * ++ 8.5.0 ---- https://php.watch/versions/8.5/get_error_handler-get_exception_handler
 * 
 * @since 2.0.4
 */
if (!function_exists('get_exception_handler')) {
    /**
     * Returns the currently set exception handler, or null if is none set.
     * @return callable|null
     */
    function get_exception_handler(): ?callable 
    {
        $handler = set_exception_handler(null);
        restore_exception_handler();

        return $handler;
    }
}
?>