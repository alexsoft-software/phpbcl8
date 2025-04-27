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
 * @ASCOOS-COPYRIGHT   : Copyright (c) 2007 - 2023, AlexSoft Software.               *
 *************************************************************************************
 *
 * @package            : ASCOOS CMS - phpBCL
 * @subpackage         : Core Compatibilities Manager for PHP < 8.3.0
 * @source             : /phpBCL/src/compat/compat_php83x.php
 * @version            : 2.0.3
 * @created            : 2023-06-22 07:00:00 UTC+2
 * @updated            : 2025-02-22 07:00:00 UTC+2
 * @author             : Drogidis Christos
 * @authorSite         : www.alexsoft.gr
 */

 

/**
 * If the function [ stream_context_set_options ] does not exist then we create it.
 * ++ 8.3.0 ---- https://www.php.net/manual/en/function.mb-str-pad.php
 */
if (!function_exists('stream_context_set_options'))
{  
    /**
     * Sets options on the specified context.
     * 
     * @link https://www.php.net/manual/function.stream-context-set-options.php
     * 
     * @param resource $context: The stream or context resource to apply the options to.
     * @param array $options: The options to set for context. 
     *      Note : options must be an associative array of associative arrays 
     *      in the format $array['wrapper']['option'] = $value. 
     *      Refer to context options and parameters for a listing of stream options.
     * @return bool Returns true on success or false on failure.
     * 
     * @since 1.0.9
     */
    function stream_context_set_options($context, $options)
    {
        return stream_context_set_option($context, $options); // Second syntax of function 
    }
}



/**
 * If the function [ json_validate ] does not exist then we create it.
 * ++ 8.3.0 ---- https://www.php.net/manual/en/function.json-validate
 */
if (!function_exists('json_validate'))
{
  /**
   * 
   * DESCRIPT     : Validate an string if contains a valid json. 
   * 
   * @link  https://www.php.net/manual/en/function.json-validate
   * 
   * @param  string $json      The json string being analyzed. This function only works with UTF-8 encoded strings. 
   *                            Note:
   *                            PHP implements a superset of JSON as specified in the original » RFC 7159. 
   * 
   * @param  int    $depth     Maximum nesting depth of the structure being decoded. 
   * 
   * @param  int    $flags     Bitmask of JSON_INVALID_UTF8_IGNORE. The behavior of this constant is described on the JSON constants page. 
   * 
   * @return bool   Returns true if the string passed contains a valid json, otherwise returns false. 
   * 
   */
    function json_validate($json, $depth = 512, $flags = 0) {
        $errors = array(
            'json_validate(): Argument #3 ($flags) must be a valid flag (allowed flags: JSON_INVALID_UTF8_IGNORE)',
            'json_validate(): Argument #2 ($depth) must be greater than 0'
        );

        if (is_string($json) && $json !== '') {
            if ($flags !== 0 && $flags !== \JSON_INVALID_UTF8_IGNORE) {
                trigger_error($errors[0], E_USER_WARNING);  
                // throw new ValueError('json_validate(): Argument #3 ($flags) must be a valid flag (allowed flags: JSON_INVALID_UTF8_IGNORE)');  
            }  
              
            if ($depth <= 0 ) { 
                trigger_error($errors[1], E_USER_WARNING);   
                // throw new ValueError('json_validate(): Argument #2 ($depth) must be greater than 0');  
            }
            
            @json_decode($json, null, $depth, $flags);
            if (json_last_error() === JSON_ERROR_NONE) return true;
        }
        return false;
    }
}



/**
 * If the function [mb_str_pad] does not exist, create a polyfill for it.
 * Available in PHP 8.3.0+ - https://www.php.net/manual/en/function.mb-str-pad.php
 */
