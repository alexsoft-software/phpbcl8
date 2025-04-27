# Changelog

## 2.0.5 [2025-04-27]

- Fix `composer.json`

---

## 2.0.4 [2025-04-27]

### PHP < 8.5
- Added function `array_first.php` : Returns the first value of a given array.
- Added function `array_last.php` : Returns the last value of a given array.
- Added function `locale_is_right_to_left.php` : Returns whether the given $locale has an RTL script.
- Added function `get_error_handler.php` :  Returns the currently set error handler, or null if none is set.
- Added function `get_exception_handler.php` : Returns the currently set exception handler, or null if is none set.

### PHP < 8.3
- Fixed function `mb_str_pad` for use in PHP >= 8.0.0

### *phpBCL Examples*
- Added example file `85_array_first.php` : Returns the first value of a given array.
- Added example file `85_array_last.php` : Returns the last value of a given array.
- Added example file `85_locale_is_right_to_left.php` : Returns whether the given $locale has an RTL script.
- Added example file `85_get_error_handler.php` :  Returns the currently set error handler, or null if none is set.
- Added example file `85_get_exception_handler.php` : Returns the currently set exception handler, or null if is none set.

---

## 2.0.3 [2025-02-22]

- Fix `compat_php83.php` for use in PHP >= 8.0.0

---

## 2.0.2 [2024-12-08]

### *phpBCL Core and Examples*
- Updated autoload.php

---

## 2.0.0 [2024-11-29]

### *phpBCL Core and Examples*
- Added support for [`LibIN`](https://github.com/ascoos/libin) Installer
- Added support for PHPClasses [`composer`](https://www.phpclasses.org/package/12926-PHP-Functions-of-newer-PHP-versions-for-older-versions.html#install) installer

### PHP < 8.5
#### `CONSTANTS`
- Added dynamic Constant `PHP_BUILD_DATE` : that is assigned the time and date the PHP binary is built.

#### `EXAMPLES`
- Added example file `85_php_build_date.php` : 

