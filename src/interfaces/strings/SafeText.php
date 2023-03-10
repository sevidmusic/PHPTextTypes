<?php

namespace Darling\PHPTextTypes\interfaces\strings;

use Darling\PHPTextTypes\interfaces\strings\Text;

/**
 * SafeText is used to provide a safe form of Text that may contain
 * unsafe characters.
 *
 * The following characters are considered safe:
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
 * SafeText will never be empty, if the original Text is empty, then
 * the SafeText will be the numeric character 0.
 *
 * @example
 *
 * ```
 * echo $safeText->originalText();
 * // example output: !Foo Bar Baz..Bin!@#Bar--Foo____%$#@#$%^&*Bazzer
 *
 * echo strval($safeText->originalText()->length());
 * // example output: 48
 *
 * echo $safeText;
 * // example output: _Foo_Bar_Baz.Bin_Bar-Foo_Bazzer
 *
 * echo strval($safeText->length());
 * // example output: 31
 *
 * echo $emptySafeText->originalText();
 * // example output:
 *
 * echo strval($emptySafeText->originalText()->length());
 * // example output: 0
 *
 * echo $emptySafeText;
 * // example output: 0
 *
 * echo strval($emptySafeText->length());
 * // example output: 1
 *
 * ```
 *
 * @see Text
 *
 */
interface SafeText extends Text
{

    /**
     * Return a safe version of the original Text, insuring only the
     * following characters exist in the returned string:
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
     * If the original string is empty, then the returned string will
     * be the numeric character 0.
     *
     * @return string
     *
     * @example
     *
     * ```
     * echo $safeText->originalText()->__toString();
     * // example output: !(#(FJD(%F{{}|F"?F>>F<FIEI<DQ((#}}|}"D:O@7A(
     *
     * echo $safeText->toString();
     * // example output: _FJD_F_F_F_F_FIEI_DQ_D_O_7A_
     *
     * ```
     *
     */
    public function __toString(): string;

    /**
     * Returns the original Text, which may contain unsafe characters.
     *
     * @return Text
     *
     * @example
     *
     * ```
     * echo $safeText->originalText();
     * // example output: !(#(FJD(%F{{}|F"?F>>F<FIEI<DQ((#}}|}"D:O@7A(
     *
     * echo strval($safeText->originalText()->length());
     * // example output: 44
     *
     * echo $safeText;
     * // example output: _FJD_F_F_F_F_FIEI_DQ_D_O_7A_
     *
     * echo strval($safeText->length());
     * // example output: 28
     *
     * ```
     *
     * @see Text
     *
     */
    public function originalText(): Text;

}