if (!function_exists('mb_str_pad')) {
    /**
     * Pad a string to a certain length with another string (multi-byte support)
     * 
     * @desc <English> Pads a string to a specified length using a padding string, with multi-byte character support.
     * @desc <Greek> Συμπληρώνει μια συμβολοσειρά σε καθορισμένο μήκος χρησιμοποιώντας μια συμβολοσειρά συμπλήρωσης, με υποστήριξη χαρακτήρων πολλαπλών byte.
     * 
     * @param string $string <English> The input string to pad.
     *                       <Greek> Η συμβολοσειρά εισόδου που θα συμπληρωθεί.
     * @param int $length <English> The desired length. If less than or equal to the string's length, no padding occurs.
     *                    <Greek> Το επιθυμητό μήκος. Αν είναι μικρότερο ή ίσο με το μήκος της συμβολοσειράς, δεν γίνεται συμπλήρωση.
     * @param string $pad_string <English> The string to use for padding. Truncated if necessary. Defaults to a space.
     *                           <Greek> Η συμβολοσειρά που χρησιμοποιείται για συμπλήρωση. Περικόπτεται αν χρειάζεται. Προεπιλέγεται κενό.
     * @param int $pad_type <English> The padding type: STR_PAD_RIGHT, STR_PAD_LEFT, or STR_PAD_BOTH. Defaults to STR_PAD_RIGHT.
     *                      <Greek> Ο τύπος συμπλήρωσης: STR_PAD_RIGHT, STR_PAD_LEFT, ή STR_PAD_BOTH. Προεπιλέγεται STR_PAD_RIGHT.
     * @param string|null $encoding <English> The character encoding to use. Defaults to 'UTF-8' if omitted or null.
     *                              <Greek> Η κωδικοποίηση χαρακτήρων που θα χρησιμοποιηθεί. Προεπιλέγεται 'UTF-8' αν παραλειφθεί ή είναι null.
     * 
     * @return string <English> The padded string.
     *                <Greek> Η συμπληρωμένη συμβολοσειρά.
     * 
     * @throws InvalidArgumentException <English> If string or pad_string is not a string, length is invalid, pad_type is invalid, or encoding is unsupported.
     *                                  <Greek> Αν το string ή το pad_string δεν είναι συμβολοσειρά, το length δεν είναι έγκυρο, ο pad_type δεν είναι έγκυρος, ή η κωδικοποίηση δεν υποστηρίζεται.
     * 
     * @link https://www.php.net/manual/en/function.mb-str-pad.php
     */
    function mb_str_pad($string, $length, $pad_string = " ", $pad_type = STR_PAD_RIGHT, $encoding = null)
    {
        if (!is_string($string)) {
            throw new InvalidArgumentException('The $string parameter must be a string.');
        }
        if (!is_int($length)) {
            throw new InvalidArgumentException('The $length parameter must be an integer.');
        }
        if (!is_string($pad_string)) {
            throw new InvalidArgumentException('The $pad_string parameter must be a string.');
        }
        if ($pad_string === '') {
            throw new InvalidArgumentException('The $pad_string parameter must not be empty.');
        }
        if (!in_array($pad_type, [STR_PAD_RIGHT, STR_PAD_LEFT, STR_PAD_BOTH], true)) {
            throw new InvalidArgumentException('The $pad_type parameter must be STR_PAD_RIGHT, STR_PAD_LEFT, or STR_PAD_BOTH.');
        }
        $encoding ??= 'UTF-8';
        if ($encoding !== null && !in_array($encoding, mb_list_encodings())) {
            throw new InvalidArgumentException("The encoding '$encoding' is not supported.");
        }

        $str_length = mb_strlen($string, $encoding);
        if ($length <= $str_length) {
            return $string;
        }

        $pad_length = $length - $str_length;
        $pad_str_length = mb_strlen($pad_string, $encoding);
        $repeat_times = (int)ceil($pad_length / $pad_str_length);
        $padding = mb_substr(str_repeat($pad_string, $repeat_times), 0, $pad_length, $encoding);

        switch ($pad_type) {
            case STR_PAD_LEFT:
                return $padding . $string;
            case STR_PAD_BOTH:
                $left_pad = mb_substr($padding, 0, (int)floor($pad_length / 2), $encoding);
                $right_pad = mb_substr($padding, 0, (int)ceil($pad_length / 2), $encoding);
                return $left_pad . $string . $right_pad;
            case STR_PAD_RIGHT:
            default:
                return $string . $padding;
        }
    }
}

?>