<?php

namespace Darling\PHPTextTypes\classes\strings;

use Darling\PHPTextTypes\classes\strings\Text;
use Darling\PHPTextTypes\interfaces\strings\SafeText as SafeTextInterface;
use Darling\PHPTextTypes\interfaces\strings\Text as TextInterface;

class SafeText extends Text implements SafeTextInterface
{

    /**
     * Instantiate a new SafeText instance using the specified Text.
     *
     * @param TextInterface $text The Text to construct the SafeText
     *                            from.
     *
     * @example
     *
     * ```
     * $safeText = new \Darling\PHPTextTypes\classes\strings\SafeText(
     *     new \Darling\PHPTextTypes\classes\strings\Text('Foo Bar Baz')
     * );
     *
     * echo $safeText;
     * // example output: Foo_Bar_Baz
     *
     * ```
     *
     * @see TextInterface
     *
     */
    public function __construct(private TextInterface $text)
    {
        parent::__construct($this->makeStringSafe($text));
    }

    /**
     * Replace consecutive sequences of hyphens with single hyphen.
     *
     * @return void
     *
     * @example
     *
     * ```
     * $string = '---';
     * $this->replaceConsecutiveHypensWithASingleHyphen($string);
     * echo $string;
     * // example output: -
     *
     * ```
     *
     */
    private function replaceConsecutiveHypensWithASingleHyphen(
        string &$string
    ): void
    {
        $string = (preg_replace('#-+#', '-', $string) ?? '');
    }

    /**
     * Replace consecutive sequences of periods with single period.
     *
     * @return void
     *
     * @example
     *
     * ```
     * $string = '...';
     * $this->replaceConsecutivePeriodsWithASinglePeriod($string);
     * echo $string;
     * // example output: .
     *
     * ```
     *
     */
    private function replaceConsecutivePeriodsWithASinglePeriod(
        string &$string
    ): void
    {
        $string = (preg_replace('#\.+#', '.', $string) ?? '');
    }

    /**
     * Replace consecutive sequences of underscores with single
     * underscore.
     *
     * @return void
     *
     * @example
     *
     * ```
     * $string = '___';
     * $this->replaceConsecutiveUnderscoresWithASingleUnderscore(
     *     $string
     * );
     * echo $string;
     * // example output: _
     *
     * ```
     *
     */
    private function replaceConsecutiveUnderscoresWithASingleUnderscore(
        string &$string
    ): void
    {
        $string = (preg_replace('#_+#', '_', $string) ?? '');
    }

    /**
     * Replace unsafe characters with underscores.
     *
     * @return void
     *
     * @example
     *
     * ```
     * $string = 'Foo$%Bar##*Baz!@!';
     * $this->replaceUnsafeCharactersWithUnderscores($string);
     * echo $string;
     * // example output: Foo__Bar___Baz___
     *
     * ```
     *
     */
    private function replaceUnsafeCharactersWithUnderscores(
        string &$string
    ): void
    {
        $string = (
            preg_replace('/[^A-Za-z0-9\._-]/', '_', $string)
            ??
            ''
        );
    }

    /**
     * Modify a string, insuring only the following characters
     * exist in the resulting string:
     *
     * - Alphanumeric characters: A-Z, a-z, and 0-9
     * - Underscores: _
     * - Hyphens: -
     * - Periods: .
     *
     * Unsafe characters will be replaced with underscores.
     *
     * A consecutive sequence of 2 or more unsafe characters will be
     * replaced by a single underscore.
     *
     * A consecutive sequence of 2 or more underscores will be
     * replaced by a single underscore.
     *
     * A consecutive sequence of 2 or more hyphens will be replaced by
     * a single hyphen.
     *
     * A consecutive sequence of 2 or more periods will be replaced by
     * a single period.
     *
     * If the original string is empty, then the modified string will
     * be the numeric character 0.
     *
     * @return string
     *
     * @example
     *
     * ```
     * $string = '!Foo Bar Baz..Bin!@#Bar--Foo____%$#@#$%^&*Bazzer';
     *
     * echo $this->makeStringSafe($string);
     * // example output: _Foo_Bar_Baz.Bin_Bar-Foo_Bazzer
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
        $this->replaceUnsafeCharactersWithUnderscores($string);
        $this->replaceConsecutiveUnderscoresWithASingleUnderscore(
            $string
        );
        $this->replaceConsecutiveHypensWithASingleHyphen($string);
        $this->replaceConsecutivePeriodsWithASinglePeriod($string);
        return (
            empty($string)
            ? strval(0)
            : $string
        );
    }

    public function originalText(): TextInterface
    {
        return $this->text;
    }

}

