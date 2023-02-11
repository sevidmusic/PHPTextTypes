<?php

namespace Darling\PHPTextTypes\classes\strings;

use Darling\PHPTextTypes\interfaces\strings\AlphanumericText as AlphanumericTextInterface;
use Darling\PHPTextTypes\classes\strings\SafeText;
use Darling\PHPTextTypes\interfaces\strings\Text as TextInterface;
use Darling\PHPTextTypes\classes\strings\Text;

class AlphanumericText extends SafeText implements AlphanumericTextInterface
{

    /**
     * Modify a string, insuring only alphanumeric characters
     * exist in the resulting string:
     *
     * If the original string is empty, then the modified string will
     * be the numeric character 0.
     *
     * If the original string does not contain any alphanumeric
     * characters, then the modified string will be the numeric
     * character 0.
     *
     * Also, the first letter of each alphanumeric word in the
     * original string will be capitalized in the resulting string.
     *
     * @return string
     *
     * @example
     *
     * ```
     * $string = '!Foo Bar Baz..Bin!@#Bar--foo____%$#@#$%^&*bazzer';
     *
     * echo $this->makeStringSafe($string);
     * // example output: FooBarBazBinBarFooBazzer
     *
     * $string = '';
     *
     * echo $this->makeStringSafe($string);
     * // example output: 0
     *
     * ```
     *
     */
    protected function makeStringSafe(string $string): string
    {
        $safeString = parent::makeStringSafe($string);
        $words = ucwords($safeString, '_-.');
        $alphanumericString = preg_replace(
            "/[^A-Za-z0-9 ]/",
            '',
            $words
        );
        return strval(
            empty($alphanumericString)
            ? 0
            : $alphanumericString
        );
    }

}

